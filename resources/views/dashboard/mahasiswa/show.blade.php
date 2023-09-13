@extends('dashboard.layouts.main')

@section('container')
    <div class="flex flex-col items-center v-screen justify-center p-4">
        @if (session()->has('success'))
            <div id="alert-1" class="flex items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium">
                    {{ session('success') }}
                </div>
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-1" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
        @endif
        <!-- Profile Picture -->
        <div class="w-60 h-60">
            <img src="/storage/{{ $mahasiswa->profil_foto }}" alt="{{ $mahasiswa->nama }}">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Left column for student details -->
            <div class="bg-white dark:bg-gray-700 p-2 rounded-lg shadow mb-2">
                <h3 class="text-lg font-semibold text-blue-500 dark:text-white">Nama Mahasiswa</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300">{{ $mahasiswa->nama }}</p>
            </div>
            <div class="bg-white dark:bg-gray-700 p-2 rounded-lg shadow mb-2">
                <h3 class="text-lg font-semibold text-blue-500 dark:text-white">NIM</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300">{{ $mahasiswa->nim }}</p>
            </div>
            <div class="bg-white dark:bg-gray-700 p-2 rounded-lg shadow mb-2">
                <h3 class="text-lg font-semibold text-blue-500 dark:text-white">Jurusan</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300">{{ $mahasiswa->jurusan->nama }}</p>
            </div>
            <div class="bg-white dark:bg-gray-700 p-2 rounded-lg shadow mb-2">
                <h3 class="text-lg font-semibold text-blue-500 dark:text-white">Tahun Masuk</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300">{{ $mahasiswa->tahun }}</p>
            </div>
            <!-- Right column for student details -->
            <div class="bg-white dark:bg-gray-700 p-2 rounded-lg shadow mb-2">
                <h3 class="text-lg font-semibold text-blue-500 dark:text-white">Nama Asrama</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300">{{ $mahasiswa->asrama->nama }}</p>
            </div>
            <div class="bg-white dark:bg-gray-700 p-2 rounded-lg shadow mb-2">
                <h3 class="text-lg font-semibold text-blue-500 dark:text-white">Alamat</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300">{{ $mahasiswa->alamat }}</p>
            </div>
            <div class="bg-white dark:bg-gray-700 p-2 rounded-lg shadow mb-2">
                <h3 class="text-lg font-semibold text-blue-500 dark:text-white">Periode Asrama</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300">{{ $mahasiswa->periode_asrama }}</p>
            </div>
            <div class="bg-white dark:bg-gray-700 p-2 rounded-lg shadow mb-2">
                <h3 class="text-lg font-semibold text-blue-500 dark:text-white">Email</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300">{{ $mahasiswa->email }}</p>
            </div>
            <div class="bg-white dark:bg-gray-700 p-2 rounded-lg shadow mb-2">
                <h3 class="text-lg font-semibold text-blue-500 dark:text-white">Dosen Wali</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300">{{ $mahasiswa->dosen_wali }}</p>
            </div>
            <div class="bg-white dark:bg-gray-700 p-2 rounded-lg shadow mb-2">
                <h3 class="text-lg font-semibold text-blue-500 dark:text-white">Judul Tugas Akhir</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300">{{ $mahasiswa->nama_tugas_akhir }}</p>
            </div>

            @can('admin')

            <div class="flex justify-between">

                {{-- panggil edit form --}}
                @include('dashboard.mahasiswa.edit')


                <button data-modal-target="authentication-modal" data-modal-toggle="delete-modal" class="px-7 py-3 text-sm font-medium text-white inline-flex items-center bg-red-500 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                    </svg>
                    <span>Delete</span>
                </button>
            </div>

            <div id="delete-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="delete-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-6 text-center">
                            <svg class="mx-auto mb-4 text-blue-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <form action="{{ route('mahasiswa.destroy', $mahasiswa->nim) }}" method="POST">
                                @method('delete')
                                @csrf
                                <h3 class="mb-5 text-lg font-normal text-blue-500 dark:text-gray-400">Apakah anda yakin ingin menghapus data mahasiswa?</h3>
                                <button type="submit" class="text-gray-500 bg-grey-500 border-blue-500 hover:bg-blue-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                    Ya
                                </button>
                                <button data-modal-hide="delete-modal" type="button" class="text-gray-500 bg-grey-500 border-blue-500 hover:bg-blue-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                    Tidak
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endcan

        </div>

    </div>
</div>


@endsection
