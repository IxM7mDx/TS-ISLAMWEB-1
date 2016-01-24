<?php
// rand 1
function RandomString() {
		$an3 = "123456789";
		$su2 = strlen($an3) - 1;
    return substr($an3, rand(0, $su2), 1) .
            substr($an3, rand(0, $su2), 1) .
            substr($an3, rand(0, $su2), 1) .
            substr($an3, rand(0, $su2), 1) .
            substr($an3, rand(0, $su2), 1) .
            substr($an3, rand(0, $su2), 1);
	}
$rand = RandomString();
// rand 2 
function RandomString2() {
		$an4 = "0123456789";
		$su5 = strlen($an4) - 1;
    return substr($an4, rand(0, $su5), 1) .
            substr($an4, rand(0, $su5), 1) .
            substr($an4, rand(0, $su5), 1);
	}
$rand2 = RandomString2();
?>