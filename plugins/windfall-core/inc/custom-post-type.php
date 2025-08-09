<?php

/**
 * Initialize Custom Post Type - Windfall Theme
 */
function windfall_custom_post_type() {
	$noneed_gallery_post = (windfall_framework_active()) ? cs_get_option('noneed_gallery_post') : '';
	$noneed_testimonial_post = (windfall_framework_active()) ? cs_get_option('noneed_testimonial_post') : '';
	$noneed_team_post = (windfall_framework_active()) ? cs_get_option('noneed_team_post') : '';

	if (!$noneed_gallery_post) {
		// Gallery
		$gallery_cpt = (windfall_framework_active()) ? cs_get_option('theme_gallery_name') : '';
		$gallery_slug = (windfall_framework_active()) ? cs_get_option('theme_gallery_slug') : '';
		$gallery_cpt_slug = (windfall_framework_active()) ? cs_get_option('theme_gallery_cat_slug') : '';

		$base = (isset($gallery_cpt_slug) && $gallery_cpt_slug !== '') ? sanitize_title_with_dashes($gallery_cpt_slug) : ((isset($gallery_cpt) && $gallery_cpt !== '') ? strtolower($gallery_cpt) : 'gallery');
		$base_slug = (isset($gallery_slug) && $gallery_slug !== '') ? sanitize_title_with_dashes($gallery_slug) : ((isset($gallery_cpt) && $gallery_cpt !== '') ? strtolower($gallery_cpt) : 'gallery');
		$label = ucfirst((isset($gallery_cpt) && $gallery_cpt !== '') ? strtolower($gallery_cpt) : 'gallery');

		// Register custom post type - Gallery
		register_post_type('gallery',
			array(
				'labels' => array(
					'name' => $label,
					'singular_name' => sprintf(esc_html__('%s Post', 'windfall-core' ), $label),
					'all_items' => sprintf(esc_html__('All %s', 'windfall-core' ), $label),
					'add_new' => esc_html__('Add New', 'windfall-core') ,
					'add_new_item' => sprintf(esc_html__('Add New %s', 'windfall-core' ), $label),
					'edit' => esc_html__('Edit', 'windfall-core') ,
					'edit_item' => sprintf(esc_html__('Edit %s', 'windfall-core' ), $label),
					'new_item' => sprintf(esc_html__('New %s', 'windfall-core' ), $label),
					'view_item' => sprintf(esc_html__('View %s', 'windfall-core' ), $label),
					'search_items' => sprintf(esc_html__('Search %s', 'windfall-core' ), $label),
					'not_found' => esc_html__('Nothing found in the Database.', 'windfall-core') ,
					'not_found_in_trash' => esc_html__('Nothing found in Trash', 'windfall-core') ,
					'parent_item_colon' => ''
				) ,
				'public' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'show_ui' => true,
				'query_var' => true,
				'menu_position' => 21,
				'menu_icon' => 'dashicons-playlist-video',
				'rewrite' => array(
					'slug' => $base_slug,
					'with_front' => false
				),
				'has_archive' => true,
				'capability_type' => 'post',
				'hierarchical' => true,
				'supports' => array(
					'title',
					'editor',
					'author',
					'thumbnail',
					'excerpt',
					'trackbacks',
					'custom-fields',
					'comments',
					'revisions',
					'sticky',
					'page-attributes'
				)
			)
		);
		// Registered

		// Add Category Taxonomy for our Custom Post Type - Gallery
		register_taxonomy(
			'gallery_category',
			'gallery',
			array(
				'hierarchical' => true,
				'public' => true,
				'show_ui' => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'labels' => array(
					'name' => sprintf(esc_html__( '%s Categories', 'windfall-core' ), $label),
					'singular_name' => sprintf(esc_html__('%s Category', 'windfall-core'), $label),
					'search_items' =>  sprintf(esc_html__( 'Search %s Categories', 'windfall-core'), $label),
					'all_items' => sprintf(esc_html__( 'All %s Categories', 'windfall-core'), $label),
					'parent_item' => sprintf(esc_html__( 'Parent %s Category', 'windfall-core'), $label),
					'parent_item_colon' => sprintf(esc_html__( 'Parent %s Category:', 'windfall-core'), $label),
					'edit_item' => sprintf(esc_html__( 'Edit %s Category', 'windfall-core'), $label),
					'update_item' => sprintf(esc_html__( 'Update %s Category', 'windfall-core'), $label),
					'add_new_item' => sprintf(esc_html__( 'Add New %s Category', 'windfall-core'), $label),
					'new_item_name' => sprintf(esc_html__( 'New %s Category Name', 'windfall-core'), $label)
				),
				'rewrite' => array( 'slug' => $base . '_cat' ),
			)
		);

		$args = array(
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud' => false,
		);
	}
	if (!$noneed_testimonial_post) {
		// Testimonials - Start
		$testimonial_cpt = (windfall_framework_active()) ? cs_get_option('theme_testimonial_name') : '';
		$testimonial_slug = (windfall_framework_active()) ? cs_get_option('theme_testimonial_slug') : '';
		$testimonial_cpt_slug = (windfall_framework_active()) ? cs_get_option('theme_testimonial_cat_slug') : '';

		$testi_base = (isset($testimonial_cpt_slug) && $testimonial_cpt_slug !== '') ? sanitize_title_with_dashes($testimonial_cpt_slug) : ((isset($testimonial_cpt) && $testimonial_cpt !== '') ? strtolower($testimonial_cpt) : 'testimonial');
		$testi_base_slug = (isset($testimonial_slug) && $testimonial_slug !== '') ? sanitize_title_with_dashes($testimonial_slug) : ((isset($testimonial_cpt) && $testimonial_cpt !== '') ? strtolower($testimonial_cpt) : 'testimonial');
		$testi_label = ucfirst((isset($testimonial_cpt) && $testimonial_cpt !== '') ? strtolower($testimonial_cpt) : 'testimonial');

		// Register custom post type - Testimonials
		register_post_type('testimonial',
			array(
				'labels' => array(
					'name' => $testi_label,
					'singular_name' => sprintf(esc_html__('%s Post', 'windfall-core' ), $testi_label),
					'all_items' => sprintf(esc_html__('%s', 'windfall-core' ), $testi_label),
					'add_new' => esc_html__('Add New', 'windfall-core') ,
					'add_new_item' => sprintf(esc_html__('Add New %s', 'windfall-core' ), $testi_label),
					'edit' => esc_html__('Edit', 'windfall-core') ,
					'edit_item' => sprintf(esc_html__('Edit %s', 'windfall-core' ), $testi_label),
					'new_item' => sprintf(esc_html__('New %s', 'windfall-core' ), $testi_label),
					'view_item' => sprintf(esc_html__('View %s', 'windfall-core' ), $testi_label),
					'search_items' => sprintf(esc_html__('Search %s', 'windfall-core' ), $testi_label),
					'not_found' => esc_html__('Nothing found in the Database.', 'windfall-core'),
					'not_found_in_trash' => esc_html__('Nothing found in Trash', 'windfall-core'),
					'parent_item_colon' => ''
				) ,
				'public' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'show_ui' => true,
				'query_var' => true,
				'menu_position' => 23,
				'menu_icon' => 'dashicons-groups',
				'rewrite' => array(
					'slug' => $testi_base_slug,
					'with_front' => false
				),
				'has_archive' => true,
				'capability_type' => 'post',
				'hierarchical' => true,
				'supports' => array(
					'title',
					'editor',
					'excerpt',
					'thumbnail',
					'revisions',
					'sticky',
					'page-attributes'
				)
			)
		);

		// Add Category Taxonomy for our Custom Post Type - Gallery
		register_taxonomy(
			'testimonial_category',
			'testimonial',
			array(
				'hierarchical' => true,
				'public' => true,
				'show_ui' => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'labels' => array(
					'name' => sprintf(esc_html__( '%s Categories', 'windfall-core' ), $testi_label),
					'singular_name' => sprintf(esc_html__('%s Category', 'windfall-core'), $testi_label),
					'search_items' =>  sprintf(esc_html__( 'Search %s Categories', 'windfall-core'), $testi_label),
					'all_items' => sprintf(esc_html__( 'All %s Categories', 'windfall-core'), $testi_label),
					'parent_item' => sprintf(esc_html__( 'Parent %s Category', 'windfall-core'), $testi_label),
					'parent_item_colon' => sprintf(esc_html__( 'Parent %s Category:', 'windfall-core'), $testi_label),
					'edit_item' => sprintf(esc_html__( 'Edit %s Category', 'windfall-core'), $testi_label),
					'update_item' => sprintf(esc_html__( 'Update %s Category', 'windfall-core'), $testi_label),
					'add_new_item' => sprintf(esc_html__( 'Add New %s Category', 'windfall-core'), $testi_label),
					'new_item_name' => sprintf(esc_html__( 'New %s Category Name', 'windfall-core'), $testi_label)
				),
				'rewrite' => array( 'slug' => $testi_base_slug . '_cat' ),
			)
		);

		$args = array(
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud' => false,
		);
		// Testimonials - End
	}
	if (!$noneed_team_post) {
		// Team Start
		$team_cpt = (windfall_framework_active()) ? cs_get_option('theme_team_name') : '';
		$team_slug = (windfall_framework_active()) ? cs_get_option('theme_team_slug') : '';
		$team_cpt_slug = (windfall_framework_active()) ? cs_get_option('theme_team_cat_slug') : '';

		$team_base = (isset($team_cpt_slug) && $team_cpt_slug !== '') ? sanitize_title_with_dashes($team_cpt_slug) : ((isset($team_cpt) && $team_cpt !== '') ? strtolower($team_cpt) : 'team');
		$team_base_slug = (isset($team_slug) && $team_slug !== '') ? sanitize_title_with_dashes($team_slug) : ((isset($team_cpt) && $team_cpt !== '') ? strtolower($team_cpt) : 'team');
		$teams = ucfirst((isset($team_cpt) && $team_cpt !== '') ? strtolower($team_cpt) : 'team');

		// Register custom post type - Team
		register_post_type('team',
			array(
				'labels' => array(
					'name' => $teams,
					'singular_name' => sprintf(esc_html__('%s Post', 'windfall-core' ), $teams),
					'all_items' => sprintf(esc_html__('%s', 'windfall-core' ), $teams),
					'add_new' => esc_html__('Add New', 'windfall-core') ,
					'add_new_item' => sprintf(esc_html__('Add New %s', 'windfall-core' ), $teams),
					'edit' => esc_html__('Edit', 'windfall-core') ,
					'edit_item' => sprintf(esc_html__('Edit %s', 'windfall-core' ), $teams),
					'new_item' => sprintf(esc_html__('New %s', 'windfall-core' ), $teams),
					'view_item' => sprintf(esc_html__('View %s', 'windfall-core' ), $teams),
					'search_items' => sprintf(esc_html__('Search %s', 'windfall-core' ), $teams),
					'not_found' => esc_html__('Nothing found in the Database.', 'windfall-core') ,
					'not_found_in_trash' => esc_html__('Nothing found in Trash', 'windfall-core') ,
					'parent_item_colon' => ''
				) ,
				'public' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'show_ui' => true,
				'query_var' => true,
				'menu_position' => 24,
				'menu_icon' => 'dashicons-businessman',
				'rewrite' => array(
					'slug' => $team_base_slug,
					'with_front' => false
				),
				'has_archive' => true,
				'capability_type' => 'post',
				'hierarchical' => true,
				'supports' => array(
					'title',
					'editor',
					'thumbnail',
					'excerpt',
					'revisions',
					'sticky',
					'page-attributes'
				)
			)
		);

		register_taxonomy(
			'team_category',
			'team',
			array(
				'hierarchical' => true,
				'public' => true,
				'show_ui' => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'labels' => array(
					'name' => sprintf(esc_html__( '%s Categories', 'windfall-core' ), $teams),
					'singular_name' => sprintf(esc_html__('%s Category', 'windfall-core'), $teams),
					'search_items' =>  sprintf(esc_html__( 'Search %s Categories', 'windfall-core'), $teams),
					'all_items' => sprintf(esc_html__( 'All %s Categories', 'windfall-core'), $teams),
					'parent_item' => sprintf(esc_html__( 'Parent %s Category', 'windfall-core'), $teams),
					'parent_item_colon' => sprintf(esc_html__( 'Parent %s Category:', 'windfall-core'), $teams),
					'edit_item' => sprintf(esc_html__( 'Edit %s Category', 'windfall-core'), $teams),
					'update_item' => sprintf(esc_html__( 'Update %s Category', 'windfall-core'), $teams),
					'add_new_item' => sprintf(esc_html__( 'Add New %s Category', 'windfall-core'), $teams),
					'new_item_name' => sprintf(esc_html__( 'New %s Category Name', 'windfall-core'), $teams)
				),
				'rewrite' => array( 'slug' => $team_base_slug . '_cat' ),
			)
		);

		$args = array(
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud' => false,
		);
		// Team - End
	}

}

