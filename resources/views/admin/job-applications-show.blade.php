@extends('admin.layouts.app')

@section('title', 'Job Application Details')

@section('content')

    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.job-applications.index') }}" class="text-gray-400 hover:text-gray-600 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-gray-800">{{ $application->full_name }}</h1>
            <p class="text-gray-500 text-sm">Applied for {{ $application->position }} &middot; {{ $application->created_at ? $application->created_at->format('d M Y, g:i A') : '—' }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <div class="lg:col-span-2 space-y-5">

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                <h3 class="text-sm font-semibold text-gray-700 mb-4">Contact Information</h3>
                <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Full Name</dt>
                        <dd class="text-gray-800">{{ $application->full_name }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Email</dt>
                        <dd><a href="mailto:{{ $application->email }}" class="text-blue-600 hover:text-blue-800">{{ $application->email }}</a></dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Phone</dt>
                        <dd class="text-gray-800">{{ $application->phone ?? '—' }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Country / City</dt>
                        <dd class="text-gray-800">{{ $application->country }}{{ $application->city ? ', ' . $application->city : '' }}</dd>
                    </div>
                </dl>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                <h3 class="text-sm font-semibold text-gray-700 mb-4">Professional Information</h3>
                <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Position</dt>
                        <dd class="text-gray-800">{{ $application->position }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Experience Level</dt>
                        <dd class="text-gray-800">{{ $application->experience_level }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Years of Experience</dt>
                        <dd class="text-gray-800">{{ $application->years_of_experience ?? '—' }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Availability</dt>
                        <dd class="text-gray-800">{{ $application->availability }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">LinkedIn</dt>
                        <dd>@if($application->linkedin)<a href="{{ $application->linkedin }}" target="_blank" rel="noopener" class="text-blue-600 hover:text-blue-800 break-all">{{ $application->linkedin }}</a>@else <span class="text-gray-400">—</span> @endif</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Portfolio</dt>
                        <dd>@if($application->portfolio)<a href="{{ $application->portfolio }}" target="_blank" rel="noopener" class="text-blue-600 hover:text-blue-800 break-all">{{ $application->portfolio }}</a>@else <span class="text-gray-400">—</span> @endif</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">GitHub</dt>
                        <dd>@if($application->github)<a href="{{ $application->github }}" target="_blank" rel="noopener" class="text-blue-600 hover:text-blue-800 break-all">{{ $application->github }}</a>@else <span class="text-gray-400">—</span> @endif</dd>
                    </div>
                </dl>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                <h3 class="text-sm font-semibold text-gray-700 mb-3">Cover Letter / Message</h3>
                @if($application->cover_letter)
                    <p class="text-sm text-gray-700 leading-relaxed whitespace-pre-line">{{ $application->cover_letter }}</p>
                @else
                    <p class="text-sm text-gray-400 italic">No cover letter provided.</p>
                @endif
            </div>

        </div>

        <div class="space-y-5">

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                <h3 class="text-sm font-semibold text-gray-700 mb-4">Resume / CV</h3>
                <p class="text-xs text-gray-500 mb-3 break-all">{{ $application->resume_original_name }}</p>
                <a href="{{ route('admin.job-applications.resume', $application->id) }}" class="w-full flex items-center justify-center gap-2 bg-blue-50 hover:bg-blue-100 text-blue-700 font-medium py-2.5 rounded-lg text-sm transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5 5-5M12 15V3"/></svg>
                    Download Resume
                </a>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                <h3 class="text-sm font-semibold text-gray-700 mb-4">Actions</h3>
                <div class="flex flex-col gap-2">
                    <a href="mailto:{{ $application->email }}" class="text-center bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2.5 rounded-lg text-sm transition">
                        Email {{ $application->full_name }}
                    </a>
                    <form method="POST" action="{{ route('admin.job-applications.destroy', $application->id) }}" onsubmit="return confirm('Delete this application?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full bg-red-50 hover:bg-red-100 text-red-600 font-medium py-2.5 rounded-lg text-sm transition">
                            Delete Application
                        </button>
                    </form>
                </div>
            </div>

        </div>

    </div>

@endsection
