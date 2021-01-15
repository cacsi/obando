<?php
/**
 * The default Gallery Datasource which pulls attachments from the WP media library
 */
if ( ! class_exists( 'FooGallery_Datasource_MediaLibrary' ) ) {

	class FooGallery_Datasource_MediaLibrary {

		function __construct() {
			add_filter( 'foogallery_datasource_media_library_item_count', array( $this, 'get_gallery_attachment_count' ), 10, 2 );
			add_filter( 'foogallery_datasource_media_library_featured_image', array( $this, 'get_gallery_featured_attachment' ), 10, 2 );
			add_filter( 'foogallery_datasource_media_library_attachments', array( $this, 'get_gallery_attachments' ), 10, 2 );

			add_action( 'foogallery_gallery_metabox_items_add', array( $this, 'output_add_button' ), 8, 1 );
			add_action( 'foogallery_gallery_metabox_items_list', array( $this, 'output_attachment_items' ), 10, 1 );

			add_action( 'foogallery_before_save_gallery', array( $this, 'save_gallery_attachments' ), 10, 2 );
		}

		/**
		 * Returns the number of attachments used from the media library
		 *
		 * @param int $count
		 * @param FooGallery $foogallery
		 *
		 * @return int
		 */
		public function get_gallery_attachment_count( $count, $foogallery ) {
			return sizeof( $foogallery->attachment_ids );
		}

		/**
		 * Returns an array of FooGalleryAttachments from the datasource
		 *
		 * @param array $attachments
		 * @param FooGallery $foogallery
		 *
		 * @return array(FooGalleryAttachment)
		 */
		public function get_gallery_attachments( $attachments, $foogallery ) {
			$attachments = array();

			if ( ! empty( $foogallery->attachment_ids ) ) {
				$helper = new FooGallery_Datasource_MediaLibrary_Query_Helper();
				$attachments = $helper->query_attachments( $foogallery, array(
					'post__in' => $foogallery->attachment_ids
				) );
			}

			return $attachments;
		}

		/**
		 * Returns the featured FooGalleryAttachment from the datasource
		 *
		 * @param FooGalleryAttachment $default
		 * @param FooGallery $foogallery
		 *
		 * @return bool|FooGalleryAttachment
		 */
		public function get_gallery_featured_attachment( $default, $foogallery ) {
			//if no featured image could be found then get the first image
			if ( $foogallery->attachment_ids ) {
				$attachment_id_values = array_values( $foogallery->attachment_ids );
				$attachment_id = array_shift( $attachment_id_values );

				return FooGalleryAttachment::get_by_id( $attachment_id );
			}
			return $default;
		}

		/**
		 * Output the Add Media button
		 * @param $foogallery
		 */
		public function output_add_button( $foogallery ) {
			?>
			<button type="button" class="button button-primary button-hero upload_image_button"
					data-uploader-title="<?php _e( 'Add Media To Gallery', 'foogallery' ); ?>"
					data-uploader-button-text="<?php _e( 'Add Media', 'foogallery' ); ?>"
					data-post-id="<?php echo $foogallery->ID; ?>">
				<span class="dashicons dashicons-admin-media"></span><?php _e( 'Add From Media Library', 'foogallery' ); ?>
			</button>
			<?php
		}

		/**
		 * Outputs the attachments for a gallery
		 *
		 * @param FooGallery $foogallery
		 */
		public function output_attachment_items($foogallery) {
			//make sure the media assets are enqueued
			wp_enqueue_media();

			//always output the ability to add via media library
			$has_attachments = $foogallery->has_attachments();
            $show_attachments = isset( $foogallery->datasource_name ) && 'media_library' === $foogallery->datasource_name;

			$media_button_start = foogallery_get_setting('add_media_button_start', '' ) === 'on';
			$attachment_ids = '';
            if ( $has_attachments && $show_attachments ) {
                $attachment_ids = $foogallery->attachment_id_csv();
            }
			?>
			<input type="hidden" data-foogallery-preview="include" name='foogallery_attachments' id="foogallery_attachments" value="<?php echo $attachment_ids; ?>"/>
            <div class="foogallery-attachments-list-container <?php echo $show_attachments && $has_attachments ? '' : 'hidden'; ?>">
                <ul class="foogallery-attachments-list <?php echo $media_button_start ? 'foogallery-add-media-button-start' : ''; ?>">
                    <?php if ( $media_button_start ) {
                        $this->render_add_media_button( $foogallery->ID );
                    } ?>
                    <?php
                    //render all attachments that have been added to the gallery from the media library
                    if ( $has_attachments && $show_attachments ) {
                        foreach ( $foogallery->attachments() as $attachment ) {
                            $this->render_attachment_item( $attachment );
                        }
                    } ?>
                    <?php if ( !$media_button_start ) {
                        $this->render_add_media_button( $foogallery->ID );
                    } ?>
                </ul>
                <div style="clear: both;"></div>
                <textarea style="display: none" id="foogallery-attachment-template"><?php $this->render_attachment_item(); ?></textarea>
                <div class="foogallery-attachments-list-bar">
                    <button type="button" class="button button-primary button-large alignright upload_image_button"
                            data-uploader-title="<?php _e( 'Add Media To Gallery', 'foogallery' ); ?>"
                            data-uploader-button-text="<?php _e( 'Add Media', 'foogallery' ); ?>"
                            data-post-id="<?php echo $foogallery->ID; ?>">
                        <?php _e( 'Add Media', 'foogallery' ); ?>
                    </button>
                    &nbsp;
                    <button type="button" class="button button-primary button-large alignright remove_all_media">
		                <?php _e( 'Remove All Media', 'foogallery' ); ?>
                    </button>

                    <?php do_action('foogallery_attachments_list_bar_buttons', $foogallery ); ?>
                </div>
            </div>
			<?php
		}

		private function render_add_media_button( $foogallery_id) {
		    ?>
            <li class="add-attachment datasource-medialibrary">
                <a href="#" data-uploader-title="<?php _e( 'Add Media To Gallery', 'foogallery' ); ?>"
                   data-uploader-button-text="<?php _e( 'Add Media', 'foogallery' ); ?>"
                   data-post-id="<?php echo $foogallery_id; ?>" class="upload_image_button"
                   title="<?php _e( 'Add From Media Library', 'foogallery' ); ?>">
                    <div class="dashicons dashicons-plus"></div>
                </a>
            </li>
            <?php
        }

		/**
		 * Render the output for an item added from the media library
		 * @param bool $attachment_post
		 */
		public function render_attachment_item( $attachment_post = false ) {
			if ( $attachment_post != false ) {
				$attachment_id = $attachment_post->ID;
				$attachment = wp_get_attachment_image_src( $attachment_id );
				$extra_class = apply_filters( 'foogallery_admin_render_gallery_item_extra_classes' , '', $attachment_post );
			} else {
				$attachment_id = $attachment = $extra_class = '';
			}

			$data_attribute = empty($attachment_id) ? '' : "data-attachment-id=\"{$attachment_id}\"";
			$img_tag        = empty($attachment) ? '<img width="150" height="150" />' : "<img width=\"150\" height=\"150\" data-src=\"{$attachment[0]}\" />";
			?>
			<li class="attachment details" <?php echo $data_attribute; ?>>
				<div class="attachment-preview type-image <?php echo $extra_class; ?>">
					<div class="thumbnail">
						<div class="centered">
							<?php echo $img_tag; ?>
						</div>
					</div>
					<a class="info" href="#" title="<?php _e( 'Edit Info', 'foogallery' ); ?>">
						<span class="dashicons dashicons-info"></span>
					</a>
					<a class="remove" href="#" title="<?php _e( 'Remove from gallery', 'foogallery' ); ?>">
						<span class="dashicons dashicons-dismiss"></span>
					</a>
				</div>
			</li>
			<?php
		}

		/**
		 * Save the attachments for the gallery
		 * @param $post_id
		 * @param $form_post
		 */
		public function save_gallery_attachments($post_id, $form_post) {
			$datasource = foogallery_default_datasource();
			if ( isset( $_POST[FOOGALLERY_META_DATASOURCE] ) ) {
				$datasource = $_POST[FOOGALLERY_META_DATASOURCE];
			}
			if ( $datasource === foogallery_default_datasource() ) {
				$attachments = apply_filters( 'foogallery_save_gallery_attachments', explode( ',', $_POST[FOOGALLERY_META_ATTACHMENTS] ), $post_id, $_POST );
				update_post_meta( $post_id, FOOGALLERY_META_ATTACHMENTS, $attachments );
			}
		}
	}
}