function windfall_custom_posttype_slug() {
	$noneed_gallery_post = (windfall_framework_active()) ? cs_get_option('noneed_gallery_post') : '';
	$noneed_testimonial_post = (windfall_framework_active()) ? cs_get_option('noneed_testimonial_post') : '';
	$noneed_team_post = (windfall_framework_active()) ? cs_get_option('noneed_team_post') : '';

	if (!$noneed_gallery_post) {
	  // Gallery Post
	  $gallery_cpt = (windfall_framework_active()) ? cs_get_option('theme_gallery_name') : '';
		if ($gallery_cpt === '') $gallery_cp = 'gallery';
	  $rules = get_option( 'rewrite_rules' );
	  if ( ! isset( $rules['('.$gallery_cpt.')/(\d*)$'] ) ) {
			global $wp_rewrite;
			$wp_rewrite->flush_rules();
	  }
	}
	if (!$noneed_testimonial_post) {
	  // Testimonial Post
	  $testimonial_cpt = (windfall_framework_active()) ? cs_get_option('theme_testimonial_name') : '';
		if ($testimonial_cpt === '') $testimonial_cp = 'testimonial';
	  $rules = get_option( 'rewrite_rules' );
	  if ( ! isset( $rules['('.$testimonial_cpt.')/(\d*)$'] ) ) {
			global $wp_rewrite;
			$wp_rewrite->flush_rules();
	  }
	}
	if (!$noneed_team_post) {
	  // Team Post
	  $team_cpt = (windfall_framework_active()) ? cs_get_option('theme_team_name') : '';
		if ($team_cpt === '') $team_cp = 'team';
	  $rules = get_option( 'rewrite_rules' );
	  if ( ! isset( $rules['('.$team_cpt.')/(\d*)$'] ) ) {
			global $wp_rewrite;
			$wp_rewrite->flush_rules();
	  }
	}
}
add_action( 'cs_validate_save_after','windfall_custom_posttype_slug' );

