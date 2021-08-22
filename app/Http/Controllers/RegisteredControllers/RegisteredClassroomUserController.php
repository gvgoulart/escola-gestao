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
        $notificationSelected = Notification::where('id',$id)->first()->delete();

        ClassroomUser::create([
            'user_id' => $user_id,
            'classroom_id' => $classroom_id
        ]);

        return redirect()->back();
    }
    public function deny(Request $request, $id, $user_id, $classroom_id) {

        $user = User::find($user_id);
        $classroom = Classroom::find($classroom_id);

        $notificationUser = ([
            'classroom' => $classroom,
            'reason' => $request->reason
        ]);
        

        $user->notify(new NotificationUser($notificationUser));

        Notification::where('id', $id)->delete();

        return redirect()->back();
    }
}
