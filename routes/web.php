<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/test', function () {
    return view('test');
})->name('test');




// Simple route for the booking page
Route::get('/booking', function () {
    return view('booking'); // Ensure you have a 'book_now.blade.php' in resources/views
})->name('booking');
;

Route::get('/shop_now', function () {
    return view('shop_now');
})->name('shop_now');

Auth::routes(); // Registers the routes for login, registration, and logout

// Additional routes
Route::get('/about', function () {
    return view('about'); // Create a view named 'about.blade.php'
})->name('about');

Route::get('/login', function () {
    return view('login'); // Create a view named 'about.blade.php'
})->name('login');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/index', function () {
    return view('index'); // Create an 'index.blade.php' for your homepage
})->name('index');



use Illuminate\Support\Facades\Auth;

Auth::routes();

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Register Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

