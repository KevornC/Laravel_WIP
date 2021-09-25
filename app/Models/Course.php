<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_name', 'course_type_id'
    ];

    function TypesOfCourses(){
        return $this->belongsTo(TypesOfCourses::class,'id);
    }
}
