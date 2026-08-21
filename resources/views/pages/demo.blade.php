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
            "url": "{{ route('demo') }}",
            "applicationCategory": "BusinessApplication",
            "operatingSystem": "Web",
            "description": "White-label transportation booking platform with a booking website, customer panel, driver panel and admin dashboard.",
            "offers": {
                "@@type": "Offer",
                "price": "1999",
                "priceCurrency": "USD",
                "availability": "https://schema.org/InStock"
            },
            "publisher": { "@@id": "{{ url('/') }}#organization" }
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
        ['label' => 'Demo', 'url' => null],
    ];
@endphp
@include('partials._breadcrumbs')

    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.03) 1px, transparent 1px); background-size: 56px 56px;"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[500px] pointer-events-none" style="background: radial-gradient(ellipse at 50% 0%, rgba(59,130,246,0.12) 0%, transparent 70%);"></div>

    <div class="relative z-10 max-w-4xl mx-auto px-5 sm:px-6 lg:px-8 pt-24 pb-16 lg:pt-32 lg:pb-20 text-center">
        <div class="inline-flex items-center gap-2 mb-6 px-4 py-1.5 rounded-full" style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.25);">
            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l2.4 6.6L21 10l-5 4.6L17.4 21 12 17.4 6.6 21 8 14.6 3 10l6.6-1.4L12 2z"/></svg>
            <span class="text-blue-400 text-[11px] font-bold tracking-[0.16em] uppercase">Demo</span>
        </div>

        <h1 class="text-white text-4xl sm:text-5xl lg:text-[54px] font-black tracking-tight leading-[1.05] mb-6">
            See LimoSchedule in Action
        </h1>

        <p class="text-gray-400 text-[17px] sm:text-[18px] leading-relaxed max-w-2xl mx-auto mb-9">
            Explore the booking website, customer portal, driver panel and admin dashboard before launching your own transportation platform.
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="{{ route('contact') }}"
               class="btn-cta w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-[#3B82F6] text-white font-bold px-8 py-4 rounded-xl text-[15px] border border-blue-500/30">
                <span>Request a Demo</span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a href="https://wa.me/923460820722?text=Hi%2C%20I%27m%20interested%20in%20seeing%20a%20live%20demo%20of%20LimoSchedule.%20Can%20I%20talk%20to%20an%20expert%3F" target="_blank" rel="noopener"
               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 font-semibold px-7 py-4 rounded-xl text-[15px] text-white transition-all duration-200 hover:bg-white/10"
               style="background: #000; border: 1px solid rgba(255,255,255,0.28);">
                <span>Talk to an Expert</span>
            </a>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     1. BOOKING WEBSITE
