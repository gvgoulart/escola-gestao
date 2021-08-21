<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'creator_id',
        'teacher_id',
        'theme_id',
        'title',
        'description',
    ];

    public function teacher() {
        return $this->belongsTo('App\Models\User');
    }

    public function theme() {
        return $this->belongsTo('App\Models\Theme');
    }
    public function creator() {
        return $this->belongsTo('App\Models\User');
    }
    public function students() {
        return $this->hasMany('App\Models\ClassroomUser');
    }
}
