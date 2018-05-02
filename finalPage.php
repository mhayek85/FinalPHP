<?php
session_start();
/*FOR THE FINAL PAGE WE ONLY NEED TO ECHO THE ORDER NUMBER AND A MESSAGE AND THEN WE DESTROY THE SESSION*/
echo "Your order number is: " .$_SESSION['order_id']. " and will arrive in 30 minutes or less!";
session_destroy();

?>