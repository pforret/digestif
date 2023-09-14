<?php

namespace Pforret\Digestif\Tests;

use Pforret\Digestif\Digestif;
use PHPUnit\Framework\TestCase;

class DigestifTest extends TestCase
{
    public function testFromArray()
    {
        $dig = new Digestif('test');
        $this->assertEquals('f9d8-d0b2', $dig->fromArray([0, 1, 2, 3, 4, 5]));
        $this->assertEquals('da49-327f', $dig->fromArray([]));
    }

    public function testFromString()
    {
        $dig = new Digestif('test');
        $this->assertEquals('88cd-2108', $dig->fromString('test'));
        $this->assertEquals('ad71-148c', $dig->fromString(''));
        $this->assertEquals('cee2-270e-b6ad', $dig->fromString('Lorem ipsum', 12));
    }

    public function testCompareDigest()
    {
        $dig = new Digestif('test');
        $this->assertFalse($dig->compareDigest('88cd-2108', '88CD-2108'));
        $this->assertFalse($dig->compareDigest('88cd2108', 'ww88cd 2108'));
        $this->assertTrue($dig->compareDigest('88cd-2108', '88cd-2108'));
        $this->assertTrue($dig->compareDigest('88cd2108', '88cd 2108'));
        $this->assertTrue($dig->compareDigest('88cd2108', '88cd-2108'));
    }
}
