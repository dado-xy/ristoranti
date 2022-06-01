<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;


class PartnerController extends Controller
{

    public function index()
    {
        $partner = Partner::all();

        return view('dashboard')->with('partners', $partner);
    }

    public function indexApi()
    {
        $partner = Partner::all();

        return response($partner, 200);
    }

    public function create()
    {
        return view('partner.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255|unique:partners',
            'image' => 'required|mimes:png,jpeg,jpg',
        ]);


        $file = $request->file('image');
        $title = $request->get('title');

        $path = saveImages($file, $title, 'Partner');

        Partner::create([
            'title' => $title,
            'image' => 'storage/' . $path
        ]);


        return redirect('dashboard')->with('flash_message', 'Partner added');
    }

    public function edit($id)
    {

        $partner = Partner::findOrFail($id);

        return view('partner.edit')->with('partner',$partner);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required|max:255',
            'image' => 'mimes:png,jpeg,jpg',
        ]);

        $partner = Partner::findOrFail($id);
        $title = $request->get('title');

        if ($request->hasFile('image')){

            $file = $request->file('image');

            $path = saveImages($file, $title, 'Partner');

            $partner->update([
                'title' => $title,
                'image' => 'storage/'.$path
            ]);

        }else{

            $partner->update(['title' => $title]);

        }

        return redirect()->to('/dashboard');
    }

    public function destroy($id)
    {
        Partner::destroy($id);

        return redirect()->to('/dashboard');
    }

    public function deletedPartner()
    {
        $partners = Partner::onlyTrashed()->get();

        return view('partner.deleted')->with('partners', $partners);
    }

    public function restorePartner($id)
    {
        Partner::onlyTrashed()->find($id)->restore();

        return redirect()->to('/dashboard');
    }

    public function showProduct($partner_id)
    {
        $products = Partner::find($partner_id)->products;

        return view('product.products')->with(['products' => $products]);
    }

    public function showProductApi($partner_id)
    {
        $products = Partner::find($partner_id)->products;

        return response($products, 200);
    }
}
