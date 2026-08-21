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
            "logo": "{{ url('public/logo/logo-white.png') }}",
            "contactPoint": {
                "@@type": "ContactPoint",
                "contactType": "customer service",
                "email": "support@limoschedule.com",
                "telephone": "+923460820722"
            }
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
<style>
    html, body { overflow-x: hidden !important; }
    .select2-container { width: 100% !important; }
    .select2-container--default .select2-selection--single {
        background: rgba(255,255,255,0.04) !important;
        border: 1px solid rgba(255,255,255,0.1) !important;
        border-radius: 10px !important;
        height: 44px !important;
        outline: none !important;
        transition: border-color 0.2s ease, box-shadow 0.2s ease !important;
    }
    .select2-container--default.select2-container--open .select2-selection--single {
        border-color: rgba(59,130,246,0.5) !important;
        border-radius: 10px !important;
        box-shadow: 0 0 0 3px rgba(59,130,246,0.12) !important;
    }
    .select2-container--default.select2-container--open.select2-container--below .select2-selection--single,
    .select2-container--default.select2-container--open.select2-container--above .select2-selection--single {
        border-radius: 10px !important;
    }
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
    .select2-container--default .select2-selection--single .select2-selection__placeholder { color: #6b7280 !important; }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 44px !important; width: 34px !important; top: 0 !important; right: 4px !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow b {
        border-color: #6b7280 transparent transparent transparent !important;
        border-width: 5px 4px 0 4px !important;
    }
    .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b {
        border-color: transparent transparent #6b7280 transparent !important;
        border-width: 0 4px 5px 4px !important;
    }
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
    .select2-container--default .select2-search--dropdown { padding: 8px 10px 6px !important; }
    .select2-container--default .select2-search--dropdown .select2-search__field {
        background: rgba(255,255,255,0.06) !important;
        border: 1px solid rgba(255,255,255,0.1) !important;
        border-radius: 7px !important;
        color: #e5e7eb !important;
        font-size: 13px !important;
        padding: 7px 10px !important;
        width: 100% !important;
        box-sizing: border-box !important;
        outline: none !important;
        -webkit-appearance: none !important;
        box-shadow: none !important;
        transition: border-color 0.15s ease !important;
        animation: none !important;
    }
    .select2-container--default .select2-search--dropdown .select2-search__field:focus {
        outline: none !important; box-shadow: none !important; border-color: rgba(59,130,246,0.45) !important;
    }
    .select2-results__options { max-height: 220px !important; overflow-y: auto !important; padding: 4px 0 !important; }
    .select2-results__options::-webkit-scrollbar { width: 4px; }
    .select2-results__options::-webkit-scrollbar-track { background: transparent; }
    .select2-results__options::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.12); border-radius: 4px; }
    .select2-container--default .select2-results__option {
        color: #d1d5db !important; font-size: 13px !important; padding: 8px 14px !important; line-height: 1.4 !important; transition: none !important;
    }
    .select2-container--default .select2-results__option--highlighted[aria-selected] { background: rgba(59,130,246,0.18) !important; color: #fff !important; }
    .select2-container--default .select2-results__option[aria-selected=true] { background: rgba(59,130,246,0.10) !important; color: #60a5fa !important; }
</style>
@endpush

@section('content')

<!-- ═══════════════════════════════════════════════════════════════
     HERO
═══════════════════════════════════════════════════════════════ -->
<section class="relative overflow-hidden" style="background: #0A0A0A;">
@php
    $breadcrumbs = [
        ['label' => 'Home', 'url' => url('/')],
        ['label' => 'Contact', 'url' => null],
    ];
@endphp
@include('partials._breadcrumbs')

    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.03) 1px, transparent 1px); background-size: 56px 56px;"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[500px] pointer-events-none" style="background: radial-gradient(ellipse at 50% 0%, rgba(59,130,246,0.1) 0%, transparent 70%);"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 pt-8 pb-16 lg:pt-10 lg:pb-24">
        <div class="grid grid-cols-1 lg:grid-cols-[0.9fr_1.1fr] gap-10 lg:gap-14 xl:gap-20 items-start">

            <!-- LEFT: Heading + reassurance -->
            <div class="lg:pt-3">
                <div class="inline-flex items-center gap-2 mb-5 px-4 py-1.5 rounded-full" style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.25);">
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l2.4 6.6L21 10l-5 4.6L17.4 21 12 17.4 6.6 21 8 14.6 3 10l6.6-1.4L12 2z"/></svg>
                    <span class="text-blue-400 text-[11px] font-bold tracking-[0.16em] uppercase">Contact</span>
                </div>

                <h1 class="text-white text-4xl sm:text-5xl font-black tracking-tight leading-[1.08] mb-5">
                    Get Started With LimoSchedule
                </h1>

                <p class="text-gray-400 text-[16px] leading-relaxed max-w-md mb-8">
                    Tell us about your transportation business and we&rsquo;ll show you how LimoSchedule fits your operations &mdash; no obligation.
                </p>

                <div class="flex flex-col gap-3 mb-8">
                    <span class="inline-flex items-center gap-2 text-[13.5px] font-medium text-gray-300">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                        $1,999 one-time payment &mdash; no monthly SaaS fee
                    </span>
                    <span class="inline-flex items-center gap-2 text-[13.5px] font-medium text-gray-300">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                        We reply within 4 hours &mdash; usually faster
                    </span>
                    <span class="inline-flex items-center gap-2 text-[13.5px] font-medium text-gray-300">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                        Complete white-label platform &mdash; no obligation
                    </span>
                </div>

                <div class="text-[13px]">
                    <span class="text-gray-500">Prefer WhatsApp?</span>
                    <a href="https://wa.me/923460820722?text=Hi%2C%20I%27m%20interested%20in%20LimoSchedule.%20Can%20you%20show%20me%20a%20live%20demo%3F" target="_blank" rel="noopener"
                       class="inline-flex items-center gap-1 font-semibold text-blue-400 hover:text-blue-300 transition-colors duration-200 ml-1">
                        Talk to an Expert
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div><!-- /left -->

            <!-- RIGHT: Form (visible immediately, no scrolling required) -->
            <div>
                <div class="rounded-2xl p-6 sm:p-8" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.08); box-shadow: 0 30px 90px rgba(0,0,0,0.4);">

                    <div class="mb-6">
                        <h2 class="text-[21px] font-bold text-white mb-1.5">Request Your Private Demo</h2>
                        <p class="text-[13px] text-gray-400">Share a few details about your business and we&rsquo;ll walk you through how LimoSchedule can run it.</p>
                    </div>

                    <form id="contactForm" action="{{ route('demo.store') }}" method="POST" class="space-y-5">
                        @csrf

                        <!-- Contact Information -->
                        <fieldset class="contact-fieldset">
                            <legend class="contact-legend">Contact Information</legend>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-3">
                                <div>
                                    <label class="contact-label" for="cf_name">Full Name <span class="text-blue-500 ml-0.5">*</span></label>
                                    <input type="text" id="cf_name" name="name" class="contact-input" placeholder="John Smith" autocomplete="name" required>
                                </div>
                                <div>
                                    <label class="contact-label" for="cf_company">Company</label>
                                    <input type="text" id="cf_company" name="company" class="contact-input" placeholder="Acme Limo Co." autocomplete="organization">
                                </div>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                                <div>
                                    <label class="contact-label" for="cf_email">Email Address <span class="text-blue-500 ml-0.5">*</span></label>
                                    <input type="email" id="cf_email" name="email" class="contact-input" placeholder="john@example.com" autocomplete="email" required>
                                </div>
                                <div>
                                    <label class="contact-label" for="cf_whatsapp">WhatsApp</label>
                                    <input type="tel" id="cf_whatsapp" name="whatsapp" class="contact-input" placeholder="+1 (555) 000-0000" autocomplete="tel">
                                </div>
                            </div>
                        </fieldset>

                        <!-- Business Details -->
                        <fieldset class="contact-fieldset">
                            <legend class="contact-legend">Business Details</legend>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-3">
                                <div>
                                    <label class="contact-label" for="cf_country">Country <span class="text-blue-500 ml-0.5">*</span></label>
                                    <select id="cf_country" name="country" required>
                                        <option value="">Select your country&hellip;</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->name }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="contact-label" for="cf_employees">Total Employees <span class="text-blue-500 ml-0.5">*</span></label>
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
                            <div class="mt-4">
                                <label class="contact-label" for="cf_budget">System Setup Budget <span class="text-blue-500 ml-0.5">*</span></label>
                                <select id="cf_budget" name="budget" class="contact-input contact-select" required>
                                    <option value="" disabled selected style="background:#111111;">What is your budget?&hellip;</option>
                                    <option value="$1500" style="background:#111111;">$1,500</option>
                                    <option value="$2500" style="background:#111111;">$2,500</option>
                                    <option value="$5000" style="background:#111111;">$5,000</option>
                                </select>
                            </div>
                        </fieldset>

                        <!-- Message -->
                        <fieldset class="contact-fieldset">
                            <legend class="contact-legend">Message</legend>
                            <div class="mt-3">
                                <label class="contact-label" for="cf_message">Tell us about your business</label>
                                <textarea id="cf_message" name="message" class="contact-input" rows="3" placeholder="Tell us about your transportation business and what you're looking to build&hellip;" style="resize: vertical; min-height: 90px;"></textarea>
                            </div>
                        </fieldset>

                        <div class="pt-1">
                            <button type="submit" id="cfSubmitBtn" class="btn-cta w-full inline-flex items-center justify-center gap-2.5 bg-[#3B82F6] text-white font-bold px-7 py-4 rounded-xl text-[15.5px] border border-blue-500/30">
                                <span>Get Started</span>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                            </button>
                        </div>
                    </form>

                    <p class="text-center text-gray-600 text-[11.5px] mt-5">
                        Your information is private and never shared with third parties. See our <a href="{{ route('privacy-policy') }}" class="text-gray-500 hover:text-white transition-colors duration-200">Privacy Policy</a>.
                    </p>

                </div>
            </div><!-- /right -->

        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     MORE TO EXPLORE
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-16 overflow-hidden" style="background: #060606;">
    <div class="relative z-10 max-w-3xl mx-auto px-5 sm:px-6 lg:px-8 text-center">
        <p class="text-gray-500 text-[14px]">
            See the <a href="{{ route('platform') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">full platform</a>, check <a href="{{ route('pricing') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">pricing</a>, or <a href="{{ route('demo') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">explore a live demo</a>.
        </p>
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
