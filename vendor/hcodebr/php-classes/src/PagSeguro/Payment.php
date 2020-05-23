<?php

namespace Hcode\PagSeguro;

use Exception;
use DOMDocument;
use DOMElement;
use Hcode\PagSeguro\Payment\Method;

class Payment {//classz

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
        $this->reference = $reference;//Referencia é o número da sua loja
        $this->extraAmount = number_format($extraAmount, 2 , ".", "");

    }//__construct

    public function addItem(Item $item){//addItem

        array_push($this->items, $item);

    }//addItem

    public function setCreditCard(CreditCard $creditcard){//setCreditCard

        $this->creditCard = $creditcard;
        $this->method = Method::CREDIT_CARD;

    }//setCreditCard

    public function setBank(Bank $bank){//setBank

        $this->bank = $bank;
        $this->method = Method::DEBIT;

    }//setBank

    public function SetBoleto(){//SetBoleto

        $this->method = Method::BOLETO;

    }//SetBoleto

    public function getDOMDocument():DOMDocument{//getDOMDocument

        $dom = new DOMDocument("1.0", "ISO-8859-1");// Aqui já atribui os valores de prólogo



        return $dom;

    }//getDOMDocument
 
}//class