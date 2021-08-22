<?php

namespace App\Http\Controllers\ListControllers;

use App\Http\Controllers\Controller;
use App\Models\Theme;
use Illuminate\Http\Request;

class ListThemesController extends Controller
{
    public function index() {
        $themes = Theme::all();

        return view('auth.list.list-themes', ['themes' => $themes]);
    }

    public function delete($id) {
        Theme::find($id)->delete();

        return redirect()->back();
    }

    public function edit($id) {
        $theme = Theme::find($id);


        return view('auth.edit.edit-theme', ['theme' => $theme]);
    }

    public function editAction(Request $request, $id) {

        Theme::find($id)->update([
            'name' => $request->name
            ]);
    
        return redirect()->back();
    }

}
