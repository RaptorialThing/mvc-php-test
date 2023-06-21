<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Psr\RouteResolver as RouteResolver;
use Psr\ConfigLocator as ConfigLocator;
use Psr\Http\Message\Request as Request;
use Psr\Http\Message\Response as Response;


echo RouteResolver::routeResolve(new Request, ConfigLocator::getConfig("routes"));

session_start();


$_SESSION["user"] = "user123";

//include __DIR__ . "/../routes/Route.php";

unset($_SESSION["user"]);

