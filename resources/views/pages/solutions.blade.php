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
            "@@type": "Service",
            "name": "Limo Booking Software",
            "serviceType": "Transportation Booking Software",
            "provider": { "@@id": "{{ url('/') }}#organization" },
            "description": "White-label booking website and admin dashboard for limo services, replacing phone-based bookings with automated online reservations and centralized dispatch."
        },
        {
            "@@type": "Service",
            "name": "Black Car Booking Software",
            "serviceType": "Transportation Booking Software",
            "provider": { "@@id": "{{ url('/') }}#organization" },
            "description": "White-label booking website and customer panel for black car services, giving premium clients a self-service reservation experience under their own brand."
        },
        {
            "@@type": "Service",
            "name": "Taxi Booking Software",
            "serviceType": "Transportation Booking Software",
            "provider": { "@@id": "{{ url('/') }}#organization" },
            "description": "Admin dashboard and driver panel for taxi companies, connecting bookings, dispatch and drivers in one system."
        },
        {
            "@@type": "Service",
            "name": "Chauffeur Booking Software",
            "serviceType": "Transportation Booking Software",
            "provider": { "@@id": "{{ url('/') }}#organization" },
            "description": "Connected customer, driver and admin panels for chauffeur services, tracking every trip from booking to drop-off."
        },
        {
            "@@type": "Service",
            "name": "Airport Transfer Booking Software",
            "serviceType": "Transportation Booking Software",
            "provider": { "@@id": "{{ url('/') }}#organization" },
            "description": "Advanced booking and a connected driver panel for airport transfer businesses, keeping pickup times accurate and visible to the whole team."
        },
        {
            "@@type": "Service",
            "name": "Corporate Travel Booking Software",
            "serviceType": "Transportation Booking Software",
            "provider": { "@@id": "{{ url('/') }}#organization" },
            "description": "Branded, mobile-responsive booking website with multi-currency support for corporate travel accounts."
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
        ['label' => 'Solutions', 'url' => null],
    ];
@endphp
@include('partials._breadcrumbs')

    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.03) 1px, transparent 1px); background-size: 56px 56px;"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[500px] pointer-events-none" style="background: radial-gradient(ellipse at 50% 0%, rgba(59,130,246,0.12) 0%, transparent 70%);"></div>

    <div class="relative z-10 max-w-4xl mx-auto px-5 sm:px-6 lg:px-8 pt-24 pb-20 lg:pt-32 lg:pb-24 text-center">

        <div class="inline-flex items-center gap-2 mb-6 px-4 py-1.5 rounded-full" style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.25);">
            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l2.4 6.6L21 10l-5 4.6L17.4 21 12 17.4 6.6 21 8 14.6 3 10l6.6-1.4L12 2z"/></svg>
            <span class="text-blue-400 text-[11px] font-bold tracking-[0.16em] uppercase">Solutions By Industry</span>
        </div>

        <h1 class="text-white text-4xl sm:text-5xl lg:text-[54px] font-black tracking-tight leading-[1.05] mb-6">
            Transportation Booking Solutions Built Around Your Business
        </h1>

        <p class="text-gray-400 text-[17px] sm:text-[18px] leading-relaxed max-w-2xl mx-auto mb-9">
            Power your limo, black car, taxi, chauffeur or airport transfer business with a complete white-label booking platform.
        </p>

        <a href="#solutions-grid"
           class="btn-cta inline-flex items-center justify-center gap-2 bg-[#3B82F6] text-white font-bold px-8 py-4 rounded-xl text-[15px] border border-blue-500/30">
            <span>Find Your Solution</span>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M19 12l-7 7-7-7"/></svg>
        </a>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     INTRO
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-16 lg:py-20 overflow-hidden" style="background: #060606;">
    <div class="relative z-10 max-w-3xl mx-auto px-5 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl sm:text-4xl font-black tracking-tight leading-[1.15] mb-5 text-white">
            One Platform. Six Ways to Use It.
        </h2>
        <p class="text-gray-400 text-[16px] leading-relaxed">
            LimoSchedule is built on the same complete <a href="{{ route('platform') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">booking platform</a> &mdash; a booking website, customer panel, driver panel and admin dashboard &mdash; adapted to how each type of transportation business actually operates. Find your industry below.
        </p>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     SOLUTIONS GRID
