<?php
/**
 * Authors : Pedroletti Michael
 * CreationFile date : 10.01.2022
 * Description : File used to verify and send mail
**/
function sendEmail($inf)
{
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
			{
				echo "<script>console.log('success sending')</script>";
				return (1);
			}
			else
			{
				echo "<script>console.log('fail sending')</script>";
				return (-1);
			}
	}
	else
		return (0);
}


function sendValidationMail($i, $mail)
{
	$msg = "Une erreur inconnue est survenue, veuillez nous excuser de cet inconvénient, nous allons corriger ce problème le plus rapidement possible !";
	if ($i == -1 || $i == 0)
		$msg = "Nous avons rencontrés un problème lors de l'envoi du mail, veuillez nous excuser pour cet inconvénient ! Nous allons faire de notre mieux pour corriger au plus vite cette erreures ! Nous vous remercions de votre compréhension.";
	else if ($i == 1)
		$msg = "Votre mail a été envoyé, nous allons vous répondre dans les plus courts délais !\nMeilleures salutations !";
	$to      = $mail;
	$subject = 'Accusation d\'envoi de votre mail à Pedroletti Michael';

	$headers = array(
		'From' => "portfolio@pedroletti.ch",
		'X-Mailer' => 'PHP/' . phpversion()
	);

		if (mail($to, $subject, $msg, $headers))
		{
			echo "<script>console.log('success sending')</script>";
			return (1);
		}
		else
		{
			echo "<script>console.log('fail sending')</script>";
			return (0);
		}
}
?>
