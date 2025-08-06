
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
    <a href="{{ route('form.step3') }}" class="icon-link confirm-leave">
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
            <div class="progress" data-step="4">
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
            @php
            $sumberdanalains = [
        ['label' => 'a.', 'index' => 0],
    ];

    $jejarings = [
    ['group' => 'jejaring_sosial_dalam', 'judul' => 'Lembaga Sosial dari Dalam Negeri', 'kategori' => 'Lembaga Sosial', 'asal' => 'Dalam Negeri'],
    ['group' => 'jejaring_sosial_luar', 'judul' => 'Lembaga Sosial dari Luar Negeri', 'kategori' => 'Lembaga Sosial', 'asal' => 'Luar Negeri'],
    ['group' => 'jejaring_pt_dalam', 'judul' => 'Perguruan Tinggi dari Dalam Negeri', 'kategori' => 'Perguruan Tinggi', 'asal' => 'Dalam Negeri'],
    ['group' => 'jejaring_pt_luar', 'judul' => 'Perguruan Tinggi dari Luar Negeri', 'kategori' => 'Perguruan Tinggi', 'asal' => 'Luar Negeri'],
    ['group' => 'jejaring_usaha_dalam', 'judul' => 'Pelaku Dunia Usaha dari Dalam Negeri', 'kategori' => 'Pelaku Dunia Usaha', 'asal' => 'Dalam Negeri'],
    ['group' => 'jejaring_usaha_luar', 'judul' => 'Pelaku Dunia Usaha dari Luar Negeri', 'kategori' => 'Pelaku Dunia Usaha', 'asal' => 'Luar Negeri'],
    ['group' => 'jejaring_pem_dalam', 'judul' => 'Pemerintah', 'kategori' => 'Pemerintah', 'asal' => 'Dalam Negeri'],
    ['group' => 'jejaring_pem_luar', 'judul' => 'Pemerintah Daerah', 'kategori' => 'Pemerintah Daerah', 'asal' => 'Luar Negeri'],
];
    @endphp

        <h1> Formulir Pendaftaran Lembaga Kesejahteraaan Sosial </h1>
        <!-- Subtitle outside the wrapper -->
        <form method="POST" action="{{ route('form.step4.post') }}">
            @csrf
            <div class="form-section">
                <div class="form-section-title">
                    <h3>SUMBER DAYA MANUSIA</h3>
                </div>
                <div class="form-wrapper">
                    <div class="form-content">
                        
                        <!-- Pembina -->
                        <label>Organ Organisasi</label>
                        <div class="form-row-horizontal">
                            <label for="jumlah_pembina">Pembina LKS</label>
                            <div class="input-group">
                                <input type="number" name="jumlah_pembina" id="jumlah_pembina" placeholder="0">
                                <span>Orang</span>
                            </div>
                        </div>
                        <!-- Pengurus -->
                        <div class="form-row-horizontal">
                            <label for="jumlah_pengurus">Pengurus LKS</label>
                            <div class="input-group">
                                <input type="number" name="jumlah_pengurus" id="jumlah_pengurus" placeholder="0">
                                <span>Orang</span>
                            </div>
                        </div>
                        <!-- Pengawas -->
                        <div class="form-row-horizontal">
                            <label for="jumlah_pengawas">Pengawas LKS</label>
                            <div class="input-group">
                                <input type="number" name="jumlah_pengawas" id="jumlah_pengawas" placeholder="0">
                                <span>Orang</span>
                            </div>
                        </div>
                        <!-- Lain-lain -->
                        <div class="form-row-horizontal">
                            <label for="keterangan_lainnya">d. Lain-lain</label>
                            <div class="input-group">
                                <input type="text" name="keterangan_lainnya" id="keterangan_lainnya" placeholder="Tuliskan peran lain...">
                                <input type="number" name="jumlah_lainnya" id="jumlah_lainnya" placeholder="0">
                                <span>Orang</span>
                            </div>
                        </div>
                        <label>Tenaga pelaksana</label>
                        <div class="form-row-horizontal">
                            <label for="jumlah_pekerja_sosial">Pekerja Sosial</label>
                            <div class="input-group">
                                <input type="number" name="jumlah_pekerja_sosial" id="jumlah_pembina" placeholder="0">
                                <span>Orang</span>
                            </div>
                        </div>
                        <!-- Pengurus -->
                        <div class="form-row-horizontal">
                            <label for="jumlah_teknis_lainnya">Tenaga teknis lainnya</label>
                            <div class="input-group">
                                <input type="number" name="jumlah_teknis_lainnya" id="jumlah_pengurus" placeholder="0">
                                <span>Orang</span>
                            </div>
                        </div>
                        <!-- Pengawas -->
                        <div class="form-row-horizontal">
                            <label for="jumlah_administrasi">Tenaga administrasi</label>
                            <div class="input-group">
                                <input type="number" name="jumlah_administrasi" id="jumlah_pengawas" placeholder="0">
                                <span>Orang</span>
                            </div>
                        </div>
                        <div class="form-row-horizontal">
                            <label for="jumlah_penunjang">Tenaga Penunjang</label>
                            <div class="input-group">
                                <input type="number" name="jumlah_penunjang" id="jumlah_pengawas" placeholder="0">
                                <span>Orang</span>
                            </div>
                        </div>
                        <!-- Lain-lain -->
                        <div class="form-row-horizontal">
                            <label for="keterangan_pelaksana_lainnya">d. Lain-lain</label>
                            <div class="input-group">
                                <input type="text" name="keterangan_pelaksana_lainnya" id="keterangan_lainnya" placeholder="Tuliskan peran lain...">
                                <input type="number" name="jumlah_pelaksana_lainnya" id="jumlah_lainnya" placeholder="0">
                                <span>Orang</span>
                            </div>
                        </div>
                    </div>
                    <label>Sumber Dana</label>
                    <div class="form-row radio-row">
                        <div class="form-group">
                            <label for="modal_awal">Modal Awal</label>
                            <div class="radio-group">
                                <label><input type="radio" name="modal_awal" value="Ada">Ada</label>
                                <label><input type="radio" name="modal_awal" value="Tidak_ada">Tidak Ada</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="iuran_anggota">Iuran Anggota</label>
                            <div class="radio-group">
                                <label><input type="radio" name="iuran_anggota" value="Ada">Ada</label>
                                <label><input type="radio" name="iuran_anggota" value="Tidak_ada">Tidak Ada</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="hasil_usaha">Hasil Usaha LKS</label>
                            <div class="radio-group">
                                <label><input type="radio" name="hasil_usaha" value="Ada">Ada</label>
                                <label><input type="radio" name="hasil_usaha" value="Tidak_ada">Tidak Ada</label>
                            </div>
                        </div>
                    </div>
                    <label>Sumber Dana LKS dari sumbangan masyarakat</label>
                    <div class="form-row radio-row">
                        <div class="form-group">
                            <label for="donatur">Sumbangan Donatur</label>
                            <div class="radio-group">
                                <label><input type="radio" name="donatur" value="Dalam Negeri">Dalam Negeri</label>
                                <label><input type="radio" name="donatur" value="Luar Negeri">Luar Negeri</label>
                                <label><input type="radio" name="donatur" value="Dalam Negeri & Luar Negeri">Keduanya</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dunia_usaha">Sumbangan dunia usaha</label>
                            <div class="radio-group">
                                <label><input type="radio" name="dunia_usaha" value="Dalam Negeri">Dalam Negeri</label>
                                <label><input type="radio" name="dunia_usaha" value="Luar Negeri">Luar Negeri</label>
                                <label><input type="radio" name="dunia_usaha" value="Dalam Negeri & Luar Negeri">Keduanya</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="zakat">Zakat Masyarakat</label>
                            <div class="radio-group">
                                <label><input type="radio" name="zakat" value="Dalam Negeri">Dalam Negeri</label>
                                <label><input type="radio" name="zakat" value="Luar Negeri">Luar Negeri</label>
                                <label><input type="radio" name="zakat" value="Dalam Negeri & Luar Negeri">Keduanya</label>
                            </div>
                        </div>
                    </div>
                    <label>Sumber Dana LKS berasal dari bantuan</label>
                    <div class="form-row radio-row">
                        <div class="form-group">
                            <label for="bantuan_lembaga">Bantuan Lembaga Sosial</label>
                            <div class="radio-group">
                                <label><input type="radio" name="bantuan_lembaga" value="Dalam Negeri">Dalam Negeri</label>
                                <label><input type="radio" name="bantuan_lembaga" value="Luar Negeri">Luar Negeri</label>
                                <label><input type="radio" name="bantuan_lembaga" value="Dalam Negeri & Luar Negeri">Keduanya</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="anggaran_rt">Bantuan dunia usaha</label>
                            <div class="radio-group">
                                <label><input type="radio" name="bantuan_usaha" value="Dalam Negeri">Dalam Negeri</label>
                                <label><input type="radio" name="bantuan_usaha" value="Luar Negeri">Luar Negeri</label>
                                <label><input type="radio" name="bantuan_usaha" value="Dalam Negeri & Luar Negeri">Keduanya</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="anggaran_rt">Bantuan Pemerintah</label>
                            <div class="radio-group">
                                <label><input type="radio" name="bantuan_pemerintah" value="Pemerintah">Pemerintah</label>
                                <label><input type="radio" name="bantuan_pemerintah" value="Pemerintah Daerah">Pemerintah Daerah</label>
                            </div>
                        </div>
                        <div class="form-section">
                            <h4>Sumber Dana Lain</h4>
                            <!-- a -->
                            @foreach($sumberdanalains as $i => $sumber_dana_lain)
                            <div class="form-row">
                                <label for="sumber_dana_lain_0">a.</label>
                                <div class="form-group">
                                    <input type="text" name="sumber_dana_lain[0][sumber_dana]" id="sumber_dana_lain_0" placeholder="Tuliskan sumber dana">
                                    <div class="radio-group">
                                        <label><input type="radio" name="sumber_dana_lain[0][asal_dana]" value="Dalam Negeri"> Dalam negeri</label>
                                        <label><input type="radio" name="sumber_dana_lain[0][asal_dana]" value="Luar Negeri"> Luar negeri</label>
                                        <label><input type="radio" name="sumber_dana_lain[0][asal_dana]" value="Keduanya"> Keduanya</label>
                                    </div>
                                </div>
                            </div>
                            <!-- b -->
                            <div class="form-row">
                                <label for="sumber_dana_lain_1">b.</label>
                                <div class="form-group">
                                    <input type="text" name="sumber_dana_lain[1][sumber_dana]" id="sumber_dana_lain_1" placeholder="Tuliskan sumber dana">
                                    <div class="radio-group">
                                        <label><input type="radio" name="sumber_dana_lain[1][asal_dana]" value="Dalam Negeri"> Dalam negeri</label>
                                        <label><input type="radio" name="sumber_dana_lain[1][asal_dana]" value="Luar Negeri"> Luar negeri</label>
                                        <label><input type="radio" name="sumber_dana_lain[1][asal_dana]" value="Keduanya"> Keduanya</label>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-section">
