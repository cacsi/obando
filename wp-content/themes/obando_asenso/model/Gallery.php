<?php
    class Gallery {
        
        private $conn;
        public function __construct($db) {
            $this->conn = $db;
        }

        function get_gallery() {
            
            $query = 'SELECT * FROM obando_gallery ORDER BY gallery_created DESC;';
            $EXEC = $this->conn->prepare($query);
            $EXEC->execute();

            return $EXEC;

        }

        function add_gallery() {

            $query = 'INSERT INTO obando_gallery SET 
            gallery_image=:gallery_image
            ;';
            
            $EXEC = $this->conn->prepare($query);
            $EXEC->bindParam(':gallery_image', $this->gallery_image);
  
            if($EXEC->execute()){
                return true;
            }
            return false;

        }

        function edit_gallery() {
            
            $query = 'UPDATE obando_gallery SET 
            gallery_image=:gallery_image
            WHERE gallery_id=:gallery_id
            ;';
            
            $EXEC = $this->conn->prepare($query);
            $EXEC->bindParam(':gallery_id', $this->gallery_id);
            $EXEC->bindParam(':gallery_image', $this->gallery_image);
  
            if($EXEC->execute()){
                return true;
            }
            return false;

        }

        function delete_gallery() {
            $query = 'DELETE FROM obando_gallery WHERE gallery_id=:gallery_id;';
    
            $EXEC = $this->conn->prepare($query);
            $EXEC->bindParam(':gallery_id', $this->gallery_id);
    
            if($EXEC->execute()){
                return $EXEC;
            }
            return false;
        }

    }
?>