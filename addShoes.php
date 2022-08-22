<?php
require 'autoload.php';

$db = Db::singleton();

$params =json_decode(file_get_contents('php://input'),true);




$description = $params["description"];
$prix = $params["prix"];
$name = $params["nom"];
$img = $params["image"];

$db -> create("shoes",["nom","img","description","prix"],[$name,$img,$description,$prix]);