<?php

declare(strict_types=1);

namespace CodeBot\Message;

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
        $actual = $text->message('Hello World!');

        $expected = [
            'recipient' => [
                'id' => 1
            ],
            'message' => [
                'text' => 'Hello World!',
                'metadata' => 'DEVELOPER_DEFINED_METADATA'
            ]
        ];

        $this->assertEquals($expected, $actual);
    }
}