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
        },
        {
            "@@type": "Person",
            "name": "Younas",
            "jobTitle": "Chief Executive Officer",
            "description": "Leads LimoSchedule's strategy and vision for transportation businesses worldwide.",
            "image": "{{ url('public/assets/images/team/team-younas.jpg') }}",
            "worksFor": { "@@id": "{{ url('/') }}#organization" }
        },
        {
            "@@type": "Person",
            "name": "Ayesha Rahman",
            "jobTitle": "Customer Success Manager",
            "description": "Helps transportation businesses get the most out of the LimoSchedule platform.",
            "image": "{{ url('public/assets/images/team/team-ayesha-rahman.jpg') }}",
            "worksFor": { "@@id": "{{ url('/') }}#organization" }
        },
        {
            "@@type": "Person",
            "name": "Emily Carter",
            "jobTitle": "Marketing & Growth Manager",
            "description": "Drives marketing and growth strategy for LimoSchedule.",
            "image": "{{ url('public/assets/images/team/team-emily-carter.jpg') }}",
            "worksFor": { "@@id": "{{ url('/') }}#organization" }
        },
        {
            "@@type": "Person",
            "name": "Sophia Anderson",
            "jobTitle": "Business Development Executive",
            "description": "Builds partnerships and new business opportunities for LimoSchedule.",
            "image": "{{ url('public/assets/images/team/team-sophia-anderson.jpg') }}",
            "worksFor": { "@@id": "{{ url('/') }}#organization" }
        },
        {
            "@@type": "Person",
            "name": "Omar Hassan",
            "jobTitle": "Lead Software Engineer",
            "description": "Leads engineering on the LimoSchedule booking platform.",
            "image": "{{ url('public/assets/images/team/team-omar-hassan.jpg') }}",
            "worksFor": { "@@id": "{{ url('/') }}#organization" }
        },
        {
            "@@type": "Person",
            "name": "Michael Thompson",
            "jobTitle": "Sales & Partnerships Manager",
            "description": "Manages sales and partnership relationships for LimoSchedule.",
            "image": "{{ url('public/assets/images/team/team-michael-thompson.jpg') }}",
            "worksFor": { "@@id": "{{ url('/') }}#organization" }
        },
        {
            "@@type": "FAQPage",
            "mainEntity": [
                { "@@type": "Question", "name": "How can I get in touch with the LimoSchedule team?", "acceptedAnswer": { "@@type": "Answer", "text": "You can reach the LimoSchedule team by email at support@limoschedule.com, by phone, through the contact form, or via WhatsApp." } },
                { "@@type": "Question", "name": "Who do I contact for a demo or general questions?", "acceptedAnswer": { "@@type": "Answer", "text": "Use the contact page to request a demo or ask a general question, or explore the live demo directly to see the platform first." } }
            ]
        }
    ]
}
</script>
@endpush

@section('content')

<!-- ═══════════════════════════════════════════════════════════════
     HERO
═══════════════════════════════════════════════════════════════ -->
<section class="relative overflow-hidden" style="background: #030303;">
@php
    $breadcrumbs = [
        ['label' => 'Home', 'url' => url('/')],
        ['label' => 'Team', 'url' => null],
    ];
