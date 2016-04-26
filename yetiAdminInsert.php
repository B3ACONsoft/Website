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
$ATTNDNCevent_id=$_POST['event_id']; 
$ATTNDNCuser_id=$_POST['user_id'];
$ATTNDNCstatus=$_POST['status']; 
$ATTNDNCmessage=$_POST['message'];
$ENROLLuser_id=$_POST['user_id']; 
$ENROLLplayer_id=$_POST['player_id'];
$ENROLLteam_id=$_POST['team_id']; 
$ENROLLleague_id=$_POST['league_id'];
$ENROLLenroll_date=$_POST['enrollment_date'];
$ENROLLfee=$_POST['fee'];
$EVENTSevent_id=$_POST['event_id']; 
$EVENTSevent_type=$_POST['event_type'];
$EVENTSstart_date_time=$_POST['start_date_time']; 
$EVENTSplace_id=$_POST['place_id'];
$EVENTShome_team_id=$_POST['home_team_id'];
$EVENTSaway_team_id=$_POST['away_team_id'];
$LEAGUEleague_id=$_POST['league_id']; 
$LEAGUEleague_name=$_POST['league_name'];
$LEAGUEsport_id=$_POST['sport_id']; 
$LEAGUEmin_age=$_POST['min_age'];
$LEAGUEmax_age=$_POST['max_age'];
$LEAGUEstart_date=$_POST['start_date'];
$LEAGUEend_date=$_POST['end_date'];
$PLACEplace_id=$_POST['place_id']; 
$PLACEplace_name=$_POST['place_name'];
$PLACEstreet_address=$_POST['street_address']; 
$PLACEcity=$_POST['city'];
$PLACEstate=$_POST['state'];
$PLACEzip=$_POST['zip'];
$PLAYERplayer_id=$_POST['player_id']; 
$PLAYERfname=$_POST['fname'];
$PLAYERlname=$_POST['lname']; 
$PLAYERuser_id=$_POST['user_id'];
$SEQUENCEsequence_name=$_POST['sequence_name']; 
$SEQUENCEsequence_increment=$_POST['sequence_increment'];
$SEQUENCEsequence_min_value=$_POST['sequence_min_value']; 
$SEQUENCEsequence_max_value=$_POST['sequence_max_value'];
$SEQUENCEsequence_cur_value=$_POST['sequence_cur_value']; 
$SEQUENCEsequence_cycle=$_POST['sequence_cycle'];
$SPORTsport_id=$_POST['sport_id']; 
$SPORTsport_name=$_POST['sport_name'];
$TEAMteam_id=$_POST['team_id']; 
$TEAMleague_id=$_POST['league_id'];
$TEAMteam_name=$_POST['team_name']; 
$TEAMuser_id=$_POST['user_id'];
$USERSuser_id=$_POST['user_id']; 
$USERSfname=$_POST['fname'];
$USERSlname=$_POST['lname']; 
$USERSphone=$_POST['phone'];
$USERSemergency=$_POST['emergency']; 
$USERSemail=$_POST['email'];
$USERSuser_type=$_POST['user_type']; 
$USERSpassword=$_POST['password'];
$littleSubmit=$_POST['submit'];
$bigSubmit=$_POST['Submit'];

