<?php
/*
* ---------------------------------------------------------------------
* VictorThemes Dynamic Style
* ---------------------------------------------------------------------
*/

function windfall_vt_scripts_styles_func() {

  // Main options
  $options = get_option( 'windfall_csf_customizer' );

  /* Custom Font */
  $all_element_color  = $options['all_element_colors'];
  $all_element_secondary_colors = $options['all_element_secondary_colors'];

  echo '<style>';
  if($all_element_color) {
  ?>
    .no-class {}
    .wndfal-preloader, .wndfal-back-top a, .wndfal-callout, .wndfal-form input[type="submit"],.wndfal-footer input[type="submit"],.more-btn:hover, .more-btn:focus, .appointment-style-two .appointment-form, .bullet-list li:before, .widget-contact-info .wndfal-icon, .table thead th, .testimonials-style-two .owl-carousel button.owl-dot.active, .testimonials-style-three .owl-carousel button.owl-dot.active,.woocommerce .cart_totals .calculate-shipping input[type="submit"], .woocommerce .cart_totals .shipping-calculator-form button.button, blockquote:before, .wndfal-partners .owl-carousel button.owl-dot.active, .btn-text-wrap, .masonry-filters ul li a:after, .wndfal-navigation ul li.open > .dropdown-arrow, .callout-style-two .wndfal-btn:hover,.callout-style-two .wndfal-btn:focus,.owl-carousel button.owl-dot.active, .more-btn:hover, .more-btn:focus, .wndfal-intro, .services-style-three .service-item, .services-request input[type="submit"]:hover, .services-request input[type="submit"]:focus, .faq-form input[type="submit"]:hover, .faq-form input[type="submit"]:focus, .contact-form form input[type="submit"]:hover, .contact-form form input[type="submit"]:focus, .woocommerce .price_slider_amount button.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.woocommerce #review_form #respond .form-submit input:hover, .woocommerce #respond input#submit:hover, .woocommerce #review_form #respond .form-submit input:focus, .woocommerce #respond input#submit:focus, .woocommerce form .form-row input.button:hover, .woocommerce form .form-row input.button:focus, .woocommerce form .form-row button.button:hover, .woocommerce form .form-row button.button:focus,.wndfal-comment-form input[type="submit"]:hover, .wndfal-comment-form input[type="submit"]:focus,.woocommerce .cart .actions input[type="submit"].update-cart:hover, .woocommerce .cart .actions input[type="submit"].update-cart:focus,.woocommerce .widget_price_filter .price_slider_amount button.button:hover, .woocommerce .widget_price_filter .price_slider_amount button.button:focus, .woocommerce a.button:hover, .woocommerce button.button:hover, .wndfal-form .wndfal-comment-form input[type="submit"]:hover, .wndfal-form .wndfal-comment-form input[type="submit"]:focus, .comment-respond input[type="submit"]:hover, .comment-respond input[type="submit"]:focus {
      background-color: <?php echo esc_attr($all_element_color); ?>;
    }

    ::selection {background: <?php echo esc_attr($all_element_color); ?>;}
    ::-webkit-selection {background: <?php echo esc_attr($all_element_color); ?>;}
    ::-moz-selection {background: <?php echo esc_attr($all_element_color); ?>;}
    ::-o-selection {background: <?php echo esc_attr($all_element_color); ?>;}
    ::-ms-selection {background: <?php echo esc_attr($all_element_color); ?>;}

    .header-contact-info a:hover, .header-contact-info a:focus, .search-link a:hover, .search-link a:focus,.industry-title a:hover, .industry-title a:focus, .check-list li:before, .wndfal-link:hover, .wndfal-link:focus, .stats-item [class*="ti-"], .emergency-title a:hover, .emergency-title a:focus, .blog-date i, .footer-wrap a:hover, .footer-wrap a:focus, .wndfal-copyright a:hover, .call-link a:hover, .call-link a:focus, .industry-info .wndfal-link, .feature-item .wndfal-icon, .author-name a:hover, .services-emergency span i, .gallery-info a:hover, .gallery-info a:focus, .emergency-call-link a span, .breadcrumb a:hover, .author-rating i.active, .wndfal-faq .section-title-wrap a:hover, .faq-meta a:hover, .contact-info ul li [class*="ti-"], .contact-info ul li i, .contact-inner-info a:hover, .wndfal-widget ul li a:hover, .wndfal-widget ul li a:focus, .woocommerce .cart_totals .calculate-shipping a:hover, .woocommerce form .lost_password a:hover, .post-date i, .blog-date ul li a:hover, .wndfal-blog-tags a:hover, .woocommerce .star-rating span, .wndfal-navigation > ul > li.active > a, .breadcrumbs ul.trail-items li a:hover, .wndfal-widget.widget_rss ul li a:hover, .wndfal-widget.widget_recent_comments ul li a:hover, .woocommerce p.stars.selected a.active:before, .woocommerce p.stars:hover a:before, .woocommerce p.stars.selected a:not(.active)::before, .vt-nav-links > div:hover, .vt-nav-links > div:hover a, .footer-widget .header-contact-info a:hover, .header-style-one .wndfal-navigation > ul > li.current-menu-ancestor > a, .header-style-one .wndfal-navigation > ul > li.current-menu-parent > a {
      color: <?php echo esc_attr($all_element_color); ?>;
    }

    .woocommerce-product-search button:hover, .woocommerce .woocommerce-widget-layered-nav-dropdown__submit:hover, .testi-global .owl-carousel button.owl-dot.active, .saspot-social.rounded a:hover, .woocommerce .cart .actions button.button:hover, .woocommerce-account .addresses .title .edit:hover {
      background: <?php echo esc_attr($all_element_color); ?>;
    }

    .more-btn:hover, .more-btn:focus {border-color: <?php echo esc_attr($all_element_color); ?>;}

  <?php } if($all_element_secondary_colors) { ?>
    .no-class {}
    .wndfal-back-top a:hover, .wndfal-back-top a:focus, .service-item.wndfal-hover:after, .wndfal-form input[type="submit"]:hover, .wndfal-form input[type="submit"]:focus, .wndfal-footer input[type="submit"]:hover, .wndfal-footer input[type="submit"]:focus, .wndfal-emergency, .appointment-style-two .appointment-form input[type="submit"], .wndfal-callout.callout-style-two, .mate-designation, .services-emergency span, .navigation-wrap, .service-details .bullet-list li:before, .services-request input[type="submit"], .widget-services .btn-link, .faq-form input[type="submit"], .contact-form form input[type="submit"], .woocommerce ul.products li.product.wndfal-hover .button, .woocommerce ul.products li.product.wndfal-hover .added_to_cart, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce .widget_price_filter .price_slider_wrapper .ui-slider-horizontal .ui-slider-range, .tag-widget a:hover, .tag-widget a:focus, .tagcloud a:hover, .tagcloud a:focus,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #review_form #respond .form-submit input, .woocommerce #respond input#submit, .woocommerce .cart .actions .coupon input[type="submit"]:hover, .woocommerce .cart .actions .coupon input[type="submit"]:focus, .woocommerce .cart .actions input[type="submit"].update-cart, .woocommerce .cart_totals .calculate-shipping input[type="submit"]:hover, .woocommerce .cart_totals .calculate-shipping input[type="submit"]:focus,.woocommerce .cart_totals .shipping-calculator-form button.button:hover,.woocommerce .cart_totals .shipping-calculator-form button.button:focus,.woocommerce form .form-row input.button, .page-item.active .page-link, .woocommerce form .form-row button.button, .page-link:hover, .page-link:focus, .blog-detail .bullet-list li:before, .wndfal-social.square a:hover, .wndfal-social.square a:focus, .wndfal-comments-area a.comment-reply-link:hover, .wndfal-comments-area .comment-reply-link:focus, .wndfal-comment-form input[type="submit"], .comment-respond input[type="submit"] .wndfal-social.rounded a:before, .wndfal-social.rounded a:after, .blog-comment a:hover, .blog-comment a:focus, .widget_search form input[type="submit"]:hover, .widget_search form input[type="submit"]:focus, .download-item.wndfal-hover .wndfal-icon, .wndfal-btn:before, .wndfal-btn:after, .wndfal-btn .btn-text-wrap:before, .wndfal-btn .btn-text-wrap:after, .radio-icon-wrap input[type="radio"]:checked + .radio-icon:before, .woocommerce span.onsale, .wndfal-navigation ul li .dropdown-nav li.open > .dropdown-arrow, .woocommerce a.button, .woocommerce button.button {
      background-color: <?php echo esc_attr($all_element_secondary_colors); ?>;
    }

    .woocommerce-product-search button, .woocommerce .woocommerce-widget-layered-nav-dropdown__submit, .woocommerce .cart .actions input[type="submit"].update-cart, .woocommerce .cart .actions button.button, .woocommerce-account .addresses .title .edit, .owl-carousel .customer-name a:before, .owl-carousel .customer-name a:after {
      background: <?php echo esc_attr($all_element_secondary_colors); ?>;
    }

    a:hover, a:focus, .wndfal-btn:hover, .wndfal-social a:hover, .wndfal-social a:focus, .dropdown-nav > li:hover > a, .dropdown-nav > li:focus > a, .dropdown-nav > li.active > a, .dropdown-nav > li.sub .dropdown-nav li:hover a, .btn-link, .btn-link:hover, .btn-link:focus, .wndfal-link, .call-link a, .header-style-two .wndfal-navigation > ul > li.active > a, .header-style-two .wndfal-navigation > ul > li.has-dropdown.active > a .menu-text:after, .mate-info ul li a:hover, .download-item .wndfal-icon, .header-contact-info a, .testimonials-style-two .author-name, .reliable-style-two .wndfal-border-btn, .widget-services .bullet-list li.active a, .widget-services .bullet-list li a:hover, .testimonials-style-two .author-name, .testimonials-style-three .author-name, .wndfal-faq .section-title-wrap a, .faq-meta a, .woocommerce div.product .product_meta a:hover, .woocommerce #reviews #comments ol.commentlist li time, .woocommerce .cart_totals .calculate-shipping a, .error-title, .wndfal-error .wndfal-btn, .author-content .wndfal-social a:hover, .wndfal-comments-area .wndfal-comments-meta .comments-date, ul.mate-contact, ul.mate-contact li a, .dropdown-nav > li.current-menu-ancestor > a, .dropdown-nav > li.current-menu-parent > a {
      color: <?php echo esc_attr($all_element_secondary_colors); ?>;
    }

    .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .wndfal-comments-area .comment-reply-link:hover, .wndfal-comments-area .comment-reply-link:focus {
      border-color: <?php echo esc_attr($all_element_secondary_colors); ?>;
    }
  <?php }

  $topbar_bg_color = $options['topbar_bg_color'];
  if($topbar_bg_color) { ?>
  .no-class {}
  .wndfal-topbar {
    background-color: <?php echo esc_attr($topbar_bg_color['bg_color']); ?>;
  }
  .wndfal-topbar {
    border-color: <?php echo esc_attr($topbar_bg_color['border_color']); ?>;
  }
  <?php }

  $topbar_text_color = $options['topbar_text_color'];
  if($topbar_text_color){ ?>
  .no-class {}
  .wndfal-topbar, .wndfal-topbar .header-contact-info, .wndfal-topbar p {
    color: <?php echo esc_attr($topbar_text_color); ?>;
  }
  <?php }

  $topbar_link_color = $options['topbar_link_color'];
  if($topbar_link_color['color']) { ?>
  .no-class {}
  .wndfal-topbar a, .wndfal-topbar ul li a, .wndfal-topbar .header-contact-info a, .wndfal-topbar .wndfal-social a {
    color: <?php echo esc_attr($topbar_link_color['color']); ?>;
  }
  <?php } if($topbar_link_color['hover']) { ?>
  .wndfal-topbar a:hover, .wndfal-topbar ul li a:hover, .wndfal-topbar .header-contact-info a:hover, .wndfal-topbar .wndfal-social a:hover {
    color: <?php echo esc_attr($topbar_link_color['hover']); ?>;
  }
  <?php }
  // Header Style One
  $header_bg_color = $options['header_bg_color'];
  if($header_bg_color){ ?>
  .no-class {}
  .header-style-one .wndfal-header {
    background: <?php echo esc_attr($header_bg_color); ?>;
  }
  <?php }
  $header_text_color = $options['header_text_color'];
  if($header_text_color) { ?>
  .no-class {}
  .header-style-one .wndfal-header, .header-style-one .wndfal-header .header-contact-info, .header-style-one .wndfal-header p, .header-style-one .wndfal-header .header-contact-info span {
    color: <?php echo esc_attr($header_text_color); ?>;
  }
  <?php }
  $header_link_color = $options['header_link_color'];
  if($header_link_color['color']) { ?>
  .no-class {}
  .header-style-one .wndfal-header a, .header-style-one .wndfal-header .header-contact-info a {
    color: <?php echo esc_attr($header_link_color['color']); ?>;
  }
  <?php } if($header_link_color['hover']) { ?>
  .no-class {}
  .header-style-one .wndfal-header a:hover, .header-style-one .wndfal-header .header-contact-info a:hover {
    color: <?php echo esc_attr($header_link_color['hover']); ?>;
  }
  <?php }
  $menubar_bg_color = $options['menubar_bg_color'];
  if($menubar_bg_color) { ?>
  .no-class {}
  .header-style-one .navigation-wrap {
    background: <?php echo esc_attr($menubar_bg_color); ?>;
  }
  <?php }
  $menu_link_color = $options['menu_link_color'];
  if($menu_link_color['color']) { ?>
  .no-class {}
  .header-style-one .wndfal-navigation > ul > li > a, .header-style-two .wndfal-navigation > ul > li.has-dropdown > a .menu-text:after {
    color: <?php echo esc_attr($menu_link_color['color']); ?>;
  }
  <?php }
  if($menu_link_color['hover']) { ?>
  .no-class {}
  .header-style-one .wndfal-navigation > ul > li > a:hover, .header-style-one .wndfal-navigation > ul > li.current-menu-parent > a, .header-style-one .wndfal-navigation > ul > li.current-menu-parent > a,.header-style-one .wndfal-navigation > ul > li.has-dropdown.current-menu-parent > a .menu-text:after,.header-style-one .wndfal-navigation > ul > li > a:hover,.header-style-one .wndfal-navigation > ul > li.has-dropdown > a:hover .menu-text:after, .header-style-one .wndfal-navigation > ul > li.active > a,
  .header-style-one .wndfal-navigation > ul > li.has-dropdown.active > a .menu-text:after {
    color: <?php echo esc_attr($menu_link_color['hover']); ?>;
  }
  <?php }
  $submenu_bg_color = $options['submenu_bg_color'];
  if($submenu_bg_color['color']) { ?>
  .no-class {}
  .header-style-one .dropdown-nav {
    background: <?php echo esc_attr($submenu_bg_color['color']); ?>;
  }
  <?php } if($submenu_bg_color['hover']) { ?>
  .no-class {}
  .header-style-one .dropdown-nav > li:hover > a, .header-style-one .dropdown-nav > li:focus > a, .header-style-one .dropdown-nav > li.active > a {
    background: <?php echo esc_attr($submenu_bg_color['hover']); ?>;
  }
  <?php }
  $submenu_link_color = $options['submenu_link_color'];
  if($submenu_link_color['color']) { ?>
  .no-class {}
  .header-style-one .dropdown-nav li a {
    color: <?php echo esc_attr($submenu_link_color['color']); ?>;
  }
  <?php } if($submenu_link_color['hover']) { ?>
  .no-class {}
  .header-style-one .dropdown-nav li a:hover {
    color: <?php echo esc_attr($submenu_link_color['hover']); ?>;
  }
  <?php }
  $button_bg_color = $options['button_bg_color'];
  if($button_bg_color['color']) { ?>
  .no-class {}
  .header-style-one .wndfal-header .btn-text-wrap {
    background: <?php echo esc_attr($button_bg_color['color']); ?>;
  }
  <?php } if($button_bg_color['hover']) { ?>
  .no-class {}
  .header-style-one .wndfal-header .wndfal-btn:hover .btn-text-wrap {
    background: <?php echo esc_attr($button_bg_color['hover']); ?>;
  }
  <?php }
  $button_link_color = $options['button_link_color'];
  if($button_link_color['color']) { ?>
  .no-class {}
  .header-style-one .wndfal-header .header-btn .wndfal-btn {
    color: <?php echo esc_attr($button_link_color['color']); ?>;
  }
  <?php } if($button_link_color['hover']) { ?>
  .no-class {}
  .header-style-one .wndfal-header .header-btn .wndfal-btn:hover {
    color: <?php echo esc_attr($button_link_color['hover']); ?>;
  }
  <?php }
  $button_border_color = $options['button_border_color'];
  if($button_border_color) { ?>
  .no-class {}
  .header-style-one .wndfal-header .wndfal-btn:hover .btn-text-wrap:before, .header-style-one .wndfal-header .wndfal-btn:hover .btn-text-wrap:after, .header-style-one .wndfal-header .wndfal-btn:hover:before, .header-style-one .wndfal-header .wndfal-btn:hover:after {
    background-color: <?php echo esc_attr($button_border_color); ?>;
  }

  <?php }

  // Header Style Two
  $header_two_bg_color = $options['header_two_bg_color'];
  if($header_two_bg_color){ ?>
  .no-class {}
  .header-style-two .wndfal-header {
    background: <?php echo esc_attr($header_two_bg_color); ?>;
  }
  <?php }
  $header_two_text_color = $options['header_two_text_color'];
  if($header_two_text_color) { ?>
  .no-class {}
  .header-style-two .wndfal-header, .header-style-two .wndfal-header .header-contact-info, .header-style-two .wndfal-header p, .header-style-two .wndfal-header .header-contact-info span {
    color: <?php echo esc_attr($header_two_text_color); ?>;
  }
  <?php }
  $header_two_link_color = $options['header_two_link_color'];
  if($header_two_link_color['color']) { ?>
  .no-class {}
  .header-style-two .wndfal-header a, .header-style-two .wndfal-header .header-contact-info a, .header-style-two .wndfal-navigation > ul > li > a, .header-style-two .wndfal-navigation > ul > li.has-dropdown > a .menu-text:after {
    color: <?php echo esc_attr($header_two_link_color['color']); ?>;
  }
  <?php } if($header_two_link_color['hover']) { ?>
  .no-class {}
  .header-style-two .wndfal-header a:hover, .header-style-two .wndfal-header .header-contact-info a:hover, .header-style-two .wndfal-navigation > ul > li > a:hover, .header-style-two .wndfal-navigation > ul > li.current-menu-parent > a, .header-style-two .wndfal-navigation > ul > li.current-menu-parent > a,.header-style-two .wndfal-navigation > ul > li.has-dropdown.current-menu-parent > a .menu-text:after,.header-style-two .wndfal-navigation > ul > li > a:hover,.header-style-two .wndfal-navigation > ul > li.has-dropdown > a:hover .menu-text:after, .header-style-two .wndfal-navigation > ul > li.active > a, .header-style-two .wndfal-navigation > ul > li.has-dropdown.active > a .menu-text:after {
    color: <?php echo esc_attr($header_two_link_color['hover']); ?>;
  }
  <?php }

  $submenu_bg_color_two = $options['submenu_bg_color_two'];
  if($submenu_bg_color_two['color']) { ?>
  .no-class {}
  .header-style-two .dropdown-nav {
    background: <?php echo esc_attr($submenu_bg_color_two['color']); ?>;
  }
  <?php } if($submenu_bg_color_two['hover']) { ?>
  .no-class {}
  .header-style-two .dropdown-nav > li:hover > a, .header-style-two .dropdown-nav > li:focus > a, .header-style-two .dropdown-nav > li.active > a {
    background: <?php echo esc_attr($submenu_bg_color_two['hover']); ?>;
  }
  <?php }
  $submenu_link_color_two = $options['submenu_link_color_two'];
  if($submenu_link_color_two['color']) { ?>
  .no-class {}
  .header-style-two .dropdown-nav li a {
    color: <?php echo esc_attr($submenu_link_color_two['color']); ?>;
  }
  <?php } if($submenu_link_color_two['hover']) { ?>
  .no-class {}
  .header-style-two .dropdown-nav li a:hover {
    color: <?php echo esc_attr($submenu_link_color_two['hover']); ?>;
  }
  <?php }
  $button_bg_color_two = $options['button_bg_color_two'];
  if($button_bg_color_two['color']) { ?>
  .no-class {}
  .header-style-two .wndfal-header .btn-text-wrap {
    background: <?php echo esc_attr($button_bg_color_two['color']); ?>;
  }
  <?php } if($button_bg_color_two['hover']) { ?>
  .no-class {}
  .header-style-two .wndfal-header .wndfal-btn:hover .btn-text-wrap {
    background: <?php echo esc_attr($button_bg_color_two['hover']); ?>;
  }
  <?php }
  $button_link_color_two = $options['button_link_color_two'];
  if($button_link_color_two['color']) { ?>
  .no-class {}
  .header-style-two .wndfal-header .header-btn .wndfal-btn {
    color: <?php echo esc_attr($button_link_color_two['color']); ?>;
  }
  <?php } if($button_link_color_two['hover']) { ?>
  .no-class {}
  .header-style-two .wndfal-header .header-btn .wndfal-btn:hover {
    color: <?php echo esc_attr($button_link_color_two['hover']); ?>;
  }
  <?php }
  $button_border_color_two = $options['button_border_color_two'];
  if($button_border_color_two) { ?>
  .no-class {}
  .header-style-two .wndfal-header .wndfal-btn:hover .btn-text-wrap:before, .header-style-two .wndfal-header .wndfal-btn:hover .btn-text-wrap:after, .header-style-two .wndfal-header .wndfal-btn:hover:before, .header-style-two .wndfal-header .wndfal-btn:hover:after {
    background-color: <?php echo esc_attr($button_border_color_two); ?>;
  }

  <?php }
  $titlebar_title_color = $options['titlebar_title_color'];
  if($titlebar_title_color) { ?>
  .no-class {}
  .wndfal-page-title h2 {
    color: <?php echo esc_attr($titlebar_title_color); ?>;
  }
  <?php }
  $breadcrumb_text_color = $options['breadcrumb_text_color'];
  if($breadcrumb_text_color) { ?>
  .no-class {}
  .breadcrumbs ul.trail-items li {
    color: <?php echo esc_attr($breadcrumb_text_color); ?>;
  }
  <?php }
  $breadcrumb_link_color = $options['breadcrumb_link_color'];
  if($breadcrumb_link_color['color']) { ?>
  .no-class {}
  .breadcrumbs ul.trail-items li a {
    color: <?php echo esc_attr($breadcrumb_link_color['color']); ?>;
  }
  <?php } if($breadcrumb_link_color['hover']) { ?>
  .no-class {}
  .breadcrumbs ul.trail-items li a:hover {
    color: <?php echo esc_attr($breadcrumb_link_color['hover']); ?>;
  }
  <?php }
  $breadcrumb_bg_color = $options['breadcrumb_bg_color'];
  if($breadcrumb_bg_color) { ?>
  .no-class {}
  .wndfal-breadcrumb {
    background: <?php echo esc_attr($breadcrumb_bg_color); ?>;
  }
  <?php }
  $breadcrumb_border_color = $options['breadcrumb_border_color'];
  if($breadcrumb_border_color) { ?>
  .no-class {}
  .wndfal-breadcrumb {
    border-color: <?php echo esc_attr($breadcrumb_border_color); ?>;
  }
  <?php }

  // Mobile Menu
  $mobile_menu_color  = $options[ 'mobile_menu_color'];
  $mobile_menu_link_color  = $options[ 'mobile_menu_link_color'];
  $mobile_menu_expand_color  = $options[ 'mobile_menu_expand_color'];
  $mobile_menu_expand_bg_color  = $options[ 'mobile_menu_expand_bg_color'];

  if($mobile_menu_color['toggle_color'] || $mobile_menu_color['bg_color'] || $mobile_menu_color['border_color']){ ?>
    .no-class {}
    .mean-container a.meanmenu-reveal span,
    .mean-container a.meanmenu-reveal span:before,
    .mean-container a.meanmenu-reveal span:after,
    .mean-container a.meanmenu-reveal.meanclose span:before,
    .header-style-two .mean-container a.meanmenu-reveal span,
    .header-style-two .mean-container a.meanmenu-reveal span:before,
    .header-style-two .mean-container a.meanmenu-reveal span:after {
      background: <?php echo esc_attr($mobile_menu_color['toggle_color']); ?>;
    }
    .mean-container a.meanmenu-reveal {border-color: <?php echo esc_attr($mobile_menu_color['toggle_color']); ?>;}
    .mean-container .mean-nav {
      background-color: <?php echo esc_attr($mobile_menu_color['bg_color']); ?>;
    }
    .mean-container .dropdown-nav.normal-style .current-menu-parent > a, .mean-container .mean-nav ul li li a, .mean-nav .dropdown-nav li.active > a, .mean-container .mean-nav ul > li a {
      border-color: <?php echo esc_attr($mobile_menu_color['border_color']); ?>;
    }
  <?php }
  if($mobile_menu_link_color['color'] || $mobile_menu_link_color['hover']) { ?>
    .no-class {}
    .mean-container .mean-nav ul li a, .mean-container .mean-nav ul li li a, .mean-container .mean-nav ul li a {
      color: <?php echo esc_attr($mobile_menu_link_color['color']); ?>;
    }
    .mean-container .mean-nav > ul > li:hover > a,
    .mean-container .mean-nav > ul > li.current-menu-ancestor > a,
    .mean-container .mean-nav > ul > li.active > a,
    .mean-container .mean-nav .dropdown-nav > li:hover > a,
    .mean-container .mean-nav .dropdown-nav > li.active > a,
    .mean-container .mean-nav ul li li a:hover, .mean-container .mean-nav ul li a:hover {
      color: <?php echo esc_attr($mobile_menu_link_color['hover']); ?>;
    }
  <?php }
  if($mobile_menu_expand_color['color'] || $mobile_menu_expand_color['hover']) { ?>
    .no-class {}
    .mean-container .mean-nav ul li a.mean-expand {
      color: <?php echo esc_attr($mobile_menu_expand_color['color']); ?>;
    }
    .mean-container .mean-nav ul li a.mean-expand:hover,
    .mean-container .mean-nav ul li a.mean-expand:focus,
    .mean-container .mean-nav ul li:hover > a.mean-expand,
    .mean-container .mean-nav ul li:focus > a.mean-expand,
    .wndfal-header .mean-container .dropdown-nav > li:hover > a.mean-expand,
    .wndfal-header .mean-container .dropdown-nav > li:focus > a.mean-expand,
    .mean-container .mean-nav ul li.current-menu-ancestor > a.mean-expand {
      color: <?php echo esc_attr($mobile_menu_expand_color['hover']); ?>;
    }
  <?php }
  if($mobile_menu_expand_bg_color['color'] || $mobile_menu_expand_bg_color['hover']) { ?>
    .no-class {}
    .mean-container .mean-nav ul li a.mean-expand {
      background-color: <?php echo esc_attr($mobile_menu_expand_bg_color['color']); ?>;
    }
    .mean-container .mean-nav ul li a.mean-expand:hover,
    .mean-container .mean-nav ul li a.mean-expand:focus,
    .mean-container .mean-nav ul li:hover > a.mean-expand,
    .mean-container .mean-nav ul li:focus > a.mean-expand,
    .wndfal-header .mean-container .dropdown-nav > li:hover > a.mean-expand,
    .wndfal-header .mean-container .dropdown-nav > li:focus > a.mean-expand {
      background-color: <?php echo esc_attr($mobile_menu_expand_bg_color['hover']); ?>;
    }
  <?php }

  // Body Content Color
  $body_color = $options['body_color'];
  if($body_color) { ?>
  .no-class {}
  body, p, .blog-info p, .blog-wrap .blog-date, .blog-detail p,
  .blog-detail .bullet-list li, .wndfal-comment-form form label,
  .blog-date ul li,.feature-item p, .section-title-wrap p, .blog-info p, .blog-detail p, .wndfal-blog-detail p.logged-in-as, .woocommerce p, .contact-info .section-title-wrap p, .card-body p, .widget-testimonials-info p, .brochure-wrap p, .about-info p, .industry-info-inner p, .service-item p, .card-body, .customer-item p, .service-info p, .testimonial-item p, .offer-info p, .download-info p, .check-list li,
  .wndfal-form input[type="text"], .woocommerce input[type="text"], .wndfal-form input[type="email"], .woocommerce input[type="email"], .wndfal-footer input[type="email"], .wndfal-form input[type="password"], .woocommerce input[type="password"], .wndfal-form input[type="tel"], .woocommerce input[type="tel"], .wndfal-form input[type="search"], .wndfal-form input[type="date"], .wndfal-form input[type="time"], .wndfal-form input[type="datetime-local"], .wndfal-form input[type="event-month"], .wndfal-form input[type="url"], .wndfal-form input[type="number"], .woocommerce input[type="number"], .wndfal-form textarea, .woocommerce textarea, .wndfal-form select, .woocommerce select, .wndfal-form .form-control, .stats-style-two .wndfal-title, .mate-info ul li i, .mate-meta, .bullet-list li, .faq-meta,
  .woocommerce ul.products li.product .price .amount, .woocommerce div.product p.price,
  .woocommerce div.product p.price ins, .woocommerce div.product span.price ins, .woocommerce #reviews #comments ol.commentlist li .comment-text p.meta strong, .woocommerce #reviews #comments ol.commentlist li time, .woocommerce #review_form #respond .comment-form label, .woocommerce .quantity .qty, .woocommerce table.shop_table th, .woocommerce table.shop_table td .woocommerce-Price-amount,
  .shipping-calculator-form .nice-select, .woocommerce-info, .woocommerce form .form-row label,
  .woocommerce .woocommerce-checkout-review-order table.shop_table .cart_item th, .woocommerce .woocommerce-checkout-review-order table.shop_table .cart_item td, .woocommerce .woocommerce-checkout-review-order table.shop_table .cart_item .product-name span, .woocommerce .woocommerce-checkout-review-order table.shop_table .cart_item td strong.product-quantity, .woocommerce ul#shipping_method li label,
  ul.woocommerce-error, form label, .contact-inner-info span,.contact-inner-info {
    color: <?php echo esc_attr($body_color); ?>;
  }
  <?php }
  $body_links_color = $options['body_links_color'];
  if($body_links_color['color']) { ?>
  .no-class {}
  .wndfal-primary a,.wndfal-content-side a, body a,
  .accordion-title .btn-link,
  .blog-info .wndfal-link, .wndfal-link, .mate-info ul li a,
  .mate-meta .wndfal-social a, .author-name a, .masonry-filters ul li a,
  .woocommerce div.product .product_meta a, .woocommerce div.product .woocommerce-tabs ul.tabs li a,
  .woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li a, .contact-inner-info a {
    color: <?php echo esc_attr($body_links_color['color']); ?>;
  }
  <?php } if($body_links_color['hover']) { ?>
  .no-class {}
  .wndfal-primary a:hover, .wndfal-content-side a:hover, body a:hover,
  .accordion-title .btn-link:hover,
  .blog-info .wndfal-link:hover, .blog-info .wndfal-link:focus, .wndfal-link:hover, .wndfal-link:focus,
  .mate-info ul li a:hover, .mate-info ul li a:focus,
  .mate-meta .wndfal-social a:hover, .mate-meta .wndfal-social a:focus, .author-name a:hover, .author-name a:focus,
  .masonry-filters ul li a:hover, .masonry-filters ul li a.active,
  .woocommerce div.product .product_meta a:hover, .woocommerce div.product .product_meta a:focus,
  .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover, .woocommerce div.product .woocommerce-tabs ul.tabs li a:focus,
  .woocommerce div.product .woocommerce-tabs ul.tabs li.r-tabs-state-active a,
  .woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul .is-active a,
  .woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li a:hover,
  .contact-inner-info a:hover, .contact-inner-info a:focus {
    color: <?php echo esc_attr($body_links_color['hover']); ?>;
  }
  <?php }

  // Sidebar Colors
  $sidebar_content_color = $options['sidebar_content_color'];
  if($sidebar_content_color) { ?>
  .no-class {}
  .wndfal-secondary p, .wndfal-secondary .wndfal-widget,
  .wndfal-secondary .widget_rss .rssSummary,
  .wndfal-secondary .news-time, .wndfal-secondary .recentcomments,
  .wndfal-secondary input[type="text"], .wndfal-secondary .nice-select, .wndfal-secondary caption,
  .wndfal-secondary table td, .wndfal-secondary .wndfal-widget input[type="search"],
  .wndfal-secondary .woocommerce ul.product_list_widget .woocommerce-Price-amount,
  .woocommerce .widget_price_filter .price_label, .wndfal-secondary.woocommerce.widget_products span.woocommerce-Price-amount.amount,
  .post-date, .wndfal-secondary .wndfal-widget ul, .wndfal-secondary table#wp-calendar th,
  .widget-author-name span {
    color: <?php echo esc_attr($sidebar_content_color); ?>;
  }
  <?php }
  $sidebar_links_color = $options['sidebar_links_color'];
  if($sidebar_links_color['color']) { ?>
  .no-class {}
  .wndfal-secondary a,
  .wndfal-mid-wrap .wndfal-secondary a,
  .wndfal-secondary .wndfal-widget ul li a, .wndfal-secondary .widget_shopping_cart ul.cart_list li a,
  .wndfal-secondary .widget_list_style ul a,
  .wndfal-secondary .widget_categories ul a,
  .wndfal-secondary .widget_archive ul a,
  .wndfal-secondary .widget_recent_comments ul a,
  .wndfal-secondary .widget_recent_entries ul a,
  .wndfal-secondary .widget_meta ul a,
  .wndfal-secondary .widget_pages ul a,
  .wndfal-secondary .widget_rss ul a,
  .wndfal-secondary .widget_nav_menu ul a,
  .wndfal-secondary .widget_layered_nav ul a,
  .wndfal-secondary .widget_product_categories ul a {
    color: <?php echo esc_attr($sidebar_links_color['color']); ?>;
  }
  <?php } if($sidebar_links_color['hover']) { ?>
  .no-class {}
  .wndfal-secondary a:hover,
  .wndfal-secondary a:focus,
  .wndfal-mid-wrap .wndfal-secondary a:hover,
  .wndfal-mid-wrap .wndfal-secondary a:focus,
  .wndfal-secondary .wndfal-widget ul li a:hover, .wndfal-secondary .widget_shopping_cart ul.cart_list li a:hover,
  .wndfal-secondary .wndfal-widget ul li a:focus, .wndfal-secondary .widget_shopping_cart ul.cart_list li a:focus,
  .wndfal-secondary .widget_list_style ul a:hover,
  .wndfal-secondary .widget_list_style ul a:focus,
  .wndfal-secondary .widget_categories ul a:hover,
  .wndfal-secondary .widget_categories ul a:focus,
  .wndfal-secondary .widget_archive ul a:hover,
  .wndfal-secondary .widget_archive ul a:focus,
  .wndfal-secondary .widget_recent_comments ul a:hover,
  .wndfal-secondary .widget_recent_comments ul a:focus,
  .wndfal-secondary .widget_recent_entries ul a:hover,
  .wndfal-secondary .widget_recent_entries ul a:focus,
  .wndfal-secondary .widget_meta ul a:hover,
  .wndfal-secondary .widget_meta ul a:focus,
  .wndfal-secondary .widget_pages ul a:hover,
  .wndfal-secondary .widget_pages ul a:focus,
  .wndfal-secondary .widget_rss ul a:hover,
  .wndfal-secondary .widget_rss ul a:focus,
  .wndfal-secondary .widget_nav_menu ul a:hover,
  .wndfal-secondary .widget_nav_menu ul a:focus,
  .wndfal-secondary .widget_layered_nav ul a:hover,
  .wndfal-secondary .widget_layered_nav ul a:focus,
  .wndfal-secondary .widget_product_categories ul a:hover,
  .wndfal-secondary .widget_product_categories ul a:focus {
    color: <?php echo esc_attr($sidebar_links_color['hover']); ?>;
  }
  <?php }

  // Heading Colors
  $content_heading_color = $options['content_heading_color'];
  if($content_heading_color['content_heading_color']) { ?>
  .no-class {}
  .wndfal-primary h1, .wndfal-primary h2, .wndfal-primary h3, .wndfal-primary h4, .wndfal-primary h5, .wndfal-primary h6,
  .section-title-wrap h2,.woocommerce .related-product-title, .woocommerce .related.products h2, .woocommerce #reviews .comment-reply-title,
  .woocommerce legend, .woocommerce div.product .product_title, .about-info h2, .appointment-form h3, .wndfal-mid-wrap h1, .wndfal-mid-wrap h2, .wndfal-mid-wrap h3, .partners-title, h3#ship-to-different-address span {
    color: <?php echo esc_attr($content_heading_color['content_heading_color']); ?>;
  }
  <?php } if($content_heading_color['sidebar_heading_color']) { ?>
  .no-class {}
  .wndfal-secondary h1, .wndfal-secondary h2, .wndfal-secondary h3, .wndfal-secondary h4, .wndfal-secondary h5, .wndfal-secondary h6,
  .wndfal-widget .widget-title {
    color: <?php echo esc_attr($content_heading_color['sidebar_heading_color']); ?>;
  }
  <?php }

  // Footer Colors
  $footer_colors = $options['footer_colors'];
  if($footer_colors['footer_bg_color']) { ?>
  .no-class {}
  .footer-wrap {
    background: <?php echo esc_attr($footer_colors['footer_bg_color']); ?>;
  }
  <?php } if($footer_colors['footer_heading_color']) { ?>
  .no-class {}
  .footer-widget-title, .footer-widget .social-label {
    color: <?php echo esc_attr($footer_colors['footer_heading_color']); ?>;
  }
  <?php } if($footer_colors['footer_text_color']) { ?>
  .no-class {}
  .footer-wrap p, .footer-wrap, .footer-wrap span, .footer-widget ul,
  .wndfal-footer table#wp-calendar th, .wndfal-footer table#wp-calendar td,
  .wndfal-footer caption, .wndfal-footer .widget_search form input[type="text"],
  .woocommerce.footer-widget ul.product_list_widget del .amount,
  .wndfal-footer .woocommerce-product-search input[type="search"],
  .wndfal-footer .mc4wp-form input[type="email"] {
    color: <?php echo esc_attr($footer_colors['footer_text_color']); ?>;
  }
  <?php }
  $footer_link_color = $options['footer_link_color'];
  if($footer_link_color['color']){ ?>
  .no-class {}
  .footer-wrap a, .footer-wrap ul li a,
  .wndfal-footer .widget_shopping_cart ul.cart_list li a,
  .wndfal-footer .widget_list_style ul a,
  .wndfal-footer .widget_categories ul a,
  .wndfal-footer .widget_archive ul a,
  .wndfal-footer .widget_recent_comments ul a,
  .wndfal-footer .widget_recent_entries ul a,
  .wndfal-footer .widget_meta ul a,
  .wndfal-footer .widget_pages ul a,
  .wndfal-footer .widget_rss ul a,
  .wndfal-footer .widget_nav_menu ul a,
  .wndfal-footer .widget_layered_nav ul a,
  .wndfal-footer .widget_product_categories ul a,
  .footer-widget .wndfal-social a,
  .wndfal-footer table#wp-calendar td#prev a,
  .footer-widget-title a.rsswidget,
  .wndfal-footer ul.product_list_widget li a .product-title {
    color: <?php echo esc_attr($footer_link_color['color']); ?>;
  }
  <?php } if($footer_link_color['hover']){ ?>
  .no-class {}
  .footer-wrap a:hover, .footer-wrap ul li a:hover,
  .wndfal-footer .widget_shopping_cart ul.cart_list li a:hover,
  .wndfal-footer .wndfal-widget ul li a:focus, .wndfal-footer .widget_shopping_cart ul.cart_list li a:focus,
  .wndfal-footer .widget_list_style ul a:hover,
  .wndfal-footer .widget_list_style ul a:focus,
  .wndfal-footer .widget_categories ul a:hover,
  .wndfal-footer .widget_categories ul a:focus,
  .wndfal-footer .widget_archive ul a:hover,
  .wndfal-footer .widget_archive ul a:focus,
  .wndfal-footer .widget_recent_comments ul a:hover,
  .wndfal-footer .widget_recent_comments ul a:focus,
  .wndfal-footer .widget_recent_entries ul a:hover,
  .wndfal-footer .widget_recent_entries ul a:focus,
  .wndfal-footer .widget_meta ul a:hover,
  .wndfal-footer .widget_meta ul a:focus,
  .wndfal-footer .widget_pages ul a:hover,
  .wndfal-footer .widget_pages ul a:focus,
  .wndfal-footer .widget_rss ul a:hover,
  .wndfal-footer .widget_rss ul a:focus,
  .wndfal-footer .widget_nav_menu ul a:hover,
  .wndfal-footer .widget_nav_menu ul a:focus,
  .wndfal-footer .widget_layered_nav ul a:hover,
  .wndfal-footer .widget_layered_nav ul a:focus,
  .wndfal-footer .widget_product_categories ul a:hover,
  .wndfal-footer .widget_product_categories ul a:focus,
  .footer-widget .wndfal-social a:hover, .footer-widget .wndfal-social a:focus,
  .wndfal-footer table#wp-calendar td#prev a:hover,
  .wndfal-footer table#wp-calendar td#prev a:focus,
  .footer-widget-title a.rsswidget:hover,
  .wndfal-footer ul.product_list_widget li a:hover .product-title {
    color: <?php echo esc_attr($footer_link_color['hover']); ?>;
  }
  <?php }
  $copyright_colors = $options['copyright_colors'];
  if($copyright_colors['copyright_bg_color']){ ?>
  .no-class {}
  .wndfal-copyright {
    background: <?php echo esc_attr($copyright_colors['copyright_bg_color']); ?>;
  }
  <?php } if($copyright_colors['copyright_text_color']){ ?>
  .no-class {}
  .wndfal-copyright {
    color: <?php echo esc_attr($copyright_colors['copyright_text_color']); ?>;
  }
  <?php }
  $copyright_link_color = $options['copyright_link_color'];
  if($copyright_link_color['color']) { ?>
  .no-class {}
  .wndfal-copyright a, .wndfal-copyright ul li a {
    color: <?php echo esc_attr($copyright_link_color['color']); ?>;
  }
  <?php } if($copyright_link_color['hover']) { ?>
  .no-class {}
  .wndfal-copyright a:hover, .wndfal-copyright ul li a:hover {
    color: <?php echo esc_attr($copyright_link_color['hover']); ?>;
  }
  <?php }

  // Mobile Menu Breakpoint
  $mobile_breakpoint = cs_get_option('mobile_breakpoint');
  $breakpoint = $mobile_breakpoint ? $mobile_breakpoint : '1199'; ?>
  @media (max-width: <?php echo esc_attr($breakpoint); ?>px) {
    .no-class {}
    .search-link {
      text-align: right;
      position: relative;
      z-index: 4;
      top: 3px;
    }
    .header-style-two .header-btn {
      margin-right: 45px;
      position: relative;
      z-index: 4;
    }
    .wndfal-main-wrap[class*="header-style-"] .wndfal-navigation .container {
      padding: 0 15px;
    }
    .wndfal-main-wrap[class*="header-style-"] .wndfal-navigation > ul > li > a {
      padding-left: 0;
    }
    .wndfal-toggle {
      display: inline-block;
    }
    .navigation-wrap {
      padding: 13px 20px;
      position: relative;
    }
    .wndfal-navigation {
      display: none !important;
      position: absolute;
      top: 100%;
      left: 0;
      right: 0;
      width: 100%;
      height: 50vh;
      padding-bottom: 25px;
      margin: 0 auto;
      background: #ffffff;
      overflow: auto;
      -webkit-overflow-scrolling: touch;
      -ms-overflow-style: -ms-autohiding-scrollbar;
      -webkit-box-shadow: 0 3px 4px rgba(0, 0, 0, 0.2);
      -ms-box-shadow: 0 3px 4px rgba(0, 0, 0, 0.2);
      box-shadow: 0 3px 4px rgba(0, 0, 0, 0.2);
      z-index: 2;
    }
    .wndfal-navigation .container {
      padding: 0;
    }
    .wndfal-navigation > ul > li {
      float: none;
    }
    .wndfal-navigation > ul > li > a {
      display: block;
      padding: 10px 60px 10px 20px;
      color: #777777;
      line-height: 22px;
      border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }
    .wndfal-navigation ul > li.has-dropdown:hover > .dropdown-nav {
      -webkit-transform: none;
      -ms-transform: none;
      transform: none;
    }
    .dropdown-nav {
      display: none;
      padding: 0 0 0 25px;
      min-width: 10px;
      opacity: 1;
      visibility: visible;
      position: static;
      -webkit-transition: none;
      -ms-transition: none;
      transition: none;
      -webkit-transform: none;
      -ms-transform: none;
      transform: none;
      -webkit-box-shadow: none;
      -ms-box-shadow: none;
      box-shadow: none;
    }
    .wndfal-main-wrap[class*="header-style-"] .dropdown-nav {
      padding-left: 15px;
    }
    .wndfal-navigation .has-dropdown.sub .dropdown-nav {
      padding-left: 15px;
    }
    .dropdown-nav li a {
      padding: 10px 60px 10px 0;
      line-height: 22px;
      border-bottom: 1px solid #dfdfdf;
    }
    .wndfal-navigation .has-dropdown.sub > a:after {
      display: none;
    }
    .dropdown-nav > li:hover > a,
    .dropdown-nav > li:focus > a,
    .dropdown-nav > li.active > a {
      background: transparent;
    }
    .wndfal-navigation > ul > li.has-dropdown > a .menu-text:after,
    .wndfal-navigation > ul > li > a:after {
      display: none;
    }
    .dropdown-arrow {
      display: inline-block;
    }

  }
  <?php
  $body_font_family       = cs_get_option('theme_typo')['body_font']['font-family'];
  $body_font_bkp_family   = cs_get_option('theme_typo')['body_font']['backup-font-family'];
  $body_font_weight       = cs_get_option('theme_typo')['body_font']['font-weight'];
  $body_font_style        = cs_get_option('theme_typo')['body_font']['font-style'];
  $body_font_align        = cs_get_option('theme_typo')['body_font']['text-align'];
  $body_font_variant      = cs_get_option('theme_typo')['body_font']['font-variant'];
  $body_font_transform    = cs_get_option('theme_typo')['body_font']['text-transform'];
  $body_font_decoration   = cs_get_option('theme_typo')['body_font']['text-decoration'];
  $body_font_size         = cs_get_option('theme_typo')['body_font']['font-size'];
  $body_font_height       = cs_get_option('theme_typo')['body_font']['line-height'];
  $body_font_ltr_spacing  = cs_get_option('theme_typo')['body_font']['letter-spacing'];
  $body_font_word_spacing = cs_get_option('theme_typo')['body_font']['word-spacing'];
  $body_font_color        = cs_get_option('theme_typo')['body_font']['color'];
  $body_css               = cs_get_option('theme_typo')['body_css'];
  $body_css = $body_css ? ' ,'.$body_css : '';

  ?>
  body, form p, .footer-wrap p,.woocommerce .woocommerce-result-count, .woocommerce-page .woocommerce-result-count,.woocommerce #reviews #comments ol.commentlist li .comment-text .meta, blockquote p, .author-content .author-name, .customer-name, .author-name, .services-emergency span, .blog-comment a,#multi-step-form .fw-wizard-buttons button, #multi-step-form .fw-wizard-buttons .fw-btn, .woocommerce #review_form #respond .comment-form label <?php echo esc_attr($body_css); ?> {
    <?php
    // WindfallWP
    $body_font_bkp_family        = $body_font_bkp_family   ? ', '.$body_font_bkp_family : '';
    if ($body_font_family)             { ?> font-family: "<?php echo esc_attr($body_font_family);?>"<?php echo htmlspecialchars($body_font_bkp_family);?>;<?php } ?>
    <?php if ($body_font_weight)       { ?> font-weight:     <?php echo esc_attr($body_font_weight);?>;<?php }
    if ($body_font_style)        { ?> font-style:      <?php echo esc_attr($body_font_style);?>;<?php }
    if ($body_font_align)        { ?> text-align:      <?php echo esc_attr($body_font_align);?>;<?php }
    if ($body_font_variant)      { ?> font-variant:    <?php echo esc_attr($body_font_variant);?>;<?php }
    if ($body_font_transform)    { ?> text-transform:  <?php echo esc_attr($body_font_transform);?>;<?php }
    if ($body_font_decoration)   { ?> text-decoration: <?php echo esc_attr($body_font_decoration);?>;<?php }
    if ($body_font_size)         { ?> font-size:       <?php echo esc_attr($body_font_size);?>px;<?php }
    if ($body_font_height)       { ?> line-height:     <?php echo esc_attr($body_font_height);?>px;<?php }
    if ($body_font_ltr_spacing)  { ?> letter-spacing:  <?php echo esc_attr($body_font_ltr_spacing);?>px;<?php }
    if ($body_font_word_spacing) { ?> word-spacing:    <?php echo esc_attr($body_font_word_spacing);?>px;<?php }
    if ($body_font_color)        { ?> color:           <?php echo esc_attr($body_font_color);?>;<?php } ?>
  }
  <?php
  $menu_font_family       = cs_get_option('theme_typo')['menu_font']['font-family'];
  $menu_font_bkp_family   = cs_get_option('theme_typo')['menu_font']['backup-font-family'];
  $menu_font_weight       = cs_get_option('theme_typo')['menu_font']['font-weight'];
  $menu_font_style        = cs_get_option('theme_typo')['menu_font']['font-style'];
  $menu_font_align        = cs_get_option('theme_typo')['menu_font']['text-align'];
  $menu_font_variant      = cs_get_option('theme_typo')['menu_font']['font-variant'];
  $menu_font_transform    = cs_get_option('theme_typo')['menu_font']['text-transform'];
  $menu_font_decoration   = cs_get_option('theme_typo')['menu_font']['text-decoration'];
  $menu_font_size         = cs_get_option('theme_typo')['menu_font']['font-size'];
  $menu_font_height       = cs_get_option('theme_typo')['menu_font']['line-height'];
  $menu_font_ltr_spacing  = cs_get_option('theme_typo')['menu_font']['letter-spacing'];
  $menu_font_word_spacing = cs_get_option('theme_typo')['menu_font']['word-spacing'];
  $menu_font_color        = cs_get_option('theme_typo')['menu_font']['color'];
  $menu_css               = cs_get_option('theme_typo')['menu_css'];
  $menu_css = $menu_css ? ' ,'.$menu_css : '';

  ?>
  .wndfal-navigation, .wndfal-navigation > ul > li, .wndfal-navigation > ul > li > a, .mean-container .mean-nav ul li a <?php echo esc_attr($menu_css); ?> {
    <?php
    // WindfallWP
    $menu_font_bkp_family        = $menu_font_bkp_family   ? ', '.$menu_font_bkp_family : '';
    if ($menu_font_family)             { ?> font-family: "<?php echo esc_attr($menu_font_family);?>"<?php echo htmlspecialchars($menu_font_bkp_family);?>;<?php }
    if ($menu_font_weight)       { ?> font-weight:     <?php echo esc_attr($menu_font_weight);?>;<?php }
    if ($menu_font_style)        { ?> font-style:      <?php echo esc_attr($menu_font_style);?>;<?php }
    if ($menu_font_align)        { ?> text-align:      <?php echo esc_attr($menu_font_align);?>;<?php }
    if ($menu_font_variant)      { ?> font-variant:    <?php echo esc_attr($menu_font_variant);?>;<?php }
    if ($menu_font_transform)    { ?> text-transform:  <?php echo esc_attr($menu_font_transform);?>;<?php }
    if ($menu_font_decoration)   { ?> text-decoration: <?php echo esc_attr($menu_font_decoration);?>;<?php }
    if ($menu_font_size)         { ?> font-size:       <?php echo esc_attr($menu_font_size);?>px;<?php }
    if ($menu_font_height)       { ?> line-height:     <?php echo esc_attr($menu_font_height);?>px;<?php }
    if ($menu_font_ltr_spacing)  { ?> letter-spacing:  <?php echo esc_attr($menu_font_ltr_spacing);?>px;<?php }
    if ($menu_font_word_spacing) { ?> word-spacing:    <?php echo esc_attr($menu_font_word_spacing);?>px;<?php }
    if ($menu_font_color)        { ?> color:           <?php echo esc_attr($menu_font_color);?>;<?php } ?>
  }
  <?php
  $sub_menu_font_family       = cs_get_option('theme_typo')['sub_menu_font']['font-family'];
  $sub_menu_font_bkp_family   = cs_get_option('theme_typo')['sub_menu_font']['backup-font-family'];
  $sub_menu_font_weight       = cs_get_option('theme_typo')['sub_menu_font']['font-weight'];
  $sub_menu_font_style        = cs_get_option('theme_typo')['sub_menu_font']['font-style'];
  $sub_menu_font_align        = cs_get_option('theme_typo')['sub_menu_font']['text-align'];
  $sub_menu_font_variant      = cs_get_option('theme_typo')['sub_menu_font']['font-variant'];
  $sub_menu_font_transform    = cs_get_option('theme_typo')['sub_menu_font']['text-transform'];
  $sub_menu_font_decoration   = cs_get_option('theme_typo')['sub_menu_font']['text-decoration'];
  $sub_menu_font_size         = cs_get_option('theme_typo')['sub_menu_font']['font-size'];
  $sub_menu_font_height       = cs_get_option('theme_typo')['sub_menu_font']['line-height'];
  $sub_menu_font_ltr_spacing  = cs_get_option('theme_typo')['sub_menu_font']['letter-spacing'];
  $sub_menu_font_word_spacing = cs_get_option('theme_typo')['sub_menu_font']['word-spacing'];
  $sub_menu_font_color        = cs_get_option('theme_typo')['sub_menu_font']['color'];
  $sub_menu_css               = cs_get_option('theme_typo')['sub_menu_css'];
  $sub_menu_css = $sub_menu_css ? ' ,'.$sub_menu_css : '';

  ?>
  .dropdown-nav > li, .dropdown-nav li a, .dropdown-nav, .mean-container .mean-nav ul.sub-menu li a <?php echo esc_attr($sub_menu_css); ?> {
    <?php
    // WindfallWP
    $sub_menu_font_bkp_family        = $sub_menu_font_bkp_family   ? ', '.$sub_menu_font_bkp_family : '';
    if ($sub_menu_font_family)             { ?> font-family: "<?php echo esc_attr($sub_menu_font_family);?>"<?php echo htmlspecialchars($sub_menu_font_bkp_family);?>;<?php }
    if ($sub_menu_font_weight)       { ?> font-weight:     <?php echo esc_attr($sub_menu_font_weight);?>;<?php }
    if ($sub_menu_font_style)        { ?> font-style:      <?php echo esc_attr($sub_menu_font_style);?>;<?php }
    if ($sub_menu_font_align)        { ?> text-align:      <?php echo esc_attr($sub_menu_font_align);?>;<?php }
    if ($sub_menu_font_variant)      { ?> font-variant:    <?php echo esc_attr($sub_menu_font_variant);?>;<?php }
    if ($sub_menu_font_transform)    { ?> text-transform:  <?php echo esc_attr($sub_menu_font_transform);?>;<?php }
    if ($sub_menu_font_decoration)   { ?> text-decoration: <?php echo esc_attr($sub_menu_font_decoration);?>;<?php }
    if ($sub_menu_font_size)         { ?> font-size:       <?php echo esc_attr($sub_menu_font_size);?>px;<?php }
    if ($sub_menu_font_height)       { ?> line-height:     <?php echo esc_attr($sub_menu_font_height);?>px;<?php }
    if ($sub_menu_font_ltr_spacing)  { ?> letter-spacing:  <?php echo esc_attr($sub_menu_font_ltr_spacing);?>px;<?php }
    if ($sub_menu_font_word_spacing) { ?> word-spacing:    <?php echo esc_attr($sub_menu_font_word_spacing);?>px;<?php }
    if ($sub_menu_font_color)        { ?> color:           <?php echo esc_attr($sub_menu_font_color);?>;<?php } ?>
  }
  <?php
  $headings_font_family       = cs_get_option('theme_typo')['headings_font']['font-family'];
  $headings_font_bkp_family   = cs_get_option('theme_typo')['headings_font']['backup-font-family'];
  $headings_font_weight       = cs_get_option('theme_typo')['headings_font']['font-weight'];
  $headings_font_style        = cs_get_option('theme_typo')['headings_font']['font-style'];
  $headings_font_align        = cs_get_option('theme_typo')['headings_font']['text-align'];
  $headings_font_variant      = cs_get_option('theme_typo')['headings_font']['font-variant'];
  $headings_font_transform    = cs_get_option('theme_typo')['headings_font']['text-transform'];
  $headings_font_decoration   = cs_get_option('theme_typo')['headings_font']['text-decoration'];
  $headings_font_size         = cs_get_option('theme_typo')['headings_font']['font-size'];
  $headings_font_height       = cs_get_option('theme_typo')['headings_font']['line-height'];
  $headings_font_ltr_spacing  = cs_get_option('theme_typo')['headings_font']['letter-spacing'];
  $headings_font_word_spacing = cs_get_option('theme_typo')['headings_font']['word-spacing'];
  $headings_font_color        = cs_get_option('theme_typo')['headings_font']['color'];
  $headings_css               = cs_get_option('theme_typo')['headings_css'];
  $headings_css = $headings_css ? ' ,'.$headings_css : '';

  ?>
  h1, h2, h3, h4, h5, h6, .text-logo <?php echo esc_attr($headings_css); ?> {
    <?php
    // WindfallWP
    $headings_font_bkp_family        = $headings_font_bkp_family   ? ', '.$headings_font_bkp_family : '';
    if ($headings_font_family)             { ?> font-family: "<?php echo esc_attr($headings_font_family);?>"<?php echo htmlspecialchars($headings_font_bkp_family);?>;<?php }
    if ($headings_font_weight)       { ?> font-weight:     <?php echo esc_attr($headings_font_weight);?>;<?php }
    if ($headings_font_style)        { ?> font-style:      <?php echo esc_attr($headings_font_style);?>;<?php }
    if ($headings_font_align)        { ?> text-align:      <?php echo esc_attr($headings_font_align);?>;<?php }
    if ($headings_font_variant)      { ?> font-variant:    <?php echo esc_attr($headings_font_variant);?>;<?php }
    if ($headings_font_transform)    { ?> text-transform:  <?php echo esc_attr($headings_font_transform);?>;<?php }
    if ($headings_font_decoration)   { ?> text-decoration: <?php echo esc_attr($headings_font_decoration);?>;<?php }
    if ($headings_font_size)         { ?> font-size:       <?php echo esc_attr($headings_font_size);?>px;<?php }
    if ($headings_font_height)       { ?> line-height:     <?php echo esc_attr($headings_font_height);?>px;<?php }
    if ($headings_font_ltr_spacing)  { ?> letter-spacing:  <?php echo esc_attr($headings_font_ltr_spacing);?>px;<?php }
    if ($headings_font_word_spacing) { ?> word-spacing:    <?php echo esc_attr($headings_font_word_spacing);?>px;<?php }
    if ($headings_font_color)        { ?> color:           <?php echo esc_attr($headings_font_color);?>;<?php } ?>
  }
  <?php
  $shortcode_prime_font_family       = cs_get_option('theme_typo')['shortcode_prime_font']['font-family'];
  $shortcode_prime_font_bkp_family   = cs_get_option('theme_typo')['shortcode_prime_font']['backup-font-family'];
  $shortcode_prime_font_weight       = cs_get_option('theme_typo')['shortcode_prime_font']['font-weight'];
  $shortcode_prime_font_style        = cs_get_option('theme_typo')['shortcode_prime_font']['font-style'];
  $shortcode_prime_font_align        = cs_get_option('theme_typo')['shortcode_prime_font']['text-align'];
  $shortcode_prime_font_variant      = cs_get_option('theme_typo')['shortcode_prime_font']['font-variant'];
  $shortcode_prime_font_transform    = cs_get_option('theme_typo')['shortcode_prime_font']['text-transform'];
  $shortcode_prime_font_decoration   = cs_get_option('theme_typo')['shortcode_prime_font']['text-decoration'];
  $shortcode_prime_font_size         = cs_get_option('theme_typo')['shortcode_prime_font']['font-size'];
  $shortcode_prime_font_height       = cs_get_option('theme_typo')['shortcode_prime_font']['line-height'];
  $shortcode_prime_font_ltr_spacing  = cs_get_option('theme_typo')['shortcode_prime_font']['letter-spacing'];
  $shortcode_prime_font_word_spacing = cs_get_option('theme_typo')['shortcode_prime_font']['word-spacing'];
  $shortcode_prime_font_color        = cs_get_option('theme_typo')['shortcode_prime_font']['color'];
  $shortcode_prime_css               = cs_get_option('theme_typo')['shortcode_prime_css'];
  $shortcode_prime_css = $shortcode_prime_css ? ' ,'.$shortcode_prime_css : '';

  ?>
  .caption-subtitle, .check-list,.mate-info ul, .service-details .bullet-list, .table td, .accordion-style-two .bullet-list, .woocommerce ul.products li.product .price, .tag-widget a, .tagcloud a, .woocommerce #reviews #comments ol.commentlist li time, .woocommerce table.shop_table td .woocommerce-Price-amount, .woocommerce form .form-text, .woocommerce .woocommerce-checkout-review-order table.shop_table .cart_item,
  .woocommerce #add_payment_method #payment div.payment_box p, .woocommerce .woocommerce-cart #payment div.payment_box p, .woocommerce .woocommerce-checkout #payment div.payment_box p, .post-date, .blog-inner-title, .blog-detail .bullet-list, .wndfal-blog-tags, .wndfal-comments-area .wndfal-comments-meta .comments-date, .woocommerce span.onsale, .feature-item p,.section-title-wrap p,.blog-info p,
  .blog-detail p,.wndfal-blog-detail p.logged-in-as,.woocommerce p,.contact-info .section-title-wrap p,.card-body p,.widget-testimonials-info p,
  .brochure-wrap p,.about-info p,.industry-info-inner p,.service-item p,.card-body,.customer-item p,.service-info p,.testimonial-item p,.offer-info p, .download-info p <?php echo esc_attr($shortcode_prime_css); ?> {
    <?php
    // WindfallWP
    $shortcode_prime_font_bkp_family        = $shortcode_prime_font_bkp_family   ? ', '.$shortcode_prime_font_bkp_family : '';
    if ($shortcode_prime_font_family)             { ?> font-family: "<?php echo esc_attr($shortcode_prime_font_family);?>"<?php echo htmlspecialchars($shortcode_prime_font_bkp_family);?>;<?php }
    if ($shortcode_prime_font_weight)       { ?> font-weight:     <?php echo esc_attr($shortcode_prime_font_weight);?>;<?php }
    if ($shortcode_prime_font_style)        { ?> font-style:      <?php echo esc_attr($shortcode_prime_font_style);?>;<?php }
    if ($shortcode_prime_font_align)        { ?> text-align:      <?php echo esc_attr($shortcode_prime_font_align);?>;<?php }
    if ($shortcode_prime_font_variant)      { ?> font-variant:    <?php echo esc_attr($shortcode_prime_font_variant);?>;<?php }
    if ($shortcode_prime_font_transform)    { ?> text-transform:  <?php echo esc_attr($shortcode_prime_font_transform);?>;<?php }
    if ($shortcode_prime_font_decoration)   { ?> text-decoration: <?php echo esc_attr($shortcode_prime_font_decoration);?>;<?php }
    if ($shortcode_prime_font_size)         { ?> font-size:       <?php echo esc_attr($shortcode_prime_font_size);?>px;<?php }
    if ($shortcode_prime_font_height)       { ?> line-height:     <?php echo esc_attr($shortcode_prime_font_height);?>px;<?php }
    if ($shortcode_prime_font_ltr_spacing)  { ?> letter-spacing:  <?php echo esc_attr($shortcode_prime_font_ltr_spacing);?>px;<?php }
    if ($shortcode_prime_font_word_spacing) { ?> word-spacing:    <?php echo esc_attr($shortcode_prime_font_word_spacing);?>px;<?php }
    if ($shortcode_prime_font_color)        { ?> color:           <?php echo esc_attr($shortcode_prime_font_color);?>;<?php } ?>
  }
  <?php
  $custom_typography = cs_get_option('custom_typography');
  if( ! empty( $custom_typography ) ) {
    foreach ( $custom_typography as $custom_style ) {
      $custom_css = $custom_style['custom_css'];
      $custom_typo = $custom_style['custom_typo'];

      $font_family       = $custom_typo['font-family'];
      $font_bkp_family   = $custom_typo['backup-font-family'];
      $font_weight       = $custom_typo['font-weight'];
      $font_style        = $custom_typo['font-style'];
      $font_align        = $custom_typo['text-align'];
      $font_variant      = $custom_typo['font-variant'];
      $font_transform    = $custom_typo['text-transform'];
      $font_decoration   = $custom_typo['text-decoration'];
      $font_size         = $custom_typo['font-size'];
      $font_height       = $custom_typo['line-height'];
      $font_ltr_spacing  = $custom_typo['letter-spacing'];
      $font_word_spacing = $custom_typo['word-spacing'];
      $font_color        = $custom_typo['color'];
      $font_bkp_family   = $font_bkp_family   ? ', '.$font_bkp_family : '';
      // WindfallWP
      if( ! empty( $custom_css ) ) {

        echo esc_attr($custom_css) ?> { <?php
          if ($font_family)             { ?> font-family: "<?php echo esc_attr($font_family);?>"<?php echo htmlspecialchars($font_bkp_family);?>;<?php }
          if ($font_weight)       { ?> font-weight:     <?php echo esc_attr($font_weight);?>;<?php }
          if ($font_style)        { ?> font-style:      <?php echo esc_attr($font_style);?>;<?php }
          if ($font_align)        { ?> text-align:      <?php echo esc_attr($font_align);?>;<?php }
          if ($font_variant)      { ?> font-variant:    <?php echo esc_attr($font_variant);?>;<?php }
          if ($font_transform)    { ?> text-transform:  <?php echo esc_attr($font_transform);?>;<?php }
          if ($font_decoration)   { ?> text-decoration: <?php echo esc_attr($font_decoration);?>;<?php }
          if ($font_size)         { ?> font-size:       <?php echo esc_attr($font_size);?>px;<?php }
          if ($font_height)       { ?> line-height:     <?php echo esc_attr($font_height);?>px;<?php }
          if ($font_ltr_spacing)  { ?> letter-spacing:  <?php echo esc_attr($font_ltr_spacing);?>px;<?php }
          if ($font_word_spacing) { ?> word-spacing:    <?php echo esc_attr($font_word_spacing);?>px;<?php }
          if ($font_color)        { ?> color:           <?php echo esc_attr($font_color);?>;<?php } ?>
        }<?php

      }
    }
  }

  $font_family       = cs_get_option( 'custom_font_family' );

  if( ! empty( $font_family ) ) {

    foreach ( $font_family as $font ) {
      echo '@font-face{';

      echo 'font-family: "'. $font['name'] .'";';

      if( empty( $font['css'] ) ) {
        echo 'font-style: normal;';
        echo 'font-weight: normal;';
      } else {
        echo esc_attr($font['css']); // WindfallWP
      }

      echo ( ! empty( $font['ttf']  ) ) ? 'src: url('. esc_url($font['ttf']).'];' : '';
      echo ( ! empty( $font['eot']  ) ) ? 'src: url('. esc_url($font['eot']).'];' : '';
      echo ( ! empty( $font['woff'] ) ) ? 'src: url('. esc_url($font['woff']) .'];' : '';
      echo ( ! empty( $font['otf']  ) ) ? 'src: url('. esc_url($font['otf']).'];' : '';

      echo '}';
    }

  }
  echo '</style>';
}
add_action('windfall-vt-dynamic-styles', 'windfall_vt_scripts_styles_func');