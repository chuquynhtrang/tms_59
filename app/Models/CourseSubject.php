<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseSubject extends Model
{
    protected $fillable = ['course_id', 'subject_id'];

    public function course()
    {
    	return $this->belongsTo(Course::class, 'id', 'course_id');
    }

    public function subject()
    {
    	return $this->belongsTo(Subject::class, 'id', 'subject_id');
    }
}
