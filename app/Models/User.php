<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    use Billable;


    use \Spatie\Permission\Traits\HasRoles {
        getStoredRole as getStoredRoleTrait;
    }
    protected function getStoredRole($role): \Spatie\Permission\Models\Role
    {
        if (is_object($role) && $role instanceof \BackedEnum) {
              $roleClass = $this->getRoleClass();
              return $roleClass->findByName($role->value, $this->getDefaultGuardName());
        }

        return $this->getStoredRoleTrait($role);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
