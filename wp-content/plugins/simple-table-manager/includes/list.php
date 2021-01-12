<?php
  // Simple Table Manager
  
  defined( 'ABSPATH' ) or die( 'Direct access is not permitted' );
  
  print '<div class="wrap">'.PHP_EOL;
  print '<h2>' . __( 'Simple Table Manager - List Records', 'simple-table-manager' ) . '</h2>'.PHP_EOL;

  if( ! $table_name ) {
    print '<p>' . __( 'No table selected. Please go to Settings and select a table.', 'simple-table-manager' ) . '</p>';
    //controls
    print '<div class="stm_controls">'.PHP_EOL;
    print '<a href="'.$this->url['settings'].'" class="button button-secondary">' . __( 'Settings', 'simple-table-manager' ) . '</a>'.PHP_EOL;
    print '</div>'.PHP_EOL; // end stm_controls
    print '</div>'.PHP_EOL; // end wrap
    return;
  }

  print '<h3>' . sprintf( __( 'Table: %s', 'simple-table-manager' ), $table_name ) . '</h3>'.PHP_EOL;

  if ( $key_word ) {
    print '<div class="updated">'.PHP_EOL;
    print '<p>';
    print sprintf( __( 'Found %1$s results for search term: "%2$s"', 'simple-table-manager' ), number_format( $total ), $key_word );
    print '<a href="' . $this->url['list'] . '" class="button button-secondary">' . __( 'Exit Search', 'simple-table-manager' ) . '</a>';
    print '</p>';
    print '</div>';
  }

  // controls
  print '<div class="stm_controls">'.PHP_EOL;
  print '<a href="' . $this->url['insert'] . '" class="button button-secondary">' . __( 'Add new record', 'simple-table-manager' ) . '</a>'.PHP_EOL;
  print '<a href="' . $this->url['list'] . '&#038export" class="button button-secondary">' . __( 'Export CSV', 'simple-table-manager' ) . '</a>'.PHP_EOL;
  print '<a href="' . $this->url['settings'] . '" class="button button-secondary">' . __( 'Settings', 'simple-table-manager' ) . '</a>'.PHP_EOL;
  // search box
  print '<form method="post" action="' . $this->url['list'] . '">'.PHP_EOL;
  print '<input type="search" name="search" placeholder="' . __( 'Search', 'simple-table-manager' ) . '&hellip;" value="" />'.PHP_EOL;
  print '</form>'.PHP_EOL;
  print '</div>'.PHP_EOL; // end stm_controls

  if ( empty( $result ) ) {
    print '<tr>'.PHP_EOL;
    print '<th>' . __( 'No results found.', 'simple-table-manager' ) . '</th>'.PHP_EOL;
    print '</tr>'.PHP_EOL;
    print '</table>'.PHP_EOL;
    print '</div>'.PHP_EOL; // end wrap
    return;
  }
  
  print '<table class="wp-list-table widefat fixed">'.PHP_EOL;
  print '<thead>'.PHP_EOL;
  print '<th></th>'.PHP_EOL; // empty column for edit link
  // column names
  $condition = array( 'search' => $key_word );
  foreach ( $columns as $name => $type ) {
    $condition['orderby'] = $name;
    if ( $name == $order_by and 'ASC' == $order ) {
      print '<th scope="col" class="manage-column sortable asc">';
      $condition['order'] = 'DESC';
    } else {
      print '<th scope="col" class="manage-column sortable desc">';
      $condition['order'] = 'ASC';
    }
    print "<a href='" . $this->url['list'] . "&#038;" . http_build_query( $condition ) . "'>";
    $asterisk = $name == $primary_key ? ' *' : '';
    print '<span>'.$name.$asterisk.'</span><span class="sorting-indicator"></span></a></th>';
  }
  print '</thead>'.PHP_EOL;
  // rows
  print '<tbody>'.PHP_EOL;
  foreach ( $result as $row ) {
    print '<tr>';
    // edit link in first column
    foreach ( $row as $name => $value ) {
      if ( $name == $primary_key ) {
        print '<td class="nowrap"><a href="' . $this->url['edit'] . '&#038primary_key_value=' . $value . '">' . __( 'Edit', 'simple-table-manager' ) . '</a></td>';
        break;
      }
    }
    // values
    foreach ( $row as $name => $value ) {
      print '<td>' . htmlspecialchars( $value ) . '</td>';
    }
    print '</tr>';
  }
  print '</tbody>'.PHP_EOL;
  print '</table>'.PHP_EOL;
  print '<div class="stm_help">' . __( '* indicates the primary field', 'simple-table-manager' ) . '</div>'.PHP_EOL;
  // table footer
  print '<div class="tablenav bottom">'.PHP_EOL;
  print '<span class="stm_help">'.sprintf( __( 'Total %s records', 'simple-table-manager' ), number_format( $total ) ).'</span>'.PHP_EOL;
  
  print '<div class="tablenav-pages">'.PHP_EOL;
  print '<span class="pagination-links">'.PHP_EOL;
  // navigation
  if( ! isset( $orderby ) ) {
    $orderby = '';
    $order = '';
  }
  $condition = array( 'search' => $key_word, 'orderby' => $orderby, 'order' => $order );
  $qry = http_build_query( $condition );
  if ( 0 < $begin_row) {
    print '<a href="' . $this->url['list'] . '&#038beginrow=0&#038' . $qry . '" title="first page" class="first-page disabled button button-secondary">&laquo;</a>';
    print '<a href="' . $this->url['list'] . '&#038beginrow='. ( $begin_row - $this->rows_per_page ) . '&#038' . $qry . '" title="previous page" class="first-page disabled button button-secondary">&lsaquo;</a>';
  } else {
    print '<a title="first page" class="first-page disabled button button-secondary">&laquo;</a>';
    print '<a title="previous page" class="prev-page disabled button button-secondary">&lsaquo;</a>';
  }
  print "<span class='paging-input'> " . number_format($begin_row + 1) . " - <span class='total-pages'>" . number_format($next_begin_row) . " </span></span>";
  if ( $next_begin_row < $total ) {
    print '<a href="' . $this->url['list'] . '&#038beginrow='.$next_begin_row.'&#038' . $qry . '" title="next page" class="next-page button button-secondary">&rsaquo;</a>';
    print '<a href="' . $this->url['list'] . '&#038beginrow='.$last_begin_row.'&#038' . $qry . '" title="last page" class="last-page button button-secondary">&raquo;</a>';
  } else {
    print '<a title="next page" class="next-page disabled button button-secondary">&rsaquo;</a>';
    print '<a title="last page" class="last-page disabled button button-secondary">&raquo;</a>';
  }
  print '</div>'.PHP_EOL;
  print '</span>'.PHP_EOL; // end pagination-links
  print '</div>'.PHP_EOL; // end tablenav-pages
  
  print '<br class="clear" />'.PHP_EOL;
  print '</div>'.PHP_EOL; // end wrap
