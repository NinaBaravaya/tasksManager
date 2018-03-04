<?php
defined('TASK') or exit('Access denied');

abstract class Base extends Base_Controller
{
    protected $title;
    protected $style;
    protected $script;
    protected $header;
    protected $content;
    protected $footer;
    protected $ob_m;

    protected $catalog_brands,$keywords,$description;

    protected function input(){
        $this->title = "Task manager | ";

        foreach($this->styles as $style){
            $this->style[] = SITE_URL.VIEW.$style;
        }

        foreach($this->scripts as $script){
            $this->script[] = SITE_URL.VIEW.$script;
        }

        $this->ob_m = Model::get_instance();
    }
    protected function output(){

        $this->footer = $this->render(VIEW.'footer',array(
        ));

        $this->header = $this->render(VIEW.'header', array(
            'styles'=>$this->style,
            'scripts'=>$this->script,
            'title'=>$this->title,

        ));

        $page = $this->render(VIEW.'index',array('header' => $this->header,
            'content' => $this->content,
            'footer' => $this->footer
        ));
        return $page;
    }

}