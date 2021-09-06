<?php

namespace Paytic\Payments\Librapay\Tests;

use Paytic\Payments\Librapay\Helper;
use ByTIC\Payments\Tests\AbstractTest;

/**
 * Class HelperTest
 * @package Paytic\Payments\Librapay\Tests
 */
class HelperTest extends AbstractTest
{
    public function testEncodeOrderId()
    {
        self::assertEquals(
            999999999999900089,
            Helper::encodeOrderId(89)
        );

        $testEncoded = Helper::encodeOrderId(44213);
        self::assertEquals(
            999999999999944213,
            $testEncoded
        );
        self::assertEquals(
            18,
            strlen($testEncoded)
        );
    }

    public function testDecodeOrderId()
    {
        self::assertEquals(
            89,
            Helper::decodeOrderId('999999999999900089')
        );
    }
}
