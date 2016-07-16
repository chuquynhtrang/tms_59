<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'user_courses')->withPivot('status', 'started_date', 'ended_date');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'user_subjects')->withPivot('status', 'started_date', 'ended_date');
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'user_tasks');
    }

    public function userSubjects()
    {
        return $this->hasMany(UserSubject::class, 'user_id', 'id');
    }

    public function userCourses()
    {
        return $this->hasMany(UserCourse::class, 'user_id', 'id');
    }

    /**
     * [isAdmin description]
     * @return boolean [description]
     */
    public function isAdmin()
    {
        return $this->role == config('user.roles.admin');
    }

    /**
     * [isUser description]
     * @return boolean [description]
     */
    public function isUser()
    {
        return $this->role == config('user.roles.user');
    }

    /**
     * [getRoleOptions description]
     * @return [type] [description]
     */
    public static function getRoleOptions()
    {
        $results = [];

        foreach (config('user.roles') as $key => $value) {
            $results[$value] = trans('user.role_type.' . $key) ;
        }

        return $results;
    }

    public function avatar(){
        return config('user.path_to_avatar') . $this->avatar;
    }
}
