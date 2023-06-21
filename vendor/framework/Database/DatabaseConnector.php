<?php
namespace Psr\Database;
use Psr\Database\IODatabaseConnector as IODatabaseConnector;
use Psr\Database\IOModel as IOModel;
use Psr\ConfigLocator as ConfigLocator;
use Psr\Database\MysqlProvider as MysqlProvider;

class DatabaseConnector implements IODatabaseConnector {
    private  $dbConnector = null;

    public function __construct() {
        $provider = ConfigLocator::getConfig("database");
        $provider = $provider["provider"];

        switch ($provider) {
            
            case "mysql":
                $dbConnector = MysqlProvider::getInstance();
                break;
        }

        $this->dbConnector = $dbConnector;
    }

    public function create(IOModel $model) {
        return $this->dbConnector->create($model);
    }

    public function all(IOModel $model) {
        return $this->dbConnector->all($model);
    }
}
