<?php
session_start();
error_reporting(0);
include('includes/config.php');

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>Paintings Portal Home Page</title>

	    <!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    
	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/green.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

		
		<link rel="stylesheet" href="assets/css/config.css">

		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/images/favicon.ico">

	</head>
    <body class="cnt-home">
	
		
	
		<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">
<?php include('includes/top-header.php');?>
<?php include('includes/main-header.php');?>
<?php include('includes/menu-bar.php');?>
</header>

<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-xs" id="top-banner-and-menu">
	<div class="container">
		<div class="furniture-container homepage-container">
		<div class="row">
		
			<div class="col-xs-12 col-sm-12 col-md-3 sidebar">
				<!-- ================================== TOP NAVIGATION ================================== -->
	<?php include('includes/side-menu.php');?>
<!-- ================================== TOP NAVIGATION : END ================================== -->
			</div><!-- /.sidemenu-holder -->	
			
			<div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
				<!-- ========================================== SECTION – HERO ========================================= -->
<div id="hero" class="homepage-slider3">
	<div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
	
	   <div class="full-width-slider">
			<div class="item full-width-slider" style="background-image: url(admin/paintingImages/19040.jpg);">
			</div><!-- /.item -->
		</div><!-- /.full-width-slider -->		
	    
	    <div class="full-width-slider">
			<div class="item full-width-slider" style="background-image: url(admin/paintingImages/02030.jpg);">
			</div><!-- /.item -->
		</div><!-- /.full-width-slider -->
		
		<div class="full-width-slider">
			<div class="item full-width-slider" style="background-image: url(admin/paintingImages/05010.jpg);">
			</div><!-- /.item -->
		</div><!-- /.full-width-slider -->
		
		<div class="full-width-slider">
			<div class="item full-width-slider" style="background-image: url(admin/paintingImages/06020.jpg);">
			</div><!-- /.item -->
		</div><!-- /.full-width-slider -->
		
		<div class="full-width-slider">
			<div class="item full-width-slider" style="background-image: url(admin/paintingImages/14010.jpg);">
			</div><!-- /.item -->
		</div><!-- /.full-width-slider -->
		
		<div class="full-width-slider">
			<div class="item full-width-slider" style="background-image: url(admin/paintingImages/14020.jpg);">
			</div><!-- /.item -->
		</div><!-- /.full-width-slider -->
		
		<div class="full-width-slider">
			<div class="item full-width-slider" style="background-image: url(admin/paintingImages/17010.jpg);">
			</div><!-- /.item -->
		</div><!-- /.full-width-slider -->
		
		<div class="full-width-slider">
			<div class="item full-width-slider" style="background-image: url(admin/paintingImages/19070.jpg);">
			</div><!-- /.item -->
		</div><!-- /.full-width-slider -->
		
		<div class="full-width-slider">	
			<div class="item" style="background-image: url(admin/paintingImages/01080.jpg);">
				<!-- /.container-fluid -->
			</div><!-- /.item -->
		</div><!-- /.full-width-slider -->	

	</div><!-- /.owl-carousel -->
</div>
				

			</div><!-- /.homebanner-holder -->
			
		</div><!-- /.row -->

		
     </div>
</div>
<?php include('includes/footer.php');?>
	
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
	
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	
	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>

	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	
	<script>
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>
		

</body>
</html>