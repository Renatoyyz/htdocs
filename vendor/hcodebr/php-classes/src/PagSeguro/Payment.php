<?php

namespace Hcode\PagSeguro;

class Payment {//class

    private $mode = "default";
    private $currency = "BRL";
    private $extraAmount = 0;
    private $reference = "";
    private $items = [];
    private $sender;
    private $shipping;
    private $method;
    private $creditCard;
    private $bank;

    public function __construct(string $reference,Sender $sender, Shipping $shipping, float $extraAmount = 0 ){//__construct

        $this->sender = $sender;
        $this->shipping = $shipping;
        $this->reference = $reference;
        $this->extraAmount = number_format($extraAmount, 2 , ".", "");

    }//__construct

    public function getDOMDocument():DOMDocument{//getDOMDocument

        $dom = new DOMDocument("1.0", "ISO-8859-1");// Aqui já atribui os valores de prólogo



        return $dom;

    }//getDOMDocument
 
}//class