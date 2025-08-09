<?php
/*
 * All Custom Shortcode for windfall theme.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  // Set a unique slug-like ID
  $prefix = 'windfall_vt_shortcodes';

  // Create a shortcoder
  CSF::createShortcoder( $prefix, array(
    'button_title'   => 'Add Shortcode',
    'select_title'   => 'Select a shortcode',
    'insert_title'   => 'Insert Shortcode',
    'show_in_editor' => true,
    'gutenberg'      => array(
      'title'        => 'Windfall Shortcodes',
      'description'  => 'Windfall Shortcode Block',
      'icon'         => 'screenoptions',
      'category'     => 'widgets',
      'keywords'     => array( 'shortcode', 'csf', 'insert' ),
      'placeholder'  => 'Write shortcode here...',
    )
  ) );

  CSF::createSection( $prefix, array(
    'title'     => __('Free Trial', 'windfall'),
    'view'      => 'normal',
    'shortcode' => 'windfall_free_trial',
    'fields'    => array(

      array(
        'id'        => 'custom_class',
        'type'      => 'text',
        'title'     => __('Custom Class', 'windfall'),
      ),
      array(
        'id'       => 'text_size',
        'type'     => 'spinner',
        'title'    => __('Text Size', 'windfall'),
        'max'      => 100,
        'min'      => 0,
        'step'     => 1,
        'unit'     => 'px',
        'output'      => '.free-trial span',
        'output_mode' => 'font-size',
      ),
      array(
        'id'        => 'text_color',
        'type'      => 'color',
        'title'     => __('Text Color', 'windfall'),
        'output'      => '.free-trial span',
        'output_mode' => 'color',
      ),
      array(
        'id'       => 'btn_text_size',
        'type'     => 'spinner',
        'title'    => __('Button Text Size', 'windfall'),
        'max'      => 100,
        'min'      => 0,
        'step'     => 1,
        'unit'     => 'px',
        'output'      => '.free-trial .wndfal-label',
        'output_mode' => 'font-size',
      ),
      array(
        'id'        => 'btn_text_color',
        'type'      => 'color_group',
        'title'     => __('Button Text Color', 'windfall'),
        'output'      => '.free-trial .wndfal-label',
        'output_mode' => 'color',
        'options'   => array(
          'bt_color' => 'Color',
          'bt_hover' => 'Hover',
        )
      ),
      array(
        'id'        => 'btn_bg_color',
        'type'      => 'color_group',
        'title'     => __('Button Background Color', 'windfall'),
        'output'      => '.free-trial .wndfal-label',
        'output_mode' => 'background-color',
        'options'   => array(
          'bt_bg_color' => 'Color',
          'bt_bg_hover' => 'Hover',
        )
      ),
      array(
        'id'      => 'get_icon',
        'type'    => 'icon',
        'title'   => 'Icon',
        'default' => 'fa fa-check',
      ),
      array(
        'id'        => 'get_text',
        'type'      => 'textarea',
        'title'     => __('Text Block', 'windfall'),
      ),
      array(
        'id'        => 'btn_text',
        'type'      => 'text',
        'title'     => __('Button Text', 'windfall')
      ),
      array(
        'id'        => 'btn_link',
        'type'      => 'text',
        'title'     => __('Button Link', 'windfall')
      ),

    )
  ) );

  CSF::createSection( $prefix, array(
    'title'     => 'List',
    'view'      => 'group',
    'shortcode' => 'windfall_lists',
    'fields'    => array(

      array(
        'id'        => 'custom_class',
        'type'      => 'text',
        'title'     => __('Custom Class', 'windfall'),
      ),

    ),
    'group_shortcode' => 'windfall_list',
    'group_fields'    => array(

      array(
        'id'     => 'title',
        'type'   => 'textarea',
        'title'     => __('Content', 'windfall'),
      ),
      array(
        'id'     => 'link',
        'type'   => 'text',
        'title'     => __('Link', 'windfall'),
      ),

    )

  ) );

  CSF::createSection( $prefix, array(
    'title'     => 'Social Icons',
    'view'      => 'group',
    'shortcode' => 'windfall_socials',
    'fields'    => array(

      array(
        'id'        => 'custom_class',
        'type'      => 'text',
        'title'     => __('Custom Class', 'windfall'),
      ),
      array(
        'id'     => 'title',
        'type'   => 'text',
        'title'     => __('Social Title', 'windfall'),
      ),
      array(
        'id'       => 'title_size',
        'type'     => 'spinner',
        'title'    => __('Title Size', 'windfall'),
        'max'      => 100,
        'min'      => 0,
        'step'     => 1,
        'unit'     => 'px',
        'output'      => '.social-label',
        'output_mode' => 'font-size',
      ),
      array(
        'id'        => 'title_color',
        'type'      => 'color',
        'title'     => __('Title Color', 'windfall'),
        'output'      => '.social-label',
        'output_mode' => 'color',
      ),
      array(
        'id'       => 'icon_size',
        'type'     => 'spinner',
        'title'    => __('Icon Size', 'windfall'),
        'max'      => 100,
        'min'      => 0,
        'step'     => 1,
        'unit'     => 'px',
        'output'      => '.wndfal-social a',
        'output_mode' => 'font-size',
      ),
      array(
        'id'        => 'icon_color',
        'type'      => 'color',
        'title'     => __('Icon Color', 'windfall'),
        'output'      => '.wndfal-social a',
        'output_mode' => 'color',
      ),
      array(
        'id'        => 'icon_hover_color',
        'type'      => 'color',
        'title'     => __('Icon Color', 'windfall'),
        'output'      => '.wndfal-social a:hover',
        'output_mode' => 'color',
      ),

    ),
    'group_shortcode' => 'windfall_social',
    'group_fields'    => array(

      array(
        'id'      => 'social_icon',
        'type'    => 'icon',
        'title'   => 'Icon',
        'default' => 'fa fa-facebook',
      ),
      array(
        'id'     => 'icon_link',
        'type'   => 'text',
        'title'     => __('Icon Link', 'windfall'),
      ),

    )

  ) );

  // Header Button
  CSF::createSection( $prefix, array(
    'title'     => __('Header Button', 'windfall'),
    'view'      => 'normal',
    'shortcode' => 'windfall_header_button',
    'fields'    => array(

      array(
        'id'        => 'custom_class',
        'type'      => 'text',
        'title'     => __('Custom Class', 'windfall'),
      ),

      array(
        'id'       => 'btn_text_size',
        'type'     => 'spinner',
        'title'    => __('Button Text Size', 'windfall'),
        'max'      => 100,
        'min'      => 0,
        'step'     => 1,
        'unit'     => 'px',
        'output'      => '.free-trial .wndfal-label',
        'output_mode' => 'font-size',
      ),
      array(
        'id'        => 'btn_text_color',
        'type'      => 'color_group',
        'title'     => __('Button Text Color', 'windfall'),
        'output'      => '.wndfal-btn .btn-text',
        'output_mode' => 'color',
        'options'   => array(
          'bt_color' => 'Color',
          'bt_hover' => 'Hover',
        )
      ),
      array(
        'id'        => 'btn_bg_color',
        'type'      => 'color_group',
        'title'     => __('Button Background Color', 'windfall'),
        'output'      => '.btn-text-wrap',
        'output_mode' => 'background-color',
        'options'   => array(
          'bt_bg_color' => 'Color',
          'bt_bg_hover' => 'Hover',
        )
      ),
      array(
        'id'        => 'btn_border_color',
        'type'      => 'color_group',
        'title'     => __('Button Hover Border Color', 'windfall'),
        'output'      => '.wndfal-btn:hover .btn-text-wrap:before, .wndfal-btn:before, .wndfal-btn:after',
        'output_mode' => 'background-color',
        'options'   => array(
          'bt_border_hover' => 'Hover',
        )
      ),
      array(
        'id'        => 'btn_text',
        'type'      => 'text',
        'title'     => __('Button Text', 'windfall')
      ),
      array(
        'id'        => 'btn_link',
        'type'      => 'text',
        'title'     => __('Button Link', 'windfall')
      ),

    )
  ) );

  // Header Address
  CSF::createSection( $prefix, array(
    'title'     => __('Contact Info', 'windfall'),
    'view'      => 'normal',
    'shortcode' => 'windfall_header_address',
    'fields'    => array(

      array(
        'id'        => 'custom_class',
        'type'      => 'text',
        'title'     => __('Custom Class', 'windfall'),
      ),
      array(
        'id'       => 'icon_size',
        'type'     => 'spinner',
        'title'    => __('Icon Size', 'windfall'),
        'max'      => 100,
        'min'      => 0,
        'step'     => 1,
        'unit'     => 'px',
        'output'      => '.header-contact .wndfal-icon i',
        'output_mode' => 'font-size',
      ),
      array(
        'id'        => 'icon_color',
        'type'      => 'color_group',
        'title'     => __('Icon Color', 'windfall'),
        'output'      => '.header-contact .wndfal-icon i',
        'output_mode' => 'color',
        'options'   => array(
          'icon_color' => 'Color',
        )
      ),
      array(
        'id'       => 'text_size',
        'type'     => 'spinner',
        'title'    => __('Text Size', 'windfall'),
        'max'      => 100,
        'min'      => 0,
        'step'     => 1,
        'unit'     => 'px',
        'output'      => '.header-contact-info',
        'output_mode' => 'font-size',
      ),
      array(
        'id'        => 'text_color',
        'type'      => 'color_group',
        'title'     => __('Text Color', 'windfall'),
        'output'      => '.header-contact-info',
        'output_mode' => 'color',
        'options'   => array(
          'txt_color' => 'Color',
        )
      ),
      array(
        'id'       => 'link_text_size',
        'type'     => 'spinner',
        'title'    => __('Link Text Size', 'windfall'),
        'max'      => 100,
        'min'      => 0,
        'step'     => 1,
        'unit'     => 'px',
        'output'      => '.header-contact-info span, .header-contact-info a',
        'output_mode' => 'font-size',
      ),
      array(
        'id'        => 'link_text_color',
        'type'      => 'color_group',
        'title'     => __('Link Text Color', 'windfall'),
        'output'      => '.header-contact-info span, .header-contact-info a',
        'output_mode' => 'color',
        'options'   => array(
          'link_txt_color' => 'Color',
          'link_txt_hover' => 'Hover',
        )
      ),

      array(
        'id'        => 'image_type',
        'type'      => 'select',
        'title'     => __('Upload Type', 'windfall'),
        'options'        => array(
          'image' => __('Image', 'windfall'),
          'icon' => __('Icon', 'windfall'),
        ),
      ),
      array(
        'id'      => 'contact_icon',
        'type'    => 'icon',
        'title'   => 'Icon',
        'default' => 'fa fa-phone',
        'dependency'  => array('image_type', '==', 'icon'),
      ),
      array(
        'id'        => 'contact_image',
        'type'      => 'upload',
        'title'     => __('Image', 'windfall'),
        'dependency'  => array('image_type', '==', 'image'),
      ),
      array(
        'id'        => 'main_text',
        'type'      => 'text',
        'title'     => __('Text', 'windfall')
      ),
      array(
        'id'        => 'link_text',
        'type'      => 'text',
        'title'     => __('Link Text', 'windfall')
      ),
      array(
        'id'        => 'link',
        'type'      => 'text',
        'title'     => __('Link', 'windfall')
      ),

    )
  ) );

  // Simple Image
  CSF::createSection( $prefix, array(
    'title'     => 'Simple Image',
    'view'      => 'normal',
    'shortcode' => 'windfall_simple_image',
    'fields'    => array(

      array(
        'id'        => 'custom_class',
        'type'      => 'text',
        'title'     => __('Custom Class', 'windfall'),
      ),
      array(
        'id'        => 'simple_image',
        'type'      => 'upload',
        'title'     => __('Image', 'windfall'),
      ),
      array(
        'id'        => 'image_link',
        'type'      => 'text',
        'title'     => __('Image Link', 'windfall'),
      ),

    ),

  ) );

  // Simple Link
  CSF::createSection( $prefix, array(
    'title'     => 'Simple Link',
    'view'      => 'normal',
    'shortcode' => 'windfall_simple_link',
    'fields'    => array(

      array(
        'id'        => 'custom_class',
        'type'      => 'text',
        'title'     => __('Custom Class', 'windfall'),
      ),
      array(
        'id'     => 'title',
        'type'   => 'text',
        'title'     => __('Text', 'windfall'),
      ),
      array(
        'id'     => 'title_link',
        'type'   => 'text',
        'title'     => __('Link', 'windfall'),
      ),

    )

  ) );

  // Footer Links
  CSF::createSection( $prefix, array(
    'title'     => 'Footer Links',
    'view'      => 'group',
    'shortcode' => 'windfall_footer_links',
    'fields'    => array(

      array(
        'id'        => 'custom_class',
        'type'      => 'text',
        'title'     => __('Custom Class', 'windfall'),
      ),

    ),
    'group_shortcode' => 'windfall_footer_link',
    'group_fields'    => array(

      array(
        'id'     => 'title',
        'type'   => 'text',
        'title'     => __('Text', 'windfall'),
      ),
      array(
        'id'     => 'title_link',
        'type'   => 'text',
        'title'     => __('Link', 'windfall'),
      ),

    )

  ) );

  // Footer Contact
  CSF::createSection( $prefix, array(
    'title'     => __('Footer Contact Info', 'windfall'),
    'view'      => 'group',
    'shortcode' => 'windfall_footer_address',
    'fields'    => array(

      array(
        'id'        => 'custom_class',
        'type'      => 'text',
        'title'     => __('Custom Class', 'windfall'),
      ),

      array(
        'id'       => 'text_size',
        'type'     => 'spinner',
        'title'    => __('Text Size', 'windfall'),
        'max'      => 100,
        'min'      => 0,
        'step'     => 1,
        'unit'     => 'px',
        'output'      => '.header-contact-info',
        'output_mode' => 'font-size',
      ),
      array(
        'id'        => 'text_color',
        'type'      => 'color_group',
        'title'     => __('Text Color', 'windfall'),
        'output'      => '.header-contact-info',
        'output_mode' => 'color',
        'options'   => array(
          'txt_color' => 'Color',
        )
      ),
      array(
        'id'       => 'link_text_size',
        'type'     => 'spinner',
        'title'    => __('Link Text Size', 'windfall'),
        'max'      => 100,
        'min'      => 0,
        'step'     => 1,
        'unit'     => 'px',
        'output'      => '.header-contact-info span, .header-contact-info a',
        'output_mode' => 'font-size',
      ),
      array(
        'id'        => 'link_text_color',
        'type'      => 'color_group',
        'title'     => __('Link Text Color', 'windfall'),
        'output'      => '.header-contact-info span, .header-contact-info a',
        'output_mode' => 'color',
        'options'   => array(
          'link_txt_color' => 'Color',
          'link_txt_hover' => 'Hover',
        )
      ),
    ),
    'group_shortcode' => 'windfall_footer_addres',
    'group_fields'    => array(
      array(
        'id'        => 'main_text',
        'type'      => 'text',
        'title'     => __('Text', 'windfall')
      ),
      array(
        'id'        => 'link_text',
        'type'      => 'text',
        'title'     => __('Link Text', 'windfall')
      ),
      array(
        'id'        => 'link',
        'type'      => 'text',
        'title'     => __('Link', 'windfall')
      ),

    )

  ) );

}
