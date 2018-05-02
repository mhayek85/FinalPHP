<?php
session_start();
//echo $_SESSION['order_sum_ID'];

/*THIS FUNCTION IS COMMON TO MOST OF THE PHP PAGES AND IS USED TO CONNECT TO THE DATABASE*/

function connect_db(){
    $db_conn = new mysqli('localhost', 'lamp1user', '!Lamp1!', 'pizzaProject');
    if ($db_conn->connect_errno) {
        printf ("Could not connect to database server\n Error: "
            .$db_conn->connect_errno ."\n Report: "
            .$db_conn->connect_error."\n");
        die;
    }
    return $db_conn;
}

/*THIS FUNCTION IS USED TO DISCONNECT TO THE DATABASE*/
function disconnect_db($db_conn){
    $db_conn->close();
}


/*THIS FUNCTION IS USED TO CANCEL THE ORDER WITHOUT ERASING THE USER ON OUR SYSTEM
THERE IS A SPECIFIC ORDER THAT WE HAVE TO DELETE THINGS HERE
WE MUST START WITH THE TOPPING TABLE WHICH HAS THE PIZZA ID IN IT
THEN WE MOVE ONTO THE PIZZA TABLE WHICH HAS THE ORDER ID IN IT
THEN WE MOVE ONTO THE ORDER SUMMARY TABLE WHICH WILL HAVE THE ORDER ID IN IT
AND LASTLY WE REMOVE IT FROM THE ORDER TABLE*/
function cancelOrder($db_conn)
{
	$pizza_id = $_SESSION['pizza_id'];
	$qry = "DELETE FROM topping where topping_pizza_ID= '".$pizza_id."';";
	if($db_conn->query($qry) == TRUE)
	{
		echo " deleted successfully";	
	}
	
	
	$order_id = $_SESSION['order_id'];
	$qry1 = "DELETE FROM pizza where pizza_order_ID='".$order_id."';";
	if($db_conn->query($qry1) == TRUE)
	{
		echo "deleted successfully";	
	}
	
	$qry3 = "DELETE FROM order_summary where sum_order_ID='".$order_id."';";
	if($db_conn->query($qry3) == TRUE)
	{
		echo " deleted successfully";	
	}
	
	
	$qry2 = "DELETE FROM orders where order_ID = '".$order_id."';";
	if($db_conn->query($qry2) == TRUE)
	{
		echo " deleted successfully";	
	}
	
}
	
/*HOW WE USE THIS PAGE IS ENTIRELY DEPENDENT ON WHETHER OR NOT AN ORDER HAS ALREADY BEEN PLACED
FOR EXAMPLE IF NO ORDER HAS BEEN PLACED YET, THEN WE DON'T CALL THE DELETE METHOD
IF AN ORDER HAS BEEN PLACED (WE KNOW AN ORDER HAS BEEN PLACED WHEN AN ORDER SUMMARY ID EXISTS) THEN WE DELETE FROM THE TABLES*/
if(empty($_SESSION['order_sum_ID']))
{
	echo "NO PIZZA";
	session_destroy();

}
else if(!empty($_SESSION['order_sum_ID']))
{
	$db_conn = connect_db();
	cancelOrder($db_conn);
	echo "DELETED";	
	session_destroy();
}







?>