<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Taskcontroller;


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



Route::get('/about', function(){
    $name = 'ahmed';
return view('about' , compact('name'));
});

Route::post('/store' , function(){
    $name= request('name');
   return view ('about',compact('name'));
});

// Route::get('tasks', function(){
//     $tasks = [
//         'task1',
//         'task2',
//         'task3'


//     ];
//     return view ('tasks', compact ('tasks'));

// });


Route::get('tasks', [Taskcontroller::class , 'index'])->name ('tasks.index');
    

Route ::get('/tasks/{id}' , [Taskcontroller::class , 'show'])->name('tasks.show') ;

Route::post('store', [Taskcontroller::class , 'store'])->name ('tasks.store');
Route::put('edit/{id}', [Taskcontroller::class , 'edit'])->name ('tasks.edit');
Route::put('update/{id}', [StudentController::class, 'update']);
Route::post('delete/{id}', [StudentController::class, 'delete ']);





   

  