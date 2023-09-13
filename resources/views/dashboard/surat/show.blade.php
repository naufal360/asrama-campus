@extends('dashboard.layouts.main')

@section('container')

<div class="px-4 sm:ml-34">
    <div class="flex flex-col v-screen justify-center p-4">
        <div class=" gap-4">
            <!-- Left column for student details -->
            <div class="mt-4">
                <iframe src="{{ asset($surat->nama_file) }}" frameborder="0" style="width: 100%; height: 800px;" type="application/pdf"></iframe>

            </div>
            @cannot('admin')

            <h3 class="mb-4 text-xl font-medium text-blue-500 dark:text-white">Catatan</h3>
            <textarea id="message" rows="4" class="font-semibold cursor-not-allowed opacity-70 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" readonly> {{ $surat->catatan ? $surat->catatan : '-' }}
            </textarea>


            <div class="Status"><span>
                    @if ($surat->status == 'Ditolak')
                    Status : </span><span class="text-red-500 font-semibold">{{ $surat->status }}</span>
                @elseif ($surat->status == 'Diterima')
                Status : </span><span class="text-green-500 font-semibold">{{ $surat->status }}</span>
                @else
                Status : </span><span class="text-blue-500 font-semibold">{{ $surat->status }}</span>
                @endif
            </div>

            @endcannot

            @can('admin')

            <a class="my-10 font-medium text-blue-600 dark:text-blue-500 hover:underline" href="{{ asset($surat->nama_file) }}" download="{{ asset($surat->nama_file) }}">Unduh PDF</a>

            <form action="{{ route('surat.update', $surat->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="flex justify-center p-5">
                    <button name="status" value="Diterima" class="px text-blue-500 hover:text-white border border-blue-500 hover:bg-blue-500 focus:ring-2 focus:outline-none focus:ring-blue-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800" type="submit">
                        <span>Terima</span>
                    </button>


                    <button data-modal-target="tolak-modal" data-modal-toggle="tolak-modal" class="px text-blue-500 hover:text-white border border-blue-500 hover:bg-blue-500 focus:ring-2 focus:outline-none focus:ring-blue-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800" type="button">
                        <span>Tolak</span>
                    </button>

                    <div id="tolak-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="tolak-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-6 text-center">
                                    <h3 class="mb-4 text-xl font-medium text-blue-500 dark:text-white">Catatan</h3>
                                    <textarea id="message" name="catatan" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Terdapat kesalahan dalam penulisan. SIlakan periksa kembali!"></textarea>
                                    <button name="status" value="Ditolak" data-modal-hide="delete-modal" type="kirim" class="m-2 text-gray-800 bg-grey-500 border-blue-500 hover:bg-blue-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                        Kirim
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
            @endcan

        </div>
    </div>

</div>

@endsection
