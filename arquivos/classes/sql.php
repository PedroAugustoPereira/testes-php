<?php

    class Sql extends PDO{

        private $conn;

        public function __construct(){
            $this->conn = new PDO("sqlsrv:Database=testes;server=localhost\;ConnectionPooling=0", "sa", "root");
        }

        public function setParams($statment, $parameters = array()){
            foreach($parameters as $key => $value){
                $this->setParam($statment, $key, $value);
            }
        }

        public function setParam($statment, $key, $value){
            $statment->bindParam($key, $value);
        }

        public function myQuery($rawQuery, $params = array()){
           $stmt = $this->conn->prepare($rawQuery);

           $this->setParams($stmt, $params);

           $stmt->execute();

           return $stmt;
        }


       


        public function select($rawQuery, $params = array()):array{
            
           $stmt =  $this->myQuery($rawQuery, $params);
            
           return  $stmt->fetchAll(PDO::FETCH_ASSOC);   
        }
    }
?>