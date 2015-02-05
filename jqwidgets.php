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
    public function __construct($for_admin)
    {
        $this->for_admin = $for_admin;
        if($this->for_admin)
        {
            add_action('admin_enqueue_scripts', array($this, 'registerResource'));
        }
        else
        {
            add_action('wp_enqueue_scripts', array($this, 'registerResource'));
        }

    }
    private  function getScriptCode($count)
    {
        return $this->namespace.((string)$count);
    }
    public function registerResource()
    {
        //Register script
        $count = 0;
        foreach($this->script_list as $item)
        {
            wp_register_script($this->getScriptCode($count), plugins_url($this->qd_js_dir . $item, $this->_FILE_));
            wp_enqueue_script($this->getScriptCode($count));
            $count++;
        }
        //CSS
        wp_register_style( 'qd-style-name', plugins_url('jqwidgets/'.$this->qd_css_dir . 'jqx.base.css', $this->__FILE__) );
        wp_enqueue_style('qd-style-name');
    }
    private $for_admin = true;
    private $qd_js_dir = '/src/';
    private $qd_css_dir = '/src/styles/';
    private $namespace = 'qd_script_';
    private $_FILE_ = __FILE__;
    private $script_list = array(
        ""//0
    ,"jqx-all.js"//1
    , "jqxangular.js"//2
    , "jqxbulletchart.js"//3
    , "jqxbuttongroup.js"//4
    , "jqxbuttons.js"//5
    , "jqxcalendar.js"//6
    , "jqxchart.core.js"//7
    , "jqxchart.js"//8
    , "jqxchart.rangeselector.js"//9
    , "jqxcheckbox.js"//10
    , "jqxcolorpicker.js"//11
    , "jqxcombobox.js"//12
    , "jqxcore.js"//13
    , "jqxdata.export.js"//14
    , "jqxdata.js"//15
    , "jqxdatatable.js"//16
    , "jqxdatetimeinput.js"//17
    , "jqxdocking.js"//18
    , "jqxdockpanel.js"//19
    , "jqxdragdrop.js"//20
    , "jqxdraw.js"//21
    , "jqxdropdownbutton.js"//22
    , "jqxdropdownlist.js"//23
    , "jqxeditor.js"//24
    , "jqxexpander.js"//25
    , "jqxgauge.js"//26
    , "jqxgrid.aggregates.js"//27
    , "jqxgrid.columnsreorder.js"//28
    , "jqxgrid.columnsresize.js"//29
    , "jqxgrid.edit.js"//30
    , "jqxgrid.export.js"//31
    , "jqxgrid.filter.js"//32
    , "jqxgrid.grouping.js"//33
    , "jqxgrid.js"//34
    , "jqxgrid.pager.js"//35
    , "jqxgrid.selection.js"//36
    , "jqxgrid.sort.js"//37
    , "jqxgrid.storage.js"//38
    , "jqxinput.js"//39
    , "jqxknockout.js"//40
    , "jqxlistbox.js"//41
    , "jqxlistmenu.js"//42
    , "jqxmaskedinput.js"//43
    , "jqxmenu.js"//44
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
    , "jqxscrollbar.js"//55
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
//init
$ghfceeety67 = new QdJqwidgets(true);