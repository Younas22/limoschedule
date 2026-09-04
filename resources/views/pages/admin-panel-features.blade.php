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
    #apf-page { background: #ffffff; }
    #apf-page * { box-sizing: border-box; }
    #apf-page .apf-eyebrow {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 6px 14px; border-radius: 999px;
        background: rgba(37,99,235,0.08); border: 1px solid rgba(37,99,235,0.22);
        color: #1D4ED8; font-size: 11px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase;
    }
    #apf-page .apf-h1 { color: #0F172A; font-weight: 800; letter-spacing: -0.02em; line-height: 1.1; }
    #apf-page .apf-h2 { color: #0F172A; font-weight: 800; letter-spacing: -0.015em; line-height: 1.15; }
    #apf-page .apf-h3 { color: #0F172A; font-weight: 700; }
    #apf-page .apf-body { color: #475569; }
    #apf-page .apf-muted { color: #64748B; }

    /* Explorer layout */
    #apf-page .apf-explorer { display: flex; align-items: flex-start; gap: 24px; }
    #apf-page .apf-tabs {
        flex: 0 0 260px; width: 260px; position: sticky; top: 84px;
        display: flex; flex-direction: column; gap: 3px;
        max-height: calc(100vh - 104px); overflow-y: auto;
        padding-right: 4px;
    }
    #apf-page .apf-tab {
        display: flex; align-items: center; gap: 11px;
        padding: 9px 12px; border-radius: 11px;
        border: 1px solid transparent; border-left: 3px solid transparent;
        background: transparent; text-align: left; cursor: pointer;
        transition: background 0.15s ease, border-color 0.15s ease;
        width: 100%;
    }
    #apf-page .apf-tab:hover { background: #F8FAFC; }
    #apf-page .apf-tab.active {
        background: rgba(37,99,235,0.07);
        border-color: rgba(37,99,235,0.16);
        border-left-color: #2563EB;
    }
    #apf-page .apf-tab-icon {
        width: 30px; height: 30px; border-radius: 8px; flex-shrink: 0;
        display: flex; align-items: center; justify-content: center;
        background: #F1F5F9; color: #64748B;
        transition: background 0.15s ease, color 0.15s ease;
    }
    #apf-page .apf-tab.active .apf-tab-icon { background: #2563EB; color: #fff; }
    #apf-page .apf-tab-name { font-size: 13px; font-weight: 700; color: #0F172A; line-height: 1.25; }
    #apf-page .apf-tab-desc { font-size: 11px; color: #94A3B8; line-height: 1.2; margin-top: 1px; }
    #apf-page .apf-tab.active .apf-tab-desc { color: #64748B; }

    #apf-page .apf-content { flex: 1 1 0%; min-width: 0; }
    #apf-page .apf-panel { display: none; }
    #apf-page .apf-panel.active { display: block; animation: apf-fade 0.3s ease; }
    @keyframes apf-fade { from { opacity: 0; transform: translateY(5px); } to { opacity: 1; transform: translateY(0); } }

    #apf-page .apf-panel-grid { display: grid; grid-template-columns: 1fr; gap: 22px; align-items: center; }
    @media (min-width: 1024px) { #apf-page .apf-panel-grid { grid-template-columns: 1fr 1fr; gap: 32px; } }

    #apf-page .apf-card {
        background: #ffffff; border: 1px solid rgba(15,23,42,0.08); border-radius: 14px;
        box-shadow: 0 8px 24px rgba(15,23,42,0.04);
    }
    #apf-page .apf-feature-card {
        background: #F8FAFC; border: 1px solid rgba(15,23,42,0.06); border-radius: 12px;
        padding: 11px 13px; display: flex; align-items: flex-start; gap: 9px;
    }
    #apf-page .apf-check { color: #2563EB; flex-shrink: 0; margin-top: 1px; }
    #apf-page .apf-figure {
        border-radius: 16px; overflow: hidden; border: 1px solid rgba(15,23,42,0.08);
        box-shadow: 0 20px 50px rgba(15,23,42,0.09);
        background: #F8FAFC; display: flex; align-items: center; justify-content: center;
        max-height: 400px; padding: 8px;
    }
    #apf-page .apf-figure img { max-height: 384px; width: auto; max-width: 100%; height: auto; border-radius: 9px; display: block; margin: 0 auto; }
    #apf-page .apf-note {
        background: #EFF6FF; border: 1px solid rgba(37,99,235,0.18); border-radius: 12px;
        padding: 10px 14px; color: #1E3A8A; font-size: 12px; line-height: 1.55;
    }
    #apf-page .apf-danger {
        background: #FEF2F2; border: 1px solid rgba(220,38,38,0.25); border-radius: 12px;
        padding: 10px 14px; color: #991B1B; font-size: 12px; line-height: 1.55;
    }
    #apf-page .apf-flow-step {
        background: #fff; border: 1px solid rgba(15,23,42,0.08); border-radius: 12px;
        padding: 9px 12px; font-size: 12px; font-weight: 600; color: #0F172A;
        box-shadow: 0 4px 12px rgba(15,23,42,0.04);
        white-space: nowrap;
    }
    #apf-page .apf-arrow { color: #93A3B8; flex-shrink: 0; }
    #apf-page .apf-chip {
        background: #F1F5F9; border: 1px solid rgba(15,23,42,0.06); border-radius: 9px;
        padding: 7px 10px; font-size: 11.5px; font-weight: 600; color: #0F172A; text-align: center;
    }

    #apf-page .apf-btn-primary {
        display: inline-flex; align-items: center; justify-content: center; gap: 8px;
        background: #2563EB; color: #fff; font-weight: 700; font-size: 14.5px;
        padding: 13px 26px; border-radius: 11px; border: 1px solid #1D4ED8;
        box-shadow: 0 8px 20px rgba(37,99,235,0.25);
        transition: background 0.2s ease, transform 0.2s ease;
    }
    #apf-page .apf-btn-primary:hover { background: #1D4ED8; transform: translateY(-1px); }
    #apf-page .apf-cta-box {
        background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%);
        border-radius: 20px; padding: 34px 28px; text-align: center;
    }

    /* Mobile: horizontal scroll tab bar */
    @media (max-width: 900px) {
        #apf-page .apf-explorer { flex-direction: column; gap: 14px; }
        #apf-page .apf-tabs {
            position: sticky; top: 0; z-index: 20; width: 100%; flex: none;
            flex-direction: row; overflow-x: auto; overflow-y: hidden; max-height: none;
            padding: 8px 4px; background: #ffffff; border-bottom: 1px solid rgba(15,23,42,0.08);
            gap: 6px; -webkit-overflow-scrolling: touch;
        }
        #apf-page .apf-tab { flex: 0 0 auto; width: auto; border-left: none; border-bottom: 3px solid transparent; border-radius: 9px; }
        #apf-page .apf-tab.active { border-left-color: transparent; border-bottom-color: #2563EB; }
        #apf-page .apf-tab-desc { display: none; }
        #apf-page .apf-figure { max-height: 280px; }
        #apf-page .apf-figure img { max-height: 264px; }
    }
