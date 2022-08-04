<?php

declare(strict_types=1);

namespace ChatBot\Domain\Message\Entities;

use ChatBot\Domain\Message\Entities\Interfaces\MessageInterface;

class Text extends MessageAbstract implements MessageInterface
{
    public function getMessage(): array
    {
        return [
            'recipient' => [
                'id' => $this->recipientId
            ],
            'message' => [
                'text' => $this->message,
                //'is_reusable' => true
            ]
        ];
    }
}