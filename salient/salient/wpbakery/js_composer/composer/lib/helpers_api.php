<?php
function vc_map($attributes) {
  if( !isset($attributes['base']) ) {
    trigger_error(__("Wrong wpb_map object. Base attribute is required", 'js_composer'), E_USER_ERROR);
    die();
  }
  WPBMap::map($attributes['base'], $attributes);
}
/* Backwards compatibility  **/
function wpb_map($attributes) { vc_map($attributes); }


function vc_remove_element($shortcode) {
  WPBMap::dropShortcode($shortcode);
}
/* Backwards compatibility  **/
function wpb_remove($shortcode) { vc_remove_element($shortcode); }


function vc_add_param($shortcode, $attributes) {
  WPBMap::addParam($shortcode, $attributes);
}
/* Backwards compatibility  **/
function wpb_add_param($shortcode, $attributes) { vc_add_param($shortcode, $attributes); }

/**
 * Shorthand function for WPBMap::modify
 * @param $name
 * @param $setting
 * @param string $value
 * @return array|bool
 */
function vc_map_update($name = '', $setting = '', $value = '') {
    return WPBMap::modify($name, $setting);
}

/**
 * Shorthand function for WPBMap::dropParam
 * @param $name
 * @param $attribute_name
 */
function vc_remove_param($name = '', $attribute_name = '') {
    return WPBMap::dropParam($name, $attribute_name);
}

/**
 * Sets plugin as theme plugin.
 * @param bool $disable_updater - If value is true disables auto updater options.
 */
function vc_set_as_theme($disable_updater = false) {

    $composer = WPBakeryVisualComposer::getInstance();
    $composer->setSettingsAsTheme();
    if($disable_updater) $composer->disableUpdater();
}