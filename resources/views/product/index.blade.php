@extends('layout.app')

@section('title', 'Daftar Produk')
@section('header-title', 'Daftar Produk')

@section('content')
    <div class="mb-4 text-right">
        <a href="{{ route('product.create') }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
            + Tambah Produk
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 text-left">
            <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 border-b">ID</th>
                <th class="px-4 py-2 border-b">Nama Produk</th>
                <th class="px-4 py-2 border-b">Harga</th>
                <th class="px-4 py-2 border-b">Total Harga</th>
                <th class="px-4 py-2 border-b">Stok</th>
                <th class="px-4 py-2 border-b">Dibuat Pada</th>
                <th class="px-4 py-2 border-b">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @forelse($products as $product)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border-b">{{ $product->id }}</td>
                    <td class="px-4 py-2 border-b">{{ $product->name }}</td>
                    <td class="px-4 py-2 border-b">Rp {{ number_format($product->price) }}</td>
                    <td class="px-4 py-2 border-b">Rp {{ number_format($product->total_price) }}</td>
                    <td class="px-4 py-2 border-b">{{ $product->stock }}</td>
                    <td class="px-4 py-2 border-b">{{ $product->created_at }}</td>
                    <td class="px-4 py-2 border-b">
                        <a href="{{ route('product.update', $product) }}" class="px-3 py-1 bg-blue-600 text-white rounded text-sm hover:bg-blue-700">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center p-4 text-gray-500">Belum ada data produk.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
