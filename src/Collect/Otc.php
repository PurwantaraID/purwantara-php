<?php

namespace Purwantara\Purwantara\Collect;

use Purwantara\Purwantara\HttpClient;

class Otc
{
    protected $httpClient;

    public function __construct($config)
    {
        $this->httpClient = new HttpClient($config);
    }

    public function create($data)
    {
        return $this->httpClient->sendRequest('POST', 'counter', $data);
    }

    public function get($uuid = null)
    {
        return $uuid
            ? $this->httpClient->sendRequest('GET', "counter/inquiry/{$uuid}")
            : $this->httpClient->sendRequest('GET', 'counter/list');
    }
}
