<?php

namespace Psr;

class ConfigLocator {

    public $config;

    public function __construct($config) {
        switch (strtolower($config)) {

            case "routes": {
                $file = include __DIR__ . "/../../routes/routes.php";
            }

        } 

        $this->config = $file;      
        
    }

}
