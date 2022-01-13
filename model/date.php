<?php
/**
 * Authors : Pedroletti Michael
 * CreationFile date : 13.01.2022
 * Description : File used to make some calcul about date
**/

function ageCalculator($dob){
	if(!empty($dob)){
		$birthdate = new DateTime($dob);
		$today   = new DateTime('today');
		$age = $birthdate->diff($today)->y;
		return $age;
	}else{
		return 0;
	}
}
