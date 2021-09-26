<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Course;
use App\Models\TypesOfCourse;
use App\Models\StudentSelection;
use Auth;

class StudentController extends Controller
{
    function show(){
        $courses=Course::where('Active','Active')->get();
        return view('auth.courses',compact('courses'));
    }

    function store(Request $req){      
        date_default_timezone_set('Jamaica');
        $count=DB::table('student_selections')->where('user_id',Auth::user()->id)->count();
        if($count==5){
            return redirect()->back()->with('add_status','Maximum Courses Reached');
        }

        $this->validate($req,[
            'coursename'=>'required'
        ]);
        // dd($req->courseid);
        $scount=DB::table('student_selections')->where('user_id',Auth::user()->id)->where('course_id',$req->coursename)->count();
        if($scount==1){
            return redirect()->back()->with('add_status','Course Alreadly Selected');
        }

        StudentSelection::create([
            'user_id'=>Auth::user()->id,
            'course_id'=>$req->coursename,
            'enroll_dt'=>date("Y-m-d"),
        ]);

        $coursename= Course::find($req->coursename);
        $coursename=$coursename->course_name;
        // dd($coursename);
        return redirect()->back()->with('add_status',$coursename.' Pending');
    }

    function viewselection(){
        $selections=StudentSelection::with('Users')->with('Courses')->get();
        // dd($selections);
        return view('auth.selections',compact('selections'));
    }
}
