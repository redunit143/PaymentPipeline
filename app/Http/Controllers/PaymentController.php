<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaymentGateways\PaymentGatewayInterface;

class PaymentController extends Controller
{
    /**
     *
     * @var PaymentGatewayInterface
     */
    protected $paymentGateway;

    public function __construct(PaymentGatewayInterface $gateway)
    {
        $this->paymentGateway = $gateway;
    }

    public function index()
    {
        // This should be PaymentRequest
        $dummyRequest = new class {
            public $cardInput = 'cardInput';
            public $amountInPence = '999';
        };

        $token = $this->paymentGateway->tokenise($dummyRequest->cardInput);

        return $this->paymentGateway->charge($token, $dummyRequest->amountInPence);
    }
}
