<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();

        return view('products.index', compact( ['products', 'categories'] ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate( $request, [
            'name' => 'required|string|min:2',
            'price' => 'nullable|numeric',
            'image' => 'nullable|image',
            'stock' => 'nullable|integer',
            'categories' => 'required|min:1',
        ]);
        //podemos cambiar los mensaje de las validaciones como tercer parametro del validate

        if( ($request->file('image')) ){
            $path = $request->file('image')->store('products');
        }

        //dd($request->input('categories'));

        $product = Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price')??0,
            'description' => $request->input('description'),
            'image' => $path??null,
            'stock' => $request->input('stock')??0,
            'user_id' => \Auth::user()->id,
        ]);



        foreach ($request->input('categories') as $category) {
            $product->categories()->attach($category);
        }




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
