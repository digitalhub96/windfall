<?php
/*
 * The template for displaying archive pages.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */
get_header();
$noneed_testimonial_post = cs_get_option('noneed_testimonial_post');
$noneed_gallery_post = cs_get_option('noneed_gallery_post');
$noneed_team_post = cs_get_option('noneed_team_post');

if(function_exists( 'windfall_core_plugin_status' ) && (windfall_is_post_type('testimonial') && !$noneed_testimonial_post)){

	$testimonial_style = cs_get_option('testimonial_style');
  $testi_title = cs_get_option('testimonial_title');
	$testimonial_limit = cs_get_option('testimonial_limit');
	$testimonial_orderby = cs_get_option('testimonial_orderby');
	$testimonial_order = cs_get_option('testimonial_order');
  $testimonial_limit = $testimonial_limit ? $testimonial_limit : '-1';

  $testi_title_actual = $testi_title ? $testi_title : esc_html__('Testimonials','windfall');

  // Query Starts Here
  // Pagination
  global $paged;
  if( get_query_var( 'paged' ) )
    $my_page = get_query_var( 'paged' );
  else {
    if( get_query_var( 'page' ) )
      $my_page = get_query_var( 'page' );
    else
      $my_page = 1;
    set_query_var( 'paged', $my_page );
    $paged = $my_page;
  }

  $args = array(
    'paged' => $my_page,
    'post_type' => 'testimonial',
    'posts_per_page' => (int)$testimonial_limit,
    'orderby' => $testimonial_orderby,
    'order' => $testimonial_order,
  );

  // Testimonial Style
  if ($testimonial_style === 'testimonial_two') {
    $testimonial_style_class = ' testimonials-style-two wndfal-overlay';
  } else {
    $testimonial_style_class = '';
  }
  // RTL
  if ( is_rtl() ) {
    $switch_rtl = ' data-rtl=true';
  } else {
    $switch_rtl = ' data-rtl=false';
  }

  $windfall_testi = new WP_Query( $args );
  if ($windfall_testi->have_posts()) : ?>
<div class="testi-global">
<?php
if($testimonial_style === 'testimonial_three') { ?>
<div class="wndfal-customers customers-style-two">
  <div class="container">
    <div class="row">
<?php } elseif ($testimonial_style === 'testimonial_two') { ?>
<div class="wndfal-customers">
  <div class="container">
    <div class="owl-carousel carousel-style-two" data-items="3" data-items-tablet="2" data-margin="37" data-loop="true" data-nav="true" data-dots="false" data-autoplay="true" <?php echo esc_attr($switch_rtl); ?>>
<?php } else { ?>
<div class="wndfal-testimonials wndfal-parallax">
  <div class="container">
    <div class="testimonials-wrap">
      <h2 class="testimonials-title"><?php echo esc_html($testi_title_actual); ?></h2>
      <div class="owl-carousel" data-items="1" data-margin="0" data-loop="true" data-nav="true" data-dots="true" data-autoplay="true" <?php echo esc_attr($switch_rtl); ?>>
<?php }

        while ($windfall_testi->have_posts()) : $windfall_testi->the_post();

        // Get Meta Box Options - windfall_framework_active()
        $testimonial_options = get_post_meta( get_the_ID(), 'windfall_csf_meta_options_testi', true );
        $testi_job = $testimonial_options['testi_location'];

        // Featured Image
        $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
        $large_image = $large_image[0];
        $windfall_alt = get_post_meta( get_post_thumbnail_id(get_the_ID()), '_wp_attachment_image_alt', true);

        if ($testimonial_style === 'testimonial_three') { ?>
          <div class="col-lg-4 col-md-6">
            <div class="customer-item">
             <p><?php the_excerpt(); ?></p>
              <div class="customer-info">
                <?php if($large_image) { ?>
                  <div class="wndfal-image"><img src="<?php echo esc_url($large_image); ?>" alt="<?php echo esc_attr($windfall_alt); ?>"></div>
                <?php } ?>
                <div class="customer-inner-info">
                  <h5 class="customer-name"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo get_the_title(); ?></a></h5>
                  <?php if ($testi_job) { ?><p><?php echo esc_html($testi_job); ?></p><?php } ?>
                </div>
              </div>
            </div>
          </div>
        <?php } elseif ($testimonial_style === 'testimonial_two') { // Style Two
        ?>
          <div class="item">
            <div class="customer-item">
              <p><?php the_excerpt(); ?></p>
              <div class="customer-info">
                <?php if($large_image) { ?>
                  <div class="wndfal-image"><img src="<?php echo esc_url($large_image); ?>" alt="<?php echo esc_attr($windfall_alt); ?>"></div>
                <?php } ?>
                <div class="customer-inner-info">
                  <h5 class="customer-name"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo get_the_title(); ?></a></h5>
                  <?php if ($testi_job) { ?><p><?php echo esc_html($testi_job); ?></p><?php } ?>
                </div>
              </div>
            </div>
          </div>
        <?php } else { ?>
          <div class="item">
            <div class="testimonial-item">
              <p><?php the_excerpt(); ?></p>
              <?php if($testi_job) { ?>
              <h5 class="author-name"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html($testi_job); ?></a></h5>
              <?php } ?>
            </div>
          </div>
        <?php }

        endwhile;
        wp_reset_postdata();
        if ($testimonial_style != 'testimonial_two' && $testimonial_style != 'testimonial_three') { ?>
          </div>
        <?php } ?>
        </div>
      </div>
      </div>
</div>
  <?php
    endif;

} elseif (function_exists( 'windfall_core_plugin_status' ) && (windfall_is_post_type('gallery') && !$noneed_gallery_post)) {

  $gallery_style = cs_get_option('gallery_style');
  $gallery_caption_style = cs_get_option('gallery_caption_style');
  $gallery_limit = cs_get_option('gallery_limit');
  $gallery_column = cs_get_option('gallery_column');
  $gallery_order = cs_get_option('gallery_order');
  $gallery_orderby = cs_get_option('gallery_orderby');
  $gallery_pagination = cs_get_option('gallery_pagination');
  $gallery_filter = cs_get_option('gallery_filter');
  $filter_type = cs_get_option('filter_type');
  $gallery_show_category = cs_get_option('gallery_show_category');
  $gallery_aqr = cs_get_option('gallery_aqr');
  $all_txt = cs_get_option('gallery_all_text');
  $gal_all_txt = $all_txt ? $all_txt : esc_html__('Show All', 'windfall');
  ?>
  <div class="wndfal-mid-wrap mid-spacer-three gallery-global">

    <?php
    // Gallery Filter
    if ($gallery_style != 'two' && $gallery_filter) {
      if($filter_type === 'ajax') {
        $filter_class = ' ajax-filter';
      } else {
        $filter_class = ' normal-filter';
      }

    if($gallery_caption_style === 'with_caption') {
      $gallery_cap_style = 'with';
    } else {
      $gallery_cap_style = 'without';
    }
    ?>
    <div class="container">
      <div class="masonry-filters <?php echo esc_attr($filter_class); ?>">
        <ul>
          <li><a href="javascript:void(0);" class="active" data-style="<?php echo esc_attr($gallery_style);?>" data-limit="<?php echo esc_attr($gallery_limit); ?>" data-caption="<?php echo esc_attr($gallery_cap_style); ?>" data-filter="*"><?php echo esc_html($gal_all_txt); ?></a></li>
          <?php
          if ($gallery_show_category) {
                $terms = $gallery_show_category;
                $count = count($terms);
                if ($count > 0) {
                  foreach ($terms as $term) {
                    $term_name = get_term_by('id', $term, 'gallery_category');
                    echo '<li><a href="javascript:void(0);" data-limit="'.esc_attr($gallery_limit).'" data-filter=".'. preg_replace('/\s+/', "", strtolower($term)) .'-item" data-cat="'. preg_replace('/\s+/', "", strtolower($term)) .'" data-loader="ball-pulse" data-caption="'.esc_attr($gallery_cap_style).'" data-filter=".'. preg_replace('/\s+/', "", strtolower($term_name->name)) .'-item" title="' . str_replace('-', " ", strtolower($term_name->name)) . '">' . str_replace('-', " ", $term_name->name) . '</a></li>';
                   }
                }
              } else {
                if ( function_exists( 'windfall_gallery_category_list' ) ) {
                  echo windfall_gallery_category_list();
                }
            }
          ?>
        </ul>
      </div>
    </div>
    <?php
    }

      // Pagination
      global $paged;
        if( get_query_var( 'paged' ) )
          $my_page = get_query_var( 'paged' );
        else {
          if( get_query_var( 'page' ) )
            $my_page = get_query_var( 'page' );
          else
            $my_page = 1;
          set_query_var( 'paged', $my_page );
          $paged = $my_page;
        }

      // RTL
      if ( is_rtl() ) {
        $switch_rtl = ' data-rtl=true';
      } else {
        $switch_rtl = ' data-rtl=false';
      }

      if($gallery_show_category){
        $args = array(
          // other query params here,
          'paged' => $my_page,
          'post_type' => 'gallery',
          'posts_per_page' => (int)$gallery_limit,
          'tax_query' => array(
            array(
              'taxonomy' => 'gallery_category',
              'field' => 'ID',
              'terms' => $gallery_show_category
            )
          ),
          'orderby' => $gallery_orderby,
          'order' => $gallery_order
        );
      } else {
        $args = array(
          // other query params here,
          'paged' => $my_page,
          'post_type' => 'gallery',
          'posts_per_page' => (int)$gallery_limit,
          'orderby' => $gallery_orderby,
          'order' => $gallery_order
        );
      }
      $windfall_galry = new WP_Query( $args );

      if($gallery_style === 'two') { ?>
        <div class="wndfal-gallery gallery-style-three">
          <div class="owl-carousel" data-items="5" data-items-tablet="3" data-items-mobile-landscape="2" data-margin="0" data-loop="true" data-nav="true" data-dots="false" data-autoplay="true" <?php echo esc_attr($switch_rtl); ?>>
      <?php } else { ?>
        <div class="container">
        <div class="wndfal-masonry <?php echo esc_attr($gallery_column); ?>">
      <?php }

        // Gallery Start
        if ($windfall_galry->have_posts()) : while ($windfall_galry->have_posts()) : $windfall_galry->the_post();

        if($gallery_style === 'two') {
          // Featured Image
          $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
          $large_image = $large_image[0];
          $alt = get_post_meta(get_post_thumbnail_id(get_the_ID()), '_wp_attachment_image_alt', true);
          if(!$gallery_aqr) {
            if(class_exists('Aq_Resize')) {
              $galry_img = aq_resize( $large_image, '380', '317', true );
            } else {$galry_img = $large_image;}
            $featured_img = ( $galry_img ) ? $galry_img : esc_url(WINDFALL_IMAGES) . '/holders/380x317.png';
          } else {
            $featured_img = $large_image;
          }

          ?>
          <div class="item">
            <div class="gallery-item">
              <div class="wndfal-image wndfal-popup">
                <a href="<?php echo esc_url($large_image); ?>"><img src="<?php echo esc_url($featured_img); ?>" alt="<?php the_title_attribute(); ?>"></a>
              </div>
            </div>
          </div>
        <?php } else {

          // Category
          global $post;
          $terms = wp_get_post_terms($post->ID,'gallery_category');
          foreach ($terms as $term) {
            $cat_class = $term->slug.'-item';
          }
          $count = count($terms);
          $i=0;
          $cat_class = '';
          if ($count > 0) {
            foreach ($terms as $term) {
              $i++;
              $cat_class .= $term->slug .'-item ';
              if ($count != $i) {
                $cat_class .= '';
              } else {
                $cat_class .= '';
              }
            }
          }
          // Featured Image
          $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
          $large_image = $large_image[0];
          if(!$gallery_aqr) {
            if(class_exists('Aq_Resize')) {
              $galry_img = aq_resize( $large_image, '370', '260', true );
            } else {$galry_img = $large_image;}
            $featured_img = ( $galry_img ) ? $galry_img : esc_url(WINDFALL_IMAGES) . '/holders/370x260.png';
          } else {
            $featured_img = $large_image;
          }

          $gallery_metabox = get_post_meta( get_the_ID(), 'windfall_csf_meta_options_gallery', true );
          if ($gallery_metabox ) {
            $gallery_type = $gallery_metabox['gallery_type'];
            $video_post = $gallery_metabox['video_post'];
            $gallery_post_format = $gallery_metabox['gallery_post_images'];
            $link_post = $gallery_metabox['link_post'];
          } else {
            $gallery_type = '';
            $video_post = '';
            $gallery_post_format = array();
            $link_post = '';
          } ?>
          <div class="masonry-item <?php echo esc_attr($cat_class ); ?>" data-category="<?php echo esc_attr($cat_class ); ?>">
            <?php if ( $gallery_type == 'gallery' ) { ?>
            <div class="gallery-item">
              <div class="owl-carousel" data-items="1" data-margin="0" data-loop="true" data-nav="true" data-dots="true" data-autoplay="true" <?php echo esc_attr($switch_rtl); ?>>
                <?php $images = explode( ',', $gallery_post_format );
                foreach ($images as $imagee) {
                  $image = wp_get_attachment_image_src( $imagee, 'full' );
                  $image_alt = get_post_meta($imagee, '_wp_attachment_image_alt', true);
                  $g_img = $image[0];
                  if(!$gallery_aqr) {
                    if(class_exists('Aq_Resize')) {
                      $slider_img = aq_resize( $g_img, '370', '260', true );
                    } else {$slider_img = $g_img;}
                    $slider_actual_img = ( $slider_img ) ? $slider_img : esc_url(WINDFALL_IMAGES) . '/holders/370x260.png';
                  } else {
                    $slider_actual_img = $g_img;
                  }
                  ?>
                  <div class="item">
                    <div class="wndfal-image">
                      <img src="<?php echo esc_url($slider_actual_img); ?>" alt="<?php esc_attr( $image_alt ); ?>" />
                    </div>
                  </div>
                <?php } ?>
              </div>
              <?php if($gallery_caption_style === 'with_caption') { ?>
                <h5 class="gallery-title"><?php echo get_the_title(); ?></h5>
              <?php } ?>
            </div>

            <?php } elseif( $gallery_type == 'video' ) {
              preg_match(
                '/[\\?\\&]v=([^\\?\\&]+)/',
                $video_post,
                $matches
              );
              $id = $matches[1];
             ?>
              <div class="gallery-item">
                <div class="wndfal-image">
                  <img src="<?php echo esc_url( $featured_img ); ?>" alt="<?php the_title_attribute(); ?>" />
                  <div class="play-btn-wrap">
                    <div class="wndfal-table-wrap">
                      <div class="wndfal-align-wrap">
                        <div class="play-btn">
                          <a href="<?php echo esc_url($video_post); ?>" id="myUrl" class="wndfal-popup-video"><i class="fa fa-play" aria-hidden="true"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php if($gallery_caption_style === 'with_caption') { ?>
                  <h5 class="gallery-title"><?php echo get_the_title(); ?></h5>
                <?php } ?>
              </div>

            <?php } elseif( $gallery_type == 'link' ) { ?>
              <div class="gallery-item">
                <div class="wndfal-image">
                  <img src="<?php echo esc_url($featured_img); ?>" alt="<?php the_title_attribute(); ?>">
                  <div class="gallery-info">
                    <div class="wndfal-table-wrap">
                      <div class="wndfal-align-wrap">
                        <div class="wndfal-popup">
                          <a href="<?php echo esc_url($large_image); ?>"><i class="fa fa-search" aria-hidden="true"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php if($gallery_caption_style === 'with_caption') { ?>
                  <h5 class="gallery-title"><a href="<?php echo esc_url($link_post); ?>"><?php echo get_the_title(); ?></a></h5>
                <?php } ?>
              </div>
            <?php } else { ?>
              <div class="gallery-item">
                <div class="wndfal-image">
                  <img src="<?php echo esc_url($featured_img); ?>" alt="<?php the_title_attribute(); ?>">
                  <div class="gallery-info">
                    <div class="wndfal-table-wrap">
                      <div class="wndfal-align-wrap">
                        <div class="wndfal-popup">
                          <a href="<?php echo esc_url($large_image); ?>"><i class="fa fa-search" aria-hidden="true"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php if($gallery_caption_style === 'with_caption') { ?>
                  <h5 class="gallery-title"><?php echo get_the_title(); ?></h5>
                <?php } ?>
              </div>
            <?php } ?>
          </div>
        <?php }
          endwhile;
          endif;
        ?>

       </div>
       </div>
    <?php
    if ($gallery_pagination) {
      echo '<div class="wndfal-pagi">';
      windfall_custom_paging_nav($windfall_galry->max_num_pages,"",$paged);
      echo '</div>';
    } ?>
  </div>

<?php wp_reset_postdata();
// Gallery End

} elseif (function_exists( 'windfall_core_plugin_status' ) && (windfall_is_post_type('team') && !$noneed_team_post)) {

  $team_limit = cs_get_option('team_limit');
  $team_orderby = cs_get_option('team_orderby');
  $team_order = cs_get_option('team_order');
  $windfall_team_aqr = cs_get_option('team_aqr');
  $meet_txt = cs_get_option('team_social_title');

  $team_limit = $team_limit ? $team_limit : '8';
  // Query Starts Here
  // Pagination
  global $paged;
  if( get_query_var( 'paged' ) )
    $my_page = get_query_var( 'paged' );
  else {
    if( get_query_var( 'page' ) )
      $my_page = get_query_var( 'page' );
    else
      $my_page = 1;
    set_query_var( 'paged', $my_page );
    $paged = $my_page;
  }

  $args = array(
    'paged' => $my_page,
    'post_type' => 'team',
    'posts_per_page' => (int)$team_limit,
    'orderby' => $team_orderby,
    'order' => $team_order,
  );

  $windfall_team_qury = new WP_Query( $args );
  if ($windfall_team_qury->have_posts()) :
  ?>

  <div class="wndfal-team wndfal-team-global">
    <div class="container">
      <div class="row">
        <?php
          while ($windfall_team_qury->have_posts()) : $windfall_team_qury->the_post();
          $team_options = get_post_meta( get_the_ID(), 'windfall_csf_meta_options_team', true );
          if($team_options) {
            $team_job_position = $team_options['team_job_position'];
            $team_socials = $team_options['social_icons'];
            $team_contact = $team_options['contact_details'];
          } else {
            $team_job_position = '';
            $team_socials = '';
            $team_contact = '';
          }

          // Featured Image
          $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
          $large_image = $large_image[0];
          $abt_title = get_the_title();
          if ($windfall_team_aqr) {
            $team_featured_img = $large_image;
          } else {
            if(class_exists('Aq_Resize')) {
              $team_img = aq_resize( $large_image, '270', '220', true );
            } else {$team_img = $large_image;}
            $team_featured_img = ( $team_img ) ? $team_img : esc_url(WINDFALL_IMAGES) . '/holders/270x220.png';
          }
          ?>
          <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="mate-item">
              <?php if ($large_image) { ?>
                <div class="wndfal-image"><a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?php echo esc_url($team_featured_img); ?>" alt="<?php echo esc_attr($abt_title); ?>"></a></div>
              <?php } ?>
              <div class="mate-info">
                <?php if($team_job_position) { ?>
                <h6 class="mate-designation"><?php echo esc_html($team_job_position); ?></h6>
                <?php } ?>
                <h4 class="mate-name"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html($abt_title); ?></a></h4>
                <?php if ( ! empty( $team_contact ) ) { ?>
                  <ul>
                    <?php foreach ( $team_contact as $contact ) {
                    if($contact['contact_link']) { ?>
                      <li><i class="<?php echo esc_attr($contact['contact_icon']); ?>" aria-hidden="true"></i><a href="<?php echo esc_url($contact['contact_link']); ?>" target="_blank"><?php echo esc_html($contact['contact_text']); ?></a></li>
                    <?php } else { ?>
                      <li><i class="<?php echo esc_attr($contact['contact_icon']); ?>" aria-hidden="true"></i><?php echo esc_html($contact['contact_text']); ?></li>
                    <?php } } ?>
                  </ul>
                <?php } ?>
                <div class="mate-meta">
                  <div class="row align-items-center">
                    <?php if($meet_txt) { ?>
                      <div class="col-6 social-title"><?php echo esc_html($meet_txt); ?></div>
                    <?php } else { ?>
                      <div class="col-6 social-title"><?php esc_html_e('Meet me on:','windfall'); ?></div>
                    <?php } if ( ! empty( $team_socials ) ) { ?>
                      <div class="col-6">
                        <div class="wndfal-social">
                          <?php foreach ( $team_socials as $social ) {
                          if($social['icon_link']) { ?>
                            <a href="<?php echo esc_url($social['icon_link']); ?>"><i class="<?php echo esc_attr($social['icon']); ?>"></i></a>
                          <?php } } ?>
                        </div>
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
          endwhile;
        ?>
      </div>
    </div>
  </div> <!-- team End -->

  <?php
  endif;

} else {
// Metabox
$windfall_id    = ( isset( $post ) ) ? $post->ID : 0;
$windfall_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $windfall_id;
$windfall_id    = ( windfall_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $windfall_id;
$windfall_meta  = get_post_meta( $windfall_id, 'page_type_metabox', true );

if ($windfall_meta) {
  $windfall_content_padding = $windfall_meta['content_spacings'];
} else { $windfall_content_padding = ''; }
// Padding - Metabox
if ($windfall_content_padding && $windfall_content_padding !== 'padding-none') {
  $windfall_content_spacings_unit = $windfall_meta['content_top_bottom_padding']['unit'];
  $windfall_content_top_spacings = $windfall_meta['content_top_bottom_padding']['top'];
  $windfall_content_bottom_spacings = $windfall_meta['content_top_bottom_padding']['bottom'];
  if ($windfall_content_padding === 'padding-custom') {
    $windfall_content_top_spacings = $windfall_content_top_spacings ? 'padding-top:'.$windfall_content_top_spacings.$windfall_content_spacings_unit.';' : '';
    $windfall_content_bottom_spacings = $windfall_content_bottom_spacings ? 'padding-bottom:'.$windfall_content_bottom_spacings.$windfall_content_spacings_unit.';' : '';
    $windfall_custom_padding = $windfall_content_top_spacings . $windfall_content_bottom_spacings;
  } else {
    $windfall_custom_padding = '';
  }
} else {
  $windfall_custom_padding = '';
}

// Theme Options
$windfall_sidebar_position = cs_get_option('blog_sidebar_position');
$windfall_blog_style = cs_get_option('blog_listing_style');
$windfall_blog_widget = cs_get_option('blog_widget');

if ($windfall_blog_widget) {
  $widget_select = $windfall_blog_widget;
} else {
  if (is_active_sidebar('sidebar-1')) {
    $widget_select = 'sidebar-1';
  } else {
    $widget_select = '';
  }
}

// Sidebar Position
if ($widget_select && is_active_sidebar( $widget_select )) {
  if ($windfall_sidebar_position === 'sidebar-hide') {
    $layout_class = 'col-md-12';
    $windfall_sidebar_class = 'hide-sidebar';
  } elseif ($windfall_sidebar_position === 'sidebar-left') {
    $layout_class = 'wndfal-primary';
    $windfall_sidebar_class = 'left-sidebar';
  } else {
    $layout_class = 'wndfal-primary';
    $windfall_sidebar_class = 'right-sidebar';
  }
} else {
  $windfall_sidebar_position = 'sidebar-hide';
  $layout_class = 'col-md-12';
  $windfall_sidebar_class = 'hide-sidebar';
}
?>
<div class="wndfal-mid-wrap mid-spacer-seven <?php echo esc_attr($windfall_content_padding .' '. $windfall_sidebar_class); ?>" style="<?php echo esc_attr($windfall_custom_padding); ?>">
  <div class="container">
    <div class="blog-custom-width">
      <div class="row">
        <?php if ($windfall_sidebar_position === 'sidebar-left' && $windfall_sidebar_position !== 'sidebar-hide') { get_sidebar(); } ?>
        <div class="<?php echo esc_attr($layout_class); ?>">
          <?php if ($windfall_blog_style === 'style-two') { ?>
            <div class="row">
          <?php } else { ?>
            <div class="blog-wrap">
            <?php }
            if ( have_posts() ) :
              /* Start the Loop */
              while ( have_posts() ) : the_post();
                get_template_part( 'layouts/post/content' );
              endwhile;
            else :
              get_template_part( 'layouts/post/content', 'none' );
            endif;
              windfall_default_paging_nav();
              wp_reset_postdata();  // avoid errors further down the page ?>
          </div>
        </div>
        <?php if ($windfall_sidebar_position !== 'sidebar-hide') {  get_sidebar(); } ?>
      </div>
    </div>
  </div>
</div>
<?php }
get_footer();
