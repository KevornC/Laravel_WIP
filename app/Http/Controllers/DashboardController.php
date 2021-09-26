<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){

        if(Auth::user()->is_admin==1 && Auth::user()->Active=='Active'){
            return redirect('/admin/index');
        }elseif(Auth::user()->is_admin==0 && Auth::user()->Active=='Active'){
            return view('auth.dashboard');
        }
        return redirect('/');

    }
}
