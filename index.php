<?php
//error_reporting(0);
ob_start();
session_start();
extract($_GET);
extract($_POST);
ob_flush();
require "vendor/autoload.php";
//require "System/Core/Autoload.php";
require "config.php";

ini_set('display_errors', 1);
if(ENVIRONMENT=="production") {
    error_reporting(0);
    ini_set('display_errors', 0);
}
require "App/Router.php";

new System\Core\App();