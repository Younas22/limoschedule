<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard – LimoSchedule</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-gray-900 text-white px-6 py-4 flex items-center justify-between shadow-lg">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-yellow-500 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-gray-900" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                </svg>
            </div>
            <span class="font-bold text-lg">LimoSchedule</span>
            <span class="text-gray-400 text-sm ml-2">Admin Panel</span>
        </div>
        <div class="flex items-center gap-4">
            <span class="text-gray-400 text-sm hidden sm:block">{{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="bg-gray-700 hover:bg-gray-600 text-white text-sm px-4 py-2 rounded-lg transition">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-8">

        <!-- Page Title -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Demo Requests</h1>
            <p class="text-gray-500 text-sm mt-1">Tamam demo requests yahan dekhein</p>
        </div>

        <!-- Flash Message -->
        @if(session('success'))
            <div class="mb-6 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
            <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-100">
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Total Requests</p>
                <p class="text-3xl font-bold text-gray-800 mt-1">{{ $total }}</p>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-100">
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Aaj ke Requests</p>
                <p class="text-3xl font-bold text-yellow-500 mt-1">{{ $today }}</p>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-100">
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Is Hafte</p>
                <p class="text-3xl font-bold text-blue-500 mt-1">{{ $thisWeek }}</p>
            </div>
        </div>

        <!-- Search Bar -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 mb-4">
            <form method="GET" action="{{ route('admin.dashboard') }}" class="flex gap-3">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Naam, email ya company se dhundein..."
                    class="flex-1 px-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                >
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-400 text-gray-900 font-medium px-5 py-2 rounded-lg text-sm transition">
                    Dhundein
                </button>
                @if(request('search'))
                    <a href="{{ route('admin.dashboard') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium px-4 py-2 rounded-lg text-sm transition">
                        Reset
                    </a>
                @endif
            </form>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            @if($requests->isEmpty())
                <div class="text-center py-16 text-gray-400">
                    <svg class="w-12 h-12 mx-auto mb-3 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <p class="text-sm">Koi request nahi mili</p>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-100">
                                <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">#</th>
                                <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Naam</th>
                                <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Company</th>
                                <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Email</th>
                                <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">WhatsApp</th>
                                <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Country</th>
                                <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Employees</th>
                                <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Budget</th>
                                <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Date</th>
                                <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @foreach($requests as $req)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-5 py-3 text-gray-400">{{ $requests->firstItem() + $loop->index }}</td>
                                <td class="px-5 py-3 font-medium text-gray-800">{{ $req->name }}</td>
                                <td class="px-5 py-3 text-gray-600">{{ $req->company ?? '—' }}</td>
                                <td class="px-5 py-3 text-gray-600">
                                    <a href="mailto:{{ $req->email }}" class="hover:text-yellow-600 transition">{{ $req->email }}</a>
                                </td>
                                <td class="px-5 py-3 text-gray-600">{{ $req->whatsapp ?? '—' }}</td>
                                <td class="px-5 py-3 text-gray-600">{{ $req->country ?? '—' }}</td>
                                <td class="px-5 py-3 text-gray-600">{{ $req->total_employees ?? '—' }}</td>
                                <td class="px-5 py-3 text-gray-600">{{ $req->budget ?? '—' }}</td>
                                <td class="px-5 py-3 text-gray-500 whitespace-nowrap">
                                    {{ $req->created_at ? $req->created_at->format('d M Y') : '—' }}
                                </td>
                                <td class="px-5 py-3">
                                    <form method="POST" action="{{ route('admin.requests.destroy', $req->id) }}" onsubmit="return confirm('Yeh record delete karein?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 text-xs font-medium transition">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($requests->hasPages())
                    <div class="px-5 py-4 border-t border-gray-100">
                        {{ $requests->links() }}
                    </div>
                @endif
            @endif
        </div>

        <!-- Results info -->
        @if(!$requests->isEmpty())
            <p class="text-xs text-gray-400 mt-3 text-right">
                Showing {{ $requests->firstItem() }}–{{ $requests->lastItem() }} of {{ $requests->total() }} results
            </p>
        @endif

    </div>

</body>
</html>
