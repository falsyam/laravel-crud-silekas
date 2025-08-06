@extends('layouts.new')

@section('title', 'Verifikasi')

@section('content')

<main class="py-10">
      <div class="px-4 sm:px-6 lg:px-8">
         <div class="min-w-0 flex-1">
           
          <h2 class="text-2xl/7 font-bold text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Verifikasi</h2>
  <div class="mt-8 flow-root">
    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
        <table class="min-w-full divide-y divide-gray-300">
          <thead>
            <tr>
              <th scope="col" class="py-3.5 pr-3 pl-4 text-left text-sm font-semibold text-gray-900 sm:pl-0">Nama LKS</th>
              <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Alamat LKS</th>
              <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Tanggal Pengajuan</th>
              <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
              <th scope="col" class="relative py-3.5 pr-4 pl-3 sm:pr-0">
                <span class="sr-only">Edit</span>
              </th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200 bg-white">
            @foreach ($dataPengajuan as $pengajuan)
            <tr>
              <td class="py-5 pr-3 pl-4 text-sm whitespace-nowrap sm:pl-0">
                <div class="flex items-center">
                  <div class="size-11 shrink-0">
                    <img class="size-11 rounded-full" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                  </div>
                  <div class="ml-4">
                    <div class="font-medium text-gray-900">{{ $pengajuan->identitasLks->nama_lks ?? '-' }}</div>
                  </div>
                </div>
              </td>
              <td class="px-3 py-5 text-sm whitespace-nowrap text-gray-500">
                <div class="text-gray-900">{{ $pengajuan->identitasLks->dataUmum->alamat_lks ?? '-' }}</div>
                <div class="mt-1 text-gray-500">{{ $pengajuan->identitasLks->dataUmum->kota ?? '' }}</div>
              </td>
              <td class="px-3 py-5 text-sm whitespace-nowrap text-gray-500">
                 {{ \Carbon\Carbon::parse($pengajuan->tanggal_pengajuan)->translatedFormat('d F Y') }}
              </td>
              @php
  $status = strtolower($pengajuan->status);
  $class = match ($status) {
      'terverifikasi' => 'inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-green-600/20 ring-inset',
      'menunggu'      => 'inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-700 ring-1 ring-yellow-600/20 ring-inset',
      'ditolak'       => 'inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-red-600/20 ring-inset',
      default         => 'inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-700 ring-1 ring-gray-600/20 ring-inset',
  };
@endphp
              <td class="px-3 py-5 text-sm whitespace-nowrap text-gray-500"> <span class="{{ $class }}">
        {{ ucfirst($pengajuan->status) }}
      </span></td>
              <td class="relative py-5 pr-4 pl-3 text-right text-sm font-medium whitespace-nowrap sm:pr-0">
                <a href="{{ route('verifikasi.detail',$pengajuan->id) }}" class="text-indigo-600 hover:text-indigo-900">Verifikasi<span class="sr-only"> </span></a>
              </td>
            </tr>
           
@endforeach
@forelse($dataPengajuan as $pengajuan)
  <!-- tampilkan data -->
@empty
  <tr>
    <td colspan="3" class="text-center text-gray-500 py-4">Semua Pengajuan sudah diverifikasi.</td>
  </tr>
@endforelse

      </div>
</main>

@endsection