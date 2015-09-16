<?php
/**
 * WPBakery Visual Composer Shortcode mapper
 *
 * @package WPBakeryVisualComposer
 *
 */


class WPBMap
{
    protected static $sc = Array();
    protected static $layouts = Array();
    protected static $categories = Array();
    protected static $user_sc = false;
    protected static $user_sorted_sc = false;
    protected static $user_categories = false;
    protected static $settings, $user_role;
    protected static $tags_regexp;
    public static function layout($array)
    {
        self::$layouts[] = $array;
    }

    public static function getLayouts()
    {
        return self::$layouts;
    }

    public static function getSettings()
    {
        global $current_user;

        if (self::$settings === null) {
            if (function_exists('get_currentuserinfo')) {
                get_currentuserinfo();
                /** @var $settings - get use group access rules */
                if (!empty($current_user->roles))
                    self::$user_role = $current_user->roles[0];
                else
                    self::$user_role = 'author';
            } else {
                self::$user_role = 'author';
            }
            self::$settings = WPBakeryVisualComposerSettings::get('groups_access_rules');
        }

        return self::$settings;
    }


    public static function map($name, $attributes)
    {
        if (empty($attributes['name'])) {
            trigger_error(sprintf(__("Wrong name for shortcode:%s. Name required", "js_composer"), $name));
        } elseif (empty($attributes['base'])) {
            trigger_error(sprintf(__("Wrong base for shortcode:%s. Base required", "js_composer"), $name));
        } else {
            self::$sc[$name] = $attributes;
            self::$sc[$name]['params'] = Array();
            if (!empty($attributes['params'])) {
                $attributes_keys = Array();
                foreach ($attributes['params'] as $attribute) {
                    if ($attribute['type'] === 'loop') {
                        $attribute['value'] = VcLoopSettings::buildDefault($attribute);
                    }
                    $key = array_search($attribute['param_name'], $attributes_keys);
                    if ($key === false) {
                        $attributes_keys[] = $attribute['param_name'];
                        self::$sc[$name]['params'][] = $attribute;
                    } else {
                        self::$sc[$name]['params'][$key] = $attribute;
                    }
                }
            }
            WPBakeryVisualComposer::getInstance()->addShortCodePlugin(self::$sc[$name]);
        }

    }

    public static function generateUserData($force = false)
    {
        if (!$force && self::$user_sc !== false && self::$user_categories !== false) return true;

        $settings = self::getSettings();
        self::$user_sc = self::$user_categories = self::$user_sorted_sc = array();
        foreach (self::$sc as $name => $values) {
            if (!isset($settings[self::$user_role]['shortcodes'])
                || (isset($settings[self::$user_role]['shortcodes'][$name]) && (int)$settings[self::$user_role]['shortcodes'][$name] == 1)
            ) {
                if ($name != 'vc_column' && (!isset($values['content_element']) || $values['content_element'] === true)) {
                    $categories = isset($values['category']) ? $values['category'] : '_other_category_';
                    $values['_category_ids'] = array();
                    if(is_array($categories)) {
                        foreach($categories as $c) {
                            if (array_search($c, self::$user_categories) === false) self::$user_categories[] = $c;
                            $values['_category_ids'][] = md5($c); // array_search($category, self::$categories);
                        }
                    } else {
                        if (array_search($categories, self::$user_categories) === false) self::$user_categories[] = $categories;
                        $values['_category_ids'][] = md5($categories); // array_search($category, self::$categories);
                    }

                }
                self::$user_sc[$name] = $values;
                self::$user_sorted_sc[] = $values;
            }

        }
        usort(self::$user_sorted_sc, array("WPBMap", "sort"));
    }

    public static function getShortCodes()
    {
        return self::$sc;
    }
    public static function getSortedUserShortCodes()
    {
        self::generateUserData();
        return self::$user_sorted_sc;
    }
    public static function getUserShortCodes()
    {
        self::generateUserData();
        return self::$user_sc;
    }

    public static function getShortCode($name)
    {
        return self::$sc[$name];
    }

    public static function getCategories()
    {
        return self::$categories;
    }

    public static function getUserCategories()
    {
        self::generateUserData();
        return self::$user_categories;
    }

