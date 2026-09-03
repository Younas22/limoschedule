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
    #cp-page { background: #ffffff; }
    #cp-page * { box-sizing: border-box; }
    #cp-page .cp-eyebrow {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 7px 16px; border-radius: 999px;
        background: rgba(37,99,235,0.08); border: 1px solid rgba(37,99,235,0.22);
        color: #1D4ED8; font-size: 11px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase;
    }
    #cp-page .cp-h1 { color: #0F172A; font-weight: 800; letter-spacing: -0.02em; line-height: 1.08; }
    #cp-page .cp-h2 { color: #0F172A; font-weight: 800; letter-spacing: -0.015em; line-height: 1.15; }
    #cp-page .cp-h3 { color: #0F172A; font-weight: 700; }
    #cp-page .cp-body { color: #475569; }
    #cp-page .cp-muted { color: #64748B; }
    #cp-page .cp-section-soft { background: #F8FAFC; }
    #cp-page .cp-card {
        background: #ffffff; border: 1px solid rgba(15,23,42,0.08); border-radius: 16px;
        box-shadow: 0 10px 30px rgba(15,23,42,0.05);
        transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
    }
    #cp-page .cp-card:hover { transform: translateY(-3px); box-shadow: 0 16px 40px rgba(15,23,42,0.09); border-color: rgba(37,99,235,0.35); }
    #cp-page .cp-icon-box {
        width: 42px; height: 42px; border-radius: 12px; flex-shrink: 0;
        display: flex; align-items: center; justify-content: center;
        background: rgba(37,99,235,0.1); border: 1px solid rgba(37,99,235,0.2);
    }
    #cp-page .cp-figure {
        border-radius: 20px; overflow: hidden; border: 1px solid rgba(15,23,42,0.08);
        box-shadow: 0 30px 70px rgba(15,23,42,0.1);
    }
    #cp-page .cp-btn-primary {
        display: inline-flex; align-items: center; justify-content: center; gap: 8px;
        background: #2563EB; color: #fff; font-weight: 700; font-size: 15px;
        padding: 15px 30px; border-radius: 12px; border: 1px solid #1D4ED8;
        box-shadow: 0 10px 24px rgba(37,99,235,0.28);
        transition: background 0.2s ease, transform 0.2s ease;
    }
    #cp-page .cp-btn-primary:hover { background: #1D4ED8; transform: translateY(-1px); }
    #cp-page .cp-btn-secondary {
        display: inline-flex; align-items: center; justify-content: center; gap: 8px;
        background: #ffffff; color: #0F172A; font-weight: 700; font-size: 15px;
        padding: 15px 30px; border-radius: 12px; border: 1.5px solid rgba(15,23,42,0.14);
        transition: border-color 0.2s ease, background 0.2s ease;
    }
    #cp-page .cp-btn-secondary:hover { border-color: rgba(37,99,235,0.5); background: #F8FAFC; }
    #cp-page .cp-check { color: #2563EB; flex-shrink: 0; }
    #cp-page .cp-flow-step {
        background: #ffffff; border: 1px solid rgba(15,23,42,0.08); border-radius: 14px;
        padding: 13px 15px; display: flex; align-items: center; gap: 10px;
        box-shadow: 0 6px 16px rgba(15,23,42,0.05);
    }
    #cp-page .cp-arrow { color: #93A3B8; flex-shrink: 0; }
    #cp-page .cp-note {
        background: #EFF6FF; border: 1px solid rgba(37,99,235,0.18); border-radius: 12px;
        padding: 12px 16px; color: #1E3A8A; font-size: 12.5px; line-height: 1.6;
    }
</style>
@endpush

@section('content')

<div id="cp-page">

<!-- ═══════════════════════════════════════════════════════════════
     HERO
═══════════════════════════════════════════════════════════════ -->
<section class="relative overflow-hidden" style="background: linear-gradient(180deg, #F8FAFC 0%, #ffffff 60%);">
@php
    $breadcrumbs = [
        ['label' => 'Home', 'url' => url('/')],
        ['label' => 'Customer Panel', 'url' => null],
    ];
