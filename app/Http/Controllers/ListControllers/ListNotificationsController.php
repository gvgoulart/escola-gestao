<?php

namespace App\Http\Controllers\ListControllers;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class ListNotificationsController extends Controller
{
    public function index() {
        $notifications = [];
        
        //se a contagem de notificações não lidas for maior que 0, a variavel notifications armazena as mesmas
        if(count(Auth::user()->unreadNotifications) > 0) { 
            $notifications = Auth::user()->unreadNotifications;
        }


        return view('auth.list.list-notifications', ['notifications' => $notifications]);
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
        return redirect()->back();
    }

}
