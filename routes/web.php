<?php

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

Route::view('/', 'home.index') ->name('home.index');


$posts = [
    1 => [
        'title' => 'Intro to Laravel',
        'content' => 'This is a short intro to Laravel',
        'is_new' => true,
        'has_comments' => true
    ],
    2 => [
        'title' => 'Intro to PHP',
        'content' => 'This is a short intro to PHP',
        'is_new' => false
    ]
];

Route::get('/posts/{id}', function ($id) use($posts){

    abort_if(!isset($posts[$id]), 404);
    
    return view('posts.show', ['post' =>$posts[$id] ]);
    
})->name('home.posts');

Route::get('/posts', function() use($posts){
    return view('posts.index', ['posts' => $posts]);
});