@endphp
<style>#cp-page nav[aria-label="Breadcrumb"] a, #cp-page nav[aria-label="Breadcrumb"] span { color: #64748B !important; }
#cp-page nav[aria-label="Breadcrumb"] a:hover { color: #0F172A !important; }
#cp-page nav[aria-label="Breadcrumb"] span[aria-current] { color: #0F172A !important; }</style>
@include('partials._breadcrumbs')

    <div class="relative z-10 max-w-4xl mx-auto px-5 sm:px-6 lg:px-8 pt-10 pb-14 lg:pt-14 lg:pb-16 text-center">
        <span class="cp-eyebrow mb-6">Customer Panel</span>

        <h1 class="cp-h1 text-4xl sm:text-5xl lg:text-[54px] mb-6">
            Everything Your Customers Need, In One Powerful Panel.
        </h1>

        <p class="cp-body text-[17px] sm:text-[18px] leading-relaxed max-w-2xl mx-auto mb-9">
            Give customers a complete self-service experience to book rides, manage trips, track drivers, make payments, access invoices, receive notifications, and manage their account &mdash; from any device.
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="{{ route('contact') }}" class="cp-btn-primary w-full sm:w-auto">
                <span>Book a Demo</span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a href="#cp-intro" class="cp-btn-secondary w-full sm:w-auto">Explore Customer Features</a>
        </div>
    </div>

    <div class="relative z-10 max-w-5xl mx-auto px-5 sm:px-6 lg:px-8 pb-16 lg:pb-24">
        <div class="absolute -top-10 left-1/2 -translate-x-1/2 w-[700px] h-[300px] pointer-events-none" style="background: radial-gradient(ellipse at 50% 0%, rgba(37,99,235,0.14) 0%, transparent 70%);"></div>
        <div class="cp-figure relative">
            <img src="{{ asset('public/assets/images/customer-panel-features/cp-dashboard.jpg') }}" alt="LimoSchedule customer dashboard showing next ride, stat tiles, quick actions and recent trips" width="1254" height="1254" class="w-full h-auto block" loading="eager" fetchpriority="high" decoding="sync">
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     INTRODUCTION
═══════════════════════════════════════════════════════════════ -->
<section id="cp-intro" class="relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14">
            <h2 class="cp-h2 text-3xl sm:text-4xl mb-4">A Complete Customer Experience Beyond Booking</h2>
            <p class="cp-body text-[15.5px] leading-relaxed">The Customer Panel lets passengers manage their complete journey, long after they've discovered your service.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <div class="cp-card p-6">
                <div class="cp-icon-box mb-4">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2563EB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                </div>
                <h3 class="cp-h3 text-[15.5px] mb-2">Book &amp; Manage</h3>
                <p class="cp-body text-[13px] leading-relaxed">Customers can create and manage their rides from their account.</p>
            </div>
            <div class="cp-card p-6">
                <div class="cp-icon-box mb-4">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2563EB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8a6 6 0 00-12 0c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 01-3.46 0"/></svg>
                </div>
                <h3 class="cp-h3 text-[15.5px] mb-2">Stay Updated</h3>
                <p class="cp-body text-[13px] leading-relaxed">Customers receive booking, driver, payment and trip notifications.</p>
            </div>
            <div class="cp-card p-6">
                <div class="cp-icon-box mb-4">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2563EB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M2 11h20"/></svg>
                </div>
                <h3 class="cp-h3 text-[15.5px] mb-2">Manage Payments</h3>
                <p class="cp-body text-[13px] leading-relaxed">Customers can access payments, wallet, loyalty points and invoices.</p>
            </div>
            <div class="cp-card p-6">
                <div class="cp-icon-box mb-4">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2563EB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 11-2.83 2.83l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 11-2.83-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 112.83-2.83l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 112.83 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/></svg>
                </div>
                <h3 class="cp-h3 text-[15.5px] mb-2">Stay In Control</h3>
                <p class="cp-body text-[13px] leading-relaxed">Customers manage addresses, preferences, security and support from one place.</p>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     DASHBOARD
