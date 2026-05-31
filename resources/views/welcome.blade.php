﻿﻿<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LimoSchedule &mdash; Self-Hosted Automated Limo Booking System</title>
    <meta name="description" content="Self-hosted, white-label limo booking system. Install on your own server in 30 minutes. Full source code included. One-time license.">
    <meta name="author" content="LimoSchedule">
    <link rel="canonical" href="{{ url('/') }}">

    <!-- Open Graph -->
    <meta property="og:type"        content="website">
    <meta property="og:url"         content="{{ url('/') }}">
    <meta property="og:title"       content="LimoSchedule — Self-Hosted Automated Limo Booking System">
    <meta property="og:description" content="Self-hosted, white-label limo booking system. Install on your own server in 30 minutes. Full source code included. One-time license.">
    <meta property="og:image"       content="{{ url('public/logo/favicon.png') }}">
    <meta property="og:site_name"   content="LimoSchedule">

    <!-- Twitter Card -->
    <meta name="twitter:card"        content="summary">
    <meta name="twitter:title"       content="LimoSchedule — Self-Hosted Automated Limo Booking System">
    <meta name="twitter:description" content="Self-hosted, white-label limo booking system. Install on your own server in 30 minutes. Full source code included. One-time license.">
    <meta name="twitter:image"       content="{{ url('public/logo/favicon.png') }}">

    <!-- Official Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ url('public/favicon.ico') }}?v=3">
    <link rel="shortcut icon" href="{{ url('public/favicon.ico') }}?v=3">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,300;0,14..32,400;0,14..32,500;0,14..32,600;0,14..32,700;0,14..32,800;0,14..32,900;1,14..32,400&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ url('public/assets/js/tailwind.config.js') }}"></script>

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ url('public/assets/css/limoschedule.css') }}">

    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <style>
        /* Waveform bars for hero audio player */
        .vw-bar {
            width: 3px;
            border-radius: 2px;
            background: #3B82F6;
            animation: vw-idle 1.4s ease-in-out infinite;
            transition: background 0.2s;
        }
        @keyframes vw-idle {
            0%, 100% { opacity: 0.35; transform: scaleY(1); }
            50%       { opacity: 0.65; transform: scaleY(0.5); }
        }
        .vw-bar.playing {
            animation: vw-wave 0.9s ease-in-out infinite;
            background: #60a5fa;
        }
        @keyframes vw-wave {
            0%, 100% { transform: scaleY(0.4); }
            50%       { transform: scaleY(1.1); }
        }

        /* Select2 dark theme override */
        .select2-container--default .select2-selection--single {
            background: rgba(255,255,255,0.04) !important;
            border: 1px solid rgba(255,255,255,0.1) !important;
            border-radius: 10px !important;
            height: 44px !important;
            display: flex !important;
            align-items: center !important;
            color: #e5e7eb !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #e5e7eb !important;
            line-height: 44px !important;
            padding-left: 14px !important;
            font-size: 13.5px !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__placeholder {
            color: #6b7280 !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 44px !important;
            right: 10px !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            border-color: #6b7280 transparent transparent transparent !important;
        }
        .select2-dropdown {
            background: #141414 !important;
            border: 1px solid rgba(255,255,255,0.1) !important;
            border-radius: 10px !important;
        }
        .select2-container--default .select2-search--dropdown .select2-search__field {
            background: rgba(255,255,255,0.06) !important;
            border: 1px solid rgba(255,255,255,0.1) !important;
            border-radius: 6px !important;
            color: #e5e7eb !important;
            font-size: 13px !important;
            padding: 6px 10px !important;
        }
        .select2-container--default .select2-results__option {
            color: #d1d5db !important;
            font-size: 13.5px !important;
            padding: 8px 14px !important;
        }
        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background: rgba(59,130,246,0.2) !important;
            color: #fff !important;
        }
        .select2-container--default .select2-results__option[aria-selected=true] {
            background: rgba(59,130,246,0.12) !important;
            color: #60a5fa !important;
        }
        .select2-container { width: 100% !important; }
        .select2-container--open .select2-selection--single {
            border-color: rgba(59,130,246,0.5) !important;
        }
    </style>
</head>

<body>

<!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
     SECTION 1 &mdash; STICKY PREMIUM NAVBAR
â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
<header
    id="navbar"
    class="fixed top-0 left-0 right-0 z-50"
    style="background: rgba(10,10,10,0.65); backdrop-filter: blur(22px); -webkit-backdrop-filter: blur(22px); border-bottom: 1px solid rgba(255,255,255,0.06);"
    role="banner"
>
    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-[66px]">

            <!-- â”€â”€â”€ Official Logo â”€â”€â”€ -->
            <a href="{{ url('/') }}" class="flex-shrink-0 block" aria-label="LimoSchedule &mdash; Home">
                <div class="logo-badge rounded-xl px-3 py-[7px]">
                    <img
                        src="{{ url('public/logo/logo-white.png') }}"
                        alt="LimoSchedule &mdash; Automated Limo Booking System"
                        class="h-[30px] w-auto block"
                        loading="eager"
                        decoding="sync"
                    >
                </div>
            </a>

            <!-- â”€â”€â”€ Desktop Navigation â”€â”€â”€ -->
            <nav class="hidden xl:flex items-center" aria-label="Primary navigation">
                <ul class="flex items-center gap-0.5 list-none m-0 p-0">
                    <li>
                        <a href="#features"     class="nav-link text-[13.5px] font-medium text-gray-400 hover:text-white px-3.5 py-2 rounded-lg block whitespace-nowrap">Features</a>
                    </li>
                    <li>
                        <a href="#voice-search" class="nav-link text-[13.5px] font-medium text-gray-400 hover:text-white px-3.5 py-2 rounded-lg block whitespace-nowrap">Voice Search</a>
                    </li>
                    <li>
                        <a href="#ai-call-agent"     class="nav-link text-[13.5px] font-medium text-gray-400 hover:text-white px-3.5 py-2 rounded-lg block whitespace-nowrap">AI Agent</a>
                    </li>
                    <li>
                        <a href="#admin-panel"  class="nav-link text-[13.5px] font-medium text-gray-400 hover:text-white px-3.5 py-2 rounded-lg block whitespace-nowrap">Admin Panel</a>
                    </li>
                    <li>
                        <a href="#how-it-works" class="nav-link text-[13.5px] font-medium text-gray-400 hover:text-white px-3.5 py-2 rounded-lg block whitespace-nowrap">How It Works</a>
                    </li>
                    <li>
                        <a href="#faq"          class="nav-link text-[13.5px] font-medium text-gray-400 hover:text-white px-3.5 py-2 rounded-lg block whitespace-nowrap">FAQ</a>
                    </li>
                    <li>
                        <a href="#contact"      class="nav-link text-[13.5px] font-medium text-gray-400 hover:text-white px-3.5 py-2 rounded-lg block whitespace-nowrap">Contact</a>
                    </li>
                </ul>
            </nav>

            <!-- â”€â”€â”€ Desktop Right Actions â”€â”€â”€ -->
            <div class="hidden xl:flex items-center gap-3 flex-shrink-0">

                <!-- Auth links -->
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                           class="text-[13.5px] font-medium text-gray-400 hover:text-white transition-colors duration-200 px-3 py-1.5">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="text-[13.5px] font-medium text-gray-400 hover:text-white transition-colors duration-200 px-3 py-1.5">
                            Log in
                        </a>
                    @endauth
                @endif

                <!-- Divider -->
                <span class="w-px h-4 bg-white/10 block"></span>

                <!-- WhatsApp CTA — Primary in nav -->
                <a href="https://wa.me/923460820722?text=Hi%2C%20I%27m%20interested%20in%20LimoSchedule.%20Can%20you%20show%20me%20a%20live%20demo%3F"
                   target="_blank" rel="noopener"
                   class="wa-hero-cta inline-flex items-center gap-2 text-white text-[13px] font-bold px-4 py-2 rounded-xl"
                   style="background: linear-gradient(135deg, #16a34a, #22c55e); animation: wa-pulse-glow 2.5s ease-in-out infinite;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M11.99 0C5.376 0 0 5.373 0 11.988c0 2.104.549 4.14 1.595 5.945L0 24l6.335-1.652A11.981 11.981 0 0011.99 24C18.604 24 24 18.627 24 12.012 24 5.373 18.604 0 11.99 0zm.01 21.823a9.886 9.886 0 01-5.03-1.372l-.362-.214-3.762.981.999-3.649-.235-.374a9.837 9.837 0 01-1.511-5.195c0-5.452 4.443-9.893 9.901-9.893 5.452 0 9.895 4.441 9.895 9.893 0 5.452-4.443 9.823-9.895 9.823z"/></svg>
                    <span>WhatsApp Us</span>
                </a>
                <!-- Secondary CTA -->
                <a href="#contact"
                   class="btn-cta inline-flex items-center gap-2 bg-[#3B82F6] text-white text-[13px] font-semibold px-4 py-2 rounded-xl border border-blue-500/30">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="7.5" cy="15.5" r="5.5"/><path d="M21 2l-9.6 9.6"/><path d="M15.5 7.5l3 3L22 7l-3-3"/></svg>
                    <span>Get License</span>
                </a>
            </div>

            <!-- â”€â”€â”€ Mobile Hamburger â”€â”€â”€ -->
            <button
                id="hamburger"
                type="button"
                class="xl:hidden flex flex-col justify-center items-center gap-[5.5px] w-9 h-9 rounded-lg border border-white/10 hover:border-white/20 hover:bg-white/5 flex-shrink-0 transition-all duration-200"
                aria-label="Toggle navigation menu"
                aria-expanded="false"
                aria-controls="mobile-menu"
            >
                <span class="hb-line hb-top  block w-[18px] h-[1.5px] bg-white   rounded-full"></span>
                <span class="hb-line hb-mid  block w-[18px] h-[1.5px] bg-white   rounded-full"></span>
                <span class="hb-line hb-bot  block w-[13px] h-[1.5px] bg-white/50 rounded-full"></span>
            </button>

        </div><!-- /flex row -->
    </div><!-- /container -->

    <!-- â”€â”€â”€ Mobile Menu Panel â”€â”€â”€ -->
    <div
        id="mobile-menu"
        class="mobile-menu xl:hidden"
        style="background: rgba(9,9,9,0.99); border-top: 1px solid rgba(255,255,255,0.06);"
        role="dialog"
        aria-label="Mobile navigation"
    >
        <div class="max-w-7xl mx-auto px-5 sm:px-6 py-3 pb-4">

            <!-- Nav links -->
            <ul class="list-none m-0 p-0 flex flex-col gap-0.5">

                <li>
                    <a href="#features"
                       class="mob-nav-item flex items-center gap-3 text-[14px] font-medium text-gray-400 hover:text-white px-3 py-3 rounded-xl group">
                        <span class="flex-shrink-0 w-[34px] h-[34px] rounded-lg flex items-center justify-center"
                              style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.15);">
                            <!-- Star / features icon -->
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                        </span>
                        <div>
                            <div class="font-semibold text-[14px] text-gray-200">Features</div>
                            <div class="text-[11.5px] text-gray-500 mt-0.5 font-normal">Full platform overview</div>
                        </div>
                        <svg class="ml-auto flex-shrink-0 text-gray-600 group-hover:text-gray-400 transition-colors" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M9 18l6-6-6-6"/></svg>
                    </a>
                </li>

                <li>
                    <a href="#voice-search"
                       class="mob-nav-item flex items-center gap-3 text-[14px] font-medium text-gray-400 hover:text-white px-3 py-3 rounded-xl group">
                        <span class="flex-shrink-0 w-[34px] h-[34px] rounded-lg flex items-center justify-center"
                              style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.15);">
                            <!-- Mic icon -->
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 2a3 3 0 00-3 3v7a3 3 0 006 0V5a3 3 0 00-3-3z"/>
                                <path d="M19 10v2a7 7 0 01-14 0v-2M12 19v3M8 22h8"/>
                            </svg>
                        </span>
                        <div>
                            <div class="font-semibold text-[14px] text-gray-200">Voice Search</div>
                            <div class="text-[11.5px] text-gray-500 mt-0.5 font-normal">Book rides by voice command</div>
                        </div>
                        <svg class="ml-auto flex-shrink-0 text-gray-600 group-hover:text-gray-400 transition-colors" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M9 18l6-6-6-6"/></svg>
                    </a>
                </li>

                <li>
                    <a href="#ai-call-agent"
                       class="mob-nav-item flex items-center gap-3 text-[14px] font-medium text-gray-400 hover:text-white px-3 py-3 rounded-xl group">
                        <span class="flex-shrink-0 w-[34px] h-[34px] rounded-lg flex items-center justify-center"
                              style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.15);">
                            <!-- AI/brain icon -->
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9.5 2A2.5 2.5 0 007 4.5v15A2.5 2.5 0 009.5 22h5a2.5 2.5 0 002.5-2.5v-15A2.5 2.5 0 0014.5 2h-5z"/>
                                <path d="M7 8H4a2 2 0 00-2 2v4a2 2 0 002 2h3M17 8h3a2 2 0 012 2v4a2 2 0 01-2 2h-3"/>
                                <circle cx="12" cy="12" r="1.5" fill="#3B82F6" stroke="none"/>
                            </svg>
                        </span>
                        <div>
                            <div class="font-semibold text-[14px] text-gray-200">AI Agent</div>
                            <div class="text-[11.5px] text-gray-500 mt-0.5 font-normal">Intelligent booking automation</div>
                        </div>
                        <svg class="ml-auto flex-shrink-0 text-gray-600 group-hover:text-gray-400 transition-colors" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M9 18l6-6-6-6"/></svg>
                    </a>
                </li>

                <li>
                    <a href="#admin-panel"
                       class="mob-nav-item flex items-center gap-3 text-[14px] font-medium text-gray-400 hover:text-white px-3 py-3 rounded-xl group">
                        <span class="flex-shrink-0 w-[34px] h-[34px] rounded-lg flex items-center justify-center"
                              style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.15);">
                            <!-- Grid / dashboard icon -->
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="3" width="7" height="7" rx="1.5"/>
                                <rect x="14" y="3" width="7" height="7" rx="1.5"/>
                                <rect x="3" y="14" width="7" height="7" rx="1.5"/>
                                <rect x="14" y="14" width="7" height="7" rx="1.5"/>
                            </svg>
                        </span>
                        <div>
                            <div class="font-semibold text-[14px] text-gray-200">Admin Panel</div>
                            <div class="text-[11.5px] text-gray-500 mt-0.5 font-normal">Full control dashboard</div>
                        </div>
                        <svg class="ml-auto flex-shrink-0 text-gray-600 group-hover:text-gray-400 transition-colors" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M9 18l6-6-6-6"/></svg>
                    </a>
                </li>

                <li>
                    <a href="#how-it-works"
                       class="mob-nav-item flex items-center gap-3 text-[14px] font-medium text-gray-400 hover:text-white px-3 py-3 rounded-xl group">
                        <span class="flex-shrink-0 w-[34px] h-[34px] rounded-lg flex items-center justify-center"
                              style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.15);">
                            <!-- Play / steps icon -->
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 12A10 10 0 1112 2"/>
                                <polyline points="22 2 22 8 16 8"/>
                                <path d="M12 12l3-3"/>
                            </svg>
                        </span>
                        <div>
                            <div class="font-semibold text-[14px] text-gray-200">How It Works</div>
                            <div class="text-[11.5px] text-gray-500 mt-0.5 font-normal">30-min setup guide</div>
                        </div>
                        <svg class="ml-auto flex-shrink-0 text-gray-600 group-hover:text-gray-400 transition-colors" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M9 18l6-6-6-6"/></svg>
                    </a>
                </li>

                <li>
                    <a href="#faq"
                       class="mob-nav-item flex items-center gap-3 text-[14px] font-medium text-gray-400 hover:text-white px-3 py-3 rounded-xl group">
                        <span class="flex-shrink-0 w-[34px] h-[34px] rounded-lg flex items-center justify-center"
                              style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.15);">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/>
                            </svg>
                        </span>
                        <div>
                            <div class="font-semibold text-[14px] text-gray-200">FAQ</div>
                            <div class="text-[11.5px] text-gray-500 mt-0.5 font-normal">Common questions answered</div>
                        </div>
                        <svg class="ml-auto flex-shrink-0 text-gray-600 group-hover:text-gray-400 transition-colors" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M9 18l6-6-6-6"/></svg>
                    </a>
                </li>

                <li>
                    <a href="#contact"
                       class="mob-nav-item flex items-center gap-3 text-[14px] font-medium text-gray-400 hover:text-white px-3 py-3 rounded-xl group">
                        <span class="flex-shrink-0 w-[34px] h-[34px] rounded-lg flex items-center justify-center"
                              style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.15);">
                            <!-- Mail icon -->
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2z"/>
                                <polyline points="22,6 12,13 2,6"/>
                            </svg>
                        </span>
                        <div>
                            <div class="font-semibold text-[14px] text-gray-200">Contact</div>
                            <div class="text-[11.5px] text-gray-500 mt-0.5 font-normal">Talk to our team</div>
                        </div>
                        <svg class="ml-auto flex-shrink-0 text-gray-600 group-hover:text-gray-400 transition-colors" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M9 18l6-6-6-6"/></svg>
                    </a>
                </li>

            </ul>

            <!-- Mobile CTA block -->
            <div class="mt-3 pt-3 border-t flex flex-col gap-2" style="border-color: rgba(255,255,255,0.07);">

                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                           class="flex items-center justify-center text-[14px] font-medium text-gray-300 hover:text-white border rounded-xl px-4 py-3 transition-all duration-200 hover:border-white/20"
                           style="border-color: rgba(255,255,255,0.1); background: rgba(255,255,255,0.03);">
                            Dashboard &rarr;
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="flex items-center justify-center text-[14px] font-medium text-gray-300 hover:text-white border rounded-xl px-4 py-3 transition-all duration-200 hover:border-white/20"
                           style="border-color: rgba(255,255,255,0.1); background: rgba(255,255,255,0.03);">
                            Log in
                        </a>
                    @endauth
                @endif

                <a href="https://wa.me/923460820722?text=Hi%2C%20I%27m%20interested%20in%20LimoSchedule.%20Can%20you%20show%20me%20a%20live%20demo%3F"
                   target="_blank" rel="noopener"
                   class="wa-hero-cta flex items-center justify-center gap-2 text-white text-[14px] font-bold px-4 py-3 rounded-xl"
                   style="background: linear-gradient(135deg, #16a34a, #22c55e); animation: wa-pulse-glow 2.5s ease-in-out infinite;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M11.99 0C5.376 0 0 5.373 0 11.988c0 2.104.549 4.14 1.595 5.945L0 24l6.335-1.652A11.981 11.981 0 0011.99 24C18.604 24 24 18.627 24 12.012 24 5.373 18.604 0 11.99 0zm.01 21.823a9.886 9.886 0 01-5.03-1.372l-.362-.214-3.762.981.999-3.649-.235-.374a9.837 9.837 0 01-1.511-5.195c0-5.452 4.443-9.893 9.901-9.893 5.452 0 9.895 4.441 9.895 9.893 0 5.452-4.443 9.823-9.895 9.823z"/></svg>
                    Talk to a Real Person — WhatsApp
                </a>
                <a href="#contact"
                   class="btn-cta flex items-center justify-center gap-2 bg-[#3B82F6] text-white text-[14px] font-semibold px-4 py-3 rounded-xl border border-blue-500/30">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="7.5" cy="15.5" r="5.5"/>
                        <path d="M21 2l-9.6 9.6"/>
                        <path d="M15.5 7.5l3 3L22 7l-3-3"/>
                    </svg>
                    <span>Get License Access</span>
                </a>
            </div>

        </div><!-- /mobile inner -->
    </div><!-- /mobile-menu -->

</header>
<!-- â•â•â•â• END NAVBAR â•â•â•â• -->


<!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
     HERO &mdash; PLACEHOLDER (future section prompt)
â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
<main id="hero" class="hero-grid relative min-h-screen flex items-center justify-center overflow-hidden" style="padding-top: 66px;">

    <!-- Ambient glow orb -->
    <div class="glow-orb absolute inset-0 pointer-events-none"></div>

    <!-- Noise texture overlay -->
    <div class="absolute inset-0 pointer-events-none" style="background-image: url('data:image/svg+xml,%3Csvg viewBox=&quot;0 0 256 256&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cfilter id=&quot;noise&quot;%3E%3CfeTurbulence type=&quot;fractalNoise&quot; baseFrequency=&quot;0.9&quot; numOctaves=&quot;4&quot; stitchTiles=&quot;stitch&quot;/%3E%3C/filter%3E%3Crect width=&quot;100%25&quot; height=&quot;100%25&quot; filter=&quot;url(%23noise)&quot; opacity=&quot;0.03&quot;/%3E%3C/svg%3E'); opacity: 0.4;"></div>

    <div class="relative z-10 max-w-5xl mx-auto px-5 sm:px-6 lg:px-8 text-center py-24">

        <!-- Urgency badge -->
        <div class="inline-flex items-center gap-2.5 mb-6 px-4 py-2 rounded-full"
             style="background: rgba(239,68,68,0.08); border: 1px solid rgba(239,68,68,0.22);">
            <span class="relative flex h-2 w-2 flex-shrink-0">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
            </span>
            <span class="text-red-400 text-xs font-bold tracking-[0.14em] uppercase">Limited Licenses Available &mdash; Only a Few Spots Left</span>
        </div>

        <!-- Main headline -->
        <h1 class="text-3xl sm:text-4xl lg:text-[48px] xl:text-[56px] font-black tracking-tight leading-[1.05] mb-6">
            Your Limo,
            <span style="background: linear-gradient(135deg, #ffffff 0%, #93c5fd 40%, #3B82F6 80%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                Automated.
            </span>
        </h1>

        <!-- Emotional sub-headline -->
        <p class="text-gray-300 text-lg sm:text-xl max-w-2xl mx-auto leading-relaxed mb-3 font-medium">
            Every missed call, every manual booking, every dispatch error is revenue leaving your business.
        </p>
        <p class="text-gray-500 text-base max-w-xl mx-auto mb-8 leading-relaxed">
            LimoSchedule is the enterprise-grade, self-hosted limo booking system that automates your entire operation &mdash; AI agent, voice search, fleet dispatch, and real-time control. <span class="text-white font-semibold">One-time license. Yours forever.</span>
        </p>

        <!-- Price badge -->
        <div class="inline-flex flex-wrap items-center justify-center gap-3 mb-8 px-5 py-3 rounded-2xl" style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.25);">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><circle cx="7.5" cy="15.5" r="5.5"/><path d="M21 2l-9.6 9.6"/><path d="M15.5 7.5l3 3L22 7l-3-3"/></svg>
            <span class="text-[13.5px] font-semibold text-white">One-Time License &mdash;</span>
            <span class="text-[22px] font-black text-blue-400 leading-none">$1,999</span>
            <span class="w-px h-4 bg-white/15"></span>
            <span class="text-[11px] font-bold text-gray-400 uppercase tracking-wider">No Subscriptions · No Monthly Fees · Own It Forever</span>
        </div>

        <!-- CTA row &mdash; WhatsApp PRIMARY -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-3 mb-4">

            <!-- PRIMARY: WhatsApp with pulse glow -->
            <a href="https://wa.me/923460820722?text=Hi%2C%20I%27m%20interested%20in%20LimoSchedule.%20Can%20you%20show%20me%20a%20live%20demo%3F" target="_blank" rel="noopener"
               class="wa-hero-cta w-full sm:w-auto inline-flex items-center justify-center gap-2.5 font-bold px-8 py-4 rounded-xl text-[15px] text-white"
               style="background: linear-gradient(135deg, #16a34a, #22c55e); box-shadow: 0 0 0 0 rgba(34,197,94,0.5); animation: wa-pulse-glow 2.5s ease-in-out infinite;">
                <svg width="19" height="19" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                    <path d="M11.99 0C5.376 0 0 5.373 0 11.988c0 2.104.549 4.14 1.595 5.945L0 24l6.335-1.652A11.981 11.981 0 0011.99 24C18.604 24 24 18.627 24 12.012 24 5.373 18.604 0 11.99 0zm.01 21.823a9.886 9.886 0 01-5.03-1.372l-.362-.214-3.762.981.999-3.649-.235-.374a9.837 9.837 0 01-1.511-5.195c0-5.452 4.443-9.893 9.901-9.893 5.452 0 9.895 4.441 9.895 9.893 0 5.452-4.443 9.823-9.895 9.823z"/>
                </svg>
                <span>Talk to a Real Person Now</span>
            </a>

            <!-- SECONDARY: Get License -->
            <a href="#contact"
               class="btn-cta w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-[#3B82F6] text-white font-semibold px-7 py-4 rounded-xl text-[15px] border border-blue-500/30">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="7.5" cy="15.5" r="5.5"/>
                    <path d="M21 2l-9.6 9.6"/>
                    <path d="M15.5 7.5l3 3L22 7l-3-3"/>
                </svg>
                <span>Request Private Demo</span>
            </a>
        </div>

        <!-- Micro-trust under CTAs -->
        <p class="text-gray-600 text-xs mb-10">Instant response on WhatsApp · See the live admin panel · No obligation</p>

        <!-- Audio player -->
        <div class="mt-10 max-w-md mx-auto">
            <div class="relative flex items-center gap-4 px-5 py-4 rounded-2xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08); backdrop-filter: blur(12px);">
                <!-- Play button -->
                <button id="heroAudioBtn" type="button"
                    class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center transition-all duration-200 hover:scale-105"
                    style="background: #3B82F6; box-shadow: 0 0 20px rgba(59,130,246,0.4);">
                    <svg id="heroPlayIcon" width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                    <svg id="heroPauseIcon" width="14" height="14" viewBox="0 0 24 24" fill="currentColor" class="hidden"><rect x="6" y="4" width="4" height="16"/><rect x="14" y="4" width="4" height="16"/></svg>
                </button>
                <!-- Waveform bars (decorative) -->
                <div class="flex-1 flex items-center gap-[2.5px]" style="height: 28px;">
                    <div class="vw-bar" style="height: 6px;  animation-delay: 0.0s;"></div>
                    <div class="vw-bar" style="height: 14px; animation-delay: 0.1s;"></div>
                    <div class="vw-bar" style="height: 20px; animation-delay: 0.2s;"></div>
                    <div class="vw-bar" style="height: 28px; animation-delay: 0.3s;"></div>
                    <div class="vw-bar" style="height: 22px; animation-delay: 0.4s;"></div>
                    <div class="vw-bar" style="height: 16px; animation-delay: 0.5s;"></div>
                    <div class="vw-bar" style="height: 24px; animation-delay: 0.6s;"></div>
                    <div class="vw-bar" style="height: 10px; animation-delay: 0.7s;"></div>
                    <div class="vw-bar" style="height: 18px; animation-delay: 0.8s;"></div>
                    <div class="vw-bar" style="height: 26px; animation-delay: 0.9s;"></div>
                    <div class="vw-bar" style="height: 12px; animation-delay: 1.0s;"></div>
                    <div class="vw-bar" style="height: 22px; animation-delay: 1.1s;"></div>
                    <div class="vw-bar" style="height: 8px;  animation-delay: 1.2s;"></div>
                    <div class="vw-bar" style="height: 20px; animation-delay: 1.3s;"></div>
                    <div class="vw-bar" style="height: 28px; animation-delay: 1.4s;"></div>
                    <div class="vw-bar" style="height: 16px; animation-delay: 1.5s;"></div>
                    <div class="vw-bar" style="height: 10px; animation-delay: 1.6s;"></div>
                    <div class="vw-bar" style="height: 22px; animation-delay: 1.7s;"></div>
                    <div class="vw-bar" style="height: 18px; animation-delay: 1.8s;"></div>
                    <div class="vw-bar" style="height: 6px;  animation-delay: 1.9s;"></div>
                </div>
                <!-- Label -->
                <div class="flex-shrink-0 text-right">
                    <div class="text-[11px] font-semibold text-white">System Overview</div>
                    <div class="text-[10px] text-gray-500 mt-0.5">2 min Â· English</div>
                </div>
                <audio id="heroAudio" preload="none">
                    <source src="{{ asset('public/assets/mp3/main-voice.mp3') }}" type="audio/mpeg">
                </audio>
            </div>
        </div>

        <!-- Trust strip -->
        <div class="flex flex-wrap items-center justify-center gap-x-7 gap-y-3 mt-10 pt-10 border-t"
             style="border-color: rgba(255,255,255,0.07);">
            <div class="stat-item flex items-center gap-2 text-sm text-gray-500">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                Built for Real Limo Operators
            </div>
            <div class="stat-item flex items-center gap-2 text-sm text-gray-500" style="transition-delay: 0.07s">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                Enterprise-Grade Architecture
            </div>
            <div class="stat-item flex items-center gap-2 text-sm text-gray-500" style="transition-delay: 0.14s">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                Private &amp; Self-Hosted
            </div>
            <div class="stat-item flex items-center gap-2 text-sm text-gray-500" style="transition-delay: 0.21s">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                Full Ownership Included
            </div>
            <div class="stat-item flex items-center gap-2 text-sm text-gray-500" style="transition-delay: 0.28s">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                Pay Once Â· Use Forever
            </div>
        </div>

    </div>
