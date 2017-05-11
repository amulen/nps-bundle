<?php

namespace Amulen\NpsBundle\Service;

use Amulen\NpsBundle\Model\Client\SoapClient;
use Amulen\NpsBundle\Model\Soap\Operation;
use NpsSDK\Configuration;


/**
 * Class PaymentService
 */
class PaymentService
{

    /**
     * @var SoapClient
     */
    private $client;

    /**
     * @param $params
     * @param $options
     * @return mixed|null
     */
    public function payOnline3p($params, $options)
    {
        $resp = $this->client->call(Operation::PAY_ONLINE_3P, $params, $options);
        return $resp;
    }

    /**
     * @param $params
     * @return mixed|null
     */
    public function simpleQueryTx($params)
    {
        $resp = $this->client->call(Operation::SIMPLE_QUERY_TX, $params);
        return $resp;
    }

    /**
     * @return SoapClient
     */
    public function getClient(): SoapClient
    {
        return $this->client;
    }

    /**
     * @param SoapClient $client
     */
    public function setClient(SoapClient $client)
    {
        $this->client = $client;
    }


    private function init()
    {
        $secretKey = 'QxOXjk1EptHlJn4yBs0iJlwcPUXarXkHS6nBpmOcddNwQRsZJsHccEC1ghaXCIpf';
        $merchantId = 'moderna';

        Configuration::environment(Constants::DEVELOPMENT_ENVIRONMENT);
        Configuration::secretKey($secretKey);

    }


}