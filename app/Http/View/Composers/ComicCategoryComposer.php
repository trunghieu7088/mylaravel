<?php
namespace App\Http\View\Composers;


use Illuminate\View\View;
use App\Models\ComicCategory;

class ComicCategoryComposer
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
       /* $comic_categories = ComicCategory::where('id','<=',10)
               ->orderBy('name')
               ->take(10)
               ->get();*/
        $comic_categories =ComicCategory::all();
        $view->with('comic_category_composer', $comic_categories);
    }
}