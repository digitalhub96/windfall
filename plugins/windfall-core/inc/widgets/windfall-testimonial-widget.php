<?php
/*
 * Text Widget
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Create a widget 1
  //
  CSF::createWidget( 'windfall_testimonial_widget', array(
    'title'       => VTHEME_NAME_P . __( ': Testimonial Widget', 'windfall' ),
    'classname'   => 'widget-testimonials',
    'description' => VTHEME_NAME_P . __( ' widget that displays testimonial carousel.', 'windfall' ),
    'fields'      => array(

      array(
        'id'      => 'title',
        'type'    => 'text',
        'title'   => __('Title', 'windfall' ),
      ),
      array(
        'id'            => 'limit',
        'type'          => 'spinner',
        'title'         => __( 'Testimonial Limit', 'windfall' ),
        'max'           => 100,
        'min'           => -1,
        'step'          => 1,
        'default'       => 5,
      ),
      array(
        'id'            => 'author',
        'type'          => 'switcher',
        'title'         => __( 'Display Author :', 'windfall' ),
        'default'       => false,
      ),
      array(
        'id'    => 'order',
        'type' => 'select',
        'options'   => array(
          'ASC' => 'Ascending',
          'DESC' => 'Descending',
        ),
        'placeholder' => __( 'Select Order', 'windfall' ),
        'title' => __( 'Order :', 'windfall' ),
      ),
      array(
        'id'    => 'orderby',
        'type' => 'select',
        'options'   => array(
          'none' => __('None', 'windfall'),
          'ID' => __('ID', 'windfall'),
          'author' => __('Author', 'windfall'),
          'title' => __('Title', 'windfall'),
          'name' => __('Name', 'windfall'),
          'type' => __('Type', 'windfall'),
          'date' => __('Date', 'windfall'),
          'modified' => __('Modified', 'windfall'),
          'rand' => __('Random', 'windfall'),
        ),
        'placeholder' => __( 'Select OrderBy', 'windfall' ),
        'title' => __( 'OrderBy :', 'windfall' ),
      ),

    )
  ) );
 
  //
  // Front-end display of widget example 1
  // Attention: This function named considering above widget base id.
  //
  if( ! function_exists( 'windfall_testimonial_widget' ) ) {
    function windfall_testimonial_widget( $args, $instance ) {

      $title          = apply_filters( 'widget_title', $instance['title'] );
      $limit          = $instance['limit'];
      $display_author   = $instance['author'];
      $order          = $instance['order'];
      $orderby        = $instance['orderby'];

      // RTL
      if ( is_rtl() ) {
        $switch_rtl = ' data-rtl="true"';
      } else {
        $switch_rtl = ' data-rtl="false"';
      }

      $testi_args = array(
      // other query params here,
      'post_type' => 'testimonial',
      'posts_per_page' => (int)$limit,
      'orderby' => esc_attr($orderby),
      'order' => esc_attr($order),
     );

     $windfall_testi = new WP_Query( $testi_args );
     global $post;

      echo $args['before_widget'];

      if ($windfall_testi->have_posts()) : ?>
      <div class="wndfal-widget widget-testimonials" id="wndfal-widget-placeholder-3">
      <?php if ( ! empty( $title ) ) { ?>
        <h4 class="widget-testimonials-title"><?php echo $title; ?></h4>
      <?php } ?>
      <div class="widget-testimonials-info">
        <div class="owl-carousel" data-items="1" data-margin="0" data-loop="true" data-nav="false" data-dots="true" data-autoplay="true" <?php echo $switch_rtl; ?>>
          <?php
          while ($windfall_testi->have_posts()) : $windfall_testi->the_post();
            // Featured Image
            $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
            $windfall_alt = get_post_meta( get_post_thumbnail_id(get_the_ID()), '_wp_attachment_image_alt', true);
            $large_image = $large_image[0];

            $testimonial_options = get_post_meta( get_the_ID(), 'windfall_csf_meta_options_testi', true );
            $testi_position = $testimonial_options['testi_position'];
            $testi_stars = $testimonial_options['testi_rating'];

            if(function_exists('windfall_secure_resize')) {
              $testi_img = windfall_secure_resize( $large_image, '89', '87', true );
            } else {$testi_img = $large_image;}
            $testi_img_actual = ( $testi_img ) ? $testi_img : $large_image;
          ?>

            <div class="item">
              <p><?php the_excerpt(); ?></p>
              <?php if($display_author){ ?>
                <div class="widget-author">
                  <?php if($large_image) { ?>
                    <div class="wndfal-image"><img src="<?php echo esc_url($testi_img_actual); ?>" alt="<?php echo esc_attr($windfall_alt); ?>"></div>
                  <?php } ?>
                  <div class="widget-author-info">
                  <h6 class="widget-author-name"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(get_the_title()); ?></a> <span><?php echo esc_html($testi_position); ?></span></h6>
                    <div class="author-rating">
                      <?php 
                      if($testi_stars){
                        for( $i=1; $i<= $testi_stars; $i++) {
                          echo '<i class="fa fa-star active" aria-hidden="true"></i>';
                        } 
                        for( $i=5; $i > $testi_stars; $i--) {
                          echo '<i class="fa fa-star" aria-hidden="true"></i>';
                        }
                      } ?>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>

          <?php
          endwhile;?>
          </div>
          </div>
          </div>
          <?php
          endif;
          wp_reset_postdata();

      echo $args['after_widget'];

    }
  }

}
