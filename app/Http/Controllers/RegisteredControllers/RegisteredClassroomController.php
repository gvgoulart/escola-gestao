<?php

namespace App\Http\Controllers\RegisteredControllers;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Notification;
use App\Notifications\NotificationClassroom;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class RegisteredClassroomController extends Controller
{
    public function index() {
        //pegando as informações para apresentar nos inputs com valores default
        $themes = Theme::all();
        $users = User::all();
        $teachers = [];
        
        //se a contagem de usuários for maior que 0 e os mesmos forem professores, armazenamos na variavel teachers
        if(count($users) > 0 ) {
            foreach ($users as $user) {
                if($user->hasRole('professor')) {
                        $teachers[] = $user;
                }
            }
        }
        //se a contagem de themes for 0, deixamos a variavel vazia para a view não dar error
        if(count($themes) == 0) {
                $themes = [];
        }
        //retorna a view de registro
        return view('auth.register.register-classroom', ['themes' => $themes, 
                                                'teachers' => $teachers]);
    }

    public function create(Request $request) {
        //valida o request
        $request->validate([
            'teacher' => 'required',
            'theme' => 'required',
            'title' => 'required',
            'description' => 'required' ,
        ]);
        //Cria uma aula
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
        //encontra a aula
        $classroom = Classroom::find($id);
        
        //salvamos em uma variavel as informações que vamos precisar para a notificação
        $requirement = ([
                'user_id' => Auth::user()->id,
                'classroom_id' => $id,
                'user_name' => Auth::user()->name,
                'classroom_name' => $classroom->title
            ]);
        //encontramos o professor da aula
        $teacher = $classroom->teacher;
        
        //notificando o professor
        $teacher->notify(new NotificationClassroom($requirement));

        return redirect()->back()->with('msg', 'Participação requisitada');

    }

}
