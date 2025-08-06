<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Silekas')</title>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@100..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet" />

  <!-- CSS -->
  <link rel="stylesheet" href="{{ secure_asset('css/styles.css') }}" />
</head>
<body>

  @yield('content')
  <script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('modals', {
            showLogoutConfirm: false,
        });
    });
  </script>
  <script src="https://unpkg.com/feather-icons"></script>
  <script> feather.replace(); </script>
  <script src="{{ secure_asset('js/script.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</body>
</html>