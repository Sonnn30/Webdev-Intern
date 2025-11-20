<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wilson Prajnawira Webdev Intern</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex flex-col items-center justify-center gap-5 h-screen">
        <h1 class="text-xl sm:text-3xl text-amber-700 font-bold underline">
            Hello, welcome to my website!
        </h1>

        <div class="flex justify-center gap-4">
            <div class="bg-blue-500 p-2 sm:p-4 rounded-md">
                <a href="{{ route('product.all') }}" class="text-white">List Produk</a>
            </div>
            <div class="bg-blue-500 p-2 sm:p-4 rounded-md">
                <a href="{{ route('transaction.index') }}" class="text-white">List Transaksi</a>
            </div>
        </div>
    </div>
</body>
</html>
