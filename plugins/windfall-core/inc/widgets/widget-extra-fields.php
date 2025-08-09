<?php
/*
 * Add Extra Field for WordPress Widgets
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

// Add Fields for All WordPress Default Widgets
function windfall_in_widget_form($t,$return,$instance){
  $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '', 'vt_custom_class' => '') );
  if ( !isset($instance['vt_custom_class']) )
    $instance['vt_custom_class'] = null;
  ?>
  <p class="vt-widget-field cs-element">
    <label for="<?php echo esc_attr($t->get_field_id('vt_custom_class')); ?>"><?php esc_html_e('Custom Class:', 'windfall'); ?></label>
    <input class="widefat" type="text" name="<?php echo esc_attr($t->get_field_name('vt_custom_class')); ?>" id="<?php echo esc_attr($t->get_field_id('vt_custom_class')); ?>" value="<?php echo esc_attr($instance['vt_custom_class']);?>" />
    <span class="cs-text-desc"><?php echo __('Add your custom classes.', 'windfall'); ?></span>
    <div class="clear"></div>
  </p>
  <?php
  $retrun = null;
  return array($t,$return,$instance);
}
add_action('in_widget_form', 'windfall_in_widget_form',5,3);

// Update Fields Data
function windfall_in_widget_form_update($instance, $new_instance, $old_instance){
  $instance['vt_custom_class'] = strip_tags($new_instance['vt_custom_class']);
  return $instance;
}
add_filter('widget_update_callback', 'windfall_in_widget_form_update',5,3);

// Display Fields Output
function windfall_dynamic_sidebar_params($params){
  global $wp_registered_widgets;
  $widget_id = $params[0]['widget_id'];
  $widget_obj = $wp_registered_widgets[$widget_id];
  $widget_opt = get_option($widget_obj['callback'][0]->option_name);
  $widget_num = $widget_obj['params'][0]['number'];
  if(isset($widget_opt[$widget_num]['vt_custom_class'])) {
    $vt_custom_class = $widget_opt[$widget_num]['vt_custom_class'];
  } else {
    $vt_custom_class = '';
  }
  $params[0]['before_widget'] = preg_replace('/class="/', 'class="'.$vt_custom_class.' ',  $params[0]['before_widget'], 1);
  return $params;
}
add_filter('dynamic_sidebar_params', 'windfall_dynamic_sidebar_params');
