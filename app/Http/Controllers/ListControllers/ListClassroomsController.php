<?php

namespace App\Http\Controllers\ListControllers;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListClassroomsController extends Controller
{
    public function index() {
        $classroomsAll = Classroom::all();
        $classrooms = [];

        if(Auth::user()->hasRole('professor')) {
            foreach($classroomsAll as $classroom) {
                if($classroom->teacher == Auth::user()) {
                    $classrooms[] = $classroom;
                }
            }
        }  elseif(Auth::user()->hasRole('admin')) {
                $classrooms =  Classroom::all();
        }   

        return view('auth.list.list-classrooms', ['classrooms' => $classrooms]);
    }

    public function delete($id) {
        Classroom::find($id)->delete();

        return redirect()->back();
    }

    public function edit($id) {
        $classroom = Classroom::find($id);

        $themes = Theme::all();
        $users = User::all();
        $teachers = [];

        if(count($users) > 0 ) {
            foreach ($users as $user) {
                if($user->hasRole('professor')) {
                        $teachers[] = $user;
                }
            }
        }

        if(count($themes) == 0) {
                $themes = [];
        }


        return view('auth.edit.edit-classroom', ['classroom' => $classroom,
                                            'themes' => $themes, 
                                            'teachers' => $teachers]);
    }

    public function editAction(Request $request, $id) {

        Classroom::find($id)->update([
            'teacher_id' => $request->teacher,
            'theme_id' => $request->theme,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->back();
    }
}
