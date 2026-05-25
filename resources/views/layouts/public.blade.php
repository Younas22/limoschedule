<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ url('public/logo/favicon.png') }}">

    @yield('seo')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,300;0,14..32,400;0,14..32,500;0,14..32,600;0,14..32,700;0,14..32,800;1,14..32,400&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ url('public/assets/js/tailwind.config.js') }}"></script>

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ url('public/assets/css/limoschedule.css') }}">

    <style>
        body { background: #0A0A0A; color: #e5e7eb; font-family: 'Inter', sans-serif; }

        .pub-nav-link {
            font-size: 13.5px; font-weight: 500; color: #9ca3af;
            padding: 6px 14px; border-radius: 8px; transition: color .2s, background .2s;
            text-decoration: none; white-space: nowrap;
        }
        .pub-nav-link:hover { color: #fff; background: rgba(255,255,255,0.06); }
        .pub-nav-link.active { color: #fff; background: rgba(255,255,255,0.08); }

        /* Blog cards */
        .blog-card {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 14px;
            overflow: hidden;
            transition: border-color .25s, transform .25s, box-shadow .25s;
            display: flex; flex-direction: column;
        }
        .blog-card:hover {
            border-color: rgba(59,130,246,0.35);
            transform: translateY(-3px);
            box-shadow: 0 8px 32px rgba(59,130,246,0.12);
        }
        .blog-card-img { width: 100%; aspect-ratio: 16/9; object-fit: cover; display: block; }
        .blog-card-img-placeholder {
            width: 100%; aspect-ratio: 16/9;
            background: linear-gradient(135deg, rgba(59,130,246,0.08), rgba(59,130,246,0.03));
            display: flex; align-items: center; justify-content: center;
        }
        .category-badge {
            display: inline-block; font-size: 11px; font-weight: 600; letter-spacing: .04em;
            text-transform: uppercase; color: #60a5fa;
            background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.2);
            padding: 2px 8px; border-radius: 20px;
        }
        .line-clamp-3 {
            display: -webkit-box; -webkit-line-clamp: 3;
            -webkit-box-orient: vertical; overflow: hidden;
        }
        .line-clamp-2 {
            display: -webkit-box; -webkit-line-clamp: 2;
            -webkit-box-orient: vertical; overflow: hidden;
        }

        /* Blog content (detail page) */
        .prose-blog h1,.prose-blog h2,.prose-blog h3,.prose-blog h4 {
            color: #f3f4f6; font-weight: 700; margin: 1.6em 0 .6em; line-height: 1.3;
        }
        .prose-blog h2 { font-size: 1.5rem; }
        .prose-blog h3 { font-size: 1.25rem; }
        .prose-blog p { margin: 0 0 1.1em; line-height: 1.85; color: #d1d5db; }
        .prose-blog a { color: #60a5fa; text-decoration: underline; }
        .prose-blog ul,.prose-blog ol { padding-left: 1.6em; margin-bottom: 1.1em; color: #d1d5db; }
        .prose-blog li { margin-bottom: .4em; }
        .prose-blog blockquote {
            border-left: 3px solid #3B82F6; margin: 1.4em 0;
            padding: .8em 1.2em; background: rgba(59,130,246,0.06);
            border-radius: 0 8px 8px 0; color: #9ca3af; font-style: italic;
        }
        .prose-blog pre {
            background: rgba(0,0,0,0.5); border: 1px solid rgba(255,255,255,0.1);
            border-radius: 10px; padding: 1.2em; overflow-x: auto;
            font-size: .9rem; margin-bottom: 1.2em;
        }
        .prose-blog code {
            background: rgba(255,255,255,0.08); padding: 2px 6px;
            border-radius: 4px; font-size: .88em;
        }
        .prose-blog pre code { background: none; padding: 0; }
        .prose-blog img { max-width: 100%; border-radius: 10px; margin: 1.2em 0; }
        .prose-blog hr { border-color: rgba(255,255,255,0.1); margin: 2em 0; }
        .prose-blog table { width: 100%; border-collapse: collapse; margin-bottom: 1.2em; }
        .prose-blog th,.prose-blog td { padding: .6em .9em; border: 1px solid rgba(255,255,255,0.1); }
        .prose-blog th { background: rgba(255,255,255,0.05); color: #f3f4f6; font-weight: 600; }
    </style>

    @stack('styles')
</head>
<body>

<!-- ─── Navbar ─── -->
<header style="background: rgba(10,10,10,0.85); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); border-bottom: 1px solid rgba(255,255,255,0.06); position: sticky; top: 0; z-index: 50;">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 flex items-center justify-between h-[62px]">

        <!-- Logo -->
        <a href="{{ url('/') }}" aria-label="LimoSchedule — Home" class="flex-shrink-0">
            <div style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); border-radius: 10px; padding: 6px 12px;">
                <img src="{{ url('public/logo/logo-white.png') }}" alt="LimoSchedule" class="h-[26px] w-auto block" loading="eager">
            </div>
        </a>

        <!-- Nav links -->
        <nav class="hidden sm:flex items-center gap-1">
            <a href="{{ url('/') }}"
               class="pub-nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
            <a href="{{ route('blogs.index') }}"
               class="pub-nav-link {{ request()->routeIs('blogs.index') || request()->routeIs('blog.show') ? 'active' : '' }}">Blog</a>
        </nav>

        <!-- Right CTA -->
        <div class="flex items-center gap-2">
            <a href="https://wa.me/923460820722?text=Hi%2C%20I%27m%20interested%20in%20LimoSchedule.%20Can%20you%20show%20me%20a%20live%20demo%3F"
               target="_blank" rel="noopener"
               class="inline-flex items-center gap-1.5 text-white text-[12.5px] font-bold px-3.5 py-2 rounded-xl"
               style="background: linear-gradient(135deg, #16a34a, #22c55e);">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M11.99 0C5.376 0 0 5.373 0 11.988c0 2.104.549 4.14 1.595 5.945L0 24l6.335-1.652A11.981 11.981 0 0011.99 24C18.604 24 24 18.627 24 12.012 24 5.373 18.604 0 11.99 0zm.01 21.823a9.886 9.886 0 01-5.03-1.372l-.362-.214-3.762.981.999-3.649-.235-.374a9.837 9.837 0 01-1.511-5.195c0-5.452 4.443-9.893 9.901-9.893 5.452 0 9.895 4.441 9.895 9.893 0 5.452-4.443 9.823-9.895 9.823z"/></svg>
                <span class="hidden sm:inline">WhatsApp Us</span>
            </a>
        </div>

    </div>
</header>

<!-- ─── Page Content ─── -->
<main>
    @yield('content')
</main>

<!-- ─── Footer ─── -->
<footer style="border-top: 1px solid rgba(255,255,255,0.06); margin-top: 80px;">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 py-10">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <img src="{{ url('public/logo/logo-white.png') }}" alt="LimoSchedule" class="h-[22px] w-auto opacity-70">
                <span class="text-gray-600 text-sm">&copy; {{ date('Y') }} LimoSchedule. All rights reserved.</span>
            </div>
            <div class="flex items-center gap-5">
                <a href="{{ url('/') }}" class="text-gray-500 hover:text-gray-300 text-sm transition-colors">Home</a>
                <a href="{{ route('blogs.index') }}" class="text-gray-500 hover:text-gray-300 text-sm transition-colors">Blog</a>
                <a href="{{ url('/') }}#contact" class="text-gray-500 hover:text-gray-300 text-sm transition-colors">Contact</a>
            </div>
        </div>
    </div>
</footer>

@stack('scripts')
</body>
</html>
