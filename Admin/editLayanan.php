<?php
	session_start();
	include_once("commons/connection.php");
	
	$con = createConnection();
	if (!isset($_SESSION['id'])) {
        header("Location: loginAdmin.php");
    }
    function validation($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
	
	if(isset($_POST['editLayanan'])){
        $sql = "SELECT * FROM services where id = '".$_POST['id']."'";
	    $result = mysqli_query($con, $sql);
        $sqlGambar = "SELECT * FROM pictures where id_Parent_Services =".$_POST['id']."";
        $resultGambar = mysqli_query($con, $sqlGambar);
    }
    if(isset($_POST['cancel'])){
        header("Location: service.php");
    }

    if(isset($_POST['simpanLayanan'])){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = validation($_POST['id']);
            $deskripsi = validation($_POST['deskripsi']);
            $judul = validation($_POST['judul']);
            if(isset($_POST['idPath1Lama'])){
                $idPathLama1 = validation($_POST['idPath1Lama']);
                $pathLama1 = validation($_POST['path1Lama']);
            }else{
                $idPathLama1 = '';
                $pathLama1 = '';
            }
            
            if(isset($_POST['idPath2Lama'])){
                $idPathLama2 = validation($_POST['idPath2Lama2']);
                $pathLama2 = validation($_POST['path2Lama']);
            }else{
                $idPathLama2 = '';
                $pathLama2 = '';
            }
            $sql = "SELECT * FROM services where id = '".$id."'";
            $result = mysqli_query($con, $sql);
            $sqlGambar = "SELECT * FROM pictures where id_Parent_Services =".$id."";
            $resultGambar = mysqli_query($con, $sqlGambar);
            $target_dir = "../assets/img/";
            $uploadOk = 1;
            if($_FILES["gambar1"]["tmp_name"] != null){
                $path1 = $target_dir . basename($_FILES["gambar1"]["name"]);
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
                $path2 = $target_dir . basename($_FILES["gambar2"]["name"]);
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
            }
            if($_POST['deskripsi'] == null){
                $deskripsi = $_POST['deskripsiLama'];
            }

            if ($uploadOk == 0) {
                echo "Maaf File anda tidak dapat terupload";
            } else {
                // if($path1 == ''){
                //     $path1 = $pathLama1;
                // }else{
                //     if($path1 === $pathLama1 || $path1 === $pathLama2){
                //     }else{
                //         unlink($pathLama1);
                //     }
                // }
                // if($path2 == ''){
                //     $path2 = $pathLama2;
                // }else{
                //     if($pathLama2 !=''){
                //         if($path2 === $pathLama1 || $path2 === $pathLama2){
                //         }else{
                //             unlink($pathLama2);
                //         }
                //     }
                // }
                echo $path2;
                echo '2';
                if($path2 != ''){
                    if (move_uploaded_file($_FILES["gambar2"]["tmp_name"], $path2)) {
                    }else{
                      echo 'ini gak bisa masuk file karena null1';
                    }
                }
                if (move_uploaded_file($_FILES["gambar1"]["tmp_name"], $path1)) {
                }else{
                    echo 'ini gak bisa masuk file karena null2';
                    if($path1 == ''){
                        $path1 = $path2;
                        $path2 ='';
                    }
                    echo $path2;
            echo '3';
                
                }
                $sql = "UPDATE services SET judul = '".$judul."', deskripsi = '".$deskripsi."', path1 = '".$path1."', path2 = '".$path2."' WHERE id = ".$_POST['id']."";
                $hasil = mysqli_query($con,$sql);
                if($path1 != '' && $idPathLama1 != ''){
                    $sql = "UPDATE pictures SET path = '".$path1."' WHERE id = ".$idPathLama1."";
                    mysqli_query($con,$sql);
                }
                else if($path1 != '' && $idPathLama1 == ''){
                    $sql = "INSERT INTO pictures VALUES('','".$path1."','',".$_POST['id'].")";
                    mysqli_query($con,$sql);
                }
                
                if($path2 != '' ){
                    $count = mysqli_num_rows($resultGambar);
                    if($count == 1 || $count == 0){
                        $sql = "INSERT INTO pictures VALUES('','".$path2."','',".$_POST['id'].")";
                        mysqli_query($con,$sql);
                    }else if($count >1 && $idPathLama2 != ''){
                        $sql = "UPDATE pictures SET path = '".$path2."' WHERE id = ".$idPathLama2."";
                        mysqli_query($con,$sql);
                    }
                    
                }else{
                    if(isset($_POST['pathLama2'])){
                        echo $idPathLama2;
                        if (file_exists($pathLama2)) {
                            unlink($pathLama2);
                        }
                        $sql = "DELETE FROM pictures WHERE id = ".$idPathLama2."";
                        mysqli_query($con,$sql);
                    }
                }
                if($path1 == ''){
                    if(isset($_POST['pathLama1'])){
                        echo $idPathLama1;
                        if (file_exists($pathLama1)) {
                            unlink($pathLama1);
                        }
                        $sql = "DELETE FROM pictures WHERE id = ".$idPathLama1."";
                        mysqli_query($con,$sql);
                    }
                }
                header("Location: service.php");
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
    <title>Layanan</title>
    <script>
        function preview1() {
            frame1.src = URL.createObjectURL(event.target.files[0]);
        }
        function preview2() {
            frame2.src = URL.createObjectURL(event.target.files[0]);
        }
        function show(){
            document.getElementById("addEdit").style.display = 'block';
            document.getElementById("addEditTombol").style.display = 'none';
        }
    </script>
</head>
<body>
<div id="content"> 
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
            <input type="hidden" name="judulLama" id="judulLama" value="<?php echo $hasil['judul']; ?>">
            
            <input type="hidden" name="deskripsiLama" id="deskripsiLama" value="<?php echo $hasil['deskripsi']; ?>">
            <label for="judul" class="col-form-label">Judul:</label>
            <input type="text" class="form-control" name="judul" <?php echo 'value="'.$hasil['judul'].'"'; ?> id="judul">
            <label for="deskripsi" class="col-form-label">Deskripsi:</label>
            <textarea class="form-control" name="deskripsi" id="deskripsi"><?php echo ''.$hasil['deskripsi'].''; ?></textarea>
            
                  
                  
                
            <?php 
                $count =1;
                echo '<div class="tambahGambar"><p>';
                while($hasilGambar = mysqli_fetch_assoc($resultGambar)){
                    echo '<input type="hidden" name="path'.$count.'Lama" id="path'.$count.'Lama" value="'.$hasilGambar['path'].' ">';
                    echo '<input type="hidden" name="idPath'.$count.'Lama" id="idPath'.$count.'Lama" value="'.$hasilGambar['id'].' ">';
                    if($count == 1){
                        echo '<img id="frame1" width="500" height="300" src="'.$hasilGambar['path'].'" class="" alt="">';
                        echo '<label for="gambar1" class="col-form-label">Gambar:</label>';
                        echo '<input type="file" onchange="preview1()" name="gambar1" id="gambar1"></p>';
                    }
                    if($count>1){
                        echo '<p id="addEdit" style="display: block;"><img id="frame2" width="500" height="300" src="'.$hasilGambar['path'].'" class="" alt="">';
                        echo '<label for="gambar2" class="col-form-label">Gambar:</label>';
                        echo '<input type="file" onchange="preview2()" name="gambar2" id="gambar2">';
                        echo '<button type="button" id="hide" onclick="hide()" class="btn btn-danger" title="Delete file"><i class="fa-solid fa-minus"></i> Delete file</button> </p>';
                        echo '<p><button id="addEditTombol" style= "display:none;" class="btn btn-success" onclick="show()" type="button" title="Add new file"><i class="fa fa-plus"></i> Add New File</button></p>';
                    
                    }
                    if(mysqli_num_rows($resultGambar) == 1){
                        echo '<p id="addEdit" style="display: none;"><img id="frame2" width="500" height="300" src="aa" class="" alt="">';
                        echo '<label for="gambar2" class="col-form-label">Gambar:</label>';
                        echo '<input type="file" onchange="preview2()" name="gambar2" id="gambar2">';
                        echo '<button type="button" id="hide" onclick="hide()" class="btn btn-danger" title="Delete file"><i class="fa-solid fa-minus"></i> Delete file</button> </p>';
                        echo '<p><button id="addEditTombol"class="btn btn-success" onclick="show()" type="button" title="Add new file"><i class="fa fa-plus"></i> Add New File</button></p>';
                    }
                    $count++;
                }
                if(mysqli_num_rows($resultGambar) == 0){
                    echo '<img id="frame1" width="500" height="300" src="" class="" alt="">';
                    echo '<label for="gambar1" class="col-form-label">Gambar:</label>';
                    echo '<input type="file" onchange="preview1()" name="gambar1" id="gambar1"></p>';
                    echo '<p id="addEdit" style="display: none;"><img id="frame2" width="500" height="300" src="aa" class="" alt="">';
                    echo '<label for="gambar2" class="col-form-label">Gambar:</label>';
                    echo '<input type="file" onchange="preview2()" name="gambar2" id="gambar2">';
                    echo '<button type="button" id="hide" onclick="hide()" class="btn btn-danger" title="Delete file"><i class="fa-solid fa-minus"></i> Delete file</button> </p>';
                    echo '<p><button id="addEditTombol"class="btn btn-success" onclick="show()" type="button" title="Add new file"><i class="fa fa-plus"></i> Add New File</button></p>';
                }
                
                echo '</div>';
            ?>                    
            <?php 
                    
            ?>
            
            </div>
              
            
            
              
            
            <button type="submit" class="btn btn-secondary" name="cancel">Close</button>
            <button type="submit" class="btn btn-primary" name="simpanLayanan">Simpan</button>
        </form>  
    </div>
    </div>

<?php
    include_once("commons/footer.php");

?>