═══════════════════════════════════════════════════════════════ -->
<div id="solutions-grid">

<!-- 1. LIMO SERVICES -->
<article aria-labelledby="solution-limo-heading">
<section class="relative py-20 lg:py-24 overflow-hidden" style="background: #0A0A0A;">
    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-[1.05fr_1fr] gap-12 lg:gap-16 items-center">

            <div class="text-center lg:text-left">
                <div class="text-[11px] font-bold tracking-[0.14em] uppercase text-blue-400 mb-4">Solution for Limo Services</div>
                <h2 id="solution-limo-heading" class="text-3xl sm:text-4xl font-black tracking-tight leading-[1.15] mb-5 text-white">
                    Turn Phone-Based Limo Bookings Into an Automated Website
                </h2>

                <div class="mb-4 max-w-lg mx-auto lg:mx-0">
                    <div class="text-[11px] font-bold uppercase tracking-wide text-gray-500 mb-1.5">The Challenge</div>
                    <p class="text-gray-400 text-[15px] leading-relaxed">Manual phone bookings and paper schedules make it hard to look professional or scale.</p>
                </div>
                <div class="mb-7 max-w-lg mx-auto lg:mx-0">
                    <div class="text-[11px] font-bold uppercase tracking-wide text-blue-400 mb-1.5">How LimoSchedule Helps</div>
                    <p class="text-gray-300 text-[15px] leading-relaxed">A branded booking website and admin dashboard replace phone tag with automated online reservations and centralized dispatch.</p>
                </div>

                <ul class="grid grid-cols-2 gap-3 max-w-md mx-auto lg:mx-0 text-left mb-8">
                    <li class="flex items-center gap-2"><svg class="flex-shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] text-gray-300">Advanced Booking</span></li>
                    <li class="flex items-center gap-2"><svg class="flex-shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] text-gray-300">Fare Calculator</span></li>
                    <li class="flex items-center gap-2"><svg class="flex-shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] text-gray-300">White-Label Branding</span></li>
                    <li class="flex items-center gap-2"><svg class="flex-shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] text-gray-300">Admin Dashboard</span></li>
                </ul>

                <a href="{{ route('contact') }}" class="inline-flex items-center gap-1.5 font-semibold text-blue-400 hover:text-blue-300 transition-colors duration-200 text-[14px]">
                    Get Started With Limo Booking Software
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>

            <div class="max-w-md mx-auto lg:max-w-none">
                <div class="rounded-2xl overflow-hidden aspect-[4/3]" style="border: 1px solid rgba(59,130,246,0.2); box-shadow: 0 24px 70px rgba(0,0,0,0.5);">
                    <img src="{{ asset('public/assets/images/industries/limo-services.jpg') }}" alt="Limo service booking software showing an automated online reservation platform" width="1448" height="1086" class="w-full h-full object-cover" loading="lazy" decoding="async">
                </div>
            </div>

        </div>
    </div>
</section>
</article>

