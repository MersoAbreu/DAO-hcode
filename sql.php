<?php
class Sql extends PDO{

    private $conn;

    public function __construct()
    {
        $this -> conn = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
    }
     private function setParams($statment, $paramters=array()){
        foreach($paramters as $key =>$value){
            $this->setParam($key, $value);
        }
     }
     private function setParam($key, $value,$statment=""){
         $statment ->bindParam($key, $value);
     }
   
    public function query($rawQuery,$params=array()){
        $stmt = $this->conn->prepare($rawQuery);
        $this->setParams($stmt, $params);
        $stmt ->execute();
        return $stmt;
       
    
    }
    public function select($rawQuery, $params=array()):array{
        $stmt= $this->query($rawQuery, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
 
}











?>