<?php
	session_start();
	include_once("commons/connection.php");
	
	$con = createConnection();
	if (!isset($_SESSION['id'])) {
        header("Location: loginAdmin.php");
    }
	
	if(isset($_POST['editLayanan'])){
        $sql = "SELECT * FROM services where id = '".$_POST['id']."'";
	    $result = mysqli_query($con, $sql);
    }
    if(isset($_POST['cancel'])){
        header("Location: service.php");
    }

    if(isset($_POST['simpanLayanan'])){
        $sql = "SELECT * FROM services where id = '".$_POST['id']."'";
	    $result = mysqli_query($con, $sql);
        $target_dir = "../assets/img/";
        $uploadOk = 1;
        $path1 = $target_dir . basename($_FILES["gambar1"]["name"]);
        $path2 = $target_dir . basename($_FILES["gambar2"]["name"]);
        if($_FILES["gambar1"]["tmp_name"] != null){
            $fileType1 = strtolower(pathinfo($path1,PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["gambar1"]["tmp_name"]);
            if($check !== false) {
            $uploadOk = 1;
            if($fileType1 != "jpg" && $fileType1 != "png" && $fileType1 != "jpeg" && $fileType1 != "gif" ) {
                echo "Maaf tipe data gambar 1 tidak dapat diterima";
                $uploadOk = 0;
            }
            } else {
            echo "File is not an image.";
            $uploadOk = 0;
            }
        }else{
            $path1='';
        }
        if($_FILES["gambar2"]["tmp_name"] != null){
            $fileType2 = strtolower(pathinfo($path2,PATHINFO_EXTENSION));
            $check1 = getimagesize($_FILES["gambar2"]["tmp_name"]);
            if($check1 !== false) {
            $uploadOk = 1;
            if($fileType2 != "jpg" && $fileType2 != "png" && $fileType2 != "jpeg" && $fileType2 != "gif" ) {
                echo "Maaf tipe data gambar 2 tidak dapat diterima";
                $uploadOk = 0;
            }
            } else {
            echo "File is not an image.";
            $uploadOk = 0;
            }
        }else{
            $path2 ='';
        }

        if($_POST['judul'] == null){
            $judul = $_POST['judulLama'];
        }else{
            $judul = $_POST['judul'];
        }
        if($_POST['deskripsi'] == null){
            $deskripsi = $_POST['deskripsiLama'];
        }else{
            $deskripsi = $_POST['deskripsi'];
        }

        if ($uploadOk == 0) {
            echo "Maaf File anda tidak dapat terupload";
        } else {
            if($path1 == ''){
                $path1 = $_POST['path1Lama'];
            }else{
                unlink($_POST['path1Lama']);
            }
            if($path2 == ''){
                $path2 = $_POST['path2Lama'];
            }else{
                unlink($_POST['path2Lama']);
            }
            if (move_uploaded_file($_FILES["gambar2"]["tmp_name"], $path2)) {
            }else{
              echo 'ini gak bisa masuk file karena null1';
            }
            if (move_uploaded_file($_FILES["gambar1"]["tmp_name"], $path1)) {
            }else{
              echo 'ini gak bisa masuk file karena null2';
              $path1 = $path2;
              $path2 ='';
            }
            $sql = "UPDATE services SET judul = '".$judul."', deskripsi = '".$deskripsi."', path1 = '".$path1."', path2 = '".$path2."' WHERE id = ".$_POST['id']."";
            $hasil = mysqli_query($con,$sql);
            header("Location: service.php");
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
    <title>Layanan</title>
    <script>
        function preview1() {
            frame1.src = URL.createObjectURL(event.target.files[0]);
        }
        function preview2() {
            frame2.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
</head>
<body>
    <div class="judulProduk">
        <H1>Edit Layanan</H1>
	</div>

<?php 
    $hasil = mysqli_fetch_assoc($result);
?>
	<div class="container">
    <div class="" id="formulir" tabindex="-1">
        <form action="editLayanan.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" id="idLayanan" value="<?php echo $hasil['id']; ?>">
            <input type="hidden" name="path1Lama" id="path1Lama" value="<?php echo $hasil['path1']; ?>">
            <input type="hidden" name="judulLama" id="judulLama" value="<?php echo $hasil['judul']; ?>">
            <input type="hidden" name="path2Lama" id="path2Lama" value="<?php echo $hasil['path2']; ?>">
            <input type="hidden" name="deskripsiLama" id="deskripsiLama" value="<?php echo $hasil['deskripsi']; ?>">
            <label for="judul" class="col-form-label">Judul:</label>
            <input type="text" class="form-control" name="judul" <?php echo 'value="'.$hasil['judul'].'"'; ?> id="judul">
            <label for="deskripsi" class="col-form-label">Deskripsi:</label>
            <textarea class="form-control" name="deskripsi" id="deskripsi"><?php echo ''.$hasil['deskripsi'].''; ?></textarea>                    
            <?php 
                    echo '<img id="frame1" width="500" height="300" src="'.$hasil['path1'].'" class="" alt="">';
            ?>
            <label for="gambar1" class="col-form-label">Gambar1:</label>
            <input type="file" onchange="preview1()" name="gambar1" id="gambar1"><br>

            <?php
                    echo '<img id="frame2" width="500" height="300" src="'.$hasil['path2'].'" class="" alt="">';   
            ?>
            <label for="gambar2" class="col-form-label">Gambar2:</label>
            <input type="file" onchange="preview2()" name="gambar2" id="gambar2"><br>
            <button type="submit" class="btn btn-secondary" name="cancel">Close</button>
            <button type="submit" class="btn btn-primary" name="simpanLayanan">Simpan</button>
        </form>  
    </div>
    </div>

<?php
    include_once("commons/footer.php");

?>