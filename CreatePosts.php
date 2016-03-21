<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "taugusti", "trogdor", "taugusti");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$username = $_POST["username"];
$content = $_POST["content"];

$my_query = "SELECT * FROM Users WHERE user_id = '$username'";
$result = mysqli_query($mysqli, $my_query);
$row_num = mysqli_num_rows($result);

if($row_num == 1)
{
	if($content == '')
	{
		echo "Error: Cannot enter blank content";
	}
	else
	{
		$sql = "INSERT INTO Posts (author_id, content) VALUES ('$username', '$content')";

		if($mysqli->query($sql) === TRUE)
		{
			echo "New record created successfully";
		}
		else
		{
			echo "Error: " . $sql . "<br>" . $mysqli->error;
		}
	}
}
else
{
	echo "Error: user id does not exist";

}

/* close connection */
$mysqli->close();
?>
