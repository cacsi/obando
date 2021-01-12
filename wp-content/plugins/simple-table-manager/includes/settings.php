<?php
  // Simple Table Manager

  defined( 'ABSPATH' ) or die( 'Direct access is not permitted' );

  print '<div class="wrap">'.PHP_EOL;
  print '<h2>' . __( 'Simple Table Manager - Settings', 'simple-table-manager' ) . '</h2>'.PHP_EOL;
  print '<h3>' . sprintf( __( 'Table: %s', 'simple-table-manager' ), $table_name ) . '</h3>'.PHP_EOL;

  if ( 'error' == $status ) {
    print '<div class="error"><p>' . $message . '</p></div>';
  } else if ( 'success' == $status ) {
    print '<div class="updated"><p>' . $message . '</p></div>';
  }

  // controls
  print '<div class="stm_controls">'.PHP_EOL;
  print '<a href="' . $this->url['list'] . '" class="button button-secondary">' . __( 'List records', 'simple-table-manager' ) . '</a>'.PHP_EOL;
  print '<a href="' . $this->url['settings'] . '&#038restore" class="button button-secondary">' . __( 'Restore default settings', 'simple-table-manager' ) . '</a>'.PHP_EOL;
  print '</div>'.PHP_EOL; // end stm_controls

  print '<form method="post" name="settings" action="' . $this->url['settings'] . '">'.PHP_EOL;
  
  print '<table class="wp-list-table widefat fixed">'.PHP_EOL;
  print '<thead>'.PHP_EOL;
  print '<th>Option</th>'.PHP_EOL;
  print '<th>Value</th>'.PHP_EOL;  
  print '</thead>'.PHP_EOL;
  print '<tbody>'.PHP_EOL;
  // table name
  print '<tr>'.PHP_EOL;
  print '<th class="simple-table-manager">' . __( 'Table name', 'simple-table-manager' ) . '</th>'.PHP_EOL;
  print '<td><select name="table_name">'.PHP_EOL;
  print '<option value="">Select a table ...</option>'.PHP_EOL;
  foreach ( $tables as $name ) {
    if ( $table_name == $name ) {
      print '<option value="' . $name . '" selected>' . $name . '</option>'.PHP_EOL;
    } else {
      print '<option value="' . $name . '">' . $name . '</option>'.PHP_EOL;
    }
  }
  print '</select>'.PHP_EOL;
  print '</tr>'.PHP_EOL;
  // max rows
  print '<tr>'.PHP_EOL;
  print '<th class="simple-table-manager">' . __( 'Max rows on page', 'simple-table-manager' ) . '</th>'.PHP_EOL;
  print '<td><input type="number" name="rows_per_page" value="' . $this->rows_per_page . '"/></td>'.PHP_EOL;
  print '</tr>'.PHP_EOL;
  // csv filename
  print '<tr>'.PHP_EOL;
  print '<th class="simple-table-manager">' . __( 'CSV file name', 'simple-table-manager' ) . '</th>'.PHP_EOL;
  print '<td><input type="text" name="csv_file_name" value="' . $this->csv['file_name'] . '"/></td>'.PHP_EOL;
  print '</tr>'.PHP_EOL;
  // csv encoding
  print '<tr>'.PHP_EOL;
  print '<th class="simple-table-manager">' . __( 'CSV encoding', 'simple-table-manager' ) . '</th>'.PHP_EOL;
  print '<td><input type="text" name="csv_encoding" value="' . $this->csv['encoding'] . '"/></td>'.PHP_EOL;
  print '</tr>'.PHP_EOL;
  print '</tbody>'.PHP_EOL;
  print '</table>'.PHP_EOL;

  print '<div class="tablenav bottom">'.PHP_EOL;
  print '<input type="submit" name="apply" value="' . __( 'Apply Changes', 'simple-table-manager' ) . '" class="button button-primary" />&nbsp;'.PHP_EOL;
  print '</div>'.PHP_EOL; // end tablenav
  
  print '</form>'.PHP_EOL;

  print '</div>'.PHP_EOL; // end wrap
