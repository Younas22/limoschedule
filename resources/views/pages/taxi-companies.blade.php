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
            "name": "{{ $solution['service_name'] }}",
            "serviceType": "Transportation Booking Software",
            "provider": { "@@id": "{{ url('/') }}#organization" },
            "description": "{{ $solution['service_description'] }}"
        }
    ]
}
</script>
@endpush

@section('content')
@include('partials._solution-page', ['solution' => $solution])
@endsection