<!-- 2. BLACK CAR SERVICES -->
<article aria-labelledby="solution-blackcar-heading">
<section class="relative py-20 lg:py-24 overflow-hidden" style="background: #060606;">
    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-[1fr_1.05fr] gap-12 lg:gap-16 items-center">

            <div class="max-w-md mx-auto lg:max-w-none lg:order-1 order-2">
                <div class="rounded-2xl overflow-hidden aspect-[4/3]" style="border: 1px solid rgba(59,130,246,0.2); box-shadow: 0 24px 70px rgba(0,0,0,0.5);">
                    <img src="{{ asset('public/assets/images/industries/black-car-services.jpg') }}" alt="Black car service booking website with a premium self-service customer panel" width="1448" height="1086" class="w-full h-full object-cover" loading="lazy" decoding="async">
                </div>
            </div>

            <div class="text-center lg:text-left lg:order-2 order-1">
                <div class="text-[11px] font-bold tracking-[0.14em] uppercase text-blue-400 mb-4">Solution for Black Car Services</div>
                <h2 id="solution-blackcar-heading" class="text-3xl sm:text-4xl font-black tracking-tight leading-[1.15] mb-5 text-white">
                    Give Premium Clients a Booking Experience That Matches Your Service
                </h2>

                <div class="mb-4 max-w-lg mx-auto lg:mx-0">
                    <div class="text-[11px] font-bold uppercase tracking-wide text-gray-500 mb-1.5">The Challenge</div>
                    <p class="text-gray-400 text-[15px] leading-relaxed">Corporate and premium clients expect a polished, self-service reservation process &mdash; not a phone call.</p>
                </div>
                <div class="mb-7 max-w-lg mx-auto lg:mx-0">
                    <div class="text-[11px] font-bold uppercase tracking-wide text-blue-400 mb-1.5">How LimoSchedule Helps</div>
                    <p class="text-gray-300 text-[15px] leading-relaxed">A white-label booking website and customer panel let clients book, view and manage rides themselves, entirely under your own brand.</p>
                </div>

                <ul class="grid grid-cols-2 gap-3 max-w-md mx-auto lg:mx-0 text-left mb-8">
                    <li class="flex items-center gap-2"><svg class="flex-shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] text-gray-300">White-Label Branding</span></li>
                    <li class="flex items-center gap-2"><svg class="flex-shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] text-gray-300">Customer Panel</span></li>
                    <li class="flex items-center gap-2"><svg class="flex-shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] text-gray-300">Mobile Responsive</span></li>
                    <li class="flex items-center gap-2"><svg class="flex-shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] text-gray-300">Advanced Booking</span></li>
                </ul>

                <a href="{{ route('contact') }}" class="inline-flex items-center gap-1.5 font-semibold text-blue-400 hover:text-blue-300 transition-colors duration-200 text-[14px]">
                    Get Started With Black Car Booking Software
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>

        </div>
    </div>
</section>
</article>

<!-- 3. TAXI COMPANIES -->
<article aria-labelledby="solution-taxi-heading">
<section class="relative py-20 lg:py-24 overflow-hidden" style="background: #0A0A0A;">
    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-[1.05fr_1fr] gap-12 lg:gap-16 items-center">

            <div class="text-center lg:text-left">
                <div class="text-[11px] font-bold tracking-[0.14em] uppercase text-blue-400 mb-4">Solution for Taxi Companies</div>
                <h2 id="solution-taxi-heading" class="text-3xl sm:text-4xl font-black tracking-tight leading-[1.15] mb-5 text-white">
                    Connect Bookings, Dispatch and Drivers in One System
                </h2>

                <div class="mb-4 max-w-lg mx-auto lg:mx-0">
                    <div class="text-[11px] font-bold uppercase tracking-wide text-gray-500 mb-1.5">The Challenge</div>
                    <p class="text-gray-400 text-[15px] leading-relaxed">Juggling bookings, driver assignments and daily operations across separate tools slows dispatch down.</p>
                </div>
                <div class="mb-7 max-w-lg mx-auto lg:mx-0">
                    <div class="text-[11px] font-bold uppercase tracking-wide text-blue-400 mb-1.5">How LimoSchedule Helps</div>
                    <p class="text-gray-300 text-[15px] leading-relaxed">The admin dashboard and driver panel connect every booking straight to the right driver, with no manual re-entry.</p>
                </div>

                <ul class="grid grid-cols-2 gap-3 max-w-md mx-auto lg:mx-0 text-left mb-8">
                    <li class="flex items-center gap-2"><svg class="flex-shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] text-gray-300">Driver Panel</span></li>
                    <li class="flex items-center gap-2"><svg class="flex-shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] text-gray-300">Admin Dashboard</span></li>
                    <li class="flex items-center gap-2"><svg class="flex-shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] text-gray-300">Advanced Booking</span></li>
                    <li class="flex items-center gap-2"><svg class="flex-shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] text-gray-300">Fare Calculator</span></li>
                </ul>

                <a href="{{ route('contact') }}" class="inline-flex items-center gap-1.5 font-semibold text-blue-400 hover:text-blue-300 transition-colors duration-200 text-[14px]">
                    Get Started With Taxi Booking Software
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>

            <div class="max-w-md mx-auto lg:max-w-none">
                <div class="rounded-2xl overflow-hidden aspect-[4/3]" style="border: 1px solid rgba(59,130,246,0.2); box-shadow: 0 24px 70px rgba(0,0,0,0.5);">
                    <img src="{{ asset('public/assets/images/industries/taxi-companies.jpg') }}" alt="Taxi company dispatch software connecting bookings to drivers" width="1448" height="1086" class="w-full h-full object-cover" loading="lazy" decoding="async">
                </div>
            </div>

        </div>
    </div>
