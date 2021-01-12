<?php

  // Simple Table Manager

  defined( 'ABSPATH' ) or die( 'Direct access is not permitted' );

  if ( ! function_exists( 'write_log' ) ) {
    function write_log ( $log )  {
      if ( is_array( $log ) || is_object( $log ) ) {
        error_log( print_r( $log, true ) );
      } else {
        error_log( $log );
      }
    } // end function
  }

  function stm_input( $encoded_name, $type, $value ) {
    switch ( $type ) {
      // numeric
      case 'int':
      case 'real':
      case '3':
      case '8':
        return '<input type="number" name="'.$encoded_name.'" value="'.$value.'" />';
      // date
      case 'date':
      case '10':
        return '<input type="date" name="'.$encoded_name.'" value="'.$value.'" />';
      case 'time':
      case '11':
        return '<input type="time" name="'.$encoded_name.'" step="1" value="'.$value.'" />';
      case 'datetime':
      case 'timestamp':
      case '7':
      case '12':
        return '<input type="text" name="'.$encoded_name.'" value="'.$value.'" />';
        // return "<input type='datetime-local' name='$name' value='$value'/>";
      // long text
      case 'blob':
      case '252':
        return '<textarea name="'.$encoded_name.'">'.$value.'</textarea>';
      default:
        // default: text
        return '<input type="text" name="'.$encoded_name.'" value="' . htmlspecialchars( $value, ENT_QUOTES ) . '" />';
    }
  } // end function

  function stm_get_data_type( $type ) {
    switch( $type ) {
      case 0:
        $data_type = 'decimal';
        break;
      case 1:
        $data_type = 'tinyint / tiny';
        break;
      case 2:
        $data_type = 'smallint / short';
        break;
      case 3:
        $data_type = 'int / long';
        break;
      case 4:
        $data_type = 'float';
        break;
      case 5:
        $data_type = 'double';
        break;
      case 6:
        $data_type = 'null';
        break;
      case 7:
        $data_type = 'timestamp';
        break;
      case 8:
        $data_type = 'bigint';
        break;
      case 9:
        $data_type = 'mediumint / int24';
        break;
      case 10:
        $data_type = 'date';
        break;
      case 11:
        $data_type = 'time';
        break;
       case 12:
        $data_type = 'datetime';
        break;
      case 13:
        $data_type = 'year';
        break;
      case 14:
        $data_type = 'newdate';
        break;
      case 16:
        $data_type = 'bit';
        break;
      case 246:
        $data_type = 'decimal';
        break;
      case 247:
        $data_type = 'enum';
        break;
      case 248:
        $data_type = 'set';
        break;
      case 249:
        $data_type = 'tiny_blob';
        break;
      case 250:
        $data_type = 'medium_blob';
        break;
      case 251:
        $data_type = 'long_blob';
        break;
      case 252:
        $data_type = 'blob';
        break;
     case 253:
        $data_type = 'varchar';
        break;
      case 254:
        $data_type = 'char / string / boolean';
        break;
      case 255;
        $data_type = 'geometry';
        break;
      default:
        $data_type = $type;
    }
    return '<span class="stm_help">' . $data_type . '</span>';
  } // end function
  
