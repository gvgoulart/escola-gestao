<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::paginate(15);
        return response($classrooms);
    }


    public function store(Request $request)
    {
        $data = $request->all();

         //valida o request
         $validator = Validator::make($data, [
            'teacher' => 'required',
            'theme' => 'required',
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'Erro de validação']);
        }

        $time = date('Y-m-d H-i-s', strtotime($request->time));

        //Cria uma aula
        $classroom = Classroom::create([
            'creator_id' => Auth::user()->id,
            'teacher_id' => $request->teacher,
            'theme_id' => $request->theme,
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'time' => $time
            ]);


        return response([ 'user' => new Classroom($classroom), 'message' => 'Criado com sucesso'], 200);
    }

    public function show($id)
    {
        $classroom = Classroom::findOrFail($id);
        return response($classroom);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

         //valida o request
         $validator = Validator::make($data, [
            'teacher' => 'required',
            'theme' => 'required',
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);

        $time = date('Y-m-d H-i-s', strtotime($request->time));

        Classroom::find($id)->update([
            'teacher_id' => $request->teacher,
            'theme_id' => $request->theme,
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'time' => $time
        ]);
        

        return response(['message' => 'Editado com sucesso'], 200);
    }

    public function destroy($id)
    {
        Classroom::findOrFail($id)->delete();
        return  response([ 'message' => 'Excluído com sucesso'], 200);
    }
}
