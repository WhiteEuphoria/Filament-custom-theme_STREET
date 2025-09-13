{{-- Header Navigation Partial --}}
@if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block z-10">
        @auth
            <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline hover:text-gray-900 dark:hover:text-gray-300 transition-colors">Home</a>
            <a href="{{ url('/admin') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline hover:text-gray-900 dark:hover:text-gray-300 transition-colors">Admin</a>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline hover:text-gray-900 dark:hover:text-gray-300 transition-colors">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline hover:text-gray-900 dark:hover:text-gray-300 transition-colors">Register</a>
            @endif
        @endauth
    </div>
@endif