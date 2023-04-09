<?php 
// Include visitor log script 
include_once '../include/log.php';


require_once "test/controllerUserData.php";



include('../include/db.php'); 
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
    <link href="../assets/img/<?=$data['icon']?>" rel="icon">
    <link href="../assets/img/<?=$data['icon']?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">


	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap-social.css" rel="stylesheet" type="text/css">	
	<link href="css/templatemo_style.css" rel="stylesheet" type="text/css">	


</head>

<body>
  
      <!-- ======= Header ======= -->
      <?php include('include/header.php'); ?>



    <main id="main" class="templatemo-bg-gray">

        <section>




  <h1 class="margin-bottom-15">Create Account</h1>
	<div class="container">
		<div class="col-md-12">		
      
    
            <!-- sign up form start -->
			
      
      <form class="form-horizontal templatemo-create-account templatemo-container" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                  <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                  ?>
				<div class="form-inner">
					<div class="form-group">
			          <div class="col-xs-6">		          	
			            <label for="first_name" class="control-label">Name</label>
			            <input type="text" class="form-control" name="name" placeholder="Enter Full Name" required value="<?php echo $name ?>">	            		            		            
			          </div>             
			        </div>
			        <div class="form-group">
			          <div class="col-xs-6">		          	
			            <label for="username" class="control-label">Email</label>
			            <input type="email" class="form-control" name="email" placeholder="Enter The Email" required value="<?php echo $email ?>">	           		            		            
			          </div>              
			        </div>			
			        <div class="form-group">
			          <div class="col-xs-6">
			            <label for="password" class="control-label">Password</label>
			            <input type="password" class="form-control" name="password" placeholder="Enter The Password" required>
			          </div>
			        </div>
              <div class="form-group">
			          <div class="col-xs-6">
			            <label for="password" class="control-label">Password</label>
			            <input type="password" class="form-control" name="cpassword" placeholder="Confirm The Password" required>
			          </div>
			        </div>
			        <div class="form-group">
			          <div class="col-xs-6">
			            <label><input type="checkbox">I agree to the <a href="#" data-toggle="modal" data-target="#templatemo_modal">Terms of Service</a> and <a href="#">Privacy Policy.</a></label>
			          </div>
			        </div>
			        <div class="form-group">
			          <div class="col-xs-6">
			            <input type="submit" name="signup" value="Signup"  class="btn btn-info">
			            <a href="index.php" class="pull-right">Login</a>
			          </div>
			    </div>	
				</div>				    	
		  </form>
	      

      <!-- sign up from end here -->
		</div>
	</div>
  	


  </section>



        

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="credits">
                Developed by <a href="../#about">Aman Singh</a>
            </div>
        </div>
    </footer><!-- End  Footer -->

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>
    <script src="../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="../assets/vendor/counterup/counterup.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/venobox/venobox.min.js"></script>
    <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="../assets/vendor/typed.js/typed.min.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

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
