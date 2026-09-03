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
    #wf-page { background: #ffffff; }
    #wf-page * { box-sizing: border-box; }
    #wf-page .wf-eyebrow {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 7px 16px; border-radius: 999px;
        background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.22);
        color: #1D4ED8; font-size: 11px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase;
    }
    #wf-page .wf-h1 { color: #0B1220; font-weight: 800; letter-spacing: -0.02em; line-height: 1.08; }
    #wf-page .wf-h2 { color: #0B1220; font-weight: 800; letter-spacing: -0.015em; line-height: 1.15; }
    #wf-page .wf-h3 { color: #0B1220; font-weight: 700; }
    #wf-page .wf-body { color: #4B5563; }
    #wf-page .wf-muted { color: #6B7280; }
    #wf-page .wf-section-soft { background: #F6F8FC; }
    #wf-page .wf-card {
        background: #ffffff; border: 1px solid rgba(15,23,42,0.08); border-radius: 16px;
        box-shadow: 0 10px 30px rgba(15,23,42,0.05);
        transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
    }
    #wf-page .wf-card:hover { transform: translateY(-3px); box-shadow: 0 16px 40px rgba(15,23,42,0.09); border-color: rgba(59,130,246,0.35); }
    #wf-page .wf-icon-box {
        width: 42px; height: 42px; border-radius: 12px; flex-shrink: 0;
        display: flex; align-items: center; justify-content: center;
        background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.2);
    }
    #wf-page .wf-figure {
        border-radius: 20px; overflow: hidden; border: 1px solid rgba(15,23,42,0.08);
        box-shadow: 0 30px 70px rgba(15,23,42,0.1);
    }
    #wf-page .wf-btn-primary {
        display: inline-flex; align-items: center; justify-content: center; gap: 8px;
        background: #2563EB; color: #fff; font-weight: 700; font-size: 15px;
        padding: 15px 30px; border-radius: 12px; border: 1px solid #1D4ED8;
        box-shadow: 0 10px 24px rgba(37,99,235,0.28);
        transition: background 0.2s ease, transform 0.2s ease;
    }
    #wf-page .wf-btn-primary:hover { background: #1D4ED8; transform: translateY(-1px); }
    #wf-page .wf-btn-secondary {
        display: inline-flex; align-items: center; justify-content: center; gap: 8px;
        background: #ffffff; color: #0B1220; font-weight: 700; font-size: 15px;
        padding: 15px 30px; border-radius: 12px; border: 1.5px solid rgba(15,23,42,0.14);
        transition: border-color 0.2s ease, background 0.2s ease;
    }
    #wf-page .wf-btn-secondary:hover { border-color: rgba(37,99,235,0.5); background: #F6F8FC; }
    #wf-page .wf-check { color: #16A34A; flex-shrink: 0; }
    #wf-page .wf-soon-badge {
        display: inline-flex; align-items: center; gap: 5px;
        background: rgba(234,179,8,0.12); border: 1px solid rgba(234,179,8,0.35); color: #92640A;
        font-size: 10.5px; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase;
        padding: 3px 9px; border-radius: 999px;
    }
    #wf-page .wf-not-avail {
        color: #9CA3AF; text-decoration: line-through; text-decoration-color: rgba(156,163,175,0.6);
    }
    #wf-page .wf-flow-step {
        background: #ffffff; border: 1px solid rgba(15,23,42,0.08); border-radius: 14px;
        padding: 14px 16px; display: flex; align-items: center; gap: 10px;
        box-shadow: 0 6px 16px rgba(15,23,42,0.05);
    }
    #wf-page .wf-arrow { color: #93A3B8; flex-shrink: 0; }
</style>
@endpush

@section('content')

<div id="wf-page">

<!-- ═══════════════════════════════════════════════════════════════
     HERO
═══════════════════════════════════════════════════════════════ -->
<section class="relative overflow-hidden" style="background: linear-gradient(180deg, #F6F8FC 0%, #ffffff 60%);">
@php
    $breadcrumbs = [
        ['label' => 'Home', 'url' => url('/')],
        ['label' => 'Website Features', 'url' => null],
    ];
