@extends('layouts.app')

@section('title', 'Daftar Akun')

@section('content')

<div class="flex items-center justify-center min-h-screen bg-gray-50">
  <form method = "POST" action="{{ route('register') }}" class="w-full max-w-4xl space-y-12 bg-white p-10 rounded-xl shadow-lg">
    @csrf
    @if ($errors->any())
    <div class="rounded-md bg-red-50 p-4 mb-6">
        <ul class="list-disc pl-5 text-sm text-red-600 space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="border-b border-gray-900/10 pb-12">
      <img class="h-10 w-auto" src="{{ asset('img/logo-silekas.png') }}" alt="Your Company">

      <h2 class="mt-4 text-2xl font-bold text-gray-900">Buat Akun Baru</h2>
      <p class="mt-2 text-sm text-gray-600 font-light">Isikan form dibawah untuk membuat akun baru. Pastikan anda menginputkan dengan benar!</p>

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
          <label for="name" class="block text-sm font-medium text-gray-900">Nama</label>
          <input type="text" name="name" id="name" autocomplete="given-name"
            class="mt-2 block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-300 placeholder:text-gray-400 focus:outline-indigo-600 sm:text-sm">
        </div>

        <div class="sm:col-span-4">
          <label for="email" class="block text-sm font-medium text-gray-900">Alamat Email</label>
          <input id="email" name="email" type="email" autocomplete="email"
            class="mt-2 block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-300 placeholder:text-gray-400 focus:outline-indigo-600 sm:text-sm">
        </div>

        <div class="sm:col-span-3">
          <label for="password" class="block text-sm font-medium text-gray-900">Password</label>
          <input type="password" name="password" id="password"
            class="mt-2 block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-300 placeholder:text-gray-400 focus:outline-indigo-600 sm:text-sm">
        </div>

        <div class="sm:col-span-3">
          <label for="password_confirmation" class="block text-sm font-medium text-gray-900">Konfirmasi Password</label>
          <input type="password" name="password_confirmation" id="password_confirmation"
            class="mt-2 block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-300 placeholder:text-gray-400 focus:outline-indigo-600 sm:text-sm">
        </div>
      </div>

      <!-- Tombol Daftar di Tengah -->
      <div class="mt-10 flex justify-center">
        <button type="submit"
          class="rounded-md bg-indigo-600 px-14 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
          Daftar
        </button>
      </div>
    </div>
  </form>
</div>