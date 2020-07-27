<?php


use PHPUnit\Framework\TestCase;

class SayHelloArgumentWrapperTest extends TestCase
{
    public function testSayHelloArgumentWrapper()
    {
        $this->expectException(InvalidArgumentException::class);
        sayHelloArgumentWrapper([1, 2, 3]);
    }
}
