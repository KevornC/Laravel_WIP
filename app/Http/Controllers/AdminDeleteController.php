<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\TypesOfCourse;
use App\Models\StudentSelection;


class AdminDeleteController extends Controller
{
    function studentdelete($id){
        User::find($id)->update([
            'Active'=>'Not Active'
        ]);
        return redirect()->back();
    }

    function typedelete($id){
        
        TypesOfCourse::find($id)->update([
            'Active'=>'Not Active'
        ]);
        Course::where('course_type_id',$id)->update([
            'Active'=>'Not Active'
        ]);
        return redirect()->back();
    }

    function coursedelete($id){
        Course::find($id)->update([
            'Active'=>'Not Active'
        ]);
        return redirect()->back();
    }
}
