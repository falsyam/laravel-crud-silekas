@extends('layouts.new')

@section('title', 'Verifikasi')

@section('content')



      <div class="px-4 sm:px-6 lg:px-8">
          <nav class="flex" aria-label="Breadcrumb">
      <ol role="list" class="flex items-center space-x-4">
        <li>
          <div class="flex">
            <a href="#" class="text-sm font-medium text-gray-500 hover:text-gray-700">Verifikasi</a>
          </div>
        </li>
        <li>
          <div class="flex items-center">
            <svg class="size-5 shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
              <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
            <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Detail Pemohon</a>
          </div>
        </li>
      </ol>
    </nav>
        @if (session('success'))
  <div class="rounded-md bg-green-50 p-4">
    <div class="flex">
      <div class="shrink-0">
        <svg class="size-5 text-green-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" />
        </svg>
      </div>
      <div class="ml-3">
        <h3 class="text-sm font-medium text-green-800">Berhasil</h3>
        <div class="mt-2 text-sm text-green-700">
          <p>{{ session('success') }}</p>
        </div>
        <div class="mt-4">
          <div class="-mx-2 -my-1.5 flex">
            @if ($pengajuan->surat)
            <a href="{{ route('surat.download', $pengajuan->id) }}" class="rounded-md bg-green-50 px-2 py-1.5 text-sm font-medium text-green-800 hover:bg-green-100 focus:ring-2 focus:ring-green-600 focus:ring-offset-2 focus:ring-offset-green-50 focus:outline-hidden">
            Download Surat
            </a>
            
            @endif
            <button type="button" onclick="this.closest('div.bg-green-50').remove()" class="ml-auto rounded-md bg-green-50 px-2 py-1.5 text-sm font-medium text-green-800 hover:bg-green-100 focus:ring-2 focus:ring-green-600 focus:ring-offset-2 focus:ring-offset-green-50 focus:outline-none">Tutup</button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endif

@if(session('error'))
  <div class="alert alert-danger">
    {{ session('error') }}
  </div>
@endif
        <div class="lg:flex lg:items-center lg:justify-between">
  <div class="min-w-0 flex-1">
  
    <h2 class="mt-2 text-2xl/7 font-bold text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">{{ $pengajuan->identitasLks->dataUmum->nama_lks ?? '-' }}</h2>
    <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6">
      <div class="mt-2 flex items-center text-sm text-gray-500">
        <svg class="mr-1.5 size-5 shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
          <path fill-rule="evenodd" d="M6 3.75A2.75 2.75 0 0 1 8.75 1h2.5A2.75 2.75 0 0 1 14 3.75v.443c.572.055 1.14.122 1.706.2C17.053 4.582 18 5.75 18 7.07v3.469c0 1.126-.694 2.191-1.83 2.54-1.952.599-4.024.921-6.17.921s-4.219-.322-6.17-.921C2.694 12.73 2 11.665 2 10.539V7.07c0-1.321.947-2.489 2.294-2.676A41.047 41.047 0 0 1 6 4.193V3.75Zm6.5 0v.325a41.622 41.622 0 0 0-5 0V3.75c0-.69.56-1.25 1.25-1.25h2.5c.69 0 1.25.56 1.25 1.25ZM10 10a1 1 0 0 0-1 1v.01a1 1 0 0 0 1 1h.01a1 1 0 0 0 1-1V11a1 1 0 0 0-1-1H10Z" clip-rule="evenodd" />
          <path d="M3 15.055v-.684c.126.053.255.1.39.142 2.092.642 4.313.987 6.61.987 2.297 0 4.518-.345 6.61-.987.135-.041.264-.089.39-.142v.684c0 1.347-.985 2.53-2.363 2.686a41.454 41.454 0 0 1-9.274 0C3.985 17.585 3 16.402 3 15.055Z" />
        </svg>
        {{ $pengajuan->identitasLks->dataUmum->kota ?? '-' }}
      </div>
      <div class="mt-2 flex items-center text-sm text-gray-500">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
  <path fill-rule="evenodd" d="M11.097 1.515a.75.75 0 0 1 .589.882L10.666 7.5h4.47l1.079-5.397a.75.75 0 1 1 1.47.294L16.665 7.5h3.585a.75.75 0 0 1 0 1.5h-3.885l-1.2 6h3.585a.75.75 0 0 1 0 1.5h-3.885l-1.08 5.397a.75.75 0 1 1-1.47-.294l1.02-5.103h-4.47l-1.08 5.397a.75.75 0 1 1-1.47-.294l1.02-5.103H3.75a.75.75 0 0 1 0-1.5h3.885l1.2-6H5.25a.75.75 0 0 1 0-1.5h3.885l1.08-5.397a.75.75 0 0 1 .882-.588ZM10.365 9l-1.2 6h4.47l1.2-6h-4.47Z" clip-rule="evenodd" />
