<?php
	session_start();
	include_once("commons/connection.php");
	
	$con = createConnection();
	if (!isset($_SESSION['id'])) {
  header("Location: loginAdmin.php");
 }
	
	

	$sql = "SELECT * FROM faq";
	$result = mysqli_query($con, $sql);
	
	
	
	include_once("commons/header.php");
	include_once("../assets/small/addFaq.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
    <link href="../styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/fontawesome-free-6.2.0-web/css/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
</head>
<body>
<div id="content"> 
    <script>
        $(document).ready(function () {
        $('#tabel').DataTable();
        });
    </script>
    <div class="judulProduk">
            <H1>FaQ</H1>
    </div>
    <div class="container">
        <table id="tabel" class="table table-striped">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i=1;
                    while($hasil = mysqli_fetch_assoc($result)){
                        echo '<tr>';
                        echo '<td>'.$hasil['pertanyaan'].'</td>';
                        echo '<td>'.$hasil['jawaban'].'</td>';
                ?>
                <td>
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
                                    <input type="hidden" name="id" id="idFaq" value="<?php echo $hasil['id']; ?>">
                                        <div class="">
                                            <label for="pertanyaan" class="col-form-label">Pertanyaan:</label>
                                            <input type="text" class="form-control" name="pertanyaan" id="pertanyaan" readonly value="<?php echo $hasil['pertanyaan']; ?>">
                                        </div>
                                        <div class="">
                                            <label for="jawaban" class="col-form-label">Jawaban:</label>
                                            <textarea class="form-control" name="jawaban" id="jawaban" readonly><?php echo $hasil['jawaban'];?></textarea>
                                        </div>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="hapusFaq">Hapus</button>
                                    </form>  
                                </div>
                            </div>
                        </div>
                    </div>        
                </td>
                <?php
                        echo '</tr>';
                        $i++;
                    }
                ?>
            </tbody>
        </table>
    </div>

    <?php
    include_once("commons/footer.php");

?>