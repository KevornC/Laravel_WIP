<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Updatecourse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
       $request->validate([
            'course_name'=>'required | string | unique:courses,course_name',
            'coursetype'=> 'required'
        ]);

        return $next($request);
    }
}
