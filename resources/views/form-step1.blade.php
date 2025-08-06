<!-- resources/views/form-pendaftaran.blade.php -->

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
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
        <title>Pendaftaran Lembaga Kesejahteraan Sosial</title>
    </head>
    <body>
        <section class="navbar" id="home">
            <div class="header">
    <a href="/" class="icon-link confirm-leave">
        <i data-feather="arrow-left-circle"></i>
    </a>
    <a href="/" class="confirm-leave">
        <img src="{{ asset('img/logo-silekas.png') }}" alt="Silekas" />
    </a>
</div>
            @if ($errors->any())
    <div class="ml-20 mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
        <strong>Terjadi kesalahan saat pengisian:</strong>
        <ul class="list-disc list-inside mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        </section>
        <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@100..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet" type="text/css">
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        <div class="progress-wrapper">
            <div class="progress" data-step="1">
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
            <form method="POST" action="{{ route('form.step1.post') }}">
                @csrf
                
                <div class="form-section">
                    <div class="form-section-title">
                        <h3>IDENTITAS<br>PENGISI DATA</h3>
                    </div>
                    <div class="form-wrapper">
                        <div class="form-content">
                            @csrf
                            <div class="form-row">
                                <div class="form-group full-width">
                                    <input type="hidden" name="tipe_pengajuan" value="{{ old('tipe_pengajuan', $tipe ?? '') }}">
                                    <label for="nama-lks">Nama LKS yang didaftarkan</label>
                                    <input type="text" name="nama_lks" id="nama-lks" value="{{ old('nama_lks', $identitas->nama_lks ?? '') }}"placeholder="Nama LKS yang didaftarkan" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="domisili">Domisili</label>
                                    <input type="text" name="domisili" id="domisili" value="{{ old('domisili', $identitas->domisili ?? '') }}"placeholder="Nama LKS yang didaftarkan" placeholder="Domisili" />
                                </div>
                                <div class="form-group">
                                    <label for="provinsi">Provinsi</label>
                                    <input type="text" name="provinsi" id="provinsi" value="{{ old('provinsi', $identitas->provinsi ?? '') }}" placeholder="Provinsi" />
                                </div>
                                <div class="form-group">
                                    <label for="kota">Kab/Kota</label>
                                    <input type="text" name="kab_kota" id="kota" value="{{ old('kab_kota', $identitas->kab_kota ?? '') }}" placeholder="Kab/Kota" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group full-width">
                                    <label for="nama-pengisi">Nama pengisi pendaftaran</label>
                                    <input type="text" name="nama_pengisi" id="nama-pengisi" value="{{ old('nama_pengisi', $identitas->nama_pengisi ?? '') }}" placeholder="Nama pengisi pendaftaran" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="jabatan">Jabatan di LKS</label>
                                    <input type="text" name="jabatan" id="jabatan" value="{{ old('jabatan', $identitas->jabatan ?? '') }}" placeholder="Jabatan di LKS" />
                                </div>
                                <div class="form-group">
                                    <label for="telepon">Nomor Telepon/HP</label>
                                    <input type="tel" name="telepon_pengisi" id="telepon_pengisi" value="{{ old('telepon_pengisi', $identitas->telepon_pengisi ?? '') }}" placeholder="Nomor Telepon/HP" />
                                </div>
                                <div class="form-group">
                                    <label for="email">Alamat E-mail</label>
                                    <input type="email" name="email" id="email" value="{{ old('email', $identitas->email ?? '') }}" placeholder="Alamat E-mail" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-section">
                    <div class="form-section-title">
                        <h3>DATA UMUM LKS</h3>
                    </div>
                    <div class="form-wrapper">
                        <div class="form-content">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="nama-lks">Nama LKS</label>
                                    <input type="text" name="nama_lks" id="nama_lks" value="{{ old('nama_lks', $identitas->nama_lks ?? '') }}" placeholder="Nama LKS" />
                                </div>
                                <div class="form-group">
                                    <label for="singkatan">Singkatan nama LKS</label>
                                    <input type="text" name="singkatan" id="singkatan" value="{{ old('singkatan', $dataUmum->singkatan ?? '') }}" placeholder="Singkatan nama LKS" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group full-width">
                                    <label for="alamat-lks">Alamat LKS</label>
                                    <input type="text" name="alamat_lks" id="alamat_lks" value="{{ old('alamat_lks', $dataUmum->alamat_lks ?? '') }}" placeholder="Alamat LKS" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="jalan">Jalan/Nomor/RT/RW</label>
                                    <input type="text" name="jalan_nomor" id="jalan_nomor" placeholder="Jalan/Nomor/RT/RW" value="{{ old('jalan_nomor', $dataUmum->jalan_nomor ?? '') }}" />
                                </div>
                                <div class="form-group">
                                    <label for="desa-kelurahan">Desa/Kelurahan</label>
                                    <input type="text" name="desa_kelurahan" id="desa_kelurahan" placeholder="Desa/Kelurahan" value="{{ old('desa_kelurahan', $dataUmum->desa_kelurahan ?? '') }}" />
                                </div>
                                <div class="form-group">
                                    <label for="kecamatan">Kecamatan</label>
                                    <input type="text" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="{{ old('kecamatan', $dataUmum->kecamatan ?? '') }}" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="kota">Kabupaten/Kota</label>
                                    <input type="text" name="kota" id="kota" placeholder="Kota" value="{{ old('kota', $dataUmum->kota ?? '') }}"/>
                                </div>
                                <div class="form-group">
                                    <label for="provinsi">Provinsi</label>
                                    <input type="text" name="provinsi" id="provinsi" placeholder="Provinsi" value="{{ old('provinsi', $dataUmum->provinsi ?? '') }}"/>
                                </div>
                                <div class="form-group">
                                    <label for="kodepos">Kode Pos</label>
                                    <input type="text" name="kodepos" id="kodepos" placeholder="Kode Pos" value="{{ old('kodepos', $dataUmum->kodepos ?? '') }}"/>
                                </div>
                            </div>
                            <p>Kontak LKS</p>
                            <div class="form-row">
                                <div class="form-group">       
                                    <label for="telepon">Telepon</label>
                                    <input type="tel" name="telepon" id="telepon" placeholder="Telepon" value="{{ old('telepon', $kontak->telepon ?? '') }}"/>
                                </div>
                                <div class="form-group">
                                    <label for="fax">Fax</label>
                                    <input type="text" name="fax" id="fax" placeholder="Fax" value="{{ old('fax', $kontak->fax ?? '') }}"/>
                                </div>
                                <div class="form-group">
                                    <label for="email">Alamat E-mail</label>
                                    <input type="email" name="email" id="email" placeholder="Alamat E-mail" value="{{ old('email', $kontak->email ?? '') }}" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="website">Situs/Website</label>
                                    <input type="text" name="website" id="website" placeholder="Situs/Website" value="{{ old('website', $kontak->website ?? '') }}" />
                                </div>
                                <div class="form-group">
                                    <label for="media-sosial">Media Sosial</label>
                                    <input type="text" name="media_sosial" id="media_sosial" placeholder="Media Sosial" value="{{ old('media_sosial', $kontak->media_sosial ?? '') }}" />
                                </div>
                            </div>
                            <p>Pendirian LKS</p>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="tempat_didirikan">Tempat didirikan</label>
                                    <input type="text" name="tempat_didirikan" id="tempat_didirikan" placeholder="Tempat didirikan" value="{{ old('tempat_didirikan', $pendirian->tempat_didirikan ?? '') }}" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="number" name="tanggal" id="tanggal" placeholder="01" min="1" max="31" value="{{ old('tanggal', $pendirian->tanggal ?? '') }}" />
                                </div>
                                <div class="form-group">
                                    <label for="bulan">Bulan</label>
                                    <select name="bulan" id="bulan" value="{{ old('bulan', $pendirian->bulan ?? '') }}">
                                        <option value="">-- Pilih Bulan --</option>
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tahun">Tahun</label>
                                    <input type="number" name="tahun" id="tahun" placeholder="2025" value="{{ old('tahun', $pendirian->tahun ?? '') }}" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="nomor-akta">Nomor Akta</label>
                                    <input type="text" name="nomor_akta" id="nomor_akta" placeholder="Nomor Akta" value="{{ old('nomor_akta', $pendirian->nomor_akta ?? '') }}"/>
                                </div>
                            </div>
                            <p>Pengurus LKS</p>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="nama_ketua">Nama Ketua</label>
                                    <input type="text" name="nama_ketua" id="nama_ketua" placeholder="Nama Ketua" value="{{ old('nama_ketua', $pengurus->nama_ketua ?? '') }}" />
                                </div>
                                <div class="form-group">
                                    <label for="telepon">Telepon/Hp</label>
                                    <input type="text" name="telepon_ketua" id="telepon_ketua" placeholder="No. Telepon " value="{{ old('telepon_ketua', $pengurus->telepon_ketua ?? '') }}"/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat_ketua" id="alamat_ketua" placeholder="Alamat" value="{{ old('alamat_ketua', $pengurus->alamat_ketua ?? '') }}" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="nama_sekretaris">Nama Sekretaris</label>
                                    <input type="text" name="nama_sekretaris" id="nama_sekretaris" placeholder="Nama Sekretaris" value="{{ old('nama_sekretaris', $pengurus->nama_sekretaris ?? '') }}"/>
                                </div>
                                <div class="form-group">
                                    <label for="telepon">Telepon/Hp</label>
                                    <input type="text" name="telepon_sekretaris" id="telepon_sekretaris" placeholder="No. Telepon "value="{{ old('telepon_sekretaris', $pengurus->telepon_sekretaris ?? '') }}" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat_sekretaris" id="alamat_sekretaris" placeholder="Alamat" value="{{ old('alamat_sekretaris', $pengurus->alamat_sekretaris ?? '') }}"/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="nama_bendahara">Nama Bendahara</label>
                                    <input type="text" name="nama_bendahara" id="nama_bendahara" placeholder="Nama Bendahara" value="{{ old('nama_bendahara', $pengurus->nama_bendahara ?? '') }}"/>
                                </div>
                                <div class="form-group">
                                    <label for="telepon">Telepon/Hp</label>
                                    <input type="text" name="telepon_bendahara" id="telepon_bendahara" placeholder="No. Telepon " value="{{ old('telepon_bendahara', $pengurus->telepon_bendahara ?? '') }}"/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat_bendahara" id="alamat_bendahara" placeholder="Alamat" value="{{ old('alamat_bendahara', $pengurus->alamat_bendahara ?? '') }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-section">
                    <div class="form-section-title">
                        <h3>IDENTITAS<br>JATI DIRI LKS</h3>
                    </div>
                    <div class="form-wrapper">
                        <div class="form-content">
                            <div class="form-row">
                                <div class="form-group full-width">
                                    <label for="visi">Visi LKS</label>
                                    <input type="text" name="visi_lks" id="visi_lks" placeholder="Visi LKS" value="{{ old('visi_lks', $jatiDiri->visi_lks ?? '') }}" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group full-width">
                                    <label for="misi">Misi LKS</label>
                                    <input type="text" name="misi_lks" id="misi_lks" placeholder="Misi LKS" value="{{ old('misi_lks', $jatiDiri->misi_lks ?? '') }}" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group full-width">
                                    <label for="tujuan">Tujuan LKS</label>
                                    <input type="text" name="tujuan_lks" id="tujuan_lks" placeholder="Tujuan LKS" value="{{ old('tujuan_lks', $jatiDiri->tujuan_lks ?? '') }}" />
                                </div>
                            </div>
                            <div class="form-row radio-row">
                                <div class="form-group">
                                    <label for="status_lks">Status LKS</label>
                                    <div class="radio-group">
                                        <label><input type="radio" name="status_lks" value="Berbadan Hukum" {{ old('status_lks', $jatiDiri->status_lks ?? '') === 'Berbadan Hukum' ? 'checked' : '' }}>LKS Berbadan Hukum </label>
                                        <label><input type="radio" name="status_lks" value="Tidak Berbadan Hukum" {{ old('status_lks', $jatiDiri->status_lks ?? '') === 'Tidak Berbadan Hukum' ? 'checked' : '' }}>LKS Tidak Berbadan Hukum</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lingkup_kerja">Lingkup Kerja</label>
                                    <div class="radio-group">
                                        <label><input type="radio" name="lingkup_kerja" value="Nasional" {{ old('lingkup_kerja', $jatiDiri->lingkup_kerja ?? '') === 'Nasional' ? 'checked' : '' }}>Nasional</label>
                                        <label><input type="radio" name="lingkup_kerja" value="Provinsi"  {{ old('lingkup_kerja', $jatiDiri->lingkup_kerja ?? '') === 'Provinsi' ? 'checked' : '' }}>Provinsi </label>
                                        <label><input type="radio" name="lingkup_kerja" value="Kab/Kota"  {{ old('lingkup_kerja', $jatiDiri->lingkup_kerja ?? '') === 'Kab/Kota' ? 'checked' : '' }}>Kab/Kota</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sifat_pelayanan">Sifat Pelayanan</label>
                                    <div class="radio-group">
                                        <label><input type="radio" name="sifat_pelayanan" value="Operasional" {{ old('sifat_pelayanan', $jatiDiri->sifat_pelayanan ?? '') === 'Operasional' ? 'checked' : '' }}>LKS Operasional</label>
                                        <label><input type="radio" name="sifat_pelayanan" value="Non-Operasional" {{ old('sifat_pelayanan', $jatiDiri->sifat_pelayanan ?? '') === 'Non-Operasional' ? 'checked' : '' }}>Bukan LKS Operasional</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="posisi_lks">Posisi LKS</label>
                                    <div class="radio-group">
                                        <label><input type="radio" name="posisi_lks" value="Pusat"{{ old('posisi_lks', $jatiDiri->posisi_lks ?? '') === 'Pusat' ? 'checked' : '' }}>LKS Pusat</label>
                                        <label><input type="radio" name="posisi_lks" value="Cabang"{{ old('posisi_lks', $jatiDiri->posisi_lks ?? '') === 'Cabang' ? 'checked' : '' }}>LKS Cabang</label>
                                        <label><input type="radio" name="posisi_lks" value="Wilayah"{{ old('posisi_lks', $jatiDiri->posisi_lks ?? '') === 'Wilayah' ? 'checked' : '' }}>LKS Wilayah</label>
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
            
                <a href="/form-step2"
                <h2>Berikutnya</h2>
                </a>
            
        </main>
        <!-- Feather icons -->
        <script src="https://unpkg.com/feather-icons"></script>
        <script>
            feather.replace(); // initialize icons


            </script>
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