<?php

declare(strict_types=1);

namespace PSR7SessionEncodeDecodeTest;

use PHPUnit_Framework_TestCase;
use PSR7SessionEncodeDecode\Decoder;

class DecodeTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Decoder
     */
    private $decoder;

    public function setUp()
    {
        parent::setUp();

        $this->decoder = new Decoder();
    }
    /**
     * @test
     * @dataProvider provideEncodeAndExpectedDecodedData
     */
    public function it_should_decode_data_correctly(string $encodedString, $expected): void
    {
        $actual = $this->decoder->__invoke($encodedString);

        self::assertSame($expected, $actual);
    }

    public function provideEncodeAndExpectedDecodedData() : array
    {
        return [
            [
                'counter|i:0;',
                ['counter' => 0]
            ],
            [
                'product_code|s:4:"2222";logged_in|s:3:"yes";',
                [
                    'product_code' => '2222',
                    'logged_in' => 'yes',
                ]
            ],
        ];
    }
}
