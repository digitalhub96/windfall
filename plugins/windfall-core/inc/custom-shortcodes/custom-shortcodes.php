<?php
/* Topbar Shortcodes */

/* Free Trial */
function windfall_free_trial_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "custom_class" => '',
    "text_size" => '',
    "text_color" => '',
    "btn_text_size" => '',
    "bt_color" => '',
    "bt_hover" => '',
    "bt_bg_color" => '',
    "bt_bg_hover" => '',
    "get_icon" => '',
    "get_text" => '',
    "btn_text" => '',
    "btn_link" => '',
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $text_size || $text_color ) {
    $inline_style .= '.wndfal-trial-'. $e_uniqid .'.free-trial span {';
    $inline_style .= ( $text_size ) ? 'font-size:'. windfall_core_check_px($text_size) .';' : '';
    $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
    $inline_style .= '}';
  }
  // Btn Colors & Size
  if ( $btn_text_size || $bt_color || $bt_bg_color ) {
    $inline_style .= '.wndfal-trial-'. $e_uniqid .'.free-trial .wndfal-label {';
    $inline_style .= ( $btn_text_size ) ? 'font-size:'. windfall_core_check_px($btn_text_size) .';' : '';
    $inline_style .= ( $bt_color ) ? 'color:'. $bt_color .';' : '';
    $inline_style .= ( $bt_bg_color ) ? 'background-color:'. $bt_bg_color .';' : '';
    $inline_style .= '}';
  }
  // Btn Colors & Size
  if ( $bt_hover || $bt_bg_hover ) {
    $inline_style .= '.wndfal-trial-'. $e_uniqid .'.free-trial .wndfal-label:hover {';
    $inline_style .= ( $bt_hover ) ? 'color:'. $bt_hover .';' : '';
    $inline_style .= ( $bt_bg_hover ) ? 'background-color:'. $bt_bg_hover .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' wndfal-trial-'. $e_uniqid;

  $result = '<div class="free-trial '.$custom_class.$styled_class.'">
              <span class="trial-label"><i class="'.$get_icon.'" aria-hidden="true"></i>'. $get_text .'</span>
              <a href="'. $btn_link .'" class="wndfal-label">'. $btn_text .'</a>
            </div>';
  return $result;
}
add_shortcode("windfall_free_trial", "windfall_free_trial_function");

/* Lists */
function windfall_lists_function($atts, $content = true) {
   extract(shortcode_atts(array(
      "custom_class" => '',
   ), $atts));

   $result = '<ul class="bullet-list '. $custom_class .'">'. do_shortcode($content) .'</ul>';
   return $result;

}
add_shortcode("windfall_lists", "windfall_lists_function");

/* List */
function windfall_list_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "title" => '',
      "link" => '',
   ), $atts));
   $title_link = $link ? '<a href="'.$link.'">'.$title.'</a>' : $title;
   $menu_title = $title ? '<li>'.$title_link.'</li>' : '';

   $result = $menu_title;
   return $result;

}
add_shortcode("windfall_list", "windfall_list_function");

/* Socials */
function windfall_socials_function($atts, $content = true) {
   extract(shortcode_atts(array(
      "custom_class" => '',
      "title" => '',
      "title_size" => '',
      "title_color" => '',
      "icon_size" => '',
      "icon_color" => '',
      "icon_hover_color" => '',
   ), $atts));

   // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $title_size || $title_color ) {
    $inline_style .= '.wndfal-social-'. $e_uniqid .' .social-label {';
    $inline_style .= ( $title_size ) ? 'font-size:'. windfall_core_check_px($title_size) .';' : '';
    $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
    $inline_style .= '}';
  }
  // Btn Colors & Size
  if ( $icon_size || $icon_color ) {
    $inline_style .= '.wndfal-social-'. $e_uniqid .'.wndfal-social a {';
    $inline_style .= ( $icon_size ) ? 'font-size:'. windfall_core_check_px($icon_size) .';' : '';
    $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
    $inline_style .= '}';
  }
  if ( $icon_hover_color ) {
    $inline_style .= '.wndfal-social-'. $e_uniqid .'.wndfal-social a:hover {';
    $inline_style .= ( $icon_hover_color ) ? 'color:'. $icon_hover_color .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' wndfal-social-'. $e_uniqid;

  $title = $title ? '<span class="social-label">'.$title.'</span>' : '';

  $result = '<div class="wndfal-social '. $custom_class .$styled_class.'">'.$title. do_shortcode($content) .'</div>';
   return $result;

}
add_shortcode("windfall_socials", "windfall_socials_function");