<h4>Jejaring LKS</h4>
<div class="form-row">
  {{-- Lembaga Sosial --}}
  <div class="jejaring-block">
    <label>a. Lembaga Sosial dari Dalam Negeri</label>
    <div class="radio-group">
      <label><input type="radio" name="status_jejaring[lembaga_dalam]" value="Tidak Ada" onclick="document.getElementById('jejaring_lembaga_dalam').style.display='none'"> Tidak Ada</label>
      <label><input type="radio" name="status_jejaring[lembaga_dalam]" value="Ada" onclick="document.getElementById('jejaring_lembaga_dalam').style.display='block'"> Ada, dengan:</label>
    </div>
    <div class="jejaring-fields" id="jejaring_lembaga_dalam" style="display: none;">
      @for ($i = 0; $i < 3; $i++)
        <div class="jejaring-entry">
          <input type="text" name="jejaring[lembaga_dalam_{{ $i }}][nama_lembaga]" placeholder="{{ $i + 1 }}. Nama Lembaga">
          <input type="hidden" name="jejaring[lembaga_dalam_{{ $i }}][kategori]" value="Lembaga Sosial">
          <input type="hidden" name="jejaring[lembaga_dalam_{{ $i }}][asal]" value="Dalam Negeri">
        </div>
      @endfor
    </div>
  </div>

  <div class="jejaring-block">
    <label>b. Lembaga Sosial dari Luar Negeri</label>
    <div class="radio-group">
      <label><input type="radio" name="status_jejaring[lembaga_luar]" value="Tidak Ada" onclick="document.getElementById('jejaring_lembaga_luar').style.display='none'"> Tidak Ada</label>
      <label><input type="radio" name="status_jejaring[lembaga_luar]" value="Ada" onclick="document.getElementById('jejaring_lembaga_luar').style.display='block'"> Ada, dengan:</label>
    </div>
    <div class="jejaring-fields" id="jejaring_lembaga_luar" style="display: none;">
      @for ($i = 0; $i < 3; $i++)
        <div class="jejaring-entry">
          <input type="text" name="jejaring[lembaga_luar_{{ $i }}][nama_lembaga]" placeholder="{{ $i + 1 }}. Nama Lembaga">
          <input type="hidden" name="jejaring[lembaga_luar_{{ $i }}][kategori]" value="Lembaga Sosial">
          <input type="hidden" name="jejaring[lembaga_luar_{{ $i }}][asal]" value="Luar Negeri">
        </div>
      @endfor
    </div>
  </div>
