<?php


use PHPUnit\Framework\TestCase;

class CountArgumentsTest extends TestCase
{
    public function testCountArguments()
    {
        $this->assertEquals(
            ['argument_count' => 0,
             'argument_values' => []
            ], countArguments()
        );

        $this->assertEquals(
            ['argument_count' => 1,
                'argument_values' => ['Hello World']
            ], countArguments('Hello World')
        );

        $this->assertEquals(
            ['argument_count' => 4,
                'argument_values' => ['Hello World', 123, true, []]
            ], countArguments('Hello World', 123, true, [])
        );
    }
}
