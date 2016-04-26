<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Yeti Debug</title>
</head>

<body>
<?php
	echo "<p>yetiDebug.php</p>";
	echo "<p>user entered info</p>";
	echo "<p>email: $myusername password: $mypassword</p>";
	echo "<p>userObject info</p>";
	echo "<p>lname: $userObject->lname email: $userObject->email password: $userObject->password user_type: $userObject->user_type</p>";
	echo "<p>count: $count</p>";
	echo "<p>message: $message</p>";

	echo "<p>Attendance</p>";
	echo "<p>ATTNDNCevent_id: $ATTNDNCevent_id ATTNDNCuser_id: $ATTNDNCuser_id</p>";

	echo "<p>Enroll</p>";
	echo "<p>ENROLLenrollment_id: $ENROLLenrollment_id ENROLLuser_id: $ENROLLuser_id ENROLLplayer_id: $ENROLLplayer_id ENROLLteam_id: $ENROLLteam_id ENROLLleague_id: $ENROLLleague_id ENROLLenrollment_date: $ENROLLenrollment_date ENROLLfee: $ENROLLfee</p>";

	echo "<p>Events</p>";
	echo "<p>EVENTSevent_id: $EVENTSevent_id EVENTSevent_type: $EVENTSevent_type EVENTSstart_date_time: $EVENTSstart_date_time</p>";

	echo "<p>League</p>";
	echo "<p>LEAGUEleague_id: $LEAGUEleague_id LEAGUEleague_name: $LEAGUEleague_name LEAGUEsport_id: $LEAGUEsport_id LEAGUEmin_age: $LEAGUEmin_age LEAGUEmax_age: $LEAGUEmax_age LEAGUEstart_date: $LEAGUEstart_date LEAGUEend_date: $LEAGUEend_date</p>";

	echo "<p>Place</p>";
	echo "<p>PLACEplace_id: $PLACEplace_id PLACEplace_name: $PLACEplace_name PLACEstreet_address: $PLACEstreet_address PLACEcity: $PLACEcity PLACEstate: $PLACEstate PLACEzip: $PLACEzip</p>";

	echo "<p>PlayerInsert</p>";
	echo "<p>PLAYERfname: $PLAYERfname PLAYERlname: $PLAYERlname</p>";
	echo "<p>TeamInsert</p>";
	echo "<p>TEAMteam_name: $TEAMteam_name TEAMuser_id: $TEAMuser_id</p>";
	echo "<p>UserInsert</p>";
	echo "<p>USERSfname: $USERSfname USERSlname: $USERSlname</p>";
	echo "<p>littleSubmit: $littleSubmit bigSubmit: $bigSubmit</p>";
	//echo "<p>name: $name</p>";
 

?>
</body>
</html>