@extends('layouts.public')

@push('styles')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@graph": [
        {
            "@@type": "Organization",
            "@@id": "{{ url('/') }}#organization",
            "name": "LimoSchedule",
            "url": "{{ url('/') }}",
            "logo": "{{ url('public/logo/logo-white.png') }}"
        },
        {
            "@@type": "WebSite",
            "@@id": "{{ url('/') }}#website",
            "name": "LimoSchedule",
            "url": "{{ url('/') }}",
            "publisher": { "@@id": "{{ url('/') }}#organization" }
        },
        {
            "@@type": "SoftwareApplication",
            "name": "LimoSchedule",
            "url": "{{ route('platform') }}",
            "applicationCategory": "BusinessApplication",
            "operatingSystem": "Web",
            "image": "{{ url('public/assets/images/hero/hero-luxury-dashboard.jpg') }}",
            "description": "White-label limo, black car, taxi and chauffeur booking software with a booking website, customer panel, driver panel and admin dashboard.",
            "offers": {
                "@@type": "Offer",
                "price": "1999",
                "priceCurrency": "USD",
                "availability": "https://schema.org/InStock"
            },
            "publisher": { "@@id": "{{ url('/') }}#organization" }
        },
        {
            "@@type": "FAQPage",
            "mainEntity": [
                { "@@type": "Question", "name": "Does the $1,999 license include all four panels, or are they sold separately?", "acceptedAnswer": { "@@type": "Answer", "text": "All four panels — the booking website, customer portal, driver panel and admin dashboard — are included in the single $1,999 one-time license. There's no separate tier or add-on fee for any of them." } },
                { "@@type": "Question", "name": "How does a booking move from the website to a driver?", "acceptedAnswer": { "@@type": "Answer", "text": "A customer books on the branded website, the booking appears in the admin dashboard, admin assigns it to a driver, the driver completes the pickup from the driver panel, and the completed ride is recorded automatically — no manual re-entry at any step." } },
                { "@@type": "Question", "name": "Can I use my own domain with the booking website?", "acceptedAnswer": { "@@type": "Answer", "text": "Yes. LimoSchedule is white-label, so the booking website runs on your own domain with your logo and colors — customers and drivers never see LimoSchedule branding." } }
            ]
        }
    ]
}
</script>
@endpush

@section('content')

<!-- ═══════════════════════════════════════════════════════════════
     HERO
═══════════════════════════════════════════════════════════════ -->
<section class="relative overflow-hidden" style="background: #030303;">
@php
    $breadcrumbs = [
        ['label' => 'Home', 'url' => url('/')],
        ['label' => 'Platform', 'url' => null],
    ];