</section>
</article>

<!-- 4. CHAUFFEUR SERVICES -->
<article aria-labelledby="solution-chauffeur-heading">
<section class="relative py-20 lg:py-24 overflow-hidden" style="background: #060606;">
    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-[1fr_1.05fr] gap-12 lg:gap-16 items-center">

            <div class="max-w-md mx-auto lg:max-w-none lg:order-1 order-2">
                <div class="rounded-2xl overflow-hidden aspect-[4/3]" style="border: 1px solid rgba(59,130,246,0.2); box-shadow: 0 24px 70px rgba(0,0,0,0.5);">
                    <img src="{{ asset('public/assets/images/industries/chauffeur-services.jpg') }}" alt="Chauffeur service booking software tracking a trip from booking to drop-off" width="1448" height="1086" class="w-full h-full object-cover" loading="lazy" decoding="async">
                </div>
            </div>

            <div class="text-center lg:text-left lg:order-2 order-1">
                <div class="text-[11px] font-bold tracking-[0.14em] uppercase text-blue-400 mb-4">Solution for Chauffeur Services</div>
                <h2 id="solution-chauffeur-heading" class="text-3xl sm:text-4xl font-black tracking-tight leading-[1.15] mb-5 text-white">
                    Keep Every Trip Tracked From Booking to Drop-Off
                </h2>

                <div class="mb-4 max-w-lg mx-auto lg:mx-0">
                    <div class="text-[11px] font-bold uppercase tracking-wide text-gray-500 mb-1.5">The Challenge</div>
                    <p class="text-gray-400 text-[15px] leading-relaxed">Coordinating customers, drivers and bookings by hand leads to missed details and inconsistent service.</p>
                </div>
                <div class="mb-7 max-w-lg mx-auto lg:mx-0">
                    <div class="text-[11px] font-bold uppercase tracking-wide text-blue-400 mb-1.5">How LimoSchedule Helps</div>
                    <p class="text-gray-300 text-[15px] leading-relaxed">Customer, driver and admin panels stay connected, so every trip is tracked automatically from booking to completion.</p>
                </div>

                <ul class="grid grid-cols-2 gap-3 max-w-md mx-auto lg:mx-0 text-left mb-8">
                    <li class="flex items-center gap-2"><svg class="flex-shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] text-gray-300">Customer Panel</span></li>
                    <li class="flex items-center gap-2"><svg class="flex-shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] text-gray-300">Driver Panel</span></li>
                    <li class="flex items-center gap-2"><svg class="flex-shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] text-gray-300">Admin Dashboard</span></li>
                    <li class="flex items-center gap-2"><svg class="flex-shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] text-gray-300">White-Label Branding</span></li>
                </ul>

                <a href="{{ route('contact') }}" class="inline-flex items-center gap-1.5 font-semibold text-blue-400 hover:text-blue-300 transition-colors duration-200 text-[14px]">
                    Get Started With Chauffeur Booking Software
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>

        </div>
    </div>
