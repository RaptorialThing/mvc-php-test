<?php

namespace MvcExample\Controllers;
use MvcExample\Controllers\Controller as Controller;
use Psr\Http\Message\Request as Request;
use Psr\Http\Message\Response as Response;

class UserController extends Controller {

    public static function create(Request $request) {

        return "User created";

    }
/*
    public function get() {
        return "Get User page";
    }
*/
}
