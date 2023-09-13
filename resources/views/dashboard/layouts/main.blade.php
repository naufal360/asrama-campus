<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asrama Universitas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="/assets/logo.png" type="image/x-icon">
    <style>
        /* mengatur ukuran canvas tanda tangan  */
        canvas {
            border: 1px solid #ccc;
            border-radius: 0.5rem;
            width: 100%;
            height: 400px;
        }

    </style>
</head>

<body>

    @include('dashboard.partials.sidebar')

    <div class="px-4 sm:ml-64">
        <div class="px-4 py-0 rounded-lg">
            @include('dashboard.partials.navbar')
            <div class="container mx-auto">
                @yield('container')
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>
</body>
</html>
