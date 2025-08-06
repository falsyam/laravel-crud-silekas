<?php

namespace App\Http\Controllers;

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
use App\Models\Surat;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

Carbon::setLocale('id');



class AdminController extends Controller
{
    public function dashboard()
    {
        $totalPengajuan = PengajuanLks::count();
        $pengajuanMenunggu = PengajuanLks::where('status', 'menunggu')->count();
        $pengajuanTerverifikasi= PengajuanLks::where('status', 'terverifikasi')->count();
        $pengajuanDitolak = PengajuanLks::where('status', 'ditolak')->count();
        $dataPengajuan = PengajuanLks::with(['identitasLks.dataUmum'])->latest()->get();

        return view('admin', compact('totalPengajuan', 'pengajuanMenunggu','pengajuanTerverifikasi','pengajuanDitolak','dataPengajuan'));
    }

public function daftarpengajuan(Request $request)
{
    $query = PengajuanLks::with(['identitasLks.dataUmum'])

        // 🔍 Search
        ->when($request->search, function ($q) use ($request) {
            $search = $request->search;
            $q->where(function ($q) use ($search) {
                $q->whereHas('identitasLks.dataUmum', function ($sub) use ($search) {
                    $sub->where('nama_lks', 'like', '%' . $search . '%')
                        ->orWhere('kecamatan', 'like', '%' . $search . '%');
                })
                ->orWhere('status', 'like', '%' . $search . '%')
                ->orWhere('tipe_pengajuan', 'like', '%' . $search . '%');
            });
        })

        // 🗂️ Filter kategori (tipe_pengajuan)
        ->when($request->has('category'), function ($q) use ($request) {
            $category = is_array($request->category) ? $request->category : [$request->category];
            $q->whereIn('tipe_pengajuan', $category);
        })

        // Filter status
        ->when($request->has('status'), function ($q) use ($request) {
            $status = is_array($request->status) ? $request->status : [$request->status];
            $q->whereIn('status', $status);
        });

    // 🔽 Sorting
    $sort = $request->get('sort', 'desc'); // default: terbaru
    $dataPengajuan = $query->orderBy('created_at', $sort)->get();

    return view('daftar-pengajuan', compact('dataPengajuan'));
}

