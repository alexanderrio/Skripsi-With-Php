<?php 
    include_once("commons/connection.php");
    $con = createConnection();

    function validation($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $nama = validation($_POST['nama']);
    $nohp = validation($_POST['nohp']);
    $pesan = validation($_POST['pesan']);
    date_default_timezone_set('Asia/Jakarta');
    $date = date('Y/m/d h:i:s a', time());
    echo $date;

    if(isset($_POST['submit'])){
        $sql = "insert into contacts values ('','".$nama."','".$pesan."','".$date."','".$nohp."')";
        mysqli_query($con,$sql);
    }
    header("location: kontak.php");

?>