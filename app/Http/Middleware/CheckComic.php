<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use App\Models\Student;

class CheckComic
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
        //$student_item=Student::find($request->any);
        //if(Student::find($request->any)===null)
        //dd($student_item);
        $student_item=Student::where('id',$request->any)->first();
       // dd($student_item);

        //if(empty($student_item))
        if(!Student::where('id',$request->any)->first())
        {           
            return redirect()->route('StudentList');
        }
        else
        {
            return redirect()->route('ShowStudent',['id'=>$request->any]);
        }
    }
}