@endphp
<div style="filter: none;">
@include('partials._breadcrumbs')
</div>
<style>#wf-page nav[aria-label="Breadcrumb"] a, #wf-page nav[aria-label="Breadcrumb"] span { color: #6B7280 !important; }
#wf-page nav[aria-label="Breadcrumb"] a:hover { color: #0B1220 !important; }
#wf-page nav[aria-label="Breadcrumb"] span[aria-current] { color: #0B1220 !important; }</style>

    <div class="relative z-10 max-w-4xl mx-auto px-5 sm:px-6 lg:px-8 pt-10 pb-14 lg:pt-14 lg:pb-16 text-center">
        <span class="wf-eyebrow mb-6">Public Website</span>

        <h1 class="wf-h1 text-4xl sm:text-5xl lg:text-[56px] mb-6">
            More Than a Website.<br class="hidden sm:block"> A Complete Online Booking Experience.
        </h1>

        <p class="wf-body text-[17px] sm:text-[18px] leading-relaxed max-w-2xl mx-auto mb-9">
            LimoSchedule gives your limo, chauffeur or transportation business a powerful public website built to showcase your services, capture bookings, calculate fares and turn visitors into customers.
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-3 mb-7">
            <a href="{{ route('contact') }}" class="wf-btn-primary w-full sm:w-auto">
                <span>Book a Demo</span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a href="#wf-overview" class="wf-btn-secondary w-full sm:w-auto">Explore Features</a>
        </div>

        <p class="wf-muted text-[12.5px] font-medium">
            Guest Booking &middot; Live Fare Quotes &middot; Fleet Showcase &middot; Multi-Language &middot; SEO Ready
        </p>
    </div>

    <div class="relative z-10 max-w-5xl mx-auto px-5 sm:px-6 lg:px-8 pb-16 lg:pb-24">
        <div class="wf-figure">
            <img src="{{ asset('public/assets/images/website-features/wf-hero-overview.jpg') }}" alt="LimoSchedule public website shown on a laptop, with booking, fleet, blog and SEO features highlighted" width="1536" height="1024" class="w-full h-auto block" loading="eager" fetchpriority="high" decoding="sync">
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     WEBSITE OVERVIEW
═══════════════════════════════════════════════════════════════ -->
<section id="wf-overview" class="relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14">
            <span class="wf-eyebrow mb-5">Overview</span>
            <h2 class="wf-h2 text-3xl sm:text-4xl">Everything Your Transportation Business Needs Online</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="wf-card p-7">
                <div class="wf-icon-box mb-5">
                    <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="#2563EB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><path d="M9 22V12h6v10"/></svg>
                </div>
                <h3 class="wf-h3 text-[17px] mb-2.5">Showcase Your Business</h3>
                <p class="wf-body text-[14px] leading-relaxed">Present your services and fleet on a professional, fully branded website that builds trust from the first visit.</p>
            </div>
            <div class="wf-card p-7">
                <div class="wf-icon-box mb-5">
                    <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="#2563EB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/><path d="M9 16l2 2 4-4"/></svg>
                </div>
                <h3 class="wf-h3 text-[17px] mb-2.5">Book Without an Account</h3>
                <p class="wf-body text-[14px] leading-relaxed">Visitors can request or book a ride instantly as a guest &mdash; no registration required to get moving.</p>
            </div>
            <div class="wf-card p-7">
                <div class="wf-icon-box mb-5">
                    <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="#2563EB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                </div>
                <h3 class="wf-h3 text-[17px] mb-2.5">Give Customers a Panel</h3>
                <p class="wf-body text-[14px] leading-relaxed">Existing customers sign in to their own secure account to manage bookings and details.</p>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     ONLINE BOOKING
