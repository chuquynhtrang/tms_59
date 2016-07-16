<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	protected $fillable = ['name', 'description', 'subject_id'];
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_tasks');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function userTask()
    {
        return $this->hasOne(UserTask::class, 'task_id', 'id');
    }
}