</section>
</article>

<!-- 5. AIRPORT TRANSFER SERVICES -->
<article aria-labelledby="solution-airport-heading">
<section class="relative py-20 lg:py-24 overflow-hidden" style="background: #0A0A0A;">
    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-[1.05fr_1fr] gap-12 lg:gap-16 items-center">

            <div class="text-center lg:text-left">
                <div class="text-[11px] font-bold tracking-[0.14em] uppercase text-blue-400 mb-4">Solution for Airport Transfer Services</div>
                <h2 id="solution-airport-heading" class="text-3xl sm:text-4xl font-black tracking-tight leading-[1.15] mb-5 text-white">
                    Keep Every Pickup On Schedule, Every Time
                </h2>

                <div class="mb-4 max-w-lg mx-auto lg:mx-0">
                    <div class="text-[11px] font-bold uppercase tracking-wide text-gray-500 mb-1.5">The Challenge</div>
                    <p class="text-gray-400 text-[15px] leading-relaxed">Late pickups and scheduling mix-ups cost airport transfer businesses repeat customers.</p>
                </div>
                <div class="mb-7 max-w-lg mx-auto lg:mx-0">
                    <div class="text-[11px] font-bold uppercase tracking-wide text-blue-400 mb-1.5">How LimoSchedule Helps</div>
                    <p class="text-gray-300 text-[15px] leading-relaxed">Advanced booking and a connected driver panel keep pickup times accurate and visible to your whole team.</p>
                </div>

                <ul class="grid grid-cols-2 gap-3 max-w-md mx-auto lg:mx-0 text-left mb-8">
                    <li class="flex items-center gap-2"><svg class="flex-shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] text-gray-300">Advanced Booking</span></li>
                    <li class="flex items-center gap-2"><svg class="flex-shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] text-gray-300">Driver Panel</span></li>
                    <li class="flex items-center gap-2"><svg class="flex-shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] text-gray-300">Fare Calculator</span></li>
                    <li class="flex items-center gap-2"><svg class="flex-shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] text-gray-300">Mobile Responsive</span></li>
                </ul>

                <a href="{{ route('contact') }}" class="inline-flex items-center gap-1.5 font-semibold text-blue-400 hover:text-blue-300 transition-colors duration-200 text-[14px]">
                    Get Started With Airport Transfer Booking Software
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>

            <div class="max-w-md mx-auto lg:max-w-none">
                <div class="rounded-2xl overflow-hidden aspect-[4/3]" style="border: 1px solid rgba(59,130,246,0.2); box-shadow: 0 24px 70px rgba(0,0,0,0.5);">
                    <img src="{{ asset('public/assets/images/industries/airport-transfer.jpg') }}" alt="Airport transfer booking software showing an accurately scheduled pickup" width="1448" height="1086" class="w-full h-full object-cover" loading="lazy" decoding="async">
                </div>
            </div>

        </div>
    </div>
</section>
</article>

