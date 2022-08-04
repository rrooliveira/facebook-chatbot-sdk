<?php

declare(strict_types=1);

namespace ChatBot\Domain\Template\Entities\Interfaces;

interface ButtonTemplateInterface
{
    public function __construct(int $recipientId);

    public function setMessage(string $message): void;

    public function getMessage(): array;

    public function add(ButtonInterface $button):void;
}