</style>
@endpush

@section('content')

<div id="apf-page">

<!-- ═══════════════════════════════════════════════════════════════
     COMPACT PAGE INTRO
═══════════════════════════════════════════════════════════════ -->
<section class="relative" style="background: linear-gradient(180deg, #F8FAFC 0%, #ffffff 100%);">
@php
    $breadcrumbs = [
        ['label' => 'Home', 'url' => url('/')],
        ['label' => 'Admin Panel', 'url' => null],
    ];
@endphp
<style>#apf-page nav[aria-label="Breadcrumb"] a, #apf-page nav[aria-label="Breadcrumb"] span { color: #64748B !important; }
#apf-page nav[aria-label="Breadcrumb"] a:hover { color: #0F172A !important; }
#apf-page nav[aria-label="Breadcrumb"] span[aria-current] { color: #0F172A !important; }</style>
@include('partials._breadcrumbs')

    <div class="max-w-4xl mx-auto px-5 sm:px-6 lg:px-8 pt-6 pb-8 text-center">
        <span class="apf-eyebrow mb-4">Admin Panel</span>
        <h1 class="apf-h1 text-2xl sm:text-3xl lg:text-[36px] mb-3">Complete Control. One Powerful Admin Panel.</h1>
        <p class="apf-body text-[14px] leading-relaxed max-w-2xl mx-auto">
            Manage bookings, customers, drivers, vehicles, pricing, payments, notifications, content and system settings from one centralized control center.
        </p>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     MAIN FEATURE EXPLORER
