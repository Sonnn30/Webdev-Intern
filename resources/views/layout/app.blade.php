<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Produk')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-red-50 text-gray-800">

    <div class="container mx-auto p-6">
        <header class="mb-6 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-red-600">@yield('header-title', 'Dashboard')</h1>
            <nav>
                <a href="{{ route('product.all') }}" class="text-blue-600 hover:underline mr-4">List Produk</a>
                <a href="{{ route('product.create') }}" class="text-blue-600 hover:underline mr-4">Tambah Produk</a>
                <a href="{{ route('transaction.index') }}" class="text-blue-600 hover:underline mr-4">Transaksi</a>
                <a href="{{ route('transaction.create') }}" class="text-blue-600 hover:underline">Buat Transaksi</a>
            </nav>
        </header>

        <div class="bg-white p-6 rounded-lg shadow-md">
            @yield('content')
        </div>
    </div>

</body>
</html>
