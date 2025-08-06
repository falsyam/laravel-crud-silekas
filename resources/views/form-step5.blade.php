@extends('layouts.app')

@section('title', 'Silekas - Selesai')

@section('content')
    <div class="finish">
        <a href="/">
            <img src="{{ asset('img/logo-silekas.png') }}" alt="Silekas" />
        </a>

        <div class="wrapper-finish">
            <div class="finish-content">
                <img src="{{ asset('img/checkmark.png') }}" alt="checkmark" class="mx-auto">
                <h1>Terima kasih!</h1>
                <p>Permohonan anda telah berhasil diajukan. Mohon cek status permohonan secara berkala.</p>

                @if($kodeUnik)
                    <div class="mt-6 text-center bg-indigo-50 text-indigo-800 p-4 rounded-lg shadow">
                        <p class="font-semibold">Kode Unik Anda:</p>
                        <p class="text-lg tracking-wide font-mono">{{ $kodeUnik }}</p>
                    </div>
                @endif
            </div>
        </div>

        <div class="home-button">
            <a href="/">Kembali ke Halaman Utama</a>
        </div>
    </div>
@endsection
