<?php

/**
 * ---------------------------------------
 * Index
 * ---------------------------------------
 */
Route::get('/', 'IndexController@index')->name('home');

/**
 * ---------------------------------------
 * Sign Up
 * ---------------------------------------
 */
Route::get('/sign-up', 'SignUpController@show')->name('sign-up.show');
Route::post('/sign-up', 'SignUpController@submit')->name('sign-up.submit');

/**
 * ---------------------------------------
 * Sign In
 * ---------------------------------------
 */
Route::get('/sign-in', 'SignInController@show')->name('sign-in.show');
Route::post('/sign-in', 'SignInController@submit')->name('sign-in.submit');
Route::get('/sign-out', 'SignInController@signOut')->name('sign-out');

/**
 * ---------------------------------------
 * Post
 * ---------------------------------------
 */
Route::post('/posts', 'PostsController@store')->name('posts.store')->middleware('auth');
Route::get('/posts/{post}', 'PostsController@show')->name('posts.show');
Route::get('/posts/{post}/like', 'PostsController@like')->name('posts.like')->middleware('auth');
Route::get('/posts/{post}/unlike', 'PostsController@unlike')->name('posts.unlike')->middleware('auth');
