<?php
$labels = array(
				'name'                => _x( 'Colorbox Panels', 'Colorbox Panels', wpshopmart_colorbox_text_domain ),
				'singular_name'       => _x( 'Colorbox Panels', 'Colorbox Panels', wpshopmart_colorbox_text_domain ),
				'menu_name'           => __( 'Colorbox Panels', wpshopmart_colorbox_text_domain ),
				'parent_item_colon'   => __( 'Parent Item:', wpshopmart_colorbox_text_domain ),
				'all_items'           => __( 'All Colorbox', wpshopmart_colorbox_text_domain ),
				'view_item'           => __( 'View Colorbox', wpshopmart_colorbox_text_domain ),
				'add_new_item'        => __( 'Add New Colorbox', wpshopmart_colorbox_text_domain ),
				'add_new'             => __( 'Add New Colorbox', wpshopmart_colorbox_text_domain ),
				'edit_item'           => __( 'Edit Colorbox', wpshopmart_colorbox_text_domain ),
				'update_item'         => __( 'Update Colorbox', wpshopmart_colorbox_text_domain ),
				'search_items'        => __( 'Search Colorbox', wpshopmart_colorbox_text_domain ),
				'not_found'           => __( 'No Colorbox Found', wpshopmart_colorbox_text_domain ),
				'not_found_in_trash'  => __( 'No Colorbox found in Trash', wpshopmart_colorbox_text_domain ),
			);
			$args = array(
				'label'               => __( 'Colorbox Panels', wpshopmart_colorbox_text_domain ),
				'description'         => __( 'Colorbox Panels', wpshopmart_colorbox_text_domain ),
				'labels'              => $labels,
				'supports'            => array( 'title', '', '', '', '', '', '', '', '', '', '', ),
				//'taxonomies'          => array( 'category', 'post_tag' ),
				 'hierarchical'        => false,
				'public'              => false,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'show_in_nav_menus'   => false,
				'show_in_admin_bar'   => false,
				'menu_position'       => 5,
				'menu_icon'           => 'dashicons-grid-view',
				'can_export'          => true,
				'has_archive'         => true,
				'exclude_from_search' => false,
				'publicly_queryable'  => false,
				'capability_type'     => 'page',
			);
			register_post_type( 'colorbox_panels', $args );
			
 ?>