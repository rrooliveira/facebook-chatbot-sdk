<?php

namespace integration\Infrastructure\HttpClient\Guzzle;

use ChatBot\Domain\Message\Entities\Text;
use ChatBot\Infrastructure\HttpClient\Guzzle\Guzzle;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\TestCase;

class GuzzleTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function shouldThrowsClientException()
    {
        $this->expectException(ClientException::class);

        $text = new Text(27);
        $text->setMessage('Testing...');
        $message = $text->getMessage();

        $httpClient = new Guzzle('abc123');
        $httpClient->post($message);
    }
}