// After Theme Setup
function windfall_custom_flush_rules() {
	// Enter post type function, so rewrite work within this function
	windfall_custom_post_type();
	// Flush it
	flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'windfall_custom_flush_rules');
add_action('init', 'windfall_custom_post_type');

// Avoid apps post type as 404 page while it change
function vt_cpt_avoid_error_posttype() {
	$noneed_gallery_post = (windfall_framework_active()) ? cs_get_option('noneed_gallery_post') : '';
	$noneed_testimonial_post = (windfall_framework_active()) ? cs_get_option('noneed_testimonial_post') : '';
	$noneed_team_post = (windfall_framework_active()) ? cs_get_option('noneed_team_post') : '';
	if (!$noneed_gallery_post) {
	  // Gallery
		$gallery_cpt = (windfall_framework_active()) ? cs_get_option('theme_gallery_name') : '';
		if ($gallery_cpt === '') $gallery_cp = 'gallery';
		$set = get_option('post_type_rules_flased_' . $gallery_cpt);
		if ($set !== true){
			flush_rewrite_rules(false);
			update_option('post_type_rules_flased_' . $gallery_cpt,true);
		}
	}
	if (!$noneed_testimonial_post) {
		// Testimonial Post
		$testimonial_cpt = (windfall_framework_active()) ? cs_get_option('theme_testimonial_name') : '';
		if ($testimonial_cpt === '') $testimonial_cp = 'testimonial';
		$set = get_option('post_type_rules_flased_' . $testimonial_cpt);
		if ($set !== true){
			flush_rewrite_rules(false);
			update_option('post_type_rules_flased_' . $testimonial_cpt,true);
		}
	}
	if (!$noneed_team_post) {
		// Team Post
		$team_cpt = (windfall_framework_active()) ? cs_get_option('theme_team_name') : '';
		if ($team_cpt === '') $team_cp = 'team';
		$set = get_option('post_type_rules_flased_' . $team_cpt);
		if ($set !== true){
			flush_rewrite_rules(false);
			update_option('post_type_rules_flased_' . $team_cpt,true);
		}
	}
}
add_action('init', 'vt_cpt_avoid_error_posttype');

