<?php
    class Announcement {
        
        private $conn;
        public function __construct($db) {
            $this->conn = $db;
        }

        function get_announcement() {

            $query = 'SELECT * FROM obando_announcement ORDER BY announcement_created DESC';
            $EXEC = $this->conn->prepare($query);
            $EXEC->execute();

            return $EXEC;

        }

        function add_announcement() {
            
            $query = 'INSERT INTO obando_announcement SET 
            announcement_title=:announcement_title,
            announcement_content=:announcement_content,
            announcement_image=:announcement_image
            ;';
            
            $EXEC = $this->conn->prepare($query);
            $EXEC->bindParam(':announcement_title', $this->announcement_title);
            $EXEC->bindParam(':announcement_content', $this->announcement_content);
            $EXEC->bindParam(':announcement_image', $this->announcement_image);
  
            if($EXEC->execute()){
                return true;
            }
            return false;

        }

        function edit_announcement() {

            $query = 'UPDATE obando_announcement SET 
            announcement_title=:announcement_title,
            announcement_content=:announcement_content,
            announcement_image=:announcement_image
            WHERE announcement_id=:announcement_id
            ;';
            
            $EXEC = $this->conn->prepare($query);
            $EXEC->bindParam(':announcement_id', $this->announcement_id);
            $EXEC->bindParam(':announcement_title', $this->announcement_title);
            $EXEC->bindParam(':announcement_content', $this->announcement_content);
            $EXEC->bindParam(':announcement_image', $this->announcement_image);
  
            if($EXEC->execute()){
                return true;
            }
            return false;
            
        }

        function delete_announcement() {
            $query = 'DELETE FROM obando_announcement WHERE announcement_id=:announcement_id;';
    
            $EXEC = $this->conn->prepare($query);
            $EXEC->bindParam(':announcement_id', $this->announcement_id);
    
            if($EXEC->execute()){
                return $EXEC;
            }
            return false;
        }

    }
?>