<?php

namespace Amulen\NpsBundle\Model\Client;

use Amulen\NpsBundle\Model\Exception\ApiException;
use Zend\Soap\Client;

/**
 * SoapClient
 */
class SoapClient extends \SoapClient
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $wsdl;

    /**
     * @var string
     */
    protected $merchantId;

    /**
     * @var string
     */
    protected $secretKey;

    public function __construct($wsdlUrl)
    {
        $this->wsdl = $wsdlUrl;
        parent::__construct($wsdlUrl, []);
    }


    /**
     * @param $method
     * @param array $params
     * @return mixed|null
     * @throws ApiException
     */
    public function call($method, $params = [])
    {
        $response = null;

        try {

            $params = $this->addExtraInf($params);

            if (!array_key_exists('psp_ClientSession', $params)) {
                $params = $this->addSecureHash($params, $this->getSecretKey());
            }

            $response = $this->__soapCall($method, [$params]);

        } catch (\Exception $e) {
            throw new ApiException($e->getMessage());
        }

        return $response;
    }

    function addExtraInf($params)
    {
        $params["psp_MerchantAdditionalDetails"] = array("SdkInfo" => "colocar aquio el lnar la version");
        return $params;
    }

    public function getOperations()
    {
        return $this->getClient()->getOptions();
    }

    /**
     * @param $params
     * @param $key
     * @return mixed
     */
    public function addSecureHash($params, $key)
    {
        ksort($params);
        $concatenated_data = $this->__concat_values($params);
        $concat_data_w_key = $concatenated_data . $key;
        $s_hash = md5($concat_data_w_key);
        $params["psp_SecureHash"] = $s_hash;
        return $params;
    }

    /**
     * @param $params
     * @return string
     */
    function __concat_values($params)
    {
        $concated_data = "";
        foreach ($params as $k => $v) {
            if (gettype($v) == 'array') {
                continue;
            }
            $concated_data = $concated_data . $v;
        }
        return $concated_data;
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        if (!$this->client) {
            $this->client = new Client($this->wsdl);
        }
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @return mixed
     */
    public function getWsdl()
    {
        return $this->wsdl;
    }

    /**
     * @param mixed $wsdl
     */
    public function setWsdl($wsdl)
    {
        $this->wsdl = $wsdl;
    }

    /**
     * @return string
     */
    public function getMerchantId(): string
    {
        return $this->merchantId;
    }

    /**
     * @param string $merchantId
     */
    public function setMerchantId(string $merchantId)
    {
        $this->merchantId = $merchantId;
    }

    /**
     * @return string
     */
    public function getSecretKey(): string
    {
        return $this->secretKey;
    }

    /**
     * @param string $secretKey
     */
    public function setSecretKey(string $secretKey)
    {
        $this->secretKey = $secretKey;
    }


}