@endphp
@include('partials._breadcrumbs')


    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.03) 1px, transparent 1px); background-size: 56px 56px;"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[500px] pointer-events-none" style="background: radial-gradient(ellipse at 50% 0%, rgba(59,130,246,0.12) 0%, transparent 70%);"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 pt-24 pb-16 lg:pt-32 lg:pb-24">
        <div class="grid grid-cols-1 lg:grid-cols-[1fr_1fr] gap-14 lg:gap-16 items-center">

            <!-- Copy -->
            <div class="text-center lg:text-left">
                <div class="inline-flex items-center gap-2 mb-6 px-4 py-1.5 rounded-full" style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.25);">
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l2.4 6.6L21 10l-5 4.6L17.4 21 12 17.4 6.6 21 8 14.6 3 10l6.6-1.4L12 2z"/></svg>
                    <span class="text-blue-400 text-[11px] font-bold tracking-[0.16em] uppercase">White-Label Transportation Platform</span>
                </div>

                <h1 class="text-white text-4xl sm:text-5xl lg:text-[54px] font-black tracking-tight leading-[1.05] mb-6">
                    One Platform. Your Entire Transportation Business.
                </h1>

                <p class="text-gray-400 text-[17px] sm:text-[18px] leading-relaxed max-w-xl mx-auto lg:mx-0 mb-9">
                    Manage bookings, customers, drivers and daily operations with a complete white-label platform built for transportation businesses.
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-3">
                    <a href="{{ route('demo') }}"
                       class="btn-cta btn-primary w-full sm:w-auto">
                        <span>Book a Demo</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                    <a href="https://wa.me/923460820722?text=Hi%2C%20I%27m%20interested%20in%20LimoSchedule%27s%20white-label%20platform.%20Can%20I%20talk%20to%20an%20expert%3F" target="_blank" rel="noopener"
                       class="btn-outline w-full sm:w-auto">
                        <span>Talk to an Expert</span>
                    </a>
                </div>
            </div>

            <!-- Product visual -->
            <div class="relative">
                <div class="rounded-2xl overflow-hidden" style="border: 1px solid rgba(59,130,246,0.25); box-shadow: 0 30px 90px rgba(0,0,0,0.6), 0 0 60px rgba(59,130,246,0.1);">
                    <img
                        src="{{ asset('public/assets/images/hero/hero-luxury-dashboard.jpg') }}?v={{ filemtime(public_path('assets/images/hero/hero-luxury-dashboard.jpg')) }}"
                        alt="LimoSchedule white-label transportation booking platform admin dashboard with a luxury chauffeur vehicle"
                        width="1672" height="941"
                        class="w-full h-auto block"
                        loading="eager" fetchpriority="high" decoding="sync">
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     PLATFORM OVERVIEW
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-28 overflow-hidden" style="background: #060606;">
    <div class="relative z-10 max-w-4xl mx-auto px-5 sm:px-6 lg:px-8 text-center">

        <div class="inline-flex items-center gap-2 mb-5 px-4 py-1.5 rounded-full" style="background: rgba(59,130,246,0.07); border: 1px solid rgba(59,130,246,0.2);">
            <span class="text-[11px] font-bold tracking-[0.14em] uppercase text-blue-400">The Complete Ecosystem</span>
        </div>

        <h2 class="text-4xl sm:text-5xl font-black tracking-tight leading-[1.1] mb-7 text-white">
            Everything Your Transportation Business Needs &mdash; In One Platform
        </h2>

        <!-- Equation -->
        <div class="inline-flex flex-wrap items-center justify-center gap-x-3 gap-y-3 mb-8 text-[14px] sm:text-[15px] font-bold">
            <span class="px-4 py-2 rounded-xl text-white" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(59,130,246,0.2);">Booking Website</span>
            <span class="text-blue-500 text-[18px]">+</span>
            <span class="px-4 py-2 rounded-xl text-white" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(59,130,246,0.2);">Customer Panel</span>
            <span class="text-blue-500 text-[18px]">+</span>
            <span class="px-4 py-2 rounded-xl text-white" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(59,130,246,0.2);">Driver Panel</span>
            <span class="text-blue-500 text-[18px]">+</span>
            <span class="px-4 py-2 rounded-xl text-white" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(59,130,246,0.2);">Admin Dashboard</span>
            <span class="text-gray-500 text-[18px]">=</span>
            <span class="px-4 py-2 rounded-xl text-white" style="background: rgba(59,130,246,0.14); border: 1px solid rgba(59,130,246,0.4);">Complete Transportation Booking Platform</span>
        </div>

        <p class="text-gray-400 text-[16px] leading-relaxed max-w-2xl mx-auto">
            LimoSchedule brings your booking website, customer experience, driver operations and business management together &mdash; so limo, black car, taxi and chauffeur companies can run their entire operation from one connected system, instead of stitching together separate tools.
        </p>
        <p class="text-gray-500 text-[14px] mt-5">
            See how it all fits together in our <a href="{{ route('how-it-works') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">How It Works guide</a>.
        </p>

    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     BOOKING WEBSITE
