<title>{{ $seo['title'] ?? 'LimoSchedule' }}</title>
<meta name="description" content="{{ $seo['description'] ?? '' }}">
<meta name="author" content="LimoSchedule">
<link rel="canonical" href="{{ $seo['canonical'] ?? url()->current() }}">
<link rel="icon" type="image/x-icon" href="{{ url('public/favicon.ico') }}?v=3">
<link rel="shortcut icon" href="{{ url('public/favicon.ico') }}?v=3">

<!-- Open Graph -->
<meta property="og:type"        content="{{ $seo['og_type'] ?? 'website' }}">
<meta property="og:url"         content="{{ $seo['canonical'] ?? url()->current() }}">
<meta property="og:title"       content="{{ $seo['title'] ?? 'LimoSchedule' }}">
<meta property="og:description" content="{{ $seo['description'] ?? '' }}">
<meta property="og:image"       content="{{ $seo['og_image'] ?? url('public/logo/favicon.png') }}">
<meta property="og:site_name"   content="LimoSchedule">
@if (!empty($seo['og_published_time']))
<meta property="article:published_time" content="{{ $seo['og_published_time'] }}">
@endif
@if (!empty($seo['og_section']))
<meta property="article:section" content="{{ $seo['og_section'] }}">
@endif

<!-- Twitter Card -->
<meta name="twitter:card"        content="{{ $seo['twitter_card'] ?? 'summary' }}">
<meta name="twitter:title"       content="{{ $seo['title'] ?? 'LimoSchedule' }}">
<meta name="twitter:description" content="{{ $seo['description'] ?? '' }}">
<meta name="twitter:image"       content="{{ $seo['og_image'] ?? url('public/logo/favicon.png') }}">