    public static function dropParam($name, $attribute_name)
    {
        foreach (self::$sc[$name]['params'] as $index => $param) {
            if ($param['param_name'] == $attribute_name) {
                array_splice( self::$sc[$name]['params'], $index, 1 );
                return;
            }
        }
    }

    /**
     * Returns param settings
     * @static
     * @param $tag
     * @param $param_name
     */
    public static function getParam($tag, $param_name) {
        if (!isset(self::$sc[$tag]))
            return trigger_error(sprintf(__("Wrong name for shortcode:%s. Name required", "js_composer"), $tag));
        foreach (self::$sc[$tag]['params'] as $index => $param) {
            if ($param['param_name'] == $param_name) {
                return self::$sc[$tag]['params'][$index];
            }
        }
        return false;
    }
    /* Extend params for settings */
    public static function addParam($name, $attribute = Array())
    {
        if (!isset(self::$sc[$name]))
            return trigger_error(sprintf(__("Wrong name for shortcode:%s. Name required", "js_composer"), $name));
        elseif (!isset($attribute['param_name'])) {
            trigger_error(sprintf(__("Wrong attribute for '%s' shortcode. Attribute 'param_name' required", "js_composer"), $name));
        } else {

            $replaced = false;

            foreach (self::$sc[$name]['params'] as $index => $param) {
                if ($param['param_name'] == $attribute['param_name']) {
                    $replaced = true;
                    self::$sc[$name]['params'][$index] = $attribute;
                }
            }

            if ($replaced === false) self::$sc[$name]['params'][] = $attribute;

            WPBakeryVisualComposer::getInstance()->addShortCodePlugin(self::$sc[$name]);
        }
    }

    /* Extend params for settings */
    public static function mutateParam($name, $attribute = Array())
    {
        if (!isset(self::$sc[$name]))
            return trigger_error(sprintf(__("Wrong name for shortcode:%s. Name required", "js_composer"), $name));
        elseif (!isset($attribute['param_name'])) {
            trigger_error(sprintf(__("Wrong attribute for '%s' shortcode. Attribute 'param_name' required", "js_composer"), $name));
        } else {

            $replaced = false;

            foreach (self::$sc[$name]['params'] as $index => $param) {
                if ($param['param_name'] == $attribute['param_name']) {
                    $replaced = true;
                    self::$sc[$name]['params'][$index] = $attribute;
                }
            }

            if ($replaced === false) self::$sc[$name]['params'][] = $attribute;

            WPBakeryVisualComposer::getInstance()->addShortCodePlugin(self::$sc[$name]);
        }
    }
    public static function dropShortcode($name)
    {
        unset(self::$sc[$name]);
        WPBakeryVisualComposer::getInstance()->removeShortCode($name);

    }

    /**
     * Modify shortcode's mapped settings.
     * You can modify only one option of the group options.
     * Call this method with $settings_name param as associated array to mass modifications.
     *
     * @static
     * @param $name - shortcode' name.
     * @param $setting_name - option key name or the array of options.
     * @param $value - value of settings if $setting_name is option key.
     * @return array|bool
     */
    public static function modify($name, $setting_name, $value = '')
    {
        if (!isset(self::$sc[$name]))
            return trigger_error(sprintf(__("Wrong name for shortcode:%s. Name required", "js_composer"), $name));
        elseif ($setting_name === 'base') {
            return trigger_error(sprintf(__("Wrong setting_name for shortcode:%s. Base can't be modified.", "js_composer"), $name));
        }
        if (is_array($setting_name)) {
            foreach ($setting_name as $key => $value) {
                self::modify($name, $key, $value);
            }
        } else {
            self::$sc[$name][$setting_name] = $value;
        }
        return self::$sc;
    }
    public static function getTagsRegexp() {
        if(empty(self::$tags_regexp)) {
            self::$tags_regexp = implode('|', array_keys(self::$sc));
        }
        return self::$tags_regexp;
    }
    public static function sort($a, $b) {
        $a_weight = isset($a['weight']) ? (int)$a['weight'] : 0;
        $b_weight = isset($b['weight']) ? (int)$b['weight'] : 0;
        if($a_weight == $b_weight) {
            $cmpa = array_search($a, self::$user_sorted_sc);
            $cmpb = array_search($b, self::$user_sorted_sc);
            return ($cmpa > $cmpb) ? 1 : -1;
        }
        return ($a_weight < $b_weight) ? 1 : -1;
    }
}