<?php

namespace ByTIC\Payments\Librapay\Message;

use ByTIC\Omnipay\Librapay\Message\ServerCompletePurchaseRequest as AbstractServerCompletePurchaseRequest;
use ByTIC\Payments\Librapay\Helper;
use ByTIC\Payments\Librapay\Message\Traits\CompletePurchaseTrait;

/**
 * Class ServerCompletePurchaseRequest
 * @package ByTIC\Payments\Librapay\Message
 */
class ServerCompletePurchaseRequest extends AbstractServerCompletePurchaseRequest
{
    use CompletePurchaseTrait;
}
