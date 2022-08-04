<?php

namespace integration\Domain\Templates\Entites;

use ChatBot\Domain\Template\Entities\Button;
use ChatBot\Domain\Template\Entities\ButtonTemplate;
use PHPUnit\Framework\TestCase;

class ButtonTemplateTest extends TestCase
{
    /**
     * @test
     */
    public function shouldReturnButtonWithPostbackType()
    {
        $button = new Button('postback', 'Title New Button', 'response', []);
        $buttonTemplate = new ButtonTemplate(123);
        $buttonTemplate->add($button);
        $buttonTemplate->setMessage('Template example with buttons.');
        $actual = $buttonTemplate->getMessage();

        $expected = [
            'recipient' => [
                'id' => 123
            ],
            'message' => [
                'attachment' => [
                    'type' => 'template',
                    'payload' => [
                        'template_type' => 'button',
                        'text' => 'Template example with buttons.',
                        'buttons' => [
                            [
                                'type' => 'postback',
                                'title' => 'Title New Button',
                                'payload' => 'response'
                            ]
                        ]
                    ]
                ]
            ]
        ];

        $this->assertEquals($expected, $actual);

    }
}