<?php

declare(strict_types=1);

namespace App\Message;

class Text implements MessageInterface
{
    private $recipientId;

    public function __construct($recipientId)
    {
        $this->recipientId = $recipientId;
    }

    public function message(string $message): array
    {
        return [
            'recipient' => [
                'id' => $this->recipientId
            ],
            'message' => [
                'text' => $message,
                'metadata' => 'DEVELOPER_DEFINED_METADATA'
            ]
        ];
    }
}