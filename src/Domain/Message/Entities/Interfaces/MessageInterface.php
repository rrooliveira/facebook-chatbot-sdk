<?php

declare(strict_types=1);

namespace ChatBot\Domain\Message\Entities\Interfaces;

interface MessageInterface
{
    public function __construct(int $recipientId);
    public function message(string $message): array;
}