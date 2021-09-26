<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSelection extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'enroll_dt',
        'is_approved',
        'Active'
    ];

    function Users (){
        return $this->belongsTo(User::class,'user_id');
    }

    function Courses (){
        return $this->belongsTo(Course::class,'course_id');
    }
}
