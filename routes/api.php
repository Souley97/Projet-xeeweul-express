<?php

use App\Http\Controllers\CinetPayController;
use App\Http\Controllers\PaytechController;
use App\Http\Controllers\SubscriptionController;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;



// Route::post('/paytech/ipn', function () {
//     $typeEvent = Input::get('type_event');
//     $customField = json_decode(Input::get('custom_field'), true);
//     $refCommand = Input::get('ref_command');
//     $itemName = Input::get('item_name');
//     $itemPrice = Input::get('item_price');
//     $currency = Input::get('devise');
//     $commandName = Input::get('command_name');
//     $env = Input::get('env');
//     $token = Input::get('token');
//     $apiKeySha256 = Input::get('api_key_sha256');
//     $apiSecretSha256 = Input::get('api_secret_sha256');

//     $myApiKey = env('PAYTECH_API_KEY'); // Remplacez par votre clé API PayTech définie dans le fichier .env
//     $myApiSecret = env('PAYTECH_API_SECRET'); // Remplacez par votre API Secret PayTech défini dans le fichier .env

//     // Vérifiez l'intégrité de la requête en comparant les hashs sha256 reçus avec ceux de votre clé API et API Secret
//     if (hash('sha256', $myApiSecret) === $apiSecretSha256 && hash('sha256', $myApiKey) === $apiKeySha256) {
//         // La notification provient bien de PayTech, vous pouvez traiter les informations ici

//         // Exemple de traitement : enregistrement dans la base de données, mise à jour du statut de la commande, etc.
//         // Par exemple, enregistrez ces informations dans la base de données si nécessaire

//         // Example: save to database
//         Payment::create([
//             'item_name' => $itemName,
//             'item_price' => $itemPrice,
//             'currency' => $currency,
//             'status' => 'completed', // Assuming the payment was successful
//             'ref_command' => $refCommand,
//             'ipn_type' => $typeEvent // You may want to save the IPN type for reference
//         ]);

//         // Répondre à PayTech avec un statut HTTP 200 OK
//         return response('IPN handled successfully', 200);
//     } else {
//         // Si les hashs sha256 ne correspondent pas, la requête n'est pas authentique
//         // Vous pouvez choisir de ne pas traiter la requête dans ce cas
//         return response('Unauthorized', 401);
//     }
// });

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

Route::post('/initiate-payment', [PaytechController::class, 'initiatePayment'])->name('paytech.payment');
Route::post('/paytech/ipn', [PaytechController::class, 'handleIpn'])->name('paytech.ipn');

Route::get('/paytech/success/{id}', [PaytechController::class, 'handleSuccess'])->name('paytech.success');
Route::get('/paytech/cancel', [PaytechController::class, 'handleCancel'])->name('paytech.cancel');

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


// Route::get('/cinetpay', [CinetPayController::class, 'index'])->name('cinetpay');
// Route::get('/transactions', [CinetPayController::class, 'getTransactions']);
// // Route::post('/notify-url', [CinetPayController::class, 'notify_url'])->name('notify_url');

// Route::post('/cinetpay', [CinetPayController::class, 'Payment'])->name('cinetpay.payment');
// Route::match(['get', 'post'], '/notify_url', [CinetPayController::class, 'notify_url'])->name('notify_url');
// Route::match(['get', 'post'], '/return_url', [CinetPayController::class, 'return_url'])->name('return_url');

// Route::get('/fetch', [CinetPayController::class, 'getTransactions'])->name('fetchTransactions');
// Route::get('/fetchA', [CinetPayController::class, 'fetchTransaction'])->name('fetchTransactions');
// Route::get('/store-transactions', [CinetPayController::class, 'storeTransactions']);



Route::middleware('auth:sanctum')->get('/api/ressource', function (Request $request) {
    return $request->user();
});
