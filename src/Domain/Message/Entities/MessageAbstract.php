<?php

declare(strict_types=1);

namespace ChatBot\Domain\Message\Entities;

abstract class MessageAbstract
{
    protected $recipientId;
    protected $message;

    public function __construct(int $recipientId)
    {
        $this->recipientId = $recipientId;
    }

    public function setMessage(string $message): void
    {
        $this->message = filter_var($message, FILTER_SANITIZE_STRING);
    }

    abstract public function getMessage(): array;
}