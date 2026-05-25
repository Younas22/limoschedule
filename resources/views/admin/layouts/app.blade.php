<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') – LimoSchedule</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @stack('styles')
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-gray-900 text-white px-6 py-3 flex items-center justify-between shadow-lg sticky top-0 z-40">
        <div class="flex items-center gap-4">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-yellow-500 rounded-lg flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-gray-900" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                </div>
                <span class="font-bold text-lg">LimoSchedule</span>
            </div>
            <!-- Nav Links -->
            <div class="hidden sm:flex items-center gap-1 ml-4">
                <a href="{{ route('admin.dashboard') }}"
                   class="px-3 py-1.5 rounded-lg text-sm transition {{ request()->routeIs('admin.dashboard') ? 'bg-yellow-500 text-gray-900 font-medium' : 'text-gray-300 hover:bg-gray-700' }}">
                    Demo Requests
                </a>
                <a href="{{ route('admin.blogs.index') }}"
                   class="px-3 py-1.5 rounded-lg text-sm transition {{ request()->routeIs('admin.blogs*') ? 'bg-yellow-500 text-gray-900 font-medium' : 'text-gray-300 hover:bg-gray-700' }}">
                    Blogs
                </a>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <span class="text-gray-400 text-sm hidden md:block">{{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="bg-gray-700 hover:bg-gray-600 text-white text-sm px-4 py-1.5 rounded-lg transition">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-8">
        @yield('content')
    </div>

    @stack('scripts')
</body>
</html>
