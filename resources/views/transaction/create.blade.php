@extends('layout.app')

@section('title', 'Buat Transaksi')
@section('header-title', 'Buat Transaksi Baru')

@section('content')
    <form action="{{ route('transaction.store') }}" method="post" id="transactionForm">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="product_id">Pilih Produk</label>
            <select name="product_id" id="product_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <option value="">-- Pilih Produk --</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}"
                            data-price="{{ $product->price }}"
                            data-stock="{{ $product->stock }}">
                        {{ $product->name }} - Stok: {{ $product->stock }} - Rp {{ number_format($product->price) }}
                    </option>
                @endforeach
            </select>
            @error('product_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="quantity">Jumlah Kuantitas</label>
            <input type="number" name="quantity" id="quantity" min="1" value="1" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan jumlah" required>
            @error('quantity')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <p id="stock-info" class="text-gray-600 text-xs mt-1"></p>
        </div>

        <div class="bg-gray-50 p-4 rounded-lg mb-4 border border-gray-200">
            <h3 class="text-lg font-bold mb-3 text-gray-700">Preview Harga</h3>
            <div class="space-y-2">
                <div class="flex justify-between">
                    <span class="text-gray-600">Harga Satuan:</span>
                    <span id="unit-price" class="font-semibold text-gray-800">Rp 0</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Jumlah:</span>
                    <span id="preview-quantity" class="font-semibold text-gray-800">0</span>
                </div>
                <div class="border-t border-gray-300 pt-2 mt-2">
                    <div class="flex justify-between">
                        <span class="text-lg font-bold text-gray-700">Total Harga:</span>
                        <span id="total-price" class="text-lg font-bold text-red-600">Rp 0</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-between mt-6">
            <a href="{{ route('transaction.index') }}" class="text-white hover:text-gray-700 bg-gray-400 px-3 py-2 rounded-md">Batal</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Simpan Transaksi
            </button>
        </div>
    </form>

    <script src="{{ asset('js/product.js') }}"></script>
@endsection

