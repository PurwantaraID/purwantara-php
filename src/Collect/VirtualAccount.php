<?php

namespace Purwantara\Purwantara\Collect;

use Purwantara\Purwantara\HttpClient;

class VirtualAccount
{
    protected $httpClient;

    public function __construct($config)
    {
        $this->httpClient = new HttpClient($config);
    }

    public function create($data)
    {
        return $this->httpClient->sendRequest('POST', 'virtual-account', $data);
    }

    public function get($uuid = null)
    {
        return $uuid
            ? $this->httpClient->sendRequest('GET', "virtual-account/inquiry/{$uuid}")
            : $this->httpClient->sendRequest('GET', 'virtual-account/list');
    }

    public function cancel($uuid)
    {
        return $this->httpClient->sendRequest('POST', "virtual-account/cancel/{$uuid}");
    }
}
