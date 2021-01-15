<?php 
 $PostId = $post->ID;
 $Colorbox_Settings = unserialize(get_post_meta( $PostId, 'Colorbox_Settings', true));
		
		$option_names = array(
		"colorbox_sec_title" 	 => "yes",
		"show_colorbox_title_icon" => "1",
		"show_colorbox_title_icon_align" => "left",
        "colorbox_radius"      	 => "yes",
        "enable_colorbox_border"   => "yes",
        "colorbox_shadow"         => "yes",
        "colorbox_same_height"    => "no",
        "colorbox_masonry"        => "yes",
        "box_layout"              => 6,
        "colorbox_title_bg_clr"   => "#e8e8e8",
		"colorbox_title_icon_clr" => "#000000",
		"colorbox_desc_bg_clr"    => "#ffffff",
        "colorbox_desc_font_clr"  => "#000000",
        "show_colorbox_desc_align"  => "left",
        "title_size"         => "18",
        "des_size"     		 => "16",
        "font_family"     	 => "Open Sans",
        "colorbox_styles"      =>1,
		"custom_css"      =>"",
		);
		
		foreach($option_names as $option_name => $default_value) {
			if(isset($Colorbox_Settings[$option_name])) 
				${"" . $option_name}  = $Colorbox_Settings[$option_name];
			else
				${"" . $option_name}  = $default_value;
		}
?>

<Script>

 //Title Size Slider 
  jQuery(function() {
    jQuery( "#title_size_id" ).slider({
		orientation: "horizontal",
		range: "min",
		max: 60,
		min:5,
		slide: function( event, ui ) {
		jQuery( "#title_size" ).val( ui.value );
      }
		});
		
		jQuery( "#title_size_id" ).slider("value",<?php echo $title_size; ?> );
		jQuery( "#title_size" ).val( jQuery( "#title_size_id" ).slider( "value") );
    
  });
</script>
<Script>

 //minimum flake size script
  jQuery(function() {
    jQuery( "#des_size_id" ).slider({
		orientation: "horizontal",
		range: "min",
		max: 30,
		min:5,
		slide: function( event, ui ) {
		jQuery( "#des_size" ).val( ui.value );
      }
		});
		
		jQuery( "#des_size_id" ).slider("value",<?php echo $des_size; ?>);
		jQuery( "#des_size" ).val( jQuery( "#des_size_id" ).slider( "value") );
    
  });
</script>  
<input type="hidden" id="colorbox_setting_save_action" name="colorbox_setting_save_action" value="colorbox_setting_save_action">
		
