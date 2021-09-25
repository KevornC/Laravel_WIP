<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\TypesOfCourse;

class AdminViewsController extends Controller
{
    function studentindex(){
        $students=User::where('is_admin',0)->get();
        // dd($students);
        return view('admin.students',compact('students'));
    }
    //Add Course Type 

    function addcoursetypeindex(){
        $coursetype=TypesOfCourse::all();

        return view('admin.addcoursetype', compact('coursetype'));
    }

    function addcoursetypeindexstore(Request $req){
        
        $this->validate($req,[
            'coursetype'=>'required | string | unique:types_of_courses,course_type',
            'desc'=> 'required | string'
        ]);

        TypesOfCourse::create([
            'course_type'=>$req->coursetype,
            'desc'=>$req->desc
        ]);

        return redirect()->back()->with('add_status',$req->coursetype." Added");
    }


    //Add Course 

    function addcoursesindex(){
        $coursetype=TypesOfCourse::all();

        return view('admin.addcourses', compact('coursetype'));
    }

    function addcoursesindexstore(Request $req){
        $this->validate($req,[
            'course_name'=>'required | string | unique:types_of_courses,course_type',
            'courseid'=> 'required'
        ]);
        dd($req->coursename);

        Course::create([
            'course_name'=>$req->coursename,
            'course_type_id'=>$req->courseid
        ]);

        return redirect()->back()->with('add_status',$req->coursename.'Course Added');
    }

//Update courses
    function updatecourseindex(){
        $courses=Course::all();

        return view('admin.Courses', compact('courses'));
    }
    function updatecoursesindex($id){
        $courses=Course::find($id);

        return view('admin.updatecourses', compact('courses'));
    }

    function updatecoursesindexstore(Request $req){
        $this->validate($req,[
            'course_name'=>'required | string',
            'courseid'=> 'required'
        ]);

        Course::find($req->id)->update([
            'course_name'=>$req->coursename,
            'course_type_id'=>$req->courseid
        ]);

        return redirect()->back()->with('update_status',$req->coursename.'Course Updated');
    }


}
