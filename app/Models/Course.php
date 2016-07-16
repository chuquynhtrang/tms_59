<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'description'];
    
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_courses');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'course_subjects');
    }

    public function userCourse()
    {
        return $this->hasOne(UserCourse::class, 'course_id', 'id');
    }
}
