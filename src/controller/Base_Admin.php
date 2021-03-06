<?php
defined('TASK') or exit('Access denied');

abstract class Base_Admin extends Base_Controller
{
    protected $ob_m;
    protected $ob_us;
    protected $title;
    protected $style;
    protected $script;
    protected $content;
    protected $user = TRUE;

    protected function input()
    {
        if ($this->user == TRUE) {
            $this->check_auth();
        }
        $this->title .= "Admin panel |";
        foreach ($this->styles_admin as $style) {
            $this->style[] = SITE_URL . VIEW . 'admin/' . $style;
        }
        foreach ($this->scripts_admin as $script) {
            $this->script[] = SITE_URL . VIEW . 'admin/' . $script;
        }
        $this->ob_m = Model::get_instance();
        $this->ob_us = Model_User::get_instance();
    }

    protected function output()
    {
        $header = $this->render(VIEW . 'admin/header', array(
            'title' => $this->title,
            'styles' => $this->style,
            'scripts' => $this->script
        ));

        $footer = $this->render(VIEW . 'admin/footer');
        $page = $this->render(VIEW . 'admin/index', array(
            'header' => $header,
            'content' => $this->content,
            'footer' => $footer
        ));

        return $page;
    }
}






























