<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.product.index', compact('products'));
    }


    public function create()
    {

        return view('admin.product.create');
    }

    public function edit($products_id)

    {

        $products = Product::find($products_id);

        return view('admin.product.edit', compact('products',));
    }



    public function store(ProductFormRequest $request)
    {

        $data = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/products'), $filename);

            $data['image'] = 'uploads/products/' . $filename;
        }


        Product::create($data);
        return redirect('admin/products/view')->with('status', 'Product Created');
    }



    public function update(ProductFormRequest $request, $products_id)

    {
        $product = Product::findOrFail($products_id);

        $data = $request->validated();


        if ($request->hasFile('image')) {

            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }


            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/products'), $filename);

            $data['image'] = 'uploads/products/' . $filename;
        }


        $product->update($data);

        return redirect('admin/products/view')->with('status', 'Product Updated');
    }



    public function destroy($products_id)
    {
        $product = Product::findOrFail($products_id);

        // Check if image exists and delete
        if ($product->image) {
            $image_path = public_path($product->image); // full path
            if (file_exists($image_path)) {
                unlink($image_path); // delete the file
            }
        }

        $product->delete();

        return redirect()->back()->with('success', 'Product and image deleted successfully!');
    }
}
