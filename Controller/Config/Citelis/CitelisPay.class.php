<?php
namespace Controller\Config\Citelis;
require_once ATS_35 . '/Controller/Config/Citelis/payline_sdk/vendor/autoload.php';
use Payline\PaylineSDK;
class CitelisPay
{
    const STATUS_ACCEPTED = '00000';
    const VERSION         = '26';
    const SECURITY_MODE   = 'SSL';
    const CARD_TEST       = '4970200000000012';
    const CURRENCY        = 978;

    private $merchantId;
    private $accessKey;
    private $contractNumber;
    private $paymentMode;
    private $paymentUrl;
    private $token;
    private $paylineSDK;

    public function __construct()
    {
        $this->merchantId     = '25550959258721';
        $this->accessKey      = 'eax6N2fZ8cNj7Fk8VjY0';
        $this->contractNumber = '0406257';
        $this->paymentMode    = 'CPT';
        $this->paylineSDK     = new PaylineSDK(
            $this->merchantId,
            $this->accessKey,
            null, null,
            null, null,
            // PaylineSDK::ENV_PROD,
            PaylineSDK::ENV_HOMO,
            null,
            null,
            null,
            "Europe/Paris"
        );
    }

    // public function start()
    // {
    //     $this->callDopayement();
    // }

    public function callDopayement($datas)
    {
        // $pageId      = 'Tz8rizeRwUhOs3sZVH3O';

        // create an instance

        $doWebPaymentRequest = array();

        $doWebPaymentRequest['version']         = self::VERSION;
        $doWebPaymentRequest['securityMode']    = self::SECURITY_MODE;
        $doWebPaymentRequest['cancelURL']       = $datas['cancelURL'];
        $doWebPaymentRequest['returnURL']       = $datas['returnURL'];
        $doWebPaymentRequest['notificationURL'] = $datas['notificationURL'];
        // $doWebPaymentRequest['customPaymentPageCode'] = $pageId;

        // PAYMENT
        $datas['payment']['mode']       = $this->paymentMode;
        $doWebPaymentRequest['payment'] = $datas['payment'];

        // ORDER
        $doWebPaymentRequest['order'] = $datas['order'];

        // CONTRACT NUMBERS
        $doWebPaymentRequest['contracts']                 = [$this->contractNumber];
        $doWebPaymentRequest['payment']['contractNumber'] = $this->contractNumber;

        $doWebPaymentResponse = $this->paylineSDK->doWebPayment($doWebPaymentRequest);
        if (empty($doWebPaymentResponse['result'])) {
            //ERROR
            return;
        }

        if (self::STATUS_ACCEPTED !== $doWebPaymentResponse['result']['code']) {
            echo $doWebPaymentResponse['result']['shortMessage'];
            return $doWebPaymentResponse['result'];
        }
        $this->token      = $doWebPaymentResponse['token'];
        $this->paymentUrl = $doWebPaymentResponse['redirectURL'];
        return $doWebPaymentResponse;
    }

    public function getTransactionDetails($datas)
    {
        // $getWebPaymentDetailsRequest['token'] = $_GET['token']; // web payment session unique identifier

        return $this->paylineSDK->getWebPaymentDetails($datas);
    }

    private function writeForm() {}

    public function token()
    {
        return $this->token;
    }

    public function paymentUrl()
    {
        return $this->paymentUrl;
    }

    public function isInitialised()
    {
        return !empty($this->token) && !empty($this->paymentUrl);
    }
}

