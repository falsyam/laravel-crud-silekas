<!DOCTYPE html>
<html lang="id" class="h-full bg-gray-100">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title') - SILEKAS</title>
  <link rel="icon" href="{{ asset('img/logo-silekas.png') }}">
      <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full">

  <div class="min-h-full">
    <!-- Navbar -->
    <nav class="bg-gray-800 shadow">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
          <div class="flex items-center">
            <a href="/" class="flex items-center space-x-2">
              <img class="h-8 w-auto" src="{{ asset('img/logo-silekas.png') }}" alt="Logo SILEKAS">
            </a>
          </div>
          <div class="hidden md:flex space-x-6">
          </div>
        </div>
      </div>
    </nav>

    <!-- Main Content -->
    <main class="py-10">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        @yield('content')
      </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t mt-10">
      <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 text-center text-sm text-gray-500">
        &copy; {{ date('Y') }} Dinas Sosial Kabupaten Kudus. All rights reserved.
      </div>
    </footer>
  </div>

</body>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('modals', {
            showLogoutConfirm: false,
        });
    });
</script>
</html>