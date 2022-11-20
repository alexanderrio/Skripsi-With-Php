<?php
	session_start();
	include_once("commons/connection.php");
	
	$con = createConnection();
	

	$sql = "SELECT * FROM services";
	$result = mysqli_query($con, $sql);
	
	
	include_once("commons/header.php");
	include_once("assets/small/whatsapp.php");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        
        <link rel="stylesheet" href="assets/fontawesome-free-6.2.0-web/css/all.css">
        <link href="styles.css" rel="stylesheet" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Layanan</title>
    </head>
    <body>
      <div id="content"> 
          <div class="judulProduk">
            <H1>Layanan</H1>
          </div>
          <table class="table table-striped tabelProd" id="" style="width:75%;">
            <tbody>
            <?php
            while ($hasil = mysqli_fetch_assoc($result)) {
            ?>
            <?php
                echo '<tr><td><P><strong>'.$hasil['judul'].'</strong><br>';
                echo ''.$hasil['deskripsi'].'</p>';
                $sqlGambar = "SELECT * FROM pictures where id_Parent_Services =".$hasil['id']."";
                $resultGambar = mysqli_query($con, $sqlGambar);
                $count = mysqli_num_rows($resultGambar);
                if($count>=1){
                  echo '<td style="width:70%">';
                  while($hasilGambar = mysqli_fetch_assoc($resultGambar)){
                    $path = substr($hasilGambar['path'],3,strlen($hasilGambar['path']));
                    echo '<img alt="" src="'.$path.'" style="height:200px; width:300px">&nbsp;';
                  }
                  echo '</td>';
                }
                
                echo '</td>';
            ?>
            <?php
                echo '</tr>';
            }
            ?>
            
            
            </tbody>
        </table>
        
          <?php
    include_once("commons/footer.php");

?>