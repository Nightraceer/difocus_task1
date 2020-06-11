<?php
error_reporting(E_ALL ^ E_DEPRECATED);

require_once '../vendor/autoload.php';
require_once '../app/Application.php';


$application = new Application();
$application->run();