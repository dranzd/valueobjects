<?php

namespace ValueObjects\Tests\DateTime;

use ValueObjects\Tests\TestCase;
use ValueObjects\DateTime\Second;

class SecondTest extends TestCase
{
    public function testFromNative()
    {
        $fromNativeSecond  = Second::fromNative(13);
        $constructedSecond = new Second(13);

        $this->assertTrue($fromNativeSecond->sameValueAs($constructedSecond));
    }

    public function testNow()
    {
        $second = Second::now();
        $this->assertEquals(\intval(date('s')), $second->toNative());
    }

    /**
     * @expectedException ValueObjects\Exception\InvalidNativeArgumentException
     * @expectedExceptionMessage Argument "60" is invalid. Allowed types for argument are "int (>=0, <=59)".
     */
    public function testInvalidSecond()
    {
        new Second(60);
    }

}
