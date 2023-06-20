<?php
namespace MvcExample;

use Psr\Http\Message\Request as Request;
use Psr\Http\Message\Response as Response;

//$response = new Response();
//$request = new Request();

/*$request->getQueryArr());*/

/*$body = json_encode($request->getBody(),true);*/

/*echo $response->withStatus(200)
        ->withHeader('Content-Type', 'text/html')
            ->withBody('Test response' . htmlspecialchars($body));*/

class Route {

    public static function post($route = "", $controller = "", $method = "") {

        if (strtolower($request->getMethod()) === "post") { 
             return $controller->$method($request);
        } else {
             $response = new Response();
             $response->withStatus(400)
                        ->withHeader('Content-Type', 'text/html')
                           ->withBody('405 Method not Alowed');
             return $response;
        }
    }
/*
    public static function get($route = "", $controller = "", $method = "") {
        return $controller->$method(new Request());
    }

    public static function put($route = "", $controller = "", $method = "") {
        return $controller->$method(new Request());
    }

    public static function delete($route = "", $controller = "", $method = "") {
        return $controller->$method(new Request());
    }*/
}
