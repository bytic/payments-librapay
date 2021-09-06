<?php

namespace Paytic\Payments\Librapay\Message;

use Paytic\Omnipay\Librapay\Message\CompletePurchaseRequest as AbstractCompletePurchaseRequest;
use Paytic\Payments\Librapay\Message\Traits\CompletePurchaseTrait;

/**
 * Class PurchaseResponse
 * @package Paytic\Payments\Librapay\Message
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
