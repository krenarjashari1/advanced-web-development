<?php

use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::post('/gymMembership', 'App\Http\Controllers\GymMembershipController@createNewGymMember')->name('gym.membership');

Route::get('/addGymMember', function (){
    return view('addGymMember');
})->middleware(['auth'])->name('addGymMember');

Route::get('/viewGymMembers', function (){
    return view('viewGymMembers');
})->middleware(['auth'])->name('viewGymMembers');


Route::delete('/deleteGymMembers/{id}','App\Http\Controllers\GymMembershipController@deleteGymMember' )->name('deleteGymMembers');
Route::post('/editGymMembers','App\Http\Controllers\GymMembershipController@editGymMembers' )->name('editGymMembers');



Route::get('/dispatch-queue/{delayMinute}',[\App\Http\Controllers\GymMembershipController::class,'startQueue']);

Route::get('/send-email/{delaySeconds}',[\App\Http\Controllers\GymMembershipController::class, 'sendEmail']);

Route::prefix('mail')->group(function (){
    Route::get('/',[MailController::class, 'index'])->name('mail.index');
    Route::post('/',[MailController::class,'sendMail'])->name('mail.sendMail');
    Route::get('/send-html/{name}/{email}',[MailController::class,'sendHtmlMail'])->name('mail.send-hmtl');
});
