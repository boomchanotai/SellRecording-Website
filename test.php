<?php

/*$glo = array();

$Boom = array(
	'id' => "1",
	'name' => "Boom",
	'amount' => "1",
	'totalprice' => "20",
	);
$Boom2 = array(
	'id' => "1",
	'name' => "Boom",
	'amount' => "1",
	'totalprice' => "20",
	);
$Boom3 = array(
	'id' => "2",
	'name' => "Mameaw",
	'amount' => "1",
	'totalprice' => "400",
	);
$Boom4 = array(
	'id' => "3",
	'name' => "Meaw",
	'amount' => "1",
	'totalprice' => "60",
	);

array_push($glo, $Boom);
array_push($glo, $Boom2);
array_push($glo, $Boom3);
array_push($glo, $Boom4);

print_r($glo);
echo "<br>";

foreach ($glo as $key => $value) {
	echo $key + 1 . ". Name : " . $value['name'] . " amount : " . $value['amount'] . " totalprice : " . $value['totalprice'] . "<br>";
}*/
include_once('include/head.php');
print_r($_SESSION['shopping_cart']);

if ($_SESSION['shopping_cart'] == null) {
	echo "Null";
} else {
	echo "Have string";
}

?>