</svg>

        {{ $pengajuan->kode_unik ?? '-' }}
      </div>
    </div>
  </div>
 <!-- <div class="mt-5 flex lg:mt-0 lg:ml-4">
    <span class="hidden sm:block">
      <button type="button" class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 shadow-xs ring-gray-300 ring-inset hover:bg-gray-50">
        <svg class="mr-1.5 -ml-0.5 size-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
          <path d="m2.695 14.762-1.262 3.155a.5.5 0 0 0 .65.65l3.155-1.262a4 4 0 0 0 1.343-.886L17.5 5.501a2.121 2.121 0 0 0-3-3L3.58 13.419a4 4 0 0 0-.885 1.343Z" />
        </svg>
        Download Formulir
      </button>
    </span> -->

<span class="ml-3 hidden sm:block">
  @if ($pengajuan->status === 'menunggu')
    <button type="button"
      onclick="tampilPopup('popup-alasan-penolakan')"
      class="inline-flex items-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
      <svg class="mr-1.5 -ml-0.5 size-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.53-10.47a.75.75 0 10-1.06-1.06L10 8.94 7.53 6.47a.75.75 0 00-1.06 1.06L8.94 10l-2.47 2.47a.75.75 0 101.06 1.06L10 11.06l2.47 2.47a.75.75 0 101.06-1.06L11.06 10l2.47-2.47z" clip-rule="evenodd"/>
      </svg>
      Tolak Pengajuan
    </button>
  @endif
</span>

<!-- Verifikasi dan Terbitkan -->
<!-- Tombol trigger -->
<span class="sm:ml-3">
  @if ($pengajuan->status === 'menunggu')
    <button onclick="bukaPopupNomorSurat({{ $pengajuan->id }})"
      class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500">
      Verifikasi & Terbitkan Surat
    </button>
  @else
    <button disabled class="inline-flex items-center rounded-md bg-gray-400 px-3 py-2 text-sm font-semibold text-white opacity-70 cursor-not-allowed">
      Sudah Diverifikasi
    </button>
  @endif
</span>

<!-- Popup Input Nomor Surat -->
<div id="popup-nomor-surat" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
  <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
    <h2 class="text-lg font-semibold mb-4">Masukkan Nomor Surat</h2>
    <input type="text" id="input-nomor-surat" class="w-full border border-gray-300 px-3 py-2 rounded-md mb-4" placeholder="Contoh: 001" required>
    <div class="flex justify-end gap-2">
      <button onclick="tutupPopup('popup-nomor-surat')" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
      <button onclick="lanjutKeKonfirmasi()" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-500">Lanjut</button>
    </div>
  </div>
</div>

<!-- Popup Konfirmasi -->
<div id="popup-konfirmasi" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
  <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
    <h2 class="text-lg font-semibold mb-4">Yakin ingin memverifikasi pengajuan ini?</h2>
    <form id="form-verifikasi" method="POST">
      @csrf
      <input type="hidden" name="nomor_surat" id="hidden-nomor-surat">
      <div class="flex justify-end gap-2">
        <button type="button" onclick="tutupPopup('popup-konfirmasi')" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-500">Ya, Verifikasi</button>
      </div>
    </form>
  </div>
</div>

<!-- Popup Alasan Penolakan -->
<div id="popup-alasan-penolakan" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
  <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
    <h2 class="text-lg font-semibold mb-4">Alasan Penolakan</h2>
    <form id="form-penolakan" method="POST" action="{{ route('tolak.proses', $pengajuan->id) }}">
      @csrf
      <textarea name="catatan" rows="4" required class="w-full border border-gray-300 px-3 py-2 rounded-md mb-4" placeholder="Tuliskan alasan penolakan..."></textarea>
      <div class="flex justify-end gap-2">
        <button type="button" onclick="tutupPopup('popup-alasan-penolakan')" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-500">Tolak Pengajuan</button>
      </div>
    </form>
  </div>
