<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login – LimoSchedule</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 flex items-center justify-center">

    <div class="w-full max-w-md px-4">
        <!-- Logo -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-yellow-500 rounded-2xl mb-4 shadow-lg">
                <svg class="w-9 h-9 text-gray-900" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-white">LimoSchedule</h1>
            <p class="text-gray-400 text-sm mt-1">Admin Panel</p>
        </div>

        <!-- Card -->
        <div class="bg-white rounded-2xl shadow-2xl p-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-6 text-center">Sign In</h2>

            @if(session('error'))
                <div class="mb-4 px-4 py-3 bg-red-50 border border-red-200 text-red-700 rounded-lg text-sm">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.post') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="admin@limoschedule.com"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent text-sm @error('email') border-red-400 @enderror"
                        autofocus
                    >
                    @error('email')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input
                        type="password"
                        name="password"
                        placeholder="••••••••"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent text-sm @error('password') border-red-400 @enderror"
                    >
                    @error('password')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center mb-6">
                    <input type="checkbox" name="remember" id="remember" class="w-4 h-4 text-yellow-500 border-gray-300 rounded">
                    <label for="remember" class="ml-2 text-sm text-gray-600">Remember me</label>
                </div>

                <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-400 text-gray-900 font-semibold py-2.5 rounded-lg transition duration-200 text-sm">
                    Login
                </button>
            </form>
        </div>

        <p class="text-center text-gray-500 text-xs mt-6">&copy; {{ date('Y') }} LimoSchedule. All rights reserved.</p>
    </div>

</body>
</html>
