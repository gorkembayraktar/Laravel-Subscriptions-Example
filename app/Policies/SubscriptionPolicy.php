<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Laravel\Cashier\Subscription;

class SubscriptionPolicy
{
    use HandlesAuthorization;

    public function cancel(User $user): bool{
       return !$user->subscription('default')->cancelled();
    }
    public function resume(User $user): bool{
        return $user->subscription('default')->cancelled();
    }
}
