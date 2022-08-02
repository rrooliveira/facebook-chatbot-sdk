<?php

declare(strict_types=1);

namespace ChatBot\Domain\Message\Services;

class SenderMessage
{
    private $event;

    public function __construct()
    {
        $event = file_get_contents("php://input");
        $event = json_decode($event, true, 512, JSON_BIGINT_AS_STRING);

        $this->event = $event['entry'][0]['messaging'][0];
    }

    public function getSenderId(): int
    {
        return (int)$this->event['sender']['id'];
    }

    public function getMessage(): string
    {
        return $this->event['message']['text'];
    }

    public function getRecipientId(): int
    {
        return (int)$this->event['recipient']['id'];
    }

    public function getPostBack()
    {
        if (empty($this->event['postback'])) {
            return null;
        } elseif (is_array($this->event['postback']) && !empty($this->event['postback']['payload'])) {
            return $this->event['postback']['payload'];
        }

        return $this->event['postback'];
    }
}