</div>

<div class="form-row">
  {{-- Perguruan Tinggi --}}
  <div class="jejaring-block">
    <label>c. Perguruan Tinggi dari Dalam Negeri</label>
    <div class="radio-group">
      <label><input type="radio" name="status_jejaring[pt_dalam]" value="Tidak Ada" onclick="document.getElementById('jejaring_pt_dalam').style.display='none'"> Tidak Ada</label>
      <label><input type="radio" name="status_jejaring[pt_dalam]" value="Ada" onclick="document.getElementById('jejaring_pt_dalam').style.display='block'"> Ada, dengan:</label>
    </div>
    <div class="jejaring-fields" id="jejaring_pt_dalam" style="display: none;">
      @for ($i = 0; $i < 3; $i++)
        <div class="jejaring-entry">
          <input type="text" name="jejaring[pt_dalam_{{ $i }}][nama_lembaga]" placeholder="{{ $i + 1 }}. Nama Lembaga">
          <input type="hidden" name="jejaring[pt_dalam_{{ $i }}][kategori]" value="Perguruan Tinggi">
          <input type="hidden" name="jejaring[pt_dalam_{{ $i }}][asal]" value="Dalam Negeri">
        </div>
      @endfor
    </div>
  </div>

  <div class="jejaring-block">
    <label>d. Perguruan Tinggi dari Luar Negeri</label>
    <div class="radio-group">
      <label><input type="radio" name="status_jejaring[pt_luar]" value="Tidak Ada" onclick="document.getElementById('jejaring_pt_luar').style.display='none'"> Tidak Ada</label>
      <label><input type="radio" name="status_jejaring[pt_luar]" value="Ada" onclick="document.getElementById('jejaring_pt_luar').style.display='block'"> Ada, dengan:</label>
    </div>
    <div class="jejaring-fields" id="jejaring_pt_luar" style="display: none;">
      @for ($i = 0; $i < 3; $i++)
        <div class="jejaring-entry">
          <input type="text" name="jejaring[pt_luar_{{ $i }}][nama_lembaga]" placeholder="{{ $i + 1 }}. Nama Lembaga">
          <input type="hidden" name="jejaring[pt_luar_{{ $i }}][kategori]" value="Perguruan Tinggi">
          <input type="hidden" name="jejaring[pt_luar_{{ $i }}][asal]" value="Luar Negeri">
        </div>
      @endfor
    </div>
  </div>
