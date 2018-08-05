<?php



/**
 * ---------------------------------------
 * Index
 * ---------------------------------------
 */
Route::get('/', 'IndexController@recent')->name('home');
Route::get('/popular', 'IndexController@popular')->name('index.popular');
 
/**
 * ---------------------------------------
 * Sign Up
 * ---------------------------------------
 */
Route::get('/sign-up', 'SignUpController@show')->name('sign-up.show');
Route::post('/sign-up', 'SignUpController@submit')->name('sign-up.submit')->middleware('auth');

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
Route::post('/posts', 'PostController@store')->name('posts.store')->middleware('auth');
Route::get('/posts/{post}', 'PostController@show')->name('posts.show');
Route::get('/posts/{post}/like', 'PostController@like')->name('posts.like')->middleware('auth');
Route::get('/posts/{post}/unlike', 'PostController@unlike')->name('posts.unlike')->middleware('auth');

/**
 * ---------------------------------------
 * Tag
 * ---------------------------------------
 */
Route::get('/tags/{tag}', 'TagController@show')->name('tags');
Route::get('/tags/{tag}/popular', 'TagController@popular')->name('tags.popular');

/**
 * ---------------------------------------
 * User
 * ---------------------------------------
 */
Route::get('/users/{user}', 'UserController@show')->name('users.show');