</main>


<!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
     SECTION &mdash; PAIN / PROBLEM (inserted before features)
â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
<section id="the-problem" class="relative py-24 lg:py-32 overflow-hidden" style="background: #060606;">

    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(239,68,68,0.02) 1px, transparent 1px), linear-gradient(90deg, rgba(239,68,68,0.02) 1px, transparent 1px); background-size: 56px 56px;"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[300px] pointer-events-none" style="background: radial-gradient(ellipse at 50% 0%, rgba(239,68,68,0.06) 0%, transparent 70%);"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto mb-16 section-fade">
            <div class="inline-flex items-center gap-2 mb-5 px-4 py-1.5 rounded-full" style="background: rgba(239,68,68,0.07); border: 1px solid rgba(239,68,68,0.2);">
                <span class="text-[11px] font-bold tracking-[0.14em] uppercase text-red-400">The Real Cost of Doing Nothing</span>
            </div>
            <h2 class="text-4xl sm:text-5xl font-black tracking-tight leading-[1.1] mb-5 text-white">
                Every day without this system,<br>
                <span style="background: linear-gradient(135deg, #ef4444, #f97316); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                    you're losing money.
                </span>
            </h2>
            <p class="text-gray-400 text-[17px] leading-relaxed">
                Limo business owners running manual operations are hemorrhaging revenue every single day &mdash; through missed calls, double bookings, dispatch chaos, and a poor customer experience that sends clients to your competitors.
            </p>
        </div>

        <!-- Pain cards grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 mb-16">

            <div class="rounded-2xl p-6 section-fade" style="background: rgba(239,68,68,0.04); border: 1px solid rgba(239,68,68,0.14); transition-delay: 0.05s">
                <div class="w-11 h-11 rounded-xl flex items-center justify-center mb-4" style="background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.2);">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2" stroke-linecap="round"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 10.8 19.79 19.79 0 01.01 2.18 2 2 0 012 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z"/></svg>
                </div>
                <h3 class="text-white font-bold text-[16px] mb-2">Missed Calls = Missed Revenue</h3>
                <p class="text-gray-500 text-[13.5px] leading-relaxed">Every unanswered call is a booking going straight to your competitor. No system, no second chances.</p>
            </div>

            <div class="rounded-2xl p-6 section-fade" style="background: rgba(239,68,68,0.04); border: 1px solid rgba(239,68,68,0.14); transition-delay: 0.10s">
                <div class="w-11 h-11 rounded-xl flex items-center justify-center mb-4" style="background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.2);">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2" stroke-linecap="round"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                </div>
                <h3 class="text-white font-bold text-[16px] mb-2">Dispatch Chaos Destroys Reputation</h3>
                <p class="text-gray-500 text-[13.5px] leading-relaxed">Double bookings, wrong vehicles, late drivers &mdash; manual dispatch is a ticking time bomb for your 5-star rating.</p>
            </div>

            <div class="rounded-2xl p-6 section-fade" style="background: rgba(239,68,68,0.04); border: 1px solid rgba(239,68,68,0.14); transition-delay: 0.15s">
                <div class="w-11 h-11 rounded-xl flex items-center justify-center mb-4" style="background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.2);">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                </div>
                <h3 class="text-white font-bold text-[16px] mb-2">Staff Dependency Caps Your Growth</h3>
                <p class="text-gray-500 text-[13.5px] leading-relaxed">Your business stops when your staff stops. Sick days, late nights, holiday gaps &mdash; it all bleeds revenue.</p>
            </div>

            <div class="rounded-2xl p-6 section-fade" style="background: rgba(239,68,68,0.04); border: 1px solid rgba(239,68,68,0.14); transition-delay: 0.20s">
                <div class="w-11 h-11 rounded-xl flex items-center justify-center mb-4" style="background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.2);">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2" stroke-linecap="round"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/></svg>
                </div>
                <h3 class="text-white font-bold text-[16px] mb-2">Manual Bookings Waste Hours Daily</h3>
                <p class="text-gray-500 text-[13.5px] leading-relaxed">Hours spent on spreadsheets, calls, and WhatsApp messages that an automated system handles in seconds.</p>
            </div>

            <div class="rounded-2xl p-6 section-fade" style="background: rgba(239,68,68,0.04); border: 1px solid rgba(239,68,68,0.14); transition-delay: 0.25s">
                <div class="w-11 h-11 rounded-xl flex items-center justify-center mb-4" style="background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.2);">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2" stroke-linecap="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
                </div>
                <h3 class="text-white font-bold text-[16px] mb-2">Poor Customer Experience Kills Loyalty</h3>
                <p class="text-gray-500 text-[13.5px] leading-relaxed">Slow responses, no confirmations, no tracking &mdash; premium clients expect a premium experience. Are you delivering it?</p>
            </div>

            <div class="rounded-2xl p-6 section-fade" style="background: rgba(239,68,68,0.04); border: 1px solid rgba(239,68,68,0.14); transition-delay: 0.30s">
                <div class="w-11 h-11 rounded-xl flex items-center justify-center mb-4" style="background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.2);">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2" stroke-linecap="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg>
                </div>
                <h3 class="text-white font-bold text-[16px] mb-2">Operational Costs That Never Stop</h3>
                <p class="text-gray-500 text-[13.5px] leading-relaxed">SaaS subscriptions, booking platform commissions, dispatcher salaries &mdash; the costs compound while your margin shrinks.</p>
            </div>

        </div>

        <!-- Solution transition -->
        <div class="text-center section-fade" style="transition-delay: 0.35s">
            <div class="inline-block px-8 py-5 rounded-2xl mb-6" style="background: rgba(59,130,246,0.06); border: 1px solid rgba(59,130,246,0.2);">
                <p class="text-[18px] sm:text-[22px] font-bold text-white leading-snug">
                    LimoSchedule eliminates every one of these problems.<br>
                    <span class="text-blue-400">One system. One payment. Zero recurring costs.</span>
                </p>
            </div>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                <a href="https://wa.me/923460820722?text=Hi%2C%20I%27m%20interested%20in%20LimoSchedule.%20Can%20you%20show%20me%20a%20live%20demo%3F" target="_blank" rel="noopener"
                   class="wa-hero-cta inline-flex items-center gap-2.5 font-bold px-7 py-3.5 rounded-xl text-[14px] text-white"
                   style="background: linear-gradient(135deg, #16a34a, #22c55e); animation: wa-pulse-glow 2.5s ease-in-out infinite;">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M11.99 0C5.376 0 0 5.373 0 11.988c0 2.104.549 4.14 1.595 5.945L0 24l6.335-1.652A11.981 11.981 0 0011.99 24C18.604 24 24 18.627 24 12.012 24 5.373 18.604 0 11.99 0zm.01 21.823a9.886 9.886 0 01-5.03-1.372l-.362-.214-3.762.981.999-3.649-.235-.374a9.837 9.837 0 01-1.511-5.195c0-5.452 4.443-9.893 9.901-9.893 5.452 0 9.895 4.441 9.895 9.893 0 5.452-4.443 9.823-9.895 9.823z"/></svg>
                    Get Instant Demo on WhatsApp
                </a>
                <a href="#features" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl font-medium text-[14px] text-gray-300 hover:text-white transition-colors duration-200" style="border: 1px solid rgba(255,255,255,0.1);">
                    See All Features &rarr;
                </a>
            </div>
        </div>

    </div>
</section>
<!-- â•â•â•â• END PAIN SECTION â•â•â•â• -->


<!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
     SECTION 2 &mdash; FEATURES GRID
â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
<section id="features" class="relative py-28 lg:py-36 overflow-hidden" style="background: #0A0A0A;">

    <!-- Faint section grid -->
    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.03) 1px, transparent 1px); background-size: 56px 56px;"></div>

    <!-- Ambient glow &mdash; top center -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[700px] h-[340px] pointer-events-none"
         style="background: radial-gradient(ellipse at 50% 0%, rgba(59,130,246,0.10) 0%, transparent 70%);"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">

        <!-- â”€â”€ Section Header â”€â”€ -->
        <div class="text-center max-w-2xl mx-auto mb-16 lg:mb-20 section-fade">

            <!-- Eyebrow -->
            <div class="inline-flex items-center gap-2 mb-5 px-4 py-1.5 rounded-full"
                 style="background: rgba(59,130,246,0.07); border: 1px solid rgba(59,130,246,0.18);">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                </svg>
                <span class="text-[11px] font-bold tracking-[0.14em] uppercase text-blue-400">Platform Capabilities</span>
            </div>

            <h2 class="text-4xl sm:text-5xl font-black tracking-tight leading-[1.1] mb-5">
                Stop losing bookings.<br>
                <span style="background: linear-gradient(135deg, #ffffff 0%, #93c5fd 45%, #3B82F6 90%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                    Start running on autopilot.
                </span>
            </h2>

            <p class="text-gray-400 text-[16.5px] leading-relaxed">
                One system. One license. Built for premium transportation companies that want to automate operations, eliminate staff dependency, and deliver a five-star customer experience &mdash; 24/7, automatically.
            </p>
        </div>

        <!-- â”€â”€ Feature Cards Grid â”€â”€ -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-5">

            <!-- 1. Open Source Code Access -->
            <div class="feature-card section-fade" style="transition-delay: 0.05s">
                <div class="feat-icon-wrap">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="16 18 22 12 16 6"/>
                        <polyline points="8 6 2 12 8 18"/>
                    </svg>
                </div>
                <h3 class="text-white text-[16px] font-bold mb-2 leading-snug">Open Source Code Access</h3>
                <p class="text-gray-500 text-[13.5px] leading-relaxed pr-8">
                    Full, unencrypted source code delivered with your license. Read, modify, and extend every line &mdash; no runtime fees, no black boxes.
                </p>
                <div class="feat-arrow">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(59,130,246,0.6)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </div>
            </div>

            <!-- 2. White Label System -->
            <div class="feature-card section-fade" style="transition-delay: 0.10s">
                <div class="feat-icon-wrap">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 20h9"/>
                        <path d="M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/>
                    </svg>
                </div>
                <h3 class="text-white text-[16px] font-bold mb-2 leading-snug">White Label System</h3>
                <p class="text-gray-500 text-[13.5px] leading-relaxed pr-8">
                    Replace every trace of our branding with yours. Custom domain, logo, colors, and app name &mdash; zero attribution required. Full white-label customization allowed.
                </p>
                <div class="feat-arrow">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(59,130,246,0.6)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </div>
            </div>

            <!-- 3. Self-Hosted Deployment -->
            <div class="feature-card section-fade" style="transition-delay: 0.15s">
                <div class="feat-icon-wrap">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="2" width="20" height="8" rx="2"/>
                        <rect x="2" y="14" width="20" height="8" rx="2"/>
                        <line x1="6" y1="6" x2="6.01" y2="6"/>
                        <line x1="6" y1="18" x2="6.01" y2="18"/>
                    </svg>
                </div>
                <h3 class="text-white text-[16px] font-bold mb-2 leading-snug">Self-Hosted &amp; Private</h3>
                <p class="text-gray-500 text-[13.5px] leading-relaxed pr-8">
                    Deploy on any VPS, dedicated server, or private cloud. Your data, your infrastructure, your rules &mdash; no third-party ever touches your records.
                </p>
                <div class="feat-arrow">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(59,130,246,0.6)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </div>
            </div>

            <!-- 4. 30-Min Installation -->
            <div class="feature-card section-fade" style="transition-delay: 0.20s">
                <div class="feat-icon-wrap">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <polyline points="12 6 12 12 16 14"/>
                    </svg>
                </div>
                <h3 class="text-white text-[16px] font-bold mb-2 leading-snug">30-Min Installation</h3>
                <p class="text-gray-500 text-[13.5px] leading-relaxed pr-8">
                    Our automated installer handles the entire stack. From a blank server to a live, production-ready booking system in under 30 minutes.
                </p>
                <div class="feat-arrow">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(59,130,246,0.6)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </div>
            </div>

            <!-- 5. AI Booking Agent &mdash; FEATURED -->
            <div class="feature-card featured section-fade" style="transition-delay: 0.25s">
                <!-- Featured label -->
                <div class="absolute top-4 right-4">
                    <span class="inline-flex items-center gap-1 text-[10px] font-bold tracking-widest uppercase text-blue-400 px-2 py-0.5 rounded-full"
                          style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.25);">
                        AI-Powered
                    </span>
                </div>
                <div class="feat-icon-wrap" style="background: rgba(59,130,246,0.12); border-color: rgba(59,130,246,0.25);">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2a4 4 0 014 4v1h1a3 3 0 013 3v6a3 3 0 01-3 3H7a3 3 0 01-3-3v-6a3 3 0 013-3h1V6a4 4 0 014-4z"/>
                        <circle cx="9" cy="13" r="1" fill="#3B82F6" stroke="none"/>
                        <circle cx="15" cy="13" r="1" fill="#3B82F6" stroke="none"/>
                        <path d="M9 17s1 1 3 1 3-1 3-1"/>
                    </svg>
                </div>
                <h3 class="text-white text-[16px] font-bold mb-2 leading-snug">AI Booking Agent</h3>
                <p class="text-gray-400 text-[13.5px] leading-relaxed pr-8">
                    Intelligent AI agent handles customer enquiries, confirms bookings, upsells upgrades, and optimizes schedules autonomously &mdash; 24/7, zero staff required.
                </p>
                <div class="feat-arrow">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(59,130,246,0.7)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </div>
            </div>

            <!-- 6. Voice Search Booking &mdash; FEATURED -->
            <div class="feature-card featured section-fade" style="transition-delay: 0.30s">
                <div class="absolute top-4 right-4">
                    <span class="inline-flex items-center gap-1 text-[10px] font-bold tracking-widest uppercase text-blue-400 px-2 py-0.5 rounded-full"
                          style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.25);">
                        AI-Powered
                    </span>
                </div>
                <div class="feat-icon-wrap" style="background: rgba(59,130,246,0.12); border-color: rgba(59,130,246,0.25);">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2a3 3 0 00-3 3v7a3 3 0 006 0V5a3 3 0 00-3-3z"/>
                        <path d="M19 10v2a7 7 0 01-14 0v-2"/>
                        <line x1="12" y1="19" x2="12" y2="23"/>
                        <line x1="8"  y1="23" x2="16" y2="23"/>
                    </svg>
                </div>
                <h3 class="text-white text-[16px] font-bold mb-2 leading-snug">Voice Search Booking</h3>
                <p class="text-gray-400 text-[13.5px] leading-relaxed pr-8">
                    Customers book rides with natural voice commands in any language. No typing, no friction &mdash; just speak the destination and the system handles the rest.
                </p>
                <div class="feat-arrow">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(59,130,246,0.7)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </div>
            </div>

            <!-- 7. Fleet Management -->
            <div class="feature-card section-fade" style="transition-delay: 0.35s">
                <div class="feat-icon-wrap">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 17H3a2 2 0 01-2-2V5a2 2 0 012-2h11a2 2 0 012 2v3"/>
                        <rect x="9" y="11" width="14" height="10" rx="2"/>
                        <circle cx="12" cy="21" r="1" fill="#3B82F6" stroke="none"/>
                        <circle cx="20" cy="21" r="1" fill="#3B82F6" stroke="none"/>
                    </svg>
                </div>
                <h3 class="text-white text-[16px] font-bold mb-2 leading-snug">Fleet Management</h3>
                <p class="text-gray-500 text-[13.5px] leading-relaxed pr-8">
                    Real-time vehicle tracking, driver assignment, availability management, and intelligent route optimization across your entire fleet &mdash; from one dashboard.
                </p>
                <div class="feat-arrow">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(59,130,246,0.6)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </div>
            </div>

            <!-- 8. Admin Control Panel -->
            <div class="feature-card section-fade" style="transition-delay: 0.40s">
                <div class="feat-icon-wrap">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="7" height="7" rx="1.5"/>
                        <rect x="14" y="3" width="7" height="7" rx="1.5"/>
                        <rect x="3" y="14" width="7" height="7" rx="1.5"/>
                        <rect x="14" y="14" width="7" height="7" rx="1.5"/>
                    </svg>
                </div>
                <h3 class="text-white text-[16px] font-bold mb-2 leading-snug">Admin Control Panel</h3>
                <p class="text-gray-500 text-[13.5px] leading-relaxed pr-8">
                    Comprehensive dashboard for bookings, drivers, pricing rules, revenue reports, and customer management &mdash; all in one powerful and intuitive interface.
                </p>
                <div class="feat-arrow">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(59,130,246,0.6)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </div>
            </div>

            <!-- 9. Team Management -->
            <div class="feature-card section-fade" style="transition-delay: 0.45s">
                <div class="feat-icon-wrap">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 00-3-3.87"/>
                        <path d="M16 3.13a4 4 0 010 7.75"/>
                    </svg>
                </div>
                <h3 class="text-white text-[16px] font-bold mb-2 leading-snug">Team Management</h3>
                <p class="text-gray-500 text-[13.5px] leading-relaxed pr-8">
                    Role-based access control with granular permissions. Add dispatchers, operators, and support staff with exactly the access level each role requires.
                </p>
                <div class="feat-arrow">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(59,130,246,0.6)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </div>
            </div>

        </div><!-- /grid -->

        <!-- â”€â”€ Bottom CTA strip â”€â”€ -->
        <div class="mt-16 flex flex-col items-center gap-5 section-fade" style="transition-delay: 0.5s">
            <p class="text-gray-500 text-sm text-center">
                All features included in a single one-time license of <span class="text-white font-semibold">$1,999</span>. No monthly fees. No hidden costs. No subscriptions.
            </p>
            <div class="flex flex-col sm:flex-row items-center gap-3">
                <a href="https://wa.me/923460820722?text=Hi%2C%20I%27m%20interested%20in%20LimoSchedule.%20Can%20you%20show%20me%20a%20live%20demo%3F" target="_blank" rel="noopener"
                   class="wa-hero-cta inline-flex items-center gap-2.5 font-bold px-6 py-3 rounded-xl text-[13.5px] text-white flex-shrink-0"
                   style="background: linear-gradient(135deg, #16a34a, #22c55e); animation: wa-pulse-glow 2.5s ease-in-out infinite;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M11.99 0C5.376 0 0 5.373 0 11.988c0 2.104.549 4.14 1.595 5.945L0 24l6.335-1.652A11.981 11.981 0 0011.99 24C18.604 24 24 18.627 24 12.012 24 5.373 18.604 0 11.99 0zm.01 21.823a9.886 9.886 0 01-5.03-1.372l-.362-.214-3.762.981.999-3.649-.235-.374a9.837 9.837 0 01-1.511-5.195c0-5.452 4.443-9.893 9.901-9.893 5.452 0 9.895 4.441 9.895 9.893 0 5.452-4.443 9.823-9.895 9.823z"/></svg>
                    See Live Admin Panel on WhatsApp
                </a>
                <a href="#contact"
                   class="btn-cta inline-flex items-center gap-2 bg-[#3B82F6] text-white font-semibold px-6 py-3 rounded-xl text-[13.5px] border border-blue-500/30 flex-shrink-0">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="7.5" cy="15.5" r="5.5"/><path d="M21 2l-9.6 9.6"/><path d="M15.5 7.5l3 3L22 7l-3-3"/></svg>
                    <span>Request Private Demo</span>
                </a>
            </div>
        </div>

    </div><!-- /container -->
</section>
<!-- â•â•â•â• END FEATURES â•â•â•â• -->


<!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
     SECTION 3 &mdash; VOICE SEARCH BOOKING
