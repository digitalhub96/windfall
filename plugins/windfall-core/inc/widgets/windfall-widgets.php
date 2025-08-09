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
  CSF::createWidget( 'windfall_recent_posts', array(
    'title'       => VTHEME_NAME_P . __( ': Latest Posts', 'windfall' ),
    'classname'   => 'latest-blog-widget',
    'description' => VTHEME_NAME_P . __( ' widget that displays recent posts.', 'windfall' ),
    'fields'      => array(

      array(
        'id'      => 'title',
        'type'    => 'text',
        'title'   => __('Title', 'windfall' ),
      ),
      array(
        'id'             => 'ptypes',
        'type'           => 'select',
        'options'        => 'post_types',
        'title'          => __( 'Post Type :', 'windfall' ),
        'placeholder'    => __('Select Post Type', 'windfall'),
      ),
      array(
        'id'            => 'limit',
        'type'          => 'spinner',
        'title'         => __( 'Webinars Limit', 'windfall' ),
        'max'           => 100,
        'min'           => -1,
        'step'          => 1,
        'default'       => 5,
      ),
      array(
        'id'            => 'date',
        'type'          => 'switcher',
        'title'         => __( 'Display Date :', 'windfall' ),
        'default'       => false,
      ),
      array(
        'id'      => 'date_format',
        'type'    => 'text',
        'title'   => __('Date Format :', 'windfall' ),
        'desc'    => __( "Enter date format (for more info <a href='https://codex.wordpress.org/Formatting_Date_and_Time' target='_blank'>click here</a>).", 'windfall')
      ),
      array(
        'id'    => 'category',
        'type'  => 'text',
        'title' => __( 'Category :', 'windfall' ),
        'desc'  => __( 'Enter category slugs with comma(,) for multiple items', 'windfall' ),
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
  if( ! function_exists( 'windfall_recent_posts' ) ) {
    function windfall_recent_posts( $args, $instance ) {

      $title          = apply_filters( 'widget_title', $instance['title'] );
      $ptypes         = $instance['ptypes'];
      $limit          = $instance['limit'];
      $display_date   = $instance['date'];
      $display_date_format = $instance['date_format'];
      $category       = $instance['category'];
      $order          = $instance['order'];
      $orderby        = $instance['orderby'];

      $post_args = array(
      // other query params here,
      'post_type' => esc_attr($ptypes),
      'posts_per_page' => (int)$limit,
      'orderby' => esc_attr($orderby),
      'order' => esc_attr($order),
      'category_name' => esc_attr($category),
      'ignore_sticky_posts' => 1,
     );

     $windfall_rpw = new WP_Query( $post_args );
     global $post;

      echo $args['before_widget'];

      if ( ! empty( $title ) ) {
        echo $args['before_title'] . $title . $args['after_title'];
      }
      $display_date_format = $display_date_format ? $display_date_format : '';

      if ($windfall_rpw->have_posts()) :
      while ($windfall_rpw->have_posts()) : $windfall_rpw->the_post();
      ?>

      <div class="post-item">
        <h5 class="post-title"><a href="<?php esc_url(the_permalink()) ?>"><?php the_title(); ?></a></h5>
        <?php if ($display_date === '1') { ?>
        <div class="post-date"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo get_the_date($display_date_format); ?></div>
        <?php } ?>
      </div>
      <?php
      endwhile;
      endif;
      wp_reset_postdata();

      echo $args['after_widget'];

    }
  }

}