if ( ! class_exists( 'FooGallery_Datasource_MediaLibrary_Query_Helper' ) ) {
	class FooGallery_Datasource_MediaLibrary_Query_Helper {
		/**
		 * Build up the WP query and fetch the attachments using 'get_posts'
		 * @param FooGallery $foogallery
		 *
		 * @return array(FooGalleryAttachment)
		 */
		public function query_attachments( $foogallery, $query_args ) {
			$attachments = array();

			global $foogallery_force_sort;
			$foogallery_force_sort = $foogallery->sorting;

			$attachment_query_args = array(
				'post_type'      => 'attachment',
				'posts_per_page' => -1,
				'orderby'        => foogallery_sorting_get_posts_orderby_arg( $foogallery_force_sort ),
				'order'          => foogallery_sorting_get_posts_order_arg( $foogallery_force_sort )
			);

			if ( !empty( $query_args ) ) {
				$attachment_query_args = array_merge( $attachment_query_args, $query_args );
			}

			//allow for others to override the query args
			$attachment_query_args = apply_filters( 'foogallery_attachment_get_posts_args', $attachment_query_args );

			global $current_foogallery_arguments;

			if ( isset( $current_foogallery_arguments ) ) {

				//check if a sorting override has been applied
				if ( isset( $current_foogallery_arguments['sort'] ) ) {
					$attachment_query_args['orderby'] = foogallery_sorting_get_posts_orderby_arg( $current_foogallery_arguments['sort'] );
					$attachment_query_args['order']   = foogallery_sorting_get_posts_order_arg( $current_foogallery_arguments['sort'] );
				}

				//check if a limit has been applied
				if ( isset( $current_foogallery_arguments['limit'] ) ) {
					$attachment_query_args['posts_per_page'] = $current_foogallery_arguments['limit'];
				}

				//check if an offset has been applied
				if ( isset( $current_foogallery_arguments['offset'] ) ) {
					$attachment_query_args['offset'] = $current_foogallery_arguments['offset'];
				}
			}

			//set some sorting globals
			global $foogallery_force_sort_orderby;
			global $foogallery_force_sort_order;
			$foogallery_force_sort_orderby = $attachment_query_args['orderby'];
			$foogallery_force_sort_order = $attachment_query_args['order'];

			//setup intercepting actions
			add_action( 'pre_get_posts', array( $this, 'force_gallery_ordering' ), 99 );
			add_action( 'pre_get_posts', array( $this, 'force_suppress_filters' ), PHP_INT_MAX );

			$attachment_posts = get_posts( $attachment_query_args );

			//remove intercepting actions
			remove_action( 'pre_get_posts', array( $this, 'force_gallery_ordering' ), 99 );
			remove_action( 'pre_get_posts', array( $this, 'force_suppress_filters' ), PHP_INT_MAX );

			$foogallery_force_sort = $foogallery_force_sort_orderby = $foogallery_force_sort_order = null;

			foreach ( $attachment_posts as $attachment_post ) {
				$attachments[] = apply_filters( 'foogallery_attachment_load', FooGalleryAttachment::get( $attachment_post ), $foogallery );
			}

			return $attachments;
		}

		/**
		 * This forces the attachments to be fetched using the correct ordering.
		 * Some plugins / themes override this globally for some reason, so this is a preventative measure to ensure sorting is correct
		 * @param $query WP_Query
		 */
		public function force_gallery_ordering( $query ) {
			global $foogallery_force_sort;
			global $foogallery_force_sort_orderby;
			global $foogallery_force_sort_order;

			//only care about attachments
			if ( isset( $foogallery_force_sort ) && array_key_exists( 'post_type', $query->query ) &&
				'attachment' === $query->query['post_type'] ) {
			    if ( isset( $foogallery_force_sort_orderby ) ) {
				    $query->set( 'orderby', $foogallery_force_sort_orderby );
			    }
				if ( isset( $foogallery_force_sort_order ) ) {
					$query->set( 'order', $foogallery_force_sort_order );
				}
			}
		}

		/**
		 * This forces the attachments to be fetched without any other filters.
		 * Some plugins override attachment queries, so this is a preventative measure to ensure sorting is correct
		 * @param $query WP_Query
		 */
		public function force_suppress_filters( $query ) {
			//only care about attachments
			if ( array_key_exists( 'post_type', $query->query ) &&
				'attachment' === $query->query['post_type'] ) {
				$query->set( 'suppress_filters', true );
			}
		}
	}
}