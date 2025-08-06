
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
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
        <title>Pendaftaran Lembaga Kesejahteraan Sosial</title>
    </head>
    <body>
        <!-- Navbar -->
        <section class="navbar" id="home">
            <div class="header">
    <a href="{{ route('form.step2') }}" class="icon-link confirm-leave">
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
            <div class="progress" data-step="3">
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
            @php
        $pelayanans = [
        ['label' => 'Pelayanan Sosial Anak Balita', 'kategori' => 'Anak Balita'],
        ['label' => 'Pelayanan Sosial Anak', 'kategori' => 'Anak'],
        ['label' => 'Pelayanan Sosial Penyandang Disabilitas', 'kategori' => 'Penyandang Disabilitas'],
        ['label' => 'Pelayanan Sosial Lanjut Usia', 'kategori' => 'Lanjut Usia'],
        ['label' => 'Pelayanan Sosial Tuna Sosial', 'kategori' => 'Tuna Sosial'],
        ['label' => 'Pelayanan Sosial Korban Tindak Kekerasan', 'kategori' => 'Korban Tindak Kekerasan'],
        ['label' => 'Pelayanan Sosial Korban NAPZA', 'kategori' => 'Korban NAPZA'],
        ['label' => 'Pelayanan Sosial Korban Bencana', 'kategori' => 'Korban Bencana'],
        ['label' => 'Pelayanan Sosial Fakir Miskin', 'kategori' => 'Fakir Miskin'],
    ];
        
     $pelayananlains = [
        ['label' => 'a.', 'id' => 0],
    ];
     $usahapenunjangs = [
        ['label' => 'a.', 'id' => 0],
    ];


    @endphp
        <form method="POST" action="{{ route('form.step3.post') }}">
            @csrf
            <!-- Subtitle outside the wrapper -->
            <div class="form-section">
                <!-- Subtitle on the left -->
                <div class="form-section-title">
                    <h3>SUMBER DAYA LKS</h3>
                </div>
                <!-- Form wrapper on the right -->
                <div class="form-wrapper">
                    <div class="form-content">
                        <div class="form-row radio-row">
                            <div class="form-group">
                                <label for="prasarana_bangunan">Prasarana bangunan kantor milik LKS</label>
                                <div class="radio-group">
                                    <label><input type="radio" name="prasarana_bangunan_kantor" value="Punya{{ old('prasarana_bangunan_kantor', optional(optional($pengajuan->identitasLks)->sumberdaya)->prasarana_bangunan_kantor) === 'Ada' ? 'checked' : '' }}">Punya</label>
                                    <label><input type="radio" name="prasarana_bangunan_kantor" value="Tidak_punya{{ old('prasarana_bangunan_kantor', optional(optional($pengajuan->identitasLks)->sumberdaya)->prasarana_bangunan_kantor) === 'Tidak_Punya' ? 'checked' : '' }}"">Tidak Punya</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="status_bangunan_kantor">Status bangunan kantor milik LKS</label>
                                <div class="radio-group">
                                    <div class="radio-option">
                                        <input type="radio" name="status_bangunan_kantor" value="Milik Sendiri{{ old('status_bangunan_kantor', optional(optional($pengajuan->identitasLks)->sumberdaya)->prasarana_bangunan_kantor) === 'Milik Sendiri' ? 'checked' : '' }} ">
                                        <span>Milik Sendiri</span>
                                    </div>
                                    <div class="radio-option">
                                        <input type="radio" name="status_bangunan_kantor" value="Sewa{{ old('status_bangunan_kantor', optional(optional($pengajuan->identitasLks)->sumberdaya)->prasarana_bangunan_kantor) === 'Sewa' ? 'checked' : '' }} "">
                                        <span>Sewa</span>
                                    </div>
                                    <div class="radio-option">
                                        <input type="radio" name="status_bangunan_kantor" value="Pinjam{{ old('status_bangunan_kantor', optional(optional($pengajuan->identitasLks)->sumberdaya)->prasarana_bangunan_kantor) === 'Pinjam' ? 'checked' : '' }} "">
                                        <span>Pinjam</span>
                                    </div>
                                    <div class="radio-option lain-lain-option">
                                        <input type="radio" name="status_bangunan_kantor" value="Lain-Lain{{ old('status_bangunan_kantor', optional(optional($pengajuan->identitasLks)->sumberdaya)->prasarana_bangunan_kantor) === 'Lain-Lain' ? 'checked' : '' }} "">
                                        <span>Lain-Lain</span>
                                        <input type="text" name="status_bangunan_kantor_lain" placeholder="Tulis keterangan lain..." value="{{ old('status_bangunan_kantor_lain', optional(optional($pengajuan->identitasLks)->sumberdaya)->status_bangunan_kantor_lain) }}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group full-width">
                                <label>Sarana perkantoran milik LKS</label>
                                <div class="radio-pairs-group aligned-left">
                                    <!-- a -->
                                    <div class="radio-item">
                                        <div class="radio-label">Papan Nama</div>
                                        <div class="radio-options">
                                            <label><input type="radio" name="papan_nama" value="Tidak ada{{ old('papan_nama', optional(optional($pengajuan->identitasLks)->sumberdaya)->papan_nama) === 'Tidak ada' ? 'checked' : '' }}"> Tidak Ada</label>
                                            <label><input type="radio" name="papan_nama" value="Ada{{ old('papan_nama', optional(optional($pengajuan->identitasLks)->sumberdaya)->papan_nama) === 'Ada' ? 'checked' : '' }}"> Ada</label>
                                        </div>
                                    </div>
                                    <!-- b -->
                                    <div class="radio-item">
                                        <div class="radio-label">Papan Data</div>
                                        <div class="radio-options">
                                            <label><input type="radio" name="papan_data" value="Tidak ada{{ old('papan_data', optional(optional($pengajuan->identitasLks)->sumberdaya)->papan_data) === 'Tidak ada' ? 'checked' : '' }}">Tidak Ada</label>
                                            <label><input type="radio" name="papan_data" value="Ada{{ old('papan_data', optional(optional($pengajuan->identitasLks)->sumberdaya)->papan_data) === 'Ada' ? 'checked' : '' }}">Ada</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group full-width">
                                    <label for="perlengkapan_kantor">Perlengkapan Kantor</label>
                                    <div class="radio-group">
                                        <label>
                                        <input type="radio" name="perlengkapan_kantor" value="Lengkap{{ old('perlengkapan_kantor', optional(optional($pengajuan->identitasLks)->sumberdaya)->perlengkapan_kantor) === 'Lengkap' ? 'checked' : '' }}">
                                        Lengkap
                                        </label>
                                        <label>
                                        <input type="radio" name="perlengkapan_kantor" value="Kurang{{ old('perlengkapan_kantor', optional(optional($pengajuan->identitasLks)->sumberdaya)->perlengkapan_kantor) === 'Kurang' ? 'checked' : '' }}">
                                        Kurang
                                        </label>
                                        <label>
                                        <input type="radio" name="perlengkapan_kantor" value="Tidak Ada{{ old('perlengkapan_kantor', optional(optional($pengajuan->identitasLks)->sumberdaya)->perlengkapan_kantor) === 'Tidak Ada' ? 'checked' : '' }}">
                                        Tidak Ada
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group full-width">
                                <label>Sarana pelayanan teknis</label>
                                <div class="radio-pairs-group aligned-left">
                                    <!-- a -->
                                    <div class="radio-item">
                                        <div class="radio-label">Ruang Konseling</div>
                                        <div class="radio-options">
                                            <label><input type="radio" name="ruang_konseling" value="Tidak ada{{ old('ruang_konseling', optional(optional($pengajuan->identitasLks)->sumberdaya)->ruang_konseling) === 'Tidak ada' ? 'checked' : '' }}"> Tidak Ada</label>
                                            <label><input type="radio" name="ruang_konseling" value="Ada{{ old('ruang_konseling', optional(optional($pengajuan->identitasLks)->sumberdaya)->ruang_konseling) === 'Ada' ? 'checked' : '' }}"> Ada</label>
                                        </div>
                                    </div>
                                    <!-- b -->
                                    <div class="radio-item">
                                        <div class="radio-label">Ruang Diagnosa</div>
                                        <div class="radio-options">
                                            <label><input type="radio" name="ruang_diagnosa" value="Tidak ada{{ old('ruang_diagnosa', optional(optional($pengajuan->identitasLks)->sumberdaya)->ruang_diagnosa) === 'Tidak ada' ? 'checked' : '' }}"> Tidak Ada</label>
                                            <label><input type="radio" name="ruang_diagnosa" value="Ada{{ old('ruang_diagnosa', optional(optional($pengajuan->identitasLks)->sumberdaya)->ruang_diagnosa) === 'Ada' ? 'checked' : '' }}">Ada</label>
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-top: 10px;">
                                        <input type="text" name="ruang_teknis_lainnya" class="wide-text" placeholder="Tuliskan ruang teknis lainnya...." style="width: 100%;" value="{{ old('ruang_teknis_lainnya', optional(optional($pengajuan->identitasLks)->sumberdaya)->ruang_teknis_lainnya) }}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group full-width">
                                <label>Sarana Pelayanan Umum</label>
                                <div class="radio-pairs-group aligned-left">
                                    <!-- a -->
                                    <div class="radio-item">
                                        <div class="radio-label">Ruang Makan</div>
                                        <div class="radio-options">
                                            <label><input type="radio" name="ruang_makan" value="Tidak ada{{ old('ruang_makan', optional(optional($pengajuan->identitasLks)->sumberdaya)->ruang_makan) === 'Tidak ada' ? 'checked' : '' }}"> Tidak Ada</label>
                                            <label><input type="radio" name="ruang_makan" value="Ada{{ old('ruang_makan', optional(optional($pengajuan->identitasLks)->sumberdaya)->ruang_makan) === 'Ada' ? 'checked' : '' }}"> Ada</label>
                                        </div>
                                    </div>
                                    <!-- b -->
                                    <div class="radio-item">
                                        <div class="radio-label">Ruang Diagnosa</div>
                                        <div class="radio-options">
                                            <label><input type="radio" name="ruang_kesehatan" value="Tidak ada{{ old('ruang_kesehatan', optional(optional($pengajuan->identitasLks)->sumberdaya)->ruang_kesehatan) === 'Tidak ada' ? 'checked' : '' }}"> Tidak Ada</label>
                                            <label><input type="radio" name="ruang_kesehatan" value="Ada{{ old('ruang_kesehatan', optional(optional($pengajuan->identitasLks)->sumberdaya)->ruang_kesehatan) === 'Ada' ? 'checked' : '' }}">Ada</label>
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-top: 10px;">
                                        <input type="text" name="ruang_umum_lainnya" class="wide-text" placeholder="Tuliskan ruang umum lainnya...." style="width: 100%;" value="{{ old('ruang_umum_lainnya', optional(optional($pengajuan->identitasLks)->sumberdaya)->ruang_umum_lainnya) }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group full-width">
                                <label>Penunjang LKS</label>
                                <div class="radio-pairs-group aligned-left">
                                    <!-- a -->
                                    <div class="radio-item">
                                        <div class="radio-label">Peralatan Komunikasi</div>
                                        <div class="radio-options">
                                            <label><input type="radio" name="peralatan_komunikasi" value="Tidak ada{{ old('peralatan_komunikasi', optional(optional($pengajuan->identitasLks)->sumberdaya)->peralatan_komunikasi) === 'Tidak ada' ? 'checked' : '' }}"> Tidak Ada</label>
                                            <label><input type="radio" name="peralatan_komunikasi" value="Ada{{ old('peralatan_komunikasi', optional(optional($pengajuan->identitasLks)->sumberdaya)->peralatan_komunikasi) === 'Ada' ? 'checked' : '' }}"> Ada</label>
                                        </div>
                                    </div>
                                    <!-- b -->
                                    <div class="radio-item">
                                        <div class="radio-label">Instalasi listrik</div>
                                        <div class="radio-options">
                                            <label><input type="radio" name="instalasi_listrik" value="Tidak ada{{ old('instalasi_listrik', optional(optional($pengajuan->identitasLks)->sumberdaya)->instalasi_listrik) === 'Tidak ada' ? 'checked' : '' }}"> Tidak Ada</label>
                                            <label><input type="radio" name="instalasi_listrik" value="Ada{{ old('instalasi_listrik', optional(optional($pengajuan->identitasLks)->sumberdaya)->instalasi_listrik) === 'Ada' ? 'checked' : '' }}">Ada</label>
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-top: 10px;">
                                        <input type="text" name="sarana_penunjang_lainnya" class="wide-text" placeholder="Tuliskan sarana penunjang lainnya...." style="width: 100%;" value="{{ old('sarana_penunjang_lainnya', optional(optional($pengajuan->identitasLks)->sumberdaya)->sarana_penunjang_lainnya) }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group full-width">
                                <label>Sarana Transportasi</label>
                                <div class="radio-pairs-group aligned-left">
                                    <!-- a -->
                                    <div class="radio-item">
                                        <div class="radio-label">Mobil</div>
                                        <div class="radio-options">
                                            <label><input type="radio" name="mobil" value="Tidak ada{{ old('mobil', optional(optional($pengajuan->identitasLks)->sumberdaya)->mobil) === 'Tidak ada' ? 'checked' : '' }}"> Tidak Ada</label>
                                            <label><input type="radio" name="mobil" value="Ada{{ old('mobil', optional(optional($pengajuan->identitasLks)->sumberdaya)->mobil) === 'Ada' ? 'checked' : '' }}"> Ada</label>
                                        </div>
                                    </div>
                                    <!-- b -->
                                    <div class="radio-item">
                                        <div class="radio-label">Motor</div>
                                        <div class="radio-options">
                                            <label><input type="radio" name="motor" value="Tidak ada{{ old('motor', optional(optional($pengajuan->identitasLks)->sumberdaya)->motor) === 'Tidak ada' ? 'checked' : '' }}"> Tidak Ada</label>
                                            <label><input type="radio" name="motor" value="Ada{{ old('motor', optional(optional($pengajuan->identitasLks)->sumberdaya)->motor) === 'Ada' ? 'checked' : '' }}">Ada</label>
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-top: 10px;">
                                        <input type="text" name="transportasi_lainnya" class="wide-text" placeholder="Tuliskan transportasi lainnya...." style="width: 100%;" value="{{ old('transportasi_lainnya', optional(optional($pengajuan->identitasLks)->sumberdaya)->transportasi_lainnya) }}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <label>Sarana pelayanan di bidang Kesejahteraan Sosial</label>
                        <div class="pelayanan-grid">
                            @foreach($pelayanans as $i => $pelayanan)
                            <div class="pelayanan-item">
                                <div class="pelayanan-label">{{ $pelayanan['label'] }}</div>

                                <div class="radio-set">
                                    <label>
                                        <input type="radio" name="pelayanan[{{ $i }}][bentuk]" value="Dalam Lembaga">
                                        Dalam Lembaga
                                    </label>
                                    <label>
                                        <input type="radio" name="pelayanan[{{ $i }}][bentuk]" value="Luar Lembaga">
                                        Luar Lembaga
                                    </label>
                                </div>

                                <div class="jumlah-binaan-group">
                                    <label for="jumlah_binaan_{{ $i }}">Jumlah Binaan:</label>
                                    <input type="number" id="jumlah_binaan_{{ $i }}" name="pelayanan[{{ $i }}][jumlah]" placeholder="0" min="0">
                                    <span>Orang</span>
                                </div>

                                <input type="hidden" name="pelayanan[{{ $i }}][kategori]" value="{{ $pelayanan['kategori'] }}">
                            </div>
                            @endforeach
                        </div>

                        <div class="pelayanan-wrapper">
                            @foreach($pelayananlains as $i => $pelayanan_lain)
                            <h4>Sarana Pelayanan di Bidang Lain</h4>
                            <!-- a -->
                            <div class="pelayanan-item">
                                <div class="pelayanan-label">a.</div>
                                <div class="pelayanan-row">
                                    <div class="form-group-horizontal">
                                    <label for="pelayanan_lain_0">Jenis Pelayanan</label>
                                    <input type="text" id="pelayanan_lain_0" name="pelayanan_lain[0][jenis]" placeholder="Tuliskan jenis pelayanan" />
                                    </div>
                                    <div class="form-group-horizontal">
                                    <label for="jumlah_pelayanan_lain_0">Jumlah Binaan (Orang)</label>
                                    <input type="number" id="jumlah_pelayanan_lain_0" name="pelayanan_lain[0][jumlah]" placeholder="0" />
                                    </div>
                                </div>
                                </div>

                                <!-- b -->
                                <div class="pelayanan-item">
                                <div class="pelayanan-label">b.</div>
                                <div class="pelayanan-row">
                                    <div class="form-group-horizontal">
                                    <label for="pelayanan_lain_1">Jenis Pelayanan</label>
                                    <input type="text" id="pelayanan_lain_1" name="pelayanan_lain[1][jenis]" placeholder="Tuliskan jenis pelayanan" />
                                    </div>
                                    <div class="form-group-horizontal">
                                    <label for="jumlah_pelayanan_lain_1">Jumlah Binaan (Orang)</label>
                                    <input type="number" id="jumlah_pelayanan_lain_1" name="pelayanan_lain[1][jumlah]" placeholder="0" />
                                    </div>
                                </div>
                                </div>
                            <!-- c -->
                            <div class="pelayanan-item">
                                <div class="pelayanan-label">c.</div>
                                <div class="pelayanan-row">
                                    <div class="form-group-horizontal">
                                        <label for="pelayanan_lain_2">Jenis Pelayanan</label>
                                        <input type="text" id="pelayanan_lain_2" name="pelayanan_lain[2][jenis]" placeholder="Tuliskan jenis pelayanan" />
                                    </div>
                                    <div class="form-group-horizontal">
                                        <label for="jumlah_pelayanan_lain_2">Jumlah Binaan (Orang)</label>
                                        <input type="number" id="jumlah_pelayanan_lain_2" name="pelayanan_lain[2][jumlah]" placeholder="0" />
                                    </div>
                                </div>
                            </div>
                            <!-- d -->
                            <div class="pelayanan-item">
                                <div class="pelayanan-label">d.</div>
                                <div class="pelayanan-row">
                                    <div class="form-group-horizontal">
                                        <label for="pelayanan_lain_3">Jenis Pelayanan</label>
                                        <input type="text" id="pelayanan_lain_3" name="pelayanan_lain[3][jenis]" placeholder="Tuliskan jenis pelayanan" />
                                    </div>
                                    <div class="form-group-horizontal">
                                        <label for="jumlah_pelayanan_lain_3">Jumlah Binaan (Orang)</label>
                                        <input type="number" id="jumlah_pelayanan_lain_3" name="pelayanan_lain[3][jumlah]" placeholder="0" />
                                    </div>
                                </div>
                            </div>
                            <!-- e -->
                            <div class="pelayanan-item">
                                <div class="pelayanan-label">e.</div>
                                <div class="pelayanan-row">
                                    <div class="form-group-horizontal">
                                        <label for="pelayanan_lain_4">Jenis Pelayanan</label>
                                        <input type="text" id="pelayanan_lain_4" name="pelayanan_lain[4][jenis]" placeholder="Tuliskan jenis pelayanan" />
                                    </div>
                                    <div class="form-group-horizontal">
                                        <label for="jumlah_pelayanan_lain_4">Jumlah Binaan (Orang)</label>
                                        <input type="number" id="jumlah_pelayanan_lain_4" name="pelayanan_lain[4][jumlah]" placeholder="0" />
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="pelayanan-wrapper">
                            @foreach($usahapenunjangs as $i => $usaha_penunjang)
                            <h4>Sarana Usaha Penunjang Kegiatan LKS</h4>
                            <!-- a -->
                            <div class="pelayanan-item">
                                <div class="pelayanan-label">a.</div>
                                <div class="pelayanan-row">
                                    <div class="form-group-horizontal full-width">
                                        <label for="usaha_penunjang_0">Jenis Usaha Penunjang</label>
                                        <input type="text" id="usaha_penunjang_0" name="usaha_penunjang[0][jenis_usaha]" placeholder="Tuliskan usaha penunjang">
                                    </div>
                                </div>
                            </div>
                            <!-- b -->
                            <div class="pelayanan-item">
                                <div class="pelayanan-label">b.</div>
                                <div class="pelayanan-row">
                                    <div class="form-group-horizontal full-width">
                                        <label for="usaha_penunjang_1">Jenis Usaha Penunjang</label>
                                        <input type="text" id="usaha_penunjang_1" name="usaha_penunjang[1][jenis_usaha]" placeholder="Tuliskan usaha penunjang">
                                    </div>
                                </div>
                            </div>
                            <!-- c -->
                            <div class="pelayanan-item">
                                <div class="pelayanan-label">c.</div>
                                <div class="pelayanan-row">
                                    <div class="form-group-horizontal full-width">
                                        <label for="usaha_penunjang_2">Jenis Usaha Penunjang</label>
                                        <input type="text" id="usaha_penunjang_2" name="usaha_penunjang[2][jenis_usaha]" placeholder="Tuliskan usaha penunjang">
                                    </div>
                                </div>
                            </div>
                            <!-- d -->
                            <div class="pelayanan-item">
                                <div class="pelayanan-label">d.</div>
                                <div class="pelayanan-row">
                                    <div class="form-group-horizontal full-width">
                                        <label for="usaha_penunjang_3">Jenis Usaha Penunjang</label>
                                        <input type="text" id="usaha_penunjang_3" name="usaha_penunjang[3][jenis_usaha]" placeholder="Tuliskan usaha penunjang">
                                    </div>
                                </div>
                            </div>
                            <!-- e -->
                            <div class="pelayanan-item">
                                <div class="pelayanan-label">e.</div>
                                <div class="pelayanan-row">
                                    <div class="form-group-horizontal full-width">
                                        <label for="usaha_penunjang_4">Jenis Usaha Penunjang</label>
                                        <input type="text" id="usaha_penunjang_4" name="usaha_penunjang[4][jenis_usaha]" placeholder="Tuliskan usaha penunjang">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!-- Akta Pendirian (main selector) -->
                    </div>
                </div>
            </div>
            <div class="next">
              <button type="submit">Simpan & Lanjut</button>
            </div>
        </form>

        <!-- Feather icons -->
        <script src="https://unpkg.com/feather-icons"></script>
        <script>
            feather.replace(); // initialize icons
        </script>
        <script type="text/javascript" src={{ asset('js/script.js') }}></script>

<script>
    let formChanged = false;

    // Tandai jika ada perubahan pada input, select, atau textarea
    document.querySelectorAll("form input, form select, form textarea").forEach(function (element) {
        element.addEventListener("change", function () {
            formChanged = true;
        });
    });

    // Konfirmasi sebelum keluar dari halaman (misal: tutup tab, reload)
    window.addEventListener("beforeunload", function (e) {
        if (formChanged) {
            e.preventDefault();
            e.returnValue = ''; // Untuk browser modern seperti Chrome
        }
    });

    // Saat form disubmit, matikan peringatan
    document.querySelectorAll("form").forEach(function (form) {
        form.addEventListener("submit", function () {
            formChanged = false;
        });
    });

    // Jika klik link dengan class confirm-leave, tampilkan konfirmasi
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
</script>


    </body>
</html>