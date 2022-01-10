<?php
/**
 * Authors : Pedroletti Michael
 * CreationFile date : 10.01.2022
 * Description : Serve to redirect the user depending of his actions
**/

session_start();

require_once 'controller/controller.php';

if (empty($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] !== "on")
{
	header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
	exit();
}

if (isset($_GET['action'])){
    $action = $_GET['action'];
    switch ($action){
        case 'sendMail':
            sendMail($_POST);
            break;
        case 'home':
        default :
            displayHome();
            break;
    }
}
else{
    displayHome();
}
?>
