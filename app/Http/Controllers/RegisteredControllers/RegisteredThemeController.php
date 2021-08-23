<?php

namespace App\Http\Controllers\RegisteredControllers;

use App\Http\Controllers\Controller;
use App\Models\Theme;
use Illuminate\Http\Request;

class RegisteredThemeController extends Controller
{
    public function index () {
        return view ('auth.register.register-theme');
    }
    public function create (Request $request) {
        //validamos o request
        $request->validate([
            'name' => 'required|string|max:255',
            ]);
        //criamos a matéria
        $theme = Theme::create([
            'name' => $request->name,
        ]);
        //voltamos para a mesma página
        return redirect()->back();
    }
}
