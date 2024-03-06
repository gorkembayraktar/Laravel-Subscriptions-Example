<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class TestController extends Controller
{
    public function test (){
        
        $user = Auth::user();

        //$roles = $user->getAllPermissions()->pluck('name');

        dd($roles);

       //    dd(Role::with('permissions')->get());
      // $users = User::with('roles')->get();
       
        //dd($users);

    }
}
