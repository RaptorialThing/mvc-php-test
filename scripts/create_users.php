<?php

try {
    $config = require dirname(__FILE__).'/../config/config.php';
    $pdo = new \PDO('mysql:host='.$config["database"]['host'].';dbname='
                    .$config["database"]['dbname'].
                ';charset='.$config["database"]['charset'],
                $config["database"]['user'], 
                $config["database"]['password']);
    $sql = "
        CREATE TABLE IF NOT EXISTS`users` (
    `id` int(11) unsigned NOT NULL auto_increment,
    `login` varchar(30) NOT NULL,
    `password` varchar(32) NOT NULL,
    `hash` varchar(256) NOT NULL default '',
    PRIMARY KEY (`id`)
    ) ENGINE=MyISAM DEFAULT CHARSET=".$config["database"]["charset"]." AUTO_INCREMENT=1 ;
    ";
    $pdo->query($sql);
    echo "Table users created \n"; 
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage()."\n";
}
