<?php
/*
 * All Metabox related options for Windfall theme.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  $cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
  $contact_forms = array();
  if ( $cf7 ) {
    foreach ( $cf7 as $cform ) {
      $contact_forms[ $cform->ID ] = $cform->post_title;
    }
  } else {
    $contact_forms[ __( 'No contact forms found', 'windfall' ) ] = 0;
  }

  $templates = get_posts( 'post_type="elementor_library"&numberposts=-1' );
  $elementor_templates = array();
  if ( $templates ) {
    foreach ( $templates as $template ) {
      $elementor_templates[ $template->ID ] = $template->post_title;
    }
  } else {
    $elementor_templates[ __( 'No templates found', 'windfall' ) ] = 0;
  }

  // Layout Options
  $meta_prefix_layout = 'page_layout_options';

  CSF::createMetabox( $meta_prefix_layout, array(
    'id'        => 'page_layout_options',
    'title'     => esc_html__('Page Layout', 'windfall'),
    'post_type' => 'page',
    'context'   => 'side',
  ) );

  // Layout
  CSF::createSection( $meta_prefix_layout, array(
    'parent' => 'page_layout_options',
    'name'   => 'page_layout_section',
    'fields' => array(

      array(
        'id'        => 'page_layout',
        'type'      => 'image_select',
        'title'          => esc_html__('Page Layout Options', 'windfall'),
        'options'   => array(
          'default'       => WINDFALL_PLUGIN_IMGS . '/pages/page-0.png',
          'full-width'    => WINDFALL_PLUGIN_IMGS . '/pages/page-2.png',
          'left-sidebar'  => WINDFALL_PLUGIN_IMGS . '/pages/page-3.png',
          'right-sidebar' => WINDFALL_PLUGIN_IMGS . '/pages/page-4.png',
        ),
        'default'    => 'default',
      ),
      array(
        'id'             => 'page_sidebar_widget',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Widget', 'windfall'),
        'options'        => 'sidebars',
        'default_option' => esc_html__('Select Widget', 'windfall'),
        'dependency'     => array('page_layout', 'any', 'left-sidebar,right-sidebar'),
      ),
      array(
        'id'        => 'sidebar_type',
        'type'      => 'select',
        'title'     => esc_html__('Sidebar Type', 'windfall'),
        'options'   => array(
          'default'    => 'Default',
          'floating'   => 'Floating',
          'sticky' => 'Sticky',
        ),
        'dependency'     => array('page_layout', 'any', 'left-sidebar,right-sidebar'),
      ),

    )
  ) );

  // Set a unique slug-like ID
  $meta_prefix = 'page_type_metabox';

  // Page Custom Options
  CSF::createMetabox( $meta_prefix, array(
    'id'        => 'page_type_metabox',
    'title'     => esc_html__('Page Custom Options', 'windfall'),
    'post_type' => array('post', 'page', 'testimonial', 'team', 'product', 'gallery'),
    'context'   => 'normal',
    'priority'  => 'default',
  ) );

  // Topbar
  CSF::createSection( $meta_prefix, array(
    'name'  => 'topbar_section',
    'title' => esc_html__('Topbar', 'windfall'),
    'icon'  => 'fa fa-ellipsis-h',
    'fields' => array(

      array(
        'id'           => 'topbar_options',
        'type'         => 'image_select',
        'title'        => esc_html__('Select Header Design', 'windfall'),
        'options'      => array(
          'default'     => WINDFALL_PLUGIN_IMGS .'/topbar-default.png',
          'custom'      => WINDFALL_PLUGIN_IMGS .'/topbar-custom.png',
          'hide_topbar' => WINDFALL_PLUGIN_IMGS .'/topbar-hide.png',
        ),
        'radio'        => true,
        'default'   => 'default',
      ),
      array(
        'id'          => 'top_left',
        'type'        => 'textarea',
        'title'       => esc_html__('Top Left', 'windfall'),
        'dependency'  => array('topbar_options', '==', 'custom'),
        'shortcoder' => 'windfall_vt_shortcodes',
      ),
      array(
        'id'          => 'top_right',
        'type'        => 'textarea',
        'title'       => esc_html__('Top Right', 'windfall'),
        'dependency'  => array('topbar_options', '==', 'custom'),
        'shortcoder' => 'windfall_vt_shortcodes',
      ),

    )
  ) );

  // Header
  CSF::createSection( $meta_prefix, array(
    'name'  => 'header_section',
    'title' => esc_html__('Header', 'windfall'),
    'icon'  => 'fa fa-bars',
    'fields' => array(

      array(
        'id'           => 'select_header_design',
        'type'         => 'image_select',
        'title'        => esc_html__('Select Header Design', 'windfall'),
        'options'      => array(
          'default'     => WINDFALL_PLUGIN_IMGS .'/hs-0.png',
          'style_one'    => WINDFALL_PLUGIN_IMGS .'/hs-1.png',
          'style_two'    => WINDFALL_PLUGIN_IMGS .'/hs-2.png',
        ),
        'radio'        => true,
        'default'   => 'default',
        'info' => esc_html__('Select your header design, following options will may differ based on your selection of header design.', 'windfall'),
      ),
      array(
        'id'        => 'fullwidth_menubar',
        'type'      => 'select',
        'title'     => esc_html__('Fullwidth Menu Bar', 'windfall'),
        'options'   => array(
          'default'    => 'Default(Theme Options)',
          'fullwidth'   => 'Fullwidth',
          'container' => 'Container Width',
        ),
        'dependency'   => array('select_header_design', '==', 'style_one'),
      ),
      array(
        'id'             => 'choose_menu',
        'type'           => 'select',
        'title'          => esc_html__('Choose Menu', 'windfall'),
        'desc'          => esc_html__('Choose custom menus for this page.', 'windfall'),
        'options'        => 'menus',
        'default_option' => esc_html__('Select your menu', 'windfall'),
      ),
      array(
        'id'    => 'one_page_menu',
        'type'  => 'switcher',
        'title' => esc_html__('One Page Scroll Menu', 'windfall'),
        'label' => esc_html__('Yes, Please do it.', 'windfall'),
      ),
      array(
        'id'        => 'search_icon',
        'type'      => 'select',
        'title'     => esc_html__('Search Icon', 'windfall'),
        'options'   => array(
          'default'    => 'Default(Theme Options)',
          'show' => 'Show',
          'hide'   => 'Hide',
        ),
      ),

    )
  ) );

  // Banner & Title Area
  CSF::createSection( $meta_prefix, array(
    'name'  => 'banner_title_section',
    'title' => esc_html__('Banner & Title Area', 'windfall'),
    'icon'  => 'fa fa-bullhorn',
    'fields' => array(

      array(
        'id'        => 'banner_type',
        'type'      => 'select',
        'title'     => esc_html__('Choose Banner Type', 'windfall'),
        'options'   => array(
          'default-title'    => 'Default Title',
          'revolution-slider' => 'Shortcode [Rev Slider]',
          'elementor-templates' => 'Elementor Templates',
          'hide-title-area'   => 'Hide Title/Banner Area',
        ),
      ),
      array(
        'id'             => 'ele_templates',
        'type'           => 'select',
        'title'          => esc_html__('Elementor Templates', 'windfall'),
        'desc'          => esc_html__('Choose template for this page.', 'windfall'),
        'options'        => $elementor_templates,
        'default_option' => esc_html__('Select your template', 'windfall'),
        'dependency'   => array('banner_type', '==', 'elementor-templates' ),
      ),
      array(
        'id'    => 'page_revslider',
        'type'  => 'textarea',
        'title' => esc_html__('Revolution Slider or Any Shortcodes', 'windfall'),
        'desc' => esc_html__('Enter any shortcodes that you want to show in this page title area. <br />Eg : Revolution Slider shortcode.', 'windfall'),
        'attributes' => array(
          'placeholder' => esc_html__('Enter your shortcode...', 'windfall'),
        ),
        'dependency'   => array('banner_type', '==', 'revolution-slider' ),
      ),
      array(
        'id'    => 'page_custom_title',
        'type'  => 'text',
        'title' => esc_html__('Custom Title', 'windfall'),
        'attributes' => array(
          'placeholder' => esc_html__('Enter your custom title...', 'windfall'),
        ),
        'dependency'   => array('banner_type', '==', 'default-title'),
      ),

      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Spaces & Background Options', 'windfall'),
        'dependency'   => array('banner_type', '==', 'default-title'),
      ),
      array(
        'id'        => 'title_area_spacings',
        'type'      => 'select',
        'title'     => esc_html__('Title Area Spacings', 'windfall'),
        'options'   => array(
          'padding-default' => esc_html__('Default Spacing', 'windfall'),
          'padding-xs' => esc_html__('Extra Small Padding', 'windfall'),
          'padding-sm' => esc_html__('Small Padding', 'windfall'),
          'padding-md' => esc_html__('Medium Padding', 'windfall'),
          'padding-lg' => esc_html__('Large Padding', 'windfall'),
          'padding-xl' => esc_html__('Extra Large Padding', 'windfall'),
          'padding-no' => esc_html__('No Padding', 'windfall'),
          'padding-custom' => esc_html__('Custom Padding', 'windfall'),
        ),
        'dependency'   => array('banner_type', '==', 'default-title'),
      ),
      array(
        'id'    => 'title_top_bottom_padding',
        'type'  => 'spacing',
        'title' => esc_html__('Title Bar Top & Bottom Space', 'windfall'),
        'left'  => false,
        'right' => false,
        'dependency'  => array('banner_type|title_area_spacings', '==|==', 'default-title|padding-custom'),
      ),
      array(
        'id'    => 'title_area_bg',
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
        'title' => esc_html__('Background', 'windfall'),
        'dependency'   => array('banner_type', '==', 'default-title'),
      ),
      array(
        'id'    => 'title_area_bg_size',
        'type'    => 'spinner',
        'max'     => 1000,
        'min'     => 1,
        'step'    => 1,
        'attributes'  => array( 'placeholder' => '400' ),
        'unit'     => 'px',
        'title' => esc_html__('Background Size', 'windfall'),
        'dependency'  => array('banner_type', '==', 'default-title'),
      ),
      array(
        'id'    => 'titlebar_bg_overlay_color',
        'type'  => 'color',
        'title' => esc_html__('Overlay Color', 'windfall'),
        'dependency'   => array('banner_type', '==', 'default-title'),
      ),
      array(
        'id'    => 'hide_overlay',
        'type'  => 'switcher',
        'title' => esc_html__('Hide Overlay', 'windfall'),
        'label' => esc_html__('Yes, Please do it.', 'windfall'),
        'dependency'   => array('banner_type', '==', 'default-title'),
      ),

    )
  ) );

  // Content
  CSF::createSection( $meta_prefix, array(
    'name'  => 'page_content_options',
    'title' => esc_html__('Content Options', 'windfall'),
    'icon'  => 'fa fa-file',
    'fields' => array(

      array(
        'id'        => 'content_spacings',
        'type'      => 'select',
        'title'     => esc_html__('Content Spacings', 'windfall'),
        'options'   => array(
          'padding-default' => esc_html__('Default Spacing', 'windfall'),
          'padding-xs' => esc_html__('Extra Small Padding', 'windfall'),
          'padding-sm' => esc_html__('Small Padding', 'windfall'),
          'padding-md' => esc_html__('Medium Padding', 'windfall'),
          'padding-lg' => esc_html__('Large Padding', 'windfall'),
          'padding-xl' => esc_html__('Extra Large Padding', 'windfall'),
          'padding-cnt-no' => esc_html__('No Padding', 'windfall'),
          'padding-custom' => esc_html__('Custom Padding', 'windfall'),
        ),
        'desc' => esc_html__('Content area top and bottom spacings.', 'windfall'),
      ),
      array(
        'id'    => 'content_top_bottom_padding',
        'type'  => 'spacing',
        'title' => esc_html__('Content Top & Bottom Space', 'windfall'),
        'left'  => false,
        'right' => false,
        'dependency'  => array('content_spacings', '==', 'padding-custom'),
      ),

    )
  ) );

  // Enable & Disable
  CSF::createSection( $meta_prefix, array(
    'name'  => 'hide_show_section',
    'title' => esc_html__('Enable & Disable', 'windfall'),
    'icon'  => 'fa fa-toggle-on',
    'fields' => array(

      array(
        'id'    => 'hide_header',
        'type'  => 'switcher',
        'title' => esc_html__('Hide Header', 'windfall'),
        'label' => esc_html__('Yes, Please do it.', 'windfall'),
      ),
      array(
        'id'    => 'hide_breadcrumbs',
        'type'  => 'switcher',
        'title' => esc_html__('Hide Breadcrumbs', 'windfall'),
        'label' => esc_html__('Yes, Please do it.', 'windfall'),
      ),
      array(
        'id'        => 'above_footer_widget',
        'type'      => 'select',
        'title'     => esc_html__('Above Footer Widget', 'windfall'),
        'options'   => array(
          'default'    => 'Default(Theme Options)',
          'show' => 'Show',
          'hide'   => 'Hide',
        ),
      ),
      array(
        'id'    => 'hide_footer',
        'type'  => 'switcher',
        'title' => esc_html__('Hide Footer', 'windfall'),
        'label' => esc_html__('Yes, Please do it.', 'windfall'),
      ),
      array(
        'id'    => 'hide_copyright',
        'type'  => 'switcher',
        'title' => esc_html__('Hide Copyright', 'windfall'),
        'label' => esc_html__('Yes, Please do it.', 'windfall'),
      ),

    )
  ) );

  // Gallery Options
  $meta_prefix_gallery = 'windfall_csf_meta_options_gallery';
  CSF::createMetabox( $meta_prefix_gallery, array(
    'id'        => 'gallery_post_type_metabox',
    'title'     => esc_html__('Gallery Options', 'windfall'),
    'post_type' => 'gallery',
    'context'   => 'normal',
    'priority'  => 'high',
  ) );

  // Gallery
  CSF::createSection( $meta_prefix_gallery, array(
    'parent'   => 'gallery_post_type_metabox',
    'name'     => 'section_gallery_formats',
    'fields' => array(

      array(
        'id'        => 'gallery_type',
        'type'      => 'select',
        'title'     => esc_html__('Choose Gallery Type', 'groppe'),
        'options'   => array(
          'image'    => esc_html__( 'Standard Image', 'groppe' ),
          'gallery'    => esc_html__( 'Slider', 'groppe' ),
          'video'    => esc_html__( 'Video', 'groppe' ),
          'link'    => esc_html__( 'link', 'groppe' ),
        ),
        'attributes' => array(
          'data-depend-id' => 'gallery_type',
        ),
      ),
      array(
        'id'              => 'video_post',
        'type'            => 'text',
        'title'           => esc_html__('Video URL', 'groppe'),
        'dependency'  => array('gallery_type', '==', 'video'),
      ),
      array(
        'id'              => 'link_post',
        'type'            => 'text',
        'title'           => esc_html__('URL', 'groppe'),
        'dependency'  => array('gallery_type', '==', 'link'),
      ),
      // Standard, Image
      array(
        'title' => esc_html__( 'Image', 'groppe' ),
        'type'  => 'subheading',
        'content' => esc_html__('There is no Extra Option for this image type! Upload Featured Image only.', 'groppe'),
        'wrap_class' => 'vt-minimal-heading hide-title',
        'dependency'  => array('gallery_type', '==', 'image'),
      ),
      // Standard, Image

      // Gallery
      array(
        'id'          => 'gallery_post_images',
        'title' => esc_html__( 'Slider Images', 'groppe' ),
        'type'        => 'gallery',
        'add_title'   => esc_html__('Add Image(s)', 'groppe'),
        'edit_title'  => esc_html__('Edit Image(s)', 'groppe'),
        'clear_title' => esc_html__('Clear Image(s)', 'groppe'),
        'dependency'  => array('gallery_type', '==', 'gallery'),
      ),

    )
  ) );

  // Post Options
  $meta_prefix_post = 'windfall_csf_meta_options_post';

  CSF::createMetabox( $meta_prefix_post, array(
    'id'        => 'post_type_metabox',
    'title'     => esc_html__('Post Options', 'windfall'),
    'post_type' => 'post',
    'context'   => 'normal',
    'priority'  => 'default',
    'post_formats'  => 'gallery',
  ) );

  // Post
  CSF::createSection( $meta_prefix_post, array(
    'parent'   => 'post_type_metabox',
    'name'     => 'section_post_formats',
    'fields' => array(

      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('There is no Extra Option for this Post Format!', 'windfall'),
      ),

    )
  ) );

  // Testimonial Options
  $meta_prefix_testi = 'windfall_csf_meta_options_testi';

  CSF::createMetabox( $meta_prefix_testi, array(
    'id'        => 'testimonial_options',
    'title'     => esc_html__('Testimonial Client', 'windfall'),
    'post_type' => 'testimonial',
    'context'   => 'side',
    'priority'  => 'default',
  ) );

  // Testimonial
  CSF::createSection( $meta_prefix_testi, array(
    'parent'   => 'testimonial_options',
    'name'  => 'testimonial_option_section',
    'fields' => array(

      array(
        'id'      => 'testi_location',
        'type'    => 'text',
        'title'     => esc_html__('Location', 'windfall'),
        'attributes' => array(
          'placeholder' => esc_html__('Eg : California', 'windfall'),
        ),
        'info'    => esc_html__('Enter job position in your company.', 'windfall'),
      ),
      array(
        'id'      => 'testi_position',
        'type'    => 'text',
        'title'     => esc_html__('Position', 'windfall'),
        'attributes' => array(
          'placeholder' => esc_html__('Eg : Financial Manager', 'windfall'),
        ),
        'info'    => esc_html__('Enter job position in your company.', 'windfall'),
      ),
      array(
        'id'        => 'testi_rating',
        'type'      => 'select',
        'title'     => esc_html__('Testimonial Ratings', 'windfall'),
        'options'   => array(
          '1' => esc_html__('1', 'windfall'),
          '2' => esc_html__('2', 'windfall'),
          '3' => esc_html__('3', 'windfall'),
          '4' => esc_html__('4', 'windfall'),
          '5' => esc_html__('5', 'windfall'),
        ),
      ),

    )
  ) );

  // Team Options
  $meta_prefix_team = 'windfall_csf_meta_options_team';

  CSF::createMetabox( $meta_prefix_team, array(
    'id'        => 'team_options',
    'title'     => esc_html__('Team Member Details', 'windfall'),
    'post_type' => 'team',
    'context'   => 'side',
    'priority'  => 'default',
  ) );

  // Team
  CSF::createSection( $meta_prefix_team, array(
    'parent'   => 'team_options',
    'name'  => 'team_option_section',
    'fields' => array(

      array(
        'id'      => 'team_job_position',
        'title'   => esc_html__('Job Position', 'windfall'),
        'type'    => 'text',
        'attributes' => array(
          'placeholder' => esc_html__('Eg : Financial Manager', 'windfall'),
        ),
        'info'    => esc_html__('Enter this employee job position, in your company.', 'windfall'),
      ),
      // Contact fields
      array(
        'id'                  => 'contact_details',
        'type'                => 'group',
        'title'    => esc_html__('Contact Details', 'windfall'),
        'button_title'       => 'Add New',
        'fields'              => array(

          array(
            'id'              => 'contact_title',
            'type'            => 'text',
            'title'           => esc_html__('Enter your title', 'windfall'),
          ),
          array(
            'id'              => 'contact_icon',
            'type'            => 'icon',
            'title'           => esc_html__('Selected your contact icon', 'windfall'),
          ),
          array(
            'id'              => 'contact_text',
            'type'            => 'text',
            'title'           => esc_html__('Enter your text', 'windfall'),
          ),
          array(
            'id'              => 'contact_link',
            'type'            => 'text',
            'title'           => esc_html__('Enter your link', 'windfall'),
          ),

        ),
      ),
      // Contact fields
      // Social fields
      array(
        'id'                  => 'social_icons',
        'type'                => 'group',
        'title'    => esc_html__('Social Icons', 'windfall'),
        'button_title'       => 'Add New Icon',
        'fields'              => array(
          array(
            'id'              => 'icon',
            'type'            => 'icon',
            'title'           => esc_html__('Selected your icon', 'windfall'),
          ),
          array(
            'id'              => 'icon_link',
            'type'            => 'text',
            'title'           => esc_html__('Enter your icon link', 'windfall'),
          ),
        ),
      ),
      // Social fields

    )
  ) );

}
