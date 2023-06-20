<?php

namespace Psr;

use Psr\Http\Message\Request as Request;
use Psr\ConfigLocator as ConfigLocator;
use Psr\Http\Message\Response as Response;
use MvcExample\Controllers\UserController as UserController;

class RouteResolver {

    private $routes;
    private static $instance;

    public static function routeResolve(Request $request, ConfigLocator $configLocator) {

       if (self::$instance === null) {
            self::$instance = new RouteResolver($request, $configLocator );
       }

       $routeResolver = self::$instance;

       $path = $request->parseUri("path");

        foreach ($routeResolver->routes as $routePath=>$routeAction) {
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

            if ($path === $routePath) {
                return (new $routeAction["controller"]())->{$routeAction["method"]}($request);
        } 
    }
    }

    private function __construct(Request $request, ConfigLocator $configLocator) {
        $this->routes =  $configLocator->config; 
        return $this;
    }



}
