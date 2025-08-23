<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Alexandria:wght@100..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="css/styles.css" />
    <title>Silekas Kabupaten Kudus</title>

    <section class="navbar" id="navbar">
    <div class="header">
      <a href="#navbar"><img src="img/logo-silekas.png" alt="Silekas" /></a>
    </div>
    </section>
  </head>

  <body>    
    <div class="banner">
      <div class="inner">
        <div class="left">
          <img src="img/logo-silekas2.png" alt="Silekas" />
          <h1>SILEKAS</h1>
          <h1>Kabupaten Kudus</h1>
          <p>
            Sistem Informasi Aplikasi Lembaga Kesejahteraan Sosial Kabupaten
            Kudus
          </p>
        </div>
        <div class="right">
          <img src="img/menara.png" alt="">
        </div>
      </div>
    </div>

    <div class="menu">
      <h1>Menu Utama</h1>


      <div class="menu-card">
        <div class="card-wrapper">
          <div class="box box1">
            <h2 class="menu-card-title">
              Pendaftaran Lembaga Kesejahteraan Sosial
            </h2>
          </div>
          <div class="box-footer">
            <a href="{{ route('form.step1', ['tipe' => 'Pendaftaran LKS']) }}" class="cta">Ajukan Sekarang</a>
            <a href="{{ route('form.step1', ['tipe' => 'Pendaftaran LKS']) }}" id="log-in"><i data-feather="log-in"></i></a>
          </div>
        </div>


        <div class="card-wrapper">
          <div class="box box2">
            <h2>Perpanjangan Surat Tanda Daftar</h2>
          </div>
          <div class="box-footer">
            <a href="{{ route('form.step1', ['tipe' => 'Perpanjangan Surat Tanda Daftar']) }}" class="cta">Ajukan Sekarang</a>
            <a href="{{ route('form.step1', ['tipe' => 'Perpanjangan Surat Tanda Daftar']) }}" id="log-in"><i data-feather="log-in"></i></a>
          </div>
        </div>


        <div class="card-wrapper">
          <div class="box box3">
            <h2 class="menu-card-title">Cek Status Permohonan</h2>
          </div>
          <div class="box-footer">
            <a href="{{ route('cekstatus-user')}}" class="cta">Cek Status</a>
            <a href="{{ route('cekstatus-user')}}" id="search"><i data-feather="log-in"></i></a>
          </div>
        </div>

      </div>
    </div>
    <!-- Footer Section -->

    <footer>
      <div class="dinas">
        <div class="company">
          <img src="img/Lambang_Kabupaten_Kudus.png" alt="kudus" />
          <p>
            PEMERINTAH KABUPATEN KUDUS
            <span
              >DINAS SOSIAL, PEMBERDAYAAN PEREMPUAN, PERLINDUNGAN ANAK,
              PENGENDALIAN PENDUDUK DAN KELUARGA BERENCANA</span
            >
          </p>
        </div>

        <div class="desc">
          <div class="address">
            <i data-feather="map-pin"></i>
            <span
              >Jl. Mejobo No.99, Mlati Kidul, Kec. Kota Kudus, Kabupaten Kudus,
              Jawa Tengah 59319</span
            >
          </div>
          <div class="phone">
            <i data-feather="phone"></i>
            <span>(0291) 431738</span>
          </div>
          <div class="website">
            <i data-feather="globe"></i>
            <span>www.dinsos.kuduskab.go.id</span>
          </div>

          <div class="social">
            <div><a href="https://www.instagram.com/dinsosp3ap2kb_kudus/"><i data-feather="instagram"></i></div></a>
            <div><a href="https://wa.me/+628116346767"><i data-feather="phone"></i></div></a>
            <div><a href="https://www.facebook.com/p/Dinas-Sosial-PpKb-Kudus-100014794308218/"><i data-feather="facebook"></i></div></a>
          </div>
        </div>
      </div>

      <div class="credit">
        <p>
          ©2025 <a href="https://github.com/falsyam">Syamrtx.</a> | All rights
          reserved.
        </p>
      </div>
    </footer>

    <script src="https://unpkg.com/feather-icons"></script>
    <script>
      feather.replace(); // initialize icons
    </script>
    
  </body>
</html>
