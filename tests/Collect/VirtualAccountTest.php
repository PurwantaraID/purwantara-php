<?php

use Purwantara\Purwantara\Collect\VirtualAccount;

beforeEach(function () {
    $token = $_ENV['PPN_TOKEN'];
    $config = ['token' => $token];
    $this->virtualAccount = new VirtualAccount($config);
    $this->virtualAccountData = [
        'expected_amount' => 10000,
        'name' => 'Testing',
        'bank' => 'CIMB',
        'description' => 'Pembayaran Produk',
        'expired_at' => date('Y-m-d\TH:i:sP', strtotime('+1 day')),
        'external_id' => 'ID-123456',
        'merchant_trx_id' => 'ID-123456',
    ];
});

it('can create virtual account', function () {
    $response = $this->virtualAccount->create($this->virtualAccountData);

    expect($response)->toHaveKeys(['status', 'success', 'data']);
});

it('can get virtual account list', function () {
    $response = $this->virtualAccount->get();

    expect($response)->toHaveKeys(['status', 'success', 'data']);
});

it('can get virtual account inquiry', function () {
    $response = $this->virtualAccount->create($this->virtualAccountData);
    $uuid = $response['data']['uuid'];
    $response = $this->virtualAccount->get($uuid);

    expect($response)->toHaveKeys(['status', 'success', 'data']);
});

it('can cancel virtual account', function () {
    $response = $this->virtualAccount->create($this->virtualAccountData);
    $uuid = $response['data']['uuid'];
    $response = $this->virtualAccount->get($uuid);

    expect($response)->toHaveKeys(['status', 'success']);
});
