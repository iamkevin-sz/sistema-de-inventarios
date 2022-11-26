<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Provider;


use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::get();
        return view('admin.product.index', compact('products'));
    }


    public function create()
    {
        $categories = Category::get();
        $providers = Provider::get();
        return view('admin.product.create', compact('categories', 'providers'));

    }


    public function store(StoreProductRequest $request)
    {

        if($request -> hasFile('picture')){
            $file = $request -> file('picture');
            $image_name = time().' _ '. $file -> getClientOriginalName();
            $file -> move(public_path("/image"), $image_name);
        }


        $product = Product::create($request->all()+[
            'image' => $image_name,
        ]);

        $product -> update(['code'=>$product->id]);

        return redirect()->route('admin.products.index');

    }


    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));

    }


    public function edit(Product $product)
    {
        $categories = Category::get();
        $providers = Provider::get();
        return view('admin.product.edit', compact('product','categories', 'providers'));
    }


    public function update(UpdateProductRequest $request, Product $product)
    {


        if($request -> hasFile('picture')){
            $file = $request -> file('picture');
            $image_name = time().' _ '. $file -> getClientOriginalName();
            $file -> move(public_path("/image"), $image_name);
        }






        $product->update($request->all()+[
            'image' => $image_name,
        ]);
        return redirect()->route('admin.products.index');
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index');
    }

    public function cambiar_estado(Product $product)
    {
        if ($product->status == 'ACTIVE') {
            $product ->update(['status'=>'DEACTIVATED']);
            return redirect()->back();
            // $purchase->update(['status'=>'CANCELED']);
            // return redirect()->back()->with('toast_success', '¡Estado cambiado con éxito!');
        } else {
            $product ->update(['status'=>'ACTIVE']);
            return redirect()->back();
            // $purchase->update(['status'=>'VALID']);
            // return redirect()->back()->with('toast_success', '¡Estado cambiado con éxito!');
        }
    }
}
