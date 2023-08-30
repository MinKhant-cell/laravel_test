<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('post',\App\Http\Controllers\PostController::class);
Route::post('post/restore/{id}',[\App\Http\Controllers\PostController::class,'restore'])->name('post.restore');
Route::post('post/forceDelete/{id}',[\App\Http\Controllers\PostController::class,'forceDelete'])->name('post.forceDelete');



Route::get('/',function (){
    return view('welcome');
})->name('welcome');




//Route::get('/', function () {
//    $users = [
//        'aa@gmail.com',
//        'bb@gmail.com',
//        'cc@gmail.com',
//        'dd@gmail.com',
//    ];
//    foreach ($users as $user) {
//        Mail::to($user)->later(now()->addMinute(1),new TestMail('Hello,','testing ...........'));
//
//    }
//    return view('welcome');
//});
//
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});
//
//require __DIR__.'/auth.php';
