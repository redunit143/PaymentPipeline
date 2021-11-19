<?php
namespace App\PaymentGateways;

/**
 *
 * @author daystrom
 *
 */
class StripeGateway extends AbstractPaymentGateways implements PaymentGatewayInterface
{
    /**
     * Logic to determine if this is the correct Gateway
     * @return bool
     */
    public function hasValidRequest(): bool
    {
        return false;
    }

    public function createPaymentGateway(PaymentGatewayInterface $gateway): PaymentGatewayInterface
    {
        return new StripeGateway($gateway->getCardType());
    }

    public function whoAmI(): string
    {
        return self::class;
    }
}

