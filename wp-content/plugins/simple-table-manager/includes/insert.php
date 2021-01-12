<?php
  // Simple Table Manager

  defined( 'ABSPATH' ) or die( 'Direct access is not permitted' );

  print '<div class="wrap">'.PHP_EOL;
  print '<h2>' . __( 'Simple Table Manager - Add New Record', 'simple-table-manager' ). '</h2>'.PHP_EOL;
  print '<h3>' . sprintf( __( 'Table: %s', 'simple-table-manager' ), $table_name ). '</h3>'.PHP_EOL;

  // controls
  print '<div class="stm_controls">'.PHP_EOL;
  print '<a href="' . $this->url['list'] . '" class="button button-secondary">' . __( 'List records', 'simple-table-manager' ). '</a>'.PHP_EOL;
  print '<a href="' . $this->url['settings'] . '" class="button button-secondary">' . __( 'Settings', 'simple-table-manager' ). '</a>'.PHP_EOL;
  print '</div>'.PHP_EOL;

  print '<form method="post" action="' . $this->url['edit'] . '">'.PHP_EOL;
  print '<table class="wp-list-table widefat fixed">'.PHP_EOL;
  print '<thead>'.PHP_EOL;
  print '<th>Name</th>'.PHP_EOL;
  print '<th>Type</th>'.PHP_EOL;
  print '<th>Value</th>'.PHP_EOL;  
  print '</thead>'.PHP_EOL;
  print '<tbody>'.PHP_EOL;
  foreach ( $columns as $name => $type ) {
    $encoded_name = urlencode( $name );
    $type = $columns[$name];
    $data_type = stm_get_data_type( $type );
    if ( $name == $primary_key ) {
      print '<tr>';
      print '<th>'.$name.' *</th>';
      print '<th>'.$data_type.'</th>';
      print '<td>' . stm_input( $encoded_name, $type, $new_id ) . '</td>';
      print '</tr>'.PHP_EOL;
    } else {
      print '<tr>';
      print '<th>'.$name.'</th>';
      print '<th>'.$data_type.'</th>';
      print '<td>' . stm_input( $encoded_name, $type, '' ) . '</td>';
      print '</tr>'.PHP_EOL;
    }
  }
  print '</tbody>'.PHP_EOL;
  print '</table>'.PHP_EOL;
  print '<div class="stm_help">' . __( '* indicates the primary field', 'simple-table-manager' ). '</div>'.PHP_EOL;
  print '<div class="tablenav bottom">'.PHP_EOL;
  print '<input type="submit" name="insert" value="' . __( 'Add record', 'simple-table-manager' ). '" class="button button-primary">'.PHP_EOL;
  print '</div>'.PHP_EOL;
  print '</form>'.PHP_EOL;
print '</div>'.PHP_EOL;
