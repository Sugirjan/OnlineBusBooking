<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Route::get('/', function () {
//    return view('index');
//});

//Route::get('/timetable', function () {
//    return view('timetable');
//});

Route::get('/footer', function () {
    return view('footer');
});

Route::get('/header', function () {
    return view('header');
});

Route::get('/detail', function () {
    return view('detail');
});

Route::get('/booking', function () {
    return view('booking');
});

Route::get('/','route_controller@booking');

//Route::post('/return','route_controller@booking');

Route::post('/timetable','route_controller@showBus');

Route::post('/showSeats','seat_controller@showSeatPage');


Route::post('/register','route_controller@register');

Route::get('/addroute','route_controller@getroute');

Route::post('/addroute','route_controller@insertroute');

Route::get('/addnewbus','route_controller@getnewbus');

Route::post('/addnewbus','route_controller@addnewbus');

Route::get('/a','seat_controller@showseatpage');

Route::post('/seatno','seat_controller@getOccupiedSeats');

Route::get('/lastStep' , function (){
    return view('lastStep');
});

Route::get('/detail' , function (){
    return view('detail');
});

//Route::post('/seatno','seat_controller@getOccupiedSeats');

Route::post('/payment','seat_controller@payment');

Route::post('/end','seat_controller@end');

Route::get('/register' , function (){
    return view('Register');
});

Route::post('/addroute','route_controller@insertroute');

Route::post('/addnewbus','route_controller@addnewbus');

Route::get('/admin','route_controller@getnewtown');//town

Route::post('/addnewtown','route_controller@addnewtown');

Route::post('/','route_controller@getRouteDetails');

Route::post('/updateroute','route_controller@updateRoute');

Route::post('/admin','route_controller@deleteRoute');

Route::post('/busdetails','route_controller@getBusDetails');//search

Route::post('/updatebus','route_controller@updatebus');

Route::post('/deletebus','route_controller@deletebus');

Route::post('/addschedule','route_controller@insertschedule');

Route::get('/admin', 'route_Controller@admin');

Route::post('/activate','UserController@activation');

Route::get('about', [
    'uses'=>'route_controller@getAbout',
    'as'=>'about']);

Route::get('/operator', 'route_Controller@operator');

Route::post('/process_login', 'login_controller@show');
Route::post('/register_inc', 'login_controller@show4');


Route::get('/logout', 'login_controller@show3');
Route::get('/logout' , function (){
    return view('includes/logout');
});

Route::get('/register' , 'route_controller@getRouteDetails');
Route::get('register_success' , function (){
    return view('register_success');
});

Route::get('/operator', 'route_Controller@operator');

