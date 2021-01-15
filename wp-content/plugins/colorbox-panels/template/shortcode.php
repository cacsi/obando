<?php
// adding shortcode of colorbox to display content
add_shortcode( 'WPSM_COLORBOX', 'ColorboxShortCode' );
function ColorboxShortCode( $Id ) {
	ob_start();	
	if(!isset($Id['id'])) 
	 {
		$WPSM_Colorbox_ID = "";
	 } 
	else 
	{
		$WPSM_Colorbox_ID = $Id['id'];
	}
	require("content.php"); 
	wp_reset_query();
    return ob_get_clean();
}
?>