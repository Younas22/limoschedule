@extends('layouts.public')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <style>
        /* Prevent horizontal scrollbar when dropdown opens near viewport edge */
        html, body { overflow-x: hidden !important; }

        /* ── Select2 trigger ── */
        .select2-container { width: 100% !important; }
        .select2-container--default .select2-selection--single {
            background: rgba(255,255,255,0.04) !important;
            border: 1px solid rgba(255,255,255,0.1) !important;
            border-radius: 10px !important;
            height: 44px !important;
            outline: none !important;
            transition: border-color 0.2s ease, box-shadow 0.2s ease !important;
        }
        /* Open state — keep full radius, detach from dropdown visually */
        .select2-container--default.select2-container--open .select2-selection--single {
            border-color: rgba(59,130,246,0.5) !important;
            border-radius: 10px !important;
            box-shadow: 0 0 0 3px rgba(59,130,246,0.12) !important;
        }
        /* Override Select2's default border-radius removal on open */
        .select2-container--default.select2-container--open.select2-container--below .select2-selection--single,
        .select2-container--default.select2-container--open.select2-container--above .select2-selection--single {
            border-radius: 10px !important;
        }
        /* Selected text */
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #e5e7eb !important;
            font-size: 13.5px !important;
            line-height: 44px !important;
            padding: 0 36px 0 14px !important;
            overflow: hidden !important;
            text-overflow: ellipsis !important;
            white-space: nowrap !important;
            display: block !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__placeholder {
            color: #6b7280 !important;
        }
        /* Chevron */
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 44px !important;
            width: 34px !important;
            top: 0 !important;
            right: 4px !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            border-color: #6b7280 transparent transparent transparent !important;
            border-width: 5px 4px 0 4px !important;
        }
        .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b {
            border-color: transparent transparent #6b7280 transparent !important;
            border-width: 0 4px 5px 4px !important;
        }
        /* ── Dropdown panel — floats 6px below trigger ── */
        .select2-dropdown {
            background: #141414 !important;
            border: 1px solid rgba(59,130,246,0.25) !important;
            border-radius: 10px !important;
            box-shadow: 0 10px 40px rgba(0,0,0,0.6) !important;
            overflow: hidden !important;
            animation: none !important;
            transition: none !important;
        }
        .select2-dropdown--below { margin-top: 6px !important; }
        .select2-dropdown--above { margin-bottom: 6px !important; }
        /* ── Search box ── */
        .select2-container--default .select2-search--dropdown {
            padding: 8px 10px 6px !important;
        }
        .select2-container--default .select2-search--dropdown .select2-search__field {
            background: rgba(255,255,255,0.06) !important;
            border: 1px solid rgba(255,255,255,0.1) !important;
            border-radius: 7px !important;
            color: #e5e7eb !important;
            font-size: 13px !important;
            padding: 7px 10px !important;
            width: 100% !important;
            box-sizing: border-box !important;
            /* Kill all native focus animations (the left-to-right line) */
            outline: none !important;
            -webkit-appearance: none !important;
            box-shadow: none !important;
            transition: border-color 0.15s ease !important;
            animation: none !important;
        }
        .select2-container--default .select2-search--dropdown .select2-search__field:focus {
            outline: none !important;
            box-shadow: none !important;
            border-color: rgba(59,130,246,0.45) !important;
        }
        /* ── Results list ── */
        .select2-results__options {
            max-height: 220px !important;
            overflow-y: auto !important;
            padding: 4px 0 !important;
        }
        .select2-results__options::-webkit-scrollbar { width: 4px; }
        .select2-results__options::-webkit-scrollbar-track { background: transparent; }
        .select2-results__options::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.12); border-radius: 4px; }
        .select2-container--default .select2-results__option {
            color: #d1d5db !important;
            font-size: 13px !important;
            padding: 8px 14px !important;
            line-height: 1.4 !important;
            transition: none !important;
        }
        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background: rgba(59,130,246,0.18) !important;
            color: #fff !important;
        }
        .select2-container--default .select2-results__option[aria-selected=true] {
            background: rgba(59,130,246,0.10) !important;
            color: #60a5fa !important;
        }
    </style>
@endpush

