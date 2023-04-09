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


// this is for geting the id of the post

if(isset($_GET['blog_id']))
{
    $blog_id = $_GET['blog_id'];
}
// else{
//   $blog_id = "error";
// }



// this is for counting the comment of this blog post 
$query_comment_count = "SELECT * FROM blog_comment WHERE comment_blog_post_id=$blog_id";
$runquery_comment_count= mysqli_query($db,$query_comment_count);
$rowcount_comment_count = mysqli_num_rows( $runquery_comment_count );


// this for posting the comment 
if (isset($_POST['comment_reply'])) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $comment = $_POST['comment'];
  $post_id = $_GET['blog_id'];
  $IP = $_SERVER['REMOTE_ADDR'];
  $user_browser = $_SERVER['HTTP_USER_AGENT'];
  $insert_the_comment = "INSERT INTO blog_comment (comment_name, comment_email, comment, comment_blog_post_id, user_ip_address, user_browser) VALUES ('$name','$email','$comment','$post_id','$IP','$user_browser')";
  if (mysqli_query($db, $insert_the_comment)) {

     $message1 = "You comment has been posted!";
     echo "<script type='text/javascript'>alert('$message1');</script>";
  } else {
    $message2 = "You comment has not been posted, please try again!";
     echo "<script type='text/javascript'>alert('$message2');</script>";
  }
  header("Refresh:0");
  
}



// this is for blog details
$query6 = "SELECT * FROM blog WHERE blog_id=$blog_id";
$runquery6= mysqli_query($db,$query6);
$data6=mysqli_fetch_array($runquery6);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?=$data6['heading']?></title>
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



                    <?php  
                    require_once('../include/counter.php');
                    $pn=updateCounter(''.$blog_id.''); // Updates blog post page view count 
                    echo $pn;
                    ?>



