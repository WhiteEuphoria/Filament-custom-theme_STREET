@extends('layouts.auth')

@section('title', 'Register')

@section('auth-content')
<form class="auth-form" method="POST" action="{{ route('register') }}">
    @csrf
    <div class="field">
        <input type="text" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" required>
    </div>
    <div class="field">
        <input type="text" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required>
    </div>
    <div class="field">
        <input type="email" name="email" placeholder="E-mail" value="{{ old('email') }}" required>
    </div>
    <div class="field">
        <select name="country" required>
            <option value="" selected>Country</option>
            <option value="US" {{ old('country') == 'US' ? 'selected' : '' }}>United States</option>
            <option value="GB" {{ old('country') == 'GB' ? 'selected' : '' }}>United Kingdom</option>
            <option value="DE" {{ old('country') == 'DE' ? 'selected' : '' }}>Germany</option>
            <option value="FR" {{ old('country') == 'FR' ? 'selected' : '' }}>France</option>
            <option value="ES" {{ old('country') == 'ES' ? 'selected' : '' }}>Spain</option>
            <option value="IT" {{ old('country') == 'IT' ? 'selected' : '' }}>Italy</option>
            <option value="CA" {{ old('country') == 'CA' ? 'selected' : '' }}>Canada</option>
            <option value="AU" {{ old('country') == 'AU' ? 'selected' : '' }}>Australia</option>
        </select>
    </div>
    <div class="field">
        <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
    </div>
    <div class="field">
        <div class="field__wrapper">
            <input type="password" name="password" placeholder="Password" required>
            <button type="button" class="field__icon">
                <img src="{{ asset('img/icons/eye.svg') }}" alt="eye">
            </button>
        </div>
    </div>
    <div class="field">
        <div class="field__wrapper">
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <button type="button" class="field__icon">
                <img src="{{ asset('img/icons/eye.svg') }}" alt="eye">
            </button>
        </div>
    </div>
    <button class="btn" type="submit">Sign Up</button>
</form>

<div class="auth-links">
    <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
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