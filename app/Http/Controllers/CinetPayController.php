<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CinetPayController extends Controller
{
    public function index()
    {
        return view('cinetpay');
    }

    public function Payment(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'currency' => 'required|string|max:3',
        ]);

        $transaction_id = date("YmdHis"); // Générer votre identifiant de transaction
        $transaction_id_full = "xeeweule-" . $transaction_id;

        $cinetpay_data = [
            "amount" => $request->input('amount'),
            "currency" => $request->input('currency'),
            "apikey" => env("APIKEY"),
            "site_id" => env("SITE_ID"),
            "secret_key" => env("SECRET"),
            "transaction_id" => $transaction_id_full,
            "description" => "TEST-Laravel",
            "return_url" => route('return_url'),
            "notify_url" => route('notify_url'),
            "metadata" => "user001",
            'customer_surname' => "Xeeweul",
            'customer_name' => "Express",
            'customer_email' => Auth::user()->email, // Récupérer l'email de l'utilisateur connecté
            'customer_phone_number' => '+221786609969',
            'customer_address' => '',
            'customer_city' => '',
            'customer_country' => 'Senegal',
            'customer_state' => '',
            'customer_zip_code' => ''
        ];

        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post('https://api-checkout.cinetpay.com/v2/payment', $cinetpay_data);

        $response_body = $response->json();

        if ($response->successful() && $response_body['code'] == '201') {
            $payment_link = $response_body["data"]["payment_url"];

            Storage::put("payments/{$transaction_id_full}.json", json_encode([
                'transaction_id' => $transaction_id_full,
                'amount' => $request->input('amount'),
                'currency' => $request->input('currency'),
                'status' => 'pending',
                'customer_email' => Auth::user()->email,
                'created_at' => now(),
            ]));
            $payment = new Payment([
                "transaction_id" => "xeeweule-" . $transaction_id,
                'amount' => $request['amount'],
                'currency' => $request['currency'],
                'status' => 'pending', // Vous pouvez modifier le statut selon votre logique
                'customer_email' => Auth::user()->email, // Récupérer l'email de l'utilisateur connecté
                'operator_id' => $response_body['data']['operator_id'] ?? null,
                'operator' => $response_body['data']['operator'] ?? null,
                'paid_amount' => $response_body['data']['amount'] ?? 100,
                'paid_currency' => $response_body['data']['currency'] ?? null,
                'payment_date' => $response_body['data']['payment_date'] ?? null,
            ]);
            $payment->save();

            return redirect($payment_link);
        } else {
            $error_message = $response_body['message'] ?? 'An error occurred during payment creation.';
            return back()->with('info', 'Error: ' . $error_message);
        }
    }

    // public function notify_url(Request $request)
    // {
    //     if ($request->has('cpm_trans_id')) {
    //         $transaction_id = $request->input('cpm_trans_id');

    //         $cinetpay_check = [
    //             "apikey" => env("APIKEY"),
    //             "site_id" => env("SITE_ID"),
    //             "transaction_id" => $transaction_id
    //         ];

    //         $response = $this->getPayStatus($cinetpay_check);
    //         $response_body = json_decode($response, true);

    //         if ($response_body['code'] == '00') {
    //             $payment_data = json_decode(Storage::get("payments/{$transaction_id}.json"), true);

    //             if ($payment_data) {
    //                 $payment = Payment::updateOrCreate(
    //                     ['transaction_id' => $transaction_id],
    //                     [
    //                         'amount' => $payment_data['amount'],
    //                         'currency' => $payment_data['currency'],
    //                         'status' => 'ACCEPTED',
    //                         'customer_email' => $payment_data['customer_email'],
    //                         'operator_id' => $response_body['data']['operator_id'] ?? null,
    //                         'operator' => $response_body['data']['operator'] ?? null,
    //                         'paid_amount' => $response_body['data']['amount'] ?? null,
    //                         'paid_currency' => $response_body['data']['currency'] ?? null,
    //                         'payment_date' => $response_body['data']['payment_date'] ?? null,
    //                         'created_at' => $payment_data['created_at'],
    //                         'updated_at' => now(),
    //                     ]
    //                 );

    //                 Storage::delete("payments/{$transaction_id}.json");
    //                 return response()->json(['status' => 'ACCEPTED']);
    //             } else {
    //                 return response()->json(['status' => 'error', 'message' => 'Payment data not found'], 404);
    //             }
    //         } else {
    //             return response()->json(['status' => 'error', 'message' => 'Transaction failed'], 400);
    //         }
    //     } else {
    //         return response()->json(['error' => 'cpm_trans_id not provided'], 400);
    //     }
    // }
    public function notify_url(Request $request)
    {
        // Validate the request has the necessary fields
        $request->validate([
            'cpm_trans_id' => 'required|string',
            'cpm_site_id' => 'required|string',
            // Add other necessary fields for validation if required
        ]);

        $transaction_id = $request->input('cpm_trans_id');
        $site_id = $request->input('cpm_site_id');

        // Verify HMAC token if necessary (assuming you have a function to do this)
        // $this->verifyHmacToken($request);

        // Check if payment already processed
        $payment = Payment::where('transaction_id', $transaction_id)->first();

        if ($payment && $payment->status == 'success') {
            // Payment already processed
            return response()->json(['status' => 'success', 'message' => 'Payment already processed']);
        }

        // Step 2: Call CinetPay API to verify transaction status
        $apiUrl = 'https://api-checkout.cinetpay.com/v2/payment/check';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'apikey' => env("APIKEY"),
        ])->post($apiUrl, [
            'site_id' => env("SITE_ID"),
            'transaction_id' => $transaction_id,
        ]);

        if ($response->successful()) {
            $response_body = $response->json();

            if ($response_body['code'] == '00') {
                // Payment successful, update payment record and deliver service
                $payment_data = [
                    'amount' => $response_body['data']['amount'],
                    'currency' => $response_body['data']['currency'],
                    'status' => 'success',
                    'operator_id' => $response_body['data']['operator_id'] ?? null,
                    'operator' => $response_body['data']['operator'] ?? null,
                    'paid_amount' => $response_body['data']['amount'] ?? null,
                    'paid_currency' => $response_body['data']['currency'] ?? null,
                    'payment_date' => $response_body['data']['payment_date'] ?? null,
                ];

                // Update payment in database
                Payment::updateOrCreate(
                    ['transaction_id' => $transaction_id],
                    $payment_data
                );

                // Deliver service (e.g., grant access, send email, etc.)
                $this->deliverService($transaction_id);

                return response()->json(['status' => 'success', 'message' => 'Payment processed successfully']);
            } else {
                // Handle failed transaction
                $payment->status = 'failed';
                $payment->save();
                return response()->json(['status' => 'error', 'message' => 'Transaction failed', 'error' => $response_body['message']]);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => 'Failed to verify transaction', 'error' => $response->body()]);
        }
    }
    public function fetchTransactions()
    {
        $apiUrl = 'https://app-new.cinetpay.com/transactions/payments';

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'apikey' => env("APIKEY"),
            'customer_country' => 'Senegal',
            'Business' => 'xeeweul-express',
        ])->get($apiUrl);

        if ($response->successful()) {
            $response_body = $response->json();

        if ($response_body['status'] === 'Accepted') {
                $transactions = $response_body['data'];

                foreach ($transactions as $transaction) {
                    $transaction_data = [
                        'Date_Creation' => $transaction['created_at'],
                        'Date_Paiement' => $transaction['payment_date'],
                        'Business' => $transaction['business'],
                        'Business_ID' => $transaction['business_id'],
                        'Opérateur' => $transaction['operator'] ?? 'N/A',
                        'ID_Transaction' => $transaction['transaction_id'],
                        'ID_Opérateur' => $transaction['operator_id'] ?? 'N/A',
                        'Téléphone' => $transaction['phone_number'] ?? 'N/A',
                        'Montant_payé' => $transaction['amount'],
                        'Devise' => $transaction['currency'],
                        'Sync' => 'Y',
                        'Statut' => $transaction['status'],
                        'Commentaire' => $transaction['comment'] ?? 'N/A',
                    ];

                    Storage::put("transactions/{$transaction['transaction_id']}.json", json_encode($transaction_data, JSON_PRETTY_PRINT));

                    $payment = Payment::where('transaction_id', $transaction['transaction_id'])->first();
                    if ($payment) {
                        $payment->status = 'success';
                        $payment->operator_id = $transaction['operator_id'] ?? null;
                        $payment->operator = $transaction['operator'] ?? null;
                        $payment->paid_amount = $transaction['amount'] ?? null;
                        $payment->paid_currency = $transaction['currency'] ?? null;
                        $payment->payment_date = $transaction['payment_date'] ?? null;
                        $payment->save();
                    }
                }

                return response()->json(['status' => 'success', 'message' => 'Transactions fetched and stored successfully']);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Failed to fetch transactions', 'error' => $response_body['message']]);
            }
        } else {
            $errorBody = $response->body();
            Log::error('Failed to fetch transactions from CinetPay API.', ['response' => $errorBody]);
            return response()->json(['status' => 'error', 'message' => 'Failed to fetch transactions', 'error' => $errorBody]);
        }
    }


    public function return_url(Request $request)
    {
        if ($request->has('transaction_id') || $request->has('token')) {
            $cinetpay_check = [
                "apikey" => env("APIKEY"),
                "site_id" => env("SITE_ID"),
                "secret_key" => env("SECRET"),
                "transaction_id" => $request->input('transaction_id')
            ];
            $response = $this->getPayStatus($cinetpay_check);
            $response_body = json_decode($response, true);
            if ($response_body['code'] == '00') {
                return back()->with('info', 'Félicitations, votre paiement a été effectué avec succès');
            } else {
                return back()->with('info', 'Échec, votre paiement a échoué');
            }
        } else {
            return back()->with('info', 'Transaction non fourni');
        }
    }

    private function getPayStatus($data)
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'apikey' => env("APIKEY"),
        ])->post('https://api-checkout.cinetpay.com/v2/payment/check', $data);

        if ($response->successful()) {
            return $response->body();
        } else {
            $errorBody = $response->body();
            Log::error('Failed to check payment status', ['response' => $errorBody]);
            return json_encode(['code' => 'error', 'message' => 'Failed to check payment status']);
        }
    }
}
