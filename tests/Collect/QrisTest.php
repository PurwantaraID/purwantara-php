<?php

use Purwantara\Purwantara\Collect\Qris;

beforeEach(function () {
    $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5MmU4YTk0MC05ZjU1LTQ1NzMtOTYwNC1lYjM4NWZhZmMxMzkiLCJqdGkiOiI3YWE3NGE1YTU5MWUxOWRiMjk2M2FmYThmOTViOWZlMmQwYjhhODg3ZDY0Mjc4NWY0OWY3YTQ1OWEwMjg1ZWE4M2EyNTM1OTkzMGYyYTFiYyIsImlhdCI6MTY5NTEwMDEzNS45MjA5NzksIm5iZiI6MTY5NTEwMDEzNS45MjA5ODMsImV4cCI6MTcyNjcyMjUzNS45MTE5MTIsInN1YiI6IjMwIiwic2NvcGVzIjpbInZpcnR1YWxfYWNjb3VudC1yZWFkIiwidmlydHVhbF9hY2NvdW50LXdyaXRlIiwiY2FyZC1yZWFkIiwiY2FyZC13cml0ZSIsImV3YWxsZXQtcmVhZCIsImV3YWxsZXQtd3JpdGUiLCJpbnZvaWNlLXJlYWQiLCJpbnZvaWNlLXdyaXRlIiwicGF5bWVudF9saW5rLXJlYWQiLCJwYXltZW50X2xpbmstd3JpdGUiXX0.r4o9dH6W1VZY6qFgbncTN84OyfkMHNxqdEaYcyJPM3KOHC-QuUSwCKKJfPDcraFyODn4MPPnecqocWAIar49PEFyUnXgiVecO5TP_3_S_x9465fp1hJL5vQY5-3hCpTqBii1Ns2-sGDYzJV2KuDDause5d4lnhT8nSD0Tl8ivwjEdED3Gg2ui6ZIBQJanj1_EFBFlb1bdguBhC4hOJCZEfy7agqUL8LgpJbki5FSesMTArKj-uB7bAZDZ67ugEX7xpiUzbpRXwavP9C0OKYsTauotVq-4ngOIxYy1ANAIC37MufGFY1u5e9GekkL3kgK02fAj5TQtidnu1laJudN8wEAB6d2oYYx_BVBHf9J6G_evLMyZ3mgeMHfAls0zoqueyqNUDVBuy9UbQMapO6PFNCTk9zGPLUqWl6l4ULDvN_tn6OTthqJ0rMKRsxzRm2lOFuOffywntE_aBTBFxydiI_azu2aOVT_yTYBoNjnbyW_AR7jy2qa4gJv8SkAvcC_jHoK1K1NbKmvfisRjh-8xXb9-av4g-vh40tAoXV9UY4c-aIVLNq57-o3ENGD-PmK7LQtUWqXBgqLtAYQBAJq14D-5onU6ClCgKlGRbuTxcVZ8Cj5incNEWWHmbUTcHzg3msXbYMbbwrf7Jisbb2PH_rGuNSubH1bNx85TpE7rTA';
    $config = ['token' => $token, 'is_sandbox' => true];
    $rand = rand(11111, 99999);
    $this->qris = new Qris($config);
    $this->qrisData = [
        'amount' => 1000,
        'transaction_description' => 'Pembayaran Produk',
        'customer_email' => 'email@tokokami.tld',
        'customer_first_name' => 'Toko',
        'customer_last_name' => 'Kami',
        'customer_phone' => '081234567890',
        // 'payment_options_referral_code' => '',
        'payment_channel' => 'qris_doku',
        //'additional_data' => '',
        'order_id' => 'PPNID-'.$rand,
        'payment_method' => 'wallet',
        'merchant_trx_id' => 'PPNID-'.$rand,
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