<!-- this is for includeing the header file  -->
<?php include('include/header.php'); ?>  

  <main id="main">




    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single">





              <div class="entry-img">
                <img src="blog_page/image/<?=$data6['image']?>" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="#"><?=$data6['heading']?></a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#"><?=$data6['author']?></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="2020-01-01"><?php $date=date_create($data6['date']); echo date_format($date,"M d, Y"); ?></time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="#"><?php echo $rowcount_comment_count ?> Comments</a></li>
                </ul>
              </div>

              <div class="entry-content">
                <p>
                <?=$data6['content']?>
                </p>

                <?php include 'blog_page/'.$data6['blog_page'];?>




                <!-- <p>
                  Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt non reiciendis. Sequi in accusamus harum vel aspernatur. Excepturi numquam nihil cumque odio. Et voluptate cupiditate.
                </p>

                <blockquote>
                  <p>
                    Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos aliquam doloribus minus autem quos.
                  </p>
                </blockquote>

                <p>
                  Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate ex rerum assumenda dolores nihil quaerat.
                  Dolor porro tempora et quibusdam voluptas. Beatae aut at ad qui tempore corrupti velit quisquam rerum. Omnis dolorum exercitationem harum qui qui blanditiis neque.
                  Iusto autem itaque. Repudiandae hic quae aspernatur ea neque qui. Architecto voluptatem magni. Vel magnam quod et tempora deleniti error rerum nihil tempora.
                </p>

                <h3>Et quae iure vel ut odit alias.</h3>
                <p>
                  Officiis animi maxime nulla quo et harum eum quis a. Sit hic in qui quos fugit ut rerum atque. Optio provident dolores atque voluptatem rem excepturi molestiae qui. Voluptatem laborum omnis ullam quibusdam perspiciatis nulla nostrum. Voluptatum est libero eum nesciunt aliquid qui.
                  Quia et suscipit non sequi. Maxime sed odit. Beatae nesciunt nesciunt accusamus quia aut ratione aspernatur dolor. Sint harum eveniet dicta exercitationem minima. Exercitationem omnis asperiores natus aperiam dolor consequatur id ex sed. Quibusdam rerum dolores sint consequatur quidem ea.
                  Beatae minima sunt libero soluta sapiente in rem assumenda. Et qui odit voluptatem. Cum quibusdam voluptatem voluptatem accusamus mollitia aut atque aut.
                </p>
                <img src="assets2/img/blog/blog-inside-post.jpg" class="img-fluid" alt="">

                <h3>Ut repellat blanditiis est dolore sunt dolorum quae.</h3>
                <p>
                  Rerum ea est assumenda pariatur quasi et quam. Facilis nam porro amet nostrum. In assumenda quia quae a id praesentium. Quos deleniti libero sed occaecati aut porro autem. Consectetur sed excepturi sint non placeat quia repellat incidunt labore. Autem facilis hic dolorum dolores vel.
                  Consectetur quasi id et optio praesentium aut asperiores eaque aut. Explicabo omnis quibusdam esse. Ex libero illum iusto totam et ut aut blanditiis. Veritatis numquam ut illum ut a quam vitae.
                </p>
                <p>
                  Alias quia non aliquid. Eos et ea velit. Voluptatem maxime enim omnis ipsa voluptas incidunt. Nulla sit eaque mollitia nisi asperiores est veniam.
                </p> -->

              </div>

              <div class="entry-footer">
                <i class="bi bi-folder"></i>
                <ul class="cats">
                  <li><a href="#">Business</a></li>
                </ul>

                <i class="bi bi-tags"></i>
                <ul class="tags">
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>
              </div> -->





            </article><!-- End blog entry -->

            <div class="blog-author d-flex align-items-center">
              <img src="../assets/img/<?=$data['profilepic']?>" class="rounded-circle float-left" alt="">
              <div>
                <h4><?=$data['name']?></h4>
                <div class="social-links">
                  <a href="<?=$data['twitter']?>"><i class="bi bi-twitter"></i></a>
                  <a href="<?=$data['facebook']?>"><i class="bi bi-facebook"></i></a>
                  <a href="<?=$data['instagram']?>"><i class="biu bi-instagram"></i></a>
                </div>
                <p>
                <?=$data6['post_quotes']?>
                </p>
              </div>
            </div>
            <!-- End blog author bio -->


            <!-- start of blog comment  -->


            <div class="blog-comments">

              <h4 class="comments-count"><?php echo $rowcount_comment_count ?> Comments</h4>

              <?php
              $query_comment = "SELECT * FROM blog_comment WHERE comment_blog_post_id=$blog_id ORDER BY comment_id ASC";
              $runquery_comment= mysqli_query($db,$query_comment);
              while($data_comment=mysqli_fetch_array($runquery_comment)){
              ?>

              <div id="comment-1" class="comment">
                <div class="d-flex">
                  <div class="comment-img"><img src="assets2/img/blog/comments-1.jpg" alt=""></div>
                  <div>
                    <h5><a href=""><?=$data_comment['comment_name']?></a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                    <time datetime="2020-01-01"><?php $date=date_create($data_comment['comment_date']); echo date_format($date,"M d, Y, h:i A"); ?></time>
                    <p>
                    <?=$data_comment['comment']?>
                    </p>
                  </div>
                </div>
              </div>
              <?php } ?>
              <!-- End comment #1 -->
                  <!-- 
              <div id="comment-2" class="comment">
                <div class="d-flex">
                  <div class="comment-img"><img src="assets2/img/blog/comments-2.jpg" alt=""></div>
                  <div>
                    <h5><a href="">Aron Alvarado</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                    <time datetime="2020-01-01">01 Jan, 2020</time>
                    <p>
                      Ipsam tempora sequi voluptatem quis sapiente non. Autem itaque eveniet saepe. Officiis illo ut beatae.
                    </p>
                  </div>
                </div> -->

                <!-- <div id="comment-reply-1" class="comment comment-reply">
                  <div class="d-flex">
                    <div class="comment-img"><img src="assets2/img/blog/comments-3.jpg" alt=""></div>
                    <div>
                      <h5><a href="">Lynda Small</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                      <time datetime="2020-01-01">01 Jan, 2020</time>
                      <p>
                        Enim ipsa eum fugiat fuga repellat. Commodi quo quo dicta. Est ullam aspernatur ut vitae quia mollitia id non. Qui ad quas nostrum rerum sed necessitatibus aut est. Eum officiis sed repellat maxime vero nisi natus. Amet nesciunt nesciunt qui illum omnis est et dolor recusandae.

                        Recusandae sit ad aut impedit et. Ipsa labore dolor impedit et natus in porro aut. Magnam qui cum. Illo similique occaecati nihil modi eligendi. Pariatur distinctio labore omnis incidunt et illum. Expedita et dignissimos distinctio laborum minima fugiat.

                        Libero corporis qui. Nam illo odio beatae enim ducimus. Harum reiciendis error dolorum non autem quisquam vero rerum neque.
                      </p>
                    </div>
                  </div> -->

                  <!-- <div id="comment-reply-2" class="comment comment-reply">
                    <div class="d-flex">
                      <div class="comment-img"><img src="assets2/img/blog/comments-4.jpg" alt=""></div>
                      <div>
                        <h5><a href="">Sianna Ramsay</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                        <time datetime="2020-01-01">01 Jan, 2020</time>
                        <p>
                          Et dignissimos impedit nulla et quo distinctio ex nemo. Omnis quia dolores cupiditate et. Ut unde qui eligendi sapiente omnis ullam. Placeat porro est commodi est officiis voluptas repellat quisquam possimus. Perferendis id consectetur necessitatibus.
                        </p>
                      </div>
                    </div> -->

                  <!-- </div> -->
                  <!-- End comment reply #2-->

                <!-- </div> -->
                <!-- End comment reply #1-->

              <!-- </div> -->
              <!-- End comment #2-->

              <!-- <div id="comment-3" class="comment">
                <div class="d-flex">
                  <div class="comment-img"><img src="assets2/img/blog/comments-5.jpg" alt=""></div>
                  <div>
                    <h5><a href="">Nolan Davidson</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                    <time datetime="2020-01-01">01 Jan, 2020</time>
                    <p>
                      Distinctio nesciunt rerum reprehenderit sed. Iste omnis eius repellendus quia nihil ut accusantium tempore. Nesciunt expedita id dolor exercitationem aspernatur aut quam ut. Voluptatem est accusamus iste at.
                      Non aut et et esse qui sit modi neque. Exercitationem et eos aspernatur. Ea est consequuntur officia beatae ea aut eos soluta. Non qui dolorum voluptatibus et optio veniam. Quam officia sit nostrum dolorem.
                    </p>
                  </div>
                </div>

              </div> -->
              <!-- End comment #3 -->