═══════════════════════════════════════════════════════════════ -->
<section class="cp-section-soft relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">

            <div>
                <span class="cp-eyebrow mb-5">Dashboard</span>
                <h2 class="cp-h2 text-3xl sm:text-4xl mb-5">A Dashboard Built Around Every Customer&rsquo;s Next Ride</h2>
                <p class="cp-body text-[15.5px] leading-relaxed mb-7">The dashboard gives customers the information they care about most, the moment they sign in.</p>

                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                    @foreach(['Next ride summary','Pickup & drop-off','Date & time','Assigned driver','Vehicle & fare','Total spent','Completed trips','Upcoming trips','Total bookings','Recent trips list','Quick actions','Notification count'] as $item)
                    <li class="flex items-center gap-2"><svg class="cp-check" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] cp-body">{{ $item }}</span></li>
                    @endforeach
                </ul>
            </div>

            <div class="cp-figure">
                <img src="{{ asset('public/assets/images/customer-panel-features/cp-dashboard.jpg') }}" alt="LimoSchedule customer dashboard with next ride summary, spend, trips and quick action tiles" width="1254" height="1254" class="w-full h-auto block" loading="lazy" decoding="async">
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     PROFILE & PERSONALIZATION
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">

            <div class="cp-figure order-2 lg:order-1">
                <img src="{{ asset('public/assets/images/customer-panel-features/cp-profile.jpg') }}" alt="LimoSchedule customer profile page with saved addresses, default address and preferences" width="1254" height="1254" class="w-full h-auto block" loading="lazy" decoding="async">
            </div>

            <div class="order-1 lg:order-2">
                <span class="cp-eyebrow mb-5">Profile &amp; Preferences</span>
                <h2 class="cp-h2 text-3xl sm:text-4xl mb-5">Personalized To Every Customer</h2>
                <p class="cp-body text-[15.5px] leading-relaxed mb-7">Customers manage their personal information and preferences from their own account.</p>

                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                    @foreach(['Name, email & phone','Profile photo','Saved addresses','Home / Work labels','Default address','Language','Currency','Light / Dark theme'] as $item)
                    <li class="flex items-center gap-2"><svg class="cp-check" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] cp-body">{{ $item }}</span></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     BOOKING MANAGEMENT
