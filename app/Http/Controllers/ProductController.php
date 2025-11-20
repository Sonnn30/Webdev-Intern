<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function All(){
        $products = Product::all();
        return view('product.index', compact('products'));
    }
    public function create(){

        return view('product.create');
    }
    public function store(Request $request){
        $price = $request->price;
        $stock = $request->stock;
        $total = $price * $stock;
        Product::create([
            'name' => $request->name,
            'price' => $price,
            'stock' => $stock,
            'total_price' => $total
        ]);

        return redirect()->route('product.all');
    }
    public function update(Product $product){
        return view('product.update', compact('product'));
    }

    public function updateStore(Request $request, Product $product){
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);
        $total = $request->price * $request->stock;
        $product->update([
            'total_price' => $total
        ]);
        return redirect()->route('product.all');
    }
    public function delete(Product $product){
        $product->delete();
        return redirect()->route('product.all');
    }
}
