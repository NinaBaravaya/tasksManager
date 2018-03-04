<?php
defined('TASK') or exit('Access denied');

class Edittasks_Controller extends Base_Admin
{
    protected $option = 'view';
    protected $tasks;
    protected $navigation;
    protected $task_id;

    protected $type_img;
    protected $message;

    protected function input($param = array())
    {
        parent::input();
        $this->title .= 'Edit tasks';

        if (isset($param['page'])) {
            $page = $this->clear_int($param['page']);
            if ($page == 0) {
                $page = 1;
            }
        } else {
            $page = 1;
        }

        $pager = new Pager(
            $page,
            'tasks',
            array(),
            'task_id',
            'ASC',
            QUANTITY,
            QUANTITY_LINKS
        );

        if (is_object($pager)) {
            $this->navigation = $pager->get_navigation();
            $this->tasks = $pager->get_posts();
        }
        if ($param['option'] == 'edit') {

            if ($param['task_id']) {

                $this->task_id = $this->clear_int($param['task_id']);
                $this->task = $this->ob_m->get_task($this->task_id);
                $this->option = 'edit';
            }
        }

        if ($this->is_post()) {
            $arr_status = ["0", "1"];
            if ($_POST['task_id'] && in_array($_POST['status'], $arr_status)) {
                $task_id = $this->clear_int($_POST['task_id']);
                $status = ($_POST['status']);
                $result = $this->ob_m->edit_task_status(
                    $task_id,
                    $status
                );
            }

            if ($_POST['task_id'] && $_POST['text']) {
                $task_id = $this->clear_int($_POST['task_id']);
                $text = ($_POST['text']);
                $result = $this->ob_m->edit_task_text(
                    $task_id,
                    $text
                );

            }
            $id = $this->clear_int($_POST['id']);
            $status = $_POST['status'];
            $text = $_POST['text'];
            if (isset($status) && !empty($text)) {
                if ($this->option = 'edit') {
                    $result = $this->ob_m->edit_task(
                        $id,
                        $text,
                        $status
                    );
                    if ($result === TRUE) {
                        $_SESSION['message'] = "Changes was successfully completed";
                    } else {
                        $_SESSION['message'] = "Error changing task";
                    }
                    header("Location:" . SITE_URL . 'edittasks');
                    exit();
                }
            } else {
                $_SESSION['message'] = "Please, fill in the required fields (task text and status)";
                header("Location:" . SITE_URL . 'edittasks');
                exit();
            }
        }
        $this->message = $_SESSION['message'];
    }

    protected function output()
    {
        if ($this->option == 'view') {
            $this->content = $this->render(VIEW . 'admin/tasks_page', array(
                'tasks' => $this->tasks,
                'navigation' => $this->navigation,
                'mes' => $this->message,
            ));
        }

        $this->page = parent::output();
        unset($_SESSION['message']);
        return $this->page;
    }
}