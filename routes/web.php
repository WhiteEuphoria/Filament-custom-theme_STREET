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

// Home route
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/verify', function () {
    return view('auth.verify');
})->name('verification.notice');

Route::post('/verification/send', function () {
    // Handle verification email sending
    return back()->with('message', 'Verification email sent!');
})->name('verification.send');

Route::get('/documents', function () {
    return view('auth.documents');
})->name('documents.upload');

Route::post('/documents', function () {
    // Handle document upload
    return back()->with('success', 'Documents uploaded successfully! We will review them within 24 hours.');
})->name('documents.submit');

// User Dashboard Routes
Route::get('/dashboard', function () {
    // Mock user data - in a real app this would come from database
    $user = (object) [
        'first_name' => 'I. V.',
        'last_name' => 'Client',
        'country' => 'Spain',
        'date_of_birth' => '1997-04-21',
        'is_verified' => true,
        'balance' => '50,000'
    ];

    return view('user.dashboard', compact('user'));
})->name('dashboard');

Route::get('/withdraw', function () {
    return view('user.withdraw');
})->name('withdraw');

Route::post('/withdraw/card', function () {
    // Handle card withdrawal
    return back()->with('success', 'Card withdrawal request submitted!');
})->name('withdraw.card');

Route::post('/withdraw/iban', function () {
    // Handle IBAN withdrawal
    return back()->with('success', 'IBAN withdrawal request submitted!');
})->name('withdraw.iban');

Route::post('/withdraw/crypto', function () {
    // Handle crypto withdrawal
    return back()->with('success', 'Crypto withdrawal request submitted!');
})->name('withdraw.crypto');

Route::get('/complaint', function () {
    return view('user.complaint');
})->name('complaint.form');

Route::post('/complaint', function () {
    // Handle complaint submission
    return back()->with('success', 'Your complaint has been submitted successfully. We will respond within 48 hours.');
})->name('complaint.submit');

// Admin Routes
Route::get('/admin', function () {
    // Mock admin data
    $user = (object) [
        'full_name' => 'I. V. Client',
        'date_of_birth' => '1997-04-21',
        'country' => 'ES',
        'is_verified' => true,
        'balance' => 50000
    ];

    $stats = [
        'total_users' => '1,234',
        'active_users' => '987',
        'pending_verifications' => '23',
        'total_balance' => '2,456,789'
    ];

    return view('admin.panel', compact('user', 'stats'));
})->name('admin.panel');

Route::post('/admin/update-account', function () {
    // Handle account update
    return back()->with('success', 'Account updated successfully!');
})->name('admin.update-account');
