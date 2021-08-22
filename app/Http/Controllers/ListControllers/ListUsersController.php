<?php

namespace App\Http\Controllers\ListControllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ListUsersController extends Controller
{
    public function index() {
        
        $usersAll =  User::all();
        $users = [];

        if(Auth::user()->hasRole('professor')) {
            foreach($usersAll as $user) {
                if($user->hasRole('aluno')) {
                    $users[] = $user;
                }
            }
        }  elseif(Auth::user()->hasRole('admin')) {
                $users =  User::all();
        }   

        return view('auth.list.list-users', ['users' => $users]);
    }

    public function delete($id) {
        User::find($id)->delete();

        return redirect()->back();
    }
    
    public function edit($id) {
        $user = User::find($id);
        $roles = Role::all();


        return view('auth.edit.edit-user', ['user' => $user, 'roles' => $roles]);
    }

    public function editAction(Request $request, $id) {
        $request->validate([ 
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|',
            ]);

        $name = $request->name;
        $email = $request->email;
    

        User::find($id)->update([
                'name'=>$name,
                'email'=>$email,
                
            ]);
        $user = User::find($id);

        $user->detachRole($user->roles[0]);
        $user->attachRole($request->role_id);
        $user->save();
    
        return redirect()->back()->with(['msg', 'Usuário editado']);
    }
}
