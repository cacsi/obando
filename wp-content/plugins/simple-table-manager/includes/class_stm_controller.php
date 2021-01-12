<?php

// Simple Table Manager

defined( 'ABSPATH' ) or die( 'Direct access is not permitted' );
  
class STM_Controller {

  private $table;
  private $rows_per_page;
  private $csv;
  private $slug;
  private $url;

  public function __construct() {
    // get settings
    $this->rows_per_page = get_option( 'stm_rows_per_page' );
    $this->csv['file_name'] = get_option( 'stm_csv_file_name' );
    $this->csv['encoding']  = get_option( 'stm_csv_encoding' );
    $this->table_name = get_option( 'stm_table_name' );
    $this->base_slug = get_option( 'stm_base_slug' );
    // slugs
    $this->slug['list']     = $this->base_slug . '_list';
    $this->slug['insert']   = $this->base_slug . '_insert';
    $this->slug['edit']     = $this->base_slug . '_edit';
    $this->slug['settings'] = $this->base_slug . '_settings';
    $this->url['list']      = admin_url( 'admin.php?page=' . $this->slug['list'] );
    $this->url['insert']       = admin_url( 'admin.php?page=' . $this->slug['insert'] );
    $this->url['edit']      = admin_url( 'admin.php?page=' . $this->slug['edit'] );
    $this->url['settings']  = admin_url( 'admin.php?page=' . $this->slug['settings'] );
    // menu
    add_action( 'init', array( $this, 'export_csv' ) );
    add_action( 'admin_menu', array( $this, 'add_menu' ) );
    $this->table = new STM_Table( $this->table_name );
  } // end function
      
  public function add_menu() {
    // add_menu_page( page_title, menu_title, capability, menu_slug, callable_function, icon_url, position )
    add_menu_page( __( 'Simple Table Manager - List Table', 'simple-table-manager' ), __( 'Simple Table Manager', 'simple-table-manager' ), 'edit_posts', $this->slug['list'], array( $this, 'list_all' ) );
    // add_submenu_page( parent_slug, page_title, menu_title, capability, menu_slug, callable_function )
    add_submenu_page( null, __( 'Simple Table Manager - Add New Record', 'simple-table-manager' ), __( 'Add New Record', 'simple-table-manager' ), 'edit_posts', $this->slug['insert'], array( $this, 'insert' ) );
    add_submenu_page( null, __( 'Simple Table Manager - Edit Record', 'simple-table-manager' ), __( 'Edit Record', 'simple-table-manager' ), 'edit_posts', $this->slug['edit'], array( $this, 'edit' ) );
    add_submenu_page( null, __( 'Simple Table Manager - Settings', 'simple-table-manager' ), __( 'Settings', 'simple-table-manager' ), 'manage_options', $this->slug['settings'], array( $this, 'settings' ) );
  } // end function 
 
  public function list_all() {
    if( ! $this->table_name ) {
      $table_name = '';
      $key_word = '';
    } else {
      // export csv via post
      $task_id = mt_rand();
      $_SESSION['export'] = $task_id;
      // key word search
      $key_word = "";
      if ( isset( $_POST['search'] ) ) {
        $key_word = $_POST['search'];
      }
      if ( isset( $_GET['search'] ) ) {
        $key_word = $_GET['search'];
      }
      $key_word = stripslashes_deep( $key_word );
      // order by
      $order_by = "";
      $order = "";
      if ( isset( $_GET['orderby'] ) ) {
        $order_by = $_GET['orderby'];
        $order = $_GET['order'];
      }
      // manage record quantity
      $begin_row = 0;
      if ( isset( $_GET['beginrow'] ) ) {
        if ( is_numeric( $_GET['beginrow'] ) ) {
          $begin_row = $_GET['beginrow'];
        }
      }
      $total = $this->table->count_rows( $key_word ); // count all data rows
      $next_begin_row = $begin_row + $this->rows_per_page;
      if ( $total < $next_begin_row ) {
        $next_begin_row = $total;
      }
      $last_begin_row = $this->rows_per_page * ( floor( ( $total - 1 ) / $this->rows_per_page ) );
      // stuff to display
      $table_name = $this->table->get_table_name();
      $primary_key = $this->table->get_primary_key();
      $columns = $this->table->get_columns();
      $result = $this->table->select( $key_word, $order_by, $order, $begin_row, $this->rows_per_page );
    }
    include( STM_PATH.'includes/list.php' );
  } // end function

