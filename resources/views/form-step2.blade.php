<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Alexandria:wght@100..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
            rel="stylesheet"
            />
        <!-- CSS -->
        <link rel="stylesheet" href="{{ secure_asset('css/styles.css') }}" />
        <title>Pendaftaran Lembaga Kesejahteraan Sosial</title>
    </head>
    <body>
        <!-- Navbar -->
        <section class="navbar" id="home">
            <div class="header">
                <a href="{{ route('form.step1') }}" class="icon-link confirm-leave">
                <i data-feather="arrow-left-circle"></i>
                </a>
                <a href="/" class="confirm-leave">
                <img src="{{ asset('img/logo-silekas.png') }}" alt="Silekas" />
                </a>
            </div>
        </section>
        <!-- Link Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@100..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet" type="text/css">
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="progress-wrapper">
            <div class="progress" data-step="2">
                <div class="circle">
                    <span class="label">1</span>
                    <span class="title">Informasi Umum</span>
                </div>
                <span class="bar"></span>
                <div class="circle">
                    <span class="label">2</span>
                    <span class="title">Legalitas & Program</span>
                </div>
                <span class="bar"></span>
                <div class="circle">
                    <span class="label">3</span>
                    <span class="title">Sumber Daya LKS</span>
                </div>
                <span class="bar"></span>
                <div class="circle">
                    <span class="label">4</span>
                    <span class="title">Jejaring Kerja LKS</span>
                </div>
                <span class="bar"></span>
                <div class="circle">
                    <span class="label">5</span>
                    <span class="title">Selesai</span>
                </div>
            </div>
        </div>
        <main>
        <h1> Formulir Pendaftaran Lembaga Kesejahteraaan Sosial </h1>
        <form method="POST" action="{{ route('form.step2.post') }}">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <!-- Subtitle outside the wrapper -->
            <div class="form-section">
                <!-- Subtitle on the left -->
                <div class="form-section-title">
                    <h3>LEGALITAS LKS</h3>
                </div>
                <!-- Form wrapper on the right -->
                <div class="form-wrapper">
                    <div class="form-content">
                        <div class="form-row radio-row">
                            <div class="form-group">
                                <label for="anggaran_dasar">Peraturan Anggaran Dasar</label>
                                <div class="radio-group">
                                    <label><input type="radio" name="anggaran_dasar" value="Ada" {{ old('anggaran_dasar', optional(optional($pengajuan->identitasLks)->legalitas)->anggaran_dasar) === 'Ada' ? 'checked' : '' }}>Ada</label>
                                    <label><input type="radio" name="anggaran_dasar" value="Tidak_ada" {{ old('anggaran_dasar', optional(optional($pengajuan->identitasLks)->legalitas)->anggaran_dasar) === 'Tidak_ada' ? 'checked' : '' }}>Tidak Ada</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="anggaran_rt">Peraturan Anggaran Rumah Tangga</label>
                                <div class="radio-group">
                                    <label><input type="radio" name="anggaran_rt" value="Ada" {{ old('anggaran_rt', optional(optional($pengajuan->identitasLks)->legalitas)->anggaran_rt) === 'Ada' ? 'checked' : '' }}>Ada</label>
                                    <label><input type="radio" name="anggaran_rt" value="Tidak_ada" {{ old('anggaran_rt', optional(optional($pengajuan->identitasLks)->legalitas)->anggaran_rt) === 'Tidak_ada' ? 'checked' : '' }}>Tidak Ada</label>
                                </div>
                            </div>
                            <!-- Akta Pendirian (main selector) -->
                            <div class="form-row radio-row">
                                <div class="form-group">
                                    <label for="akta_pendirian">Akta Pendirian</label>
                                    <div class="radio-group">
                                        <label>
                                        <input type="radio" name="akta_pendirian" value="berbadan hukum"{{ old('akta_pendirian', optional(optional($pengajuan->identitasLks)->legalitas)->akta_pendirian) === 'berbadan hukum' ? 'checked' : '' }} data-show-target="akta-badan-hukum-fields" data-show-value="berbadan hukum" >LKS Berbadan hukum
                                        </label>
                                        <label>
                                        <input type="radio" name="akta_pendirian" value="tidak berbadan hukum"{{ old('akta_pendirian', optional(optional($pengajuan->identitasLks)->legalitas)->akta_pendirian) === 'tidak berbadan hukum' ? 'checked' : '' }} data-show-target="akta-tidak-badan-hukum-fields" data-show-value="tidak berbadan hukum" >LKS Tidak berbadan hukum
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- IF "LKS Tidak berbadan hukum" -->
                            <div class="form-row" data-show-id="akta-tidak-badan-hukum-fields" style="display: none;">
                                <div class="form-group">
                                    <label for="akta_pendirian_lks_tidak">Akta Pendirian LKS Tidak Berbadan Hukum</label>
                                    <div class="radio-group">
                                        <label>
                                        <input type="radio" name="akta_pendirian_lks_tidak" value="Ada"{{ old('akta_pendirian_lks_tidak', optional(optional($pengajuan->identitasLks)->legalitas)->akta_pendirian_lks_tidak) === 'Ada' ? 'checked' : '' }} data-show-target="akta-tidak-badan-hukum-detail-fields" data-show-value="Ada" >Ada, berupa akta Notaris
                                        </label>
                                        <label>
                                        <input type="radio" name="akta_pendirian_lks_tidak" value="Tidak Ada"{{ old('akta_pendirian_lks_tidak', optional(optional($pengajuan->identitasLks)->legalitas)->akta_pendirian_lks_tidak) === 'Tidak Ada' ? 'checked' : '' }} data-show-target="akta-tidak-badan-hukum-detail-fields" data-show-value="Ada" >Tidak ada
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row" data-show-id="akta-tidak-badan-hukum-detail-fields" style="display: none;">
                                <div class="form-group">
                                    <label for="nama_notaris_tidak">Nama Notaris</label>
                                    <input type="text" name="nama_notaris_tidak" placeholder="Nama Notaris" value="{{ old('nama_notaris_tidak', optional(optional($pengajuan->identitasLks)->legalitas)->nama_notaris_tidak) }}" />
                                </div>
                                <div class="form-group">
                                    <label for="nomor_akta_tidak">Nomor Akta</label>
                                    <input type="text" name="nomor_akta_tidak" placeholder="Nomor Akta" value="{{ old('nomor_akta_tidak', optional(optional($pengajuan->identitasLks)->legalitas)->nomor_akta_tidak) }}" />
                                </div>
                                <div class="form-group">
                                    <label for="nomor_surat_keterangan_terdaftar">Nomor Surat Keterangan Terdaftar</label>
                                    <input type="text" name="nomor_surat_keterangan_terdaftar" placeholder="Nomor Surat Keterangan Terdaftar" value="{{ old('nomor_surat_keterangan_terdaftar', optional(optional($pengajuan->identitasLks)->legalitas)->nomor_surat_keterangan_terdaftar) }}" />
                                </div>
                            </div>
                            <!-- IF "LKS Berbadan hukum" -->
                            <div class="form-nested" data-show-id="akta-badan-hukum-fields" style="display: none;">
                                <div class="form-row" >
                                    <div class="form-group">
                                        <label for="akta_pendirian_lks_berbadan">Akta Pendirian LKS Berbadan Hukum</label>
                                        <div class="radio-group">
                                            <label>
                                            <input type="radio" name="akta_pendirian_lks_berbadan" value="Ada{{ old('akta_pendirian_lks_berbadan', optional(optional($pengajuan->identitasLks)->legalitas)->anggaran_dasar) === 'Ada' ? 'checked' : '' }}" data-show-target="akta-badan-hukum-detail" data-show-value="Ada" >Ada, berupa akta Notaris
                                            </label>
                                            <label>
                                            <input type="radio" name="akta_pendirian_lks_berbadan" value="Tidak Ada{{ old('akta_pendirian_lks_berbadan', optional(optional($pengajuan->identitasLks)->legalitas)->anggaran_dasar) === 'Tidak Ada' ? 'checked' : '' }}" data-show-target="akta-badan-hukum-detail" data-show-value="Ada" >Tidak ada
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-nested" data-show-id="akta-badan-hukum-detail" style="display: none;">
                                <div class="form-row" >
                                    <div class="form-group">
                                        <label for="nama_notaris_berbadan">Nama Notaris</label>
                                        <input type="text" name="nama_notaris_berbadan" placeholder="Nama Notaris" value="{{ old('nama_notaris_berbadan', optional(optional($pengajuan->identitasLks)->legalitas)->nama_notaris_berbadan) }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="nomor_akta_berbadan">Nomor Akta</label>
                                        <input type="text" name="nomor_akta_berbadan" placeholder="Nomor Akta" value="{{ old('nomor_akta_berbadan', optional(optional($pengajuan->identitasLks)->legalitas)->nama_notaris_berbadan) }}" />
                                    </div>
                                </div>
                                <div class="form-row" >
                                    <div class="form-group">
                                        <label for="pengesahan_akta_pendirian">Nomor Pengesahan Akta Pendirian</label>
                                        <div class="radio-group">
                                            <label>
                                            <input type="radio" name="pengesahan_akta_pendirian" value="Ada"{{ old('pengesahan_akta_pendirian', optional(optional($pengajuan->identitasLks)->legalitas)->pengesahan_akta_pendirian) === 'Ada' ? 'checked' : '' }} data-show-target="nomor_pengesahan-fields" data-show-value="Ada" >Ada
                                            </label>
                                            <label>
                                            <input type="radio" name="pengesahan_akta_pendirian" value="Tidak Ada"{{ old('pengesahan_akta_pendirian', optional(optional($pengajuan->identitasLks)->legalitas)->pengesahan_akta_pendirian) === 'Tidak Ada' ? 'checked' : '' }} data-show-target="nomor_pengesahan-fields" data-show-value="Ada" >Tidak ada
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" data-show-id="nomor_pengesahan-fields" style="display: none;">
                                    <div class="form-group">
                                        <label for="nomor_pengesahan">Nomor Pengesahan Akta Pendirian</label>
                                        <input type="text" name="nomor_pengesahan" placeholder="Nomor Pengesahan Akta Pendirian" value="{{ old('nomor_pengesahan', optional(optional($pengajuan->identitasLks)->legalitas)->nomor_pengesahan) }}" />
                                    </div>
                                </div>
                                <div class="form-row" >
                                    <div class="form-group">
                                        <label for="lembaran_negara">Nomor Lembaran Negara</label>
                                        <div class="radio-group">
                                            <label>
                                            <input type="radio" name="lembaran_negara" value="Ada"{{ old('lembaran_negara', optional(optional($pengajuan->identitasLks)->legalitas)->lembaran_negara) === 'Ada' ? 'checked' : '' }} data-show-target="nomor_lembaran_negara" data-show-value="Ada" >Ada
                                            </label>
                                            <label>
                                            <input type="radio" name="lembaran_negara" value="Tidak Ada"{{ old('lembaran_negara', optional(optional($pengajuan->identitasLks)->legalitas)->lembaran_negara) === 'Tidak Ada' ? 'checked' : '' }} data-show-target="nomor_lembaran_negara" data-show-value="Ada" >Tidak Ada
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" data-show-id="nomor_lembaran_negara" style="display: none;">
                                    <div class="form-group">
                                        <label for="nomor_lembaran_negara">Nomor Lembaran Negara</label>
                                        <input type="text" name="nomor_lembaran_negara" placeholder="Nomor Lembaran Negara" value="{{ old('nomor_lembaran_negara', optional(optional($pengajuan->identitasLks)->legalitas)->anggaran_dasar) }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="ket_domisili">Keterangan Domisili LKS</label>
                                    <div class="radio-group">
                                        <label style="display: flex; align-items: center; gap: 10px;">
                                        <input type="radio" name="ket_domisili" value="Ada" {{ old('ket_domisili', optional(optional($pengajuan->identitasLks)->legalitas)->anggaran_dasar) === 'Ada' ? 'checked' : '' }}>
                                        Ada, Dari:
                                        <input type="text" name="sumber_ket_domisili" placeholder="Sumber Domisili" style="flex: 1;" value="{{ old('sumber_ket_domisili', optional(optional($pengajuan->identitasLks)->legalitas)->anggaran_dasar) }}" />
                                        </label>
                                        <label>
                                        <input type="radio" name="ket_domisili" value="Tidak Ada" {{ old('ket_domisili', optional(optional($pengajuan->identitasLks)->legalitas)->anggaran_dasar) === 'Tidak Ada' ? 'checked' : '' }}>Tidak Ada
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row" >
                                <div class="form-group">
                                    <label for="tanda_pendaftaran">Tanda Pendaftaran LKS</label>
                                    <div class="radio-group">
                                        <label>
                                        <input type="radio" name="tanda_pendaftaran" value="Ada"{{ old('tanda_pendaftaran', optional(optional($pengajuan->identitasLks)->legalitas)->tanda_pendaftaran) === 'Ada' ? 'checked' : '' }} data-show-target="tanda_pendaftaran_detail" data-show-value="Ada" > Ada dari Instansi/Dinas
                                        </label>
                                        <label>
                                        <input type="radio" name="tanda_pendaftaran" value="Tidak Ada"{{ old('tanda_pendaftaran', optional(optional($pengajuan->identitasLks)->legalitas)->tanda_pendaftaran) === 'Tidak Ada' ? 'checked' : '' }} data-show-target="tanda_pendaftaran_detail" data-show-value="Ada" > Tidak Ada
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-nested" data-show-id="tanda_pendaftaran_detail" style="display: none;">
                                <div class="form-row" >
                                    <div class="form-group">
                                        <label for="nama_instansi">Nama Instansi/Dinas</label>
                                        <input type="text" name="nama_instansi" placeholder="Nama Instansi/Dinas" value="{{ old('nama_instansi', optional(optional($pengajuan->identitasLks)->legalitas)->nama_instansi) }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="nomor_tanda_pendaftaran">Nomor/Tanggal Berlaku</label>
                                        <input type="text" name="nomor_tanda_pendaftaran" placeholder="XXXXXXXXXX/XXXXXXX" value="{{ old('nomor_tanda_pendaftaran', optional(optional($pengajuan->identitasLks)->legalitas)->nomor_tanda_pendaftaran) }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="npwp">NPWP atas nama LKS</label>
                                    <div class="radio-group">
                                        <label style="display: flex; align-items: center; gap: 10px;">
                                        <input type="radio" name="npwp" value="Ada" {{ old('npwp', optional(optional($pengajuan->identitasLks)->legalitas)->npwp) === 'Ada' ? 'checked' : '' }}>
                                        Ada, Dari:
                                        <input type="text" name="nomor_npwp" placeholder="Nomor NPWP" style="flex: 1;" value="{{ old('nomor_npwp', optional(optional($pengajuan->identitasLks)->legalitas)->nomor_npwp) }}" />
                                        </label>
                                        <label>
                                        <input type="radio" name="npwp" value="Tidak Ada" {{ old('npwp', optional(optional($pengajuan->identitasLks)->legalitas)->npwp) === 'Tidak Ada' ? 'checked' : '' }}>Tidak Ada
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row" >
                                <div class="form-group">
                                    <label for="rekening_bank">Rekening bank atas nama LKS</label>
                                    <div class="radio-group">
                                        <label>
                                        <input type="radio" name="rekening" value="Ada" {{ old('rekening', optional(optional($pengajuan->identitasLks)->legalitas)->rekening) === 'Ada' ? 'checked' : '' }} data-show-target="rekening_detail" data-show-value="Ada"> Ada
                                        </label>
                                        <label>
                                        <input type="radio" name="rekening" value="Tidak Ada"{{ old('rekening', optional(optional($pengajuan->identitasLks)->legalitas)->rekening) === 'Tidak Ada' ? 'checked' : '' }} data-show-target="rekening_detail" data-show-value="Ada" > Tidak Ada
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-nested" data-show-id="rekening_detail" style="display: none;">
                                <div class="form-row" >
                                    <div class="form-group">
                                        <label for="nama_bank">Nama Bank</label>
                                        <input type="text" name="nama_bank" placeholder="Nama Bank" value="{{ old('nama_bank', optional(optional($pengajuan->identitasLks)->legalitas)->nama_bank) }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="nomor_rekening">Nomor Rekening</label>
                                        <input type="text" name="nomor_rekening" placeholder="Nomor Rekening" value="{{ old('nomor_rekening', optional(optional($pengajuan->identitasLks)->legalitas)->nomor_rekening) }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_rekening">Nama Pemilik Rekening</label>
                                        <input type="text" name="nama_rekening" placeholder="Nama pemilik Rekening" value="{{ old('nama_rekening', optional(optional($pengajuan->identitasLks)->legalitas)->nama_rekening) }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-section">
                <div class="form-section-title">
                    <h3>PROGRAM<br>DAN KEGIATAN LKS</h3>
                </div>
                <div class="form-wrapper">
                    <div class="form-content">
                        @csrf
                        <div class="form-row">
                            <div class="form-group full-width">
                                <label for="sasaran_pelayanan">Sasaran Pelayanan</label>
                                <div class="radio-pairs-group aligned-left">
                                    <div class="radio-item">
                                        <div class="radio-label">a. Perseorangan/Individu</div>
                                        <div class="radio-options">
                                            <label><input type="radio" name="sasaran_perseorangan" value="Tidak" {{ old('sasaran_perseorangan', optional(optional($pengajuan->identitasLks)->program)->sasaran_perseorangan) == 'Tidak' ? 'checked' : '' }}> Tidak</label>
                                            <label><input type="radio" name="sasaran_perseorangan" value="Ya" {{ old('sasaran_perseorangan', optional(optional($pengajuan->identitasLks)->program)->sasaran_perseorangan) == 'Ya' ? 'checked' : '' }}> Ya</label>
                                        </div>
                                    </div>
                                    <div class="radio-item">
                                        <div class="radio-label">b. Keluarga</div>
                                        <div class="radio-options">
                                            <label><input type="radio" name="sasaran_keluarga" value="Tidak" {{ old('sasaran_keluarga', optional(optional($pengajuan->identitasLks)->program)->sasaran_keluarga) == 'Tidak' ? 'checked' : '' }}> Tidak</label>
                                            <label><input type="radio" name="sasaran_keluarga" value="Ya" {{ old('sasaran_keluarga', optional(optional($pengajuan->identitasLks)->program)->sasaran_keluarga) == 'Ya' ? 'checked' : '' }}> Ya</label>
                                        </div>
                                    </div>
                                    <div class="radio-item">
                                        <div class="radio-label">c. Kelompok</div>
                                        <div class="radio-options">
                                            <label><input type="radio" name="sasaran_kelompok" value="Tidak" {{ old('sasaran_kelompok', optional(optional($pengajuan->identitasLks)->program)->sasaran_kelompok) == 'Tidak' ? 'checked' : '' }}> Tidak</label>
                                            <label><input type="radio" name="sasaran_kelompok" value="Ya" {{ old('sasaran_kelompok', optional(optional($pengajuan->identitasLks)->program)->sasaran_kelompok) == 'Ya' ? 'checked' : '' }}> Ya</label>
                                        </div>
                                    </div>
                                    <div class="radio-item">
                                        <div class="radio-label">d. Masyarakat</div>
                                        <div class="radio-options">
                                            <label><input type="radio" name="sasaran_masyarakat" value="Tidak" {{ old('sasaran_masyarakat', optional(optional($pengajuan->identitasLks)->program)->sasaran_masyarakat) == 'Tidak' ? 'checked' : '' }}> Tidak</label>
                                            <label><input type="radio" name="sasaran_masyarakat" value="Ya" {{ old('sasaran_masyarakat', optional(optional($pengajuan->identitasLks)->program)->sasaran_masyarakat) == 'Ya' ? 'checked' : '' }}> Ya</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group full-width">
                                <label>Jenis Permasalahan Sosial yang Ditangani LKS</label>
                                <div class="radio-pairs-group aligned-left">
                                    <!-- a -->
                                    <div class="radio-item">
                                        <div class="radio-label">a. Kemiskinan</div>
                                        <div class="radio-options">
                                            <label><input type="radio" name="masalah_kemiskinan" value="Tidak" {{ old('masalah_kemiskinan', optional(optional($pengajuan->identitasLks)->program)->masalah_kemiskinan) == 'Tidak' ? 'checked' : '' }}> Tidak</label>
                                            <label><input type="radio" name="masalah_kemiskinan" value="Ya"{{ old('masalah_kemiskinan', optional(optional($pengajuan->identitasLks)->program)->masalah_kemiskinan) == 'Ya' ? 'checked' : '' }}> Ya</label>
                                        </div>
                                    </div>
                                    <!-- b -->
                                    <div class="radio-item">
                                        <div class="radio-label">b. Ketelantaran</div>
                                        <div class="radio-options">
                                            <label><input type="radio" name="masalah_ketelantaran" value="Tidak"> Tidak {{ old('masalah_ketelantaran', optional(optional($pengajuan->identitasLks)->program)->masalah_ketelantaran) == 'Tidak' ? 'checked' : '' }}</label>
                                            <label><input type="radio" name="masalah_ketelantaran" value="Ya"{{ old('masalah_ketelantaran', optional(optional($pengajuan->identitasLks)->program)->masalah_ketelantaran) == 'Ya' ? 'checked' : '' }}> Ya</label>
                                        </div>
                                    </div>
                                    <!-- c -->
                                    <div class="radio-item">
                                        <div class="radio-label">c. Disabilitas</div>
                                        <div class="radio-options">
                                            <label><input type="radio" name="masalah_disabilitas" value="Tidak"> Tidak {{ old('masalah_disabilitas', optional(optional($pengajuan->identitasLks)->program)->masalah_disabilitas) == 'Tidak' ? 'checked' : '' }}</label>
                                            <label><input type="radio" name="masalah_disabilitas" value="Ya"{{ old('masalah_disabilitas', optional(optional($pengajuan->identitasLks)->program)->masalah_disabilitas) == 'Ya' ? 'checked' : '' }}> Ya</label>
                                        </div>
                                    </div>
                                    <!-- d -->
                                    <div class="radio-item">
                                        <div class="radio-label">d. Keterpencilan</div>
                                        <div class="radio-options">
                                            <label><input type="radio" name="masalah_keterpencilan" value="Tidak"> Tidak {{ old('masalah_keterpencilan', optional(optional($pengajuan->identitasLks)->program)->masalah_keterpencilan) == 'Tidak' ? 'checked' : '' }}</label>
                                            <label><input type="radio" name="masalah_keterpencilan" value="Ya"{{ old('masalah_keterpencilan', optional(optional($pengajuan->identitasLks)->program)->masalah_keterpencilan) == 'Ya' ? 'checked' : '' }}> Ya</label>
                                        </div>
                                    </div>
                                    <!-- e -->
                                    <div class="radio-item">
                                        <div class="radio-label">e. Ketunaan Sosial dan Penyimpangan Perilaku</div>
                                        <div class="radio-options">
                                            <label><input type="radio" name="masalah_tunakepribadian" value="Tidak"> Tidak {{ old('masalah_tunakepribadian', optional(optional($pengajuan->identitasLks)->program)->masalah_tunakepribadian) == 'Tidak' ? 'checked' : '' }}</label>
                                            <label><input type="radio" name="masalah_tunakepribadian" value="Ya"{{ old('masalah_tunakepribadian', optional(optional($pengajuan->identitasLks)->program)->masalah_tunakepribadian) == 'Ya' ? 'checked' : '' }}> Ya</label>
                                        </div>
                                    </div>
                                    <!-- f -->
                                    <div class="radio-item">
                                        <div class="radio-label">f. Korban Bencana</div>
                                        <div class="radio-options">
                                            <label><input type="radio" name="masalah_bencana" value="Tidak"> Tidak {{ old('masalah_bencana', optional(optional($pengajuan->identitasLks)->program)->masalah_bencana) == 'Tidak' ? 'checked' : '' }}</label>
                                            <label><input type="radio" name="masalah_bencana" value="Ya"{{ old('masalah_bencana', optional(optional($pengajuan->identitasLks)->program)->masalah_bencana) == 'Ya' ? 'checked' : '' }}> Ya</label>
                                        </div>
                                    </div>
                                    <!-- g -->
                                    <div class="radio-item">
                                        <div class="radio-label">g. Korban Kekerasan, Eksploitasi, dan Diskriminasi</div>
                                        <div class="radio-options">
                                            <label><input type="radio" name="masalah_kekerasan" value="Tidak"> Tidak {{ old('masalah_kekerasan', optional(optional($pengajuan->identitasLks)->program)->masalah_kekerasan) == 'Tidak' ? 'checked' : '' }}</label>
                                            <label><input type="radio" name="masalah_kekerasan" value="Ya"{{ old('masalah_kekerasan', optional(optional($pengajuan->identitasLks)->program)->masalah_kekerasan) == 'Ya' ? 'checked' : '' }}> Ya</label>
                                        </div>
                                    </div>
                                    <!-- h -->
                                    <div class="radio-item">
                                        <div class="radio-label">h. Lainnya</div>
                                        <div class="radio-options full-width">
                                            <input type="text" name="masalah_lainnya" class="wide-text" placeholder="Tulis jenis permasalahan lain..." value="{{ old('masalah_lainnya', optional(optional($pengajuan->identitasLks)->program)->masalah_lainnya ?? '') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group full-width">
                                <label for="pelayanan_bidang_ks">Jenis pelayanan/kegiatan LKS di bidang kesejahteraan Sosial </label>
                                <div class="radio-pairs-group aligned-left">
                                    <div class="radio-item">
                                        <div class="radio-label">a. Rehabilitasi Sosial</div>
                                        <div class="radio-options">
                                            <label><input type="radio" name="rehabilitasi_sosial" value="Tidak"> Tidak {{ old('rehabilitasi_sosial', optional(optional($pengajuan->identitasLks)->program)->rehabilitasi_sosial) == 'Tidak' ? 'checked' : '' }}</label>
                                            <label><input type="radio" name="rehabilitasi_sosial" value="Ya"{{ old('rehabilitasi_sosial', optional(optional($pengajuan->identitasLks)->program)->rehabilitasi_sosial) == 'Ya' ? 'checked' : '' }}> Ya</label>
                                        </div>
                                    </div>
                                    <div class="radio-item">
                                        <div class="radio-label">b. Pemberdayaan Sosial</div>
                                        <div class="radio-options">
                                            <label><input type="radio" name="pemberdayaan_sosial" value="Tidak"> Tidak {{ old('pemberdayaan_sosial', optional(optional($pengajuan->identitasLks)->program)->pemberdayaan_sosial) == 'Tidak' ? 'checked' : '' }}</label>
                                            <label><input type="radio" name="pemberdayaan_sosial" value="Ya"{{ old('pemberdayaan_sosial', optional(optional($pengajuan->identitasLks)->program)->pemberdayaan_sosial) == 'Ya' ? 'checked' : '' }}> Ya</label>
                                        </div>
                                    </div>
                                    <div class="radio-item">
                                        <div class="radio-label">c. Perlindungan Sosial</div>
                                        <div class="radio-options">
                                            <label><input type="radio" name="perlindungan_sosial" value="Tidak"> Tidak {{ old('perlindungan_sosial', optional(optional($pengajuan->identitasLks)->program)->perlindungan_sosial) == 'Tidak' ? 'checked' : '' }}</label>
                                            <label><input type="radio" name="perlindungan_sosial" value="Ya"{{ old('perlindungan_sosial', optional(optional($pengajuan->identitasLks)->program)->perlindungan_sosial) == 'Ya' ? 'checked' : '' }}> Ya</label>
                                        </div>
                                    </div>
                                    <div class="radio-item">
                                        <div class="radio-label">d. Jaminan Sosial</div>
                                        <div class="radio-options">
                                            <label><input type="radio" name="jaminan_sosial" value="Tidak"> Tidak {{ old('jaminan_sosial', optional(optional($pengajuan->identitasLks)->program)->jaminan_sosial) == 'Tidak' ? 'checked' : '' }}</label>
                                            <label><input type="radio" name="jaminan_sosial" value="Ya"{{ old('jaminan_sosial', optional(optional($pengajuan->identitasLks)->program)->jaminan_sosial) == 'Ya' ? 'checked' : '' }}> Ya</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group full-width">
                                <label for="pelayanan_bukan_bidang_ks">Jenis pelayanan/kegiatan LKS di bidang kesejahteraan Sosial </label>
                                <div class="radio-pairs-group aligned-left">
                                    <div class="radio-item">
                                        <div class="radio-label">a. Pendidikan</div>
                                        <div class="radio-options">
                                            <label><input type="radio" name="pelayanan_pendidikan" value="Tidak"{{ old('pelayanan_pendidikan', optional(optional($pengajuan->identitasLks)->program)->pelayanan_pendidikan) == 'Tidak' ? 'checked' : '' }}> Tidak Ada</label>
                                            <label><input type="radio" name="pelayanan_pendidikan" value="Ya"{{ old('pelayanan_pendidikan', optional(optional($pengajuan->identitasLks)->program)->pelayanan_pendidikan) == 'Ya' ? 'checked' : '' }}> Ada, Berupa <input type="text" name="detail_pelayanan_pendidikan" placeholder="" style="flex: 1;" /></label>
                                        </div>
                                    </div>
                                    <div class="radio-item">
                                        <div class="radio-label">b. Kesehatan</div>
                                        <div class="radio-options">
                                            <label><input type="radio" name="pelayanan_kesehatan" value="Tidak"{{ old('pelayanan_kesehatan', optional(optional($pengajuan->identitasLks)->program)->pelayanan_kesehatan) == 'Tidak' ? 'checked' : '' }}> Tidak Ada</label>
                                            <label><input type="radio" name="pelayanan_kesehatan" value="Ya"{{ old('pelayanan_kesehatan', optional(optional($pengajuan->identitasLks)->program)->pelayanan_kesehatan) == 'Ya' ? 'checked' : '' }}> Ada, Berupa <input type="text" name="detail_pelayanan_kesehatan" placeholder="" style="flex: 1;" /></label>
                                        </div>
                                    </div>
                                    <div class="radio-item">
                                        <div class="radio-label">c. Keagamaan</div>
                                        <div class="radio-options">
                                            <label><input type="radio" name="pelayanan_keagamaan" value="Tidak"{{ old('pelayanan_keagamaan', optional(optional($pengajuan->identitasLks)->program)->pelayanan_keagamaan) == 'Tidak' ? 'checked' : '' }}> Tidak Ada</label>
                                            <label><input type="radio" name="pelayanan_keagamaan" value="Ya"{{ old('pelayanan_keagamaan', optional(optional($pengajuan->identitasLks)->program)->pelayanan_keagamaan) == 'Ya' ? 'checked' : '' }}> Ada, Berupa<input type="text" name="detail_pelayanan_keagamaan" placeholder="" style="flex: 1;" /></label>
                                        </div>
                                    </div>
                                    <div class="radio-item">
                                        <div class="radio-label">Lainnya</div>
                                        <div class="radio-options full-width">
                                            <input type="text" name="layanan_lainnya" class="wide-text" placeholder="Tulis jenis layanan lain..." value="{{ old('layanan_lainnya', optional(optional($pengajuan->identitasLks)->program)->layanan_lainnya) }}"/>
                                        </div>
                                    </div>
                                    <div class="radio-item">
                                        <div class="radio-label"> Lainnya</div>
                                        <div class="radio-options full-width">
                                            <input type="text" name="layanan_lainnya" class="wide-text" placeholder="Tulis jenis layanan lain..." value="{{ old('layanan_lainnya', optional(optional($pengajuan->identitasLks)->program)->layanan_lainnya) }}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group full-width">
                                <label for="sistem_pelayanan">Sistem pelayanan yang digunakan oleh LKS</label>
                                <div class="radio-pairs-group aligned-left">
                                    <div class="radio-item">
                                        <div class="radio-label">a. Sistem pelayanan dalam lembaga</div>
                                        <div class="radio-options">
                                            <label><input type="radio" name="dalam_lembaga" value="Tidak"{{ old('dalam_lembaga', optional(optional($pengajuan->identitasLks)->program)->dalam_lembaga) == 'Tidak' ? 'checked' : '' }}> Tidak</label>
                                            <label><input type="radio" name="dalam_lembaga" value="Ya"{{ old('dalam_lembaga', optional(optional($pengajuan->identitasLks)->program)->dalam_lembaga) == 'Ya' ? 'checked' : '' }}> Ya</label>
                                        </div>
                                    </div>
                                    <div class="radio-item">
                                        <div class="radio-label">b. Sistem pelayanan luar lembaga</div>
                                        <div class="radio-options">
                                            <label><input type="radio" name="luar_lembaga" value="Tidak"{{ old('luar_lembaga', optional(optional($pengajuan->identitasLks)->program)->luar_lembaga) == 'Tidak' ? 'checked' : '' }}> Tidak</label>
                                            <label><input type="radio" name="luar_lembaga" value="Ya"{{ old('luar_lembaga', optional(optional($pengajuan->identitasLks)->program)->luar_lembaga) == 'Ya' ? 'checked' : '' }}> Ya</label>
                                        </div>
                                    </div>
                                    <div class="radio-item">
                                        <div class="radio-label">h. Lainnya</div>
                                        <div class="radio-options full-width">
                                            <input type="text" name="sistem_lainnya" class="wide-text" placeholder="Tulis sistem pelayanan yang digunakan" value="{{ old('sistem_lainnya', optional(optional($pengajuan->identitasLks)->program)->sistem_lainnya) }}" />
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group full-width">
                                            <label for="lokasi_pelayanan">Lokasi Pelayanan</label>
                                            <div class="radio-group">
                                                <label>
                                                <input type="radio" name="lokasi_pelayanan" value="Ada di 1 kabupaten/kota"{{ old('lokasi_pelayanan', optional(optional($pengajuan->identitasLks)->program)->lokasi_pelayanan) == 'Ada di 1 kabupaten/kota' ? 'checked' : '' }}>
                                                Ada di 1 kabupaten/kota
                                                </label>
                                                <label>
                                                <input type="radio" name="lokasi_pelayanan" value="Ada di lebih dari 1 kabupaten/kota"{{ old('lokasi_pelayanan', optional(optional($pengajuan->identitasLks)->program)->lokasi_pelayanan) == 'Ada di lebih dari 1 kabupaten/kota' ? 'checked' : '' }}>
                                                Ada di lebih dari 1 kabupaten/kota
                                                </label>
                                                <label>
                                                <input type="radio" name="lokasi_pelayanan" value="Ada di 1 provinsi"{{ old('lokasi_pelayanan', optional(optional($pengajuan->identitasLks)->program)->lokasi_pelayanan) == 'Ada di 1 provinsi' ? 'checked' : '' }}>
                                                Ada di 1 provinsi
                                                </label>
                                                <label>
                                                <input type="radio" name="lokasi_pelayanan" value="Ada di lebih dari 1 provinsi"{{ old('lokasi_pelayanan', optional(optional($pengajuan->identitasLks)->program)->lokasi_pelayanan) == 'Ada di lebih dari 1 provinsi' ? 'checked' : '' }}>
                                                Ada di lebih dari 1 provinsi
                                                </label>
                                            </div>
                                            <!-- Input tambahan untuk detail lokasi -->
                                            <div class="form-group" style="margin-top: 10px;">
                                                <input type="text" name="detail_lokasi_pelayanan" class="wide-text" placeholder="Tulis detail lokasi pelayanan..." style="width: 100%;" value="{{ old('masalah_lainnya', optional(optional($pengajuan->identitasLks)->program)->detail_lokasi_pelayanan ?? '') }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="next">
                <button type="submit">Simpan & Lanjut</button>
            </div>
        </form>
        <script>
    document.addEventListener("DOMContentLoaded", function () {
        let formChanged = false;
        const form = document.querySelector("form");

        if (form) {
            form.querySelectorAll("input, select, textarea").forEach((el) => {
                el.addEventListener("input", function () {
                    formChanged = true;
                    console.log("Form diubah");
                });
            });

            form.addEventListener("submit", function () {
                formChanged = false;
            });
        }

        window.addEventListener("beforeunload", function (e) {
            if (formChanged) {
                e.preventDefault();
                e.returnValue = '';
            }
        });

        document.querySelectorAll('.confirm-leave').forEach(function (link) {
            link.addEventListener('click', function (e) {
                if (formChanged) {
                    const confirmLeave = confirm("Data yang belum disimpan akan hilang. Yakin ingin keluar?");
                    if (!confirmLeave) {
                        e.preventDefault();
                    }
                }
            });
        });
    });
