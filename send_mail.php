<?php
$inf = $_POST;

if (isset($inf['firstname']) && isset($inf['lastname']) && isset($inf['mail']) && isset($inf['subject']))
{
		$to      = 'michael@pedroletti.ch';
		$subject = 'portfolio-mail';
		$message = $inf['subject'];
		$message = "
        Nom demandeur : ". $inf['firstname'] . " " . $inf['lastname'] ."
        \n\n
        Voici le sujet de la demande : \n". $inf['subject'] ."\n
        Mail du demandeur : ". $inf['mail'] ."\n
		Fin du message.
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
echo "<script>console.log('fail isset')</script>";
$msg = "fail isset";
require 'index.html';
?>
