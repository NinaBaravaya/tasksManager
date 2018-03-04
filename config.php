<?php
defined('TASK') or exit('Access denied');

define('CONTROLLER','src/controller');
define('MODEL','src/model');
define('VIEW','template/default/');
define('LIB','lib');

define('SITE_URL','/');

define('QUANTITY',3);
define('QUANTITY_LINKS',3);

define('UPLOAD_DIR','images/');

define('HOST','localhost');
define('USER','root');
define('PASSWORD','');
define('DB_NAME','tasks_list');

define('IMG_WIDTH',320);
define('IMG_HEIGHT',240);

define('NOIMAGE','no_image.jpg');

define('FEALT',1);
define("VERSION", '110');
define("KEY","GDSHG4385743HGSDHdkfgjdfk4653475JSGHDJSDSKJDF476354");
define("EXPIRATION",6000);
define("WARNING_TIME",3000);

$conf = array(
    'styles' => array(
        'css/bootstrap.min.css',
        'css/style.css',
        'css/bootstrap-sortable.css'
    ),
     'scripts' => array(
         'js/jquery-3.3.1.min.js',
         'js/moment.min.js',
         'js/jquery-ui-1.8.20.custom.min.js',
         'js/jquery.cookie.js',
         'js/js.js',
         'js/script.js',
         'js/bootstrap-sortable.js'
     ),
    'styles_admin' => array(
        'css/bootstrap.min.css',
        'css/style.css',
        'css/bootstrap-sortable.css'
    ),
     'scripts_admin' => array(
         'js/jquery-3.3.1.min.js',
         'js/moment.min.js',
         'js/script.js',
         'js/bootstrap-sortable.js',
     )
);