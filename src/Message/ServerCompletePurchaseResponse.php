<?php

namespace ByTIC\Payments\Librapay\Message;

use ByTIC\Omnipay\Librapay\Message\ServerCompletePurchaseResponse as AbstractServerCompletePurchaseResponse;
use ByTIC\Payments\Gateways\Providers\AbstractGateway\Message\Traits\CompletePurchaseResponseTrait;

/**
 * Class ServerCompletePurchaseResponse
 * @package ByTIC\Payments\Librapay\Message
 */
class ServerCompletePurchaseResponse extends AbstractServerCompletePurchaseResponse
{
    use CompletePurchaseResponseTrait;

    /** @noinspection PhpMissingParentCallCommonInspection
     * @return bool
     */
    protected function canProcessModel()
    {
        return true;
    }
}
