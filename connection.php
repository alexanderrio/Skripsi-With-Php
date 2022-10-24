<?php

	function createConnection(){
		$host = "localhost";
		$username = "root";
		$pass = "";
		$dbname = "arimatea";

		$conn = mysqli_connect($host,$username,$pass,$dbname) or die("gagal koneksi");
			return $conn;
	}

	//$conn = createConnection();

?>