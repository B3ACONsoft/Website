<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Get All Tables</title>
</head>

<body>
<!--comment-->

</body>
</html>
<?php
echo "<h2>Get All Tables using PHP</h2>";
echo "<p>PHP version " . phpversion() . "</p>";

$dsn = 'mysql:host=mysql13.000webhost.com;dbname=a7033823_b3acon';
$username = 'a7033823_dev';
$password = 'bacon3';
try {
	$db = new PDO($dsn, $username, $password);
	echo "<p>You are connected to the database.</p>";
}catch(PDOException $e){
	$error_message = $e->getMessage();
	echo "<p>An error occurred while connecting to the database:
	$error_message</p>";
}
$query = 'SELECT * FROM attendance';
$allPeople = $db->query($query);
echo"<p>Current state of the attendance table in the database, each column is a field, each row is a data record.</p>";
echo'<table border="1">';
echo'<tr><th>event_id</th><th>user_id</th><th>status</th><th>message</th></tr>';
foreach($allPeople as $aPerson){ ?>
	<tr>
		<td><?php echo $aPerson['event_id']; ?></td>
    	<td><?php echo $aPerson['user_id']; ?></td>
		<td><?php echo $aPerson['status']; ?></td>
		<td><?php echo $aPerson['message']; ?></td>

    </tr>
<?php }; 
echo"</table>";

$query = 'SELECT * FROM enrollment';
$allPeople = $db->query($query);
echo"<p>Current state of the enrollment table in the database, each column is a field, each row is a data record.</p>";
echo'<table border="1">';
echo'<tr><th>enrollment_id</th><th>user_id</th><th>player_id</th><th>team_id</th><th>league_id</th><th>enrollment_date</th><th>fee</th></tr>';
foreach($allPeople as $aPerson){ ?>
	<tr>
		<td><?php echo $aPerson['enrollment_id']; ?></td>
    	<td><?php echo $aPerson['user_id']; ?></td>
		<td><?php echo $aPerson['player_id']; ?></td>
		<td><?php echo $aPerson['team_id']; ?></td>
    	<td><?php echo $aPerson['league_id']; ?></td>
		<td><?php echo $aPerson['enrollment_date']; ?></td>
		<td><?php echo $aPerson['fee']; ?></td>
    </tr>
<?php }; 
echo"</table>";

$query = 'SELECT * FROM events';
$allPeople = $db->query($query);
echo"<p>Current state of the events table in the database, each column is a field, each row is a data record.</p>";
echo'<table border="1">';
echo'<tr><th>event_id</th><th>event_type</th><th>start_date_time</th><th>place_id</th><th>home_team_id</th><th>away_team_id</th></tr>';
foreach($allPeople as $aPerson){ ?>
	<tr>
		<td><?php echo $aPerson['event_id']; ?></td>
    	<td><?php echo $aPerson['event_type']; ?></td>
		<td><?php echo $aPerson['start_date_time']; ?></td>
		<td><?php echo $aPerson['place_id']; ?></td>
    	<td><?php echo $aPerson['home_team_id']; ?></td>
		<td><?php echo $aPerson['away_team_id']; ?></td>
    </tr>
<?php }; 
echo"</table>";

$query = 'SELECT * FROM league';
$allPeople = $db->query($query);
echo"<p>Current state of the league table in the database, each column is a field, each row is a data record.</p>";
echo'<table border="1">';
echo'<tr><th>league_id</th><th>league_name</th><th>sport_id</th><th>min_age</th><th>max_age</th><th>start_date</th><th>end_date</th></tr>';
foreach($allPeople as $aPerson){ ?>
	<tr>
		<td><?php echo $aPerson['league_id']; ?></td>
    	<td><?php echo $aPerson['league_name']; ?></td>
		<td><?php echo $aPerson['sport_id']; ?></td>
		<td><?php echo $aPerson['min_age']; ?></td>
    	<td><?php echo $aPerson['max_age']; ?></td>
		<td><?php echo $aPerson['start_date']; ?></td>
		<td><?php echo $aPerson['end_date']; ?></td>
    </tr>
<?php }; 
echo"</table>";

$query = 'SELECT * FROM place';
$allPeople = $db->query($query);
echo"<p>Current state of the place table in the database, each column is a field, each row is a data record.</p>";
echo'<table border="1">';
echo'<tr><th>place_id</th><th>place_name</th><th>street_address</th><th>city</th><th>state</th><th>zip</th></tr>';
foreach($allPeople as $aPerson){ ?>
	<tr>
		<td><?php echo $aPerson['place_id']; ?></td>
    	<td><?php echo $aPerson['place_name']; ?></td>
		<td><?php echo $aPerson['street_address']; ?></td>
		<td><?php echo $aPerson['city']; ?></td>
    	<td><?php echo $aPerson['state']; ?></td>
		<td><?php echo $aPerson['zip']; ?></td>
    </tr>
<?php }; 
echo"</table>";

$query = 'SELECT * FROM sequence_data';
$allPeople = $db->query($query);
echo"<p>Current state of the sequence_data table in the database, each column is a field, each row is a data record.</p>";
echo'<table border="1">';
echo'<tr><th>sequence_name</th></tr>';
foreach($allPeople as $aPerson){ ?>
	<tr>
		<td><?php echo $aPerson['sequence_name']; ?></td>
    </tr>
<?php }; 
echo"</table>";

$query = 'SELECT * FROM sport';
$allPeople = $db->query($query);
echo"<p>Current state of the sport table in the database, each column is a field, each row is a data record.</p>";
echo'<table border="1">';
echo'<tr><th>sport_id</th><th>sport_name</th></tr>';
foreach($allPeople as $aPerson){ ?>
	<tr>
		<td><?php echo $aPerson['sport_id']; ?></td>
    	<td><?php echo $aPerson['sport_name']; ?></td>
    </tr>
<?php }; 
echo"</table>";

$query = 'SELECT * FROM team';
$allPeople = $db->query($query);
echo"<p>Current state of the team table in the database, each column is a field, each row is a data record.</p>";
echo'<table border="1">';
echo'<tr><th>team_id</th><th>league_id</th><th>team_name</th><th>user_id</th></tr>';
foreach($allPeople as $aPerson){ ?>
	<tr>
		<td><?php echo $aPerson['team_id']; ?></td>
    	<td><?php echo $aPerson['league_id']; ?></td>
		<td><?php echo $aPerson['team_name']; ?></td>
		<td><?php echo $aPerson['user_id']; ?></td>

    </tr>
<?php }; 
echo"</table>";

$query = 'SELECT * FROM users';
$allPeople = $db->query($query);
echo"<p>Current state of the users table in the database, each column is a field, each row is a data record.</p>";
echo'<table border="1">';
echo'<tr><th>user_id</th><th>fname</th><th>lname</th><th>phone</th><th>emergency</th><th>email</th><th>user_type</th><th>password</th></tr>';
foreach($allPeople as $aPerson){ ?>
	<tr>
		<td><?php echo $aPerson['user_id']; ?></td>
    	<td><?php echo $aPerson['fname']; ?></td>
		<td><?php echo $aPerson['lname']; ?></td>
		<td><?php echo $aPerson['phone']; ?></td>
    	<td><?php echo $aPerson['emergency']; ?></td>
		<td><?php echo $aPerson['email']; ?></td>
    	<td><?php echo $aPerson['user_type']; ?></td>
		<td><?php echo $aPerson['password']; ?></td>		
    </tr>
<?php }; 
echo"</table>";
?>