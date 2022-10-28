<?php

include_once("commons/connection.php");
$con = createConnection();


// Check if image file is a actual image or fake image
if(isset($_POST["tambahPeti"])) {
  $target_dir = "../assets/img/";
  $uploadOk = 1;
  $path = $target_dir . basename($_FILES["gambar"]["name"]);
  
  $fileType = strtolower(pathinfo($path,PATHINFO_EXTENSION));
  $check = getimagesize($_FILES["gambar"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
    if (file_exists($path)) {
      echo "maaf gambar sudah ada";
      $uploadOk = 0;
    }
    if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif" ) {
      echo "Maaf tipe data gambar tidak dapat diterima";
      $uploadOk = 0;
    }
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }


  if ($uploadOk == 0) {
    echo "Maaf File anda tidak dapat terupload";
  } else {
    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $path)) {
      $sql = "INSERT INTO coffins VALUES('','".$_POST['namaPeti']."','".$_POST['bahanPeti']."','".$_POST['deskripsi']."','".$path."')";
      $hasil = mysqli_query($con,$sql);
    }
}
  header("location: peti.php");
}
if(isset($_POST["tambahLayanan"])) {
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
  
  if($_POST["judul"] == null || $_POST["deskripsi"] == null ){

  }else{
    if ($uploadOk == 0) {
      echo "Maaf File anda tidak dapat terupload";
    } else {
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
      $sql = "INSERT INTO services VALUES('','".$_POST['judul']."','".$_POST['deskripsi']."','".$path1."','".$path2."')";
      $hasil = mysqli_query($con,$sql);
  }
  

  }
  header("location: service.php");


}
?>