//protect from MySQL injection
$ATTNDNCevent_id=stripslashes($ATTNDNCevent_id);
$ATTNDNCuser_id=stripslashes($ATTNDNCuser_id);
//$myusername=mysql_real_escape_string($myusername);
//$mypassword=mysql_real_escape_string($mypassword);
$ATTNDNCstatus=stripslashes($ATTNDNCstatus);
$ATTNDNCmessage=stripslashes($ATTNDNCmessage);
try{
	if($bigSubmit == "Insert New Attendance"){
		//$count = $db->exec("INSERT INTO attendance(event_id, user_id, status, message) VALUES ($ATTNDNCevent_id, $ATTNDNCuser_id, '$ATTNDNCstatus', '$ATTNDNCmessage')");
		$count = $db->exec("INSERT INTO attendance(user_id, status, message) VALUES ($ATTNDNCuser_id, '$ATTNDNCstatus', '$ATTNDNCmessage')");
	}elseif($bigSubmit == "Insert New Enrollment"){
		$count = $db->exec("INSERT INTO enrollment(user_id, player_id, team_id, league_id, enrollment_date, fee) VALUES ($ENROLLuser_id, $ENROLLplayer_id, $ENROLLteam_id, $ENROLLleague_id, '$ENROLLenroll_date', $ENROLLfee)");
	}elseif($bigSubmit == "Insert New Events"){
		$count = $db->exec("INSERT INTO events(event_type, start_date_time, place_id, home_team_id, away_team_id) VALUES ('$EVENTSevent_type', '$EVENTSstart_date_time', $EVENTSplace_id, $EVENTShome_team_id, $EVENTSaway_team_id)");
	}elseif($bigSubmit == "Insert New League"){
		$count = $db->exec("INSERT INTO league(league_name, sport_id, min_age, max_age, start_date, end_date) VALUES ('$LEAGUEleague_name', $LEAGUEsport_id, $LEAGUEmin_age, $LEAGUEmax_age, '$LEAGUEstart_date', '$LEAGUEend_date')");
	}elseif($bigSubmit == "Insert New Place"){
		$count = $db->exec("INSERT INTO place(place_name, street_address, city, state, zip) VALUES ('$PLACEplace_name', '$PLACEstreet_address', '$PLACEcity', '$PLACEstate', $PLACEzip)");
	}elseif($bigSubmit == "Insert New Player"){
		$count = $db->exec("INSERT INTO player(fname, lname, user_id) VALUES ('$PLAYERfname', '$PLAYERlname', $PLAYERuser_id)");
	}elseif($bigSubmit == "Insert New Sequence"){
		$count = $db->exec("INSERT INTO sequence_data(sequence_name, sequence_increment, sequence_min_value, sequence_max_value, sequence_cur_value, sequence_cycle) VALUES ('$SEQUENCEsequence_name', $SEQUENCEsequence_increment, $SEQUENCEsequence_min_value, $SEQUENCEsequence_max_value, $SEQUENCEsequence_cur_value, $SEQUENCEsequence_cycle)");
	}elseif($bigSubmit == "Insert New Sport"){
		$count = $db->exec("INSERT INTO sport(sport_name) VALUES ('$SPORTsport_name')");
	}elseif($bigSubmit == "Insert New Team"){
		$count = $db->exec("INSERT INTO team(league_id, team_name, user_id) VALUES ($TEAMleague_id, '$TEAMteam_name', $TEAMuser_id)");
	}elseif($bigSubmit == "Insert New Users"){
		$count = $db->exec("INSERT INTO users(fname, lname, phone, emergency, email, user_type, password) VALUES ('$USERSfname', '$USERSlname', '$USERSphone', '$USERSemergency', '$USERSemail', '$USERSuser_type', '$USERSpassword')");
	}else{
		//another
	}

	$db = null;
}catch(PDOException $e){
    $message = $e->getMessage();
}
//int, int, varchar, varchar
/*$query = "INSERT INTO attendance (event_id, user_id, status, message)
	VALUES (?, ?, ?, ?)";
//	 "VALUES(" . $ATTNDNCevent_id . ", " . $ATTNDNCuser_id . ", '" . $ATTNDNCstatus . ", '" . $ATTNDNCmessage . ")";
	$statement = $db->prepare($query);
	$statement->bind_param("iiss", $ATTNDNCevent_id, $ATTNDNCuser_id, $ATTNDNCstatus, $ATTNDNCmessage);
	$success = $statement->execute();
	if($success){
		$count = $db->affected_rows;
		echo "<p>$count rows were added</p>";
	} else {
		$error_message = $db->error;
		echo "<p>An error occurred: $error_message</p>";
		$message = $error_message;
	}
	$statement->close();
*/
//	 $allPeople = $db->query($query);
//class to hold the people
/*class user{
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
*/
//debug code
include('yetiDebug.php');
exit();

?>
