@extends('layouts.public')

@section('content')
<section id="features" class="relative py-28 lg:py-36 overflow-hidden" style="background: #0A0A0A;">

    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.03) 1px, transparent 1px); background-size: 56px 56px;"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[700px] h-[340px] pointer-events-none"
         style="background: radial-gradient(ellipse at 50% 0%, rgba(59,130,246,0.10) 0%, transparent 70%);"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">

        <div class="text-center max-w-2xl mx-auto mb-16 lg:mb-20 section-fade">
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

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-5">

            <div class="feature-card section-fade" style="transition-delay: 0.05s">
                <div class="feat-icon-wrap">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                </div>
                <h3 class="text-white text-[16px] font-bold mb-2 leading-snug">Open Source Code Access</h3>
                <p class="text-gray-500 text-[13.5px] leading-relaxed pr-8">Full, unencrypted source code delivered with your license. Read, modify, and extend every line &mdash; no runtime fees, no black boxes.</p>
                <div class="feat-arrow"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(59,130,246,0.6)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg></div>
            </div>

            <div class="feature-card section-fade" style="transition-delay: 0.10s">
                <div class="feat-icon-wrap">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                </div>
                <h3 class="text-white text-[16px] font-bold mb-2 leading-snug">White Label System</h3>
                <p class="text-gray-500 text-[13.5px] leading-relaxed pr-8">Replace every trace of our branding with yours. Custom domain, logo, colors, and app name &mdash; zero attribution required.</p>
                <div class="feat-arrow"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(59,130,246,0.6)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg></div>
            </div>

            <div class="feature-card section-fade" style="transition-delay: 0.15s">
                <div class="feat-icon-wrap">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="8" rx="2"/><rect x="2" y="14" width="20" height="8" rx="2"/><line x1="6" y1="6" x2="6.01" y2="6"/><line x1="6" y1="18" x2="6.01" y2="18"/></svg>
                </div>
                <h3 class="text-white text-[16px] font-bold mb-2 leading-snug">Self-Hosted &amp; Private</h3>
                <p class="text-gray-500 text-[13.5px] leading-relaxed pr-8">Deploy on any VPS, dedicated server, or private cloud. Your data, your infrastructure, your rules.</p>
                <div class="feat-arrow"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(59,130,246,0.6)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg></div>
            </div>

            <div class="feature-card section-fade" style="transition-delay: 0.20s">
                <div class="feat-icon-wrap">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                </div>
                <h3 class="text-white text-[16px] font-bold mb-2 leading-snug">30-Min Installation</h3>
                <p class="text-gray-500 text-[13.5px] leading-relaxed pr-8">Our automated installer handles the entire stack. From a blank server to a live, production-ready booking system in under 30 minutes.</p>
                <div class="feat-arrow"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(59,130,246,0.6)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg></div>
            </div>

            <div class="feature-card featured section-fade" style="transition-delay: 0.25s">
                <div class="absolute top-4 right-4">
                    <span class="inline-flex items-center gap-1 text-[10px] font-bold tracking-widest uppercase text-blue-400 px-2 py-0.5 rounded-full" style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.25);">AI-Powered</span>
                </div>
                <div class="feat-icon-wrap" style="background: rgba(59,130,246,0.12); border-color: rgba(59,130,246,0.25);">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2a4 4 0 014 4v1h1a3 3 0 013 3v6a3 3 0 01-3 3H7a3 3 0 01-3-3v-6a3 3 0 013-3h1V6a4 4 0 014-4z"/><circle cx="9" cy="13" r="1" fill="#3B82F6" stroke="none"/><circle cx="15" cy="13" r="1" fill="#3B82F6" stroke="none"/><path d="M9 17s1 1 3 1 3-1 3-1"/></svg>
                </div>
                <h3 class="text-white text-[16px] font-bold mb-2 leading-snug">AI Booking Agent</h3>
                <p class="text-gray-400 text-[13.5px] leading-relaxed pr-8">Intelligent AI agent handles customer enquiries, confirms bookings, upsells upgrades, and optimizes schedules autonomously &mdash; 24/7, zero staff required.</p>
                <div class="feat-arrow"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(59,130,246,0.7)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg></div>
            </div>

            <div class="feature-card featured section-fade" style="transition-delay: 0.30s">
                <div class="absolute top-4 right-4">
                    <span class="inline-flex items-center gap-1 text-[10px] font-bold tracking-widest uppercase text-blue-400 px-2 py-0.5 rounded-full" style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.25);">AI-Powered</span>
                </div>
                <div class="feat-icon-wrap" style="background: rgba(59,130,246,0.12); border-color: rgba(59,130,246,0.25);">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2a3 3 0 00-3 3v7a3 3 0 006 0V5a3 3 0 00-3-3z"/><path d="M19 10v2a7 7 0 01-14 0v-2"/><line x1="12" y1="19" x2="12" y2="23"/><line x1="8" y1="23" x2="16" y2="23"/></svg>
                </div>
                <h3 class="text-white text-[16px] font-bold mb-2 leading-snug">Voice Search Booking</h3>
                <p class="text-gray-400 text-[13.5px] leading-relaxed pr-8">Customers book rides with natural voice commands in any language. No typing, no friction &mdash; just speak the destination and the system handles the rest.</p>
                <div class="feat-arrow"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(59,130,246,0.7)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg></div>
            </div>

            <div class="feature-card section-fade" style="transition-delay: 0.35s">
                <div class="feat-icon-wrap">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><path d="M5 17H3a2 2 0 01-2-2V5a2 2 0 012-2h11a2 2 0 012 2v3"/><rect x="9" y="11" width="14" height="10" rx="2"/><circle cx="12" cy="21" r="1" fill="#3B82F6" stroke="none"/><circle cx="20" cy="21" r="1" fill="#3B82F6" stroke="none"/></svg>
                </div>
                <h3 class="text-white text-[16px] font-bold mb-2 leading-snug">Fleet Management</h3>
                <p class="text-gray-500 text-[13.5px] leading-relaxed pr-8">Real-time vehicle tracking, driver assignment, availability management, and intelligent route optimization across your entire fleet.</p>
                <div class="feat-arrow"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(59,130,246,0.6)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg></div>
            </div>

            <div class="feature-card section-fade" style="transition-delay: 0.40s">
                <div class="feat-icon-wrap">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/></svg>
                </div>
                <h3 class="text-white text-[16px] font-bold mb-2 leading-snug">Admin Control Panel</h3>
                <p class="text-gray-500 text-[13.5px] leading-relaxed pr-8">Comprehensive dashboard for bookings, drivers, pricing rules, revenue reports, and customer management.</p>
                <div class="feat-arrow"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(59,130,246,0.6)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg></div>
            </div>

            <div class="feature-card section-fade" style="transition-delay: 0.45s">
                <div class="feat-icon-wrap">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
                </div>
                <h3 class="text-white text-[16px] font-bold mb-2 leading-snug">Team Management</h3>
                <p class="text-gray-500 text-[13.5px] leading-relaxed pr-8">Role-based access control with granular permissions. Add dispatchers, operators, and support staff with exactly the access level each role requires.</p>
                <div class="feat-arrow"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(59,130,246,0.6)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg></div>
            </div>

        </div>

        <div class="mt-16 flex flex-col items-center gap-5 section-fade" style="transition-delay: 0.5s">
            <p class="text-gray-500 text-sm text-center">All features included in a single one-time license of <span class="text-white font-semibold">$1,999</span>. No monthly fees. No hidden costs. No subscriptions.</p>
            <div class="flex flex-col sm:flex-row items-center gap-3">
                <a href="https://wa.me/923460820722?text=Hi%2C%20I%27m%20interested%20in%20LimoSchedule.%20Can%20you%20show%20me%20a%20live%20demo%3F" target="_blank" rel="noopener"
                   class="wa-hero-cta inline-flex items-center gap-2.5 font-bold px-6 py-3 rounded-xl text-[13.5px] text-white flex-shrink-0"
                   style="background: linear-gradient(135deg, #16a34a, #22c55e); animation: wa-pulse-glow 2.5s ease-in-out infinite;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M11.99 0C5.376 0 0 5.373 0 11.988c0 2.104.549 4.14 1.595 5.945L0 24l6.335-1.652A11.981 11.981 0 0011.99 24C18.604 24 24 18.627 24 12.012 24 5.373 18.604 0 11.99 0zm.01 21.823a9.886 9.886 0 01-5.03-1.372l-.362-.214-3.762.981.999-3.649-.235-.374a9.837 9.837 0 01-1.511-5.195c0-5.452 4.443-9.893 9.901-9.893 5.452 0 9.895 4.441 9.895 9.893 0 5.452-4.443 9.823-9.895 9.823z"/></svg>
                    See Live Admin Panel on WhatsApp
                </a>
                <a href="{{ route('contact') }}"
                   class="btn-cta inline-flex items-center gap-2 bg-[#3B82F6] text-white font-semibold px-6 py-3 rounded-xl text-[13.5px] border border-blue-500/30 flex-shrink-0">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="7.5" cy="15.5" r="5.5"/><path d="M21 2l-9.6 9.6"/><path d="M15.5 7.5l3 3L22 7l-3-3"/></svg>
                    <span>Request Private Demo</span>
                </a>
            </div>
        </div>

    </div>
</section>
@endsection

