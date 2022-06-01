<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->to('/login');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::middleware(['auth', 'admin'])->group(function (){

    Route::get('/dashboard', [PartnerController::class, 'index'])
        ->name('dashboard');

    Route::prefix('partner')->group(function (){

        Route::controller(PartnerController::class)->group(function (){

            Route::get('/edit/{id}','edit')->name('partner.edit');

            Route::patch('/update/{id}','update')->name('partner.update');

            Route::get('/create','create' )
                ->name('partner.create');

            Route::post('/store', 'store')
                ->name('partner.store');

            Route::delete('/delete/{id}', 'destroy')
                ->name('partner.delete');

            Route::get('/deletedPartner', 'deletedPartner')
                ->name('partner.deleted');

            Route::get('/restorePartner/{id}','restorePartner')->name('partner.restore');

            Route::get('/showProduct/{id}', 'showProduct')->name('partner.products');
        });

        Route::prefix('product')->group(function (){
            Route::controller(ProductController::class)->group(function (){

                Route::delete('/delete/{id}', 'destroy')->name('product.delete');

                Route::get('/edit/{id}', 'edit')->name('product.edit');

                Route::patch('/update/{id}', 'update')->name('product.update');

                Route::get('/create/{partner_id}','create')->name('product.create');

                Route::post('/store','store')->name('product.store');

                Route::get('/deleted', 'deleted')
                    ->name('product.deleted');

                Route::get('/restore/{id}','restore')->name('product.restore');
            });
        });

        Route::prefix('order')->group(function (){
            Route::controller(OrderController::class)->group(function (){

                Route::get('/index', 'index')->name('order.index');

                Route::get('/products/{id}', 'products')->name('order.products');
            });
        });
    });
});

Auth::routes();

