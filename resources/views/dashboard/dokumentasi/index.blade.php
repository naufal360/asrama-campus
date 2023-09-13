@extends('dashboard.layouts.main')

@section('container')

@if (session()->has('success'))
<div id="alert-1" class="flex items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
    </svg>
    <span class="sr-only">Info</span>
    <div class="ml-3 text-sm font-medium">
        {{ session('success') }}
    </div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-1" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
    </button>
</div>
@endif

<div id="accordion-open" class="mb-8" data-accordion="open">
    <h2 id="accordion-open-heading-1">
        <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 hover:text-blue-700 border border-b-0 border-gray-200 rounded-t-xl focus:ring-2 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-open-body-1" aria-expanded="true" aria-controls="accordion-open-body-1">
            <span class="flex items-center">Kegiatan Mahasiswa Asrama</span>
            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
            </svg>
        </button>
    </h2>
    <div id="accordion-open-body-1" class="hidden" aria-labelledby="accordion-open-heading-1">

        @can('admin')
        @include('dashboard.dokumentasi.create')
        @endcan

        <div class="grid grid-cols-2 md:grid-cols-3 gap-5">

            @foreach ($dokumentasis as $dokumentasi)

            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="{{ route('dokumentasi.show', $dokumentasi->id) }}">
                    <img class="w-full max-h-44 object-cover rounded-t-lg" src="/storage/{{ $dokumentasi->foto }}" alt="{{ $dokumentasi->nama_asrama }}" />
                </a>
                <div class="p-5">
                    <a href="{{ route('dokumentasi.show', $dokumentasi->id) }}">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $dokumentasi->nama_asrama }}</h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ Str::limit($dokumentasi->deskripsi, 100, "...") }}</p>
                        <p class="mb-3 font-semibold text-gray-700 dark:text-gray-400">{{ $dokumentasi->created_at->format('d M y') }}</p>
                    </a>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</div>

@endsection
