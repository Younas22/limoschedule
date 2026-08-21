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
            "name": "Hamza Malik",
            "jobTitle": "Co-Founder & Chief Technology Officer",
            "description": "Full-stack technology leader focused on building scalable travel platforms, automation systems, and API-driven booking solutions.",
            "image": "{{ url('public/assets/images/team/team-hamza-malik.jpg') }}",
            "worksFor": { "@@id": "{{ url('/') }}#organization" }
        },
        {
            "@@type": "Person",
            "name": "Ayesha Khan",
            "jobTitle": "Product & Operations Manager",
            "description": "Experienced in travel technology operations, product coordination, and creating efficient digital experiences for travel businesses.",
            "image": "{{ url('public/assets/images/team/team-ayesha-khan.jpg') }}",
            "worksFor": { "@@id": "{{ url('/') }}#organization" }
        },
        {
            "@@type": "Person",
            "name": "Michael Anderson",
            "jobTitle": "Chief Executive Officer",
            "description": "Travel technology executive focused on helping agencies and operators modernize their booking operations through smarter digital solutions.",
            "image": "{{ url('public/assets/images/team/team-michael-anderson.jpg') }}",
            "worksFor": { "@@id": "{{ url('/') }}#organization" }
        },
        {
            "@@type": "Person",
            "name": "Emily Carter",
            "jobTitle": "Head of Customer Success",
            "description": "Customer experience specialist dedicated to helping travel businesses adopt technology and improve operational efficiency.",
            "image": "{{ url('public/assets/images/team/team-emily-carter.jpg') }}",
            "worksFor": { "@@id": "{{ url('/') }}#organization" }
        },
        {
            "@@type": "Person",
            "name": "Daniel Brooks",
            "jobTitle": "Head of Product",
            "description": "Product strategist focused on intuitive booking experiences, automation, and innovative SaaS solutions for the travel industry.",
            "image": "{{ url('public/assets/images/team/team-daniel-brooks.jpg') }}",
            "worksFor": { "@@id": "{{ url('/') }}#organization" }
        },
        {
            "@@type": "Person",
            "name": "Jessica Morgan",
            "jobTitle": "Marketing & Partnerships Director",
            "description": "Marketing and partnerships professional focused on building strategic relationships and expanding travel technology solutions across the US and international markets.",
            "image": "{{ url('public/assets/images/team/team-jessica-morgan.jpg') }}",
            "worksFor": { "@@id": "{{ url('/') }}#organization" }
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
                    <img src="{{ asset('public/assets/images/team/team-hamza-malik.jpg') }}" alt="Hamza Malik, Co-Founder and Chief Technology Officer at LimoSchedule" width="1042" height="1008" class="w-full h-full object-cover" loading="lazy" decoding="async">
                </div>
                <div class="p-6">
                    <h2 class="text-white text-[17px] font-bold mb-1">Hamza Malik</h2>
                    <div class="text-blue-400 text-[12.5px] font-semibold mb-3">Co-Founder &amp; Chief Technology Officer</div>
                    <p class="text-gray-400 text-[13.5px] leading-relaxed">Full-stack technology leader focused on building scalable travel platforms, automation systems, and API-driven booking solutions.</p>
                </div>
            </article>

            <article class="rounded-2xl overflow-hidden" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.08);">
                <div class="aspect-square overflow-hidden">
                    <img src="{{ asset('public/assets/images/team/team-ayesha-khan.jpg') }}" alt="Ayesha Khan, Product and Operations Manager at LimoSchedule" width="1042" height="1008" class="w-full h-full object-cover" loading="lazy" decoding="async">
                </div>
                <div class="p-6">
                    <h2 class="text-white text-[17px] font-bold mb-1">Ayesha Khan</h2>
                    <div class="text-blue-400 text-[12.5px] font-semibold mb-3">Product &amp; Operations Manager</div>
                    <p class="text-gray-400 text-[13.5px] leading-relaxed">Experienced in travel technology operations, product coordination, and creating efficient digital experiences for travel businesses.</p>
                </div>
            </article>

            <article class="rounded-2xl overflow-hidden" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.08);">
                <div class="aspect-square overflow-hidden">
                    <img src="{{ asset('public/assets/images/team/team-michael-anderson.jpg') }}" alt="Michael Anderson, Chief Executive Officer at LimoSchedule" width="1042" height="1008" class="w-full h-full object-cover" loading="lazy" decoding="async">
                </div>
                <div class="p-6">
                    <h2 class="text-white text-[17px] font-bold mb-1">Michael Anderson</h2>
                    <div class="text-blue-400 text-[12.5px] font-semibold mb-3">Chief Executive Officer</div>
                    <p class="text-gray-400 text-[13.5px] leading-relaxed">Travel technology executive focused on helping agencies and operators modernize their booking operations through smarter digital solutions.</p>
                </div>
            </article>

            <article class="rounded-2xl overflow-hidden" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.08);">
                <div class="aspect-square overflow-hidden">
                    <img src="{{ asset('public/assets/images/team/team-emily-carter.jpg') }}" alt="Emily Carter, Head of Customer Success at LimoSchedule" width="1042" height="1008" class="w-full h-full object-cover" loading="lazy" decoding="async">
                </div>
                <div class="p-6">
                    <h2 class="text-white text-[17px] font-bold mb-1">Emily Carter</h2>
                    <div class="text-blue-400 text-[12.5px] font-semibold mb-3">Head of Customer Success</div>
                    <p class="text-gray-400 text-[13.5px] leading-relaxed">Customer experience specialist dedicated to helping travel businesses adopt technology and improve operational efficiency.</p>
                </div>
            </article>

            <article class="rounded-2xl overflow-hidden" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.08);">
                <div class="aspect-square overflow-hidden">
                    <img src="{{ asset('public/assets/images/team/team-daniel-brooks.jpg') }}" alt="Daniel Brooks, Head of Product at LimoSchedule" width="1042" height="1008" class="w-full h-full object-cover" loading="lazy" decoding="async">
                </div>
                <div class="p-6">
                    <h2 class="text-white text-[17px] font-bold mb-1">Daniel Brooks</h2>
                    <div class="text-blue-400 text-[12.5px] font-semibold mb-3">Head of Product</div>
                    <p class="text-gray-400 text-[13.5px] leading-relaxed">Product strategist focused on intuitive booking experiences, automation, and innovative SaaS solutions for the travel industry.</p>
                </div>
            </article>

            <article class="rounded-2xl overflow-hidden" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.08);">
                <div class="aspect-square overflow-hidden">
                    <img src="{{ asset('public/assets/images/team/team-jessica-morgan.jpg') }}" alt="Jessica Morgan, Marketing and Partnerships Director at LimoSchedule" width="1042" height="1008" class="w-full h-full object-cover" loading="lazy" decoding="async">
                </div>
                <div class="p-6">
                    <h2 class="text-white text-[17px] font-bold mb-1">Jessica Morgan</h2>
                    <div class="text-blue-400 text-[12.5px] font-semibold mb-3">Marketing &amp; Partnerships Director</div>
                    <p class="text-gray-400 text-[13.5px] leading-relaxed">Marketing and partnerships professional focused on building strategic relationships and expanding travel technology solutions across the US and international markets.</p>
                </div>
            </article>

        </div>

    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     MORE TO EXPLORE
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-16 overflow-hidden" style="background: #0A0A0A;">
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
