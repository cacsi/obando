<?php 


function load_stylesheets() {
	// wp_register_style('home',  get_template_directory_uri() . '/desktop/home.css', array(), 1, 'all');
	// wp_enqueue_style('home');

	// wp_register_style('tablet',  get_template_directory_uri() . '/tablet/tablet-home.css', array(), 1, 'all');
	// wp_enqueue_style('tablet');

	// wp_register_style('mobile',  get_template_directory_uri() . '/mobile/mobile-home.css', array(), 1, 'all');
	// wp_enqueue_style('mobile');


	 // wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );


	wp_register_style('custom',  get_template_directory_uri() . '/custom.css', array(), 1, 'all');
	wp_enqueue_style('custom');


	// wp_register_style('skeleton',  get_template_directory_uri() . '/skeleton.css', array(), 1, 'all');
	// wp_enqueue_style('skeleton');


	



}

add_action('wp_enqueue_scripts', 'load_stylesheets');




function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'global', get_stylesheet_uri() );

    if ( is_page(5) ) {

  wp_register_style('home',  get_template_directory_uri() . '/desktop/home.css', array(), 1, 'all');
	wp_enqueue_style('home');

	wp_register_style('tablet',  get_template_directory_uri() . '/tablet/tablet-home.css', array(), 1, 'all');
	wp_enqueue_style('tablet');

	wp_register_style('mobile',  get_template_directory_uri() . '/mobile/mobile-home.css', array(), 1, 'all');
	wp_enqueue_style('mobile');

      

    }else if (is_page(56) ){
   
    wp_register_style('home',  get_template_directory_uri() . '/desktop/home.css', array(), 1, 'all');
	wp_enqueue_style('home');


	wp_register_style('our-city',  get_template_directory_uri() . '/desktop/our-city.css', array(), 1, 'all');
	wp_enqueue_style('our-city');

	 wp_register_style('tablet-news',  get_template_directory_uri() . '/tablet/tablet-news-content.css', array(), 1, 'all');
	wp_enqueue_style('tablet-news');

	wp_register_style('mobile',  get_template_directory_uri() . '/mobile/mobile-home.css', array(), 1, 'all');
	wp_enqueue_style('mobile');
    

    }else if (is_page(60) ){

    wp_register_style('home',  get_template_directory_uri() . '/desktop/home.css', array(), 1, 'all');
	wp_enqueue_style('home');

	wp_register_style('history',  get_template_directory_uri() . '/desktop/history.css', array(), 1, 'all');
	wp_enqueue_style('history');	

	 wp_register_style('tablet-news',  get_template_directory_uri() . '/tablet/tablet-news-content.css', array(), 1, 'all');
	wp_enqueue_style('tablet-news');

	wp_register_style('mobile',  get_template_directory_uri() . '/mobile/mobile-home.css', array(), 1, 'all');
	wp_enqueue_style('mobile');

    }else if (is_page(64) ){

    wp_register_style('home',  get_template_directory_uri() . '/desktop/home.css', array(), 1, 'all');
	wp_enqueue_style('home');

	wp_register_style('physical',  get_template_directory_uri() . '/desktop/physical.css', array(), 1, 'all');
	wp_enqueue_style('physical');	

	 wp_register_style('tablet-news',  get_template_directory_uri() . '/tablet/tablet-news-content.css', array(), 1, 'all');
	wp_enqueue_style('tablet-news');

	wp_register_style('mobile',  get_template_directory_uri() . '/mobile/mobile-home.css', array(), 1, 'all');
	wp_enqueue_style('mobile');

    }
     else if (is_page(66) ){

    wp_register_style('home',  get_template_directory_uri() . '/desktop/home.css', array(), 1, 'all');
	wp_enqueue_style('home');

	wp_register_style('hymn',  get_template_directory_uri() . '/desktop/hymn.css', array(), 1, 'all');
	wp_enqueue_style('hymn');	

	 wp_register_style('tablet-news',  get_template_directory_uri() . '/tablet/tablet-news-content.css', array(), 1, 'all');
	wp_enqueue_style('tablet-news');

	wp_register_style('mobile',  get_template_directory_uri() . '/mobile/mobile-home.css', array(), 1, 'all');
	wp_enqueue_style('mobile');

    } else if (is_page(68) ){
    wp_register_style('home',  get_template_directory_uri() . '/desktop/home.css', array(), 1, 'all');
	wp_enqueue_style('home');

	wp_register_style('photo-galery',  get_template_directory_uri() . '/desktop/photo-gallery.css', array(), 1, 'all');
	wp_enqueue_style('photo-galery');	

	 wp_register_style('tablet-news',  get_template_directory_uri() . '/tablet/tablet-news-content.css', array(), 1, 'all');
	wp_enqueue_style('tablet-news');

	wp_register_style('mobile',  get_template_directory_uri() . '/mobile/mobile-home.css', array(), 1, 'all');
	wp_enqueue_style('mobile');
    


    } else if (is_page(201) ){
    wp_register_style('home',  get_template_directory_uri() . '/desktop/home.css', array(), 1, 'all');
	wp_enqueue_style('home');

	wp_register_style('about-mayor',  get_template_directory_uri() . '/desktop/about-mayor.css', array(), 1, 'all');
	wp_enqueue_style('about-mayor');	

	 wp_register_style('tablet-mayor',  get_template_directory_uri() . '/tablet/tablet-about-mayor.css', array(), 1, 'all');
	wp_enqueue_style('tablet-mayor');

	wp_register_style('mobile',  get_template_directory_uri() . '/mobile/mobile-home.css', array(), 1, 'all');
	wp_enqueue_style('mobile');
    


    } else if (is_page(212) ){
    wp_register_style('home',  get_template_directory_uri() . '/desktop/home.css', array(), 1, 'all');
	wp_enqueue_style('home');

	wp_register_style('ordinances',  get_template_directory_uri() . '/desktop/ordinances.css', array(), 1, 'all');
	wp_enqueue_style('ordinances');	

	 wp_register_style('tablet-ordinances',  get_template_directory_uri() . '/tablet/tablet-ordinances.css', array(), 1, 'all');
	wp_enqueue_style('tablet-ordinances');

	wp_register_style('mobile',  get_template_directory_uri() . '/mobile/mobile-home.css', array(), 1, 'all');
	wp_enqueue_style('mobile');
    }

    else if (is_page(227) ){

    wp_register_style('home',  get_template_directory_uri() . '/desktop/home.css', array(), 1, 'all');
	wp_enqueue_style('home');

	wp_register_style('history',  get_template_directory_uri() . '/desktop/history.css', array(), 1, 'all');
	wp_enqueue_style('history');	

	 wp_register_style('tablet-news',  get_template_directory_uri() . '/tablet/tablet-news-content.css', array(), 1, 'all');
	wp_enqueue_style('tablet-news');

	wp_register_style('mobile',  get_template_directory_uri() . '/mobile/mobile-home.css', array(), 1, 'all');
	wp_enqueue_style('mobile');

    }

    else if (is_page(242) ){

    wp_register_style('home',  get_template_directory_uri() . '/desktop/home.css', array(), 1, 'all');
	wp_enqueue_style('home');

	wp_register_style('citizen',  get_template_directory_uri() . '/desktop/Citizen.css', array(), 1, 'all');
	wp_enqueue_style('citizen');	

	 wp_register_style('tablet-citizen',  get_template_directory_uri() . '/tablet/tablet-Citizen-charter.css', array(), 1, 'all');
	wp_enqueue_style('tablet-citizen');

	wp_register_style('mobile',  get_template_directory_uri() . '/mobile/mobile-home.css', array(), 1, 'all');
	wp_enqueue_style('mobile');

    }

     else if ( is_page(259) ) {

  wp_register_style('home',  get_template_directory_uri() . '/desktop/home.css', array(), 1, 'all');
	wp_enqueue_style('home');

	wp_register_style('tablet',  get_template_directory_uri() . '/tablet/tablet-home.css', array(), 1, 'all');
	wp_enqueue_style('tablet');

	wp_register_style('mobile',  get_template_directory_uri() . '/mobile/mobile-home.css', array(), 1, 'all');
	wp_enqueue_style('mobile');

}


