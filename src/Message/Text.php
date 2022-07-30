<?php

declare(strict_types=1);

namespace CodeBot\Message;

class Text
{
    private $recipientId;

    public function __construct($recipientId)
    {
        $this->recipientId = $recipientId;
    }

    public function Message(string $message): array
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