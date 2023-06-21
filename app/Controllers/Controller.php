<?php

namespace MvcExample\Controllers;
use Psr\Http\Message\Request as Request;
use Psr\Http\Message\Response as Response;
use Psr\View as View;

class Controller {

    public function get() {
        return new View("layouts/content");
    }

}
