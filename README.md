# PaymentPipeline

url: http://<laravel root>/payment


Logic in Gateway::hasValidRequest() is used to determine if the gateway is the correct one to be returned. We simply use true or false in this example to mimic the logic.

If StripeGateway::hasValidRequest() returns false the pipeline moves on to the next gateway in the pipeline.