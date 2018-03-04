<?php
define('TASK',TRUE);

header("Content-Type:text/html;charset=utf-8");
error_reporting(0);
session_start();

require 'config.php';

set_include_path(get_include_path()
    .PATH_SEPARATOR.CONTROLLER
    .PATH_SEPARATOR.MODEL
    .PATH_SEPARATOR.LIB
);

function __autoload($class_name){

    if(!include $class_name.'.php'){

        try{
            throw new ContrException('Invalid file to connect to');
            }
            catch (ContrException $e){
                echo $e->getMessage();
            }
        }
}

try{
    $obj = Route_Controller::get_instance();
    $obj->route();
}
catch(ContrException $e) {
    return;
}
