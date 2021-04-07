<?php

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

Route::get('/gymMembership', 'App\Http\Controllers\GymMembershipController@createNewGymMember')->name("gym.membership");
Route::get('/gymMembership', 'App\Http\Controllers\GymMembershipController@addNewMember')->name("addNewMember");
Route::put('/add-profile-picture/{id}', 'App\Http\Controllers\GymMembershipController@addProfilePicture')->name('add.profile.picture');
Route::post('/gymMembership', 'App\Http\Controllers\ViewAllGymMembers@viewAllGymMembers')->name("view.members");
