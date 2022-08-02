<?php

namespace ChatBot\Domain\Message\Services;

class SenderMessage
{
    private $event;

    public function __construct()
    {
        $event = file_get_contents("php://input");
        $event = json_decode($event, true, 512, JSON_BIGINT_AS_STRING);

        //$this->event = $event['entry'][0]['messaging'][0];

        $this->event = $event['value'];
    }

    public function getSenderId()
    {
        return $this->event['sender']['id'] ?? null;
    }

    public function getMessage()
    {
        return $this->event['message']['text'] ?? null;
    }

    public function getRecipientId()
    {
        return $this->event['recipient']['id'] ?? null;
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