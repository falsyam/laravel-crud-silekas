<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\IdentitasLks;
use App\Models\DataUmumLks;
use App\Models\KontakLks;
use App\Models\PendirianLks;
use App\Models\PengurusLks;
use App\Models\JatiDiriLks;
use App\Models\LegalitasLks;
use App\Models\ProgramLks;
use App\Models\SumberDayaLks;
use App\Models\PelayananLks;
use App\Models\PelayananLainLks;
use App\Models\UsahaPenunjangLks;
use App\Models\SumberDayaManusiaLks;
use App\Models\SumberDanaLainLks;
use App\Models\JejaringLks;
use App\Models\PengajuanLks;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;



class LksRegistrationController extends Controller
{
    
    public function postStep1(Request $request)
    {

        
        $validated = $request->validate([
            // Identitas Pengisi
            "tipe_pengajuan" =>
                "required|in:Pendaftaran LKS,Perpanjangan Surat Tanda Daftar",
            "nama_lks" => "required|string",
            "domisili" => "required|string",
            "provinsi" => "required|string",
            "kab_kota" => "required|string",
            "nama_pengisi" => "required|string",
            "jabatan" => "required|string",
            "telepon_pengisi" => "required|string",
            "email" => "required|email",

            // Data Umum
            "singkatan" => "nullable|string",
            "alamat_lks" => "required|string",
            "jalan_nomor" => "nullable|string",
            "desa_kelurahan" => "nullable|string",
            "kecamatan" => "nullable|string",
            "kota" => "required|string",
            "provinsi" => "required|string",
            "kodepos" => "nullable|string",

            // Kontak
            "telepon" => "required|string",
            "fax" => "nullable|string",
            "website" => "nullable|string",
            "media_sosial" => "nullable|string",

            // Pendirian
            "tempat_didirikan" => "required|string",
            "tanggal" => "required|integer|min:1|max:31",
            "bulan" => "required|string",
            "tahun" => "required|integer",
            "nomor_akta" => "nullable|string",

            // Pengurus
            "nama_ketua" => "required|string",
            "telepon_ketua" => "required|string",
            "alamat_ketua" => "required|string",
            "nama_sekretaris" => "required|string",
            "telepon_sekretaris" => "required|string",
            "alamat_sekretaris" => "required|string",
            "nama_bendahara" => "required|string",
            "telepon_bendahara" => "required|string",
            "alamat_bendahara" => "required|string",

            // Jati Diri
            "visi_lks" => "required|string",
            "misi_lks" => "required|string",
            "tujuan_lks" => "required|string",
            "status_lks" => "required|string",
            "lingkup_kerja" => "required|string",
            "sifat_pelayanan" => "required|string",
            "posisi_lks" => "required|string",
        ]);

        // === 1. Simpan Identitas ===
    $identitas = IdentitasLks::create($request->only([
        "nama_lks", "domisili", "provinsi", "kab_kota",
        "nama_pengisi", "jabatan", "telepon_pengisi", "email",
    ]));

    Session::put("lks_id", $identitas->id);

        // Kode Unik
        $tipePengajuan = $request->tipe_pengajuan;

        if ($tipePengajuan === 'Pendaftaran LKS') {
            $tipe = 1;
        } elseif ($tipePengajuan === 'Perpanjangan Surat Tanda Daftar') {
            $tipe = 2;
        } else {
            return back()->with('error', 'Tipe pengajuan tidak valid.');
        }

        $kodeUnik = "LKS-{$tipe}-" . now()->year . '-' . str_pad($identitas->id, 4, '0', STR_PAD_LEFT);


$pengajuan = PengajuanLks::create([
    "identitas_lks_id" => $identitas->id,
    "tipe_pengajuan" => $tipe, // ✅ ini sekarang tidak null
    "status" => "menunggu",
    "tanggal_pengajuan" => now(),
    "kode_unik" => $kodeUnik,
]);
Session::put('kode_unik', $pengajuan->kode_unik);

    // === 4. Simpan Data Umum ===
    $dataUmum = DataUmumLks::create([
        "identitas_lks_id" => $identitas->id,
        "nama_lks" => $request->nama_lks,
        "singkatan" => $request->singkatan,
        "alamat_lks" => $request->alamat_lks,
        "jalan_nomor" => $request->jalan_nomor,
        "desa_kelurahan" => $request->desa_kelurahan,
        "kecamatan" => $request->kecamatan,
        "kota" => $request->kota,
        "provinsi" => $request->provinsi,
        "kodepos" => $request->kodepos,
    ]);

    // === 5. Simpan Kontak ===
    $kontak = KontakLks::create([
        "identitas_lks_id" => $identitas->id,
        "telepon" => $request->telepon,
        "fax" => $request->fax,
        "email" => $request->email,
        "website" => $request->website,
        "media_sosial" => $request->media_sosial,
    ]);

    // === 6. Simpan Pendirian ===
    $pendirian = PendirianLks::create([
        "identitas_lks_id" => $identitas->id,
        "tempat_didirikan" => $request->tempat_didirikan,
        "tanggal" => $request->tanggal,
        "bulan" => $request->bulan,
        "tahun" => $request->tahun,
        "nomor_akta" => $request->nomor_akta,
    ]);

    // === 7. Simpan Pengurus ===
    $pengurus = PengurusLks::create([
        "identitas_lks_id" => $identitas->id,
        "nama_ketua" => $request->nama_ketua,
        "telepon_ketua" => $request->telepon_ketua,
        "alamat_ketua" => $request->alamat_ketua,
        "nama_sekretaris" => $request->nama_sekretaris,
        "telepon_sekretaris" => $request->telepon_sekretaris,
        "alamat_sekretaris" => $request->alamat_sekretaris,
        "nama_bendahara" => $request->nama_bendahara,
        "telepon_bendahara" => $request->telepon_bendahara,
        "alamat_bendahara" => $request->alamat_bendahara,
    ]);

    // === 8. Simpan Jati Diri ===
    $jatiDiri = JatiDiriLks::create([
        "identitas_lks_id" => $identitas->id,
        "visi_lks" => $request->visi_lks,
        "misi_lks" => $request->misi_lks,
        "tujuan_lks" => $request->tujuan_lks,
        "status_lks" => $request->status_lks,
        "lingkup_kerja" => $request->lingkup_kerja,
        "sifat_pelayanan" => $request->sifat_pelayanan,
        "posisi_lks" => $request->posisi_lks,
    ]);

    return redirect()
        ->route("form.step2")
        ->with("success")
        ->withCookie(cookie("pengajuan_id", $pengajuan->id, 60 * 24));
}

public function postStep2(Request $request)
{
    
    // Ambil ID pengajuan dari cookie
    $pengajuanId = $request->cookie("pengajuan_id");
    $pengajuan = PengajuanLks::with(['identitasLks.legalitas', 'identitasLks.program'])->find($pengajuanId);


    // Ambil ID LKS dari session
    $lksId = session("lks_id");

    // Validasi apakah session masih aktif dan data pengajuan ditemukan
    if (!$lksId || !$pengajuan) {
        return redirect()
            ->route("form.step1")
            ->with("error", "Session atau data pengajuan tidak ditemukan. Silakan ulangi pendaftaran.");
    }

    // Validasi form
    $validated = $request->validate([
        // LEGALITAS
        "anggaran_dasar" => "required|string",
        "anggaran_rt" => "required|string",
        "akta_pendirian" => "required|string",
        "akta_pendirian_lks_tidak" => "nullable|string",
        "nama_notaris_tidak" => "nullable|string",
        "nomor_akta_tidak" => "nullable|string",
        "nomor_surat_keterangan_terdaftar" => "nullable|string",
        "akta_pendirian_lks_berbadan" => "nullable|string",
        "nama_notaris_berbadan" => "nullable|string",
        "nomor_akta_berbadan" => "nullable|string",
        "pengesahan_akta_pendirian" => "nullable|string",
        "nomor_pengesahan" => "nullable|string",
        "lembaran_negara" => "nullable|string",
        "nomor_lembaran_negara" => "nullable|string",
        "ket_domisili" => "required|string",
        "sumber_ket_domisili" => "nullable|string",
        "tanda_pendaftaran" => "required|string",
        "nama_instansi" => "nullable|string",
        "nomor_tanda_pendaftaran" => "nullable|string",
        "npwp" => "required|string",
        "nomor_npwp" => "nullable|string",
        "rekening" => "required|string",
        "nama_bank" => "nullable|string",
        "nomor_rekening" => "nullable|string",
        "nama_rekening" => "nullable|string",

        // PROGRAM & KEGIATAN
        "sasaran_perseorangan" => "nullable|string",
        "sasaran_keluarga" => "nullable|string",
        "sasaran_kelompok" => "nullable|string",
        "sasaran_masyarakat" => "nullable|string",
        "masalah_kemiskinan" => "nullable|string",
        "masalah_ketelantaran" => "nullable|string",
        "masalah_disabilitas" => "nullable|string",
        "masalah_keterpencilan" => "nullable|string",
        "masalah_tunakepribadian" => "nullable|string",
        "masalah_bencana" => "nullable|string",
        "masalah_kekerasan" => "nullable|string",
        "masalah_lainnya" => "nullable|string",
        "rehabilitasi_sosial" => "nullable|string",
        "pemberdayaan_sosial" => "nullable|string",
        "perlindungan_sosial" => "nullable|string",
        "jaminan_sosial" => "nullable|string",
        "pelayanan_pendidikan" => "nullable|string",
        "detail_pelayanan_pendidikan" => "nullable|string",
        "pelayanan_kesehatan" => "nullable|string",
        "detail_pelayanan_kesehatan" => "nullable|string",
        "pelayanan_keagamaan" => "nullable|string",
        "detail_pelayanan_keagamaan" => "nullable|string",
        "layanan_lainnya" => "nullable|string",
        "dalam_lembaga" => "nullable|string",
        "luar_lembaga" => "nullable|string",
        "sistem_lainnya" => "nullable|string",
        "lokasi_pelayanan" => "nullable|string",
        "detail_lokasi_pelayanan" => "nullable|string",
    ]);

    // ------------------------------
    // Bagi menjadi dua bagian data
    // ------------------------------

    $legalitas= LegalitasLks::updateOrCreate([
        "identitas_lks_id" => $lksId],
        ["anggaran_dasar" => $validated["anggaran_dasar"],
        "anggaran_rt" => $validated["anggaran_rt"],
        "akta_pendirian" => $validated["akta_pendirian"],
        "akta_pendirian_lks_tidak" => $validated["akta_pendirian_lks_tidak"] ?? null,
        "nama_notaris_tidak" => $validated["nama_notaris_tidak"] ?? null,
        "nomor_akta_tidak" => $validated["nomor_akta_tidak"] ?? null,
        "nomor_surat_keterangan_terdaftar" => $validated["nomor_surat_keterangan_terdaftar"] ?? null,
        "akta_pendirian_lks_berbadan" => $validated["akta_pendirian_lks_berbadan"] ?? null,
        "nama_notaris_berbadan" => $validated["nama_notaris_berbadan"] ?? null,
        "nomor_akta_berbadan" => $validated["nomor_akta_berbadan"] ?? null,
        "pengesahan_akta_pendirian" => $validated["pengesahan_akta_pendirian"] ?? null,
        "nomor_pengesahan" => $validated["nomor_pengesahan"] ?? null,
        "lembaran_negara" => $validated["lembaran_negara"] ?? null,
        "nomor_lembaran_negara" => $validated["nomor_lembaran_negara"] ?? null,
        "ket_domisili" => $validated["ket_domisili"],
        "sumber_ket_domisili" => $validated["sumber_ket_domisili"] ?? null,
        "tanda_pendaftaran" => $validated["tanda_pendaftaran"],
        "nama_instansi" => $validated["nama_instansi"] ?? null,
        "nomor_tanda_pendaftaran" => $validated["nomor_tanda_pendaftaran"] ?? null,
        "npwp" => $validated["npwp"],
        "nomor_npwp" => $validated["nomor_npwp"] ?? null,
        "rekening" => $validated["rekening"],
        "nama_bank" => $validated["nama_bank"] ?? null,
        "nomor_rekening" => $validated["nomor_rekening"] ?? null,
        "nama_rekening" => $validated["nama_rekening"] ?? null,
    ]);

    $program = ProgramLks::updateOrCreate( [
        "identitas_lks_id" => $lksId],
        ["sasaran_perseorangan" => $validated["sasaran_perseorangan"] ?? null,
        "sasaran_keluarga" => $validated["sasaran_keluarga"] ?? null,
        "sasaran_kelompok" => $validated["sasaran_kelompok"] ?? null,
        "sasaran_masyarakat" => $validated["sasaran_masyarakat"] ?? null,
        "masalah_kemiskinan" => $validated["masalah_kemiskinan"] ?? null,
        "masalah_ketelantaran" => $validated["masalah_ketelantaran"] ?? null,
        "masalah_disabilitas" => $validated["masalah_disabilitas"] ?? null,
        "masalah_keterpencilan" => $validated["masalah_keterpencilan"] ?? null,
        "masalah_tunakepribadian" => $validated["masalah_tunakepribadian"] ?? null,
        "masalah_bencana" => $validated["masalah_bencana"] ?? null,
        "masalah_kekerasan" => $validated["masalah_kekerasan"] ?? null,
        "masalah_lainnya" => $validated["masalah_lainnya"] ?? null,
        "rehabilitasi_sosial" => $validated["rehabilitasi_sosial"] ?? null,
        "pemberdayaan_sosial" => $validated["pemberdayaan_sosial"] ?? null,
        "perlindungan_sosial" => $validated["perlindungan_sosial"] ?? null,
        "jaminan_sosial" => $validated["jaminan_sosial"] ?? null,
        "pelayanan_pendidikan" => $validated["pelayanan_pendidikan"] ?? null,
        "detail_pelayanan_pendidikan" => $validated["detail_pelayanan_pendidikan"] ?? null,
        "pelayanan_kesehatan" => $validated["pelayanan_kesehatan"] ?? null,
        "detail_pelayanan_kesehatan" => $validated["detail_pelayanan_kesehatan"] ?? null,
        "pelayanan_keagamaan" => $validated["pelayanan_keagamaan"] ?? null,
        "detail_pelayanan_keagamaan" => $validated["detail_pelayanan_keagamaan"] ?? null,
        "layanan_lainnya" => $validated["layanan_lainnya"] ?? null,
        "dalam_lembaga" => $validated["dalam_lembaga"] ?? null,
        "luar_lembaga" => $validated["luar_lembaga"] ?? null,
        "sistem_lainnya" => $validated["sistem_lainnya"] ?? null,
        "lokasi_pelayanan" => $validated["lokasi_pelayanan"] ?? null,
        "detail_lokasi_pelayanan" => $validated["detail_lokasi_pelayanan"] ?? null,
    ]);


    return redirect()->route("form.step3", compact('legalitas'))->with("success");
}


