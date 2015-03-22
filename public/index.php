<?php

require_once(__DIR__."/../vendor/autoload.php");

use \Mpwarfwk\Component\Bootstrap;

$bootstrap = new Bootstrap();
$response = $bootstrap->run();
$response->send();



