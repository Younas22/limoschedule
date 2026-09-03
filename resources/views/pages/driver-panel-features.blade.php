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
        }
    ]
}
</script>
<style>
    #dp-page { background: #ffffff; }
    #dp-page * { box-sizing: border-box; }
    #dp-page .dp-eyebrow {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 7px 16px; border-radius: 999px;
        background: rgba(37,99,235,0.08); border: 1px solid rgba(37,99,235,0.22);
        color: #1D4ED8; font-size: 11px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase;
    }
    #dp-page .dp-h1 { color: #0F172A; font-weight: 800; letter-spacing: -0.02em; line-height: 1.08; }
    #dp-page .dp-h2 { color: #0F172A; font-weight: 800; letter-spacing: -0.015em; line-height: 1.15; }
    #dp-page .dp-h3 { color: #0F172A; font-weight: 700; }
    #dp-page .dp-body { color: #475569; }
    #dp-page .dp-muted { color: #64748B; }
    #dp-page .dp-section-soft { background: #F8FAFC; }
    #dp-page .dp-card {
        background: #ffffff; border: 1px solid rgba(15,23,42,0.08); border-radius: 16px;
        box-shadow: 0 10px 30px rgba(15,23,42,0.05);
        transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
    }
    #dp-page .dp-card:hover { transform: translateY(-3px); box-shadow: 0 16px 40px rgba(15,23,42,0.09); border-color: rgba(37,99,235,0.35); }
    #dp-page .dp-icon-box {
        width: 42px; height: 42px; border-radius: 12px; flex-shrink: 0;
        display: flex; align-items: center; justify-content: center;
        background: rgba(37,99,235,0.1); border: 1px solid rgba(37,99,235,0.2);
    }
    #dp-page .dp-figure {
        border-radius: 20px; overflow: hidden; border: 1px solid rgba(15,23,42,0.08);
        box-shadow: 0 30px 70px rgba(15,23,42,0.1);
    }
    #dp-page .dp-btn-primary {
        display: inline-flex; align-items: center; justify-content: center; gap: 8px;
        background: #2563EB; color: #fff; font-weight: 700; font-size: 15px;
        padding: 15px 30px; border-radius: 12px; border: 1px solid #1D4ED8;
        box-shadow: 0 10px 24px rgba(37,99,235,0.28);
        transition: background 0.2s ease, transform 0.2s ease;
    }
    #dp-page .dp-btn-primary:hover { background: #1D4ED8; transform: translateY(-1px); }
    #dp-page .dp-btn-secondary {
        display: inline-flex; align-items: center; justify-content: center; gap: 8px;
        background: #ffffff; color: #0F172A; font-weight: 700; font-size: 15px;
        padding: 15px 30px; border-radius: 12px; border: 1.5px solid rgba(15,23,42,0.14);
        transition: border-color 0.2s ease, background 0.2s ease;
    }
    #dp-page .dp-btn-secondary:hover { border-color: rgba(37,99,235,0.5); background: #F8FAFC; }
    #dp-page .dp-check { color: #2563EB; flex-shrink: 0; }
    #dp-page .dp-flow-step {
        background: #ffffff; border: 1px solid rgba(15,23,42,0.08); border-radius: 14px;
        padding: 13px 15px; display: flex; align-items: center; gap: 10px;
        box-shadow: 0 6px 16px rgba(15,23,42,0.05);
    }
    #dp-page .dp-arrow { color: #93A3B8; flex-shrink: 0; }
    #dp-page .dp-note {
        background: #EFF6FF; border: 1px solid rgba(37,99,235,0.18); border-radius: 12px;
        padding: 12px 16px; color: #1E3A8A; font-size: 12.5px; line-height: 1.6;
    }
</style>
@endpush

@section('content')

<div id="dp-page">

<!-- ═══════════════════════════════════════════════════════════════
     HERO
