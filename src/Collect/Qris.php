<?php

namespace Purwantara\Purwantara\Collect;

use Purwantara\Purwantara\HttpClient;

class Qris
{
    protected $httpClient;

    public function __construct($config)
    {
        $this->httpClient = new HttpClient($config);
    }

    public function create($data)
    {
        return $this->httpClient->sendRequest('POST', 'qris', $data);
    }

    public function get($uuid = null)
    {
        return $uuid
            ? $this->httpClient->sendRequest('GET', "qris/inquiry/{$uuid}")
            : $this->httpClient->sendRequest('GET', 'qris/list');
    }
}