else if (is_page(278) ){

    wp_register_style('home',  get_template_directory_uri() . '/desktop/home.css', array(), 1, 'all');
	wp_enqueue_style('home');

	wp_register_style('citizen',  get_template_directory_uri() . '/desktop/Citizen.css', array(), 1, 'all');
	wp_enqueue_style('citizen');	

	 wp_register_style('tablet-citizen',  get_template_directory_uri() . '/tablet/tablet-Citizen-charter.css', array(), 1, 'all');
	wp_enqueue_style('tablet-citizen');

	wp_register_style('mobile',  get_template_directory_uri() . '/mobile/mobile-home.css', array(), 1, 'all');
	wp_enqueue_style('mobile');

    }

    else if (is_page(285) ){

    wp_register_style('home',  get_template_directory_uri() . '/desktop/home.css', array(), 1, 'all');
	wp_enqueue_style('home');

	wp_register_style('news',  get_template_directory_uri() . '/desktop/announcement.css', array(), 1, 'all');
	wp_enqueue_style('news');	

	 wp_register_style('tablet-citizen',  get_template_directory_uri() . '/tablet/tablet-home.css', array(), 1, 'all');
	wp_enqueue_style('tablet-citizen');

	wp_register_style('mobile',  get_template_directory_uri() . '/mobile/mobile-home.css', array(), 1, 'all');
	wp_enqueue_style('mobile');

    }

    else if (is_page(295) ){

    wp_register_style('home',  get_template_directory_uri() . '/desktop/home.css', array(), 1, 'all');
	wp_enqueue_style('home');

	wp_register_style('announcement',  get_template_directory_uri() . '/desktop/announcement.css', array(), 1, 'all');
	wp_enqueue_style('announcement');	

	 wp_register_style('tablet-citizen',  get_template_directory_uri() . '/tablet/tablet-home.css', array(), 1, 'all');
	wp_enqueue_style('tablet-citizen');

	wp_register_style('mobile',  get_template_directory_uri() . '/mobile/mobile-home.css', array(), 1, 'all');
	wp_enqueue_style('mobile');

    }


      else if (is_page(349) ){

    wp_register_style('home',  get_template_directory_uri() . '/desktop/home.css', array(), 1, 'all');
	wp_enqueue_style('home');

	wp_register_style('announcement',  get_template_directory_uri() . '/desktop/donor.css', array(), 1, 'all');
	wp_enqueue_style('announcement');	

	 wp_register_style('tablet-citizen',  get_template_directory_uri() . '/tablet/tablet-transparency.css', array(), 1, 'all');
	wp_enqueue_style('tablet-citizen');

	wp_register_style('mobile',  get_template_directory_uri() . '/mobile/mobile-home.css', array(), 1, 'all');
	wp_enqueue_style('mobile');

    }



      else if (is_page(357) ){

    wp_register_style('home',  get_template_directory_uri() . '/desktop/home.css', array(), 1, 'all');
	wp_enqueue_style('home');

	wp_register_style('announcement',  get_template_directory_uri() . '/desktop/donor.css', array(), 1, 'all');
	wp_enqueue_style('announcement');	

	 wp_register_style('tablet-citizen',  get_template_directory_uri() . '/tablet/tablet-transparency.css', array(), 1, 'all');
	wp_enqueue_style('tablet-citizen');

	wp_register_style('mobile',  get_template_directory_uri() . '/mobile/mobile-home.css', array(), 1, 'all');
	wp_enqueue_style('mobile');

    }



     else if (is_page(371) ){

    wp_register_style('home',  get_template_directory_uri() . '/desktop/home.css', array(), 1, 'all');
	wp_enqueue_style('home');

	wp_register_style('portal',  get_template_directory_uri() . '/desktop/portal.css', array(), 1, 'all');
	wp_enqueue_style('portal');	

	 wp_register_style('tablet-transparency',  get_template_directory_uri() . '/tablet/tablet-transparency.css', array(), 1, 'all');
	wp_enqueue_style('tablet-transparency');

	wp_register_style('mobile',  get_template_directory_uri() . '/mobile/mobile-home.css', array(), 1, 'all');
	wp_enqueue_style('mobile');

    }




     else if (is_page(199) ){

    wp_register_style('home',  get_template_directory_uri() . '/desktop/home.css', array(), 1, 'all');
	wp_enqueue_style('home');

	wp_register_style('official',  get_template_directory_uri() . '/desktop/official.css', array(), 1, 'all');
	wp_enqueue_style('official');	

	 wp_register_style('tablet-offical',  get_template_directory_uri() . '/tablet/tablet-offical.css', array(), 1, 'all');
	wp_enqueue_style('tablet-offical');

	wp_register_style('mobile',  get_template_directory_uri() . '/mobile/mobile-home.css', array(), 1, 'all');
	wp_enqueue_style('mobile');

    }


     else if (is_page(522) ){

    wp_register_style('home',  get_template_directory_uri() . '/desktop/home.css', array(), 1, 'all');
	wp_enqueue_style('home');

	wp_register_style('official',  get_template_directory_uri() . '/desktop/announcement.css', array(), 1, 'all');
	wp_enqueue_style('official');	

	 wp_register_style('tablet-offical',  get_template_directory_uri() . '/tablet/tablet-home.css', array(), 1, 'all');
	wp_enqueue_style('tablet-offical');

	wp_register_style('mobile',  get_template_directory_uri() . '/mobile/mobile-home.css', array(), 1, 'all');
	wp_enqueue_style('mobile');

	}
	

	else if (is_page(686) ){

		wp_register_style('home',  get_template_directory_uri() . '/desktop/home.css', array(), 1, 'all');
		wp_enqueue_style('home');
	
		wp_register_style('history',  get_template_directory_uri() . '/desktop/history.css', array(), 1, 'all');
		wp_enqueue_style('history');	

	 	wp_register_style('tablet-news',  get_template_directory_uri() . '/tablet/tablet-news-content.css', array(), 1, 'all');
		wp_enqueue_style('tablet-news');


		wp_register_style('mobile',  get_template_directory_uri() . '/mobile/mobile-home.css', array(), 1, 'all');
		wp_enqueue_style('mobile');
	
		}

		else if (is_page(750) ){

			wp_register_style('home',  get_template_directory_uri() . '/desktop/home.css', array(), 1, 'all');
			wp_enqueue_style('home');
		
			wp_register_style('application',  get_template_directory_uri() . '/desktop/history.css', array(), 1, 'all');
			wp_enqueue_style('application');	
	
			 wp_register_style('tablet-news',  get_template_directory_uri() . '/tablet/tablet-news-content.css', array(), 1, 'all');
			wp_enqueue_style('tablet-news');
	
	
			wp_register_style('mobile',  get_template_directory_uri() . '/mobile/mobile-home.css', array(), 1, 'all');
			wp_enqueue_style('mobile');
		
			}

			else if (is_page(760) ){

				wp_register_style('home',  get_template_directory_uri() . '/desktop/home.css', array(), 1, 'all');
				wp_enqueue_style('home');
			
				wp_register_style('tourism',  get_template_directory_uri() . '/desktop/history.css', array(), 1, 'all');
				wp_enqueue_style('tourism');	
		
				 wp_register_style('tablet-news',  get_template_directory_uri() . '/tablet/tablet-news-content.css', array(), 1, 'all');
				wp_enqueue_style('tablet-news');
		
		
				wp_register_style('mobile',  get_template_directory_uri() . '/mobile/mobile-home.css', array(), 1, 'all');
				wp_enqueue_style('mobile');
			
				}

			 else if (is_page(953) ){
				wp_register_style('home',  get_template_directory_uri() . '/desktop/home.css', array(), 1, 'all');
				wp_enqueue_style('home');
			
				wp_register_style('transparency',  get_template_directory_uri() . '/desktop/ordinances.css', array(), 1, 'all');
				wp_enqueue_style('transparency');	
			
				 wp_register_style('tablet-ordinances',  get_template_directory_uri() . '/tablet/tablet-ordinances.css', array(), 1, 'all');
				wp_enqueue_style('tablet-ordinances');
			
				wp_register_style('mobile',  get_template_directory_uri() . '/mobile/mobile-home.css', array(), 1, 'all');
				wp_enqueue_style('mobile');
				}
}


 add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );





