â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
<section id="voice-search" class="relative py-28 lg:py-36 overflow-hidden" style="background: #0A0A0A;">

    <!-- Section grid -->
    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.03) 1px, transparent 1px); background-size: 56px 56px;"></div>

    <!-- Bottom ambient glow -->
    <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[900px] h-[420px] pointer-events-none"
         style="background: radial-gradient(ellipse at 50% 100%, rgba(59,130,246,0.09) 0%, transparent 68%);"></div>

    <!-- Top ambient glow -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[280px] pointer-events-none"
         style="background: radial-gradient(ellipse at 50% 0%, rgba(59,130,246,0.07) 0%, transparent 70%);"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">

        <!-- â”€â”€ Section Header â”€â”€ -->
        <div class="text-center max-w-2xl mx-auto mb-16 lg:mb-20 section-fade">

            <div class="inline-flex items-center gap-2 mb-5 px-4 py-1.5 rounded-full"
                 style="background: rgba(59,130,246,0.07); border: 1px solid rgba(59,130,246,0.18);">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 2a3 3 0 00-3 3v7a3 3 0 006 0V5a3 3 0 00-3-3z"/>
                    <path d="M19 10v2a7 7 0 01-14 0v-2"/>
                    <line x1="12" y1="19" x2="12" y2="23"/>
                    <line x1="8"  y1="23" x2="16" y2="23"/>
                </svg>
                <span class="text-[11px] font-bold tracking-[0.14em] uppercase text-blue-400">AI Voice Interface</span>
            </div>

            <h2 class="text-4xl sm:text-5xl font-black tracking-tight leading-[1.1] mb-5">
                Your customers speak.<br>
                <span style="background: linear-gradient(135deg, #ffffff 0%, #93c5fd 45%, #3B82F6 90%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                    Revenue appears instantly.
                </span>
            </h2>

            <p class="text-gray-400 text-[16.5px] leading-relaxed">
                The world's most frictionless booking experience &mdash; passengers speak a single voice command in any language, and the AI instantly finds vehicles, quotes fares, and confirms bookings. Faster bookings mean higher conversion rates and a luxury experience that keeps clients coming back.
            </p>
        </div>

        <!-- â”€â”€ Main 2-col layout â”€â”€ -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8 items-start">

            <!-- â•”â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•—
                 â•‘  LEFT: VOICE UI  â•‘
                 â•šâ•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
            <div class="voice-panel-reveal">
                <div class="relative rounded-2xl overflow-hidden"
                     style="background: rgba(14,14,18,0.9); border: 1px solid rgba(255,255,255,0.08); backdrop-filter: blur(16px);">

                    <!-- Scan line effect -->
                    <div class="vs-scan-line"></div>

                    <!-- Terminal top bar -->
                    <div class="flex items-center justify-between px-5 py-3.5 border-b"
                         style="border-color: rgba(255,255,255,0.06); background: rgba(255,255,255,0.015);">
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full" style="background: rgba(239,68,68,0.7);"></span>
                            <span class="w-2.5 h-2.5 rounded-full" style="background: rgba(234,179,8,0.7);"></span>
                            <span class="w-2.5 h-2.5 rounded-full" style="background: rgba(34,197,94,0.7);"></span>
                        </div>
                        <span class="text-[10.5px] font-medium text-gray-600 tracking-[0.1em] uppercase select-none">Voice Interface Â· LimoSchedule AI</span>
                        <div class="flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-400" style="box-shadow: 0 0 7px rgba(74,222,128,0.9);"></span>
                            <span class="text-[10px] text-green-400 font-bold tracking-wider">LIVE</span>
                        </div>
                    </div>

                    <!-- Panel body -->
                    <div class="p-6 lg:p-8">

                        <!-- Status badge -->
                        <div class="flex items-center justify-center mb-7">
                            <div id="vs-status-badge" class="inline-flex items-center gap-2.5 px-4 py-2 rounded-full"
                                 style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.22);">
                                <span class="ping-dot relative w-2 h-2 rounded-full bg-[#3B82F6] flex-shrink-0"></span>
                                <span id="vs-status-text" class="text-[11.5px] font-bold text-blue-400 tracking-[0.14em] uppercase">Listening</span>
                            </div>
                        </div>

                        <!-- Mic button + rings -->
                        <div class="flex justify-center mb-7">
                            <div class="relative w-24 h-24">
                                <!-- Expanding rings (staggered) -->
                                <div class="mic-ring" style="animation-delay: 0s;"></div>
                                <div class="mic-ring" style="animation-delay: 0.7s;"></div>
                                <div class="mic-ring" style="animation-delay: 1.4s;"></div>

                                <!-- Core button -->
                                <button
                                    id="mic-btn"
                                    type="button"
                                    aria-label="Toggle voice input"
                                    class="mic-btn-listening relative w-full h-full rounded-full flex items-center justify-center cursor-pointer transition-all duration-300 hover:scale-105 active:scale-95 select-none"
                                    style="background: linear-gradient(135deg, rgba(59,130,246,0.22) 0%, rgba(59,130,246,0.09) 100%); border: 2px solid rgba(59,130,246,0.4);">
                                    <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 2a3 3 0 00-3 3v7a3 3 0 006 0V5a3 3 0 00-3-3z"/>
                                        <path d="M19 10v2a7 7 0 01-14 0v-2"/>
                                        <line x1="12" y1="19" x2="12" y2="23"/>
                                        <line x1="8"  y1="23" x2="16" y2="23"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Voice waveform -->
                        <div id="voice-waveform" class="flex items-end justify-center gap-[3.5px] mb-7" style="height: 36px;">
                            <div class="vw-bar" style="animation-delay:0.00s;animation-duration:0.85s;"></div>
                            <div class="vw-bar" style="animation-delay:0.07s;animation-duration:1.10s;"></div>
                            <div class="vw-bar" style="animation-delay:0.14s;animation-duration:0.78s;"></div>
                            <div class="vw-bar" style="animation-delay:0.21s;animation-duration:1.25s;"></div>
                            <div class="vw-bar" style="animation-delay:0.06s;animation-duration:0.92s;"></div>
                            <div class="vw-bar" style="animation-delay:0.28s;animation-duration:1.05s;"></div>
                            <div class="vw-bar" style="animation-delay:0.13s;animation-duration:0.70s;"></div>
                            <div class="vw-bar" style="animation-delay:0.35s;animation-duration:1.30s;"></div>
                            <div class="vw-bar" style="animation-delay:0.04s;animation-duration:0.95s;"></div>
                            <div class="vw-bar" style="animation-delay:0.42s;animation-duration:0.80s;"></div>
                            <div class="vw-bar" style="animation-delay:0.19s;animation-duration:1.15s;"></div>
                            <div class="vw-bar" style="animation-delay:0.49s;animation-duration:0.68s;"></div>
                            <div class="vw-bar" style="animation-delay:0.08s;animation-duration:1.35s;"></div>
                            <div class="vw-bar" style="animation-delay:0.56s;animation-duration:0.90s;"></div>
                            <div class="vw-bar" style="animation-delay:0.25s;animation-duration:1.00s;"></div>
                            <div class="vw-bar" style="animation-delay:0.63s;animation-duration:0.75s;"></div>
                            <div class="vw-bar" style="animation-delay:0.11s;animation-duration:1.20s;"></div>
                            <div class="vw-bar" style="animation-delay:0.38s;animation-duration:0.88s;"></div>
                            <div class="vw-bar" style="animation-delay:0.70s;animation-duration:1.08s;"></div>
                            <div class="vw-bar" style="animation-delay:0.17s;animation-duration:0.73s;"></div>
                            <div class="vw-bar" style="animation-delay:0.44s;animation-duration:1.18s;"></div>
                            <div class="vw-bar" style="animation-delay:0.03s;animation-duration:0.82s;"></div>
                            <div class="vw-bar" style="animation-delay:0.51s;animation-duration:1.40s;"></div>
                            <div class="vw-bar" style="animation-delay:0.22s;animation-duration:0.66s;"></div>
                            <div class="vw-bar" style="animation-delay:0.60s;animation-duration:0.98s;"></div>
                            <div class="vw-bar" style="animation-delay:0.09s;animation-duration:1.12s;"></div>
                        </div>

                        <!-- Transcript glass card -->
                        <div class="rounded-xl p-4 mb-5" style="background: rgba(59,130,246,0.05); border: 1px solid rgba(59,130,246,0.16);">
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-7 h-7 rounded-lg flex items-center justify-center mt-0.5"
                                     style="background: rgba(59,130,246,0.15); border: 1px solid rgba(59,130,246,0.28);">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 2a3 3 0 00-3 3v7a3 3 0 006 0V5a3 3 0 00-3-3z"/>
                                        <path d="M19 10v2a7 7 0 01-14 0v-2"/>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="text-[10px] font-bold text-blue-400 tracking-[0.14em] uppercase mb-1.5">Detected Speech</div>
                                    <div class="text-white text-[18px] font-semibold leading-snug">
                                        "Airport to City Center"<span class="cursor-blink text-blue-400 ml-0.5 font-light">|</span>
                                    </div>
                                    <!-- Confidence bar -->
                                    <div class="flex items-center gap-2 mt-2.5">
                                        <span class="text-[11px] text-gray-600 flex-shrink-0">Confidence</span>
                                        <div class="flex-1 h-[3px] rounded-full" style="background: rgba(255,255,255,0.06);">
                                            <div class="h-full rounded-full" style="width: 96%; background: linear-gradient(90deg, #3B82F6, #60a5fa);"></div>
                                        </div>
                                        <span class="text-[11px] text-blue-400 font-bold flex-shrink-0">96%</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- AI processing checks -->
                        <div class="space-y-2 mb-6">
                            <div class="flex items-center gap-2.5">
                                <div class="flex-shrink-0 w-4 h-4 rounded-full flex items-center justify-center" style="background: rgba(59,130,246,0.15);">
                                    <svg width="8" height="8" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                </div>
                                <span class="text-[12px] text-gray-500">Route analyzed: <span class="text-gray-300">Airport Terminal &rarr; City Center Â· 14.2 km</span></span>
                            </div>
                            <div class="flex items-center gap-2.5">
                                <div class="flex-shrink-0 w-4 h-4 rounded-full flex items-center justify-center" style="background: rgba(59,130,246,0.15);">
                                    <svg width="8" height="8" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                </div>
                                <span class="text-[12px] text-gray-500">Fleet queried: <span class="text-gray-300">3 vehicles available nearby</span></span>
                            </div>
                            <div class="flex items-center gap-2.5">
                                <div class="flex-shrink-0 w-4 h-4 rounded-full flex items-center justify-center" style="background: rgba(59,130,246,0.15);">
                                    <svg width="8" height="8" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                </div>
                                <span class="text-[12px] text-gray-500">Pricing computed: <span class="text-gray-300">Dynamic rates applied</span></span>
                            </div>
                        </div>

                        <!-- Try saying chips -->
                        <div>
                            <div class="text-[10.5px] text-gray-600 font-semibold tracking-[0.12em] uppercase mb-2.5">Try saying</div>
                            <div class="flex flex-wrap gap-2">
                                <span class="vs-chip text-[12px] text-gray-400 px-3 py-1.5 rounded-lg select-none" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08);">"Hotel to Downtown"</span>
                                <span class="vs-chip text-[12px] text-gray-400 px-3 py-1.5 rounded-lg select-none" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08);">"JFK to Manhattan"</span>
                                <span class="vs-chip text-[12px] text-gray-400 px-3 py-1.5 rounded-lg select-none" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08);">"Pick me up at Hilton"</span>
                            </div>
                        </div>

                    </div><!-- /panel body -->
                </div><!-- /panel -->
            </div><!-- /LEFT -->

            <!-- â•”â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•—
                 â•‘  RIGHT: RESULTS   â•‘
                 â•šâ•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
            <div class="flex flex-col gap-4">

                <!-- Results header -->
                <div class="flex items-center justify-between mb-1 section-fade" style="transition-delay: 0.1s">
                    <div>
                        <div class="text-white font-bold text-[17px]">Available Now</div>
                        <div class="text-gray-500 text-[12.5px] mt-0.5">3 vehicles Â· Airport &rarr; City Center Â· Tonight</div>
                    </div>
                    <div class="flex items-center gap-1.5 px-3 py-1.5 rounded-full flex-shrink-0"
                         style="background: rgba(59,130,246,0.07); border: 1px solid rgba(59,130,246,0.18);">
                        <svg width="10" height="10" viewBox="0 0 24 24" fill="#3B82F6" stroke="none"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        <span class="text-[10.5px] font-semibold text-blue-400">AI Sorted</span>
                    </div>
                </div>

                <!-- â”€â”€ Card 1: Executive Sedan â”€â”€ -->
                <div class="voice-result-card voice-result-reveal p-5" style="transition-delay: 0.25s">
                    <div class="flex items-start gap-4">
                        <!-- Vehicle icon -->
                        <div class="flex-shrink-0 w-[58px] h-[58px] rounded-xl flex items-center justify-center"
                             style="background: rgba(59,130,246,0.07); border: 1px solid rgba(59,130,246,0.14);">
                            <svg width="38" height="22" viewBox="0 0 76 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 28 L14 13 Q20 8 38 8 Q56 8 62 13 L68 28 Q72 28 74 31 L74 35 Q74 37 72 37 L62 37 Q60 37 60 35 L60 33 L16 33 L16 35 Q16 37 14 37 L4 37 Q2 37 2 35 L2 31 Q4 28 8 28Z" fill="rgba(59,130,246,0.13)" stroke="#3B82F6" stroke-width="1.2"/>
                                <circle cx="18" cy="34" r="5" fill="#0d1f3c" stroke="#3B82F6" stroke-width="1.3"/>
                                <circle cx="18" cy="34" r="2" fill="#3B82F6"/>
                                <circle cx="58" cy="34" r="5" fill="#0d1f3c" stroke="#3B82F6" stroke-width="1.3"/>
                                <circle cx="58" cy="34" r="2" fill="#3B82F6"/>
                                <path d="M16 24 L22 13 Q28 9 38 9 Q48 9 54 13 L60 24 Z" fill="rgba(59,130,246,0.08)" stroke="rgba(59,130,246,0.28)" stroke-width="0.9"/>
                                <line x1="38" y1="9" x2="38" y2="24" stroke="rgba(59,130,246,0.2)" stroke-width="0.7"/>
                            </svg>
                        </div>
                        <!-- Info -->
                        <div class="flex-1 min-w-0">
                            <div class="flex items-start justify-between gap-2 mb-1.5">
                                <div>
                                    <h4 class="text-white font-bold text-[14.5px] leading-snug">Executive Sedan</h4>
                                    <p class="text-gray-500 text-[12px] mt-0.5">Mercedes E-Class Â· Up to 3 pax</p>
                                </div>
                                <div class="text-right flex-shrink-0">
                                    <div class="text-white font-black text-[22px] leading-none">$85</div>
                                    <div class="text-gray-600 text-[10px] mt-0.5">flat rate</div>
                                </div>
                            </div>
                            <!-- Meta row -->
                            <div class="flex items-center gap-3 mb-3 flex-wrap">
                                <span class="flex items-center gap-1.5 text-[11.5px] text-gray-400">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.2" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                    ETA 4 min
                                </span>
                                <span class="w-px h-3 bg-white/10"></span>
                                <span class="flex items-center gap-1.5 text-[11.5px] text-gray-400">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.2" stroke-linecap="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                    0.8 mi away
                                </span>
                                <span class="w-px h-3 bg-white/10"></span>
                                <div class="flex items-center gap-1">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="#f59e0b" stroke="none"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                    <span class="text-[11.5px] text-gray-400">4.9</span>
                                </div>
                            </div>
                            <button class="btn-cta w-full flex items-center justify-center gap-2 bg-[#3B82F6] text-white text-[13px] font-semibold px-4 py-2.5 rounded-xl border border-blue-500/30">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                                <span>Book Now Â· $85</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- â”€â”€ Card 2: Premium SUV &mdash; AI Recommended â”€â”€ -->
                <div class="voice-result-card voice-result-reveal p-5" style="transition-delay: 0.40s; border-color: rgba(59,130,246,0.22); background: rgba(59,130,246,0.035);">
                    <!-- AI recommended badge -->
                    <div class="flex items-center justify-between mb-3">
                        <span class="inline-flex items-center gap-1.5 text-[10px] font-bold tracking-[0.14em] uppercase text-blue-300 px-2.5 py-1 rounded-full"
                              style="background: rgba(59,130,246,0.14); border: 1px solid rgba(59,130,246,0.3);">
                            <svg width="9" height="9" viewBox="0 0 24 24" fill="#60a5fa" stroke="none"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            AI Recommended
                        </span>
                        <span class="text-[10.5px] text-gray-600">Best match for your route</span>
                    </div>
                    <div class="flex items-start gap-4">
                        <!-- SUV icon -->
                        <div class="flex-shrink-0 w-[58px] h-[58px] rounded-xl flex items-center justify-center"
                             style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.26);">
                            <svg width="38" height="24" viewBox="0 0 76 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 30 L11 11 Q18 6 38 6 Q58 6 65 11 L70 30 Q73 30 75 33 L75 38 Q75 40 73 40 L63 40 Q61 40 61 38 L61 34 L15 34 L15 38 Q15 40 13 40 L3 40 Q1 40 1 38 L1 33 Q3 30 6 30Z" fill="rgba(59,130,246,0.16)" stroke="#3B82F6" stroke-width="1.2"/>
                                <circle cx="19" cy="36" r="5" fill="#0d1f3c" stroke="#3B82F6" stroke-width="1.3"/>
                                <circle cx="19" cy="36" r="2" fill="#3B82F6"/>
                                <circle cx="57" cy="36" r="5" fill="#0d1f3c" stroke="#3B82F6" stroke-width="1.3"/>
                                <circle cx="57" cy="36" r="2" fill="#3B82F6"/>
                                <path d="M14 25 L19 8 Q24 6 38 6 Q52 6 57 8 L62 25 Z" fill="rgba(59,130,246,0.10)" stroke="rgba(59,130,246,0.32)" stroke-width="0.9"/>
                                <line x1="38" y1="6" x2="38" y2="25" stroke="rgba(59,130,246,0.22)" stroke-width="0.7"/>
                                <line x1="24" y1="6" x2="24" y2="25" stroke="rgba(59,130,246,0.15)" stroke-width="0.6"/>
                                <line x1="52" y1="6" x2="52" y2="25" stroke="rgba(59,130,246,0.15)" stroke-width="0.6"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-start justify-between gap-2 mb-1.5">
                                <div>
                                    <h4 class="text-white font-bold text-[14.5px] leading-snug">Premium SUV</h4>
                                    <p class="text-gray-500 text-[12px] mt-0.5">Cadillac Escalade Â· Up to 6 pax</p>
                                </div>
                                <div class="text-right flex-shrink-0">
                                    <div class="text-white font-black text-[22px] leading-none">$120</div>
                                    <div class="text-gray-600 text-[10px] mt-0.5">flat rate</div>
                                </div>
                            </div>
                            <div class="flex items-center gap-3 mb-3 flex-wrap">
                                <span class="flex items-center gap-1.5 text-[11.5px] text-gray-400">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.2" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                    ETA 7 min
                                </span>
                                <span class="w-px h-3 bg-white/10"></span>
                                <span class="flex items-center gap-1.5 text-[11.5px] text-gray-400">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.2" stroke-linecap="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                    1.2 mi away
                                </span>
                                <span class="w-px h-3 bg-white/10"></span>
                                <div class="flex items-center gap-1">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="#f59e0b" stroke="none"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                    <span class="text-[11.5px] text-gray-400">4.8</span>
                                </div>
                            </div>
                            <button class="btn-cta w-full flex items-center justify-center gap-2 bg-[#3B82F6] text-white text-[13px] font-semibold px-4 py-2.5 rounded-xl border border-blue-500/30">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                                <span>Book Now Â· $120</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- â”€â”€ Card 3: Luxury Van â”€â”€ -->
                <div class="voice-result-card voice-result-reveal p-5" style="transition-delay: 0.55s">
                    <div class="flex items-start gap-4">
                        <!-- Van icon -->
                        <div class="flex-shrink-0 w-[58px] h-[58px] rounded-xl flex items-center justify-center"
                             style="background: rgba(59,130,246,0.07); border: 1px solid rgba(59,130,246,0.14);">
                            <svg width="40" height="22" viewBox="0 0 80 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 28 L4 14 Q4 9 9 9 L50 9 L66 16 L76 24 L76 32 Q76 36 72 36 L64 36 Q62 37 60 36 L18 36 Q16 37 14 36 L8 36 Q4 36 4 32 Z" fill="rgba(59,130,246,0.11)" stroke="#3B82F6" stroke-width="1.2"/>
                                <circle cx="17" cy="34" r="5" fill="#0d1f3c" stroke="#3B82F6" stroke-width="1.3"/>
                                <circle cx="17" cy="34" r="2" fill="#3B82F6"/>
                                <circle cx="63" cy="34" r="5" fill="#0d1f3c" stroke="#3B82F6" stroke-width="1.3"/>
                                <circle cx="63" cy="34" r="2" fill="#3B82F6"/>
                                <!-- Windows -->
                                <rect x="8"  y="11" width="18" height="10" rx="2" fill="rgba(59,130,246,0.13)" stroke="rgba(59,130,246,0.28)" stroke-width="0.8"/>
                                <rect x="29" y="11" width="16" height="10" rx="2" fill="rgba(59,130,246,0.13)" stroke="rgba(59,130,246,0.28)" stroke-width="0.8"/>
                                <!-- Cab window -->
                                <path d="M50 9 L66 16 L76 24 L76 23 L50 9Z" fill="rgba(59,130,246,0.09)" stroke="rgba(59,130,246,0.25)" stroke-width="0.7"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-start justify-between gap-2 mb-1.5">
                                <div>
                                    <h4 class="text-white font-bold text-[14.5px] leading-snug">Luxury Van</h4>
                                    <p class="text-gray-500 text-[12px] mt-0.5">Mercedes Sprinter Â· Up to 8 pax</p>
                                </div>
                                <div class="text-right flex-shrink-0">
                                    <div class="text-white font-black text-[22px] leading-none">$165</div>
                                    <div class="text-gray-600 text-[10px] mt-0.5">flat rate</div>
                                </div>
                            </div>
                            <div class="flex items-center gap-3 mb-3 flex-wrap">
                                <span class="flex items-center gap-1.5 text-[11.5px] text-gray-400">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.2" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                    ETA 12 min
                                </span>
                                <span class="w-px h-3 bg-white/10"></span>
                                <span class="flex items-center gap-1.5 text-[11.5px] text-gray-400">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.2" stroke-linecap="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                    2.1 mi away
                                </span>
                                <span class="w-px h-3 bg-white/10"></span>
                                <div class="flex items-center gap-1">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="#f59e0b" stroke="none"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                    <span class="text-[11.5px] text-gray-400">4.7</span>
                                </div>
                            </div>
                            <button class="w-full flex items-center justify-center gap-2 text-gray-300 hover:text-white text-[13px] font-semibold px-4 py-2.5 rounded-xl border transition-all duration-200 hover:border-white/25 hover:bg-white/[0.04]"
                                    style="border-color: rgba(255,255,255,0.1);">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                                <span>Book Now Â· $165</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Trust footer -->
                <div class="flex items-center justify-center gap-2 mt-1 voice-result-reveal" style="transition-delay: 0.66s">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    <span class="text-[12px] text-gray-600">Secure payment Â· Free cancellation Â· Confirmed in seconds</span>
                </div>

            </div><!-- /RIGHT -->

        </div><!-- /2-col grid -->

    </div><!-- /container -->
</section>
<!-- â•â•â•â• END VOICE SEARCH â•â•â•â• -->


<!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
     SECTION 4 &mdash; AI LIMO CALL AGENT