</div>

    <!-- Dropdown -->
    <div class="relative ml-3 sm:hidden">
      <button type="button" class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 shadow-xs ring-gray-300 ring-inset hover:ring-gray-400" id="mobile-menu-button" aria-expanded="false" aria-haspopup="true">
        More
        <svg class="-mr-1 ml-1.5 size-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
          <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
        </svg>
      </button>

      <!--
        Dropdown menu, show/hide based on menu state.

        Entering: "transition ease-out duration-200"
          From: "transform opacity-0 scale-95"
          To: "transform opacity-100 scale-100"
        Leaving: "transition ease-in duration-75"
          From: "transform opacity-100 scale-100"
          To: "transform opacity-0 scale-95"
      -->
    </div>
  </div>
</div>


<div class="mt-6">
  <div class="hidden sm:block">
    <div class="border-b border-gray-200">
      <nav class="-mb-px flex space-x-8" aria-label="Tabs">
        <button onclick="showTab('identitas')" class="tab-link border-b-2 border-indigo-500 px-1 py-4 text-sm font-medium whitespace-nowrap text-indigo-600" id="tab-identitas">Identitas & Data Umum</button>
        <button onclick="showTab('legalitas')" class="tab-link border-b-2 border-transparent px-1 py-4 text-sm font-medium whitespace-nowrap text-gray-500 hover:border-gray-300 hover:text-gray-700" id="tab-legalitas">Legalitas & Program</button>
        <button onclick="showTab('sumberdaya')" class="tab-link border-b-2 border-transparent px-1 py-4 text-sm font-medium whitespace-nowrap text-gray-500 hover:border-gray-300 hover:text-gray-700" id="tab-sumberdaya">Sumber Daya LKS</button>
        <button onclick="showTab('jejaring')" class="tab-link border-b-2 border-transparent px-1 py-4 text-sm font-medium whitespace-nowrap text-gray-500 hover:border-gray-300 hover:text-gray-700" id="tab-jejaring">Jejaring LKS</button>
      </nav>
    </div>
  </div>
</div>





<div id="identitas" class="tab-content block">
<div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
  <div class="px-4 py-5 sm:px-6 bg-gray-100">
    <h2 class="text-base/ font-bold text-gray-900">IDENTITAS PENGISI DATA</h3>
    <p class="mt-1 max-w-2xl text-sm/6 text-gray-500">Detail Formulir Permohonan LKS.</p>
  </div>
  <div class="border-t border-gray-100">
    <dl class="divide-y divide-gray-100">
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Nama LKS yang didaftarkan</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->dataUmum->nama_lks ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Domisili LKS</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->dataUmum->kecamatan .', '. $pengajuan->identitasLks->dataUmum->kota}}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Nama pengisi pendaftaran</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->nama_pengisi ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Jabatan di LKS</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->jabatan ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Nomor telepon / hp</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->telepon_pengisi ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Alamat E-mail</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->email ?? '-' }}</dd>
      </div>
    </dl>
  </div>
