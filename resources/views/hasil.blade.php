@extends('layouts.new')

@section('title', 'Cek Status')

@section('content')


<main class="py-10">
      <div class="px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl/7 font-bold text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Data Pengajuan</h2>
<div class="mt-6 bg-white shadow-md rounded-lg p-6">
  

 <table class="w-full text-sm text-left text-gray-700">
  <tbody>
    <tr class="border-b">
      <th class="py-2 pr-4 font-medium text-gray-700">Kode Unik</th>
      <td class="py-2 text-gray-900">: {{ $pengajuan->kode_unik }}</td>
    </tr>
    <tr class="border-b">
      <th class="py-2 pr-4 font-medium text-gray-700">Nama LKS</th>
      <td class="py-2 text-gray-900">: {{ $pengajuan->identitasLks->nama_lks }}</td>
    </tr>
    <tr class="border-b">
      <th class="py-2 pr-4 font-medium text-gray-700">Alamat</th>
      <td class="py-2 text-gray-900">:
        {{ $pengajuan->identitasLks->dataUmum->kecamatan . ', ' . $pengajuan->identitasLks->dataUmum->kota }}
      </td>
    </tr>
    <tr class="border-b">
      <th class="py-2 pr-4 font-medium text-gray-700">Tanggal pengajuan</th>
      <td class="py-2 text-gray-900">:
        {{ \Carbon\Carbon::parse($pengajuan->tanggal_pengajuan)->translatedFormat('d F Y') }}
      </td>
    </tr>
    <tr class="border-b">
      <th class="py-2 pr-4 font-medium text-gray-700">Tipe Pengajuan</th>
      <td class="py-2 text-gray-900">:
        {{ $pengajuan->tipe_pengajuan ?? '-' }}
      </td>
    </tr>
    <tr class="border-b">
      <th class="py-2 pr-4 font-medium text-gray-700">Status</th>
      <td class="py-2">: 
        @php
          $status = strtolower($pengajuan->status);
          $class = match ($status) {
              'terverifikasi' => 'inline-flex items-center rounded-md bg-green-50 px-4 py-1 text-xs font-medium text-green-700 ring-1 ring-green-600/20 ring-inset',
              'menunggu'      => 'inline-flex items-center rounded-md bg-yellow-50 px-4 py-1 text-xs font-medium text-yellow-700 ring-1 ring-yellow-600/20 ring-inset',
              'ditolak'       => 'inline-flex items-center rounded-md bg-red-50 px-4 py-1 text-xs font-medium text-red-700 ring-1 ring-red-600/20 ring-inset',
              default         => 'inline-flex items-center rounded-md bg-gray-50 px-4 py-1 text-xs font-medium text-gray-700 ring-1 ring-gray-600/20 ring-inset',
          };
        @endphp
        <span class="{{ $class }}">{{ ucfirst($pengajuan->status) }}</span>
      </td>
    </tr>
    <tr>
      <th class="py-2 pr-4 font-medium text-gray-700">Keterangan</th>
      <td class="py-2 text-gray-900">: {{ $pengajuan->keterangan ?? '-' }}</td>
    </tr>
  </tbody>
</table>
</main>
@endsection