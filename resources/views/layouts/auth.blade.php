@extends('layouts.personal')

@section('content')
<main class="page">
    <div class="auth-page">
        <div class="auth">
            <div class="logo">
                <img src="{{ asset('img/logo.svg') }}" alt="logo">
            </div>
            @yield('auth-content')
        </div>
    </div>
</main>
@endsection