â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
<section id="ai-call-agent" class="relative py-28 lg:py-36 overflow-hidden" style="background: #0A0A0A;">

    <!-- Grid overlay -->
    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.03) 1px, transparent 1px); background-size: 56px 56px;"></div>

    <!-- Top ambient glow -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[900px] h-[420px] pointer-events-none"
         style="background: radial-gradient(ellipse at 50% 0%, rgba(59,130,246,0.09) 0%, transparent 65%);"></div>

    <!-- Bottom ambient glow -->
    <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[700px] h-[320px] pointer-events-none"
         style="background: radial-gradient(ellipse at 50% 100%, rgba(59,130,246,0.06) 0%, transparent 65%);"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">

        <!-- Section header -->
        <div class="text-center mb-16 lg:mb-22 ai-call-fade">
            <div class="inline-flex items-center gap-2.5 px-4 py-2 rounded-full mb-7"
                 style="background: rgba(59,130,246,0.07); border: 1px solid rgba(59,130,246,0.18);">
                <div class="w-1.5 h-1.5 rounded-full bg-blue-400" style="box-shadow: 0 0 6px #3B82F6; animation: ai-pulse 1.4s ease-in-out infinite;"></div>
                <span class="text-[11px] font-bold text-blue-400 tracking-[0.16em] uppercase">AI Voice Agent</span>
            </div>
            <h2 class="text-[36px] sm:text-[48px] lg:text-[58px] font-black text-white leading-[1.06] tracking-tight mb-6">
                Fire your dispatcher.<br class="hidden sm:block">
                <span style="background: linear-gradient(135deg, #3B82F6 30%, #93c5fd); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Your AI never sleeps.</span>
            </h2>
            <p class="text-gray-400 text-[17px] leading-relaxed max-w-2xl mx-auto">
                Every call answered instantly &mdash; 2 AM, Christmas morning, every weekend. The AI collects trip details, quotes real-time pricing, checks availability, and confirms bookings automatically. No human delays. No missed bookings. No staff dependency. Your operation runs 24/7 on autopilot.
            </p>
        </div>

        <!-- 2-col layout -->
        <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">

            <!-- â”€â”€ LEFT: Step-by-step flow â”€â”€ -->
            <div class="ai-call-left-reveal">
                <div class="flex flex-col gap-0">

                    <!-- Step 1 -->
                    <div class="ai-step-item flex items-start gap-5 group">
                        <div class="flex flex-col items-center flex-shrink-0">
                            <div class="ai-step-icon w-12 h-12 rounded-xl flex items-center justify-center transition-all duration-300"
                                 style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.2);">
                                <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 10.8 19.79 19.79 0 01.01 2.18 2 2 0 012 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z"/>
                                </svg>
                            </div>
                            <div class="w-px flex-1 min-h-[36px] my-2" style="background: linear-gradient(to bottom, rgba(59,130,246,0.28), rgba(59,130,246,0.05));"></div>
                        </div>
                        <div class="pb-6 pt-1">
                            <h3 class="text-white font-bold text-[17px] mb-1.5 group-hover:text-blue-300 transition-colors duration-200">Customer Calls In</h3>
                            <p class="text-gray-500 text-[14px] leading-relaxed">Your AI agent answers every call instantly &mdash; 24/7, no hold music, no waiting. Fully branded to your company.</p>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="ai-step-item flex items-start gap-5 group">
                        <div class="flex flex-col items-center flex-shrink-0">
                            <div class="ai-step-icon w-12 h-12 rounded-xl flex items-center justify-center transition-all duration-300"
                                 style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.2);">
                                <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/>
                                </svg>
                            </div>
                            <div class="w-px flex-1 min-h-[36px] my-2" style="background: linear-gradient(to bottom, rgba(59,130,246,0.28), rgba(59,130,246,0.05));"></div>
                        </div>
                        <div class="pb-6 pt-1">
                            <h3 class="text-white font-bold text-[17px] mb-1.5 group-hover:text-blue-300 transition-colors duration-200">Collects Trip Details</h3>
                            <p class="text-gray-500 text-[14px] leading-relaxed">Pickup location, drop-off address, date, time, and passenger count &mdash; gathered naturally through conversation.</p>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="ai-step-item flex items-start gap-5 group">
                        <div class="flex flex-col items-center flex-shrink-0">
                            <div class="ai-step-icon w-12 h-12 rounded-xl flex items-center justify-center transition-all duration-300"
                                 style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.2);">
                                <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/>
                                </svg>
                            </div>
                            <div class="w-px flex-1 min-h-[36px] my-2" style="background: linear-gradient(to bottom, rgba(59,130,246,0.28), rgba(59,130,246,0.05));"></div>
                        </div>
                        <div class="pb-6 pt-1">
                            <h3 class="text-white font-bold text-[17px] mb-1.5 group-hover:text-blue-300 transition-colors duration-200">Instant Pricing Quote</h3>
                            <p class="text-gray-500 text-[14px] leading-relaxed">AI calculates the exact fare and presents clear pricing options &mdash; sedan, SUV, stretch, or whatever your fleet offers.</p>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="ai-step-item flex items-start gap-5 group">
                        <div class="flex flex-col items-center flex-shrink-0">
                            <div class="ai-step-icon w-12 h-12 rounded-xl flex items-center justify-center transition-all duration-300"
                                 style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.2);">
                                <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                                </svg>
                            </div>
                            <div class="w-px flex-1 min-h-[36px] my-2" style="background: linear-gradient(to bottom, rgba(59,130,246,0.28), rgba(59,130,246,0.05));"></div>
                        </div>
                        <div class="pb-6 pt-1">
                            <h3 class="text-white font-bold text-[17px] mb-1.5 group-hover:text-blue-300 transition-colors duration-200">Live Availability Check</h3>
                            <p class="text-gray-500 text-[14px] leading-relaxed">Connects to your fleet in real-time and confirms exactly which vehicles are free for the requested date and time.</p>
                        </div>
                    </div>

                    <!-- Step 5 &mdash; final, no connector line -->
                    <div class="ai-step-item flex items-start gap-5 group">
                        <div class="flex-shrink-0">
                            <div class="ai-step-icon w-12 h-12 rounded-xl flex items-center justify-center transition-all duration-300"
                                 style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.32); box-shadow: 0 0 22px rgba(59,130,246,0.18);">
                                <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"/>
                                </svg>
                            </div>
                        </div>
                        <div class="pt-1">
                            <h3 class="text-white font-bold text-[17px] mb-1.5 group-hover:text-blue-300 transition-colors duration-200">Booking Confirmed Automatically</h3>
                            <p class="text-gray-500 text-[14px] leading-relaxed">Booking created, driver notified, SMS confirmation sent to the customer &mdash; all before the call ends.</p>
                        </div>
                    </div>

                </div>
            </div><!-- /LEFT -->

            <!-- â”€â”€ RIGHT: Call UI mockup â”€â”€ -->
            <div class="ai-call-right-reveal">
                <div class="relative">

                    <!-- Outer glow halo -->
                    <div class="absolute -inset-6 rounded-3xl pointer-events-none" style="background: radial-gradient(ellipse at 50% 50%, rgba(59,130,246,0.12) 0%, transparent 68%);"></div>

                    <!-- Call card -->
                    <div class="ai-call-card relative rounded-2xl overflow-hidden"
                         style="background: rgba(12,12,20,0.98); border: 1px solid rgba(255,255,255,0.07); box-shadow: 0 32px 80px rgba(0,0,0,0.6), 0 0 0 1px rgba(59,130,246,0.05);">

                        <!-- â”€â”€ Call header â”€â”€ -->
                        <div class="px-5 py-4 flex items-center justify-between"
                             style="background: rgba(59,130,246,0.04); border-bottom: 1px solid rgba(255,255,255,0.06);">
                            <div class="flex items-center gap-3">
                                <!-- AI avatar -->
                                <div class="relative w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0"
                                     style="background: linear-gradient(135deg, #1d4ed8, #3B82F6); box-shadow: 0 0 18px rgba(59,130,246,0.45);">
                                    <svg width="17" height="17" viewBox="0 0 24 24" fill="white" stroke="none">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15v-4H7l5-8v4h4l-5 8z"/>
                                    </svg>
                                    <!-- Live dot -->
                                    <div class="absolute -top-0.5 -right-0.5 w-3 h-3 rounded-full bg-green-400 border-2 border-[#0c0c14]"
                                         style="animation: ai-pulse 1.4s ease-in-out infinite;"></div>
                                </div>
                                <div>
                                    <div class="text-white font-bold text-[14px] leading-none mb-1">LimoAgent AI</div>
                                    <div class="flex items-center gap-1.5">
                                        <div class="w-1.5 h-1.5 rounded-full bg-green-400"
                                             style="animation: ai-pulse 1.4s ease-in-out infinite 0.2s;"></div>
                                        <span class="text-green-400 text-[10.5px] font-bold tracking-widest uppercase">Live Call</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Duration + end-call -->
                            <div class="flex items-center gap-3">
                                <div id="ai-call-duration" class="text-[12.5px] font-mono text-gray-400 tabular-nums">0:42</div>
                                <button class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0 transition-all duration-200"
                                        style="background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.22);"
                                        onmouseenter="this.style.background='rgba(239,68,68,0.2)'"
                                        onmouseleave="this.style.background='rgba(239,68,68,0.1)'"
                                        title="End call">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2.3" stroke-linecap="round">
                                        <path d="M10.68 13.31a16 16 0 003.41 2.6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 10.8 19.79 19.79 0 01.01 2.18 2 2 0 012 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91"/>
                                        <line x1="23" y1="1" x2="1" y2="23"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- â”€â”€ Conversation â”€â”€ -->
                        <div id="ai-chat-area" class="px-5 py-5 flex flex-col gap-3.5 overflow-hidden" style="min-height: 360px;">

                            <!-- AI: greeting -->
                            <div class="flex items-end gap-2.5 ai-bubble-reveal" style="transition-delay: 0.05s">
                                <div class="w-7 h-7 rounded-full flex-shrink-0 flex items-center justify-center"
                                     style="background: linear-gradient(135deg, #1d4ed8, #3B82F6);">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="white"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15v-4H7l5-8v4h4l-5 8z"/></svg>
                                </div>
                                <div class="max-w-[80%]">
                                    <div class="px-4 py-3 rounded-2xl rounded-bl-sm text-[13px] text-white leading-relaxed"
                                         style="background: rgba(59,130,246,0.09); border: 1px solid rgba(59,130,246,0.16);">
                                        Hello! Thank you for calling. I'm your AI booking agent. Where would you like to be picked up today?
                                    </div>
                                    <div class="text-[10px] text-gray-600 mt-1 ml-1">LimoAgent Â· just now</div>
                                </div>
                            </div>

                            <!-- Customer: pickup request -->
                            <div class="flex items-end justify-end gap-2.5 ai-bubble-reveal" style="transition-delay: 0.22s">
                                <div class="max-w-[74%]">
                                    <div class="px-4 py-3 rounded-2xl rounded-br-sm text-[13px] text-white leading-relaxed"
                                         style="background: rgba(255,255,255,0.055); border: 1px solid rgba(255,255,255,0.09);">
                                        JFK Airport, Terminal 4. I need a ride to Midtown Manhattan tonight at 9 PM.
                                    </div>
                                    <div class="text-[10px] text-gray-600 mt-1 mr-1 text-right">Customer</div>
                                </div>
                                <div class="w-7 h-7 rounded-full flex-shrink-0 flex items-center justify-center"
                                     style="background: rgba(255,255,255,0.055); border: 1px solid rgba(255,255,255,0.09);">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.45)" stroke-width="2" stroke-linecap="round"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                </div>
                            </div>

                            <!-- AI: pricing + availability -->
                            <div class="flex items-end gap-2.5 ai-bubble-reveal" style="transition-delay: 0.44s">
                                <div class="w-7 h-7 rounded-full flex-shrink-0 flex items-center justify-center"
                                     style="background: linear-gradient(135deg, #1d4ed8, #3B82F6);">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="white"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15v-4H7l5-8v4h4l-5 8z"/></svg>
                                </div>
                                <div class="max-w-[84%]">
                                    <div class="px-4 py-3 rounded-2xl rounded-bl-sm text-[13px] text-white leading-relaxed"
                                         style="background: rgba(59,130,246,0.09); border: 1px solid rgba(59,130,246,0.16);">
                                        Got it! Checking availability for 9 PM JFK &rarr; Midtown&hellip;
                                        <!-- Pricing card inside bubble -->
                                        <div class="mt-3 rounded-xl overflow-hidden"
                                             style="background: rgba(59,130,246,0.07); border: 1px solid rgba(59,130,246,0.16);">
                                            <div class="px-3.5 py-2.5 flex items-center justify-between hover:bg-white/5 transition-colors cursor-default">
                                                <div>
                                                    <div class="text-white font-semibold text-[12.5px]">Executive Sedan</div>
                                                    <div class="text-gray-500 text-[10.5px] mt-0.5">Mercedes E-Class Â· up to 3 pax</div>
                                                </div>
                                                <div class="text-white font-black text-[18px]">$95</div>
                                            </div>
                                            <div class="h-px" style="background: rgba(255,255,255,0.05);"></div>
                                            <div class="px-3.5 py-2.5 flex items-center justify-between hover:bg-white/5 transition-colors cursor-default">
                                                <div>
                                                    <div class="text-white font-semibold text-[12.5px]">Luxury SUV</div>
                                                    <div class="text-gray-500 text-[10.5px] mt-0.5">Cadillac Escalade Â· up to 6 pax</div>
                                                </div>
                                                <div class="text-white font-black text-[18px]">$135</div>
                                            </div>
                                            <div class="h-px" style="background: rgba(255,255,255,0.05);"></div>
                                            <div class="px-3.5 py-2 flex items-center gap-1.5">
                                                <div class="w-1.5 h-1.5 rounded-full bg-green-400"
                                                     style="animation: ai-pulse 1.2s ease-in-out infinite;"></div>
                                                <span class="text-green-400 text-[10.5px] font-semibold">3 vehicles available tonight</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-[10px] text-gray-600 mt-1 ml-1">LimoAgent Â· just now</div>
                                </div>
                            </div>

                            <!-- Customer: confirm -->
                            <div class="flex items-end justify-end gap-2.5 ai-bubble-reveal" style="transition-delay: 0.62s">
                                <div class="max-w-[68%]">
                                    <div class="px-4 py-3 rounded-2xl rounded-br-sm text-[13px] text-white leading-relaxed"
                                         style="background: rgba(255,255,255,0.055); border: 1px solid rgba(255,255,255,0.09);">
                                        The sedan sounds perfect. Go ahead and book it.
                                    </div>
                                </div>
                                <div class="w-7 h-7 rounded-full flex-shrink-0 flex items-center justify-center"
                                     style="background: rgba(255,255,255,0.055); border: 1px solid rgba(255,255,255,0.09);">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.45)" stroke-width="2" stroke-linecap="round"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                </div>
                            </div>

                            <!-- AI: booking confirmed -->
                            <div class="flex items-end gap-2.5 ai-bubble-reveal" style="transition-delay: 0.82s">
                                <div class="w-7 h-7 rounded-full flex-shrink-0 flex items-center justify-center"
                                     style="background: linear-gradient(135deg, #1d4ed8, #3B82F6);">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="white"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15v-4H7l5-8v4h4l-5 8z"/></svg>
                                </div>
                                <div class="max-w-[84%]">
                                    <div class="px-4 py-3.5 rounded-2xl rounded-bl-sm text-[13px] text-white leading-relaxed"
                                         style="background: rgba(59,130,246,0.09); border: 1px solid rgba(59,130,246,0.16);">
                                        <div class="flex items-center gap-2 mb-2.5">
                                            <div class="w-5 h-5 rounded-full bg-green-500 flex items-center justify-center flex-shrink-0"
                                                 style="box-shadow: 0 0 10px rgba(34,197,94,0.4);">
                                                <svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                            </div>
                                            <span class="text-green-400 font-bold text-[13px] tracking-wide">Booking Confirmed!</span>
                                        </div>
                                        Executive Sedan booked for tonight at 9:00 PM. Your driver will arrive 5 minutes early. Confirmation SMS sent to your phone!
                                    </div>
                                </div>
                            </div>

                        </div><!-- /conversation -->

                        <!-- â”€â”€ Waveform + controls â”€â”€ -->
                        <div class="px-5 pb-5 pt-3" style="border-top: 1px solid rgba(255,255,255,0.05);">

                            <!-- Active call waveform -->
                            <div id="ai-call-waveform" class="flex items-center justify-center gap-[3.5px] mb-4" style="height: 30px;"></div>

                            <!-- Control buttons -->
                            <div class="flex items-center justify-center gap-4">

                                <!-- Mute button -->
                                <button class="w-11 h-11 rounded-full flex items-center justify-center transition-all duration-200"
                                        style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.09);"
                                        onmouseenter="this.style.background='rgba(255,255,255,0.1)'; this.style.borderColor='rgba(255,255,255,0.15)'"
                                        onmouseleave="this.style.background='rgba(255,255,255,0.05)'; this.style.borderColor='rgba(255,255,255,0.09)'"
                                        title="Mute">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.45)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 1a3 3 0 00-3 3v8a3 3 0 006 0V4a3 3 0 00-3-3z"/>
                                        <path d="M19 10v2a7 7 0 01-14 0v-2"/>
                                        <line x1="12" y1="19" x2="12" y2="23"/>
                                        <line x1="8" y1="23" x2="16" y2="23"/>
                                    </svg>
                                </button>

                                <!-- End call (large red) -->
                                <button id="ai-end-call-btn"
                                        class="w-[58px] h-[58px] rounded-full flex items-center justify-center transition-all duration-200"
                                        style="background: linear-gradient(135deg, #dc2626, #ef4444); box-shadow: 0 0 24px rgba(239,68,68,0.35);"
                                        onmouseenter="this.style.boxShadow='0 0 36px rgba(239,68,68,0.55)'; this.style.transform='scale(1.07)'"
                                        onmouseleave="this.style.boxShadow='0 0 24px rgba(239,68,68,0.35)'; this.style.transform='scale(1)'"
                                        title="End call">
                                    <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M10.68 13.31a16 16 0 003.41 2.6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 10.8 19.79 19.79 0 01.01 2.18 2 2 0 012 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91"/>
                                        <line x1="23" y1="1" x2="1" y2="23"/>
                                    </svg>
                                </button>

                                <!-- Speaker button -->
                                <button class="w-11 h-11 rounded-full flex items-center justify-center transition-all duration-200"
                                        style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.09);"
                                        onmouseenter="this.style.background='rgba(255,255,255,0.1)'; this.style.borderColor='rgba(255,255,255,0.15)'"
                                        onmouseleave="this.style.background='rgba(255,255,255,0.05)'; this.style.borderColor='rgba(255,255,255,0.09)'"
                                        title="Speaker">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.45)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"/>
                                        <path d="M19.07 4.93a10 10 0 010 14.14"/>
                                        <path d="M15.54 8.46a5 5 0 010 7.07"/>
                                    </svg>
                                </button>

                            </div>
                        </div>

                    </div><!-- /call card -->
                </div>
            </div><!-- /RIGHT -->

        </div><!-- /2-col grid -->

        <!-- WhatsApp nudge below AI agent section -->
        <div class="mt-16 text-center section-fade" style="transition-delay: 0.3s">
            <p class="text-gray-500 text-[14px] mb-4">Want to see the AI agent in action? Watch a live demo on WhatsApp.</p>
            <a href="https://wa.me/923460820722?text=Hi%2C%20I%27m%20interested%20in%20LimoSchedule.%20Can%20you%20show%20me%20a%20live%20demo%3F" target="_blank" rel="noopener"
               class="wa-hero-cta inline-flex items-center gap-2.5 font-bold px-7 py-3.5 rounded-xl text-[14px] text-white"
               style="background: linear-gradient(135deg, #16a34a, #22c55e); animation: wa-pulse-glow 2.5s ease-in-out infinite;">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M11.99 0C5.376 0 0 5.373 0 11.988c0 2.104.549 4.14 1.595 5.945L0 24l6.335-1.652A11.981 11.981 0 0011.99 24C18.604 24 24 18.627 24 12.012 24 5.373 18.604 0 11.99 0zm.01 21.823a9.886 9.886 0 01-5.03-1.372l-.362-.214-3.762.981.999-3.649-.235-.374a9.837 9.837 0 01-1.511-5.195c0-5.452 4.443-9.893 9.901-9.893 5.452 0 9.895 4.441 9.895 9.893 0 5.452-4.443 9.823-9.895 9.823z"/></svg>
                Get Instant Demo on WhatsApp
            </a>
        </div>

    </div><!-- /container -->
</section>
<!-- â•â•â•â• END AI CALL AGENT â•â•â•â• -->


<!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
     SECTION &mdash; ADMIN PANEL SHOWCASE