    public function postStep3(Request $request)
    {
        
     public function postStep3(Request $request)
{
    // Ambil ID pengajuan dari cookie
    $pengajuanId = $request->cookie("pengajuan_id");
    $pengajuan = PengajuanLks::with([
        'identitasLks.sumberdaya', 
        'identitasLks.pelayanan',
        'identitasLks.pelayananlain', 
        'identitasLks.usahapenunjang'
    ])->find($pengajuanId);

    // Ambil ID LKS dari session
    $lksId = session("lks_id");

    if (!$lksId || !$pengajuan) {
        return redirect()
            ->route("form.step1")
            ->with("error", "Session atau data pengajuan tidak ditemukan. Silakan ulangi pendaftaran.");
    }

    // ✅ Validasi otomatis redirect back jika gagal
    $validated = $request->validate([
        'prasarana_bangunan_kantor' => 'required|string',
        'status_bangunan_kantor' => 'required|string',
        'status_bangunan_kantor_lain' => 'required_if:status_bangunan_kantor,Lainnya|string|nullable',
        'papan_nama' => 'required|string',
        'papan_data' => 'nullable|string',
        'perlengkapan_kantor' => 'required|string',
        'ruang_konseling' => 'required|string',
        'ruang_diagnosa' => 'required|string',
        'ruang_teknis_lainnya' => 'required|string',
        'ruang_makan' => 'required|string',
        'ruang_kesehatan' => 'required|string',
        'ruang_umum_lainnya' => 'required|string',
        'peralatan_komunikasi' => 'required|string',
        'instalasi_listrik' => 'required|string',
        'sarana_penunjang_lainnya' => 'required|string',
        'mobil' => 'required|string',
        'motor' => 'required|string',
        'transportasi_lainnya' => 'nullable|string',

        'pelayanan' => 'required|array|min:1',
        'pelayanan.*.kategori' => 'required|string',
        'pelayanan.*.bentuk' => 'required|string',
        'pelayanan.*.jumlah' => 'required|numeric|min:0',

        'pelayanan_lain' => 'nullable|array',
        'pelayanan_lain.*.jenis' => 'required_with:pelayanan_lain|string',
        'pelayanan_lain.*.jumlah' => 'required_with:pelayanan_lain|numeric|min:0',

        'usaha_penunjang' => 'nullable|array',
        'usaha_penunjang.*.jenis_usaha' => 'required_with:usaha_penunjang|string',
    ]);

    DB::transaction(function () use ($validated, $lksId) {
        // Hapus data lama
        PelayananLks::where('identitas_lks_id', $lksId)->delete();
        PelayananLainLks::where('identitas_lks_id', $lksId)->delete();
        UsahaPenunjangLks::where('identitas_lks_id', $lksId)->delete();

        // Simpan Sumber Daya
        SumberDayaLks::updateOrCreate(
            ["identitas_lks_id" => $lksId],
            collect($validated)->only([
                'prasarana_bangunan_kantor',
                'status_bangunan_kantor',
                'status_bangunan_kantor_lain',
                'papan_nama',
                'papan_data',
                'perlengkapan_kantor',
                'ruang_konseling',
                'ruang_diagnosa',
                'ruang_teknis_lainnya',
                'ruang_makan',
                'ruang_kesehatan',
                'ruang_umum_lainnya',
                'peralatan_komunikasi',
                'instalasi_listrik',
                'sarana_penunjang_lainnya',
                'mobil',
                'motor',
                'transportasi_lainnya'
            ])->toArray()
        );

        // Simpan Pelayanan
        foreach ($validated['pelayanan'] as $item) {
            PelayananLks::create([
                "identitas_lks_id" => $lksId,
                "kategori_pelayanan" => $item["kategori"],
                "bentuk_pelayanan" => $item["bentuk"],
                "jumlah_binaan" => $item["jumlah"],
            ]);
        }

        // Simpan Pelayanan Lain
        if (!empty($validated['pelayanan_lain'])) {
            foreach ($validated['pelayanan_lain'] as $item) {
                PelayananLainLks::create([
                    "identitas_lks_id" => $lksId,
                    "jenis_pelayanan" => $item["jenis"],
                    "jumlah_binaan" => $item["jumlah"],
                ]);
            }
        }

        // Simpan Usaha Penunjang
        if (!empty($validated['usaha_penunjang'])) {
            foreach ($validated['usaha_penunjang'] as $item) {
                UsahaPenunjangLks::create([
                    "identitas_lks_id" => $lksId,
                    "jenis_usaha" => $item["jenis_usaha"],
                ]);
            }
        }
    });

    return redirect()->route("form.step4")->with("success", "Data berhasil disimpan!");
}

public function postStep4(Request $request)
{
    // Ambil ID pengajuan dari cookie
    $pengajuanId = $request->cookie("pengajuan_id");
    $pengajuan = PengajuanLks::find($pengajuanId);
    $lksId = session('lks_id');
    $kodeUnik = session('kode_unik'); 

    // Jika pengajuan tidak ditemukan, redirect ke step1
    if (!$pengajuan) {
        return redirect()
            ->route("form.step1")
            ->with("error", "Data pengajuan tidak ditemukan. Silakan ulangi pendaftaran.");
    }
        // Simpan Sumber Daya Manusia
        SumberDayaManusiaLks::create([
            "identitas_lks_id" => $lksId,
            "jumlah_pembina" => $request->jumlah_pembina,
            "jumlah_pengurus" => $request->jumlah_pengurus,
            "jumlah_pengawas" => $request->jumlah_pengawas,
            "keterangan_lainnya" => $request->keterangan_lainnya,
            "jumlah_lainnya" => $request->jumlah_lainnya,
            "jumlah_pekerja_sosial" => $request->jumlah_pekerja_sosial,
            "jumlah_teknis_lainnya" => $request->jumlah_teknis_lainnya,
            "jumlah_administrasi" => $request->jumlah_administrasi,
            "jumlah_penunjang" => $request->jumlah_penunjang,
            "keterangan_pelaksana_lainnya" =>$request->keterangan_pelaksana_lainnya,
            "jumlah_pelaksana_lainnya" => $request->jumlah_pelaksana_lainnya,
            "modal_awal" => $request->modal_awal,
            "iuran_anggota" => $request->iuran_anggota,
            "hasil_usaha" => $request->hasil_usaha,
            "donatur" => $request->donatur,
            "dunia_usaha" => $request->dunia_usaha,
            "zakat" => $request->zakat,
            "bantuan_lembaga" => $request->bantuan_lembaga,
            "bantuan_usaha" => $request->bantuan_usaha,
            "bantuan_pemerintah" => $request->bantuan_pemerintah,
        ]);

        // Simpan sumber dana lain (multiple input)
        if ($request->has("sumber_dana_lain")) {
            foreach ($request->sumber_dana_lain as $item) {
                SumberDanaLainLks::create([
                    "identitas_lks_id" => $lksId,
                    "sumber_dana" => $item["sumber_dana"] ?? "",
                    "asal_dana" => $item["asal_dana"] ?? "",
                ]);
            }
        }

        // Simpan jejaring (multiple input)
        if ($request->has("jejaring")) {
            foreach ($request->jejaring as $j) {
                // Validasi agar hanya input yang memiliki nama lembaga saja yang disimpan
                if (!empty($j["nama_lembaga"])) {
                    JejaringLks::create([
                        "identitas_lks_id" => $lksId,
                        "kategori" => $j["kategori"] ?? "",
                        "asal" => $j["asal"] ?? "",
                        "nama_lembaga" => $j["nama_lembaga"],
                    ]);
                }
            }
        }

  
Session::put("kode_unik", $kodeUnik);

// Hapus session yang sudah tidak diperlukan
Session::forget("lks_id"); // Ini boleh

// Redirect ke halaman terakhir
return redirect()
    ->route("form.step5")
    ->withCookie(Cookie::forget("pengajuan_id"))
    ->with([
        "success" => "Pendaftaran berhasil disimpan!",
        "kode_unik" => $kodeUnik,
    ]);
    }

    public function formStep5()
{
    // Ambil pesan sukses dan kode unik dari session
    $success = session('success');
    $kodeUnik = session('kode_unik');

    // Jika tidak ada session, arahkan kembali ke awal
    if (!$success || !$kodeUnik) {
        return redirect()->route('form.step1')
            ->with('error', 'Akses halaman ini tidak valid. Silakan isi formulir terlebih dahulu.');
    }

    // Tampilkan halaman terima kasih
    return view('form-step5', compact('success', 'kodeUnik'));
}

    private function getPengajuanFromCookie(Request $request)
    {
        $pengajuanId = $request->cookie("pengajuan_id");
        return PengajuanLks::find($pengajuanId);
    }

    private function redirectToStep1()
    {
        return redirect()
            ->route("form.step1")
            ->with("error", "Session pendaftaran tidak ditemukan.");
    }

    public function editStep1(Request $request)
    {
        $tipe = $request->query("tipe"); // tetap ambil dari query string
        return view("form-step1", compact("tipe"));
    }

    public function editStep2(Request $request)
    {
        $pengajuan = $this->getPengajuanFromCookie($request);
        if (!$pengajuan) {
            return $this->redirectToStep1();
        }

        return view("form-step2", compact("pengajuan"));
    }

    public function editStep3(Request $request)
    {
        $pengajuan = $this->getPengajuanFromCookie($request);
        if (!$pengajuan) {
            return $this->redirectToStep1();
        }

        return view("form-step3", compact("pengajuan"));
    }

    public function editStep4(Request $request)
    {
        $pengajuan = $this->getPengajuanFromCookie($request);
        if (!$pengajuan) {
            return $this->redirectToStep1();
        }

        return view("form-step4", compact("pengajuan"));
    }

public function editStep5()
{
    $kodeUnik = session("kode_unik");

    if (!$kodeUnik) {
        return redirect()
            ->route("form.step1")
            ->with("error", "Data tidak ditemukan atau sudah kadaluarsa. Silakan mulai ulang.");
    }

    // ✅ Setelah dipakai, baru hapus session
    Session::forget("lks_id");
    Session::forget("kode_unik");

    return view("form-step5", compact("kodeUnik"));
}

    public function cekstatuspage()
    {
        return view("cek-status");
    }
}
