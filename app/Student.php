<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['student_id,student_name,student_dob'];

    public function scores()
    {
        return $this->hasMany('App\Score', 'stud_id');
    }
    public function courses()
    {
        return $this->hasMany('App\Course');
    }
}
