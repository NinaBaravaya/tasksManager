<?php
defined('TASK') or exit('Access denied');

class Login_Controller extends Base_Admin
{
    protected $ob_us;
    protected $user = false;

    protected function input($param = array())
    {
        parent::input();
        $this->ob_us = Model_User::get_instance();

        if (isset($param['logout'])) {
            $logout = $this->clear_int($param['logout']);

            if ($logout) {
                $res = $this->ob_us->logout();
                if ($res) {
                    header("Location:" . SITE_URL);
                    exit();
                }
            }
        }

        $time_clean = time() - (600 * 24 * FEALT);
        $this->ob_us->clean_fealtures($time_clean);

        $ip_u = $_SERVER['REMOTE_ADDR'];
        $attempts = $this->ob_us->get_fealtures($ip_u);

        if ($this->is_post()) {

            if (isset($_POST['name']) && isset($_POST['password']) && $attempts < 3) {
                $name = $this->clear_str($_POST['name']);
                $password = $this->clear_str($_POST['password']);

                try {
                    $id = $this->ob_us->get_user($name, $password);
                    $this->ob_us->check_id_user($id);
                    $this->ob_us->set();
                    header("Location:" . SITE_URL . 'edittasks');
                    exit();

                } catch (AuthException $e) {

                    if ($attempts == NULL) {
                        $this->ob_us->insert_fealt($ip_u);
                    } elseif ($attempts > 0) {
                        $this->ob_us->update_fealt($ip_u, $attempts);
                    }
                }
            }
        }
    }

    protected function output()
    {
        $this->content = $this->render(VIEW . 'admin/login_page', array('error' => $_SESSION['auth']));
        $this->page = parent::output();
        unset($_SESSION['auth']);
        return $this->page;
    }
}