    public function verifikasi()
{
    $dataPengajuan = PengajuanLks::where('status', 'menunggu')
    ->with(['identitasLks.dataUmum'])
    ->get();

    return view('verifikasi', compact('dataPengajuan'));
}








public function verifikasiStep1($id)
{
    $pengajuan = PengajuanLks::with(['identitasLks.dataUmum', 'surat'])->findOrFail($id);

    // Tidak perlu tambah fileName di sini, cukup ambil dari session di blade
    return view('verifikasi-step1', compact('pengajuan'));
}








public function verifikasiDetail($id)
{
    $pengajuan = PengajuanLks::with(['identitasLks.dataUmum', 'surat'])->findOrFail($id);
    return view('verifikasi-step1', compact('pengajuan'));
}









public function prosesVerifikasi($id, Request $request)
{
    DB::beginTransaction();

    try {
        $pengajuan = PengajuanLks::with([
            'identitasLks.dataUmum',
            'identitasLks.pengurus',
            'identitasLks.pendirian',
            'identitasLks.legalitas',
            'identitasLks.jatiDiri',
            'identitasLks.pelayanan',
            'surat'
    ])->findOrFail($id);

        if ($pengajuan->surat) {
            return back()->with('error', 'Surat sudah pernah diterbitkan.');
        }

        // Update status pengajuan
        $pengajuan->status = 'terverifikasi';
        $pengajuan->save();
        

        // Buat surat baru
        $nomorSurat = $request->input('nomor_surat');
        $request->validate([
        'nomor_surat' => 'required|string|max:255',
            ]);
        

        $surat = Surat::create([
            'pengajuan_lks_id' => $pengajuan->id,
            'nomor_surat' => $nomorSurat,
            'tanggal_penerbitan' => now()->toDateString(),
            'bulan_penerbitan' => now()->format('F'),
            'tahun_penerbitan' => now()->year,
            'masa_berlaku' => now()->addYears(3)->toDateString(),
        ]);

        $tanggal = Carbon::parse($surat->tanggal_penerbitan)->translatedFormat('d F Y');
        $bulan = Carbon::parse($surat->tanggal_penerbitan)->translatedFormat('F');
        $masa = Carbon::parse($surat->masa_berlaku)->translatedFormat('d F Y');



        $dataUmum = $pengajuan->identitasLks->dataUmum;
        $pengurus = $pengajuan->identitasLks->pengurus;
        $pendirian = $pengajuan->identitasLks->pendirian;
        $legalitas = $pengajuan->identitasLks->legalitas;
        $jatiDiri = $pengajuan->identitasLks->jatiDiri;
        $pelayanan = $pengajuan->identitasLks->pelayanan;
        $pelayananLain = $pengajuan->identitasLks->pelayananLain;

        $data = [
            'nama_lks' => $dataUmum->nama_lks,
            'alamat_lks' => $dataUmum->alamat_lks,
            'status_lks' => $jatiDiri->status_lks ?? '-',
            'nomor_surat' => $surat->nomor_surat,
            'tanggal_penerbitan' => $tanggal,
            'masa_berlaku' => $masa,
            'desa_kelurahan' => $dataUmum->desa_kelurahan,
            'kecamatan' => $dataUmum->kecamatan,
            'kota' => $dataUmum->kota,
            'nama_ketua' => $pengurus->nama_ketua,
            'nama_sekretaris' => $pengurus->nama_sekretaris,
            'nama_bendahara' => $pengurus->nama_bendahara,
            'tempat_didirikan' => $pendirian->tempat_didirikan,
            'tanggal' => $pendirian->tanggal,
            'bulan' => $pendirian->bulan,
            'tahun' => $pendirian->tahun,
            'nomor_akta' => $pendirian->nomor_akta,
            'nomor_npwp' => $legalitas->nomor_npwp,
            'lingkup_kerja' => $dataUmum->lingkup_kerja,
            'jenis_pelayanan' => $pelayanan->pluck('kategori_pelayanan')->implode(', ') ?? '-',
            'sifat_pelayanan' => $jatiDiri->sifat_pelayanan,
            'posisi_lks' => $dataUmum->posisi_lks,
            'bulan_penerbitan' => $bulan,
        ];


        // Generate file PDF dari blade
        $pdf = Pdf::loadView('templatesurat', $data)->setPaper('legal', 'portrait');

        // Simpan ke storage
        $fileName = 'form-lks-' . Str::slug($dataUmum->nama_lks) . '.pdf';
        $savePath = storage_path('app/public/surat/' . $fileName);
        $stored = Storage::put('public/surat/' . $fileName, $pdf->output());

        if (!$stored) {
            throw new \Exception("Gagal menyimpan file surat ke storage Laravel.");
        }

        DB::commit();

        return redirect()->route('verifikasi.detail', $pengajuan->id)
            ->with('success', 'Verifikasi berhasil, silakan unduh surat.')
            ->with('fileName', $fileName);

    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'Gagal memverifikasi: ' . $e->getMessage());
    }
}

public function prosesTolak($id)
{
    $pengajuan = PengajuanLks::findOrFail($id);
    $pengajuan->status = 'ditolak';
    $pengajuan->save();

    return redirect()->back()->with('success', 'Berhasil menolak pengajuan!');
}

public function tolakProses(Request $request, $id)
{
    $request->validate([
        'catatan' => 'required|string|max:1000',
    ]);

    $pengajuan = PengajuanLks::findOrFail($id);
    $pengajuan->status = 'ditolak';
    $pengajuan->catatan = $request->catatan;
    $pengajuan->save();

    return redirect()->back()->with('success', 'Pengajuan telah ditolak.');
}


