<?php

require __DIR__ . '/vendor/autoload.php';

$configList = parse_ini_file(__DIR__ . '/conf/connexion.ini', true);

$dependencies = new My\Tools\Dependencies();
$dependencies->setConfigList($configList);
$dependencies->setRequest(new \Nutshell\Http\Request());
$dependencies->setResponse(new \Nutshell\Http\Response());


$appli = new  My\Application($dependencies);
$response = $appli->run();

$response->display();
