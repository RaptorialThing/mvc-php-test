<?php

require_once __DIR__ . "/../vendor/autoload.php";
session_start();

use Psr\RouteResolver as RouteResolver;
use Psr\ConfigLocator as ConfigLocator;
use Psr\Http\Message\Request as Request;
use Psr\Http\Message\Response as Response;
use MvcExample\Models\User as User;

$u = new User();
//$u->setAttrArray(["password"=>"password123","login"=>"user123","hash"=>password_hash("password123",  PASSWORD_BCRYPT)]);
//var_dump($u = $u->create());
var_dump($u->all($u));

RouteResolver::routeResolve(new Request, ConfigLocator::getConfig("routes"));


$_SESSION["user"] = "user123";


unset($_SESSION["user"]);