═══════════════════════════════════════════════════════════════ -->
<section class="wf-section-soft relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">

            <div>
                <span class="wf-eyebrow mb-5">Online Booking</span>
                <h2 class="wf-h2 text-3xl sm:text-4xl mb-5">Turn Website Visitors Into Bookings</h2>
                <p class="wf-body text-[15.5px] leading-relaxed mb-8">
                    Guest booking is fully built in &mdash; visitors can request a ride without creating an account, and every detail feeds straight into a live, accurate fare.
                </p>

                <div class="space-y-5">
                    <div>
                        <h3 class="wf-h3 text-[13.5px] uppercase tracking-wide mb-2" style="color:#2563EB;">Trip Types</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach(['One Way','Round Trip','Hourly','Airport Transfer'] as $item)
                            <span class="inline-flex items-center gap-1.5 text-[13px] font-medium wf-body px-3 py-1.5 rounded-full" style="background:#fff;border:1px solid rgba(15,23,42,0.1);">{{ $item }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <h3 class="wf-h3 text-[13.5px] uppercase tracking-wide mb-2" style="color:#2563EB;">Route &amp; Stops</h3>
                        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                            @foreach(['Pickup & Drop-off','Google Places Autocomplete','Unlimited Stops','Date & Time'] as $item)
                            <li class="flex items-center gap-2"><svg class="wf-check" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] wf-body">{{ $item }}</span></li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        <h3 class="wf-h3 text-[13.5px] uppercase tracking-wide mb-2" style="color:#2563EB;">Trip Details</h3>
                        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                            @foreach(['Vehicle Selection','Passenger Count','Luggage Count','Waiting Time & Toll Options'] as $item)
                            <li class="flex items-center gap-2"><svg class="wf-check" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] wf-body">{{ $item }}</span></li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        <h3 class="wf-h3 text-[13.5px] uppercase tracking-wide mb-2" style="color:#2563EB;">Pricing &amp; Checkout</h3>
                        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                            @foreach(['Live Fare Quote','Coupon Codes','Guest Contact Details','WhatsApp Hand-off','Booking Confirmation','Invoice + PDF Download'] as $item)
                            <li class="flex items-center gap-2"><svg class="wf-check" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] wf-body">{{ $item }}</span></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="flex items-center gap-2 pt-1">
                        <span class="wf-soon-badge">Coming Soon</span>
                        <span class="text-[13px] wf-muted">Voice search &mdash; UI is present, functionality is not yet implemented.</span>
                    </div>
                </div>
            </div>

            <div class="wf-figure">
                <img src="{{ asset('public/assets/images/website-features/wf-online-booking.jpg') }}" alt="LimoSchedule online booking form showing trip type, pickup, drop-off, passengers and a live fare quote" width="1536" height="1024" class="w-full h-auto block" loading="lazy" decoding="async">
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     LIVE FARE CALCULATOR
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="wf-eyebrow mb-5">Live Fare Calculator</span>
            <h2 class="wf-h2 text-3xl sm:text-4xl mb-4">Know the Fare Before the Customer Books</h2>
            <p class="wf-body text-[15.5px] leading-relaxed">A genuine distance- and time-based pricing engine &mdash; not a static price list.</p>
        </div>

        <!-- Pricing flow -->
        <div class="flex flex-wrap items-center justify-center gap-3 mb-12">
            @foreach(['Route','Distance & Time','Pricing Rules','Discounts & Surcharges','Final Fare'] as $i => $step)
                <div class="wf-flow-step"><span class="text-[13.5px] font-semibold" style="color:#0B1220;">{{ $step }}</span></div>
                @if(!$loop->last)
                <svg class="wf-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                @endif
            @endforeach
        </div>

        <div class="wf-figure mb-14 max-w-4xl mx-auto">
            <img src="{{ asset('public/assets/images/website-features/wf-fare-calculator.jpg') }}" alt="LimoSchedule fare calculator pricing flow from route to final fare, with pricing factors listed" width="1536" height="1024" class="w-full h-auto block" loading="lazy" decoding="async">
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-3.5">
            @foreach(['Base Fare','Distance-Based Pricing','Long-Distance Discount','Hourly Pricing','Waiting Charges','Night Surcharge','Weekend Surcharge','Toll Charges','Airport Surcharge','Service Fee','Minimum Fare','Extra Passenger Charges','Coupon Discounts','Tax','Multi-Currency Display'] as $factor)
            <div class="wf-card px-4 py-4 text-center">
                <span class="text-[12.5px] font-semibold" style="color:#0B1220;">{{ $factor }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     FLEET SHOWCASE
═══════════════════════════════════════════════════════════════ -->
<section class="wf-section-soft relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">

            <div class="wf-figure order-2 lg:order-1">
                <img src="{{ asset('public/assets/images/website-features/wf-fleet-showcase.jpg') }}" alt="LimoSchedule public fleet page showing vehicle cards with pricing and amenities" width="1536" height="1024" class="w-full h-auto block" loading="lazy" decoding="async">
            </div>

            <div class="order-1 lg:order-2">
                <span class="wf-eyebrow mb-5">Fleet Showcase</span>
                <h2 class="wf-h2 text-3xl sm:text-4xl mb-5">Showcase Your Fleet Like a Premium Transportation Company</h2>
                <p class="wf-body text-[15.5px] leading-relaxed mb-7">Give customers a clear view of the vehicles available for their journey.</p>

                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                    @foreach(['Vehicle Categories (Sedan, SUV, Van)','Vehicle Search','Passenger Capacity','Luggage Capacity','Vehicle Year','Transmission','Fuel Type','Vehicle Description','Multiple Gallery Images','Vehicle Pricing','Wi-Fi & Bottled Water','Phone Charger & Baby Seat','Air Conditioning'] as $item)
                    <li class="flex items-center gap-2"><svg class="wf-check" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] wf-body">{{ $item }}</span></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     SERVICES
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="wf-eyebrow mb-5">Services</span>
            <h2 class="wf-h2 text-3xl sm:text-4xl mb-4">Present Every Service You Offer</h2>
            <p class="wf-body text-[15.5px] leading-relaxed">Every service page is independently editable &mdash; its own hero, heading, content, SEO fields and images.</p>
        </div>

        <div class="wf-figure mb-12 max-w-4xl mx-auto">
            <img src="{{ asset('public/assets/images/website-features/wf-services.jpg') }}" alt="LimoSchedule services page showing six transportation service types with booking options" width="1536" height="1024" class="w-full h-auto block" loading="lazy" decoding="async">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach([
                ['Airport Transfer', 'Seamless airport pick-up and drop-off.', 'M17.8 19.2L16 11l3.5-3.5C21 6 21.5 4 21 3c-1-.5-3 0-4.5 1.5L13 8 4.8 6.2c-.5-.1-1 .1-1.3.5l-.7.8c-.4.5-.2 1.2.4 1.4L9 12l-2 3H4l-1 1 3 2 2 3 1-1v-3l3-2 3.3 5.3c.3.6 1 .8 1.4.4l.8-.7c.4-.4.6-.9.5-1.3z'],
                ['Chauffeur Service', 'Professional drivers for a premium experience.', 'M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2'],
                ['Corporate Transfer', 'Reliable corporate travel for your business.', 'M20 7h-4V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v2H4a2 2 0 00-2 2v11a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z'],
                ['City Rides', 'Comfortable rides across the city.', 'M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z'],
                ['Hourly Rides', 'Flexible hourly bookings as per your schedule.', 'M12 2a10 10 0 1010 10A10 10 0 0012 2zm1 5v5l4 2'],
                ['VIP Transport', 'Luxury vehicles for VIPs and special guests.', 'M12 2l2.4 6.6L21 10l-5 4.6L17.4 21 12 17.4 6.6 21 8 14.6 3 10l6.6-1.4L12 2z'],
            ] as [$name, $desc, $path])
            <div class="wf-card p-6">
                <div class="wf-icon-box mb-4">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2563EB" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="{{ $path }}"/></svg>
                </div>
                <h3 class="wf-h3 text-[15.5px] mb-1.5">{{ $name }}</h3>
                <p class="wf-body text-[13px] leading-relaxed">{{ $desc }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     BOOKING JOURNEY
═══════════════════════════════════════════════════════════════ -->
<section class="wf-section-soft relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="wf-eyebrow mb-5">Booking Journey</span>
            <h2 class="wf-h2 text-3xl sm:text-4xl">From Search to Confirmation in Minutes</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-5 mb-12">
            @foreach([
                ['01', 'Enter Pickup & Drop-off'],
                ['02', 'Choose Trip Type & Vehicle'],
                ['03', 'Add Passengers, Luggage & Stops'],
                ['04', 'Get Your Live Fare'],
                ['05', 'Confirm & Receive Booking Details'],
            ] as [$num, $label])
            <div class="wf-card p-5 text-center">
                <div class="mx-auto mb-3 w-11 h-11 rounded-full flex items-center justify-center font-bold text-[15px]" style="background:#2563EB; color:#fff;">{{ $num }}</div>
                <p class="wf-h3 text-[13.5px] leading-snug">{{ $label }}</p>
            </div>
            @endforeach
        </div>

        <div class="wf-figure max-w-4xl mx-auto">
            <img src="{{ asset('public/assets/images/website-features/wf-booking-journey.jpg') }}" alt="Five-step LimoSchedule customer booking journey from pickup entry to confirmation" width="1536" height="1024" class="w-full h-auto block" loading="lazy" decoding="async">
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     CUSTOMER ACCESS & SECURITY
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">

            <div>
                <span class="wf-eyebrow mb-5">Customer Access</span>
                <h2 class="wf-h2 text-3xl sm:text-4xl mb-5">Give Customers Their Own Secure Account</h2>
                <p class="wf-body text-[15.5px] leading-relaxed mb-7">
                    Customers and admins sign in through a single shared login page; drivers use their own separate, dedicated login.
                </p>

                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 mb-7">
                    @foreach(['Customer Registration','Customer / Admin Login','Separate Driver Login','Password Reset (per role)','Email Verification','Active Sessions','Login History','Account Security'] as $item)
                    <li class="flex items-center gap-2"><svg class="wf-check" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] wf-body">{{ $item }}</span></li>
                    @endforeach
                </ul>

                <div class="grid grid-cols-3 gap-2.5 mb-6">
                    <div class="rounded-xl p-3.5 text-center" style="background:#F6F8FC; border:1px solid rgba(15,23,42,0.08);">
                        <div class="wf-h3 text-[12.5px]">Customer</div>
                        <div class="wf-muted text-[11px] mt-0.5">Books rides, manages profile</div>
                    </div>
                    <div class="rounded-xl p-3.5 text-center" style="background:#F6F8FC; border:1px solid rgba(15,23,42,0.08);">
                        <div class="wf-h3 text-[12.5px]">Admin</div>
                        <div class="wf-muted text-[11px] mt-0.5">Manages bookings, fleet, settings</div>
                    </div>
                    <div class="rounded-xl p-3.5 text-center" style="background:#F6F8FC; border:1px solid rgba(15,23,42,0.08);">
                        <div class="wf-h3 text-[12.5px]">Driver</div>
                        <div class="wf-muted text-[11px] mt-0.5">Own dedicated login &amp; trips</div>
                    </div>
                </div>

                <p class="text-[12.5px] wf-muted">
                    <span class="wf-not-avail">Social login</span> and <span class="wf-not-avail">OTP/SMS login</span> are not currently available.
                </p>
            </div>

            <div class="wf-figure">
                <img src="{{ asset('public/assets/images/website-features/wf-authentication.jpg') }}" alt="LimoSchedule login page with customer, admin and driver access and account security features" width="1536" height="1024" class="w-full h-auto block" loading="lazy" decoding="async">
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     COMMUNICATION
═══════════════════════════════════════════════════════════════ -->
<section class="wf-section-soft relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">

            <div class="wf-figure order-2 lg:order-1">
                <img src="{{ asset('public/assets/images/website-features/wf-communication.jpg') }}" alt="LimoSchedule communication channels including contact form, phone, email, WhatsApp and browser notifications" width="1536" height="1024" class="w-full h-auto block" loading="lazy" decoding="async">
            </div>

            <div class="order-1 lg:order-2">
                <span class="wf-eyebrow mb-5">Communication</span>
                <h2 class="wf-h2 text-3xl sm:text-4xl mb-5">Stay Connected With Every Customer</h2>

                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 mb-6">
                    @foreach(['Contact Form','Phone Click-to-Call','Email','WhatsApp Click-to-Chat','Floating WhatsApp Button','Booking WhatsApp Hand-off','Browser Push Notifications','Booking Updates'] as $item)
                    <li class="flex items-center gap-2"><svg class="wf-check" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] wf-body">{{ $item }}</span></li>
                    @endforeach
                </ul>

                <p class="text-[12.5px] wf-muted leading-relaxed">
                    WhatsApp is a click-to-chat link with a pre-filled message &mdash; not a WhatsApp Business API integration (no delivery receipts or automated replies).
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     SEO & CONTENT
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="wf-eyebrow mb-5">SEO &amp; Content</span>
            <h2 class="wf-h2 text-3xl sm:text-4xl mb-4">Built to Be Found</h2>
            <p class="wf-body text-[15.5px] leading-relaxed">Every page ships with the technical SEO foundations search engines look for &mdash; not a promise of guaranteed rankings.</p>
        </div>

        <div class="wf-figure mb-12 max-w-4xl mx-auto">
            <img src="{{ asset('public/assets/images/website-features/wf-seo.jpg') }}" alt="LimoSchedule blog and SEO features including sitemap, meta tags, redirects and schema markup" width="1536" height="1024" class="w-full h-auto block" loading="lazy" decoding="async">
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-3.5">
            @foreach(['Dynamic XML Sitemap','Robots.txt','Meta Titles','Meta Descriptions','Keywords','Canonical URLs','Open Graph Images','JSON-LD Schema','301 Redirects','302 Redirects','SEO Area Pages','Blog Categories','Blog Tags','Blog View Counts','Per-Page SEO Fields'] as $item)
            <div class="wf-card px-4 py-4 text-center">
                <span class="text-[12.5px] font-semibold" style="color:#0B1220;">{{ $item }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     BLOG, REVIEWS, ROUTES & AREAS
═══════════════════════════════════════════════════════════════ -->
<section class="wf-section-soft relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="wf-eyebrow mb-5">Content &amp; Local Growth</span>
            <h2 class="wf-h2 text-3xl sm:text-4xl">Keep Your Website Fresh and Local</h2>
        </div>

        <div class="wf-figure mb-12 max-w-4xl mx-auto">
            <img src="{{ asset('public/assets/images/website-features/wf-content-growth.jpg') }}" alt="LimoSchedule reviews, blog, popular routes and service area features" width="1536" height="1024" class="w-full h-auto block" loading="lazy" decoding="async">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <div class="wf-card p-6">
                <h3 class="wf-h3 text-[15px] mb-2">Blog</h3>
                <p class="wf-body text-[13px] leading-relaxed">Categories, tags, posts, view tracking and per-post SEO fields.</p>
            </div>
            <div class="wf-card p-6">
                <h3 class="wf-h3 text-[15px] mb-2">Reviews</h3>
                <p class="wf-body text-[13px] leading-relaxed">Customer ratings and comments tied to a booking, driver and vehicle, with admin moderation and a featured flag.</p>
            </div>
            <div class="wf-card p-6">
                <h3 class="wf-h3 text-[15px] mb-2">Popular Routes</h3>
                <p class="wf-body text-[13px] leading-relaxed">Fixed city and intercity routes with pricing, including optional discounted pricing.</p>
            </div>
            <div class="wf-card p-6">
                <h3 class="wf-h3 text-[15px] mb-2">Service Areas</h3>
                <p class="wf-body text-[13px] leading-relaxed">Dedicated, SEO-managed pages for each coverage area.</p>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     GLOBAL READY
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="wf-eyebrow mb-5">Global Ready</span>
            <h2 class="wf-h2 text-3xl sm:text-4xl">Ready for Customers Around the World</h2>
        </div>

        <div class="wf-figure mb-12 max-w-4xl mx-auto">
            <img src="{{ asset('public/assets/images/website-features/wf-global-ready.jpg') }}" alt="LimoSchedule multi-language and multi-currency settings for a global audience" width="1536" height="1024" class="w-full h-auto block" loading="lazy" decoding="async">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 max-w-3xl mx-auto">
            <div class="wf-card p-6">
                <h3 class="wf-h3 text-[15px] mb-3">Multi-Language</h3>
                <ul class="space-y-2">
                    @foreach(['Multiple languages','Language switcher','Native language names','RTL support','Database-backed translations'] as $item)
                    <li class="flex items-center gap-2"><svg class="wf-check" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13px] wf-body">{{ $item }}</span></li>
                    @endforeach
                </ul>
            </div>
            <div class="wf-card p-6">
                <h3 class="wf-h3 text-[15px] mb-3">Multi-Currency</h3>
                <ul class="space-y-2">
                    @foreach(['Currency switcher','Currency symbol display','Exchange rates','Admin-managed rates'] as $item)
                    <li class="flex items-center gap-2"><svg class="wf-check" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13px] wf-body">{{ $item }}</span></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <p class="text-center text-[12.5px] wf-muted mt-6 max-w-xl mx-auto">
            Exchange rates are set and updated by the admin &mdash; they are not pulled automatically from a live currency-rate API.
        </p>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     DYNAMIC WEBSITE / CMS
