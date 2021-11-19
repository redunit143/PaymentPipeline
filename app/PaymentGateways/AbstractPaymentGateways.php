<?php

namespace app\PaymentGateways;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use App\Models\CardType;

abstract class AbstractPaymentGateways
{
    /**
     *
     * @var CardType
     */
    protected $cardType;

    abstract public function createPaymentGateway(PaymentGatewayInterface $gateway): PaymentGatewayInterface;

    abstract public function hasValidRequest(): bool;

    public function __construct(?CardType $cardType = null)
    {
        $this->cardType = $cardType;
    }

    /**
     *
     * @param PaymentGatewayInterface $gateway
     * @param Closure $next
     * @return PaymentGatewayInterface
     */
    public function handle(PaymentGatewayInterface $gateway, Closure $next): PaymentGatewayInterface
    {
        if (!$this->hasValidRequest()) {
            return $next($gateway);
        }

        return $this->createPaymentGateway($gateway);
    }

    public function getCardType(): ?CardType
    {
        return $this->cardType;
    }

    public function tokenise($cardInput)
    {
        return md5($cardInput);
    }

    public function charge($token, $amountInPence)
    {
        return [
            $this->whoAmI(),
            $this->getCardType()->getType(),
            $token,
            $amountInPence,
        ];
    }
}
