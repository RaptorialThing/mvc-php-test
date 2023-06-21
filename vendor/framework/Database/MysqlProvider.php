<?php
namespace Psr\Database;
use Psr\Database\IODatabaseConnector as IODatabaseConnector;
use Psr\Database\IOModel as IOModel;
use Psr\ConfigLocator as ConfigLocator;

class MysqlProvider implements IODatabaseConnector {
      private static $instance;
      private static $db;

      public function create(IOModel $model) {

        $params = $model->getAllAttrs();
        unset($params["databaseConnector"]);
    
        if (in_array(null,$params)) {
                    return false;
                }

                $conn = self::$db;
                $keys = array_keys($params);
                $bindFields = [];
                foreach ($keys as $value) {
                    $bindFields[] = ":".$value;
                }
                $fieldStr = "(" . implode(", ",$keys) . ")";
                $bindFieldStr = "(" . implode(", ",$bindFields) . ")";
                $stmt = $conn->prepare("INSERT INTO ".$model->getTableName()." ".$fieldStr." VALUES ".$bindFieldStr.";");
                for ($i=0;$i<count($bindFields);$i++) {
                    $stmt->bindParam($bindFields[$i],$params[$keys[$i]]);
                }
                $stmt->execute();       

                $last_id = $conn->lastInsertId();

                if ($last_id) {
                    return $last_id;        
                } else {
                    return false;
                }

      }    

      public static function getInstance() {
            if (is_null(self::$instance)) {
                self::$instance = new MysqlProvider();
            }
            
            return self::$instance;
      }

      public function __wakeup() {}
      
      private function __construct() {
            try {
    
            $provider = ConfigLocator::getConfig("database");

            $db = new \PDO($provider['provider'].':host='.$provider['host'].';
                            dbname='.$provider['dbname'].';charset='.$provider['charset'], 
                                $provider['user'], $provider['password']);
            self::$db = $db; 
            } catch (PDOException $e) {
               return  "Connection failed: " . $e->getMessage()."\n";
            }
        }

       public function all($model) {
            $conn = self::$db;
            $stmt = $conn->prepare("SELECT * FROM ".$model->getTableName().";");
            $stmt->execute();
            $stmt->setFetchMode(\PDO::FETCH_ASSOC);

            return $stmt->fetchAll();
       }
      
}
