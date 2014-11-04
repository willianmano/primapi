<?php

use Respect\Rest\Router;
use Charon\Loader as dl;

$dbcon = new PDO(
    'mysql:host=localhost;port=3306;dbname=rmmapi',
    'root',
    '1234',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
);

$app = new Router;

$app->get('/', function() use ($dbcon) {
    return 'ola rmm';
});