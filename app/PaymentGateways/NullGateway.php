<?php
namespace App\PaymentGateways;

/**
 *
 * @author daystrom
 *
 */
class NullGateway extends AbstractPaymentGateways implements PaymentGatewayInterface
{
    /**
     * This is never called as its the first object
     *
     * @return bool
     */
    public function hasValidRequest(): bool
    {
        return false;
    }

    public function createPaymentGateway(PaymentGatewayInterface $gateway): PaymentGatewayInterface
    {
        return new NullGateway();
    }

    public function whoAmI(): string
    {
        return NullGateway::class;
    }
}