/* Social */
function windfall_social_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "social_icon" => '',
      "icon_link" => '',
   ), $atts));

   $icon = $social_icon ? '<a href="'.$icon_link.'"><i class="'.$social_icon.'" aria-hidden="true"></i></a>' : '';

   $result = $icon;
   return $result;

}
add_shortcode("windfall_social", "windfall_social_function");

/* Header Button */
function windfall_header_button_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "custom_class" => '',
    "btn_text_size" => '',
    "bt_color" => '',
    "bt_hover" => '',
    "bt_bg_color" => '',
    "bt_bg_hover" => '',
    "bt_border_hover" => '',
    "get_icon" => '',
    "get_text" => '',
    "btn_text" => '',
    "btn_link" => '',
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $btn_text_size || $bt_color ) {
    $inline_style .= '.wndfal-btn-'. $e_uniqid .' .wndfal-btn {';
    $inline_style .= ( $btn_text_size ) ? 'font-size:'. windfall_core_check_px($btn_text_size) .';' : '';
    $inline_style .= ( $bt_color ) ? 'color:'. $bt_color .';' : '';
    $inline_style .= '}';
  }
  // Btn Colors & Size
  if ($bt_bg_color ) {
    $inline_style .= '.wndfal-btn-'. $e_uniqid .' .wndfal-btn .btn-text-wrap, .wndfal-btn-'. $e_uniqid .' .wndfal-btn {';
    $inline_style .= ( $bt_bg_color ) ? 'background-color:'. $bt_bg_color .';' : '';
    $inline_style .= '}';
  }
  // Button Hover
  if ($bt_hover ) {
    $inline_style .= '.wndfal-btn-'. $e_uniqid .' .wndfal-btn:hover {';
    $inline_style .= ( $bt_hover ) ? 'color:'. $bt_hover .';' : '';
    $inline_style .= '}';
  }
  if ($bt_bg_hover ) {
    $inline_style .= '.wndfal-btn-'. $e_uniqid .' .wndfal-btn:hover .btn-text-wrap, .wndfal-btn-'. $e_uniqid .' .wndfal-btn:hover {';
    $inline_style .= ( $bt_hover ) ? 'color:'. $bt_hover .';' : '';
    $inline_style .= ( $bt_bg_hover ) ? 'background-color:'. $bt_bg_hover .';' : '';
    $inline_style .= '}';
  }
  if($bt_border_hover) {
    $inline_style .= '.wndfal-btn-'. $e_uniqid .' .wndfal-btn:hover .btn-text-wrap:before, .wndfal-btn-'. $e_uniqid .' .wndfal-btn:hover .btn-text-wrap:after, .wndfal-btn-'. $e_uniqid .' .wndfal-btn:before, .wndfal-btn-'. $e_uniqid .' .wndfal-btn:after{';
    $inline_style .= ( $bt_border_hover ) ? 'background-color:'. $bt_border_hover .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' wndfal-btn-'. $e_uniqid;

  $button = $btn_link ? '<a href="'.$btn_link.'" class="wndfal-btn"><span class="btn-text-wrap"><span class="btn-text">'. $btn_text .'</span></span></a>' : '<span class="wndfal-btn"><span class="btn-text-wrap"><span class="btn-text">'. $btn_text .'</span></span></span>';
  $button_actual = $btn_text ? '<div class="header-btn '.$custom_class.$styled_class.'">'.$button.'</div>' : '';

  $result = $button_actual;
  return $result;
}
add_shortcode("windfall_header_button", "windfall_header_button_function");