</div>

<div class="form-row">
  {{-- Dunia Usaha --}}
  <div class="jejaring-block">
    <label>e. Dunia Usaha dari Dalam Negeri</label>
    <div class="radio-group">
      <label><input type="radio" name="status_jejaring[usaha_dalam]" value="Tidak Ada" onclick="document.getElementById('jejaring_usaha_dalam').style.display='none'"> Tidak Ada</label>
      <label><input type="radio" name="status_jejaring[usaha_dalam]" value="Ada" onclick="document.getElementById('jejaring_usaha_dalam').style.display='block'"> Ada, dengan:</label>
    </div>
    <div class="jejaring-fields" id="jejaring_usaha_dalam" style="display: none;">
      @for ($i = 0; $i < 3; $i++)
        <div class="jejaring-entry">
          <input type="text" name="jejaring[usaha_dalam_{{ $i }}][nama_lembaga]" placeholder="{{ $i + 1 }}. Nama Lembaga">
          <input type="hidden" name="jejaring[usaha_dalam_{{ $i }}][kategori]" value="Pelaku Dunia Usaha">
          <input type="hidden" name="jejaring[usaha_dalam_{{ $i }}][asal]" value="Dalam Negeri">
        </div>
      @endfor
    </div>
  </div>

  <div class="jejaring-block">
    <label>f. Dunia Usaha dari Luar Negeri</label>
    <div class="radio-group">
      <label><input type="radio" name="status_jejaring[usaha_luar]" value="Tidak Ada" onclick="document.getElementById('jejaring_usaha_luar').style.display='none'"> Tidak Ada</label>
      <label><input type="radio" name="status_jejaring[usaha_luar]" value="Ada" onclick="document.getElementById('jejaring_usaha_luar').style.display='block'"> Ada, dengan:</label>
    </div>
    <div class="jejaring-fields" id="jejaring_usaha_luar" style="display: none;">
      @for ($i = 0; $i < 3; $i++)
        <div class="jejaring-entry">
          <input type="text" name="jejaring[usaha_luar_{{ $i }}][nama_lembaga]" placeholder="{{ $i + 1 }}. Nama Lembaga">
          <input type="hidden" name="jejaring[usaha_luar_{{ $i }}][kategori]" value="Pelaku Dunia Usaha">
          <input type="hidden" name="jejaring[usaha_luar_{{ $i }}][asal]" value="Luar Negeri">
        </div>
      @endfor
    </div>
  </div>