═══════════════════════════════════════════════════════════════ -->
<section class="cp-section-soft relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-10">
            <span class="cp-eyebrow mb-5">Booking Management</span>
            <h2 class="cp-h2 text-3xl sm:text-4xl mb-4">Complete Control Over Every Booking</h2>
            <p class="cp-body text-[15.5px] leading-relaxed">Customers manage their entire booking history from one place &mdash; from creating a ride to completion or cancellation.</p>
        </div>

        <!-- Lifecycle -->
        <div class="flex flex-wrap items-center justify-center gap-2.5 mb-4">
            @foreach(['Pending','Confirmed','Assigned','In Progress','Completed'] as $status)
                <div class="cp-flow-step"><span class="text-[13px] font-semibold" style="color:#0F172A;">{{ $status }}</span></div>
                @if(!$loop->last)
                <svg class="cp-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                @endif
            @endforeach
        </div>
        <p class="text-center text-[12.5px] cp-muted mb-12">Or <span class="font-semibold" style="color:#DC2626;">Cancelled</span> &mdash; at any point before completion.</p>

        <div class="cp-figure mb-12 max-w-4xl mx-auto">
            <img src="{{ asset('public/assets/images/customer-panel-features/cp-booking-management.jpg') }}" alt="LimoSchedule booking management showing all bookings, booking details and cancellation options" width="1254" height="1254" class="w-full h-auto block" loading="lazy" decoding="async">
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3.5">
            @foreach(['New Booking','Upcoming / Completed / Cancelled Views','Booking Details','Pickup, Drop-off & Stops','Date & Time','Vehicle & Driver','Fare Breakdown','Payment Status','Cancellation with Reason','Shareable Payment Link'] as $item)
            <div class="cp-card px-4 py-4 text-center">
                <span class="text-[12.5px] font-semibold" style="color:#0F172A;">{{ $item }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     LIVE DISPATCH & DRIVER ETA
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">

            <div>
                <span class="cp-eyebrow mb-5">Live Dispatch</span>
                <h2 class="cp-h2 text-3xl sm:text-4xl mb-5">Know When Your Driver Is Getting Close</h2>
                <p class="cp-body text-[15.5px] leading-relaxed mb-7">Live dispatch information appears directly inside the booking details, once a driver is assigned.</p>

                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 mb-6">
                    @foreach(['Assigned driver name','Driver photo','Driver phone','Distance to pickup','Estimated arrival time','Trip status'] as $item)
                    <li class="flex items-center gap-2"><svg class="cp-check" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] cp-body">{{ $item }}</span></li>
                    @endforeach
                </ul>

                <div class="cp-note">
                    This shows real distance and time-to-arrival numbers, updated as the driver moves &mdash; it is not an animated map with a moving vehicle marker.
                </div>
            </div>

            <div class="cp-figure">
                <img src="{{ asset('public/assets/images/customer-panel-features/cp-dispatch.jpg') }}" alt="LimoSchedule live driver dispatch showing distance to pickup and estimated arrival time" width="1254" height="1254" class="w-full h-auto block" loading="lazy" decoding="async">
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     PAYMENTS, WALLET & LOYALTY
═══════════════════════════════════════════════════════════════ -->
<section class="cp-section-soft relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="cp-eyebrow mb-5">Payments &amp; Wallet</span>
            <h2 class="cp-h2 text-3xl sm:text-4xl">Flexible Payment &amp; Account Balance Management</h2>
        </div>

        <div class="cp-figure mb-12 max-w-4xl mx-auto">
            <img src="{{ asset('public/assets/images/customer-panel-features/cp-payments-wallet.jpg') }}" alt="LimoSchedule payments, wallet and loyalty points page with balance and transaction history" width="1254" height="1254" class="w-full h-auto block" loading="lazy" decoding="async">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 mb-8">
            <div class="cp-card p-6">
                <h3 class="cp-h3 text-[15px] mb-2">Online Payments</h3>
                <p class="cp-body text-[13px] leading-relaxed">Stripe and PayPal payment integrations, at the point of booking or via a shareable payment link.</p>
            </div>
            <div class="cp-card p-6">
                <h3 class="cp-h3 text-[15px] mb-2">Shareable Payment Links</h3>
                <p class="cp-body text-[13px] leading-relaxed">Unpaid bookings can be paid through a shareable link &mdash; no login required.</p>
            </div>
            <div class="cp-card p-6">
                <h3 class="cp-h3 text-[15px] mb-2">Wallet</h3>
                <p class="cp-body text-[13px] leading-relaxed">Customers can view their wallet balance and add funds with quick or custom amounts.</p>
            </div>
            <div class="cp-card p-6">
                <h3 class="cp-h3 text-[15px] mb-2">Refunds</h3>
                <p class="cp-body text-[13px] leading-relaxed">Admin-processed refunds are credited automatically to the customer&rsquo;s wallet.</p>
            </div>
            <div class="cp-card p-6">
                <h3 class="cp-h3 text-[15px] mb-2">Loyalty Points</h3>
                <p class="cp-body text-[13px] leading-relaxed">Customers can view their loyalty points balance and full transaction history.</p>
            </div>
            <div class="cp-card p-6">
                <h3 class="cp-h3 text-[15px] mb-2">Coupons</h3>
                <p class="cp-body text-[13px] leading-relaxed">Coupon codes can be applied during booking.</p>
            </div>
        </div>

        <div class="cp-note max-w-3xl mx-auto text-center">
            The wallet is currently a standalone balance &mdash; it is not yet a payment method at booking checkout, and self-service recharge does not yet route through Stripe/PayPal to charge the customer. Loyalty points are an admin-managed balance today, not an automatic earn-and-redeem program.
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     INVOICES
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">

            <div>
                <span class="cp-eyebrow mb-5">Invoices</span>
                <h2 class="cp-h2 text-3xl sm:text-4xl mb-5">Professional Invoices, Ready When You Need Them</h2>
                <p class="cp-body text-[15.5px] leading-relaxed mb-7">Customers can forward invoices to employers or third parties for expense reporting.</p>

                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                    @foreach(['Invoice list','Invoice details','PDF generation','PDF download','Company invoice info','Tax information','Public invoice access','Shareable invoice link'] as $item)
                    <li class="flex items-center gap-2"><svg class="cp-check" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] cp-body">{{ $item }}</span></li>
                    @endforeach
                </ul>
            </div>

            <div class="cp-figure">
                <img src="{{ asset('public/assets/images/customer-panel-features/cp-invoices.jpg') }}" alt="LimoSchedule invoice list with a branded PDF invoice showing fare breakdown and tax" width="1254" height="1254" class="w-full h-auto block" loading="lazy" decoding="async">
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     NOTIFICATIONS
═══════════════════════════════════════════════════════════════ -->
<section class="cp-section-soft relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">

            <div class="cp-figure order-2 lg:order-1">
                <img src="{{ asset('public/assets/images/customer-panel-features/cp-notifications.jpg') }}" alt="LimoSchedule customer notification center with browser push notifications for booking events" width="1254" height="1254" class="w-full h-auto block" loading="lazy" decoding="async">
            </div>

            <div class="order-1 lg:order-2">
                <span class="cp-eyebrow mb-5">Notifications</span>
                <h2 class="cp-h2 text-3xl sm:text-4xl mb-5">Never Miss an Important Booking Update</h2>
                <p class="cp-body text-[15.5px] leading-relaxed mb-6">Browser push notifications can be enabled directly from the customer panel, alongside in-app and email updates.</p>

                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2 mb-6">
                    @foreach(['In-app notification center','Unread notification count','Browser push notifications','Email notifications','Notification sound'] as $item)
                    <li class="flex items-center gap-2"><svg class="cp-check" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] cp-body">{{ $item }}</span></li>
                    @endforeach
                </ul>

                <div class="flex flex-wrap gap-2">
                    @foreach(['Booking Created','Booking Confirmed','Driver Assigned','Trip Started','Trip Completed','Cancellation','Payment Received','Invoice Ready'] as $event)
                    <span class="text-[11.5px] font-medium px-2.5 py-1 rounded-full" style="background:#EFF6FF; color:#1D4ED8; border:1px solid rgba(37,99,235,0.2);">{{ $event }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     SUPPORT
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-10">
            <span class="cp-eyebrow mb-5">Support</span>
            <h2 class="cp-h2 text-3xl sm:text-4xl mb-4">Support When Your Customers Need It</h2>
            <p class="cp-body text-[15.5px] leading-relaxed">A support ticket and message-thread system &mdash; not live chat.</p>
        </div>

        <div class="cp-figure mb-12 max-w-4xl mx-auto">
            <img src="{{ asset('public/assets/images/customer-panel-features/cp-support.jpg') }}" alt="LimoSchedule customer support ticket with a threaded conversation between customer and support agent" width="1254" height="1254" class="w-full h-auto block" loading="lazy" decoding="async">
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3.5 mb-8">
            @foreach(['Create Ticket','Link to Booking','Ticket List','Ticket Details','Threaded Replies','Follow-Up Messages'] as $item)
            <div class="cp-card px-4 py-4 text-center">
                <span class="text-[12.5px] font-semibold" style="color:#0F172A;">{{ $item }}</span>
            </div>
            @endforeach
        </div>

        <div class="flex flex-wrap items-center justify-center gap-2.5">
            @foreach(['Open','In Progress','Closed'] as $status)
                <div class="cp-flow-step"><span class="text-[13px] font-semibold" style="color:#0F172A;">{{ $status }}</span></div>
                @if(!$loop->last)
                <svg class="cp-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                @endif
            @endforeach
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     SECURITY
═══════════════════════════════════════════════════════════════ -->
<section class="cp-section-soft relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">

            <div>
                <span class="cp-eyebrow mb-5">Security</span>
                <h2 class="cp-h2 text-3xl sm:text-4xl mb-5">Give Customers More Control Over Account Security</h2>
                <p class="cp-body text-[15.5px] leading-relaxed mb-7">A clean, security-focused area separate from general account settings.</p>

                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                    @foreach(['Change password','Active session list','Device / browser info','Revoke individual session','Sign out of all other sessions','Login history'] as $item)
                    <li class="flex items-center gap-2"><svg class="cp-check" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[13.5px] cp-body">{{ $item }}</span></li>
                    @endforeach
                </ul>
            </div>

            <div class="cp-figure">
                <img src="{{ asset('public/assets/images/customer-panel-features/cp-security.jpg') }}" alt="LimoSchedule account security page with active sessions, login history and password change" width="1254" height="1254" class="w-full h-auto block" loading="lazy" decoding="async">
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     SETTINGS & PERSONALIZATION
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="cp-eyebrow mb-5">Settings</span>
            <h2 class="cp-h2 text-3xl sm:text-4xl mb-4">A Customer Experience That Adapts To Individual Preferences</h2>
            <p class="cp-body text-[15.5px] leading-relaxed">Preferences are saved per customer account, independent of the public website&rsquo;s own settings.</p>
        </div>

        <div class="cp-figure mb-10 max-w-4xl mx-auto">
            <img src="{{ asset('public/assets/images/customer-panel-features/cp-settings.jpg') }}" alt="LimoSchedule personalized customer settings for language, currency, theme and notification preferences" width="1254" height="1254" class="w-full h-auto block" loading="lazy" decoding="async">
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3.5 max-w-2xl mx-auto">
            @foreach(['Language','Currency','Light / Dark Theme','Push Notification Preferences'] as $item)
            <div class="cp-card px-4 py-4 text-center">
                <span class="text-[12.5px] font-semibold" style="color:#0F172A;">{{ $item }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     MOBILE EXPERIENCE
═══════════════════════════════════════════════════════════════ -->
<section class="cp-section-soft relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-10">
            <span class="cp-eyebrow mb-5">Mobile Experience</span>
            <h2 class="cp-h2 text-3xl sm:text-4xl mb-4">A Complete Customer Panel On Every Screen</h2>
            <p class="cp-body text-[15.5px] leading-relaxed">The entire Customer Panel is designed as a responsive web application, giving customers a consistent experience across desktop, tablet and mobile devices.</p>
        </div>

        <div class="flex justify-center mb-10">
            <span class="text-[11px] font-bold uppercase tracking-wide px-4 py-2 rounded-full" style="background:#EFF6FF; color:#1D4ED8; border:1px solid rgba(37,99,235,0.25);">Responsive Web Application &mdash; Not a Native App</span>
        </div>

        <div class="cp-figure mb-12 max-w-4xl mx-auto">
            <img src="{{ asset('public/assets/images/customer-panel-features/cp-mobile.jpg') }}" alt="LimoSchedule customer panel shown responsively on desktop, tablet and mobile screens" width="1254" height="1254" class="w-full h-auto block" loading="lazy" decoding="async">
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3">
            @foreach(['Responsive Dashboard','Collapsible Sidebar','Off-Canvas Menu','Sticky Bottom Nav','Mobile Booking Layout','Responsive Trip Management'] as $item)
            <div class="rounded-xl px-3 py-3 text-center" style="background:#fff; border:1px solid rgba(15,23,42,0.08);">
                <span class="text-[12px] font-semibold" style="color:#0F172A;">{{ $item }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     COMPLETE CUSTOMER JOURNEY
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-10">
            <span class="cp-eyebrow mb-5">Customer Journey</span>
            <h2 class="cp-h2 text-3xl sm:text-4xl">From Booking To Completion &mdash; One Connected Journey</h2>
        </div>

        <div class="flex flex-wrap items-center justify-center gap-2 mb-12">
            @foreach(['Login','Book','Confirm','Pay','Driver Assigned','Notifications','Driver ETA','Trip Started','Trip Completed','Invoice'] as $step)
                <div class="cp-flow-step"><span class="text-[12.5px] font-semibold" style="color:#0F172A;">{{ $step }}</span></div>
                @if(!$loop->last)
                <svg class="cp-arrow" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                @endif
            @endforeach
        </div>

        <div class="cp-figure max-w-5xl mx-auto">
            <img src="{{ asset('public/assets/images/customer-panel-features/cp-journey.jpg') }}" alt="Complete LimoSchedule customer journey from login and booking through payment, trip and invoice" width="1254" height="1254" class="w-full h-auto block" loading="lazy" decoding="async">
        </div>

        <p class="text-center cp-muted text-[13.5px] mt-8">Account management and support are available as secondary capabilities at every step of the journey.</p>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     FEATURE GRID
═══════════════════════════════════════════════════════════════ -->
<section class="cp-section-soft relative py-20 lg:py-24">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="cp-eyebrow mb-5">Full Overview</span>
            <h2 class="cp-h2 text-3xl sm:text-4xl">Everything Customers Need, Already Connected</h2>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3.5">
            @foreach(['Customer Dashboard','Profile Management','Saved Addresses','Booking Management','Trip Tracking','Driver Information','Online Payments','Wallet','Loyalty Points','Coupons','PDF Invoices','Notifications','Browser Push','Support Tickets','Security & Sessions','Language & Currency','Dark Mode','Responsive Mobile Experience'] as $item)
            <div class="cp-card px-4 py-4 text-center">
                <span class="text-[12.5px] font-semibold" style="color:#0F172A;">{{ $item }}</span>
            </div>
            @endforeach
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
            Give Your Customers More Than A Booking Form.
        </h2>
        <p class="text-gray-300 text-[16px] leading-relaxed mb-10 max-w-xl mx-auto">
            Deliver a complete digital customer experience with booking management, payments, trip updates, invoices, notifications, support and account controls &mdash; all in one responsive panel.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="{{ route('contact') }}" class="cp-btn-primary w-full sm:w-auto">
                <span>Book a Demo</span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a href="{{ url('/') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 font-bold px-8 py-4 rounded-xl text-[15px] text-white transition-all duration-200 hover:bg-white/10" style="background: rgba(255,255,255,0.06); border: 1.5px solid rgba(255,255,255,0.25);">
                Explore LimoSchedule
            </a>
        </div>
        <p class="text-gray-400 text-[13px] mt-8">
            Curious what the public booking site looks like? Explore the <a href="{{ route('website-features') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">Website Features</a> or <a href="{{ route('driver-panel-features') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">Driver Panel Features</a>.
        </p>
    </div>
</section>

</div>

@endsection
