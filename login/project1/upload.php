<?php
require "../../include/db.php";
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload')
{
  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
  {
    // get details of the uploaded file
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
 
    // sanitize file-name
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
 
    // check if file has one of the following extensions
    $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');
 
    if (in_array($fileExtension, $allowedfileExtensions))
    {
      // directory in which the uploaded file will be moved
      $uploadFileDir = 'chat_file/';
      $dest_path = $uploadFileDir . $newFileName;
 
      if(move_uploaded_file($fileTmpPath, $dest_path)) 
      {
        $message ='File is successfully uploaded.';
      }
      else
      {
        $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
      }
    }
    else
    {
      $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
    }
  }
  else
  {
    $message = 'There is some error in the file upload. Please check the following error.<br>';
    $message .= 'Error:' . $_FILES['uploadedFile']['error'];
  }



$chat_user_email = mysqli_real_escape_string($db,$_POST['chat_user_email']);
$chat_user_id = mysqli_real_escape_string($db,$_POST['chat_user_id']);
// $chat_file_name=mysqli_real_escape_string($db,$_POST['chat_file_name']);

$user_ip_address = $_SERVER['REMOTE_ADDR']; 
$user_browser = $_SERVER['HTTP_USER_AGENT'];


$query="INSERT INTO chat_info (chat_user_email,chat_user_id,chat_file_name,user_ip_address,user_browser) ";
$query.="VALUES ('$chat_user_email','$chat_user_id','$newFileName','$user_ip_address','$user_browser')";
$queryrun=mysqli_query($db,$query);
if($queryrun){
    header("location:../home.php?msg=updated");
}else{
  header("location:../home.php?msg=error");
}  


}
