<?php
	session_start();
	include_once("commons/connection.php");
    function validation($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
	
	$con = createConnection();
	if (!isset($_SESSION['id'])) {
        header("Location: loginAdmin.php");
    }
	
    if(isset($_POST['editPeti'])){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = validation($_POST['id']);
            $idPathLama = validation($_POST['idPathLama']);
            $sql = "SELECT * FROM coffins where id = '".$id."'";
            $result = mysqli_query($con, $sql);
            $sqlGambar = "SELECT * FROM pictures where id =".$idPathLama."";
            $resultGambar = mysqli_query($con, $sqlGambar);
        }
    }
    if(isset($_POST['cancel'])){
        header("Location: peti.php");
    }

    if(isset($_POST['simpanPeti'])){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = validation($_POST['id']);
            $deskripsi = validation($_POST['deskripsi']);
            $bahanPeti = validation($_POST['bahanPeti']);
            $namaPeti = validation($_POST['namaPeti']);
            $idPathLama = validation($_POST['idPathLama']);
            $sql = "SELECT * FROM coffins where id = '".$id."'";
            $result = mysqli_query($con, $sql);
            $sqlGambar = "SELECT * FROM pictures where id =".$idPathLama."";
            $resultGambar = mysqli_query($con, $sqlGambar);
            $target_dir = "../assets/img/";
            $uploadOk = 1;
            if($_FILES["gambar"]["tmp_name"] != null){
                $path = $target_dir . basename($_FILES["gambar"]["name"]);
                $tipeFIle = strtolower(pathinfo($path,PATHINFO_EXTENSION));
                $check = getimagesize($_FILES["gambar"]["tmp_name"]);
                if($check !== false) {
                    $uploadOk = 1;
                    if($tipeFIle != "jpg" && $tipeFIle != "png" && $tipeFIle != "jpeg" && $tipeFIle != "gif" ) {
                        echo "Maaf tipe data gambar tidak dapat diterima";
                        $uploadOk = 0;
                    }
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }else{
                $path='';
            }

            if($bahanPeti == null){
                $bahanPeti = '';
            }
            if($deskripsi == null){
                $deskripsi = '';
            }

            if ($uploadOk == 0) {
                echo "Maaf File anda tidak dapat terupload";
            } else {
                if($path == ''){
                    $path = $_POST['pathLama'];
                }else{
                    unlink($_POST['pathLama']);
                }
                if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $path)) {
                }
                $sql = "UPDATE coffins SET nama = '".$namaPeti."', bahan = '".$bahanPeti."', deskripsi = '".$deskripsi."' WHERE id = ".$id."";
                $hasil = mysqli_query($con,$sql);
                $sql = "UPDATE pictures SET path = '".$path."' WHERE id = ".$idPathLama."";
                $hasil = mysqli_query($con,$sql);
                header("Location: peti.php");
        }
        
    }
    
}
	
	
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
    <title>Peti</title>
    <script>
        function preview() {
            frame.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
</head>
<body>
<div id="content"> 
    <div class="judulProduk">
        <H1>Edit Peti</H1>
	</div>

<?php 
    $hasil = mysqli_fetch_assoc($result);
    $hasilGambar = mysqli_fetch_assoc($resultGambar);
?>
	<div class="container">
    <div class="" id="formulir" tabindex="-1">
        <form action="editPeti.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" id="idPeti" value="<?php echo $hasil['id']; ?>">
            <input type="hidden" name="idPathLama" id="pathLama" value="<?php echo $hasilGambar['id']; ?>">
            <input type="hidden" name="pathLama" id="pathLama" value="<?php echo $hasilGambar['path']; ?>">
            <label for="namaPeti" class="col-form-label">Nama Peti:</label>
            <input type="text" class="form-control" name="namaPeti" <?php echo 'value="'.$hasil['nama'].'"'; ?> id="namaPeti">
            <label for="bahan" class="col-form-label">Bahan Peti:</label>
            <textarea class="form-control" name="bahanPeti" id="bahan"><?php echo ''.$hasil['bahan'].''; ?></textarea>
            <label for="deskripsi" class="col-form-label">Deskripsi:</label>
            <textarea class="form-control" name="deskripsi" id="deskripsi"><?php echo ''.$hasil['deskripsi'].''; ?></textarea>                    
            <?php echo '<img id="frame" width="500" height="300" src="'.$hasilGambar['path'].'" class="" alt="">'; ?>
            <label for="gambar" class="col-form-label">Gambar:</label>
            <input type="file" onchange="preview()" name="gambar" id="gambar"><br>
            <button type="submit" class="btn btn-secondary" name="cancel">Close</button>
            <button type="submit" class="btn btn-primary" name="simpanPeti">Simpan</button>
        </form>  
    </div>
    </div>

<?php
    include_once("commons/footer.php");

?>