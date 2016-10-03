<?php

function one($number)
{	
	
	for($i=1;$i<=$number; $i++) {
		$result = $number/$i;
		if ($result == $i) {
			return true;
		}
	}
	return false;
}

var_dump(one(27));
var_dump(one(100));


function two($string)
{
	$result = [];
	$strArray = str_split($string);
	foreach ($strArray as $key => $letters) {
		preg_match('/[A-Z]/', $letters, $match);
		if (!empty($match)) {
			array_push($result, $key);
		}
	}
	return $result;
}

var_dump(two("WorlD"));


function three($miles) {

	return round($miles * .4251, 2);

}

var_dump(three(13));


function four($pin) {
	trim($pin);
	if(is_numeric($pin)){
		if(strlen($pin) == 4 || strlen($pin) == 6) {
			return true;
		}
	}
	return false;
}

var_dump(four('123d'));










function five($strOne,$strTwo)
{
	$arrayOne= str_split($strOne);
	$arrayTwo = str_split($strTwo);

	foreach ($arrayOne => $letter) {
		if (!in_array($letter, $arrayTwo)) {
			return false;
		}
	}
	return true;
}

var_dump(five('beat', ''));







