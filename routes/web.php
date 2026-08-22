<?php

use App\Http\Controllers\DemoRequestController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\JobOpeningController as AdminJobOpeningController;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::post('/demo-request', [DemoRequestController::class, 'store'])->name('demo.store');
Route::get('/demo-thankyou', fn() => view('demo-thankyou'))->name('demo.thankyou');

// Public section pages
Route::get('/platform', [PublicController::class, 'platform'])->name('platform');
Route::get('/solutions', [PublicController::class, 'solutions'])->name('solutions');
Route::get('/features', [PublicController::class, 'features'])->name('features');
Route::get('/pricing', [PublicController::class, 'pricing'])->name('pricing');
Route::get('/demo', [PublicController::class, 'demo'])->name('demo');
Route::get('/about', [PublicController::class, 'about'])->name('about');
Route::get('/team', [PublicController::class, 'team'])->name('team');
Route::get('/careers', [PublicController::class, 'careers'])->name('careers');
Route::redirect('/jobs', '/careers', 301);
Route::post('/careers/apply', [JobApplicationController::class, 'store'])->name('careers.apply')->middleware('throttle:5,1');
Route::get('/careers/{slug}', [PublicController::class, 'careerJob'])->name('careers.job');
Route::get('/privacy-policy', [PublicController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/voice-search', [PublicController::class, 'voiceSearch'])->name('voice-search');
Route::get('/ai-agent', [PublicController::class, 'aiAgent'])->name('ai-agent');
Route::get('/admin-panel', [PublicController::class, 'adminPanel'])->name('admin-panel');
Route::get('/how-it-works', [PublicController::class, 'howItWorks'])->name('how-it-works');
Route::get('/faq', [PublicController::class, 'faq'])->name('faq');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');

// Public blog routes
Route::get('/blogs', [PublicController::class, 'blogs'])->name('blogs.index');

// Admin Auth
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.post');

// Admin Protected
Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::delete('/requests/{id}', [DashboardController::class, 'destroy'])->name('requests.destroy');

    // Job Applications
    Route::get('/job-applications', [JobApplicationController::class, 'index'])->name('job-applications.index');
    Route::get('/job-applications/{id}/resume', [JobApplicationController::class, 'downloadResume'])->name('job-applications.resume');
    Route::delete('/job-applications/{id}', [JobApplicationController::class, 'destroy'])->name('job-applications.destroy');

    // Blog CRUD
    Route::post('/blogs/upload-image', [AdminBlogController::class, 'uploadImage'])->name('blogs.upload-image');
    Route::resource('blogs', AdminBlogController::class);

    // Job Openings CRUD
    Route::resource('jobs', AdminJobOpeningController::class)->except(['show']);
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

// robots.txt – dynamic so APP_URL is always correct in production
Route::get('/robots.txt', function () {
    $content = "User-agent: *\nDisallow: /admin/\nDisallow: /webhook/\n\nSitemap: " . route('sitemap') . "\n";
    return response($content, 200)->header('Content-Type', 'text/plain');
});

// Sitemap
Route::get('/sitemap.xml', function () {
    $blogs = \App\Models\Blog::where('status', 'published')
        ->orderBy('updated_at', 'desc')
        ->get(['slug', 'updated_at']);

    $openJobs = \App\Models\JobOpening::where('status', 'open')
        ->orderBy('updated_at', 'desc')
        ->get(['slug', 'updated_at']);

    $urls = collect();

    $urls->push(['loc' => url('/'),                    'lastmod' => now()->toDateString(), 'priority' => '1.0', 'changefreq' => 'weekly']);
    $urls->push(['loc' => route('platform'),           'lastmod' => now()->toDateString(), 'priority' => '0.9', 'changefreq' => 'monthly']);
    $urls->push(['loc' => route('solutions'),          'lastmod' => now()->toDateString(), 'priority' => '0.9', 'changefreq' => 'monthly']);
    $urls->push(['loc' => route('features'),           'lastmod' => now()->toDateString(), 'priority' => '0.9', 'changefreq' => 'monthly']);
    $urls->push(['loc' => route('pricing'),            'lastmod' => now()->toDateString(), 'priority' => '0.9', 'changefreq' => 'monthly']);
    $urls->push(['loc' => route('demo'),                'lastmod' => now()->toDateString(), 'priority' => '0.9', 'changefreq' => 'monthly']);
    $urls->push(['loc' => route('about'),               'lastmod' => now()->toDateString(), 'priority' => '0.7', 'changefreq' => 'monthly']);
    $urls->push(['loc' => route('team'),                'lastmod' => now()->toDateString(), 'priority' => '0.6', 'changefreq' => 'monthly']);
    $urls->push(['loc' => route('careers'),             'lastmod' => now()->toDateString(), 'priority' => '0.6', 'changefreq' => 'weekly']);
    $urls->push(['loc' => route('privacy-policy'),      'lastmod' => now()->toDateString(), 'priority' => '0.3', 'changefreq' => 'yearly']);
    $urls->push(['loc' => route('ai-agent'),           'lastmod' => now()->toDateString(), 'priority' => '0.9', 'changefreq' => 'monthly']);
    $urls->push(['loc' => route('admin-panel'),        'lastmod' => now()->toDateString(), 'priority' => '0.8', 'changefreq' => 'monthly']);
    $urls->push(['loc' => route('voice-search'),       'lastmod' => now()->toDateString(), 'priority' => '0.8', 'changefreq' => 'monthly']);
    $urls->push(['loc' => route('how-it-works'),       'lastmod' => now()->toDateString(), 'priority' => '0.8', 'changefreq' => 'monthly']);
    $urls->push(['loc' => route('faq'),                'lastmod' => now()->toDateString(), 'priority' => '0.7', 'changefreq' => 'monthly']);
    $urls->push(['loc' => route('contact'),            'lastmod' => now()->toDateString(), 'priority' => '0.7', 'changefreq' => 'monthly']);
    $urls->push(['loc' => route('blogs.index'),        'lastmod' => $blogs->first()?->updated_at->toDateString() ?? now()->toDateString(), 'priority' => '0.8', 'changefreq' => 'daily']);

    foreach ($blogs as $blog) {
        $urls->push(['loc' => route('blog.show', $blog->slug), 'lastmod' => $blog->updated_at->toDateString(), 'priority' => '0.7', 'changefreq' => 'monthly']);
    }

    foreach ($openJobs as $job) {
        $urls->push(['loc' => route('careers.job', $job->slug), 'lastmod' => $job->updated_at->toDateString(), 'priority' => '0.6', 'changefreq' => 'weekly']);
    }

    $xml = view('sitemap', compact('urls'));
    return response($xml, 200)->header('Content-Type', 'application/xml');
})->name('sitemap');

// Blog detail – must be LAST (catch-all slug)
Route::get('/{slug}', [PublicController::class, 'blogShow'])->name('blog.show')
    ->where('slug', '[a-z0-9][a-z0-9\-]*');