  public function insert() {
    $table_name = $this->table->get_table_name();
    $primary_key = $this->table->get_primary_key();
    $encoded_primary_key = $this->table->get_encoded_primary_key();
    $columns = $this->table->get_columns();
    $new_id = $this->table->get_new_candidate_id();
    include( STM_PATH.'includes/insert.php' );
  } // end function

  public function edit() {
    $message = "";
    $status = "";
    $encoded_primary_key = $this->table->get_encoded_primary_key();
    $primary_key_value = isset( $_REQUEST['primary_key_value'] ) ? $_REQUEST['primary_key_value'] : '';
    $action = 'none';
    if ( isset($_POST['insert'] ) ) $action = 'insert';
    if ( isset($_POST['update'] ) ) $action = 'update';
    if ( isset($_POST['delete'] ) ) $action = 'delete';
    switch( $action ) {
      case 'insert':
        $primary_key_value = $this->table->insert();
        if ( '' != $primary_key_value ) {
          $message = __( 'Record successfully inserted', 'simple-table-manager' );
          $status = 'success';
        } else {
          $message = __( 'Error inserting record', 'simple-table-manager' );
          $status = 'error';
        }
        break;
      case 'update':    
        if ( $this->table->update() ) {
          $message = __( 'Record successfully updated', 'simple-table-manager' );
          $status = 'success';
        } else {
          $message = __( 'No rows were affected', 'simple-table-manager' );
          $status = 'error';
        }
        break;
      case 'delete':
        if ( $this->table->delete( $primary_key_value ) ) {
          $message = __( 'Record successfully deleted', 'simple-table-manager' );
          $status = 'success';
        } else {
          $message = __( 'Error deleting record', 'simple-table-manager' );
          $status = 'error';
        }
        break;
      default:
    }
    $table_name = $this->table->get_table_name();
    $primary_key = $this->table->get_primary_key();
    $columns = $this->table->get_columns();
    $row = $this->table->get_row( $primary_key_value );
    include( STM_PATH.'includes/edit.php' );
  } // end function

  public function export_csv() {
    if ( isset( $_GET['export'] ) ) {
      // output contents
      header( "Content-Type: application/octet-stream" );
      header( "Content-Disposition: attachment; filename=" . $this->csv['file_name'] );
      // field names
      foreach ( $this->table->get_columns() as $name => $type ) {
        print( $name . STM_DELIMITER );
      }
      print( STM_NEW_LINE );
      // data
      foreach ( $this->table->select_all() as $row ) {
        foreach ( $row as $k => $v ) {
          $str = preg_replace('/"/', '""', $v);
          print("\"" . mb_convert_encoding( $str, $this->csv['encoding'], 'UTF-8' )."\"" . STM_DELIMITER);
        }
        print( STM_NEW_LINE );
      }
      exit;
    }
  } // end function

  public function settings() {
    $status = '';
    $message = '';
    if( isset( $_POST['apply'] ) ) {
      // update settings

      // check table validity
      $message = $this->table->validate( $_POST['table_name'] );
      if ( '' != $message ) {
        $status = 'error';
      } else {

        // get new settings
        $table_name = $_POST['table_name'];
      
        $rows_per_page = (int) $_POST['rows_per_page'];
        if( $rows_per_page < 1 ) {
          $rows_per_page = 1;
        }
        $csv_file_name = $_POST['csv_file_name'];
        $csv_encoding = $_POST['csv_encoding'];

        // update settings
        update_option( 'stm_table_name', $table_name );
        update_option( 'stm_rows_per_page', $rows_per_page );
        update_option( 'stm_csv_file_name', $csv_file_name );
        update_option( 'stm_csv_encoding', $csv_encoding );

        $message = __( 'Settings successfully changed', 'simple-table-manager' );
        $status = 'success';
      }
    }
    
    if ( isset( $_GET['restore'] ) ) {
      update_option( 'stm_table_name', '' );
      update_option( 'stm_rows_per_page', 20 );
      update_option( 'stm_csv_file_name', 'export.csv' );
      update_option( 'stm_csv_encoding', 'UTF-8' );
      $message = __( 'Default settings successfully restored', 'simple-table-manager' );
      $status = 'success';
    }

    // get settings
    $this->rows_per_page = get_option( 'stm_rows_per_page' );
    $this->csv['file_name'] = get_option( 'stm_csv_file_name' );
    $this->csv['encoding']  = get_option( 'stm_csv_encoding' );
    $this->table_name = get_option( 'stm_table_name' );
    
    $this->table = new STM_Table( $this->table_name );    
    $table_name = $this->table->get_table_name();
    $tables = $this->table->get_tables();

    include( STM_PATH.'includes/settings.php' );
  } // end function

} // end class
