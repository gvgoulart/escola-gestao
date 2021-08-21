<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class ListUsersController extends Controller
{
    public function index() {
        $users = User::all();

        return view('auth.list-users', ['users' => $users]);
    }
}
