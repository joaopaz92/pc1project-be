<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(5);
        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255',
        ]);

        if($request->file('picture')){
            $picture_name=Carbon::now()->format('Ymd_His')."_".str_replace(' ', '_', mb_strtolower(request('name'), 'UTF-8'));
            $picture_file = $picture_name.".".$request->file('picture')->getClientOriginalExtension();
            $picture = $request->file('picture')->move(public_path("\img"), $picture_file);
            $picture_url  = env('APP_URL')."/img/".$picture_file;
        } else {
            $picture = NULL;
            $picture_url = NULL;
        }

        $product                    = new Product;
        $product->name              = request('name');
        $product->category_id       = request('category_id');
        $product->trademark_id      = request('category_id');
        $product->trademarkmodel_id = request('trademarkmodel_id');
        $product->price             = request('price');
        $product->stock             = request('stock');
        $product->product_pict_url  = $picture_url;
        $product->product_pict_path = $picture;

        $product->save();

        return redirect(route('product-index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
