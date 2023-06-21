<?php

namespace Psr;

use Psr\Http\Message\Request as Request;
use Psr\ConfigLocator as ConfigLocator;
use Psr\Http\Message\Response as Response;
use MvcExample\Controllers\Controller as Controller;

class RouteResolver {

    private $routes;
    private static $instance;

    public static function routeResolve(Request $request,  $routes) {

       if (self::$instance === null) {
            self::$instance = new RouteResolver($request, $routes );
       }

       $routeResolver = self::$instance;

       $path = $request->parseUri("path");
       $isPathNotFound = true;

        foreach ($routes as $routePath=>$routeAction) {
        /*switch ($route["http"]) {
                case "post":
                    //
                    break;
                case "get":
                    //
                    break;
                case "put":
                    //
                    break;
                case "delete":
                    //
                    break;
            }*/
            if (strcmp($path,$routePath) === 0) {
                $isPathNotFound = false;
                return (new $routeAction["controller"]())->{$routeAction["method"]}($request);
        } 
    }

        if ($isPathNotFound) {
            return new View("404");
        }    

    }

    private function __construct(Request $request, $routes) {
        $this->routes =  $routes; 
        return $this;
    }



}
