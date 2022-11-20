<?php
	session_start();
	include_once("commons/connection.php");
	
	$con = createConnection();
	

	$sql = "SELECT * FROM coffins";
	$result = mysqli_query($con, $sql);
	
	
	include_once("commons/header.php");
	include_once("assets/small/whatsapp.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
    <link rel="stylesheet" href="assets/fontawesome-free-6.2.0-web/css/all.css">
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
                $path = substr($hasilGambar['path'],3,strlen($hasilGambar['path']));
        ?>
                </div>
                <div class="col-6 offset-2">
        <?php
                echo '<img width="500" height="300" src="'.$path.'" class="" alt=""></div></div>';
        ?>

                <div class="col-12 row" style="margin: 50px 0; border-bottom: 2px solid black;"></div>
        <?php
            }
        ?>

      </div>

      
      <?php
    include_once("commons/footer.php");

?>