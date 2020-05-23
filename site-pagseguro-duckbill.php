<?php

use Hcode\Page;
use \GuzzleHttp\Client;
use Hcode\PagSeguro\Config;
use Hcode\PagSeguro\Transporter;

$app->post("/payment_duckbill/credit", function(){

    echo("Renato Oliveira");
    
    // exit;

    var_dump($_POST);
    // // echo json_encode($_POST);
    //exit;

});

//order.vltotal
$app->get('/payment_duckbill', function(){

    $order = [
        "vltotal"=>234.34,
        "cardBin"=>4111111111111111,
        "yearCard"=>2023,
        "mouthCard"=>3,
        "cpf"=>"44606396024"
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