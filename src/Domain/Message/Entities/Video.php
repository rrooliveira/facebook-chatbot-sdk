<?php

declare(strict_types=1);

namespace App\Domain\Message\Entities;

use App\Domain\Message\Entities\Interfaces\MessageInterface;

class Video implements MessageInterface
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
                'attachment' => [
                    'type' => 'video',
                    'payload' => [
                        'url' => $message
                    ]
                ]
            ]
        ];
    }
}