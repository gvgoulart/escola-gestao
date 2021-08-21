<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;

class RegisteredThemeController extends Controller
{
    public function index () {
        return view ('auth.register-theme');
    }
    public function create (Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            ]);
        
        $theme = Theme::create([
            'name' => $request->name,
        ]);

        return redirect()->back();
    }
}
