<?php
namespace Psr\Http\Message;

use Psr\Http\Message\ResponseInterface as ResponseInterface;

class Response implements ResponseInterface {

    private $response = [];

    
    public function withHeader($key,$value) { 
        $this->response["header"]
                                 [$key] = 
                                          $value;
        return $this;
    }

    public function withStatus($code) {
        $result_code = "";        
        
        switch ($code) {
            case 200:
                $result_code = "200 Ok";
                break;
            case 300:
                $result_code = "300 Redirect";
                break;
            case 404:
                $result_code = "404 Not found";
                break;
            case 500:
                $result_code = "500 Initial server error";
                break;
    
        }

        $this->response["header"]
                                ["status"] 
                                    = "HTTP 1.1 ".$result_code;
        return $this;
    }

    public function withBody($body) {
        if (array_key_exists("body", $this->response) !== true) {
             $this->response["body"] = $body;
        } else {
                 $this->response["body"] .= $body;
        }
        return $this;
    }

    public function __toString() {
        $string = "";
        $headers = "";
        $delimeter = "\r\n";
        $body = "";
        

                        foreach ($this->response["header"] as $header) {
                                $headers .= $header . " ";                   
                        }


                        $body .= $this->response["body"];
        
                
        

        $headers .= " Content-Length: " . strlen($body);

        $string .= $headers . $delimeter .$body;

        return $string;
    }
}
