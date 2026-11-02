<?php

namespace App\Policies;

use App\Models\Lead;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;

class LeadPolicy
{
    public function recordQuotationAcceptance(User $user, Lead $lead): bool
    {
        return $this->isSalesPicOrAdmin($user, $lead)
            && $user->hasPermissionForUnit(Permission::QUOTATION_ACCEPT, $lead->business_unit_id);
    }

    public function close(User $user, Lead $lead): bool
    {
        return $this->isSalesPicOrAdmin($user, $lead)
            && $user->hasPermissionForUnit(Permission::ORDER_CLOSE, $lead->business_unit_id);
    }

    public function before(User $user): ?bool
    {
        return $user->hasRoleForUnit(Role::SYSTEM_ADMIN) ? true : null;
    }

    private function isSalesPicOrAdmin(User $user, Lead $lead): bool
    {
        return $lead->pic_user_id === $user->id
            || $user->hasRoleForUnit(Role::SYSTEM_ADMIN, $lead->business_unit_id);
    }
}