@endphp
@include('partials._breadcrumbs')

    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.03) 1px, transparent 1px); background-size: 56px 56px;"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[500px] pointer-events-none" style="background: radial-gradient(ellipse at 50% 0%, rgba(59,130,246,0.12) 0%, transparent 70%);"></div>

    <div class="relative z-10 max-w-4xl mx-auto px-5 sm:px-6 lg:px-8 pt-24 pb-16 lg:pt-32 lg:pb-20 text-center">
        <div class="inline-flex items-center gap-2 mb-6 px-4 py-1.5 rounded-full" style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.25);">
            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l2.4 6.6L21 10l-5 4.6L17.4 21 12 17.4 6.6 21 8 14.6 3 10l6.6-1.4L12 2z"/></svg>
            <span class="text-blue-400 text-[11px] font-bold tracking-[0.16em] uppercase">Our Team</span>
        </div>

        <h1 class="text-white text-4xl sm:text-5xl lg:text-[52px] font-black tracking-tight leading-[1.08] mb-6">
            Meet the Team Behind LimoSchedule
        </h1>

        <p class="text-gray-400 text-[17px] sm:text-[18px] leading-relaxed max-w-2xl mx-auto">
            A team focused on building practical technology for modern transportation businesses.
        </p>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     TEAM GRID
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-24 overflow-hidden" style="background: #060606;">
    <div class="relative z-10 max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            <article class="rounded-2xl overflow-hidden" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.08);">
                <div class="aspect-square overflow-hidden">
                    <img src="{{ asset('public/assets/images/team/team-younas.jpg') }}" alt="Younas, Chief Executive Officer at LimoSchedule" width="1254" height="1254" class="w-full h-full object-cover" loading="lazy" decoding="async">
                </div>
                <div class="p-6">
                    <h2 class="text-white text-[17px] font-bold mb-1">Younas</h2>
                    <div class="text-blue-400 text-[12.5px] font-semibold mb-3">Chief Executive Officer</div>
                    <p class="text-gray-400 text-[13.5px] leading-relaxed">Leads LimoSchedule&rsquo;s strategy and vision for transportation businesses worldwide.</p>
                </div>
            </article>

            <article class="rounded-2xl overflow-hidden" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.08);">
                <div class="aspect-square overflow-hidden">
                    <img src="{{ asset('public/assets/images/team/team-ayesha-rahman.jpg') }}" alt="Ayesha Rahman, Customer Success Manager at LimoSchedule" width="1268" height="1241" class="w-full h-full object-cover" loading="lazy" decoding="async">
                </div>
                <div class="p-6">
                    <h2 class="text-white text-[17px] font-bold mb-1">Ayesha Rahman</h2>
                    <div class="text-blue-400 text-[12.5px] font-semibold mb-3">Customer Success Manager</div>
                    <p class="text-gray-400 text-[13.5px] leading-relaxed">Helps transportation businesses get the most out of the LimoSchedule platform.</p>
                </div>
            </article>

            <article class="rounded-2xl overflow-hidden" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.08);">
                <div class="aspect-square overflow-hidden">
                    <img src="{{ asset('public/assets/images/team/team-emily-carter.jpg') }}" alt="Emily Carter, Marketing and Growth Manager at LimoSchedule" width="1254" height="1254" class="w-full h-full object-cover" loading="lazy" decoding="async">
                </div>
                <div class="p-6">
                    <h2 class="text-white text-[17px] font-bold mb-1">Emily Carter</h2>
                    <div class="text-blue-400 text-[12.5px] font-semibold mb-3">Marketing &amp; Growth Manager</div>
                    <p class="text-gray-400 text-[13.5px] leading-relaxed">Drives marketing and growth strategy for LimoSchedule.</p>
                </div>
            </article>

            <article class="rounded-2xl overflow-hidden" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.08);">
                <div class="aspect-square overflow-hidden">
                    <img src="{{ asset('public/assets/images/team/team-sophia-anderson.jpg') }}" alt="Sophia Anderson, Business Development Executive at LimoSchedule" width="1254" height="1254" class="w-full h-full object-cover" loading="lazy" decoding="async">
                </div>
                <div class="p-6">
                    <h2 class="text-white text-[17px] font-bold mb-1">Sophia Anderson</h2>
                    <div class="text-blue-400 text-[12.5px] font-semibold mb-3">Business Development Executive</div>
                    <p class="text-gray-400 text-[13.5px] leading-relaxed">Builds partnerships and new business opportunities for LimoSchedule.</p>
                </div>
            </article>

            <article class="rounded-2xl overflow-hidden" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.08);">
                <div class="aspect-square overflow-hidden">
                    <img src="{{ asset('public/assets/images/team/team-omar-hassan.jpg') }}" alt="Omar Hassan, Lead Software Engineer at LimoSchedule" width="1254" height="1254" class="w-full h-full object-cover" loading="lazy" decoding="async">
                </div>
                <div class="p-6">
                    <h2 class="text-white text-[17px] font-bold mb-1">Omar Hassan</h2>
                    <div class="text-blue-400 text-[12.5px] font-semibold mb-3">Lead Software Engineer</div>
                    <p class="text-gray-400 text-[13.5px] leading-relaxed">Leads engineering on the LimoSchedule booking platform.</p>
                </div>
            </article>

            <article class="rounded-2xl overflow-hidden" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.08);">
                <div class="aspect-square overflow-hidden">
                    <img src="{{ asset('public/assets/images/team/team-michael-thompson.jpg') }}" alt="Michael Thompson, Sales and Partnerships Manager at LimoSchedule" width="1254" height="1254" class="w-full h-full object-cover" loading="lazy" decoding="async">
                </div>
                <div class="p-6">
                    <h2 class="text-white text-[17px] font-bold mb-1">Michael Thompson</h2>
                    <div class="text-blue-400 text-[12.5px] font-semibold mb-3">Sales &amp; Partnerships Manager</div>
                    <p class="text-gray-400 text-[13.5px] leading-relaxed">Manages sales and partnership relationships for LimoSchedule.</p>
                </div>
            </article>

        </div>

    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     TEAM FAQ
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-16 lg:py-20 overflow-hidden" style="background: #0A0A0A;">
    <div class="relative z-10 max-w-2xl mx-auto px-5 sm:px-6 lg:px-8">
        <h2 class="text-2xl sm:text-3xl font-black tracking-tight leading-[1.15] mb-6 text-white text-center">
            Getting in Touch
        </h2>
        <div class="flex flex-col gap-3">
            <div class="rounded-2xl p-5" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <h3 class="text-white font-semibold text-[14.5px] mb-1.5">How can I get in touch with the LimoSchedule team?</h3>
                <p class="text-gray-400 text-[13.5px] leading-relaxed">You can reach the LimoSchedule team by email at support@limoschedule.com, by phone, through the <a href="{{ route('contact') }}" class="text-blue-400 hover:text-blue-300 font-semibold">contact form</a>, or via WhatsApp.</p>
            </div>
            <div class="rounded-2xl p-5" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <h3 class="text-white font-semibold text-[14.5px] mb-1.5">Who do I contact for a demo or general questions?</h3>
                <p class="text-gray-400 text-[13.5px] leading-relaxed">Use the <a href="{{ route('contact') }}" class="text-blue-400 hover:text-blue-300 font-semibold">contact page</a> to request a demo or ask a general question, or explore the <a href="{{ route('demo') }}" class="text-blue-400 hover:text-blue-300 font-semibold">live demo</a> directly to see the platform first.</p>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     MORE TO EXPLORE
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-16 overflow-hidden" style="background: #060606;">
    <div class="relative z-10 max-w-3xl mx-auto px-5 sm:px-6 lg:px-8 text-center">
        <p class="text-gray-500 text-[14px]">
            Learn more <a href="{{ route('about') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">about LimoSchedule</a>, or explore the <a href="{{ route('platform') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">platform</a>.
        </p>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     FINAL CTA
