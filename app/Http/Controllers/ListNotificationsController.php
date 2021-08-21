<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListNotificationsController extends Controller
{
    public function index() {
        $notifications = [];
        
        if(count(Auth::user()->notifications) > 0) { 
            $notifications = Auth::user()->notifications;
        }


        return view('auth.list-notifications', ['notifications' => $notifications]);
    }
    public function indexStudent() {
        $notifications = [];
        $reason = [];
        $theme = [];
        $notification = [];

        if(count(Auth::user()->unreadNotifications ) > 0) { 
            $notifications = Auth::user()->unreadNotifications ;
            foreach($notifications as $notification) {
                $notification = $notification;
                foreach($notification->data as $data) {
                    $reason = $data['reason'];
                    $theme = $data['classroom']['title'];
                }
            }
        }

        return view('auth.list-notifications-student', ['notification' => $notification,
                                                        'reason' => $reason,
                                                        'theme' => $theme]);
    }
    public function markAsRead($id) {
         $notificationSelected = Notification::find($id);

        foreach (Auth::user()->unreadNotifications as $notification) {
            if($notification == $notificationSelected)  { 
                $notification->markAsRead();
            }
        }
    }

}
