<?php
  // Simple Table Manager
  
  defined( 'ABSPATH' ) or die( 'Direct access is not permitted' );
    
  print '<div class="wrap">'.PHP_EOL;
  print '<h2>' . __( 'Simple Table Manager - Edit Record', 'simple-table-manager' ). '</h2>'.PHP_EOL;
  print '<h3>' . sprintf( __( 'Table: %s', 'simple-table-manager' ), $table_name ). '</h3>'.PHP_EOL;

  switch ( $status ) {
    case 'error':
      print '<div class="error"><p>'.$message.'</p></div>';
      break;
    case 'success':
      print '<div class="updated"><p>'.$message.'</p></div>';
      break;
    default:
  }

  // controls
  print '<div class="stm_controls">'.PHP_EOL;
  print '<a href="' . $this->url['list'] . '" class="button button-secondary">' . __( 'List records', 'simple-table-manager' ). '</a>'.PHP_EOL;
  print '<a href="' . $this->url['settings'] . '" class="button button-secondary">' . __( 'Settings', 'simple-table-manager' ). '</a>'.PHP_EOL;
  print '</div>'.PHP_EOL;

  if ( !empty( $row ) ) {
    print '<form method="post" action="' . $this->url['edit'] . '">'.PHP_EOL;
    print '<input type="hidden" name="primary_key_value" value="'.$primary_key_value.'">'.PHP_EOL;
    print '<table class="wp-list-table widefat fixed">'.PHP_EOL;
    print '<thead>'.PHP_EOL;
    print '<th>Name</th>'.PHP_EOL;
    print '<th>Type</th>'.PHP_EOL;
    print '<th>Value</th>'.PHP_EOL;  
    print '</thead>'.PHP_EOL;
    print '<tbody>'.PHP_EOL;
    foreach ( $row as $name => $value ) {
      $encoded_name = urlencode( $name );
      $type = $columns[$name];
      $data_type = stm_get_data_type( $type );
      if ( $name == $primary_key ) {
        // print '<tr><th class="simple-table-manager">'.$name.' *</th><td>' . data_type2html_input( $columns[$name], $name, $value ) . '</td></tr>';
        print '<tr>';
        print '<th>'.$name.' *</th>';
        print '<th>'.$data_type.'</th>';
        print '<td><input type="text" readonly="readonly" name="'.$encoded_name.'" value="'.$value.'"/></td>';
        print '</tr>'.PHP_EOL;
      } else {
        print '<tr>';
        print '<th>'.$name.'</th>';
        print '<th>'.$data_type.'</th>';
        print '<td>' . stm_input( $encoded_name, $type, $value ) . '</td>';
        print '</tr>'.PHP_EOL;
      }
    }
    print '</tbody>'.PHP_EOL;
    print '</table>'.PHP_EOL;    
    print '<div class="stm_help">' . __( '* indicates the primary field', 'simple-table-manager' ). '</div>'.PHP_EOL;
    print '<div class="tablenav bottom">'.PHP_EOL;
    print '<input type="submit" name="update" value="' . __( 'Update', 'simple-table-manager' ). '" class="button button-primary">&nbsp;'.PHP_EOL;
    print '<input type="submit" name="delete" value="' . __( 'Delete', 'simple-table-manager' ). '" class="button button-primary" onclick="return confirm( ' . __( 'Are you sure you want to delete this record?', 'simple-table-manager' ). ' )">'.PHP_EOL;
    print '</div>'.PHP_EOL;
    print '</form>'.PHP_EOL;
  }
  print '</div>'.PHP_EOL; // end wrap
