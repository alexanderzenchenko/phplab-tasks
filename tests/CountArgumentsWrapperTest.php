<?php


use PHPUnit\Framework\TestCase;

class CountArgumentsWrapperTest extends TestCase
{
    function testCountArgumentsWrapper()
    {
        $this->expectException(InvalidArgumentException::class);
        countArgumentsWrapper("hello", true);
    }
}
