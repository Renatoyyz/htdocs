<?php

namespace Hcode\PagSeguro;

class CreditCard {//class

    private $token;
    private $installment;
    private $holder;
    private $billingAddress;

    public function __construct(string $token,Installment $installment, Holder $holder, Address $billingAddress ){//__construct

            if(!$token){
                throw new Exception("Informe o token do cartão de crédito");
            }

        $this->token = $token;
        $this->installment = $installment;
        $this->holder = $holder;
        $this->billingAddress = $billingAddress;

    }//__construct

    public function getDOMElement():DOMElement{//getDOMElement

        $dom = new DOMDocument();

        $creditCard = $dom->createElement("creditCard");
        $creditCard = $dom->appendChild($creditCard);

        $token = $dom->createElement("token", $this->token);
        $token = $creditCard->appendChild($token);

        $installment = $this->installment->getDOMElement();
        $installment = $dom->importNode($installment, true);
        $installment = $creditCard->appendChild($installment);

        $holder = $this->holder->getDOMElement();
        $holder = $dom->importNode($holder, true);
        $holder = $creditCard->appendChild($holder);

        $biingAddress = $this->biingAddress->getDOMElement("biingAddress");
        $biingAddress = $dom->importNode($biingAddress, true);
        $biingAddress = $creditCard->appendChild($biingAddress);

        return $creditCard;


    }//getDOMElement

 
}//class