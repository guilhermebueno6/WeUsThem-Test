<?php

ini_set('display_errors',1);

define('ABSPATH',__DIR__);
define('SCRIPT_PATH', ABSPATH.'/script');


session_start();


require_once ABSPATH.'/config/database.php';
require_once SCRIPT_PATH.'/functions.php';
require_once SCRIPT_PATH.'/contacts.php';
require_once SCRIPT_PATH.'/user.php';

// require_once ADMIN_SCRIPT_PATH.'/read.php'; 
// require_once ADMIN_SCRIPT_PATH.'/login.php';
// require_once ADMIN_SCRIPT_PATH.'/functions.php';
// require_once ADMIN_SCRIPT_PATH.'/user.php';



?>