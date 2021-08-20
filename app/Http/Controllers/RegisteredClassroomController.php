<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisteredClassroomController extends Controller
{
    public function index() {
        return view('auth.register-classroom');
    }

    public function create(Request $request) {

        $classroom = Classroom::create([
            'creator' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description,

        ]);

        return redirect()->back();
    }
}