═══════════════════════════════════════════════════════════════ -->
<article aria-labelledby="booking-website-heading">
<section class="relative py-20 lg:py-28 overflow-hidden" style="background: #0A0A0A;">
    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.025) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.025) 1px, transparent 1px); background-size: 56px 56px;"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-[1fr_1.1fr] gap-12 lg:gap-16 items-center">

            <div class="text-center lg:text-left">
                <div class="text-[11px] font-bold tracking-[0.14em] uppercase text-blue-400 mb-4">Booking Website</div>
                <h2 id="booking-website-heading" class="text-3xl sm:text-4xl font-black tracking-tight leading-[1.15] mb-5 text-white">
                    A Branded Booking Website That Converts Visitors Into Rides
                </h2>
                <p class="text-gray-400 text-[16px] leading-relaxed mb-4 max-w-lg mx-auto lg:mx-0">
                    Your customers book directly from a professional, branded booking website &mdash; no app download, no phone tag. Every booking flows straight into your admin dashboard and driver panel automatically.
                </p>
                <p class="text-gray-500 text-[14px] leading-relaxed mb-8 max-w-lg mx-auto lg:mx-0">
                    For example, an airport transfer customer gets an instant fare quote and confirmation at 2 AM, with the trip already assigned and visible to a driver before your team opens for the day.
                </p>

                <ul class="grid grid-cols-2 gap-3 max-w-md mx-auto lg:mx-0 text-left mb-6">
                    <li class="flex items-center gap-2"><svg class="flex-shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] text-gray-300">Advanced Booking</span></li>
                    <li class="flex items-center gap-2"><svg class="flex-shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] text-gray-300">Fare Calculator</span></li>
                    <li class="flex items-center gap-2"><svg class="flex-shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] text-gray-300">Mobile Responsive</span></li>
                    <li class="flex items-center gap-2"><svg class="flex-shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] text-gray-300">Multi-Language</span></li>
                    <li class="flex items-center gap-2"><svg class="flex-shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] text-gray-300">Multi-Currency</span></li>
                    <li class="flex items-center gap-2"><svg class="flex-shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] text-gray-300">White-Label Branding</span></li>
                </ul>

                <a href="{{ route('website-features') }}" class="inline-flex items-center gap-1.5 text-[13.5px] font-semibold text-blue-400 hover:text-blue-300 transition-colors duration-200">
                    Explore all booking website features
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>

            <!-- Visual -->
            <div class="max-w-md mx-auto lg:max-w-none">
                <div class="rounded-2xl overflow-hidden" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(59,130,246,0.2); box-shadow: 0 30px 90px rgba(0,0,0,0.5), 0 0 50px rgba(59,130,246,0.08);">
                    <div class="flex items-center gap-2 px-4 py-3" style="border-bottom: 1px solid rgba(255,255,255,0.08);">
                        <span class="w-2.5 h-2.5 rounded-full" style="background: rgba(239,68,68,0.6);"></span>
                        <span class="w-2.5 h-2.5 rounded-full" style="background: rgba(234,179,8,0.6);"></span>
                        <span class="w-2.5 h-2.5 rounded-full" style="background: rgba(34,197,94,0.6);"></span>
                        <div class="ml-2 flex-1 flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-[10.5px] text-gray-500" style="background: rgba(255,255,255,0.04);">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
                            yourcompany.com
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-5">
                            <div class="flex items-center gap-2">
                                <span class="w-7 h-7 rounded-md" style="background: #3B82F6;"></span>
                                <span class="text-white font-bold text-[14px]">Your Brand</span>
                            </div>
                            <span class="text-[9.5px] font-semibold text-gray-500 uppercase tracking-wide">Booking Website</span>
                        </div>
                        <div class="grid grid-cols-2 gap-3 mb-3">
                            <div class="rounded-lg px-3 py-2.5 text-[11px] text-gray-500" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.09);">Pickup Location</div>
                            <div class="rounded-lg px-3 py-2.5 text-[11px] text-gray-500" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.09);">Drop-off Location</div>
                        </div>
                        <div class="grid grid-cols-2 gap-3 mb-4">
                            <div class="rounded-lg px-3 py-2.5 text-[11px] text-gray-500" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.09);">Date &amp; Time</div>
                            <div class="rounded-lg px-3 py-2.5 text-[11px] text-gray-500" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.09);">Vehicle Type</div>
                        </div>
                        <div class="w-full rounded-lg text-center text-[12.5px] font-semibold text-white py-3" style="background: #3B82F6;">Get Instant Fare &rarr;</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
</article>

<!-- ═══════════════════════════════════════════════════════════════
     CUSTOMER PANEL
