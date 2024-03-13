<?php

use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\HieuController;
Route::get('/hieu', [HieuController::class, 'test']);

Route::view('/gau', 'gau');

use App\Http\Controllers\StudentController;
use App\Http\Controllers\ComicController;

Route::middleware(['check-login'])->group(function () {
    
Route::get('/student', [StudentController::class, 'index'])->name('StudentList');

Route::get('/student/create', [StudentController::class, 'create_student'])->name('CreateStudent');
Route::post('/student/save', [StudentController::class, 'save'])->name('SaveStudent');



Route::get('/student/show/{id}',[StudentController::class, 'show'])->name('ShowStudent');
Route::post('/student/edit', [StudentController::class, 'edit'])->name('UpdateStudent');

Route::get('/student/createajax', [StudentController::class, 'create_student_ajax'])->name('CreateStudentAjax');
Route::post('/student/savestudentajax', [StudentController::class, 'savestudentajax'])->name('SaveStudentAjax');

Route::get('/student/store', [StudentController::class, 'store_computer']);

Route::get('/student/computer', [StudentController::class, 'computer']);

Route::get('/comic/list', [ComicController::class, 'comic_list'])->name('ComicList');
Route::get('/comic/create', [ComicController::class, 'create'])->name('CreateComic');
Route::get('/comic/createajax', [ComicController::class, 'create_ajax'])->name('CreateComicAjax');
Route::post('/comic/savecomic',[ComicController::class, 'saveComic'])->name('SaveComic');
Route::post('/comic/savecomicajax',[ComicController::class, 'saveComicAjax'])->name('SaveComicAjax');
Route::get('/comic/delete/{id}',[ComicController::class, 'deleteComic'])->name('DeleteComic');
Route::get('/comic/deleteajax',[ComicController::class, 'deleteComicajax'])->name('DeleteComicAjax');
});
use App\Http\Controllers\UserController;

Route::middleware(['check-authenticated-user'])->group(function () {
Route::get('/login', [UserController::class, 'login'])->name('Login');
Route::post('/authlogin', [UserController::class, 'authlogin'])->name('AuthLogin');
	});

Route::get('/user/create', [UserController::class, 'CreateUser'])->name('CreateUser');
Route::post('/user/saveuser', [UserController::class, 'SaveUser'])->name('SaveUser');



Route::get('/logout', [UserController::class, 'logout'])->name('Logout');

Route::get('/{any}', function () {
    //return view('welcome');
})->middleware('check-comic');