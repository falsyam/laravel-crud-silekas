@extends('layouts.new')

@section('title', 'Pengaturan Akun')

@section('content')

{{-- Tampilkan pesan sukses --}}
@if (session('status'))
    <div class="mb-4 p-4 rounded-md bg-green-100 text-green-800 text-sm">
        {{ session('status') }}
    </div>
@endif

{{-- Tampilkan error validasi --}}
@if ($errors->any())
    <div class="mb-4 p-4 rounded-md bg-red-100 text-red-800 text-sm">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<main class="py-10">
      <div class="px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl/7 font-bold text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Pengaturan Akun</h2>
              <div class="divide-y divide-gray-200">


  <!-- Section: Change Password -->
  <div class="grid max-w-7xl grid-cols-1 gap-x-8 gap-y-10 px-4 py-16 sm:px-6 md:grid-cols-3 lg:px-8">
    <div>
      <h2 class="text-base font-semibold text-gray-900">Ganti password</h2>
      <p class="mt-1 text-sm text-gray-600">Perbarui kata sandi anda saat ini.</p>
    </div>

    <form method="POST" action="{{ route('password.update') }}" onsubmit="return confirm('Apakah Anda yakin ingin mengganti password?')" class="md:col-span-2">
        @csrf
      <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:max-w-xl sm:grid-cols-6">
        <div class="col-span-full">
          <label for="current-password" class="block text-sm font-medium text-gray-900">Password saat ini</label>
          <div class="mt-2">
            <input id="current-password" name="current_password" type="password" autocomplete="current-password" class="block w-full rounded-md bg-white border border-gray-300 px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
          </div>
        </div>

        <div class="col-span-full">
          <label for="new-password" class="block text-sm font-medium text-gray-900">Password baru</label>
          <div class="mt-2">
            <input id="new-password" name="new_password" type="password" autocomplete="new-password" class="block w-full rounded-md bg-white border border-gray-300 px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
          </div>
        </div>

        <div class="col-span-full">
          <label for="confirm-password" class="block text-sm font-medium text-gray-900">Konfirmasi password</label>
          <div class="mt-2">
            <input id="confirm-password" name="new_password_confirmation" type="password" autocomplete="new-password" class="block w-full rounded-md bg-white border border-gray-300 px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
          </div>
        </div>
      </div>

      <div class="mt-8 flex">
        <button type="submit" class="rounded-md bg-indigo-600 px-6 py-2 text-sm font-semibold text-white shadow hover:bg-indigo-500 focus:outline focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">Simpan</button>
      </div>
    </form>
  </div>

  <!-- Section: Log Out Other Sessions -->
 

        </div>
</main>

@endsection