@extends('dashboard.layouts.main')

@section('container')
<div class="px-4">
    <div class="inline-flex">
        <button class="px-6 py-3 bg-blue-300 text-white text-sm font-medium rounded-l-lg" disabled>
            Buat
        </button>
        <button class="px-6 py-3 bg-blue-300  text-white text-sm font-medium disabled">
            Review
        </button>
        <button class="px-6 py-3 bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium rounded-r-lg">
            Kirim
        </button>
    </div>

    <div class="mt-4">
        <iframe src="{{ $pdfDataUri }}" frameborder="0" style="width: 100%; height: 800px;"></iframe>
    </div>

</div>
<form action="{{ route('surat.store', ['surat' => $surat]) }}" method="POST">
    @csrf
    @method('post')
    <input name="pdf_data_uri" value="{{ $pdfDataUri }}" hidden>
    <button type="submit" class="m-4 flex items-center text-blue-500 hover:text-white border border-blue-500 hover:bg-blue-500 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
        Kirim
    </button>
</form>
@endsection
