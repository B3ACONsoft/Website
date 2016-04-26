<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Yeti Admin</title>
<link rel="stylesheet" type="text/css" href="yetiMain.css">
</head>

<body>
<div id="header">
	<img src="img/beaconsoft.jpg" alt="beaconsoft logo" style="width:144px; height:144px; float:left">

	<img src="img/syc_icon.jpg" alt="yeti logo" style="width:144px; height:144px; float:right; ">
	<span id="SYC">Super Yeti Coach</span>
	<!--<span id="SOC">Schedule Organization Cloudware</span>
	<span id="bBS">by Beacon Software</span>-->
	<span id="YetiAdmin">Yeti Administration</span>
</div>
<?php
/* Use for debug information
	echo "<p>yetiAdmin.php</p>";
	echo "<p>submit info</p>";
	echo "<p>littleSubmit: $littleSubmit bigSubmit: $bigSubmit</p>";
	echo "<p>user entered info</p>";
	echo "<p>email: $myusername password: $mypassword</p>";
	echo "<p>userObject info</p>";
	echo "<p>lname: $userObject->lname email: $userObject->email password: $userObject->password user_type: $userObject->user_type</p>";
	echo "<p>count: $count</p>";
	echo "<p>message: $message</p>";
*/
	//echo "<p>name: $name</p>";
	
?>

<!--<table class="YetiTable" width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">-->

<table class="MainTable" align="center" cellpadding="0" cellspacing="5">
	<tr><td colspan=2 style="color: white; text-align: center; border: 5px solid white;">Attendance Table</td></tr>
	<tr>
		<!--Insert New Attendance-->
		<td>
			<form name="form1" method="post" action="yetiAdminInsert.php">
			<!--<form name="form1" method="post" action="test.php">-->
			<table  class="YetiTable" border="0" cellpadding="3" cellspacing="1" >
				<tr>
					<td colspan="3"><strong>Insert New Attendance</strong></td>
				</tr>
				<tr>
					<!--<td width="78">event_id</td>
					<td width="6">:</td>
					<td width="294"><input name="event_id" type="text" id="event_id"></td>-->
					<td>event_id</td>
					<td>:</td>
					<!--<td><input name="event_id" type="text" id="event_id"></td>-->
					<td>Primary Key</td>
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
					<td colspan="3" style="text-align: center"><input type="submit" name="Submit" value="Insert New Attendance"></td><!--big Submit transfers the value-->
				</tr>
			</table>
		</form>
		</td>
		<!--Update Existing Attendance-->
		<td>
			<?php
				class attendance{
					var $event_id, $user_id, $status, $message;
				}
				$attendanceArray = array();
				$query = "SELECT * FROM attendance";
				$allAttendance = $db->query($query);
				$incrAttendance = 0;
				foreach($allAttendance as $aAttendance){ 
					$attendanceObject = new attendance();
					$attendanceObject->event_id = $aAttendance['event_id'];
					$attendanceObject->user_id = $aAttendance['user_id'];
					$attendanceObject->status = $aAttendance['status'];
					$attendanceObject->message = $aAttendance['message'];
					$attendanceArray[$incrAttendance] = $attendanceObject;
					$incrAttendance++;
				}
			?>
			<form name="form1" method="post" action="yetiAdminUpdate.php">
			<!--<form name="form1" method="post" action="test.php">-->
			<table  class="YetiTable" border="0" cellpadding="3" cellspacing="1" >
				<tr>
					<td colspan="3"><strong>Update Attendance Event</strong></td>
