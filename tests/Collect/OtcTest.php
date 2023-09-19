<?php

use Purwantara\Purwantara\Collect\Otc;

beforeEach(function () {
    $token = $_ENV['PPN_TOKEN'];
    $config = ['token' => $token];
    $this->otc = new Otc($config);
    $rand = rand(11111, 99999);
    $this->otcData = [
        'expected_amount' => '10000',
        'name' => 'Toko Kami',
        'description' => 'Pembayaran Produk',
        'expired_at' => date('Y-m-d\TH:i:sP', strtotime('+1 day')),
        'external_id' => 'ID-'.$rand,
        'payment_channel' => 'Alfamart',
        'merchant_trx_id' => 'ID-'.$rand,
    ];
});

it('can create OTC', function () {
    $response = $this->otc->create($this->otcData);

    expect($response)->toHaveKeys(['status', 'success', 'data']);
});

it('can list OTC', function () {
    $response = $this->otc->get();

    expect($response)->toHaveKeys(['status', 'success', 'data']);
});

it('can get OTC inquiry', function () {
    $response = $this->otc->create($this->otcData);
    $uuid = $response['data']['uuid'];
    $response = $this->otc->get($uuid);

    expect($response)->toHaveKeys(['status', 'success', 'data']);
});
