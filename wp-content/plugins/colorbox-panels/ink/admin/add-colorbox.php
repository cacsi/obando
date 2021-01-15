<div style=" overflow: hidden;padding: 10px;">
<style>
	.html_editor_button{
		border-radius:0px;
		background-color: #9C9C9C;
		border-color: #9C9C9C;
		margin-bottom:20px;
	}
	</style>
	<h3><?php _e('Add Colorbox',wpshopmart_colorbox_text_domain); ?></h3>
	<input type="hidden" name="colorbox_save_data_action" value="colorbox_save_data_action" />
	<ul class="clearfix" id="colorbox_panel">
	<?php
			$i=1;
			$colorbox_data = unserialize(get_post_meta( $post->ID, 'wpsm_colorbox_data', true));
			 $TotalCount =  get_post_meta( $post->ID, 'wpsm_colorbox_count', true );
			if($TotalCount) 
			{
				if($TotalCount!=-1)
				{
					foreach($colorbox_data as $colorbox_single_data)
					{
						 $colorbox_title = $colorbox_single_data['colorbox_title'];
						 $colorbox_desc = $colorbox_single_data['colorbox_desc'];
						 $colorbox_title_icon = $colorbox_single_data['colorbox_title_icon'];
						 $enable_single_icon = $colorbox_single_data['enable_single_icon'];
						
						?>
						<li class="wpsm_ac-panel single_color_box" >
							<span class="ac_label"><?php _e('Box Title',wpshopmart_colorbox_text_domain); ?></span>
							<input type="text" id="colorbox_title[]" name="colorbox_title[]" value="<?php echo esc_attr($colorbox_title); ?>" placeholder="Enter Box Title Here" class="wpsm_ac_label_text">
							<span class="ac_label"><?php _e('Box Description',wpshopmart_colorbox_text_domain); ?></span>
							<textarea  id="colorbox_desc[]" name="colorbox_desc[]"  placeholder="Enter Box Description Here" class="wpsm_ac_label_text"><?php echo esc_html($colorbox_desc); ?></textarea>
							<a type="button" class="btn btn-primary btn-block html_editor_button" data-remodal-target="modal" href="#" id="<?php echo $i; ?>"  onclick="open_editor(<?php echo $i; ?>)">Use WYSIWYG Editor </a>
							
							
							<span class="ac_label"><?php _e('Box Icon',wpshopmart_colorbox_text_domain); ?></span>
							<div class="form-group input-group">
								<input data-placement="bottomRight" id="colorbox_title_icon[]" name="colorbox_title_icon[]" class="form-control icp icp-auto" value="<?php echo  $colorbox_title_icon; ?>" type="text" readonly="readonly" />
								<span class="input-group-addon "></span>
							</div>
							<span class="ac_label"><?php _e('Display Above Icon',wpshopmart_colorbox_text_domain); ?></span>
							<select name="enable_single_icon[]" style="width:100%" >
								<option value="yes" <?php if($enable_single_icon == 'yes') echo "selected=selected"; ?>>Yes</option>
								<option value="no" <?php if($enable_single_icon == 'no') echo "selected=selected"; ?>>No</option>
								
							</select>
							
							<a class="remove_button" href="#delete" id="remove_bt" ><i class="fa fa-trash-o"></i></a>
							
						</li>
						<?php 
						$i++;
					} // end of foreach
				}else{
				echo "<h2>No Colorbox Found</h2>";
				}
			}
			else 
			{
				  for($i=1; $i<=2; $i++)
				  {
					  ?>
					 <li class="wpsm_ac-panel single_color_box" >
						<span class="ac_label"><?php _e('Box Title',wpshopmart_colorbox_text_domain); ?></span>
						<input type="text" id="colorbox_title[]" name="colorbox_title[]" value="Box Sample Title" placeholder="Enter Box Title Here" class="wpsm_ac_label_text">
						<span class="ac_label"><?php _e('Box Description',wpshopmart_colorbox_text_domain); ?></span>
						
						<textarea  id="colorbox_desc[]" name="colorbox_desc[]"  placeholder="Enter Box Description Here" class="wpsm_ac_label_text">Box Sample Description</textarea>
						<a type="button" class="btn btn-primary btn-block html_editor_button" data-remodal-target="modal" href="#" id="<?php echo $i; ?>"  onclick="open_editor(<?php echo $i; ?>)">Use WYSIWYG Editor </a>
								
						
						<span class="ac_label"><?php _e('Box Icon',wpshopmart_colorbox_text_domain); ?></span>
						<div class="form-group input-group">
							<input data-placement="bottomRight" id="colorbox_title_icon[]" name="colorbox_title_icon[]" class="form-control icp icp-auto" value="fa-laptop" type="text" readonly="readonly" />
							<span class="input-group-addon "></span>
						</div>
						<span class="ac_label"><?php _e('Display Above Icon',wpshopmart_colorbox_text_domain); ?></span>
							
						<select name="enable_single_icon[]" style="width:100%" >
								<option value="yes" selected=selected>Yes</option>
								<option value="no" >No</option>
						</select>
						<a class="remove_button" href="#delete" id="remove_bt" ><i class="fa fa-trash-o"></i></a>
						
					</li>
					 <?php
				}
			}
			?>
	</ul>
	
	<div class="remodal" data-remodal-options=" closeOnOutsideClick: false" data-remodal-id="modal" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
	  <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
	  <div>
		<h2 id="modal1Title">Colorbox Editor</h2>
		<p id="modal1Desc">
		  <?php
			$content = '';
			$editor_id = 'get_text';
			wp_editor( $content, $editor_id );
		?>
		<input type="hidden" value="" id="get_id" />
		</p>
	  </div>
	  <br>
	  <button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>
	  <button data-remodal-action="confirm" class="remodal-confirm" onclick="insert_html()">OK</button>
	</div>
	
	<div style="display:block;margin-top:20px;overflow:hidden;width: 100%;float:left;">
		<a class="wpsm_ac-panel add_wpsm_ac_new" id="add_new_ac" onclick="add_new_content()"   >
			<?php _e('Add New Colorbox', wpshopmart_colorbox_text_domain); ?>
		</a>
		<a  style="float: left;padding:10px !important;background:#31a3dd;" class=" add_wpsm_ac_new delete_all_acc" id="delete_all_colorbox"    >
			<i style="font-size:57px;"class="fa fa-trash-o"></i>
			<span style="display:block"><?php _e('Delete All',wpshopmart_colorbox_text_domain); ?></span>
		</a>
	</div>
	
</div>
<h1>Get Support</h1>
<h3>If You have any issue then please ask us any time</h3>
<a href="https://wordpress.org/support/plugin/colorbox-panels" target="_blank" class="button button-primary button-hero ">Submit Your Support Ticket</a>
<br /> <br />
<?php require('add-colorbox-js-footer.php'); ?>