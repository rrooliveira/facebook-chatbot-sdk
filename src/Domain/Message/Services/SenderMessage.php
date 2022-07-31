<?php

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

    public function getSenderId()
    {
        return $this->event['sender']['id'] ?? null;
    }

    public function getMessage()
    {
        return $this->event['message']['text'] ?? null;
    }

    public function getPostBack()
    {
        if (isset($this->event['postback']['payload'])) {
            return $this->event['postback']['payload'];
        } elseif (isset($this->event['postback'])) {
            return $this->event['postback'];
        }
        return null;
    }
}