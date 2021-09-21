<?php

namespace App\Http\Controllers\RegisteredControllers;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\ClassroomUser;
use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Notifications\NotificationUser;

class RegisteredClassroomUserController extends Controller
{
    public function store($id, $user_id, $classroom_id) {
        //excluimos a notificação para não aparecer mais para o professor
         Notification::where('id',$id)->first()->delete();

         //criamos a participação do aluno com a aula
        ClassroomUser::create([
            'user_id' => $user_id,
            'classroom_id' => $classroom_id
        ]);

        //volta para a mesma página
        return redirect()->back();
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

        //volta para a mesma página
        return redirect()->back();
    }
}
