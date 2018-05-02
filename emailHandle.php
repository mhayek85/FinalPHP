<?php 

header("Content-Type: application/json");
//echo "You did it";

session_start();
$db_conn = connect_db();

/*THE FOLLOWING SECTION IS USED FOR VALIDATION OF THE EMAIL AND PASSWORD FIELDS
WE ENSURE HERE THAT ALL THE FIELDS HAVE INPUT AND IF THERE ARE ANY MISTAKES WE SEND STATUS SIGNALS TO THE JQUERY*/

if (!empty($_POST['em_email']) && !empty($_POST['password'])){
	selectEmail($db_conn);
	
} 
else if (empty($_POST['em_email']) && empty($_POST['password'])){
	$posts = array("status" => "INVALID PASSWORD: PLEASE ENTER BOTH");
	echo json_encode($posts);
}
else if(empty($_POST['em_email'])) {
	$posts = array("status" => "INVALID EMAIL: PLEASE ENTER AN EMAIL ADDRESS");
	echo json_encode($posts);
}
else if(empty($_POST['password'])) {
	$posts = array("status" => "INVALID PASSWORD: PLEASE ENTER A PASSWORD");
	echo json_encode($posts);
}

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

/*THIS FUNCTION IS USED TO DISCONNECT TO THE DATABASE*/
function disconnect_db($db_conn){
    $db_conn->close();
}

/*THIS METHOD IS GOING TO BE USED TO SELECT ALL INFORMATION ABOUT THE MEMBER FROM THE MEMBER TABLE BASED ON THE SUCCESSFUL LOGIN*/
function selectEmail($db_conn)
{
	$email = $db_conn->real_escape_string($_POST['em_email']);
	$password = $db_conn->real_escape_string($_POST['password']);
	$qry = "SELECT * from address WHERE ad_member_ID=(SELECT member_ID from member where email='".$email."' AND password='".$password."');";
	$rs = $db_conn->query($qry);
	if ($rs->num_rows > 0){
		$posts = array("status" => "OK");
		$posts['posts'] = array();
    		while ($row = $rs->fetch_assoc()){
				array_push($posts['posts'], $row);
    	}
    	$_SESSION['email'] = $_POST['em_email'];
    	
		echo json_encode($posts);
	} 
	else {
    echo '{ "status": "None" }';
}
disconnect_db($db_conn);
	
}


?>