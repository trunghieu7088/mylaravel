<?php
namespace App\Http\View\Composers;


use Illuminate\View\View;
use App\Models\Student;

class StudentComposer
{
   
   
    protected $users;

    /**
     * Create a new profile composer.
     *
     * @param  \App\Repositories\UserRepository  $users
     * @return void
     */
  //  public function __construct(UserRepository $users)
 //   {
        // Dependencies are automatically resolved by the service container...
       // $this->users = $users;
  //  }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function __construct()
    {
        
    }
    public function compose(View $view)
    {
        $students = Student::where('id','<=',10)
               ->orderBy('name')
               ->take(10)
               ->get();
        $view->with('studentcomp', $students);
    }
}