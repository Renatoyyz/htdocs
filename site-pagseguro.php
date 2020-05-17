<?php 

use \Hcode\Page;
use \Hcode\Model\User;
use \Hcode\Model\Order;
use \GuzzleHttp\Client;
use \Hcode\PagSeguro\Config;

$app->get('/payment', function(){

    User::verifyLogin(false);

    $order = new Order();

    $order->getFromSession();

    $years = [];

    for ($y = date('Y'); $y < date('Y')+ 14; $y++)
    {
        array_push($years, $y);
    }

    $page = new Page();

    $page->setTpl("payment",[
        "order"=>$order->getValues(),
        "msgError"=>Order::getError(),
        "years"=>$years,
        "pagseguro"=>[
            "urlJS"=>Config::getUrlJS()
        ]
    ]);

});

$app->get('/payment/pagseguro', function() {

    echo "Renato: </br>";
    $client = new Client();
    $response = $client->request('POST', Config::getUrlSessions() . "?" . http_build_query(Config::getAuthentication()), 
            [
                'verify'=>false
            ] 
    );
    
    echo "Oliveira: </br>";

    // echo $response->getStatusCode(); // 200
    // echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
     echo $response->getBody()->getContents(); // '{"id": 1420053, "name": "guzzle", ...}'
    exit;

});