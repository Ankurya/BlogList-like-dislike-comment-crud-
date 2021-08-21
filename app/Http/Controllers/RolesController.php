<?php

namespace App\Http\Controllers;

use App\Models\User;

class RolesController extends Controller
{
    public function getRoles()
    {

        $users = User::with('role')->get();
        return view('roles')->with(['users' => $users]);
    }
}
