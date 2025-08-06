@extends('layouts.user')

@section('title', 'Cek Status')

@section('content')
<div class="flex flex-col min-h-screen">
  <div class="py-10 flex-grow">
    <header>
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Cek Status Pengajuan</h1>
      </div>
    </header>

    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
      
      <!-- Konten Form -->
      <div class="bg-white shadow-sm sm:rounded-lg">
        <div class="px-6 py-8 sm:p-10">
          @if ($errors->has('message'))
    <div class="mt-2 text-sm text-red-600">
        {{ $errors->first('message') }}
    </div>
@endif
          <h3 class="text-xl font-semibold text-gray-900">Masukkan Nomor HP dan Kode Unik</h3>
          <div class="mt-3 max-w-xl text-base text-gray-600">
            <p>Untuk mengecek status pengajuan, harap inputkan dengan benar.</p>
          </div>
         <form action="{{ route('cek-status-user.userProses') }}" method="POST" class="mt-6 w-full max-w-md space-y-3">
            @csrf
  <div>
    <input
      type="text"
      name="telepon_pengisi"
      id="telepon_pengisi"
      aria-label="Nomor HP Pengisi"
      class="block w-full rounded-lg bg-white px-5 py-2 text-base text-gray-900 outline outline-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600"
      placeholder="Nomor HP"
    >
  </div>

  <div>
    <input
      type="text"
      name="kode"
      id="kode"
      aria-label="Kode Unik"
      class="block w-full rounded-lg bg-white px-5 py-2 text-base text-gray-900 outline outline-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600"
      placeholder="Kode Unik"
    >
  </div>

  <div>
    <button
      type="submit"
      class="w-full rounded-lg bg-indigo-600 px-5 py-3 text-lg font-semibold text-white shadow-md hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
    >
      Cek Status
    </button>
  </div>
</form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
