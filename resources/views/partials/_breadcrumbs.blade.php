@php
    $crumbs = $breadcrumbs ?? [];
@endphp
@if(count($crumbs) > 1)
<nav aria-label="Breadcrumb" class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 pt-7">
    <ol class="flex flex-wrap items-center gap-1.5 text-[12px] text-gray-500">
        @foreach($crumbs as $crumb)
            <li class="flex items-center gap-1.5">
                @if($loop->last)
                    <span class="text-gray-300 font-medium" aria-current="page">{{ $crumb['label'] }}</span>
                @else
                    <a href="{{ $crumb['url'] }}" class="hover:text-white transition-colors duration-200">{{ $crumb['label'] }}</a>
                    <svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"><polyline points="9 18 15 12 9 6"/></svg>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "BreadcrumbList",
    "itemListElement": [
        @foreach($crumbs as $crumb)
        {
            "@@type": "ListItem",
            "position": {{ $loop->iteration }},
            "name": "{{ $crumb['label'] }}"@if(!empty($crumb['url'])), "item": "{{ $crumb['url'] }}"@endif

        }@if(!$loop->last),@endif
        @endforeach
    ]
}
</script>
@endif
