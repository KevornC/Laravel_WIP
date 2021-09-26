<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Auth;
use Faker\Provider\Address;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\TypesOfCourse;
use App\Models\StudentSelection;
class AdminController extends Controller
{
    public function index(){
        
        if(Auth::user()->is_admin==0 && Auth::user()->Active=='Active'){
            return redirect('/dashboard');
        }

        $user=DB::table('users')->where('is_admin',0)->count();
        $acceptance=DB::table('Student_Selections')->where('is_approved',1)->count();
        $courses=DB::table('courses')->count();
        $types=DB::table('Types_of_courses')->count();
        // dd($courses);
        $recents=StudentSelection::orderby('created_at','desc')->with('Courses')->get();

        return view('admin.index',compact(['user','acceptance','courses','types','recents']));
    }
    public function profile(){

        $userInfo = User::find(Auth::id());

//        dd($userInfo);

        return view("admin.profile",compact('userInfo'));
    }

    public function updateProfile(Request $request){

//        dd($request->all());


        $this->validate($request,[
            'name' => 'required|max:255',
            'tele' => 'required',
        ]);

        User::find(Auth::id())->update([
            'name' => $request->name,
            'tele' => $request->tele,
        ]);

        return redirect()->back()->with('update_status','Update Successful');

    }
}
