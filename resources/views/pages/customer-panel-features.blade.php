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
        padding: 6px 14px; border-radius: 999px;
        background: rgba(37,99,235,0.08); border: 1px solid rgba(37,99,235,0.22);
        color: #1D4ED8; font-size: 11px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase;
    }
    #cp-page .cp-h1 { color: #0F172A; font-weight: 800; letter-spacing: -0.02em; line-height: 1.08; }
    #cp-page .cp-h2 { color: #0F172A; font-weight: 800; letter-spacing: -0.015em; line-height: 1.15; }
    #cp-page .cp-h3 { color: #0F172A; font-weight: 700; }
    #cp-page .cp-body { color: #475569; }
    #cp-page .cp-muted { color: #64748B; }
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
        background: #ffffff; border: 1px solid rgba(15,23,42,0.08); border-radius: 12px;
        padding: 9px 12px; display: flex; align-items: center; gap: 8px;
        box-shadow: 0 6px 16px rgba(15,23,42,0.05); font-size: 12px; font-weight: 600; color: #0F172A;
    }
    #cp-page .cp-arrow { color: #93A3B8; flex-shrink: 0; }
    #cp-page .cp-note {
        background: #EFF6FF; border: 1px solid rgba(37,99,235,0.18); border-radius: 12px;
        padding: 10px 14px; color: #1E3A8A; font-size: 12px; line-height: 1.55;
    }

    /* Explorer layout */
    #cp-page .cp-explorer { display: flex; align-items: flex-start; gap: 24px; }
    #cp-page .cp-tabs {
        flex: 0 0 260px; width: 260px; position: sticky; top: 84px;
        display: flex; flex-direction: column; gap: 3px;
        max-height: calc(100vh - 104px); overflow-y: auto;
        padding-right: 4px;
    }
    #cp-page .cp-tab {
        display: flex; align-items: center; gap: 11px;
        padding: 9px 12px; border-radius: 11px;
        border: 1px solid transparent; border-left: 3px solid transparent;
        background: transparent; text-align: left; cursor: pointer;
        transition: background 0.15s ease, border-color 0.15s ease;
        width: 100%;
    }
    #cp-page .cp-tab:hover { background: #F8FAFC; }
    #cp-page .cp-tab.active {
        background: rgba(37,99,235,0.07);
        border-color: rgba(37,99,235,0.16);
        border-left-color: #2563EB;
    }
    #cp-page .cp-tab-icon {
        width: 30px; height: 30px; border-radius: 8px; flex-shrink: 0;
        display: flex; align-items: center; justify-content: center;
        background: #F1F5F9; color: #64748B;
        transition: background 0.15s ease, color 0.15s ease;
    }
    #cp-page .cp-tab.active .cp-tab-icon { background: #2563EB; color: #fff; }
    #cp-page .cp-tab-name { font-size: 13px; font-weight: 700; color: #0F172A; line-height: 1.25; }
    #cp-page .cp-tab-desc { font-size: 11px; color: #94A3B8; line-height: 1.2; margin-top: 1px; }
    #cp-page .cp-tab.active .cp-tab-desc { color: #64748B; }

    #cp-page .cp-content { flex: 1 1 0%; min-width: 0; }
    #cp-page .cp-panel { display: none; }
    #cp-page .cp-panel.active { display: block; animation: cp-fade 0.3s ease; }
    @keyframes cp-fade { from { opacity: 0; transform: translateY(5px); } to { opacity: 1; transform: translateY(0); } }

    #cp-page .cp-panel-grid { display: grid; grid-template-columns: 1fr; gap: 22px; align-items: center; }
    @media (min-width: 1024px) { #cp-page .cp-panel-grid { grid-template-columns: 1fr 1fr; gap: 32px; } }

    #cp-page .cp-figure {
        border-radius: 16px; overflow: hidden; border: 1px solid rgba(15,23,42,0.08);
        box-shadow: 0 20px 50px rgba(15,23,42,0.09);
        display: flex; align-items: center; justify-content: center;
        background: #F8FAFC; max-height: 400px;
    }
    #cp-page .cp-figure img { max-height: 400px; width: auto; max-width: 100%; height: auto; display: block; margin: 0 auto; }

    #cp-page .cp-feature-card {
        background: #F8FAFC; border: 1px solid rgba(15,23,42,0.06); border-radius: 12px;
        padding: 11px 13px; display: flex; align-items: flex-start; gap: 9px;
    }
    #cp-page .cp-chip {
        background: #F1F5F9; border: 1px solid rgba(15,23,42,0.06); border-radius: 9px;
        padding: 7px 10px; font-size: 11.5px; font-weight: 600; color: #0F172A; text-align: center;
    }
    #cp-page .cp-cta-box {
        background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%);
        border-radius: 20px; padding: 34px 28px; text-align: center;
    }

    @media (max-width: 900px) {
        #cp-page .cp-explorer { flex-direction: column; gap: 14px; }
        #cp-page .cp-tabs {
            position: sticky; top: 0; z-index: 20; width: 100%; flex: none;
            flex-direction: row; overflow-x: auto; overflow-y: hidden; max-height: none;
            padding: 8px 4px; background: #ffffff; border-bottom: 1px solid rgba(15,23,42,0.08);
            gap: 6px; -webkit-overflow-scrolling: touch;
        }
        #cp-page .cp-tab { flex: 0 0 auto; width: auto; border-left: none; border-bottom: 3px solid transparent; border-radius: 9px; }
        #cp-page .cp-tab.active { border-left-color: transparent; border-bottom-color: #2563EB; }
        #cp-page .cp-tab-desc { display: none; }
        #cp-page .cp-figure { max-height: 280px; }
        #cp-page .cp-figure img { max-height: 280px; }
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

    <div class="relative z-10 max-w-4xl mx-auto px-5 sm:px-6 lg:px-8 pt-8 pb-10 lg:pt-10 lg:pb-12 text-center">
        <span class="cp-eyebrow mb-5">Customer Panel</span>

        <h1 class="cp-h1 text-3xl sm:text-4xl lg:text-[44px] mb-5">
            Everything Your Customers Need, In One Powerful Panel.
        </h1>

        <p class="cp-body text-[15.5px] leading-relaxed max-w-2xl mx-auto mb-7">
            Give customers a complete self-service experience to book rides, manage trips, track drivers, make payments, access invoices, receive notifications, and manage their account &mdash; from any device.
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="{{ route('contact') }}" class="cp-btn-primary w-full sm:w-auto">
                <span>Book a Demo</span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a href="#cp-explorer" class="cp-btn-secondary w-full sm:w-auto">Explore Customer Features</a>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     COMPACT INTRO
