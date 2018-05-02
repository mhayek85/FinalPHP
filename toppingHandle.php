<?php

session_start();
$count = count($_POST['topping']);
if(!isset($_POST['topping'])) {
	echo "INVALID:NOTHING SELECTED";
}
elseif($count > 7) {
	echo "INVALID: TOO MANY";	
}
else {
$_SESSION['topping'] = implode(", ", (array)$_POST['topping']);
echo "OK";	
}
?>