<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LodgingController;
use App\Http\Controllers\RoomsController;
use App\Mail\Email;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Contracts\Mail\Mailable;


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

Route::get('/', function () {
    return view('test');
});

Route::get('/booking', [BooksController::class, 'store'])->name('booking.form');

Route::post('/index', function (Request $request) {
    // dd($request->all());
    return view('booking.booking', ['request' => $request]);
})->name('booking');

Route::post('/booking', [BooksController::class, 'sendEmail'])->name('send.email');

Route::get('/index', [IndexController::class, 'componentsRoomLodging']);

Route::get('/lodgingRooms/{id}', [LodgingController::class, 'lodgingRoom'])->name('lodging.room');

// Route::get('/testroute', [BooksController::class, 'sendEmail']);

// Route::get('/testroute', function (Request $request) {
//     $email = $request->input('email');

//     Mail::to($email)->send(new Email('Your Application'));

//     return response()->json(['message' => 'Email sent successfully'], 200);
// });

// Route::get('/testroute', function(){
//     $name = "Jm";

//     Mail::to('jemcchi63@gmail.com')->send(new Email($name));
// });

// Route::get('/test', [RoomsController::class, '']);

// Route::get('/lodgingRooms', [LodgingController::class, 'rooms']);
// Route::get('/index/{room_id}', [RoomsController::class, 'roomInfo'])->name('show_info');

// Route::get('/lodgingRooms', [LodgingController::class, 'lodgingRooms']);





