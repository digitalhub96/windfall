<?php
/*
 * Text Widget
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  CSF::createSection( $prefix, array(
    'id'    => 'repeater_fields',
    'title' => 'Repeater Fields',
    'icon'  => 'fa fa-clone',
  ) );

  // Accordion Widget
  CSF::createWidget( 'windfall_accordion_widget', array(
    'parent'      => 'repeater_fields',
    'title'       => VTHEME_NAME_P . __( ': Accordion Widget', 'windfall' ),
    'classname'   => 'widget-accordion widget-services',
    'description' => VTHEME_NAME_P . __( ' widget that displays Accordion.', 'windfall' ),
    'fields'      => array(

      array(
        'id'    => 'title',
        'type'  => 'text',
        'title' => 'Title'
      ),
      array(
        'id'    => 'active',
        'type'  => 'text',
        'title' => 'Active Tab'
      ),

      array(
        'id'     => 'opt-repeater-1',
        'type'   => 'repeater',
        'title'  => 'Repeater',
        'fields' => array(
          array(
            'id'    => 'acc_title',
            'type'  => 'text',
            'title' => 'Text'
          ),
          array(
            'id'      => 'content',
            'type'    => 'textarea',
            'title'   => __('Content', 'windfall' ),
            'shortcoder' => 'windfall_vt_shortcodes',
          ),
        ),
      ),

    )

  ) );

  if( ! function_exists( 'windfall_accordion_widget' ) ) {
    function windfall_accordion_widget( $args, $instance ) {

      $title          = apply_filters( 'widget_title', $instance['title'] );
      $repeater_fields    = $instance['opt-repeater-1'];
      $active_tab    = $instance['active'];

      echo $args['before_widget'];
      $output = '';
      if( is_array( $repeater_fields ) && !empty( $repeater_fields ) ){
      $output .= '<div id="accordion" class="accordion">';
        $key = 1;
        foreach ( $repeater_fields as $each_field ) {
          $accordion_title = $each_field['acc_title'];
          $content = $each_field['content'];

          $opened    = ( $key == $active_tab ) ? ' show' : '';
          $collapsed    = ( $key == $active_tab ) ? '' : 'collapsed';
          $uniqtab     = uniqid();

          $output .= '<div class="card'.$opened.'">
                        <div class="card-header" id="headingOne'. esc_attr($key.$uniqtab) .'">
                          <h4 class="accordion-title">
                            <button class="btn btn-link '.$collapsed.'" data-toggle="collapse" data-target="#wndfalAcc-'. esc_attr($key.$uniqtab) .'" aria-expanded="true" aria-controls="wndfalAcc-'. esc_attr($key.$uniqtab) .'">
                              '.$accordion_title .'
                            </button>
                          </h4>
                        </div>
                        <div id="wndfalAcc-'. esc_attr($key.$uniqtab) .'" class="collapse '. $opened .'" aria-labelledby="headingOne" data-parent="#accordion">
                          <div class="card-body">
                            '.do_shortcode($content).'
                          </div>
                        </div>
                      </div>';
          $key++;

        }
        $output .= '</div>';
          echo $output;
      }

      // Display the markup after the widget
      echo $args['after_widget'];

    }
  }

}
