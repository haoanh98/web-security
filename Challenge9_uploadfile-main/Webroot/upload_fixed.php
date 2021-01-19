<?php
$target_dir = './uploaded/';
$target_file = $target_dir . basename($_FILES["imgss"]["name"]);
echo($target_file);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["imgss"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

if ($uploadOk == 0) {
  echo '<script language="javascript">';
  echo 'alert("Sorry, your file was not uploaded.")';
  echo '</script>';
} else {
  if (move_uploaded_file($_FILES["imgss"]["tmp_name"], $target_file)) {
    echo '<script language="javascript">';
    echo 'alert('.'The file ". htmlspecialchars( basename( $_FILES["imgss"]["name"])). " has been uploaded.'.')';
    echo '</script>';
  } else {
    echo '<script language="javascript">';
    echo 'alert("Sorry, there was an error uploading your file.")';
    echo '</script>';
  }
}
?>