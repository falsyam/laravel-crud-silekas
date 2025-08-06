<?php

namespace App\Http\Controllers;
use App\Models\IdentitasLks;
use Illuminate\Http\Request;
use App\Models\PengajuanLks;
use App\Http\Controllers\Controller;

class StatusController extends Controller
{
    public function proses(Request $request)
    {
        $request->validate([
            'telepon_pengisi' => 'required',
            'kode' => 'required',
        ]);

       $pengajuan = PengajuanLks::whereHas('identitasLks', function ($query) use ($request) {
    $query->where('telepon_pengisi', $request->telepon_pengisi);
})->where('kode_unik', $request->kode)->first();

        if ($pengajuan) {
            return view('hasil', compact('pengajuan'));
        }

        return back()->withErrors(['message' => 'Data tidak ditemukan.']);
    }
    public function userProses(Request $request)
    {
        $request->validate([
            'telepon_pengisi' => 'required',
            'kode' => 'required',
        ]);

       $pengajuan = PengajuanLks::whereHas('identitasLks', function ($query) use ($request) {
    $query->where('telepon_pengisi', $request->telepon_pengisi);
})->where('kode_unik', $request->kode)->first();

        if ($pengajuan) {
            return view('cek-status-step1', compact('pengajuan'));
        }

        return back()->withErrors(['message' => 'Data tidak ditemukan.']);
    }
}