/*
 * All Admin Related Scripts in this Windfall Theme
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

jQuery(document).ready(function($) {
  "use strict";
  /*---------------------------------------------------------------*/
  /* =  Toggle Meta boxes based on post formats
  /*---------------------------------------------------------------*/
  function toggle_metaboxes() {

    var format = $("input[name='post_format']:checked").val();

    $('.cs-element-standard-image, .cs-element-gallery-format, #cs-tab-section_post_formats .cs-element-add-gallery').hide();

    if (format == '0' || format == 'image') {
        $('').slideUp('fast');
        $('.cs-element-standard-image').slideDown('slow');
    }
    if (format == 'gallery') {
        $('').slideUp('fast');
        $('.cs-element-gallery-format, #cs-tab-section_post_formats .cs-element-add-gallery').slideDown('slow');
    }

    $('.cs-element-audio-post, .cs-element-audio-link, .cs-element-audio-iframe-src').hide();

    if (format == 'audio') {
        $('').slideUp('fast');
        $('.cs-element-audio-post, .cs-element-listing-page-featured-image, .cs-element-audio-link, .cs-element-audio-iframe-src').slideDown('slow');
    }

    $('.cs-element-video-post, .cs-element-video-link, .cs-element-video-iframe').hide();

    if (format == 'video') {
        $('').slideUp('fast');
        $('.cs-element-video-post, .cs-element-listing-page-featured-image, .cs-element-video-link, .cs-element-video-iframe').slideDown('slow');
    }
    $('.cs-element-video-link').show();

  }

  toggle_metaboxes(); // Execute on document ready

  $('#post-formats-select input[type="radio"]').on('click', function() { toggle_metaboxes });

  $( ".vt-cs-widget-fields" ).parents( ".widget-inside" ).addClass( "vt-cs-widget" );

  // Auto & Manual Import Tabs Active Mode
  $(function() {
    var loc = window.location.href; // returns the full URL
    console.log(loc);
    if(loc.indexOf('manual') > -1) {
      $('.nav-tab-wrapper .vt-auto-mode').removeClass('nav-tab-active');
      $('.nav-tab-wrapper .vt-manual-mode').addClass('nav-tab-active');
    }
  });

});