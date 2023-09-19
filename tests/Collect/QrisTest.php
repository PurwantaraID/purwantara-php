<?php

use Purwantara\Purwantara\Collect\Qris;

beforeEach(function () {
    $token = getenv('PPN_TOKEN');
    $config = ['token' => $token];
    $this->qris = new Qris($config);
    $this->qrisData = [
        'amount' => 15000,
        'transaction_description' => 'Pembayaran Produk',
        'customer_email' => 'email@tokokami.tld',
        'customer_first_name' => 'Toko',
        'customer_last_name' => 'Kami',
        'customer_phone' => '081234567890',
        'payment_options_referral_code' => '',
        'payment_channel' => 'shopeepay',
        'additional_data' => '',
        'order_id' => 'ID-123456',
        'payment_method' => 'wallet',
        'merchant_trx_id' => 'ID-123456',
    ];
});

it('can create QRIS', function () {
    $response = $this->qris->create($this->qrisData);

    expect($response)->toHaveKeys(['status', 'success', 'data']);
});

it('can list QRIS', function () {
    $response = $this->qris->get();

    expect($response)->toHaveKeys(['status', 'success', 'data']);
});

it('can get QRIS inquiry', function () {
    $response = $this->qris->create($this->qrisData);
    $uuid = $response['data']['uuid'];
    $response = $this->qris->get($uuid);

    expect($response)->toHaveKeys(['status', 'success', 'data']);
});

afterEach(function () {
    Mockery::close();
});
