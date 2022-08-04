<?php

declare(strict_types=1);

namespace ChatBot\Domain\Template\Entities\Interfaces;

interface ButtonInterface
{
    public function __construct(string $type, ?string $title, ?string $value, array $config);
    public function getButton(): array;
}