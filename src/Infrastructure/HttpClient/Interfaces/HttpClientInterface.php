<?php

declare(strict_types=1);

namespace ChatBot\Infrastructure\HttpClient\Interfaces;

use Psr\Http\Message\ResponseInterface;

interface HttpClientInterface
{
    public function get(array $options = []): ResponseInterface;
    public function post(array $options = []): ResponseInterface;
    public function put(array $options = []): ResponseInterface;
}
