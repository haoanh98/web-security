<?php
  if (isset($_GET['page'])) {
    $allowedPages = array('about');
    $filename = $_GET['page'];
    if(in_array($filename, $allowedPages)){
      include('../Page/' . $filename . '.php');
    }
    else{
      echo('<p style="color:white;">Hack detected</p>');
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload_file</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<button class="btndang" onclick="window.location.href='index_fixed.php?page=about'">About</button>
  <div id="imagePreview"></div> 
  <form action="../Page/upload_fixed.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="imgss" id='file' onchange="return fileValidation()" multiple>
    <p>Drag your files here or click in this area.</p>
    <button type="submit">Upload</button>
  </form>

</body>
<script>
  function fileValidation() { 
    let fileInput = document.getElementById('file');
    let filePath = fileInput.value;
    let allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if (!allowedExtensions.exec(filePath)) {
      alert('Invalid file type');
      fileInput.value = '';
      return false;
    }
    else 
    {
      if (fileInput.files && fileInput.files[0]) { 
        let reader = new FileReader(); 
        reader.onload = function(e) { 
          document.getElementById( 
            'imagePreview').innerHTML = 
            '<img src="' + e.target.result 
            + '"/>';
        };
        reader.readAsDataURL(fileInput.files[0]); 
      }
    }
  }
</script>
</html>