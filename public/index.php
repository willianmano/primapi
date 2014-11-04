<?php

define('REQUEST_MICROTIME', microtime(true));
error_reporting(E_ALL | E_STRICT);

if (file_exists(dirname(__DIR__) . '/vendor/autoload.php')) {
	require_once dirname(__DIR__) . '/vendor/autoload.php';
} else {
	echo 'Please, use Composer to install dependencies.';
    exit(2);
}

// All system's routes
require_once(dirname(__DIR__) . '/app/routes.php');