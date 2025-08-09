<?php
/*
 * Text Widget
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  // Windfall Text Widget
  CSF::createWidget( 'windfall_text_widget', array(
    'title'       => VTHEME_NAME_P . __( ': Text Widget', 'windfall' ),
    'classname'   => 'wndfal-text-widget',
    'description' => VTHEME_NAME_P . __( ' widget that displays contents.', 'windfall' ),
    'fields'      => array(

      array(
        'id'      => 'title',
        'type'    => 'text',
        'title'   => __('Title', 'windfall' ),
      ),
      array(
        'id'      => 'content',
        'type'    => 'textarea',
        'title'   => __('Content', 'windfall' ),
        'shortcoder' => 'windfall_vt_shortcodes',
      ),
    )  

  ) ); 

  //
  // Front-end display of Text widget
  // Attention: This function named considering above widget base id.
  //
  if( ! function_exists( 'windfall_text_widget' ) ) {
    function windfall_text_widget( $args, $instance ) {

      $title          = apply_filters( 'widget_title', $instance['title'] );
      $content    = strip_tags( stripslashes( $instance['content'] ), '<p><a><br>' );

      echo $args['before_widget'];

      if ( ! empty( $title ) ) {
        echo $args['before_title'] . $title . $args['after_title'];
      }

      echo do_shortcode($content);

      // Display the markup after the widget
      echo $args['after_widget'];

    }
  }

}
