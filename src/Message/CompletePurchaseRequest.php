<?php

namespace ByTIC\Payments\Librapay\Message;

use ByTIC\Omnipay\Librapay\Message\CompletePurchaseRequest as AbstractCompletePurchaseRequest;
use ByTIC\Payments\Librapay\Message\Traits\CompletePurchaseTrait;

/**
 * Class PurchaseResponse
 * @package ByTIC\Payments\Librapay\Message
 */
class CompletePurchaseRequest extends AbstractCompletePurchaseRequest
{
    use CompletePurchaseTrait;

    /**
     * @inheritdoc
     */
    protected function parseNotification()
    {
        if ($this->validateModel()) {
            $model = $this->getModel();
            $this->updateParametersFromPurchase($model);
        }

        return parent::parseNotification();
    }
}
