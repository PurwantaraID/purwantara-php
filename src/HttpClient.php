<?php

namespace Purwantara\Purwantara;

use GuzzleHttp\Client;

class HttpClient
{
    protected $client;

    public function __construct($config)
    {
        $baseUri = (isset($config['is_sandbox']) and $config['is_sandbox'])
            ? 'https://sandbox-api.purwantara.id/v1/'
            : 'https://api.purwantara.id/v1/';

        $this->client = new Client([
            'http_errors' => false,
            'base_uri' => $baseUri,
            'headers' => [
                'Authorization' => 'Bearer '.$config['token'],
                'Accept' => 'application/json',
            ],
        ]);
    }

    public function sendRequest($method, $uri, $data = null)
    {
        try {
            $options = ['json' => $data];
            $response = $this->client->request($method, $uri, $options);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $response = json_decode($e->getResponse()->getBody(), true);
                throw new \Exception("Error from API: {$response['message']}", $e->getCode(), $e);
            } else {
                throw new \Exception("Error communicating with the API: {$e->getMessage()}", $e->getCode(), $e);
            }
        }
    }
}
