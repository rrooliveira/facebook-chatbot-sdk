<?php

declare(strict_types=1);

namespace ChatBot\Domain\Template\Entities;

use ChatBot\Domain\Template\Entities\Interfaces\ButtonInterface;
use ChatBot\Domain\Template\Entities\Interfaces\ButtonTemplateInterface;

class ButtonTemplate implements ButtonTemplateInterface
{
    private $recipientId;
    protected $buttons = [];
    private $message;

    public function __construct(int $recipientId)
    {
        $this->recipientId = $recipientId;
    }

    public function add(ButtonInterface $button): void
    {
        $this->buttons[] = $button->getButton();
    }

    public function setMessage(string $message): void
    {
        $this->message = filter_var($message, FILTER_SANITIZE_STRING);
    }

    public function getMessage(): array
    {
        return [
            'recipient' => [
                'id' => $this->recipientId
            ],
            'message' => [
                'attachment' => [
                    'type' => 'template',
                    'payload' => [
                        'template_type' => 'button',
                        'text' => $this->message,
                        'buttons' => $this->buttons
                    ]
                ]
            ]
        ];
    }
}