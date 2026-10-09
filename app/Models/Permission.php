<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends Model
{
    use HasFactory;

    public const ORDER_VIEW = 'order.view';

    public const ORDER_CREATE = 'order.create';

    public const ORDER_UPDATE = 'order.update';

    public const QUOTATION_CREATE = 'quotation.create';

    public const QUOTATION_SEND = 'quotation.send';

    public const QUOTATION_REVISE = 'quotation.revise';

    public const ORDER_CLOSE = 'order.close';

    public const ORDER_CANCEL = 'order.cancel';

    public const PRODUCTION_EXECUTE = 'production.execute';

    public const MATERIAL_MANAGE = 'material.manage';

    public const REWORK_MANAGE = 'rework.manage';

    public const QC_INSPECT = 'qc.inspect';

    public const QC_APPROVE = 'qc.approve';

    public const SHIPPING_MANAGE = 'shipping.manage';

    public const AFTER_SALES_MANAGE = 'after-sales.manage';

    public const COMPLAINT_MANAGE = 'complaint.manage';

    public const COMPLAINT_ASSESS = 'complaint.assess';

    public const REPEAT_ORDER_CREATE = 'repeat-order.create';

    protected $fillable = ['name', 'slug', 'description'];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_permissions');
    }
}
