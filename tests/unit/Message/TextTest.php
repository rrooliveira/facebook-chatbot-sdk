<?php

declare(strict_types=1);

namespace Message;

use ChatBot\Domain\Message\Entities\Text;
use PHPUnit\Framework\TestCase;

class TextTest extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function shouldReturnAnArrayElement()
    {
        $text = new Text(1);
        $text->setMessage('Hello World!');
        $actual = $text->getMessage();

        $expected = [
            'recipient' => [
                'id' => 1
            ],
            'message' => [
                'text' => 'Hello World!'
            ]
        ];

        $this->assertEquals($expected, $actual);
    }
}