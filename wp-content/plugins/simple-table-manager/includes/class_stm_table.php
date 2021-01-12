<?php

  // Simple Table Manager

  defined( 'ABSPATH' ) or die( 'Direct access is not permitted' );

  class STM_Table {

    private $db;
    private $table_name;
    private $columns; // array ( name => type )
    private $primary_key;
    private $encoded_primary_key;
    private $pk_is_int;

    public function __construct( $table_name ) {
      $this->init( $table_name );
    }

    public function init( $table_name ) {
      // set schema & table
      global $wpdb;
      $this->db = $wpdb;
      $this->table_name = $table_name;
      if( ! $this->table_name ) {
        return;
      }
      // collect column information
      $this->db->get_row( 'SELECT * FROM `'.$this->table_name.'`' ); // dummy
      $this->columns = array();
      foreach( $this->db->get_col_info( 'name' ) as $i => $name ) {
        $this->columns[$name] = $this->db->col_info[$i]->type;
      }
      // find primary key & verify whether its type is integer
      $row = $this->db->get_row( 'SHOW FIELDS FROM `'.$this->table_name.'` WHERE `Key` = "PRI"' );
      $this->primary_key = $row->Field;
      $this->encoded_primary_key = urlencode( $this->primary_key );
      $this->pk_is_int = stristr( $row->Type, 'int' );
    } // end function

    public function get_table_name() {
      return $this->table_name;
    } // end function

    public function get_primary_key() {
      return $this->primary_key;
    } // end function

    public function get_encoded_primary_key() {
      return $this->encoded_primary_key;
    } // end function

    public function get_columns() {
      return $this->columns;
    } // end function

    public function get_new_candidate_id() {
      $new_id = "";
      // autoincrement if pk is integer
      if ( $this->pk_is_int ) {
        $new_id = $this->db->get_var( 'SELECT MAX( `'.$this->primary_key.'` )+1 FROM `'.$this->table_name.'`' );
      } else {
        $new_id = $this->db->get_var( 'SELECT MAX( `'.$this->primary_key.'` ) FROM `'.$this->table_name.'`' );
        $new_id .= NEW_ID_HINT;
      }
      if ( '' == $new_id )  $new_id = '1';
      return $new_id;
    } // end function

    public function select_all() {
      return $this->db->get_results( 'SELECT * FROM `'.$this->table_name.'`' );
    } // end function

    public function select( $key_word, $order_by, $order, $begin_row, $end_row ) {
      $where_qry = $this->generate_where_query( $key_word );
      $order_qry = $this->generate_order_query( $order_by, $order );
      $sql = 'SELECT * FROM `'.$this->table_name.'` '.$where_qry.' '.$order_qry.' LIMIT '.$begin_row.', '.$end_row;
      return $this->db->get_results( $sql );
    } // end function

    public function count_rows( $key_word = "" ) {
      $where_qry = $this->generate_where_query( $key_word );
      $sql = 'SELECT COUNT(*) FROM `'.$this->table_name.'` '.$where_qry;
      return $this->db->get_var( $sql );
    } // end function

    private function generate_where_query( $key_word ) {
      $query = '';
      if ( '' != $key_word ) {
        $like_statements = array();
        foreach ( $this->columns as $name => $type ) {
          $like_statements[] = $this->db->prepare( ' `'.$name.'` LIKE "%%%s%%"', $key_word );
        }
        $query = ' WHERE ' . implode( ' OR ', $like_statements );
      }
      return $query;
     } // end function

    private function generate_order_query( $order_by, $order ) {
      $qry = '';
      if ( '' != $order_by ) {
        $order = esc_sql( $order );
        $order_by = esc_sql( $order_by );
        $qry = ' ORDER BY `'.$order_by.'` '.$order;
      }
      return $qry;
    } // end function

    public function get_row( $primary_key_value ) {
      $sql = $this->db->prepare( 'SELECT * FROM `'.$this->table_name.'` WHERE `'.$this->primary_key.'` = \'%s\'', $primary_key_value );
      return $this->db->get_row( $sql );
    } // end function

    public function insert() {
      // collect insert values and strip slashes
      $insert_vals = array();
      foreach ( $this->columns as $name => $type ) {
        $encoded_name = urlencode( $name );
        $insert_vals[$name] = stripslashes_deep( $_POST[$encoded_name] );
      }
      // check if pk already exists
      $sql = $this->db->prepare( 'SELECT `'.$this->primary_key.'` FROM `'.$this->table_name.'` WHERE `'.$this->primary_key.'` = "%s"', $insert_vals[$this->primary_key] );
      $exists = $this->db->get_var( $sql );
      // insert
      if ( '' == $exists ) {
        if ( $this->db->insert( $this->table_name, $insert_vals ) ) {
          return $insert_vals[$this->primary_key];
        }
      }
      return '';
    } // end function

    public function update() {
      // collect update values and strip slashes
      $update_vals = array();
      foreach ( $this->columns as $name => $type ) {
        $encoded_name = urlencode( $name );
        $update_vals[$name] = stripslashes_deep( $_POST[$encoded_name] );
      }
      // update
      if ( $this->db->update( $this->table_name, $update_vals, array( $this->primary_key => $_POST[$this->encoded_primary_key] ) ) ) {
        return true;
      } else {
        return false;
      }
    } // end function

    public function delete( $primary_key_value ) {
      $sql = $this->db->prepare( 'DELETE FROM `'.$this->table_name.'` WHERE `'.$this->primary_key.'` = "%s"', $primary_key_value );
      if ( $this->db->query( $sql ) ) {
        return true;
      } else {
        return false;
      }
    } // end function

    public function validate( $table_name ) {
      // gather column information & check for primary key
      $results = $this->db->get_results( 'SHOW KEYS FROM `'.$table_name.'` WHERE `Key_name` = "PRIMARY"' );
      // $results = an array of key objects, where ->Key_name = "PRIMARY"
      $nr_primary_keys = $this->db->num_rows;
      switch ( $nr_primary_keys ) {
        case 0:
          // no primary key set, this plugin won't work
          $err_msg = sprintf( __( 'Error: Table %s does not have a primary key.', 'simple-table-manager' ), $table_name );
          break;
        case 1:
          // just right
          $err_msg = '';      
          break;
        default:
          // more than one primary key = error
          $err_msg = sprintf( __( 'Error: Table %s has multiple primary keys.', 'simple-table-manager' ), $table_name );    
      }
      return $err_msg;
    } // end function

    public function get_tables() {
      $tables = array();
      foreach ( $this->db->get_results( "SHOW TABLES" ) as $row ) {
        foreach ( $row as $name ) {
          $tables[] = $name;
        }
      }
      return $tables;
    } // end function
  } // end class
  