<!-- 
              <div id="comment-4" class="comment">
                <div class="d-flex">
                  <div class="comment-img"><img src="assets2/img/blog/comments-6.jpg" alt=""></div>
                  <div>
                    <h5><a href="">Kay Duggan</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                    <time datetime="2020-01-01">01 Jan, 2020</time>
                    <p>
                      Dolorem atque aut. Omnis doloremque blanditiis quia eum porro quis ut velit tempore. Cumque sed quia ut maxime. Est ad aut cum. Ut exercitationem non in fugiat.
                    </p>
                  </div>
                </div>

              </div> -->
              <!-- End comment #4 -->

              <div class="reply-form">
                <h4>Leave a Reply</h4>
                <p>Your email address will not be published. Required fields are marked * </p>
                <form action="" method="post" >
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input name="name" type="text" class="form-control" placeholder="Your Name*" required>
                    </div>
                    <div class="col-md-6 form-group">
                      <input name="email" type="email" class="form-control" placeholder="Your Email*" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <textarea name="comment" class="form-control" placeholder="Your Comment*" required></textarea>
                    </div>
                  </div>
                  <button type="submit" name="comment_reply" class="btn btn-primary">Post Comment</button>
                </form>

              </div>

            </div><!-- End blog comments -->

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="">
                  <input type="text">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

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
              </div><!-- End sidebar categories-->



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
              
              <!-- End sidebar recent posts-->

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
    </section><!-- End Blog Single Section -->

  
















       

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