</div>



  <div class="px-4 py-5 sm:px-6 bg-gray-100">
    <h2 class="text-base/ font-bold text-gray-900">DATA UMUM LKS</h3>
    <p class="mt-1 max-w-2xl text-sm/6 text-gray-500">Detail Formulir Permohonan LKS.</p>
  </div>
  <div class="border-t border-gray-100">
    <dl class="divide-y divide-gray-100">
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Nama LKS</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->dataUmum->nama_lks ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Singkatan Nama LKS</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->dataUmum->singkatan ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Alamat LKS</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->dataUmum->alamat_lks ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Telepon</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->kontak->telepon ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Fax</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->kontak->fax ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">E-mail</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->kontak->email ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Situs / Website</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->kontak->website ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Media Sosial</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->kontak->media_sosial ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Pendirian LKS</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->pendirian->tempat_didirikan .', '. $pengajuan->identitasLks->pendirian->tanggal.' '. $pengajuan->identitasLks->pendirian->bulan.' '. $pengajuan->identitasLks->pendirian->tahun}}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Nomor Akta</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->pendirian->nomor_akta ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-1 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Nama Ketua</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->pengurus->nama_ketua ?? '-' }}</dd>
        <dt class="text-sm font-medium text-gray-900">Alamat</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->pengurus->alamat_ketua ?? '-' }}</dd>
        <dt class="text-sm font-medium text-gray-900">Telepon</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->pengurus->telepon_ketua ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-1 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Nama Sekretaris</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->pengurus->nama_sekretaris ?? '-' }}</dd>
        <dt class="text-sm font-medium text-gray-900">Alamat</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->pengurus->alamat_sekretaris ?? '-' }}</dd>
        <dt class="text-sm font-medium text-gray-900">Telepon</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->pengurus->telepon_sekretaris ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-1 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Nama Bendahara</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->pengurus->nama_bendahara ?? '-' }}</dd>
        <dt class="text-sm font-medium text-gray-900">Alamat</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->pengurus->alamat_bendahara ?? '-' }}</dd>
        <dt class="text-sm font-medium text-gray-900">Telepon</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->pengurus->telepon_bendahara ?? '-' }}</dd>
      </div>
    </dl>
  </div>


  <div class="px-4 py-5 sm:px-6 bg-gray-100">
    <h2 class="text-base/ font-bold text-gray-900">IDENTITAS/JATI DIRI LKS</h3>
    <p class="mt-1 max-w-2xl text-sm/6 text-gray-500">Detail Formulir Permohonan LKS.</p>
  </div>
  <div class="border-t border-gray-100">
    <dl class="divide-y divide-gray-100">
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Visi LKS</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->jatidiri->visi_lks ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Misi LKS</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->jatidiri->misi_lks ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Tujuan LKS</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->jatidiri->tujuan_lks ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Status LKS</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->jatidiri->status_lks ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Sifat pelayanan LKS</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->jatidiri->sifat_pelayanan ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Posisi LKS</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->jatidiri->posisi_lks ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Lingkup Kerja</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->jatidiri->lingkup_kerja ?? '-' }}</dd>
      </div>
      </div>
    </dl>
  </div>




  <div id="legalitas" class="tab-content hidden">
    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
  <div class="px-4 py-5 sm:px-6 bg-gray-100">
    <h2 class="text-base/ font-bold text-gray-900">LEGALITAS LKS</h3>
    <p class="mt-1 max-w-2xl text-sm/6 text-gray-500">Detail Formulir Permohonan LKS.</p>
  </div>
  <div class="border-t border-gray-100">
    <dl class="divide-y divide-gray-100">
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Peraturan/Anggaran Dasar</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->legalitas->anggaran_dasar ?? '-' }}</dd>
        <dt class="text-sm font-medium text-gray-900">Peraturan/Anggaran Rumah Tangga</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->legalitas->anggaran_rt ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Akta Pendirian</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->legalitas->akta_pendirian ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Akta pendirian LKS Tidak Berbadan Hukum</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->legalitas->akta_pendirian_lks_tidak ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Nama Notaris</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->legalitas->nama_notaris_tidak ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Nomor Akta</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->legalitas->nomor_akta_tidak ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Nomor Surat Keterangan Terdaftar</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->legalitas->nomor_surat_keterangan_terdaftar ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Akta pendirian LKS Berbadan Hukum</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->legalitas->akta_pendirian_lks_berbadan ?? '-' }}</dd>
      </div>
            <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Nama Notaris</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->legalitas->nama_notaris_berbadan ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Nomor Akta</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->legalitas->nomor_akta_berbadan ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Nomor Pengesahan Akta Pendirian</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->legalitas->nomor_pengesahan ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Nomor Lembaran Negara</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->legalitas->nomor_lembaran_negara ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Keterangan Domisili LKS</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->legalitas->ket_domisili ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Tanda Pendaftaran LKS</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->legalitas->tanda_pendaftaran ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Asal Instansi/dinas </dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->legalitas->nama_instansi ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Nomor</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->legalitas->nomor_tanda_pendaftaran ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">NPWP atas nama LKS</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->legalitas->nomor_npwp ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Rekening bank atas nama LKS</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->legalitas->rekening ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Nama Bank </dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->legalitas->nama_bank ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Nomor Rekening </dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->legalitas->nomor_rekening ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Nama Pemilik Rekening</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->legalitas->nama_rekening ?? '-' }}</dd>
      </div>

      <div class="px-4 py-5 sm:px-6 bg-gray-100">
    <h2 class="text-base/ font-bold text-gray-900">PROGRAM DAN KEGIATAN LKS</h3>
    <p class="mt-1 max-w-2xl text-sm/6 text-gray-500">Detail Formulir Permohonan LKS.</p>
  </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Sasaran Pelayanan </dt>
        <dd class="text-sm font-medium text-gray-900">:</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Perseorangan/individu </dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->program->sasaran_perseorangan ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Keluarga </dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->program->sasaran_keluarga ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Kelompok </dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->program->sasaran_kelompok ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Masyarakat </dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->program->sasaran_masyarakat ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Jenis permasalahan sosial yang ditangani LKS  </dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">:</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Kemiskinan </dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->program->masalah_kemiskinan ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Ketelantaran </dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->program->masalah_ketelantaran?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Disabilitas </dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->program->masalah_disabilitas ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Keterpencilan </dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->program->masalah_keterpencilan ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Ketunaan Sosial dan penyimpangan
