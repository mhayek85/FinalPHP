<?php


header("Content-Type: application/json");
session_start();

/*OUR CHECKS HERE DETERMINE WHETHER OR NOT A PIZZA WAS ACTUALLY ORDERED IF THE PIZZA WAS NOT ORDERED THEN THE USER WILL BE NOTIFIED AND STAY ON THE CURRENT PAGE
OTHERWISE THE NEXT PAGE WILL BE POPULATED WITH THE PIZZA THAT IS ALREADY STORED IN THE ORDER SUMMARY BASED ON THE USERS CURRENT ORDER*/

	$db_conn = connect_db();
	getOrders($db_conn);	

	//session_destroy();


/*THIS FUNCTION IS USED TO CONNECT TO THE DATABASE*/
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

/*THIS FUNCTION IS USED TO DISCONNECT FROM THE DATABASE*/
function disconnect_db($db_conn){
    $db_conn->close();
}

/*GET ORDERS WILL GET THE ORDERS FROM THE ORDER SUMMARY
THE DIFFERENCE BETWEEN THIS PAGE AND THE COMPLETE ORDER PAGE IS THAT WE DON'T INSERT THE CURRENT ORDER INTO THE TABLE*/
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
disconnect_db($db_conn);
}


?>