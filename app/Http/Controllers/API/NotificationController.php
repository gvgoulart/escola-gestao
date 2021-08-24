<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\ClassroomUser;
use App\Models\Notification;
use App\Models\NotificationClassroom;
use App\Models\User;
use App\Notifications\NotificationUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
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

        return response(['msg', 'Participação requisitada'], 200);

    }
    public function store($id, $user_id, $classroom_id) {
        //excluimos a notificação para não aparecer mais para o professor
         Notification::where('id',$id)->first()->delete();

         //criamos a participação do aluno com a aula
        ClassroomUser::create([
            'user_id' => $user_id,
            'classroom_id' => $classroom_id
        ]);


        return response(['message','Usuário esta participando da aula'],200);
    }
    public function deny(Request $request, $id, $user_id, $classroom_id) {
        //encontramos o usuário e a aula
        $user = User::find($user_id);
        $classroom = Classroom::find($classroom_id);

        if($request->reason == null) {
            $request->reason = "O Professor não informou um motivo";
        }
        //armazenamos as informações que queremos para o aluno
        $notificationUser = ([
            'classroom' => $classroom,
            'reason' => $request->reason
        ]);
        
        //notificamos o aluno
        $user->notify(new NotificationUser($notificationUser));

        //excluimos a notificação
        Notification::where('id', $id)->delete();

        return response(['message','Usuário notificado sobre a recusa'],200);
    }
    public function index() {
        $notifications = [];
        
        //se a contagem de notificações não lidas for maior que 0, a variavel notifications armazena as mesmas
        if(count(Auth::user()->unreadNotifications) > 0) { 
            $notifications = Auth::user()->unreadNotifications;
        }


        return response($notifications);
    }
    public function indexStudent() {
        //zeramos todas as variáveis para não dar erro na view
        $notifications = [];

        //Fazemos uma contagem, e adicionamos informações da notificação enviada pelo professor nas variaveis para informar ao aluno
        if(count(Auth::user()->unreadNotifications ) > 0) { 
            $notifications = Auth::user()->unreadNotifications;
        }

        return view('auth.list.list-notifications-student', ['notifications' => $notifications]);
    }
    
    public function markAsRead($id) {
         $notificationSelected = Notification::find($id)->delete();

        foreach (Auth::user()->unreadNotifications as $notification) {
            if($notification == $notificationSelected)  { 
                $notification->markAsRead();
            }
        }
        return response(['message','Notificação lida'],200);
    }
}
