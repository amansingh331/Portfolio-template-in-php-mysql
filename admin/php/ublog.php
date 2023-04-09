<?php
include('../../include/db.php');
include('checkupload.php');
$blog_id=$_POST['blog_id'];
$query="SELECT * FROM blog WHERE blog_id='$blog_id'";

$queryrun=mysqli_query($db,$query);
$data=mysqli_fetch_array($queryrun);

$target_dir = "../../blog/image/";

if(isset($_POST['pupdate'])){    
$image=$_FILES['image']['name'];        
if($image==""){
    $image=$data['image'];
}else{
    $pdone = Upload('image',$target_dir);
}
    
    
$category=mysqli_real_escape_string($db,$_POST['category']);
$tag=mysqli_real_escape_string($db,$_POST['tag']);
$author=mysqli_real_escape_string($db,$_POST['author']);
$heading=mysqli_real_escape_string($db,$_POST['heading']);
$content=mysqli_real_escape_string($db,$_POST['content']);
$post_quotes=mysqli_real_escape_string($db,$_POST['post_quotes']);
$date=mysqli_real_escape_string($db,$_POST['date']);
$blog_page=mysqli_real_escape_string($db,$_POST['blog_page']);
$post_view_count=mysqli_real_escape_string($db,$_POST['post_view_count']);
  
 
if($pdone=="error"){
    header("location:../index.php?edithome=true&msg=error");
}else{
$query="UPDATE blog SET ";
$query.="image='$image',";
$query.="category='$category',";
$query.="tag='$tag',";
$query.="author='$author',";
$query.="heading='$heading',";
$query.="content='$content',";
$query.="post_quotes='$post_quotes',";
$query.="date='$date',";
$query.="blog_page='$blog_page',";
$query.="post_view_count='$post_view_count' WHERE blog_id='$blog_id'";

 
echo $query;    
$queryrun=mysqli_query($db,$query);
if($queryrun){
    header("location:../index.php?editblog=true#done");
}    

}    
    
}

if(isset($_GET['del'])){
    $blog_id=$_GET['del'];
    $query="DELETE FROM blog WHERE blog_id='$blog_id'";
    $queryrun=mysqli_query($db,$query);
if($queryrun){
    header("location:../index.php?editblog=true#done");
}
}


if(isset($_POST['addtoblog'])){    
$image=$_FILES['image']['name'];        
if($image==""){
    $image=$data['image'];
}else{
    $pdone = Upload('image',$target_dir);
}
    
    
$category=mysqli_real_escape_string($db,$_POST['category']);
$tag=mysqli_real_escape_string($db,$_POST['tag']);
$author=mysqli_real_escape_string($db,$_POST['author']);
$heading=mysqli_real_escape_string($db,$_POST['heading']);
$content=mysqli_real_escape_string($db,$_POST['content']);
$post_quotes=mysqli_real_escape_string($db,$_POST['post_quotes']);
$blog_page=mysqli_real_escape_string($db,$_POST['blog_page']);

  
 
if($pdone=="error"){
    header("location:../index.php?editblog=true&msg=error");
}else{
$query="INSERT INTO blog (category,tag,author,heading,content,post_quotes,blog_page) ";
$query.="VALUES ('$category','$tag','$author','$heading','$content','$post_quotes','$blog_page')";
$queryrun=mysqli_query($db,$query);
if($queryrun){
    header("location:../index.php?editblog=true&msg=updated");
}    

}    
    
}