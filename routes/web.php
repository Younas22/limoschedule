<?php

use App\Http\Controllers\DemoRequestController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DemoRequestController::class, 'index']);
Route::post('/demo-request', [DemoRequestController::class, 'store'])->name('demo.store');
Route::get('/demo-thankyou', fn() => view('demo-thankyou'))->name('demo.thankyou');
