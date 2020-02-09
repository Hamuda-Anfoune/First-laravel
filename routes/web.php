<?php

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

// EXPLAINIGN BELOW
// get: type of request
/*
Route::get('/', function () { // the '/' sets the home page
    return view('welcome');
    // return 'Hello world';
});
*/

/*
Route::get('/hello', function () {
    return 'Hello world'; // CAN RETURN STRING
    //return '<h1> Big H1 Text<h1>'; // CAN RETURN HTML
});
*/

// Calling index() from PagesController
Route::get('/', 'PagesController@index'); // the '/' sets the home page

// ABOUT PAGE THE WRONG WAY
/*
Route::get('/about',function(){
    return view('pages.about'); // Returns about page in pages folder
});
*/

// ABOUT PAGE THE RIGHT WAY
Route::get('/about', 'PagesController@about');


// SERVICES PAGE THE RIGHT WAY
Route::get('/services', 'PagesController@services');


// A BASIC API, NEEDS TO CALL A CONTROLLER FUNCTION THO, NOT RETURN FROM HERE!
Route::get('/user/{id}/{name}',function($id, $name){

    return 'ID for user '.$name.' is: '.$id;
});



