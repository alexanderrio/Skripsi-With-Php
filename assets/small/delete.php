<?php
include_once("connection.php");
    $con = createConnection();
    $sql = "SELECT * FROM coffins";
	$result = mysqli_query($con, $sql);
?>
