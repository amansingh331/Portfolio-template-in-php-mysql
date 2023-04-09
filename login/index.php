<?php 
// Include visitor log script 
include_once '../include/log.php';


require_once "test/controllerUserData.php";

// taking data for header info

include('../include/db.php'); 
$query = "SELECT * FROM basic_setup,personal_setup,aboutus_setup";
$runquery = mysqli_query($db,$query);
if(!$db){
    header("location:index-2.html");
}
$data = mysqli_fetch_array($runquery);



// the below one for login



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


	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet" type="text/css">
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	<link href="css/templatemo_style.css" rel="stylesheet" type="text/css">	


</head>

<body>
  


    <!-- ======= Header ======= -->
    <?php include('include/header.php'); ?>




    <main id="main" class="templatemo-bg-gray">

        <section>



        <div class="container">
		<div class="col-md-12">
			<h1 class="margin-bottom-15">Login Here</h1>




            <!-- form start  -->
			<form class="form-horizontal templatemo-container templatemo-login-form-1 margin-bottom-30" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
            <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>				
		        <div class="form-group">
		          <div class="col-xs-12">		            
		            <div class="control-wrapper">
		            	<label for="username" class="control-label fa-label"><i class="fa fa-user fa-medium"></i></label>
		            	<input type="text" class="form-control" name="email" placeholder="Email" required value="<?php echo $email ?>">
		            </div>		            	            
		          </div>              
		        </div>
		        <div class="form-group">
		          <div class="col-xs-12">
		          	<div class="control-wrapper">
		            	<label for="password" class="control-label fa-label"><i class="fa fa-lock fa-medium"></i></label>
		            	<input type="password" class="form-control" name="password" placeholder="Password" required>
		            </div>
		          </div>
		        </div>
		        <div class="form-group">
		          <div class="col-xs-12">
	             	<div class="checkbox control-wrapper">
	                	<label>
	                  		<input type="checkbox"> Remember me
                		</label>
	              	</div>
		          </div>
		        </div>
		        <div class="form-group">
		          <div class="col-xs-12">
		          	<div class="control-wrapper">
		          		<input type="submit" value="Login" name="login" class="btn btn-info"> 
		          		<a href="forgot-password.php" class="text-right pull-right">Forgot password?</a>
		          	</div>
		          </div>
		        </div>
		        <hr>
		        <div class="form-group">
		        	<div class="col-xs-12">
		        		<label>Login with: </label>
		        		<div class="inline-block">
		        			<a href="#"><i class="fa fa-facebook-square login-with"></i></a>
			        		<a href="#"><i class="fa fa-twitter-square login-with"></i></a>
			        		<a href="#"><i class="fa fa-google-plus-square login-with"></i></a>
			        		<a href="#"><i class="fa fa-tumblr-square login-with"></i></a>
			        		<a href="#"><i class="fa fa-github-square login-with"></i></a>
		        		</div>		        		
		        	</div>
		        </div>
		      </form>
              <!-- form end  -->



              <div class="text-center">
		      	<a href="signup.php" class="templatemo-create-new">Create new account <i class="fa fa-arrow-circle-o-right"></i></a>	
		      </div>
		</div>
	</div>

    </section>

        

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="credits">
                Developed by <a href="#">Aman Singh</a>
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