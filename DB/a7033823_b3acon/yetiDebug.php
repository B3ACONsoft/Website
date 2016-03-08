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
	echo "<p>AdminInsert</p>";
	echo "<p>ATTNDNCevent_id: $ATTNDNCevent_id ATTNDNCuser_id: $ATTNDNCuser_id</p>";
	echo "<p>littleSubmit: $littleSubmit bigSubmit: $bigSubmit</p>";
	//echo "<p>name: $name</p>";
?>
</body>
</html>