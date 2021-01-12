<?php
    class Hero {
        
        private $conn;
        public function __construct($db) {
            $this->conn = $db;
        }


        function get_hero() {
            
            $query = 'SELECT * FROM obando_hero ORDER BY hero_created DESC LIMIT 1';
            $EXEC = $this->conn->prepare($query);
            $EXEC->execute();

            return $EXEC;
            
        }

        function add_hero() {

            $query = 'INSERT INTO obando_hero SET 
            hero_image=:hero_image
            ;';
            
            $EXEC = $this->conn->prepare($query);
            $EXEC->bindParam(':hero_image', $this->hero_image);
  
            if($EXEC->execute()){
                return true;
            }
            return false;

        }

        function edit_hero() {
            
            $query = 'UPDATE obando_hero SET 
            hero_image=:hero_image
            WHERE hero_id=:hero_id
            ;';
            
            $EXEC = $this->conn->prepare($query);
            $EXEC->bindParam(':hero_id', $this->hero_id);
            $EXEC->bindParam(':hero_image', $this->hero_image);
  
            if($EXEC->execute()){
                return true;
            }
            return false;

        }

    }
?>