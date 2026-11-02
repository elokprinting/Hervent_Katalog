<?php

namespace Database\Seeders;

use App\Models\BusinessUnit;
use App\Models\Department;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class ErpFoundationSeeder extends Seeder
{
    public function run(): void
    {
        $units = collect([
            ['name' => 'HerVent', 'slug' => 'hervent'],
            ['name' => 'Gudang Flashdisk', 'slug' => 'gudang-flashdisk'],
            ['name' => 'Raya Pro', 'slug' => 'raya-pro'],
        ])->mapWithKeys(function (array $attributes) {
            $unit = BusinessUnit::updateOrCreate(['slug' => $attributes['slug']], $attributes);

            return [$unit->slug => $unit];
        });

        $departments = collect([
            ['name' => 'Sales', 'slug' => 'sales'],
            ['name' => 'Produksi', 'slug' => 'production'],
            ['name' => 'QC', 'slug' => 'qc'],
            ['name' => 'Logistik', 'slug' => 'logistics'],
            ['name' => 'After Sales', 'slug' => 'after-sales'],
        ])->mapWithKeys(function (array $attributes) {
            $department = Department::updateOrCreate(['slug' => $attributes['slug']], $attributes);

            return [$department->slug => $department];
        });

        $permissionDefinitions = [
            [Permission::ORDER_VIEW, 'Lihat detail order'],
            [Permission::ORDER_CREATE, 'Buat order/lead'],
            [Permission::ORDER_UPDATE, 'Ubah data order'],
            [Permission::QUOTATION_CREATE, 'Buat quotation'],
            [Permission::QUOTATION_SEND, 'Kirim quotation'],
            [Permission::QUOTATION_REVISE, 'Revisi quotation dan harga'],
            [Permission::QUOTATION_ACCEPT, 'Catat persetujuan quotation pelanggan'],
            [Permission::ORDER_CLOSE, 'Tetapkan order closing'],
            [Permission::ORDER_CANCEL, 'Batalkan order'],
            [Permission::PRODUCTION_EXECUTE, 'Kerjakan produksi'],
            [Permission::MATERIAL_MANAGE, 'Kelola material/pembelian'],
            [Permission::REWORK_MANAGE, 'Kelola rework'],
            [Permission::QC_INSPECT, 'Periksa hasil produksi/QC'],
            [Permission::QC_APPROVE, 'Tetapkan keputusan QC'],
            [Permission::SHIPPING_MANAGE, 'Kelola pengiriman dan penerimaan'],
            [Permission::AFTER_SALES_MANAGE, 'Kelola follow-up after sales'],
            [Permission::COMPLAINT_MANAGE, 'Kelola kasus komplain'],
            [Permission::COMPLAINT_ASSESS, 'Nilai komplain kualitas'],
            [Permission::REPEAT_ORDER_CREATE, 'Buat repeat order'],
        ];

        $permissions = collect($permissionDefinitions)->mapWithKeys(function (array $definition) {
            [$slug, $name] = $definition;
            $permission = Permission::updateOrCreate(
                ['slug' => $slug],
                ['name' => $name],
            );

            return [$slug => $permission];
        });

        $roles = [
            Role::SYSTEM_ADMIN => [
                'name' => 'Admin Sistem',
                'department_id' => null,
                'is_system' => true,
                'description' => 'Akses penuh lintas unit bisnis; assignment role ini bersifat global.',
                'permissions' => $permissions->keys()->all(),
            ],
            Role::SALES => [
                'name' => 'Sales',
                'department_id' => $departments['sales']->id,
                'permissions' => [
                    Permission::ORDER_VIEW, Permission::ORDER_CREATE, Permission::ORDER_UPDATE,
                    Permission::QUOTATION_CREATE, Permission::QUOTATION_SEND, Permission::QUOTATION_REVISE,
                    Permission::QUOTATION_ACCEPT, Permission::ORDER_CLOSE, Permission::ORDER_CANCEL,
                ],
            ],
            Role::PRODUCTION => [
                'name' => 'Produksi',
                'department_id' => $departments['production']->id,
                'permissions' => [
                    Permission::ORDER_VIEW, Permission::MATERIAL_MANAGE,
                    Permission::PRODUCTION_EXECUTE, Permission::REWORK_MANAGE,
                ],
            ],
            Role::QC => [
                'name' => 'QC',
                'department_id' => $departments['qc']->id,
                'permissions' => [
                    Permission::ORDER_VIEW, Permission::QC_INSPECT, Permission::QC_APPROVE,
                    Permission::COMPLAINT_ASSESS,
                ],
            ],
            Role::LOGISTICS => [
                'name' => 'Logistik',
                'department_id' => $departments['logistics']->id,
                'permissions' => [Permission::ORDER_VIEW, Permission::SHIPPING_MANAGE],
            ],
            Role::AFTER_SALES => [
                'name' => 'After Sales',
                'department_id' => $departments['after-sales']->id,
                'permissions' => [
                    Permission::ORDER_VIEW, Permission::AFTER_SALES_MANAGE,
                    Permission::COMPLAINT_MANAGE, Permission::REPEAT_ORDER_CREATE,
                ],
            ],
        ];

        foreach ($roles as $slug => $definition) {
            $permissionSlugs = $definition['permissions'];
            unset($definition['permissions']);

            $role = Role::updateOrCreate(['slug' => $slug], [
                'name' => $definition['name'],
                'department_id' => $definition['department_id'],
                'is_system' => $definition['is_system'] ?? false,
                'description' => $definition['description'] ?? null,
            ]);

            $role->permissions()->sync($permissions->only($permissionSlugs)->pluck('id')->all());
        }

        // Keep this variable intentionally referenced so static analysers know
        // the seed establishes the three independent business-unit records.
        $units->each(static fn (BusinessUnit $unit) => $unit->exists);
    }
}
