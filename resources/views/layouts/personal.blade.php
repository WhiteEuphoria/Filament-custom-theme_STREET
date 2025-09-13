<!doctype html>
<html lang="en">

<head>
    <title>@yield('title', 'Personal Account')</title>
    <meta charset="UTF-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    
    <!-- Preconnect to fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    @vite(['resources/css/style.min.css'])
    @stack('styles')
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
</head>

<body>
    <div class="wrapper">
        @yield('content')
    </div>

    <!-- Scripts -->
    @vite(['resources/js/app.min.js'])
    @stack('scripts')

    <!-- Common loader script -->
    <script>
        const btnToggleCryptoBlock = document.querySelector('.btn-toggle-crypto-window')
        const cryptoWindowInfo = document.querySelector('.type-crypto-window')
        const cryptoForm = document.querySelector('.form-crypto')
        if (btnToggleCryptoBlock && cryptoWindowInfo && cryptoForm) {
            btnToggleCryptoBlock.addEventListener('click', () => {
                cryptoForm.classList.toggle('hide')
                cryptoWindowInfo.classList.toggle('show')
            })
        }

        // Loader functionality
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
        });
    </script>
</body>

</html>