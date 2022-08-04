<?php

declare(strict_types=1);

namespace ChatBot\Domain\Message\Entities;

use ChatBot\Domain\Message\Entities\Interfaces\MessageInterface;

class Audio extends MessageAbstract implements MessageInterface
{
    public function getMessage(): array
    {
        return [
            'recipient' => [
                'id' => $this->recipientId
            ],
            'message' => [
                'attachment' => [
                    'type' => 'audio',
                    'payload' => [
                        'url' => $this->message,
                        'is_reusable' => true
                    ]
                ]
            ]
        ];
    }
}