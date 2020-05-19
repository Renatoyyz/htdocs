<?php

namespace Hcode\PagSeguro;

class Item {//class

    private $id;
    private $description;
    private $amout;
    private $quantity;

    public function __construct(int $id, string $description,float $amout, float $quantity ){//__construct

        if ( !$id || !$id > 0 ){//if 1
            throw new Exception("Informe o ID do item.");
        }//if 1
        if ( !$description ){//if 2
            throw new Exception("Informe a descrição do item.");
        }//if 2
        if ( !$amount || !$amount > 0 ){//if 3
            throw new Exception("Informe o valor total do item.");
        }//if 3
        if ( !$quantity || !$quantity > 0 ){//if 4
            throw new Exception("Informa a quantidade do item.");
        }//if 4

        $this->id = $id;
        $this->description = $description;
        $this->amout = $amout;
        $this->quantity = $quantity;

    }//__construct

    public function getDOMElement():DOMElement{//getDOMElement

        $dom = new DOMDocument();

        $item = $dom->createElement("item");
        $item = $dom->appendChild($item);

        $description = $dom->createElement("description", $this->description);
        $description = $item->appendChild($description);

        $amount = $dom->createElement("amount", number_format($this->amount, 2, ".", "") );
        $amount = $item->appendChild($amount);

        $quantity = $dom->createElement("quantity", $this->quantity);
        $quantity = $item->appendChild($quantity);

        return $item;


    }//getDOMElement

 
}//class