<?php
require 'autoload.php';

$db = Db::singleton();

$params =json_decode(file_get_contents('php://input'),true);

print_r($params);


$description = $params["description"];
$prix = $params["prix"];

$db -> create("shoes",["description","prix"],[$description,$prix]);