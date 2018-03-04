<?php
defined('TASK') or exit('Access denied');

class Model
{
    static $instance;
    public $ins_driver;

    static function get_instance()
    {
        if (self::$instance instanceof self) {
            return self::$instance;
        } else {
            return self::$instance = new self;
        }
    }

    private function __construct()
    {
        try {
            $this->ins_driver = Model_Driver::get_instance();

        } catch (DbException $e) {
            exit();
        }
    }

    public function get_tasks(){
        $result = $this->ins_driver->select(
             array('task_id','img','text','status'),
            'tasks'
        );
        return $result;
    }

    public function add_task($user_name,
                             $email,
                             $text,
                             $img)
    {

        $sql = "SELECT user_id FROM users WHERE email = '" . $email . "'";
        $result = $this->ins_driver->ins_db->query($sql);

        $row = $result->fetch_assoc();
        if (empty($row['user_id'])) {
            $sql = "INSERT INTO users (user_name, email) VALUES ('" . $user_name . "','" . $email . "')";
            $result = $this->ins_driver->ins_db->query($sql);
            if ($result) {
                $id_u = $this->ins_driver->ins_db->insert_id;
                $sql = "INSERT INTO tasks (img, text, id_user) VALUES ('" . $img . "','" . $text . "', $id_u)";
                $result2 = $this->ins_driver->ins_db->query($sql);
                if (!$result2) {
                    throw new DbException("DB error" . $this->ins_driver->ins_db->errno . "|" .
                        $this->ins_driver->ins_db->error);
                }
            }
        } else {
            $user_id = $row['user_id'];
            $sql = "INSERT INTO tasks (img, text, id_user) VALUES ('" . $img . "','" . $text . "', $user_id)";

            $result2 = $this->ins_driver->ins_db->query($sql);

            if (!$result2) {
                throw new DbException("DB error" . $this->ins_driver->ins_db->errno . "|" .
                    $this->ins_driver->ins_db->error);
            }
        }

        return true;
    }

    public function get_task($id)
    {
        $result = $this->ins_driver->select(
            array('task_id', 'img', 'text', 'status'),
            'tasks',
            array('task_id' => $id)
        );

        return $result[0];
    }

    public function edit_task($id, $text, $status){
        $result = $this->ins_driver->update(
            'tasks',
            array('task_id', 'text', 'status'),
            array($id, $text, $status),
            array('task_id' => $id)
        );

        return $result;
    }

    public function edit_task_status($id,$status){
        $result = $this->ins_driver->update(
            'tasks',
            array('status'),
            array($status),
            array('task_id' => $id)
        );

        return $result;
    }

    public function edit_task_text($id,$text){
        $result = $this->ins_driver->update(
            'tasks',
            array('text'),
            array($text),
            array('task_id' => $id)
        );

        return $result;
    }
}