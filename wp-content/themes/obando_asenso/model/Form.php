<?php
    class Form {
        
        private $conn;
        public function __construct($db) {
            $this->conn = $db;
        }

        function get_form_title() {
            
            $query = 'SELECT * FROM obando_form_title;';
            $EXEC = $this->conn->prepare($query);
            $EXEC->execute();

            return $EXEC;
            
        }

        function get_form_content() {
            
            $query = 'SELECT * FROM obando_form_content WHERE content_form_id=:form_id;';
            $EXEC = $this->conn->prepare($query);
            $EXEC->bindParam(':form_id', $this->form_id);
            $EXEC->execute();

            return $EXEC;
            
        }

        function add_form_title() {

            $query = 'INSERT INTO obando_form_title SET form_title=:form_title;';
            
            $EXEC = $this->conn->prepare($query);
            $EXEC->bindParam(':form_title', $this->form_title);
  
            if($EXEC->execute()){
                return true;
            }
            return false;

        }

        function edit_form_title() {
            
            $query = 'UPDATE obando_form_title SET form_title=:form_titleWHERE form_id=:form_id;';
            $EXEC = $this->conn->prepare($query);
            $EXEC->bindParam(':form_id', $this->form_id);
            $EXEC->bindParam(':form_title', $this->form_title);
  
            if($EXEC->execute()){
                return true;
            }
            return false;

        }

        function add_form_content() {

            $query = 'INSERT INTO obando_form_content SET form_title=:form_title;';
            
            $EXEC = $this->conn->prepare($query);
            $EXEC->bindParam(':form_title', $this->form_title);
  
            if($EXEC->execute()){
                return true;
            }
            return false;
            
        }

    }
?>