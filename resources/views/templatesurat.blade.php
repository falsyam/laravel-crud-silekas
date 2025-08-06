<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Surat Ukuran Legal</title>
  <style>
@page {
    size: legal portrait;
    margin: 1cm; /* Atur margin global */
  }

    body, table, p {
    font-size: 12pt;
    line-height: 1.15;
  }

  .judul, .nomor, .isi, .ttd {
  font-family: "Bookman Old Style", Georgia, serif;
}

  .container {
    width: 100%;
    padding: 0;
    margin: 0;
    margin-right: 20px;
  }

  table {
    width: 100%;
    border-collapse: collapse;
  }

  td {
    vertical-align: top;
    padding: 4px;
    line-height: 1.15;
  }

.kop {
  display: flex;
  align-items: flex-start; /* penting! sejajarkan atas */
  padding-bottom: 10px;
  margin-bottom: 10px;
  
  position: relative;
  line-height: 1.15;
}

.kop-logo {
  margin-left: 20px;
  
}

.kop img {
  width: 100px;
  height: auto;
  margin-top: 18px; /* koreksi manual agar sejajar dengan h3 */
}

.kop-text {
  flex: 1;
  text-align: center;
  margin-left: -25px;
}

.kop-text h3 {
  margin: 0;
  font-weight: 100;
  font-size: 14pt;
  font-family: Tahoma, "Trebuchet MS", sans-serif;
}

.kop-text h2 {
  margin: 0;
  font-weight: 100;
  font-size: 18pt;
  font-family: Tahoma, "Trebuchet MS", sans-serif;
}

.kop-text p {
  margin: 6px 0;
  font-size: 12pt;
  line-height: 1.15;
}

hr.s2 {
  height:5px;
  border-top:2px solid black;
  border-bottom:4px solid black;
  width: 95%;
  margin-left:-20px;
  
}

  .judul {
    text-align: center;
    font-weight: bold;
    text-decoration: underline;
    font-size: 11pt;
    margin-bottom: 4px;
    margin-top: 20px;
    font-family: "Bookman Old Style", Georgia, serif;
  }

  .nomor {
    text-align: center;
    margin-bottom: 20px;
    margin-top: 15px;
    font-family: "Bookman Old Style", Georgia, serif;
  }

  .isi {
    font-family: "Bookman Old Style", Georgia, serif;
    text-align: left;
    line-height: 1.5;
  }

  .isi table {
    margin: 15px 15px 15px 60px;
    font-size : 11pt;
  }

  .isi td {
    padding: 3px;
    padding-left:16px;
    padding-right:30px;
    line-height: 1.5;
  }

  td.value {
  padding-right: 80px;
  max-width: 450px;
  word-wrap: break-word;
  word-break: break-word;
  white-space: normal;
  vertical-align: top;
  }

  .ttd {
    margin-top: 60px;
    margin-left: -70px;
    width: 100%;
  }

  .ttd .kanan {
    float: right;
    text-align: center;
    width: 50%;
  }

  .clear {
    clear: both;
  }
  </style>
</head>
<body>
  <div class="container">
  <div class="page">
    <div class="page-content">

      <!-- FLEX CONTAINER UNTUK KOP -->
  <table width="100%">
  <tr>
    <td width="100px">
      <img  src="img/Lambang_Kabupaten_Kudus.png" width="100px"  style="margin-top: 10px;">
    </td>
    <td style="text-align: center; font-family: Tahoma, 'Trebuchet MS', sans-serif; font-weight: normal; font-size: 13pt; letter-spacing: 0.2px;">
      <h3 style="margin: 0; font-weight: normal; font-size: 18pt;">PEMERINTAH KABUPATEN KUDUS</h3>
      <h2 style="margin: 0; font-weight: normal; font-size: 18pt;">DINAS SOSIAL, PEMBERDAYAAN PEREMPUAN,</h2>
      <h2 style="margin: 0; font-weight: normal; font-size: 18pt;">PERLINDUNGAN ANAK, PENGENDALIAN PENDUDUK</h2>
      <h2 style="margin: 0; font-weight: normal; font-size: 18pt;">DAN KELUARGA BERENCANA</h2>
      <p style="margin: 5px 0;">Jl. Mejobo No. 99  0291 431738 Fax. (0291) 442622</p>
      <p style="margin: 5px 0;">e-mail: dinsosp3ap2kb@kuduskab.go.id web: dinsos.kuduskab.go.id</p>
      <p style="margin: 5px 0;">K U D U S 59319</p>
    </td>
  </tr>
