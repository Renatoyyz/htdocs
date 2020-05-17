<?php

namespace Hcode\PagSeguro;

use \GuzzleHttp\Client;


class Transporter {//class

    public static function createSession(){//func 1

    $client = new Client();
    $response = $client->request
            (
                'POST', 
                Config::getUrlSessions() . "?" . http_build_query(Config::getAuthentication()), 
                [
                    'verify'=>false
                ] 
            );
    
    $xml = simplexml_load_string( $response->getBody()->getContents() );
    return ((string)$xml->id);
    }//func 1

}//class