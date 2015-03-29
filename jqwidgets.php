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
    private static function getScriptCode($count)
    {
        return QdJqwidgets::$namespace .((string)$count);
    }
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
    public static function loadJS($path, $front=true)
    {
        wp_register_script($path, plugins_url(QdJqwidgets::$qd_js_plugin_dir . $path, QdJqwidgets::$_FILE_));
        wp_enqueue_script($path);
    }
    public static function loadResourceAdmin()
    {
        //Register script
        $count = 0;
        foreach(QdJqwidgets::$script_list as $item)
        {
            if($item == '')
            {
                continue;
            }
            wp_register_script(QdJqwidgets::getScriptCode($count), plugins_url(QdJqwidgets::$qd_js_dir . $item, QdJqwidgets::$_FILE_));
            wp_enqueue_script(QdJqwidgets::getScriptCode($count));
            $count++;
        }

        //register plugin js
        foreach(QdJqwidgets::$script_plugin_list as $item) {
            wp_register_script(QdJqwidgets::getScriptCode($count), plugins_url(QdJqwidgets::$qd_js_plugin_dir . $item, QdJqwidgets::$_FILE_));
            wp_enqueue_script(QdJqwidgets::getScriptCode($count));
            $count++;
        }

        //CSS
        wp_register_style( 'qd-style-name', plugins_url(QdJqwidgets::$qd_css_dir . 'jqx.base.css', __FILE__) );
        wp_enqueue_style('qd-style-name');
        //CSS
        wp_register_style( 'qd-style-bootstrap', plugins_url(QdJqwidgets::$qd_js_plugin_dir . 'bootstrap/bootstrap.min.css', __FILE__) );
        wp_enqueue_style('qd-style-bootstrap');
    }
    private static $qd_js_plugin_dir = '/plugin/';
    //private static $for_admin = true;
    private static $qd_js_dir = '/src/';
    private static $qd_css_dir = '/src/styles/';
    private static $namespace = 'qd_script_';
    private static $_FILE_ = __FILE__;
    private static  $script_plugin_list = array("form2js.js","jquery.formautofill.js", "knockout-3.2.0.js", "bootstrap/bootstrap.min.js"/*,"watch.js", "sugar.min.js", "jquerymy-1.1.0.js"*/);
    private static $script_list = array(
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
    , "jqxdata.export.js"//14
    , "jqxdata.js"//15
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
    , "jqxgrid.export.js"//31
    , "jqxgrid.edit.js"//30
    , "jqxgrid.columnsresize.js"//29
    , "jqxgrid.filter.js"//32//order is strictly important
    , "jqxgrid.grouping.js"//33
    , "jqxgrid.pager.js"//35
    , "jqxgrid.sort.js"//37
    , "jqxgrid.selection.js"//36
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