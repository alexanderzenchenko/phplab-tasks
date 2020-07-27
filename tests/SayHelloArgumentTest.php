<?php


use PHPUnit\Framework\TestCase;

class SayHelloArgumentTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected, sayHelloArgument($input));
    }

    public function positiveDataProvider()
    {
        return [
            [123, 'Hello 123'],
            ['World', 'Hello World'],
            [true, 'Hello 1'],
            [false, 'Hello '],
        ];
    }
}