perilaku
 </dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->program->masalah_tunakepribadian ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Korban Bencana </dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->program->masalah_bencana ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Korban tindak kekerasan, eksploitasi dan
diskriminasi
 </dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->program->masalah_kekerasan ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Jenis pelayanan/kegiatan LKS di bidang kesejahteraan Sosial  :  </dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0"></dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Rehabilitasi Sosial </dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->program->rehabilitasi_sosial ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Pemberdayaan Sosial </dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->program->pemberdayaan_sosial ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Perlindungan Sosial </dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->program->perlindungan_sosial ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Jaminan Sosial </dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->program->jaminan_sosial ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Jenis Pelayanan / kegiatan LKS di luar bidang kesejahteraan Sosial  </dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">:</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Pendidikan </dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->program->pelayanan_pendidikan ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Kesehatan </dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->program->pelayanan_kesehatan ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Keagamaan </dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->program->pelayanan_keagamaan ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Sistem pelayanan yang digunakan oleh LKS </dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">:</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Sistem pelayanan dalam lembaga </dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->program->dalam_lembaga ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Sistem pelayanan luar lembaga </dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->program->luar_lembaga ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Lokasi pelayanan </dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->program->lokasi_pelayanan ?? '-' }}</dd>
      </div>
    
    </dl>
  </div>
</div>
  </div>
  <div id="sumberdaya" class="tab-content hidden">
  <div class="px-4 py-5 sm:px-6 bg-gray-100">
    <h2 class="text-base/ font-bold text-gray-900">SUMBER DAYA LKS</h3>
    <p class="mt-1 max-w-2xl text-sm/6 text-gray-500">Detail Formulir Permohonan LKS.</p>
  </div>
  <div class="border-t border-gray-100">
    <dl class="divide-y divide-gray-100">
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Prasarana bangunan kantor milik LKS</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->sumberdaya->prasarana_bangunan_kantor ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Status Bangunan Kantor</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->sumberdaya->status_bangunan_kantor ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Sarana pekantoran milik LKS</dt>
        <dd class="text-sm font-medium text-gray-900">:</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Papan nama</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->sumberdaya->papan_nama?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Papan data</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->sumberdaya->papan_data ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Ruang konseling</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->sumberdaya->ruang_konseling ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Ruang diagnosa</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->sumberdaya->ruang_diagnosa ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Ruang makan</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->sumberdaya->ruang_makan?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Ruang Kesehatan</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->sumberdaya->ruang_kesehatan ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Peralatan
komunikasi
</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->sumberdaya->peralatan_komunikasi ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Instalasi listrik</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->sumberdaya->instalasi_listrik ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Mobil</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->sumberdaya->mobil ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Motor</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->sumberdaya->motor ?? '-' }}</dd>
      </div>
      @php
    $pelayananList = $pengajuan->identitasLks->pelayanan ?? collect();
    $pelayananLainList = $pengajuan->identitasLks->pelayananlain ?? collect();
    $usahapenunjangList  = $pengajuan->identitasLks->usahaPenunjang ?? collect();
@endphp

@foreach (['Anak Balita', 'Anak', 'Penyandang Disabilitas', 'Lanjut Usia', 'Tuna Sosial','Korban Tindak Kekerasan','Korban NAPZA','Korban Bencana','Fakir Miskin'] as $kategori)
    @php
        $pelayanan = $pelayananList->firstWhere('kategori_pelayanan', $kategori);
    @endphp
    <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Pelayanan Sosial {{ $kategori }}</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
            {{ $pelayanan ? $pelayanan->bentuk_pelayanan . ' (' . $pelayanan->jumlah_binaan . ' binaan)' : '-' }}
        </dd>
    </div>
@endforeach

