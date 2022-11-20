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
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/fontawesome-free-6.2.0-web/css/all.css">
        <link href="../styles.css" rel="stylesheet" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Layanan</title>
    </head>
    <body>
    <div id="content"> 
        <div class="judulProduk">
          <H1>Layanan</H1>
        </div>
        <table class="tabelProd table table-striped" id="" style="width:70%;">
            <tbody>
        <?php
          $i=1;
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
                echo '<img alt="" src="'.$hasilGambar['path'].'" style="height:200px; width:300px">&nbsp;';
              }
              echo '</td>';
            }
            
            
         ?>
            <td>
                <button type="button" data-toggle="modal" class="btn btn-danger" data-target="#detailHapus<?php echo $i;?>">Delete</button>
                <div class="modal fade" id="detailHapus<?php echo $i;?>" tabindex="-1">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Anda Yakin ingin menghapus Data ini</h5>
                        <button type="button" class="close" data-dismiss="modal">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="">
                        <form action="delete.php" method="post" enctype="multipart/form-data">
                          <div class="">
                            <label for="judul" class="col-form-label">Judul:</label>
                            <input type="text" class="form-control" name="judul" id="judul" readonly value="<?php echo $hasil['judul']; ?>">
                          </div>
                          <div class="">
                            <label for="deskripsi" class="col-form-label">Deskripsi:</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" readonly><?php echo $hasil['deskripsi'];?></textarea>
                          </div>
                          <?php
                              $sqlGambar = "SELECT * FROM pictures where id_Parent_Services =".$hasil['id']."";
                              $resultGambar = mysqli_query($con, $sqlGambar);
                              while($hasilGambar = mysqli_fetch_assoc($resultGambar)){
                                echo '<img alt="" src="'.$hasilGambar['path'].'" style="height:300px; width:100%">';
                              }
                            
                          ?>
                          <input type="hidden" name="id" id="idLayanan" value="<?php echo $hasil['id']; ?>">
                          <?php 
                            $sqlGambar = "SELECT * FROM pictures where id_Parent_Services =".$hasil['id']."";
                            $resultGambar = mysqli_query($con, $sqlGambar);
                            $j =1;
                            if($resultGambar != null){
                              while($hasilGambar = mysqli_fetch_assoc($resultGambar)){
                                echo '<input type="hidden" name="idPathLama'.$j.'" id="path" value="'.$hasilGambar['id'].'">';
                                echo '<input type="hidden" name="pathLama'.$j.'" id="path" value="'.$hasilGambar['path'].'">';
                                $j++;
                              }
                            }
                          ?>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-danger" name="hapusLayanan">Hapus</button>
                        </form>  
                      </div>
                    </div>
                  </div>
                </div>

                <form action="editLayanan.php" class="editPeti" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="id" id="idPeti" value="<?php echo $hasil['id']; ?>">
                  <?php 
                    $sqlGambar = "SELECT * FROM pictures where id_Parent_Services =".$hasil['id']."";
                    $resultGambar = mysqli_query($con, $sqlGambar);
                    $count =1;
                    if($resultGambar != null){
                      while($hasil1 = mysqli_fetch_assoc($resultGambar)){
                        echo '<input type="hidden" name="idpathLama'.$count.'" id="path" value="'.$hasil1['id'].'">';
                        echo '<input type="hidden" name="pathLama'.$count.'" id="path" value="'.$hasil1['path'].'">';
                        $count++;
                      }
                    }
                  ?>
                  <button name="editLayanan" type="submit" class="btn btn-success">Edit</button>
                </form>
              </td>
        <?php
            $i++;
            echo '</tr>';
            
          }
        ?>
            
            
                </tbody>
          </table>
          <table class="table table-striped tabelProd" style="width: 70%;">
            <tbody>
              <tr>
                <td>
                  <P><strong>Ambulan Antar dan Jemput Jenasah</strong><br>
                    Ambulan Arimatea dapat menjemput dan mengantar jenasah, dalam dan luar kota seputar Jawa Tengah
                  </P>
                </td>
                <td rowspan="2" style="width:60%"><img alt="" src="assets/img/ambulanArimatea.jpeg" style="height:200px; width:300px"></td>
                <td>test</td>
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