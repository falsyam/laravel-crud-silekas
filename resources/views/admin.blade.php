@extends('layouts.new')

@section('title', 'Dashboard Admin')

@section('content')

<main class="py-10">
      <div class="px-4 sm:px-6 lg:px-8">
<div class="md:flex md:items-center md:justify-between">
  <div class="min-w-0 flex-1">
    <h2 class="text-2xl/7 font-bold text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Dashboard</h2>
  </div>
</div>

        <div>

  <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
    <div class="relative overflow-hidden rounded-lg bg-white px-4 pt-5 pb-12 shadow-sm sm:px-6 sm:pt-6">
      <dt>
        <div class="absolute rounded-md bg-indigo-500 p-3">
          <svg class="size-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
          </svg>
        </div>
        <p class="ml-16 truncate text-sm font-medium text-gray-500">Total Pengajuan</p>
      </dt>
      <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
        <p class="text-2xl font-semibold text-gray-900">{{ $totalPengajuan }}</p>
        <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
          <div class="text-sm">
            <a href="{{ route('daftar-pengajuan') }}" class="font-medium text-indigo-600 hover:text-indigo-500">Lihat Semua<span class="sr-only"></span></a>
          </div>
        </div>
      </dd>
    </div>
    <div class="relative overflow-hidden rounded-lg bg-white px-4 pt-5 pb-12 shadow-sm sm:px-6 sm:pt-6">
      <dt>
        <div class="absolute rounded-md bg-indigo-500 p-3">
          <svg class="size-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
          </svg>
        </div>
        <p class="ml-16 truncate text-sm font-medium text-gray-500">Menunggu</p>
      </dt>
      <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
        <p class="text-2xl font-semibold text-gray-900">{{ $pengajuanMenunggu }}</p>
        <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
          <div class="text-sm">
            <a href="{{ route('daftar-pengajuan') }}?status=menunggu" class="font-medium text-indigo-600 hover:text-indigo-500">Lihat Semua<span class="sr-only"></span></a>
          </div>
        </div>
      </dd>
    </div>
    <div class="relative overflow-hidden rounded-lg bg-white px-4 pt-5 pb-12 shadow-sm sm:px-6 sm:pt-6">
      <dt>
        <div class="absolute rounded-md bg-indigo-500 p-3">
          <svg class="size-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 9v.906a2.25 2.25 0 0 1-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 0 0 1.183 1.981l6.478 3.488m8.839 2.51-4.66-2.51m0 0-1.023-.55a2.25 2.25 0 0 0-2.134 0l-1.022.55m0 0-4.661 2.51m16.5 1.615a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V8.844a2.25 2.25 0 0 1 1.183-1.981l7.5-4.039a2.25 2.25 0 0 1 2.134 0l7.5 4.039a2.25 2.25 0 0 1 1.183 1.98V19.5Z" />
          </svg>
        </div>
        <p class="ml-16 truncate text-sm font-medium text-gray-500">Terverifikasi</p>
      </dt>
      <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
        <p class="text-2xl font-semibold text-gray-900">{{ $pengajuanTerverifikasi }}</p>
        <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
          <div class="text-sm">
            <a href="{{ route('daftar-pengajuan') }}?status=terverifikasi" class="font-medium text-indigo-600 hover:text-indigo-500">Lihat Semua<span class="sr-only"></span></a>
          </div>
        </div>
      </dd>
    </div>
    <div class="relative overflow-hidden rounded-lg bg-white px-4 pt-5 pb-12 shadow-sm sm:px-6 sm:pt-6">
      <dt>
        <div class="absolute rounded-md bg-indigo-500 p-3">
          <svg class="size-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672 13.684 16.6m0 0-2.51 2.225.569-9.47 5.227 7.917-3.286-.672ZM12 2.25V4.5m5.834.166-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243-1.59-1.59" />
          </svg>
        </div>
        <p class="ml-16 truncate text-sm font-medium text-gray-500">Ditolak</p>
      </dt>
      <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
        <p class="text-2xl font-semibold text-gray-900">{{ $pengajuanDitolak }}</p>
        <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
          <div class="text-sm">
            <a href="{{ route('daftar-pengajuan') }}?status=ditolak" class="font-medium text-indigo-600 hover:text-indigo-500">Lihat Semua<span class="sr-only"></span></a>
          </div>
        </div>
      </dd>
    </div>
  </dl>
</div>

         <div class="px-4 sm:px-6 lg:px-8">
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
                <span class="sr-only">Lihat Detail</span>
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
                    <div class="mt-1 text-gray-500">{{ $pengajuan->identitasLks->email ?? '' }}</div>
                  </div>
                </div>
              </td>
              <td class="px-3 py-5 text-sm whitespace-nowrap text-gray-500">
                <div class="text-gray-900">{{ $pengajuan->identitasLks->dataUmum->tipe_pengajuan ?? '-' }}</div>
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
                <a href="{{ route('verifikasi.detail', $pengajuan->id) }}" class="text-indigo-600 hover:text-indigo-900">Lihat Detail<span class="sr-only"></span></a>
              </td>
            </tr>
           
@endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</main>

@endsection