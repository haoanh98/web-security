<?php
  $target_dir = './uploaded/';
  $target_file = $target_dir . basename($_FILES["imgss"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  if ($uploadOk == 0) {
    echo '<script>';
    echo 'alert("Sorry, your file was not uploaded.")';
    echo '</script>';
  } 
  else {
    if (move_uploaded_file($_FILES["imgss"]["tmp_name"], $target_file)) {
      $str = strval(basename( $_FILES["imgss"]["name"]));
      //header("Location: http://localhost/");
      echo '<script>';
      echo ('alert("The file '.$str.' has been uploaded.")');
      echo '</script>';
    } else {
      echo '<script>';
      echo 'alert("Sorry, there was an error uploading your file.")';
      echo '</script>';
    }
  }
  //header("Location: http://localhost/");
?>

