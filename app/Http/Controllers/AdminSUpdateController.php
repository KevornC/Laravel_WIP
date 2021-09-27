<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\TypesOfCourse;
use App\Models\StudentSelection;

use Auth;

class AdminSUpdateController extends Controller
{
    function show($id){
    $student=User::find($id);

        return view('admin.updatestudent',compact('student'));
    }

    public function store(Request $request) {
        $this->validate($request,[
           'name' => 'required|max:255',
           'email' => 'required|email',
           'tele' => 'required',
        ]);

        User::find($request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'tele' => $request->tele,
            'Active'=>$request->studentstatus
        ]);

        return redirect()->back()->with('update_status',$request->name." data updated");
        }

        //Course Type

        function viewtype(){
            $coursetypes=TypesOfCourse::all();
    
            return view('admin.coursetype',compact('coursetypes'));
        }
        function showtype($id){
        $ctype=TypesOfCourse::find($id);
    
            return view('admin.updatecoursetype',compact('ctype'));
        }
        
        public function storetype(Request $req) {
            $this->validate($req,[
                'coursetype' => 'required | string ',
                'desc'       => 'required | string'
            ]);
    
            TypesOfCourse::find($req->id)->update([
                'course_type'=>$req->coursetype,
                'desc'=>$req->desc,
                'Active'=>$req->coursetypestatus
            ]);
            Course::where('course_type_id',$req->id)->update([
                'Active'=>'Active'
            ]);
    
            return redirect()->back()->with('update_status',$req->coursetype." data updated");
            }


            //selections

            function selection(){
                $selections=StudentSelection::with('Users')->with('Courses')->get();
                // dd($selections);
                return view('admin\selections',compact(['selections']));
            }

            function approved($id){
                // dd($id);
                StudentSelection::find($id)->update(['is_approved'=>1]);
                
                return redirect()->back()->with('approved_status',"Approved");

            }
            function rejected($id){
                StudentSelection::find($id)->update(['is_approved'=>2]);
                // dd($id);
                return redirect()->back()->with('rejected_status',"Rejected");

            }


}
