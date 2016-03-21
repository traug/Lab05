 
<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "taugusti", "trogdor", "taugusti");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$user_id = $_POST["user_id"];

if($user_id == '')
{
	echo "Cannot enter blank user id";
}
else{


$sql = "INSERT INTO Users (user_id) VALUES ('$user_id')";

if($mysqli->query($sql) === TRUE) {
	echo "New record created successfully";
	}
else{
	echo "Error: " . $sql . "<br>" . $mysqli->error;
}

}
/* close connection */
$mysqli->close();
?>
