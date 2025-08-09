<?php

if (!function_exists('windfall_gallery_ajax_scripts')) {
  function windfall_gallery_ajax_scripts() {
    wp_enqueue_script( 'windfall-more-cat-post', WINDFALL_SCRIPTS . '/load-more-gallery.js', array( 'jquery' ), WINDFALL_VERSION, false );
    $windfall_admin_url = array(
      'ajaxurl' => admin_url('admin-ajax.php'),
      'olderpost' => (cs_get_option('older_post')) ? : esc_html__( 'Prev', 'windfall' ),
      'newerpost' => (cs_get_option('newer_post')) ? : esc_html__( 'Next', 'windfall' ),
    );
    wp_localize_script( 'windfall-more-cat-post', 'windfall_admin_url', $windfall_admin_url );
  }
  add_action('wp_enqueue_scripts', 'windfall_gallery_ajax_scripts');
}

if (!function_exists('windfall_gallery_ajax')) {
  function windfall_gallery_ajax(){

    $cat     = (isset($_POST['cat'])) ? $_POST['cat'] : '';
    $items   = (isset($_POST['limit'])) ? $_POST['limit'] : '3';
    $gallery_cap_style = (isset($_POST['caption'])) ? $_POST['caption'] : 'without';
    $windfall_gallery_style   = (isset($_POST['style'])) ? $_POST['style'] : 'one';

    if (!$items) {
      $ppp = 5;
    } else {
      $ppp = $items;
    }

    $args = array(
      'post_type'       => 'gallery',
      'posts_per_page'  => $items,
      'gallery_category'   => $cat,
      'post_status'     => 'publish',
    );

    $cat_query = new WP_Query($args);
    // RTL
    if ( is_rtl() ) {
      $switch_rtl = ' true';
    } else {
      $switch_rtl = ' false';
    } ?>
    <div class="gallery-posts-wrapper crmny-galry-data">
    <?php

      if ($cat_query->have_posts()) : while ($cat_query->have_posts()) : $cat_query->the_post();

        if($windfall_gallery_style === 'two') {
          // Featured Image
          $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
          $large_image = $large_image[0];
          $alt = get_post_meta(get_post_thumbnail_id(get_the_ID()), '_wp_attachment_image_alt', true);
          if(!$hide_resizer) {
            if(function_exists('windfall_secure_resize')) {
              $galry_img = windfall_secure_resize( $large_image, '380', '317', true );
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
          if(!$hide_resizer) {
            if(function_exists('windfall_secure_resize')) {
              $galry_img = windfall_secure_resize( $large_image, '370', '260', true );
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
          }

          // Link Post
          $link_post = $link_post ? $link_post : get_the_permalink();
          ?>
          <div class="masonry-item <?php echo esc_attr($cat_class ); ?>" data-category="<?php echo esc_attr($cat_class ); ?>">
            <?php if ( $gallery_type == 'gallery' ) { ?>
            <div class="gallery-item">
              <div class="owl-carousel" data-items="1" data-margin="0" data-loop="true" data-nav="true" data-dots="true" data-autoplay="true" data-rtl="<?php echo esc_attr($switch_rtl); ?>">
                <?php $images = explode( ',', $gallery_post_format );
                foreach ($images as $imagee) {
                  $image = wp_get_attachment_image_src( $imagee, 'full' );
                  $image_alt = get_post_meta($imagee, '_wp_attachment_image_alt', true);
                  $g_img = $image[0];
                  if(!$hide_resizer) {
                    if(function_exists('windfall_secure_resize')) {
                      $slider_img = windfall_secure_resize( $g_img, '370', '260', true );
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
              <?php if($gallery_cap_style === 'with') { ?>
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
              <a href="<?php echo esc_url($video_post); ?>" id="myUrl" class="wndfal-popup-video">
                <div class="wndfal-image">
                  <img src="<?php echo esc_url( $featured_img ); ?>" alt="<?php the_title_attribute(); ?>" />
                  <div class="play-btn-wrap">
                    <div class="wndfal-table-wrap">
                      <div class="wndfal-align-wrap">
                        <div class="play-btn">
                          <i class="fa fa-play" aria-hidden="true"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </a>
                <?php if($gallery_cap_style === 'with') { ?>
                  <h5 class="gallery-title"><?php echo get_the_title(); ?></h5>
                <?php } ?>
              </div>

            <?php } elseif( $gallery_type == 'link' ) { ?>
              <div class="gallery-item">
                <div class="wndfal-image">
                  <img src="<?php echo esc_url($featured_img); ?>" alt="<?php the_title_attribute(); ?>">
                          <div class="wndfal-popup">
                  <a href="<?php echo esc_url($large_image); ?>">
                    <div class="gallery-info">
                      <div class="wndfal-table-wrap">
                        <div class="wndfal-align-wrap">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </div>
                      </div>
                    </div>
                  </a>
                          </div>
                </div>
                <?php if($gallery_cap_style === 'with') { ?>
                  <h5 class="gallery-title"><a href="<?php echo esc_url($link_post); ?>"><?php echo get_the_title(); ?></a></h5>
                <?php } ?>
              </div>
            <?php } else { ?>
              <div class="gallery-item">
                <div class="wndfal-image">
                  <img src="<?php echo esc_url($featured_img); ?>" alt="<?php the_title_attribute(); ?>">
                          <div class="wndfal-popup">
                  <a href="<?php echo esc_url($large_image); ?>">
                    <div class="gallery-info">
                      <div class="wndfal-table-wrap">
                        <div class="wndfal-align-wrap">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                </div>
                <?php if($gallery_cap_style === 'with') { ?>
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
     <?php
     $max_products = $cat_query->max_num_pages;
     $total_products = $cat_query->found_posts;
      if ($ppp < $total_products) {
        echo '<nav class="wndfal-pagination wndfal-ajax-pagi"><ul class="page-numbers ajax-page-numbers">';
          for ($i=1; $i <= $max_products; $i++) {
            $current = ($i == 1) ? 'current disabled-click' : '';
            echo '<li><a data-page="'.esc_attr($i).'" data-cat="'.esc_attr($cat).'" data-limit="'.esc_attr($items).'" class="page-numbers '.esc_attr($current).'" href="#">'.esc_html($i).'</a></li>';
          }
          if ($ppp < $total_products) { echo '<li class="last update-item"><a class="next page-numbers" data-limit="'.esc_attr($items).'" data-cat="'.esc_attr($cat).'" data-page="2" href="#">'.esc_url($windfall_admin_url).esc_html($newerpost).' <i class="fa fa-angle-right"></i></a></li>'; }
        echo '</ul></nav>';
      } ?>
     <?php wp_die();
  }
}
add_action('wp_ajax_nopriv_windfall_gallery_ajax', 'windfall_gallery_ajax');
add_action('wp_ajax_windfall_gallery_ajax', 'windfall_gallery_ajax');

if (!function_exists('windfall_more_gallery_ajax_pagi')) {
  function windfall_more_gallery_ajax_pagi(){
    $cat     = (isset($_POST['cat'])) ? $_POST['cat'] : '';
    $items   = (isset($_POST['limit'])) ? $_POST['limit'] : '3';
    $gallery_cap_style = $_POST['caption'] ? $_POST['caption'] : 'without';
    $windfall_gallery_style   = (isset($_POST['style'])) ? $_POST['style'] : 'one';

    if (!$items) {
      $ppp = 5;
    } else {
      $ppp = $items;
    }

    $cat     = (isset($_POST['cat'])) ? $_POST['cat'] : '';
    $offset  = (isset($_POST['offset'])) ? $_POST['offset'] : 0;
    if ($offset > 1) {
      $offset  = ($offset - 1) * $ppp;
    } else {
      $offset  = 0;
    }

    $args = array(
      'post_type'      => 'gallery',
      'posts_per_page' => $ppp,
      'offset'         => $offset
    );
    if ($cat) {
      $args['tax_query'] = array(
        array(
          'taxonomy' => 'gallery_category',
          'field'    => 'slug',
          'terms'    => $cat,
        ),
      );
    }

    $cat_query = new WP_Query($args);
    // RTL
    if ( is_rtl() ) {
      $switch_rtl = ' true';
    } else {
      $switch_rtl = ' false';
    } ?>
    <div class="gallery-posts-wrapper crmny-galry-data">
    <?php

      if ($cat_query->have_posts()) : while ($cat_query->have_posts()) : $cat_query->the_post();

        if($windfall_gallery_style === 'two') {
          // Featured Image
          $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
          $large_image = $large_image[0];
          $alt = get_post_meta(get_post_thumbnail_id(get_the_ID()), '_wp_attachment_image_alt', true);
          if(!$hide_resizer) {
            if(function_exists('windfall_secure_resize')) {
              $galry_img = windfall_secure_resize( $large_image, '380', '317', true );
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
          if(!$hide_resizer) {
            if(function_exists('windfall_secure_resize')) {
              $galry_img = windfall_secure_resize( $large_image, '370', '260', true );
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
          }

          // Link Post
          $link_post = $link_post ? $link_post : get_the_permalink();
          ?>
          <div class="masonry-item <?php echo esc_attr($cat_class ); ?>" data-category="<?php echo esc_attr($cat_class ); ?>">
            <?php if ( $gallery_type == 'gallery' ) { ?>
            <div class="gallery-item">
              <div class="owl-carousel" data-items="1" data-margin="0" data-loop="true" data-nav="true" data-dots="true" data-autoplay="true" data-rtl="<?php echo esc_attr($switch_rtl); ?>">
                <?php $images = explode( ',', $gallery_post_format );
                foreach ($images as $imagee) {
                  $image = wp_get_attachment_image_src( $imagee, 'full' );
                  $image_alt = get_post_meta($imagee, '_wp_attachment_image_alt', true);
                  $g_img = $image[0];
                  if(!$hide_resizer) {
                    if(function_exists('windfall_secure_resize')) {
                      $slider_img = windfall_secure_resize( $g_img, '370', '260', true );
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
              <?php if($gallery_cap_style === 'with') { ?>
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
              <a href="<?php echo esc_url($video_post); ?>" id="myUrl" class="wndfal-popup-video">
                <div class="wndfal-image">
                  <img src="<?php echo esc_url( $featured_img ); ?>" alt="<?php the_title_attribute(); ?>" />
                  <div class="play-btn-wrap">
                    <div class="wndfal-table-wrap">
                      <div class="wndfal-align-wrap">
                        <div class="play-btn">
                          <i class="fa fa-play" aria-hidden="true"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </a>
                <?php if($gallery_cap_style === 'with') { ?>
                  <h5 class="gallery-title"><?php echo get_the_title(); ?></h5>
                <?php } ?>
              </div>

            <?php } elseif( $gallery_type == 'link' ) { ?>
              <div class="gallery-item">
                <div class="wndfal-image">
                  <img src="<?php echo esc_url($featured_img); ?>" alt="<?php the_title_attribute(); ?>">
                          <div class="wndfal-popup">
                  <a href="<?php echo esc_url($large_image); ?>">
                    <div class="gallery-info">
                      <div class="wndfal-table-wrap">
                        <div class="wndfal-align-wrap">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                </div>
                <?php if($gallery_cap_style === 'with') { ?>
                  <h5 class="gallery-title"><a href="<?php echo esc_url($link_post); ?>"><?php echo get_the_title(); ?></a></h5>
                <?php } ?>
              </div>
            <?php } else { ?>
              <div class="gallery-item">
                <div class="wndfal-image">
                  <img src="<?php echo esc_url($featured_img); ?>" alt="<?php the_title_attribute(); ?>">
                          <div class="wndfal-popup">
                  <a href="<?php echo esc_url($large_image); ?>">
                    <div class="gallery-info">
                      <div class="wndfal-table-wrap">
                        <div class="wndfal-align-wrap">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                </div>
                <?php if($gallery_cap_style === 'with') { ?>
                  <h5 class="gallery-title"><?php echo get_the_title(); ?></h5>
                <?php } ?>
              </div>
            <?php } ?>
          </div>
        <?php }
          endwhile;
          endif; ?>
          </div>
    <?php
     $max_products = $cat_query->max_num_pages;
     $total_products = $cat_query->found_posts;
      if ($ppp < $total_products) {
        echo '<nav class="wndfal-pagination wndfal-ajax-pagi"><ul class="page-numbers ajax-page-numbers">';
          for ($i=1; $i <= $max_products; $i++) {
            echo '<li><a data-page="'.esc_attr($i).'" data-limit="'.esc_attr($items).'" data-cat="'.esc_attr($cat).'" class="page-numbers" href="#">'.esc_html($i).'</a></li>';
          }
          if ($ppp < $total_products) { echo '<li class="last update-item"><a class="next page-numbers" data-limit="'.esc_attr($items).'" data-cat="'.esc_attr($cat).'" data-page="2" href="#">'.esc_url($windfall_admin_url).esc_html($newerpost).' <i class="fa fa-angle-right"></i></a></li>'; }
        echo '</ul></nav>';
      } ?>
     <?php wp_die();
  }
}
add_action('wp_ajax_nopriv_windfall_more_gallery_ajax_pagi', 'windfall_more_gallery_ajax_pagi');
add_action('wp_ajax_windfall_more_gallery_ajax_pagi', 'windfall_more_gallery_ajax_pagi');
