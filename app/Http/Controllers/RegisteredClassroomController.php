<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\ClassroomUser;
use App\Models\NotificationRequirement;
use App\Notifications\NotificationClassroom;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class RegisteredClassroomController extends Controller
{
    public function index() {
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

        return view('auth.register-classroom', ['themes' => $themes, 
                                                'teachers' => $teachers]);
    }

    public function create(Request $request) {
        $request->validate([
            'teacher' => 'required',
            'theme' => 'required',
            'title' => 'required',
            'description' => 'required' ,
        ]);
        
        $classroom = Classroom::create([
            'creator_id' => Auth::user()->id,
            'teacher_id' => $request->teacher,
            'theme_id' => $request->theme,
            'title' => $request->title,
            'description' => $request->description,
            ]);


        return redirect()->back();
        
    }



    public function requestParticipation($id) {
        $classroom = Classroom::find($id);
        
            $requirement = ([
                'user_id' => Auth::user()->id,
                'classroom_id' => $id,
                'user_name' => Auth::user()->name,
                'classroom_name' => $classroom->title
            ]);
        
            $teacher = $classroom->teacher;

            $teacher->notify(new NotificationClassroom($requirement));

    }

}
