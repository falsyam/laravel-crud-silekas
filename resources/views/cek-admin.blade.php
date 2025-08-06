@extends('layouts.new')

@section('title', 'Cek Status')

@section('content')


<main class="py-10">
  
      <div class="px-4 sm:px-6 lg:px-8">
<div class="min-w-0 flex-1">
    <h2 class="text-2xl/7 font-bold text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Cek Status</h2>
  </div>
      <!-- Konten Form -->
      <div class="mt-10 bg-white shadow-sm sm:rounded-lg">
        @if ($errors->has('message'))
    <div class="mt-2 text-sm text-red-600">
        {{ $errors->first('message') }}
    </div>
@endif
          <h3 class="text-xl font-semibold text-gray-900">Masukkan Nomor HP Pengisi dan Kode Unik</h3>
          <div class="mt-3 max-w-xl text-base text-gray-600">
            <p>Untuk mengecek status pengajuan, harap inputkan dengan benar.</p>
          </div>
          <form action="{{ route('cek-status.proses') }}" method="POST" class="mt-6 w-full max-w-md space-y-3">
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
      placeholder="LKS-X-2025-XXXX"
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
      </div>
</main>
@endsection