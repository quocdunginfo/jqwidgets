<?php
/**
 * @package qdJqwidgets
 */
/*
Plugin Name: qdJqwidgets
Plugin URI:
Description: jqWidget environment setup and register Javascript, CSS for admin dashboard
Version: 1.5
Author: quocdunginfo
Author URI:
License: GPLv2 or later
Text Domain: qdJqwidgets
*/

class QdJqwidgets
{
    public function __construct()
    {

    }
    public static function getResourcePath($r_path=''){
        return plugins_url( $r_path, __FILE__ );
    }
    public static function registerAll(){
        //register js
        $list_js = static::getMandatoryJS();
        foreach($list_js as $item){
            wp_register_script(static::getJSNamespace().$item, plugins_url($item, __FILE__));
        }
        //register css
        $list_css = static::getMandatoryCSS();
        foreach($list_css as $item){
            wp_register_style(static::getCSSNamespace().$item, plugins_url($item, __FILE__));
        }
    }
    public static function loadAll(){
        //load all mandatory js and css
        $list_js = static::getMandatoryJS();
        //enqueue js
        foreach($list_js as $item){
            wp_enqueue_script(static::getJSNamespace().$item);
        }
        //enqueue css
        $list_css = static::getMandatoryCSS();
        foreach($list_css as $item){
            wp_enqueue_style(static::getCSSNamespace().$item);
        }
    }
    private static function getJSNamespace(){
        return 'qd_js_';
    }
    private static function getMandatoryJS(){
        return array(
            'plugin/knockout-3.2.0.js',
            'plugin/knockout.mapping-latest.js',
            'plugin/bootstrap/bootstrap.min.js',
            'colorpicker/jscolor.js',
            'src/jqx-all.js',
            'plugin/qr/qrcodelib.js',
            'plugin/datepicker/moment-with-locales.js',
            'plugin/datepicker/bootstrap-datetimepicker.js'

        );
    }
    private static function getMandatoryCSS(){
        return array(
            'src/styles/jqx.base.css',
            'plugin/bootstrap/bootstrap.min.css',
            //'intro.js/introjs.min.css',
            //DatePicker
            'plugin/datepicker/bootstrap-datetimepicker.css'

        );
    }
    private static function getCSSNamespace(){
        return 'qd_css_';
    }
    //use for Theme
    public static function loadSinglePluginJS($path, $front=true)
    {
        wp_register_script($path, plugins_url(static::$plugin_dir . $path, __FILE__));
        wp_enqueue_script($path);
    }
    //use for Theme
    public static function loadSinglePluginCSS($path, $front=true)
    {
        wp_register_style($path, plugins_url(static::$plugin_dir . $path, __FILE__));
        wp_enqueue_style($path);
    }

    private static $plugin_dir = '/plugin/';
}