<?php
include('../../include/db.php');
include('checkupload.php');
$comment_id=$_POST['comment_id'];
$query="SELECT * FROM blog_comment WHERE comment_id='$comment_id'";

$queryrun=mysqli_query($db,$query);
$data=mysqli_fetch_array($queryrun);


    
    
$comment_name=mysqli_real_escape_string($db,$_POST['comment_name']);
$comment_email=mysqli_real_escape_string($db,$_POST['comment_email']);
$comment_blog_post_id=mysqli_real_escape_string($db,$_POST['comment_blog_post_id']);
$comment=mysqli_real_escape_string($db,$_POST['comment']);
  
 
if($pdone=="error"){
    header("location:../index.php?edithome=true&msg=error");
}else{
$query="UPDATE blog_comment SET ";
$query.="comment_name='$comment_name',";
$query.="comment_email='$comment_email',";
$query.="comment_blog_post_id='$comment_blog_post_id',";
$query.="comment='$comment' WHERE comment_id='$comment_id'";
echo $query;    
$queryrun=mysqli_query($db,$query);
if($queryrun){
    header("location:../index.php?editcomment=true#done");
}    

}    
    


if(isset($_GET['del'])){
    $comment_id=$_GET['del'];
    $query="DELETE FROM blog_comment WHERE comment_id='$comment_id'";
    $queryrun=mysqli_query($db,$query);
if($queryrun){
    header("location:../index.php?editcomment=true#done");
}
}



    
    

  
 
   
    
