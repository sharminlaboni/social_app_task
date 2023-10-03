<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

use APP\Models\Post;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[HomeController::class,'homepage']);


//  Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home',[Homecontroller::class,'index'])->middleware(['auth','verified'])->name('home');
Route::get('/post',[HomeController::class,'post'])->middleware(['auth', 'admin']);
//post
Route::get('/post_index',[PostController::class,'postindex'])->name('post_index');
Route::get('/create_post',[PostController::class,'create'])->name('postcreate');
Route::post('/store_post',[PostController::class,'poststore'])->name('poststore');
Route::get('/{id}/post_show',[PostController::class, 'postshow'])->name('postshow');
Route::get('/{id}/post_edit',[PostController::class, 'postedit'])->name('postedit');
Route::patch('/{id}/post_update',[PostController::class, 'postupdate'])->name('postupdate');
Route::delete('/{id}/post_destroy',[PostController::class, 'postdestroy'])->name('postdestroy');
//login
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('/{id}/post_details',[HomeController::class, 'post_details'])->name('postdetail');
Route::get('/my_post',[HomeController::class, 'my_post'])->name('mypost');
//comment
Route::get('/comment_index',[HomeController::class,'commentindex'])->name('comment_index');
Route::get('/comment_create',[HomeController::class,'commentcreate'])->name('commentcreate');
Route::post('/save-comment',[HomeController::class,'save_comment'])->name('save_comment');

//frontend
Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});


Route::get('/blog', function () {
    return view('blog');
});