â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
<section id="admin-panel" class="relative py-28 overflow-hidden">

    <!-- Background -->
    <div class="absolute inset-0 pointer-events-none" style="background: radial-gradient(ellipse 80% 50% at 50% 0%, rgba(59,130,246,0.055) 0%, transparent 65%);"></div>
    <div class="absolute inset-0 pointer-events-none" style="background: radial-gradient(ellipse 50% 35% at 15% 85%, rgba(59,130,246,0.04) 0%, transparent 60%);"></div>

    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 relative">

        <!-- â”€â”€ Section Header â”€â”€ -->
        <div class="text-center mb-14">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-[12px] font-semibold tracking-[0.1em] uppercase text-blue-400 mb-6"
                 style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.2);">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/>
                </svg>
                Enterprise Admin Panel
            </div>
            <h2 class="text-4xl sm:text-5xl font-bold text-white tracking-tight leading-tight mb-5">
                Complete Control.<br class="hidden sm:block"> Zero Limitations.
            </h2>
            <p class="text-lg text-gray-400 max-w-2xl mx-auto leading-relaxed">
                A fully-featured operations dashboard &mdash; manage bookings, fleet, pricing,
                analytics and your entire team from one powerful interface. Fully yours, fully branded.
            </p>
        </div>

        <!-- â”€â”€ Tab Navigation â”€â”€ -->
        <div class="flex items-center justify-center mb-8 overflow-x-auto pb-1">
            <div class="flex items-center gap-1 p-1 rounded-xl flex-shrink-0"
                 style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">
                <button class="admin-tab active-tab" data-panel="ap-dashboard">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
                    Dashboard
                </button>
                <button class="admin-tab" data-panel="ap-bookings">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="1"/><line x1="9" y1="12" x2="15" y2="12"/><line x1="9" y1="16" x2="13" y2="16"/></svg>
                    Bookings
                </button>
                <button class="admin-tab" data-panel="ap-fleet">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 17H3a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v3"/><circle cx="16" cy="19" r="2"/><circle cx="9" cy="19" r="2"/><path d="M21 19h2v-6l-3-4H7v9M7 19h2"/></svg>
                    Fleet
                </button>
                <button class="admin-tab" data-panel="ap-pricing">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg>
                    Pricing
                </button>
                <button class="admin-tab" data-panel="ap-analytics">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
                    Analytics
                </button>
                <button class="admin-tab" data-panel="ap-team">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
                    Team
                </button>
            </div>
        </div>

        <!-- â”€â”€ Browser Frame Wrapper (horizontal scroll on mobile) â”€â”€ -->
        <div class="overflow-x-auto rounded-2xl" style="box-shadow: 0 40px 100px rgba(0,0,0,0.55), 0 0 0 1px rgba(59,130,246,0.06);">
        <div class="min-w-[900px] rounded-2xl overflow-hidden" style="background: rgba(12,12,12,0.95); border: 1px solid rgba(255,255,255,0.08); box-shadow: inset 0 1px 0 rgba(255,255,255,0.06);">

            <!-- Browser Chrome Bar -->
            <div class="flex items-center gap-3 px-4 py-3" style="background: rgba(255,255,255,0.025); border-bottom: 1px solid rgba(255,255,255,0.06);">
                <div class="flex items-center gap-1.5 flex-shrink-0">
                    <div class="w-3 h-3 rounded-full" style="background: #FF5F57;"></div>
                    <div class="w-3 h-3 rounded-full" style="background: #FFBD2E;"></div>
                    <div class="w-3 h-3 rounded-full" style="background: #28C840;"></div>
                </div>
                <div class="flex-1 flex justify-center">
                    <div class="flex items-center gap-2 px-4 py-1.5 rounded-lg text-[11.5px] text-gray-500 max-w-xs w-full"
                         style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">
                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.3)" stroke-width="2" stroke-linecap="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        yourbrand.com/admin/dashboard
                    </div>
                </div>
                <div class="flex-shrink-0">
                    <div class="flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-[11px] font-semibold text-green-400"
                         style="background: rgba(34,197,94,0.08); border: 1px solid rgba(34,197,94,0.15);">
                        <div class="w-1.5 h-1.5 rounded-full bg-green-400 admin-live-dot"></div>
                        Live
                    </div>
                </div>
            </div>

            <!-- Admin App: Sidebar + Main -->
            <div class="flex" style="height: 580px;">

                <!-- â”€â”€â”€ Sidebar â”€â”€â”€ -->
                <div class="flex-shrink-0 flex flex-col" style="width: 196px; background: rgba(7,7,7,0.98); border-right: 1px solid rgba(255,255,255,0.05);">

                    <!-- Brand mark -->
                    <div class="flex items-center gap-2.5 px-4 py-4" style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                        <div class="w-7 h-7 rounded-lg flex items-center justify-center flex-shrink-0" style="background: linear-gradient(135deg, #1d4ed8, #3B82F6);">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                        </div>
                        <div>
                            <div class="text-[12px] font-bold text-white leading-none">LimoAdmin</div>
                            <div class="text-[10px] text-gray-500 mt-0.5">v2.4 Enterprise</div>
                        </div>
                    </div>

                    <!-- Nav -->
                    <nav class="flex-1 px-2.5 py-3 flex flex-col gap-0.5">
                        <div class="sidebar-nav-item active-nav" data-nav="ap-dashboard">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
                            <span>Dashboard</span>
                        </div>
                        <div class="sidebar-nav-item" data-nav="ap-bookings">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="1"/><line x1="9" y1="12" x2="15" y2="12"/><line x1="9" y1="16" x2="13" y2="16"/></svg>
                            <span>Bookings</span>
                            <span class="ml-auto text-[10px] px-1.5 py-0.5 rounded-full font-bold" style="background: rgba(59,130,246,0.2); color: #60a5fa;">12</span>
                        </div>
                        <div class="sidebar-nav-item" data-nav="ap-fleet">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M5 17H3a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v3"/><circle cx="16" cy="19" r="2"/><circle cx="9" cy="19" r="2"/><path d="M21 19h2v-6l-3-4H7v9M7 19h2"/></svg>
                            <span>Fleet</span>
                        </div>
                        <div class="sidebar-nav-item" data-nav="ap-pricing">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg>
                            <span>Pricing</span>
                        </div>
                        <div class="sidebar-nav-item" data-nav="ap-analytics">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
                            <span>Analytics</span>
                        </div>
                        <div class="sidebar-nav-item" data-nav="ap-team">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
                            <span>Team</span>
                        </div>
                        <div class="mt-2 pt-2" style="border-top: 1px solid rgba(255,255,255,0.05);">
                            <div class="sidebar-nav-item">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="3"/><path d="M19.07 4.93l-1.41 1.41M22 12h-2M19.07 19.07l-1.41-1.41M12 22v-2M4.93 19.07l1.41-1.41M2 12h2M4.93 4.93l1.41 1.41M12 2v2"/></svg>
                                <span>Settings</span>
                            </div>
                        </div>
                    </nav>

                    <!-- User -->
                    <div class="px-3 py-3 flex items-center gap-2.5" style="border-top: 1px solid rgba(255,255,255,0.05);">
                        <div class="w-7 h-7 rounded-full flex items-center justify-center flex-shrink-0 text-[11px] font-bold text-white" style="background: linear-gradient(135deg, #1d4ed8, #3B82F6);">A</div>
                        <div class="min-w-0">
                            <div class="text-[11.5px] font-semibold text-white truncate">Admin</div>
                            <div class="text-[10px] text-gray-500 truncate">Super Admin</div>
                        </div>
                    </div>
                </div><!-- /sidebar -->

                <!-- â”€â”€â”€ Main Content â”€â”€â”€ -->
                <div class="flex-1 flex flex-col overflow-hidden" style="background: rgba(10,10,12,0.99);">

                    <!-- Top Bar -->
                    <div class="flex items-center justify-between px-5 py-3 flex-shrink-0" style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                        <div class="ap-page-title text-[14px] font-bold text-white">Overview</div>
                        <div class="flex items-center gap-3">
                            <div class="flex items-center gap-2 px-3 py-1.5 rounded-lg text-[11.5px] text-gray-500"
                                 style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">
                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                                Search...
                            </div>
                            <div class="relative w-7 h-7 rounded-lg flex items-center justify-center"
                                 style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.5)" stroke-width="2" stroke-linecap="round"><path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 01-3.46 0"/></svg>
                                <div class="absolute top-1 right-1 w-2 h-2 rounded-full bg-blue-500" style="border: 1.5px solid rgba(10,10,12,0.99);"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Scrollable Panel Area -->
                    <div class="flex-1 overflow-y-auto admin-content-scroll">

                        <!-- â•â•â•â• DASHBOARD PANEL â•â•â•â• -->
                        <div id="ap-dashboard" class="admin-panel p-5 space-y-4">

                            <!-- KPI Cards -->
                            <div class="grid grid-cols-4 gap-3">

                                <div class="admin-kpi-card p-4 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="flex items-center justify-between mb-3">
                                        <div class="text-[11px] text-gray-500 font-medium">Total Revenue</div>
                                        <div class="w-6 h-6 rounded-lg flex items-center justify-center" style="background: rgba(59,130,246,0.1);">
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.2" stroke-linecap="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg>
                                        </div>
                                    </div>
                                    <div class="text-[20px] font-bold text-white mb-1.5">$48,290</div>
                                    <div class="flex items-center gap-1 text-[10.5px] text-green-400">
                                        <svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="18 15 12 9 6 15"/></svg>
                                        +12.4% this month
                                    </div>
                                </div>

                                <div class="admin-kpi-card p-4 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="flex items-center justify-between mb-3">
                                        <div class="text-[11px] text-gray-500 font-medium">Active Bookings</div>
                                        <div class="w-6 h-6 rounded-lg flex items-center justify-center" style="background: rgba(59,130,246,0.1);">
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.2" stroke-linecap="round"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="1"/></svg>
                                        </div>
                                    </div>
                                    <div class="text-[20px] font-bold text-white mb-1.5">247</div>
                                    <div class="flex items-center gap-1 text-[10.5px] text-green-400">
                                        <svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="18 15 12 9 6 15"/></svg>
                                        +8 since yesterday
                                    </div>
                                </div>

                                <div class="admin-kpi-card p-4 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="flex items-center justify-between mb-3">
                                        <div class="text-[11px] text-gray-500 font-medium">Fleet Utilization</div>
                                        <div class="w-6 h-6 rounded-lg flex items-center justify-center" style="background: rgba(59,130,246,0.1);">
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.2" stroke-linecap="round"><path d="M5 17H3a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v3"/><circle cx="16" cy="19" r="2"/><circle cx="9" cy="19" r="2"/></svg>
                                        </div>
                                    </div>
                                    <div class="text-[20px] font-bold text-white mb-2">84%</div>
                                    <div class="w-full h-1.5 rounded-full" style="background: rgba(255,255,255,0.06);">
                                        <div class="h-full rounded-full" style="width: 84%; background: linear-gradient(90deg, #1d4ed8, #3B82F6);"></div>
                                    </div>
                                </div>

                                <div class="admin-kpi-card p-4 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="flex items-center justify-between mb-3">
                                        <div class="text-[11px] text-gray-500 font-medium">Team Online</div>
                                        <div class="w-6 h-6 rounded-lg flex items-center justify-center" style="background: rgba(59,130,246,0.1);">
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.2" stroke-linecap="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/></svg>
                                        </div>
                                    </div>
                                    <div class="text-[20px] font-bold text-white mb-1.5">18 / 24</div>
                                    <div class="flex items-center gap-1.5 text-[10.5px] text-gray-400">
                                        <div class="w-1.5 h-1.5 rounded-full bg-green-400"></div>
                                        6 drivers available
                                    </div>
                                </div>

                            </div><!-- /kpi -->

                            <!-- Revenue Chart + Activity Feed -->
                            <div class="grid grid-cols-3 gap-3">

                                <div class="col-span-2 p-4 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="flex items-center justify-between mb-4">
                                        <div>
                                            <div class="text-[13px] font-bold text-white">Revenue Overview</div>
                                            <div class="text-[11px] text-gray-500 mt-0.5">Last 7 months</div>
                                        </div>
                                        <div class="px-2.5 py-1 rounded-lg text-[11px] font-medium text-blue-400"
                                             style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.2);">Monthly</div>
                                    </div>
                                    <svg viewBox="0 0 360 90" class="w-full" style="height: 100px;" preserveAspectRatio="none">
                                        <defs>
                                            <linearGradient id="rev-grad" x1="0" y1="0" x2="0" y2="1">
                                                <stop offset="0%" stop-color="#3B82F6" stop-opacity="0.22"/>
                                                <stop offset="100%" stop-color="#3B82F6" stop-opacity="0"/>
                                            </linearGradient>
                                        </defs>
                                        <line x1="0" y1="22" x2="360" y2="22" stroke="rgba(255,255,255,0.04)" stroke-width="1"/>
                                        <line x1="0" y1="45" x2="360" y2="45" stroke="rgba(255,255,255,0.04)" stroke-width="1"/>
                                        <line x1="0" y1="68" x2="360" y2="68" stroke="rgba(255,255,255,0.04)" stroke-width="1"/>
                                        <path d="M0 78 L51 63 L103 70 L154 45 L206 52 L257 28 L308 18 L360 12 L360 90 L0 90Z" fill="url(#rev-grad)"/>
                                        <path d="M0 78 L51 63 L103 70 L154 45 L206 52 L257 28 L308 18 L360 12" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <circle cx="0"   cy="78" r="3" fill="#3B82F6"/>
                                        <circle cx="51"  cy="63" r="3" fill="#3B82F6"/>
                                        <circle cx="103" cy="70" r="3" fill="#3B82F6"/>
                                        <circle cx="154" cy="45" r="3" fill="#3B82F6"/>
                                        <circle cx="206" cy="52" r="3" fill="#3B82F6"/>
                                        <circle cx="257" cy="28" r="3" fill="#3B82F6"/>
                                        <circle cx="308" cy="18" r="3" fill="#3B82F6"/>
                                        <circle cx="360" cy="12" r="3" fill="#3B82F6"/>
                                    </svg>
                                    <div class="flex justify-between mt-1">
                                        <span class="text-[9.5px] text-gray-600">Nov</span>
                                        <span class="text-[9.5px] text-gray-600">Dec</span>
                                        <span class="text-[9.5px] text-gray-600">Jan</span>
                                        <span class="text-[9.5px] text-gray-600">Feb</span>
                                        <span class="text-[9.5px] text-gray-600">Mar</span>
                                        <span class="text-[9.5px] text-gray-600">Apr</span>
                                        <span class="text-[9.5px] text-gray-600">May</span>
                                    </div>
                                </div>

                                <!-- Live Activity -->
                                <div class="p-4 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="text-[13px] font-bold text-white mb-3.5">Live Activity</div>
                                    <div class="space-y-3">
                                        <div class="flex items-start gap-2.5">
                                            <div class="w-6 h-6 rounded-full flex-shrink-0 flex items-center justify-center mt-0.5" style="background: rgba(34,197,94,0.1); border: 1px solid rgba(34,197,94,0.2);">
                                                <div class="w-1.5 h-1.5 rounded-full bg-green-400"></div>
                                            </div>
                                            <div><div class="text-[11px] text-gray-300 leading-tight">Booking #4892 confirmed</div><div class="text-[10px] text-gray-600 mt-0.5">2 min ago</div></div>
                                        </div>
                                        <div class="flex items-start gap-2.5">
                                            <div class="w-6 h-6 rounded-full flex-shrink-0 flex items-center justify-center mt-0.5" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.2);">
                                                <svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><path d="M5 17H3a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v3"/></svg>
                                            </div>
                                            <div><div class="text-[11px] text-gray-300 leading-tight">Vehicle #7 dispatched</div><div class="text-[10px] text-gray-600 mt-0.5">5 min ago</div></div>
                                        </div>
                                        <div class="flex items-start gap-2.5">
                                            <div class="w-6 h-6 rounded-full flex-shrink-0 flex items-center justify-center mt-0.5" style="background: rgba(234,179,8,0.1); border: 1px solid rgba(234,179,8,0.2);">
                                                <svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="#EAB308" stroke-width="2.5" stroke-linecap="round"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                                            </div>
                                            <div><div class="text-[11px] text-gray-300 leading-tight">Driver late alert #3041</div><div class="text-[10px] text-gray-600 mt-0.5">8 min ago</div></div>
                                        </div>
                                        <div class="flex items-start gap-2.5">
                                            <div class="w-6 h-6 rounded-full flex-shrink-0 flex items-center justify-center mt-0.5" style="background: rgba(34,197,94,0.1); border: 1px solid rgba(34,197,94,0.2);">
                                                <svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="#22C55E" stroke-width="2.5" stroke-linecap="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg>
                                            </div>
                                            <div><div class="text-[11px] text-gray-300 leading-tight">Payment received $240</div><div class="text-[10px] text-gray-600 mt-0.5">12 min ago</div></div>
                                        </div>
                                        <div class="flex items-start gap-2.5">
                                            <div class="w-6 h-6 rounded-full flex-shrink-0 flex items-center justify-center mt-0.5" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.2);">
                                                <svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                                            </div>
                                            <div><div class="text-[11px] text-gray-300 leading-tight">New driver registered</div><div class="text-[10px] text-gray-600 mt-0.5">18 min ago</div></div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- /chart row -->

                        </div><!-- /ap-dashboard -->

                        <!-- â•â•â•â• BOOKINGS PANEL â•â•â•â• -->
                        <div id="ap-bookings" class="admin-panel p-5 hidden">

                            <!-- Toolbar -->
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center gap-2 flex-wrap">
                                    <div class="px-3 py-1.5 rounded-lg text-[11.5px] font-semibold text-white cursor-pointer" style="background: rgba(59,130,246,0.15); border: 1px solid rgba(59,130,246,0.25);">All (247)</div>
                                    <div class="px-3 py-1.5 rounded-lg text-[11.5px] text-gray-400 cursor-pointer" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">Pending (12)</div>
                                    <div class="px-3 py-1.5 rounded-lg text-[11.5px] text-gray-400 cursor-pointer" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">Active (38)</div>
                                    <div class="px-3 py-1.5 rounded-lg text-[11.5px] text-gray-400 cursor-pointer" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">Done (197)</div>
                                </div>
                                <button class="flex items-center gap-2 px-3 py-1.5 rounded-lg text-[11.5px] font-semibold text-white flex-shrink-0" style="background: linear-gradient(135deg, #1d4ed8, #3B82F6); border: 1px solid rgba(59,130,246,0.5);">
                                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                                    New Booking
                                </button>
                            </div>

                            <!-- Table -->
                            <div class="rounded-xl overflow-hidden" style="border: 1px solid rgba(255,255,255,0.07);">
                                <div class="grid text-[10px] font-semibold text-gray-500 uppercase tracking-[0.08em] px-4 py-2.5" style="grid-template-columns: 70px 1fr 1fr 110px 78px 65px 55px; background: rgba(255,255,255,0.03); border-bottom: 1px solid rgba(255,255,255,0.07);">
                                    <div>ID</div><div>Customer</div><div>Route</div><div>Vehicle</div><div>Status</div><div>Fare</div><div></div>
                                </div>
                                <div class="divide-y divide-white/[0.04]">

                                    <div class="grid items-center px-4 py-2.5 hover:bg-white/[0.02] transition-colors" style="grid-template-columns: 70px 1fr 1fr 110px 78px 65px 55px;">
                                        <div class="text-[11px] font-mono text-gray-500">#4892</div>
                                        <div><div class="text-[12px] font-medium text-white">James Carter</div><div class="text-[10px] text-gray-500">+1 555 234 8900</div></div>
                                        <div><div class="text-[11px] text-gray-300 truncate">JFK &rarr; Manhattan Hotel</div><div class="text-[10px] text-gray-500">Today, 9:30 PM</div></div>
                                        <div class="text-[11px] text-gray-400">Exec Sedan #04</div>
                                        <div><span class="px-2 py-0.5 rounded-full text-[10px] font-bold text-green-400" style="background: rgba(34,197,94,0.1);">Active</span></div>
                                        <div class="text-[12px] font-semibold text-white">$145</div>
                                        <div class="w-6 h-6 rounded-lg flex items-center justify-center cursor-pointer" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.2);"><svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></div>
                                    </div>

                                    <div class="grid items-center px-4 py-2.5 hover:bg-white/[0.02] transition-colors" style="grid-template-columns: 70px 1fr 1fr 110px 78px 65px 55px;">
                                        <div class="text-[11px] font-mono text-gray-500">#4891</div>
                                        <div><div class="text-[12px] font-medium text-white">Sarah Williamson</div><div class="text-[10px] text-gray-500">+1 555 872 3100</div></div>
                                        <div><div class="text-[11px] text-gray-300 truncate">Midtown &rarr; LaGuardia</div><div class="text-[10px] text-gray-500">Today, 11:00 PM</div></div>
                                        <div class="text-[11px] text-gray-400">SUV Premium #09</div>
                                        <div><span class="px-2 py-0.5 rounded-full text-[10px] font-bold text-yellow-400" style="background: rgba(234,179,8,0.1);">Pending</span></div>
                                        <div class="text-[12px] font-semibold text-white">$210</div>
                                        <div class="w-6 h-6 rounded-lg flex items-center justify-center cursor-pointer" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.2);"><svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></div>
                                    </div>

                                    <div class="grid items-center px-4 py-2.5 hover:bg-white/[0.02] transition-colors" style="grid-template-columns: 70px 1fr 1fr 110px 78px 65px 55px;">
                                        <div class="text-[11px] font-mono text-gray-500">#4889</div>
                                        <div><div class="text-[12px] font-medium text-white">Michael Torres</div><div class="text-[10px] text-gray-500">+1 555 431 2200</div></div>
                                        <div><div class="text-[11px] text-gray-300 truncate">Newark EWR &rarr; Downtown</div><div class="text-[10px] text-gray-500">Tomorrow, 7:00 AM</div></div>
                                        <div class="text-[11px] text-gray-400">Stretch Limo #02</div>
                                        <div><span class="px-2 py-0.5 rounded-full text-[10px] font-bold text-blue-400" style="background: rgba(59,130,246,0.1);">Confirmed</span></div>
                                        <div class="text-[12px] font-semibold text-white">$380</div>
                                        <div class="w-6 h-6 rounded-lg flex items-center justify-center cursor-pointer" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.2);"><svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></div>
                                    </div>

                                    <div class="grid items-center px-4 py-2.5 hover:bg-white/[0.02] transition-colors" style="grid-template-columns: 70px 1fr 1fr 110px 78px 65px 55px;">
                                        <div class="text-[11px] font-mono text-gray-500">#4888</div>
                                        <div><div class="text-[12px] font-medium text-white">Emily Chen</div><div class="text-[10px] text-gray-500">+1 555 128 9900</div></div>
                                        <div><div class="text-[11px] text-gray-300 truncate">Chelsea &rarr; JFK Airport</div><div class="text-[10px] text-gray-500">Today, 6:45 PM</div></div>
                                        <div class="text-[11px] text-gray-400">Exec Sedan #07</div>
                                        <div><span class="px-2 py-0.5 rounded-full text-[10px] font-bold text-gray-400" style="background: rgba(255,255,255,0.06);">Completed</span></div>
                                        <div class="text-[12px] font-semibold text-white">$175</div>
                                        <div class="w-6 h-6 rounded-lg flex items-center justify-center cursor-pointer" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.2);"><svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></div>
                                    </div>

                                    <div class="grid items-center px-4 py-2.5 hover:bg-white/[0.02] transition-colors" style="grid-template-columns: 70px 1fr 1fr 110px 78px 65px 55px;">
                                        <div class="text-[11px] font-mono text-gray-500">#4885</div>
                                        <div><div class="text-[12px] font-medium text-white">David Osei</div><div class="text-[10px] text-gray-500">+1 555 667 4400</div></div>
                                        <div><div class="text-[11px] text-gray-300 truncate">Upper East Side &rarr; Boston</div><div class="text-[10px] text-gray-500">Tomorrow, 9:00 AM</div></div>
                                        <div class="text-[11px] text-gray-400">Van Premium #11</div>
                                        <div><span class="px-2 py-0.5 rounded-full text-[10px] font-bold text-yellow-400" style="background: rgba(234,179,8,0.1);">Pending</span></div>
                                        <div class="text-[12px] font-semibold text-white">$520</div>
                                        <div class="w-6 h-6 rounded-lg flex items-center justify-center cursor-pointer" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.2);"><svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></div>
                                    </div>

                                    <div class="grid items-center px-4 py-2.5 hover:bg-white/[0.02] transition-colors" style="grid-template-columns: 70px 1fr 1fr 110px 78px 65px 55px;">
                                        <div class="text-[11px] font-mono text-gray-500">#4882</div>
                                        <div><div class="text-[12px] font-medium text-white">Priya Sharma</div><div class="text-[10px] text-gray-500">+1 555 303 7700</div></div>
                                        <div><div class="text-[11px] text-gray-300 truncate">Wall Street &rarr; Newark EWR</div><div class="text-[10px] text-gray-500">Today, 4:15 PM</div></div>
                                        <div class="text-[11px] text-gray-400">Exec Sedan #12</div>
                                        <div><span class="px-2 py-0.5 rounded-full text-[10px] font-bold text-green-400" style="background: rgba(34,197,94,0.1);">Active</span></div>
                                        <div class="text-[12px] font-semibold text-white">$290</div>
                                        <div class="w-6 h-6 rounded-lg flex items-center justify-center cursor-pointer" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.2);"><svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- /ap-bookings -->

                        <!-- â•â•â•â• FLEET PANEL â•â•â•â• -->
                        <div id="ap-fleet" class="admin-panel p-5 hidden">

                            <!-- Fleet Stats -->
                            <div class="grid grid-cols-4 gap-3 mb-4">
                                <div class="p-3 rounded-xl flex items-center gap-3" style="background: rgba(34,197,94,0.05); border: 1px solid rgba(34,197,94,0.15);">
                                    <div class="w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0" style="background: rgba(34,197,94,0.1);"><div class="w-2 h-2 rounded-full bg-green-400"></div></div>
                                    <div><div class="text-[17px] font-bold text-white">18</div><div class="text-[10.5px] text-green-400 font-medium">Available</div></div>
                                </div>
                                <div class="p-3 rounded-xl flex items-center gap-3" style="background: rgba(59,130,246,0.05); border: 1px solid rgba(59,130,246,0.15);">
                                    <div class="w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0" style="background: rgba(59,130,246,0.1);"><div class="w-2 h-2 rounded-full bg-blue-400"></div></div>
                                    <div><div class="text-[17px] font-bold text-white">24</div><div class="text-[10.5px] text-blue-400 font-medium">On Ride</div></div>
                                </div>
                                <div class="p-3 rounded-xl flex items-center gap-3" style="background: rgba(234,179,8,0.05); border: 1px solid rgba(234,179,8,0.15);">
                                    <div class="w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0" style="background: rgba(234,179,8,0.1);"><div class="w-2 h-2 rounded-full bg-yellow-400"></div></div>
                                    <div><div class="text-[17px] font-bold text-white">3</div><div class="text-[10.5px] text-yellow-400 font-medium">Maintenance</div></div>
                                </div>
                                <div class="p-3 rounded-xl flex items-center gap-3" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0" style="background: rgba(255,255,255,0.05);">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.4)" stroke-width="2" stroke-linecap="round"><path d="M5 17H3a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v3"/><circle cx="16" cy="19" r="2"/><circle cx="9" cy="19" r="2"/></svg>
                                    </div>
                                    <div><div class="text-[17px] font-bold text-white">45</div><div class="text-[10.5px] text-gray-400 font-medium">Total Fleet</div></div>
                                </div>
                            </div>

                            <!-- Vehicle Cards -->
                            <div class="grid grid-cols-3 gap-3">

                                <div class="p-3.5 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="flex items-start justify-between mb-3">
                                        <div><div class="text-[12.5px] font-bold text-white">Executive Sedan</div><div class="text-[10.5px] text-gray-500 mt-0.5">Mercedes S-Class Â· #04</div></div>
                                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold text-green-400" style="background: rgba(34,197,94,0.1);">Available</span>
                                    </div>
                                    <div class="h-12 rounded-lg mb-3 flex items-center justify-center" style="background: rgba(255,255,255,0.025); border: 1px solid rgba(255,255,255,0.05);">
                                        <svg viewBox="0 0 140 48" class="w-28" fill="none"><path d="M8 36 L24 20 L46 14 L94 14 L112 22 L132 28 L132 36 Q125 43 112 43 L24 43 Q12 43 8 36Z" stroke="rgba(255,255,255,0.18)" stroke-width="1.5" fill="rgba(255,255,255,0.035)"/><circle cx="32" cy="43" r="8" stroke="rgba(255,255,255,0.22)" stroke-width="1.5" fill="rgba(255,255,255,0.05)"/><circle cx="108" cy="43" r="8" stroke="rgba(255,255,255,0.22)" stroke-width="1.5" fill="rgba(255,255,255,0.05)"/><path d="M44 14 L46 26 L94 26 L96 14" stroke="rgba(59,130,246,0.3)" stroke-width="1" fill="rgba(59,130,246,0.03)"/></svg>
                                    </div>
                                    <div class="flex items-center justify-between text-[10.5px]">
                                        <span class="text-gray-500">ODO: 42,180 km</span>
                                        <span class="text-gray-500">Service in 8 days</span>
                                    </div>
                                </div>

                                <div class="p-3.5 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(59,130,246,0.12);">
                                    <div class="flex items-start justify-between mb-3">
                                        <div><div class="text-[12.5px] font-bold text-white">SUV Premium</div><div class="text-[10.5px] text-gray-500 mt-0.5">Cadillac Escalade Â· #09</div></div>
                                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold text-blue-400" style="background: rgba(59,130,246,0.1);">On Ride</span>
                                    </div>
                                    <div class="h-12 rounded-lg mb-3 flex items-center justify-center" style="background: rgba(255,255,255,0.025); border: 1px solid rgba(255,255,255,0.05);">
                                        <svg viewBox="0 0 150 52" class="w-32" fill="none"><path d="M6 38 L22 18 L50 12 L100 12 L118 20 L144 28 L144 38 Q136 46 120 46 L22 46 Q12 46 6 38Z" stroke="rgba(255,255,255,0.18)" stroke-width="1.5" fill="rgba(255,255,255,0.035)"/><circle cx="34" cy="46" r="9" stroke="rgba(255,255,255,0.22)" stroke-width="1.5" fill="rgba(255,255,255,0.05)"/><circle cx="116" cy="46" r="9" stroke="rgba(255,255,255,0.22)" stroke-width="1.5" fill="rgba(255,255,255,0.05)"/><path d="M48 12 L50 26 L100 26 L102 12" stroke="rgba(59,130,246,0.35)" stroke-width="1" fill="rgba(59,130,246,0.04)"/></svg>
                                    </div>
                                    <div class="flex items-center justify-between text-[10.5px]">
                                        <span class="text-gray-500">ODO: 28,450 km</span>
                                        <span class="text-blue-400/70">En route Â· ETA 14 min</span>
                                    </div>
                                </div>

                                <div class="p-3.5 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(234,179,8,0.12);">
                                    <div class="flex items-start justify-between mb-3">
                                        <div><div class="text-[12.5px] font-bold text-white">Stretch Limousine</div><div class="text-[10.5px] text-gray-500 mt-0.5">Lincoln Continental Â· #02</div></div>
                                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold text-yellow-400" style="background: rgba(234,179,8,0.1);">Maintenance</span>
                                    </div>
                                    <div class="h-12 rounded-lg mb-3 flex items-center justify-center" style="background: rgba(255,255,255,0.025); border: 1px solid rgba(255,255,255,0.05);">
                                        <svg viewBox="0 0 190 48" class="w-full max-w-[140px]" fill="none"><path d="M5 36 L20 22 L40 14 L150 14 L170 22 L185 28 L185 36 Q178 44 165 44 L20 44 Q10 44 5 36Z" stroke="rgba(255,255,255,0.18)" stroke-width="1.5" fill="rgba(255,255,255,0.035)"/><circle cx="30" cy="44" r="8" stroke="rgba(255,255,255,0.22)" stroke-width="1.5" fill="rgba(255,255,255,0.05)"/><circle cx="158" cy="44" r="8" stroke="rgba(255,255,255,0.22)" stroke-width="1.5" fill="rgba(255,255,255,0.05)"/><path d="M38 14 L40 26 L150 26 L152 14" stroke="rgba(59,130,246,0.3)" stroke-width="1" fill="rgba(59,130,246,0.03)"/></svg>
                                    </div>
                                    <div class="flex items-center justify-between text-[10.5px]">
                                        <span class="text-yellow-600/80">Brake service needed</span>
                                        <span class="text-gray-500">ODO: 71,200 km</span>
                                    </div>
                                </div>

                                <div class="p-3.5 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="flex items-start justify-between mb-3">
                                        <div><div class="text-[12.5px] font-bold text-white">Luxury Van</div><div class="text-[10.5px] text-gray-500 mt-0.5">Mercedes Sprinter Â· #11</div></div>
                                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold text-green-400" style="background: rgba(34,197,94,0.1);">Available</span>
                                    </div>
                                    <div class="h-12 rounded-lg mb-3 flex items-center justify-center" style="background: rgba(255,255,255,0.025); border: 1px solid rgba(255,255,255,0.05);">
                                        <svg viewBox="0 0 155 50" class="w-32" fill="none"><path d="M8 36 L22 16 L52 10 L108 10 L125 18 L147 28 L147 36 Q140 44 125 44 L22 44 Q12 44 8 36Z" stroke="rgba(255,255,255,0.18)" stroke-width="1.5" fill="rgba(255,255,255,0.035)"/><circle cx="34" cy="44" r="8" stroke="rgba(255,255,255,0.22)" stroke-width="1.5" fill="rgba(255,255,255,0.05)"/><circle cx="120" cy="44" r="8" stroke="rgba(255,255,255,0.22)" stroke-width="1.5" fill="rgba(255,255,255,0.05)"/><path d="M50 10 L52 22 L108 22 L110 10" stroke="rgba(59,130,246,0.3)" stroke-width="1" fill="rgba(59,130,246,0.03)"/></svg>
                                    </div>
                                    <div class="flex items-center justify-between text-[10.5px]">
                                        <span class="text-gray-500">ODO: 18,930 km</span>
                                        <span class="text-gray-500">Service in 30 days</span>
                                    </div>
                                </div>

                                <div class="p-3.5 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(59,130,246,0.12);">
                                    <div class="flex items-start justify-between mb-3">
                                        <div><div class="text-[12.5px] font-bold text-white">Executive Sedan</div><div class="text-[10.5px] text-gray-500 mt-0.5">BMW 7 Series Â· #07</div></div>
                                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold text-blue-400" style="background: rgba(59,130,246,0.1);">On Ride</span>
                                    </div>
                                    <div class="h-12 rounded-lg mb-3 flex items-center justify-center" style="background: rgba(255,255,255,0.025); border: 1px solid rgba(255,255,255,0.05);">
                                        <svg viewBox="0 0 140 48" class="w-28" fill="none"><path d="M8 36 L24 20 L46 14 L94 14 L112 22 L132 28 L132 36 Q125 43 112 43 L24 43 Q12 43 8 36Z" stroke="rgba(255,255,255,0.18)" stroke-width="1.5" fill="rgba(255,255,255,0.035)"/><circle cx="32" cy="43" r="8" stroke="rgba(255,255,255,0.22)" stroke-width="1.5" fill="rgba(255,255,255,0.05)"/><circle cx="108" cy="43" r="8" stroke="rgba(255,255,255,0.22)" stroke-width="1.5" fill="rgba(255,255,255,0.05)"/><path d="M44 14 L46 26 L94 26 L96 14" stroke="rgba(59,130,246,0.35)" stroke-width="1" fill="rgba(59,130,246,0.04)"/></svg>
                                    </div>
                                    <div class="flex items-center justify-between text-[10.5px]">
                                        <span class="text-gray-500">ODO: 55,640 km</span>
                                        <span class="text-blue-400/70">En route Â· ETA 7 min</span>
                                    </div>
                                </div>

                                <div class="p-3.5 rounded-xl flex items-center justify-center cursor-pointer" style="background: rgba(59,130,246,0.03); border: 1px dashed rgba(59,130,246,0.18); min-height: 140px;">
                                    <div class="text-center">
                                        <div class="w-8 h-8 rounded-full flex items-center justify-center mx-auto mb-2" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.2);">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                                        </div>
                                        <div class="text-[11.5px] font-medium text-blue-400">Add Vehicle</div>
                                        <div class="text-[10px] text-gray-600 mt-0.5">40 more in fleet</div>
                                    </div>
                                </div>

                            </div><!-- /vehicle grid -->

                        </div><!-- /ap-fleet -->

                        <!-- â•â•â•â• PRICING PANEL â•â•â•â• -->
                        <div id="ap-pricing" class="admin-panel p-5 hidden">

                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <div class="text-[14px] font-bold text-white">Pricing Configuration</div>
                                    <div class="text-[11.5px] text-gray-500 mt-0.5">Base rates, per-mile fares, and surge multipliers</div>
                                </div>
                                <button class="px-3 py-1.5 rounded-lg text-[11.5px] font-semibold text-white" style="background: linear-gradient(135deg, #1d4ed8, #3B82F6); border: 1px solid rgba(59,130,246,0.5);">Save Changes</button>
                            </div>

                            <div class="rounded-xl overflow-hidden mb-4" style="border: 1px solid rgba(255,255,255,0.07);">
                                <div class="grid text-[10px] font-semibold text-gray-500 uppercase tracking-[0.08em] px-5 py-3" style="grid-template-columns: 1fr 95px 95px 95px 95px 75px; background: rgba(255,255,255,0.03); border-bottom: 1px solid rgba(255,255,255,0.07);">
                                    <div>Service Type</div><div>Base Fare</div><div>Per Mile</div><div>Min Fare</div><div>Wait Time</div><div>Surge</div>
                                </div>
                                <div class="divide-y divide-white/[0.04]">

                                    <div class="grid items-center px-5 py-3.5 hover:bg-white/[0.015] transition-colors" style="grid-template-columns: 1fr 95px 95px 95px 95px 75px;">
                                        <div class="flex items-center gap-2.5">
                                            <div class="w-7 h-7 rounded-lg flex items-center justify-center flex-shrink-0" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.2);">
                                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 10.8"/><path d="M5 5l14 14"/></svg>
                                            </div>
                                            <div><div class="text-[12px] font-semibold text-white">Airport Transfer</div><div class="text-[10.5px] text-gray-500">All major airports</div></div>
                                        </div>
                                        <div class="text-[12px] text-white font-mono">$35.00</div><div class="text-[12px] text-white font-mono">$3.20</div><div class="text-[12px] text-white font-mono">$75.00</div><div class="text-[12px] text-white font-mono">$0.50/min</div>
                                        <div class="w-9 h-5 rounded-full flex items-center px-0.5 cursor-pointer" style="background: #3B82F6;"><div class="w-4 h-4 rounded-full bg-white ml-auto shadow-sm"></div></div>
                                    </div>

                                    <div class="grid items-center px-5 py-3.5 hover:bg-white/[0.015] transition-colors" style="grid-template-columns: 1fr 95px 95px 95px 95px 75px;">
                                        <div class="flex items-center gap-2.5">
                                            <div class="w-7 h-7 rounded-lg flex items-center justify-center flex-shrink-0" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.2);">
                                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                                            </div>
                                            <div><div class="text-[12px] font-semibold text-white">City Transfer</div><div class="text-[10.5px] text-gray-500">Point-to-point urban</div></div>
                                        </div>
                                        <div class="text-[12px] text-white font-mono">$20.00</div><div class="text-[12px] text-white font-mono">$2.80</div><div class="text-[12px] text-white font-mono">$40.00</div><div class="text-[12px] text-white font-mono">$0.40/min</div>
                                        <div class="w-9 h-5 rounded-full flex items-center px-0.5 cursor-pointer" style="background: #3B82F6;"><div class="w-4 h-4 rounded-full bg-white ml-auto shadow-sm"></div></div>
                                    </div>

                                    <div class="grid items-center px-5 py-3.5 hover:bg-white/[0.015] transition-colors" style="grid-template-columns: 1fr 95px 95px 95px 95px 75px;">
                                        <div class="flex items-center gap-2.5">
                                            <div class="w-7 h-7 rounded-lg flex items-center justify-center flex-shrink-0" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.2);">
                                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                            </div>
                                            <div><div class="text-[12px] font-semibold text-white">Hourly Charter</div><div class="text-[10.5px] text-gray-500">Billed per hour</div></div>
                                        </div>
                                        <div class="text-[12px] text-white font-mono">$90.00</div><div class="text-[12px] text-gray-500 font-mono">N/A</div><div class="text-[12px] text-white font-mono">$90.00</div><div class="text-[12px] text-gray-500 font-mono">Included</div>
                                        <div class="w-9 h-5 rounded-full flex items-center px-0.5 cursor-pointer" style="background: rgba(255,255,255,0.1);"><div class="w-4 h-4 rounded-full bg-white/40 shadow-sm"></div></div>
                                    </div>

                                    <div class="grid items-center px-5 py-3.5 hover:bg-white/[0.015] transition-colors" style="grid-template-columns: 1fr 95px 95px 95px 95px 75px;">
                                        <div class="flex items-center gap-2.5">
                                            <div class="w-7 h-7 rounded-lg flex items-center justify-center flex-shrink-0" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.2);">
                                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><path d="M3 12h18M3 6l9-3 9 3M3 18l9 3 9-3"/></svg>
                                            </div>
                                            <div><div class="text-[12px] font-semibold text-white">Long Distance</div><div class="text-[10.5px] text-gray-500">Interstate / 50+ miles</div></div>
                                        </div>
                                        <div class="text-[12px] text-white font-mono">$50.00</div><div class="text-[12px] text-white font-mono">$2.40</div><div class="text-[12px] text-white font-mono">$200.00</div><div class="text-[12px] text-white font-mono">$0.35/min</div>
                                        <div class="w-9 h-5 rounded-full flex items-center px-0.5 cursor-pointer" style="background: #3B82F6;"><div class="w-4 h-4 rounded-full bg-white ml-auto shadow-sm"></div></div>
                                    </div>

                                </div>
                            </div>

                            <!-- Surge Rules -->
                            <div class="p-4 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                <div class="text-[12.5px] font-bold text-white mb-3">Dynamic Surge Multipliers</div>
                                <div class="grid grid-cols-3 gap-3">
                                    <div class="p-3 rounded-lg" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.06);">
                                        <div class="text-[10.5px] text-gray-500 mb-1.5">Peak Hours (6&ndash;9AM, 5&ndash;8PM)</div>
                                        <div class="text-[18px] font-bold text-blue-400">1.5Ã—</div>
                                    </div>
                                    <div class="p-3 rounded-lg" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.06);">
                                        <div class="text-[10.5px] text-gray-500 mb-1.5">High Demand (&gt;85% fleet)</div>
                                        <div class="text-[18px] font-bold text-yellow-400">2.0Ã—</div>
                                    </div>
                                    <div class="p-3 rounded-lg" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.06);">
                                        <div class="text-[10.5px] text-gray-500 mb-1.5">Late Night (11PM&ndash;4AM)</div>
                                        <div class="text-[18px] font-bold text-purple-400">1.25Ã—</div>
                                    </div>
                                </div>
                            </div>

                        </div><!-- /ap-pricing -->

                        <!-- â•â•â•â• ANALYTICS PANEL â•â•â•â• -->
                        <div id="ap-analytics" class="admin-panel p-5 hidden">

                            <div class="grid grid-cols-3 gap-3 mb-4">
                                <div class="p-4 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="text-[11px] text-gray-500 mb-2">Monthly Revenue</div>
                                    <div class="text-[22px] font-bold text-white">$48,290</div>
                                    <div class="flex items-center gap-1 mt-1.5 text-[10.5px] text-green-400"><svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="18 15 12 9 6 15"/></svg>+12.4% vs last month</div>
                                </div>
                                <div class="p-4 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="text-[11px] text-gray-500 mb-2">Avg. Booking Value</div>
                                    <div class="text-[22px] font-bold text-white">$195.60</div>
                                    <div class="flex items-center gap-1 mt-1.5 text-[10.5px] text-green-400"><svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="18 15 12 9 6 15"/></svg>+$18.40 vs last month</div>
                                </div>
                                <div class="p-4 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="text-[11px] text-gray-500 mb-2">Repeat Customer Rate</div>
                                    <div class="text-[22px] font-bold text-white">68%</div>
                                    <div class="flex items-center gap-1 mt-1.5 text-[10.5px] text-green-400"><svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="18 15 12 9 6 15"/></svg>+5% vs last month</div>
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-3">

                                <div class="col-span-2 p-4 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="text-[13px] font-bold text-white mb-4">Weekly Bookings</div>
                                    <div class="flex items-end gap-3" style="height: 120px;">
                                        <div class="flex flex-col items-center gap-1 flex-1"><div class="w-full rounded-t-md" style="height: 55%; background: linear-gradient(180deg, #3B82F6, rgba(59,130,246,0.4));"></div><div class="text-[9.5px] text-gray-600">Mon</div></div>
                                        <div class="flex flex-col items-center gap-1 flex-1"><div class="w-full rounded-t-md" style="height: 72%; background: linear-gradient(180deg, #3B82F6, rgba(59,130,246,0.4));"></div><div class="text-[9.5px] text-gray-600">Tue</div></div>
                                        <div class="flex flex-col items-center gap-1 flex-1"><div class="w-full rounded-t-md" style="height: 67%; background: linear-gradient(180deg, #3B82F6, rgba(59,130,246,0.4));"></div><div class="text-[9.5px] text-gray-600">Wed</div></div>
                                        <div class="flex flex-col items-center gap-1 flex-1"><div class="w-full rounded-t-md" style="height: 88%; background: linear-gradient(180deg, #60a5fa, #3B82F6);"></div><div class="text-[9.5px] text-gray-600">Thu</div></div>
                                        <div class="flex flex-col items-center gap-1 flex-1"><div class="w-full rounded-t-md" style="height: 96%; background: linear-gradient(180deg, #93c5fd, #3B82F6); box-shadow: 0 0 12px rgba(59,130,246,0.3);"></div><div class="text-[9.5px] text-blue-400">Fri</div></div>
                                        <div class="flex flex-col items-center gap-1 flex-1"><div class="w-full rounded-t-md" style="height: 82%; background: linear-gradient(180deg, #3B82F6, rgba(59,130,246,0.4));"></div><div class="text-[9.5px] text-gray-600">Sat</div></div>
                                        <div class="flex flex-col items-center gap-1 flex-1"><div class="w-full rounded-t-md" style="height: 58%; background: linear-gradient(180deg, #3B82F6, rgba(59,130,246,0.4));"></div><div class="text-[9.5px] text-gray-600">Sun</div></div>
                                    </div>
                                </div>

                                <div class="p-4 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="text-[13px] font-bold text-white mb-4">Booking Sources</div>
                                    <div class="space-y-3.5">
                                        <div>
                                            <div class="flex items-center justify-between mb-1.5"><span class="text-[11.5px] text-gray-400">Website</span><span class="text-[11.5px] text-white font-semibold">42%</span></div>
                                            <div class="h-1.5 rounded-full" style="background: rgba(255,255,255,0.06);"><div class="h-full rounded-full bg-blue-500" style="width: 42%;"></div></div>
                                        </div>
                                        <div>
                                            <div class="flex items-center justify-between mb-1.5"><span class="text-[11.5px] text-gray-400">Mobile App</span><span class="text-[11.5px] text-white font-semibold">35%</span></div>
                                            <div class="h-1.5 rounded-full" style="background: rgba(255,255,255,0.06);"><div class="h-full rounded-full" style="width: 35%; background: #6366f1;"></div></div>
                                        </div>
                                        <div>
                                            <div class="flex items-center justify-between mb-1.5"><span class="text-[11.5px] text-gray-400">AI Phone Agent</span><span class="text-[11.5px] text-white font-semibold">15%</span></div>
                                            <div class="h-1.5 rounded-full" style="background: rgba(255,255,255,0.06);"><div class="h-full rounded-full" style="width: 15%; background: #22d3ee;"></div></div>
                                        </div>
                                        <div>
                                            <div class="flex items-center justify-between mb-1.5"><span class="text-[11.5px] text-gray-400">Manual / Phone</span><span class="text-[11.5px] text-white font-semibold">8%</span></div>
                                            <div class="h-1.5 rounded-full" style="background: rgba(255,255,255,0.06);"><div class="h-full rounded-full" style="width: 8%; background: #a3e635;"></div></div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div><!-- /ap-analytics -->

                        <!-- â•â•â•â• TEAM PANEL â•â•â•â• -->
                        <div id="ap-team" class="admin-panel p-5 hidden">

                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <div class="text-[14px] font-bold text-white">Team Management</div>
                                    <div class="text-[11.5px] text-gray-500 mt-0.5">24 members Â· Role-based access control</div>
                                </div>
                                <button class="flex items-center gap-2 px-3 py-1.5 rounded-lg text-[11.5px] font-semibold text-white" style="background: linear-gradient(135deg, #1d4ed8, #3B82F6); border: 1px solid rgba(59,130,246,0.5);">
                                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                                    Invite Member
                                </button>
                            </div>

                            <div class="grid grid-cols-3 gap-3">

                                <div class="p-4 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="flex items-start gap-3 mb-3">
                                        <div class="w-9 h-9 rounded-xl flex-shrink-0 flex items-center justify-center text-[13px] font-bold text-white" style="background: linear-gradient(135deg, #1d4ed8, #3B82F6);">A</div>
                                        <div class="min-w-0 flex-1">
                                            <div class="text-[12.5px] font-bold text-white truncate">Alex Morgan</div>
                                            <span class="inline-block px-1.5 py-0.5 rounded mt-0.5 text-[9.5px] font-bold uppercase tracking-wide" style="background: rgba(59,130,246,0.15); color: #60a5fa; border: 1px solid rgba(59,130,246,0.2);">Super Admin</span>
                                        </div>
                                        <div class="w-2 h-2 rounded-full bg-green-400 flex-shrink-0 mt-1.5"></div>
                                    </div>
                                    <div class="text-[10.5px] text-gray-500 mb-3">alex@yourbrand.com</div>
                                    <div class="flex flex-wrap gap-1">
                                        <span class="px-1.5 py-0.5 rounded text-[9.5px] text-gray-400" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">Fleet</span>
                                        <span class="px-1.5 py-0.5 rounded text-[9.5px] text-gray-400" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">Pricing</span>
                                        <span class="px-1.5 py-0.5 rounded text-[9.5px] text-gray-400" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">Team</span>
                                        <span class="px-1.5 py-0.5 rounded text-[9.5px] text-blue-400" style="background: rgba(59,130,246,0.06); border: 1px solid rgba(59,130,246,0.15);">+4 more</span>
                                    </div>
                                </div>

                                <div class="p-4 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="flex items-start gap-3 mb-3">
                                        <div class="w-9 h-9 rounded-xl flex-shrink-0 flex items-center justify-center text-[13px] font-bold text-white" style="background: linear-gradient(135deg, #6d28d9, #7c3aed);">S</div>
                                        <div class="min-w-0 flex-1">
                                            <div class="text-[12.5px] font-bold text-white truncate">Sarah Kim</div>
                                            <span class="inline-block px-1.5 py-0.5 rounded mt-0.5 text-[9.5px] font-bold uppercase tracking-wide" style="background: rgba(124,58,237,0.15); color: #a78bfa; border: 1px solid rgba(124,58,237,0.2);">Dispatcher</span>
                                        </div>
                                        <div class="w-2 h-2 rounded-full bg-green-400 flex-shrink-0 mt-1.5"></div>
                                    </div>
                                    <div class="text-[10.5px] text-gray-500 mb-3">sarah@yourbrand.com</div>
                                    <div class="flex flex-wrap gap-1">
                                        <span class="px-1.5 py-0.5 rounded text-[9.5px] text-gray-400" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">Bookings</span>
                                        <span class="px-1.5 py-0.5 rounded text-[9.5px] text-gray-400" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">Fleet</span>
                                        <span class="px-1.5 py-0.5 rounded text-[9.5px] text-gray-400" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">Drivers</span>
                                    </div>
                                </div>

                                <div class="p-4 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="flex items-start gap-3 mb-3">
                                        <div class="w-9 h-9 rounded-xl flex-shrink-0 flex items-center justify-center text-[13px] font-bold text-white" style="background: linear-gradient(135deg, #065f46, #059669);">R</div>
                                        <div class="min-w-0 flex-1">
                                            <div class="text-[12.5px] font-bold text-white truncate">Ryan Osei</div>
                                            <span class="inline-block px-1.5 py-0.5 rounded mt-0.5 text-[9.5px] font-bold uppercase tracking-wide" style="background: rgba(5,150,105,0.15); color: #34d399; border: 1px solid rgba(5,150,105,0.2);">Driver</span>
                                        </div>
                                        <div class="w-2 h-2 rounded-full bg-gray-600 flex-shrink-0 mt-1.5"></div>
                                    </div>
                                    <div class="text-[10.5px] text-gray-500 mb-3">ryan.osei@drivers.com</div>
                                    <div class="flex flex-wrap gap-1">
                                        <span class="px-1.5 py-0.5 rounded text-[9.5px] text-gray-400" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">My Rides</span>
                                        <span class="px-1.5 py-0.5 rounded text-[9.5px] text-gray-400" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">Schedule</span>
                                    </div>
                                </div>

                                <div class="p-4 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="flex items-start gap-3 mb-3">
                                        <div class="w-9 h-9 rounded-xl flex-shrink-0 flex items-center justify-center text-[13px] font-bold text-white" style="background: linear-gradient(135deg, #92400e, #d97706);">M</div>
                                        <div class="min-w-0 flex-1">
                                            <div class="text-[12.5px] font-bold text-white truncate">Maria Santos</div>
                                            <span class="inline-block px-1.5 py-0.5 rounded mt-0.5 text-[9.5px] font-bold uppercase tracking-wide" style="background: rgba(217,119,6,0.15); color: #fbbf24; border: 1px solid rgba(217,119,6,0.2);">Manager</span>
                                        </div>
                                        <div class="w-2 h-2 rounded-full bg-green-400 flex-shrink-0 mt-1.5"></div>
                                    </div>
                                    <div class="text-[10.5px] text-gray-500 mb-3">m.santos@yourbrand.com</div>
                                    <div class="flex flex-wrap gap-1">
                                        <span class="px-1.5 py-0.5 rounded text-[9.5px] text-gray-400" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">Reports</span>
                                        <span class="px-1.5 py-0.5 rounded text-[9.5px] text-gray-400" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">Analytics</span>
                                        <span class="px-1.5 py-0.5 rounded text-[9.5px] text-gray-400" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">Team</span>
                                    </div>
                                </div>

                                <div class="p-4 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="flex items-start gap-3 mb-3">
                                        <div class="w-9 h-9 rounded-xl flex-shrink-0 flex items-center justify-center text-[13px] font-bold text-white" style="background: linear-gradient(135deg, #1e1b4b, #4338ca);">J</div>
                                        <div class="min-w-0 flex-1">
                                            <div class="text-[12.5px] font-bold text-white truncate">Jordan Lee</div>
                                            <span class="inline-block px-1.5 py-0.5 rounded mt-0.5 text-[9.5px] font-bold uppercase tracking-wide" style="background: rgba(67,56,202,0.15); color: #818cf8; border: 1px solid rgba(67,56,202,0.2);">Dispatcher</span>
                                        </div>
                                        <div class="w-2 h-2 rounded-full bg-yellow-400 flex-shrink-0 mt-1.5"></div>
                                    </div>
                                    <div class="text-[10.5px] text-gray-500 mb-3">j.lee@yourbrand.com</div>
                                    <div class="flex flex-wrap gap-1">
                                        <span class="px-1.5 py-0.5 rounded text-[9.5px] text-gray-400" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">Bookings</span>
                                        <span class="px-1.5 py-0.5 rounded text-[9.5px] text-gray-400" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">Fleet</span>
                                    </div>
                                </div>

                                <div class="p-4 rounded-xl flex items-center justify-center cursor-pointer" style="background: rgba(59,130,246,0.03); border: 1px dashed rgba(59,130,246,0.18);">
                                    <div class="text-center">
                                        <div class="w-9 h-9 rounded-full flex items-center justify-center mx-auto mb-2" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.2);">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                                        </div>
                                        <div class="text-[11.5px] font-medium text-blue-400">Invite Member</div>
                                        <div class="text-[10px] text-gray-600 mt-0.5">+19 more in team</div>
                                    </div>
                                </div>

                            </div><!-- /team grid -->

                        </div><!-- /ap-team -->

                    </div><!-- /scroll area -->

                </div><!-- /main content -->

            </div><!-- /admin app layout -->

        </div><!-- /browser frame inner -->
        </div><!-- /overflow wrapper -->

        <!-- â”€â”€ Feature Pills â”€â”€ -->
        <div class="flex flex-wrap items-center justify-center gap-3 mt-10">
            <div class="flex items-center gap-2 px-3.5 py-2 rounded-xl text-[12px] text-gray-400" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                Role-based access control
            </div>
            <div class="flex items-center gap-2 px-3.5 py-2 rounded-xl text-[12px] text-gray-400" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                Real-time live updates
            </div>
            <div class="flex items-center gap-2 px-3.5 py-2 rounded-xl text-[12px] text-gray-400" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                Fully white-label UI
            </div>
            <div class="flex items-center gap-2 px-3.5 py-2 rounded-xl text-[12px] text-gray-400" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>
                Unlimited team seats
            </div>
            <div class="flex items-center gap-2 px-3.5 py-2 rounded-xl text-[12px] text-gray-400" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
                Export &amp; reporting
            </div>
            <div class="flex items-center gap-2 px-3.5 py-2 rounded-xl text-[12px] text-gray-400" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                Dynamic surge pricing
            </div>
        </div>

    </div><!-- /container -->
