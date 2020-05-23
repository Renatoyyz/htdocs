<?php

use Hcode\Page;
use \GuzzleHttp\Client;
use Hcode\PagSeguro\Config;
use Hcode\PagSeguro\Transporter;
use Hcode\PagSeguro\Document;
use Hcode\PagSeguro\Phone;
use Hcode\PagSeguro\Address;
use Hcode\PagSeguro\Sender;
use Hcode\PagSeguro\Item;
use Hcode\PagSeguro\Payment;
use Hcode\PagSeguro\CreditCard;
use Hcode\PagSeguro\CreditCard\Holder;
use Hcode\PagSeguro\Shipping;
use Hcode\PagSeguro\CreditCard\Installment;

$app->post("/payment_duckbill/credit", function(){

    echo "Renato Oliveira";
    echo "</br>";
    var_dump($_POST);
    // // echo json_encode($_POST);
    //exit;

    $cpf = new Document(Document::CPF,$_POST['cpf']);
    $phone = new Phone($_POST['ddd'], $_POST['phone']);
    $shippingAddress = new Address(
        "M.M.D.C",
        "974",
        "N/A",
        "Pauliceia",
        "09690100",
        "São Bernardo do Campo",
        "SP",
        "Brasil"
    );
    $birthDate = new DateTime('01-01-1990');
    $sender = new Sender("Renato Oliveira",$cpf,$birthDate,$phone,"renato@renato.com", $_POST['hash']);
    $holder = new Holder("Renato Oliveira",$cpf,$birthDate,$phone);
    $shipping = new Shipping($shippingAddress,$_POST['totalamount'],Shipping::PAC);
    $installment = new Installment(1, $_POST['totalamount']);
    $billingAddress = new Address(
        "M.M.D.C",
        "974",
        "N/A",
        "Pauliceia",
        "09690100",
        "São Bernardo do Campo",
        "SP",
        "Brasil"
    );
    $creditCard = new CreditCard($_POST['token'],$installment,$holder,$billingAddress);

    $payment = new Payment("0001",$sender,$shipping);
    $item1 = new Item(1,"O produto 1", 123.45, 1.0);
    $item2 = new Item(2,"O produto 2", 34.50, 2.0);

    $payment->addItem($item1);
    $payment->addItem($item2);

    $payment->setCreditCard($creditCard);

    // $dom = new DOMDocument();
    $dom = $payment->getDOMDocument();

    // // $test = $creditCard->getDOMElement();

    // // $testNode = $dom->importNode($test, true);
    
    // // $dom->appendChild($testNode);

    echo $dom->saveXML();
    // echo "4";
    // exit;

});

//order.vltotal
$app->get('/payment_duckbill', function(){

    $order = [
        "vltotal"=>234.34,
        "cardBin"=>4111111111111111,
        "yearCard"=>2023,
        "mouthCard"=>3,
        "cpf"=>"44606396024",
        "ddd"=>11,
        "phone"=>988991100
    ];

    $page = new Page([
        "header"=>false,
        "footer"=>false
    ]);

	$page->setTpl("payment_duckbill", [
        "order"=>$order,
        "msgError"=>"Um erro qualquer",
        "pagseguro"=>[
            "urlJS"=>Config::getUrlJS(),
            "id"=>Transporter::createSession(),
            "maxInstallmentNoInterest"=>Config::MAX_INSTALLMENT_NO_INTEREST,
            "maxInstallment"=>Config::MAX_INSTALLMENT
        ]
    ]);
  
});

//order.vltotal
$app->get('/payment_duckbill/teste', function(){

    $client = new Client();

    $res = $client->request('POST', Config::getUrlSessions() . "?" . http_build_query(Config::getAuthentication()), [
        'verify'=>false
    ] );

   // echo $res->getStatusCode();
    
    echo $res->getBody()->getContents();
    // $page = new Page([
    //     "header"=>false,
    //     "footer"=>false
    // ]);

	// $page->setTpl("payment_duckbill");
    exit;
});