═══════════════════════════════════════════════════════════════ -->
<article aria-labelledby="demo-booking-website-heading">
<section class="relative py-20 lg:py-24 overflow-hidden" style="background: #0A0A0A;">
    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.025) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.025) 1px, transparent 1px); background-size: 56px 56px;"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-[1fr_1.1fr] gap-12 lg:gap-16 items-center">

            <div class="text-center lg:text-left">
                <div class="text-[11px] font-bold tracking-[0.14em] uppercase text-blue-400 mb-4">Booking Website</div>
                <h2 id="demo-booking-website-heading" class="text-3xl sm:text-4xl font-black tracking-tight leading-[1.15] mb-5 text-white">
                    A Branded Booking Website That Converts Visitors Into Rides
                </h2>
                <p class="text-gray-400 text-[16px] leading-relaxed mb-8 max-w-lg mx-auto lg:mx-0">
                    Customers book directly from a professional, branded booking website &mdash; no app download, no phone tag.
                </p>

                <ul class="flex flex-col gap-3 max-w-md mx-auto lg:mx-0 text-left">
                    <li class="flex items-center gap-2.5"><svg class="flex-shrink-0" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[14px] text-gray-300">Advanced Booking</span></li>
                    <li class="flex items-center gap-2.5"><svg class="flex-shrink-0" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[14px] text-gray-300">Fare Calculator</span></li>
                    <li class="flex items-center gap-2.5"><svg class="flex-shrink-0" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[14px] text-gray-300">Mobile Responsive</span></li>
                </ul>
            </div>

            <!-- Screenshot: booking form -->
            <div class="max-w-lg mx-auto lg:max-w-none">
                <div class="rounded-2xl overflow-hidden" role="img" aria-label="LimoSchedule booking website showing a pickup, drop-off and instant fare booking form" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(59,130,246,0.2); box-shadow: 0 30px 90px rgba(0,0,0,0.5), 0 0 50px rgba(59,130,246,0.08);">
                    <div class="flex items-center gap-2 px-4 py-3" style="border-bottom: 1px solid rgba(255,255,255,0.08);">
                        <span class="w-2.5 h-2.5 rounded-full" style="background: rgba(239,68,68,0.6);"></span>
                        <span class="w-2.5 h-2.5 rounded-full" style="background: rgba(234,179,8,0.6);"></span>
                        <span class="w-2.5 h-2.5 rounded-full" style="background: rgba(34,197,94,0.6);"></span>
                        <div class="ml-2 flex-1 flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-[10.5px] text-gray-500" style="background: rgba(255,255,255,0.04);">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
                            yourcompany.com
                        </div>
                    </div>
                    <div class="p-7">
                        <div class="flex items-center justify-between mb-6">
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
     2. CUSTOMER PANEL
═══════════════════════════════════════════════════════════════ -->
<article aria-labelledby="demo-customer-panel-heading">
<section class="relative py-20 lg:py-24 overflow-hidden" style="background: #060606;">
    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-[1.1fr_1fr] gap-12 lg:gap-16 items-center">

            <!-- Screenshot: customer panel -->
            <div class="max-w-md mx-auto lg:max-w-none lg:order-1 order-2">
                <div class="rounded-2xl p-7" role="img" aria-label="LimoSchedule customer panel showing an upcoming ride and trip history" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(59,130,246,0.2); box-shadow: 0 30px 90px rgba(0,0,0,0.5), 0 0 50px rgba(59,130,246,0.08);">
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
                <h2 id="demo-customer-panel-heading" class="text-3xl sm:text-4xl font-black tracking-tight leading-[1.15] mb-5 text-white">
                    Give Customers Control Over Every Booking
                </h2>
                <p class="text-gray-400 text-[16px] leading-relaxed mb-8 max-w-lg mx-auto lg:mx-0">
                    Riders view upcoming trips, review their booking history, and manage their account &mdash; a self-service experience that reduces phone calls for your team.
                </p>

                <ul class="flex flex-col gap-3 max-w-md mx-auto lg:mx-0 text-left">
                    <li class="flex items-center gap-2.5"><svg class="flex-shrink-0" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[14px] text-gray-300">Upcoming Ride Details</span></li>
                    <li class="flex items-center gap-2.5"><svg class="flex-shrink-0" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[14px] text-gray-300">Trip History</span></li>
                    <li class="flex items-center gap-2.5"><svg class="flex-shrink-0" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[14px] text-gray-300">Account Management</span></li>
                </ul>
            </div>

        </div>
    </div>
</section>
</article>

<!-- ═══════════════════════════════════════════════════════════════
     3. DRIVER PANEL
