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
        User::destroy($id);
        return redirect()->back();
    }

    function typedelete($id){
        TypesOfCourse::destroy($id);
        return redirect()->back();
    }

    function coursedelete($id){
        Course::destroy($id);
        return redirect()->back();
    }
}
