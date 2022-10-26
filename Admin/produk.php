<?php
	session_start();
	include_once("commons/connection.php");
	
	$con = createConnection();
	if (!isset($_SESSION['id'])) {
  header("Location: loginAdmin.php");
 }
	
	

	$sql = "SELECT * FROM coffins";
	$result = mysqli_query($con, $sql);
	
	
	include_once("commons/header.php");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="../styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
    <link rel="stylesheet" href="../assets/fontawesome-free-6.2.0-web/css/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Produk</title>
</head>
<body>
    
      <div class="judulProduk">
        <H1>Produk</H1>
      </div>

      <div class="produkDetail col-12 row">
        <div class="col-1"></div>
        <div class="col-5">
          <a href="peti.php">
            <img src="../assets/img/tw.jpg" alt="" width="100%" height="500px">
            <h3>Peti</h3>
          </a>
        </div>
        <div class="col-5">
          <a href="service.php">
            <img src="../assets/img/service.jpg" alt="" width="100%" height="500px">
            <h3>Layanan</h3>
          </a>
        </div>
      </div>

<?php
    include_once("commons/footer.php");

?>