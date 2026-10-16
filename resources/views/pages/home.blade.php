@extends('layouts.app')

@section('content')
  <div id="react-root"></div>
@endsection

@push('scripts')
<script src="{{ asset('js/webthreads.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const el = document.getElementById('heroWebThreads');
    if (el && window.WebThreads) {
        window.heroWebThreads = new WebThreads('heroWebThreads', {
            color1: '#E8C547',
            color2: '#888888',
            color3: '#F5DC5A',
            speed: 0.12,
            threadCount: 4,
            frequency: 5.0,
            spread: 0.12,
            taper: 1.0,
            position: 0.5,
            glow: 0.015,
            falloff: 0.6,
            thickness: 1.0,
            brightness: 0.45,
            opacity: 0.5,
            grain: true,
            grainIntensity: 0.03,
            mouseInteraction: true,
            mouseStrength: 0.2
        });
    }
});
</script>
@endpush
