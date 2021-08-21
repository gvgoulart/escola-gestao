<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ListClassroomsController extends Controller
{
    public function index() {
        $classrooms = Classroom::all();

        return view('auth.list-classrooms', ['classrooms' => $classrooms]);
    }
}