═══════════════════════════════════════════════════════════════ -->
<article aria-labelledby="demo-driver-panel-heading">
<section class="relative py-20 lg:py-24 overflow-hidden" style="background: #0A0A0A;">
    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-[1fr_1.1fr] gap-12 lg:gap-16 items-center">

            <div class="text-center lg:text-left">
                <div class="text-[11px] font-bold tracking-[0.14em] uppercase text-blue-400 mb-4">Driver Panel</div>
                <h2 id="demo-driver-panel-heading" class="text-3xl sm:text-4xl font-black tracking-tight leading-[1.15] mb-5 text-white">
                    Keep Every Driver Connected and On Schedule
                </h2>
                <p class="text-gray-400 text-[16px] leading-relaxed mb-8 max-w-lg mx-auto lg:mx-0">
                    Drivers see their assigned trips, pickup and drop-off details, and real-time status updates &mdash; so dispatch stays organized without a single phone call.
                </p>

                <ul class="flex flex-col gap-3 max-w-md mx-auto lg:mx-0 text-left">
                    <li class="flex items-center gap-2.5"><svg class="flex-shrink-0" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[14px] text-gray-300">Today&rsquo;s Trips</span></li>
                    <li class="flex items-center gap-2.5"><svg class="flex-shrink-0" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[14px] text-gray-300">Trip Status Updates</span></li>
                    <li class="flex items-center gap-2.5"><svg class="flex-shrink-0" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[14px] text-gray-300">Booking Assignment</span></li>
                </ul>
            </div>

            <!-- Screenshot: driver panel -->
            <div class="max-w-md mx-auto lg:max-w-none">
                <div class="rounded-2xl p-7" role="img" aria-label="LimoSchedule driver panel showing today's assigned trips and trip status" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(59,130,246,0.2); box-shadow: 0 30px 90px rgba(0,0,0,0.5), 0 0 50px rgba(59,130,246,0.08);">
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
     4. ADMIN DASHBOARD
═══════════════════════════════════════════════════════════════ -->
<article aria-labelledby="demo-admin-dashboard-heading">
<section class="relative py-20 lg:py-24 overflow-hidden" style="background: #060606;">
    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.025) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.025) 1px, transparent 1px); background-size: 56px 56px;"></div>
    <div class="relative z-10 max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">

        <div class="text-center max-w-2xl mx-auto mb-12 lg:mb-14">
            <div class="text-[11px] font-bold tracking-[0.14em] uppercase text-blue-400 mb-4">Admin Dashboard</div>
            <h2 id="demo-admin-dashboard-heading" class="text-3xl sm:text-4xl font-black tracking-tight leading-[1.15] mb-5 text-white">
                Run Your Entire Operation From One Admin Dashboard
            </h2>
            <p class="text-gray-400 text-[16px] leading-relaxed mb-6">
                Bookings, customers, drivers and daily operations all come together in the admin dashboard.
            </p>
            <div class="flex flex-wrap items-center justify-center gap-x-6 gap-y-2">
                <span class="inline-flex items-center gap-1.5 text-[13.5px] font-medium text-gray-300"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>Booking Management</span>
                <span class="inline-flex items-center gap-1.5 text-[13.5px] font-medium text-gray-300"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>Customer Management</span>
                <span class="inline-flex items-center gap-1.5 text-[13.5px] font-medium text-gray-300"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>Revenue Overview</span>
            </div>
        </div>

        <!-- Admin hub visual -->
        <div class="rounded-2xl overflow-hidden max-w-3xl mx-auto" role="img" aria-label="LimoSchedule admin dashboard for transportation booking management, showing bookings, revenue, drivers and active rides" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(59,130,246,0.22); box-shadow: 0 30px 90px rgba(0,0,0,0.5), 0 0 60px rgba(59,130,246,0.08);">
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

    </div>
</section>
</article>