@section('content')
<section id="contact" class="relative py-28 lg:py-36 overflow-hidden" style="background: #0A0A0A;">
    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(255,255,255,0.018) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.018) 1px, transparent 1px); background-size: 60px 60px;"></div>
    <div class="absolute top-1/2 left-0 w-[650px] h-[650px] rounded-full pointer-events-none" style="background: radial-gradient(ellipse at center, rgba(59,130,246,0.07) 0%, transparent 65%); transform: translateY(-50%) translateX(-35%);"></div>
    <div class="absolute top-1/2 right-0 w-[500px] h-[500px] rounded-full pointer-events-none" style="background: radial-gradient(ellipse at center, rgba(59,130,246,0.04) 0%, transparent 65%); transform: translateY(-50%) translateX(35%);"></div>
    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-[1fr_1.1fr] gap-12 lg:gap-14 xl:gap-20 items-start">
            <div class="lg:pt-3 section-fade">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-[11px] font-bold tracking-[0.1em] uppercase mb-6" style="background: rgba(239,68,68,0.08); border: 1px solid rgba(239,68,68,0.25); color: #ef4444;">
                    <span class="relative flex h-2 w-2 flex-shrink-0">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                    </span>
                    Limited Licenses Available &mdash; Act Now
                </div>
                <h2 class="text-[30px] sm:text-[36px] lg:text-[40px] xl:text-[46px] font-bold leading-[1.12] tracking-tight text-white mb-5">
                    Stop Losing Bookings.<br>Get the System That<br>
                    <span style="background: linear-gradient(135deg, #ffffff 20%, #3B82F6 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Runs Itself.</span>
                </h2>
                <p class="text-[15px] text-gray-400 leading-relaxed mb-6 max-w-[420px]">
                    Cheaper than hiring a dispatcher. Cheaper than building custom software. Cheaper than losing one more month of bookings to manual chaos.
                </p>
                <div class="mb-6 p-4 rounded-xl" style="background: rgba(34,197,94,0.06); border: 1px solid rgba(34,197,94,0.2);">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0" style="background: rgba(34,197,94,0.15);">
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="#22c55e"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M11.99 0C5.376 0 0 5.373 0 11.988c0 2.104.549 4.14 1.595 5.945L0 24l6.335-1.652A11.981 11.981 0 0011.99 24C18.604 24 24 18.627 24 12.012 24 5.373 18.604 0 11.99 0zm.01 21.823a9.886 9.886 0 01-5.03-1.372l-.362-.214-3.762.981.999-3.649-.235-.374a9.837 9.837 0 01-1.511-5.195c0-5.452 4.443-9.893 9.901-9.893 5.452 0 9.895 4.441 9.895 9.893 0 5.452-4.443 9.823-9.895 9.823z"/></svg>
                        </div>
                        <div>
                            <div class="text-white font-semibold text-[13.5px]">Prefer a faster response?</div>
                            <div class="text-gray-500 text-[12px]">Talk to a real person on WhatsApp right now.</div>
                        </div>
                    </div>
                    <a href="https://wa.me/923460820722?text=Hi%2C%20I%27m%20interested%20in%20LimoSchedule.%20Can%20you%20show%20me%20a%20live%20demo%3F" target="_blank" rel="noopener"
                       class="wa-hero-cta w-full flex items-center justify-center gap-2.5 font-bold py-2.5 rounded-lg text-[13px] text-white"
                       style="background: linear-gradient(135deg, #16a34a, #22c55e); animation: wa-pulse-glow 2.5s ease-in-out infinite;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M11.99 0C5.376 0 0 5.373 0 11.988c0 2.104.549 4.14 1.595 5.945L0 24l6.335-1.652A11.981 11.981 0 0011.99 24C18.604 24 24 18.627 24 12.012 24 5.373 18.604 0 11.99 0zm.01 21.823a9.886 9.886 0 01-5.03-1.372l-.362-.214-3.762.981.999-3.649-.235-.374a9.837 9.837 0 01-1.511-5.195c0-5.452 4.443-9.893 9.901-9.893 5.452 0 9.895 4.441 9.895 9.893 0 5.452-4.443 9.823-9.895 9.823z"/></svg>
                        Message Us on WhatsApp &mdash; Instant Reply
                    </a>
                </div>
                <div class="inline-flex items-center gap-3 mb-9 px-5 py-3 rounded-2xl" style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.25);">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><circle cx="7.5" cy="15.5" r="5.5"/><path d="M21 2l-9.6 9.6"/><path d="M15.5 7.5l3 3L22 7l-3-3"/></svg>
                    <span class="text-[13px] font-semibold text-white">One-Time License</span>
                    <span class="w-px h-4 bg-white/15"></span>
                    <span class="text-[22px] font-black text-blue-400 leading-none">$1,999</span>
                    <span class="text-[11px] font-bold text-gray-500 uppercase tracking-wider">Fixed</span>
                </div>
                <div class="space-y-4 mb-9">
                    <div class="contact-trust-item">
                        <div class="contact-trust-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>
                        <div><div class="text-[13.5px] font-semibold text-white leading-snug">One-time license &mdash; no subscriptions</div><div class="text-[12px] text-gray-500 mt-0.5">Pay once, use forever. Zero recurring charges.</div></div>
                    </div>
                    <div class="contact-trust-item">
                        <div class="contact-trust-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><rect x="2" y="2" width="20" height="8" rx="2"/><rect x="2" y="14" width="20" height="8" rx="2"/><line x1="6" y1="6" x2="6.01" y2="6"/><line x1="6" y1="18" x2="6.01" y2="18"/></svg></div>
                        <div><div class="text-[13.5px] font-semibold text-white leading-snug">Fully self-hosted on your own server</div><div class="text-[12px] text-gray-500 mt-0.5">Your data, your infrastructure, your complete control.</div></div>
                    </div>
                    <div class="contact-trust-item">
                        <div class="contact-trust-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg></div>
                        <div><div class="text-[13.5px] font-semibold text-white leading-snug">Complete source code included</div><div class="text-[12px] text-gray-500 mt-0.5">Modify, extend, and white-label without restriction.</div></div>
                    </div>
                    <div class="contact-trust-item">
                        <div class="contact-trust-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg></div>
                        <div><div class="text-[13.5px] font-semibold text-white leading-snug">White-label branding freedom</div><div class="text-[12px] text-gray-500 mt-0.5">Full white-label customization allowed. Deploy as your own brand.</div></div>
                    </div>
                </div>
                <div class="flex items-center gap-6 pt-7" style="border-top: 1px solid rgba(255,255,255,0.07);">
                    <div><div class="text-[24px] font-bold text-white leading-none">30 min</div><div class="text-[11.5px] text-gray-500 mt-1">Avg. setup time</div></div>
                    <div class="w-px h-9 flex-shrink-0" style="background: rgba(255,255,255,0.08);"></div>
                    <div><div class="text-[24px] font-bold text-white leading-none">100%</div><div class="text-[11.5px] text-gray-500 mt-1">Source code access</div></div>
                    <div class="w-px h-9 flex-shrink-0" style="background: rgba(255,255,255,0.08);"></div>
                    <div><div class="text-[24px] font-bold text-white leading-none">&infin;</div><div class="text-[11.5px] text-gray-500 mt-1">Bookings / month</div></div>
                </div>
            </div>
            <div class="section-fade" style="transition-delay: 0.12s;">
                <div class="contact-form-card">
                    <div class="mb-6 relative z-10">
                        <div class="flex items-center gap-2 mb-3">
                            <div class="relative flex h-2 w-2 flex-shrink-0">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                            </div>
                            <span class="text-[11px] font-bold text-blue-400 tracking-[0.12em] uppercase">We reply within 4 hours &mdash; usually faster</span>
                        </div>
                        <h3 class="text-[22px] font-bold text-white mb-1.5">Request Your Private Demo</h3>
                        <p class="text-[13px] text-gray-400">See the live admin panel, AI agent, and full system &mdash; tailored to your limo business. No obligation.</p>
                    </div>
                    <div id="cfFormWrap" class="relative z-10">
                        <form id="contactForm" action="{{ route('demo.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="contact-label" for="cf_name"><span class="inline-flex items-center gap-1.5"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>Full Name <span class="text-blue-500 ml-0.5">*</span></span></label>
                                    <input type="text" id="cf_name" name="name" class="contact-input" placeholder="John Smith" autocomplete="name" required>
                                </div>
                                <div>
                                    <label class="contact-label" for="cf_company"><span class="inline-flex items-center gap-1.5"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg>Company</span></label>
                                    <input type="text" id="cf_company" name="company" class="contact-input" placeholder="Acme Limo Co." autocomplete="organization">
                                </div>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="contact-label" for="cf_email"><span class="inline-flex items-center gap-1.5"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>Email Address <span class="text-blue-500 ml-0.5">*</span></span></label>
                                    <input type="email" id="cf_email" name="email" class="contact-input" placeholder="john@example.com" autocomplete="email" required>
                                </div>
                                <div>
                                    <label class="contact-label" for="cf_whatsapp"><span class="inline-flex items-center gap-1.5"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"/></svg>WhatsApp</span></label>
                                    <input type="tel" id="cf_whatsapp" name="whatsapp" class="contact-input" placeholder="+1 (555) 000-0000" autocomplete="tel">
                                </div>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="contact-label" for="cf_country"><span class="inline-flex items-center gap-1.5"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 010 20M12 2a15.3 15.3 0 000 20"/></svg>Country <span class="text-blue-500 ml-0.5">*</span></span></label>
                                    <select id="cf_country" name="country" required>
                                        <option value="">Select your country&hellip;</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->name }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="contact-label" for="cf_employees"><span class="inline-flex items-center gap-1.5"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>Total Employees <span class="text-blue-500 ml-0.5">*</span></span></label>
                                    <select id="cf_employees" name="total_employees" class="contact-input contact-select" required>
                                        <option value="" disabled selected style="background:#111111;">Select range&hellip;</option>
                                        <option value="1-5" style="background:#111111;">1 &ndash; 5</option>
                                        <option value="6-10" style="background:#111111;">6 &ndash; 10</option>
                                        <option value="11-25" style="background:#111111;">11 &ndash; 25</option>
                                        <option value="26-50" style="background:#111111;">26 &ndash; 50</option>
                                        <option value="51-100" style="background:#111111;">51 &ndash; 100</option>
                                        <option value="100+" style="background:#111111;">100+</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label class="contact-label" for="cf_budget"><span class="inline-flex items-center gap-1.5"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg>System Setup Budget <span class="text-blue-500 ml-0.5">*</span></span></label>
                                <select id="cf_budget" name="budget" class="contact-input contact-select" required>
                                    <option value="" disabled selected style="background:#111111;">What is your budget?&hellip;</option>
                                    <option value="$1500" style="background:#111111;">$1,500</option>
                                    <option value="$2500" style="background:#111111;">$2,500</option>
                                    <option value="$5000" style="background:#111111;">$5,000</option>
                                </select>
                            </div>
                            <div>
                                <label class="contact-label" for="cf_message"><span class="inline-flex items-center gap-1.5"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>Message</span></label>
                                <textarea id="cf_message" name="message" class="contact-input" rows="4" placeholder="Tell us about your limo business and what you're looking to build&hellip;" style="resize: vertical; min-height: 112px;"></textarea>
                            </div>
                            <div class="pt-1">
                                <button type="submit" id="cfSubmitBtn" class="btn-cta w-full flex items-center justify-center gap-2.5 px-6 py-[14px] rounded-xl font-bold text-[15px] text-white" style="background: linear-gradient(135deg, #1d4ed8, #3B82F6); box-shadow: 0 4px 24px rgba(59,130,246,0.4);">
                                    <span>Get My Private Demo &mdash; $1,999 One-Time</span>
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                                </button>
                                <p class="text-center text-[11.5px] text-gray-600 mt-2.5">No obligation &middot; We respond within 4 hours &middot; 100% private</p>
                            </div>
                        </form>
                    </div>
                    <div id="cfSuccess" class="hidden relative z-10 text-center py-6">
                        <div class="w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-5" style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.3);">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        </div>
                        <h4 class="text-[18px] font-bold text-white mb-2">Request Sent!</h4>
                        <p class="text-[13.5px] text-gray-400 max-w-[280px] mx-auto">We've received your request and will get back to you within 24 hours.</p>
                    </div>
                    <div class="mt-5 flex items-center justify-center gap-1.5 text-[11.5px] text-gray-600 relative z-10">
                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
                        Your information is private and never shared with third parties.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(function () {
    $('#cf_country').select2({
        placeholder: 'Select your country…',
        allowClear: false,
        dropdownCssClass: 'select2-dark',
        theme: 'default'
    });

    $('#contactForm').on('submit', function () {
        var btn = document.getElementById('cfSubmitBtn');
        if (btn) {
            btn.disabled = true;
            btn.querySelector('span').textContent = 'Sending…';
        }
    });
});
</script>
@endpush

