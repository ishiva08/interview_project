<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();
        return view('products', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $validation = validator([
        //     'name' => 'string',
        //     'description' => 'string'
        // ])
        return view('create-product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        // $path = $request->file('image')->store('products');
        $product->image =  "image.png";
        $product->save();

        return redirect()->route('products');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product = Product::with('reviews')->where('id', $product->id)->first();
        return view('single-product', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('edit-product', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        // $path = $request->file('image')->store('products');
        $product->image =  'image.png';
        $product->save();

        return redirect()->route('products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product = Product::find(1);

        $product->delete();
    }

    public function review(Request $request, Product $product)
    {
        $review = new Review();
        $review->user_id = auth()->id();
        $product->description = $request->description;
        $product->price = $request->price;
        // $path = $request->file('image')->store('products');
        $product->image =  'image.png';
        $product->save();

        return redirect()->route('products');
    }
}