/* Header Address/Contact Info */
function windfall_header_address_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "custom_class" => '',
    "icon_size" => '',
    "icon_color" => '',
    "text_size" => '',
    "txt_color" => '',
    "link_text_size" => '',
    "link_txt_color" => '',
    "link_txt_hover" => '',
    "image_type" => '',
    "contact_image" => '',
    "contact_icon" => '',
    "main_text" => '',
    "link_text" => '',
    "link" => '',
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $icon_size || $icon_color ) {
    $inline_style .= '.wndfal-address-'. $e_uniqid .'.header-contact .wndfal-icon i {';
    $inline_style .= ( $icon_size ) ? 'font-size:'. windfall_core_check_px($icon_size) .';' : '';
    $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
    $inline_style .= '}';
  }
  if ( $text_size || $txt_color ) {
    $inline_style .= '.wndfal-address-'. $e_uniqid .'.header-contact .header-contact-info {';
    $inline_style .= ( $text_size ) ? 'font-size:'. windfall_core_check_px($text_size) .';' : '';
    $inline_style .= ( $txt_color ) ? 'color:'. $txt_color .';' : '';
    $inline_style .= '}';
  }
  if ( $link_text_size || $link_txt_color ) {
    $inline_style .= '.wndfal-address-'. $e_uniqid .'.header-contact .header-contact-info a, .wndfal-address-'. $e_uniqid .'.header-contact .header-contact-info span {';
    $inline_style .= ( $link_text_size ) ? 'font-size:'. windfall_core_check_px($link_text_size) .';' : '';
    $inline_style .= ( $link_txt_color ) ? 'color:'. $link_txt_color .';' : '';
    $inline_style .= '}';
  }
  if ($link_txt_hover ) {
    $inline_style .= '.wndfal-address-'. $e_uniqid .'.header-contact .header-contact-info a:hover {';
    $inline_style .= ( $link_txt_hover ) ? 'color:'. $link_txt_hover .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' wndfal-address-'. $e_uniqid;

  $main_text = $main_text ? $main_text : '';
  $link_txt = $link ? '<a href="'.$link.'">'.$link_text.'</a>' : '<span>'.$link_text.'</span>';
  $link_text_actual = $link_text ? $link_txt : '';
  $alt_text = get_post_meta($contact_image, '_wp_attachment_image_alt', true);

  if($image_type === 'icon') {
    $image_actual = $contact_icon ? '<i class="'.$contact_icon.'"></i>' : '';
  } else {
    $image_actual = ($contact_image) ? '<img src="'. $contact_image .'" alt="'.esc_attr($alt_text).'"  width="22">' : '';
  }

  $address_info = '<div class="header-contact '.$custom_class.$styled_class.'">
  <div class="wndfal-icon">
    '.$image_actual.'
  </div>
  <div class="header-contact-info">
    '.$main_text.$link_text_actual.'
  </div>
</div>';

  $result = $address_info;
  return $result;
}
add_shortcode("windfall_header_address", "windfall_header_address_function");

/* Footer Address/Contact Info */
function windfall_footer_address_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "custom_class" => '',
    "text_size" => '',
    "txt_color" => '',
    "link_text_size" => '',
    "link_txt_color" => '',
    "link_txt_hover" => '',
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $text_size || $txt_color ) {
    $inline_style .= '.wndfal-footer-address-'. $e_uniqid .'.header-contact {';
    $inline_style .= ( $text_size ) ? 'font-size:'. windfall_core_check_px($text_size) .';' : '';
    $inline_style .= ( $txt_color ) ? 'color:'. $txt_color .';' : '';
    $inline_style .= '}';
  }
  if ( $link_text_size || $link_txt_color ) {
    $inline_style .= '.wndfal-footer-address-'. $e_uniqid .'.footer-contact a, .wndfal-footer-address-'. $e_uniqid .'.footer-contact span {';
    $inline_style .= ( $link_text_size ) ? 'font-size:'. windfall_core_check_px($link_text_size) .';' : '';
    $inline_style .= ( $link_txt_color ) ? 'color:'. $link_txt_color .';' : '';
    $inline_style .= '}';
  }
  if ($link_txt_hover ) {
    $inline_style .= '.wndfal-footer-address-'. $e_uniqid .'.footer-contact a:hover {';
    $inline_style .= ( $link_txt_hover ) ? 'color:'. $link_txt_hover .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' wndfal-footer-address-'. $e_uniqid;

  $address_info = '<div class="footer-contact '.$custom_class.$styled_class.'">
    '.do_shortcode($content).'
  </div>';

  $result = $address_info;
  return $result;
}
add_shortcode("windfall_footer_address", "windfall_footer_address_function");

