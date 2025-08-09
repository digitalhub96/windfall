<?php
/*
 * Text Widget
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  CSF::createSection( $prefix, array(
    'id'    => 'intro_repeater_fields',
    'title' => 'Intro Repeater Fields',
    'icon'  => 'fa fa-clone',
  ) );

  // Intro Widget
  CSF::createWidget( 'windfall_intro_widget', array(
    'parent'      => 'intro_repeater_fields',
    'title'       => VTHEME_NAME_P . __( ': Intro Widget(Above Footer)', 'windfall' ),
    'classname'   => 'widget-intro',
    'description' => VTHEME_NAME_P . __( ' widget that displays Intro items.', 'windfall' ),
    'fields'      => array(

      array(
        'id'    => 'title',
        'type'  => 'text',
        'title' => 'Title'
      ),

      array(
        'id'     => 'intro-repeater',
        'type'   => 'repeater',
        'title'  => 'Repeater',
        'fields' => array(
          array(
            'id'    => 'intro_title',
            'type'  => 'text',
            'title' => 'Text'
          ),
          array(
            'id'      => 'intro_link',
            'type'    => 'text',
            'title'   => __('Link', 'windfall' ),
          ),
          array(
            'id'      => 'icon_img',
            'type'    => 'icon',
            'title'   => __('Icon Image', 'windfall' ),
          ),
        ),
      ),

    )  

  ) ); 

  if( ! function_exists( 'windfall_intro_widget' ) ) {
    function windfall_intro_widget( $args, $instance ) {

      $title          = apply_filters( 'widget_title', $instance['title'] );
      $repeater_fields    = $instance['intro-repeater'];
      
      echo $args['before_widget'];
      $output = '';
      $output .= '<div class="wndfal-intro"><div class="container"><div class="row align-items-center">';
      if( is_array( $repeater_fields ) && !empty( $repeater_fields ) ){
        foreach ( $repeater_fields as $each_field ) {
          $intro_title = $each_field['intro_title'];
          $link = $each_field['intro_link'];
          $icon = $each_field['icon_img'];

          $intro_icon = $icon ? '<span class="wndfal-icon"><i class="'.$icon.'" aria-hidden="true"></i></span>' : '';
          $title = $intro_title ? '<span class="intro-title">'.$intro_title.'</span>' : '';

          if ($link) {
            $output .= '<div class="col-lg-4"><a href="'. $link .'" class="intro-item">'.$intro_icon.$title.'</a></div>';
          } else {
            $output .= '<div class="col-lg-4"><div class="intro-item">'.$intro_icon.$title.'</div></div>';
          }

          
      }
    }
      $output .= '</div></div></div>';
      echo $output;
      // Display the markup after the widget
      echo $args['after_widget'];
  }

}
}
