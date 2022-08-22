<?php

spl_autoload_register(
    function($class_name){
        include strtolower( $class_name). ".class.php";
    }
)

?>