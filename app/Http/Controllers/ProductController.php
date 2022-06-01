<?php

namespace App\Http\Controllers;

use App\Events\ProductAdded;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function create($partner_id)
    {
        return view('product.create')->with('partner_id', $partner_id);
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'price' => 'required|min:0',
            'image' => 'required|mimes:png,jpeg,jpg',
        ]);

        $file = $request->file('image');
        $title = $request->get('title');
        $price = $request->get('price');

        $path = saveImages($file, $title, 'Partner');

        $product = Product::create([
            'title' => $title,
            'price' => $price,
            'image' => 'storage/' . $path,
            'partner_id' => $request->partner_id
        ]);

        ProductAdded::dispatch($product, $request->partner_id);

        return redirect()->route('partner.products', $request->partner_id)->with('flash_message', 'Prodotto Aggiunto');
    }


    public function deleted()
    {
        $products = Product::onlyTrashed()->get();

        return view('product.deleted')->with('products', $products);
    }

    public function restore($id)
    {
        $product = Product::onlyTrashed()->find($id);

        $product->restore();

        return redirect()->route('partner.products', $product->partner_id);
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('product.edit')->with( 'product', $product);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'mimes:png,jpeg,jpg',
            'price' => 'required|min:0'
        ]);

        $product = Product::findOrFail($id);
        $title = $request->get('title');

        if ($request->hasFile('image')){

            $file = $request->file('image');

            $path = saveImages($file, $title, 'Product');

            $product->update([
                'title' => $title,
                'price' => $request->price,
                'image' => 'storage/'.$path
            ]);

        }else{

            $product->update([
                'title' => $title,
                'price' => $request->price
            ]);

        }

        return redirect()->route('partner.products', $product->partner_id);
    }


    public function destroy($id)
    {
        Product::destroy($id);

        return back()->with('Flash_message', 'Prodotto Eliminato');
    }
}
