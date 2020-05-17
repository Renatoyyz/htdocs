<?php

namespace Hcode\PagSeguro;

class Config {//class

    const SANDBOX = true;

    const SANDBOX_EMAIL = "desenvolvimento@witcare.com.br";
    const PRODUCTION_EMAIL = "desenvolvimento@witcare.com.br";
    
    const SANDBOX_TOKEN = "BE25B897CD2849CABB5CDC483679BC6D";
    const PRODUCTION_TOKEN = "521e9df8-8c7d-4c22-934f-b002168afc1dc0a27a9d4e95a9d95bb13164b4bb1974bfd0-017a-4107-a628-3698660d9f7f";

    const SANDBOX_SESSIONS = "https://ws.sandbox.pagseguro.uol.com.br/v2/sessions";
    const PRODUCTION_SESSIONS = "https://ws.pagseguro.uol.com.br/v2/sessions";

    const SANDBOX_URL_JS = "https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js";
    const PRODUCTION_URL_JS = "https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js";

    public static function getAuthentication()
    {//func 1

        if( Config::SANDBOX === true )
        {//if 1

            return [
                "email"=>Config::SANDBOX_EMAIL,
                "token"=>Config::SANDBOX_TOKEN
            ];

        }//if 1
          else{//else 1
            return [
                "email"=>Config::PRODUCTION_EMAIL,
                "token"=>Config::PRODUCTION_TOKEN
            ];
          }//else 1

    }//func 1

    public static function getUrlSessions():string
    {//func 2
        
        return ( Config::SANDBOX === true ) ? Config::SANDBOX_SESSIONS : Config::PRODUCTION_SESSIONS;

    }//func 2

    public static function getUrlJS()
    {//func 3

        return ( Config::SANDBOX === true ) ? Config::SANDBOX_URL_JS : Config::PRODUCTION_URL_JS;

    }//func 3

}//class

?>



