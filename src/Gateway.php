<?php

namespace ByTIC\Payments\Librapay;

use ByTIC\Omnipay\Librapay\Gateway as AbstractGateway;
use ByTIC\Payments\Gateways\Providers\AbstractGateway\Traits\GatewayTrait;
use ByTIC\Payments\Gateways\Providers\AbstractGateway\Traits\OverwriteServerCompletePurchaseTrait;
use ByTIC\Payments\Librapay\Message\PurchaseRequest;
use Omnipay\Common\Message\RequestInterface;

/**
 * Class Gateway
 * @package ByTIC\Payments\Librapay
 * @method \Omnipay\Common\Message\NotificationInterface acceptNotification(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface fetchTransaction(array $options = [])
 */
class Gateway extends AbstractGateway
{
    use GatewayTrait;
    use OverwriteServerCompletePurchaseTrait;

    /**
     * @inheritdoc
     * @return PurchaseRequest
     */
    public function purchase(array $parameters = []): RequestInterface
    {
        $parameters['endpointUrl'] = $this->getEndpointUrl();

        return $this->createRequestWithInternalCheck('PurchaseRequest', $parameters);
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        if (
            strlen($this->getMerchant()) > 5
            && strlen($this->getTerminal()) > 5
            && strlen($this->getKey()) > 5
            && strlen($this->getMerchantName()) > 5
            && strlen($this->getMerchantEmail()) > 5
            && strlen($this->getMerchantUrl()) > 5
        ) {
            return true;
        }

        return false;
    }
}