$noneed_gallery_post = (windfall_framework_active()) ? cs_get_option('noneed_gallery_post') : '';
$noneed_testimonial_post = (windfall_framework_active()) ? cs_get_option('noneed_testimonial_post') : '';
$noneed_team_post = (windfall_framework_active()) ? cs_get_option('noneed_team_post') : '';
if (!$noneed_gallery_post) {

	// Add Filter by Category in Gallery Type
	add_action('restrict_manage_posts', 'windfall_filter_gallery_categories');
	function windfall_filter_gallery_categories() {
		global $typenow;
		$post_type = 'gallery'; // Gallery post type
		$taxonomy  = 'gallery_category'; // Gallery category taxonomy
		if ($typenow == $post_type) {
			$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
			$info_taxonomy = get_taxonomy($taxonomy);
			wp_dropdown_categories(array(
				'show_option_all' => sprintf(esc_html__("Show All %s", 'windfall-core'), $info_taxonomy->label),
				'taxonomy'        => $taxonomy,
				'name'            => $taxonomy,
				'orderby'         => 'name',
				'selected'        => $selected,
				'show_count'      => true,
				'hide_empty'      => true,
			));
		};
	}

	// Gallery Search => ID to Term
	add_filter('parse_query', 'windfall_gallery_id_term_search');
	function windfall_gallery_id_term_search($query) {
		global $pagenow;
		$post_type = 'gallery'; // Gallery post type
		$taxonomy  = 'gallery_category'; // Gallery category taxonomy
		$q_vars    = &$query->query_vars;
		if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
			$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
			$q_vars[$taxonomy] = $term->slug;
		}
	}

	/* ---------------------------------------------------------------------------
	 * Custom columns - Gallery
	 * --------------------------------------------------------------------------- */
	add_filter("manage_edit-gallery_columns", "windfall_gallery_edit_columns");
	function windfall_gallery_edit_columns($columns) {
	  $new_columns['cb'] = '<input type="checkbox" />';
	  $new_columns['title'] = __('Title', 'windfall-core' );
	  $new_columns['thumbnail'] = __('Image', 'windfall-core' );
	  $new_columns['gallery_category'] = __('Categories', 'windfall-core' );
	  $new_columns['gallery_order'] = __('Order', 'windfall-core' );
	  $new_columns['date'] = __('Date', 'windfall-core' );

	  return $new_columns;
	}
	add_action('manage_gallery_posts_custom_column', 'windfall_manage_gallery_columns', 10, 2);
	function windfall_manage_gallery_columns( $column_name ) {
	  global $post;

	  switch ($column_name) {

	    /* If displaying the 'Image' column. */
	    case 'thumbnail':
	      echo get_the_post_thumbnail( $post->ID, array( 100, 100) );
	    break;

	    /* If displaying the 'Categories' column. */
	    case 'gallery_category' :

	      $terms = get_the_terms( $post->ID, 'gallery_category' );

	      if ( !empty( $terms ) ) {

	        $out = array();
	        foreach ( $terms as $term ) {
	            $out[] = sprintf( '<a href="%s">%s</a>',
	            	esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'gallery_category' => $term->slug ), 'edit.php' ) ),
	            	esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'gallery_category', 'display' ) )
	            );
	        }
	        /* Join the terms, separating them with a comma. */
	        echo join( ', ', $out );
	      }

	      /* If no terms were found, output a default message. */
	      else {
	        echo '&macr;';
	      }

	    break;

	    case "gallery_order":
	      echo $post->menu_order;
	    break;

	    /* Just break out of the switch statement for everything else. */
	    default :
	      break;
	    break;

	  }
	}

}
if (!$noneed_testimonial_post) {

	/* ---------------------------------------------------------------------------
	 * Custom columns - Testimonial
	 * --------------------------------------------------------------------------- */
	add_filter("manage_edit-testimonial_columns", "windfall_testimonial_edit_columns");
	function windfall_testimonial_edit_columns($columns) {
	  $new_columns['cb'] = '<input type="checkbox" />';
	  $new_columns['title'] = __('Title', 'windfall-core' );
	  $new_columns['thumbnail'] = __('Image', 'windfall-core' );
	  $new_columns['id'] = __('Testimonial ID', 'windfall-core' );
	  $new_columns['testimonial_category'] = __('Category', 'windfall-core' );
	  $new_columns['testimonial_order'] = __('Order', 'windfall-core' );
	  $new_columns['date'] = __('Date', 'windfall-core' );

	  return $new_columns;
	}

	add_action('manage_testimonial_posts_custom_column', 'windfall_manage_testimonial_columns', 10, 2);
	function windfall_manage_testimonial_columns( $column_name ) {
	  global $post;

	  switch ($column_name) {

	    /* If displaying the 'Image' column. */
	    case 'thumbnail':
	      echo get_the_post_thumbnail( $post->ID, array( 100, 100) );
	    break;

	    /* If displaying the 'ID' column. */
	    case 'id':
	      echo '<input type="text" onfocus="this.select();" readonly="readonly" value="'. esc_attr( $post->ID ) .'">';
	    break;

	    case "testimonial_category":
	    	$terms = get_the_terms( $post->ID, 'testimonial_category' );

	      if ( !empty( $terms ) ) {

	        $out = array();
	        foreach ( $terms as $term ) {
	            $out[] = sprintf( '<a href="%s">%s</a>',
	            	esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'testimonial_category' => $term->slug ), 'edit.php' ) ),
	            	esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'testimonial_category', 'display' ) )
	            );
	        }
	        /* Join the terms, separating them with a comma. */
	        echo join( ', ', $out );
	      }

	      /* If no terms were found, output a default message. */
	      else {
	        echo '&macr;';
	      }
	    break;

	    case "testimonial_order":
	      echo $post->menu_order;
	    break;

	    /* Just break out of the switch statement for everything else. */
	    default :
	      break;
	    break;

	  }
	}

}
if (!$noneed_team_post) {

	/* ---------------------------------------------------------------------------
	 * Custom columns - Team
	 * --------------------------------------------------------------------------- */
	add_filter("manage_edit-team_columns", "windfall_team_edit_columns");
	function windfall_team_edit_columns($columns) {
	  $new_columns['cb'] = '<input type="checkbox" />';
	  $new_columns['title'] = __('Title', 'windfall-core' );
	  $new_columns['thumbnail'] = __('Image', 'windfall-core' );
	  $new_columns['id'] = __('Member ID', 'windfall-core' );
	  $new_columns['name'] = __('Job Position', 'windfall-core' );
	  $new_columns['team_order'] = __('Order', 'windfall-core' );
	  $new_columns['date'] = __('Date', 'windfall-core' );

	  return $new_columns;
	}

	add_action('manage_team_posts_custom_column', 'windfall_manage_team_columns', 10, 2);
	function windfall_manage_team_columns( $column_name ) {
	  global $post;

	  switch ($column_name) {

	    /* If displaying the 'Image' column. */
	    case 'thumbnail':
	      echo get_the_post_thumbnail( $post->ID, array( 100, 100) );
	    break;

	    /* If displaying the 'ID' column. */
	    case 'id':
	      echo '<input type="text" onfocus="this.select();" readonly="readonly" value="'. esc_attr( $post->ID ) .'">';
	    break;

	    case "name":
	    	$team_options = get_post_meta( get_the_ID(), 'windfall_csf_meta_options_team', true );
	      echo $team_options['team_job_position'];
	    break;

	    case "team_order":
	      echo $post->menu_order;
	    break;

	    /* Just break out of the switch statement for everything else. */
	    default :
	      break;
	    break;

	  }
	}
}
