<?php

/*this script is activated when a user wants to use a previous address
it is only activated when they click the Use button a previous address must be checked
*/
session_start();
if(isset($_POST['radioAdd']))
{
$oldAdd = $_POST['radioAdd'];
$_SESSION['address_name'] = $oldAdd;
echo "ok";
}
else {
echo "INVALID";
}






?>