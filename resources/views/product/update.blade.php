@extends('layout.app')

@section('title', 'Update Produk')
@section('header-title', 'Update Produk')

@section('content')
    <form action="{{ route('product.updateStore', $product) }}" method="post">
        @csrf
        @method('put')
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nama Produk</label>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Contoh: Kopi Susu" required>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="price">Harga</label>
                <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="15000" required>
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="stock">Stok</label>
                <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="100" required>
            </div>
        </div>

        <div class="flex items-center justify-between mt-6 ">
            <a href="{{ route('product.all') }}" class="text-white hover:text-gray-700 bg-gray-400 px-3 py-2 rounded-md">Batal</a>
            <div class="flex items-center gap-2">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update Produk
                </button>
            </div>
        </div>
    </form>

    <div class="mt-4 pt-4 border-t flex justify-end">
        <form action="{{ route('product.delete', $product) }}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
            @csrf
            @method('delete')
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Hapus Produk
            </button>
        </form>
    </div>
@endsection
