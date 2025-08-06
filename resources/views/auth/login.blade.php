@extends('layouts.app')

@section('title', 'Login')

@section('content')

@if(session('success'))
  <div class="mb-4 flex items-center gap-2 rounded-lg bg-green-100 border border-green-400 text-green-700 px-4 py-3 text-sm shadow" role="alert">
    <svg class="w-5 h-5 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
    </svg>
    <span>{{ session('success') }}</span>
  </div>
@endif

<div class="flex min-h-full">
  <div class="flex flex-1 flex-col justify-center px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
    <div class="mx-auto w-full max-w-sm lg:w-96">
      <div>
        <img class="h-10 w-auto" src="{{ asset('img/logo-silekas.png') }}" alt="Your Company">
        <h2 class="mt-8 text-2xl/9 font-bold tracking-tight text-gray-900">Sign in to your account</h2>

@if ($errors->any())
    <div class="mt-4 rounded-md bg-red-50 p-4">
        <div class="text-sm text-red-700">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    </div>
@endif
        <p class="mt-2 text-sm/6 text-gray-500">
          Silakan masukkan username dan password untuk login
        </p>
      </div>

      <div class="mt-10">
        <div>
          <form action="{{ route('login.process') }}" method="POST" class="space-y-6">
            @csrf
<div>
  <label for="email" class="block text-sm leading-6 font-medium text-gray-900">Username</label>
  <div class="mt-2">
    <input type="email" name="email" id="email" autocomplete="email" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600">
  </div>
</div>

<div class="mt-4">
  <label for="password" class="block text-sm leading-6 font-medium text-gray-900">Password</label>
  <div class="mt-2">
    <input type="password" name="password" id="password" autocomplete="current-password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600">
  </div>
</div>

<div class="flex items-center justify-between">
              <div class="flex gap-3">
                <div class="flex h-6 shrink-0 items-center">
                </div>
              </div>

            </div>


            <div>
              <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white">Sign in</button>
            </div>
          </form>
        </div>
      </div>
    </div>
           <div class="mt-6 text-center text-sm text-gray-600">
    Belum memiliki akun?
    <a href="{{ route('register') }}" class="font-semibold text-indigo-600 hover:text-indigo-500">Daftar di sini</a>
</div>   
  </div>

  <div class="relative hidden w-0 flex-1 lg:block">
    <img class="absolute inset-0 size-full object-cover" src="https://images.unsplash.com/photo-1496917756835-20cb06e75b4e?auto=format&fit=crop&w=1908&q=80" alt="">
  </div>
</div>
@endsection
