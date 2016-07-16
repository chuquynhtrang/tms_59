<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class UserCourse extends Model
{
    protected $table = 'user_courses';
    protected $dates = ['started_date', 'ended_date'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function course()
    {
        return $this->hasOne(Course::class, 'id', 'course_id');
    }

    public function setStartedDateAttribute($date)
    {
        $this->attributes['started_date'] = Carbon::parse('Y-m-d', $date);
    }

    public function getStartedDateAttribute($date)
    {
        return $this->asDateTime($date)->diffForHumans();
    }

    public function setEndedDateAttribute($date)
    {
        $this->attributes['ended_date'] = Carbon::parse('Y-m-d', $date);
    }

    public function getEndedDateAttribute($date)
    {
        return $this->asDateTime($date)->diffForHumans();
    }

}
