<?php

namespace App\Http\Controllers;

use App\Events\OrderConfirm;
use App\Models\Order;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('order.orders')->with('orders', $orders);
    }

    public function products($id)
    {
        $products = Order::find($id)->products;
        return view('order.products')->with('products', $products);
    }

    public function create(Request $request)
    {

        $request->validate([
            'product_id' => 'required|array',
            'product_id.*' => 'exists:products,id'
        ]);

        $token = PersonalAccessToken::findToken($request->bearerToken())->first();

        $user = $token->tokenable;

        $order = Order::create(['user_id' => $user->id]);

        $order->products()->attach($request->product_id);

        OrderConfirm::dispatch($order, $user);

        return response('Ordine effettuato', 200);
    }

    public function show(Request $request)
    {
        $token = PersonalAccessToken::findToken($request->bearerToken())->first();

        $user_id = $token->tokenable->id;

        $order_detail = Order::where('user_id', $user_id)->with('products')->get();

        $response = [
            'order_detail' => $order_detail
        ];

        return response($response, 200);
    }

}
