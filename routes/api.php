<?php

use App\Http\Controllers\CinetPayController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});
Route::middleware('auth:sanctum')->get('/api', function (Request $request) {
    return $request->user();
});

Route::get('/payment-notification', function () {
    return view('subscription/payments/notification');
});

Route::get('/accepted-transactions', [SubscriptionController::class, 'showAcceptedTransactions']);


Route::post('/payment/notification', [SubscriptionController::class, 'handlePaymentNotification'])->name('payment.notification');
Route::get('/subscription/confirmation', [SubscriptionController::class, 'confirmation'])->name('subscription.confirmation');


Route::get('/cinetpay', [CinetPayController::class, 'index'])->name('cinetpay');
Route::get('/transactions', [CinetPayController::class, 'getTransactions']);
// Route::post('/notify-url', [CinetPayController::class, 'notify_url'])->name('notify_url');

Route::post('/cinetpay', [CinetPayController::class, 'Payment'])->name('cinetpay.payment');
Route::match(['get', 'post'], '/notify_url', [CinetPayController::class, 'notify_url'])->name('notify_url');
Route::match(['get', 'post'], '/return_url', [CinetPayController::class, 'return_url'])->name('return_url');

Route::get('/fetch', [CinetPayController::class, 'getTransactions'])->name('fetchTransactions');
Route::get('/fetchA', [CinetPayController::class, 'fetchTransaction'])->name('fetchTransactions');
Route::get('/store-transactions', [CinetPayController::class, 'storeTransactions']);



Route::middleware('auth:sanctum')->get('/api/ressource', function (Request $request) {
    return $request->user();
});
