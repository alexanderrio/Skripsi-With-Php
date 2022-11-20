<?php

include_once("commons/connection.php");
$con = createConnection();

function validation($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// Check if image file is a actual image or fake image
if(isset($_POST["tambahPeti"])) {
  $dir_admin = "../assets/img/";
  
  $uploadOk = 1;
  $path = $dir_admin . basename($_FILES["gambar"]["name"]);
  
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

  if($_POST['bahanPeti'] == null){
    $bahanPeti = '';
  }else{
    $bahanPeti = validation($_POST['bahanPeti']);
  }
  if($_POST['deskripsi'] == null){
    $deskripsi = '';
  }else{
    $deskripsi = validation($_POST['deskripsi']);
  }
  if($_POST['namaPeti'] == null){
    $namaPeti = '';
  }else{
    $namaPeti = validation($_POST['namaPeti']);
  }

  if ($uploadOk == 0) {
    echo "Maaf File anda tidak dapat terupload";
  } else {
    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $path)) {
    }
    $sql = "INSERT INTO coffins VALUES('','".$namaPeti."','".$bahanPeti."','".$deskripsi."','')";
    $hasil = mysqli_query($con,$sql);
      if($hasil){
        $sql = "SELECT * FROM coffins ORDER BY id desc LIMIT 1";
	      $result = mysqli_query($con, $sql);
        $hasil = mysqli_fetch_row($result);
        $idParent = (int)$hasil[0];
        $sql1 = "INSERT INTO pictures VALUES('','".$path."',".$idParent.",'')";
        mysqli_query($con,$sql1);
      }
}
  mysqli_close($con); 
  header("location: peti.php");
}
if(isset($_POST["tambahLayanan"])) {
  $dir_admin = "../assets/img/";
  $uploadOk = 1;
  if($_FILES["gambar1"]["tmp_name"] != null){
    $path1 = $dir_admin . basename($_FILES["gambar1"]["name"]);
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
      $path2 = $dir_admin . basename($_FILES["gambar2"]["name"]);
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
      $judul = '';
    }else{
      $judul = validation($_POST['judul']);
    }
    if($_POST['deskripsi'] == null){
      $deskripsi = '';
    }else{
      $deskripsi = validation($_POST['deskripsi']);
    }
  
  
  if($_POST["judul"] == null || $_POST["deskripsi"] == null ){

  }else{
    if ($uploadOk == 0) {
      echo "Maaf File anda tidak dapat terupload";
    } else {
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
      }
      $sql = "INSERT INTO services VALUES('','".$judul."','".$deskripsi."','','')";
      if(mysqli_query($con,$sql)){
        $sql = "SELECT * FROM services ORDER BY id desc LIMIT 1";
	      $result = mysqli_query($con, $sql);
        $hasil = mysqli_fetch_row($result);
        if($path1 !=''){
          $sql = "INSERT INTO pictures VALUES('','".$path1."','',".$hasil[0].")";
          mysqli_query($con,$sql);
        }
        
        if($path2 != ''){
          $sql = "INSERT INTO pictures VALUES('','".$path2."','',".$hasil[0].")";
          mysqli_query($con,$sql);
        }
        
        
      }
  }
  

  }
  mysqli_close($con); 
  header("location: service.php");
}

if(isset($_POST["tambahFaq"])) {
  if($_POST['pertanyaan'] == null){
    $pertanyaan = '';
  }else{
    $pertanyaan = validation($_POST['pertanyaan']);
  }
  if($_POST['jawaban'] == null){
    $jawaban = '';
  }else{
    $jawaban = validation($_POST['jawaban']);
  }
  $sql = "INSERT INTO faq VALUES('','".$pertanyaan."','".$jawaban."')";
  $hasil = mysqli_query($con,$sql);

  mysqli_close($con); 
  header("location: faq.php");

}

?>


