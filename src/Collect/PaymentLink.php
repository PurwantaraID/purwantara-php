<?php

namespace Purwantara\Purwantara\Collect;

use Purwantara\Purwantara\HttpClient;

class PaymentLink
{
    protected $httpClient;

    public function __construct($config)
    {
        $this->httpClient = new HttpClient($config);
    }

    public function create($data)
    {
        return $this->httpClient->sendRequest('POST', 'payment-link', $data);
    }

    public function get($uuid)
    {
        return $this->httpClient->sendRequest('GET', "payment-link/{$uuid}");
    }
}
