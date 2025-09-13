@extends('layouts.auth')

@section('title', 'Login')

@section('auth-content')
<form class="auth-form" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="field">
        <input type="email" name="email" placeholder="E-mail" value="{{ old('email') }}" required>
    </div>
    <div class="field">
        <div class="field__wrapper">
            <input type="password" name="password" placeholder="Password" required>
            <button type="button" class="field__icon">
                <img src="{{ asset('img/icons/eye.svg') }}" alt="eye">
            </button>
        </div>
    </div>
    <button class="btn" type="submit">Login</button>
</form>

<div class="auth-links">
    <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
</div>
@endsection

@push('scripts')
<script>
    // Password visibility toggle
    document.addEventListener('DOMContentLoaded', function() {
        const eyeButtons = document.querySelectorAll('.field__icon');
        eyeButtons.forEach(button => {
            button.addEventListener('click', function() {
                const input = this.parentElement.querySelector('input');
                if (input.type === 'password') {
                    input.type = 'text';
                } else {
                    input.type = 'password';
                }
            });
        });
    });
</script>
@endpush