═══════════════════════════════════════════════════════════════ -->
<section class="relative overflow-hidden" style="background: linear-gradient(180deg, #F8FAFC 0%, #ffffff 60%);">
@php
    $breadcrumbs = [
        ['label' => 'Home', 'url' => url('/')],
        ['label' => 'Driver Panel', 'url' => null],
    ];
@endphp
<style>#dp-page nav[aria-label="Breadcrumb"] a, #dp-page nav[aria-label="Breadcrumb"] span { color: #64748B !important; }
#dp-page nav[aria-label="Breadcrumb"] a:hover { color: #0F172A !important; }
#dp-page nav[aria-label="Breadcrumb"] span[aria-current] { color: #0F172A !important; }</style>
@include('partials._breadcrumbs')

    <div class="relative z-10 max-w-4xl mx-auto px-5 sm:px-6 lg:px-8 pt-10 pb-14 lg:pt-14 lg:pb-16 text-center">
        <span class="dp-eyebrow mb-6">Driver Panel</span>

        <h1 class="dp-h1 text-4xl sm:text-5xl lg:text-[54px] mb-6">
            A Smarter Driver Panel for Every Ride
        </h1>

        <p class="dp-body text-[17px] sm:text-[18px] leading-relaxed max-w-2xl mx-auto mb-4">
            Give your drivers everything they need to manage assigned rides, track trip progress, monitor earnings, and stay connected &mdash; all from one simple dashboard.
        </p>
        <p class="dp-muted text-[14.5px] leading-relaxed max-w-2xl mx-auto mb-9">
            Built for daily chauffeur, limo, black car, taxi, and airport-transfer operations.
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="#dp-intro" class="dp-btn-primary w-full sm:w-auto">
                <span>Explore Driver Features</span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a href="{{ route('contact') }}" class="dp-btn-secondary w-full sm:w-auto">Get LimoSchedule</a>
        </div>
    </div>

    <div class="relative z-10 max-w-5xl mx-auto px-5 sm:px-6 lg:px-8 pb-16 lg:pb-24">
        <div class="absolute -top-10 left-1/2 -translate-x-1/2 w-[700px] h-[300px] pointer-events-none" style="background: radial-gradient(ellipse at 50% 0%, rgba(37,99,235,0.14) 0%, transparent 70%);"></div>
        <div class="dp-figure relative">
            <img src="{{ asset('public/assets/images/driver-panel-features/dp-dashboard.jpg') }}" alt="LimoSchedule driver dashboard showing online status, today's trips, earnings, completed trips and average rating" width="1254" height="1254" class="w-full h-auto block" loading="eager" fetchpriority="high" decoding="sync">
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     DRIVER EXPERIENCE INTRODUCTION
═══════════════════════════════════════════════════════════════ -->
<section id="dp-intro" class="relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14">
            <h2 class="dp-h2 text-3xl sm:text-4xl mb-4">Everything a Driver Needs. Nothing They Don&rsquo;t.</h2>
            <p class="dp-body text-[15.5px] leading-relaxed">Drivers get a focused interface for managing their assigned rides, availability, trip progress, customer contact, notifications, earnings and profile settings.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <div class="dp-card p-6">
                <div class="dp-icon-box mb-4">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2563EB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                </div>
                <h3 class="dp-h3 text-[15.5px] mb-2">One-Tap Availability</h3>
                <p class="dp-body text-[13px] leading-relaxed">Go online or offline in a single tap, right from the dashboard.</p>
            </div>
            <div class="dp-card p-6">
                <div class="dp-icon-box mb-4">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2563EB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                </div>
                <h3 class="dp-h3 text-[15.5px] mb-2">Assigned Rides</h3>
                <p class="dp-body text-[13px] leading-relaxed">A clear list of assigned bookings with all the trip details drivers need.</p>
            </div>
            <div class="dp-card p-6">
                <div class="dp-icon-box mb-4">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2563EB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M2 11h20"/></svg>
                </div>
                <h3 class="dp-h3 text-[15.5px] mb-2">Earnings &amp; Notifications</h3>
                <p class="dp-body text-[13px] leading-relaxed">Track calculated earnings and stay updated with real-time alerts.</p>
            </div>
            <div class="dp-card p-6">
                <div class="dp-icon-box mb-4">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2563EB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 11-2.83 2.83l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 11-2.83-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 112.83-2.83l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 112.83 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/></svg>
                </div>
                <h3 class="dp-h3 text-[15.5px] mb-2">Profile &amp; Preferences</h3>
                <p class="dp-body text-[13px] leading-relaxed">Drivers manage their own profile, password, language and theme.</p>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     DRIVER DASHBOARD
