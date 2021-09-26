<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypesOfCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_type','desc','Active'
    ];

    function Courses(){
        return $this->hasMany(Course::class,'course_type_id');
    }
}
