<?php

// Define path to root directory
defined('ROOT_PATH')
    || define('ROOT_PATH', realpath(dirname(__FILE__)));

// Define path to web site path on the internet  http://domain.com
defined('WEB_PATH')
    || define('WEB_PATH', str_replace("/index.php", "", "http://".($_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"])));


//echo WEB_PATH;

include "Bootstrap.php";
$boot = new Bootstrap();
$boot->initialize();
$boot->run();

