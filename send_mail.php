<?php
$inf = $_POST;

if (isset($inf['firstname']) && isset($inf['lastname']) && isset($inf['email']) && isset($inf['subject']))
{
		$to      = 'michael@pedroletti.ch';
		$subject = 'portfolio-mail - '. $inf['subject'] . ' - ' . $inf['title'];
		$message = "
        Nom demandeur : ". $inf['firstname'] . " " . $inf['lastname'] ."
        \n\n
        Voici le sujet de la demande : " . $inf['subject'] . " - " . $inf['title'] ."\n
        Mail du demandeur : ". $inf['email'] ."\n
		Description :\n
		". $inf['description'] . "
        ";

		$headers = array(
			'From' => "portfolio@pedroletti.ch",
			'X-Mailer' => 'PHP/' . phpversion()
		);

		if (mail($to, $subject, $message, $headers))
			echo "<script>console.log('success')</script>";
		else
			echo "<script>console.log('fail sending')</script>";

		$msg = "success";
}
else {
	echo "<script>console.log('fail isset')</script>";
	$msg = "fail isset";
}
require 'index.html';
?>
