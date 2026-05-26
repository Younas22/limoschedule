@extends('layouts.public')

@section('content')
<section id="faq" class="relative py-28 lg:py-36 overflow-hidden" style="background: #0A0A0A;">
    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(255,255,255,0.018) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.018) 1px, transparent 1px); background-size: 60px 60px;"></div>
    <div class="absolute top-1/2 left-1/2 w-[900px] h-[500px] rounded-full pointer-events-none" style="background: radial-gradient(ellipse at center, rgba(59,130,246,0.06) 0%, transparent 65%); transform: translate(-50%, -50%);"></div>
    <div class="max-w-3xl mx-auto px-5 sm:px-6 lg:px-8 relative z-10">
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
        <div class="flex flex-col gap-3 section-fade" style="transition-delay: 0.1s;" id="faq-accordion">
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
                        <p class="text-gray-400 text-[14px] leading-relaxed">Absolutely. LimoSchedule is built to be self-hosted on any VPS, dedicated server, or cloud provider &mdash; AWS, DigitalOcean, Hetzner, or your own hardware. <span class="text-white font-medium">No vendor dependency whatsoever.</span></p>
                    </div>
                </div>
            </div>
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
                        <p class="text-gray-400 text-[14px] leading-relaxed">Yes &mdash; LimoSchedule is fully white-label ready. Agencies and developers can <span class="text-white font-medium">deploy it under their own brand</span> for multiple clients under a single license.</p>
                    </div>
                </div>
            </div>
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
                        <p class="text-gray-400 text-[14px] leading-relaxed">Yes. The <span class="text-white font-medium">AI Voice Call Agent</span> is built into the platform &mdash; it answers inbound calls, qualifies leads, collects booking details, and confirms reservations automatically, 24/7.</p>
                    </div>
                </div>
            </div>
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
                        <p class="text-gray-400 text-[14px] leading-relaxed">Most installs go live in <span class="text-white font-medium">under 30 minutes</span>. Upload the files, configure your <code class="text-blue-400 text-[13px] px-1.5 py-0.5 rounded" style="background: rgba(59,130,246,0.1);">.env</code>, run the installer, and you're done.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-14 text-center section-fade" style="transition-delay: 0.22s;">
            <p class="text-gray-500 text-[13px] mb-5">Still have questions? We respond within a few hours.</p>
            <a href="{{ route('contact') }}" class="btn-cta inline-flex items-center gap-2.5 px-7 py-3.5 rounded-xl font-semibold text-[14px] text-white" style="background: #3B82F6;">
                <span>Talk to the team</span>
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
        </div>
    </div>
</section>
@endsection
