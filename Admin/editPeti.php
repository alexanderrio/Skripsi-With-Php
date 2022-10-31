<?php
	session_start();
	include_once("commons/connection.php");
	
	$con = createConnection();
	if (!isset($_SESSION['id'])) {
        header("Location: loginAdmin.php");
    }
	
	if(isset($_POST['editPeti'])){
        $sql = "SELECT * FROM coffins where id = '".$_POST['id']."'";
	    $result = mysqli_query($con, $sql);
    }
    if(isset($_POST['cancel'])){
        header("Location: peti.php");
    }

    if(isset($_POST['simpanPeti'])){
        $sql = "SELECT * FROM coffins where id = '".$_POST['id']."'";
	    $result = mysqli_query($con, $sql);
        $target_dir = "../assets/img/";
        $uploadOk = 1;
        $path = $target_dir . basename($_FILES["gambar"]["name"]);
        if($_FILES["gambar"]["tmp_name"] != null){
            $fileType = strtolower(pathinfo($path,PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["gambar"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
                if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif" ) {
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

        if($_POST['bahanPeti'] == null){
            $bahanPeti = '';
        }else{
            $bahanPeti = $_POST['bahanPeti'];
        }
        if($_POST['deskripsi'] == null){
            $deskripsi = '';
        }else{
            $deskripsi = $_POST['deskripsi'];
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
            $sql = "UPDATE coffins SET nama = '".$_POST['namaPeti']."', bahan = '".$bahanPeti."', deskripsi = '".$deskripsi."', path = '".$path."' WHERE id = ".$_POST['id']."";
            $hasil = mysqli_query($con,$sql);
            header("Location: peti.php");
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
    <div class="judulProduk">
        <H1>Edit Peti</H1>
	</div>

<?php 
    $hasil = mysqli_fetch_assoc($result);
?>
	<div class="container">
    <div class="" id="formulir" tabindex="-1">
        <form action="editPeti.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" id="idPeti" value="<?php echo $hasil['id']; ?>">
            <input type="hidden" name="pathLama" id="pathLama" value="<?php echo $hasil['path']; ?>">
            <label for="namaPeti" class="col-form-label">Nama Peti:</label>
            <input type="text" class="form-control" name="namaPeti" <?php echo 'value="'.$hasil['nama'].'"'; ?> id="namaPeti">
            <label for="bahan" class="col-form-label">Bahan Peti:</label>
            <textarea class="form-control" name="bahanPeti" id="bahan"><?php echo ''.$hasil['bahan'].''; ?></textarea>
            <label for="deskripsi" class="col-form-label">Deskripsi:</label>
            <textarea class="form-control" name="deskripsi" id="deskripsi"><?php echo ''.$hasil['deskripsi'].''; ?></textarea>                    
            <?php echo '<img id="frame" width="500" height="300" src="'.$hasil['path'].'" class="" alt="">'; ?>
            <label for="gambar" class="col-form-label">Gambar:</label>
            <input type="file" onchange="preview()" name="gambar" id="gambar">
            <button type="submit" class="btn btn-secondary" name="cancel">Close</button>
            <button type="submit" class="btn btn-primary" name="simpanPeti">Simpan</button>
        </form>  
    </div>
    </div>

<?php
    include_once("commons/footer.php");

?>