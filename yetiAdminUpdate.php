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

$ENROLLenrollment_id=$_POST['enrollment_id'];
$ENROLLuser_id=$_POST['user_id']; 
$ENROLLplayer_id=$_POST['player_id'];
$ENROLLteam_id=$_POST['team_id']; 
$ENROLLleague_id=$_POST['league_id'];
$ENROLLenroll_date=$_POST['enrollment_date'];
$ENROLLfee=$_POST['fee'];

$EVENTSevent_id=$_POST['event_id2']; 
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
	if($bigSubmit == "Update Attendance Information"){
		$count = $db->exec("UPDATE attendance SET user_id=$ATTNDNCuser_id, status=\"$ATTNDNCstatus\", message=\"$ATTNDNCmessage\" WHERE event_id=$ATTNDNCevent_id");
	}elseif($bigSubmit == "Update Enrollment Information"){
		$count = $db->exec("UPDATE enrollment SET user_id=$ENROLLuser_id, player_id=$ENROLLplayer_id, team_id=$ENROLLteam_id, league_id=$ENROLLleague_id, enrollment_date=\"ENROLLenroll_date\", fee=$ENROLLfee WHERE enrollment_id=$ENROLLenrollment_id");
	}elseif($bigSubmit == "Update Event Information"){
		$count = $db->exec("UPDATE events SET event_type=\"$EVENTSevent_type\", start_date_time=\"$EVENTSstart_date_time\", place_id=$EVENTSplace_id, home_team_id=$EVENTShome_team_id, away_team_id=$EVENTSaway_team_id WHERE event_id=$EVENTSevent_id");
	}elseif($bigSubmit == "Update League Information"){
		$count = $db->exec("UPDATE league SET league_name=\"$LEAGUEleague_name\", sport_id=$LEAGUEsport_id, min_age=$LEAGUEmin_age, max_age=$LEAGUEmax_age, start_date=\"$LEAGUEstart_date\", end_date=\"$LEAGUEend_date\" WHERE league_id=$LEAGUEleague_id");
		//$count = $db->exec("UPDATE league SET min_age=$LEAGUEmin_age WHERE league_id=$LEAGUEleague_id");
	}elseif($bigSubmit == "Update Place Information"){
		$count = $db->exec("UPDATE place SET place_name=\"$PLACEplace_name\", street_address=\"$PLACEstreet_address\", city=\"$PLACEcity\", state=\"$PLACEstate\", zip=$PLACEzip WHERE place_id=$PLACEplace_id");
	}elseif($bigSubmit == "Update Player Information"){
		$count = $db->exec("UPDATE player SET fname=\"$PLAYERfname\", lname=\"$PLAYERlname\", user_id=\"$PLAYERuser_id\" WHERE player_id=$PLAYERplayer_id");
	}elseif($bigSubmit == "Update Sport Information"){
		$count = $db->exec("UPDATE sport SET sport_name=\"$SPORTsport_name\" WHERE sport_id=$SPORTsport_id");
	}elseif($bigSubmit == "Update Team Information"){
		$count = $db->exec("UPDATE team SET league_id=$TEAMleague_id, team_name=\"$TEAMteam_name\", user_id=$TEAMuser_id WHERE team_id=$TEAMteam_id");
	}elseif($bigSubmit == "Update User Information"){
		$count = $db->exec("UPDATE users SET fname=\"$USERSfname\", lname=\"$USERSlname\", phone=$USERSphone, emergency=$USERSemergency, email=\"$USERSemail\", user_type=\"$USERSuser_type\", password=\"$USERSpassword\" WHERE user_id=$USERSuser_id");
	}else{
		//another
		$count = 99;
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