<!-- 6. CORPORATE TRAVEL -->
<article aria-labelledby="solution-corporate-heading">
<section class="relative py-20 lg:py-24 overflow-hidden" style="background: #060606;">
    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-[1fr_1.05fr] gap-12 lg:gap-16 items-center">

            <div class="max-w-md mx-auto lg:max-w-none lg:order-1 order-2">
                <div class="rounded-2xl overflow-hidden aspect-[4/3]" style="border: 1px solid rgba(59,130,246,0.2); box-shadow: 0 24px 70px rgba(0,0,0,0.5);">
                    <img src="{{ asset('public/assets/images/industries/corporate-travel.jpg') }}" alt="Corporate travel booking platform for managing business travel accounts" width="1448" height="1086" class="w-full h-full object-cover" loading="lazy" decoding="async">
                </div>
            </div>

            <div class="text-center lg:text-left lg:order-2 order-1">
                <div class="text-[11px] font-bold tracking-[0.14em] uppercase text-blue-400 mb-4">Solution for Corporate Travel</div>
                <h2 id="solution-corporate-heading" class="text-3xl sm:text-4xl font-black tracking-tight leading-[1.15] mb-5 text-white">
                    Give Business Accounts a Professional Booking Experience
                </h2>

                <div class="mb-4 max-w-lg mx-auto lg:mx-0">
                    <div class="text-[11px] font-bold uppercase tracking-wide text-gray-500 mb-1.5">The Challenge</div>
                    <p class="text-gray-400 text-[15px] leading-relaxed">Corporate clients expect a professional, always-available booking process with transparent pricing.</p>
                </div>
                <div class="mb-7 max-w-lg mx-auto lg:mx-0">
                    <div class="text-[11px] font-bold uppercase tracking-wide text-blue-400 mb-1.5">How LimoSchedule Helps</div>
                    <p class="text-gray-300 text-[15px] leading-relaxed">A branded, mobile-responsive booking website with multi-currency support keeps corporate accounts running smoothly worldwide.</p>
                </div>

                <ul class="grid grid-cols-2 gap-3 max-w-md mx-auto lg:mx-0 text-left mb-8">
                    <li class="flex items-center gap-2"><svg class="flex-shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] text-gray-300">Multi-Currency</span></li>
                    <li class="flex items-center gap-2"><svg class="flex-shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] text-gray-300">Multi-Language</span></li>
                    <li class="flex items-center gap-2"><svg class="flex-shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] text-gray-300">White-Label Branding</span></li>
                    <li class="flex items-center gap-2"><svg class="flex-shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] text-gray-300">Admin Dashboard</span></li>
                </ul>

                <a href="{{ route('contact') }}" class="inline-flex items-center gap-1.5 font-semibold text-blue-400 hover:text-blue-300 transition-colors duration-200 text-[14px]">
                    Get Started With Corporate Travel Booking Software
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>

        </div>
    </div>
</section>
</article>

</div>

<!-- ═══════════════════════════════════════════════════════════════
     MORE TO EXPLORE
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-16 overflow-hidden" style="background: #0A0A0A;">
    <div class="relative z-10 max-w-3xl mx-auto px-5 sm:px-6 lg:px-8 text-center">
        <p class="text-gray-500 text-[14px]">
            Not sure your business fits one of these categories? <a href="{{ route('features') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">Browse all features</a> or see <a href="{{ route('how-it-works') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">how LimoSchedule works</a> from setup to your first booking.
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
            Find the Right Booking Solution for Your Business
        </h2>
        <p class="text-gray-400 text-[15px] mb-9">
            One complete platform &middot; <a href="{{ route('pricing') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">$1,999 one-time payment</a> &middot; no monthly SaaS fee
        </p>

        <a href="https://wa.me/923460820722?text=Hi%2C%20I%27m%20interested%20in%20LimoSchedule%20for%20my%20transportation%20business.%20Can%20I%20talk%20to%20an%20expert%3F" target="_blank" rel="noopener"
           class="btn-cta inline-flex items-center justify-center gap-2.5 bg-[#3B82F6] text-white font-bold px-9 py-4 rounded-xl text-[15.5px] border border-blue-500/30 mb-5">
            <span>Talk to an Expert</span>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>

        <div class="text-[13px]">
            <span class="text-gray-500">Prefer to see it in action first?</span>
            <a href="{{ route('demo') }}" class="inline-flex items-center gap-1 font-semibold text-blue-400 hover:text-blue-300 transition-colors duration-200 ml-1">
                Explore the live demo
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>

        <p class="text-gray-600 text-[12.5px] mt-10">
            <a href="{{ route('platform') }}" class="text-gray-500 hover:text-white transition-colors duration-200">See the full platform</a> &middot;
            <a href="{{ route('contact') }}" class="text-gray-500 hover:text-white transition-colors duration-200">Get started</a>
        </p>
    </div>
</section>

@endsection