public function previewSurat($id)
{
    $pengajuan = PengajuanLks::with([
        'identitasLks.dataUmum',
        'identitasLks.pengurus',
        'identitasLks.pendirian',
        'identitasLks.legalitas',
        'identitasLks.jatiDiri',
        'identitasLks.pelayananLain',
        'identitasLks.pelayanan',
        'surat'
    ])->findOrFail($id);

    if (!$pengajuan->surat) {
        return back()->with('error', 'Surat belum diterbitkan untuk pengajuan ini.');
    }

    $dataUmum = $pengajuan->identitasLks->dataUmum;

    $tanggal = \Carbon\Carbon::parse($pengajuan->surat->tanggal_penerbitan)->translatedFormat('d F Y');
    $bulan   = \Carbon\Carbon::parse($pengajuan->surat->tanggal_penerbitan)->translatedFormat('F');
    $masa    = \Carbon\Carbon::parse($pengajuan->surat->masa_berlaku)->translatedFormat('d F Y');

    $data = [
        'nama_lks'         => $dataUmum->nama_lks,
        'alamat_lks'       => $dataUmum->alamat_lks,
        'desa_kelurahan'   => $dataUmum->desa_kelurahan,
        'kecamatan'        => $dataUmum->kecamatan,
        'kota'             => $dataUmum->kota,
        'nama_ketua'       => $pengajuan->identitasLks->pengurus->nama_ketua,
        'nama_sekretaris'  => $pengajuan->identitasLks->pengurus->nama_sekretaris,
        'nama_bendahara'   => $pengajuan->identitasLks->pengurus->nama_bendahara,
        'tempat_didirikan' => $pengajuan->identitasLks->pendirian->tempat_didirikan,
        'tanggal'          => $pengajuan->identitasLks->pendirian->tanggal,
        'bulan'            => $pengajuan->identitasLks->pendirian->bulan,
        'tahun'            => $pengajuan->identitasLks->pendirian->tahun,
        'nomor_akta'       => $pengajuan->identitasLks->pendirian->nomor_akta,
        'nomor_npwp'       => $pengajuan->identitasLks->legalitas->nomor_npwp,
        'status_lks'       => $pengajuan->identitasLks->jatiDiri->status_lks,
        'lingkup_kerja'    => $pengajuan->identitasLks->jatiDiri->lingkup_kerja,
        'jenis_pelayanan'  => $pengajuan->identitasLks->pelayanan->pluck('kategori_pelayanan')->implode(', ') ?? '-',
        'sifat_pelayanan'  => $pengajuan->identitasLks->jatiDiri->sifat_pelayanan,
        'posisi_lks'       => $pengajuan->identitasLks->jatiDiri->posisi_lks,
        'nomor_surat'      => $pengajuan->surat->nomor_surat,
        'tanggal_penerbitan' => $tanggal,
        'bulan_penerbitan'   => $bulan,
        'masa_berlaku'       => $masa,
    ];

    // Kembalikan sebagai inline stream (preview)
    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('templatesurat', $data)->setPaper('legal', 'portrait');

    return $pdf->stream('preview-surat.pdf'); // ← tampilkan di browser
}




