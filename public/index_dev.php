<?php

error_reporting(-1);
ini_set("display_errors", true);

require_once(__DIR__."/../vendor/autoload.php");

use \Mpwarfwk\Component\Bootstrap;

$bootstrap = new Bootstrap();
$response = $bootstrap->run();
$response->send();
