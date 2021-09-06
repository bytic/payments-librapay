<?php

namespace Paytic\Payments\Librapay\Message;

use Paytic\Omnipay\Librapay\Message\PurchaseRequest as AbstractRequest;
use Paytic\Payments\Librapay\Helper;

/**
 * Class PurchaseResponse
 * @package Paytic\Payments\Librapay\Message
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
