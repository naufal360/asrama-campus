@extends('layouts.main')

@section('container')

<div class="flex justify-center items-center v-screen pl-3 pr-4 mt-3">
<div class="max-w-screen-xl bg-blue-500 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 pl-6">
    <div class="p-20 flex items-center">
    <div>
        <a href="#">
        <h5 class="mb-7 text-3xl font-bold tracking-tight text-gray-100 dark:text-white">Selamat Datang di Website Asrama</h5>
        </a>
        <p class="mb-3 p-2 font-normal text-gray-100 dark:text-gray-400">Asrama Universitas merupakan tempat tinggal khusus yang disediakan oleh pihak Universitas untuk mahasiswa yang mendapatkan Beasiswa Undangan (BU) / Tipe A.</p>
    </div>
    <a href="#">
        <img class="rounded-t-lg ml-4 w-100 h-100" src="/assets/home.png" alt="">
    </a>
    </div>
</div>
</div>

<div class="flex justify-center items-center v-screen pl-7 pr-10 mt-5 mb-7">
<div class="mx-auto bg-white shadow dark:bg-gray-800 dark:border-gray-700">
    <div class="mb-4">
    <h2 class="text-2xl font-bold text-blue-700 dark:text-white p-8">Manfaat yang Didapat Jika Tinggal di Asrama</h2>
    </div>
    <div class="text-blue-500 dark:text-gray-400 m-3 ml-5">
        <li class="mb-3">Sebagai tempat tinggal mahasiswa.</li>
        <li class="mb-3">Sebagai tempat pembelajaran mahasiswa dalam bidang intelektual, spiritual serta kekeluargaan.</li>
        <li class="mb-3">Sebagai tempat untuk melatih cara bersosialisasi dan kedisiplinan.</li>
    </div>
</div>
</div>

{{-- memanggil chart --}}
@include('partials.charts')

<!-- Carousel wrapper -->
<div class="m-auto max-w-screen-xl w-1/2 bg-white-500 border-0 my-8 rounded-lg mb-8">
    <div id="default-carousel" class="relative w-full" data-carousel="slide">

        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
            @foreach ($dokumentasis as $dokumentasi)
            <!-- Item 1 -->
            <a href="{{ route('dokumentasi.show', $dokumentasi->id) }}">
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="/storage/{{ $dokumentasi->foto }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="{{ $dokumentasi->nama_asrama }}">
                    <div class="absolute bottom-12 left-1/2 transform -translate-x-1/2 bg-opacity-70 bg-black text-white px-2 py-1 rounded">
                        <h5 class="mb-2 text-center text-2xl font-bold tracking-tight text-white-900 dark:text-white">{{ $dokumentasi->nama_asrama }}</h5>
                        <p class="mb-3 font-normal text-white-700 dark:text-white-400">{{ Str::limit($dokumentasi->deskripsi, 100, '...') }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
            @foreach ($dokumentasis as $dokumentasi)

                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="{{ $dokumentasi->nama_asrama }}" data-carousel-slide-to="{{ $loop->iteration }}"></button>

            @endforeach
        </div>

        <!-- Slider controls -->
        <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>


    </div>

</div>



@endsection
