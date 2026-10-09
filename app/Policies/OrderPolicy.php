<?php

namespace App\Policies;

use App\Models\BusinessUnit;
use App\Models\Order;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;

class OrderPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->roleAssignments()->exists();
    }

    public function view(User $user, Order $order): bool
    {
        return $user->hasPermissionForUnit(Permission::ORDER_VIEW, $order->business_unit_id);
    }

    public function create(User $user, BusinessUnit|int $businessUnit): bool
    {
        return $user->hasPermissionForUnit(Permission::ORDER_CREATE, $businessUnit);
    }

    public function update(User $user, Order $order): bool
    {
        return $user->hasPermissionForUnit(Permission::ORDER_UPDATE, $order->business_unit_id);
    }

    public function createQuotation(User $user, Order $order): bool
    {
        return $user->hasPermissionForUnit(Permission::QUOTATION_CREATE, $order->business_unit_id);
    }

    public function reviseQuotation(User $user, Order $order): bool
    {
        return $user->hasPermissionForUnit(Permission::QUOTATION_REVISE, $order->business_unit_id);
    }

    public function close(User $user, Order $order): bool
    {
        return $user->hasPermissionForUnit(Permission::ORDER_CLOSE, $order->business_unit_id);
    }

    public function cancel(User $user, Order $order): bool
    {
        return $user->hasPermissionForUnit(Permission::ORDER_CANCEL, $order->business_unit_id);
    }

    public function executeProduction(User $user, Order $order): bool
    {
        return $user->hasPermissionForUnit(Permission::PRODUCTION_EXECUTE, $order->business_unit_id);
    }

    public function manageMaterial(User $user, Order $order): bool
    {
        return $user->hasPermissionForUnit(Permission::MATERIAL_MANAGE, $order->business_unit_id);
    }

    public function manageRework(User $user, Order $order): bool
    {
        return $user->hasPermissionForUnit(Permission::REWORK_MANAGE, $order->business_unit_id);
    }

    public function inspectQc(User $user, Order $order): bool
    {
        return $user->hasPermissionForUnit(Permission::QC_INSPECT, $order->business_unit_id);
    }

    public function manageShipping(User $user, Order $order): bool
    {
        return $user->hasPermissionForUnit(Permission::SHIPPING_MANAGE, $order->business_unit_id);
    }

    public function manageAfterSales(User $user, Order $order): bool
    {
        return $user->hasPermissionForUnit(Permission::AFTER_SALES_MANAGE, $order->business_unit_id);
    }

    public function manageComplaint(User $user, Order $order): bool
    {
        return $user->hasPermissionForUnit(Permission::COMPLAINT_MANAGE, $order->business_unit_id);
    }

    public function before(User $user): ?bool
    {
        return $user->hasRoleForUnit(Role::SYSTEM_ADMIN) ? true : null;
    }
}
