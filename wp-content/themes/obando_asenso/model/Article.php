<?php
    class Article {
        
        private $conn;
        public function __construct($db) {
            $this->conn = $db;
        }

        function get_article() {

            $query = 'SELECT * FROM obando_article ORDER BY article_created DESC';
            $EXEC = $this->conn->prepare($query);
            $EXEC->execute();

            return $EXEC;

        }

        function add_article() {
            
            $query = 'INSERT INTO obando_article SET 
            article_title=:article_title,
            article_content=:article_content,
            article_image=:article_image
            ;';
            
            $EXEC = $this->conn->prepare($query);
            $EXEC->bindParam(':article_title', $this->article_title);
            $EXEC->bindParam(':article_content', $this->article_content);
            $EXEC->bindParam(':article_image', $this->article_image);
  
            if($EXEC->execute()){
                return true;
            }
            return false;

        }

        function edit_article() {

            $query = 'UPDATE obando_article SET 
            article_title=:article_title,
            article_content=:article_content,
            article_image=:article_image
            WHERE article_id=:article_id
            ;';
            
            $EXEC = $this->conn->prepare($query);
            $EXEC->bindParam(':article_id', $this->article_id);
            $EXEC->bindParam(':article_title', $this->article_title);
            $EXEC->bindParam(':article_content', $this->article_content);
            $EXEC->bindParam(':article_image', $this->article_image);
  
            if($EXEC->execute()){
                return true;
            }
            return false;
            
        }

        function delete_article() {
            $query = 'DELETE FROM obando_article WHERE article_id=:article_id;';
    
            $EXEC = $this->conn->prepare($query);
            $EXEC->bindParam(':article_id', $this->article_id);
    
            if($EXEC->execute()){
                return $EXEC;
            }
            return false;
        }

    }
?>