<?php

use Respect\Rest\Router,
    Charon\Loader as dl,
    Nocarrier\Hal;

$dbcon = new PDO(
    "mysql:host=localhost;port=3306;dbname=rmmapi",
    "root",
    "1234",
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
);

$app = new Router;

$app->get("/", function() use ($dbcon) {
    return array('message' => 'Hello PrimAPI');
});

$app->get("/v1/primas", function() use ($dbcon) {
    $dl = new dl($dbcon);

    $dl->load('App\Entities\Prima');

    $primas = $dl->getAll();

    return $primas;
});

$app->get("/v1/primas/*", function($id) use ($dbcon) {
    $dl = new dl($dbcon);
        
    $dl->load('App\Entities\Prima')
       ->equal("prima->id",(int)$id);   
    
    $prima = $dl->get();

    $hal = new Hal('/v1/primas/' . $prima->id, $prima->getArrayCopy());
    $hal->addLink('interview', '/v1/primas/' . $prima->id . '/interview');
    
    return $hal;
});

$app->get("/v1/primas/*/interview", function($id) use ($dbcon) {
    $dl = new dl($dbcon);
        
    $dl->load('App\Entities\Prima')
       ->equal("prima->id",(int)$id);   
    
    $prima = $dl->get();

    $hal = new Hal('/v1/primas/' . $prima->id . '/interview');
    
    return $hal;
});

$jsonRender = function ($data) {
    header('Content-Type: application/hal+json');

    if(!$data instanceof Nocarrier\Hal) {
        return json_encode($data, true);
    }

    return $data->asJson();
};

$xmlRender = function ($data) {
    header('Content-Type: application/hal+xml');

    if(!$data instanceof Nocarrier\Hal) {
        $xml = new SimpleXMLElement('<xml/>');

        foreach ($data as $key => $value) {
            $xml->addChild($key, $value);
        }

        return $xml->asXML();
    }

    return $data->asXml();
};

$app->always('Accept', array('application/hal+json' => $jsonRender, 'application/hal+xml' => $xmlRender));