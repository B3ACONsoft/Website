<?php
//echo "<p>checklogin.php</p>";

$dsn = 'mysql:host=mysql13.000webhost.com;dbname=a7033823_b3acon';
$username = 'a7033823_dev';
$password = 'bacon3';
try {
	$db = new PDO($dsn, $username, $password);
	//echo "<p>You are connected to the database.</p>";
	$message = "You are connected to the database.";
}catch(PDOException $e){
	$error_message = $e->getMessage();
	//echo "<p>An error occurred while connecting to the database:
	//$error_message</p>";
	$message = "An error occurred while connecting to the database:
	$error_message";
}



 // Define $myusername and $mypassword 
$myusername=$_POST['email']; 
$mypassword=$_POST['password'];
$littleSubmit=$_POST['submit'];
$bigSubmit=$_POST['Submit'];

//protect from MySQL injection
$myusername=stripslashes($myusername);
$mypassword=stripslashes($mypassword);
//$myusername=mysql_real_escape_string($myusername);
//$mypassword=mysql_real_escape_string($mypassword); 

$query = "SELECT * FROM users WHERE email = '". $myusername . "'";
$allPeople = $db->query($query);
//class to hold the people
class user{
	var $user_id, $fname, $lname, $phone, $emergency, $email, $user_type, $password;
}	
$userArray = array();
$incrUser = 0;
foreach($allPeople as $aPerson){ 
	$userObject = new user();
	$userObject->lname = $aPerson['lname'];
	$userObject->email = $aPerson['email'];
	$userObject->user_type = $aPerson['user_type'];
	$userObject->password = $aPerson['password'];
	$userArray[$incrUser] = $userObject;
	$incrUser++;
}

// If result matched $myusername and $mypassword, table row must be 1 row
$count=count($userArray);
if($count>0){
	if($mypassword == $userObject->password){
		if($userObject->user_type == 'ADMIN'){
			$message = "success and password match and ADMIN user";
			include('yetiAdmin.php');
			exit();
		}else{
			$message = "success and password match";		
		}
	}else{
		$message = "success, No password match";
	}
} else {
	//echo "Wrong Username or Password";
	$message = "failure";
}
//use this to debug code
//include('yetiDebug.php');

//use this for login failure
include('yetiLoginFail.php');
exit();

?>
