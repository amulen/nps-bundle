<?php

namespace Amulen\NpsBundle\Utils;

use Amulen\NpsBundle\Model\Soap\Operation;

/**
 * Class PaymentMethod
 */
class PaymentMethod
{
    /**
     * Payment options.
     * @return array
     */
    public static function getOptions()
    {
        $options = [];

        $options[] = [
            'id' => Operation::PRODUCT_VISA,
            'label' => "Visa",
        ];
        $options[] = [
            'id' => Operation::PRODUCT_MASTERCARD,
            'label' => "Mastercard",
        ];
        $options[] = [
            'id' => Operation::PRODUCT_AMERICAN_EXPRESS,
            'label' => "American Express",
        ];
        $options[] = [
            'id' => Operation::PRODUCT_DINERS,
            'label' => "Diners",
        ];


        return $options;
    }
}