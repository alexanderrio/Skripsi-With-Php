<?php

include_once("commons/connection.php");
$con = createConnection();
$target_dir = "../assets/img/";
$uploadOk = 1;

// Check if image file is a actual image or fake image
if(isset($_POST["tambahPeti"])) {
  $path = $target_dir . basename($_FILES["gambar"]["name"]);
  
  $fileType = strtolower(pathinfo($path,PATHINFO_EXTENSION));
  $check = getimagesize($_FILES["gambar"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
    if (file_exists($path)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}



if ($uploadOk == 0) {
  echo "Maaf File anda tidak dapat terupload";
} else {
  if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $path)) {
    $sql = "INSERT INTO coffins VALUES('','".$_POST['namaPeti']."','".$_POST['bahanPeti']."','".$_POST['deskripsi']."','".$path."')";
		$hasil = mysqli_query($con,$sql);
    echo '<script>alert("The file '. htmlspecialchars( basename( $_FILES["gambar"]["name"])). ' has been uploaded.")</script>';
    
		
  } else {
    echo '<script>alert("Sorry, there was an error uploading your file.")</script>';
  }
}
header("location: peti.php");
?>
