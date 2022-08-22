<?php
require 'autoload.php';

$db = Db::singleton();

$liste = [ "liste" =>$db ->  selectAll("shoes")];

  echo json_encode($liste);