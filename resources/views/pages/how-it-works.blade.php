@extends('layouts.public')

@section('content')
<section id="how-it-works" class="relative py-28 lg:py-36 overflow-hidden" style="background: #0A0A0A;">
    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(255,255,255,0.018) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.018) 1px, transparent 1px); background-size: 60px 60px;"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[900px] h-[400px] rounded-full pointer-events-none" style="background: radial-gradient(ellipse at center, rgba(59,130,246,0.055) 0%, transparent 68%);"></div>
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8 relative z-10">
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
        <div class="relative">
            <div class="hiw-connector-line hidden lg:block"></div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 lg:gap-7">
                <div class="hiw-step section-fade" style="transition-delay: 0.06s;">
                    <div class="hiw-step-inner">
                        <div class="flex lg:justify-center mb-6">
                            <div class="hiw-step-icon relative w-[80px] h-[80px] rounded-2xl flex items-center justify-center flex-shrink-0" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.25);">
                                <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="4 17 10 11 4 5"/><line x1="12" y1="19" x2="20" y2="19"/></svg>
                                <span class="absolute -top-2.5 -right-2.5 w-[22px] h-[22px] rounded-full flex items-center justify-center text-[10px] font-bold text-white" style="background: #3B82F6; box-shadow: 0 0 12px rgba(59,130,246,0.65);">1</span>
                            </div>
                        </div>
                        <div class="lg:text-center">
                            <div class="text-[10.5px] font-bold tracking-[0.12em] uppercase text-blue-500 mb-2">Step 01</div>
                            <h3 class="text-[18px] sm:text-[19px] font-bold text-white mb-3 leading-tight">Install in 30 Minutes</h3>
                            <p class="text-[13.5px] text-gray-400 leading-relaxed mb-5">Upload the files to your server, run the web installer, and your limo booking system is live. No DevOps expertise required.</p>
                            <div class="space-y-2.5 lg:inline-flex lg:flex-col lg:items-start">
                                <div class="flex items-center gap-2.5 text-[12px] text-gray-500"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>Works on any PHP / MySQL hosting</div>
                                <div class="flex items-center gap-2.5 text-[12px] text-gray-500"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>One-click web installer included</div>
                                <div class="flex items-center gap-2.5 text-[12px] text-gray-500"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>Full setup documentation provided</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hiw-step section-fade" style="transition-delay: 0.16s;">
                    <div class="hiw-step-inner">
                        <div class="flex lg:justify-center mb-6">
                            <div class="hiw-step-icon relative w-[80px] h-[80px] rounded-2xl flex items-center justify-center flex-shrink-0" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.25);">
                                <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><line x1="4" y1="21" x2="4" y2="14"/><line x1="4" y1="10" x2="4" y2="3"/><line x1="12" y1="21" x2="12" y2="12"/><line x1="12" y1="8" x2="12" y2="3"/><line x1="20" y1="21" x2="20" y2="16"/><line x1="20" y1="12" x2="20" y2="3"/><line x1="1" y1="14" x2="7" y2="14"/><line x1="9" y1="8" x2="15" y2="8"/><line x1="17" y1="16" x2="23" y2="16"/></svg>
                                <span class="absolute -top-2.5 -right-2.5 w-[22px] h-[22px] rounded-full flex items-center justify-center text-[10px] font-bold text-white" style="background: #3B82F6; box-shadow: 0 0 12px rgba(59,130,246,0.65);">2</span>
                            </div>
                        </div>
                        <div class="lg:text-center">
                            <div class="text-[10.5px] font-bold tracking-[0.12em] uppercase text-blue-500 mb-2">Step 02</div>
                            <h3 class="text-[18px] sm:text-[19px] font-bold text-white mb-3 leading-tight">Setup Branding &amp; Pricing</h3>
                            <p class="text-[13.5px] text-gray-400 leading-relaxed mb-5">Upload your logo, set brand colors, configure vehicle classes, and define all pricing rules &mdash; straight from the admin panel.</p>
                            <div class="space-y-2.5 lg:inline-flex lg:flex-col lg:items-start">
                                <div class="flex items-center gap-2.5 text-[12px] text-gray-500"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>Full white-label &mdash; your brand &amp; domain</div>
                                <div class="flex items-center gap-2.5 text-[12px] text-gray-500"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>Custom vehicle classes &amp; fare rules</div>
                                <div class="flex items-center gap-2.5 text-[12px] text-gray-500"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>Dynamic surge pricing controls</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hiw-step section-fade" style="transition-delay: 0.26s;">
                    <div class="hiw-step-inner">
                        <div class="flex lg:justify-center mb-6">
                            <div class="hiw-step-icon relative w-[80px] h-[80px] rounded-2xl flex items-center justify-center flex-shrink-0" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.25);">
                                <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                                <span class="absolute -top-2.5 -right-2.5 w-[22px] h-[22px] rounded-full flex items-center justify-center text-[10px] font-bold text-white" style="background: #3B82F6; box-shadow: 0 0 12px rgba(59,130,246,0.65);">3</span>
                            </div>
                        </div>
                        <div class="lg:text-center">
                            <div class="text-[10.5px] font-bold tracking-[0.12em] uppercase text-blue-500 mb-2">Step 03</div>
                            <h3 class="text-[18px] sm:text-[19px] font-bold text-white mb-3 leading-tight">Start Taking Bookings</h3>
                            <p class="text-[13.5px] text-gray-400 leading-relaxed mb-5">Customers book online, pay instantly, and receive AI confirmation calls &mdash; while you manage everything from one clean dashboard.</p>
                            <div class="space-y-2.5 lg:inline-flex lg:flex-col lg:items-start">
                                <div class="flex items-center gap-2.5 text-[12px] text-gray-500"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>Automated booking confirmations</div>
                                <div class="flex items-center gap-2.5 text-[12px] text-gray-500"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>Driver dispatch &amp; GPS tracking</div>
                                <div class="flex items-center gap-2.5 text-[12px] text-gray-500"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>Payments, invoicing &amp; receipts</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-16 lg:mt-20 flex flex-col items-center gap-5 section-fade" style="transition-delay: 0.36s;">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-[12px] text-gray-400" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08);">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                No subscriptions &nbsp;&middot;&nbsp; No vendor lock-in &nbsp;&middot;&nbsp; Full source code ownership
            </div>
            <div class="flex flex-col sm:flex-row items-center gap-3">
                <a href="{{ route('contact') }}" class="btn-cta inline-flex items-center gap-2.5 px-7 py-3.5 rounded-xl font-semibold text-[14px] text-white" style="background: #3B82F6;">
                    <span>Get LimoSchedule</span>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
                <a href="{{ route('features') }}" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl font-medium text-[14px] text-gray-300 hover:text-white transition-colors duration-200" style="border: 1px solid rgba(255,255,255,0.1);">
                    Explore Features
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
