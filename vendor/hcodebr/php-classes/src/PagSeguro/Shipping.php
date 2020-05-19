<?php

namespace Hcode\PagSeguro;

class Shipping {//class

    const PAC = 1;
    const SEDEX = 2;
    const OTHER = 3;


    private $address;
    private $type;
    private $cost;
    private $addressRequired;

    public function __construct(Address $address,int $type, float $cost,bool $addressRequired = true){//__construct

        if($type < 1 || $type > 3){
            throw new Exception("Informe um tipo de frete válido.");
        }

        $this->$address = $address;
        $this->$type = $type;
        $this->$cost = $cost;
        $this->$addressRequired = $addressRequired;
        
    }//__construct

    public function getDOMElement():DOMElement{//getDOMElement

        $dom = new DOMDocument();

        $shipping = $dom->createElement("shipping");
        $shipping = $dom->appendChild($shipping);

        $address = $this->address->getDOMElement();
        $address = $dom->importNode($address, true);
        $address = $documents->appendChild($address);

        $cost = $dom->createElement("cost", number_format($this->cost, 2, ".", "") );
        $cost = $shipping->appendChild($cost);

        $type = $dom->createElement("type", $this->type);
        $type = $shipping->appendChild($type);

        $addressRequired = $dom->createElement("addressRequired", ($this->addressRequired) ? "true" : "false");
        $addressRequired = $shipping->appendChild($addressRequired);

        return $shipping;


    }//getDOMElement

 
}//class