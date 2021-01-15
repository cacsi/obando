<?php
class wpsm_colorbox {
	private static $instance;
    public static function forge() {
        if (!isset(self::$instance)) {
            $className = __CLASS__;
            self::$instance = new $className;
        }
        return self::$instance;
    }
	
	private function __construct() {
		add_action('admin_enqueue_scripts', array(&$this, 'wpsm_colorbox_admin_scripts'));
        if (is_admin()) {
			add_action('init', array(&$this, 'colorbox_register_cpt'), 1);
			add_action('add_meta_boxes', array(&$this, 'wpsm_colorbox_meta_boxes_group'));
			add_action('admin_init', array(&$this, 'wpsm_colorbox_meta_boxes_group'), 1);
			add_action('save_post', array(&$this, 'add_colorbox_meta_box_save'), 9, 1);
			add_action('save_post', array(&$this, 'colorbox_settings_meta_box_save'), 9, 1);
		}
    }
	
	// admin scripts
	public function wpsm_colorbox_admin_scripts(){
		if(get_post_type()=="colorbox_panels"){
			
			wp_enqueue_media();
			wp_enqueue_script('jquery-ui-datepicker');
			//color-picker css n js
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'wpsm_colorbox-color-pic', wpshopmart_colorbox_directory_url.'assets/js/color-picker.js', array( 'wp-color-picker' ), false, true );
			wp_enqueue_style('wpsm_colorbox-panel-style', wpshopmart_colorbox_directory_url.'assets/css/panel-style.css');
			  
			//font awesome css
			wp_enqueue_style('wpsm_colorbox-font-awesome', wpshopmart_colorbox_directory_url.'assets/css/font-awesome/css/font-awesome.min.css');
			wp_enqueue_style('wpsm_colorbox_bootstrap', wpshopmart_colorbox_directory_url.'assets/css/bootstrap.css');
			wp_enqueue_style('wpsm_colorbox_font-awesome-picker', wpshopmart_colorbox_directory_url.'assets/css/fontawesome-iconpicker.css');
			wp_enqueue_style('wpsm_colorbox_jquery-css', wpshopmart_colorbox_directory_url .'assets/css/ac_jquery-ui.css');
			
			wp_enqueue_style('wpsm_colorbox_remodal-css', wpshopmart_colorbox_directory_url .'assets/modal/remodal.css');
			wp_enqueue_style('wpsm_colorbox_remodal-default-theme-css', wpshopmart_colorbox_directory_url .'assets/modal/remodal-default-theme.css');
		
			
			wp_enqueue_script( 'wpsm_colorbox-bootstrap-js', wpshopmart_colorbox_directory_url.'assets/js/bootstrap.js');
			
			//tooltip
			wp_enqueue_style('wpsm_colorbox_tooltip', wpshopmart_colorbox_directory_url.'assets/tooltip/darktooltip.css');
			wp_enqueue_script( 'wpsm_colorbox-tooltip-js', wpshopmart_colorbox_directory_url.'assets/tooltip/jquery.darktooltip.js');
			
			// settings
			wp_enqueue_style('wpsm_colorbox_settings-css', wpshopmart_colorbox_directory_url.'assets/css/settings.css');
			
			//icon picker	
			wp_enqueue_script('wpsm_colorbox_font-icon-picker-js',wpshopmart_colorbox_directory_url.'assets/js/fontawesome-iconpicker.js',array('jquery'));
			wp_enqueue_script('wpsm_colorbox_call-icon-picker-js',wpshopmart_colorbox_directory_url.'assets/js/call-icon-picker.js',array('jquery'), false, true);
		
			//css editor 
			wp_enqueue_style('wpsm_colorbox_codemirror-css', wpshopmart_colorbox_directory_url.'assets/codex/codemirror.css');
			wp_enqueue_style('wpsm_colorbox_ambiance', wpshopmart_colorbox_directory_url.'assets/codex/ambiance.css');
			wp_enqueue_style('wpsm_colorbox_show-hint-css', wpshopmart_colorbox_directory_url.'assets/codex/show-hint.css');
			
			wp_enqueue_script('wpsm_colorbox_codemirror-js',wpshopmart_colorbox_directory_url.'assets/codex/codemirror.js',array('jquery'));
			wp_enqueue_script('wpsm_colorbox_css-js',wpshopmart_colorbox_directory_url.'assets/codex/css.js',array('jquery'));
			wp_enqueue_script('wpsm_colorbox_css-hint-js',wpshopmart_colorbox_directory_url.'assets/codex/css-hint.js',array('jquery'));
			
			wp_enqueue_script('wpsm_colorbox_min-js',wpshopmart_colorbox_directory_url.'assets/modal/remodal.min.js',array('jquery'), false, true);
	
		}
	}
	
	public function colorbox_register_cpt(){
		require_once('cpt-reg.php');
		add_filter( 'manage_edit-colorbox_panels_columns', array(&$this, 'colorbox_panels_columns' )) ;
		add_action( 'manage_colorbox_panels_posts_custom_column', array(&$this, 'colorbox_panels_manage_columns' ), 10, 2 );
	}
	
	function colorbox_panels_columns( $columns ){
        $columns = array(
            'cb' => '<input type="checkbox" />',
            'title' => __( 'Colorbox' ),
            'shortcode' => __( 'Colorbox Shortcode' ),
            'date' => __( 'Date' )
        );
        return $columns;
    }

    function colorbox_panels_manage_columns( $column, $post_id ){
        global $post;
        switch( $column ) {
          case 'shortcode' :
            echo '<input style="width:225px" type="text" value="[WPSM_COLORBOX id='.$post_id.']" readonly="readonly" />';
            break;
          default :
            break;
        }
    }
	
	// metaboxes
	public function wpsm_colorbox_meta_boxes_group(){
		add_meta_box('add_colorbox', __('Add Colorbox Panel', wpshopmart_colorbox_text_domain), array(&$this, 'wpsm_add_colorbox_meta_box_function'), 'colorbox_panels', 'normal', 'low' );
		add_meta_box ('colorbox_shortcode', __('Colorbox Shortcode', wpshopmart_colorbox_text_domain), array(&$this, 'wpsm_pic_colorbox_shortcode'), 'colorbox_panels', 'normal', 'low');
		add_meta_box ('colorbox_pro_get', __('Colorbox Pro Demos', wpshopmart_colorbox_text_domain), array(&$this, 'wpsm_pic_colorbox_pro_demo_shortcode'), 'colorbox_panels', 'normal', 'low');
		add_meta_box ('colorbox_pro_more', __('More Premium Plugin from Wpshopmart', wpshopmart_colorbox_text_domain), array(&$this, 'wpsm_pic_colorbox_pro_more'), 'colorbox_panels', 'normal', 'low');
		add_meta_box('colorbox_pro_follow', __('Follow Us', wpshopmart_colorbox_text_domain), array(&$this, 'wpsm_accordion_cb_follow_meta_box_function'), 'colorbox_panels', 'side', 'low');
		add_meta_box('colorbox_rateus', __('Rate Us If You Like This Plugin', wpshopmart_colorbox_text_domain), array(&$this, 'wpsm_colorbox_rateus_meta_box_function'), 'colorbox_panels', 'side', 'low');
		add_meta_box('colorbox_setting', __('Colorbox Settings', wpshopmart_colorbox_text_domain), array(&$this, 'wpsm_add_colorbox_setting_meta_box_function'), 'colorbox_panels', 'side', 'low');
	}
	
	public function wpsm_add_colorbox_meta_box_function($post){
		require_once('add-colorbox.php');
	}
	
	public function wpsm_pic_colorbox_shortcode(){
		?>
		<style>
		.handle-order-higher, .handle-order-lower{
				display:none;
			}
			#colorbox_shortcode{
			background:#fff!important;
			box-shadow: 0 0 20px rgba(0,0,0,.2);
			}
			#colorbox_shortcode .hndle , #colorbox_shortcode .handlediv{
			display:none;
			}
			#colorbox_shortcode p{
			color:#000;
			font-size:15px;
			}
			#colorbox_shortcode input {
			font-size: 16px;
			padding: 8px 10px;
			width:100%;
			}
			.customcss-title{
				background: #000;
				padding: 10px;
				margin: 0px;
				color: #fff;
				font-size: 18px;
				
			}			
		</style>
		<h3>Colorbox Shortcode</h3>
		<p><?php _e("Use below shortcode in any Page/Post to publish your Colorbox", wpshopmart_colorbox_text_domain);?></p>
		<input readonly="readonly" type="text" value="<?php echo "[WPSM_COLORBOX id=".get_the_ID()."]"; ?>">
		<br/>
		<br/>
		<br/>
		<?php
		 $PostId = get_the_ID();
		$Colorbox_Settings = unserialize(get_post_meta( $PostId, 'Colorbox_Settings', true));
		if(isset($Colorbox_Settings['custom_css'])){  
		     $custom_css   = $Colorbox_Settings['custom_css'];
		}
		else{
		$custom_css="";
		}		
		?>
		<h3 class="customcss-title">Custom Css</h3>
		<textarea name="custom_css" id="custom_css" ><?php echo $custom_css ; ?></textarea>
		<p>Enter Css without <strong>&lt;style&gt; &lt;/style&gt; </strong> tag</p>
		<br>
		<script>
		  var editor = CodeMirror.fromTextArea(document.getElementById("custom_css"), {
		   lineNumbers: true,
		   styleActiveLine: true,
			matchBrackets: true,
			hint:true,
			theme : 'ambiance',
			extraKeys: {"Ctrl-Space": "autocomplete"},
		  });
	  
		</script>
		<?php 
	}
	
	public function wpsm_pic_colorbox_pro_demo_shortcode(){
		?>
		<style>
			#colorbox_pro_more{
			background:#fff!important;
			box-shadow: 0 0 20px rgba(0,0,0,.2);
			}
			#colorbox_pro_more .hndle , #colorbox_pro_more .handlediv{
			display:none;
			}
			#colorbox_pro_more p{
			color:#000;
			font-size:15px;
			}
		</style>
		<h1>Colorbox Pro Demos</h1>
		<div style="overflow:hidden;display:block;width:100%;padding-top:20px">
			<div class="col-md-12">
				<div class="col-md-3" style="margin-bottom:20px;">
					<a class="button button-primary button-hero " style="width:100%;text-align:center"  href="http://demo.wpshopmart.com/colorbox-pro/" target="_new">Colorbox Main Demo</a>
				</div>
				<div class="col-md-3" style="margin-bottom:20px;">
					<a class="button button-primary button-hero " style="width:100%;text-align:center"  href="http://demo.wpshopmart.com/colorbox-pro/masonry-layout/" target="_new">Masonry Effect</a>
				</div>
				<div class="col-md-3" style="margin-bottom:20px;">
					<a class="button button-primary button-hero " style="width:100%;text-align:center"  href="http://demo.wpshopmart.com/colorbox-pro/same-height/" target="_blank">Same Height</a>
				</div>
				<div class="col-md-3" style="margin-bottom:20px;">
					<a class="button button-primary button-hero " style="width:100%;text-align:center"  href="http://demo.wpshopmart.com/colorbox-pro/box-with-random-color/" target="_blank">Random Color</a>
				</div>
				<div class="col-md-3" style="margin-bottom:20px;">
					<a class="button button-primary button-hero " style="width:100%;text-align:center"  href="http://demo.wpshopmart.com/colorbox-pro/box-with-links/" target="_blank">Box With Link</a>
				</div>
				<div class="col-md-3" style="margin-bottom:20px;">
					<a class="button button-primary button-hero " style="width:100%;text-align:center"  href="http://demo.wpshopmart.com/colorbox-pro/box-animations/" target="_blank">Box With Animations</a>
				</div>
				<div class="col-md-3" style="margin-bottom:20px;">
					<a class="button button-primary button-hero " style="width:100%;text-align:center"  href="http://demo.wpshopmart.com/colorbox-pro/box-overlays/" target="_blank">Box Overlay/Styles</a>
				</div>
				<div class="col-md-3" style="margin-bottom:20px;">
					<a class="button button-primary button-hero " style="width:100%;text-align:center"  href="http://demo.wpshopmart.com/colorbox-pro/1-column/" target="_blank">Box Column Layout 1</a>
				</div>
				<div class="col-md-3" style="margin-bottom:20px;">
					<a class="button button-primary button-hero " style="width:100%;text-align:center"  href="http://demo.wpshopmart.com/colorbox-pro/2-column-layout/" target="_blank">Box Column Layout 2</a>
				</div>
				<div class="col-md-3" style="margin-bottom:20px;">
					<a class="button button-primary button-hero " style="width:100%;text-align:center"  href="http://demo.wpshopmart.com/colorbox-pro/3-column-layout/" target="_blank">Box Column Layout 3</a>
				</div>
				<div class="col-md-3" style="margin-bottom:20px;">
					<a class="button button-primary button-hero " style="width:100%;text-align:center"  href="http://demo.wpshopmart.com/colorbox-pro/4-column/" target="_blank">Box Column Layout 4</a>
				</div>
				<div class="col-md-3" style="margin-bottom:20px;">
					<a class="button button-primary button-hero " style="width:100%;text-align:center"  href="http://demo.wpshopmart.com/colorbox-pro/5-column/" target="_blank">Box Column Layout 5</a>
				</div>
				<div class="col-md-3" style="margin-bottom:20px;">
					<a class="button button-primary button-hero " style="width:100%;text-align:center"  href="http://demo.wpshopmart.com/colorbox-pro/6-col/" target="_blank">Box Column Layout 6</a>
				</div>
				<div class="col-md-3" style="margin-bottom:20px;">
					<a class="button button-primary button-hero " style="width:100%;text-align:center"  href="http://demo.wpshopmart.com/colorbox-pro/8-column/" target="_blank">Box Column Layout 8</a>
				</div>
				<div class="col-md-3" style="margin-bottom:20px;">
					<a class="button button-primary button-hero " style="width:100%;text-align:center"  href="http://demo.wpshopmart.com/colorbox-pro/10-column/" target="_blank">Box Column Layout 10</a>
				</div>
			
			</div>
			<div class="col-md-12">
				<div class="col-md-4" style="margin-bottom:20px;">
					<a class="portfolio_read_more_btn " href="https://wpshopmart.com/plugins/colorbox-pro/" target="_blank">Get Colorbox Pro Only In $5</a>
				</div>
				<div class="col-md-4" style="margin-bottom:20px;">
					<a class="portfolio_demo_btn  " href="http://demo.wpshopmart.com/colorbox-pro/" target="_blank">View Complete Demo</a>
				</div>
			</div>
		</div>
		<?php
		
	}
	
	public function wpsm_pic_colorbox_pro_more(){
	?>
		<style>
			#colorbox_pro_get{
			background:#fff!important;
			box-shadow: 0 0 20px rgba(0,0,0,.2);
			}
			#colorbox_pro_get .hndle , #colorbox_pro_get .handlediv{
			display:none;
			}
			#colorbox_pro_get p{
			color:#000;
			font-size:15px;
			}
			.wpsm-theme-container {
				background: #fff;
				padding-left: 0px;
				padding-right: 0px;
				box-shadow: 0 0 20px rgba(0,0,0,.2);
			}
			.wpsm_site-img-responsive {
				display: block;
				width: 100%;
				height: auto;
			}
			.wpsm_product_wrapper {
				padding: 20px;
				overflow: hidden;
			}
			.wpsm_product_wrapper h3 {
				float: left;
				margin-bottom: 0px;
				color: #000 !important;
				letter-spacing: 0px;
				text-transform: uppercase;
				font-size: 18px;
				font-weight: 700;
				text-align: left;
				margin:0px;
			}
			.wpsm_product_wrapper h3 span {
				display: block;
				float: left;
				width: 100%;
				overflow: hidden;
				font-size: 14px;
				color: #919499;
				margin-top: 6px;
			}
			.wpsm_product_wrapper .price {
				float: right;
				font-size: 24px;
				color: #000;
				font-family: sans-serif;
				font-weight: 500;
			}
			.wpsm-btn-block {
				overflow: hidden;
				float: left;
				width: 100%;
				margin-top: 20px;
				display: block;
			}
			.portfolio_read_more_btn {
				border: 1px solid #E83F33;
				border-radius: 0px;
				margin-bottom: 10px;
				text-transform: uppercase;
				font-weight: 700;
				font-size: 15px;
				padding: 12px 12px;
				display: block;
				text-align:center;
				width:100%;
				border-radius: 2px;
				cursor: pointer;
				letter-spacing: 1px;
				outline: none;
				position: relative;
				text-decoration: none !important;
				color: #fff !important;
				-webkit-transition: all ease 0.5s;
				-moz-transition: all ease 0.5s;
				transition: all ease 0.5s;
				background: #E83F33;
				padding-left: 22px;
				padding-right: 22px;
			}
			.portfolio_demo_btn {
				border: 1px solid #919499;
				border-radius: 0px;
				margin-bottom: 10px;
				text-transform: uppercase;
				font-weight: 700;
				font-size: 15px;
				padding: 12px 12px;
				display: block;
				text-align:center;
				width:100%;
				border-radius: 2px;
				cursor: pointer;
				letter-spacing: 1px;
				outline: none;
				position: relative;
				text-decoration: none !important;
				background-color: #242629;
				border-color: #242629;
				color: #fff !important;
				-webkit-transition: all ease 0.5s;
				-moz-transition: all ease 0.5s;
				transition: all ease 0.5s;
				padding-left: 22px;
				padding-right: 22px;
			}
		</style>
		<h1>More Recommended Premium Plugin From Wpshopmart</h1>
			<div style="overflow:hidden;display:block;width:100%;padding-top:20px;padding-bottom:20px">
				<div class="col-md-12">
					<div class="col-md-4"> 
						<a href="https://wpshopmart.com/plugins/colorbox-pro/" target="_blank" title="ColorBox Pro">
							<div class="wpsm-theme-container" style="">
								<img width="700" height="394" src="<?php echo wpshopmart_colorbox_directory_url.'assets/images/cb.png'; ?>" class="wpsm_site-img-responsive wp-post-image" alt="Colorbox and panels pro plugin">
								<div class="wpsm_product_wrapper">
									<h3>ColorBox Pro <span>wordpress</span></h3>
									<span class="price"><span class="amount">$5</span></span>
									<div class="wpsm-btn-block" style="">
																		
										<a title="Check Detail" target="_blank" href="https://wpshopmart.com/plugins/colorbox-pro/" class="portfolio_read_more_btn pull-left">Check Detail</a>
										<a title="View Demo" target="_blank" href="http://demo.wpshopmart.com/colorbox-pro/" class="portfolio_demo_btn pull-right">View Demo</a>
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-4"> 
						<a href="https://wpshopmart.com/plugins/accordion-pro/" target="_blank" title="Accordion Pro">
							<div class="wpsm-theme-container" style="">
								<img width="700" height="394" src="<?php echo wpshopmart_colorbox_directory_url.'assets/images/ac.png'; ?>" class="wpsm_site-img-responsive wp-post-image" alt="Colorbox and panels pro plugin">
								<div class="wpsm_product_wrapper">
									<h3>Accordion Pro<span>wordpress</span></h3>
									<span class="price"><span class="amount">$9</span></span>
									<div class="wpsm-btn-block" style="">
																		
										<a title="Check Detail" target="_blank" href="https://wpshopmart.com/plugins/accordion-pro/" class="portfolio_read_more_btn pull-left">Check Detail</a>
										<a title="View Demo" target="_blank" href="http://demo.wpshopmart.com/accordion-pro/" class="portfolio_demo_btn pull-right">View Demo</a>
									</div>
								</div>
							</div>
						</a>
					</div>
					
					<div class="col-md-4"> 
						<a href="https://wpshopmart.com/plugins/coming-soon-pro/" target="_blank" title="Coming Soon Pro">
							<div class="wpsm-theme-container" style="">
								<img width="700" height="394" src="<?php echo wpshopmart_colorbox_directory_url.'assets/images/csp.png'; ?>" class="wpsm_site-img-responsive wp-post-image" alt="Colorbox and panels pro plugin">
								<div class="wpsm_product_wrapper">
									<h3>Coming Soon Pro <span>wordpress</span></h3>
									<span class="price"><span class="amount">$19</span></span>
									<div class="wpsm-btn-block" style="">
										<a title="Check Detail" target="_blank" href="https://wpshopmart.com/plugins/coming-soon-pro/" class="portfolio_read_more_btn pull-left">Check Detail</a>
										<a title="View Demo" target="_blank" href="https://wpshopmart.com/coming-soon-pro-demo-page/" class="portfolio_demo_btn pull-right">View Demo</a>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>		
	<?php 	
		
	}
	
	public function wpsm_accordion_cb_follow_meta_box_function(){
		?>
		<style>
		 
		
		#colorbox_pro_follow{
			background:#3338dd;
			text-align:center;
			}
			#colorbox_pro_follow .hndle , #colorbox_pro_follow .handlediv{
			display:none;
			}
			#colorbox_pro_follow h1{
			color:#fff;
			margin-bottom:10px;
			}
			 #colorbox_pro_follow h3 {
			color:#fff;
			font-size:15px;
			}
			
			#colorbox_pro_follow .button-hero{
			background: #efda4a;
    color: #312c2c;
    box-shadow: none;
    text-shadow: none;
    font-weight: 500;
    font-size: 22px;
    border: 1px solid #efda4a;
			}
			.wpsm-rate-us{
			text-align:center;
			}
			.wpsm-rate-us span.dashicons {
				width: 40px;
				height: 40px;
				font-size:20px;
				color : #fff !important;
			}
			.wpsm-rate-us span.dashicons-star-filled:before {
				content: "\f155";
				font-size: 40px;
			}
		</style>
		   <h1>Follow Us On</h1>
		   <a href="https://www.youtube.com/c/wpshopmart" target="_blank"><img style="width:200px;height:auto" src="<?php echo wpshopmart_colorbox_directory_url.'assets/images/youtube.png'; ?>" /></a>
		   <h3>To Grab Free Web design Course & WordPress Help/Tips </h3>
			
			<a href="https://www.youtube.com/c/wpshopmart?sub_confirmation=1" target="_blank" class="button button-primary button-hero ">Subscribe Us Now</a>
			<?php
		
	}
	
	public function wpsm_colorbox_rateus_meta_box_function(){
		?>
		<style>
		#colorbox_rateus{
			background:url(<?php echo wpshopmart_colorbox_directory_url.'assets/images/rate-bg.jpg'; ?>)!important;
			}
			#colorbox_rateus .hndle , #colorbox_rateus .handlediv{
			display:none;
			}
			#colorbox_rateus h1{
			color:#fff;
			
			}
			 #colorbox_rateus h3 {
			color:#fff;
			font-size:15px;
			}
			#colorbox_rateus .button-hero{
			display:block;
			text-align:center;
			margin-bottom:15px;
			}
			.wpsm-rate-us{
			text-align:center;
			}
			.wpsm-rate-us span.dashicons {
				width: 40px;
				height: 40px;
				font-size:20px;
				color : #ffffff !important;
			}
			.wpsm-rate-us span.dashicons-star-filled:before {
				content: "\f155";
				font-size: 40px;
			}
		</style>
		   <h1>Rate Us </h1>
			<h3>Show us some love, If you like our product then please give us some valuable feedback on wordpress</h3>
			<a href="https://wordpress.org/plugins/colorbox-panels/" target="_blank" class="button button-primary button-hero ">RATE HERE</a>
			<a class="wpsm-rate-us" style=" text-decoration: none; height: 40px; width: 40px;" href="https://wordpress.org/plugins/responsive-accordion-and-collapse/" target="_blank">
				<span class="dashicons dashicons-star-filled"></span>
				<span class="dashicons dashicons-star-filled"></span>
				<span class="dashicons dashicons-star-filled"></span>
				<span class="dashicons dashicons-star-filled"></span>
				<span class="dashicons dashicons-star-filled"></span>
			</a>
		<?php 
	}
	
	public function wpsm_add_colorbox_setting_meta_box_function($post){
		require_once('settings.php');
	}
	
	public function add_colorbox_meta_box_save($PostID) {
		require('data-post/colorbox-save-data.php');
    }
	
	public function colorbox_settings_meta_box_save($PostID){
		require('data-post/colorbox-settings-save-data.php');
	}
	
	
}
global $wpsm_colorbox;
$wpsm_colorbox = wpsm_colorbox::forge();

 ?>