</table>
<hr style="height:3px; border-top:2px solid black; border-bottom:4px solid black;">


      

      <div class="judul">TANDA PENDAFTARAN <br> LEMBAGA KESEJAHTERAAN SOSIAL</div>
      <div class="nomor">Nomor: 050/{{ $nomor_surat }}/Dinsos/VIII/{{ now()->year }}<br> <p>diberikan kepada: </p></div>

      <div class="isi">

        <table>
          <tr>
            <td width="200px">Nama LKS</td>
            <td>: {{ $nama_lks }}</td>
          </tr>
          <tr>
            <td>Alamat LKS</td>
            <td>: {{ $alamat_lks }}</td>
          </tr>
          <tr>
            <td>Desa/ Kelurahan/ Nama Lain,Kecamatan</td>
            <td>: {{ $desa_kelurahan }},{{ $kecamatan }}</td>
          </tr>
          <tr>
            <td>Kabupaten/Kota,Provinsi</td>
            <td>: {{ $kota }}</td>
          </tr>
          <tr>
            <td>Nama Pengurus LKS</td>
          </tr>
          <tr>
            <td>a. Ketua</td>
            <td>: {{ $nama_ketua }}</td>
          </tr>
          <tr>
            <td>b. Sekretaris</td>
            <td>: {{ $nama_sekretaris}}</td>
          </tr>
          <tr>
            <td>c. Bendahara</td>
            <td>: {{ $nama_bendahara}}</td>
          </tr>
          <tr>
            <td>Tempat dan Tanggal Pendirian</td>
            <td>: {{ $tempat_didirikan }}, {{ $tanggal }}-{{ $bulan}}-{{$tahun}}</td>
          </tr>
          <tr>
            <td>Nomor Akta Pendirian</td>
            <td>: {{ $nomor_akta}}</td>
          </tr>
          <tr>
            <td>NPWP</td>
            <td>: {{ $nomor_npwp }}</td>
          </tr>
          <tr>
            <td>Status LKS</td>
            <td>: {{ $status_lks}}</td>
          </tr>
          <tr>
            <td>Kedudukan</td>
            <td>: {{ $posisi_lks }}</td>
          </tr>
          <tr>
            <td>Lingkup Kerja</td>
            <td>: {{ $lingkup_kerja }}</td>
          </tr>
          <tr>
            <td>Jenis Pelayanan</td>
            <td class="value" >: {{ $jenis_pelayanan}}</td>
          </tr>
          <tr>
            <td>Sifat Pelayanan</td>
            <td>: {{ $sifat_pelayanan}}</td>
          </tr>
          <tr>
            <td>Masa Berlaku</td>
            <td>: {{ $masa_berlaku}}</td>
          </tr>
        </table>

      </div>

      <table width="100%" style="margin-top: 50px;">
  <tr>
    <td width="50%"></td>
    <td style="text-align: center;">
      Kudus, {{ $tanggal_penerbitan }}<br><br>
      KEPALA DINAS SOSIAL, PEMBERDAYAAN PEREMPUAN, <br>
      PERLINDUNGAN ANAK, PENGENDALIAN PENDUDUK DAN KELUARGA BERENCANA<br>
      <img  src="img/ttd.png" width="150px"  style="margin-top: 5px;"><br><br>
      <strong><u>SATRIA AGUS HIMAWAN, S.STP, M.M</u></strong><br>
      Pembina Tk. I<br>
      NIP. 19820826 200012 1 001
    </td>
  </tr>
</table>
        <div class="clear"></div>
      </div>
    </div>
  </div>
</body>
