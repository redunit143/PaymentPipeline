<?php
namespace app\PaymentGateways;

use App\Models\CardType;

/**
 *
 * @author daystrom
 *
 */
interface PaymentGatewayInterface
{
    public function whoAmI(): string;
    public function getCardType(): ?CardType;
}

