<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', fn () => redirect()->route('dashboard'));
Route::get('/login', fn () => view('auth.login'))->name('login');
Route::post('/login', function () { request()->validate(['email'=>'required|email','password'=>'required']); auth()->loginUsingId(1); return redirect()->route('dashboard'); })->name('login.store');
Route::post('/logout', function () { auth()->logout(); request()->session()->invalidate(); return redirect()->route('login'); })->name('logout');
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');
    Route::resource('books', BookController::class);
});
