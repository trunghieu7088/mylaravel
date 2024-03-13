<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class HieuController extends Controller
{
    public function test()
    {
      $products = '["laptop","earphones","mouse"]';
	  $result = json_decode($products);
	  //echo $result[0];
	  $hello='hello';
	  $data['hello']='hello';
	  $name='hello 2';
	  $age=10;
	 //if (View::exists('test')) 
	 // {
    	//return view('test',$data);
	  	//return view('test', compact('name', 'age'));
    	//return view('test', ['name' => $result]);

	 // }

	return view('admin.student.create_student');
	
    }
}
