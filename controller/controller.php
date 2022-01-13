<?php
/**
 * Authors : Pedroletti Michael
 * CreationFile date : 10.01.2022
 * Description : Redirect action
**/

function displayHome()
{
	$_GET['action'] = '';
	require_once 'model/date.php';
	$year = ageCalculator('2002-04-21');
    require 'view/home.php';
}

function sendMail($post)
{
	require_once 'model/send_mail.php';
	$_GET['action'] = '';
	$i = sendEmail($post);
	if ($i < 1)
		$_SESSION['mail'] = "fail";
	else
		$_SESSION['mail'] = "success";
	sendValidationMail($i, $post['mail']);
	displayHome();
}
?>
