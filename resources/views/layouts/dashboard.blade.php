@extends('layouts.personal')

@section('content')
<header class="header">
    <div class="container">
        <div class="header__inner">
            <a href="{{ route('dashboard') }}" class="header__logo logo">
                <img src="{{ asset('img/logo.svg') }}" alt="Logo">
            </a>
            <div class="header__actions">
                <button type="button" class="btn btn--light btn-support" data-support-btn>
                    Support
                    <span class="btn__icon">
                        <img src="{{ asset('img/icons/support.svg') }}" alt="support">
                    </span>
                </button>
                <div class="desktop">
                    <button type="button" data-popup="#withdraw-modal" class="btn">
                        <span>Withdrawal of funds</span>
                    </button>
                </div>
                <div class="mobile">
                    <a href="{{ route('withdraw') }}" class="btn">
                        Withdrawal 
                        <span class="btn__icon">
                            <img src="{{ asset('img/icons/withdraw.svg') }}" alt="withdraw">
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<main class="page">
    @yield('dashboard-content')
</main>
@endsection