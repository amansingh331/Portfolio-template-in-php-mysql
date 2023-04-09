<?php
include('../../include/db.php');
if(isset($_POST['supdate'])){
    $blog_tag_id=$_POST['blog_tag_id'];
    $blog_tag_name=mysqli_real_escape_string($db,$_POST['blog_tag_name']);
    $query="UPDATE blog_tag SET blog_tag_name='$blog_tag_name' WHERE blog_tag_id='$blog_tag_id'";
    $run=mysqli_query($db,$query);
    if($run){
        header("location:../index.php?edittag=true");
    }
}

if(isset($_POST['addskill'])){
    $blog_tag_id=$_POST['blog_tag_id'];
    $blog_tag_name=mysqli_real_escape_string($db,$_POST['blog_tag_name']);
    $query="INSERT INTO blog_tag (blog_tag_name) VALUES ('$blog_tag_name')";
    $run=mysqli_query($db,$query);
    if($run){
        header("location:../index.php?edittag=true");
    }
}

if(isset($_GET['del'])){
    $blog_tag_id=$_GET['del'];
    $query="DELETE FROM blog_tag WHERE blog_tag_id='$blog_tag_id'";
    $run=mysqli_query($db,$query);
    if($run){
        header("location:../index.php?edittag=true");
    }
}