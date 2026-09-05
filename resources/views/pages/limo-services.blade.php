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
            "@@type": "Service",
            "name": {!! json_encode($solution['service_name']) !!},
            "serviceType": "Transportation Booking Software",
            "provider": { "@@id": "{{ url('/') }}#organization" },
            "description": {!! json_encode($solution['service_description']) !!}
        }
        @if(!empty($solution['faqs']))
        ,{
            "@@type": "FAQPage",
            "mainEntity": [
                @foreach($solution['faqs'] as $faq)
                { "@@type": "Question", "name": {!! json_encode($faq['q']) !!}, "acceptedAnswer": { "@@type": "Answer", "text": {!! json_encode($faq['a']) !!} } }@if(!$loop->last),@endif
                @endforeach
            ]
        }
        @endif
    ]
}
</script>
@endpush

@section('content')
@include('partials._solution-page', ['solution' => $solution])
@endsection
