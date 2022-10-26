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


?>