<div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
    <dt class="text-sm font-medium text-gray-900">Sarana pelayanan di bidang lain</dt>
    <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
        @if ($pelayananLainList->isNotEmpty())
            <ul class="list-disc ml-4">
                @foreach ($pelayananLainList as $item)
                    <li>{{ $item->jenis_pelayanan }} ({{ $item->jumlah_binaan }} binaan)</li>
                @endforeach
            </ul>
        @else
            -
        @endif
    </dd>
</div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
    <dt class="text-sm font-medium text-gray-900">Sarana pelayanan di bidang lain</dt>
    <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
        @if ($usahapenunjangList->isNotEmpty())
            <ul class="list-disc ml-4">
                @foreach ($usahapenunjangList as $item)
                    <li>{{ $item->jenis_usaha }}</li>
                @endforeach
            </ul>
        @else
            -
        @endif
    </dd>
</div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Sumber Daya Manusia</dt>
        <dd class="text-sm font-medium text-gray-900">:</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Pembina LKS</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->sumberdayamanusia->jumlah_pembina ?? '-' }} Orang</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Pengurus LKS</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->sumberdayamanusia->jumlah_pengurus ?? '-' }} Orang</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Pengawas LKS</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->sumberdayamanusia->jumlah_pengawas ?? '-' }} Orang</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Pekerja Sosial</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->sumberdayamanusia->jumlah_pekerja_sosial ?? '-' }} Orang</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Tenaga teknis lainnya</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->sumberdayamanusia->jumlah_teknis_lainnya ?? '-' }} Orang</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Tenaga administrasi</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->sumberdayamanusia->jumlah_administrasi ?? '-' }} Orang</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Tenaga penunjang</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->sumberdayamanusia->jumlah_penunjang ?? '-' }} Orang</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Sumber Dana</dt>
        <dd class="text-sm font-medium text-gray-900">:</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Modal awal</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->sumberdayamanusia->modal_awal ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Iuran anggota</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->sumberdayamanusia->iuran_anggota ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Hasil usaha LKS</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->sumberdayamanusia->hasil_usaha ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Sumbangan donatur</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->sumberdayamanusia->donatur ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Sumbangan dunia usaha</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->sumberdayamanusia->dunia_usaha ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Zakat Masyarakat</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->sumberdayamanusia->zakat ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Bantuan Lembaga sosial</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->sumberdayamanusia->bantuan_lembaga ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Bantuan dunia usaha</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->sumberdayamanusia->bantuan_usaha ?? '-' }}</dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-900">Bantuan pemerintah</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan->identitasLks->sumberdayamanusia->bantuan_pemerintah ?? '-' }}</dd>
      </div>
    </dl>
  </div>
</div>
  <div id="jejaring" class="tab-content hidden">
  <div class="px-4 py-5 sm:px-6 bg-gray-100">
    <h2 class="text-base/ font-bold text-gray-900">JEJARING LKS</h3>
    <p class="mt-1 max-w-2xl text-sm/6 text-gray-500">Detail Formulir Permohonan LKS.</p>
  </div>
  @php
    $jejaringList = $pengajuan->identitasLks->jejaring ?? collect();

    $dalamLembaga = $jejaringList->where('kategori', 'Lembaga Sosial')->where('asal', 'Dalam Negeri');
    $luarLembaga = $jejaringList->where('kategori', 'Lembaga Sosial')->where('asal', 'Luar Negeri');
    $dalampelaku = $jejaringList->where('kategori', 'Pelaku Dunia Usaha')->where('asal', 'Dalam Negeri');
    $luarpelaku = $jejaringList->where('kategori', 'Pelaku Dunia Usaha')->where('asal', 'Luar Negeri');
    $dalamPT = $jejaringList->where('kategori', 'Perguruan Tinggi')->where('asal', 'Dalam Negeri');
    $luarPT = $jejaringList->where('kategori', 'Perguruan Tinggi')->where('asal', 'Luar Negeri');
    $pemerintahdaerah = $jejaringList->where('kategori', 'Pemerintah Daerah');
    $pemerintah = $jejaringList->where('kategori', 'Pemerintah');


@endphp

