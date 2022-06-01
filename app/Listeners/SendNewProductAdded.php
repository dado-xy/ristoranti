<?php

namespace App\Listeners;

use App\Events\ProductAdded;
use App\Mail\NewProductMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SendNewProductAdded
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param \App\Events\ProductAdded $event
     * @return void
     */
    public function handle(ProductAdded $event)
    {
        $partner_id = $event->partner_id;

        $datas = DB::table('partners')
            ->join('products', 'products.partner_id', '=', 'partners.id')
            ->join('order_product', 'order_product.product_id', '=', 'products.id')
            ->join('orders', 'order_product.order_id', '=', 'orders.id')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->select('users.email','partners.title', 'users.name')
            ->where('partners.id', '=', $partner_id)
            ->groupBy('users.email', 'users.name', 'partners.title')
            ->get();

        foreach ($datas as $data) {
            Mail::to($data->email)->send(new NewProductMail($data->name, $data->title));
        }

    }
}
