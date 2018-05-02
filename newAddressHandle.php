<?php

session_start();



/*FOR VALIDATION WE DECIDED TO CHECK AND ENSURE THAT THE ALL THE IMPORTANT FIELDS THAT WE REQUEST FROM THE USER ARE FILLED*/

if(!empty($_POST['address_name1']) && !empty($_POST['city1']) && !empty($_POST['province1']) && !empty($_POST['postal_code1'])){
$db_conn = connect_db();
saveAddress($db_conn);
echo "Inserted";
}
else {

echo "INVALID";
}


/*THIS IS THE FUNCTION WE USE TO CONNECT TO THE DATABASE*/
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
/*THIS IS THE FUNCTION WE WILL USE TO DISCONNECT FROM THE DATABASE*/
function disconnect_db($db_conn){
    $db_conn->close();
}

/*HERE WE NEED TO SAVE THE NEW ADDRESS THAT THE USER WISHES TO USE
AGAIN WE MUST CLEAN UP THE SQL INPUT BEFORE WE INSERT IT INTO THE ADDRESS TABLE AND STORE THE VALUES TO SESSION*/
function saveAddress($db_conn)
{
$email = $_SESSION['email'];
$address = $db_conn->real_escape_string($_POST['address_name1']);
$appNum = $db_conn->real_escape_string($_POST['apartment_num1']);
$city = $db_conn->real_escape_string($_POST['city1']);
$province = $db_conn->real_escape_string($_POST['province1']);
$postCode = $db_conn->real_escape_string($_POST['postal_code1']);
$qry = "INSERT INTO address (ad_member_ID, address_name, city, province, apartment_num, postal_code) VALUES ((SELECT member_ID from member where email='".$email."'), '".$address."', '".$city."', '".$province."', '".$appNum."', '".$postCode."');";
//$db_conn->query($qry);
  if ($db_conn->query($qry) === TRUE) 
  {    
  		$_SESSION['address_name'] = $_POST['address_name1'];
		$_SESSION['apartment_num'] = $_POST['apartment_num1'];
		$_SESSION['city'] = $_POST['city1'];
		$_SESSION['province'] = $_POST['province1'];
		$_SESSION['postal_code'] = $_POST['postal_code1'];
      //echo "Inserted successfully";
  } 
  else 
  {   
      echo "Error:";
  }
}








?>