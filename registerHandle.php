<?php



session_start();




$phone = trim($_POST['phone_number']);

if(!empty($_POST['phone_number']) && (strlen($phone) > 15 || !preg_match("/\+?1?\(?[0-9]{3}\)?(\-?| )[0-9]{3}(\-?| )[0-9]{4}/", $phone)))
{
	echo "INVALID: PHONE";
}

if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['first_name']) && (!empty($_POST['phone_number']) && strlen($phone) < 15 && preg_match("/\+?1?\(?[0-9]{3}\)?(\-?| )[0-9]{3}(\-?| )[0-9]{4}/", $phone)) && !empty($_POST['address_name']) && !empty($_POST['city']) && !empty($_POST['province']) && !empty($_POST['postal_code']))
{
echo "OK";
$db_conn = connect_db();
saveRegistration($db_conn);
saveAddressR($db_conn);
disconnect_db($db_conn);
}

else if(empty($_POST['email']) ) {
	echo "INVALID";
}



else if(empty($_POST['password'])) {
	echo "INVALID";
}

else if(empty($_POST['first_name'])) {
	echo "INVALID";
}

else if(empty($_POST['phone_number'])) {
	echo "INVALID";
}

else if(empty($_POST['address_name'])) {
	echo "INVALID";
}

else if(empty($_POST['city'])) {
	echo "INVALID";
}

else if(empty($_POST['province'])) {
	echo "INVALID";
}

else if(empty($_POST['postal_code'])) {
	echo "INVALID";
}



/*
THE CONNECT_DB FUNCTION IS COMMON TO ALL OF THE PAGES AND IS USED TO CONNECT TO THE DATABASE

*/

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

/*THE DISCONNECT_DB FUNCTION IS USED TO DISCONNECT FROM THE DATABASE AND IS COMMON ACROSS ALL THE NECESSARY PHP FILES*/
function disconnect_db($db_conn){
    $db_conn->close();
}

/*THE SAVE REGISTRATION FUNCTION CREATES A NEW USER 
THIS STEP FIRST VALIDATES THE POSTED INPUT FOR THE SQL DATABASE THEN INSERTS IT INTO THE MEMBER TABLE
IT IS NECESSARY THAT WE STORE THE EMAIL TO SESSION HERE BECAUSE WE WILL BE USING IT IN LATER STEPS
THIS METHOD MUST BE CALLED BEFORE THE SAVE ADDRESS IS CALLED 
*/
function saveRegistration($db_conn)
{
	$email = $db_conn->real_escape_string($_POST['email']);
	$password = $db_conn->real_escape_string($_POST['password']);
	$firstName = $db_conn->real_escape_string($_POST['first_name']);
	$lastName = $db_conn->real_escape_string($_POST['last_name']);
	$phoneNum = $db_conn->real_escape_string($_POST['phone_number']);
	$qry = "INSERT INTO member (email, password, first_name, last_name, phone) VALUES ('".$email."', '".$password."', '".$firstName."', '".$lastName."', '".$phoneNum."');";
	 if ($db_conn->query($qry) === TRUE) 
  		{    
  			
  			$_SESSION['email'] = $_POST['email'];
			$_SESSION['first_name'] = $_POST['first_name'];
			$_SESSION['last_name'] = $_POST['last_name'];
      	//echo "Inserted successfully";
 	   } 
    else 
  		{   
      	echo "Error:";
  		}
  		
}

/*THIS STEP IS USED TO SAVE THE ADDRESS FIELDS TO THE APPROPRIATE FIELDS IN THE ADDRESS TABLE
IT FUNCTIONS SIMILAR TO THE ABOVE FUNCTION IN THAT WE USE THE REAL ESCAPE STRING TO CLEAN THE INPUT GOING INTO THE SQL TABLE
WE STORE THE SESSION HERE AS WELL SO THAT WE CAN USE THESE FIELDS IN LATER PARTS OF THE PROJECT*/
function saveAddressR($db_conn)
{
	$email = $db_conn->real_escape_string($_POST['email']);
	$address = $db_conn->real_escape_string($_POST['address_name']);
	$appNum = $db_conn->real_escape_string($_POST['apartment_num']);
	$city = $db_conn->real_escape_string($_POST['city']);
	$province = $db_conn->real_escape_string($_POST['province']);
	$postCode = $db_conn->real_escape_string($_POST['postal_code']);
	$qry1 = "INSERT INTO address (ad_member_ID, address_name, city, province, apartment_num, postal_code) VALUES ((SELECT member_ID from member where email='".$email."'), '".$address."', '".$city."', '".$province."', '".$appNum."', '".$postCode."');";

	if ($db_conn->query($qry1) === TRUE) 
  {    
  		
  		$_SESSION['address_name'] = $_POST['address_name'];
		$_SESSION['apartment_num'] = $_POST['apartment_num'];
		$_SESSION['city'] = $_POST['city'];
		$_SESSION['province'] = $_POST['province'];
		$_SESSION['postal_code'] = $_POST['postal_code'];
      //echo "Inserted successfully";
  } 
  else 
  {   
      echo "error";
  }

}




?>
