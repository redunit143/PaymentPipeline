<?php

namespace App\Models;

class CardType
{
    const VISA = 'visa';
    const MASTERCARD = 'mastercard';
    const AMEX = 'amex';

    private string $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    public function getType(): string
    {
        return $this->type;
    }
}
