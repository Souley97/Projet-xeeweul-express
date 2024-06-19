<?php

// app/Models/PaymentSuccessData.php

namespace App\Models;

class PaymentSuccessData
{
    public $itemName;
    public $itemPrice;
    public $currency;
    public $refCommand;
    public $userIp;
    public $userLang;
    public $paymentId;

    public function __construct(array $data)
    {
        // Assurez-vous que toutes les données requises sont présentes avant de les assigner
        $this->itemName = $data['item_name'] ?? null;
        $this->itemPrice = $data['item_price'] ?? null;
        $this->currency = $data['currency'] ?? null;
        $this->refCommand = $data['ref_command'] ?? null;
        $this->userIp = $data['user_ip'] ?? null;
        $this->userLang = $data['user_lang'] ?? null;
        $this->paymentId = uniqid(); // Générer un ID de paiement unique
    }

    public function isValid()
    {
        // Vérifiez que toutes les données requises sont présentes
        return $this->itemName && $this->itemPrice && $this->currency && $this->refCommand && $this->userIp && $this->userLang;
    }
}
