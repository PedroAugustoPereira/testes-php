<?php

    class Usuarios{
        private $des_senha;
        private $des_login;
        private $des_id;
        private $des_DataRegister;

        public function __construct($login="", $senha="")
        {
            $this->setLogin($login);
            $this->setSenha($senha);
        }

        public function getLogin(){
            return $this->des_login;
        }

        public function getId(){
            return $this->des_id;
        }

        public function getDataRegister(){
            return $this->des_DataRegister;
        }

        public function getSenha(){
            return $this->des_senha;
        }

        public function setSenha($value){
            $this->des_senha = $value;
        }

        public function setDataRegister($value){
            $this->des_DataRegister = $value;
        }
        
        public function setId($value){
            $this->des_id = $value;
        }

        public function setLogin($value){
            $this->des_login = $value;
        }

        public function loadById($id){
            $sql = new Sql();
            $results = $sql->select("SELECT * FROM tb_susuarios WHERE id = :ID", array(":ID" => $id));

            if(count($results) > 0){
                $row = $results[0];
                $this->setData($row);
            }
        }

        public function login($user, $password){
            $sql = new Sql();
            $results = $sql->select("SELECT * FROM tb_susuarios WHERE des_login = :USER AND des_senha = :PASS",
             array(
                ":USER" => $user,
                ":PASS" => $password
            ));

            if(count($results) > 0){
                $row = $results[0];
                $this->setData($row);
            }
            else{
                    throw new Exception("Login ou senha inválidos");
            }
        }


        public static function getList(){

            $sql = new Sql();
            $results = $sql->select("SELECT * FROM tb_susuarios");

            return $results;

        }       

        public static function search($login){
            $sql = new Sql();
            return $sql->select("SELECT * FROM tb_susuarios WHERE des_login LIKE :SEARCH ORDER BY des_login", 
            array(
                "SEARCH" => "%". $login.  "%"
                )
            );
        }

        public function __toString(){
            return json_encode(array(
                'id_usaurio' => $this->getId(),
                'login_usuario' => $this->getLogin(),
                'senha_usuario' => $this->getSenha(),
                'data_usuario' => $this->getDataRegister()->format("d-m-Y H:i:s")
            ));
        }


        public function setData($row){
            $this->setId($row['id']);
            $this->setSenha($row['des_senha']);
            $this->setLogin($row['des_login']);
            $this->setDataRegister(new DateTime($row['datatime']));
        }


        public function insert(){
            $sql = new Sql();
            $results = $sql->select("EXEC sp_usuarios_insert @pdes_login = :LOGIN, @pdes_senha =  :PASSWORD", array(":LOGIN" => $this->getLogin(), ":PASSWORD" => $this->getSenha()));
            
            if(count($results) > 0){
                $this->setData($results[0]);
            }
        }

        public function update($login, $senha){
            $this->setLogin($login);
            $this->setSenha($senha);

            $sql = new Sql();
            $sql->myQuery("UPDATE tb_susuarios SET des_login = :LOGINNOVO, des_senha = :SENHA WHERE id = :ID", 
            array(
                ':LOGINNOVO'=>$this->getLogin(),
                ':SENHA' => $this->getSenha(),
                ':ID' => $this->getId(),
            ));

            

        }


        public function delete(){
            $sql = new Sql();

            $sql->myQuery("DELETE * FROM tb_susuarios WHERE id = :ID", array(":ID"=> $this->getId()));

            $this->setId(0);
            $this->setLogin(null);
            $this->setSenha(null);
            $this->setData(null);
        }




    }

?>