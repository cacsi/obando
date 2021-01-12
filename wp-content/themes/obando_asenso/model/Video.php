<?php
    class Video {
        
        private $conn;
        public function __construct($db) {
            $this->conn = $db;
        }


        function get_video() {
            
            $query = 'SELECT * FROM obando_video';
            $EXEC = $this->conn->prepare($query);
            $EXEC->execute();

            return $EXEC;
        }

        function add_video() {

            $query = 'INSERT INTO obando_video SET 
            video_link=:video_link
            ;';
            
            $EXEC = $this->conn->prepare($query);
            $EXEC->bindParam(':video_link', $this->video_link);
  
            if($EXEC->execute()){
                return true;
            }
            return false;

        }

        function edit_video() {
            
            $query = 'UPDATE obando_video SET 
            video_link=:video_link,
            WHERE video_id=:video_id
            ;';
            
            $EXEC = $this->conn->prepare($query);
            $EXEC->bindParam(':video_id', $this->video_id);
            $EXEC->bindParam(':video_link', $this->video_link);
  
            if($EXEC->execute()){
                return true;
            }
            return false;

        }

    }
?>