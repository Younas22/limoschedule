@extends('admin.layouts.app')

@section('title', 'Demo Request Details')

@section('content')

    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.dashboard') }}" class="text-gray-400 hover:text-gray-600 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-gray-800">{{ $request->name }}</h1>
            <p class="text-gray-500 text-sm">Demo request &middot; {{ $request->created_at ? $request->created_at->format('d M Y, g:i A') : '—' }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <div class="lg:col-span-2 space-y-5">

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                <h3 class="text-sm font-semibold text-gray-700 mb-4">Contact Information</h3>
                <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Full Name</dt>
                        <dd class="text-gray-800">{{ $request->name }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Company</dt>
                        <dd class="text-gray-800">{{ $request->company ?? '—' }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Email</dt>
                        <dd><a href="mailto:{{ $request->email }}" class="text-blue-600 hover:text-blue-800">{{ $request->email }}</a></dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">WhatsApp</dt>
                        <dd class="text-gray-800">{{ $request->whatsapp ?? '—' }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Country</dt>
                        <dd class="text-gray-800">{{ $request->country ?? '—' }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Total Employees</dt>
                        <dd class="text-gray-800">{{ $request->total_employees ?? '—' }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Budget</dt>
                        <dd class="text-gray-800">{{ $request->budget ?? '—' }}</dd>
                    </div>
                </dl>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                <h3 class="text-sm font-semibold text-gray-700 mb-3">Message</h3>
                @if($request->message)
                    <p class="text-sm text-gray-700 leading-relaxed whitespace-pre-line">{{ $request->message }}</p>
                @else
                    <p class="text-sm text-gray-400 italic">No message provided.</p>
                @endif
            </div>

        </div>

        <div class="space-y-5">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                <h3 class="text-sm font-semibold text-gray-700 mb-4">Actions</h3>
                <div class="flex flex-col gap-2">
                    <a href="mailto:{{ $request->email }}" class="text-center bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2.5 rounded-lg text-sm transition">
                        Email {{ $request->name }}
                    </a>
                    <form method="POST" action="{{ route('admin.requests.destroy', $request->id) }}" onsubmit="return confirm('Delete this record?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full bg-red-50 hover:bg-red-100 text-red-600 font-medium py-2.5 rounded-lg text-sm transition">
                            Delete Record
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
