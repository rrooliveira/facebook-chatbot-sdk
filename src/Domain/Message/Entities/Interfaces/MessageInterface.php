<?php

declare(strict_types=1);

namespace App\Domain\Message\Entities\Interfaces;

interface MessageInterface
{
    public function __construct($recipientId);
    public function message(string $message): array;
}