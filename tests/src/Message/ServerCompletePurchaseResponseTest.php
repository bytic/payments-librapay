<?php

namespace Paytic\Payments\Librapay\Tests\Message;

use Paytic\Payments\Librapay\Message\ServerCompletePurchaseRequest;
use Paytic\Payments\Librapay\Message\ServerCompletePurchaseResponse;
use ByTIC\Payments\Tests\AbstractTest;
use ByTIC\Payments\Tests\Gateways\Message\ServerCompletePurchaseResponseTrait;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ServerCompletePurchaseResponseTest
 * @package Paytic\Payments\Librapay\Tests\Message
 */
class ServerCompletePurchaseResponseTest extends AbstractTest
{
    use ServerCompletePurchaseResponseTrait;

    public function test_send()
    {
        $response = $this->getNewResponse(
            [
                'notification' => ['rc' => '00']
            ]
        );

        static::assertSame('1', $response->getContent());
    }

    /**
     * @return ServerCompletePurchaseResponse
     */
    protected function getNewResponse($data = [])
    {
        $request = new ServerCompletePurchaseRequest($this->client, new Request());

        return new ServerCompletePurchaseResponse($request, $data);
    }
}
