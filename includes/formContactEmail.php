<?php
session_start();
function formContactEmail(){
$email = "";
$password = "";

if(isset($_SESSION['em_email']))
{
	$email = $_SESSION['em_email'];
}
else if(isset($_POST['em_email'])) 
{
	$email = $_POST['em_email'];
}

if(isset($_SESSION['password']))
{
	$email = $_SESSION['password'];
}
else if(isset($_POST['password'])) 
{
	$email = $_POST['password'];
}
	
	
	
}

?>

<h1>Login or Register</h1>
<br />
<br />
<p>Login with your email and password</p>
<table>
<tr>
<td><label for="em_email">Email Address</label></td>
<td><input type="email" id="em_email" name="em_email" size="50" maxlength="50" value="<?php echo $email; ?>"></td>
</tr>
<tr>
<td><label for="password">Password</label></td>
<td><input type="text" id="password" name="password" size="50" maxlength="50" value="<?php echo $password; ?>"></td>
</tr>
</table>
<table>
<tr>
<td><input type="submit" name="login" value="Login"></td>
<td><input type="submit" name="register" value="Register"></td>
</tr>
</table>


<?php
function validateContactEmail() {

$err_msgs = array();
$regex2 = "/([a-zA-Z0-9][a-zA-Z0-9_\-\.]*)@([a-zA-Z0-9][a-zA-Z0-9\-\.]*)\.([a-zA-Z0-9][a-zA-Z0-9\-\.]*)/";
if(!isset($_POST['em_email']))
{
		$err_msgs[] = "The email address field must not be empty";
} 
else 
{
		$email = trim($_POST['em_email']);
		if (strlen($email) == 0){
			$err_msgs[] = "The email address field must not be empty";
		} else if (strlen($email) > 50){
			$err_msgs[] = "The email address is too long";
		}
		echo preg_match($regex2, $email);
		if(preg_match($regex2, $email) == 0)
		{
			$err_msgs[] = "Please enter a valid email address";		
		}
		
}
if(!isset($_POST['password']))
{
		$err_msgs[] = "The password field must not be empty";
}
if (count($err_msgs) == 0)
{
		$_POST['em_email'] = $email;
		$_POST['password'] = $password;
}
	return $err_msgs;
 
}

?>