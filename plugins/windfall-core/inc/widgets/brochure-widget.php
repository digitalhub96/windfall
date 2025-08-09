<?php
/*
 * Text Widget
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  // Brochure Widget
  CSF::createWidget( 'windfall_brochure_widget', array(
    'title'       => VTHEME_NAME_P . __( ': Brochure Widget', 'windfall' ),
    'classname'   => 'widget-brochure',
    'description' => VTHEME_NAME_P . __( ' widget that displays Brochure.', 'windfall' ),
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
      ),
      array(
        'id'      => 'btn_txt',
        'type'    => 'text',
        'title'   => __('Button Text', 'windfall' ),
      ),
      array(
        'id'      => 'btn_link',
        'type'    => 'text',
        'title'   => __('Button Link', 'windfall' ),
      ),
    )  

  ) ); 

  if( ! function_exists( 'windfall_brochure_widget' ) ) {
    function windfall_brochure_widget( $args, $instance ) {

      $title          = apply_filters( 'widget_title', $instance['title'] );
      $content    = $instance['content'];
      $btn_txt    = $instance['btn_txt'];
      $btn_link    = $instance['btn_link'];

      echo $args['before_widget'];

      $title = $title ? '<h4 class="brochure-title">'.$title.'</h4>' : '';
      $content = $content ? '<p>'.$content.'</p>' : '';

      $btn = $btn_link ? '<a href="'.$btn_link.'" class="wndfal-btn"><span class="btn-text-wrap"><span class="btn-text"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> '.$btn_txt.'</span></span></a>' : '<span class="wndfal-btn"><span class="btn-text-wrap"><span class="btn-text"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> '.$btn_txt.'</span></span></span>';
      $btn_actual = $btn_txt ? '<div class="wndfal-btns-group">'.$btn.'</div>' : '';
      ?>

      <div class="brochure-wrap">
        <?php echo $title.$content.$btn_actual; ?>
      </div>

      <?php
      // Display the markup after the widget
      echo $args['after_widget'];

    }
  }

}
