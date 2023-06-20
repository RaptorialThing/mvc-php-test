<?php

namespace MvcExample\Controllers;
use Psr\Http\Message\Request as Request;
use Psr\Http\Message\Response as Response;

class UserController {

    public function create(Request $request) {

        return "User created";

    }

}
