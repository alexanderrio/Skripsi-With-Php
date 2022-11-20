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
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/fontawesome-free-6.2.0-web/css/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Peti</title>
</head>
<body>
<div id="content"> 
    <div class="judulProduk">
        <H1>Peti</H1>
	</div>


	<div class="container">
	
	<?php
		$i=0;
		while ($hasil = mysqli_fetch_assoc($result)) {
	?>
			<div class="col-12 row" style="margin: 50px 0;"></div>
			<div class="col-12 row">
			<div class="col-4">
	<?php
			echo '<h4>'.$hasil['nama'].'</h4>';
			echo '<p>'.$hasil['bahan'].'</p>';
			echo '<p>'.$hasil['deskripsi'].'</p>';
			$sqlGambar = "SELECT * FROM pictures where id_Parent_Coffins =".$hasil['id']."";
			$resultGambar = mysqli_query($con, $sqlGambar);
			$hasilGambar = mysqli_fetch_assoc($resultGambar);
	?>
				<button type="button" data-toggle="modal" class="btn btn-danger" data-target="#detailHapus<?php echo $i;?>">Delete</button>
				<div class="modal fade" id="detailHapus<?php echo $i;?>" tabindex="-1">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Anda Yakin ingin menghapus Data ini</h5>
								<button type="button" class="close" data-dismiss="modal">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="">
								<form action="delete.php" method="post" enctype="multipart/form-data">
								<input type="hidden" name="id" id="idPeti" value="<?php echo $hasil['id']; ?>">
								<input type="hidden" name="pathLama" id="pathLama" value="<?php echo $hasilGambar['path']; ?>">
								<input type="hidden" name="idPathLama" id="pathLama" value="<?php echo $hasilGambar['id']; ?>">
									<div class="">
										<label for="namaPeti" class="col-form-label">Nama Peti:</label>
										<input type="text" class="form-control" name="namaPeti" id="namaPeti" readonly value="<?php echo $hasil['nama']; ?>">
									</div>
									<div class="">
										<label for="bahan" class="col-form-label">Bahan Peti:</label>
										<textarea class="form-control" name="bahanPeti" id="bahan" readonly><?php echo $hasil['bahan'];?></textarea>
									</div>
									<div class="">
										<label for="deskripsi" class="col-form-label">Deskripsi:</label>
										<textarea class="form-control" name="deskripsi" id="deskripsi" readonly><?php echo $hasil['deskripsi']; ?></textarea>
									</div>
										<img src=" <?php echo $hasilGambar['path']; ?>" width="100%" height="300" alt="">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-danger" name="hapusPeti">Hapus</button>
								</form>  
							</div>
						</div>
					</div>
				</div>
			<form action="editPeti.php" class="editPeti" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" id="idPeti" value="<?php echo $hasil['id']; ?>">
				<input type="hidden" name="idPathLama" id="pathLama" value="<?php echo $hasilGambar['id']; ?>">
				<button name="editPeti" type="submit" class="btn btn-success">Edit</button>
        	</form>
			</div>
			<div class="col-6 offset-2">
	<?php
			echo '<img width="500" height="300" src="'.$hasilGambar['path'].'" class="" alt=""></div></div>';
	?>

			<div class="col-12 row" style="margin: 50px 0; border-bottom: 2px solid black;"></div>
	<?php
		$i++;
		}
	?>
	
	</div>


<?php
    include_once("commons/footer.php");

?>