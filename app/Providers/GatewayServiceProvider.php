<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\PaymentGateways\PaymentGatewayInterface;
use App\PaymentGateways\StripeGateway;
use Illuminate\Pipeline\Pipeline;
use App\PaymentGateways\NullGateway;
use App\PaymentGateways\BraintreeGateway;
use App\Models\CardType;

class GatewayServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(PaymentGatewayInterface::class, function ($app): PaymentGatewayInterface
        {
            $pipes = [
                StripeGateway::class,
                BraintreeGateway::class,
            ];
            // card_number_to_card_type() would be used here
            $objReturnedFromFunction = new CardType(CardType::MASTERCARD);
            $nullGateway = new NullGateway($objReturnedFromFunction);

            /**
             *
             * @var Pipeline $pipeline
             */
            $pipeline = $app[Pipeline::class];
            return $pipeline->send($nullGateway)->through($pipes)->thenReturn();
        });
    }
}
