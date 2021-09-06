<?php

namespace Paytic\Payments\Librapay\Tests;

use Paytic\Omnipay\Librapay\Message\ServerCompletePurchaseResponse;
use Paytic\Payments\Librapay\Gateway;
use Paytic\Payments\Librapay\Tests\Fixtures\Records\LibrapayMethodData;
use ByTIC\Payments\Tests\Fixtures\Records\PaymentMethods\PaymentMethod;
use ByTIC\Payments\Tests\Gateways\GatewayTest as AbstractGatewayTest;

/**
 * Class GatewayTest
 * @package Paytic\Payments\Librapay\Tests
 */
class GatewayTest extends AbstractGatewayTest
{
    public function testIsActive()
    {
        $gateway = new Gateway();
        self::assertFalse($gateway->isActive());

        $gateway->setMerchant('999999');
        $gateway->setTerminal('999999');
        $gateway->setKey('999999');
        $gateway->setMerchantName('999999');
        $gateway->setMerchantEmail('999999');

        self::assertFalse($gateway->isActive());

        $gateway->setMerchantUrl('9');

        self::assertFalse($gateway->isActive());

        $gateway->setMerchantUrl('999999');

        self::assertTrue($gateway->isActive());
    }

    public function testServerCompletePurchaseConfirmedResponse()
    {
        $httpRequest = LibrapayMethodData::getServerCompletePurchaseRequest();
        $response = $this->createServerCompletePurchaseResponse($httpRequest);

        self::assertTrue($response->isSuccessful());

        $content = $response->getContent();
        self::assertSame('1', $content);
    }

    /**
     * @param $request
     * @return ServerCompletePurchaseResponse
     */
    protected function createServerCompletePurchaseResponse($request)
    {
        /** @var ServerCompletePurchaseResponse $response */
        $response = $this->gatewayManager->detectItemFromHttpRequest(
            $this->purchaseManager,
            'serverCompletePurchase',
            $request
        );

        self::assertInstanceOf(ServerCompletePurchaseResponse::class, $response);

        return $response;
    }

    protected function setUp(): void
    {
        parent::setUp();

        /** @var PaymentMethod $paymentMethod */
        $paymentMethod = $this->purchase->getPaymentMethod();
        $paymentMethod->options = trim(LibrapayMethodData::getMethodOptions());

        $this->purchase->created = date('Y-m-d H:i:s');

        $this->gateway = $paymentMethod->getType()->getGateway();
    }
}
