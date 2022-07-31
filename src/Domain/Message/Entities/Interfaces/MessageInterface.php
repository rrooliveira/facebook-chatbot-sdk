<?php

declare(strict_types=1);

namespace ChatBot\Domain\Message\Entities\Interfaces;

interface MessageInterface
{
    public function __construct($recipientId);
    public function message(string $message): array;
}