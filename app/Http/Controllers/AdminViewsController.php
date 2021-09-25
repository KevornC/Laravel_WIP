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

    function courseindex(){
        $courses=Course::with('TypesOfCourses')->get();
        // dd($courses);
        return view('admin.Courses', compact(['courses']));
    }

    function addcoursesindex(){
        $coursetype=TypesOfCourse::all();

        return view('admin.addcourses', compact('coursetype'));
    }

    function addcoursesindexstore(Request $req){
        // dd($req->coursename);
        $this->validate($req,[
            'course_name'=>'required | string | unique:courses,course_name',
            'courseid'=> 'required'
        ]);
        

        Course::create([
            'course_name'=>$req->coursename,
            'course_type_id'=>$req->courseid
        ]);

        return redirect()->back()->with('add_status',$req->coursename.' Course Added');
    }

//Update courses
    function updatecoursesindex($id){
        $course=Course::where('id',$id)->with('TypesOfCourses')->first();
        // dd($course);
        $types=TypesOfCourse::all();

        return view('admin.updatecourses', compact(['course','types']));
    }

    function updatecoursesindexstore(Request $req){
        // dd($req->coursetype);
        $req->validate([
            'course_name'=>'required | string | unique:courses,course_name',
            'coursetype'=> 'required'
        ]);
        
        Course::find($req->id)->update([
            'course_name'=>$req->coursename,
            'course_type_id'=>$req->coursetype
        ]);

        return redirect()->back()->with('update_status',$req->coursename.' Course Updated');
    }


}
