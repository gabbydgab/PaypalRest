<?php
/**
 * Created by PhpStorm.
 * User: skadabr
 * Date: 9/25/13
 * Time: 4:29 PM
 */
namespace Payum\Paypal\Rest;

use Payum\Payment;
use Payum\Extension\EndlessCycleDetectorExtension;
use Payum\Paypal\Rest\Action\CaptureAction;
use Payum\Paypal\Rest\Action\StatusAction;
use PayPal\Rest\ApiContext;

abstract class PaymentFactory
{
    /**
     * @param ApiContext $api
     *
     * @return \Payum\Payment
     */
    public static function create(ApiContext $api)
    {
        $payment = new Payment;

        $payment->addApi($api);

        $payment->addExtension(new EndlessCycleDetectorExtension);

        //$payment->addAction(new CaptureAction);
        //$payment->addAction(new StatusAction);

        return $payment;
    }

    /**
     */
    private  function __construct()
    {
    }
}