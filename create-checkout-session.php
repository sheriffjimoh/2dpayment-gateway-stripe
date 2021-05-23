<?php

require 'vendor/autoload.php';
\Stripe\Stripe::setApiKey('sk_test_51Ity7IHTPc2IsTFQ7pFfI7zN9WxJetobyaNlO0vUVrCeAQUZ7GFFnEqCjhrUTBADr9ci8cubPykUDowddWriIst900oXUq2gyk');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost/2dpayment-gateway/';



$checkout_session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'line_items' => [[
    'price_data' => [
      'currency' => 'usd',
      'unit_amount' => 2000,
      'product_data' => [
        'name' => 'Stubborn Attachments',
        'images' => ["https://i.imgur.com/xdbHo4E.png"],
      ],
    ],
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . 'success.html',
  'cancel_url' => $YOUR_DOMAIN . 'cancel.html',
]);

echo json_encode(['id' => $checkout_session->id ]);

