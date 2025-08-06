@extends('layouts.user')

@section('title', 'Cek Status')

@section('content')




  <header class="relative isolate pt-16">
    <div class="absolute inset-0 -z-10 overflow-hidden" aria-hidden="true">
      <div class="absolute top-full left-16 -mt-16 transform-gpu opacity-50 blur-3xl xl:left-1/2 xl:-ml-80">
        <div class="aspect-1154/678 w-[72.125rem] bg-linear-to-br from-[#FF80B5] to-[#9089FC]" style="clip-path: polygon(100% 38.5%, 82.6% 100%, 60.2% 37.7%, 52.4% 32.1%, 47.5% 41.8%, 45.2% 65.6%, 27.5% 23.4%, 0.1% 35.3%, 17.9% 0%, 27.7% 23.4%, 76.2% 2.5%, 74.2% 56%, 100% 38.5%)"></div>
      </div>
      <div class="absolute inset-x-0 bottom-0 h-px bg-gray-900/5"></div>
    </div>

  </header>

  <body>
    <div class="mb-15">
<h2 class="text-2xl/7 font-bold text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Hasil Cek Status</h2>
    </div>

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
      <td class="py-2 text-gray-900">: {{ $pengajuan->catatan ?? '-' }}</td>
    </tr>
  </tbody>
</table>
<span>
  @if ($pengajuan->status === 'terverifikasi')
    <a href="{{ route('surat.download', $pengajuan->id) }}"
      class="mt-10 inline-flex items-center rounded-md bg-indigo-600 px-7 py-3 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500">
      Download Surat Tanda Daftar
    </a>
  @endif
</span>
  </body>
</main>
@endsection