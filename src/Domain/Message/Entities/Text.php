<?php

declare(strict_types=1);

namespace ChatBot\Domain\Message\Entities;

use ChatBot\Domain\Message\Entities\Interfaces\MessageInterface;

class Text implements MessageInterface
{
    private $recipientId;

    public function __construct($recipientId)
    {
        $this->recipientId = $recipientId;
    }

    public function message(string $message): array
    {
//        return [
//            'recipient' => [
//                'id' => $this->recipientId
//            ],
//            'message' => [
//                'text' => $message,
//                'metadata' => 'DEVELOPER_DEFINED_METADATA'
//            ]
//        ];

        return [
            "field" => "messages",
            "value" => [
                "sender" => [
                    "id" => "12334"
                ],
                "recipient" => [
                    "id" => $this->recipientId
                ],
                "timestamp" => time(),
                "message" => [
                    //"mid" => "test_message_id",
                    "text" => $message
                ]
            ]
        ];
    }
}