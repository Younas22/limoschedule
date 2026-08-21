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
@endpush

@section('content')

<section class="relative overflow-hidden" style="background: #030303;">
@php
    $breadcrumbs = [
        ['label' => 'Home', 'url' => url('/')],
        ['label' => 'Privacy Policy', 'url' => null],
    ];
@endphp
@include('partials._breadcrumbs')

    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.03) 1px, transparent 1px); background-size: 56px 56px;"></div>

    <div class="relative z-10 max-w-3xl mx-auto px-5 sm:px-6 lg:px-8 pt-24 pb-20 lg:pt-32 lg:pb-24">

        <div class="text-center mb-14">
            <div class="inline-flex items-center gap-2 mb-6 px-4 py-1.5 rounded-full" style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.25);">
                <span class="text-blue-400 text-[11px] font-bold tracking-[0.16em] uppercase">Privacy Policy</span>
            </div>
            <h1 class="text-white text-4xl sm:text-5xl font-black tracking-tight leading-[1.1] mb-4">
                Privacy Policy
            </h1>
            <p class="text-gray-500 text-[14px]">Last updated {{ now()->format('F Y') }}</p>
        </div>

        <div class="space-y-10 text-gray-400 text-[15px] leading-relaxed">

            <div>
                <h2 class="text-white text-[19px] font-bold mb-3">Information We Collect</h2>
                <p>When you use a form on this website &mdash; including the contact form, demo request form, or job application form &mdash; we collect the information you choose to submit, such as your name, email address, phone number, company or country details, and, for job applications, your resume/CV and professional information (experience level, portfolio or profile links, and any cover letter you provide).</p>
            </div>

            <div>
                <h2 class="text-white text-[19px] font-bold mb-3">How We Use Your Information</h2>
                <p>We use the information you submit to respond to your inquiry, evaluate a demo request, or review a job application. Job application information, including your resume, is used solely to assess your suitability for current or future opportunities at LimoSchedule and is not shared publicly.</p>
            </div>

            <div>
                <h2 class="text-white text-[19px] font-bold mb-3">How We Store Your Information</h2>
                <p>Information submitted through our forms is stored securely and is accessible only to LimoSchedule staff who need it to respond to your request. Uploaded resumes are stored outside of any publicly accessible part of our website.</p>
            </div>

            <div>
                <h2 class="text-white text-[19px] font-bold mb-3">Analytics</h2>
                <p>This website uses Google Analytics to understand general site usage, such as which pages are visited. This does not include the content of information you submit through our forms.</p>
            </div>

            <div>
                <h2 class="text-white text-[19px] font-bold mb-3">Your Choices</h2>
                <p>If you would like us to update or delete information you have previously submitted, contact us at <a href="mailto:support@limoschedule.com" class="text-blue-400 hover:text-blue-300 font-semibold">support@limoschedule.com</a> and we will address your request.</p>
            </div>

            <div>
                <h2 class="text-white text-[19px] font-bold mb-3">Contact</h2>
                <p>Questions about this policy or how your information is handled can be sent to <a href="mailto:support@limoschedule.com" class="text-blue-400 hover:text-blue-300 font-semibold">support@limoschedule.com</a>.</p>
            </div>

        </div>

    </div>
</section>

@endsection
