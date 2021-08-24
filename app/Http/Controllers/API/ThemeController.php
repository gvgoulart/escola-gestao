<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ThemeController extends Controller
{
    public function index()
    {
        $themes = Theme::paginate(15);
        return response($themes);
    }


    public function store(Request $request)
    {
        $data = $request->all();

        //valida o request
        $validator = Validator::make($data, [
                    'name' => 'required',
        ]);
        if($validator->fails()){
            return response(['error' => $validator->errors(), 'Erro de validação']);
        }

        //Cria uma aula
        Theme::create([
            'name' => $request->name,
            ]);


        return response(['message' => 'Criado com sucesso'], 200);
    }

    public function show($id)
    {
        $theme = Theme::findOrFail($id);
        return response($theme);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        //valida o request
        $validator = Validator::make($data, [
            'name' => 'required',
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'Erro de validação']);
        }

        Theme::find($id)->update([
            'name' => $request->name,
        ]);
        

        return response(['message' => 'Editado com sucesso'], 200);
    }

    public function destroy($id)
    {
        Theme::findOrFail($id)->delete();
        return  response([ 'message' => 'Excluído com sucesso'], 200);
    }
}
