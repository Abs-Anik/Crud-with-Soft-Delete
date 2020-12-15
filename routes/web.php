<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

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

Route::get('/create', function () {
   Post::create([
    'post_name' => 'Post Three',
    'description' =>'lorem ipsum dolar sit',
    'is_active' =>1
   ]);
    
});

Route::get('/update', function () {
   $update = Post::find(1);

   $update->post_name = "Post one updated";
   $update->description = "lorem ipsum dolar sit updated";
   $update->is_active = 1;
   $update->update();
     
 });

 Route::get('/delete', function () {
    $delete = Post::find(4);
    $delete->delete();
    return "success";
      
  });

//   Route::get('/delete', function () {
//     Post::destroy([3,2]);  //multiple id delete
//     Post::destroy(3);  //single id delete
//     return "success";
      
//   });

//soft delete remove from frontend add deleted value in deleted_at
Route::get('/softDelete', function () {
    Post::find(3)->delete();
      
});

//Show all post
// Route::get('/posts', function () {
//   $post =   Post::all();

//     dd($post);     
// });

//show single all data
// Route::get('/posts', function () {
//       $post =   Post::find(2);
    
//         dd($post);     
// });

//trashed  with all data

// Route::get('/posts', function () {
//     $post =   Post::withTrashed()->get();
  
//       dd($post);     
// });

// show only all deleted or trashed data

// Route::get('/posts', function () {
//     $post =   Post::onlyTrashed()->get();
  
//       dd($post);     
// });

//Show all data description from posts table

Route::get('/findPosts', function () {
    $posts =   Post::all();
    foreach($posts as $post){
      echo $post->description."<br/>";
    }     
});

// soft deleted data restore
Route::get('/restore', function () {
  Post::onlyTrashed()->find(3)->restore();    
});

//force delete without soft delete

// Route::get('/forceDelete', function () {
//   Post::find(2)->forceDelete();    
// });

//force delete with soft delete

Route::get('/forceDelete', function () {
  Post::onlyTrashed()->find(3)->forceDelete();     
});