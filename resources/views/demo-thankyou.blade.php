<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thank You &mdash; LimoSchedule</title>
    <meta name="description" content="Your private demo request has been received. We'll be in touch shortly.">
    <link rel="icon" type="image/jpeg" href="{{ url('public/logo/favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,300;0,14..32,400;0,14..32,500;0,14..32,600;0,14..32,700;0,14..32,800;0,14..32,900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * { font-family: 'Inter', sans-serif; }
        body { background: #0A0A0A; min-height: 100vh; }

        @keyframes fade-up {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .fade-up { animation: fade-up 0.7s cubic-bezier(.22,.68,0,1.2) both; }
        .fade-up-2 { animation: fade-up 0.7s 0.15s cubic-bezier(.22,.68,0,1.2) both; }
        .fade-up-3 { animation: fade-up 0.7s 0.3s cubic-bezier(.22,.68,0,1.2) both; }
        .fade-up-4 { animation: fade-up 0.7s 0.45s cubic-bezier(.22,.68,0,1.2) both; }

        @keyframes check-pop {
            0%   { transform: scale(0.5); opacity: 0; }
            70%  { transform: scale(1.12); }
            100% { transform: scale(1); opacity: 1; }
        }
        .check-icon { animation: check-pop 0.6s 0.2s cubic-bezier(.22,.68,0,1.2) both; }

        @keyframes ring-pulse {
            0%,100% { box-shadow: 0 0 0 0 rgba(59,130,246,0.35); }
            50%      { box-shadow: 0 0 0 18px rgba(59,130,246,0); }
        }
        .ring-pulse { animation: ring-pulse 2.4s ease-in-out infinite; }

        .step-card {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.07);
            border-radius: 16px;
            transition: border-color 0.2s, background 0.2s;
        }
        .step-card:hover {
            background: rgba(255,255,255,0.05);
            border-color: rgba(59,130,246,0.25);
        }
    </style>
</head>
<body>

<!-- Navbar minimal -->
<header class="fixed top-0 left-0 right-0 z-50" style="background: rgba(10,10,10,0.8); backdrop-filter: blur(20px); border-bottom: 1px solid rgba(255,255,255,0.06);">
    <div class="max-w-7xl mx-auto px-5 sm:px-8 flex items-center justify-between h-[62px]">
        <a href="{{ url('/') }}" class="flex items-center gap-2.5" aria-label="LimoSchedule Home">
            <div style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.2); border-radius: 10px; padding: 6px 12px;">
                <img src="{{ url('public/logo/logo-white.png') }}" alt="LimoSchedule" class="h-[26px] w-auto block">
            </div>
        </a>
        <a href="{{ url('/') }}" class="text-[13px] font-medium text-gray-400 hover:text-white transition-colors duration-200 flex items-center gap-1.5">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
            Back to Home
        </a>
    </div>
</header>

