<?php

namespace Dohnaseek;

class PayDashClient {
    
    public $PayDashApiKey = "";
    public $PayDashMetaData = "";
    public $PayDashIPN = "";
    public $PayDashReturnURL = "";
    public $PayDashAmount = "";
    public $PayDashCustomerEmail = "";

    function __construct($apiKey){
        $this->PayDashApiKey = $apiKey;
    }

    function setAmount($amount){
        $this->PayDashAmount = $amount;
    }

    function setIPN($ipn){
        $this->PayDashIPN = $ipn;
    }

    function setReturnURL($returnURL){
        $this->PayDashReturnURL = $returnURL;
    }

    function setCustomerEmail($customerEmail){
        $this->PayDashCustomerEmail = $customerEmail;
    }

    function setMetaData($metadata){
        $this->PayDashMetaData = $metadata;
    }

    function execute(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://paydash.co.uk/api/merchant/create");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array("apiKey" => $this->PayDashApiKey, "email" => $this->PayDashCustomerEmail, "amount" => $this->PayDashAmount, "webhookURL" => $this->PayDashIPN, "returnURL" => $this->PayDashReturnURL, "metadata" => $this->PayDashMetaData)));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $so = curl_exec($ch);
        curl_close ($ch);

        $obj = json_decode($so);
        $status = $obj->status;
        if($status == "success"){
            return $obj->response;
        } else {
            throw new Exception("API Error");
        }
    }

}

?>
