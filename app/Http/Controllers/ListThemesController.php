<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;

class ListThemesController extends Controller
{
    public function index() {
        $themes = Theme::all();

        return view('auth.list-themes', ['themes' => $themes]);
    }
}