<!--					<td>:</td>
					<td><select id="AttendanceChange" onchange="javascript:attendancechange(this)">
					<?php
					foreach($attendanceArray as $aAttendance)
					{
						echo"<option value=\"$aAttendance->event_id\">$aAttendance->event_id</option>";
					}
					//echo "</select>";
					?>
					</select></td>-->
				</tr>
				<tr>
					<!--<td width="78">event_id</td>
					<td width="6">:</td>
					<td width="294"><input name="event_id" type="text" id="event_id"></td>-->
					<td>event_id</td>
					<td>:</td>
					<!--<td><input name="event_id" type="text" id="event_idAttendance"></td>-->
					<!--<td>Primary Key</td>
					<input name="event_id" type="hidden" id="event_idAttendance">-->
					<td><select id="AttendanceChange" onchange="javascript:attendancechange(this)">
					<?php
					foreach($attendanceArray as $aAttendance)
					{
						echo"<option value=\"$aAttendance->event_id\">$aAttendance->event_id</option>";
					}
					//echo "</select>";
					?>
					</select>
					<input name="event_id" type="hidden" id="event_idAttendance">
					</td>					
				</tr>
				<tr>
					<td>user_id</td>
					<td>:</td>
					<td><input name="user_id" type="text" id="user_idAttendance"></td>
				</tr>
				<tr>
					<td>status</td>
					<td>:</td>
					<td><input name="status" type="text" id="statusAttendance"></td>
				</tr>
				<tr>
					<td>message</td>
					<td>:</td>
					<td><input name="message" type="text" id="messageAttendance"></td>
				</tr>
				<tr>
					<td colspan="3" style="text-align: center"><input type="submit" name="Submit" value="Update Attendance Information"></td><!--big Submit transfers the value-->
				</tr>
					<script>
						var jsonArray10 = <?php 	echo json_encode($attendanceArray); ?>;
						//initialize the values with the first sport in the database
						var value = 0;
						document.getElementById("event_idAttendance").value = jsonArray10[value].event_id;
						document.getElementById("user_idAttendance").value = jsonArray10[value].user_id;
						document.getElementById("statusAttendance").value = jsonArray10[value].status;
						document.getElementById("messageAttendance").value = jsonArray10[value].message;
						function attendancechange(sel) {
							//the database team_id and json file are off by 1
							value = sel.options[sel.selectedIndex].value - 1;
							//console.log("value = " + value);
							document.getElementById("event_idAttendance").value = jsonArray10[value].event_id;
							document.getElementById("user_idAttendance").value = jsonArray10[value].user_id;
							document.getElementById("statusAttendance").value = jsonArray10[value].status;
							document.getElementById("messageAttendance").value = jsonArray10[value].message;
						}
					</script>
				</table>
		</form>
		</td>		
	</tr>

	<tr><td colspan=2 style="color: white; text-align: center; border: 5px solid white;">Enrollment Table</td></tr>
	<tr>
		<!--Insert New Enrollment-->
		<td>
			<form name="form1" method="post" action="yetiAdminInsert.php">
		<!--<form name="form1" method="post" action="test.php">-->
			<table class="YetiTable" width="100%" border="0" cellpadding="3" cellspacing="1" >
				<tr>
					<td colspan="3"><strong>Insert New Enrollment</strong></td>
				</tr>
				<tr>
					<td>enrollment_id</td>
					<td>:</td>
					<td>Primary Key</td>
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
					<td colspan="3" style="text-align: center"><input type="submit" name="Submit" value="Insert New Enrollment"></td><!--big Submit transfers the value-->
				</tr>
			</table>
			</form>
		</td>
		<!--Update Existing Enrollment-->
		<td>
			<?php
				class enrollment{
					var $enrollment_id, $user_id, $player_id, $team_id, $league_id, $enrollment_date, $fee;
				}
				$enrollmentArray = array();
				$query = "SELECT * FROM enrollment";
				$allEnrollments = $db->query($query);
				$incrEnrollment = 0;
				foreach($allEnrollments as $aEvent){ 
					$enrollmentObject = new enrollment();
					$enrollmentObject->enrollment_id = $aEvent['enrollment_id'];
					$enrollmentObject->user_id = $aEvent['user_id'];
					$enrollmentObject->player_id = $aEvent['player_id'];
					$enrollmentObject->team_id = $aEvent['team_id'];
					$enrollmentObject->league_id = $aEvent['league_id'];
					$enrollmentObject->enrollment_date = $aEvent['enrollment_date'];
					$enrollmentObject->fee = $aEvent['fee'];
					$enrollmentArray[$incrEnrollment] = $enrollmentObject;
					$incrEnrollment++;
				}
			?>
			<form name="form1" method="post" action="yetiAdminUpdate.php">
		<!--<form name="form1" method="post" action="test.php">-->
			<table class="YetiTable" width="100%" border="0" cellpadding="3" cellspacing="1" >
				<tr>
					<td colspan="3"><strong>Update Enrollment Event *</strong></td>
					<!--<td>:</td>
					<td><select id="EnrollmentChange" onchange="javascript:enrollmentchange(this)">
					<?php
					//$somevar = $_GET["UserChangeId"];
					//echo "<select>";
					foreach($enrollmentArray as $aEnrollment)
					{
						echo"<option value=\"$aEnrollment->enrollment_id\">$aEnrollment->enrollment_id</option>";
					}
					//echo "</select>";
					?>
					</select></td>-->
				</tr>
				<tr>
					<td>enrollment_id</td>
					<td>:</td>
					<td><select id="EnrollmentChange" onchange="javascript:enrollmentchange(this)">
					<?php
					//$somevar = $_GET["UserChangeId"];
					//echo "<select>";
					foreach($enrollmentArray as $aEnrollment)
					{
						echo"<option value=\"$aEnrollment->enrollment_id\">$aEnrollment->enrollment_id</option>";
					}
					//echo "</select>";
					?>
					</select>
					<input name="enrollment_id" type="hidden" id="enrollment_idEnrollment">
					</td>
				</tr>
				<tr>
					<td>user_id</td>
					<td>:</td>
					<td><input name="user_id" type="text" id="user_idEnrollment"></td>
				</tr>
				<tr>
					<td>player_id</td>
					<td>:</td>
					<td><input name="player_id" type="text" id="player_idEnrollment"></td>
				</tr>
				<tr>
					<td>team_id</td>
					<td>:</td>
					<td><input name="team_id" type="text" id="team_idEnrollment"></td>
				</tr>
				<tr>
					<td>league_id</td>
					<td>:</td>
					<td><input name="league_id" type="text" id="league_idEnrollment"></td>
				</tr>
				<tr>
					<td>enrollment_date</td>
					<td>:</td>
					<td><input name="enrollment_date" type="text" id="enrollment_dateEnrollment"></td>
				</tr>
				<tr>
					<td>fee</td>
					<td>:</td>
					<td><input name="fee" type="text" id="feeEnrollment"></td>
				</tr>
				<tr>
					<td colspan="3" style="text-align: center"><input type="submit" name="Submit" value="Update Enrollment Information"></td><!--big Submit transfers the value-->
				</tr>
					<script>
						var jsonArray8 = <?php 	echo json_encode($enrollmentArray); ?>;
						//initialize the values with the first sport in the database
						var value = 0;
						document.getElementById("user_idEnrollment").value = jsonArray8[value].user_id;
						document.getElementById("player_idEnrollment").value = jsonArray8[value].player_id;
						document.getElementById("team_idEnrollment").value = jsonArray8[value].team_id;
						document.getElementById("league_idEnrollment").value = jsonArray8[value].league_id;
						document.getElementById("enrollment_dateEnrollment").value = jsonArray8[value].enrollment_date;
						document.getElementById("feeEnrollment").value = jsonArray8[value].fee;
						function enrollmentchange(sel) {
							//the database team_id and json file are off by 1
							value = sel.options[sel.selectedIndex].value - 1;
							//console.log("value = " + value);
							document.getElementById("user_idEnrollment").value = jsonArray8[value].user_id;
							document.getElementById("player_idEnrollment").value = jsonArray8[value].player_id;
							document.getElementById("team_idEnrollment").value = jsonArray8[value].team_id;
							document.getElementById("league_idEnrollment").value = jsonArray8[value].league_id;
							document.getElementById("enrollment_dateEnrollment").value = jsonArray8[value].enrollment_date;
							document.getElementById("feeEnrollment").value = jsonArray8[value].fee;
						}
					</script>				
			</table>
			</form>
		</td>		
	</tr>	

	<tr><td colspan=2 style="color: white; text-align: center; border: 5px solid white;">Event Table</td></tr>
	<tr>
		<!--Insert New Event-->
		<td>
			<form name="form1" method="post" action="yetiAdminInsert.php">
		<!--<form name="form1" method="post" action="test.php">-->
			<table class="YetiTable" width="100%" border="0" cellpadding="3" cellspacing="1" >
				<tr>
					<td colspan="3"><strong>Insert New Event</strong></td>
				</tr>
				<tr>
					<td>event_id</td>
					<td>:</td>
					<!--<td><input name="event_id" type="text" id="event_id"></td>-->
					<td>Primary Key</td>
				</tr>
				<tr>
					<td>event_type</td>
					<td>:</td>
					<td><input name="event_type" type="text" id="event_type"></td>
				</tr>
				<tr>
					<td>start_date_time</td>
					<td>:</td>
					<td><input name="start_date_time" type="text" id="start_date_time"></td>
				</tr>
				<tr>
					<td>place_id</td>
					<td>:</td>
					<td><input name="place_id" type="text" id="place_id"></td>
				</tr>
				<tr>
					<td>home_team_id</td>
					<td>:</td>
					<td><input name="home_team_id" type="text" id="home_team_id"></td>
				</tr>
				<tr>
					<td>away_team_id</td>
					<td>:</td>
					<td><input name="away_team_id" type="text" id="away_team_id"></td>
				</tr>
				<tr>
					<td colspan="3" style="text-align: center"><input type="submit" name="Submit" value="Insert New Events"></td><!--big Submit transfers the value-->
				</tr>

				</table>
		</form>
		</td>
		<!--Update Existing Event-->
		<td>
			<?php
				class event{
					var $event_id, $event_type, $start_date_time, $place_id, $home_team_id, $away_team_id;
				}
				$eventArray = array();
				$query = "SELECT * FROM events";
				$allEvents = $db->query($query);
				$incrEvent = 0;
				foreach($allEvents as $aEvent){ 
					$eventObject = new event();
					$eventObject->event_id = $aEvent['event_id'];
					$eventObject->event_type = $aEvent['event_type'];
					$eventObject->start_date_time = $aEvent['start_date_time'];
					$eventObject->place_id = $aEvent['place_id'];
					$eventObject->home_team_id = $aEvent['home_team_id'];
					$eventObject->away_team_id = $aEvent['away_team_id'];
					$eventArray[$incrEvent] = $eventObject;
					$incrEvent++;
				}
			?>
			<form name="form1" method="post" action="yetiAdminUpdate.php">
		<!--<form name="form1" method="post" action="test.php">-->
			<table class="YetiTable" width="100%" border="0" cellpadding="3" cellspacing="1" >
				<tr>
					<td colspan="3"><strong>Update Event</strong></td>
					<!--<td>:</td>
					<td><select id="EventChange" onchange="javascript:eventchange(this)">
					<?php
					//$somevar = $_GET["UserChangeId"];
					//echo "<select>";
					foreach($eventArray as $aEvent)
					{
						echo"<option value=\"$aEvent->event_id\">$aEvent->event_id</option>";
					}
					//echo "</select>";
					?>
					</select></td>-->
				</tr>
				<tr>
					<td>event_id</td>
					<td>:</td>
					<td><select id="EventChange" onchange="javascript:eventchange(this)">
					<?php
					//$somevar = $_GET["UserChangeId"];
					//echo "<select>";
					foreach($eventArray as $aEvent)
					{
						echo"<option value=\"$aEvent->event_id\">$aEvent->event_id</option>";
					}
					//echo "</select>";
					?>
					</select>
					<input name="event_id2" type="hidden" id="event_idEvent">
					</td>
				</tr>
				<!--<tr>
					<td width="78">event_id</td>
					<td width="6">:</td>
					<td width="294"><input name="event_id" type="text" id="event_id"></td>
				</tr>-->
				<tr>
					<td>event_type</td>
					<td>:</td>
					<td><input name="event_type" type="text" id="event_typeEvent"></td>
				</tr>
				<tr>
					<td>start_date_time</td>
					<td>:</td>
					<td><input name="start_date_time" type="text" id="start_date_timeEvent"></td>
				</tr>
				<tr>
					<td>place_id</td>
					<td>:</td>
					<td><input name="place_id" type="text" id="place_idEvent"></td>
				</tr>
				<tr>
					<td>home_team_id</td>
					<td>:</td>
					<td><input name="home_team_id" type="text" id="home_team_idEvent"></td>
				</tr>
				<tr>
					<td>away_team_id</td>
					<td>:</td>
					<td><input name="away_team_id" type="text" id="away_team_idEvent"></td>
				</tr>
				<tr>
					<td colspan="3" style="text-align: center"><input type="submit" name="Submit" value="Update Event Information"></td><!--big Submit transfers the value-->
				</tr>
					<script>
						var jsonArray7 = <?php 	echo json_encode($eventArray); ?>;
						//initialize the values with the first sport in the database
						var value = 0;
						document.getElementById("event_idEvent").value = jsonArray7[value].event_id;
						document.getElementById("event_typeEvent").value = jsonArray7[value].event_type;
						document.getElementById("start_date_timeEvent").value = jsonArray7[value].start_date_time;
						document.getElementById("place_idEvent").value = jsonArray7[value].place_id;
						document.getElementById("home_team_idEvent").value = jsonArray7[value].home_team_id;
						document.getElementById("away_team_idEvent").value = jsonArray7[value].away_team_id;						
						function eventchange(sel) {
							//the database team_id and json file are off by 1
							value = sel.options[sel.selectedIndex].value - 1;
							//console.log("value = " + value);
							document.getElementById("event_idEvent").value = jsonArray7[value].event_id;
							document.getElementById("event_typeEvent").value = jsonArray7[value].event_type;
							document.getElementById("start_date_timeEvent").value = jsonArray7[value].start_date_time;
							document.getElementById("place_idEvent").value = jsonArray7[value].place_id;
							document.getElementById("home_team_idEvent").value = jsonArray7[value].home_team_id;
							document.getElementById("away_team_idEvent").value = jsonArray7[value].away_team_id;
						}
					</script>				
			</table>
		</form>
		</td>		
	</tr>

	<tr><td colspan=2 style="color: white; text-align: center; border: 5px solid white;">League Table</td></tr>
	<tr>
		<!--Insert New League-->
		<td>
			<form name="form1" method="post" action="yetiAdminInsert.php">
			<!--<form name="form1" method="post" action="test.php">-->
			<table class="YetiTable" width="100%" border="0" cellpadding="3" cellspacing="1" >
				<tr>
					<td colspan="3"><strong>Insert New League</strong></td>
				</tr>
				<tr>
					<td>league_id</td>
					<td>:</td>
					<td>Primary Key</td>
				</tr>
				<tr>
					<td>league_name</td>
					<td>:</td>
					<td><input name="league_name" type="text" id="league_name"></td>
				</tr>
				<tr>
					<td>sport_id</td>
					<td>:</td>
					<td><input name="sport_id" type="text" id="sport_id"></td>
				</tr>
				<tr>
					<td>min_age</td>
					<td>:</td>
					<td><input name="min_age" type="text" id="min_age"></td>
				</tr>
				<tr>
					<td>max_age</td>
					<td>:</td>
					<td><input name="max_age" type="text" id="max_age"></td>
				</tr>
				<tr>
					<td>start_date</td>
					<td>:</td>
					<td><input name="start_date" type="text" id="start_date"></td>
				</tr>
				<tr>
					<td>end_date</td>
					<td>:</td>
					<td><input name="end_date" type="text" id="end_date"></td>
				</tr>
				<tr>
					<td colspan="3" style="text-align: center"><input type="submit" name="Submit" value="Insert New League"></td><!--big Submit transfers the value-->
				</tr>
			</table>
		</form>
		</td>
		<!--Update Existing League-->
		<td>
			<?php
				class league{
					var $league_id, $league_name, $sport_id, $min_age, $max_age, $start_date, $end_date;
				}
				$leagueArray = array();
				$query = "SELECT * FROM league";
				$allLeagues = $db->query($query);
				$incrLeague = 0;
				foreach($allLeagues as $aLeague){ 
					$leagueObject = new league();
					$leagueObject->league_id = $aLeague['league_id'];
					$leagueObject->league_name = $aLeague['league_name'];
					$leagueObject->sport_id = $aLeague['sport_id'];
					$leagueObject->min_age = $aLeague['min_age'];
					$leagueObject->max_age = $aLeague['max_age'];
					$leagueObject->start_date = $aLeague['start_date'];
					$leagueObject->end_date = $aLeague['end_date'];
					$leagueArray[$incrLeague] = $leagueObject;
					$incrLeague++;
				}
			?>
			<form name="form1" method="post" action="yetiAdminUpdate.php">
			<!--<form name="form1" method="post" action="test.php">-->
			<table class="YetiTable" width="100%" border="0" cellpadding="3" cellspacing="1" >
				<tr>
					<td colspan="3"><strong>Update League</strong></td>

				</tr>
				<tr>
					<td>league_id</td>
					<td>:</td>
					<td><select id="LeagueChange" onchange="javascript:leaguechange(this)">
					<?php
					//$somevar = $_GET["UserChangeId"];
					//echo "<select>";
					foreach($leagueArray as $aLeague)
					{
						echo"<option value=\"$aLeague->league_id\">$aLeague->league_id</option>";
					}
					//echo "</select>";
					?>
					</select>
					<input name="league_id" type="hidden" id="league_idLeague">
					</td>
				</tr>
				<tr>
					<td>league_name</td>
					<td>:</td>
					<td><input name="league_name" type="text" id="league_nameLeague"></td>
				</tr>
				<tr>
					<td>sport_id</td>
					<td>:</td>
					<td><input name="sport_id" type="text" id="sport_idLeague"></td>
				</tr>
				<tr>
					<td>min_age</td>
					<td>:</td>
					<td><input name="min_age" type="text" id="min_ageLeague"></td>
				</tr>
				<tr>
					<td>max_age</td>
					<td>:</td>
					<td><input name="max_age" type="text" id="max_ageLeague"></td>
				</tr>
				<tr>
					<td>start_date</td>
					<td>:</td>
					<td><input name="start_date" type="text" id="start_dateLeague"></td>
				</tr>
				<tr>
					<td>end_date</td>
					<td>:</td>
					<td><input name="end_date" type="text" id="end_dateLeague"></td>
				</tr>
				<tr>
					<td colspan="3" style="text-align: center"><input type="submit" name="Submit" value="Update League Information"></td><!--big Submit transfers the value-->
				</tr>
					<script>
						var jsonArray6 = <?php 	echo json_encode($leagueArray); ?>;
						//initialize the values with the first sport in the database
						var value = 0;
						document.getElementById("league_idLeague").value = jsonArray6[value].league_id;
						document.getElementById("league_nameLeague").value = jsonArray6[value].league_name;
						document.getElementById("sport_idLeague").value = jsonArray6[value].sport_id;
						document.getElementById("min_ageLeague").value = jsonArray6[value].min_age;
						document.getElementById("max_ageLeague").value = jsonArray6[value].max_age;
						document.getElementById("start_dateLeague").value = jsonArray6[value].start_date;
						document.getElementById("end_dateLeague").value = jsonArray6[value].end_date;						
						function leaguechange(sel) {
							//the database team_id and json file are off by 1
							value = sel.options[sel.selectedIndex].value - 1;
							//console.log("value = " + value);
							document.getElementById("league_idLeague").value = jsonArray6[value].league_id;
							document.getElementById("league_nameLeague").value = jsonArray6[value].league_name;
							document.getElementById("sport_idLeague").value = jsonArray6[value].sport_id;
							document.getElementById("min_ageLeague").value = jsonArray6[value].min_age;
							document.getElementById("max_ageLeague").value = jsonArray6[value].max_age;
							document.getElementById("start_dateLeague").value = jsonArray6[value].start_date;
							document.getElementById("end_dateLeague").value = jsonArray6[value].end_date;
						}
					</script>
				</table>
		</form>
		</td>
		</tr>	

	<tr><td colspan=2 style="color: white; text-align: center; border: 5px solid white;">Place Table</td></tr>
	<tr>
		<!--Insert New Place-->
		<td>
			<form name="form1" method="post" action="yetiAdminInsert.php">
			<!--<form name="form1" method="post" action="test.php">-->
			<table class="YetiTable" width="100%" border="0" cellpadding="3" cellspacing="1" >
				<tr>
					<td colspan="3"><strong>Insert New Place</strong></td>
				</tr>
				<tr>
					<td>place_id</td>
					<td>:</td>
					<td>Primary Key</td>
				</tr>				
				<tr>
					<td>place_name</td>
					<td>:</td>
					<td><input name="place_name" type="text" id="place_name"></td>
				</tr>
				<tr>
					<td>street_address</td>
					<td>:</td>
					<td><input name="street_address" type="text" id="street_address"></td>
				</tr>
				<tr>
					<td>city</td>
					<td>:</td>
					<td><input name="city" type="text" id="city"></td>
				</tr>
				<tr>
					<td>state</td>
					<td>:</td>
					<td><input name="state" type="text" id="state"></td>
				</tr>
				<tr>
					<td>zip</td>
					<td>:</td>
					<td><input name="zip" type="text" id="zip"></td>
				</tr>
				<tr>
					<td colspan="3" style="text-align: center"><input type="submit" name="Submit" value="Insert New Place"></td><!--big Submit transfers the value-->
				</tr>
			</table>
		</form>
		</td>
		<!--Update Existing Place-->
		<td>
			<?php
				class place{
					var $place_id, $place_name, $street_address, $city, $state, $zip;
				}
				$placeArray = array();
				$query = "SELECT * FROM place";
				$allPlaces = $db->query($query);
				$incrPlace = 0;
				foreach($allPlaces as $aPlace){ 
					$placeObject = new place();
					$placeObject->place_id = $aPlace['place_id'];
					$placeObject->place_name = $aPlace['place_name'];
					$placeObject->street_address = $aPlace['street_address'];
					$placeObject->city = $aPlace['city'];
					$placeObject->state = $aPlace['state'];
					$placeObject->zip = $aPlace['zip'];
					$placeArray[$incrPlace] = $placeObject;
					$incrPlace++;
				}
			?>
			<form name="form1" method="post" action="yetiAdminUpdate.php">
			<!--<form name="form1" method="post" action="test.php">-->
			<table class="YetiTable" width="100%" border="0" cellpadding="3" cellspacing="1" >
				<tr>
					<td colspan="3"><strong>Update Place</strong></td>
				</tr>
				<tr>
					<td>place_id</td>
					<td>:</td>
					<td><select id="PlaceChange" onchange="javascript:placechange(this)">
					<?php
					//$somevar = $_GET["UserChangeId"];
					//echo "<select>";
					foreach($placeArray as $aPlace)
					{
						echo"<option value=\"$aPlace->place_id\">$aPlace->place_id</option>";
					}
					//echo "</select>";
					?>
					</select>
					<input name="place_id" type="hidden" id="place_idPlace">
					</td>
				</tr>				
				<tr>
					<td>place_name</td>
					<td>:</td>
					<td><input name="place_name" type="text" id="place_namePlace"></td>
				</tr>
				<tr>
					<td>street_address</td>
					<td>:</td>
					<td><input name="street_address" type="text" id="street_addressPlace"></td>
				</tr>
				<tr>
					<td>city</td>
					<td>:</td>
					<td><input name="city" type="text" id="cityPlace"></td>
				</tr>
				<tr>
					<td>state</td>
					<td>:</td>
					<td><input name="state" type="text" id="statePlace"></td>
				</tr>
				<tr>
					<td>zip</td>
					<td>:</td>
					<td><input name="zip" type="text" id="zipPlace"></td>
				</tr>
				<tr>
					<td colspan="3" style="text-align: center"><input type="submit" name="Submit" value="Update Place Information"></td><!--big Submit transfers the value-->
				</tr>
					<script>
						var jsonArray5 = <?php 	echo json_encode($placeArray); ?>;
						//initialize the values with the first sport in the database
						var value = 0;
						document.getElementById("place_idPlace").value = jsonArray5[value].place_id;
						document.getElementById("place_namePlace").value = jsonArray5[value].place_name;
						document.getElementById("street_addressPlace").value = jsonArray5[value].street_address;
						document.getElementById("cityPlace").value = jsonArray5[value].city;
						document.getElementById("statePlace").value = jsonArray5[value].state;
						document.getElementById("zipPlace").value = jsonArray5[value].zip;					   
						function placechange(sel) {
							//the database team_id and json file are off by 1
							value = sel.options[sel.selectedIndex].value - 1;
							//console.log("value = " + value);
							document.getElementById("place_idPlace").value = jsonArray5[value].place_id;
							document.getElementById("place_namePlace").value = jsonArray5[value].place_name;
							document.getElementById("street_addressPlace").value = jsonArray5[value].street_address;
							document.getElementById("cityPlace").value = jsonArray5[value].city;					 
							document.getElementById("statePlace").value = jsonArray5[value].state;
							document.getElementById("zipPlace").value = jsonArray5[value].zip;
						}
					</script>
				</table>
		</form>
		</td>		
	</tr>

	<tr><td colspan=2 style="color: white; text-align: center; border: 5px solid white;">Player Table</td></tr>
	<tr>
		<!--Insert New Player-->
		<td>
			<form name="form1" method="post" action="yetiAdminInsert.php">
		<!--<form name="form1" method="post" action="test.php">-->
			<table class="YetiTable" width="100%" border="0" cellpadding="3" cellspacing="1" >
				<tr>
					<td colspan="3"><strong>Insert New Player</strong></td>
				</tr>
				<tr>
					<td>player_id</td>
					<td>:</td>
					<td>Primary Key</td>
				</tr>
				<tr>
					<td>fname</td>
					<td>:</td>
					<td><input name="fname" type="text" id="fname"></td>
				</tr>
				<tr>
					<td>lname</td>
					<td>:</td>
					<td><input name="lname" type="text" id="lname"></td>
				</tr>
				<tr>
					<td>user_id</td>
					<td>:</td>
					<td><input name="user_id" type="text" id="user_id"></td>
				</tr>
				<tr>
					<td colspan="3" style="text-align: center"><input type="submit" name="Submit" value="Insert New Player"></td><!--big Submit transfers the value-->
				</tr>
			</table>
			</form>
		</td>
		<!--Update Existing Player-->
		<td>
			<?php
				class player{
					var $player_id, $fname, $lname, $user_id;
				}
				$playerArray = array();
				$query = "SELECT * FROM player";
				$allPlayers = $db->query($query);
				$incrPlayer = 0;
				foreach($allPlayers as $aPlayer){ 
					$playerObject = new player();
					$playerObject->player_id = $aPlayer['player_id'];
					$playerObject->fname = $aPlayer['fname'];
					$playerObject->lname = $aPlayer['lname'];
					$playerObject->user_id = $aPlayer['user_id'];
					$playerArray[$incrPlayer] = $playerObject;
					$incrPlayer++;
				}
			?>
		<form name="form1" method="post" action="yetiAdminUpdate.php">
		<!--<form name="form1" method="post" action="test.php">-->
			<table class="YetiTable" width="100%" border="0" cellpadding="3" cellspacing="1" >
				<tr>
					<td colspan="3"><strong>Update Player</strong></td>
					
				</tr>
				<tr>
					<td>player_id</td>
					<td>:</td>
					<td><select id="PlayerChange" onchange="javascript:playerchange(this)">
					<?php
					//$somevar = $_GET["UserChangeId"];
					//echo "<select>";
					foreach($playerArray as $aPlayer)
					{
						echo"<option value=\"$aPlayer->player_id\">$aPlayer->player_id</option>";
					}
					//echo "</select>";
					?>
					</select>
					<input name="player_id" type="hidden" id="player_idPlayer">
					</td>
				</tr>
				<tr>
					<td>fname</td>
					<td>:</td>
					<td><input name="fname" type="text" id="fnamePlayer"></td>
				</tr>
				<tr>
					<td>lname</td>
					<td>:</td>
					<td><input name="lname" type="text" id="lnamePlayer"></td>
				</tr>
				<tr>
					<td>user_id</td>
					<td>:</td>
					<td><input name="user_id" type="text" id="user_idPlayer"></td>
				</tr>
				<tr>
					<td colspan="3" style="text-align: center"><input type="submit" name="Submit" value="Update Player Information"></td><!--big Submit transfers the value-->
				</tr>
					<script>
						var jsonArray4 = <?php 	echo json_encode($playerArray); ?>;
						//initialize the values with the first sport in the database
						var value = 0;
						document.getElementById("player_idPlayer").value = jsonArray4[value].player_id;
						document.getElementById("fnamePlayer").value = jsonArray4[value].fname;
						document.getElementById("lnamePlayer").value = jsonArray4[value].lname;
						document.getElementById("user_idPlayer").value = jsonArray4[value].user_id;
					   function playerchange(sel) {
							//the database team_id and json file are off by 1
							value = sel.options[sel.selectedIndex].value - 1;
							//console.log("value = " + value);
							document.getElementById("player_idPlayer").value = jsonArray4[value].player_id;
							document.getElementById("fnamePlayer").value = jsonArray4[value].fname;
							document.getElementById("lnamePlayer").value = jsonArray4[value].lname;
							document.getElementById("user_idPlayer").value = jsonArray4[value].user_id;
						   //document.getElementById("lnameUser").value = "jsonArray[0].lname";
						}
					</script>
				</table>
			</form>
		</td>
		</tr>

	<tr><td colspan=2 style="color: white; text-align: center; border: 5px solid white;">Sport Table</td></tr>
	<tr>
		<!--Insert New Sport-->
		<td>
			<form name="form1" method="post" action="yetiAdminInsert.php">
		<!--<form name="form1" method="post" action="test.php">-->
			<table class="YetiTable" width="100%" border="0" cellpadding="3" cellspacing="1" >
				<tr>
					<td colspan="3"><strong>Insert New Sport</strong></td>
				</tr>
				<tr>
					<td>sport_id</td>
					<td>:</td>
					<td>Primary Key</td>
				</tr>
				<tr>
					<td>sport_name</td>
					<td>:</td>
					<td><input name="sport_name" type="text" id="sport_name"></td>
				</tr>
				<tr>
					<td colspan="3" style="text-align: center"><input type="submit" name="Submit" value="Insert New Sport"></td><!--big Submit transfers the value-->
				</tr>
			</table>
			</form>
		</td>
		<!--Update Existing Sport-->
		<td>
			<?php
				class sport{
					var $sport_id, $sport_name;
				}
				$sportArray = array();
				$query = "SELECT * FROM sport";
				$allSports = $db->query($query);
				$incrSport = 0;
				foreach($allSports as $aSport){ 
					$sportObject = new sport();
					$sportObject->sport_id = $aSport['sport_id'];
					$sportObject->sport_name = $aSport['sport_name'];
					$sportArray[$incrSport] = $sportObject;
					$incrSport++;
				}
			?>
		<form name="form1" method="post" action="yetiAdminUpdate.php">
		<!--<form name="form1" method="post" action="test.php">-->
			<table class="YetiTable" width="100%" border="0" cellpadding="3" cellspacing="1" >
				<tr>
					<td colspan="3"><strong>Update Sport</strong></td>

				</tr>
				<tr>
					<td>sport_id</td>
					<td>:</td>
					<td><select id="SportChange" onchange="javascript:sportchange(this)">
					<?php
					//$somevar = $_GET["UserChangeId"];
					//echo "<select>";
					foreach($sportArray as $aSport)
					{
						echo"<option value=\"$aSport->sport_id\">$aSport->sport_id</option>";
					}
					//echo "</select>";
					?>
					</select>
					<input name="sport_id" type="hidden" id="sport_idSport">
					</td>
				</tr>
				<tr>
					<td>sport_name</td>
					<td>:</td>
					<td><input name="sport_name" type="text" id="sport_nameSport"></td>
				</tr>
				<tr>
					<td colspan="3" style="text-align: center"><input type="submit" name="Submit" value="Update Sport Information"></td><!--big Submit transfers the value-->
				</tr>
					<script>
						var jsonArray3 = <?php 	echo json_encode($sportArray); ?>;
						//initialize the values with the first sport in the database
						var value = 0;
						document.getElementById("sport_idSport").value = jsonArray3[value].sport_id;
						document.getElementById("sport_nameSport").value = jsonArray3[value].sport_name;
					   function sportchange(sel) {
							//the database team_id and json file are off by 1
							value = sel.options[sel.selectedIndex].value - 1;
							//console.log("value = " + value);
							document.getElementById("sport_idSport").value = jsonArray3[value].sport_id;
							document.getElementById("sport_nameSport").value = jsonArray3[value].sport_name;
					   }
					   //document.getElementById("lnameUser").value = "jsonArray[0].lname";
					</script>
				</table>
			</form>
		</td>		
	</tr>

	<tr><td colspan=2 style="color: white; text-align: center; border: 5px solid white;">Team Table</td></tr>
	<tr>
		<!--Insert New Team-->
		<td>
			<form name="form1" method="post" action="yetiAdminInsert.php">
		
		<!--<form name="form1" method="post" action="test.php">-->
			<table class="YetiTable" width="100%" border="0" cellpadding="3" cellspacing="1" >
				<tr>
					<td colspan="3"><strong>Insert New Team</strong></td>
				</tr>
				<tr>
					<td>team_id</td>
					<td>:</td>
					<td>Primary Key</td>
				</tr>
				<tr>
					<td>league_id</td>
					<td>:</td>
					<td><input name="league_id" type="text" id="league_id"></td>
				</tr>
				<tr>
					<td>team_name</td>
					<td>:</td>
					<td><input name="team_name" type="text" id="team_name"></td>
				</tr>
				<tr>
					<td>user_id</td>
					<td>:</td>
					<td><input name="user_id" type="text" id="user_id"></td>
				</tr>
				<tr>
					<td colspan="3" style="text-align: center"><input type="submit" name="Submit" value="Insert New Team"></td><!--big Submit transfers the value-->
				</tr>
			</table>
			</form>
		</td>
		<!--Update Existing Team-->
		<td style="color: white;">
			<?php
				class team{
					var $team_id, $league_id, $team_name, $user_id;
				}
				$teamArray = array();
				$query = "SELECT * FROM team";
				$allTeams = $db->query($query);
				$incrTeam = 0;
				foreach($allTeams as $aTeam){ 
					$teamObject = new team();
					$teamObject->team_id = $aTeam['team_id'];
					$teamObject->league_id = $aTeam['league_id'];
					$teamObject->team_name = $aTeam['team_name'];
					$teamObject->user_id = $aTeam['user_id'];
					$teamArray[$incrTeam] = $teamObject;
					$incrTeam++;
				}
			?>
			<form name="form1" method="post" action="yetiAdminUpdate.php">
		
		<!--<form name="form1" method="post" action="test.php">-->
			<table class="YetiTable" width="100%" border="0" cellpadding="3" cellspacing="1" >
				<tr>
					<td colspan="3"><strong>Update Team</strong></td>

				</tr>
				<tr>
					<td>team_id</td>
					<td>:</td>
					<td><select id="TeamChange" onchange="javascript:teamchange(this)">
					<?php
					//$somevar = $_GET["UserChangeId"];
					//echo "<select>";
					foreach($teamArray as $aTeam)
					{
						echo"<option value=\"$aTeam->team_id\">$aTeam->team_id</option>";
					}
					//echo "</select>";
					?>
					</select>
					<input name="team_id" type="hidden" id="team_idTeam">
					</td>
				</tr>
				<tr>
					<td>league_id</td>
					<td>:</td>
					<td><input name="league_id" type="text" id="league_idTeam"></td>
				</tr>
				<tr>
					<td>team_name</td>
					<td>:</td>
					<td><input name="team_name" type="text" id="team_nameTeam"></td>
				</tr>
				<tr>
					<td>user_id</td>
					<td>:</td>
					<td><input name="user_id" type="text" id="user_idTeam"></td>
				</tr>
				<tr>
					<td colspan="3" style="text-align: center"><input type="submit" name="Submit" value="Update Team Information"></td><!--big Submit transfers the value-->
				</tr>
					<script>
						var jsonArray2 = <?php 	echo json_encode($teamArray); ?>;
						//initialize the values with the first team in the database
						var value = 0;
						document.getElementById("team_idTeam").value = jsonArray2[value].team_id;
						document.getElementById("league_idTeam").value = jsonArray2[value].league_id;
						document.getElementById("team_nameTeam").value = jsonArray2[value].team_name;
						document.getElementById("user_idTeam").value = jsonArray2[value].user_id;
					   function teamchange(sel) {
							//the database team_id and json file are off by 1
							value = sel.options[sel.selectedIndex].value - 1;
							//console.log("value = " + value);
							document.getElementById("team_idTeam").value = jsonArray2[value].team_id;
							document.getElementById("league_idTeam").value = jsonArray2[value].league_id;
							document.getElementById("team_nameTeam").value = jsonArray2[value].team_name;
							document.getElementById("user_idTeam").value = jsonArray2[value].user_id;
					   }
					   //document.getElementById("lnameUser").value = "jsonArray[0].lname";
					</script>				
			</table>
			</form>
		</td>
	</tr>

	<!--Users table Insert and Update cells-->
	<tr><td colspan=2 style="color: white; text-align: center; border: 5px solid white;">Users Table</td></tr>
	<tr>
		<!--Insert New User-->
		<td>
			<form name="form1" method="post" action="yetiAdminInsert.php">
			<!--<form name="form1" method="post" action="test.php">-->
			<table class="YetiTable" width="100%" border="0" cellpadding="3" cellspacing="1" >
				<tr>
					<td colspan="3"><strong>Insert New User</strong></td>
				</tr>
				<tr>
					<td>user_id</td>
					<td>:</td>
					<td>Primary Key</td>
				</tr>
				<tr>
					<td>fname</td>
					<td>:</td>
					<td><input name="fname" type="text" id="fname"></td>
				</tr>
				<tr>
					<td>lname</td>
					<td>:</td>
					<td><input name="lname" type="text" id="lname"></td>
				</tr>
				<tr>
					<td>phone</td>
					<td>:</td>
					<td><input name="phone" type="text" id="phone"></td>
				</tr>
				<tr>
					<td>emergency</td>
					<td>:</td>
					<td><input name="emergency" type="text" id="emergency"></td>
				</tr>
				<tr>
					<td>email</td>
					<td>:</td>
					<td><input name="email" type="text" id="email"></td>
				</tr>					
				<tr>
					<td>user_type</td>
					<td>:</td>
					<td><input name="user_type" type="text" id="user_type"></td>
				</tr>
				<tr>
					<td>password</td>
					<td>:</td>
					<td><input name="password" type="text" id="password"></td>
				</tr>
				<tr>
					<td colspan="3" style="text-align: center"><input type="submit" name="Submit" value="Insert New Users"></td><!--big Submit transfers the value-->
				</tr>
				
			</table>
			</form>
		</td>
		<!--Update existing user-->
		<td>
			<?php
				$query = "SELECT * FROM users";
				$allPeople = $db->query($query);
				$incrUser = 0;
				foreach($allPeople as $aPerson){ 
					$userObject = new user();
					$userObject->user_id = $aPerson['user_id'];
					$userObject->fname = $aPerson['fname'];
					$userObject->lname = $aPerson['lname'];
					$userObject->phone = $aPerson['phone'];
					$userObject->emergency = $aPerson['emergency'];
					$userObject->email = $aPerson['email'];
					$userObject->user_type = $aPerson['user_type'];
					$userObject->password = $aPerson['password'];
					$userArray[$incrUser] = $userObject;
					$incrUser++;
				}
			?>		
			<form name="form1" method="post" action="yetiAdminUpdate.php">
			<table class="YetiTable" width="100%" border="0" cellpadding="3" cellspacing="1" >
				<tr>
					<td colspan="3"><strong>Update User<strong></td>

				</tr>
				<tr>
					<td>user_id</td>
					<td>:</td>
					<td><select id="UserChange" onchange="javascript:userchange(this)">
					<?php
					//$somevar = $_GET["UserChangeId"];
					//echo "<select>";
					foreach($userArray as $aUser)
					{
						echo"<option value=\"$aUser->user_id\">$aUser->user_id</option>";
					}
					//echo "</select>";
					?>
					</select>
					<input name="user_id" type="hidden" id="user_idUser">
					</td>
				</tr>
				<tr>
					<td>fname</td>
					<td>:</td>
					<td><input name="fname" type="text" id="fnameUser"></td>
				</tr>
				<tr>
					<td>lname</td>
					<td>:</td>
					<td><input name="lname" type="text" id="lnameUser"></td>
				</tr>
				<tr>
					<td>phone</td>
					<td>:</td>
					<td><input name="phone" type="text" id="phoneUser"></td>
				</tr>
				<tr>
					<td>emergency</td>
					<td>:</td>
					<td><input name="emergency" type="text" id="emergencyUser"></td>
				</tr>
				<tr>
					<td>email</td>
					<td>:</td>
					<td><input name="email" type="text" id="emailUser"></td>
				</tr>					
				<tr>
					<td>user_type</td>
					<td>:</td>
					<td><input name="user_type" type="text" id="user_typeUser"></td>
				</tr>
				<tr>
					<td>password</td>
					<td>:</td>
					<td><input name="password" type="text" id="passwordUser"></td>
				</tr>
				<tr>
					<td colspan="3" style="text-align: center"><input type="submit" name="Submit" value="Update User Information"></td>
				</tr>
					<script>
						var jsonArray = <?php 	echo json_encode($userArray); ?>;
						//console.log(jsonArray.user_id);
						//console.log(jsonArray.user_id);
						console.log(jsonArray[0].fname);
						console.log(jsonArray[0].lname);
						//var json = JSON.parse(jsonArray);
						//console.log(json["user_id"] + " " + json.lname);
						console.log("jsonArray[user_id=1] = " + jsonArray[0]);
						//initialize the values with the first person in the database
						var value = 0;
						document.getElementById("user_idUser").value = jsonArray[value].user_id;
						document.getElementById("fnameUser").value = jsonArray[value].fname;
						document.getElementById("lnameUser").value = jsonArray[value].lname;
						document.getElementById("phoneUser").value = jsonArray[value].phone;
						document.getElementById("emergencyUser").value = jsonArray[value].emergency;
						document.getElementById("emailUser").value = jsonArray[value].email;
						document.getElementById("user_typeUser").value = jsonArray[value].user_type;
						document.getElementById("passwordUser").value = jsonArray[value].password;
					   function userchange(sel) {
							//the database user_id and json file are off by 1
							value = sel.options[sel.selectedIndex].value - 1;
							//console.log("value = " + value);
							document.getElementById("user_idUser").value = jsonArray[value].user_id;
							document.getElementById("fnameUser").value = jsonArray[value].fname;
							document.getElementById("lnameUser").value = jsonArray[value].lname;
							document.getElementById("phoneUser").value = jsonArray[value].phone;
							document.getElementById("emergencyUser").value = jsonArray[value].emergency;
							document.getElementById("emailUser").value = jsonArray[value].email;
							document.getElementById("user_typeUser").value = jsonArray[value].user_type;
							document.getElementById("passwordUser").value = jsonArray[value].password;
					   }
					   //document.getElementById("lnameUser").value = "jsonArray[0].lname";
					</script>					
			</table>
			</form>
		</td>

	</tr>

	</table>

</body>
</html>