</section>
<!-- â•â•â•â• END ADMIN PANEL â•â•â•â• -->


<!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
     SECTION &mdash; HOW IT WORKS
â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
<section id="how-it-works" class="relative py-28 lg:py-36 overflow-hidden" style="background: #0A0A0A;">

    <!-- Subtle section grid -->
    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(255,255,255,0.018) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.018) 1px, transparent 1px); background-size: 60px 60px;"></div>

    <!-- Centre glow -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[900px] h-[400px] rounded-full pointer-events-none" style="background: radial-gradient(ellipse at center, rgba(59,130,246,0.055) 0%, transparent 68%);"></div>

    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8 relative z-10">

        <!-- â”€â”€ Section Header â”€â”€ -->
        <div class="text-center max-w-2xl mx-auto mb-20 lg:mb-24 section-fade">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-[11px] font-bold tracking-[0.1em] uppercase mb-5" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.25); color: #3B82F6;">
                <svg width="8" height="8" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="6"/></svg>
                Quick Setup
            </div>
            <h2 class="text-[30px] sm:text-[38px] lg:text-[44px] font-bold leading-[1.14] tracking-tight text-white mb-5">
                Up and running in<br>
                <span style="background: linear-gradient(135deg, #ffffff 20%, #3B82F6 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">under 30 minutes</span>
            </h2>
            <p class="text-[15px] sm:text-[15.5px] text-gray-400 leading-relaxed max-w-xl mx-auto">
                No cloud lock-in. No recurring fees. Install once on your own server and own your booking system forever.
            </p>
        </div>

        <!-- â”€â”€ Steps Grid â”€â”€ -->
        <div class="relative">

            <!-- Desktop dashed connector line -->
            <div class="hiw-connector-line hidden lg:block"></div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 lg:gap-7">

                <!-- â•â•â• STEP 1 â•â•â• -->
                <div class="hiw-step section-fade" style="transition-delay: 0.06s;">
                    <div class="hiw-step-inner">

                        <!-- Icon -->
                        <div class="flex lg:justify-center mb-6">
                            <div class="hiw-step-icon relative w-[80px] h-[80px] rounded-2xl flex items-center justify-center flex-shrink-0" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.25);">
                                <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="4 17 10 11 4 5"/>
                                    <line x1="12" y1="19" x2="20" y2="19"/>
                                </svg>
                                <span class="absolute -top-2.5 -right-2.5 w-[22px] h-[22px] rounded-full flex items-center justify-center text-[10px] font-bold text-white" style="background: #3B82F6; box-shadow: 0 0 12px rgba(59,130,246,0.65);">1</span>
                            </div>
                        </div>

                        <!-- Text -->
                        <div class="lg:text-center">
                            <div class="text-[10.5px] font-bold tracking-[0.12em] uppercase text-blue-500 mb-2">Step 01</div>
                            <h3 class="text-[18px] sm:text-[19px] font-bold text-white mb-3 leading-tight">Install in 30 Minutes</h3>
                            <p class="text-[13.5px] text-gray-400 leading-relaxed mb-5">
                                Upload the files to your server, run the web installer, and your limo booking system is live. No DevOps expertise required.
                            </p>
                            <div class="space-y-2.5 lg:inline-flex lg:flex-col lg:items-start">
                                <div class="flex items-center gap-2.5 text-[12px] text-gray-500">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>
                                    Works on any PHP / MySQL hosting
                                </div>
                                <div class="flex items-center gap-2.5 text-[12px] text-gray-500">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>
                                    One-click web installer included
                                </div>
                                <div class="flex items-center gap-2.5 text-[12px] text-gray-500">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>
                                    Full setup documentation provided
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- /step 1 -->

                <!-- â•â•â• STEP 2 â•â•â• -->
                <div class="hiw-step section-fade" style="transition-delay: 0.16s;">
                    <div class="hiw-step-inner">

                        <!-- Icon -->
                        <div class="flex lg:justify-center mb-6">
                            <div class="hiw-step-icon relative w-[80px] h-[80px] rounded-2xl flex items-center justify-center flex-shrink-0" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.25);">
                                <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="4" y1="21" x2="4" y2="14"/>
                                    <line x1="4" y1="10" x2="4" y2="3"/>
                                    <line x1="12" y1="21" x2="12" y2="12"/>
                                    <line x1="12" y1="8" x2="12" y2="3"/>
                                    <line x1="20" y1="21" x2="20" y2="16"/>
                                    <line x1="20" y1="12" x2="20" y2="3"/>
                                    <line x1="1" y1="14" x2="7" y2="14"/>
                                    <line x1="9" y1="8" x2="15" y2="8"/>
                                    <line x1="17" y1="16" x2="23" y2="16"/>
                                </svg>
                                <span class="absolute -top-2.5 -right-2.5 w-[22px] h-[22px] rounded-full flex items-center justify-center text-[10px] font-bold text-white" style="background: #3B82F6; box-shadow: 0 0 12px rgba(59,130,246,0.65);">2</span>
                            </div>
                        </div>

                        <!-- Text -->
                        <div class="lg:text-center">
                            <div class="text-[10.5px] font-bold tracking-[0.12em] uppercase text-blue-500 mb-2">Step 02</div>
                            <h3 class="text-[18px] sm:text-[19px] font-bold text-white mb-3 leading-tight">Setup Branding &amp; Pricing</h3>
                            <p class="text-[13.5px] text-gray-400 leading-relaxed mb-5">
                                Upload your logo, set brand colors, configure vehicle classes, and define all pricing rules &mdash; straight from the admin panel.
                            </p>
                            <div class="space-y-2.5 lg:inline-flex lg:flex-col lg:items-start">
                                <div class="flex items-center gap-2.5 text-[12px] text-gray-500">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>
                                    Full white-label &mdash; your brand &amp; domain
                                </div>
                                <div class="flex items-center gap-2.5 text-[12px] text-gray-500">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>
                                    Custom vehicle classes &amp; fare rules
                                </div>
                                <div class="flex items-center gap-2.5 text-[12px] text-gray-500">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>
                                    Dynamic surge pricing controls
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- /step 2 -->

                <!-- â•â•â• STEP 3 â•â•â• -->
                <div class="hiw-step section-fade" style="transition-delay: 0.26s;">
                    <div class="hiw-step-inner">

                        <!-- Icon -->
                        <div class="flex lg:justify-center mb-6">
                            <div class="hiw-step-icon relative w-[80px] h-[80px] rounded-2xl flex items-center justify-center flex-shrink-0" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.25);">
                                <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                    <polyline points="22 4 12 14.01 9 11.01"/>
                                </svg>
                                <span class="absolute -top-2.5 -right-2.5 w-[22px] h-[22px] rounded-full flex items-center justify-center text-[10px] font-bold text-white" style="background: #3B82F6; box-shadow: 0 0 12px rgba(59,130,246,0.65);">3</span>
                            </div>
                        </div>

                        <!-- Text -->
                        <div class="lg:text-center">
                            <div class="text-[10.5px] font-bold tracking-[0.12em] uppercase text-blue-500 mb-2">Step 03</div>
                            <h3 class="text-[18px] sm:text-[19px] font-bold text-white mb-3 leading-tight">Start Taking Bookings</h3>
                            <p class="text-[13.5px] text-gray-400 leading-relaxed mb-5">
                                Customers book online, pay instantly, and receive AI confirmation calls &mdash; while you manage everything from one clean dashboard.
                            </p>
                            <div class="space-y-2.5 lg:inline-flex lg:flex-col lg:items-start">
                                <div class="flex items-center gap-2.5 text-[12px] text-gray-500">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>
                                    Automated booking confirmations
                                </div>
                                <div class="flex items-center gap-2.5 text-[12px] text-gray-500">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>
                                    Driver dispatch &amp; GPS tracking
                                </div>
                                <div class="flex items-center gap-2.5 text-[12px] text-gray-500">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>
                                    Payments, invoicing &amp; receipts
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- /step 3 -->

            </div><!-- /grid -->
        </div><!-- /steps -->

        <!-- â”€â”€ Bottom CTA â”€â”€ -->
        <div class="mt-16 lg:mt-20 flex flex-col items-center gap-5 section-fade" style="transition-delay: 0.36s;">
            <!-- Trust chip -->
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-[12px] text-gray-400" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08);">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                No subscriptions &nbsp;Â·&nbsp; No vendor lock-in &nbsp;Â·&nbsp; Full source code ownership
            </div>
            <!-- Buttons -->
            <div class="flex flex-col sm:flex-row items-center gap-3">
                <a href="#contact" class="btn-cta inline-flex items-center gap-2.5 px-7 py-3.5 rounded-xl font-semibold text-[14px] text-white" style="background: #3B82F6;">
                    <span>Get LimoSchedule</span>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
                <a href="#features" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl font-medium text-[14px] text-gray-300 hover:text-white transition-colors duration-200" style="border: 1px solid rgba(255,255,255,0.1);">
                    Explore Features
                </a>
            </div>
        </div>

    </div><!-- /container -->
