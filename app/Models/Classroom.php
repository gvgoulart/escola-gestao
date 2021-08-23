<?php

namespace App\Models;

use Carbon\Carbon;
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
        'date',
        'time'
    ];
    protected $casts = [
        'date' => 'datetime:Y-m-d',
        'time' => 'datetime:H-i-s'
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
    public function setValidateAttributeDate($value) {
        $this->attributes['date'] = Carbon::createFromFormat('m/d/Y', $value)->format('d/m/Y');
    }
    public function getValidateAttributeDate() {
        return Carbon::createFromFormat('m/d/Y')->format('d/m/Y');
    }

    public function setValidateAttributeTime($value) {
        $this->attributes['time'] = Carbon::createFromFormat('Y-m-d H-i-s', $value)->format('H-i-s');
    }
    public function getValidateAttributeTime() {
        return Carbon::createFromFormat('m/d/Y')->format('d/m/Y');
    }
}
