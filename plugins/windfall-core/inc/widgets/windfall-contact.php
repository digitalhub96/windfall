<?php
/*
 * Text Widget
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  // Contact Widget
  CSF::createWidget( 'windfall_contact_widget', array(
    'title'       => VTHEME_NAME_P . __( ': Contact Widget', 'windfall' ),
    'classname'   => 'wndfal-contact-widget widget-contact',
    'description' => VTHEME_NAME_P . __( ' widget that displays Contact.', 'windfall' ),
    'fields'      => array(

      array(
        'id'      => 'title',
        'type'    => 'text',
        'title'   => __('Title', 'windfall' ),
      ),
      array(
        'id'      => 'bg_img',
        'type'    => 'upload',
        'title'   => __('Background Image', 'windfall' ),
      ),
      array(
        'id'      => 'icon_img',
        'type'    => 'icon',
        'title'   => __('Icon Image', 'windfall' ),
      ),
      array(
        'id'      => 'cal_text',
        'type'    => 'text',
        'title'   => __('Call Text', 'windfall' ),
      ),
      array(
        'id'      => 'phone',
        'type'    => 'text',
        'title'   => __('Phone Number', 'windfall' ),
      ),
      array(
        'id'      => 'phone_link',
        'type'    => 'text',
        'title'   => __('Phone Link', 'windfall' ),
      ),
      array(
        'id'      => 'mail_id',
        'type'    => 'text',
        'title'   => __('Mail ID', 'windfall' ),
      ),
      array(
        'id'      => 'mail_id_link',
        'type'    => 'text',
        'title'   => __('Mail Link', 'windfall' ),
      ),
      array(
        'id'      => 'content',
        'type'    => 'textarea',
        'title'   => __('Address', 'windfall' ),
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

  if( ! function_exists( 'windfall_contact_widget' ) ) {
    function windfall_contact_widget( $args, $instance ) {

      $title          = apply_filters( 'widget_title', $instance['title'] );
      $content    = $instance['content'];
      $image    = $instance['bg_img'];
      $icon_img = $instance['icon_img'];
      $cal_text   = $instance['cal_text'];
      $phone   = $instance['phone'];
      $phone_link   = $instance['phone_link'];
      $mail_id   = $instance['mail_id'];
      $mail_id_link = $instance['mail_id_link'];
      $btn_txt    = $instance['btn_txt'];
      $btn_link   = $instance['btn_link'];

      echo $args['before_widget'];

      $title_actual = $title ? '<h3 class="widget-contact-title">'.$title.'</h3>' : '';
      $content = $content ? '<li>'.$content.'</li>' : '';

      // BG Image
      if(function_exists('windfall_secure_resize')) {
        $contct_img = windfall_secure_resize( $image, '265', '341', true );
      } else {$contct_img = $image;}
      $contact_img = ( $contct_img ) ? $contct_img : WINDFALL_IMAGES . '/holders/265x341.png';

      $image_bg = $image ? '<img src="'.esc_url($contact_img).'" alt="'.$title.'">' : '';
      // Icon
      $icon = $icon_img ? '<i class="'.$icon_img.'"></i>' : '<i class="ti-user"></i>';

      // Mail Id
      $mail = $mail_id_link ? '<li><a href="'.$mail_id_link.'">'.$mail_id.'</a></li>' : '<li><span>'.$mail_id.'</span></li>';
      $mail_actual = $mail_id ? $mail : '';
      // Phone
      $phone_no = $phone_link ? '<li>'.$cal_text.' <a href="'.$phone_link.'">'.$phone.'</a></li>' : '<li>'.$cal_text.' <span>'.$phone.'</span></li>';
      $phone_actual = $phone ? $phone_no : '';

      $btn = $btn_link ? '<a href="'.$btn_link.'" class="widget-contact-link">'.$btn_txt.'</a>' : '<a href="#0" class="widget-contact-link">'.$btn_txt.'</a>';
      $btn_actual = $btn_txt ? $btn : '';

      ?>

      <div class="wndfal-image">
        <?php echo $image_bg; ?>
        <div class="widget-contact-info">
          <div class="wndfal-icon"><?php echo $icon; ?></div>
          <?php echo $title_actual; ?>
          <ul>
            <?php echo $phone_actual.$mail_actual.$content; ?>
          </ul>
          <?php echo $btn_actual; ?>
        </div>
      </div>

      <?php
      // Display the markup after the widget
      echo $args['after_widget'];

    }
  }

}
