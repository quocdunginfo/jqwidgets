<?php
/**
 * @package qdJqwidgets
 */
/*
Plugin Name: qdJqwidgets
Plugin URI:
Description: jqWidget environment setup and register Javascript, CSS for admin dashboard
Version: 1.0
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
    //use for Qdmvc plugin
    public static function registerResource($for_admin)
    {
        if($for_admin)
        {
            add_action('admin_enqueue_scripts', array('QdJqwidgets', 'loadResourceAdmin'));
        }
        else
        {
            add_action('wp_enqueue_scripts', array('QdJqwidgets', 'loadResourceAdmin'));
        }
    }
    //use for Theme
    public static function loadSinglePluginJS($path, $front=true)
    {
        wp_register_script($path, plugins_url(static::$plugin_dir . $path, static::$_FILE_));
        wp_enqueue_script($path);
    }
    //use for WP hook callback
    public static function loadResourceAdmin()
    {

        /*Load js*/
        $count = 0;
        //Load plugin js
        foreach(static::$plugin_list_js as $item) {
            if($item == '')
            {
                continue;
            }
            wp_register_script(static::$namespace_js .'_'.$count, plugins_url(static::$plugin_dir . $item, static::$_FILE_));
            wp_enqueue_script(static::$namespace_js .'_'.$count);
            $count++;
        }

        //Load jqWidget js

        foreach(QdJqwidgets::$list_js as $item)
        {
            if($item == '')
            {
                continue;
            }
            wp_register_script(static::$namespace_js .'_'.$count, plugins_url(static::$src_dir . $item, static::$_FILE_));
            wp_enqueue_script(static::$namespace_js .'_'.$count);
            $count++;
        }


        /*Load CSS*/
        //Load jqWidget CSS
        foreach(static::$list_css as $item)
        {
            if($item == '')
            {
                continue;
            }
            wp_register_style( static::$namespace_css.'_'.$count, plugins_url(static::$src_css_dir . $item, static::$_FILE_) );
            wp_enqueue_style( static::$namespace_css.'_'.$count );
            $count++;
        }

        //Load plugin CSS
        foreach(static::$plugin_list_css as $item)
        {
            if($item == '')
            {
                continue;
            }
            wp_register_style( static::$namespace_css.'_'.$count, plugins_url(static::$plugin_dir . $item, static::$_FILE_) );
            wp_enqueue_style( static::$namespace_css.'_'.$count );
            $count++;
        }
    }
    private static $_FILE_ = __FILE__;

    private static $plugin_dir = '/plugin/';
    private static  $plugin_list_js = array(/*"form2js.js","jquery.formautofill.js",*/ "knockout-3.2.0.js", "knockout.mapping-latest.js", "bootstrap/bootstrap.min.js", /*'intro.js/intro.min.js',*/ 'colorpicker/jscolor.js',
        //DatePicker
        'datepicker/moment-with-locales.js',
        'datepicker/bootstrap-datetimepicker.js'
        //END DatePicker
    );
    private static  $plugin_list_css = array('bootstrap/bootstrap.min.css', 'intro.js/introjs.min.css',
        //DatePicker
        'datepicker/bootstrap-datetimepicker.css'
        //END DatePicker
    );


    private static $src_dir = '/src/';
    private static $src_css_dir = '/src/styles/';
    private static $namespace_js = 'qd_js_';
    private static $namespace_css = 'qd_css_';
    //under $src_css_dir pre-path
    private static $list_css = array(
        'jqx.base.css'
    );
    private static $list_js = array(
        ""//0
    ,"jqx-all.js"//1
    , "jqxangular.js"//2
    , "jqxbulletchart.js"//3
    , "jqxbuttongroup.js"//4


    , "jqxchart.core.js"//7
    , "jqxchart.js"//8
    , "jqxchart.rangeselector.js"//9
    , "jqxcheckbox.js"//10
    , "jqxcolorpicker.js"//11
    , "jqxcombobox.js"//12
    , "jqxcore.js"//13

    , "jqxbuttons.js"//5
    , "jqxscrollbar.js"//55
    , "jqxlistbox.js"//41

    , "jqxdatetimeinput.js"//17
    , "jqxcalendar.js"//6,
    , "globalization/globalize.js"//6,

    , "jqxdatatable.js"//16

    , "jqxdocking.js"//18
    , "jqxdockpanel.js"//19
    , "jqxdragdrop.js"//20
    , "jqxdraw.js"//21
    , "jqxdropdownbutton.js"//22
    , "jqxdropdownlist.js"//23
    , "jqxmenu.js"//44

    , "jqxeditor.js"//24
    , "jqxexpander.js"//25
    , "jqxgauge.js"//26
    , "jqxgrid.aggregates.js"//27
    , "jqxgrid.columnsreorder.js"//28

    , "jqxgrid.js"//34

    , "jqxgrid.edit.js"//30
    , "jqxgrid.columnsresize.js"//29

    , "jqxgrid.grouping.js"//33
    , "jqxgrid.pager.js"//35
    , "jqxgrid.sort.js"//37
    , "jqxgrid.selection.js"//36

    , "jqxgrid.filter.js"//32//order is strictly important
    , "jqxdata.js"//15

    , "jqxgrid.export.js"//31
    , "jqxdata.export.js"//14

    , "jqxgrid.storage.js"//38
    , "jqxinput.js"//39
    , "jqxknockout.js"//40

    , "jqxlistmenu.js"//42
    , "jqxmaskedinput.js"//43

    , "jqxnavigationbar.js"//45
    , "jqxnotification.js"//46
    , "jqxnumberinput.js"//47
    , "jqxpanel.js"//48
    , "jqxpasswordinput.js"//49
    , "jqxprogressbar.js"//50
    , "jqxradiobutton.js"//51
    , "jqxrangeselector.js"//52
    , "jqxrating.js"//53
    , "jqxresponse.js"//54

    , "jqxscrollview.js"//56
    , "jqxslider.js"//57
    , "jqxsplitter.js"//58
    , "jqxswitchbutton.js"//59
    , "jqxtabs.js"//60
    , "jqxtooltip.js"//61
    , "jqxtouch.js"//62
    , "jqxtree.js"//63
    , "jqxtreegrid.js"//64
    , "jqxtreemap.js"//65
    , "jqxvalidator.js"//66
    , "jqxwindow.js"//67

    );
}