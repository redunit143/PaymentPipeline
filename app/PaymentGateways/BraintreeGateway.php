<?php
namespace App\PaymentGateways;

/**
 *
 * @author daystrom
 *
 */
class BraintreeGateway extends AbstractPaymentGateways implements PaymentGatewayInterface
{

    /**
     * Logic to determine if this is the correct Gateway
     * @return bool
     */
    public function hasValidRequest(): bool
    {
        return true;
    }

    public function createPaymentGateway(PaymentGatewayInterface $gateway): PaymentGatewayInterface
    {
        return new BraintreeGateway($gateway->getCardType());
    }

    public function whoAmI(): string
    {
        return BraintreeGateway::class;
    }
}

