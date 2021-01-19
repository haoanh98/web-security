<?php
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
    include('Page/' . $page);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Upload_file</title>
</head>
<body>
<button class="btndang" onclick="window.location.href='index.php?page=about.php'">About</button>
<div id="imagePreview"></div>
  <form action="../Page/upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="imgss" onchange="return review()" multiple>
    <p>Drag your files here or click in this area.</p>
    <button type="submit">Upload</button>
  </form>

</body>

<script>
  function review() { 
    var reader = new FileReader(); 
    reader.onload = function(e) {
      console.log(e)
      document.getElementById( 'imagePreview').innerHTML = '<img src="' + e.target.result + '"/>'; 
    };
    // reader.readAsDataURL(fileInput.files[0]);
  }
</script>
</html>