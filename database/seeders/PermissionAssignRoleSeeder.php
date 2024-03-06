<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Enums\Roles;
use App\Enums\Permissions;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionAssignRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /***
         *  case EDIT_ARTICLES = 'edit articles';
    case UPDATE_ARTICLES = 'update articles';
    case DELETE_ARTICLES = 'delete articles';
    case READ_USERS = 'read users';
    case UPDATE_USERS = 'update users';
    case DELETE_USERS = 'delete users';
    case CREATE_USERS = 'create users';
    case PHONE_CONFIRM_USERS = 'phone confirm users';
    case PHONE_EMAIL_USERS = 'phone email users';
    case BANNED_USERS = 'banned users';
    case UNBANNED_USERS = 'unbanned users';
         */
    
       $example = [
        Roles::SUPERVISOR->value => [
            Permissions::EDIT_ARTICLES->value,
            Permissions::UPDATE_ARTICLES->value,
            Permissions::DELETE_ARTICLES->value,
            Permissions::READ_USERS->value,
            Permissions::DELETE_USERS->value,
            Permissions::CREATE_USERS->value,
            Permissions::PHONE_CONFIRM_USERS->value,
            Permissions::PHONE_EMAIL_USERS->value
        ],
        Roles::ADMIN->value => [
            Permissions::EDIT_ARTICLES->value,
            Permissions::UPDATE_ARTICLES->value,
            Permissions::DELETE_ARTICLES->value,
            Permissions::READ_USERS->value,
            Permissions::CREATE_USERS->value
        ],
        Roles::WRITER->value => [
            Permissions::READ_USERS->value
        ]
       ];

       foreach($example as $role => $permission):
        $ro = Role::findByName($role);
        $ro->givePermissionTo( $permission  );
       endforeach;

    }
}
