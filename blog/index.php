<?php 
// Include visitor log script 
include_once '../include/log.php';


include('../include/db.php'); 
$query = "SELECT * FROM basic_setup,personal_setup,aboutus_setup";
$runquery = mysqli_query($db,$query);
if(!$db){
    header("location:index-2.html");
}
$data = mysqli_fetch_array($runquery);


//  this is for page moving 

if(isset($_GET['page']))
{
    $page = $_GET['page'];
}
else
{
    $page = 1;
}

$num_per_page = 05;
$start_from = ($page-1)*05;

// $query = "select * from pagination limit $start_from,$num_per_page";
// $result = mysqli_query($con,$query);




?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?=$data['title']?>-->Blog</title>
    <meta content="<?=$data['description']?>" name="description">
    <meta content="<?=$data['keyword']?>" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/<?=$data['icon']?>" rel="icon">
    <link href="../assets/img/<?=$data['icon']?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <!-- <link href="assets2/css/style.css" rel="stylesheet"> -->


</head>

<body>

<!-- this is for includeing the header file  -->
 <?php include('include/header.php'); ?>   



  <main id="main">





    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">



                                   <?php
                                   $query5 = "SELECT * FROM blog ORDER BY blog_id DESC LIMIT $start_from,$num_per_page";
                                   $runquery5= mysqli_query($db,$query5);
                                   while($data5=mysqli_fetch_array($runquery5)){
                                    $blog_id = $data5['blog_id'];  // this is for noting the id in diffrent variable 




                                   // this is for row count with that category
                                   $query_comment_count = "SELECT * FROM blog_comment WHERE comment_blog_post_id=$blog_id";
                                   $runquery_comment_count= mysqli_query($db,$query_comment_count);
                                   $rowcount_comment_count = mysqli_num_rows( $runquery_comment_count );
                                         ?>

            <article class="entry">

              <div class="entry-img">
                <img src="blog_page/image/<?=$data5['image']?>" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="blog-single.php?blog_id=<?=$data5['blog_id']?>"><?=$data5['heading']?></a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.php?blog_id=<?=$data5['blog_id']?>"><?=$data5['author']?></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.php?blog_id=<?=$data5['blog_id']?>"><time datetime="2020-01-01"><?php $date=date_create($data5['date']); echo date_format($date,"M d, Y"); ?></time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.php?blog_id=<?=$data5['blog_id']?>"><?php echo $rowcount_comment_count ?> Comments</a></li>  

                </ul>
              </div>
              
              <div class="entry-content">
                <p>
                <?=$data5['content']?>
                </p>
                <div class="read-more">
                  <a href="blog-single.php?blog_id=<?=$data5['blog_id']?>">Read More</a>
                </div>
              </div>

            </article><!-- End blog entry -->

            <?php
}
                    ?>


 



            <div class="blog-pagination">
              <ul class="justify-content-center">

        <?php 
        $pr_query = "select * from blog ";
        $pr_result = mysqli_query($db,$pr_query);
        $total_record = mysqli_num_rows($pr_result );
        $total_page = ceil($total_record/$num_per_page);
        if($page>1)
        {
            echo "<li><a href='index.php?page=".($page-1)."'>Previous</a></li>";
        }
        echo "<li class='active'><a href='index.php?page=".($page)."'>$page</a></li>";
        for($i=1;$i<$total_page;$i++)
        {
            // echo "<a href='index.php?page=".$i."' class='btn btn-primary'>$i</a>"; //this will print all the combination of page
        }
        if($i>$page)
        {
            echo "<li><a href='index.php?page=".($page+1)."' >Next</a></li>";
        }
        ?>
              </ul>
            </div>

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="">
                  <input type="text">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div>
              
              
              <!-- End sidebar search formn-->



              <!-- Start of sidebar categories-->




              <h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item categories">
                <ul>
                            <?php
                            $blog_categories = "SELECT * FROM blog_categories ORDER BY blog_categories_id ASC";
                            $run_blog_categories= mysqli_query($db,$blog_categories);





                            while($fetch_blog_categories_info=mysqli_fetch_array($run_blog_categories)){
                              $blog_category_name = $fetch_blog_categories_info['blog_categories_name'];  // this is for noting the name in diffrent variable 

                            // this is for row count with that category
                              $categories_count = "SELECT * FROM blog WHERE category='$blog_category_name'";
                              $run_categories_count= mysqli_query($db,$categories_count);
                              $rowcount_categories_count = mysqli_num_rows( $run_categories_count );
                            ?>

                  <li><a href="blog-category.php?category=<?=$fetch_blog_categories_info['blog_categories_name']?>"><?=$fetch_blog_categories_info['blog_categories_name']?> <span>(<?php echo $rowcount_categories_count ?>)</span></a></li>

                             <?php  }  ?>
                </ul>
              </div>
              
              

              
              
               <!-- End sidebar categories-->



               <!-- Start of sidebar popular posts-->

              <h3 class="sidebar-title">Popular Posts</h3>
              <div class="sidebar-item recent-posts">
              <?php
                            $blog_popular_post = "SELECT * FROM blog ORDER BY post_view_count DESC LIMIT 5";
                            $run_blog_popular_post= mysqli_query($db,$blog_popular_post);
                            while($fetch_blog_popular_post_info=mysqli_fetch_array($run_blog_popular_post)){?>


                <div class="post-item clearfix">
                  <a href="blog-single.php?blog_id=<?=$fetch_blog_popular_post_info['blog_id']?>">
                    <img src="blog_page/image/<?=$fetch_blog_popular_post_info['image']?>" alt="">
                  </a>
                    <h4><a href="blog-single.php?blog_id=<?=$fetch_blog_popular_post_info['blog_id']?>"><?=$fetch_blog_popular_post_info['heading']?></a></h4>
                    <time datetime="2020-01-01"><?php $date=date_create($fetch_blog_popular_post_info['date']); echo date_format($date,"M d, Y"); ?></time>
                </div>

                          <?php }?>

              </div>
              
              
              <!-- End sidebar popular posts-->

              <h3 class="sidebar-title">Tags</h3>
              <div class="sidebar-item tags">
                <ul>
                           <?php
                            $blog_tag = "SELECT * FROM blog_tag ORDER BY blog_tag_id ASC";
                            $run_blog_tag= mysqli_query($db,$blog_tag);


                            while($fetch_blog_tag_info=mysqli_fetch_array($run_blog_tag)){
                            ?>
                  <li><a href="blog-tag.php?tag=<?=$fetch_blog_tag_info['blog_tag_name']?>"><?=$fetch_blog_tag_info['blog_tag_name']?></a></li>
                            <?php  }  ?>
                </ul>
              </div><!-- End sidebar tags-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>



 







    </section><!-- End Blog Section -->



    

  </main><!-- End #main -->







<!-- this is for including the footer file -->
<?php include('include/footer.php');?>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>