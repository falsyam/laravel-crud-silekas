@extends('layouts.new')

@section('title', 'Daftar Surat Terbit')

@section('content')
<main class="py-10">
      <div class="px-4 sm:px-6 lg:px-8">
<div class="min-w-0 flex-1">
    <h2 class="text-2xl/7 font-bold text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Daftar Surat Terbit</h2>
  </div>
</div>
<div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow-sm">


  <div class="px-4 py-5 sm:p-6">
    <div class="bg-white">
  <!--
    Mobile filter dialog

    Off-canvas filters for mobile, show/hide based on off-canvas filters state.
  -->
  <div class="relative z-40 sm:hidden" role="dialog" aria-modal="true">
    <!--
      Off-canvas menu backdrop, show/hide based on off-canvas menu state.

      Entering: "transition-opacity ease-linear duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "transition-opacity ease-linear duration-300"
        From: "opacity-100"
        To: "opacity-0"
    -->
    <div class="fixed inset-0 bg-black/25" aria-hidden="true"></div>

    <div class="fixed inset-0 z-40 flex">
      <!--
        Off-canvas menu, show/hide based on off-canvas menu state.

        Entering: "transition ease-in-out duration-300 transform"
          From: "translate-x-full"
          To: "translate-x-0"
        Leaving: "transition ease-in-out duration-300 transform"
          From: "translate-x-0"
          To: "translate-x-full"
      -->
      <div class="relative ml-auto flex size-full max-w-xs flex-col overflow-y-auto bg-white py-4 pb-12 shadow-xl">
        <div class="flex items-center justify-between px-4">
          <h2 class="text-lg font-medium text-gray-900">Filters</h2>
          <button type="button" class="-mr-2 flex size-10 items-center justify-center rounded-md bg-white p-2 text-gray-400">
            <span class="sr-only">Close menu</span>
            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <!-- Filters -->
        <form class="mt-4">
          <div class="border-t border-gray-200 px-4 py-6">
            <h3 class="-mx-2 -my-3 flow-root">
              <!-- Expand/collapse section button -->
              <button type="button" class="flex w-full items-center justify-between bg-white px-2 py-3 text-sm text-gray-400" aria-controls="filter-section-0" aria-expanded="false">
                <span class="font-medium text-gray-900">Category</span>
                <span class="ml-6 flex items-center">
                  <!--
                    Expand/collapse icon, toggle classes based on section open state.

                    Open: "-rotate-180", Closed: "rotate-0"
                  -->
                  <svg class="size-5 rotate-0 transform" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                    <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                  </svg>
                </span>
              </button>
            </h3>
            <!-- Filter section, show/hide based on section state. -->
            <div class="pt-6" id="filter-section-0">
              <div class="space-y-6">
                <div class="flex gap-3">
                  <div class="flex h-5 shrink-0 items-center">
                    <div class="group grid size-4 grid-cols-1">
                      <input id="filter-mobile-category-0" name="category[]" value="new-arrivals" type="checkbox" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                      <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                        <path class="opacity-0 group-has-checked:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path class="opacity-0 group-has-indeterminate:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                      </svg>
                    </div>
                  </div>
                  <label for="filter-mobile-category-0" class="text-sm text-gray-500">All New Arrivals</label>
                </div>
                <div class="flex gap-3">
                  <div class="flex h-5 shrink-0 items-center">
                    <div class="group grid size-4 grid-cols-1">
                      <input id="filter-mobile-category-1" name="category[]" value="tees" type="checkbox" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                      <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                        <path class="opacity-0 group-has-checked:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path class="opacity-0 group-has-indeterminate:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                      </svg>
                    </div>
                  </div>
                  <label for="filter-mobile-category-1" class="text-sm text-gray-500">Tees</label>
                </div>
                <div class="flex gap-3">
                  <div class="flex h-5 shrink-0 items-center">
                    <div class="group grid size-4 grid-cols-1">
                      <input id="filter-mobile-category-2" name="category[]" value="objects" type="checkbox" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                      <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                        <path class="opacity-0 group-has-checked:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path class="opacity-0 group-has-indeterminate:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                      </svg>
                    </div>
                  </div>
                  <label for="filter-mobile-category-2" class="text-sm text-gray-500">Objects</label>
                </div>
              </div>
            </div>
          </div>
      
          <div class="border-t border-gray-200 px-4 py-6">
            <h3 class="-mx-2 -my-3 flow-root">
              <!-- Expand/collapse section button -->
              <button type="button" class="flex w-full items-center justify-between bg-white px-2 py-3 text-sm text-gray-400" aria-controls="filter-section-2" aria-expanded="false">
                <span class="font-medium text-gray-900">Status</span>
                <span class="ml-6 flex items-center">
                  <!--
                    Expand/collapse icon, toggle classes based on section open state.

                    Open: "-rotate-180", Closed: "rotate-0"
                  -->
                  <svg class="size-5 rotate-0 transform" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                    <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                  </svg>
                </span>
              </button>
            </h3>
            <!-- Filter section, show/hide based on section state. -->
            <div class="pt-6" id="filter-section-2">
              <div class="space-y-6">
                <div class="flex gap-3">
                  <div class="flex h-5 shrink-0 items-center">
                    <div class="group grid size-4 grid-cols-1">
                      <input id="filter-mobile-sizes-0" name="sizes[]" value="s" type="checkbox" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                      <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                        <path class="opacity-0 group-has-checked:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path class="opacity-0 group-has-indeterminate:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                      </svg>
                    </div>
                  </div>
                  <label for="filter-mobile-sizes-0" class="text-sm text-gray-500">Terverifikasi</label>
                </div>
                <div class="flex gap-3">
                  <div class="flex h-5 shrink-0 items-center">
                    <div class="group grid size-4 grid-cols-1">
                      <input id="filter-mobile-sizes-1" name="sizes[]" value="m" type="checkbox" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                      <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                        <path class="opacity-0 group-has-checked:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path class="opacity-0 group-has-indeterminate:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                      </svg>
                    </div>
                  </div>
                  <label for="filter-mobile-sizes-1" class="text-sm text-gray-500">Menunggu</label>
                </div>
                <div class="flex gap-3">
                  <div class="flex h-5 shrink-0 items-center">
                    <div class="group grid size-4 grid-cols-1">
                      <input id="filter-mobile-sizes-2" name="sizes[]" value="l" type="checkbox" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                      <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                        <path class="opacity-0 group-has-checked:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path class="opacity-0 group-has-indeterminate:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                      </svg>
                    </div>
                  </div>
                  <label for="filter-mobile-sizes-2" class="text-sm text-gray-500">Ditolak</label>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Filters -->
  <section aria-labelledby="filter-heading">
    <h2 id="filter-heading" class="sr-only">Filters</h2>

    <div class="border-b border-gray-200 bg-white pb-4">
      <div class="flex items-center justify-between px-4 sm:px-6 lg:px-0 lg:w-full">
        <div class="relative inline-block text-left">
          <div>
            <button type="button" id="menu-button" class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900" aria-expanded="false" aria-haspopup="true">
              Sort
              <svg class="-mr-1 ml-1 size-5 shrink-0 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
              </svg>
            </button>
          </div>


          <div id="sortDropdown" class="absolute left-0 z-10 mt-2 w-40 origin-top-left rounded-md bg-white ring-1 shadow-2xl ring-black/5 focus:outline-hidden hidden" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
            <div class="py-1" role="none">
      
              <a href="?sort=desc" class="block px-4 py-2 text-sm font-medium text-gray-900" role="menuitem" tabindex="-1" id="menu-item-0" data-sort="desc">Pengajuan Terbaru</a>
              <a href="?sort=asc" class="block px-4 py-2 text-sm text-gray-500" role="menuitem" tabindex="-1" id="menu-item-1"data-sort="asc">Pengajuan Terlama</a>
            </div>
          </div>
        </div>

        <!-- Mobile filter dialog toggle, controls the 'mobileFiltersOpen' state. -->
        <form id="filterForm" method="GET" action="{{ route('surat-terbit') }}" class="space-y-4">
        <button type="button" class="inline-block text-sm font-medium text-gray-700 hover:text-gray-900 sm:hidden">Filters</button>



        <div class="hidden sm:block">
          <div class="flow-root">
            <div class="-mx-4 flex items-center divide-x divide-gray-200">
              <div class="relative inline-block px-4 text-left">
                <button type="button" onclick="toggleDropdown('categoryDropdown')" class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900" aria-expanded="false">
                  <span>Jenis</span>
                  <span id="categoryBadge" class="ml-1.5 rounded-sm bg-gray-200 px-1.5 py-0.5 text-xs font-semibold text-gray-700 tabular-nums">0</span>
                  <svg class="-mr-1 ml-1 size-5 shrink-0 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                    <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                  </svg>
                </button>

                <div  id="categoryDropdown" class="absolute right-0 z-10 mt-2 origin-top-right rounded-md bg-white p-4 ring-1 shadow-2xl ring-black/5 focus:outline-hidden hidden">
                  <div class="space-y-4">
                    <div class="flex gap-3">
                      <div class="flex h-5 shrink-0 items-center">
                        <div class="group grid size-4 grid-cols-1">
                          <input id="filter-category-0" name="category[]" value="Pendaftaran LKS" type="checkbox" {{ in_array('Pendaftaran LKS', (array) request('category')) ? 'checked' : '' }} class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                          <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                            <path class="opacity-0 group-has-checked:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path class="opacity-0 group-has-indeterminate:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                          </svg>
                        </div>
                      </div>
                      <label for="filter-category-0" class="pr-6 text-sm font-medium whitespace-nowrap text-gray-900">Pendaftaran LKS</label>
                    </div>
                    <div class="flex gap-3">
                      <div class="flex h-5 shrink-0 items-center">
                        <div class="group grid size-4 grid-cols-1">
                          <input id="filter-category-1" name="category[]" value="Perpanjangan Surat Tanda Daftar" type="checkbox" {{ in_array('Perpanjangan Surat Tanda Daftar', (array) request('category')) ? 'checked' : '' }} class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                          <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                            <path class="opacity-0 group-has-checked:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path class="opacity-0 group-has-indeterminate:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                          </svg>
                        </div>
                      </div>
                      <label for="filter-category-1" class="pr-6 text-sm font-medium whitespace-nowrap text-gray-900">Surat Tanda Daftar</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="relative inline-block px-4 text-left">
                <button type="button" onclick="toggleDropdown('statusDropdown')" class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900" aria-expanded="false">
                  <span>Status</span>
                  <svg class="-mr-1 ml-1 size-5 shrink-0 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                    <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                  </svg>
                </button>

                <div id="statusDropdown" class="absolute right-0 z-10 mt-2 origin-top-right rounded-md bg-white p-4 ring-1 shadow-2xl ring-black/5 focus:outline-hidden hidden">
                  <div class="space-y-4">
                    <div class="flex gap-3">
                      <div class="flex h-5 shrink-0 items-center">
                        <div class="group grid size-4 grid-cols-1">
                          <input id="filter-sizes-0" name="status[]" value="terverifikasi" type="checkbox" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                          <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                            <path class="opacity-0 group-has-checked:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path class="opacity-0 group-has-indeterminate:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                          </svg>
                        </div>
                      </div>
                      <label for="filter-status-0" class="pr-6 text-sm font-medium whitespace-nowrap text-gray-900">Terverifikasi</label>
                    </div>
                    <div class="flex gap-3">
                      <div class="flex h-5 shrink-0 items-center">
                        <div class="group grid size-4 grid-cols-1">
                          <input id="filter-status-1" name="status[]" value="menunggu" type="checkbox" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                          <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                            <path class="opacity-0 group-has-checked:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path class="opacity-0 group-has-indeterminate:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                          </svg>
                        </div>
                      </div>
                      <label for="filter-status-1" class="pr-6 text-sm font-medium whitespace-nowrap text-gray-900">Menunggu</label>
                    </div>
                    <div class="flex gap-3">
                      <div class="flex h-5 shrink-0 items-center">
                        <div class="group grid size-4 grid-cols-1">
                          <input id="filter-sizes-2" name="status[]" value="ditolak" type="checkbox" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                          <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                            <path class="opacity-0 group-has-checked:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path class="opacity-0 group-has-indeterminate:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                          </svg>
                        </div>
                      </div>
                      <label for="filter-status-2" class="pr-6 text-sm font-medium whitespace-nowrap text-gray-900">Ditolak</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="mt-4 px-4">
  <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">
    Terapkan Filter
  </button>
