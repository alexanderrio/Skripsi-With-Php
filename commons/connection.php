<?php

	function createConnection(){
		$host = "sql205.epizy.com";
		$username = "epiz_33044199";
		$pass = "VIF09XNX9VAK7";
		$dbname = "epiz_33044199_arimatea";

		$conn = mysqli_connect($host,$username,$pass,$dbname) or die("gagal koneksi");
			return $conn;
	}

	//$conn = createConnection();

?>