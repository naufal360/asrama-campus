@extends('dashboard.layouts.main')

@section('container')

<div class="px-4 sm:ml-34">
    <div class="flex flex-col v-screen justify-center p-4">
<div id="accordion-open" data-accordion="open">
    <h2 id="accordion-open-heading-1">
        <button type="button"
        class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 hover:text-blue-700 border border-b-0 border-gray-200 rounded-t-xl focus:ring-2 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
        data-accordion-target="#accordion-open-body-1" aria-expanded="true"
        aria-controls="accordion-open-body-1">
            <span class="flex items-center">{{ $aduan->subjek }}</span>
        </button>
    </h2>

    <div class=" gap-4">
        <!-- Left column for student details -->
        @can('admin')

        <div class="bg-white dark:bg-gray-700 p-2 rounded-lg shadow mb-2">
            <h3 class="text-lg font-semibold text-blue-500 dark:text-white">Nama Mahasiswa</h3>
            <p class="text-sm text-gray-600 dark:text-gray-300">{{ $mahasiswa->nama }}</p>
        </div>
        <div class="bg-white dark:bg-gray-700 p-2 rounded-lg shadow mb-2">
            <h3 class="text-lg font-semibold text-blue-500 dark:text-white">NIM</h3>
            <p class="text-sm text-gray-600 dark:text-gray-300">{{ $aduan->mahasiswa_id }}</p>
        </div>
        <div class="bg-white dark:bg-gray-700 p-2 rounded-lg shadow mb-2">
            <h3 class="text-lg font-semibold text-blue-500 dark:text-white">Jurusan</h3>
            <p class="text-sm text-gray-600 dark:text-gray-300">{{ $mahasiswa->jurusan->nama }}</p>
        </div>

        @endcan

        <div class="bg-white dark:bg-gray-700 p-2 rounded-lg shadow mb-2">
            <h3 class="text-lg font-semibold text-blue-500 dark:text-white">Deskripsi</h3>
            <p class="text-sm text-gray-600 dark:text-gray-300 whitespace-pre-line">{{ $aduan->deskripsi }}</p>
        </div>
        <div class="bg-white dark:bg-gray-700 p-2 rounded-lg shadow mb-2">
            <img src="/storage/{{ $aduan->aduan_foto }}" alt="{{ $aduan->subjek }}" class="w-50 h-30">
        </div>

        @cannot('admin')

            <h3 class="mb-4 text-xl font-medium text-blue-500 dark:text-white">Catatan</h3>
            <textarea id="message" rows="4"
                class="font-semibold cursor-not-allowed opacity-70 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder=""> {{ $aduan->catatan ? $aduan->catatan : '-' }}
            </textarea>


            <div class="mb-4"><span>
                @if ($aduan->status == 'Sudah direspon')
                    Status : </span><span class="text-green-500 font-semibold">{{ $aduan->status }}</span>
                @else
                    Status : </span><span class="text-blue-500 font-semibold">{{ $aduan->status }}</span>
                @endif
            </div>

        @endcannot

        @can('admin')

        <form action="{{ route('aduan.update', $aduan->id) }}" method="POST">
            @csrf
            @method('put')
            <h3 class="mb-4 text-xl font-medium text-blue-500 dark:text-white">Catatan</h3>
            <textarea id="message" rows="4" name="catatan"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Silahkan berikan catatan...."></textarea>

            <div class="flex justify-center p-5">
                <button name="status" value="Sudah direspon"
                    class="px text-blue-500 hover:text-white border border-blue-500 hover:bg-blue-500 focus:ring-2 focus:outline-none focus:ring-blue-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800"
                    type="submit">
                    <span>Submit</span>
                </button>
            </div>
        </form>

        @endcan
    </div>
</div>

@endsection
