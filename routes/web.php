<?php

use App\Http\Controllers\DemoRequestController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BlogController;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [DemoRequestController::class, 'index']);
Route::post('/demo-request', [DemoRequestController::class, 'store'])->name('demo.store');
Route::get('/demo-thankyou', fn() => view('demo-thankyou'))->name('demo.thankyou');

// Admin Auth
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.post');

// Admin Protected
Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::delete('/requests/{id}', [DashboardController::class, 'destroy'])->name('requests.destroy');

    // Blog CRUD
    Route::post('/blogs/upload-image', [BlogController::class, 'uploadImage'])->name('blogs.upload-image');
    Route::resource('blogs', BlogController::class);
});

// Webhook – publish scheduled posts (called every hour via cron/external scheduler)
Route::get('/webhook/publish-scheduled', function (Request $request) {
    $secret = env('WEBHOOK_TOKEN', 'limoschedule-webhook-2026');
    if ($request->query('token') !== $secret) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }
    $count = Blog::where('status', 'scheduled')
        ->where('published_at', '<=', now())
        ->update(['status' => 'published']);
    return response()->json([
        'message'   => "Published {$count} scheduled post(s).",
        'count'     => $count,
        'timestamp' => now()->toDateTimeString(),
    ]);
})->name('webhook.publish');
