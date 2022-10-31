<?php
    
    include_once("commons/connection.php");
    $con = createConnection();

    $id = $_POST['id'];

    if(isset($_POST["hapusPeti"])) {
        $sql = "DELETE FROM coffins WHERE id = ".$id."";
        $hasil = mysqli_query($con,$sql);
        if (file_exists($_POST['path'])) {
            unlink($_POST['path']);
        }
        header("location: peti.php");
    }

    if(isset($_POST["hapusLayanan"])) {
        $sql = "DELETE FROM services WHERE id = ".$id."";
        $hasil = mysqli_query($con,$sql);
        if(isset($_POST['path1'])){
            if (file_exists($_POST['path1'])) {
                unlink($_POST['path1']);
            }
        }

        if(isset($_POST['path2'])){
            if (file_exists($_POST['path2'])) {
                unlink($_POST['path2']);
            }
        }
        
        header("location: service.php");
    }
?>