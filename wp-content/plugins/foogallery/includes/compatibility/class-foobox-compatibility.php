<?php
/**
 * Adds in better support for FooBox Free and PRO
 */

if ( !class_exists( 'FooGallery_FooBox_Compatibility' ) ) {

	class FooGallery_FooBox_Compatibility {

		function __construct() {
			//we need to make sure outdated versions of FooBox never run in the future
			$this->ensure_outdated_foobox_extensions_never_run();

			//add the FooBox lightbox option no matter if using Free or Pro
			add_filter( 'foogallery_gallery_template_field_lightboxes', array($this, 'add_lightbox'), 11, 2 );

			//alter the default lightbox to be foobox
			add_filter( 'foogallery_alter_gallery_template_field', array( $this, 'make_foobox_default_lightbox' ), 10, 2 );

            //allow changing of field values
            add_filter( 'foogallery_render_gallery_template_field_value', array( $this, 'check_lightbox_value' ), 10, 4 );

            if ( class_exists( 'fooboxV2' ) ) {
				//FooBox PRO specific functionality

				//only add FooBox PRO functionality after FooBox version 1.2.29
				if ( defined( 'FOOBOX_BASE_VERSION' ) && version_compare( FOOBOX_BASE_VERSION, '1.2.29', '>' ) ) {
					add_filter( 'foogallery_attachment_custom_fields', array($this, 'add_panning_fields' ) );
					add_filter( 'foogallery_attachment_html_link_attributes', array( $this, 'add_panning_attributes' ), 10, 3 );
				}

			} else {
				//FooBox Free specific functionality
				add_filter( 'foogallery_album_stack_link_class_name', array($this, 'album_stack_link_class_name'));
			}

			//cater for different captions sources
			add_filter( 'foogallery_attachment_html_link_attributes', array( $this, 'add_caption_attributes' ), 20, 3 );

			//add custom captions
			add_filter( 'foogallery_build_attachment_html_caption_custom', array( &$this, 'customize_captions' ), 90, 3 );
		}

		/**
		 * Customize the captions if needed
		 *
		 * @param $captions
		 * @param $foogallery_attachment    FooGalleryAttachment
		 * @param $args array
		 *
		 * @return array
		 */
		function customize_captions( $captions, $foogallery_attachment, $args) {

			if ( isset( $foogallery_attachment->custom_captions ) && $foogallery_attachment->custom_captions ) {
				//specifically for foobox, make sure the custom captions are set
				$foogallery_attachment->caption_title = ' ';
				$foogallery_attachment->caption_desc  = $captions['desc'];
			}

			return $captions;
		}

		/**
		 * Handle custom captions for the lightbox
		 * @param $attr
		 * @param $args
		 * @param $foogallery_attachment
		 *
		 * @return mixed
		 */
		function add_caption_attributes( $attr, $args, $foogallery_attachment ) {
			global $current_foogallery;

			//check if lightbox set to foogallery
			if ( isset( $current_foogallery->lightbox ) && 'foobox' === $current_foogallery->lightbox ) {

				//check lightbox caption source
				$source = foogallery_gallery_template_setting( 'lightbox_caption_override', '' );

				if ( 'override' === $source ) {
					$caption_title_source = foogallery_gallery_template_setting('lightbox_caption_override_title', '' );
					if ( 'none' === $caption_title_source ) {
						$attr['data-caption-title'] = ' ';
					} else if ( '' !== $caption_title_source ) {
						$attr['data-caption-title'] = foogallery_sanitize_html( foogallery_get_caption_by_source( $foogallery_attachment, $caption_title_source, 'title' ) );
					}

					$caption_desc_source = foogallery_gallery_template_setting('lightbox_caption_override_desc', '' );
					if ( 'none' === $caption_desc_source ) {
						$attr['data-caption-desc'] = ' ';
					} else if ( '' !== $caption_desc_source ) {
						$attr['data-caption-desc'] = foogallery_sanitize_html( foogallery_get_caption_by_source( $foogallery_attachment, $caption_desc_source, 'description' ) );
					}
				} else if ( 'custom' === $source ) {

					$template = foogallery_gallery_template_setting( 'lightbox_caption_custom_template', '' );
					if ( !empty( $template ) ) {
						$attr['data-caption-title'] = ' ';
						$attr['data-caption-desc'] = foogallery_sanitize_html( FooGallery_Pro_Advanced_Captions::build_custom_caption( $template, $foogallery_attachment ) );
					}
				}
			}

			return $attr;
		}

		function add_foobox_help_field( $fields, $template ) {
			//only show the hint to install FooBox if FooGallery Free is in use
			if ( !class_exists( 'FooGallery_Pro' ) ) {
				//see if the template has a lightbox field
				$found_lightbox = false;
				$position       = 0;
				foreach ( $fields as $key => &$field ) {
					if ( 'lightbox' === $field['id'] ) {
						$found_lightbox = true;
						break;
					}
					$position ++;
				}
				if ( $found_lightbox && ! $this->is_foobox_installed() ) {
					$action      = 'install-plugin';
					$slug        = 'foobox-image-lightbox';
					$install_url = wp_nonce_url(
						add_query_arg(
							array(
								'action' => $action,
								'plugin' => $slug
							),
							admin_url( 'update.php' )
						),
						$action . '_' . $slug
					);

					$foobox_help_field = array(
						array(
							'id'      => 'lightbox_foobox_help',
							'title'   => __( 'FooBox Help', 'foogallery' ),
							'desc'    => sprintf( __( 'Install our separate FooBox Lightbox plugin so that your gallery images will open in a beautiful responsive lightbox. %s', 'foogallery' ), '<a href="' . $install_url . '" target="_blank">' . __( 'Install it now!', 'foogallery' ) . '</a>' ),
							'section' => __( 'General', 'foogallery' ),
							'type'    => 'help'
						)
					);

					array_splice( $fields, $position, 0, $foobox_help_field );
				}
			}
			return $fields;
		}

        /***
         * Check if we have a lightbox value from FooBox free and change it if foobox free is no longer active
         * @param $value
         * @param $field
         * @param $gallery
         * @param $template
         *
         * @return string
         */
        function check_lightbox_value($value, $field, $gallery, $template) {

            if ( isset( $field['lightbox'] ) ) {
                if ( 'foobox-free' === $value ) {
                    if ( !class_exists( 'Foobox_Free' ) ) {
                        return 'foobox';
                    }
                }
            }

            return $value;
        }

        /**
         * Change the default for lightbox if foobox is activated
         *
         * @param $field
         * @param $gallery_template
         * @return mixed
         */
		function make_foobox_default_lightbox( $field, $gallery_template ) {
		    if ( $this->is_foobox_installed() ) {
                if (isset($field['lightbox']) && true === $field['lightbox']) {
                    $field['default'] = 'foobox';
                }
            }

		    return $field;
        }

		function is_foobox_installed() {
		    return class_exists( 'FooBox' ) || class_exists( 'fooboxV2' );
        }

		function ensure_outdated_foobox_extensions_never_run() {
			global $foogallery_extensions;

			//backwards compatibility for older versions of the FooBox Free extension class
			if ( class_exists( 'FooGallery_FooBox_Free_Extension' ) ) {
				$foogallery_extensions['foobox-image-lightbox'] = $this;
			}

			//backwards compatibility for older versions of the FooBox PRO extension class
			if ( class_exists( 'FooGallery_FooBox_Extension' ) ) {
				$foogallery_extensions['foobox'] = $this;
			}
		}

		function add_lightbox($lightboxes) {
			$option_text = __( 'FooBox', 'foogallery' );
			if ( !$this->is_foobox_installed() ) {
				$option_text .= __( ' (Not installed!)', 'foogallery' );
			}

			$lightboxes['foobox'] = $option_text;
			return $lightboxes;
		}

		function album_stack_link_class_name( $class_name ) {
			return str_replace( 'foobox-free', 'foobox', $class_name );
		}

		function add_panning_fields( $fields ) {
			$fields['foobox_panning'] = array(
				'label'       =>  __( 'Panning', 'foogallery' ),
				'input'       => 'radio',
				'helps'       => __( 'Enable mouse panning for this image in the lightbox.', 'foogallery' ),
				'exclusions'  => array( 'audio', 'video' ),
				'options'     => array(
					'' => __( 'Disabled', 'foogallery' ),
					'enabled' => __( 'Enabled', 'foogallery' )
				)
			);

			return $fields;
		}

		function add_panning_attributes( $attr, $args, $foogallery_attachment ) {

			$foobox_panning = get_post_meta( $foogallery_attachment->ID, '_foobox_panning', true );

			if ( !empty( $foobox_panning ) ) {
				//add data-overflow="true" + data-proportion="false" attributes to the anchor link
				$attr['data-overflow'] = 'true';
				$attr['data-proportion'] = 'false';
			}

			return $attr;
		}
	}
}