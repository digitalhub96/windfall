<?php
/*
 * All Theme Options for Windfall theme.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  // Set a unique slug-like ID
  $prefix = 'windfall_csf_theme_options';

  // Create options
  CSF::createOptions( $prefix, array(
    'menu_title'      => WINDFALL_NAME . esc_html__(' Options', 'windfall'),
    'menu_slug'       => sanitize_title(WINDFALL_NAME) . '_options',
    'menu_type'       => 'menu',
    'menu_icon'       => 'dashicons-awards',
    'menu_position'   => '4',
    'ajax_save'       => false,
    'show_reset_all'  => true,
    'framework_title' => WINDFALL_NAME .' <small>V-'. WINDFALL_VERSION .' by <a href="'. esc_url(WINDFALL_BRAND_URL) .'" target="_blank">'. WINDFALL_BRAND_NAME .'</a></small>',
  ) );

  // Brand
  CSF::createSection( $prefix, array(
    'name'     => 'theme_brand',
    'title'    => esc_html__('Logo', 'windfall'),
    'icon'     => 'fa fa-bookmark',
    'fields' => array(

      // Site Logo
      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Site Logo', 'windfall'),
      ),
      array(
        'id'    => 'brand_logo_default',
        'type'  => 'media',
        'url'   => false,
        'title' => esc_html__('Logo', 'windfall'),
        'desc' => esc_html__('Upload your 2x size of logo here. It\'ll comfortable for retina screens.', 'windfall'),
        'button_title' => esc_html__('Add Logo', 'windfall'),
      ),
      array(
        'id'    => 'logo_width_height',
        'type'  => 'dimensions',
        'title'       => esc_html__('Logo Width & Height', 'windfall'),
        'unit'  => false,
      ),
      array(
        'id'    => 'brand_logo_top_bottom',
        'type'  => 'spacing',
        'title' => esc_html__('Logo Top & Bottom Space', 'windfall'),
        'left'  => false,
        'right' => false,
      ),

      // WordPress Admin Logo
      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('WordPress Admin Logo', 'windfall'),
      ),
      array(
        'id'    => 'brand_logo_wp',
        'type'  => 'media',
        'url'   => false,
        'title' => esc_html__('Login logo', 'windfall'),
        'desc' => esc_html__('Upload your WordPress login page logo here.', 'windfall'),
        'button_title' => esc_html__('Add Login logo', 'windfall'),
      ),

    )
  ) );

  // General
  CSF::createSection( $prefix, array(
    'name'     => 'theme_general',
    'title'    => esc_html__('General', 'windfall'),
    'icon'     => 'fa fa-wrench',
    'fields' => array(

      array(
        'id'       => 'theme_preloader',
        'type'     => 'switcher',
        'title'    => esc_html__('Preloader', 'windfall'),
        'desc'     => esc_html__('Turn off if you don\'t want preloader.', 'windfall'),
        'text_on'  => 'Yes',
        'text_off' => 'No',
      ),
      array(
        'id'       => 'sticky_header',
        'type'     => 'switcher',
        'title'    => esc_html__('Sticky Header', 'windfall'),
        'desc'     => esc_html__('Turn off if you want sticky header.', 'windfall'),
        'text_on'  => 'Yes',
        'text_off' => 'No',
      ),
      array(
        'id'       => 'sticky_footer',
        'type'     => 'switcher',
        'title'    => esc_html__('Sticky Footer', 'windfall'),
        'desc'     => esc_html__('Turn off if you want sticky footer.', 'windfall'),
        'text_on'  => 'Yes',
        'text_off' => 'No',
      ),
      array(
        'id'       => 'theme_btotop',
        'type'     => 'switcher',
        'title'    => esc_html__('Back To Top', 'windfall'),
        'desc'     => esc_html__('Turn off if you don\'t want back to top button.', 'windfall'),
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => true,
      ),
      array(
        'id'          => 'redirection_link',
        'type'        => 'text',
        'title'       => esc_html__('Redirection Link', 'windfall'),
        'desc' => esc_html__('This link will be redirected after successfull registration.', 'windfall'),
      ),
      array(
        'id'       => 'theme_img_resizer',
        'type'     => 'switcher',
        'title'    => esc_html__('Disable Image Resizer?', 'windfall'),
        'desc'     => esc_html__('Turn on if you don\'t want image resizer.', 'windfall'),
      ),

    )
  ) );

  // Header Parent
  CSF::createSection( $prefix, array(
    'id'     => 'theme_header_tab',
    'title'    => esc_html__('Header', 'windfall'),
    'icon'     => 'fa fa-bars',
  ) );

  // Design
  CSF::createSection( $prefix, array(
    'parent'   => 'theme_header_tab',
    'name'     => 'header_design_tab',
    'title'    => esc_html__('Design', 'windfall'),
    'icon'     => 'fa fa-magic',
    'fields' => array(

      array(
        'id'           => 'select_header_design',
        'type'         => 'image_select',
        'title'        => esc_html__('Select Header Design', 'windfall'),
        'options'      => array(
          'style_one'    => WINDFALL_CS_IMAGES .'/hs-1.png',
          'style_two'    => WINDFALL_CS_IMAGES .'/hs-2.png',
        ),
        'radio'        => true,
        'default'   => 'style_one',
        'info' => esc_html__('Select your header design, following options will may differ based on your selection of header design.', 'windfall'),
      ),
      array(
        'id'        => 'fullwidth_menubar',
        'type'      => 'select',
        'title'     => esc_html__('Fullwidth Menu Bar', 'windfall'),
        'options'   => array(
          'container' => 'Container Width',
          'fullwidth'   => 'Fullwidth',
        ),
        'dependency'   => array('select_header_design', '==', 'style_one'),
      ),
      array(
        'id'       => 'need_content',
        'type'     => 'switcher',
        'title' => esc_html__('Need Header Content', 'windfall'),
        'default' => true,
      ),
      array(
        'id'              => 'header_contact',
        'title'           => esc_html__('Header Contact', 'windfall'),
        'desc'            => esc_html__('Add your header contact here. Example : Contact', 'windfall'),
        'type'            => 'textarea',
        'shortcoder'      => 'windfall_vt_shortcodes',
        'dependency'   => array('need_content|select_header_design', '==|==', 'true|style_one'),
      ),
      array(
        'id'              => 'header_btns',
        'title'           => esc_html__('Header Buttons', 'windfall'),
        'desc'            => esc_html__('Add your header buttons here. Example : Buttons', 'windfall'),
        'type'            => 'textarea',
        'shortcoder'      => 'windfall_vt_shortcodes',
        'dependency'   => array('need_content', '==', 'true'),
      ),
      array(
        'id'        => 'search_icon',
        'type'      => 'select',
        'title'     => esc_html__('Search Icon', 'windfall'),
        'options'   => array(
          'hide'   => 'Hide',
          'show' => 'Show',
        ),
      ),
      array(
        'id'          => 'mobile_breakpoint',
        'type'        => 'text',
        'title'       => esc_html__('Mobile Menu Starts from?', 'windfall'),
        'attributes'  => array( 'placeholder' => '1199' ),
        'desc' => esc_html__('Just put numeric value only. Like : 1199. Don\'t use px or any other units.', 'windfall'),
      ),

    )
  ) );

  // Top Bar
  CSF::createSection( $prefix, array(
    'parent'   => 'theme_header_tab',
    'name'     => 'header_top_bar_tab',
    'title'    => esc_html__('Top Bar', 'windfall'),
    'icon'     => 'fa fa-minus',
    'fields' => array(

      array(
        'id'       => 'top_bar',
        'type'     => 'switcher',
        'title'       => esc_html__('Hide Top Bar', 'windfall'),
        'default'     => false,
      ),
      array(
        'id'          => 'top_left',
        'title'       => esc_html__('Top Left Block', 'windfall'),
        'desc'        => esc_html__('Top bar left block.', 'windfall'),
        'type'        => 'textarea',
        'shortcoder'  => 'windfall_vt_shortcodes',
        'dependency'  => array('top_bar', '==', false),
      ),
      array(
        'id'          => 'top_right',
        'title'       => esc_html__('Top Right Block', 'windfall'),
        'desc'        => esc_html__('Top bar right block.', 'windfall'),
        'type'        => 'textarea',
        'shortcoder'  => 'windfall_vt_shortcodes',
        'dependency'  => array('top_bar', '==', false),
      ),

    )
  ) );

  // Top Bar
  CSF::createSection( $prefix, array(
    'parent'   => 'theme_header_tab',
    'name'     => 'header_banner_tab',
    'title'    => esc_html__('Title Bar (or) Banner', 'windfall'),
    'icon'     => 'fa fa-bullhorn',
    'fields' => array(

      array(
        'id'       => 'need_title_bar',
        'type'     => 'switcher',
        'title'   => esc_html__('Title Bar', 'windfall'),
        'desc'   => esc_html__('If you want title bar in your sub-pages, please turn this ON.', 'windfall'),
        'default'     => true,
      ),
      array(
        'id'             => 'title_bar_padding',
        'type'           => 'select',
        'title'          => esc_html__('Padding Spaces Top & Bottom', 'windfall'),
        'options'        => array(
          'padding-default' => esc_html__('Default Spacing', 'windfall'),
          'padding-xs' => esc_html__('Extra Small Padding', 'windfall'),
          'padding-sm' => esc_html__('Small Padding', 'windfall'),
          'padding-md' => esc_html__('Medium Padding', 'windfall'),
          'padding-lg' => esc_html__('Large Padding', 'windfall'),
          'padding-xl' => esc_html__('Extra Large Padding', 'windfall'),
          'padding-no' => esc_html__('No Padding', 'windfall'),
          'padding-custom' => esc_html__('Custom Padding', 'windfall'),
        ),
        'dependency'   => array( 'need_title_bar', '==', 'true' ),
      ),
      array(
        'id'    => 'titlebar_top_bottom_padding',
        'type'  => 'spacing',
        'title' => esc_html__('Title Bar Top & Bottom Space', 'windfall'),
        'left'  => false,
        'right' => false,
        'dependency'   => array( 'title_bar_padding|need_title_bar', '==|==', 'padding-custom|true' ),
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Background Options', 'windfall'),
      ),
      array(
        'id'      => 'titlebar_bg',
        'type'    => 'background',
        'title'   => esc_html__('Background', 'windfall'),
        'background_color'      => true,
        'background_image'      => true,
        'background-position'   => true,
        'background_repeat'     => true,
        'background_attachment' => true,
        'background_size'       => true,
        'background_origin'     => true,
        'background_clip'       => true,
        'background_blend_mode' => true,
        'dependency' => array( 'need_title_bar', '==', 'true' ),
      ),
      array(
        'id'      => 'titlebar_bg_overlay_color',
        'type'    => 'color',
        'title'   => esc_html__('Overlay Color', 'windfall'),
        'dependency' => array( 'need_title_bar', '==', 'true' ),
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Breadcrumbs', 'windfall'),
      ),
      array(
        'id'      => 'need_breadcrumbs',
        'type'    => 'switcher',
        'title'   => esc_html__('Breadcrumbs', 'windfall'),
        'label'   => esc_html__('If you want Breadcrumbs in your banner, please turn this ON.', 'windfall'),
        'default'    => true,
      ),

    )
  ) );

  // Footer
  CSF::createSection( $prefix, array(
    'name'     => 'footer_section',
    'title'    => esc_html__('Footer', 'windfall'),
    'icon'     => 'fa fa-ellipsis-h',
    'fields' => array(

      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Footer Widget Layout', 'windfall')
      ),
      array(
        'id'        => 'above_footer_widget',
        'type'      => 'select',
        'title'     => esc_html__('Above Footer Widget', 'windfall'),
        'options'   => array(
          'hide'   => 'Hide',
          'show' => 'Show',
        ),
      ),
      array(
        'id'    => 'footer_widget_block',
        'type'  => 'switcher',
        'title' => esc_html__('Enable Widget Block', 'windfall'),
        'desc' => esc_html__('If you turn this ON, then Goto : Appearance > Widgets. There you can see Footer Widget 1,2,3 or 4 Widget Area, add your widgets there.', 'windfall'),
        'default' => true,
      ),
      array(
        'id'    => 'footer_widget_layout',
        'type'  => 'image_select',
        'title' => esc_html__('Widget Layouts', 'windfall'),
        'desc' => esc_html__('Choose your footer widget layouts.', 'windfall'),
        'options' => array(
          1   => WINDFALL_CS_IMAGES . '/footer/footer-1.png',
          2   => WINDFALL_CS_IMAGES . '/footer/footer-2.png',
          3   => WINDFALL_CS_IMAGES . '/footer/footer-3.png',
          4   => WINDFALL_CS_IMAGES . '/footer/footer-4.png',
          5   => WINDFALL_CS_IMAGES . '/footer/footer-5.png',
          6   => WINDFALL_CS_IMAGES . '/footer/footer-6.png',
          7   => WINDFALL_CS_IMAGES . '/footer/footer-7.png',
          8   => WINDFALL_CS_IMAGES . '/footer/footer-8.png',
          9   => WINDFALL_CS_IMAGES . '/footer/footer-9.png',
          10  => WINDFALL_CS_IMAGES . '/footer/footer-10.png',
        ),
        'default' => 10,
        'dependency'  => array('footer_widget_block', '==', 'true'),
      ),

      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Copyright Layout', 'windfall')
      ),
      array(
        'id'    => 'need_copyright',
        'type'  => 'switcher',
        'title' => esc_html__('Enable Copyright Section', 'windfall'),
        'default' => true,
      ),
      array(
        'id'    => 'copyright_layout',
        'type'  => 'image_select',
        'title' => esc_html__('Select Copyright Layout', 'windfall'),
        'options'      => array(
          'copyright-1'    => WINDFALL_CS_IMAGES .'/footer/copyright-3.png',
          'copyright-2'    => WINDFALL_CS_IMAGES .'/footer/copyright-1.png',
          'copyright-3'    => WINDFALL_CS_IMAGES .'/footer/copyright-4.png',
          ),
        'default'      => 'copyright-3',
        'dependency'     => array('need_copyright', '==', 'true'),
      ),
      array(
        'id'              => 'copyright_text',
        'title'           => esc_html__('Copyright Left Text', 'windfall'),
        'desc'            => esc_html__('Helpful shortcodes: [windfall_current_year] [windfall_home_url] or any shortcode.', 'windfall'),
        'type'            => 'textarea',
        'shortcoder'      => 'windfall_vt_shortcodes',
        'dependency'      => array('need_copyright', '==', 'true'),
      ),
      array(
        'id'              => 'secondary_text',
        'title'           => esc_html__('Copyright Middle Text', 'windfall'),
        'desc'            => esc_html__('Add any shortcode.', 'windfall'),
        'type'            => 'textarea',
        'shortcoder'      => 'windfall_vt_shortcodes',
        'dependency'   => array('need_copyright', '==', 'true'),
      ),
      array(
        'id'              => 'copyright_text_right',
        'title'           => esc_html__('Copyright Right Text', 'windfall'),
        'desc'            => esc_html__('Add any shortcode.', 'windfall'),
        'type'            => 'textarea',
        'shortcoder'      => 'windfall_vt_shortcodes',
        'dependency'   => array('need_copyright', '==', 'true'),
      ),

    )
  ) );

  // Design Parent
  CSF::createSection( $prefix, array(
    'id'     => 'theme_design',
    'title'    => esc_html__('Design', 'windfall'),
    'icon'     => 'fa fa-magic',
  ) );

  // Colors
  CSF::createSection( $prefix, array(
    'parent'   => 'theme_design',
    'name'     => 'theme_color_section',
    'title'    => esc_html__('Colors', 'windfall'),
    'icon'     => 'fa fa-eyedropper',
    'fields' => array(

      array(
        'type'    => 'heading',
        'content' => esc_html__('Color Options', 'windfall'),
      ),
      array(
        'type'    => 'content',
        'content' => esc_html__('All color options are available in our theme customizer. The reason of we used customizer options for color section is because, you can choose each part of color from there and see the changes instantly using customizer. Highly customizable colors are in Appearance > Customize', 'windfall'),
      ),

    )
  ) );

  // Typography
  CSF::createSection( $prefix, array(
    'parent'   => 'theme_design',
    'name'     => 'theme_typo_section',
    'title'    => esc_html__('Typography', 'windfall'),
    'icon'     => 'fa fa-header',
    'fields' => array(

      array(
        'id'            => 'theme_typo',
        'type'          => 'accordion',
        'title'         => esc_html__('Typography', 'windfall'),
        'accordions'    => array(

          array(
            'title'     => esc_html__('Body Typography', 'windfall'),
            'fields'    => array(
              array(
                'id'                 => 'body_font',
                'type'               => 'typography',
                'title'              => esc_html__('Typography', 'windfall'),
                'font_family'        => true,
                'font_weight'        => true,
                'font_style'         => true,
                'font_size'          => true,
                'line_height'        => true,
                'letter_spacing'     => true,
                'text_align'         => true,
                'text-transform'     => true,
                'color'              => true,
                'subset'             => true,
                'backup_font_family' => true,
                'font_variant'       => true,
                'word_spacing'       => true,
                'text_decoration'    => true,
                'default'            => array(
                  'font-family'      => 'Muli',
                  'type'             => 'google',
                ),
              ),
              array(
                'id'              => 'body_css',
                'type'            => 'textarea',
                'title'           => esc_html__('Custom CSS', 'windfall'),
                'desc'            => esc_html__('Enter your Custom CSS separated with ( , ) Ex: .class1, .class2', 'windfall'),
              ),
            )
          ),
          array(
            'title'     => esc_html__('Menu Typography', 'windfall'),
            'fields'    => array(
              array(
                'id'                 => 'menu_font',
                'type'               => 'typography',
                'title'              => esc_html__('Typography', 'windfall'),
                'font_family'        => true,
                'font_weight'        => true,
                'font_style'         => true,
                'font_size'          => true,
                'line_height'        => true,
                'letter_spacing'     => true,
                'text_align'         => true,
                'text-transform'     => true,
                'color'              => true,
                'subset'             => true,
                'backup_font_family' => true,
                'font_variant'       => true,
                'word_spacing'       => true,
                'text_decoration'    => true,
                'default'            => array(
                  'font-family'      => 'Muli',
                  'type'             => 'google',
                ),
              ),
              array(
                'id'              => 'menu_css',
                'type'            => 'textarea',
                'title'           => esc_html__('Custom CSS', 'windfall'),
                'desc'            => esc_html__('Enter your Custom CSS separated with ( , ) Ex: .class1, .class2', 'windfall'),
              ),
            )
          ),
          array(
            'title'  => esc_html__('Sub Menu Typography', 'windfall'),
            'fields'    => array(
              array(
                'id'                 => 'sub_menu_font',
                'type'               => 'typography',
                'title'              => esc_html__('Typography', 'windfall'),
                'font_family'        => true,
                'font_weight'        => true,
                'font_style'         => true,
                'font_size'          => true,
                'line_height'        => true,
                'letter_spacing'     => true,
                'text_align'         => true,
                'text-transform'     => true,
                'color'              => true,
                'subset'             => true,
                'backup_font_family' => true,
                'font_variant'       => true,
                'word_spacing'       => true,
                'text_decoration'    => true,
                'default'            => array(
                  'font-family'      => 'Muli',
                  'type'             => 'google',
                ),
              ),
              array(
                'id'              => 'sub_menu_css',
                'type'            => 'textarea',
                'title'           => esc_html__('Custom CSS', 'windfall'),
                'desc'            => esc_html__('Enter your Custom CSS separated with ( , ) Ex: .class1, .class2', 'windfall'),
              ),
            )
          ),
          array(
            'title'  => esc_html__('Headings Typography', 'windfall'),
            'fields'    => array(
              array(
                'id'                 => 'headings_font',
                'type'               => 'typography',
                'title'              => esc_html__('Typography', 'windfall'),
                'font_family'        => true,
                'font_weight'        => true,
                'font_style'         => true,
                'font_size'          => true,
                'line_height'        => true,
                'letter_spacing'     => true,
                'text_align'         => true,
                'text-transform'     => true,
                'color'              => true,
                'subset'             => true,
                'backup_font_family' => true,
                'font_variant'       => true,
                'word_spacing'       => true,
                'text_decoration'    => true,
                'default'            => array(
                  'font-family'      => 'Muli',
                  'type'             => 'google',
                ),
              ),
              array(
                'id'              => 'headings_css',
                'type'            => 'textarea',
                'title'           => esc_html__('Custom CSS', 'windfall'),
                'desc'            => esc_html__('Enter your Custom CSS separated with ( , ) Ex: .class1, .class2', 'windfall'),
              ),
            )
          ),
          array(
            'title'  => esc_html__('Shortcode Elements Primary Font', 'windfall'),
            'fields'    => array(
              array(
                'id'                 => 'shortcode_prime_font',
                'type'               => 'typography',
                'title'              => esc_html__('Typography', 'windfall'),
                'font_family'        => true,
                'font_weight'        => true,
                'font_style'         => true,
                'font_size'          => true,
                'line_height'        => true,
                'letter_spacing'     => true,
                'text_align'         => true,
                'text-transform'     => true,
                'color'              => true,
                'subset'             => true,
                'backup_font_family' => true,
                'font_variant'       => true,
                'word_spacing'       => true,
                'text_decoration'    => true,
                'default'            => array(
                  'font-family'      => 'Source Sans Pro',
                  'type'             => 'google',
                ),
              ),
              array(
                'id'              => 'shortcode_prime_css',
                'type'            => 'textarea',
                'title'           => esc_html__('Custom CSS', 'windfall'),
                'desc'            => esc_html__('Enter your Custom CSS separated with ( , ) Ex: .class1, .class2', 'windfall'),
              ),
            )
          ),

        )
      ),

      array(
        'id'        => 'custom_typography',
        'type'      => 'group',
        'title'     => esc_html__('Custom Typography', 'windfall'),
        'fields'    => array(
          array(
            'id'    => 'custom_title',
            'type'  => 'text',
            'title' => esc_html__('Title', 'windfall'),
          ),
          array(
            'id'                 => 'custom_typo',
            'type'               => 'typography',
            'title'              => esc_html__('Typography', 'windfall'),
            'font_family'        => true,
            'font_weight'        => true,
            'font_style'         => true,
            'font_size'          => true,
            'line_height'        => true,
            'letter_spacing'     => true,
            'text_align'         => true,
            'text-transform'     => true,
            'color'              => true,
            'subset'             => true,
            'backup_font_family' => true,
            'font_variant'       => true,
            'word_spacing'       => true,
            'text_decoration'    => true,
            'default'            => array(
              'font-family'      => 'Noto Sans',
              'type'             => 'google',
            ),
          ),
          array(
            'id'              => 'custom_css',
            'type'            => 'textarea',
            'title'           => esc_html__('Custom CSS', 'windfall'),
            'desc'            => esc_html__('Enter your Custom CSS separated with ( , ) Ex: .class1, .class2', 'windfall'),
          ),
        ),
      ),

      // Custom Fonts Upload
      array(
        'id'                 => 'custom_font_family',
        'type'               => 'group',
        'title'              => esc_html__('Upload Custom Fonts','windfall'),
        'button_title'       => 'Add New Custom Font',
        'accordion_title'    => 'Adding New Font',
        'accordion'          => true,
        'desc'               => 'It is simple. Only add your custom fonts and click to save. After you can check "Font Family" selector. Do not forget to Save!',
        'fields'             => array(

          array(
            'id'             => 'name',
            'type'           => 'text',
            'title'          => esc_html__('Font-Family Name','windfall'),
            'attributes'     => array(
              'placeholder'  => 'for eg. Arial'
            ),
          ),

          array(
            'id'            => 'weight',
            'type'          => 'select',
            'title'         => esc_html__('Font Weight', 'windfall'),
            'options'       => array(
              '100'         => esc_html__('Thin 100', 'windfall'),
              '100italic'   => esc_html__('Thin 100 Italic', 'windfall'),
              '200'         => esc_html__('Extra Light 200', 'windfall'),
              '200italic'   => esc_html__('Extra Light 200 Italic', 'windfall'),
              '300'         => esc_html__('Light 300', 'windfall'),
              '300italic'   => esc_html__('Light 300 Italic', 'windfall'),
              '400'         => esc_html__('Regular 400', 'windfall'),
              '400italic'   => esc_html__('Regular 400 Italic', 'windfall'),
              '500'         => esc_html__('Medium 500', 'windfall'),
              '500italic'   => esc_html__('Medium 500 Italic', 'windfall'),
              '600'         => esc_html__('Semi Bold 600', 'windfall'),
              '600italic'   => esc_html__('Semi Bold 600 Italic', 'windfall'),
              '700'         => esc_html__('Bold 700', 'windfall'),
              '700italic'   => esc_html__('Bold 700 Italic', 'windfall'),
              '800'         => esc_html__('Extra Bold 800', 'windfall'),
              '800italic'   => esc_html__('Extra Bold 800 Italic', 'windfall'),
              '900'         => esc_html__('Black 900', 'windfall'),
              '900italic'   => esc_html__('Black 900 Italic', 'windfall'),
            ),
            'placeholder'   => esc_html__('Select font weight', 'windfall'),
          ),

          array(
            'id'             => 'ttf',
            'type'           => 'upload',
            'title'          => 'Upload .ttf <small><i>(optional)</i></small>',
            'library'        => 'font',
            'button_title'   => 'Upload <i>.ttf</i>',
          ),

          array(
            'id'             => 'eot',
            'type'           => 'upload',
            'title'          => 'Upload .eot <small><i>(optional)</i></small>',
            'library'        => 'font',
            'button_title'   => 'Upload <i>.eot</i>',
          ),

          array(
            'id'             => 'otf',
            'type'           => 'upload',
            'title'          => 'Upload .otf <small><i>(optional)</i></small>',
            'library'        => 'font',
            'button_title'   => 'Upload <i>.otf</i>',
          ),

          array(
            'id'             => 'woff',
            'type'           => 'upload',
            'title'          => 'Upload .woff <small><i>(optional)</i></small>',
            'library'        => 'font',
            'button_title'   => 'Upload <i>.woff</i>',
          ),

          array(
            'id'             => 'css',
            'type'           => 'textarea',
            'title'          => 'Extra CSS Style <small><i>(optional)</i></small>',
            'attributes'     => array(
              'placeholder'  => 'for eg. font-weight: normal;'
            ),
          ),

        ),
      ),
      // End All field

    )
  ) );

  // Post Parent
  CSF::createSection( $prefix, array(
    'id'       => 'theme_post_types',
    'title'    => esc_html__('Custom Post Types', 'windfall'),
    'icon'     => 'fa fa-files-o',
  ) );

  // Gallery
  CSF::createSection( $prefix, array(
    'parent'   => 'theme_post_types',
    'name'     => 'gallery_section',
    'title'    => esc_html__('Gallery', 'windfall'),
    'icon'     => 'fa fa-briefcase',
    'fields'   => array(

      // Gallery Name
      array(
        'id'            => 'noneed_gallery_post',
        'type'          => 'switcher',
        'title'         => esc_html__('Disable Gallery Post?', 'windfall'),
        'desc'          => esc_html__('If need to disable this post type, please turn this ON.', 'windfall'),
        'default'       => false,
      ),
      array(
        'type'          => 'submessage',
        'style'         => 'info',
        'content'       => esc_html__('Name Change', 'windfall'),
        'dependency'    => array('noneed_gallery_post', '==', 'false'),
      ),
      array(
        'id'            => 'theme_gallery_name',
        'type'          => 'text',
        'title'         => esc_html__('Gallery Name', 'windfall'),
        'attributes'    => array(
          'placeholder' => 'Gallery'
        ),
        'dependency'    => array('noneed_gallery_post', '==', 'false'),
      ),
      array(
        'id'            => 'theme_gallery_slug',
        'type'          => 'text',
        'title'         => esc_html__('Gallery Slug', 'windfall'),
        'attributes'    => array(
          'placeholder' => 'gallery-item'
        ),
        'dependency'    => array('noneed_gallery_post', '==', 'false'),
      ),
      array(
        'id'            => 'theme_gallery_cat_slug',
        'type'          => 'text',
        'title'         => esc_html__('Gallery Category Slug', 'windfall'),
        'attributes'    => array(
          'placeholder' => 'gallery-category'
        ),
        'dependency'    => array('noneed_gallery_post', '==', 'false'),
      ),
      array(
        'type'          => 'submessage',
        'style'         => 'danger',
        'content'       => esc_html__('Important: Please do not set gallery slug and page slug as same. It\'ll not work.', 'windfall'),
        'dependency'    => array('noneed_gallery_post', '==', 'false'),
      ),
      // Gallery Name
      array(
        'type'          => 'submessage',
        'style'         => 'info',
        'content'       => esc_html__('Gallery Listing & Style', 'windfall'),
        'dependency'    => array('noneed_gallery_post', '==', 'false'),
      ),
      array(
        'id'             => 'gallery_style',
        'type'           => 'select',
        'title'          => esc_html__('Gallery Style', 'windfall'),
        'options'        => array(
          'one'          => esc_html__('Style One(Grid)', 'windfall'),
          'two'          => esc_html__('Style Two (Slider)', 'windfall'),
        ),
        'placeholder' => esc_html__('Select Gallery Style', 'windfall'),
        'dependency'     => array('noneed_gallery_post', '==', 'false'),
      ),
      array(
        'id'          => 'gallery_caption_style',
        'title'       => esc_html__('Gallery Caption', 'windfall'),
        'desc'        => esc_html__('Select Gallery Caption', 'windfall'),
        'type'        => 'select',
        'options'        => array(
          'without_caption' => esc_html__('Without Caption', 'windfall'),
          'with_caption' => esc_html__('With Caption', 'windfall'),
        ),
        'dependency'     => array('noneed_gallery_post|gallery_style', '==|!=', 'false|two'),
      ),
      array(
        'id'          => 'gallery_column',
        'title'       => esc_html__('Gallery Column', 'windfall'),
        'desc'        => esc_html__('Select Gallery column', 'windfall'),
        'type'        => 'select',
        'options'        => array(
          'glry-col-3' => esc_html__('Column Three', 'windfall'),
          'glry-col-2' => esc_html__('Column Two', 'windfall'),
          'glry-col-4' => esc_html__('Column Four', 'windfall'),
        ),
        'dependency'     => array('noneed_gallery_post|gallery_style', '==|!=', 'false|two'),
      ),
      array(
        'id'            => 'gallery_limit',
        'type'          => 'spinner',
        'title'         => esc_html__('Gallery Limit','windfall'),
        'subtitle'      => 'max:100 | min:0 | step:1',
        'max'           => 100,
        'min'           => -1,
        'step'          => 1,
        'default'       => 9,
        'dependency'    => array('noneed_gallery_post', '==', 'false'),
      ),
      array(
        'id'            => 'gallery_show_category',
        'type'          => 'select',
        'title'         => esc_html__('Gallery Categories', 'windfall'),
        'desc'          => esc_html__('Select categories you want to display.', 'windfall'),
        'dependency'    => array('noneed_gallery_post', '==', 'false'),
        'chosen'        => true,
        'multiple'      => true,
        'attributes'    => array(
          'style'       => 'width: 200px;'
        ),
        'options'     => 'categories',
        'query_args'  => array(
          'type'      => 'gallery',
          'taxonomy'  => 'gallery_category',
        ),
        'placeholder'   => esc_html__('Select categories', 'windfall'),
      ),
      array(
        'id'            => 'gallery_orderby',
        'type'          => 'select',
        'title'         => esc_html__('Order By', 'windfall'),
        'options'       => array(
          'none'        => esc_html__('None', 'windfall'),
          'ID'          => esc_html__('ID', 'windfall'),
          'author'      => esc_html__('Author', 'windfall'),
          'title'       => esc_html__('Title', 'windfall'),
          'date'        => esc_html__('Date', 'windfall'),
          'name'        => esc_html__('Name', 'windfall'),
          'modified'    => esc_html__('Modified', 'windfall'),
          'rand'        => esc_html__('Random', 'windfall'),
          'menu_order'  => esc_html__('Menu Order', 'windfall'),
        ),
        'placeholder'   => esc_html__('Select Gallery Order By', 'windfall'),
        'dependency'    => array('noneed_gallery_post', '==', 'false'),
      ),
      array(
        'id'            => 'gallery_order',
        'type'          => 'select',
        'title'         => esc_html__('Order', 'windfall'),
        'options'       => array(
          'ASC'         => esc_html__('Asending', 'windfall'),
          'DESC'        => esc_html__('Desending', 'windfall'),
        ),
        'placeholder'   => esc_html__('Select Gallery Order', 'windfall'),
        'dependency'    => array('noneed_gallery_post', '==', 'false'),
      ),
      array(
        'type'          => 'submessage',
        'style'         => 'info',
        'content'       => esc_html__('Enable/Disable Options', 'windfall'),
        'dependency'    => array('noneed_gallery_post', '==', 'false'),
      ),
      array(
        'id'            => 'gallery_aqr',
        'type'          => 'switcher',
        'title'         => esc_html__('Disable Image Resize?', 'windfall'),
        'desc'          => esc_html__('If need to disable image resize, please turn this ON.', 'windfall'),
        'default'       => false,
        'dependency'    => array('noneed_gallery_post', '==', 'false'),
      ),
      array(
        'id'            => 'gallery_filter',
        'type'          => 'switcher',
        'title'         => esc_html__('Filter', 'windfall'),
        'desc'          => esc_html__('If you need filter in gallery pages, please turn this ON.', 'windfall'),
        'default'       => true,
        'dependency'    => array('noneed_gallery_post', '==', 'false'),
      ),
      array(
        'id'            => 'filter_type',
        'type'          => 'select',
        'title'         => esc_html__('Filter Type', 'windfall'),
        'options'       => array(
          'normal'         => esc_html__('Normal Filter', 'windfall'),
          'ajax'        => esc_html__('Ajax Filter', 'windfall'),
        ),
        'placeholder'   => esc_html__('Select Gallery Filter Type', 'windfall'),
        'dependency'    => array('gallery_filter|noneed_gallery_post', '==|==', 'true|false'),
      ),
      array(
        'id'            => 'gallery_pagination',
        'type'          => 'switcher',
        'title'         => esc_html__('Pagination', 'windfall'),
        'desc'          => esc_html__('If you need pagination in gallery pages, please turn this ON.', 'windfall'),
        'default'       => true,
        'dependency'    => array('noneed_gallery_post', '==', 'false'),
      ),
      array(
        'type'          => 'submessage',
        'style'         => 'info',
        'content'       => esc_html__('Single Gallery', 'windfall'),
        'dependency'    => array('noneed_gallery_post', '==', 'false'),
      ),
      array(
        'id'            => 'gallery_single_related_post',
        'type'          => 'switcher',
        'title'         => esc_html__('Need Related Gallery?', 'windfall'),
        'desc'          => esc_html__('If you need related galleries in gallery singles, please turn this ON.', 'windfall'),
        'default'       => true,
        'dependency'    => array('noneed_gallery_post', '==', 'false'),
      ),
      array(
        'id'            => 'gallery_related_title',
        'type'          => 'text',
        'title'         => esc_html__('Related Gallery Title', 'windfall'),
        'dependency'    => array('noneed_gallery_post|gallery_single_related_post', '==|==', 'false|true'),
      ),
      array(
        'id'            => 'gallery_related_limit',
        'type'          => 'text',
        'title'         => esc_html__('Related Gallery Limit', 'windfall'),
        'dependency'    => array('noneed_gallery_post|gallery_single_related_post', '==|==', 'false|true'),
      ),

    )
  ) );

  // Testimonial
  CSF::createSection( $prefix, array(
    'parent'   => 'theme_post_types',
    'name'     => 'testimonial_section',
    'title'    => esc_html__('Testimonial', 'windfall'),
    'icon'     => 'fa fa-commenting',
    'fields'   => array(

      // Testimonial Name
      array(
        'id'            => 'noneed_testimonial_post',
        'type'          => 'switcher',
        'title'         => esc_html__('Disable Testimonial Post?', 'windfall'),
        'desc'          => esc_html__('If need to disable this post type, please turn this ON.', 'windfall'),
        'default'       => false,
      ),
      array(
        'type'          => 'submessage',
        'style'         => 'info',
        'content'       => esc_html__('Name Change', 'windfall'),
        'dependency'    => array('noneed_testimonial_post', '==', 'false'),
      ),
      array(
        'id'            => 'theme_testimonial_name',
        'type'          => 'text',
        'title'         => esc_html__('Testimonial Name', 'windfall'),
        'attributes'    => array(
          'placeholder' => 'Testimonial'
        ),
        'dependency'    => array('noneed_testimonial_post', '==', 'false'),
      ),
      array(
        'id'            => 'theme_testimonial_slug',
        'type'          => 'text',
        'title'         => esc_html__('Testimonial Slug', 'windfall'),
        'attributes'    => array(
          'placeholder' => 'testimonial-item'
        ),
        'dependency'    => array('noneed_testimonial_post', '==', 'false'),
      ),
      array(
        'id'            => 'theme_testimonial_cat_slug',
        'type'          => 'text',
        'title'         => esc_html__('Testimonial Category Slug', 'windfall'),
        'attributes'    => array(
          'placeholder' => 'testimonial-category'
        ),
        'dependency'    => array('noneed_testimonial_post', '==', 'false'),
      ),
      array(
        'type'          => 'submessage',
        'style'         => 'danger',
        'content'       => esc_html__('Important: Please do not set testimonial slug and page slug as same. It\'ll not work.', 'windfall'),
        'dependency'    => array('noneed_testimonial_post', '==', 'false'),
      ),
      // Testimonial Name
      array(
        'type'          => 'submessage',
        'style'         => 'info',
        'content'       => esc_html__('Testimonial Listing & Style', 'windfall'),
        'dependency'    => array('noneed_testimonial_post', '==', 'false'),
      ),
      array(
        'id'             => 'testimonial_style',
        'type'           => 'select',
        'title'          => esc_html__('Testimonial Style', 'windfall'),
        'options'        => array(
          'testimonial_one'          => esc_html__('Style One', 'windfall'),
          'testimonial_two'          => esc_html__('Style Two', 'windfall'),
          'testimonial_three'          => esc_html__('Style Three', 'windfall'),
        ),
        'dependency'   => array('noneed_testimonial_post', '==', 'false'),
      ),
      array(
        'id'            => 'testimonial_title',
        'type'          => 'text',
        'title'         => esc_html__('Testimonial Title', 'windfall'),
        'dependency'    => array('noneed_testimonial_post|testimonial_style', '==|==', 'false|testimonial_one'),
      ),
      array(
        'id'            => 'testimonial_limit',
        'type'          => 'spinner',
        'title'         => esc_html__('Testimonial Limit','windfall'),
        'subtitle'      => 'max:100 | min:0 | step:1',
        'max'           => 100,
        'min'           => -1,
        'step'          => 1,
        'default'       => 9,
        'dependency'    => array('noneed_testimonial_post', '==', 'false'),
      ),
      array(
        'id'            => 'testimonial_orderby',
        'type'          => 'select',
        'title'         => esc_html__('Order By', 'windfall'),
        'options'       => array(
          'none'        => esc_html__('None', 'windfall'),
          'ID'          => esc_html__('ID', 'windfall'),
          'author'      => esc_html__('Author', 'windfall'),
          'title'       => esc_html__('Title', 'windfall'),
          'date'        => esc_html__('Date', 'windfall'),
          'name'        => esc_html__('Name', 'windfall'),
          'modified'    => esc_html__('Modified', 'windfall'),
          'rand'        => esc_html__('Random', 'windfall'),
          'menu_order'  => esc_html__('Menu Order', 'windfall'),
        ),
        'placeholder'   => esc_html__('Select Testimonial Order By', 'windfall'),
        'dependency'    => array('noneed_testimonial_post', '==', 'false'),
      ),
      array(
        'id'            => 'testimonial_order',
        'type'          => 'select',
        'title'         => esc_html__('Order', 'windfall'),
        'options'       => array(
          'ASC'         => esc_html__('Asending', 'windfall'),
          'DESC'        => esc_html__('Desending', 'windfall'),
        ),
        'placeholder'   => esc_html__('Select Testimonial Order', 'windfall'),
        'dependency'    => array('noneed_testimonial_post', '==', 'false'),
      ),

    )
  ) );

  // Team
  CSF::createSection( $prefix, array(
    'parent'   => 'theme_post_types',
    'name'     => 'team_section',
    'title'    => esc_html__('Team', 'windfall'),
    'icon'     => 'fa fa-users',
    'fields'   => array(

      // Team Name
      array(
        'id'            => 'noneed_team_post',
        'type'          => 'switcher',
        'title'         => esc_html__('Disable Team Post?', 'windfall'),
        'desc'          => esc_html__('If need to disable this post type, please turn this ON.', 'windfall'),
        'default'       => false,
      ),
      array(
        'type'          => 'submessage',
        'style'         => 'info',
        'content'       => esc_html__('Name Change', 'windfall'),
        'dependency'    => array('noneed_team_post', '==', 'false'),
      ),
      array(
        'id'            => 'theme_team_name',
        'type'          => 'text',
        'title'         => esc_html__('Team Name', 'windfall'),
        'attributes'    => array(
          'placeholder' => 'Team'
        ),
        'dependency'    => array('noneed_team_post', '==', 'false'),
      ),
      array(
        'id'            => 'theme_team_slug',
        'type'          => 'text',
        'title'         => esc_html__('Team Slug', 'windfall'),
        'attributes'    => array(
          'placeholder' => 'team-item'
        ),
        'dependency'    => array('noneed_team_post', '==', 'false'),
      ),
      array(
        'id'            => 'theme_team_cat_slug',
        'type'          => 'text',
        'title'         => esc_html__('Team Category Slug', 'windfall'),
        'attributes'    => array(
          'placeholder' => 'team-category'
        ),
        'dependency'    => array('noneed_team_post', '==', 'false'),
      ),
      array(
        'type'          => 'submessage',
        'style'         => 'danger',
        'content'       => esc_html__('Important: Please do not set team slug and page slug as same. It\'ll not work.', 'windfall'),
        'dependency'    => array('noneed_team_post', '==', 'false'),
      ),
      // Team Name
      array(
        'type'          => 'submessage',
        'style'         => 'info',
        'content'       => esc_html__('Team Listing & Style', 'windfall'),
        'dependency'    => array('noneed_team_post', '==', 'false'),
      ),
      array(
        'id'            => 'team_limit',
        'type'          => 'spinner',
        'title'         => esc_html__('Team Limit','windfall'),
        'subtitle'      => 'max:100 | min:0 | step:1',
        'max'           => 100,
        'min'           => -1,
        'step'          => 1,
        'default'       => 9,
        'dependency'    => array('noneed_team_post', '==', 'false'),
      ),
      array(
        'id'            => 'team_orderby',
        'type'          => 'select',
        'title'         => esc_html__('Order By', 'windfall'),
        'options'       => array(
          'none'        => esc_html__('None', 'windfall'),
          'ID'          => esc_html__('ID', 'windfall'),
          'author'      => esc_html__('Author', 'windfall'),
          'title'       => esc_html__('Title', 'windfall'),
          'date'        => esc_html__('Date', 'windfall'),
          'name'        => esc_html__('Name', 'windfall'),
          'modified'    => esc_html__('Modified', 'windfall'),
          'rand'        => esc_html__('Random', 'windfall'),
          'menu_order'  => esc_html__('Menu Order', 'windfall'),
        ),
        'placeholder'   => esc_html__('Select Team Order By', 'windfall'),
        'dependency'    => array('noneed_team_post', '==', 'false'),
      ),
      array(
        'id'            => 'team_order',
        'type'          => 'select',
        'title'         => esc_html__('Order', 'windfall'),
        'options'       => array(
          'ASC'         => esc_html__('Asending', 'windfall'),
          'DESC'        => esc_html__('Desending', 'windfall'),
        ),
        'placeholder'   => esc_html__('Select Team Order', 'windfall'),
        'dependency'    => array('noneed_team_post', '==', 'false'),
      ),
      array(
        'id'            => 'team_aqr',
        'type'          => 'switcher',
        'title'         => esc_html__('Disable Image Resize?', 'windfall'),
        'desc'          => esc_html__('If need to disable image resize, please turn this ON.', 'windfall'),
        'default'       => false,
        'dependency'    => array('noneed_team_post', '==', 'false'),
      ),

    )
  ) );

  // Blog
  CSF::createSection( $prefix, array(
    'id'       => 'blog_section',
    'title'    => esc_html__('Blog', 'windfall'),
    'icon'     => 'fa fa-edit',
  ) );

  // General
  CSF::createSection( $prefix, array(
    'parent'   => 'blog_section',
    'name'     => 'blog_general_tab',
    'title'    => esc_html__('General', 'windfall'),
    'icon'     => 'fa fa-cog',
    'fields' => array(

      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Layout', 'windfall')
      ),
      array(
        'id'             => 'blog_listing_style',
        'type'           => 'select',
        'title'          => esc_html__('Blog Listing Style', 'windfall'),
        'options'        => array(
          'style-one'   => esc_html__('Style One (List)', 'windfall'),
          'style-two'   => esc_html__('Style Two (Grid)', 'windfall'),
        ),
        'help'          => esc_html__('This style will apply, default blog pages - Like : Archive, Category, Tags, Search & Author. If this settings will not apply your blog page, please set that page as a post page in Settings > Readings.', 'windfall'),
      ),
      array(
        'id'             => 'blog_listing_columns',
        'type'           => 'select',
        'title'          => esc_html__('Blog Listing Columns', 'windfall'),
        'options'        => array(
          'col-3' => esc_html__('Column Three', 'windfall'),
          'col-2' => esc_html__('Column Two', 'windfall'),
        ),
        'placeholder' => 'Select blog column',
        'dependency'     => array('blog_listing_style', '==', 'style-two'),
      ),
      array(
        'id'             => 'blog_sidebar_position',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Position', 'windfall'),
        'options'        => array(
          'sidebar-right' => esc_html__('Right', 'windfall'),
          'sidebar-left' => esc_html__('Left', 'windfall'),
          'sidebar-hide' => esc_html__('Hide', 'windfall'),
        ),
        'placeholder' => 'Select sidebar position',
        'help'          => esc_html__('This style will apply, default blog pages - Like : Archive, Category, Tags, Search & Author.', 'windfall'),
        'desc'          => esc_html__('Default option : Right', 'windfall'),
      ),
      array(
        'id'             => 'blog_widget',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Widget', 'windfall'),
        'options'        => 'sidebars',
        'placeholder'    => esc_html__('Select Widget', 'windfall'),
        'dependency'     => array('blog_sidebar_position', '!=', 'sidebar-hide'),
        'desc'           => esc_html__('Default option : Main Widget Area', 'windfall'),
      ),
      array(
        'id'             => 'blog_sidebar_type',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Type', 'windfall'),
        'options'        => array(
          'default' => esc_html__('Default', 'windfall'),
          'floating' => esc_html__('Floating', 'windfall'),
          'sticky' => esc_html__('Sticky', 'windfall'),
        ),
        'dependency'     => array('blog_sidebar_position', '!=', 'sidebar-hide'),
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Global Options', 'windfall')
      ),
      array(
        'id'    => 'blog_aqr',
        'type'  => 'switcher',
        'title' => esc_html__('Disable Image Resize?', 'windfall'),
        'desc' => esc_html__('If need to disable image resize, please turn this ON.', 'windfall'),
        'default' => false,
      ),
      array(
        'id'         => 'theme_exclude_categories',
        'type'       => 'checkbox',
        'title'      => esc_html__('Exclude Categories', 'windfall'),
        'desc'      => esc_html__('Select categories you want to exclude from blog page.', 'windfall'),
        'options'    => 'categories',
      ),
      array(
        'id'            => 'theme_blog_excerpt',
        'type'          => 'spinner',
        'title'         => esc_html__('Excerpt Length', 'windfall'),
        'subtitle'      => esc_html__('max:200 | min:0 | step:1', 'windfall'),
        'max'           => 200,
        'min'           => 0,
        'step'          => 1,
        'default'       => 35,
      ),
      array(
        'id'      => 'theme_metas_hide',
        'type'    => 'checkbox',
        'title'   => esc_html__('Meta\'s to hide', 'windfall'),
        'desc'    => esc_html__('Check items you want to hide from blog/post meta field.', 'windfall'),
        'inline'  => true,
        'options'    => array(
          'category'   => esc_html__('Category', 'windfall'),
          'date'    => esc_html__('Date', 'windfall'),
          'author'     => esc_html__('Author', 'windfall'),
        ),
      ),
      array(
        'id'        => "blog_date_format",
        'type'      => 'text',
        'title'     => esc_html__('Date Format', 'windfall'),
        'desc'      => 'Enter date format (for more info <a href="https://codex.wordpress.org/Formatting_Date_and_Time" target="_blank">click here</a>)',
      ),

    )
    ) );

  // General
  CSF::createSection( $prefix, array(
    'parent'   => 'blog_section',
    'name'     => 'blog_single_tab',
    'title'    => esc_html__('Single', 'windfall'),
    'icon'     => 'fa fa-sticky-note',
    'fields' => array(

      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Enable / Disable', 'windfall')
      ),
      array(
        'id'    => 'single_featured_image',
        'type'  => 'switcher',
        'title' => esc_html__('Featured Image', 'windfall'),
        'desc' => esc_html__('If need to hide featured image from single blog post page, please turn this OFF.', 'windfall'),
        'default' => true,
      ),
      array(
        'id'    => 'single_tag_list',
        'type'  => 'switcher',
        'title' => esc_html__('Tags', 'windfall'),
        'desc' => esc_html__('If need to hide tags from single blog post page, please turn this OFF.', 'windfall'),
        'default' => true,
      ),
      array(
        'id'    => 'single_share_option',
        'type'  => 'switcher',
        'title' => esc_html__('Share Option', 'windfall'),
        'desc' => esc_html__('If need to hide share option on single blog page, please turn this OFF.', 'windfall'),
        'default' => true,
      ),
      array(
        'id'    => 'single_author_info',
        'type'  => 'switcher',
        'title' => esc_html__('Author Info', 'windfall'),
        'desc' => esc_html__('If need to hide author info on single blog page, please turn this OFF.', 'windfall'),
        'default' => true,
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Related Posts', 'windfall')
      ),
      array(
        'id'    => 'single_related_post',
        'type'  => 'switcher',
        'title' => esc_html__('Related Posts', 'windfall'),
        'desc' => esc_html__('If need to hide related posts on single blog page, please turn this OFF.', 'windfall'),
        'default' => false,
      ),
      array(
        'id'      => 'single_related_title',
        'type'    => 'text',
        'title'   => esc_html__('Section Title', 'windfall'),
        'desc'   => esc_html__('Related post section title.', 'windfall'),
        'dependency'     => array('single_related_post', '==', 'true'),
      ),
      array(
        'id'            => 'single_related_limit',
        'type'          => 'spinner',
        'title'         => esc_html__('Excerpt Length', 'windfall'),
        'subtitle'      => esc_html__('max:100 | min:0 | step:1', 'windfall'),
        'max'           => 100,
        'min'           => 0,
        'step'          => 1,
        'default'       => 2,
        'dependency'     => array('single_related_post', '==', 'true'),
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Sidebar', 'windfall')
      ),
      array(
        'id'             => 'single_sidebar_position',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Position', 'windfall'),
        'options'        => array(
          'sidebar-right' => esc_html__('Right', 'windfall'),
          'sidebar-left' => esc_html__('Left', 'windfall'),
          'sidebar-hide' => esc_html__('Hide', 'windfall'),
        ),
        'placeholder' => 'Select sidebar position',
        'desc'          => esc_html__('Default option : Right', 'windfall'),
      ),
      array(
        'id'             => 'single_blog_widget',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Widget', 'windfall'),
        'options'        => 'sidebars',
        'placeholder'    => esc_html__('Select Widget', 'windfall'),
        'dependency'     => array('single_sidebar_position', '!=', 'sidebar-hide'),
        'desc'           => esc_html__('Default option : Main Widget Area', 'windfall'),
      ),
      array(
        'id'             => 'single_sidebar_type',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Type', 'windfall'),
        'options'        => array(
          'default' => esc_html__('Default', 'windfall'),
          'floating' => esc_html__('Floating', 'windfall'),
          'sticky' => esc_html__('Sticky', 'windfall'),
        ),
        'dependency'     => array('single_sidebar_position', '!=', 'sidebar-hide'),
      ),

    )
  ) );

  // Woocommerce
  CSF::createSection( $prefix, array(
    'name'     => 'woocommerce_section',
    'title'    => esc_html__('Woocommerce', 'windfall'),
    'icon'     => 'fa fa-shopping-cart',
    'fields' => array(

      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Layout', 'windfall')
      ),
      array(
        'id'             => 'woo_product_columns',
        'type'           => 'select',
        'title'          => esc_html__('Product Column', 'windfall'),
        'options'        => array(
          3 => esc_html__('Three Column', 'windfall'),
          4 => esc_html__('Four Column', 'windfall'),
        ),
        'placeholder' => esc_html__('Select Product Columns', 'windfall'),
        'help'          => esc_html__('This style will apply, default woocommerce listings pages. Like, shop and archive pages.', 'windfall'),
      ),
      array(
        'id'             => 'woo_sidebar_position',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Position', 'windfall'),
        'options'        => array(
          'right-sidebar' => esc_html__('Right', 'windfall'),
          'left-sidebar' => esc_html__('Left', 'windfall'),
          'sidebar-hide' => esc_html__('Hide', 'windfall'),
        ),
        'placeholder' => esc_html__('Select sidebar position', 'windfall'),
        'desc'          => esc_html__('Default option : Right', 'windfall'),
      ),
      array(
        'id'             => 'woo_widget',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Widget', 'windfall'),
        'options'        => 'sidebars',
        'placeholder' => esc_html__('Select Widget', 'windfall'),
        'dependency'     => array('woo_sidebar_position', '!=', 'sidebar-hide'),
        'desc'           => esc_html__('Default option : Main Widget Area', 'windfall'),
      ),
      array(
        'id'             => 'woo_sidebar_type',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Style', 'windfall'),
        'options'        => array(
          'normal'       => esc_html__('Normal', 'windfall'),
          'bar-sticky'   => esc_html__('Sticky', 'windfall'),
          'bar-float'    => esc_html__('Floating', 'windfall'),
        ),
        'placeholder' => 'Select Sidebar Style',
        'dependency'     => array('woo_sidebar_position', '!=', 'sidebar-hide'),
      ),

      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Listing', 'windfall')
      ),
      array(
        'id'      => 'theme_woo_limit',
        'type'    => 'text',
        'title'   => esc_html__('Product Limit', 'windfall'),
        'desc'   => esc_html__('Enter the number value for per page products limit.', 'windfall'),
      ),

      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Single Product', 'windfall')
      ),
      array(
        'id'    => 'woo_single_related',
        'type'  => 'switcher',
        'title' => esc_html__('Related Products', 'windfall'),
        'desc' => esc_html__('If you want \'Related Products\' in single product page, please turn this ON.', 'windfall'),
        'default' => false,
      ),
      array(
        'id'             => 'woo_related_limit',
        'type'           => 'text',
        'title'          => esc_html__('Related Products Limit', 'windfall'),
        'dependency'     => array('woo_single_related', '==', 'true'),
      ),
      array(
        'id'             => 'woo_related_title',
        'type'           => 'text',
        'title'          => esc_html__('Related Products Title', 'windfall'),
        'dependency'     => array('woo_single_related', '==', 'true'),
      ),
      array(
        'id'    => 'woo_single_upsell',
        'type'  => 'switcher',
        'title' => esc_html__('You May Also Like(Upsell)', 'windfall'),
        'desc' => esc_html__('If you want \'You May Also Like\' products in single product page, please turn this ON.', 'windfall'),
        'default' => false,
      ),
      array(
        'id'             => 'up_sell_column',
        'type'           => 'select',
        'title'          => esc_html__('Up-Sell Products Column', 'windfall'),
        'options'        => array(
          3 => esc_html__('Three Column', 'windfall'),
          4 => esc_html__('Four Column', 'windfall'),
        ),
        'placeholder' => esc_html__('Select Product Columns', 'windfall'),
        'dependency'     => array('woo_single_upsell', '==', 'true'),
      ),
      array(
        'id'    => 'woo_single_crosssell',
        'type'  => 'switcher',
        'title' => esc_html__('You May interested in(Cross Sell)', 'windfall'),
        'desc' => esc_html__('If you want \'You May interested in\' products in cart page, please turn this ON.', 'windfall'),
        'default' => false,
      ),

    )
  ) );

  // Extra Pages Parent
  CSF::createSection( $prefix, array(
    'id'       => 'theme_extra_pages',
    'title'    => esc_html__('Extra Pages', 'windfall'),
    'icon'     => 'fa fa-clone',
  ) );

  // 404
  CSF::createSection( $prefix, array(
    'parent'   => 'theme_extra_pages',
    'name'     => 'error_page_section',
    'title'    => esc_html__('404 Page', 'windfall'),
    'icon'     => 'fa fa-exclamation-triangle',
    'fields' => array(

      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('404 Error Page Options', 'windfall')
      ),
      array(
        'id'    => 'error_page_title',
        'type'  => 'text',
        'title' => esc_html__('404 Text', 'windfall'),
        'desc'  => esc_html__('Enter title text here.', 'windfall'),
      ),
      array(
        'id'    => 'error_heading',
        'type'  => 'text',
        'title' => esc_html__('404 Page Heading', 'windfall'),
        'desc'  => esc_html__('Enter 404 page heading.', 'windfall'),
      ),
      array(
        'id'    => 'error_title_content',
        'type'  => 'text',
        'title' => esc_html__('404 Title Content', 'windfall'),
        'desc'  => esc_html__('Enter content text here.', 'windfall'),
      ),
      array(
        'id'    => 'error_btn_text',
        'type'  => 'text',
        'title' => esc_html__('Button Text', 'windfall'),
        'desc'  => esc_html__('Enter BACK TO HOME button text. If you want to change it.', 'windfall'),
      ),

    )
  ) );

  // Maintenance
  CSF::createSection( $prefix, array(
    'parent'   => 'theme_extra_pages',
    'name'     => 'maintenance_mode_section',
    'title'    => esc_html__('Maintenance Mode', 'windfall'),
    'icon'     => 'fa fa-hourglass-half',
    'fields'   => array(

      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('If you turn this ON : Only Logged in users will see your pages. All other visiters will see, selected page of : Maintenance Mode Page', 'windfall')
      ),
      array(
        'id'    => 'enable_maintenance_mode',
        'type'  => 'switcher',
        'title' => esc_html__('Maintenance Mode', 'windfall'),
        'default' => false,
      ),
      array(
        'id'    => 'elementor_page',
        'type'  => 'switcher',
        'title' => esc_html__('Elementor Page', 'windfall'),
        'desc'  => esc_html__('Enable if your selected page is edited by elementor.', 'windfall'),
        'default' => false,
        'dependency'   => array( 'enable_maintenance_mode', '==', 'true' ),
      ),
      array(
        'id'             => 'maintenance_mode_page',
        'type'           => 'select',
        'title'          => esc_html__('Maintenance Mode Page', 'windfall'),
        'options'        => 'pages',
        'placeholder'    => esc_html__('Select a page', 'windfall'),
        'dependency'     => array( 'enable_maintenance_mode', '==', 'true' ),
      ),

    )
  ) );

  // Misc Parent
  CSF::createSection( $prefix, array(
    'id'       => 'misc_section',
    'title'    => esc_html__('Misc', 'windfall'),
    'icon'     => 'fa fa-recycle',
  ) );

  // Custom Sidebar
  CSF::createSection( $prefix, array(
    'parent'   => 'misc_section',
    'name'     => 'custom_sidebar_section',
    'title'    => esc_html__('Custom Sidebar', 'windfall'),
    'icon'     => 'fa fa-reorder',
    'fields'   => array(

      array(
        'id'     => 'custom_sidebar',
        'type'   => 'group',
        'title'           => esc_html__('Sidebars', 'windfall'),
        'subtitle'        => esc_html__('Go to Appearance -> Widgets after create sidebars', 'windfall'),
        'button_title'    => esc_html__('Add New Sidebar', 'windfall'),
        'fields' => array(
          array(
            'id'    => 'sidebar_name',
            'type'  => 'text',
            'title' => esc_html__('Sidebar Name', 'windfall'),
          ),
          array(
            'id'    => 'sidebar_desc',
            'type'  => 'text',
            'title' => esc_html__('Custom Description', 'windfall'),
          ),
        ),
         'default'             => array(
            array(
              'sidebar_name'   => esc_html__('Faq WIdget', 'windfall'),
              'sidebar_desc'   => esc_html__('Appears on Faq Page', 'windfall'),
            ),
            array(
              'sidebar_name'   => esc_html__('Service Single', 'windfall'),
              'sidebar_desc'   => esc_html__('Appears on service single Page', 'windfall'),
            ),
            array(
              'sidebar_name'   => esc_html__('Above Footer', 'windfall'),
              'sidebar_desc'   => esc_html__('Appears just above the footer in all Pages', 'windfall'),
            ),
          ),
      ),

    )
  ) );

  // Translation
  CSF::createSection( $prefix, array(
    'parent'   => 'misc_section',
    'name'     => 'theme_translation_section',
    'title'    => esc_html__('Translation', 'windfall'),
    'icon'     => 'fa fa-language',
    'fields'   => array(

      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Common Texts', 'windfall')
      ),
      array(
        'id'          => 'author_by_text',
        'type'        => 'text',
        'title'       => esc_html__('Author By Text', 'windfall'),
      ),
      array(
        'id'          => 'read_more_text',
        'type'        => 'text',
        'title'       => esc_html__('Read More Text', 'windfall'),
      ),
      array(
        'id'          => 'share_text',
        'type'        => 'text',
        'title'       => esc_html__('Share Text', 'windfall'),
      ),
      array(
        'id'          => 'share_on_text',
        'type'        => 'text',
        'title'       => esc_html__('Share On Tooltip Text', 'windfall'),
      ),
      array(
        'id'          => 'author_text',
        'type'        => 'text',
        'title'       => esc_html__('Author Text', 'windfall'),
      ),
      array(
        'id'          => 'post_comment_text',
        'type'        => 'text',
        'title'       => esc_html__('Post Comment Text [Submit Button]', 'windfall'),
      ),
      array(
        'id'          => 'team_social_title',
        'type'        => 'text',
        'title'       => esc_html__('Team Social Title [Meet me on:]', 'windfall'),
      ),

      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Filter All Texts', 'windfall')
      ),
      array(
        'id'          => 'gallery_all_text',
        'type'        => 'text',
        'title'       => esc_html__('Filter All Text (Gallery)', 'windfall'),
      ),

    )
  ) );

  // Backup
  CSF::createSection( $prefix, array(
    'name'     => 'backup_section',
    'title'    => esc_html__('Backup', 'windfall'),
    'icon'     => 'fa fa-shield',
    'fields' => array(

      // Site Logo
      array(
        'type'    => 'submessage',
        'style'   => 'warning',
        'content' => esc_html__('You can save your current options. Download a Backup and Import.', 'windfall'),
      ),
      array(
        'type'    => 'backup',
      ),

    )
  ) );

}
