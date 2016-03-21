<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "taugusti", "trogdor", "taugusti");
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$username = $_POST['usernames'];


$query = "SELECT content FROM Posts WHERE author_id = '$username'";

echo "<table border = 2>";
if ($result = $mysqli->query($query)) {


    while ($row = $result->fetch_assoc()) {
	echo "<tr><td>".$row["content"]."</td></tr>";	
    }
echo "</table>";

    $result->free();
}



/* close connection */
$mysqli->close();
?>
