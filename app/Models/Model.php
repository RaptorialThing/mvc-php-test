<?php
namespace MvcExample\Models;
use Psr\Database\IOModel as IOModel;
use Psr\Database\DatabaseConnector as DatabaseConnector;
use Psr\Database\IODatabaseConnector as IODatabaseConnector;

class Model implements IOModel {

    /*php8 readonly attributes*/
    
    public function getAttr($attrName) {
        return property_exists($this, $attrName) === true ? $this->$attrName : false;
    }

    public function setAttr($attrName,$attrValue) {
        if (property_exists($this, $attrName) === true) {
            $this->{$attrName} = $attrValue; // ->{} important set
        }
        return $this->getAttr($attrName);
    }

    public function setAttrArray($attrArray) {
        foreach ($attrArray as $attrName=>$attrValue) {
            $this->setAttr($attrName,$attrValue);
        }
        return $this->getAllAttrs();
    }

    public function getAllAttrs() {
        return get_object_vars($this);
    }

    public $databaseConnector = null;

    public function __construct() {
        $dbConnector = new DatabaseConnector();
        $this->databaseConnector = $dbConnector;

    }

    public function getTableName() {
       $className = strtolower(get_class($this));
       $className = explode("\\",$className);
       $className = end($className);
       $table = "";

       //str_ends_with("") php8 
       //str_contains php8
       preg_match("/(s|x|z|ch|sh|ds)/",substr($className,-2),$matches);
       if (empty($matches)) {
             $table = $className . "s";
       } else  {
             $table = $className . "es";
       }

       return $table;
    }

    public function all($model) {
        return $model->databaseConnector->all($model);  
    }

    public function create() {
        return $this->databaseConnector->create($this);           
    }
}
