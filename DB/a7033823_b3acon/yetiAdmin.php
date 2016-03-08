<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Yeti Admin</title>
</head>

<body>
<?php
	echo "<p>yetiAdmin.php</p>";
	echo "<p>submit info</p>";
	echo "<p>littleSubmit: $littleSubmit bigSubmit: $bigSubmit</p>";
	echo "<p>user entered info</p>";
	echo "<p>email: $myusername password: $mypassword</p>";
	echo "<p>userObject info</p>";
	echo "<p>lname: $userObject->lname email: $userObject->email password: $userObject->password user_type: $userObject->user_type</p>";
	echo "<p>count: $count</p>";
	echo "<p>message: $message</p>";
	//echo "<p>name: $name</p>";
	
?>
<h1>Yeti Administration</h1>
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
	<tr>
		<form name="form1" method="post" action="yetiAdminInsert.php">
		<!--<form name="form1" method="post" action="test.php">-->
			<td>
				<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
					<tr>
						<td colspan="3"><strong>Attendance Table</strong></td>
					</tr>
					<tr>
						<td width="78">event_id</td>
						<td width="6">:</td>
						<td width="294"><input name="event_id" type="text" id="event_id"></td>
					</tr>
					<tr>
						<td>user_id</td>
						<td>:</td>
						<td><input name="user_id" type="text" id="user_id"></td>
					</tr>
					<tr>
						<td>status</td>
						<td>:</td>
						<td><input name="status" type="text" id="status"></td>
					</tr>
					<tr>
						<td>message</td>
						<td>:</td>
						<td><input name="message" type="text" id="message"></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><input type="submit" name="Submit" value="Insert New Attendance"></td><!--big Submit transfers the value-->
					</tr>
				</table>
			</td>
		</form>
	</tr>
	<tr>
		<form name="form1" method="post" action="yetiAdminInsert.php">
		<!--<form name="form1" method="post" action="test.php">-->
			<td>
				<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
					<tr>
						<td colspan="3"><strong>Enrollment Table</strong></td>
					</tr>
					<tr>
						<td width="78">enrollment_id</td>
						<td width="6">:</td>
						<td width="294"><input name="enrollment_id" type="text" id="enrollment_id"></td>
					</tr>
					<tr>
						<td>user_id</td>
						<td>:</td>
						<td><input name="user_id" type="text" id="user_id"></td>
					</tr>
					<tr>
						<td>player_id</td>
						<td>:</td>
						<td><input name="player_id" type="text" id="player_id"></td>
					</tr>
					<tr>
						<td>team_id</td>
						<td>:</td>
						<td><input name="team_id" type="text" id="team_id"></td>
					</tr>
					<tr>
						<td>league_id</td>
						<td>:</td>
						<td><input name="league_id" type="text" id="league_id"></td>
					</tr>
					<tr>
						<td>enrollment_date</td>
						<td>:</td>
						<td><input name="enrollment_date" type="text" id="enrollment_date"></td>
					</tr>
					<tr>
						<td>fee</td>
						<td>:</td>
						<td><input name="fee" type="text" id="fee"></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><input type="submit" name="Submit" value="Insert New Enrollment"></td><!--big Submit transfers the value-->
					</tr>
				</table>
			</td>
		</form>
	</tr>	
</table>

</body>
</html>