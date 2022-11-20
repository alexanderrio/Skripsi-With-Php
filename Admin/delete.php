<?php
    
    include_once("commons/connection.php");
    $con = createConnection();

    
    function validation($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $id = validation($_POST['id']);

    if(isset($_POST["hapusPeti"])) {
        $sql = "DELETE FROM coffins WHERE id = ".$id."";
        $hasil = mysqli_query($con,$sql);
        if (file_exists($_POST['pathLama'])) {
            unlink($_POST['pathLama']);
            $sql = "DELETE FROM pictures WHERE id = ".$_POST['idPathLama']."";
            mysqli_query($con,$sql);
        }
        
        header("location: peti.php");
    }

    if(isset($_POST["hapusLayanan"])) {
        $sql = "DELETE FROM services WHERE id = ".$id."";
        $hasil = mysqli_query($con,$sql);
        for($i=1;$i<=2;$i++){
            if(isset($_POST['pathLama'.$i.''])){
                echo $_POST['idPathLama'.$i.''];
                if (file_exists($_POST['pathLama'.$i.''])) {
                    unlink($_POST['pathLama'.$i.'']);
                }
                $sql = "DELETE FROM pictures WHERE id = ".$_POST['idPathLama'.$i.'']."";
                mysqli_query($con,$sql);
            }
            
        }

        
        
       header("location: service.php");
    }

    if(isset($_POST["hapusFaq"])) {
        $sql = "DELETE FROM faq WHERE id = ".$id."";
        $hasil = mysqli_query($con,$sql);
        
        header("location: faq.php");
    }
?>