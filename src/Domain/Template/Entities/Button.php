<?php

declare(strict_types=1);

namespace ChatBot\Domain\Template\Entities;

use ChatBot\Domain\Template\Entities\Interfaces\ButtonInterface;

class Button implements ButtonInterface
{
    private $title;
    private $type;
    private $value;
    private $config;

    public function __construct(string $type, ?string $title, ?string $value, array $config)
    {
        $this->type = $type;
        $this->title = $title;
        $this->value = $value;
        $this->config = $config;
    }

    public function getButton(): array
    {
        $data = [
            'type' => $this->type
        ];

        if ($this->title) {
            $data['title'] = $this->title;
        }

        if ($this->type === 'web_url') {
            $data['url'] = $this->value;
        }

        if ($this->type === 'postback' || $this->type === 'phone_number') {
            $data['payload'] = $this->value;
        }

        if ($this->type === 'share_contents') {
            if ($this->value) {
                $data['share_contents'] = $this->value;
            }
            unset($this->title);
        }

        return array_merge($data, $this->config);
    }
}