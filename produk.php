<?php
	session_start();
	include_once("connection.php");
	
	$con = createConnection();
	if (!isset($_SESSION['id'])) {
  header("Location: loginAdmin.php");
 }
	
	
	if(isset($_POST['insert']) ){
		if(!empty($_FILES['foto']['name'])&& isset($_POST['judul']) && isset($_POST['konten'])){
			$path="gambar/".$_FILES['foto']['name'];
			if(move_uploaded_file($_FILES['foto']['tmp_name'], $path)){
				$sql = "INSERT INTO foto VALUES('','".$_POST['judul']."','".$path."','".$_POST['konten']."',".$_SESSION['id'].")";
				$hasil = mysqli_query($con,$sql);
			}
		}
		else{
			echo "Judul atau gambar atau caption belum terisi";
		}
	}

	$sql = "SELECT * FROM foto where id_user = ".$_SESSION['id']."";
	$result = mysqli_query($con, $sql);
	
	
	include_once("header.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
    <link rel="stylesheet" href="assets/fontawesome-free-6.2.0-web/css/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Produk</title>
</head>
<body>
    <div class="judulProduk">
        <H1>Produk</H1>
      </div>


<?php
    include_once("footer.php");

?>