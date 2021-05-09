<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RolesController extends Controller
{
    public function assignRole(Request $request)
    {
       
            $role=Role::where('name',$request->name)->first();
            $user=auth()->user();
            $user->assignRole($role->name);
            return redirect('home');
    }
}
