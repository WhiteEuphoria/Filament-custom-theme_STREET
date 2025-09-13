@extends('layouts.auth')

@section('title', 'Email Verification')

@section('auth-content')
<div class="loading">
    <div class="loading__circle">
        <svg viewBox="0 0 120 120">
            <defs>
                <linearGradient id="gradient" x1="0" y1="1" x2="1" y2="0">
                    <stop offset="0%" stop-color="#0B69B7" />
                    <stop offset="100%" stop-color="#052E51" />
                </linearGradient>
            </defs>
            <circle class="bg" cx="60" cy="60" r="54" />
            <circle class="progress" cx="60" cy="60" r="54" stroke-dasharray="339.2920065877" stroke-dashoffset="339.2920065877"></circle>
        </svg>
        <span class="loading__percent">{{ $progress ?? '56' }}%</span>
    </div>
</div>

<div class="verify-text">
    <p>
        {{ $message ?? 'The data verification procedure is underway.' }} <br>
        It may take from 10 minutes to 3 hours. <br>
        Please wait.
    </p>
</div>

@if(!$isVerified ?? true)
<form method="POST" action="{{ route('verification.send') }}" style="margin-top: 20px;">
    @csrf
    <button type="submit" class="btn btn--light">Resend Verification Email</button>
</form>
@endif

<div class="auth-links" style="margin-top: 20px;">
    <p><a href="{{ route('dashboard') }}">Back to Dashboard</a></p>
</div>
@endsection

@push('scripts')
<script>
    // Loader animation
    document.addEventListener('DOMContentLoaded', function() {
        const loaders = document.querySelectorAll('.loading');

        loaders.forEach(loader => {
            const progressCircle = loader.querySelector('.progress');
            const percentText = loader.querySelector('.loading__percent');
            if (!progressCircle || !percentText) return;

            const radius = Number(progressCircle.getAttribute('r')) || 54;
            const circumference = 2 * Math.PI * radius;

            // Initial values
            progressCircle.style.strokeDasharray = circumference;
            progressCircle.style.strokeDashoffset = circumference;
            progressCircle.style.transition = 'stroke-dashoffset 0.6s ease';

            // Update function
            function updateCircle(percent) {
                percent = Math.min(Math.max(percent, 0), 100);
                const targetOffset = circumference - (percent / 100) * circumference;
                progressCircle.style.strokeDashoffset = targetOffset;
            }

            // Watch for changes in .loading__percent text
            const observer = new MutationObserver(() => {
                const raw = (percentText.textContent || '0').replace(/[^\d]/g, '');
                const newPercent = parseInt(raw, 10) || 0;
                updateCircle(newPercent);
            });

            observer.observe(percentText, {
                characterData: true,
                childList: true,
                subtree: true
            });

            // Initialize (if there's already a value)
            const initial = parseInt((percentText.textContent || '0').replace(/[^\d]/g, ''), 10) || 0;
            updateCircle(initial);

            // Simulate progress for demo (remove in production)
            let currentProgress = initial;
            const interval = setInterval(() => {
                if (currentProgress < 100) {
                    currentProgress += Math.random() * 10;
                    if (currentProgress > 100) currentProgress = 100;
                    percentText.textContent = Math.floor(currentProgress) + '%';
                } else {
                    clearInterval(interval);
                    // Redirect when complete
                    setTimeout(() => {
                        window.location.href = '{{ route('dashboard') }}';
                    }, 1000);
                }
            }, 1000);
        });
    });
</script>
@endpush