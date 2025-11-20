@extends('layout.app')

@section('title', 'Daftar Transaksi')
@section('header-title', 'Daftar Transaksi')

@section('content')
    @if(session('success'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="mb-4 text-right">
        <a href="{{ route('transaction.create') }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
            + Buat Transaksi
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 text-left">
            <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 border-b">ID</th>
                <th class="px-4 py-2 border-b">Nama Produk</th>
                <th class="px-4 py-2 border-b">Harga Satuan</th>
                <th class="px-4 py-2 border-b">Jumlah</th>
                <th class="px-4 py-2 border-b">Total Harga</th>
                <th class="px-4 py-2 border-b">Tanggal Transaksi</th>
            </tr>
            </thead>
            <tbody>
            @forelse($transactions as $transaction)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border-b">{{ $transaction->id }}</td>
                    <td class="px-4 py-2 border-b">{{ $transaction->product->name }}</td>
                    <td class="px-4 py-2 border-b">Rp {{ number_format($transaction->unit_price) }}</td>
                    <td class="px-4 py-2 border-b">{{ $transaction->quantity }}</td>
                    <td class="px-4 py-2 border-b">Rp {{ number_format($transaction->total_price) }}</td>
                    <td class="px-4 py-2 border-b">{{ $transaction->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center p-4 text-gray-500">Belum ada transaksi.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection

