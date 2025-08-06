<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Page')</title>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('modals', {
            showLogoutConfirm: false,
        });
    });
</script>
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- sesuaikan dengan asset Tailwindmu --}}
  </head>
  <body class="h-full">
    @include('layouts.admin-sidebar') {{-- Sidebar dari langkah 1 --}}
    <main class="py-10 lg:pl-72">
      <div class="px-4 sm:px-6 lg:px-8">
        @yield('content') {{-- Tempat konten halaman --}}
      </div>
    </main>
  </body>
</html>