<table class="form-table acc_table">
	<tbody>
		
		<tr>
			<th scope="row"><label><?php _e('Display Box Section Title ',wpshopmart_colorbox_text_domain); ?></label></th>
			<td>
				<div class="switch">
					<input type="radio" class="switch-input" name="colorbox_sec_title" value="yes" id="enable_colorbox_sec_title" <?php if($colorbox_sec_title == 'yes' ) { echo "checked"; } ?>   >
					<label for="enable_colorbox_sec_title" class="switch-label switch-label-off"><?php _e('Yes',wpshopmart_colorbox_text_domain); ?></label>
					<input type="radio" class="switch-input" name="colorbox_sec_title" value="no" id="disable_colorbox_sec_title"  <?php if($colorbox_sec_title == 'no' ) { echo "checked"; } ?> >
					<label for="disable_colorbox_sec_title" class="switch-label switch-label-on"><?php _e('No',wpshopmart_colorbox_text_domain); ?></label>
					<span class="switch-selection"></span>
				</div>
				<!-- Tooltip -->
				<a  class="ac_tooltip" href="#help" data-tooltip="#colorbox_sec_title_tp">help</a>
				<div id="colorbox_sec_title_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Display Box Section Title ',wpshopmart_colorbox_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_colorbox_directory_url.'assets/tooltip/img/section-title.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		
		
		
		<tr>
			<th scope="row"><label><?php _e('Display Option For Title and icon ',wpshopmart_colorbox_text_domain); ?></label></th>
			<td>
				<span style="display:block;margin-bottom:10px"><input type="radio" name="show_colorbox_title_icon" id="show_colorbox_title_icon" value="1" <?php if($show_colorbox_title_icon == '1' ) { echo "checked"; } ?> /> Show Box Title + Icon (both) </span>
				<span style="display:block;margin-bottom:10px"><input type="radio" name="show_colorbox_title_icon" id="show_colorbox_title_icon" value="2" <?php if($show_colorbox_title_icon == '2' ) { echo "checked"; } ?> /> Show only Box Title </span>
				<span style="display:block;margin-bottom:10px"><input type="radio" name="show_colorbox_title_icon" id="show_colorbox_title_icon" value="3" <?php if($show_colorbox_title_icon == '3' ) { echo "checked"; } ?>  /> Show Only Icon </span>
				<span style="display:block"><input type="radio" name="show_colorbox_title_icon" id="show_colorbox_title_icon" value="4"  <?php if($show_colorbox_title_icon == '4' ) { echo "checked"; } ?> /> Hide Both </span>
				
				<!-- Tooltip -->
				<a  class="ac_tooltip" href="#help" data-tooltip="#colorbox_title_icon_tp">help</a>
				<div id="colorbox_title_icon_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Display Box Title And Icon ',wpshopmart_colorbox_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_colorbox_directory_url.'assets/tooltip/img/box-title-icon.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Title and icon Position Alignment',wpshopmart_colorbox_text_domain); ?></label></th>
			<td>
				<span style="display:block;margin-bottom:10px"><input type="radio" name="show_colorbox_title_icon_align" id="show_colorbox_title_icon_align" value="left" <?php if($show_colorbox_title_icon_align == 'left' ) { echo "checked"; } ?> /> Left</span>
				<span style="display:block;margin-bottom:10px"><input type="radio" name="show_colorbox_title_icon_align" id="show_colorbox_title_icon_align" value="center" <?php if($show_colorbox_title_icon_align == 'center' ) { echo "checked"; } ?> /> Center </span>
				<span style="display:block;margin-bottom:10px"><input type="radio" name="show_colorbox_title_icon_align" id="show_colorbox_title_icon_align" value="right" <?php if($show_colorbox_title_icon_align == 'right' ) { echo "checked"; } ?>  /> Right </span>
				<!-- Tooltip -->
				<a  class="ac_tooltip" href="#help" data-tooltip="#colorbox_title_icon_align_tp">help</a>
				<div id="colorbox_title_icon_align_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Align your Text and Icon Position',wpshopmart_colorbox_text_domain); ?></h2>
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Enable Box Radius ',wpshopmart_colorbox_text_domain); ?></label></th>
			<td>
				<div class="switch">
					<input type="radio" class="switch-input" name="colorbox_radius" value="yes" id="enable_colorbox_radius" <?php if($colorbox_radius == 'yes' ) { echo "checked"; } ?>  >
					<label for="enable_colorbox_radius" class="switch-label switch-label-off"><?php _e('Yes',wpshopmart_colorbox_text_domain); ?></label>
					<input type="radio" class="switch-input" name="colorbox_radius" value="no" id="disable_colorbox_radius" <?php if($colorbox_radius == 'no' ) { echo "checked"; } ?> >
					<label for="disable_colorbox_radius" class="switch-label switch-label-on"><?php _e('No',wpshopmart_colorbox_text_domain); ?></label>
					<span class="switch-selection"></span>
				</div>
				<!-- Tooltip -->
				<a  class="ac_tooltip" href="#help" data-tooltip="#colorbox_radius_tp">help</a>
				<div id="colorbox_radius_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Enable or Disable Box Radius/curve here',wpshopmart_colorbox_text_domain); ?></h2>
					</div>
		    	</div>
				<div style="margin-top:10px;display:block;overflow:hidden;width:100%;"> <a style="margin-top:10px" href="https://wpshopmart.com/plugins/colorbox-pro/" target="_balnk">Unlock Border Radius Customization In Premium Version</a> </div>
			
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Display Box Border',wpshopmart_colorbox_text_domain); ?></label></th>
			<td>
				<div class="switch">
					<input type="radio" class="switch-input" name="enable_colorbox_border" value="yes" id="enable_colorbox_border" <?php if($enable_colorbox_border == 'yes' ) { echo "checked"; } ?>   >
					<label for="enable_colorbox_border" class="switch-label switch-label-off"><?php _e('Yes',wpshopmart_colorbox_text_domain); ?></label>
					<input type="radio" class="switch-input" name="enable_colorbox_border" value="no" id="disable_colorbox_border"  <?php if($enable_colorbox_border == 'no' ) { echo "checked"; } ?> >
					<label for="disable_colorbox_border" class="switch-label switch-label-on"><?php _e('No',wpshopmart_colorbox_text_domain); ?></label>
					<span class="switch-selection"></span>
				</div>
				<!-- Tooltip -->
				<a  class="ac_tooltip" href="#enable_ac_border_tp" data-tooltip="#enable_ac_border_tp">help</a>
				<div id="enable_ac_border_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Display Or Hide Box Border Here',wpshopmart_colorbox_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_colorbox_directory_url.'assets/tooltip/img/style.png'; ?> ">
						<br>
						<img src="<?php echo wpshopmart_colorbox_directory_url.'assets/tooltip/img/border.png'; ?>">
					</div>
		    	</div>
				<div style="margin-top:10px;display:block;overflow:hidden;width:100%;"> <a style="margin-top:10px" href="https://wpshopmart.com/plugins/colorbox-pro/" target="_balnk">Unlock Border Size Customization In Premium Version</a> </div>
			
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Enable Box Shadow',wpshopmart_colorbox_text_domain); ?></label></th>
			<td>
				<div class="switch">
					<input type="radio" class="switch-input" name="colorbox_shadow" value="yes" id="enable_colorbox_shadow" <?php if($colorbox_shadow == 'yes' ) { echo "checked"; } ?>  >
					<label for="enable_colorbox_shadow" class="switch-label switch-label-off"><?php _e('Yes',wpshopmart_colorbox_text_domain); ?></label>
					<input type="radio" class="switch-input" name="colorbox_shadow" value="no" id="disable_colorbox_shadow"  <?php if($colorbox_shadow == 'no' ) { echo "checked"; } ?> >
					<label for="disable_colorbox_shadow" class="switch-label switch-label-on"><?php _e('No',wpshopmart_colorbox_text_domain); ?></label>
					<span class="switch-selection"></span>
				</div>
				<!-- Tooltip -->
				<a  class="ac_tooltip" href="#help" data-tooltip="#colorbox_shadow_tp">help</a>
				<div id="colorbox_shadow_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Enable Box Shadow',wpshopmart_colorbox_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_colorbox_directory_url.'assets/tooltip/img/shadow.png'; ?>">
					</div>
		    	</div>
				<div style="margin-top:10px;display:block;overflow:hidden;width:100%;"> <a style="margin-top:10px" href="https://wpshopmart.com/plugins/colorbox-pro/" target="_balnk">Unlock Box Shadow Customization In Premium Version</a> </div>
			
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Enable Box Same Height',wpshopmart_colorbox_text_domain); ?></label></th>
			<td>
				<div class="switch">
					<input type="radio" class="switch-input" name="colorbox_same_height" value="yes" id="enable_colorbox_same_height" <?php if($colorbox_same_height == 'yes' ) { echo "checked"; } ?>  >
					<label for="enable_colorbox_same_height" class="switch-label switch-label-off"><?php _e('Yes',wpshopmart_colorbox_text_domain); ?></label>
					<input type="radio" class="switch-input" name="colorbox_same_height" value="no" id="disable_colorbox_same_height"  <?php if($colorbox_same_height == 'no' ) { echo "checked"; } ?> >
					<label for="disable_colorbox_same_height" class="switch-label switch-label-on"><?php _e('No',wpshopmart_colorbox_text_domain); ?></label>
					<span class="switch-selection"></span>
				</div>
				<!-- Tooltip -->
				<a  class="ac_tooltip" href="#help" data-tooltip="#colorbox_hight_tp">help</a>
				<div id="colorbox_hight_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Enable Or Disbale Same Height Option For Box Here',wpshopmart_colorbox_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_colorbox_directory_url.'assets/tooltip/img/same-height.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Enable Box Masonry/Isotope Effect',wpshopmart_colorbox_text_domain); ?></label></th>
			<td>
				<div class="switch">
					<input type="radio" class="switch-input" name="colorbox_masonry" value="yes" id="enable_colorbox_masonry" <?php if($colorbox_masonry == 'yes' ) { echo "checked"; } ?>  >
					<label for="enable_colorbox_masonry" class="switch-label switch-label-off"><?php _e('Yes',wpshopmart_colorbox_text_domain); ?></label>
					<input type="radio" class="switch-input" name="colorbox_masonry" value="no" id="disable_colorbox_masonry"  <?php if($colorbox_masonry == 'no' ) { echo "checked"; } ?> >
					<label for="disable_colorbox_masonry" class="switch-label switch-label-on"><?php _e('No',wpshopmart_colorbox_text_domain); ?></label>
					<span class="switch-selection"></span>
				</div>
				<!-- Tooltip -->
				<a  class="ac_tooltip" href="#help" data-tooltip="#colorbox_masonry_tp">help</a>
				<div id="colorbox_masonry_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Enable Box Masonry/Isotope Effect',wpshopmart_colorbox_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_colorbox_directory_url.'assets/tooltip/img/masonry.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		
		
		<tr>
			<th scope="row"><label><?php _e('Box Styles',wpshopmart_colorbox_text_domain); ?></label></th>
			<td>
				<span style="display:block;margin-bottom:10px"><input type="radio" name="colorbox_styles" id="colorbox_styles" value="1" <?php if($colorbox_styles == '1' ) { echo "checked"; } ?> /> Default </span>
				<span style="display:block;margin-bottom:10px"><input type="radio" name="colorbox_styles" id="colorbox_styles2" value="2" <?php if($colorbox_styles == '2' ) { echo "checked"; } ?>  /> Soft </span>
				<span style="display:block"><input type="radio" name="colorbox_styles" id="colorbox_styles3" value="3"  <?php if($colorbox_styles == '3' ) { echo "checked"; } ?> /> Noise </span>
				<!-- Tooltip -->
				<a  class="ac_tooltip" href="#help" data-tooltip="#box_styles_tp">help</a>
				<div id="box_styles_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Box Styles',wpshopmart_colorbox_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_colorbox_directory_url.'assets/tooltip/img/desc-bg-color.png'; ?>">
						<br>
						<img src="<?php echo wpshopmart_colorbox_directory_url.'assets/tooltip/img/style.png'; ?>">
					</div>
		    	</div>
				<div style="margin-top:10px;display:block;overflow:hidden;width:100%;"> <a style="margin-top:10px" href="https://wpshopmart.com/plugins/colorbox-pro/" target="_balnk">Unlock 2 More Overlays Styles In Premium Version</a> </div>
			
			</td>
		</tr>
		
		<tr >
			<th><?php _e('Box Design Layout',wpshopmart_colorbox_text_domain); ?> </th>
			<td>
				
				<select name="box_layout" id="box_layout" class="standard-dropdown" style="width:100%" >
					
						<option value="12"  <?php if($box_layout == '12') { echo "selected"; } ?>>One Column Layout</option>
						<option value="6"  <?php if($box_layout == '6') { echo "selected"; } ?>>Two Column Layout</option>
						<option value="4"  <?php if($box_layout == '4') { echo "selected"; } ?>>Three Column Layout</option>
						<option value="3"  <?php if($box_layout == '3') { echo "selected"; } ?>>Four Column Layout</option>
						<option value="5"  <?php if($box_layout == '5') { echo "selected"; } ?>>Five Column Layout</option>
						
				</select>
				<!-- Tooltip -->
				<a  class="ac_tooltip" href="#help" data-tooltip="#enable_box_layout_tp">help</a>
				<div id="enable_box_layout_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Select Box Layout here ',wpshopmart_colorbox_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_colorbox_directory_url.'assets/tooltip/img/style.png'; ?> ">
						<br>
						<img src="<?php echo wpshopmart_colorbox_directory_url.'assets/tooltip/img/column.png'; ?>">
					</div>
		    	</div>
				<div style="margin-top:10px;display:block;overflow:hidden;width:100%;"> <a style="margin-top:10px" href="https://wpshopmart.com/plugins/colorbox-pro/" target="_balnk">Unlock 6,8,10 column Layout In Premium Version</a> </div>
			
			</td>
		</tr>
		
		
		<tr >
			<th scope="row"><label><?php _e('Box Title Background Colour',wpshopmart_colorbox_text_domain); ?></label></th>
			<td>
				<input id="colorbox_title_bg_clr" name="colorbox_title_bg_clr" type="text" value="<?php echo $colorbox_title_bg_clr; ?>" class="my-color-field" data-default-color="#e8e8e8" />
				<!-- Tooltip -->
				<a  class="ac_tooltip" href="#help" data-tooltip="#colorbox_title_bg_clr_tp">help</a>
				<div id="colorbox_title_bg_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Box Title Background Colour',wpshopmart_colorbox_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_colorbox_directory_url.'assets/tooltip/img/title-bg-color.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr >
			<th scope="row"><label><?php _e('Box Title/Icon Font Colour',wpshopmart_colorbox_text_domain); ?></label></th>
			<td>
				<input id="colorbox_title_icon_clr" name="colorbox_title_icon_clr" type="text" value="<?php echo $colorbox_title_icon_clr; ?>" class="my-color-field" data-default-color="#ffffff" />
				<!-- Tooltip -->
				<a  class="ac_tooltip" href="#help" data-tooltip="#colorbox_title_icon_clr_tp">help</a>
				<div id="colorbox_title_icon_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Box Title/Icon Font Colour',wpshopmart_colorbox_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_colorbox_directory_url.'assets/tooltip/img/title-ft-color.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		
		
		<tr >
			<th scope="row"><label><?php _e('Box Description Background Colour',wpshopmart_colorbox_text_domain); ?></label></th>
			<td>
				<input id="colorbox_desc_bg_clr" name="colorbox_desc_bg_clr" type="text" value="<?php echo $colorbox_desc_bg_clr; ?>" class="my-color-field" data-default-color="#ffffff" />
				<!-- Tooltip -->
				<a  class="ac_tooltip" href="#help" data-tooltip="#colorbox_desc_bg_clr_tp">help</a>
				<div id="colorbox_desc_bg_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Box Description Background Colour',wpshopmart_colorbox_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_colorbox_directory_url.'assets/tooltip/img/desc-bg-color.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr >
			<th scope="row"><label><?php _e('Box Description Font Colour',wpshopmart_colorbox_text_domain); ?></label></th>
			<td>
				<input id="colorbox_desc_font_clr" name="colorbox_desc_font_clr" type="text" value="<?php echo $colorbox_desc_font_clr; ?>" class="my-color-field" data-default-color="#000000" />
				<!-- Tooltip -->
				<a  class="ac_tooltip" href="#colorbox_desc_font_clr_tp" data-tooltip="#colorbox_desc_font_clr_tp">help</a>
				<div id="colorbox_desc_font_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Box Description Font Colour',wpshopmart_colorbox_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_colorbox_directory_url.'assets/tooltip/img/desc-ft-color.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Description Position Alignment',wpshopmart_colorbox_text_domain); ?></label></th>
			<td>
				<span style="display:block;margin-bottom:10px"><input type="radio" name="show_colorbox_desc_align" id="show_colorbox_desc_align" value="left" <?php if($show_colorbox_desc_align == 'left' ) { echo "checked"; } ?> /> Left</span>
				<span style="display:block;margin-bottom:10px"><input type="radio" name="show_colorbox_desc_align" id="show_colorbox_desc_align" value="center" <?php if($show_colorbox_desc_align == 'center' ) { echo "checked"; } ?> /> Center </span>
				<span style="display:block;margin-bottom:10px"><input type="radio" name="show_colorbox_desc_align" id="show_colorbox_desc_align" value="right" <?php if($show_colorbox_desc_align == 'right' ) { echo "checked"; } ?>  /> Right </span>
				<!-- Tooltip -->
				<a  class="ac_tooltip" href="#help" data-tooltip="#colorbox_desc_align_tp">help</a>
				<div id="colorbox_desc_align_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Align your description position here',wpshopmart_colorbox_text_domain); ?></h2>
						</div>
		    	</div>
			</td>
		</tr>
		
		<tr class="setting_color">
			<th><?php _e('Title/Icon Font Size',wpshopmart_colorbox_text_domain); ?> </th>
			<td>
				<div id="title_size_id" class="size-slider" ></div>
				<input type="text" class="slider-text" id="title_size" name="title_size"  readonly="readonly">
				<!-- Tooltip -->
				<a  class="ac_tooltip" href="#help" data-tooltip="#title_size_tp">help</a>
				<div id="title_size_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;max-width: 300px;">
						<h2 style="color:#fff !important;">You can update Title and Icon Font Size from here. Just Scroll it to change size.</h2>
					
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr class="setting_color">
			<th><?php _e('Description Font Size',wpshopmart_colorbox_text_domain); ?> </th>
			<td>
				<div id="des_size_id" class="size-slider" ></div>
				<input type="text" class="slider-text" id="des_size" name="des_size"  readonly="readonly">
				<!-- Tooltip -->
				<a  class="ac_tooltip" href="#help" data-tooltip="#des_size_tp">help</a>
				<div id="des_size_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;max-width: 300px;">
						<h2 style="color:#fff !important;">You can update Description Font Size from here. Just Scroll it to change size.</h2>
						
					</div>
		    	</div>
			</td>
		</tr>
		<tr >
			<th><?php _e('Font Style/Family',wpshopmart_colorbox_text_domain); ?> </th>
			<td>
				<select name="font_family" id="font_family" class="standard-dropdown" style="width:100%" >
					<optgroup label="Default Fonts">
						<option value="Arial"           <?php if($font_family == 'Arial' ) { echo "selected"; } ?>>Arial</option>
						<option value="Arial Black"    <?php if($font_family == 'Arial Black' ) { echo "selected"; } ?>>Arial Black</option>
						<option value="Courier New"     <?php if($font_family == 'Courier New' ) { echo "selected"; } ?>>Courier New</option>
						<option value="Georgia"         <?php if($font_family == 'Georgia' ) { echo "selected"; } ?>>Georgia</option>
						<option value="Grande"          <?php if($font_family == 'Grande' ) { echo "selected"; } ?>>Grande</option>
						<option value="Helvetica" 	<?php if($font_family == 'Helvetica' ) { echo "selected"; } ?>>Helvetica Neue</option>
						<option value="Impact"         <?php if($font_family == 'Impact' ) { echo "selected"; } ?>>Impact</option>
						<option value="Lucida"         <?php if($font_family == 'Lucida' ) { echo "selected"; } ?>>Lucida</option>
						<option value="Lucida Grande"         <?php if($font_family == 'Lucida Grande' ) { echo "selected"; } ?>>Lucida Grande</option>
						<option value="Open Sans"   <?php if($font_family == 'Open Sans' ) { echo "selected"; } ?>>Open Sans</option>
						<option value="OpenSansBold"   <?php if($font_family == 'OpenSansBold' ) { echo "selected"; } ?>>OpenSansBold</option>
						<option value="Palatino Linotype"       <?php if($font_family == 'Palatino Linotype' ) { echo "selected"; } ?>>Palatino</option>
						<option value="Sans"           <?php if($font_family == 'Sans' ) { echo "selected"; } ?>>Sans</option>
						<option value="sans-serif"           <?php if($font_family == 'sans-serif' ) { echo "selected"; } ?>>Sans-Serif</option>
						<option value="Tahoma"         <?php if($font_family == 'Tahoma' ) { echo "selected"; } ?>>Tahoma</option>
						<option value="Times New Roman"          <?php if($font_family == 'Times New Roman' ) { echo "selected"; } ?>>Times New Roman</option>
						<option value="Trebuchet"      <?php if($font_family == 'Trebuchet' ) { echo "selected"; } ?>>Trebuchet</option>
						<option value="Verdana"        <?php if($font_family == 'Verdana' ) { echo "selected"; } ?>>Verdana</option>
					</optgroup>
				</select>
				<!-- Tooltip -->
				<a  class="ac_tooltip" href="#help" data-tooltip="#font_family_tp">help</a>
				<div id="font_family_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;max-width: 300px;">
						<h2 style="color:#fff !important;">You can update Title and Description Font Family/Style from here. Select any one form these options.</h2>
					
					</div>
		    	</div>
				<div style="margin-top:10px;display:block;overflow:hidden;width:100%;"> <a style="margin-top:10px" href="https://wpshopmart.com/plugins/colorbox-pro/" target="_balnk">Unlock Google Font Style In Premium Version</a> </div>
			
			</td>
		</tr>
		
		
		<tr>
			<th scope="row"><label><?php _e('Enable Individual Color Option On Each Box ',wpshopmart_colorbox_text_domain); ?></label></th>
			<td>
				<div class="switch wpsm_off">
					<input type="radio" class="switch-input" name="ind_color" value="yes" id="enable_ind_color"   >
					<label for="enable_ind_color" class="switch-label switch-label-off"><?php _e('Yes',wpshopmart_colorbox_text_domain); ?></label>
					<input type="radio" class="switch-input" name="ind_color" value="no" id="disable_ind_color"  checked>
					<label for="disable_ind_color" class="switch-label switch-label-on"><?php _e('No',wpshopmart_colorbox_text_domain); ?></label>
					<span class="switch-selection"></span>
				</div>
				<div style="margin-top:10px;display:block;overflow:hidden;width:100%;"> <a style="margin-top:10px" href="https://wpshopmart.com/plugins/colorbox-pro/" target="_balnk">Available In Premium Version</a></div>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Enable Link On Box ',wpshopmart_colorbox_text_domain); ?></label></th>
			<td>
				<div class="switch wpsm_off">
					<input type="radio" class="switch-input" name="acc_hover" value="yes" id="enable_acc_hover"   >
					<label for="enable_acc_hover" class="switch-label switch-label-off"><?php _e('Yes',wpshopmart_colorbox_text_domain); ?></label>
					<input type="radio" class="switch-input" name="acc_hover" value="no" id="disable_acc_hover"  checked>
					<label for="disable_acc_hover" class="switch-label switch-label-on"><?php _e('No',wpshopmart_colorbox_text_domain); ?></label>
					<span class="switch-selection"></span>
				</div>
				<div style="margin-top:10px;display:block;overflow:hidden;width:100%;"> <a style="margin-top:10px" href="https://wpshopmart.com/plugins/colorbox-pro/" target="_balnk">Available In Premium Version</a></div>
			</td>
		</tr>
		
		<script>
			jQuery(function() {
				jQuery(".wpsm_off *").attr("disabled", "disabled").off('click');
			});
			jQuery('.ac_tooltip').darkTooltip({
				opacity:1,
				gravity:'east',
				size:'small'
			});
		</script>
	</tbody>
</table>