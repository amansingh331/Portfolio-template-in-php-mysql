<?php 
// Include visitor log script 
include_once '../include/log.php';


include_once("../include/db.php");
$query = "SELECT * FROM basic_setup,personal_setup,aboutus_setup,chat_info";
$runquery = mysqli_query($db,$query);
if(!$db){
    header("location:index-2.html");
}
$data = mysqli_fetch_array($runquery);





// this is for getting the data from database of user
require_once "test/controllerUserData.php";

$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($db, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: index.php');
}






?>




<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Aman Singh -->Dashbaord</title>
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


	<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs" >
      <div class="container">
        <?php
         if(isset($_GET['msg'])){
             
  if($_GET['msg']=='updated'){
      ?>
      <div class="alert alert-success text-center" role="alert">
  Successfully Upload ! <br>
  thank you for using this feature, system will notify you through the mail after the process completed!
</div>
      <?php
            } else{?>
                  <div class="alert alert-danger text-center" role="alert">
  failed to upload, Please try again !
</div>

           <?php } 
            } 
            ?> 
        <div class="d-flex justify-content-between align-items-center">
          <h2>Dashbaord Page</h2>
          <ol>
            <li><a href="../index.php">Home</a></li>
            <li>Dashbaord Page</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

	<section class="inner-page">
      <div class="container"><h2>
        <p>
          welcome to the dashbaord <?php echo $fetch_info['name'] ?> <br>
		  your email = <?php echo $fetch_info['email'] ?>
        </p></h2>
		<h1>I'm working on, to make dashbaord look great</h1>
        <?php
                   if ($fetch_info['chat_ready']=='yes') {?>
                       <h2><a href="project1/chat.php?chat_table_name=<?=$fetch_info['chat_table_name']?>&name=<?=$fetch_info['name']?>&chat_user2=<?=$fetch_info['chat_user2']?>">chat link here</a></h2>
                  <?php }?>


        <form method="POST" action="project1/upload.php" enctype="multipart/form-data">

          <div class="upload-wrapper">
            <label for="file-upload" class="control-label">upload chat file</label><input type="file"  name="uploadedFile" class="form-control" required></label>
          </div>
          <input type="hidden" name="chat_user_id" value="<?php echo $fetch_info['id'] ?>" />
          <input type="hidden" name="chat_user_email" value="<?php echo $fetch_info['email'] ?>" />
          <input type="submit" name="uploadBtn" value="Upload" class="btn btn-primary"/>
        </form>
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
