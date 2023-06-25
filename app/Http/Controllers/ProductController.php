<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Carbon\Carbon; 

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
        $product->reference         = request('reference');
        //$product->reference         = $this->generate_reference();
        $product->name              = request('name');
        $product->category_id       = request('category_id');
        $product->trademark_id      = request('category_id');
        $product->trademarkmodel_id = request('trademarkmodel_id');
        $product->price             = request('price');
        $product->stock             = request('stock');
        $product->product_pict_url  = $picture_url;
        $product->product_pict_path = $picture;

        $product->save();

        return redirect(route('products-index'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', ['product' => $product]);
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
    public function update(UpdateProductRequest $request, $id)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255',
        ]);

        $product  = Product::findOrFail($id);

        if($request->file('picture')){
            if (File::exists($product->picture_path)) {
                $deletedFile = File::delete($product->product_pict_path);
            }
            $picture_name = Carbon::now()->format('Ymd_His')."_".str_replace(' ', '_', mb_strtolower(request('name'), 'UTF-8'));
            $picture_file = $picture_name.".".$request->file('picture')->getClientOriginalExtension();
            $picture      = $request->file('picture')->move(public_path("\img"), $picture_file);
            $picture_url  = env('APP_URL')."/img/".$picture_file;
        } else {
            $picture        = NULL;
            $picture_url    = NULL;
        }
        $product->reference         = request('reference');
        $product->name              = request('name');
        $product->category_id       = request('category_id');
        $product->trademark_id      = request('category_id');
        $product->trademarkmodel_id = request('trademarkmodel_id');
        $product->price             = request('price');
        $product->stock             = request('stock');
        $product->product_pict_url  = $picture_url;
        $product->product_pict_path = $picture;

        $product->save();
        return redirect(route('products-index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product  = Product::findOrFail($id);
        if (File::exists($product->picture_path)) {
            $deletedFile = File::delete($product->picture_path);
        }
        $product->delete();
        return redirect(route('products-index'));
    }

    public function generate_reference() {
        $last = Product::all()->last();
        $genref = "";
        if($last === null){
            $last = 0;
        } else {
            
            $last = $last["id"];
        }
        $genref = sprintf('P%08d', $last+1);

        return $genref;
    }
    
}