public function downloadSurat($id)
{
    $pengajuan = PengajuanLks::with([
        'identitasLks.dataUmum',
        'identitasLks.pengurus',
        'identitasLks.pendirian',
        'identitasLks.legalitas',
        'identitasLks.jatiDiri',
        'identitasLks.pelayananLain',
        'identitasLks.pelayanan',
        'surat'
    ])->findOrFail($id);

    if (!$pengajuan->surat) {
        return back()->with('error', 'Surat belum diterbitkan untuk pengajuan ini.');
    }

    $dataUmum = $pengajuan->identitasLks->dataUmum;

    $fileName = 'form-lks-' . Str::slug($dataUmum->nama_lks) . '.pdf';

    // Format ulang tanggal
    $tanggal = \Carbon\Carbon::parse($pengajuan->surat->tanggal_penerbitan)->translatedFormat('d F Y');
    $bulan   = \Carbon\Carbon::parse($pengajuan->surat->tanggal_penerbitan)->translatedFormat('F');
    $masa    = \Carbon\Carbon::parse($pengajuan->surat->masa_berlaku)->translatedFormat('d F Y');

    // Siapkan data yang dikirim ke view template
    $data = [
        'nama_lks'         => $dataUmum->nama_lks,
        'alamat_lks'       => $dataUmum->alamat_lks,
        'desa_kelurahan'   => $dataUmum->desa_kelurahan,
        'kecamatan'        => $dataUmum->kecamatan,
        'kota'             => $dataUmum->kota,
        'nama_ketua'       => $pengajuan->identitasLks->pengurus->nama_ketua,
        'nama_sekretaris'  => $pengajuan->identitasLks->pengurus->nama_sekretaris,
        'nama_bendahara'   => $pengajuan->identitasLks->pengurus->nama_bendahara,
        'tempat_didirikan' => $pengajuan->identitasLks->pendirian->tempat_didirikan,
        'tanggal'          => $pengajuan->identitasLks->pendirian->tanggal,
        'bulan'            => $pengajuan->identitasLks->pendirian->bulan,
        'tahun'            => $pengajuan->identitasLks->pendirian->tahun,
        'nomor_akta'       => $pengajuan->identitasLks->pendirian->nomor_akta,
        'nomor_npwp'       => $pengajuan->identitasLks->legalitas->nomor_npwp,
        'status_lks'       => $pengajuan->identitasLks->jatiDiri->status_lks,
        'lingkup_kerja'    => $pengajuan->identitasLks->jatiDiri->lingkup_kerja,
        'jenis_pelayanan'  => $pengajuan->identitasLks->pelayanan->pluck('kategori_pelayanan')->implode(', ') ?? '-',
        'sifat_pelayanan'  => $pengajuan->identitasLks->jatiDiri->sifat_pelayanan,
        'posisi_lks'       => $pengajuan->identitasLks->jatiDiri->posisi_lks,
        'nomor_surat'      => $pengajuan->surat->nomor_surat,
        'tanggal_penerbitan' => $tanggal,
        'bulan_penerbitan'   => $bulan,
        'masa_berlaku'       => $masa,
    ];

    // Ganti 'templatesurat' jika nama view-mu berbeda
     $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('templatesurat', $data)->setPaper('legal', 'portrait');
    
    return $pdf->download($fileName);
}



public function suratterbit(Request $request)
{
     $query = PengajuanLks::with(['identitasLks.dataUmum'])
        ->when($request->search, function ($q) use ($request) {
            $search = $request->search;
            $q->where(function ($q) use ($search) {
                $q->whereHas('identitasLks.dataUmum', function ($sub) use ($search) {
                    $sub->where('nama_lks', 'like', '%' . $search . '%')
                        ->orWhere('kecamatan', 'like', '%' . $search . '%'); // ✅ Tambahan filter kecamatan
                })
                ->orWhere('status', 'like', '%' . $search . '%')
                ->orWhere('tipe_pengajuan', 'like', '%' . $search . '%');
            });
        });


        if ($request->has('category')) {
        $query->whereIn('tipe_pengajuan', $request->input('category'));
    }
    
        if ($request->has('status')) {
    $query->whereIn('status', $request->input('status'));
}


        

      $sort = $request->get('sort', 'desc'); // default 'desc'
    $dataPengajuan = PengajuanLks::with(['identitasLks.dataUmum', 'surat'])
        ->where('status', 'terverifikasi') // ✅ hanya status terverifikasi
        ->orderBy('created_at', 'desc')
        ->get();

    return view('surat-terbit', compact('dataPengajuan'));
}

public function login()
{

    return view('login');
}


    public function cekadmin()
    {
        $totalPengajuan = PengajuanLks::count();
        $pengajuanMenunggu = PengajuanLks::where('status', 'menunggu')->count();
        $pengajuanTerverifikasi= PengajuanLks::where('status', 'terverifikasi')->count();
        $pengajuanDitolak = PengajuanLks::where('status', 'ditolak')->count();
        $dataPengajuan = PengajuanLks::with(['identitasLks.dataUmum'])->latest()->get();

        return view('cek-admin', compact('totalPengajuan', 'pengajuanMenunggu','pengajuanTerverifikasi','pengajuanDitolak','dataPengajuan'));
    }



    public function settings()
{
    return view('settings'); // settings.blade.php
}
}



