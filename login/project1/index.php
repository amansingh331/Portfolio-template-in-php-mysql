
<!DOCTYPE html>
<html>
<head>
  <title>PHP File Upload</title>
</head>
<body>

  <form method="POST" action="test.php" enctype="multipart/form-data">
    <div class="upload-wrapper">
      <span class="file-name">Choose a file...</span>
      <label for="file-upload">Browse<input type="file" id="file-upload" name="fileToUpload"></label>
    </div>
 
    <input type="submit" name="submit" value="submit" />
  </form>
</body>
</html>