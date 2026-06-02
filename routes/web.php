<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ShortUrlController;

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware(['auth'])->group(function () {

    Route::resource('companies', CompanyController::class);

});


Route::get('/invitations',[InvitationController::class,'index'])->name('invitations.index');
Route::get('/invitations/create',[InvitationController::class,'create'])->name('invitations.create');
Route::post('/invitations/store',[InvitationController::class,'store'])->name('invitations.store');
Route::get('/invite/{token}',[InvitationController::class,'accept'])->name('invite.accept');
Route::post('/invite/{token}',[InvitationController::class,'register'])->name('invite.register');
Route::get('/companies/{company}/invite-admin',[InvitationController::class,'inviteAdmin'])->name('companies.invite-admin');

Route::get('/dashboard',[DashboardController::class,'index'])->middleware('auth')->name('dashboard');

Route::middleware(['auth'])->group(function(){

    Route::get('/members',[MemberController::class,'index'])->name('members.index');
    Route::get('/members/create',[MemberController::class,'create'])->name('members.create');
    Route::post('/members/store',[MemberController::class,'store'])->name('members.store');

});

Route::resource('short-urls',ShortUrlController::class);
Route::get('/short-urls',[ShortUrlController::class,'index'])->name('short-urls.index');
Route::get('/short-urls/create',[ShortUrlController::class,'create'])->name('short-urls.create');
Route::post('/short-urls/store',[ShortUrlController::class,'store'])->name('short-urls.store');
Route::get('/s/{code}',[ShortUrlController::class,'redirect'])->name('short-urls.redirect');

// Route::get('/test-mail', function(){

//     Mail::raw(
//         'Laravel SMTP Working',
//         function($message){

//             $message->to('bansalrahul8877@gmail.com')
//                     ->subject('SMTP Test');

//         }
//     );

//     return 'Mail Sent';
// });
