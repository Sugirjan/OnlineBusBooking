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

Route::post('/timetable','route_controller@showBus');

Route::post('/showSeats','seat_controller@showSeatPage');

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