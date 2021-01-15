<?php 
	$post_type = "colorbox_panels";
	
    $AllColorbox = array(  'p' => $WPSM_Colorbox_ID, 'post_type' => $post_type, 'orderby' => 'ASC');
    $loop = new WP_Query( $AllColorbox );
	
	while ( $loop->have_posts() ) : $loop->the_post();
		//get the post id
		$post_id = get_the_ID();
		
		$Colorbox_Settings = unserialize(get_post_meta( $post_id, 'Colorbox_Settings', true));
		if(count($Colorbox_Settings)) 
		{
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
		}
				
		
		$colorbox_data = unserialize(get_post_meta( $post_id, 'wpsm_colorbox_data', true));
		$TotalCount =  get_post_meta( $post_id, 'wpsm_colorbox_count', true );
		if($TotalCount>0) 
		{
		?>
		<?php  if($colorbox_sec_title == 'yes' ) { ?>
					<h3 style="margin-bottom:20px ;display:block;width:100%;margin-top:10px"><?php echo get_the_title( $post_id ); ?> </h3>
				<?php } ?>
				<style>
					<?php 
					require('style.php');
					echo $custom_css; ?>
				</style>
				<div style="display:block;overflow:hidden;width:100%;">
				<div id="colorbox_main_container_<?php echo $post_id;  ?>" style="colorbox_main_container">
					<?php
					foreach($colorbox_data as $colorbox_single_data)
					{
						 $colorbox_title = $colorbox_single_data['colorbox_title'];
						 $colorbox_desc = $colorbox_single_data['colorbox_desc'];
						 $colorbox_title_icon = $colorbox_single_data['colorbox_title_icon'];
						 $enable_single_icon = $colorbox_single_data['enable_single_icon'];
					?>
					<div class=" wpsm_col-md-<?php echo $box_layout; ?> wpsm_col-sm-6 colorbox_singel_box">
						<div class="wpsm_panel wpsm_panel-default wpsm_panel_default_<?php echo $post_id; ?> ">
						  <?php if($show_colorbox_title_icon != '4' )
							{ ?>
						  <div class="wpsm_panel-heading">
							<h3 class="wpsm_panel-title">
							<?php if($show_colorbox_title_icon == '1' || $show_colorbox_title_icon==3 )
							{ 
								 if($enable_single_icon=="yes")
								{
							?>
									<span style="margin-right:6px;" class="fa <?php echo $colorbox_title_icon; ?>"></span>
							<?php
								}
							}
							if($show_colorbox_title_icon == '1' || $show_colorbox_title_icon==2 )
							{  echo $colorbox_title; } ?></h3>
						  </div> <?php } ?>
							<?php 
							if(preg_match('/\S+/',$colorbox_desc)) { ?>					 
						 <div class="wpsm_panel-body">
							<?php echo do_shortcode($colorbox_desc); ?>
						  </div>
						  <?php } ?> 
						</div>
					</div>
					<?php 
					}
					?>
					
					</div>
				</div>
				<?php if($colorbox_masonry=="yes") { ?>
				<script>
					jQuery(window).load(function(){
						jQuery('#colorbox_main_container_<?php echo $post_id;  ?>').masonry({
							   itemSelector: '.colorbox_singel_box',
						});
					});
				</script>
				<?php } ?>
				<?php if($colorbox_same_height=="yes") { ?>
				<script>
					var col = new jColumn();
					col.jcolumn('wpsm_panel_default_<?php echo $post_id; ?>');
				</script>
				<?php } ?>
			<?php
		}
		else{
			echo "<h3> No Colorbox Found </h3>";
		}
	endwhile; ?>