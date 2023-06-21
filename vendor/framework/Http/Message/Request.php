<?php

namespace Psr\Http\Message;

use Psr\Http\Message\RequestInterface;

class Request implements RequestInterface {

    public $request = [];

    public function __construct() {

        $this->request["method"] = &$_SERVER['REQUEST_METHOD'] ?? 'GET';
        $this->request["headers"] = getallheaders();
        $this->request["uri"] = &$_SERVER["REQUEST_URI"];
        switch ($this->request["method"]) {
            case "GET":
                $this->request[$this->request["method"]] = &$_GET;
                break;
            case "POST":
                 $this->request[$this->request["method"]] = &$_POST;
                 break;
        }

    }

    public function parseUri($option="") {
        $uri = $this->request["uri"];

        switch (strtolower($option)) {

            case "path":
            case "endpoint":
            case "address":
                $result = parse_url($uri, PHP_URL_PATH);
                break;

            case "host":
                $result = parse_url($uri, PHP_URL_HOST);            
                break;

            case "params":
            case "get":
            case "query":
                $result = parse_url($uri, PHP_URL_QUERY); 
                break;
 
           case "fragment":
                $result = parse_url($uri, PHP_URL_FRAGMENT); 
                break;
 
            default:
                $result = parse_url($uri);
        }
        

        return $result;
    }

    public function getQueryArr() {
        $query = $this->parseUri("query");
        $arr = explode("&",$query);
        $result;
        foreach ($arr as $param) {
            $exploded = explode("=",$param);
            $result[$exploded[0]] = $exploded[1] ?? "";
        }

        return $result;
    }

    public function getBody() {
        return $this->request[$this->request["method"]];
    }

    public function getMethod() {
        return $this->request["method"];
    }

    public function getURI() {

    }
}
