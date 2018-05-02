<?php

//header("Content-Type: application/json");
session_start();

$db_conn = connect_db();

insertPizzaOrder($db_conn);
insertToppingOrder($db_conn);
insertOrderSumm($db_conn);
getOrders($db_conn);
disconnect_db($db_conn);

/*THIS FUNCTION IS CONSISTED IN ALL PAGES THAT WE NEED TO CONNECT TO THE DB*/
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
/*THIS FUNCTION IS COMMON TO ALL PAGES THAT WE NEED TO DISCONNECT FROM THE DB*/
function disconnect_db($db_conn){
    $db_conn->close();
}


/*THE INSERTPIZZAORDER FUNCTION WILL TAKE OUR SESSION VARIABLES FROM A PREVIOUS FORM WHERE THE USER SELECTS THERE PREFERENCES FOR THEIR PIZZA
WE THEN USE THE REAL ESCAPE STRING FUNCTION TO CLEAN UP THE INPUT AND INSERT INTO THE PIZZA TABLE
*/
function insertPizzaOrder($db_conn)
{
	$orderID = $_SESSION['order_id'];
	$size = $db_conn->real_escape_string($_SESSION['size']);
	$cheese = $db_conn->real_escape_string($_SESSION['cheese']);
	$sauce = $db_conn->real_escape_string($_SESSION['sauce']);
	$dough = $db_conn->real_escape_string($_SESSION['dough']);
	
	$qry = "insert into pizza (size, pizza_order_ID, sauce_type, dough_type, cheese_type) VALUES ('".$size."', (SELECT order_ID from orders where order_ID='".$orderID."'), '".$sauce."', '".$dough."', '".$cheese."');";
	if ($db_conn->query($qry) === TRUE) 
  		{    
  			$pizzaID = $db_conn->insert_id;
  			$_SESSION['pizza_id'] = $pizzaID;
      	//echo "Inserted successfully";
      	
 	   } 
    else 
  		{   
      	echo "Error:";
  		}	
	
	
}

/*THE INSERTTOPPINGORDER WILL DO THE SAME AS THE ABOVE EXCEPT INSERT THE TOPPINGS INTO THE TOPPING TABLE*/
function insertToppingOrder($db_conn)
{
	$pizza_id = $_SESSION['pizza_id'];
	$topping = $_SESSION['topping'];
	$qry1 = "insert into topping (topping_pizza_ID, topping) VALUES ((SELECT pizza_ID from pizza where pizza_ID='".$pizza_id."'), '".$topping."');";
	if ($db_conn->query($qry1) === TRUE) 
  		{    
  			
      	//echo "Inserted successfully";
      	
      	
 	   } 
    else 
  		{   
      	echo "Error:";
  		}

}

/*THE INSERT ORDER SUMMARY IS A COMBINATION OF THE ABOVE AND INSERTS PIZZA AND TOPPING PREFERENCES INTO THE ORDER_SUMMARY TABLE
WE CREATED THE ORDER SUMMARY TABLE BECAUSE WE FOUND IT TO BE MUCH EASIER TO WORK WITH WHEN IT CAME TO CREATING AN ORDER SUMMARY*/
function insertOrderSumm($db_conn)
{
	$orderID = $_SESSION['order_id'];
	$size = $db_conn->real_escape_string($_SESSION['size']);
	$cheese = $db_conn->real_escape_string($_SESSION['cheese']);
	$sauce = $db_conn->real_escape_string($_SESSION['sauce']);
	$dough = $db_conn->real_escape_string($_SESSION['dough']);
	$topping = $_SESSION['topping'];
	$oldAdd = $_SESSION['address_name'];
	$qry2 = "insert into order_summary (sum_order_ID, pizza_size, sauce_type, dough_type, cheese_type, topping, address_name) values ((SELECT order_ID from orders where order_ID='".$orderID."'), '".$size."', '".$sauce."', '".$dough."', '".$cheese."', '".$topping."', '".$oldAdd."');";
	if ($db_conn->query($qry2) === TRUE) 
  		{    
  			$last_id = $db_conn->insert_id;
  			$_SESSION['order_sum_ID'] = $last_id;
  			//echo $_SESSION['order_sum_ID'];
      	//echo "Inserted successfully";
      	
 	   } 
    else 
  		{   
      	echo "Error:";
  		}

}

/*THE GET ORDER SUMMARY IS USED TO SEND AN ARRAY CONTAINING ALL OF THE PIZZAS ORDERED DURING THIS SESSION BY THE USER AND POST THEM TO THE NEXT PAGE*/
function getOrders($db_conn)
{
	$orderID = $_SESSION['order_id'];
	$qry = "SELECT * FROM order_summary WHERE sum_order_ID = '".$orderID."';";
	$rs = $db_conn->query($qry);
	if ($rs->num_rows > 0){
		$posts = array("status" => "OK");
		$posts['posts'] = array();
    		while ($row = $rs->fetch_assoc()){
				array_push($posts['posts'], $row);
    	}
    	
    	
		echo json_encode($posts);
	} 
	else {
    echo '{ "status": "None" }';
}

}






?>