═══════════════════════════════════════════════════════════════ -->
<section class="relative overflow-hidden" style="background: #030303; padding: 100px 0 110px;">
    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.02) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.02) 1px, transparent 1px); background-size: 64px 64px;"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[900px] h-[450px] pointer-events-none" style="background: radial-gradient(ellipse at 50% 0%, rgba(59,130,246,0.14) 0%, transparent 70%);"></div>

    <div class="relative z-10 max-w-3xl mx-auto px-5 sm:px-6 lg:px-8 text-center">
        <h2 class="font-black text-white leading-[1.1] tracking-tight mb-9" style="font-size: clamp(2.2rem, 5vw, 3.5rem);">
            Have Questions About LimoSchedule?
        </h2>

        <a href="{{ route('contact') }}"
           class="btn-cta inline-flex items-center justify-center gap-2.5 bg-[#3B82F6] text-white font-bold px-9 py-4 rounded-xl text-[15.5px] border border-blue-500/30 mb-5">
            <span>Talk to Us</span>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>

        <div class="text-[13px]">
            <span class="text-gray-500">Prefer WhatsApp?</span>
            <a href="https://wa.me/923460820722?text=Hi%2C%20I%20have%20a%20question%20about%20LimoSchedule." target="_blank" rel="noopener"
               class="inline-flex items-center gap-1 font-semibold text-blue-400 hover:text-blue-300 transition-colors duration-200 ml-1">
                Talk to an Expert
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>
</section>

@endsection
