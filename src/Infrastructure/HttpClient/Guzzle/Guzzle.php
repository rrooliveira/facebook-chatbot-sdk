<?php

declare(strict_types=1);

namespace ChatBot\Infrastructure\HttpClient\Guzzle;

use ChatBot\Infrastructure\HttpClient\Interfaces\HttpClientInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Guzzle implements HttpClientInterface
{
    const FACEBOOK_URL = 'https://graph.facebook.com/v14.0/me/messages?access_token=';
    private $client;
    private $facebookUri;

    public function __construct(string $facebookAccessToken)
    {
        $this->generateFacebookUri($facebookAccessToken);

        $this->client = new Client(['verify' => false]);
    }

    private function generateFacebookUri(string $facebookAccessToken) : void
    {
        $this->facebookUri = self::FACEBOOK_URL . $facebookAccessToken;
    }

    /**
     * @throws GuzzleException
     */
    public function get(array $options = []): ResponseInterface
    {

        return $this->client->get($this->facebookUri, $options);
    }

    /**
     * @throws GuzzleException
     */
    public function post(array $options = []): ResponseInterface
    {
        return $this->client->post($this->facebookUri, $options);
    }

    /**
     * @throws GuzzleException
     */
    public function put(array $options = []): ResponseInterface
    {
        return $this->client->put($this->facebookUri, $options);
    }
}