═══════════════════════════════════════════════════════════════ -->
<article aria-labelledby="customer-panel-heading">
<section class="relative py-20 lg:py-28 overflow-hidden" style="background: #060606;">
    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-[1.1fr_1fr] gap-12 lg:gap-16 items-center">

            <!-- Visual -->
            <div class="max-w-sm mx-auto lg:max-w-none lg:order-1 order-2">
                <div class="rounded-2xl p-6" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(59,130,246,0.2); box-shadow: 0 30px 90px rgba(0,0,0,0.5), 0 0 50px rgba(59,130,246,0.08);">
                    <div class="flex items-center gap-2.5 mb-5">
                        <span class="w-9 h-9 rounded-lg flex items-center justify-center flex-shrink-0" style="background: rgba(59,130,246,0.12); border:1px solid rgba(59,130,246,0.25);">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        </span>
                        <span class="text-[11px] font-semibold text-gray-400 uppercase tracking-wide">Upcoming Ride</span>
                    </div>
                    <div class="text-[13px] text-gray-300 leading-snug mb-1.5">May 15 &middot; 10:30 AM</div>
                    <div class="text-[13px] text-gray-500 leading-snug mb-3">JFK Airport &rarr; Manhattan, NY</div>
                    <span class="inline-block px-2.5 py-1 rounded text-[10px] font-semibold mb-5" style="background: rgba(59,130,246,0.12); color:#60a5fa;">Executive Sedan</span>
                    <div class="pt-4" style="border-top: 1px solid rgba(255,255,255,0.07);">
                        <div class="text-[11px] font-semibold text-gray-400 uppercase tracking-wide mb-3">Trip History</div>
                        <div class="flex items-center justify-between text-[12px] text-gray-500 mb-2"><span>May 10 &middot; Manhattan &rarr; JFK</span><span class="text-gray-600">$120</span></div>
                        <div class="flex items-center justify-between text-[12px] text-gray-500"><span>Apr 28 &middot; Manhattan &rarr; LGA</span><span class="text-gray-600">$95</span></div>
                    </div>
                </div>
            </div>

            <div class="text-center lg:text-left lg:order-2 order-1">
                <div class="text-[11px] font-bold tracking-[0.14em] uppercase text-blue-400 mb-4">Customer Panel</div>
                <h2 id="customer-panel-heading" class="text-3xl sm:text-4xl font-black tracking-tight leading-[1.15] mb-5 text-white">
                    Give Customers Control Over Every Booking
                </h2>
                <p class="text-gray-400 text-[16px] leading-relaxed mb-4 max-w-lg mx-auto lg:mx-0">
                    From the customer panel, riders can view upcoming trips, review their booking history, and manage their account &mdash; creating a self-service experience that reduces phone calls and no-shows for your team.
                </p>
                <p class="text-gray-500 text-[14px] leading-relaxed mb-6 max-w-lg mx-auto lg:mx-0">
                    A corporate client with a recurring airport pickup can check their trip time and driver details themselves, instead of calling your office to confirm.
                </p>

                <a href="{{ route('customer-panel-features') }}" class="inline-flex items-center gap-1.5 text-[13.5px] font-semibold text-blue-400 hover:text-blue-300 transition-colors duration-200">
                    Explore all customer panel features
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>

        </div>
    </div>
</section>
</article>

<!-- ═══════════════════════════════════════════════════════════════
     DRIVER PANEL
═══════════════════════════════════════════════════════════════ -->
<article aria-labelledby="driver-panel-heading">
<section class="relative py-20 lg:py-28 overflow-hidden" style="background: #0A0A0A;">
    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-[1fr_1.1fr] gap-12 lg:gap-16 items-center">

            <div class="text-center lg:text-left">
                <div class="text-[11px] font-bold tracking-[0.14em] uppercase text-blue-400 mb-4">Driver Panel</div>
                <h2 id="driver-panel-heading" class="text-3xl sm:text-4xl font-black tracking-tight leading-[1.15] mb-5 text-white">
                    Keep Every Driver Connected and On Schedule
                </h2>
                <p class="text-gray-400 text-[16px] leading-relaxed mb-4 max-w-lg mx-auto lg:mx-0">
                    Drivers see their assigned trips, pickup and drop-off details, and real-time status updates from the driver panel &mdash; so dispatch stays organized without a single phone call.
                </p>
                <p class="text-gray-500 text-[14px] leading-relaxed mb-6 max-w-lg mx-auto lg:mx-0">
                    A taxi company with a dozen drivers on shift can assign every booking from the admin dashboard, with each driver seeing their own trips the moment they're assigned.
                </p>

                <a href="{{ route('driver-panel-features') }}" class="inline-flex items-center gap-1.5 text-[13.5px] font-semibold text-blue-400 hover:text-blue-300 transition-colors duration-200">
                    Explore all driver panel features
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>

            <!-- Visual -->
            <div class="max-w-sm mx-auto lg:max-w-none">
                <div class="rounded-2xl p-6" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(59,130,246,0.2); box-shadow: 0 30px 90px rgba(0,0,0,0.5), 0 0 50px rgba(59,130,246,0.08);">
                    <div class="flex items-center gap-2.5 mb-5">
                        <span class="w-9 h-9 rounded-lg flex items-center justify-center flex-shrink-0" style="background: rgba(59,130,246,0.12); border:1px solid rgba(59,130,246,0.25);">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 17h14M5 17a2 2 0 01-2-2v-2l2-5h14l2 5v2a2 2 0 01-2 2M5 17v2a1 1 0 001 1h1a1 1 0 001-1v-2m8 0v2a1 1 0 001 1h1a1 1 0 001-1v-2"/></svg>
                        </span>
                        <span class="text-[11px] font-semibold text-gray-400 uppercase tracking-wide">Today&rsquo;s Trips</span>
                    </div>
                    <div class="flex items-center justify-between mb-1.5">
                        <span class="text-[13px] text-gray-300">10:30 AM &middot; JFK &rarr; Manhattan</span>
                    </div>
                    <span class="inline-block px-2 py-0.5 rounded text-[10px] font-semibold mb-4" style="background: rgba(34,197,94,0.12); color:#4ade80;">On The Way</span>
                    <div class="pt-4" style="border-top: 1px solid rgba(255,255,255,0.07);">
                        <div class="flex items-center justify-between text-[13px] text-gray-500">
                            <span>12:45 PM &middot; Manhattan &rarr; LGA</span>
                            <span class="text-[10px] font-semibold text-gray-600 uppercase">Upcoming</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
