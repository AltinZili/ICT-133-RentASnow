<?php

require "controler/controler.php";

if(isset($_GET['action'])){
    $action = $_GET['action'];
} else {
    $action = 'home';
}

switch($action){
    case 'home':
        homePage();
        break;
    case 'snows':
        snowsPage();
        break;
    case 'snowDetails':
        $idGet = $_GET['id'];
        snowDetailsPage($idGet);
        break;
}

?>
