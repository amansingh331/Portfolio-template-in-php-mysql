<?php 
// Include visitor log script 
include_once 'include/log.php';


include('./include/db.php'); 
$query = "SELECT * FROM basic_setup,personal_setup,aboutus_setup";
$runquery = mysqli_query($db,$query);
if(!$db){
    header("location:index-2.html");
}
$data = mysqli_fetch_array($runquery);
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?=$data['title']?></title>
    <meta content="<?=$data['description']?>" name="description">
    <meta content="<?=$data['keyword']?>" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/<?=$data['icon']?>" rel="icon">
    <link href="assets/img/<?=$data['icon']?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">



</head>

<body>
  
    <!-- ======= Mobile nav toggle button ======= -->
    <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

    <!-- ======= Header ======= -->
    <header id="header">
        <div class="d-flex flex-column">

            <div class="profile">
                <img src="assets/img/<?=$data['profilepic']?>" alt="" class="img-fluid rounded-circle">
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
                    <li class=""><a href="#hero"><i class="bx bx-home"></i> <span>Home</span></a></li>
                    <li><a href="#about"><i class="bx bx-user"></i> <span>About</span></a></li>
                    <li><a href="#resume"><i class="bx bx-file-blank"></i> <span>Resume</span></a></li>
                    <li><a href="#portfolio"><i class="bx bx-book-content"></i> Portfolio</a></li>
                    <li><a href="blog/"><i class="bx bx-book-reader"></i> Blog</a></li>
                    <li><a href="#contact"><i class="bx bx-envelope"></i> Contact</a></li>
                    <li><a href="login/home.php"><i class="bx bx-user-circle"></i> Signin/SignUp</a></li>

                </ul>
            </nav><!-- .nav-menu -->
            <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

        </div>
    </header><!-- End Header -->



    <main id="main">






            <!-- ======= 404 Error Page Section ======= -->
            <section>
            <div class="container">

                <div class="section-title">
                    <h2>404 Error</h2>
                    <p><h1>The page you want is not present on the server!</h1></p>
                </div>
                <a href="index.php">
                    <div class="text-center"><button type="submit" >Home</button></div>
                </a>
            </div>
        </section><!-- End About Section -->




        
        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title">
                    <h2>Contact</h2>
                </div>

                <div class="row" data-aos="fade-in">

                    <div class="col-lg-5 d-flex align-items-stretch">
                        <div class="info">
                            <div class="address">
                                <i class="icofont-google-map"></i>
                                <h4>Location:</h4>
                                <p><?=$data['location']?></p>
                            </div>

                            <div class="email">
                                <i class="icofont-envelope"></i>
                                <h4>Email:</h4>
                                <p><a href="mailto:<?=$data['emailid']?>"><?=$data['emailid']?></a></p>
                            </div>

                            <div class="phone">
                                <i class="icofont-phone"></i>
                                <h4>Call:</h4>
                                <p><?=$data['mobile']?></p>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                        <form action="include/message.php" method="post" role="form" class="php-email-form">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Your Name</label>
                                    <input type="text" name="name" class="form-control" id="name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <div class="validate"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">Your Email</label>
                                    <input type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="Please enter a valid email" />
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Subject</label>
                                <input type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <label for="name">Message</label>
                                <textarea class="form-control" name="message" id="message" rows="10" data-rule="required" data-msg="Please write something for us"></textarea>
                                <div class="validate"></div>
                            </div>
                            <div class="mb-3">
                                <div class="loading">Loading</div>
                                <div class="bg-success error-message"></div>
                                <div class="sent-message"></div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div>
<!--
                    
-->

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
<!--
            <div class="copyright">
                &copy; Copyright <strong><span>iPortfolio</span></strong>
            </div>
-->
            <div class="credits">
                Developed by <a href="#">Aman Singh</a>
            </div>
        </div>
    </footer><!-- End  Footer -->

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counterup/counterup.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/typed.js/typed.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <script>
        if (window.self == window.top) {
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o), m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '../../../../www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-55234356-4', 'auto');
            ga('send', 'pageview');
        }

    </script>
</body>
</html>