// function addjs(){
// 	wp_register_script('axios',  get_template_directory_uri() . '/libraries/axios.js', array(), 1, 'all');
// 	wp_enqueue_script('axios');
// 	wp_register_script('global',  get_template_directory_uri() . '/libraries/global.js', array(), 1, 'all');
// 	wp_enqueue_script('global');
// }


function footerjs(){



	// wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/vendor/bootstrap.bundle.min.js', array( 'jquery' ) );


	wp_register_script('gsap',  get_template_directory_uri() . '/gsap/gsap.js', array(), 1, 1, 1);
	wp_enqueue_script('gsap');
	wp_register_script('app',  get_template_directory_uri() . '/js/app.js', array(), 1, 1, 1);
	wp_enqueue_script('app');

	wp_register_script('custom',  get_template_directory_uri() . '/custom.js', array(), 1, 1, 1);
	wp_enqueue_script('custom');


	wp_register_script('axios',  get_template_directory_uri() . '/libraries/axios.js', array(), 1, 'all');
	wp_enqueue_script('axios');
	wp_register_script('global',  get_template_directory_uri() . '/libraries/global.js', array(), 1, 'all');
	wp_enqueue_script('global');
}


add_action('wp_enqueue_scripts', 'footerjs');







add_theme_support('menus');

register_nav_menus(
	array(

		'top-menu' => __('Top Menu', 'obando_asenso'),
	)

);




function ourWidgetsInit() {
	register_sidebar(array('name' => 'Citizen Charter',
			'id' => 'sidebar1'

	 ));
}


add_action('widgets_init', 'ourWidgetsInit');





// /**
//  * Register Custom Navigation Walker
//  */
// function register_navwalker(){
// 	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
// }
// add_action( 'after_setup_theme', 'register_navwalker' );




// if (function_exists('register_nav_menus')) {
// 	register_nav_menus(
// 	array(

// 		'primary' => 'Header Navigation',
// 	)

// );



// }


// function wpb_custom_new_menu() {
//   register_nav_menu('my-custom-menu',__( 'My Custom Menu' ));
// }
// add_action( 'init', 'wpb_custom_new_menu' );

?>