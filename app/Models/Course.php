<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_name', 'course_type_id','Active'
    ];

    function TypesOfCourses(){
        return $this->belongsTo(TypesOfCourse::class,'course_type_id');
    }
}
