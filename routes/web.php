<?php

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

/**
 * ---------------------------------------
 * Post
 * ---------------------------------------
 */
Route::post('/posts', 'PostsController@store')->name('posts.store');
Route::get('/posts/{post}', 'PostsController@show')->name('posts.show');
