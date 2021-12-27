<?php
    class DBConnect{

        private $resConnection;
        private $host = "localhost";
        private $username = "root";
        private $password = "";
        private $database = "narm_project";

        function connect(){

            if(mysqli_connect($this->host,$this->username,$this->password,$this->database)){
                $this->resConnection = mysqli_connect($this->host,$this->username,$this->password,$this->database);
            }
            else echo "error commited";

            if (mysqli_connect_errno()){
                echo "failed to connect database".mysqli_connect_error();
            }

            $this->resConnection -> set_charset("utf8");

            return $this->resConnection;
        }
    }