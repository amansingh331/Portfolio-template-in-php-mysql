<?php
include('../../include/db.php');
include('checkupload.php');
$id=$_POST['id'];
$query="SELECT * FROM usertable WHERE id='$id'";

$queryrun=mysqli_query($db,$query);
$data=mysqli_fetch_array($queryrun);

$target_dir = "../../login/images/";

if(isset($_POST['pupdate'])){    
    $image=$_FILES['image']['name'];        
    if($image==""){
        $image=$data['image'];
    }else{
        $pdone = Upload('image',$target_dir);
    }
    
    
$name=mysqli_real_escape_string($db,$_POST['name']);
$email=mysqli_real_escape_string($db,$_POST['email']);
$password=mysqli_real_escape_string($db,$_POST['password']);
$code=mysqli_real_escape_string($db,$_POST['code']);
$status=mysqli_real_escape_string($db,$_POST['status']);
$chat_ready=mysqli_real_escape_string($db,$_POST['chat_ready']);
$chat_table_name=mysqli_real_escape_string($db,$_POST['chat_table_name']);
$chat_user2=mysqli_real_escape_string($db,$_POST['chat_user2']);
$create_date=mysqli_real_escape_string($db,$_POST['create_date']);
$update_time=mysqli_real_escape_string($db,$_POST['update_time']);
$user_ip_address=mysqli_real_escape_string($db,$_POST['user_ip_address']);
$user_browser=mysqli_real_escape_string($db,$_POST['user_browser']);
  
 
if($pdone=="error"){
    header("location:../index.php?edithome=true&msg=error");
}else{
$query="UPDATE usertable SET ";
$query.="image='$image',";
$query.="name='$name',";
$query.="email='$email',";
$query.="password='$password',";
$query.="code='$code',";
$query.="status='$status',";
$query.="chat_ready='$chat_ready',";
$query.="chat_table_name='$chat_table_name',";
$query.="chat_user2='$chat_user2',";
$query.="create_date='$create_date',";
$query.="update_time='$update_time',";
$query.="user_ip_address='$user_ip_address',";
$query.="user_browser='$user_browser' WHERE id='$id'";

 
echo $query;    
$queryrun=mysqli_query($db,$query);
if($queryrun){
    header("location:../index.php?edituser_info=true#done");
}    

}    
    
}

if(isset($_GET['del'])){
    $id=$_GET['del'];
    $query="DELETE FROM usertable WHERE id='$id'";
    $queryrun=mysqli_query($db,$query);
if($queryrun){
    header("location:../index.php?edituser_info=true#done");
}
}


if(isset($_POST['addtoblog'])){    
    $image=$_FILES['image']['name'];        
    if($image==""){
        $image=$data['image'];
    }else{
        $pdone = Upload('image',$target_dir);
    }
    
    
$name=mysqli_real_escape_string($db,$_POST['name']);
$email=mysqli_real_escape_string($db,$_POST['email']);
$password=mysqli_real_escape_string($db,$_POST['password']);
$code=mysqli_real_escape_string($db,$_POST['code']);
$status=mysqli_real_escape_string($db,$_POST['status']);
$chat_ready=mysqli_real_escape_string($db,$_POST['chat_ready']);
$chat_table_name=mysqli_real_escape_string($db,$_POST['chat_table_name']);
$chat_user2=mysqli_real_escape_string($db,$_POST['chat_user2']);
$create_date=mysqli_real_escape_string($db,$_POST['create_date']);
$update_time=mysqli_real_escape_string($db,$_POST['update_time']);
$user_ip_address=mysqli_real_escape_string($db,$_POST['user_ip_address']);
$user_browser=mysqli_real_escape_string($db,$_POST['user_browser']);
  
 
if($pdone=="error"){
    header("location:../index.php?edituser_info=true&msg=error");
}else{
$query="INSERT INTO usertable (name,email,password,image,code,status,chat_ready,chat_table_name,chat_user2,create_date,update_time,user_ip_address,user_browser) ";
$query.="VALUES ('$name','$email','$password','$image','$code','$status','$chat_ready','$chat_table_name,'$chat_user2','$create_date','$update_time','$user_ip_address','$user_browser')";
$queryrun=mysqli_query($db,$query);
if($queryrun){
    header("location:../index.php?edituser_info=true&msg=updated");
}    

}    
    
}