</article>

<!-- ═══════════════════════════════════════════════════════════════
     ADMIN DASHBOARD
═══════════════════════════════════════════════════════════════ -->
<article aria-labelledby="admin-dashboard-heading">
<section class="relative py-20 lg:py-28 overflow-hidden" style="background: #060606;">
    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.025) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.025) 1px, transparent 1px); background-size: 56px 56px;"></div>
    <div class="relative z-10 max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">

        <div class="text-center max-w-2xl mx-auto mb-14 lg:mb-16">
            <div class="text-[11px] font-bold tracking-[0.14em] uppercase text-blue-400 mb-4">Admin Dashboard</div>
            <h2 id="admin-dashboard-heading" class="text-3xl sm:text-4xl font-black tracking-tight leading-[1.15] mb-5 text-white">
                Run Your Entire Operation From One Admin Dashboard
            </h2>
            <p class="text-gray-400 text-[16px] leading-relaxed">
                Bookings, customers, drivers and daily operations all come together in the admin dashboard &mdash; giving your team full visibility and control over the business, from a single screen.
            </p>
        </div>

        <!-- Admin hub visual -->
        <div class="rounded-2xl overflow-hidden max-w-3xl mx-auto" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(59,130,246,0.22); box-shadow: 0 30px 90px rgba(0,0,0,0.5), 0 0 60px rgba(59,130,246,0.08);">
            <div class="flex items-center justify-between px-5 py-3.5" style="border-bottom: 1px solid rgba(255,255,255,0.07);">
                <div class="flex items-center gap-2">
                    <span class="w-6 h-6 rounded-md flex items-center justify-center" style="background: #3B82F6;">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/></svg>
                    </span>
                    <span class="text-white font-bold text-[13px]">Admin Dashboard</span>
                </div>
                <span class="text-[9.5px] font-semibold text-gray-500 uppercase tracking-wide">This Month</span>
            </div>
            <div class="flex">
                <div class="hidden md:flex flex-col items-center gap-2.5 px-3 py-4 flex-shrink-0" style="border-right: 1px solid rgba(255,255,255,0.06);">
                    <span class="w-8 h-8 rounded-lg flex items-center justify-center" style="background: rgba(59,130,246,0.15); border:1px solid rgba(59,130,246,0.35);">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/></svg>
                    </span>
                    <span class="w-8 h-8 rounded-lg flex items-center justify-center" style="background: rgba(255,255,255,0.03);">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/></svg>
                    </span>
                    <span class="w-8 h-8 rounded-lg flex items-center justify-center" style="background: rgba(255,255,255,0.03);">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 17h14M5 17a2 2 0 01-2-2v-2l2-5h14l2 5v2a2 2 0 01-2 2M5 17v2a1 1 0 001 1h1a1 1 0 001-1v-2m8 0v2a1 1 0 001 1h1a1 1 0 001-1v-2"/></svg>
                    </span>
                    <span class="w-8 h-8 rounded-lg flex items-center justify-center" style="background: rgba(255,255,255,0.03);">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    </span>
                    <span class="w-8 h-8 rounded-lg flex items-center justify-center" style="background: rgba(255,255,255,0.03);">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20V10M18 20V4M6 20v-4"/></svg>
                    </span>
                </div>
                <div class="flex-1 p-5 min-w-0">
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-2.5 mb-4">
                        <div class="rounded-lg p-2.5" style="background: rgba(255,255,255,0.025); border: 1px solid rgba(255,255,255,0.07);">
                            <div class="text-[9px] text-gray-500 mb-1">Total Bookings</div>
                            <div class="text-[15px] font-bold text-white">1,248</div>
                        </div>
                        <div class="rounded-lg p-2.5" style="background: rgba(255,255,255,0.025); border: 1px solid rgba(255,255,255,0.07);">
                            <div class="text-[9px] text-gray-500 mb-1">Revenue</div>
                            <div class="text-[15px] font-bold text-white">$24,860</div>
                        </div>
                        <div class="rounded-lg p-2.5" style="background: rgba(255,255,255,0.025); border: 1px solid rgba(255,255,255,0.07);">
                            <div class="text-[9px] text-gray-500 mb-1">Total Drivers</div>
                            <div class="text-[15px] font-bold text-white">156</div>
                        </div>
                        <div class="rounded-lg p-2.5" style="background: rgba(255,255,255,0.025); border: 1px solid rgba(255,255,255,0.07);">
                            <div class="text-[9px] text-gray-500 mb-1">Active Rides</div>
                            <div class="text-[15px] font-bold text-white">24</div>
                        </div>
                    </div>
                    <div class="rounded-lg overflow-hidden" style="border: 1px solid rgba(255,255,255,0.07);">
                        <div class="hidden sm:grid grid-cols-[1fr_1.3fr_1fr_0.9fr_0.8fr] gap-2 px-3 py-2 text-[8.5px] font-semibold text-gray-500 uppercase tracking-wide" style="background: rgba(255,255,255,0.02); border-bottom: 1px solid rgba(255,255,255,0.06);">
                            <span>Booking</span><span>Customer</span><span>Vehicle</span><span>Status</span><span class="text-right">Amount</span>
                        </div>
                        <div class="grid grid-cols-2 sm:grid-cols-[1fr_1.3fr_1fr_0.9fr_0.8fr] gap-2 px-3 py-2 text-[10px] items-center" style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                            <span class="text-gray-500">#LS-7842</span><span class="text-gray-300">John Smith</span><span class="text-gray-500 hidden sm:inline">S-Class</span><span class="px-1.5 py-0.5 rounded text-[8px] font-semibold inline-block w-fit" style="background: rgba(34,197,94,0.12); color:#4ade80;">Confirmed</span><span class="text-white text-right font-semibold hidden sm:inline">$120</span>
                        </div>
                        <div class="grid grid-cols-2 sm:grid-cols-[1fr_1.3fr_1fr_0.9fr_0.8fr] gap-2 px-3 py-2 text-[10px] items-center">
                            <span class="text-gray-500">#LS-7841</span><span class="text-gray-300">Sarah Johnson</span><span class="text-gray-500 hidden sm:inline">SUV</span><span class="px-1.5 py-0.5 rounded text-[8px] font-semibold inline-block w-fit" style="background: rgba(59,130,246,0.12); color:#60a5fa;">On The Way</span><span class="text-white text-right font-semibold hidden sm:inline">$95</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <p class="text-center text-gray-500 text-[14px] mt-8">
            See the full dashboard in action &mdash; <a href="{{ route('demo') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">explore the live demo</a>,
            or <a href="{{ route('admin-panel-features') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">browse all admin dashboard features</a>.
        </p>

    </div>
