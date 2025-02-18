<?php
//For more information please refer to https://github.com/checkout/checkout-sdk-php

use Checkout\\CheckoutApiException;
use Checkout\\CheckoutAuthorizationException;
use Checkout\\CheckoutSdk;
use Checkout\\Common\\Address;
use Checkout\\Common\\Country;
use Checkout\\Common\\Currency;
use Checkout\\Common\\CustomerRequest;
use Checkout\\Common\\Phone;
use Checkout\\Common\\Product;
use Checkout\\Environment;
use Checkout\\Payments\\BillingInformation;
use Checkout\\Payments\\Links\\PaymentLinkRequest;
use Checkout\\Payments\\PaymentRecipient;
use Checkout\\Payments\\ProcessingSettings;
use Checkout\\Payments\\RiskRequest;
use Checkout\\Payments\\ShippingDetails;
use Checkout\\Payments\\ThreeDsRequest;

$api = CheckoutSdk::builder()->staticKeys()
        ->environment(Environment::sandbox())
        ->secretKey("secret_key")
        ->build();

$phone = new Phone();
$phone->country_code = "+1";
$phone->number = "415 555 2671";

$address = new Address();
$address->address_line1 = "CheckoutSdk.com";
$address->address_line2 = "90 Tottenham Court Road";
$address->city = "London";
$address->state = "London";
$address->zip = "W1T 4TJ";
$address->country = Country::$GB;

$customerRequest = new CustomerRequest();
$customerRequest->email = "";
$customerRequest->name = "Name";

$billingInformation = new BillingInformation();
$billingInformation->address = $address;
$billingInformation->phone = $phone;

$shippingDetails = new ShippingDetails();
$shippingDetails->address = $address;
$shippingDetails->phone = $phone;

$recipient = new PaymentRecipient();
$recipient->account_number = "1234567";
$recipient->dob = "1985-05-15";
$recipient->last_name = "Last";
$recipient->zip = "12345";

$product = new Product();
$product->name = "Product";
$product->quantity = 1;
$product->price = 10;

$products = array($product);

$theeDsRequest = new ThreeDsRequest();
$theeDsRequest->enabled = false;
$theeDsRequest->attempt_n3d = false;

$processing = new ProcessingSettings();
$processing->aft = true;

$risk = new RiskRequest();
$risk->enabled = false;

$request = new PaymentLinkRequest();
$request->amount = 1000;
$request->reference = "reference";
$request->currency = Currency::$GBP;
$request->description = "Description";
$request->customer = $customerRequest;
$request->shipping = $shippingDetails;
$request->billing = $billingInformation;
$request->recipient = $recipient;
$request->processing = $processing;
$request->products = $products;
$request->risk = $risk;
$request->locale = "en-GB";
$request->three_ds = $theeDsRequest;
$request->capture = true;

try {
    $response = $api->getPaymentLinksClient()->createPaymentLink($request);
} catch (CheckoutApiException $e) {
    // API error
    $error_details = $e->error_details;
    $http_status_code = isset($e->http_metadata) ? $e->http_metadata->getStatusCode() : null;
} catch (CheckoutAuthorizationException $e) {
    // Bad Invalid authorization
}