</div>
      </form>
      </div>
    </div>

    <!-- Active filters -->
    <div class="bg-gray-100">
      <div class="w-full px-4 py-3 sm:flex sm:items-center sm:px-6 lg:px-8">
        <h3 class="text-sm font-medium text-gray-500">
          Filters
          <span class="sr-only">, active</span>
        </h3>

        <div aria-hidden="true" class="hidden h-5 w-px bg-gray-300 sm:ml-4 sm:block"></div>

        <div class="mt-2 sm:mt-0 sm:ml-4">
          <div id="activeFilters" class="-m-1 flex flex-wrap items-center">
            <span class="m-1 inline-flex items-center rounded-full border border-gray-200 bg-white py-1.5 pr-2 pl-3 text-sm font-medium text-gray-900">
              <span>${labelText}</span>
              <button type="button" class="ml-1 inline-flex size-4 shrink-0 rounded-full p-1 text-gray-400 hover:bg-gray-200 hover:text-gray-500">
                <span class="sr-only">Remove filter for Objects</span>
                <svg class="size-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                  <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7" />
                </svg>
              </button>
            </span>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

    <div class="mt-8 flow-root">
    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
        <table class="min-w-full divide-y divide-gray-300" id="resultTable">
          <thead>
            <tr>
              <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Nomor Surat</th>
              <th scope="col" class="py-3.5 pr-3 pl-4 text-left text-sm font-semibold text-gray-900 sm:pl-0">Nama LKS</th>
              <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Tanggal Penerbitan</th>
              <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Masa Berlaku</th>
              <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
              <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Action</th>
              <th scope="col" class="relative py-3.5 pr-4 pl-3 sm:pr-0">
                <span class="sr-only">Lihat Detail</span>
              </th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200 bg-white">
            @foreach ($dataPengajuan as $pengajuan)
            <tr>
              <td class="py-5 pr-3 pl-4 text-sm whitespace-nowrap sm:pl-0">
                <div class="flex items-center">
                  <div class="ml-4">
                    <div class="font-medium text-gray-900">{{ $pengajuan->surat->nomor_surat ?? '-' }}</div>
                    <div class="mt-1 text-gray-500">{{ $pengajuan->tipe_pengajuan ?? '' }}</div>
                  </div>
                </div>
              </td>
              <td class="px-3 py-5 text-sm whitespace-nowrap text-gray-500">
                <div class="text-gray-900">{{ $pengajuan->identitasLks->dataUmum->nama_lks ?? '-' }}</div>
                <div class="mt-1 text-gray-500">{{ $pengajuan->identitasLks->dataUmum->kecamatan ?? '' }},{{ $pengajuan->identitasLks->dataUmum->kota ?? '' }}</div>
              </td>
              <td class="px-3 py-5 text-sm whitespace-nowrap text-gray-500">
                  {{ optional($pengajuan->surat)->tanggal_penerbitan ? \Carbon\Carbon::parse($pengajuan->surat->tanggal_penerbitan)->translatedFormat('d F Y') : '-' }}
              </td>
              <td class="px-3 py-5 text-sm whitespace-nowrap text-gray-500">
                  {{ optional($pengajuan->surat)->tanggal_penerbitan ? \Carbon\Carbon::parse($pengajuan->surat->masa_berlaku)->translatedFormat('d F Y') : '-' }}
              </td>
              @php
  $status = strtolower($pengajuan->status);
  $class = match ($status) {
      'terverifikasi' => 'inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-green-600/20 ring-inset',
      'menunggu'      => 'inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-700 ring-1 ring-yellow-600/20 ring-inset',
      'ditolak'       => 'inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-red-600/20 ring-inset',
      default         => 'inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-700 ring-1 ring-gray-600/20 ring-inset',
  };
