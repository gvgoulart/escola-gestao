<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationRequirement extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'classroom_id',
    ];

    public function student() {
        return $this->hasMany('App\Models\User');
    }
    public function classroom() {
        return $this->hasMany('App\Models\Classroom');
    }
}