<div class="border-t border-gray-100">
  <dl class="divide-y divide-gray-100">
    <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
      <dt class="text-sm font-medium text-gray-900">Lembaga sosial dari dalam negeri</dt>
      <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
        @forelse ($dalamLembaga as $item)
          <div>{{ $item->nama_lembaga }}</div>
        @empty
          <span>-</span>
        @endforelse
      </dd>
    </div>

    <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
      <dt class="text-sm font-medium text-gray-900">Lembaga sosial dari luar negeri</dt>
      <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
        @forelse ($luarLembaga as $item)
          <div>{{ $item->nama_lembaga }}</div>
        @empty
          <span>-</span>
        @endforelse
      </dd>
    </div>

    <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
      <dt class="text-sm font-medium text-gray-900">Perguruan tinggi dari dalam negeri</dt>
      <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
        @forelse ($dalamPT as $item)
          <div>{{ $item->nama_lembaga }}</div>
        @empty
          <span>-</span>
        @endforelse
      </dd>
    </div>
    <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
      <dt class="text-sm font-medium text-gray-900">Perguruan tinggi dari luar negeri</dt>
      <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
        @forelse ($luarPT as $item)
          <div>{{ $item->nama_lembaga }}</div>
        @empty
          <span>-</span>
        @endforelse
      </dd>
    </div>
    <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
      <dt class="text-sm font-medium text-gray-900">Pelaku Usaha dari dalam negeri</dt>
      <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
        @forelse ($dalampelaku as $item)
          <div>{{ $item->nama_lembaga }}</div>
        @empty
          <span>-</span>
        @endforelse
      </dd>
    </div>
    <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
      <dt class="text-sm font-medium text-gray-900">Pelaku Usaha dari luar negeri</dt>
      <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
        @forelse ($luarpelaku as $item)
          <div>{{ $item->nama_lembaga }}</div>
        @empty
          <span>-</span>
        @endforelse
      </dd>
    </div>
    <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
      <dt class="text-sm font-medium text-gray-900">Pemerintah Daerah</dt>
      <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
        @forelse ($pemerintahdaerah as $item)
          <div>{{ $item->nama_lembaga }}</div>
        @empty
          <span>-</span>
        @endforelse
      </dd>
    </div>
    <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
      <dt class="text-sm font-medium text-gray-900">Pemerintah</dt>
      <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
        @forelse ($pemerintah as $item)
          <div>{{ $item->nama_lembaga }}</div>
        @empty
          <span>-</span>
        @endforelse
      </dd>
    </div>
  </dl>
</div>

    </dl>
  </div>
</div>
</div>
      </div>
</main>
<script>
  // Fungsi untuk mengganti tab
  function showTab(tabId) {
    // Sembunyikan semua tab content
    document.querySelectorAll('.tab-content').forEach((tab) => tab.classList.add('hidden'));
    // Tampilkan tab yang dipilih
    document.getElementById(tabId).classList.remove('hidden');

    // Reset semua tab ke default
    document.querySelectorAll('.tab-link').forEach((tab) => {
      tab.classList.remove('border-indigo-500', 'text-indigo-600');
      tab.classList.add('border-transparent', 'text-gray-500');
    });

    // Aktifkan tab yang diklik
    const activeTab = document.getElementById('tab-' + tabId);
    activeTab.classList.add('border-indigo-500', 'text-indigo-600');
    activeTab.classList.remove('border-transparent', 'text-gray-500');
  }

  let pengajuanIdGlobal = null;

  function bukaPopupNomorSurat(id) {
    pengajuanIdGlobal = id;
    document.getElementById('popup-nomor-surat').classList.remove('hidden');
    document.getElementById('input-nomor-surat').value = '';
  }

  function lanjutKeKonfirmasi() {
    const nomorSurat = document.getElementById('input-nomor-surat').value;
    if (!nomorSurat.trim()) {
      alert('Nomor surat wajib diisi.');
      return;
    }

    // Set action form dinamis
    const form = document.getElementById('form-verifikasi');
    form.action = `/verifikasi/${pengajuanIdGlobal}/verifikasiProses`;
    document.getElementById('hidden-nomor-surat').value = nomorSurat;

    tutupPopup('popup-nomor-surat');
    document.getElementById('popup-konfirmasi').classList.remove('hidden');
  }

  function tutupPopup(id) {
    document.getElementById(id).classList.add('hidden');
  }

    function tampilPopup(id) {
    document.getElementById(id).classList.remove('hidden');
  }

  function tutupPopup(id) {
    document.getElementById(id).classList.add('hidden');
  }
  function tampilPopup(id) {
  console.log("Menampilkan popup:", id);
  document.getElementById(id).classList.remove('hidden');
}
  

</script>
@endsection