</section>
</article>

<!-- ═══════════════════════════════════════════════════════════════
     HOW EVERYTHING CONNECTS
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-28 overflow-hidden" style="background: #0A0A0A;">
    <div class="relative z-10 max-w-5xl mx-auto px-5 sm:px-6 lg:px-8">

        <div class="text-center max-w-2xl mx-auto mb-16 lg:mb-20">
            <div class="inline-flex items-center gap-2 mb-5 px-4 py-1.5 rounded-full" style="background: rgba(59,130,246,0.07); border: 1px solid rgba(59,130,246,0.2);">
                <span class="text-[11px] font-bold tracking-[0.14em] uppercase text-blue-400">One Connected Workflow</span>
            </div>
            <h2 class="text-4xl sm:text-5xl font-black tracking-tight leading-[1.1] mb-5 text-white">
                From Booking to Completed Ride &mdash; Automatically
            </h2>
            <p class="text-gray-400 text-[16px] leading-relaxed">
                Every booking moves through one connected workflow &mdash; no manual re-entry, no lost bookings, no confusion between your team and your customers.
            </p>
        </div>

        <!-- Flow -->
        <div class="relative">
            <div class="hidden lg:block absolute top-9 left-[8%] right-[8%] h-[1.5px]" style="background: linear-gradient(90deg, rgba(59,130,246,0.15), rgba(59,130,246,0.7) 50%, rgba(34,197,94,0.7));"></div>
            <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-5 gap-8 lg:gap-4">

                <div class="flex flex-col items-center text-center">
                    <span class="relative z-10 w-[72px] h-[72px] rounded-2xl flex items-center justify-center mb-4" style="background:#0A0A0A; border: 2px solid rgba(59,130,246,0.4); box-shadow: 0 0 16px rgba(59,130,246,0.2);">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    </span>
                    <h3 class="text-white font-bold text-[14px] mb-1">Customer</h3>
                    <p class="text-gray-500 text-[12px] leading-snug">Books a ride online</p>
                </div>

                <div class="flex flex-col items-center text-center">
                    <span class="relative z-10 w-[72px] h-[72px] rounded-2xl flex items-center justify-center mb-4" style="background:#0A0A0A; border: 2px solid rgba(59,130,246,0.5); box-shadow: 0 0 18px rgba(59,130,246,0.25);">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 010 20 15.3 15.3 0 010-20z"/></svg>
                    </span>
                    <h3 class="text-white font-bold text-[14px] mb-1">Booking Website</h3>
                    <p class="text-gray-500 text-[12px] leading-snug">Captures trip details</p>
                </div>

                <div class="flex flex-col items-center text-center">
                    <span class="relative z-10 w-[72px] h-[72px] rounded-2xl flex items-center justify-center mb-4" style="background:#0A0A0A; border: 2px solid rgba(59,130,246,0.6); box-shadow: 0 0 20px rgba(59,130,246,0.3);">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/></svg>
                    </span>
                    <h3 class="text-white font-bold text-[14px] mb-1">Admin</h3>
                    <p class="text-gray-500 text-[12px] leading-snug">Assigns the trip</p>
                </div>

                <div class="flex flex-col items-center text-center">
                    <span class="relative z-10 w-[72px] h-[72px] rounded-2xl flex items-center justify-center mb-4" style="background:#0A0A0A; border: 2px solid rgba(59,130,246,0.7); box-shadow: 0 0 22px rgba(59,130,246,0.35);">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 17h14M5 17a2 2 0 01-2-2v-2l2-5h14l2 5v2a2 2 0 01-2 2M5 17v2a1 1 0 001 1h1a1 1 0 001-1v-2m8 0v2a1 1 0 001 1h1a1 1 0 001-1v-2"/></svg>
                    </span>
                    <h3 class="text-white font-bold text-[14px] mb-1">Driver</h3>
                    <p class="text-gray-500 text-[12px] leading-snug">Completes the pickup</p>
                </div>

                <div class="flex flex-col items-center text-center">
                    <span class="relative z-10 w-[72px] h-[72px] rounded-2xl flex items-center justify-center mb-4" style="background:#22c55e; box-shadow: 0 0 26px rgba(34,197,94,0.5);">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                    </span>
                    <h3 class="text-white font-bold text-[14px] mb-1">Completed Ride</h3>
                    <p class="text-gray-500 text-[12px] leading-snug">Recorded automatically</p>
                </div>

            </div>
        </div>

    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     WHITE-LABEL
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-28 overflow-hidden" style="background: #060606;">
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[400px] rounded-full pointer-events-none" style="background: radial-gradient(ellipse at center, rgba(59,130,246,0.07) 0%, transparent 68%);"></div>

    <div class="relative z-10 max-w-3xl mx-auto px-5 sm:px-6 lg:px-8 text-center">
        <div class="inline-flex items-center gap-2 mb-5 px-4 py-1.5 rounded-full" style="background: rgba(59,130,246,0.07); border: 1px solid rgba(59,130,246,0.2);">
            <span class="text-[11px] font-bold tracking-[0.14em] uppercase text-blue-400">White-Label Platform</span>
        </div>
        <h2 class="text-4xl sm:text-5xl font-black tracking-tight leading-[1.1] mb-6 text-white">
            Your Brand. Your Platform.
        </h2>
        <p class="text-gray-400 text-[17px] leading-relaxed mb-8">
            LimoSchedule is white-label booking software &mdash; your logo, your colors, your domain. Customers and drivers only ever see your brand, giving your limo, black car, taxi or chauffeur business a professional booking platform that looks and feels entirely your own.
        </p>
        <div class="inline-flex items-center gap-3 px-5 py-3 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(59,130,246,0.2);">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 010 20 15.3 15.3 0 010-20z"/></svg>
            <span class="text-[13px] text-gray-400">yourcompany.com &mdash; no LimoSchedule branding, anywhere</span>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     PLATFORM FAQ
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-24 overflow-hidden" style="background: #060606;">
    <div class="relative z-10 max-w-3xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center mb-12 lg:mb-14">
            <h2 class="text-3xl sm:text-4xl font-black tracking-tight leading-[1.1] mb-4 text-white">
                Platform Questions
            </h2>
            <p class="text-gray-400 text-[15px] leading-relaxed">
                For pricing, setup and general questions, see the <a href="{{ url('/') }}#quick-faq" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">full FAQ</a>. A few questions specific to how the platform fits together:
            </p>
        </div>
        <div class="flex flex-col gap-4">
            <div class="rounded-2xl p-6" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <h3 class="text-white font-semibold text-[15px] mb-2">Does the $1,999 license include all four panels, or are they sold separately?</h3>
                <p class="text-gray-400 text-[14px] leading-relaxed">All four panels &mdash; the booking website, customer portal, driver panel and admin dashboard &mdash; are included in the single $1,999 one-time license. There's no separate tier or add-on fee for any of them.</p>
            </div>
            <div class="rounded-2xl p-6" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <h3 class="text-white font-semibold text-[15px] mb-2">How does a booking move from the website to a driver?</h3>
                <p class="text-gray-400 text-[14px] leading-relaxed">A customer books on the branded website, the booking appears in the admin dashboard, admin assigns it to a driver, the driver completes the pickup from the driver panel, and the completed ride is recorded automatically &mdash; no manual re-entry at any step.</p>
            </div>
            <div class="rounded-2xl p-6" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <h3 class="text-white font-semibold text-[15px] mb-2">Can I use my own domain with the booking website?</h3>
                <p class="text-gray-400 text-[14px] leading-relaxed">Yes. LimoSchedule is white-label, so the booking website runs on your own domain with your logo and colors &mdash; customers and drivers never see LimoSchedule branding.</p>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     FINAL CTA
