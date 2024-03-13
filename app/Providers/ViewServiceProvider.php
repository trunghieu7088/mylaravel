<?php
namespace App\Providers;

use App\Http\View\Composers\StudentComposer;
use App\Http\View\Composers\ComicCategoryComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        View::composer('admin/student/*', StudentComposer::class);    
        //View::composer('admin/comic/*', ComicCategoryComposer::class);    
        View::composer(['admin/comic/create','admin/comic/comic_category','create_comic_ajax'], ComicCategoryComposer::class);    
    }
}