<?php
include('../../include/db.php');
if(isset($_POST['supdate'])){
    $blog_categories_id=$_POST['blog_categories_id'];
    $blog_categories_name=mysqli_real_escape_string($db,$_POST['blog_categories_name']);
    $query="UPDATE blog_categories SET blog_categories_name='$blog_categories_name' WHERE blog_categories_id='$blog_categories_id'";
    $run=mysqli_query($db,$query);
    if($run){
        header("location:../index.php?editcategory=true");
    }
}

if(isset($_POST['addskill'])){
    $blog_categories_id=$_POST['blog_categories_id'];
    $blog_categories_name=mysqli_real_escape_string($db,$_POST['blog_categories_name']);
    $query="INSERT INTO blog_categories (blog_categories_name) VALUES ('$blog_categories_name')";
    $run=mysqli_query($db,$query);
    if($run){
        header("location:../index.php?editcategory=true");
    }
}

if(isset($_GET['del'])){
    $blog_categories_id=$_GET['del'];
    $query="DELETE FROM blog_categories WHERE blog_categories_id='$blog_categories_id'";
    $run=mysqli_query($db,$query);
    if($run){
        header("location:../index.php?editcategory=true");
    }
}