═══════════════════════════════════════════════════════════════ -->
<section class="relative overflow-hidden" style="background: #030303; padding: 100px 0 110px;">
    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.02) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.02) 1px, transparent 1px); background-size: 64px 64px;"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[900px] h-[450px] pointer-events-none" style="background: radial-gradient(ellipse at 50% 0%, rgba(59,130,246,0.14) 0%, transparent 70%);"></div>

    <div class="relative z-10 max-w-3xl mx-auto px-5 sm:px-6 lg:px-8 text-center">
        <h2 class="font-black text-white leading-[1.1] tracking-tight mb-5" style="font-size: clamp(2.2rem, 5vw, 3.5rem);">
            Ready to Run Your Transportation Business on One Platform?
        </h2>
        <p class="text-gray-400 text-[15px] mb-9">
            One complete platform &middot; <a href="{{ route('pricing') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">$1,999 one-time payment</a> &middot; no monthly SaaS fee
        </p>

        <a href="{{ route('contact') }}"
           class="btn-cta btn-primary mb-5">
            <span>Get Started</span>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>

        <div class="text-[13px]">
            <span class="text-gray-500">Prefer WhatsApp?</span>
            <a href="https://wa.me/923460820722?text=Hi%2C%20I%27m%20interested%20in%20LimoSchedule%27s%20white-label%20platform.%20Can%20I%20talk%20to%20an%20expert%3F" target="_blank" rel="noopener"
               class="inline-flex items-center gap-1 font-semibold text-blue-400 hover:text-blue-300 transition-colors duration-200 ml-1">
                Talk to an Expert
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>

        <p class="text-gray-600 text-[12.5px] mt-10">
            See how LimoSchedule fits your business &mdash;
            <a href="{{ route('solutions') }}" class="text-gray-500 hover:text-white transition-colors duration-200">explore solutions</a> &middot;
            <a href="{{ route('features') }}" class="text-gray-500 hover:text-white transition-colors duration-200">view all features</a>
        </p>
    </div>
</section>

@endsection