</div>

<div class="form-row">
  {{-- Pemerintah --}}
  <div class="jejaring-block">
    <label>g. Pemerintah</label>
    <div class="radio-group">
      <label><input type="radio" name="status_jejaring[pem_dalam]" value="Tidak Ada" onclick="document.getElementById('jejaring_pem_dalam').style.display='none'"> Tidak Ada</label>
      <label><input type="radio" name="status_jejaring[pem_dalam]" value="Ada" onclick="document.getElementById('jejaring_pem_dalam').style.display='block'"> Ada, dengan:</label>
    </div>
    <div class="jejaring-fields" id="jejaring_pem_dalam" style="display: none;">
      @for ($i = 0; $i < 3; $i++)
        <div class="jejaring-entry">
          <input type="text" name="jejaring[pem_dalam_{{ $i }}][nama_lembaga]" placeholder="{{ $i + 1 }}. Nama Lembaga">
          <input type="hidden" name="jejaring[pem_dalam_{{ $i }}][kategori]" value="Pemerintah">
          <input type="hidden" name="jejaring[pem_dalam_{{ $i }}][asal]" value="Dalam Negeri">
        </div>
      @endfor
    </div>
  </div>

  <div class="jejaring-block">
    <label>h. Pemerintah Daerah</label>
    <div class="radio-group">
      <label><input type="radio" name="status_jejaring[pem_luar]" value="Tidak Ada" onclick="document.getElementById('jejaring_pem_luar').style.display='none'"> Tidak Ada</label>
      <label><input type="radio" name="status_jejaring[pem_luar]" value="Ada" onclick="document.getElementById('jejaring_pem_luar').style.display='block'"> Ada, dengan:</label>
    </div>
    <div class="jejaring-fields" id="jejaring_pem_luar" style="display: none;">
      @for ($i = 0; $i < 3; $i++)
        <div class="jejaring-entry">
          <input type="text" name="jejaring[pem_luar_{{ $i }}][nama_lembaga]" placeholder="{{ $i + 1 }}. Nama Lembaga">
          <input type="hidden" name="jejaring[pem_luar_{{ $i }}][kategori]" value="Pemerintah Daerah">
          <input type="hidden" name="jejaring[pem_luar_{{ $i }}][asal]" value="Luar Negeri">
        </div>
      @endfor
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
        <!-- Feather icons -->
        <script src="https://unpkg.com/feather-icons"></script>
        <script>
            feather.replace(); // initialize icons
        </script>
        <script type="text/javascript" src={{ secure_asset('js/script.js') }}></script>
        <script>
    let formChanged = false;

    // Tandai jika ada perubahan di form
    document.querySelectorAll("form input, form select, form textarea").forEach(function (element) {
        element.addEventListener("change", function () {
            formChanged = true;
        });
    });

    // Tampilkan konfirmasi sebelum meninggalkan halaman jika ada perubahan
    window.addEventListener("beforeunload", function (e) {
        if (formChanged) {
            e.preventDefault();
            e.returnValue = ''; // Required for Chrome
        }
    });

    // Jika form disubmit, tidak perlu peringatan
    document.querySelectorAll("form").forEach(function (form) {
        form.addEventListener("submit", function () {
            formChanged = false;
        });
    });

    document.querySelectorAll('.confirm-leave').forEach(link => {
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