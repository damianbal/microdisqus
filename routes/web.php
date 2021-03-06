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
Route::post('/posts', 'PostController@store')->name('posts.store')->middleware('auth');
Route::get('/posts/{post}', 'PostController@show')->name('posts.show');
Route::get('/posts/{post}/like', 'PostController@like')->name('posts.like')->middleware('auth');
Route::get('/posts/{post}/unlike', 'PostController@unlike')->name('posts.unlike')->middleware('auth');
Route::delete('/posts/{post}', 'PostController@destroy')->name('posts.destroy')->middleware('auth');
Route::get('/posts/{post}/report', 'PostController@report')->name('posts.report')->middleware('auth');
Route::get('/posts/{post}/unreport', 'PostController@unreport')->name('posts.unreport')->middleware('auth');
Route::post('/posts/{post}/remove_image', 'PostController@removeImage')->name('posts.remove_image')->middleware('auth');

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
Route::post('/users/{user}/update', 'UserController@update')->name('users.update')->middleware('auth');
Route::get('/users/{user}/restore_avatar', 'UserController@restoreAvatar')->name('users.restore_avatar')->middleware('auth');

/**
 * ---------------------------------------
 * Admin
 * ---------------------------------------
 */
Route::get('/admin/posts/reported', 'Admin\\ReportedPostsController@index')->name('admin.reported_posts')->middleware('auth');