@endphp
              <td class="px-3 py-5 text-sm whitespace-nowrap text-gray-500"> <span class="{{ $class }}">
        {{ ucfirst($pengajuan->status) }}
      </span></td>
              <td class="relative py-5 pr-4 pl-3 text-sm font-medium whitespace-nowrap sm:pr-0">
  <div class="flex flex-col space-y-2 text-left">
    {{-- Tombol Lihat Detail --}}
    <a href="{{ route('verifikasi.detail', $pengajuan->id) }}"
       class="inline-flex items-center text-indigo-600 hover:text-indigo-900">
      🔍 <span class="ml-1">Lihat Detail</span>
    </a>

<a href="{{ route('surat.preview', $pengajuan->id) }}" target="_blank" class="inline-flex items-center text-indigo-600 hover:text-indigo-900">
  👁️ <span class="ml-1">Preview Surat</span>
</a>

    {{-- Tombol Download Surat jika tersedia --}}
    @if ($pengajuan->surat)
    <a href="{{ route('surat.download', $pengajuan->id) }}"
       class="inline-flex items-center text-green-600 hover:text-green-800">
      📥 <span class="ml-1">Download Surat</span>
    </a>
    @endif
  </div>
</td>
            </tr>
           
@endforeach
@forelse($dataPengajuan as $pengajuan)
  <!-- tampilkan data -->
