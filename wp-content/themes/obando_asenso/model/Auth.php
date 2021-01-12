<?php
    class Auth{

        private $conn;

        public function __construct($db){
            $this->conn = $db;
        }

        function _login(){

            $query='SELECT * FROM obando_user WHERE (obando_username=:obando_username OR obando_id=:obando_username)';

            $EXEC = $this->conn->prepare($query);
            $EXEC->bindParam(':obando_username', $this->obando_username);
            $EXEC->execute();

            return $EXEC;
        }
    }
?>
