<?php
	session_start();
	include_once("commons/connection.php");
	
	$con = createConnection();
	if (!isset($_SESSION['id'])) {
  header("Location: loginAdmin.php");
 }
	
	

	$sql = "SELECT * FROM contacts";
	$result = mysqli_query($con, $sql);
	
	
	
	include_once("commons/header.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link href="../styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/fontawesome-free-6.2.0-web/css/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
<div id="content"> 
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
        $('#example').DataTable();
        });
    </script>
    <div class="judulProduk">
            <H1>Kontak</H1>
    </div>
    <div class="container">
        <table id="example" class="table table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Nohp</th>
                    <th>Tanggal_Kirim</th>
                    <th>Pesan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($hasil = mysqli_fetch_assoc($result)){
                        echo '<tr>';
                        echo '<td>'.$hasil['nama'].'</td>';
                        echo '<td>'.$hasil['nohp'].'</td>';
                        echo '<td>'.$hasil['tanggal_kirim'].'</td>';
                        echo '<td>'.$hasil['pesan'].'</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>

        <footer style="background-color: #deded5;">
        <div class="container p-4">
            <div class="row">
            <div class="col-lg-6 col-md-12 mb-4">
                <h5 class="mb-3" style="letter-spacing: 2px; color: #818963;">Lokasi</h5>
                <p>
                Jl. Pandean Lamper III No.6, Peterongan, Kec. Semarang Sel., Kota Semarang, Jawa Tengah 50242
                </p>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="mb-3" style="letter-spacing: 2px; color: #818963;">Kontak Kami</h5>
                <ul class="list-unstyled mb-0">
                <li class="mb-1">
                    (024)8313468
                </li>
                <li class="mb-1">
                    (024)8412206
                </li>
                <li class="mb-1">
                    <a href="https://api.whatsapp.com/send?phone=62811271723" style="color: #4f4f4f;">0811271723</a>
                </li>
                <li>
                    <a href="https://api.whatsapp.com/send?phone=628122878169" style="color: #4f4f4f;">08122878169</a>
                </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="mb-1" style="letter-spacing: 2px; color: #818963;">Kantor Buka</h5>
                <table class="table" style="color: #4f4f4f; border-color: #666;">
                <tbody>
                    <tr>
                    <td>Senin - Jumat:</td>
                    <td>08:00 - 16:00</td>
                    </tr>
                    <tr>
                    <td>Sabtu:</td>
                    <td>08:00 - 13:00</td>
                    </tr>
                </tbody>
                </table>
            </div>
            </div>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright:
            <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
        </footer>
</body>
</html>