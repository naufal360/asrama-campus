@extends('dashboard.layouts.main')

@section('container')


<div class="px-4">
    <div class=" py-0 rounded-lg">
        <div class="inline-flex">
            <button class="px-6 py-3 bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium rounded-l-lg">
                Buat
            </button>
            <button class="px-6 py-3 bg-blue-300 text-white text-sm font-medium" disabled>
                Review
            </button>
            <button class="px-6 py-3 bg-blue-300 text-white text-sm font-medium rounded-r-lg" disabled>
                Kirim
            </button>
        </div>
        <div>
            <form action="{{ route('surat.preview') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="pt-4 rounded-lg max-w-4xl dark:bg-gray-800" id="create" role="tabpanel" aria-labelledby="create-tab">
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <div class="mb-5">
                                <label for="surat" class="mb-2 text-sm font-medium text-blue-500 dark:text-white">Surat</label>
                                <select id="surat" name="surat" class="bg-gray-50 border border-blue-500 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option selected value="selected" disabled>Pilih Surat</option>
                                    <option value="Kontrak">Surat Kontrak</option>
                                    <option value="Izin">Surat Izin</option>
                                </select>
                            </div>
                            <div class="relative mt-5" id="nama-container" style="display: none;">
                                <input type="text" id="nama" name="nama" value="{{ $userData->nama }}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required readonly />
                                <label for="nama" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Masukkan Nama
                                </label>
                            </div>
                            <div class="relative mt-5" id="nim-container" style="display: none;">
                                <input type="text" id="nim" name="nim" value="{{ $userData->nim }}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required readonly />
                                <label for="nim" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Masukkan NIM
                                </label>
                            </div>
                            <div class="relative mt-5" id="nik-container" style="display: none;">
                                <input type="text" id="nik" name="nik" value="{{ $userData->nik }}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="nik" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Masukkan NIK
                                </label>
                            </div>
                            <div class="mt-3" id="asrama-container" style="display: none;">
                                <label for="asrama" class="mb-2 text-sm font-medium text-blue-500 dark:text-white">Asrama</label>
                                <select id="asrama" name="asrama" class="bg-gray-50 border border-blue-500 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option value="AL" {{ $userData->asrama->id == 1 ? 'selected' : ''}}>Asrama Anggur</option>
                                    <option value="KH" {{ $userData->asrama->id == 2 ? 'selected' : ''}}>Asrama Salak</option>
                                    <option value="PT" {{ $userData->asrama->id == 3 ? 'selected' : ''}}>Asrama Duren</option>
                                    <option value="RS" {{ $userData->asrama->id == 4 ? 'selected' : ''}}>Asrama Apel</option>
                                </select>
                            </div>
                            <div class="relative mt-5" id="alasan-container" style="display: none;">
                                <input type="text" id="alasan" name="alasan" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="alasan" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Tuliskan Alasan
                                </label>
                            </div>
                            <div class="relative mt-5" id="alamat-container" style="display: none;">
                                <input type="text" id="alamat" name="alamat" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="alamat" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Alamat Tujuan
                                </label>
                            </div>
                            <div class="relative mt-5" id="tempat-tanggal-surat-izin-container" style="display: none;">
                                <input type="text" id="tempat_tanggal_surat_izin" name="tempat_tanggal_surat_izin" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required />
                                <label for="tempat_tanggal_surat_izin" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Tempat dan tanggal surat
                                </label>
                            </div>
                            <div class="mt-6 mb-6" id="image-izin-container" style="display: none;">
                                <label for="image_izin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{ __("Unggah Foto") }} </label>
                                <label for="image_izin" class="sr-only">Choose file</label>
                                <img src="" id="img-view" style="" class="max-h-64 w-96 mb-2 object-cover">
                                <input type="file" accept=".jpg, .jpeg, .png" name="image_izin" id="image_izin" class="block w-full border border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 file:bg-transparent file:border-0 file:bg-gray-100 file:mr-4 file:py-3 file:px-4 dark:file:bg-gray-700 dark:file:text-gray-400" required>
                                <label for="image_izin" class="block mb-2 text-sm text-gray-400 dark:text-white"> {{ __("PNG, JPG or JPEG (MAX, 10280x10280px).") }} </label>
                            </div>
                            {{-- Surat Kontrak --}}
                            <div class="relative mt-5" id="program-studi-container" style="display: none;">
                                <input type="text" id="program_studi" name="program_studi" value="{{ $userData->jurusan->nama }}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required readonly />
                                <label for="program_studi" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Program Studi
                                </label>
                            </div>
                            <div class="relative mt-5" id="ttl-container" style="display: none;">
                                <input type="text" id="tempat_tanggal_lahir" name="tempat_tanggal_lahir" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required />
                                <label for="tempat_tanggal_lahir" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Tempat, tanggal lahir
                                </label>
                            </div>
                            <div class="mt-3" id="golongan-darah-container" style="display: none;">
                                <label for="golongan_darah" class="mb-2 text-sm font-medium text-blue-500 dark:text-white">Golongan Darah</label>
                                <select id="golongan_darah" name="golongan_darah" class="bg-gray-50 border border-blue-500 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option selected value="O">O</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                </select>
                            </div>
                            <div class="mt-3" id="jenis-kelamin-container" style="display: none;">
                                <label for="jenis_kelamin" class="mb-2 text-sm font-medium text-blue-500 dark:text-white">Jenis Kelamin</label>
                                <select id="jenis_kelamin" name="jenis_kelamin" class="bg-gray-50 border border-blue-500 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option selected value="P">Perempuan</option>
                                    <option value="L">Laki-Laki</option>
                                </select>
                            </div>
                            <div class="relative mt-5" id="agama-container" style="display: none;">
                                <input type="text" id="agama" name="agama" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required />
                                <label for="agama" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Agama
                                </label>
                            </div>
                            <div class="relative mt-5" id="alamat-asli-container" style="display: none;">
                                <input type="text" id="alamat_asli" name="alamat_asli" value="{{ $userData->alamat }}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Jl. Bahagia" required />
                                <label for="alamat_asli" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Alamat Asli
                                </label>
                            </div>
                        </div>
                        {{-- Kolom 2 --}}
                        <div id="kolom-2" style="display: none;">
                            <div class="relative mt-5">
                                <input type="number" id="no_tlp" name="no_tlp" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required />
                                <label for="no_tlp" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    No. Telp
                                </label>
                            </div>
                            <div class="relative mt-5">
                                <input type="email" id="email" name="email" value="{{ $userData->email }}" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required />
                                <label for="email" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Alamat Email
                                </label>
                            </div>
                            <div class="relative mt-5">
                                <input type="text" id="nama_orang_tua" name="nama_orang_tua" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required />
                                <label for="nama_orang_tua" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Nama Orang tua/wali
                                </label>
                            </div>
                            <div class="relative mt-5">
                                <input type="text" id="pekerjaan_orang_tua" name="pekerjaan_orang_tua" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required />
                                <label for="pekerjaan_orang_tua" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Pekerjaan Orang tua/wali
                                </label>
                            </div>
                            <div class="relative mt-5">
                                <input type="text" id="alamat_orang_tua" name="alamat_orang_tua" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required />
                                <label for="alamat_orang_tua" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Alamat Orang tua/wali
                                </label>
                            </div>
                            <div class="relative mt-5">
                                <input type="number" id="no_tlp_orang_tua" name="no_tlp_orang_tua" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required />
                                <label for="no_tlp_orang_tua" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    No. Telp Orang tua/wali
                                </label>
                            </div>
                            <div class="relative mt-5">
                                <input type="text" id="tempat_tanggal_surat" name="tempat_tanggal_surat" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required />
                                <label for="tempat_tanggal_surat" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                    Tempat dan tanggal surat
                                </label>
                            </div>
                            <div class="mt-6 mb-6">
                                <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{ __("Unggah Foto") }} </label>
                                <label for="image" class="sr-only">Choose file</label>
                                <img src="" id="img-view" style="" class="max-h-64 w-96 mb-2 object-cover">
                                <input type="file" accept=".jpg, .jpeg, .png" name="image" id="image" class="block w-full border border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 file:bg-transparent file:border-0 file:bg-gray-100 file:mr-4 file:py-3 file:px-4 dark:file:bg-gray-700 dark:file:text-gray-400" required>
                                <label for="image" class="block mb-2 text-sm text-gray-400 dark:text-white"> {{ __("PNG, JPG or JPEG (MAX, 10280x10280px).") }} </label>
                            </div>
                        </div>
                    </div>

                    <div class="ml-1 m-5" id="button-simpan" style="display: none;">
                        <button type="submit" class="flex items-center text-blue-500 hover:text-white border border-blue-500 hover:bg-blue-500 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                            Simpan
                        </button>
                    </div>
                </div>
                <div class="hidden p-4 rounded-lg  dark:bg-gray-800" id="send">
                    <iframe src="contoh.pdf" width="600" height="400"></iframe>
                    <div class="ml-1 m-5">
                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="flex items-center text-blue-500 hover:text-white border border-blue-500 hover:bg-blue-500 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800" type="button">
                            Kirim
                        </button>
                    </div>
                    <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="flex flex-col items-center p-6 text-center">
                                    <h1 class="mb-5 text-lg text-3xl font-normal text-gray-900 dark:text-gray-400">Aduan
                                        terkirim!</h1>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-12 h-12 text-green-500 fill-green dark:text-gray-400">
                                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const suratDropdown = document.getElementById('surat');
        const nimContainer = document.getElementById('nim-container');
        const namaContainer = document.getElementById('nama-container');
        const buttonSimpan = document.getElementById('button-simpan');
        // Surat Izin
        const asramaContainerIzin = document.getElementById('asrama-container');
        const alasanContainerIzin = document.getElementById('alasan-container');
        const alamatContainerIzin = document.getElementById('alamat-container');
        const imageContainerIzin = document.getElementById('image-izin-container');
        const tanggalSuratContainerIzin = document.getElementById('tempat-tanggal-surat-izin-container');
        // Surat Kontrak
        const nikContainerKontrak = document.getElementById('nik-container');
        const programStudiContainerKontrak = document.getElementById('program-studi-container');
        const ttlContainerKontrak = document.getElementById('ttl-container');
        const golonganDarahContainerKontrak = document.getElementById('golongan-darah-container');
        const jenisKelaminContainerKontrak = document.getElementById('jenis-kelamin-container');
        const agamaContainerKontrak = document.getElementById('agama-container');
        const alamatAsliContainerKontrak = document.getElementById('alamat-asli-container');
        const kolom2ContainerKontrak = document.getElementById('kolom-2');
        // Input agar wajib diisi (Izin)
        const asramaInput = document.getElementById('asrama');
        const alasanInput = document.getElementById('alasan');
        const alamatInput = document.getElementById('alamat');
        const imageIzinInput = document.getElementById('image_izin');
        const tanggalSuratIzinInput = document.getElementById('tempat_tanggal_surat_izin');
        // Input agar wajib diisi (Kontrak)
        const nikInput = document.getElementById('nik');
        const programStudiInput = document.getElementById('program_studi');
        const ttlInput = document.getElementById('tempat_tanggal_lahir');
        const golonganDarahSelect = document.getElementById('golongan_darah');
        const jenisKelaminSelect = document.getElementById('jenis_kelamin');
        const agamaInput = document.getElementById('agama');
        const alamatAsliInput = document.getElementById('alamat_asli');
        // Kolom 2
        const noTlpInput = document.getElementById('no_tlp');
        const emailInput = document.getElementById('email');
        const namaOrangTuaInput = document.getElementById('nama_orang_tua');
        const pekerjaanOrangTuaInput = document.getElementById('pekerjaan_orang_tua');
        const alamatOrangTuaInput = document.getElementById('alamat_orang_tua');
        const noTlpOrangTuaInput = document.getElementById('no_tlp_orang_tua');
        const tempatTanggalSuratInput = document.getElementById('tempat_tanggal_surat');
        const imageInput = document.getElementById('image');


        // Fungsi untuk mengatur input sebagai required atau tidak
        function setInputRequired(inputElement, isRequired) {
            if (isRequired) {
                inputElement.setAttribute('required', 'required');
            } else {
                inputElement.removeAttribute('required');
            }
        }

        suratDropdown.addEventListener('change', function() {
            // none artinya tidak ditampilkan
            // block artinya ditampilkan
            if (suratDropdown.value === 'Kontrak') {
                // Jika opsi "Kontrak" dipilih, maka jalankan program di bawah
                // Selalu ditampilkan
                nimContainer.style.display = 'block';
                namaContainer.style.display = 'block';
                // Button Simpan
                buttonSimpan.style.display = 'block';

                // Surat Izin
                asramaContainerIzin.style.display = 'none';
                setInputRequired(asramaInput, false);
                alasanContainerIzin.style.display = 'none';
                setInputRequired(alasanInput, false);
                alamatContainerIzin.style.display = 'none';
                setInputRequired(alamatInput, false);
                tanggalSuratContainerIzin.style.display = 'none';
                setInputRequired(tanggalSuratIzinInput, false);
                imageContainerIzin.style.display = 'none';
                setInputRequired(imageIzinInput, false);

                // Surat Kontrak
                nikContainerKontrak.style.display = 'block';
                setInputRequired(nikInput, true);

                programStudiContainerKontrak.style.display = 'block';
                setInputRequired(programStudiInput, true);

                ttlContainerKontrak.style.display = 'block';
                setInputRequired(ttlInput, true);

                golonganDarahContainerKontrak.style.display = 'block';
                setInputRequired(golonganDarahSelect, true);

                jenisKelaminContainerKontrak.style.display = 'block';
                setInputRequired(jenisKelaminSelect, true);

                agamaContainerKontrak.style.display = 'block';
                setInputRequired(agamaInput, true);

                alamatAsliContainerKontrak.style.display = 'block';
                setInputRequired(alamatAsliInput, true);


                kolom2ContainerKontrak.style.display = 'block';
                // Set Kolom 2 agar wajib diisi
                setInputRequired(noTlpInput, true);
                setInputRequired(emailInput, true);
                setInputRequired(namaOrangTuaInput, true);
                setInputRequired(pekerjaanOrangTuaInput, true);
                setInputRequired(alamatOrangTuaInput, true);
                setInputRequired(noTlpOrangTuaInput, true);
                setInputRequired(tempatTanggalSuratInput, true);
                setInputRequired(imageInput, true);

            } else if (suratDropdown.value === 'Izin') {
                // Jika opsi Surat "Izin", maka jalankan program di bawah
                // Selalu ditampilkan
                nimContainer.style.display = 'block';
                namaContainer.style.display = 'block';
                // Button Simpan
                buttonSimpan.style.display = 'block';

                // Surat Izin
                asramaContainerIzin.style.display = 'block';
                setInputRequired(asramaInput, true);

                alasanContainerIzin.style.display = 'block';
                setInputRequired(alasanInput, true);

                alamatContainerIzin.style.display = 'block';
                setInputRequired(alamatInput, true);

                tanggalSuratContainerIzin.style.display = 'block';
                setInputRequired(tanggalSuratIzinInput, true);

                imageContainerIzin.style.display = 'block';
                setInputRequired(imageIzinInput, true);

                // Surat Kontrak
                nikContainerKontrak.style.display = 'none';
                setInputRequired(nikInput, false);

                programStudiContainerKontrak.style.display = 'none';
                setInputRequired(programStudiInput, false);

                ttlContainerKontrak.style.display = 'none';
                setInputRequired(ttlInput, false);

                golonganDarahContainerKontrak.style.display = 'none';
                setInputRequired(golonganDarahSelect, false);

                jenisKelaminContainerKontrak.style.display = 'none';
                setInputRequired(jenisKelaminSelect, false);

                agamaContainerKontrak.style.display = 'none';
                setInputRequired(agamaInput, false);

                alamatAsliContainerKontrak.style.display = 'none';
                setInputRequired(alamatAsliInput, false);

                kolom2ContainerKontrak.style.display = 'none';
                // Set Kolom 2 agar tidak wajib diisi
                setInputRequired(noTlpInput, false);
                setInputRequired(emailInput, false);
                setInputRequired(namaOrangTuaInput, false);
                setInputRequired(pekerjaanOrangTuaInput, false);
                setInputRequired(alamatOrangTuaInput, false);
                setInputRequired(noTlpOrangTuaInput, false);
                setInputRequired(tempatTanggalSuratInput, false);
                setInputRequired(imageInput, false);

            } else {
                nimContainer.style.display = 'none';
                namaContainer.style.display = 'none';
                // Button Simpan
                buttonSimpan.style.display = 'none';
                // Surat Izin
                asramaContainerIzin.style.display = 'none';
                alasanContainerIzin.style.display = 'none';
                alamatContainerIzin.style.display = 'none';
                tanggalSuratContainerIzin.style.display = 'none';
                imageContainerIzin.style.display = 'none';
                // Surat Kontrak
                nikContainerKontrak.style.display = 'none';
                programStudiContainerKontrak.style.display = 'none';
                ttlContainerKontrak.style.display = 'none';
                golonganDarahContainerKontrak.style.display = 'none';
                jenisKelaminContainerKontrak.style.display = 'none';
                agamaContainerKontrak.style.display = 'none';
                alamatAsliContainerKontrak.style.display = 'none';
                kolom2ContainerKontrak.style.display = 'none';
            }
        });
    });

</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@3.9.179/build/pdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>

{{-- Button group --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/charts.css/dist/charts.min.css">
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

@endsection