═══════════════════════════════════════════════════════════════ -->
<section id="cp-explorer" class="relative pt-2 pb-6">
    <div class="max-w-3xl mx-auto px-5 sm:px-6 lg:px-8 text-center">
        <h2 class="cp-h2 text-xl sm:text-2xl mb-2">A Complete Customer Experience Beyond Booking</h2>
        <p class="cp-body text-[13.5px] leading-relaxed">Browse each part of the Customer Panel below &mdash; from the dashboard to payments, support and mobile access.</p>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     MAIN FEATURE EXPLORER
═══════════════════════════════════════════════════════════════ -->
<section class="relative pb-16">
    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">

        @php
            $cpModules = [
                'dashboard' => ['Dashboard', 'Next ride & stats'],
                'profile' => ['Profile & Preferences', 'Addresses & personalization'],
                'booking' => ['Booking Management', 'Full booking lifecycle'],
                'dispatch' => ['Live Dispatch & ETA', 'Distance & driver info'],
                'payments' => ['Payments & Wallet', 'Payments, wallet & loyalty'],
                'invoices' => ['Invoices', 'PDF invoices & history'],
                'notifications' => ['Notifications', 'Push, in-app & email'],
                'support' => ['Support', 'Ticket-based help'],
                'security' => ['Security', 'Sessions & password'],
                'settings' => ['Settings', 'Language, currency & theme'],
                'mobile' => ['Mobile Experience', 'Responsive on any device'],
                'journey' => ['Customer Journey', 'The full connected flow'],
            ];
            $cpIcons = [
                'dashboard' => '<rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/>',
                'profile' => '<path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/>',
                'booking' => '<rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>',
                'dispatch' => '<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3.5 2"/>',
                'payments' => '<rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/>',
                'invoices' => '<path d="M4 19.5A2.5 2.5 0 016.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z"/>',
                'notifications' => '<path d="M18 8a6 6 0 00-12 0c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 01-3.46 0"/>',
                'support' => '<path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/>',
                'security' => '<rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/>',
                'settings' => '<circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 11-2.83 2.83l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 11-2.83-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 112.83-2.83l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 112.83 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/>',
                'mobile' => '<rect x="7" y="2" width="10" height="20" rx="2"/><line x1="11" y1="18" x2="13" y2="18"/>',
                'journey' => '<path d="M9 20l-5.5-5.5a4.95 4.95 0 010-7 4.95 4.95 0 017 0L12 9l1.5-1.5a4.95 4.95 0 017 0 4.95 4.95 0 010 7L15 20"/>',
            ];
        @endphp

        <div class="cp-explorer">

            <!-- LEFT: STICKY TABS -->
            <nav class="cp-tabs" role="tablist" aria-label="Customer Panel modules">
                @foreach($cpModules as $key => [$name, $desc])
                <button type="button" class="cp-tab @if($loop->first) active @endif" role="tab" data-target="cp-tab-{{ $key }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                    <span class="cp-tab-icon">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">{!! $cpIcons[$key] !!}</svg>
                    </span>
                    <span>
                        <span class="cp-tab-name block">{{ $name }}</span>
                        <span class="cp-tab-desc block">{{ $desc }}</span>
                    </span>
                </button>
                @endforeach
            </nav>

            <!-- RIGHT: CONTENT -->
            <div class="cp-content">

                <!-- 1. DASHBOARD -->
                <div class="cp-panel active" id="cp-tab-dashboard" role="tabpanel">
                    <div class="cp-panel-grid">
                        <div>
                            <span class="cp-eyebrow mb-3">Dashboard</span>
                            <h2 class="cp-h2 text-xl sm:text-2xl mb-2">A Dashboard Built Around Every Customer&rsquo;s Next Ride</h2>
                            <p class="cp-body text-[13px] leading-relaxed mb-4">The dashboard gives customers the information they care about most, the moment they sign in.</p>

                            <div class="grid grid-cols-2 gap-2">
                                @foreach(['Next Ride Summary','Assigned Driver','Total Spent','Completed Trips','Upcoming Trips','Recent Trips List','Quick Actions','Notification Count'] as $item)
                                <div class="cp-chip">{{ $item }}</div>
                                @endforeach
                            </div>
                        </div>
                        <div class="cp-figure">
                            <img src="{{ asset('public/assets/images/customer-panel-features/cp-dashboard.jpg') }}" alt="LimoSchedule customer dashboard with next ride summary, spend, trips and quick action tiles" width="1254" height="1254" loading="eager" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 2. PROFILE & PREFERENCES -->
                <div class="cp-panel" id="cp-tab-profile" role="tabpanel">
                    <div class="cp-panel-grid">
                        <div>
                            <span class="cp-eyebrow mb-3">Profile &amp; Preferences</span>
                            <h2 class="cp-h2 text-xl sm:text-2xl mb-2">Personalized To Every Customer</h2>
                            <p class="cp-body text-[13px] leading-relaxed mb-4">Customers manage their personal information and preferences from their own account.</p>

                            <div class="grid grid-cols-2 gap-2">
                                @foreach(['Name, Email & Phone','Profile Photo','Saved Addresses','Home / Work Labels','Default Address','Language','Currency','Light / Dark Theme'] as $item)
                                <div class="cp-chip">{{ $item }}</div>
                                @endforeach
                            </div>
                        </div>
                        <div class="cp-figure">
                            <img src="{{ asset('public/assets/images/customer-panel-features/cp-profile.jpg') }}" alt="LimoSchedule customer profile page with saved addresses, default address and preferences" width="1254" height="1254" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 3. BOOKING MANAGEMENT -->
                <div class="cp-panel" id="cp-tab-booking" role="tabpanel">
                    <div class="cp-panel-grid">
                        <div>
                            <span class="cp-eyebrow mb-3">Booking Management</span>
                            <h2 class="cp-h2 text-xl sm:text-2xl mb-2">Complete Control Over Every Booking</h2>
                            <p class="cp-body text-[13px] leading-relaxed mb-3">Customers manage their entire booking history &mdash; from creating a ride to completion or cancellation.</p>

                            <div class="flex flex-wrap items-center gap-1.5 mb-3">
                                @foreach(['Pending','Confirmed','Assigned','In Progress','Completed'] as $status)
                                    <div class="cp-flow-step">{{ $status }}</div>
                                    @if(!$loop->last)<svg class="cp-arrow" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>@endif
                                @endforeach
                            </div>

                            <div class="grid grid-cols-2 gap-2">
                                @foreach(['New Booking','Booking Details','Pickup, Drop-off & Stops','Fare Breakdown','Payment Status','Cancellation with Reason','Shareable Payment Link','Or Cancelled Anytime'] as $item)
                                <div class="cp-chip">{{ $item }}</div>
                                @endforeach
                            </div>
                        </div>
                        <div class="cp-figure">
                            <img src="{{ asset('public/assets/images/customer-panel-features/cp-booking-management.jpg') }}" alt="LimoSchedule booking management showing all bookings, booking details and cancellation options" width="1254" height="1254" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 4. LIVE DISPATCH & ETA -->
                <div class="cp-panel" id="cp-tab-dispatch" role="tabpanel">
                    <div class="cp-panel-grid">
                        <div>
                            <span class="cp-eyebrow mb-3">Live Dispatch</span>
                            <h2 class="cp-h2 text-xl sm:text-2xl mb-2">Know When Your Driver Is Getting Close</h2>
                            <p class="cp-body text-[13px] leading-relaxed mb-3">Live dispatch information appears inside the booking details, once a driver is assigned.</p>

                            <div class="grid grid-cols-2 gap-2 mb-3">
                                @foreach(['Assigned Driver Name','Driver Photo & Phone','Distance to Pickup','Estimated Arrival Time'] as $item)
                                <div class="cp-chip">{{ $item }}</div>
                                @endforeach
                            </div>

                            <div class="cp-note">
                                Real distance and time-to-arrival numbers &mdash; not an animated map with a moving vehicle marker.
                            </div>
                        </div>
                        <div class="cp-figure">
                            <img src="{{ asset('public/assets/images/customer-panel-features/cp-dispatch.jpg') }}" alt="LimoSchedule live driver dispatch showing distance to pickup and estimated arrival time" width="1254" height="1254" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 5. PAYMENTS & WALLET -->
                <div class="cp-panel" id="cp-tab-payments" role="tabpanel">
                    <div class="cp-panel-grid">
                        <div>
                            <span class="cp-eyebrow mb-3">Payments &amp; Wallet</span>
                            <h2 class="cp-h2 text-xl sm:text-2xl mb-2">Flexible Payment &amp; Balance Management</h2>
                            <p class="cp-body text-[13px] leading-relaxed mb-3">Stripe, PayPal, a shareable payment link, and a standalone wallet and loyalty balance.</p>

                            <div class="grid grid-cols-2 gap-2 mb-3">
                                @foreach(['Stripe & PayPal','Shareable Payment Link','Wallet Balance & Recharge','Auto-Refund to Wallet','Loyalty Points History','Coupon Codes'] as $item)
                                <div class="cp-chip">{{ $item }}</div>
                                @endforeach
                            </div>

                            <div class="cp-note">
                                Wallet is a standalone balance, not yet usable at checkout. Loyalty points are admin-managed, not auto-earned/redeemed.
                            </div>
                        </div>
                        <div class="cp-figure">
                            <img src="{{ asset('public/assets/images/customer-panel-features/cp-payments-wallet.jpg') }}" alt="LimoSchedule payments, wallet and loyalty points page with balance and transaction history" width="1254" height="1254" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 6. INVOICES -->
                <div class="cp-panel" id="cp-tab-invoices" role="tabpanel">
                    <div class="cp-panel-grid">
                        <div>
                            <span class="cp-eyebrow mb-3">Invoices</span>
                            <h2 class="cp-h2 text-xl sm:text-2xl mb-2">Professional Invoices, Ready When Needed</h2>
                            <p class="cp-body text-[13px] leading-relaxed mb-4">Customers can forward invoices to employers or third parties for expense reporting.</p>

                            <div class="grid grid-cols-2 gap-2">
                                @foreach(['Invoice List','PDF Download','Company Info & Tax','Public Invoice Access','Shareable Invoice Link','Fare Breakdown'] as $item)
                                <div class="cp-chip">{{ $item }}</div>
                                @endforeach
                            </div>
                        </div>
                        <div class="cp-figure">
                            <img src="{{ asset('public/assets/images/customer-panel-features/cp-invoices.jpg') }}" alt="LimoSchedule invoice list with a branded PDF invoice showing fare breakdown and tax" width="1254" height="1254" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 7. NOTIFICATIONS -->
                <div class="cp-panel" id="cp-tab-notifications" role="tabpanel">
                    <div class="cp-panel-grid">
                        <div>
                            <span class="cp-eyebrow mb-3">Notifications</span>
                            <h2 class="cp-h2 text-xl sm:text-2xl mb-2">Never Miss an Important Update</h2>
                            <p class="cp-body text-[13px] leading-relaxed mb-3">Browser push, in-app center and email updates &mdash; enabled directly from the panel.</p>

                            <div class="flex flex-wrap gap-1.5">
                                @foreach(['Booking Created','Driver Assigned','Trip Started','Trip Completed','Payment Received','Invoice Ready'] as $event)
                                <span class="text-[11px] font-medium px-2.5 py-1 rounded-full" style="background:#EFF6FF; color:#1D4ED8; border:1px solid rgba(37,99,235,0.2);">{{ $event }}</span>
                                @endforeach
                            </div>
                        </div>
                        <div class="cp-figure">
                            <img src="{{ asset('public/assets/images/customer-panel-features/cp-notifications.jpg') }}" alt="LimoSchedule customer notification center with browser push notifications for booking events" width="1254" height="1254" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 8. SUPPORT -->
                <div class="cp-panel" id="cp-tab-support" role="tabpanel">
                    <div class="cp-panel-grid">
                        <div>
                            <span class="cp-eyebrow mb-3">Support</span>
                            <h2 class="cp-h2 text-xl sm:text-2xl mb-2">Support When Your Customers Need It</h2>
                            <p class="cp-body text-[13px] leading-relaxed mb-3">A support ticket and message-thread system &mdash; not live chat.</p>

                            <div class="flex flex-wrap items-center gap-1.5">
                                @foreach(['Open','In Progress','Closed'] as $status)
                                    <div class="cp-flow-step">{{ $status }}</div>
                                    @if(!$loop->last)<svg class="cp-arrow" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>@endif
                                @endforeach
                            </div>
                        </div>
                        <div class="cp-figure">
                            <img src="{{ asset('public/assets/images/customer-panel-features/cp-support.jpg') }}" alt="LimoSchedule customer support ticket with a threaded conversation between customer and support agent" width="1254" height="1254" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 9. SECURITY -->
                <div class="cp-panel" id="cp-tab-security" role="tabpanel">
                    <div class="cp-panel-grid">
                        <div>
                            <span class="cp-eyebrow mb-3">Security</span>
                            <h2 class="cp-h2 text-xl sm:text-2xl mb-2">More Control Over Account Security</h2>
                            <p class="cp-body text-[13px] leading-relaxed mb-4">A clean, security-focused area separate from general account settings.</p>

                            <div class="grid grid-cols-2 gap-2">
                                @foreach(['Change Password','Active Session List','Device / Browser Info','Revoke Individual Session','Sign Out All Others','Login History'] as $item)
                                <div class="cp-chip">{{ $item }}</div>
                                @endforeach
                            </div>
                        </div>
                        <div class="cp-figure">
                            <img src="{{ asset('public/assets/images/customer-panel-features/cp-security.jpg') }}" alt="LimoSchedule account security page with active sessions, login history and password change" width="1254" height="1254" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 10. SETTINGS -->
                <div class="cp-panel" id="cp-tab-settings" role="tabpanel">
                    <div class="cp-panel-grid">
                        <div>
                            <span class="cp-eyebrow mb-3">Settings</span>
                            <h2 class="cp-h2 text-xl sm:text-2xl mb-2">Preferences That Adapt To Every Customer</h2>
                            <p class="cp-body text-[13px] leading-relaxed mb-4">Preferences are saved per customer account, independent of the public website&rsquo;s own settings.</p>

                            <div class="grid grid-cols-2 gap-2">
                                @foreach(['Language','Currency','Light / Dark Theme','Push Notification Prefs'] as $item)
                                <div class="cp-chip">{{ $item }}</div>
                                @endforeach
                            </div>
                        </div>
                        <div class="cp-figure">
                            <img src="{{ asset('public/assets/images/customer-panel-features/cp-settings.jpg') }}" alt="LimoSchedule personalized customer settings for language, currency, theme and notification preferences" width="1254" height="1254" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 11. MOBILE EXPERIENCE -->
                <div class="cp-panel" id="cp-tab-mobile" role="tabpanel">
                    <div class="cp-panel-grid">
                        <div>
                            <span class="cp-eyebrow mb-3">Mobile Experience</span>
                            <h2 class="cp-h2 text-xl sm:text-2xl mb-2">A Complete Panel On Every Screen</h2>
                            <p class="cp-body text-[13px] leading-relaxed mb-3">Designed as a responsive web application &mdash; consistent across desktop, tablet and mobile.</p>

                            <div class="mb-3">
                                <span class="text-[10.5px] font-bold uppercase tracking-wide px-3 py-1.5 rounded-full" style="background:#EFF6FF; color:#1D4ED8; border:1px solid rgba(37,99,235,0.25);">Responsive Web Application &mdash; Not a Native App</span>
                            </div>

                            <div class="grid grid-cols-2 gap-2">
                                @foreach(['Collapsible Sidebar','Off-Canvas Menu','Sticky Bottom Nav','Mobile Booking Layout'] as $item)
                                <div class="cp-chip">{{ $item }}</div>
                                @endforeach
                            </div>
                        </div>
                        <div class="cp-figure">
                            <img src="{{ asset('public/assets/images/customer-panel-features/cp-mobile.jpg') }}" alt="LimoSchedule customer panel shown responsively on desktop, tablet and mobile screens" width="1254" height="1254" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 12. CUSTOMER JOURNEY -->
                <div class="cp-panel" id="cp-tab-journey" role="tabpanel">
                    <div class="cp-panel-grid">
                        <div>
                            <span class="cp-eyebrow mb-3">Customer Journey</span>
                            <h2 class="cp-h2 text-xl sm:text-2xl mb-2">One Connected Journey</h2>
                            <p class="cp-body text-[13px] leading-relaxed mb-3">From booking to completion, account management and support are available at every step.</p>

                            <div class="flex flex-wrap items-center gap-1.5">
                                @foreach(['Login','Book','Pay','Driver Assigned','Trip Started','Completed','Invoice'] as $step)
                                    <div class="cp-flow-step">{{ $step }}</div>
                                    @if(!$loop->last)<svg class="cp-arrow" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>@endif
                                @endforeach
                            </div>
                        </div>
                        <div class="cp-figure">
                            <img src="{{ asset('public/assets/images/customer-panel-features/cp-journey.jpg') }}" alt="Complete LimoSchedule customer journey from login and booking through payment, trip and invoice" width="1254" height="1254" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

            </div><!-- /cp-content -->
        </div><!-- /cp-explorer -->

        <!-- Compact CTA -->
        <div class="cp-cta-box mt-14">
            <h2 class="text-white font-extrabold tracking-tight text-2xl sm:text-3xl mb-3">Give Your Customers More Than A Booking Form.</h2>
            <p class="text-gray-300 text-[14px] max-w-xl mx-auto mb-7">Deliver a complete digital customer experience with booking management, payments, trip updates, invoices, notifications, support and account controls &mdash; all in one responsive panel.</p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                <a href="{{ route('contact') }}" class="cp-btn-primary w-full sm:w-auto">
                    <span>Book a Demo</span>
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a href="{{ url('/') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 font-bold px-8 py-[13px] rounded-xl text-[14.5px] text-white transition-all duration-200 hover:bg-white/10" style="background: rgba(255,255,255,0.06); border: 1.5px solid rgba(255,255,255,0.25);">
                    Explore LimoSchedule
                </a>
            </div>
            <p class="text-gray-400 text-[12.5px] mt-6">
                Also see the <a href="{{ route('website-features') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">Website</a>, <a href="{{ route('driver-panel-features') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">Driver Panel</a>, and <a href="{{ route('admin-panel-features') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">Admin Panel</a> feature pages.
            </p>
        </div>

    </div>
</section>

</div>

@endsection

@push('scripts')
<script>
(function () {
    var tabs = document.querySelectorAll('#cp-page .cp-tab');
    var panels = document.querySelectorAll('#cp-page .cp-panel');

    tabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            var targetId = tab.getAttribute('data-target');

            tabs.forEach(function (t) {
                t.classList.remove('active');
                t.setAttribute('aria-selected', 'false');
            });
            tab.classList.add('active');
            tab.setAttribute('aria-selected', 'true');

            panels.forEach(function (p) {
                p.classList.toggle('active', p.id === targetId);
            });

            if (window.innerWidth <= 900) {
                var content = document.querySelector('#cp-page .cp-content');
                if (content) {
                    var top = content.getBoundingClientRect().top + window.scrollY - 70;
                    window.scrollTo({ top: top, behavior: 'smooth' });
                }
                tab.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
            }
        });
    });
})();
</script>
@endpush
