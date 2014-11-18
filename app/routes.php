<?php

use Respect\Rest\Router;
use Charon\Loader as dl;

$dbcon = new PDO(
    "mysql:host=localhost;port=3306;dbname=rmmapi",
    "root",
    "1234",
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
);

$app = new Router;

$app->get("/", function() use ($dbcon) {
    return "ola rmm";
});

$app->get("/v1/primas", function() use ($dbcon) {
    $dl = new dl($dbcon);

    $dl->load('App\Entities\Prima');

    $primas = $dl->getAll();

    return $primas;
});

$app->get("/v1/prima/*", function($id) use ($dbcon) {
    $dl = new dl($dbcon);
        
    $dl->load('App\Entities\Prima')
       ->equal("prima->id",(int)$id);   
    
    $prima = $dl->get();

    return $prima;
});

// $jsonRender = function ($data) {
//     header('Content-Type: application/json');
    
//     return json_encode($data,true);
// };

// $app->always('Accept', array('application/json' => $jsonRender));