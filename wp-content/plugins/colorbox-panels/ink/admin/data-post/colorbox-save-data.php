<?php
if(isset($PostID) && isset($_POST['colorbox_save_data_action']) ) {
			$TotalCount = count($_POST['colorbox_title']);
			$ColorboxArray = array();
			if($TotalCount) {
				for($i=0; $i < $TotalCount; $i++) {
					$colorbox_title = stripslashes(sanitize_text_field($_POST['colorbox_title'][$i]));
					$colorbox_title_icon = sanitize_text_field($_POST['colorbox_title_icon'][$i]);
					$enable_single_icon = sanitize_text_field($_POST['enable_single_icon'][$i]);
					$colorbox_desc = stripslashes($_POST['colorbox_desc'][$i]);

					$ColorboxArray[] = array(
						'colorbox_title' => $colorbox_title,
						'colorbox_title_icon' => $colorbox_title_icon,
						'enable_single_icon' => $enable_single_icon,
						'colorbox_desc' => $colorbox_desc,
					);
				}
				update_post_meta($PostID, 'wpsm_colorbox_data', serialize($ColorboxArray));
				update_post_meta($PostID, 'wpsm_colorbox_count', $TotalCount);
			} else {
				$TotalCount = -1;
				update_post_meta($PostID, 'wpsm_colorbox_count', $TotalCount);
				$ColorboxArray = array();
				update_post_meta($PostID, 'wpsm_colorbox_data', serialize($ColorboxArray));
			}
		}
 ?>