/* Footer Addres */
function windfall_footer_addres_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
    "main_text" => '',
    "link_text" => '',
    "link" => '',
   ), $atts));

    $main_text = $main_text ? $main_text : '';
    $link_txt = $link ? '<a href="'.$link.'">'.$link_text.'</a>' : '<span>'.$link_text.'</span>';
    $link_text_actual = $link_text ? $link_txt : '';

   $result = '<span>'.$main_text.$link_text_actual.'</span>';
   return $result;

}
add_shortcode("windfall_footer_addres", "windfall_footer_addres_function");

// Simple Image
function windfall_simple_image_function($atts, $content = true) {
   extract(shortcode_atts(array(
      "custom_class" => '',
      "simple_image" => '',
      "image_link" => '',
   ), $atts));

   $alt_text = get_post_meta($simple_image, '_wp_attachment_image_alt', true);

   $image_actual = ($simple_image) ? '<img src="'. $simple_image .'" alt="'.esc_attr($alt_text).'" >' : '';
   $link = $image_link ? '<a href="'.$image_link.'">'.$image_actual.'</a>' : $image_actual;

   $result = '<div class="wndfal-logo '. $custom_class .'">'.$link.'</div>';
   return $result;

}
add_shortcode("windfall_simple_image", "windfall_simple_image_function");

/* Simple Link */
function windfall_simple_link_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "custom_class" => '',
      "title" => '',
      "title_link" => '',
   ), $atts));

   $link = $title_link ? '<a href="'.$title_link.'" class="wndfal-link">'.$title.'<i class="fa fa-angle-right" aria-hidden="true"></i></a>' : '<span class="wndfal-link">'.$title.'<i class="fa fa-angle-right" aria-hidden="true"></i></span>';
   $link_actual = $title ? '<div class="wndfal-link-wrap">'.$link.'</div>' : '';

   $simple_link = $link_actual;

   $result = $simple_link;
   return $result;

}
add_shortcode("windfall_simple_link", "windfall_simple_link_function");

// Footer Links
function windfall_footer_links_function($atts, $content = true) {
   extract(shortcode_atts(array(
      "custom_class" => '',
   ), $atts));

   $result = '<ul class="'. $custom_class .'">'. do_shortcode($content) .'</ul>';
   return $result;

}
add_shortcode("windfall_footer_links", "windfall_footer_links_function");

/* Footer Link */
function windfall_footer_link_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "title" => '',
      "title_link" => '',
   ), $atts));

   $link = $title_link ? '<a href="'.$title_link.'">'.$title.'</a>' : '<span>'.$title.'</span>';

   $menu_title = $title ? '<li>'.$link.'</li>' : '';

   $result = $menu_title;
   return $result;

}
add_shortcode("windfall_footer_link", "windfall_footer_link_function");

/* Current Year - Shortcode */
if( ! function_exists( 'windfall_current_year' ) ) {
  function windfall_current_year() {
    return date('Y');
  }
  add_shortcode( 'windfall_current_year', 'windfall_current_year' );
}

/* Get Home Page URL - Via Shortcode */
if( ! function_exists( 'windfall_home_url' ) ) {
  function windfall_home_url() {
    return esc_url( home_url( '/' ) );
  }
  add_shortcode( 'windfall_home_url', 'windfall_home_url' );
}
