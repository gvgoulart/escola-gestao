<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    public function create()
    {
        $role = Role::all();

        return view('auth.register.register', ['roles' => $role]);
    }

    public function store(Request $request)
    {
        //valida a requisição
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', Rules\Password::defaults()],
            ]);
        //cria o usuário
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //designa oque o usuario vai ser, aluno, professor ou admin
        $user->attachRole($request->role_id);
        //se o user for admim
        if($user->hasRole('admin')) {
            //da todas as permissoes para o admin
            $user->attachPermissions([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18]);
            //se o user for professor
        }elseif($user->hasRole('professor')) {
            //da as permissoes de Create Users,Read Users,Update Users,Delete Users,
            //Create Aulas, Read Aulas, Update Aulas, Delete Aulas, Create Profile,Read Profile
            $user->attachPermissions([1,2,3,4,6,9,10,11,12,13,14,15,16,17,18]);
        } else{
            //se o user for aluno, da a permissao de Read Profile
            $user->attachPermissions([10,14,16,17,18]);
        }

        return redirect()->back()->with('msg', 'Usuário cadastrado!');
    }
}
