<?php
defined('TASK') or exit('Access denied');

abstract class Base_Controller
{

    protected $request_url;
    protected $controller;
    protected $params;

    protected $styles, $styles_admin;
    protected $scripts, $scripts_admin;
    protected $error;

    protected $page;

    public function route()
    {
        if (class_exists($this->controller)) {
            $obj = new $this->controller;
            $obj->request($this->params);
        }
    }

    public function init()
    {
        global $conf;

        if (isset($conf['styles'])) {
            foreach ($conf['styles'] as $style) {
                $this->styles[] = trim($style, '/');
            }
        }

        if (isset($conf['styles_admin'])) {
            foreach ($conf['styles_admin'] as $style_admin) {
                $this->styles_admin[] = trim($style_admin, '/');
            }
        }

        if (isset($conf['scripts'])) {
            foreach ($conf['scripts'] as $script) {
                $this->scripts[] = trim($script, '/');
            }

        }

        if (isset($conf['scripts_admin'])) {
            foreach ($conf['scripts_admin'] as $script_admin) {
                $this->scripts_admin[] = trim($script_admin, '/');
            }
        }
    }

    protected function get_controller()
    {
        return $this->controller;
    }

    protected function get_params()
    {
        return $this->params;
    }

    protected function input()
    {

    }

    protected function output()
    {

    }

    public function request($param = array())
    {
        $this->init();
        $this->input($param);
        $this->output();

        if (!empty($this->error)) {
            $this->write_error($this->error);
        }
        $this->get_page();
    }

    public function get_page()
    {
        echo $this->page;
    }

    protected function render($path, $param = array())
    {

        extract($param);
        ob_start();
        if (!include($path . '.php')) {
            throw new ContrException('This template is not available');
        }

        return ob_get_clean();
    }

    public function clear_str($var)
    {
        if (is_array($var)) {
            $row = array();
            foreach ($var as $key => $item) {
                $row[$key] = trim(strip_tags($item));
            }

            return $row;
        }
        return trim(strip_tags($var));
    }

    public function clear_int($var)
    {
        return (int)$var;
    }

    public function is_post()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            return TRUE;
        }

        return FALSE;
    }

    public function check_auth()
    {
        try {
            $cookie = Model_User::get_instance();
            $cookie->check_id_user();
            $cookie->validate_cookie();
        } catch (AuthException $e) {

            $this->error = "User authorization error |";
            $this->error .= $e->getMessage();

            $this->write_error($this->error);
            header("Location:" . SITE_URL . "login");
            exit();
        }
    }

    public function write_error($err)
    {
        $time = date("d-m-Y G:i:s");
        $str = "Fault: " . $time . " - " . $err . "\n\r";
        file_put_contents("log.txt", $str, FILE_APPEND);//данные дописываются в файл
    }

    public function img_resize($dest, $type)
    {
        $img_id = '';
        switch ($type) {
            case 'jpeg':
                $img_id = [imageCreateFromJpeg($dest), $type];
                break;
            case 'png':
                $img_id = [imageCreateFromPng($dest), $type];
                break;
            case 'gif':
                $img_id = [imagecreatefromGif($dest), $type];
                break;
        }

        $img_width = imageSX($img_id[0]);
        $img_height = imageSY($img_id[0]);

        if ($img_width / $img_height > 1) {
            $k_w = round($img_width / IMG_WIDTH, 2);
            $img_mini_width = round($img_width / $k_w);
            $img_mini_height = round($img_height / $k_w);
        } else {
            $k_h = round($img_height / IMG_HEIGHT, 2);
            $img_mini_width = round($img_width / $k_h);
            $img_mini_height = round($img_height / $k_h);
        }

        $img_dest_id = imageCreateTrueColor($img_mini_width, $img_mini_height);
        $result = imageCopyResampled(
            $img_dest_id,
            $img_id[0], 0
            , 0
            , 0,
            0,
            $img_mini_width,
            $img_mini_height,
            $img_width,
            $img_height
        );

        switch ($img_id[1]) {
            case 'jpeg':
                $name_img = $this->rand_str() . '.jpg';
                $img = imageJpeg($img_dest_id, UPLOAD_DIR . $name_img, 100);
                break;
            case 'png':
                $name_img = $this->rand_str() . '.png';
                $img = imagePng($img_dest_id, UPLOAD_DIR . $name_img, 9);
                break;
            case 'gif':
                $name_img = $this->rand_str() . '.gif';
                $img = imageGif($img_dest_id, UPLOAD_DIR . $name_img);
                break;
        }
        imageDestroy($img_id[0]);
        imageDestroy($img_dest_id);

        if ($img) {
            return $name_img;
        } else {
            return FALSE;
        }
    }

    protected function rand_str()
    {
        $str = md5(microtime());
        return substr($str, 0, 10);
    }
}