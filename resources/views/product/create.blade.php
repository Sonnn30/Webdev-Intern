@extends('layout.app')

@section('title', 'Tambah Produk')
@section('header-title', 'Input Produk Baru')

@section('content')
    <form action="{{ route('product.store')}}" method="post">
        @csrf
        @method('post')
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nama Produk</label>
            <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Contoh: Kopi Susu" required>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="price">Harga</label>
                <input type="number" name="price" id="price" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="15000" required>
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="stock">Stok</label>
                <input type="number" name="stock" id="stock" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="100" required>
            </div>
        </div>

        <div class="flex items-center justify-between mt-6">
            <a href="{{ route('product.all') }}" class="text-white hover:text-gray-700 bg-gray-400 px-3 py-2 rounded-md">Batal</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Simpan Produk
            </button>
        </div>
    </form>
@endsection
