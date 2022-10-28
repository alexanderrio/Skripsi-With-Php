<?php
	session_start();
	include_once("commons/connection.php");
	
	$con = createConnection();
	if (!isset($_SESSION['id'])) {
  header("Location: loginAdmin.php");
 }
	
	

	$sql = "SELECT * FROM services";
	$result = mysqli_query($con, $sql);
	
	
	include_once("commons/header.php");
	include_once("../assets/small/addLayanan.php");
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="../styles.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        
        <link rel="stylesheet" href="../assets/fontawesome-free-6.2.0-web/css/all.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Layanan</title>
    </head>
    <body>
        <div class="judulProduk">
          <H1>Layanan</H1>
        </div>
        <table class="table table-striped tabelProd" style="width: 58%;">
            <tbody>
        <?php
          while ($hasil = mysqli_fetch_assoc($result)) {
        ?>
            <div class="col-12 row" style="margin: 50px 0;"></div>
            <div class="col-12 row">
            <div class="col-4">
        <?php
            echo '<tr><td><P><strong>'.$hasil['judul'].'</strong><br>';
            echo ''.$hasil['deskripsi'].'</p>';
            if($hasil['path1'] != ''){
              echo '<td style="width:60%"><img alt="" src="'.$hasil['path1'].'" style="height:200px; width:300px">&nbsp;';
            }
            if($hasil['path2'] != ''){
              echo '<img alt="" src="'.$hasil['path2'].'" style="height:200px; width:300px">';
            }
            echo '</td></tr>';
          }
        ?>
            <!-- <form action="delete.php" class="hapusPeti" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" id="namaPeti" value="<?php echo $hasil['id']; ?>">
              <input type="hidden" name="path" id="path" value="<?php echo $hasil['path']; ?>">
              <button name="hapusPeti" type="submit" class="btn btn-danger">Delete</button>
                </form> -->
            
                </tbody>
          </table>
          <table class="table table-striped tabelProd" style="width: 58%;">
            <tbody>
              <tr>
                <td>
                  <P><strong>Ambulan Antar dan Jemput Jenasah</strong><br>
                    Ambulan Arimatea dapat menjemput dan mengantar jenasah, dalam dan luar kota seputar Jawa Tengah
                  </P>
                </td>
                <td rowspan="2" style="width:60%"><img alt="" src="assets/img/ambulanArimatea.jpeg" style="height:200px; width:300px"></td>
              </tr>
              <tr>
                <td>
                  <P><strong>Pengiriman Jenasah dalam dan Luar Negeri</strong><br>
                    Arimatea dapat membantu anda memesan kargo pesawat untuk mengantar jenasah ke luar pulau atau luar negeri
                  </P>
                </td>
              </tr>
              <tr>
                <td>
                  <p><strong>Dekor</strong><br>Arimatea secara profesional dapat melakukan dekor terhadap rumah tempat persinggahan terakhir jenasah</p>
                </td>
                <td><img alt="" src="" style="height:200px; width:300px"></td>
              </tr>
              <tr>
                <td>
                  <p><strong>Krematorium</strong><br>
                    Arimatea bekerjasama dengan krematorium _________, sehingga Arimatea dapat dengan mudah membantu anda memesan ruang kremasi apabila membutuhkan.
                  </p>
                </td>
                <td><img alt="" src="" style="height:200px; width:300px"></td>
              </tr>
              <tr>
                <td>
                  <p><strong>Akte Kematian</strong><br>
                    Arimatea dapat membantu anda mengurus Akte Kematian, untuk mempermudah keluarga yang sedang berduka dalam mengurus Akte Kematian.
                  </p>
                </td>
                <td><img alt="" src="" style="height:200px; width:300px"></td>
              </tr>
              <tr>
                <td>
                  <p><strong>Larung</strong><br>
                    Apabila keluarga duka ingin melarung abu jenasah maka Arimatea siap membantu melarungkan abu jenasah secara profesional.
                  </p>
                </td>
                <td><img alt="" src="" style="height:200px; width:300px">&nbsp;<img alt="" src="" style="height:200px; width:300px"></td>
              </tr>
              <tr>
                <td>
                  <p><strong>Funeral Organizer</strong><br>
                    Arimatea menyediakan layanan untuk mendukung jalannya prosesi pemakaman atau kremasi dari awal hingga akhir.
                  </p>
                  <ul>
                    <li>MC</li>
                    <li>Music</li>
                    <li>Multimedia</li>
                    <li>Sound</li>
                    <li>Worship Support</li>
                    <li>Photographer</li>
                    <li>Food Service</li>
                  </ul>
                </td>
                <td><img alt="" src="" style="height:200px; width:300px">&nbsp;<img alt="" src="" style="height:200px; width:300px"></td>
              </tr>
              <tr>
                <td>
                  <p><strong>Taman Pemakaman</strong><br>
                    Arimatea menyediakan tempat peristirahatan penuh damai. Lokasi strategis di perbukitan Kedungmundu dengan pemandangan menghadapt laut.
                  </p>
                </td>
                <td><img alt="" src="" style="height:200px; width:300px">&nbsp;<img alt="" src="" style="height:200px; width:300px"></td>
              </tr>
            </tbody>
          </table>



<?php
    include_once("commons/footer.php");

?>