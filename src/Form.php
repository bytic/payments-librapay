<?php

namespace ByTIC\Payments\Librapay;

use ByTIC\Payments\Gateways\Providers\AbstractGateway\Form as AbstractForm;

/**
 * Class Form
 * @package ByTIC\Payments\Euplatesc
 */
class Form extends AbstractForm
{
    public function initElements()
    {
        $this->initElementSandbox();

        $this->addInput('merchant', 'Merchant');
        $this->addInput('merchantName', 'Merchant Name');
        $this->addInput('merchantEmail', 'Merchant Email');
        $this->addInput('merchantUrl', 'Merchant Url');
        $this->addInput('terminal', 'Terminal');
        $this->addInput('key', 'Key');
    }
}
