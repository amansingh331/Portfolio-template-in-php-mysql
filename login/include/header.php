 <!-- ======= Mobile nav toggle button ======= -->
 <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

<!-- ======= Header ======= -->
<header id="header">
      <div class="d-flex flex-column">

          <div class="profile">
              <img src="../assets/img/<?=$data['profilepic']?>" alt="" class="img-fluid rounded-circle">
              <h1 class="text-light"><a href="#"><?=$data['name']?></a></h1>
              <div class="social-links mt-3 text-center">
                  <?php 
      if($data['twitter']!=""){
          ?>
                  <a href="<?=$data['twitter']?>" class="twitter"><i class="bx bxl-twitter"></i></a>
                  <?php
      }    
      if($data['facebook']!=""){
          ?>
                  <a href="<?=$data['facebook']?>" class="facebook"><i class="bx bxl-facebook"></i></a>
                  <?php
      }
    if($data['instagram']!=""){
          ?>
                  <a href="<?=$data['instagram']?>" class="instagram"><i class="bx bxl-instagram"></i></a>
                  <?php
      }
     if($data['skype']!=""){
          ?>
                  <a href="<?=$data['instagram']?>" class="google-plus"><i class="bx bxl-skype"></i></a>
                  <?php
      }
    if($data['linkedin']!=""){
          ?>
                  <a href="<?=$data['linkedin']?>" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                  <?php
      }
    if($data['github']!=""){
          ?>
                  <a href="<?=$data['instagram']?>" class="github"><i class="bx bxl-github"></i></a>
                  <?php
      } 
      ?>
              </div>
          </div>

          <nav class="nav-menu">
              <ul>
                  <li class=""><a href="../#hero"><i class="bx bx-home"></i> <span>Home</span></a></li>
                  <li><a href="../#about"><i class="bx bx-user"></i> <span>About</span></a></li>
                  <li><a href="../#resume"><i class="bx bx-file-blank"></i> <span>Resume</span></a></li>
                  <li><a href="../#portfolio"><i class="bx bx-book-content"></i> Portfolio</a></li>
                  <li><a href="../blog/index.php"><i class="bx bx-book-reader"></i> Blog</a></li>
                  <li><a href="../#contact"><i class="bx bx-envelope"></i> Contact</a></li>
                  <li><a href="../login/home.php"><i class="bx bx-user-circle"></i> Signin/SignUp</a></li>
              </ul>
          </nav><!-- .nav-menu -->
          <br>
            <div class="profile">
                <h1 class="text-light">Useful Project link</h1>
            </div>
            <nav class="nav-menu">

                <ul>
                <?php
                    $query9 = "SELECT * FROM project ORDER BY project_id DESC";
$runquery9= mysqli_query($db,$query9);
while($data9=mysqli_fetch_array($runquery9)){
    ?>
                    <li><a href="<?=$data9['project_link']?>"><i class='bx bx-task'></i><span><?=$data9['project_name']?></span></a></li>


<?php } ?>


                </ul>
            </nav><!-- .nav-menu -->
          <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

      </div>
  </header><!-- End Header -->