<?php

namespace ByTIC\Payments\Librapay\Message;

use ByTIC\Omnipay\Librapay\Message\PurchaseRequest as AbstractRequest;
use ByTIC\Payments\Librapay\Helper;

/**
 * Class PurchaseResponse
 * @package ByTIC\Payments\Librapay\Message
 */
class PurchaseRequest extends AbstractRequest
{
    /**
     * @inheritdoc
     */
    public function initialize(array $parameters = [])
    {
        if (isset($parameters['orderId'])) {
            $parameters['orderId'] = Helper::encodeOrderId($parameters['orderId']);
        }

        return parent::initialize($parameters);
    }
}
