<?php

include_once "ClassLoader.inc.php";

if(isset($_GET)){

    $getter = new ManagerView;
    
    echo $getter->testGET();
}