</section>
<!-- â•â•â•â• END HOW IT WORKS â•â•â•â• -->


<!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
     SECTION &mdash; FAQ
â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
<section id="faq" class="relative py-28 lg:py-36 overflow-hidden" style="background: #0A0A0A;">

    <!-- Grid texture -->
    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(255,255,255,0.018) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.018) 1px, transparent 1px); background-size: 60px 60px;"></div>

    <!-- Center ambient glow -->
    <div class="absolute top-1/2 left-1/2 w-[900px] h-[500px] rounded-full pointer-events-none" style="background: radial-gradient(ellipse at center, rgba(59,130,246,0.06) 0%, transparent 65%); transform: translate(-50%, -50%);"></div>

    <div class="max-w-3xl mx-auto px-5 sm:px-6 lg:px-8 relative z-10">

        <!-- Section header -->
        <div class="text-center mb-16 section-fade">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-[11px] font-semibold tracking-widest uppercase text-blue-400 mb-6" style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.2); letter-spacing: 0.12em;">
                <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                FAQ
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-5 leading-tight" style="letter-spacing: -0.03em;">
                Everything you need<br class="hidden sm:block"> to know
            </h2>
            <p class="text-gray-400 text-base sm:text-lg max-w-xl mx-auto leading-relaxed">
                Clear answers to the questions every serious buyer asks before they commit.
            </p>
        </div>

        <!-- Accordion -->
        <div class="flex flex-col gap-3 section-fade" style="transition-delay: 0.1s;" id="faq-accordion">

            <!-- Q1 -->
            <div class="faq-item rounded-2xl overflow-hidden" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <button class="faq-trigger w-full flex items-center justify-between gap-4 px-6 py-5 text-left" aria-expanded="false">
                    <span class="flex items-center gap-4">
                        <span class="faq-num flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold text-blue-400" style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.2);">01</span>
                        <span class="text-white font-semibold text-[15px] leading-snug">Is this a SaaS product?</span>
                    </span>
                    <span class="faq-chevron flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center transition-transform duration-300" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.08);">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="faq-body" style="max-height: 0; overflow: hidden; transition: max-height 0.38s cubic-bezier(0.4,0,0.2,1);">
                    <div class="px-6 pb-6 pl-[4.25rem]">
                        <p class="text-gray-400 text-[14px] leading-relaxed">No &mdash; LimoSchedule is <span class="text-white font-medium">not SaaS</span>. There are no monthly fees, no subscriptions, and no data sent to our servers. You purchase a one-time license and receive the full source code to deploy on your own infrastructure. Your data stays on your server, always.</p>
                    </div>
                </div>
            </div>

            <!-- Q2 -->
            <div class="faq-item rounded-2xl overflow-hidden" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <button class="faq-trigger w-full flex items-center justify-between gap-4 px-6 py-5 text-left" aria-expanded="false">
                    <span class="flex items-center gap-4">
                        <span class="faq-num flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold text-blue-400" style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.2);">02</span>
                        <span class="text-white font-semibold text-[15px] leading-snug">Can I self-host it on my own server?</span>
                    </span>
                    <span class="faq-chevron flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center transition-transform duration-300" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.08);">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="faq-body" style="max-height: 0; overflow: hidden; transition: max-height 0.38s cubic-bezier(0.4,0,0.2,1);">
                    <div class="px-6 pb-6 pl-[4.25rem]">
                        <p class="text-gray-400 text-[14px] leading-relaxed">Absolutely. LimoSchedule is built to be self-hosted on any VPS, dedicated server, or cloud provider &mdash; AWS, DigitalOcean, Hetzner, or your own hardware. You get complete control over your environment, database, and backups. <span class="text-white font-medium">No vendor dependency whatsoever.</span></p>
                    </div>
                </div>
            </div>

            <!-- Q3 -->
            <div class="faq-item rounded-2xl overflow-hidden" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <button class="faq-trigger w-full flex items-center justify-between gap-4 px-6 py-5 text-left" aria-expanded="false">
                    <span class="flex items-center gap-4">
                        <span class="faq-num flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold text-blue-400" style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.2);">03</span>
                        <span class="text-white font-semibold text-[15px] leading-snug">Can I white-label it for my clients?</span>
                    </span>
                    <span class="faq-chevron flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center transition-transform duration-300" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.08);">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="faq-body" style="max-height: 0; overflow: hidden; transition: max-height 0.38s cubic-bezier(0.4,0,0.2,1);">
                    <div class="px-6 pb-6 pl-[4.25rem]">
                        <p class="text-gray-400 text-[14px] leading-relaxed">Yes &mdash; LimoSchedule is fully white-label ready. Replace the logo, colors, domain, and product name to match any limo or transportation brand. Agencies and developers can <span class="text-white font-medium">deploy it under their own brand</span> for multiple clients under a single license. Full white-label &amp; branding freedom included.</p>
                    </div>
                </div>
            </div>

            <!-- Q4 -->
            <div class="faq-item rounded-2xl overflow-hidden" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <button class="faq-trigger w-full flex items-center justify-between gap-4 px-6 py-5 text-left" aria-expanded="false">
                    <span class="flex items-center gap-4">
                        <span class="faq-num flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold text-blue-400" style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.2);">04</span>
                        <span class="text-white font-semibold text-[15px] leading-snug">Is the AI Voice Agent included?</span>
                    </span>
                    <span class="faq-chevron flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center transition-transform duration-300" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.08);">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="faq-body" style="max-height: 0; overflow: hidden; transition: max-height 0.38s cubic-bezier(0.4,0,0.2,1);">
                    <div class="px-6 pb-6 pl-[4.25rem]">
                        <p class="text-gray-400 text-[14px] leading-relaxed">Yes. The <span class="text-white font-medium">AI Voice Call Agent</span> is built into the platform &mdash; it answers inbound calls, qualifies leads, collects booking details, and confirms reservations automatically, 24/7. You connect your own AI provider keys (OpenAI, ElevenLabs, or compatible) so you pay usage costs directly, with no markup from us.</p>
                    </div>
                </div>
            </div>

            <!-- Q5 -->
            <div class="faq-item rounded-2xl overflow-hidden" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <button class="faq-trigger w-full flex items-center justify-between gap-4 px-6 py-5 text-left" aria-expanded="false">
                    <span class="flex items-center gap-4">
                        <span class="faq-num flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold text-blue-400" style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.2);">05</span>
                        <span class="text-white font-semibold text-[15px] leading-snug">How fast is the installation process?</span>
                    </span>
                    <span class="faq-chevron flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center transition-transform duration-300" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.08);">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="faq-body" style="max-height: 0; overflow: hidden; transition: max-height 0.38s cubic-bezier(0.4,0,0.2,1);">
                    <div class="px-6 pb-6 pl-[4.25rem]">
                        <p class="text-gray-400 text-[14px] leading-relaxed">Most installs go live in <span class="text-white font-medium">under 30 minutes</span>. Upload the files, configure your <code class="text-blue-400 text-[13px] px-1.5 py-0.5 rounded" style="background: rgba(59,130,246,0.1);">.env</code>, run the installer, and you're done. The step-by-step documentation covers every major hosting environment. No developer experience required &mdash; if you can set up a WordPress site, you can install LimoSchedule.</p>
                    </div>
                </div>
            </div>

        </div><!-- /accordion -->

        <!-- Bottom nudge -->
        <div class="mt-14 text-center section-fade" style="transition-delay: 0.22s;">
            <p class="text-gray-500 text-[13px] mb-5">Still have questions? We respond within a few hours.</p>
            <a href="#contact" class="btn-cta inline-flex items-center gap-2.5 px-7 py-3.5 rounded-xl font-semibold text-[14px] text-white" style="background: #3B82F6;">
                <span>Talk to the team</span>
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
        </div>

    </div><!-- /container -->
</section>
<!-- â•â•â•â• END FAQ â•â•â•â• -->


<!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
     SECTION &mdash; CONTACT / LEAD GENERATION
â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
<section id="contact" class="relative py-28 lg:py-36 overflow-hidden" style="background: #0A0A0A;">

    <!-- Grid texture -->
    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(255,255,255,0.018) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.018) 1px, transparent 1px); background-size: 60px 60px;"></div>

    <!-- Left ambient glow -->
    <div class="absolute top-1/2 left-0 w-[650px] h-[650px] rounded-full pointer-events-none" style="background: radial-gradient(ellipse at center, rgba(59,130,246,0.07) 0%, transparent 65%); transform: translateY(-50%) translateX(-35%);"></div>

    <!-- Right ambient glow -->
    <div class="absolute top-1/2 right-0 w-[500px] h-[500px] rounded-full pointer-events-none" style="background: radial-gradient(ellipse at center, rgba(59,130,246,0.04) 0%, transparent 65%); transform: translateY(-50%) translateX(35%);"></div>

    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 relative z-10">

        <div class="grid grid-cols-1 lg:grid-cols-[1fr_1.1fr] gap-12 lg:gap-14 xl:gap-20 items-start">

            <!-- â•â• LEFT: Value Proposition â•â• -->
            <div class="lg:pt-3 section-fade">

                <!-- Badge -->
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-[11px] font-bold tracking-[0.1em] uppercase mb-6" style="background: rgba(239,68,68,0.08); border: 1px solid rgba(239,68,68,0.25); color: #ef4444;">
                    <span class="relative flex h-2 w-2 flex-shrink-0">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                    </span>
                    Limited Licenses Available &mdash; Act Now
                </div>

                <!-- Headline -->
                <h2 class="text-[30px] sm:text-[36px] lg:text-[40px] xl:text-[46px] font-bold leading-[1.12] tracking-tight text-white mb-5">
                    Stop Losing Bookings.<br>Get the System That<br>
                    <span style="background: linear-gradient(135deg, #ffffff 20%, #3B82F6 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Runs Itself.</span>
                </h2>

                <p class="text-[15px] text-gray-400 leading-relaxed mb-6 max-w-[420px]">
                    Cheaper than hiring a dispatcher. Cheaper than building custom software. Cheaper than losing one more month of bookings to manual chaos.
                </p>

                <!-- WhatsApp contact option -->
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

                <!-- Price callout -->
                <div class="inline-flex items-center gap-3 mb-9 px-5 py-3 rounded-2xl" style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.25);">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><circle cx="7.5" cy="15.5" r="5.5"/><path d="M21 2l-9.6 9.6"/><path d="M15.5 7.5l3 3L22 7l-3-3"/></svg>
                    <span class="text-[13px] font-semibold text-white">One-Time License</span>
                    <span class="w-px h-4 bg-white/15"></span>
                    <span class="text-[22px] font-black text-blue-400 leading-none">$1,999</span>
                    <span class="text-[11px] font-bold text-gray-500 uppercase tracking-wider">Fixed</span>
                </div>

                <!-- Trust points -->
                <div class="space-y-4 mb-9">

                    <div class="contact-trust-item">
                        <div class="contact-trust-icon">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        </div>
                        <div>
                            <div class="text-[13.5px] font-semibold text-white leading-snug">One-time license &mdash; no subscriptions</div>
                            <div class="text-[12px] text-gray-500 mt-0.5">Pay once, use forever. Zero recurring charges.</div>
                        </div>
                    </div>

                    <div class="contact-trust-item">
                        <div class="contact-trust-icon">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><rect x="2" y="2" width="20" height="8" rx="2"/><rect x="2" y="14" width="20" height="8" rx="2"/><line x1="6" y1="6" x2="6.01" y2="6"/><line x1="6" y1="18" x2="6.01" y2="18"/></svg>
                        </div>
                        <div>
                            <div class="text-[13.5px] font-semibold text-white leading-snug">Fully self-hosted on your own server</div>
                            <div class="text-[12px] text-gray-500 mt-0.5">Your data, your infrastructure, your complete control.</div>
                        </div>
                    </div>

                    <div class="contact-trust-item">
                        <div class="contact-trust-icon">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                        </div>
                        <div>
                            <div class="text-[13.5px] font-semibold text-white leading-snug">Complete source code included</div>
                            <div class="text-[12px] text-gray-500 mt-0.5">Modify, extend, and white-label without restriction.</div>
                        </div>
                    </div>

                    <div class="contact-trust-item">
                        <div class="contact-trust-icon">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>
                        </div>
                        <div>
                            <div class="text-[13.5px] font-semibold text-white leading-snug">White-label branding freedom</div>
                            <div class="text-[12px] text-gray-500 mt-0.5">Full white-label customization allowed. Deploy as your own brand.</div>
                        </div>
                    </div>

                </div>

                <!-- Stats row -->
                <div class="flex items-center gap-6 pt-7" style="border-top: 1px solid rgba(255,255,255,0.07);">
                    <div>
                        <div class="text-[24px] font-bold text-white leading-none">30 min</div>
                        <div class="text-[11.5px] text-gray-500 mt-1">Avg. setup time</div>
                    </div>
                    <div class="w-px h-9 flex-shrink-0" style="background: rgba(255,255,255,0.08);"></div>
                    <div>
                        <div class="text-[24px] font-bold text-white leading-none">100%</div>
                        <div class="text-[11.5px] text-gray-500 mt-1">Source code access</div>
                    </div>
                    <div class="w-px h-9 flex-shrink-0" style="background: rgba(255,255,255,0.08);"></div>
                    <div>
                        <div class="text-[24px] font-bold text-white leading-none">&infin;</div>
                        <div class="text-[11.5px] text-gray-500 mt-1">Bookings / month</div>
                    </div>
                </div>

            </div><!-- /left -->

            <!-- â•â• RIGHT: Form Card â•â• -->
            <div class="section-fade" style="transition-delay: 0.12s;">
                <div class="contact-form-card">

                    <!-- Form header -->
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

                    <!-- Form wrap (hidden when success shown) -->
                    <div id="cfFormWrap" class="relative z-10">
                        <form id="contactForm" action="{{ route('demo.store') }}" method="POST" class="space-y-4">
                            @csrf

                            <!-- Row 1: Name + Company -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="contact-label" for="cf_name">
                                        <span class="inline-flex items-center gap-1.5">
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                            Full Name <span class="text-blue-500 ml-0.5">*</span>
                                        </span>
                                    </label>
                                    <input type="text" id="cf_name" name="name" class="contact-input" placeholder="John Smith" autocomplete="name" required>
                                </div>
                                <div>
                                    <label class="contact-label" for="cf_company">
                                        <span class="inline-flex items-center gap-1.5">
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg>
                                            Company
                                        </span>
                                    </label>
                                    <input type="text" id="cf_company" name="company" class="contact-input" placeholder="Acme Limo Co." autocomplete="organization">
                                </div>
                            </div>

                            <!-- Row 2: Email + WhatsApp -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="contact-label" for="cf_email">
                                        <span class="inline-flex items-center gap-1.5">
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                                            Email Address <span class="text-blue-500 ml-0.5">*</span>
                                        </span>
                                    </label>
                                    <input type="email" id="cf_email" name="email" class="contact-input" placeholder="john@example.com" autocomplete="email" required>
                                </div>
                                <div>
                                    <label class="contact-label" for="cf_whatsapp">
                                        <span class="inline-flex items-center gap-1.5">
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"/></svg>
                                            WhatsApp
                                        </span>
                                    </label>
                                    <input type="tel" id="cf_whatsapp" name="whatsapp" class="contact-input" placeholder="+1 (555) 000-0000" autocomplete="tel">
                                </div>
                            </div>

                            <!-- Row 3: Country + Total Employees -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="contact-label" for="cf_country">
                                        <span class="inline-flex items-center gap-1.5">
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 010 20M12 2a15.3 15.3 0 000 20"/></svg>
                                            Country <span class="text-blue-500 ml-0.5">*</span>
                                        </span>
                                    </label>
                                    <select id="cf_country" name="country" required>
                                        <option value="">Select your country&hellip;</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->name }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="contact-label" for="cf_employees">
                                        <span class="inline-flex items-center gap-1.5">
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
                                            Total Employees <span class="text-blue-500 ml-0.5">*</span>
                                        </span>
                                    </label>
                                    <select id="cf_employees" name="total_employees" class="contact-input contact-select" required>
                                        <option value="" disabled selected style="background:#111111;">Select range&hellip;</option>
                                        <option value="1-5"    style="background:#111111;">1 &ndash; 5</option>
                                        <option value="6-10"   style="background:#111111;">6 &ndash; 10</option>
                                        <option value="11-25"  style="background:#111111;">11 &ndash; 25</option>
                                        <option value="26-50"  style="background:#111111;">26 &ndash; 50</option>
                                        <option value="51-100" style="background:#111111;">51 &ndash; 100</option>
                                        <option value="100+"   style="background:#111111;">100+</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Row 4: Budget -->
                            <div>
                                <label class="contact-label" for="cf_budget">
                                    <span class="inline-flex items-center gap-1.5">
                                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg>
                                        System Setup Budget <span class="text-blue-500 ml-0.5">*</span>
                                    </span>
                                </label>
                                <select id="cf_budget" name="budget" class="contact-input contact-select" required>
                                    <option value="" disabled selected style="background:#111111;">What is your budget?&hellip;</option>
                                    <option value="$1500" style="background:#111111;">$1,500</option>
                                    <option value="$2500" style="background:#111111;">$2,500</option>
                                    <option value="$5000" style="background:#111111;">$5,000</option>
                                </select>
                            </div>

                            <!-- Row 4: Message -->
                            <div>
                                <label class="contact-label" for="cf_message">
                                    <span class="inline-flex items-center gap-1.5">
                                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
                                        Message
                                    </span>
                                </label>
                                <textarea id="cf_message" name="message" class="contact-input" rows="4" placeholder="Tell us about your limo business and what you're looking to build&hellip;" style="resize: vertical; min-height: 112px;"></textarea>
                            </div>

                            <!-- Submit -->
                            <div class="pt-1">
                                <button type="submit" id="cfSubmitBtn" class="btn-cta w-full flex items-center justify-center gap-2.5 px-6 py-[14px] rounded-xl font-bold text-[15px] text-white" style="background: linear-gradient(135deg, #1d4ed8, #3B82F6); box-shadow: 0 4px 24px rgba(59,130,246,0.4);">
                                    <span>Get My Private Demo &mdash; $1,999 One-Time</span>
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                                </button>
                                <p class="text-center text-[11.5px] text-gray-600 mt-2.5">No obligation Â· We respond within 4 hours Â· 100% private</p>
                            </div>

                        </form>
                    </div><!-- /cfFormWrap -->

                    <!-- Success state (hidden by default) -->
                    <div id="cfSuccess" class="hidden relative z-10 text-center py-6">
                        <div class="w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-5" style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.3);">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        </div>
                        <h4 class="text-[18px] font-bold text-white mb-2">Request Sent!</h4>
                        <p class="text-[13.5px] text-gray-400 max-w-[280px] mx-auto">We've received your request and will get back to you within 24 hours.</p>
                    </div>

                    <!-- Privacy note -->
                    <div class="mt-5 flex items-center justify-center gap-1.5 text-[11.5px] text-gray-600 relative z-10">
                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
                        Your information is private and never shared with third parties.
                    </div>

                </div><!-- /contact-form-card -->
            </div><!-- /right -->

        </div><!-- /grid -->
    </div><!-- /container -->

