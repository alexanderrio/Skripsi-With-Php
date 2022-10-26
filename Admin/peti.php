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
	include_once("../assets/small/addPeti.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="../styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
    <link rel="stylesheet" href="../assets/fontawesome-free-6.2.0-web/css/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Peti</title>
</head>
<body>
    <div class="judulProduk">
        <H1>Peti</H1>
	</div>


	<div class="container">
	
	<?php
		while ($hasil = mysqli_fetch_assoc($result)) {
	?>
			<div class="col-12 row" style="margin: 50px 0;"></div>
			<div class="col-12 row">
			<div class="col-4">
	<?php
			echo '<h4>'.$hasil['nama'].'</h4>';
			echo '<p>'.$hasil['bahan'].'</p>';
			echo '<p>'.$hasil['deskripsi'].'</p>';
	?>
			<form action="delete.php" class="hapusPeti" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" id="namaPeti" value="<?php echo $hasil['id']; ?>">
				<input type="hidden" name="path" id="path" value="<?php echo $hasil['path']; ?>">
				<button name="hapusPeti" type="submit" class="btn btn-danger">Delete</button>
        	</form>
			
			</div>
			<div class="col-6 offset-2">
	<?php
			echo '<img width="500" height="300" src="'.$hasil['path'].'" class="" alt=""></div></div>';
	?>

			<div class="col-12 row" style="margin: 50px 0; border-bottom: 2px solid black;"></div>
	<?php
		 }
	?>
	
	</div>


<?php
    include_once("commons/footer.php");

?>