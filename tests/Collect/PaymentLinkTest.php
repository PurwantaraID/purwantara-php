<?php

use Purwantara\Purwantara\Collect\PaymentLink;

beforeEach(function () {
    $token = $_ENV['PPN_TOKEN'];
    $config = ['token' => $token];
    $this->paymentLink = new PaymentLink($config);
    $rand = rand(11111, 99999);
    $this->paymentLinkData = [
        'amount' => '15000',
        'title' => 'Pembayaran',
        'description' => 'Testing Pembayaran',
        'expires_at' => date('Y-m-d\TH:i:sP', strtotime('+1 day')),
        'external_id' => 'ID-12345',
        'return_url' => 'https://google.com',
    ];
});

it('can create payment link', function () {
    $response = $this->paymentLink->create($this->paymentLinkData);

    expect($response)->toHaveKeys(['status', 'success', 'data']);
});

it('can get payment link inquiry', function () {
    $response = $this->paymentLink->create($this->paymentLinkData);
    $uuid = $response['data']['uuid'];
    $response = $this->paymentLink->get($uuid);

    expect($response)->toHaveKeys(['status', 'success', 'data']);
});
