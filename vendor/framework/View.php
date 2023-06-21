<?php
namespace Psr;

class View {
    public function __construct($path,$varsArr=[]) {
        include __DIR__ . "/../../views/" . $path . ".php";
    }
}