</section>
<!-- â•â•â•â• END CONTACT â•â•â•â• -->


<!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
     SECTION &mdash; FINAL CTA
â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
<section id="cta-final" class="relative overflow-hidden" style="background: #0A0A0A; padding: 120px 0 140px;">

    <!-- Grid texture -->
    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(255,255,255,0.016) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.016) 1px, transparent 1px); background-size: 60px 60px;"></div>

    <!-- Top separator line -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-px" style="background: linear-gradient(90deg, transparent, rgba(59,130,246,0.4), transparent);"></div>

    <!-- Massive center glow -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[900px] h-[600px] pointer-events-none" style="background: radial-gradient(ellipse at 50% 0%, rgba(59,130,246,0.18) 0%, rgba(59,130,246,0.06) 40%, transparent 70%);"></div>

    <!-- Noise overlay -->
    <div class="absolute inset-0 pointer-events-none opacity-[0.025]" style="background-image: url(&quot;data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)'/%3E%3C/svg%3E&quot;);"></div>

    <div class="max-w-5xl mx-auto px-5 sm:px-6 lg:px-8 relative z-10 text-center">

        <!-- Eyebrow badge -->
        <div class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full text-[11px] font-bold tracking-[0.12em] uppercase mb-8 section-fade" style="background: rgba(239,68,68,0.08); border: 1px solid rgba(239,68,68,0.3); color: #ef4444;">
            <span class="relative flex h-2 w-2 flex-shrink-0">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
            </span>
            Limited Licenses Available &mdash; Don't Miss Your Spot
        </div>

        <!-- Headline -->
        <h2 class="font-bold text-white leading-[1.08] tracking-tight mb-6 section-fade" style="font-size: clamp(2.4rem, 5.5vw, 4.25rem); letter-spacing: -0.035em; transition-delay: 0.06s;">
            Your competitors won't wait.<br>
            <span style="background: linear-gradient(135deg, #ffffff 0%, #93c5fd 50%, #3B82F6 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Neither should you.</span>
        </h2>

        <!-- Value comparison table -->
        <div class="max-w-2xl mx-auto mb-10 section-fade" style="transition-delay: 0.09s;">
            <div class="grid grid-cols-3 rounded-2xl overflow-hidden text-[12.5px]" style="border: 1px solid rgba(255,255,255,0.08); background: rgba(255,255,255,0.02);">
                <div class="px-4 py-3 font-bold text-gray-500 border-b" style="border-color: rgba(255,255,255,0.06);"></div>
                <div class="px-4 py-3 text-center font-bold text-gray-500 border-b border-l" style="border-color: rgba(255,255,255,0.06);">Others</div>
                <div class="px-4 py-3 text-center font-bold text-blue-400 border-b border-l" style="border-color: rgba(59,130,246,0.2); background: rgba(59,130,246,0.05);">LimoSchedule</div>

                <div class="px-4 py-2.5 text-gray-400 border-b" style="border-color: rgba(255,255,255,0.05);">Full-time dispatcher</div>
                <div class="px-4 py-2.5 text-center text-red-400 border-b border-l" style="border-color: rgba(255,255,255,0.05);">~$45,000/yr</div>
                <div class="px-4 py-2.5 text-center text-green-400 font-bold border-b border-l" style="border-color: rgba(59,130,246,0.15); background: rgba(59,130,246,0.03);">Not needed</div>

                <div class="px-4 py-2.5 text-gray-400 border-b" style="border-color: rgba(255,255,255,0.05);">Custom dev build</div>
                <div class="px-4 py-2.5 text-center text-red-400 border-b border-l" style="border-color: rgba(255,255,255,0.05);">$10k&ndash;$15k</div>
                <div class="px-4 py-2.5 text-center text-green-400 font-bold border-b border-l" style="border-color: rgba(59,130,246,0.15); background: rgba(59,130,246,0.03);">Included</div>

                <div class="px-4 py-2.5 text-gray-400 border-b" style="border-color: rgba(255,255,255,0.05);">SaaS booking platform</div>
                <div class="px-4 py-2.5 text-center text-red-400 border-b border-l" style="border-color: rgba(255,255,255,0.05);">$300&ndash;$1,000/mo</div>
                <div class="px-4 py-2.5 text-center text-green-400 font-bold border-b border-l" style="border-color: rgba(59,130,246,0.15); background: rgba(59,130,246,0.03);">$0/mo forever</div>

                <div class="px-4 py-2.5 text-gray-400 border-b" style="border-color: rgba(255,255,255,0.05);">Lost bookings (monthly)</div>
                <div class="px-4 py-2.5 text-center text-red-400 border-b border-l" style="border-color: rgba(255,255,255,0.05);">$2,000+</div>
                <div class="px-4 py-2.5 text-center text-green-400 font-bold border-b border-l" style="border-color: rgba(59,130,246,0.15); background: rgba(59,130,246,0.03);">Eliminated</div>

                <div class="px-4 py-3 text-white font-bold">LimoSchedule</div>
                <div class="px-4 py-3 text-center text-red-400 font-bold border-l" style="border-color: rgba(255,255,255,0.05);">All of the above</div>
                <div class="px-4 py-3 text-center font-black text-blue-400 text-[16px] border-l" style="border-color: rgba(59,130,246,0.2); background: rgba(59,130,246,0.05);">$1,999 once</div>
            </div>
            <p class="text-center text-gray-600 text-[11.5px] mt-3">Pay once. Own it forever. The system pays for itself in the first month.</p>
        </div>

        <!-- CTA Buttons &mdash; WhatsApp DOMINANT -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-10 section-fade" style="transition-delay: 0.18s;">

            <!-- Primary: WhatsApp -->
            <a href="https://wa.me/923460820722?text=Hi%2C%20I%27m%20interested%20in%20LimoSchedule.%20Can%20you%20show%20me%20a%20live%20demo%3F" target="_blank" rel="noopener"
               class="wa-hero-cta group inline-flex items-center gap-3 px-8 py-4 rounded-2xl font-bold text-[15px] text-white"
               style="background: linear-gradient(135deg, #16a34a, #22c55e); animation: wa-pulse-glow 2.5s ease-in-out infinite;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M11.99 0C5.376 0 0 5.373 0 11.988c0 2.104.549 4.14 1.595 5.945L0 24l6.335-1.652A11.981 11.981 0 0011.99 24C18.604 24 24 18.627 24 12.012 24 5.373 18.604 0 11.99 0zm.01 21.823a9.886 9.886 0 01-5.03-1.372l-.362-.214-3.762.981.999-3.649-.235-.374a9.837 9.837 0 01-1.511-5.195c0-5.452 4.443-9.893 9.901-9.893 5.452 0 9.895 4.441 9.895 9.893 0 5.452-4.443 9.823-9.895 9.823z"/></svg>
                <span>Message Us Now &mdash; Instant Response</span>
            </a>

            <!-- Secondary: Request Demo -->
            <a href="#contact" class="cta-final-btn-primary group relative inline-flex items-center gap-3 px-8 py-4 rounded-2xl font-semibold text-[15px] text-white overflow-hidden" style="background: #3B82F6; box-shadow: 0 0 0 1px rgba(59,130,246,0.5), 0 8px 32px rgba(59,130,246,0.35);">
                <span class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300" style="background: linear-gradient(135deg, #2563EB, #3B82F6);"></span>
                <svg class="relative z-10 flex-shrink-0" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><circle cx="7.5" cy="15.5" r="5.5"/><path d="M21 2l-9.6 9.6"/><path d="M15.5 7.5l3 3L22 7l-3-3"/></svg>
                <span class="relative z-10">Request Private Demo</span>
            </a>
        </div>

        <!-- Trust strip -->
        <div class="flex flex-wrap items-center justify-center gap-x-8 gap-y-3 section-fade" style="transition-delay: 0.24s;">
            <div class="flex items-center gap-2 text-gray-500 text-[12.5px]">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2.2" stroke-linecap="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                No monthly fees
            </div>
            <div class="w-px h-3.5 bg-white/10 hidden sm:block"></div>
            <div class="flex items-center gap-2 text-gray-500 text-[12.5px]">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2.2" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>
                Full source code included
            </div>
            <div class="w-px h-3.5 bg-white/10 hidden sm:block"></div>
            <div class="flex items-center gap-2 text-gray-500 text-[12.5px]">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2.2" stroke-linecap="round"><circle cx="12" cy="12" r="3"/><path d="M12 1v4M12 19v4M4.22 4.22l2.83 2.83M16.95 16.95l2.83 2.83M1 12h4M19 12h4M4.22 19.78l2.83-2.83M16.95 7.05l2.83-2.83"/></svg>
                Self-hosted & private
            </div>
            <div class="w-px h-3.5 bg-white/10 hidden sm:block"></div>
            <div class="flex items-center gap-2 text-gray-500 text-[12.5px]">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2.2" stroke-linecap="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                White-label branding freedom
            </div>
        </div>

        <!-- Stats row -->
        <div class="mt-16 pt-12 grid grid-cols-2 sm:grid-cols-4 gap-6 section-fade" style="border-top: 1px solid rgba(255,255,255,0.05); transition-delay: 0.3s;">
            <div class="text-center">
                <div class="text-2xl sm:text-3xl font-bold text-white mb-1" style="letter-spacing: -0.03em;">30<span class="text-blue-400">min</span></div>
                <div class="text-[11.5px] text-gray-500 uppercase tracking-wider">Install time</div>
            </div>
            <div class="text-center">
                <div class="text-2xl sm:text-3xl font-bold text-white mb-1" style="letter-spacing: -0.03em;">100<span class="text-blue-400">%</span></div>
                <div class="text-[11.5px] text-gray-500 uppercase tracking-wider">White-label</div>
            </div>
            <div class="text-center">
                <div class="text-2xl sm:text-3xl font-bold text-white mb-1" style="letter-spacing: -0.03em;">0<span class="text-blue-400">$</span></div>
                <div class="text-[11.5px] text-gray-500 uppercase tracking-wider">Monthly fee</div>
            </div>
            <div class="text-center">
                <div class="text-2xl sm:text-3xl font-bold text-white mb-1" style="letter-spacing: -0.03em;">24<span class="text-blue-400">/7</span></div>
                <div class="text-[11.5px] text-gray-500 uppercase tracking-wider">AI Voice Agent</div>
            </div>
        </div>

    </div><!-- /container -->
</section>
<!-- â•â•â•â• END FINAL CTA â•â•â•â• -->


<!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
     FOOTER
â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
<footer id="footer" class="relative" style="background: #070707; border-top: 1px solid rgba(255,255,255,0.06);">

    <!-- Subtle top glow line -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[500px] h-px pointer-events-none" style="background: linear-gradient(90deg, transparent, rgba(59,130,246,0.3), transparent);"></div>

    <!-- Grid texture -->
    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(255,255,255,0.012) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.012) 1px, transparent 1px); background-size: 60px 60px;"></div>

    <!-- Footer inner -->
    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">

        <!-- â”€â”€ Top block: logo + columns â”€â”€ -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-[1.8fr_1fr_1fr] gap-10 lg:gap-8 pt-16 pb-12">

            <!-- Brand column -->
            <div class="flex flex-col gap-6">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="inline-block" aria-label="LimoSchedule &mdash; Home">
                    <div class="logo-badge rounded-xl px-3 py-[7px] inline-flex">
                        <img
                            src="{{ url('public/logo/logo-white.png') }}"
                            alt="LimoSchedule"
                            class="h-[30px] w-auto block"
                            loading="lazy"
                            decoding="async"
                        >
                    </div>
                </a>

                <p class="text-gray-500 text-[13.5px] leading-relaxed max-w-[270px]">
                    The professional self-hosted limo booking platform. One-time license &mdash; $1,999 fixed. Full source code. Zero recurring fees.
                </p>


            </div>

            <!-- Product column -->
            <div>
                <h4 class="text-[11px] font-bold uppercase tracking-[0.12em] text-gray-600 mb-5">Product</h4>
                <ul class="flex flex-col gap-3.5">
                    <li><a href="#features" class="footer-nav-link text-gray-400 hover:text-white text-[13.5px] transition-colors duration-200">Features</a></li>
                    <li><a href="#voice-search" class="footer-nav-link text-gray-400 hover:text-white text-[13.5px] transition-colors duration-200">Voice Search</a></li>
                    <li><a href="#ai-call-agent" class="footer-nav-link text-gray-400 hover:text-white text-[13.5px] transition-colors duration-200">AI Voice Agent</a></li>
                    <li><a href="#admin-panel" class="footer-nav-link text-gray-400 hover:text-white text-[13.5px] transition-colors duration-200">Admin Panel</a></li>
                    <li><a href="#how-it-works" class="footer-nav-link text-gray-400 hover:text-white text-[13.5px] transition-colors duration-200">How It Works</a></li>
                </ul>
            </div>

            <!-- Company column -->
            <div>
                <h4 class="text-[11px] font-bold uppercase tracking-[0.12em] text-gray-600 mb-5">Company</h4>
                <ul class="flex flex-col gap-3.5 mb-6">
                    <li><a href="#faq" class="footer-nav-link text-gray-400 hover:text-white text-[13.5px] transition-colors duration-200">FAQ</a></li>
                    <li><a href="#contact" class="footer-nav-link text-gray-400 hover:text-white text-[13.5px] transition-colors duration-200">Contact</a></li>
                    <li><a href="{{ route('blogs.index') }}" class="footer-nav-link text-gray-400 hover:text-white text-[13.5px] transition-colors duration-200">Blog</a></li>
                </ul>
                <div class="flex flex-col gap-3">
                    <a href="mailto:support@limoschedule.com" class="footer-contact-link group inline-flex items-center gap-3 text-gray-400 hover:text-white text-[13px] transition-colors duration-200">
                        <span class="w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0 transition-colors duration-200 group-hover:border-blue-500/40 group-hover:bg-blue-500/10" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08);">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        </span>
                        support@limoschedule.com
                    </a>
                    <a href="https://wa.me/923460820722?text=Hi%2C%20I%27m%20interested%20in%20LimoSchedule%20%E2%80%94%20the%20self-hosted%20limo%20booking%20system.%20Can%20you%20please%20provide%20more%20details%3F" target="_blank" rel="noopener" class="footer-contact-link group inline-flex items-center gap-3 text-gray-400 hover:text-white text-[13px] transition-colors duration-200">
                        <span class="w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0 transition-colors duration-200 group-hover:border-green-500/40 group-hover:bg-green-500/10" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08);">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                        </span>
                        +92 346 0820722
                    </a>
                </div>
            </div>

        </div><!-- /grid -->

        <!-- â”€â”€ Divider â”€â”€ -->
        <div class="h-px w-full" style="background: linear-gradient(90deg, transparent, rgba(255,255,255,0.07) 30%, rgba(255,255,255,0.07) 70%, transparent);"></div>

        <!-- â”€â”€ Bottom bar â”€â”€ -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 py-7">

            <!-- Copyright -->
            <p class="text-gray-600 text-[12.5px] text-center sm:text-left">
                &copy; {{ date('Y') }} LimoSchedule. All rights reserved. Self-hosted &amp; white-label limo booking software.
            </p>

            <!-- Made with / badges -->
            <div class="flex items-center gap-4">
                <span class="inline-flex items-center gap-1.5 text-gray-600 text-[12px]">
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="#3B82F6"><path d="M12 21.593c-5.63-5.539-11-10.297-11-14.402 0-3.791 3.068-5.191 5.281-5.191 1.312 0 4.151.501 5.719 4.457 1.59-3.968 4.464-4.447 5.726-4.447 2.54 0 5.274 1.621 5.274 5.181 0 4.069-5.136 8.625-11 14.402z"/></svg>
                    Built for operators, by operators
                </span>
                <span class="w-px h-3.5 bg-white/8"></span>
                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-[11px] font-medium text-blue-400" style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.15);">
                    v2.0 &mdash; Self-Hosted
                </span>
            </div>

        </div><!-- /bottom bar -->

    </div><!-- /inner -->
</footer>
<!-- â•â•â•â• END FOOTER â•â•â•â• -->


<!-- jQuery + Select2 -->
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

    /* Submit: show loading state while form posts */
    $('#contactForm').on('submit', function () {
        var btn = document.getElementById('cfSubmitBtn');
        if (btn) {
            btn.disabled = true;
            btn.querySelector('span').textContent = 'Sending…';
        }
    });
});
</script>

<!-- Main JavaScript -->
<script src="{{ url('public/assets/js/limoschedule.js') }}"></script>


<!-- ════════════════════════════════════════════════════════
     FLOATING WHATSAPP BUTTON (always visible)
═════════════════════════════════════════════════════════ -->
<a href="https://wa.me/923460820722?text=Hi%2C%20I%27m%20interested%20in%20LimoSchedule.%20Can%20you%20show%20me%20a%20live%20demo%3F"
   target="_blank" rel="noopener"
   id="float-wa-btn"
   aria-label="Chat on WhatsApp"
   style="position:fixed;bottom:28px;left:28px;z-index:9000;width:62px;height:62px;border-radius:50%;background:linear-gradient(135deg,#16a34a,#22c55e);display:flex;align-items:center;justify-content:center;box-shadow:0 4px 24px rgba(34,197,94,0.5);animation:wa-float-pulse 2.5s ease-in-out infinite;text-decoration:none;transition:transform 0.2s ease;">
    <svg width="30" height="30" viewBox="0 0 24 24" fill="white"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M11.99 0C5.376 0 0 5.373 0 11.988c0 2.104.549 4.14 1.595 5.945L0 24l6.335-1.652A11.981 11.981 0 0011.99 24C18.604 24 24 18.627 24 12.012 24 5.373 18.604 0 11.99 0zm.01 21.823a9.886 9.886 0 01-5.03-1.372l-.362-.214-3.762.981.999-3.649-.235-.374a9.837 9.837 0 01-1.511-5.195c0-5.452 4.443-9.893 9.901-9.893 5.452 0 9.895 4.441 9.895 9.893 0 5.452-4.443 9.823-9.895 9.823z"/></svg>
    <span id="float-wa-tooltip" style="position:absolute;left:70px;top:50%;transform:translateY(-50%);background:rgba(10,10,10,0.97);border:1px solid rgba(34,197,94,0.3);color:white;font-size:12px;font-weight:700;white-space:nowrap;padding:7px 13px;border-radius:8px;opacity:0;transition:opacity 0.2s ease;pointer-events:none;">Talk to us &mdash; Instant reply</span>
</a>


<!-- ════ CRO Animation & Utility Styles ════ -->
<style>
@keyframes wa-float-pulse {
    0%,100% { box-shadow: 0 4px 24px rgba(34,197,94,0.5), 0 0 0 0 rgba(34,197,94,0.4); }
    50%      { box-shadow: 0 4px 36px rgba(34,197,94,0.7), 0 0 0 14px rgba(34,197,94,0); }
}
@keyframes wa-pulse-glow {
    0%,100% { box-shadow: 0 4px 18px rgba(34,197,94,0.4); }
    50%      { box-shadow: 0 4px 32px rgba(34,197,94,0.7), 0 0 0 8px rgba(34,197,94,0); }
}
.wa-hero-cta { transition: transform 0.2s ease; }
.wa-hero-cta:hover { transform: translateY(-2px); }
#float-wa-btn:hover { transform: scale(1.1) !important; }
#float-wa-btn:hover #float-wa-tooltip { opacity: 1 !important; }
/* Hide floating button on mobile since sticky bar handles it */
@media (max-width: 1279px) { #float-wa-btn { display: none !important; } }
</style>

<script>
// Float WA tooltip on hover
(function(){
    var btn = document.getElementById('float-wa-btn');
    var tip = document.getElementById('float-wa-tooltip');
    if(btn && tip){
        btn.addEventListener('mouseenter', function(){ tip.style.opacity='1'; });
        btn.addEventListener('mouseleave', function(){ tip.style.opacity='0'; });
    }
})();

// Hero audio player
(function(){
    var audio   = document.getElementById('heroAudio');
    var btn     = document.getElementById('heroAudioBtn');
    var playIco = document.getElementById('heroPlayIcon');
    var pausIco = document.getElementById('heroPauseIcon');
    var bars    = document.querySelectorAll('#heroAudioBtn').length ? document.querySelectorAll('.vw-bar') : [];
    if (!audio || !btn) return;

    function setPlaying(playing) {
        playIco.classList.toggle('hidden', playing);
        pausIco.classList.toggle('hidden', !playing);
        bars.forEach(function(b){ b.classList.toggle('playing', playing); });
    }

    btn.addEventListener('click', function(){
        if (audio.paused) { audio.play(); }
        else              { audio.pause(); }
    });

    audio.addEventListener('play',  function(){ setPlaying(true);  });
    audio.addEventListener('pause', function(){ setPlaying(false); });
    audio.addEventListener('ended', function(){ setPlaying(false); });
})();
</script>

</body>
</html>


