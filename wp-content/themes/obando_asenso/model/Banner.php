<?php
    class Banner {
        
        private $conn;
        public function __construct($db) {
            $this->conn = $db;
        }

        function get_banner() {
            
            $query = 'SELECT * FROM obando_banner ORDER BY banner_created DESC LIMIT 4;';
            $EXEC = $this->conn->prepare($query);
            $EXEC->execute();

            return $EXEC;

        }

        function add_banner() {

            $query = 'INSERT INTO obando_banner SET 
            banner_image=:banner_image
            ;';
            
            $EXEC = $this->conn->prepare($query);
            $EXEC->bindParam(':banner_image', $this->banner_image);
  
            if($EXEC->execute()){
                return true;
            }
            return false;

        }

        function edit_banner() {
            
            $query = 'UPDATE obando_banner SET 
            banner_image=:banner_image
            WHERE banner_id=:banner_id
            ;';
            
            $EXEC = $this->conn->prepare($query);
            $EXEC->bindParam(':banner_id', $this->banner_id);
            $EXEC->bindParam(':banner_image', $this->banner_image);
  
            if($EXEC->execute()){
                return true;
            }
            return false;

        }

    }
?>