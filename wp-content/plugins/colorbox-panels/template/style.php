#colorbox_main_container_<?php echo $post_id; ?> .wpsm_panel {
	margin-bottom: 0px !important;
	background-color: <?php echo $colorbox_desc_bg_clr; ?>;
	
	<?php if($enable_colorbox_border=="yes"){ ?>
	border: 2px solid <?php echo $colorbox_title_bg_clr; ?>;
	<?php } else { ?>
	border: 0px solid <?php echo $colorbox_title_bg_clr; ?>;
	<?php } ?>
	
	<?php if($colorbox_radius=="yes"){ ?>
	border-radius: 4px;
	<?php } else { ?>
	border-radius: 0px;
	<?php } ?>
	<?php if($colorbox_shadow=="yes"){ ?>
	-webkit-box-shadow: 0 0 20px rgba(0,0,0,.2);
	box-shadow: 0 0 20px rgba(0,0,0,.2);
	   
	<?php } ?>
}

#colorbox_main_container_<?php echo $post_id; ?> .wpsm_panel-default > .wpsm_panel-heading {
	background-color: <?php echo $colorbox_title_bg_clr; ?> !important;
	border-color: rgba(0,0,0,0.05);
	border-top-left-radius: 0px;
	border-top-right-radius: 0px;
	text-align:<?php echo $show_colorbox_title_icon_align; ?>;
}

#colorbox_main_container_<?php echo $post_id; ?> .colorbox_singel_box{
  margin-bottom:20px !important;
	  padding-top: 5px;
}
#colorbox_main_container_<?php echo $post_id; ?> .wpsm_panel-title{
	margin-top: 0 !important;
	margin-bottom: 0 !important;
	font-size: <?php echo $title_size; ?>px !important;
	color: <?php echo $colorbox_title_icon_clr; ?> !important;
	font-family: <?php echo $font_family; ?> !important;
	word-wrap:break-word;

}
#colorbox_main_container_<?php echo $post_id; ?> .wpsm_panel-title span{
	font-size: <?php echo $title_size; ?>px !important;
	color: <?php echo $colorbox_title_icon_clr; ?> !important;
	 vertical-align: middle;
}
#colorbox_main_container_<?php echo $post_id; ?> .wpsm_panel-body{
	color: <?php echo $colorbox_desc_font_clr; ?> !important;
	background-color:<?php echo $colorbox_desc_bg_clr; ?> !important;
	font-size:<?php echo $des_size; ?>px !important;
	font-family: <?php echo $font_family; ?> !important;
	overflow:hidden;
	text-align:<?php echo $show_colorbox_desc_align; ?>
}

 <?php 
 switch($colorbox_styles){
		case "1":
		?>
		
		<?php
		break;
		case "2":
		 ?>
		#colorbox_main_container_<?php echo $post_id; ?> .wpsm_panel-heading {
			background-image: url(<?php echo wpshopmart_colorbox_directory_url.'assets/images/style-soft.png'; ?>);
			background-position: 0 0;
			background-repeat: repeat-x;
		}
		<?php
		break;
		case "3":
		?>
		#colorbox_main_container_<?php echo $post_id; ?> .wpsm_panel-heading {
			background-image: url(<?php echo wpshopmart_colorbox_directory_url.'assets/images/style-noise.png'; ?>);
			background-position: 0 0;
			background-repeat: repeat-x;
			}
		<?php
		break;
	}
	?>	

@media (max-width: 992px){
	.colorbox_singel_box{ 
		width:50% !important;
	}
}
@media (max-width: 786px){
	.colorbox_singel_box{ 
		width:100% !important;
	}
}