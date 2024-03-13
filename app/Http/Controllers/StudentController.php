<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Computer;
use App\Models\Comic;


/* declare for form request */
use App\Http\Requests\CreateStudentFormRequest;
use App\Http\Requests\AddStudentFormRequest;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;


use Exception;


class StudentController extends Controller
{
    public function index()
    {
    	//$students = Student::all();
        $students = Student::paginate(10);
    	return view('admin.student.student_list',['students'=>$students]);
    }

   

    public function create_student()
    {       
    	return view('admin.student.create_student');
    }
    public function show($id)
    {
        $student = Student::find($id);
        return view('admin.student.show_student',['student'=>$student]);
    }
    public function edit(CreateStudentFormRequest $request)
    {
        $id=$request->input('id');
        $student = Student::find($id);
        $current_time = date("Y-m-d h:i:s");
        $student->name= $request->input('StudentName');
        $student->class= $request->input('StudentClass');
        $student->updated_at=$current_time;       
        $student->save();
        return redirect()->route('ShowStudent',$id)->with('message', 'edit student successfully !')->with('status','success');
    }
    public function save(CreateStudentFormRequest $request)
    {
    	if ($request->isMethod('post')) 
        {

              $validated = $request->validated();
      	    	$student = new Student;
      	    	$current_time = date("Y-m-d h:i:s");
      	    	$student->name= $request->input('StudentName');
	            $student->class= $request->input('StudentClass');
	            $student->created_at=$current_time;
	            $student->updated_at=$current_time;         
	            $student->save();
	            return redirect()->route('CreateStudent')->with('message', 'Add student successfully !')->with('status','success');    
    	}    	
    	
    }
        public function create_student_ajax()
    {
       
        return view('admin.student.create_student_ajax');
    }
    public function savestudentajax(Request $request)
    {
        if($request->ajax())
       {        

                 $validator = Validator::make($request->all(), [
                        'StudentName' => 'bail|required|max:255|unique:students,name',
                        'StudentClass' => 'bail|required|',
                    ],
                    $messages=
                    [
                        'StudentName.required' => 'Name is required',                        
                        'StudentName.unique' => 'Name already exists',   
                        'StudentClass.required' => 'Class is required',                                             
                    ]
                );
                    if ($validator->stopOnFirstFailure()->fails()) 
                    {        
                        $errors = $validator->errors();
                        if($errors->has('StudentName'))
                        {
                            $ErrMessage=$errors->first('StudentName');
                        }
                        else
                        {
                            $ErrMessage=$errors->first('StudentClass');   
                        }                
                        return response()->json(['error'=>$ErrMessage,200]);
                    } 
                $student = new Student;
                $current_time = date("Y-m-d h:i:s");
                $student->name= $request->input('StudentName');
                $student->class= $request->input('StudentClass');
                $student->created_at=$current_time;
                $student->updated_at=$current_time;         
                $student->save();
                $msg='success';
                return response()->json(array('message'=> $msg), 200); 
        }
    }
    public function computer()
    {
        $computer=Student::whereRaw('json_extract(content,"$.name")','=','Asus 107');
        //var_dump($computer);
       // echo $computer->id;
        echo Student::whereRaw('json_extract(content,"$.name")','=','Asus 107')->toSql();
    }
    public function store_computer()
    {
        
      /* $content='{"name":"Asus 107","version" : "16.0.1","license" : "commercial","color" : "black"}';
         $computer = new Computer;            
         //$computer->content=json_encode($content);
         $computer->content=$content;
         $computer->status=5;
         $computer->save(); 
        */
        $comp = DB::table('computers')
                ->whereJsonContains('content->name', 'Asus 107')
                ->get();
         var_dump($comp);
         echo '<br>';
         //$comp2 = Computer::whereJsonContains('content->name', 'Asus 107');
         //var_dump($comp2);
         echo '<br>';
          $computer = Computer::find(10);          
          echo '<br>';
          echo '<br>';
          echo '<br>';
          $content=json_decode($computer->content); 
               
               var_dump($content);

          echo '<br>';
          echo $content->name; 
          echo '<br>';
         // var_dump($computer->toJson(JSON_PRETTY_PRINT));
          echo '<br>';
        // var_dump($computer->toJson());
          echo $computer->full_content->name;
           echo '<br>';
            echo $computer->full_status;   
            echo '<br>';
             echo '<br>';

              $student = Student::find(10);
              echo $student->name; 

    }

}
