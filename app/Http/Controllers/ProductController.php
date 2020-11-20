<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['products'] = Product::paginate(5);
        return view('products.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productData = request()->except('_token');
        if($request->hasFile('photo')){
            $productData['photo'] = $request->file('photo')->store('uploads', 'public');
        }
        $productData['in_stock'] = $request->has('in_stock') ? 1 : 0;
        $productData['status'] = $request->has('status') ? 1 : 0;
        Product::insert($productData);

        return redirect('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $productData = request()->except('_token', '_method');
        if($request->hasFile('photo')){
            $product = Product::findOrFail($id);

            Storage::delete('public/'.$product->photo);
            $productData['photo'] = $request->file('photo')->store('uploads', 'public');
        }
        $productData['in_stock'] = $request->has('in_stock') ? 1 : 0;
        $productData['status'] = $request->has('status') ? 1 : 0;
        Product::where('id', '=', $id)->update($productData);

        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if(Storage::delete('public/'.$product->photo)){
            Product::destroy($id);
        }

        return redirect('products');
    }
}