<!-- ═══════════════════════════════════════════════════════════════
     DEMO FLOW
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-24 overflow-hidden" style="background: #0A0A0A;">
    <div class="relative z-10 max-w-3xl mx-auto px-5 sm:px-6 lg:px-8">

        <div class="text-center mb-16 lg:mb-20">
            <h2 class="text-3xl sm:text-4xl font-black tracking-tight leading-[1.15] mb-5 text-white">
                How a Booking Flows Through the Platform
            </h2>
            <p class="text-gray-400 text-[16px] leading-relaxed">
                Every ride moves through one connected workflow &mdash; automatically, from booking to completion.
            </p>
        </div>

        <div class="flex flex-col items-center">

            <div class="flex flex-col items-center text-center">
                <span class="w-[64px] h-[64px] rounded-2xl flex items-center justify-center mb-3" style="background:#060606; border: 2px solid rgba(59,130,246,0.4); box-shadow: 0 0 16px rgba(59,130,246,0.2);">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                </span>
                <h3 class="text-white font-bold text-[14px]">Customer Books</h3>
            </div>

            <svg width="16" height="28" viewBox="0 0 16 28" fill="none" stroke="rgba(59,130,246,0.5)" stroke-width="2" stroke-linecap="round"><line x1="8" y1="0" x2="8" y2="22"/><polyline points="2 18 8 26 14 18"/></svg>

            <div class="flex flex-col items-center text-center">
                <span class="w-[64px] h-[64px] rounded-2xl flex items-center justify-center mb-3" style="background:#060606; border: 2px solid rgba(59,130,246,0.55); box-shadow: 0 0 18px rgba(59,130,246,0.25);">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/></svg>
                </span>
                <h3 class="text-white font-bold text-[14px]">Booking Appears in Admin</h3>
            </div>

            <svg width="16" height="28" viewBox="0 0 16 28" fill="none" stroke="rgba(59,130,246,0.6)" stroke-width="2" stroke-linecap="round"><line x1="8" y1="0" x2="8" y2="22"/><polyline points="2 18 8 26 14 18"/></svg>

            <div class="flex flex-col items-center text-center">
                <span class="w-[64px] h-[64px] rounded-2xl flex items-center justify-center mb-3" style="background:#060606; border: 2px solid rgba(59,130,246,0.65); box-shadow: 0 0 20px rgba(59,130,246,0.3);">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 17h14M5 17a2 2 0 01-2-2v-2l2-5h14l2 5v2a2 2 0 01-2 2M5 17v2a1 1 0 001 1h1a1 1 0 001-1v-2m8 0v2a1 1 0 001 1h1a1 1 0 001-1v-2"/></svg>
                </span>
                <h3 class="text-white font-bold text-[14px]">Driver Receives Assignment</h3>
            </div>

            <svg width="16" height="28" viewBox="0 0 16 28" fill="none" stroke="rgba(34,197,94,0.6)" stroke-width="2" stroke-linecap="round"><line x1="8" y1="0" x2="8" y2="22"/><polyline points="2 18 8 26 14 18"/></svg>

            <div class="flex flex-col items-center text-center">
                <span class="w-[64px] h-[64px] rounded-2xl flex items-center justify-center mb-3" style="background:#22c55e; box-shadow: 0 0 26px rgba(34,197,94,0.5);">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                </span>
                <h3 class="text-white font-bold text-[14px]">Ride Gets Managed</h3>
            </div>

        </div>

    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     MORE TO EXPLORE
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-16 overflow-hidden" style="background: #060606;">
    <div class="relative z-10 max-w-3xl mx-auto px-5 sm:px-6 lg:px-8 text-center">
        <p class="text-gray-500 text-[14px]">
            See the <a href="{{ route('platform') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">full platform</a>, explore all <a href="{{ route('features') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">features</a>, or check <a href="{{ route('pricing') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">pricing</a>.
        </p>
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
            Want to See Your Business Running on LimoSchedule?
        </h2>
        <p class="text-gray-400 text-[15px] mb-9">
            One complete platform &middot; <a href="{{ route('pricing') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">$1,999 one-time payment</a> &middot; no monthly SaaS fee
        </p>

        <a href="{{ route('contact') }}"
           class="btn-cta inline-flex items-center justify-center gap-2.5 bg-[#3B82F6] text-white font-bold px-9 py-4 rounded-xl text-[15.5px] border border-blue-500/30 mb-5">
            <span>Request a Demo</span>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>

        <div class="text-[13px]">
            <span class="text-gray-500">Prefer WhatsApp?</span>
            <a href="https://wa.me/923460820722?text=Hi%2C%20I%27m%20interested%20in%20seeing%20a%20live%20demo%20of%20LimoSchedule.%20Can%20I%20talk%20to%20an%20expert%3F" target="_blank" rel="noopener"
               class="inline-flex items-center gap-1 font-semibold text-blue-400 hover:text-blue-300 transition-colors duration-200 ml-1">
                Talk to an Expert
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>
</section>

@endsection