<!-- Main content -->
<main class="flex flex-col items-center justify-center min-h-screen px-4 pt-20 pb-16">

    <!-- Check icon -->
    <div class="check-icon ring-pulse w-24 h-24 rounded-3xl flex items-center justify-center mb-8" style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.3);">
        <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M22 11.08V12a10 10 0 11-5.93-9.14"/>
            <polyline points="22 4 12 14.01 9 11.01"/>
        </svg>
    </div>

    <!-- Headline -->
    <div class="text-center mb-10 max-w-xl">
        <div class="fade-up inline-flex items-center gap-2 mb-4 px-3 py-1.5 rounded-full text-[11px] font-bold tracking-widest uppercase text-blue-400" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.2);">
            <span class="w-1.5 h-1.5 rounded-full bg-blue-400 animate-pulse inline-block"></span>
            Request Received
        </div>
        <h1 class="fade-up-2 text-[34px] sm:text-[42px] font-extrabold text-white leading-tight tracking-tight mb-4">
            You're on the list.<br>
            <span style="background: linear-gradient(135deg, #3B82F6, #60A5FA); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">We'll be in touch soon.</span>
        </h1>
        <p class="fade-up-3 text-[15px] text-gray-400 leading-relaxed max-w-md mx-auto">
            Thank you for your interest in LimoSchedule. Our team reviews every request personally &mdash; expect a reply within <strong class="text-white font-semibold">4 business hours</strong>.
        </p>
    </div>

    <!-- What happens next -->
    <div class="fade-up-4 w-full max-w-lg mb-10">
        <p class="text-[11px] font-bold tracking-[0.14em] uppercase text-gray-600 text-center mb-4">What happens next</p>
        <div class="flex flex-col gap-3">

            <div class="step-card flex items-start gap-4 p-4">
                <div class="flex-shrink-0 w-9 h-9 rounded-xl flex items-center justify-center text-[13px] font-bold text-blue-400" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.15);">1</div>
                <div>
                    <p class="text-[14px] font-semibold text-white mb-0.5">Personalized demo scheduled</p>
                    <p class="text-[13px] text-gray-500">We review your details and schedule a private walkthrough of the full platform &mdash; admin panel, AI agent, and booking flow.</p>
                </div>
            </div>

            <div class="step-card flex items-start gap-4 p-4">
                <div class="flex-shrink-0 w-9 h-9 rounded-xl flex items-center justify-center text-[13px] font-bold text-blue-400" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.15);">2</div>
                <div>
                    <p class="text-[14px] font-semibold text-white mb-0.5">Tailored to your business</p>
                    <p class="text-[13px] text-gray-500">The demo is customised around your fleet size, team, and budget so you see exactly what LimoSchedule looks like for you.</p>
                </div>
            </div>

            <div class="step-card flex items-start gap-4 p-4">
                <div class="flex-shrink-0 w-9 h-9 rounded-xl flex items-center justify-center text-[13px] font-bold text-blue-400" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.15);">3</div>
                <div>
                    <p class="text-[14px] font-semibold text-white mb-0.5">No obligation, ever</p>
                    <p class="text-[13px] text-gray-500">The demo is completely free. You'll walk away with a clear picture of the platform &mdash; no pressure, no sales tricks.</p>
                </div>
            </div>

        </div>
    </div>

    <!-- Actions -->
    <div class="fade-up-4 flex flex-col sm:flex-row items-center gap-3">
        <a href="{{ url('/') }}" class="flex items-center justify-center gap-2 px-6 py-3 rounded-xl font-bold text-[14px] text-white" style="background: linear-gradient(135deg, #1d4ed8, #3B82F6); box-shadow: 0 4px 20px rgba(59,130,246,0.35);">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
            Back to LimoSchedule
        </a>
        <a href="https://wa.me/923460820722?text=Hi%2C%20I%20just%20submitted%20a%20demo%20request.%20Looking%20forward%20to%20hearing%20from%20you%21"
           target="_blank" rel="noopener"
           class="flex items-center justify-center gap-2 px-6 py-3 rounded-xl font-bold text-[14px] text-white"
           style="background: rgba(34,197,94,0.12); border: 1px solid rgba(34,197,94,0.3);">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="#22c55e"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M11.99 0C5.376 0 0 5.373 0 11.988c0 2.104.549 4.14 1.595 5.945L0 24l6.335-1.652A11.981 11.981 0 0011.99 24C18.604 24 24 18.627 24 12.012 24 5.373 18.604 0 11.99 0zm.01 21.823a9.886 9.886 0 01-5.03-1.372l-.362-.214-3.762.981.999-3.649-.235-.374a9.837 9.837 0 01-1.511-5.195c0-5.452 4.443-9.893 9.901-9.893 5.452 0 9.895 4.441 9.895 9.893 0 5.452-4.443 9.823-9.895 9.823z"/></svg>
            <span class="text-green-400">Chat on WhatsApp</span>
        </a>
    </div>

    <!-- Privacy note -->
    <p class="mt-8 text-[11.5px] text-gray-700 flex items-center gap-1.5">
        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
        Your information is private and never shared with third parties.
    </p>

</main>

</body>
</html>
