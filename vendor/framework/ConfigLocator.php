<?php

namespace Psr;

class ConfigLocator {

    private static $config = [];
    private static $instance = null;

    public function __wakeup() {}
    private function __construct() {
        self::$instance = $this;
    }

    public static function getConfig($config) {

        $config = strtolower($config);

        if (is_null(self::$instance)) {
            new ConfigLocator();
        }

        if (array_key_exists($config,self::$config) !== true) {

            switch ($config) {

                case "routes": 
                    $file = include __DIR__ . "/../../routes/routes.php";
                    $file = $file["routes"];
                    break;

                case "database": 
                    $file = include __DIR__ . "/../../config/config.php";
                    $file = $file["database"];
                    break;

            } 

            self::$config[$config] = $file;

        }

        return self::$config[$config];      
        
    }

}
