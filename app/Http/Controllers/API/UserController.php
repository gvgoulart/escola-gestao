<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(15);
        return UserResource::collection($users);
    }
    public function show($id){
        $user = User::findOrFail( $id );
        return new UserResource( $user );
    }
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed'
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'Erro de validação']);
        }

        $user = User::create($data);

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

        return response([ 'user' => new User($user), 'message' => 'Criado com sucesso'], 200);
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'Erro de validação']);
        }

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
    
        return  response([ 'message' => 'Editado com sucesso'], 200);
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return  response([ 'message' => 'Excluído com sucesso'], 200);
    }
}
