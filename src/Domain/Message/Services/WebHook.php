<?php

namespace ChatBot\Domain\Message\Services;

class WebHook
{
    public function check(string $token)
    {
        $hubMode = filter_input(INPUT_GET, 'hub_mode');
        $hubVerifyToken = filter_input(INPUT_GET, 'hub_verify_token');

        echo "Token =>   $token  " . PHP_EOL;
        echo "Hub Mode => $hubMode " . PHP_EOL;
        echo "Hub Verify Token => $hubVerifyToken " . PHP_EOL;

        if ($hubMode === 'subscribe' && $hubVerifyToken === $token) {
            return filter_input(INPUT_GET, 'hub_challenge');
        }

        return false;
    }
}