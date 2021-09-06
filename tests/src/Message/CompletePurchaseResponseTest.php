<?php

namespace Paytic\Payments\Librapay\Tests\Message;

use Paytic\Payments\Librapay\Message\CompletePurchaseRequest;
use Paytic\Payments\Librapay\Message\CompletePurchaseResponse;
use ByTIC\Payments\Tests\AbstractTest;
use ByTIC\Payments\Tests\Gateways\Message\CompletePurchaseResponseTestTrait;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CompletePurchaseResponseTest
 * @package Paytic\Payments\Librapay\Tests\Message
 */
class CompletePurchaseResponseTest extends AbstractTest
{
    use CompletePurchaseResponseTestTrait;

//    public function testSend()
//    {
//        $httpRequest = $this->generateRequestFromFixtures(
//            TEST_FIXTURE_PATH . '/requests/librapay/completePurchaseParams2.php'
//        );
//
//        $model = \Mockery::mock(PurchasableRecord::class)->makePartial();
//        $model->shouldReceive('getPaymentGateway')->andReturn(null);
//
//        $modelManager = \Mockery::mock(PurchasableRecordManager::class)->makePartial();
//        $modelManager->shouldReceive('findOne')->andReturn($model);
//
//        $request = new CompletePurchaseRequest($this->client, $httpRequest);
//        $request->setModelManager($modelManager);
//
//        $response = $request->send();
//
//        self::assertInstanceOf(CompletePurchaseResponse::class, $response);
//    }

    /**
     * @return CompletePurchaseResponse
     */
    protected function getNewResponse()
    {
        $request = new CompletePurchaseRequest($this->client, new Request());

        return new CompletePurchaseResponse($request, []);
    }
}