</script>
        <!-- Feather icons -->
        <script src="https://unpkg.com/feather-icons"></script>
        <script>
            feather.replace(); // initialize icons
        </script>
        <script type="text/javascript" src={{ secure_asset('js/script.js') }}>
        </script>
        <script>
    document.addEventListener("DOMContentLoaded", function () {
        let formChanged = false;

        const form = document.querySelector("form");
        const inputs = form.querySelectorAll("input, select, textarea");

        inputs.forEach((input) => {
            input.addEventListener("change", () => {
                formChanged = true;
                console.log("Form telah diubah");
            });
        });

        // Cegah pindah halaman jika form telah diubah
        window.addEventListener("beforeunload", function (e) {
            if (formChanged) {
                e.preventDefault();
                e.returnValue = ""; // Diperlukan agar peringatan muncul
            }
        });

        // Tautan dengan class .confirm-leave
        const confirmLinks = document.querySelectorAll("a.confirm-leave");
        confirmLinks.forEach((link) => {
            link.addEventListener("click", function (e) {
                if (formChanged) {
                    const confirmation = confirm("Perubahan pada formulir belum disimpan. Yakin ingin keluar?");
                    if (!confirmation) {
                        e.preventDefault();
                    }
                }
            });
        });

        // Reset peringatan jika form disubmit
        form.addEventListener("submit", function () {
            formChanged = false;
        });
    });
</script>
    </body>
</html>