@empty
  <tr>
    <td colspan="3" class="text-center text-gray-500 py-4">Tidak ada pengajuan ditemukan.</td>
  </tr>
@endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
    <!-- Content goes here -->
</div>  

    
  </div>
</div>
<script>
  function toggleDropdown(id) {
    const dropdown = document.getElementById(id);
    
    // Tutup semua dropdown lain
    document.querySelectorAll('[id$="Dropdown"]').forEach(el => {
      if (el.id !== id) el.classList.add('hidden');
    });

    // Toggle dropdown yang diklik
    dropdown.classList.toggle('hidden');
  }

  // Opsional: klik di luar = tutup semua
  window.addEventListener('click', function (e) {
    const isDropdownButton = e.target.closest('[onclick^="toggleDropdown"]');
    const isDropdownContent = e.target.closest('[id$="Dropdown"]');
    
    if (!isDropdownButton && !isDropdownContent) {
      document.querySelectorAll('[id$="Dropdown"]').forEach(el => el.classList.add('hidden'));
    }
  });

    function updateCategoryBadgeAndFilters() {
  const checkboxes = document.querySelectorAll('#categoryDropdown input[type="checkbox"]');
  const badge = document.getElementById('categoryBadge');
  const activeFilters = document.getElementById('activeFilters');

  const checked = [...checkboxes].filter(cb => cb.checked);
  badge.textContent = checked.length;
  badge.style.display = checked.length > 0 ? 'inline-block' : 'none';

  // Clear existing chips
  activeFilters.innerHTML = '';

  // Generate chip for each checked item
  checked.forEach(cb => {
    // Ambil label berdasarkan atribut 'for'
    const label = document.querySelector(`label[for="${cb.id}"]`);
    const labelText = label ? label.innerText : cb.value;

    const span = document.createElement('span');
    span.className = "m-1 inline-flex items-center rounded-full border border-gray-200 bg-white py-1.5 pr-2 pl-3 text-sm font-medium text-gray-900";

    span.innerHTML = `
      <span>${labelText}</span>
      <button type="button" class="ml-1 inline-flex size-4 shrink-0 rounded-full p-1 text-gray-400 hover:bg-gray-200 hover:text-gray-500" onclick="removeFilter('${cb.id}')">
        <span class="sr-only">Remove filter for ${cb.value}</span>
        <svg class="size-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
          <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7" />
        </svg>
      </button>
    `;

    activeFilters.appendChild(span);
  });
}

  function removeFilter(id) {
    const cb = document.getElementById(id);
    if (cb) {
      cb.checked = false;
      updateCategoryBadgeAndFilters();
    }
  }

  document.addEventListener('DOMContentLoaded', () => {
    const checkboxes = document.querySelectorAll('#categoryDropdown input[type="checkbox"]');
    checkboxes.forEach(cb => {
      cb.addEventListener('change', updateCategoryBadgeAndFilters);
    });
    updateCategoryBadgeAndFilters(); // init
  });
   document.addEventListener('DOMContentLoaded', function () {
    const button = document.getElementById('menu-button');
    const dropdown = document.getElementById('sortDropdown');

    button.addEventListener('click', function (e) {
      e.stopPropagation(); // biar nggak langsung tertutup
      dropdown.classList.toggle('hidden');
    });

    document.addEventListener('click', function (e) {
      if (!dropdown.classList.contains('hidden')) {
        dropdown.classList.add('hidden');
      }
    });

    dropdown.addEventListener('click', function (e) {
      e.stopPropagation(); // agar klik di dalam dropdown tidak menutup dropdown
    });
  });

  $('#searchInput').on('keyup', function () {
    const query = $(this).val();
  });

    document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);
    const sortParam = urlParams.get('sort') || 'desc'; // default terbaru

    document.querySelectorAll('.sort-link').forEach(link => {
      if (link.dataset.sort === sortParam) {
        link.classList.add('bg-gray-100', 'font-medium', 'text-gray-900');
      } else {
        link.classList.remove('bg-gray-100', 'font-medium', 'text-gray-900');
        link.classList.add('text-gray-500');
      }
    });
  });

document.querySelectorAll('#filterForm input, #filterForm select').forEach((el) => {
    el.addEventListener('change', () => {
        document.getElementById('filterForm').submit();
    });
});;

  
</script>
@endsection