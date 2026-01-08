<?php

namespace App\Policies;

use App\Models\Lead;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LeadPolicy
{
    public function view(User $user, Lead $lead): bool
    {
        return (int) $user->id === (int) $lead->assigned_to;
    }

    public function update(User $user, Lead $lead): bool
    {

        return (int) $user->id === (int) $lead->assigned_to;
    }

    public function delete(User $user, Lead $lead): bool
    {
        return (int) $user->id === (int) $lead->assigned_to;
    }
}
