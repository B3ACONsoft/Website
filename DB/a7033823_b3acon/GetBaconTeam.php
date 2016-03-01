<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Get All Tables</title>
</head>

<body>
<!--comment-->
<!--old stuff, ignore
<p>This file accesses the table named "Administration", with six fields: 
"adminID", "adminType", "emailAddress", "password", "firstName", "lastName"</p>

<p>There are three records of information<br/>
<table border="1">
	<tr><th>adminID</th><th>adminType</th><th>emailAddress</th><th>password</th><th>firstName</th></tr>
    <tr><td>1</td><td>fname1</td><td>lname1</td><td>1234567890</td><td>lname1@gmail.com</td></tr>
    <tr><td>2</td><td>fname2</td><td>lname2</td><td>2345678901</td><td>lname2@gmail.com</td></tr>
    <tr><td>3</td><td>fname3</td><td>lname3</td><td>3456789012</td><td>lname3@gmail.com</td></tr>
</table>
</p>
-->
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
?>