═══════════════════════════════════════════════════════════════ -->
<section class="wf-section-soft relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-10">
            <span class="wf-eyebrow mb-5">Dynamic CMS</span>
            <h2 class="wf-h2 text-3xl sm:text-4xl mb-4">Your Website. Fully Dynamic. Fully Manageable.</h2>
            <p class="wf-body text-[15.5px] leading-relaxed">Every page is built from admin-managed content sections &mdash; nothing on the public site is hardcoded copy.</p>
        </div>

        <div class="flex flex-wrap items-center justify-center gap-3 mb-12">
            @foreach(['Add','Reorder','Enable / Disable','Remove'] as $step)
                <div class="wf-flow-step"><span class="text-[13.5px] font-semibold" style="color:#0B1220;">{{ $step }}</span></div>
                @if(!$loop->last)
                <svg class="wf-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                @endif
            @endforeach
        </div>
        <p class="text-center text-[13px] wf-muted mb-12">Sections are reordered with simple drag-and-drop &mdash; no coding required.</p>

        <div class="wf-figure mb-12 max-w-4xl mx-auto">
            <img src="{{ asset('public/assets/images/website-features/wf-dynamic-cms.jpg') }}" alt="LimoSchedule admin-managed website section builder with add, reorder and enable or disable controls" width="1536" height="1024" class="w-full h-auto block" loading="lazy" decoding="async">
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3">
            @foreach(['Hero','Booking Widget','Rich Text','Items','Trust Badges','Stats','Process','Fleet','Popular Routes','Areas','Testimonials','Team','FAQ','Vision & Mission','Promotions','Blog','Contact','CTA'] as $section)
            <div class="rounded-xl px-3 py-3 text-center" style="background:#fff; border:1px solid rgba(15,23,42,0.08);">
                <span class="text-[12px] font-semibold" style="color:#0B1220;">{{ $section }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     MORE WEBSITE FEATURES
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="wf-eyebrow mb-5">More Included</span>
            <h2 class="wf-h2 text-3xl sm:text-4xl">More Website Features</h2>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3.5">
            @foreach(['Light/Dark Theme','Responsive Design','Contact Form','Quote Requests','Testimonials','Promotions','FAQ','Team Profiles','Legal Pages','Cookie Policy','Privacy Policy','Terms of Service','Refund Policy','Booking Confirmation','Guest Invoice','PDF Invoice'] as $item)
            <div class="wf-card px-4 py-4 text-center">
                <span class="text-[12.5px] font-semibold" style="color:#0B1220;">{{ $item }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     FEATURE SUMMARY
═══════════════════════════════════════════════════════════════ -->
<section class="wf-section-soft relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14">
            <span class="wf-eyebrow mb-5">Full Checklist</span>
            <h2 class="wf-h2 text-3xl sm:text-4xl">Everything Included in Your Public Website</h2>
        </div>

        @php
            $summary = [
                'Booking' => ['Guest booking, no account required','One Way, Round Trip, Hourly & Airport Transfer','Google Places Autocomplete','Unlimited intermediate stops','Live AJAX fare quoting','Coupon code application','WhatsApp hand-off on submit','Shareable confirmation & invoice pages','PDF invoice download'],
                'Fleet' => ['Public fleet grid, searchable & filterable','Vehicle categories (Sedan, SUV, Van)','Per-vehicle amenities','Multiple gallery images per vehicle','Per-vehicle pricing display'],
                'Pricing' => ['Distance & time-based fare engine','Long-distance discount tier','Night & weekend surcharges','Waiting charges','Coupon discounts','Multi-currency display'],
                'Customer Access' => ['Customer registration, login, logout','Shared admin/customer login, separate driver login','Per-role password reset','Active-session & login-history tracking'],
                'Communication' => ['Working contact form','WhatsApp click-to-chat + floating button','Browser push notification opt-in'],
                'Content' => ['Blog with categories, tags & view counts','Separate quote-request enquiry path','Moderated reviews with featured flag','Popular Routes with route types','Service area pages'],
                'SEO' => ['XML sitemap & robots.txt','Per-page SEO fields & custom schema','301/302 redirect manager'],
                'Globalization' => ['Multi-language (DB-backed, RTL-capable)','Multi-currency (admin-managed rates)','Light/dark theme'],
                'CMS' => ['18 admin-managed section types','Drag-and-drop section ordering','Enable/disable & remove per page'],
            ];
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($summary as $group => $items)
            <div class="wf-card p-6">
                <h3 class="wf-h3 text-[13px] uppercase tracking-wide mb-4" style="color:#2563EB;">{{ $group }}</h3>
                <ul class="space-y-2.5">
                    @foreach($items as $item)
                    <li class="flex items-start gap-2"><svg class="wf-check mt-0.5" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13px] wf-body leading-snug">{{ $item }}</span></li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>

        <div class="mt-10 flex flex-wrap items-center justify-center gap-x-6 gap-y-2 text-[12.5px]">
            <span class="flex items-center gap-1.5"><span class="wf-soon-badge">Coming Soon</span><span class="wf-muted">Voice Search</span></span>
            <span class="wf-not-avail">Social Login</span>
            <span class="wf-not-avail">OTP / SMS Login</span>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     FINAL CTA
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-24 lg:py-28 overflow-hidden" style="background: linear-gradient(135deg, #0B1220 0%, #14213D 100%);">
    <div class="absolute inset-0 pointer-events-none" style="background-image: radial-gradient(ellipse at 50% 0%, rgba(59,130,246,0.25) 0%, transparent 60%);"></div>
    <div class="relative z-10 max-w-3xl mx-auto px-5 sm:px-6 lg:px-8 text-center">
        <h2 class="text-white font-extrabold tracking-tight leading-[1.12] mb-6" style="font-size: clamp(2rem, 4.5vw, 3.1rem);">
            Give Your Limo Business a Website That Does More Than Look Good.
        </h2>
        <p class="text-gray-300 text-[16px] leading-relaxed mb-10 max-w-xl mx-auto">
            Showcase your fleet, accept bookings, calculate fares and give customers a complete online booking experience with LimoSchedule.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="{{ route('contact') }}" class="wf-btn-primary w-full sm:w-auto">
                <span>Book a Demo</span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a href="{{ route('features') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 font-bold px-8 py-4 rounded-xl text-[15px] text-white transition-all duration-200 hover:bg-white/10" style="background: rgba(255,255,255,0.06); border: 1.5px solid rgba(255,255,255,0.25);">
                View All Features
            </a>
        </div>
        <p class="text-gray-500 text-[13px] mt-8">
            Want to see what customers and drivers get after booking? Explore the <a href="{{ route('customer-panel-features') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">Customer Panel</a> and <a href="{{ route('driver-panel-features') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">Driver Panel</a> features.
        </p>
    </div>
</section>

</div>

@endsection
