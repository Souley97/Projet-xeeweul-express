<?php

namespace App\Services;

use App\Models\Payment;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * Classe PayTech pour gérer les requêtes de paiement avec PayTech.
 */
class PayTech
{
    const URL = "https://paytech.sn";
    const PAYMENT_REQUEST_PATH = '/api/payment/request-payment';
    const PAYMENT_REDIRECT_PATH = '/payment/checkout/';

    private $apiKey;
    private $apiSecret;
    private $query = [];
    private $customeField = [];
    private $testMode = false;
    private $currency = 'XOF';
    private $refCommand = '';
    private $notificationUrl = [];

    public function __construct($apiKey, $apiSecret)
    {
        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;
    }

    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function setApiSecret($apiSecret)
    {
        $this->apiSecret = $apiSecret;
    }

    public function send()
    {
        $params = [
            'item_name' => $this->query['item_name'] ?? '',
            'item_price' => $this->query['item_price'] ?? '',
            'command_name' => $this->query['command_name'] ?? '',
            'ref_command' => $this->refCommand,
            'env' => ($this->testMode) ? 'test' : 'prod',
            'currency' => $this->currency,
            'ipn_url' => $this->notificationUrl['ipn_url'] ?? '',
            'success_url' => $this->notificationUrl['success_url'] ?? '',
            'cancel_url' => $this->notificationUrl['cancel_url'] ?? '',
            'custom_field' => json_encode($this->customeField),
        ];

        $rawResponse = self::post(self::URL . self::PAYMENT_REQUEST_PATH, $params, [
            "API_KEY: {$this->apiKey}",
            "API_SECRET: {$this->apiSecret}"
        ]);

        $jsonResponse = json_decode($rawResponse, true);

        if (array_key_exists('token', $jsonResponse)) {
            $query = '';

            return [
                'success' => 1,
                'token' => $jsonResponse['token'],
                'redirect_url' => self::URL . self::PAYMENT_REDIRECT_PATH . $jsonResponse['token'] . $query
            ];
        } else if (array_key_exists('error', $jsonResponse)) {
            return [
                'success' => -1,
                'errors' => $jsonResponse['error']
            ];
        } else {
            return [
                'success' => -1,
                'errors' => [
                    'Internal Error'
                ]
            ];
        }
    }

    private static function post($url, $data = [], $header = [])
    {
        $strPostField = http_build_query($data);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $strPostField);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array_merge($header, [
            'Content-Type: application/x-www-form-urlencoded;charset=utf-8',
            'Content-Length: ' . mb_strlen($strPostField)
        ]));

        return curl_exec($ch);
    }

    public function setQuery($query)
    {
        $this->query = $query;
        return $this;
    }

    public function setCustomeField($customeField)
    {
        if (is_array($customeField)) {
            $this->customeField = $customeField;
        }

        return $this;
    }

    public function setTestMode($testMode)
    {
        $this->testMode = $testMode;

        return $this;
    }

    public function setCurrency($currency)
    {
        $this->currency = strtolower($currency);
        return $this;
    }

    public function setRefCommand($refCommand)
    {
        $this->refCommand = $refCommand;

        return $this;
    }

    public function setNotificationUrl($notificationUrl)
    {
        $this->notificationUrl = $notificationUrl;
        return $this;
    }

  
}

