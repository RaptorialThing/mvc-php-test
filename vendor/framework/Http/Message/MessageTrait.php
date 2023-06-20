<?php

namespace Psr\Http\Message;

trait MessageTrait {
    public $uri = &$_SERVER["REQUEST_URI"];
    
    public function getUri() {
        return $this-
    }
}
