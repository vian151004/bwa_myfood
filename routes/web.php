<?php

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\QrController;
use App\Http\Middleware\CheckTableNumber;
use App\Livewire\Pages\AllFoodPage;
use App\Livewire\Pages\CartPage;
use App\Livewire\Pages\CheckoutPage;
use App\Livewire\Pages\DetailPage;
use App\Livewire\Pages\FavoritePage;
use App\Livewire\Pages\PromoPage;
use App\Livewire\Pages\HomePage;
use App\Livewire\Pages\PaymentFailurePage;
use App\Livewire\Pages\PaymentSuccessPage;
use App\Livewire\Pages\ScanPage;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;


Route::middleware(CheckTableNumber::class)->group(function () {
    // Home || Beranda
    Route::get('/', HomePage::class)->name('home');
    // 
});

Route::group([
    'middleware' => [CheckTableNumber::class],
    'prefix' => '/food'
], function () {    
    // Semua Makanan
    Route::get('/', AllFoodPage::class)->name('product.index');

    // Fav Food
    Route::get('/favorite', FavoriteFood::class)->name('product.favorite');

    // Promo
    Route::get('/promo', PromoPage::class)->name('product.promo');

    // Detail Makanan
    Route::get('/{id}', DetailPage::class)->name('product.detail');
});

Route::middleware(CheckTableNumber::class)->controller(TransactionController::class)->group(function () {
    // Cart
    Route::get('/cart', CartPage::class)->name('payment.cart');
    Route::post('/checkout', CheckoutPage::class)->name('payment.checkout');

    // Payment Proccess
    Route::middleware('throttle:10,1')->post('/payment', 'handlePayment')->name('payment');
    Route::get('/payment', function(){
        abort(404);
    });

    // Payment Status
    Route::get('/payment/status/{id}', 'paymenntStatus')->name('payment.status');
    Route::get('/payment/success', PaymentSuccessPage::class)->name('payment.success');
    Route::get('/payment/failure', PaymentFailurePage::class)->name('payment.failure');
    
});

// Webhook update payment status
Route::post('/payment/webhook', [TransactionController::class, 'handleWebhook'])->name('payment.webhook');

Route::controller(QrController::class)->group(function () {
    Route::post('/store-qr-result', 'storeQrResult')->name('product.scan.store');
    // Scan QR Code
    Route::get('/scan', ScanPage::class)->name('product.scan');
    Route::get('/{tableNumber}', 'checkCode')->name('product.scan.table');
});