═══════════════════════════════════════════════════════════════ -->
<section class="dp-section-soft relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">

            <div>
                <span class="dp-eyebrow mb-5">Dashboard</span>
                <h2 class="dp-h2 text-3xl sm:text-4xl mb-5">A Clear View of Every Driving Day</h2>
                <p class="dp-body text-[15.5px] leading-relaxed mb-7">A personalized dashboard gives drivers the information they need the moment they sign in &mdash; from availability to today&rsquo;s trips.</p>

                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                    @foreach(['Personalized greeting','Online / offline control','Current ride','Next ride','Today\'s Trips','Month Earnings','Completed Trips','Average Rating','Assigned ride information','Unread notifications'] as $item)
                    <li class="flex items-center gap-2"><svg class="dp-check" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] dp-body">{{ $item }}</span></li>
                    @endforeach
                </ul>
            </div>

            <div class="dp-figure">
                <img src="{{ asset('public/assets/images/driver-panel-features/dp-dashboard.jpg') }}" alt="LimoSchedule driver dashboard with today's trips, month earnings, completed trips and average rating stat tiles" width="1254" height="1254" class="w-full h-auto block" loading="lazy" decoding="async">
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     AVAILABILITY + LIVE GPS
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-10">
            <span class="dp-eyebrow mb-5">Availability &amp; GPS</span>
            <h2 class="dp-h2 text-3xl sm:text-4xl mb-4">Control Availability. Stay Connected.</h2>
            <p class="dp-body text-[15.5px] leading-relaxed">Drivers switch between Online and Offline with one tap. While online, the browser periodically reports the driver&rsquo;s GPS location to support dispatch and ETA calculations.</p>
        </div>

        <div class="flex flex-wrap items-center justify-center gap-2.5 mb-12">
            @foreach(['Online','GPS Location Reporting','Dispatch / ETA Information'] as $step)
                <div class="dp-flow-step"><span class="text-[13px] font-semibold" style="color:#0F172A;">{{ $step }}</span></div>
                @if(!$loop->last)
                <svg class="dp-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                @endif
            @endforeach
        </div>

        <div class="dp-figure mb-10 max-w-4xl mx-auto">
            <img src="{{ asset('public/assets/images/driver-panel-features/dp-availability-gps.jpg') }}" alt="LimoSchedule driver availability toggle and live GPS reporting while online" width="1254" height="1254" class="w-full h-auto block" loading="lazy" decoding="async">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3.5">
            @foreach(['Online / Offline Toggle','Admin Notified on Change','GPS Reporting While Online','Auto-Unavailable During a Ride'] as $item)
            <div class="dp-card px-4 py-4 text-center">
                <span class="text-[12.5px] font-semibold" style="color:#0F172A;">{{ $item }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     ASSIGNED BOOKINGS
═══════════════════════════════════════════════════════════════ -->
<section class="dp-section-soft relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">

            <div class="dp-figure order-2 lg:order-1">
                <img src="{{ asset('public/assets/images/driver-panel-features/dp-assigned-bookings.jpg') }}" alt="LimoSchedule assigned booking detail with pickup, drop-off, customer, vehicle, date, time and fare" width="1254" height="1254" class="w-full h-auto block" loading="lazy" decoding="async">
            </div>

            <div class="order-1 lg:order-2">
                <span class="dp-eyebrow mb-5">Assigned Bookings</span>
                <h2 class="dp-h2 text-3xl sm:text-4xl mb-5">Every Assigned Ride, Clearly Organized</h2>
                <p class="dp-body text-[15.5px] leading-relaxed mb-6">Drivers see their assigned bookings and the relevant trip details for each ride.</p>

                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 mb-6">
                    @foreach(['Pickup','Drop-off','Stops','Customer name','Customer phone','Vehicle','Date & time','Fare & booking info'] as $item)
                    <li class="flex items-center gap-2"><svg class="dp-check" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] dp-body">{{ $item }}</span></li>
                    @endforeach
                </ul>

                <div class="dp-note">
                    No complicated dispatch workflow. Drivers see the rides assigned to them and the information they need to complete them &mdash; there is no accept/decline step.
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     TRIP WORKFLOW
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-10">
            <span class="dp-eyebrow mb-5">Trip Workflow</span>
            <h2 class="dp-h2 text-3xl sm:text-4xl mb-4">A Simple Ride Workflow</h2>
            <p class="dp-body text-[15.5px] leading-relaxed">From an assigned booking to a completed ride, drivers follow a short, predictable lifecycle.</p>
        </div>

        <div class="flex flex-wrap items-center justify-center gap-2.5 mb-4">
            @foreach(['Assigned','Start Ride','In Progress','Complete Ride','Completed'] as $status)
                <div class="dp-flow-step"><span class="text-[13px] font-semibold" style="color:#0F172A;">{{ $status }}</span></div>
                @if(!$loop->last)
                <svg class="dp-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                @endif
            @endforeach
        </div>
        <p class="text-center text-[12.5px] dp-muted mb-12">Start Ride and Complete Ride are the only two actions a driver takes &mdash; there is no accept/reject step.</p>

        <div class="dp-figure max-w-4xl mx-auto">
            <img src="{{ asset('public/assets/images/driver-panel-features/dp-trip-workflow.jpg') }}" alt="LimoSchedule driver trip workflow from booking assigned through start ride, in progress, complete ride and completed" width="1254" height="1254" class="w-full h-auto block" loading="lazy" decoding="async">
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     GPS, DISTANCE & ETA
═══════════════════════════════════════════════════════════════ -->
<section class="dp-section-soft relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">

            <div>
                <span class="dp-eyebrow mb-5">Distance &amp; ETA</span>
                <h2 class="dp-h2 text-3xl sm:text-4xl mb-5">Useful ETA &amp; Distance Information</h2>
                <p class="dp-body text-[15.5px] leading-relaxed mb-6">Google Distance Matrix powers distance and time calculations, so drivers get useful trip-timing information right in the panel.</p>

                <ul class="grid grid-cols-1 gap-2.5 mb-6">
                    @foreach(['Distance and time calculations via Google Distance Matrix','Browser GPS reporting supports dispatch-related location data','Estimated arrival time calculated when a ride starts'] as $item)
                    <li class="flex items-start gap-2"><svg class="dp-check mt-0.5" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] dp-body">{{ $item }}</span></li>
                    @endforeach
                </ul>

                <div class="dp-note">
                    <strong>LimoSchedule Driver Panel:</strong> distance &amp; ETA information, not embedded turn-by-turn navigation. Drivers use their own phone&rsquo;s preferred map app for actual driving directions.
                </div>
            </div>

            <div class="dp-figure">
                <img src="{{ asset('public/assets/images/driver-panel-features/dp-distance-eta.jpg') }}" alt="LimoSchedule distance and ETA calculation using Google Distance Matrix from driver location to pickup and drop-off" width="1254" height="1254" class="w-full h-auto block" loading="lazy" decoding="async">
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     DRIVER EARNINGS
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="dp-eyebrow mb-5">Earnings</span>
            <h2 class="dp-h2 text-3xl sm:text-4xl mb-4">Know What You&rsquo;re Earning</h2>
            <p class="dp-body text-[15.5px] leading-relaxed">Driver earnings are calculated from paid bookings using the commission rate configured by the admin.</p>
        </div>

        <div class="dp-figure mb-10 max-w-4xl mx-auto">
            <img src="{{ asset('public/assets/images/driver-panel-features/dp-earnings.jpg') }}" alt="LimoSchedule driver earnings showing this month, last month, all-time total and per-booking earnings" width="1254" height="1254" class="w-full h-auto block" loading="lazy" decoding="async">
        </div>

        <div class="flex flex-wrap items-center justify-center gap-3 mb-4">
            <div class="dp-card px-5 py-4 text-center min-w-[140px]">
                <p class="text-[11px] font-semibold uppercase tracking-wide dp-muted mb-1">Paid Booking Fare</p>
                <p class="dp-h3 text-lg">$145.00</p>
            </div>
            <span class="dp-muted text-xl font-bold">&times;</span>
            <div class="dp-card px-5 py-4 text-center min-w-[140px]">
                <p class="text-[11px] font-semibold uppercase tracking-wide dp-muted mb-1">Commission Rate</p>
                <p class="dp-h3 text-lg">20%</p>
            </div>
            <span class="dp-muted text-xl font-bold">=</span>
            <div class="dp-card px-5 py-4 text-center min-w-[140px]" style="border-color: rgba(37,99,235,0.3);">
                <p class="text-[11px] font-semibold uppercase tracking-wide dp-muted mb-1">Driver Earnings</p>
                <p class="dp-h3 text-lg" style="color:#2563EB;">$29.00</p>
            </div>
        </div>
        <p class="text-center text-[12px] dp-muted mb-10">Illustrative example only. Actual fares and commission rates vary per driver and booking.</p>

        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3.5 max-w-2xl mx-auto mb-8">
            @foreach(['This Month','Last Month','All-Time','Per-Booking'] as $item)
            <div class="dp-card px-4 py-4 text-center">
                <span class="text-[12.5px] font-semibold" style="color:#0F172A;">{{ $item }}</span>
            </div>
            @endforeach
        </div>

        <div class="dp-note max-w-3xl mx-auto text-center">
            Earnings shown here are a calculated statement for the driver&rsquo;s own reference. There is no payout processing, withdrawal request, or bank account management within the Driver Panel.
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     CUSTOMER CONTACT & TRIP NOTES
═══════════════════════════════════════════════════════════════ -->
<section class="dp-section-soft relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">

            <div class="dp-figure order-2 lg:order-1">
                <img src="{{ asset('public/assets/images/driver-panel-features/dp-customer-contact.jpg') }}" alt="LimoSchedule assigned ride showing customer name, call passenger link and trip notes" width="1254" height="1254" class="w-full h-auto block" loading="lazy" decoding="async">
            </div>

            <div class="order-1 lg:order-2">
                <span class="dp-eyebrow mb-5">Customer Contact</span>
                <h2 class="dp-h2 text-3xl sm:text-4xl mb-5">Customer Details When You Need Them</h2>
                <p class="dp-body text-[15.5px] leading-relaxed mb-6">Assigned rides provide the customer information a driver needs for a smooth pickup.</p>

                <ul class="grid grid-cols-1 gap-2.5 mb-6">
                    @foreach(['Customer name','Customer phone number','Direct phone / tel link','Trip notes for special instructions'] as $item)
                    <li class="flex items-center gap-2"><svg class="dp-check" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] dp-body">{{ $item }}</span></li>
                    @endforeach
                </ul>

                <div class="flex items-center gap-2 mb-6">
                    <span class="text-[11px] font-bold uppercase tracking-wide px-3 py-1.5 rounded-full" style="background:#EFF6FF; color:#1D4ED8; border:1px solid rgba(37,99,235,0.25);">One Tap to Call</span>
                </div>

                <div class="dp-note">
                    Contact is a direct phone call, not in-app chat. There is no driver&ndash;customer messaging interface in the Driver Panel.
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     DRIVER NOTIFICATIONS
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">

            <div>
                <span class="dp-eyebrow mb-5">Notifications</span>
                <h2 class="dp-h2 text-3xl sm:text-4xl mb-5">Never Miss an Important Ride Update</h2>
                <p class="dp-body text-[15.5px] leading-relaxed mb-6">Browser push notifications can be enabled from the Driver Panel, alongside a full in-app notification center.</p>

                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2 mb-6">
                    @foreach(['In-app notification center','Browser push notifications','Notification enable control','Admin-controlled events','Optional custom notification sound'] as $item)
                    <li class="flex items-center gap-2"><svg class="dp-check" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] dp-body">{{ $item }}</span></li>
                    @endforeach
                </ul>

                <div class="flex flex-wrap gap-2">
                    @foreach(['New Booking Assigned','Booking Updated','Booking Cancelled','Pickup Reminder','Customer Update','Payment / Trip Update','Dispatch Update'] as $event)
                    <span class="text-[11.5px] font-medium px-2.5 py-1 rounded-full" style="background:#EFF6FF; color:#1D4ED8; border:1px solid rgba(37,99,235,0.2);">{{ $event }}</span>
                    @endforeach
                </div>
            </div>

            <div class="dp-figure">
                <img src="{{ asset('public/assets/images/driver-panel-features/dp-notifications.jpg') }}" alt="LimoSchedule driver notification preferences with browser push notifications and notification sound" width="1254" height="1254" class="w-full h-auto block" loading="lazy" decoding="async">
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     DRIVER PROFILE & PREFERENCES
═══════════════════════════════════════════════════════════════ -->
<section class="dp-section-soft relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">

            <div class="dp-figure order-2 lg:order-1">
                <img src="{{ asset('public/assets/images/driver-panel-features/dp-profile.jpg') }}" alt="LimoSchedule driver profile settings with contact information, vehicle details and preferences" width="1254" height="1254" class="w-full h-auto block" loading="lazy" decoding="async">
            </div>

            <div class="order-1 lg:order-2">
                <span class="dp-eyebrow mb-5">Profile &amp; Preferences</span>
                <h2 class="dp-h2 text-3xl sm:text-4xl mb-5">Keep Driver Information Up to Date</h2>
                <p class="dp-body text-[15.5px] leading-relaxed mb-6">Drivers manage their own profile and account preferences from the panel.</p>

                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 mb-6">
                    @foreach(['Name, email & phone','Address','Profile photo','License / passport / national ID','Password','Language','Theme'] as $item)
                    <li class="flex items-center gap-2"><svg class="dp-check" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] dp-body">{{ $item }}</span></li>
                    @endforeach
                </ul>

                <div class="dp-note">
                    License, passport and national ID are reference text fields on the driver profile &mdash; the panel does not include document upload or a verification workflow.
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     MOBILE-FIRST DRIVER EXPERIENCE
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-10">
            <span class="dp-eyebrow mb-5">Mobile Experience</span>
            <h2 class="dp-h2 text-3xl sm:text-4xl mb-4">Built for Drivers on the Move</h2>
            <p class="dp-body text-[15.5px] leading-relaxed">The Driver Panel is a responsive web application that works across desktop, tablet and mobile browsers.</p>
        </div>

        <div class="flex justify-center mb-10">
            <span class="text-[11px] font-bold uppercase tracking-wide px-4 py-2 rounded-full" style="background:#EFF6FF; color:#1D4ED8; border:1px solid rgba(37,99,235,0.25);">Responsive Web-Based Driver Panel</span>
        </div>

        <div class="dp-figure mb-12 max-w-4xl mx-auto">
            <img src="{{ asset('public/assets/images/driver-panel-features/dp-complete-experience.jpg') }}" alt="LimoSchedule driver panel shown responsively across desktop, tablet and mobile screens" width="1254" height="1254" class="w-full h-auto block" loading="lazy" decoding="async">
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
            @foreach(['Responsive Dashboard','Mobile-Friendly Controls','Compact Layouts','Easy Access While Working'] as $item)
            <div class="rounded-xl px-3 py-3 text-center" style="background:#fff; border:1px solid rgba(15,23,42,0.08);">
                <span class="text-[12px] font-semibold" style="color:#0F172A;">{{ $item }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     COMPLETE DRIVER JOURNEY
═══════════════════════════════════════════════════════════════ -->
<section class="dp-section-soft relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-10">
            <span class="dp-eyebrow mb-5">Driver Journey</span>
            <h2 class="dp-h2 text-3xl sm:text-4xl">The Complete Driver Experience</h2>
        </div>

        <div class="flex flex-wrap items-center justify-center gap-2 mb-12">
            @foreach(['Go Online','Receive Assigned Ride','View Trip Details','Check Distance / ETA','Start Ride','In Progress','Complete Ride','Track Earnings','Receive Updates'] as $step)
                <div class="dp-flow-step"><span class="text-[12.5px] font-semibold" style="color:#0F172A;">{{ $step }}</span></div>
                @if(!$loop->last)
                <svg class="dp-arrow" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                @endif
            @endforeach
        </div>

        <div class="dp-figure max-w-5xl mx-auto">
            <img src="{{ asset('public/assets/images/driver-panel-features/dp-complete-experience.jpg') }}" alt="Complete LimoSchedule driver experience from going online through assigned rides, trip execution, earnings and notifications" width="1254" height="1254" class="w-full h-auto block" loading="lazy" decoding="async">
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     FEATURE GRID
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="dp-eyebrow mb-5">Full Overview</span>
            <h2 class="dp-h2 text-3xl sm:text-4xl">Everything Your Drivers Need</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @php
                $dpFeatures = [
                    ['Driver Dashboard', 'A live daily overview of trips, earnings, completed rides and rating.'],
                    ['Online / Offline Availability', 'One-tap control over when a driver is ready to receive rides.'],
                    ['Browser GPS Reporting', 'Live location reporting while online supports dispatch and ETA.'],
                    ['Assigned Bookings', 'A clear list of rides assigned to the driver, with full trip details.'],
                    ['Trip Status Management', 'Start Ride and Complete Ride update the booking status instantly.'],
                    ['Distance & ETA', 'Google Distance Matrix–powered distance and arrival-time information.'],
                    ['Driver Earnings', 'Commission-based earnings, calculated from paid bookings.'],
                    ['Customer Contact', 'Direct call access to the customer for an assigned ride.'],
                    ['Trip Notes', 'Special instructions shared for each booking.'],
                    ['Notifications', 'An in-app notification center for every ride update.'],
                    ['Browser Push', 'Real-time push alerts for new and updated assignments.'],
                    ['Driver Profile', 'Manage personal information, vehicle reference and contact details.'],
                    ['Language Preferences', 'Choose a preferred display language for the panel.'],
                    ['Theme Preferences', 'Switch between light and dark appearance.'],
                    ['Responsive Web Experience', 'A consistent Driver Panel across desktop, tablet and mobile.'],
                ];
            @endphp
            @foreach($dpFeatures as [$title, $desc])
            <div class="dp-card p-6">
                <div class="dp-icon-box mb-4">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2563EB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                </div>
                <h3 class="dp-h3 text-[15px] mb-2">{{ $title }}</h3>
                <p class="dp-body text-[13px] leading-relaxed">{{ $desc }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     DRIVER PANEL BENEFITS FOR OPERATORS
═══════════════════════════════════════════════════════════════ -->
<section class="dp-section-soft relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14">
            <span class="dp-eyebrow mb-5">For Operators</span>
            <h2 class="dp-h2 text-3xl sm:text-4xl">Better Driver Operations. Better Customer Experience.</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @php
                $dpBenefits = [
                    ['Faster Dispatch Visibility', 'Drivers can see assigned rides and important trip information right away.'],
                    ['Better Ride Coordination', 'Availability and GPS reporting support day-to-day dispatch operations.'],
                    ['Clear Trip Progress', 'Drivers follow a straightforward Assigned → Start → In Progress → Complete lifecycle.'],
                    ['Better Driver Visibility', 'Owners and admins manage driver availability and ride assignments from the overall system.'],
                    ['Transparent Earnings', 'Drivers see calculated earnings based on paid bookings and their configured commission.'],
                    ['Fewer Missed Updates', 'Browser push and in-app notifications help drivers stay informed on every assignment.'],
                ];
            @endphp
            @foreach($dpBenefits as [$title, $desc])
            <div class="dp-card p-6">
                <h3 class="dp-h3 text-[15.5px] mb-2">{{ $title }}</h3>
                <p class="dp-body text-[13px] leading-relaxed">{{ $desc }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     SECURITY & ACCOUNT MANAGEMENT
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-24">
    <div class="max-w-4xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <span class="dp-eyebrow mb-5">Security</span>
            <h2 class="dp-h2 text-3xl sm:text-4xl">Secure, Role-Specific Driver Access</h2>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 gap-3.5">
            @foreach(['Secure Driver Login','Password Management','Role-Specific Authentication','Language Preferences','Theme Preferences','Account Profile Management'] as $item)
            <div class="dp-card px-4 py-4 text-center">
                <span class="text-[12.5px] font-semibold" style="color:#0F172A;">{{ $item }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     FINAL DRIVER PANEL SUMMARY
═══════════════════════════════════════════════════════════════ -->
<section class="dp-section-soft relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <h2 class="dp-h2 text-3xl sm:text-4xl mb-4">One Driver Panel. Every Ride Under Control.</h2>
            <p class="dp-body text-[15.5px] leading-relaxed">From availability and assigned bookings to trip progress, ETA information, earnings, customer contact and notifications &mdash; LimoSchedule gives drivers a focused workspace built around the way they work.</p>
        </div>

        <div class="dp-figure max-w-3xl mx-auto">
            <img src="{{ asset('public/assets/images/driver-panel-features/dp-dashboard.jpg') }}" alt="LimoSchedule driver panel summary dashboard view" width="1254" height="1254" class="w-full h-auto block" loading="lazy" decoding="async">
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     FINAL CTA
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-24 lg:py-28 overflow-hidden" style="background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%);">
    <div class="absolute inset-0 pointer-events-none" style="background-image: radial-gradient(ellipse at 50% 0%, rgba(37,99,235,0.25) 0%, transparent 60%);"></div>
    <div class="relative z-10 max-w-3xl mx-auto px-5 sm:px-6 lg:px-8 text-center">
        <h2 class="text-white font-extrabold tracking-tight leading-[1.12] mb-6" style="font-size: clamp(2rem, 4.5vw, 3.1rem);">
            Give Your Drivers a Better Way to Work
        </h2>
        <p class="text-gray-300 text-[16px] leading-relaxed mb-10 max-w-xl mx-auto">
            Launch a complete limo, taxi, chauffeur, and airport-transfer booking system with a dedicated Driver Panel built into LimoSchedule.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="{{ route('contact') }}" class="dp-btn-primary w-full sm:w-auto">
                <span>Get LimoSchedule</span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a href="{{ route('features') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 font-bold px-8 py-4 rounded-xl text-[15px] text-white transition-all duration-200 hover:bg-white/10" style="background: rgba(255,255,255,0.06); border: 1.5px solid rgba(255,255,255,0.25);">
                Explore All Features
            </a>
        </div>
        <p class="text-gray-400 text-[13px] mt-8">
            Also see the <a href="{{ route('website-features') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">Website Features</a> and <a href="{{ route('customer-panel-features') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">Customer Panel Features</a>.
        </p>
    </div>
</section>

</div>

@endsection
