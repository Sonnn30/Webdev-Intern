<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('product')->latest()->get();
        return view('transaction.index', compact('transactions'));
    }

    public function create()
    {
        $products = Product::where('stock', '>', 0)->get();
        return view('transaction.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);
        if ($product->stock < $request->quantity) {
            return back()->withErrors(['quantity' => 'Stok tidak mencukupi. Stok tersedia: ' . $product->stock]);
        }

        $unitPrice = $product->price;
        $totalPrice = $unitPrice * $request->quantity;

        Transaction::create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'unit_price' => $unitPrice,
            'total_price' => $totalPrice
        ]);
        $product->decrement('stock', $request->quantity);

        $product->update([
            'total_price' => $product->price * $product->stock
        ]);

        return redirect()->route('transaction.index')->with('success', 'Transaksi berhasil dibuat!');
    }
}