═══════════════════════════════════════════════════════════════ -->
<section class="relative pb-16">
    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">

        @php
            $modules = [
                'dashboard' => ['Dashboard', 'Live operations overview'],
                'booking' => ['Booking Management', 'Bookings & dispatch'],
                'customer' => ['Customer Management', 'Customers & wallet'],
                'driver' => ['Driver Management', 'Drivers & availability'],
                'vehicle' => ['Vehicle & Fleet', 'Fleet control'],
                'pricing' => ['Pricing & Promotions', 'Fare rules & offers'],
                'payments' => ['Payments & Invoices', 'Transactions & billing'],
                'reports' => ['Reports & Analytics', 'Business insights'],
                'notifications' => ['Notifications & CMS', 'Communication & content'],
                'settings' => ['Settings & System Tools', 'System configuration'],
            ];
            $icons = [
                'dashboard' => '<rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/>',
                'booking' => '<rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>',
                'customer' => '<path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/>',
                'driver' => '<circle cx="7" cy="17" r="2"/><circle cx="17" cy="17" r="2"/><path d="M5 17H3v-6l2-5h11l3 5h1a2 2 0 012 2v4h-2"/><path d="M9 17h6"/>',
                'vehicle' => '<circle cx="7" cy="17" r="2"/><circle cx="17" cy="17" r="2"/><path d="M5 17H3v-6l2-5h11l3 5h1a2 2 0 012 2v4h-2"/>',
                'pricing' => '<line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/>',
                'payments' => '<rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/>',
                'reports' => '<line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/>',
                'notifications' => '<path d="M18 8a6 6 0 00-12 0c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 01-3.46 0"/>',
                'settings' => '<circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 11-2.83 2.83l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 11-2.83-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 112.83-2.83l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 112.83 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/>',
            ];
        @endphp

        <div class="apf-explorer">

            <!-- LEFT: STICKY TABS -->
            <nav class="apf-tabs" role="tablist" aria-label="Admin Panel modules">
                @foreach($modules as $key => [$name, $desc])
                <button type="button" class="apf-tab @if($loop->first) active @endif" role="tab" data-target="apf-tab-{{ $key }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                    <span class="apf-tab-icon">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">{!! $icons[$key] !!}</svg>
                    </span>
                    <span>
                        <span class="apf-tab-name block">{{ $name }}</span>
                        <span class="apf-tab-desc block">{{ $desc }}</span>
                    </span>
                </button>
                @endforeach
            </nav>

            <!-- RIGHT: CONTENT -->
            <div class="apf-content">

                <!-- 1. DASHBOARD -->
                <div class="apf-panel active" id="apf-tab-dashboard" role="tabpanel">
                    <div class="apf-panel-grid">
                        <div>
                            <span class="apf-eyebrow mb-3">Dashboard</span>
                            <h2 class="apf-h2 text-xl sm:text-2xl mb-2">Admin Dashboard &amp; Live Operations</h2>
                            <p class="apf-body text-[13px] leading-relaxed mb-4">An immediate overview of the entire booking operation &mdash; every figure computed live from the database.</p>

                            <div class="grid grid-cols-2 gap-2">
                                @foreach(['Total Bookings & Revenue',"Today's Activity",'Pending & Unassigned','Active Rides & Live Fleet','Browser Push Status','Recent Bookings'] as $item)
                                <div class="apf-chip">{{ $item }}</div>
                                @endforeach
                            </div>
                        </div>
                        <div class="apf-figure">
                            <img src="{{ asset('public/assets/images/admin-panel-features/ap-dashboard.jpg') }}" alt="LimoSchedule admin dashboard with total bookings, revenue, active rides, live fleet and browser push status" width="1536" height="1024" loading="eager" fetchpriority="high" decoding="sync">
                        </div>
                    </div>
                </div>

                <!-- 2. BOOKING MANAGEMENT -->
                <div class="apf-panel" id="apf-tab-booking" role="tabpanel">
                    <div class="apf-panel-grid">
                        <div>
                            <span class="apf-eyebrow mb-3">Booking Management</span>
                            <h2 class="apf-h2 text-xl sm:text-2xl mb-2">Booking Management &amp; Smart Dispatch</h2>
                            <p class="apf-body text-[13px] leading-relaxed mb-3">Manage the complete booking lifecycle and assign drivers and vehicles from one workspace.</p>

                            <div class="flex flex-wrap items-center gap-1.5 mb-3">
                                @foreach(['Pending','Confirmed','Assigned','In Progress','Completed'] as $s)
                                <div class="apf-flow-step">{{ $s }}</div>
                                @if(!$loop->last)<svg class="apf-arrow" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>@endif
                                @endforeach
                            </div>

                            <div class="grid grid-cols-2 gap-2 mb-3">
                                @foreach(['Search & Filtering','Manual Booking Creation','Driver & Vehicle Assignment','Smart Dispatch Suggestions','Payment Recording','Refund Processing'] as $item)
                                <div class="apf-chip">{{ $item }}</div>
                                @endforeach
                            </div>

                            <div class="apf-note">
                                Smart dispatch only <strong>suggests</strong> a driver &mdash; the admin always confirms. No driver accept/decline step.
                            </div>
                        </div>
                        <div class="apf-figure">
                            <img src="{{ asset('public/assets/images/admin-panel-features/ap-booking-management.jpg') }}" alt="LimoSchedule booking management with booking lifecycle and smart dispatch suggestions" width="1536" height="1024" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 3. CUSTOMER MANAGEMENT -->
                <div class="apf-panel" id="apf-tab-customer" role="tabpanel">
                    <div class="apf-panel-grid">
                        <div>
                            <span class="apf-eyebrow mb-3">Customer Management</span>
                            <h2 class="apf-h2 text-xl sm:text-2xl mb-2">Customer Management</h2>
                            <p class="apf-body text-[13px] leading-relaxed mb-3">Manage customer profiles, saved addresses, booking history, wallet activity and loyalty credits.</p>

                            <div class="grid grid-cols-2 gap-2 mb-3">
                                @foreach(['Search, Create & Edit','Profile & Addresses','Payment History','Wallet Credit / Debit','Loyalty Points','Activate / Deactivate'] as $item)
                                <div class="apf-chip">{{ $item }}</div>
                                @endforeach
                            </div>

                            <div class="apf-note">
                                Wallet and loyalty adjustments require a reason and are logged. No saved cards; loyalty isn&rsquo;t auto-earned or auto-redeemed.
                            </div>
                        </div>
                        <div class="apf-figure">
                            <img src="{{ asset('public/assets/images/admin-panel-features/ap-customer-management.jpg') }}" alt="LimoSchedule customer management with profile, saved addresses, wallet and loyalty points" width="1536" height="1024" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 4. DRIVER MANAGEMENT -->
                <div class="apf-panel" id="apf-tab-driver" role="tabpanel">
                    <div class="apf-panel-grid">
                        <div>
                            <span class="apf-eyebrow mb-3">Driver Management</span>
                            <h2 class="apf-h2 text-xl sm:text-2xl mb-2">Driver Management &amp; Live Fleet Status</h2>
                            <p class="apf-body text-[13px] leading-relaxed mb-3">Manage drivers, availability, assigned vehicles, commissions, history and earnings.</p>

                            <div class="grid grid-cols-2 gap-2 mb-3">
                                @foreach(['Driver Profiles','Assigned Vehicle','Commission Configuration','Live Availability','Booking History & Earnings','Driver Notifications'] as $item)
                                <div class="apf-chip">{{ $item }}</div>
                                @endforeach
                            </div>

                            <div class="apf-note">
                                License/passport/ID are reference text fields &mdash; no document upload, verification, payout, or driver&ndash;customer chat.
                            </div>
                        </div>
                        <div class="apf-figure">
                            <img src="{{ asset('public/assets/images/admin-panel-features/ap-driver-management.jpg') }}" alt="LimoSchedule driver management with live status, assigned vehicle, commission and earnings" width="1536" height="1024" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 5. VEHICLE & FLEET -->
                <div class="apf-panel" id="apf-tab-vehicle" role="tabpanel">
                    <div class="apf-panel-grid">
                        <div>
                            <span class="apf-eyebrow mb-3">Vehicle &amp; Fleet</span>
                            <h2 class="apf-h2 text-xl sm:text-2xl mb-2">Vehicle &amp; Fleet Management</h2>
                            <p class="apf-body text-[13px] leading-relaxed mb-3">Manage vehicle categories, individual vehicles, amenities, pricing overrides and driver assignments.</p>

                            <div class="grid grid-cols-2 gap-2">
                                @foreach(['Sedan, SUV, Van','Vehicle Details & Gallery','Amenity Toggles','Per-Vehicle Price Overrides','Driver Assignment','Active / Inactive Status'] as $item)
                                <div class="apf-chip">{{ $item }}</div>
                                @endforeach
                            </div>
                        </div>
                        <div class="apf-figure">
                            <img src="{{ asset('public/assets/images/admin-panel-features/ap-vehicle-fleet.jpg') }}" alt="LimoSchedule vehicle and fleet management with categories, vehicle details, amenities and pricing" width="1536" height="1024" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 6. PRICING & PROMOTIONS -->
                <div class="apf-panel" id="apf-tab-pricing" role="tabpanel">
                    <div class="apf-panel-grid">
                        <div>
                            <span class="apf-eyebrow mb-3">Pricing &amp; Promotions</span>
                            <h2 class="apf-h2 text-xl sm:text-2xl mb-2">Pricing Engine &amp; Promotions</h2>
                            <p class="apf-body text-[13px] leading-relaxed mb-3">Configure flexible fare rules globally or by vehicle category, plus coupons and promo banners.</p>

                            <div class="flex flex-wrap items-center gap-1.5 mb-3">
                                <div class="apf-flow-step">Booking Details</div>
                                <span class="apf-muted font-bold text-sm">+</span>
                                <div class="apf-flow-step">Pricing Rules</div>
                                <span class="apf-muted font-bold text-sm">=</span>
                                <div class="apf-flow-step" style="border-color: rgba(37,99,235,0.3); color:#2563EB;">Final Fare</div>
                            </div>

                            <div class="grid grid-cols-3 gap-2">
                                @foreach(['Base Fare','Per-KM Rate','Long-Distance Tier','Hourly Rate','Night/Weekend Surcharge','Toll & Airport','Service Fee','Coupons','Promotions'] as $item)
                                <div class="apf-chip">{{ $item }}</div>
                                @endforeach
                            </div>
                        </div>
                        <div class="apf-figure">
                            <img src="{{ asset('public/assets/images/admin-panel-features/ap-pricing-engine.jpg') }}" alt="LimoSchedule pricing engine with global and per-category fare rules, coupons and promotions" width="1536" height="1024" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 7. PAYMENTS & INVOICES -->
                <div class="apf-panel" id="apf-tab-payments" role="tabpanel">
                    <div class="apf-panel-grid">
                        <div>
                            <span class="apf-eyebrow mb-3">Payments &amp; Invoices</span>
                            <h2 class="apf-h2 text-xl sm:text-2xl mb-2">Payments, Refunds &amp; Invoices</h2>
                            <p class="apf-body text-[13px] leading-relaxed mb-3">Manage payment gateways, booking payment status, refunds and branded invoices.</p>

                            <div class="flex flex-wrap items-center gap-1.5 mb-3">
                                <div class="apf-flow-step">Payment</div>
                                <svg class="apf-arrow" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                                <div class="apf-flow-step">Booking</div>
                                <svg class="apf-arrow" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                                <div class="apf-flow-step">Invoice</div>
                            </div>

                            <div class="grid grid-cols-2 gap-2 mb-3">
                                @foreach(['Stripe & PayPal','Sandbox / Live Mode','Payment Status per Booking','Refund Workflow','Branded PDF Invoices','Invoice Branding'] as $item)
                                <div class="apf-chip">{{ $item }}</div>
                                @endforeach
                            </div>

                            <div class="apf-note">
                                No standalone transactions ledger &mdash; viewed via bookings/reports. Refunds credit the customer&rsquo;s wallet, not the original payment method.
                            </div>
                        </div>
                        <div class="apf-figure">
                            <img src="{{ asset('public/assets/images/admin-panel-features/ap-payments-invoices.jpg') }}" alt="LimoSchedule payment gateway settings, booking payments, refund flow and PDF invoice" width="1536" height="1024" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 8. REPORTS & ANALYTICS -->
                <div class="apf-panel" id="apf-tab-reports" role="tabpanel">
                    <div class="apf-panel-grid">
                        <div>
                            <span class="apf-eyebrow mb-3">Reports &amp; Analytics</span>
                            <h2 class="apf-h2 text-xl sm:text-2xl mb-2">Reports &amp; Analytics</h2>
                            <p class="apf-body text-[13px] leading-relaxed mb-3">Turn booking and business data into useful operational insights with flexible reports and exports.</p>

                            <div class="grid grid-cols-2 gap-2">
                                @foreach(['Revenue, Bookings & Vehicles','Driver & Customer Reports','Dashboard Charts','CSV Export','Excel-Compatible Export','Print / Save-as-PDF'] as $item)
                                <div class="apf-chip">{{ $item }}</div>
                                @endforeach
                            </div>
                        </div>
                        <div class="apf-figure">
                            <img src="{{ asset('public/assets/images/admin-panel-features/ap-reports-analytics.jpg') }}" alt="LimoSchedule reports and analytics with monthly revenue and booking growth charts" width="1895" height="908" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 9. NOTIFICATIONS & CMS -->
                <div class="apf-panel" id="apf-tab-notifications" role="tabpanel">
                    <div class="apf-panel-grid">
                        <div>
                            <span class="apf-eyebrow mb-3">Notifications &amp; CMS</span>
                            <h2 class="apf-h2 text-xl sm:text-2xl mb-2">Notifications &amp; Content Management</h2>
                            <p class="apf-body text-[13px] leading-relaxed mb-3">Control browser push notifications and manage the website&rsquo;s content from the same environment.</p>

                            <div class="grid grid-cols-2 gap-2 mb-3">
                                @foreach(['Browser Push Master Switch','Per-Role & Per-Event Controls','Custom Notification Sound','Page & Section Builder','Blog, FAQs & Testimonials','SEO Tools & Redirects'] as $item)
                                <div class="apf-chip">{{ $item }}</div>
                                @endforeach
                            </div>

                            <div class="apf-note">
                                An SMS toggle exists in the interface but is not connected to a provider &mdash; it is not active functionality.
                            </div>
                        </div>
                        <div class="apf-figure">
                            <img src="{{ asset('public/assets/images/admin-panel-features/ap-notifications-cms.jpg') }}" alt="LimoSchedule admin notifications center for booking activity across the fleet" width="1891" height="907" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 10. SETTINGS & SYSTEM TOOLS -->
                <div class="apf-panel" id="apf-tab-settings" role="tabpanel">
                    <div class="apf-panel-grid">
                        <div>
                            <span class="apf-eyebrow mb-3">Settings &amp; System Tools</span>
                            <h2 class="apf-h2 text-xl sm:text-2xl mb-2">Settings, Roles &amp; System Tools</h2>
                            <p class="apf-body text-[13px] leading-relaxed mb-3">Configure the platform, control permissions and manage advanced system utilities.</p>

                            <div class="grid grid-cols-2 gap-2 mb-3">
                                @foreach(['Company Branding & Settings','Languages (DB, RTL)','Currencies (Manual Rates)','Roles & Permission Matrix','Activity Log','Backup / Restore / Migrations'] as $item)
                                <div class="apf-chip">{{ $item }}</div>
                                @endforeach
                            </div>

                            <div class="apf-danger">
                                <strong>Destructive tool:</strong> a "Drop All Tables" reset exists in System Tools &mdash; real, powerful, kept clearly separated from routine tools.
                            </div>
                        </div>
                        <div class="apf-figure">
                            <img src="{{ asset('public/assets/images/admin-panel-features/ap-settings-system.jpg') }}" alt="LimoSchedule global settings for company profile, branding and regional preferences" width="1899" height="910" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

            </div><!-- /apf-content -->
        </div><!-- /apf-explorer -->

        <!-- Compact CTA -->
        <div class="apf-cta-box mt-14">
            <h2 class="text-white font-extrabold tracking-tight text-2xl sm:text-3xl mb-3">See the Admin Panel in Action</h2>
            <p class="text-gray-300 text-[14px] max-w-xl mx-auto mb-7">Get a full walkthrough of every module, or explore the rest of the LimoSchedule platform.</p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                <a href="{{ route('contact') }}" class="apf-btn-primary w-full sm:w-auto">
                    <span>Get LimoSchedule</span>
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a href="{{ route('features') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 font-bold px-8 py-[13px] rounded-xl text-[14.5px] text-white transition-all duration-200 hover:bg-white/10" style="background: rgba(255,255,255,0.06); border: 1.5px solid rgba(255,255,255,0.25);">
                    Explore All Features
                </a>
            </div>
            <p class="text-gray-400 text-[12.5px] mt-6">
                Also see the <a href="{{ route('website-features') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">Website</a>, <a href="{{ route('customer-panel-features') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">Customer Panel</a>, and <a href="{{ route('driver-panel-features') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">Driver Panel</a> feature pages.
            </p>
        </div>

    </div>
</section>

</div>

@endsection

@push('scripts')
<script>
(function () {
    var tabs = document.querySelectorAll('#apf-page .apf-tab');
    var panels = document.querySelectorAll('#apf-page .apf-panel');

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
                var content = document.querySelector('#apf-page .apf-content');
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
