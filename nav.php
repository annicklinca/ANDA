<?php 

include 'connection.php';

if(isset($_POST['sendmessage'])){
  $name=$_POST['username'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $messages=addslashes($_POST['message']);
  $to = "info@bekacomfortbbehavioral.com";
  $subject = "Contact us- from ".$email."";
  
  $message = "
  <html>
  <head>
  <title>Contact us mail</title>
  </head>
  <body>
  <p>Mail message from $name - email:$email - Phone: $phone</p><hr>
  <p>$messages</p>

  </body>
  </html>
  ";
  
  // Always set content-type when sending HTML email
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  
  // More headers
  $headers .= 'From: <info@truehandbehavioral.com>' . "\r\n";

  
  mail($to,$subject,$message,$headers);

  $insert=mysqli_query($conn,"INSERT INTO messages VALUES('','$name','$email','$phone','$messages',current_timestamp())");
  if($insert){ 
     echo '   
    <script>alert("Thank you!! your message sent.") </script> ';
  }
  else{
    echo '<script>alert("oops! your message not sent.") </script>';
  }

}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
  
    <title>ANDA</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
  
    <!-- Favicons -->
    <link href="assets/img/anda.jpeg" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
  
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="assets/icon/font-awesome/css/font-awesome.min.css">
  
    <link href="assets/css/style.css" rel="stylesheet">
  
  </head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">

      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-phone d-flex align-items-center"><span>+250 788* *** **</span></i>
        <i class="bi bi-clock d-flex align-items-center ms-4"><span> Mon-Sund:11AM - 3PM</span></i>
      </div>

      <div class="languages d-none d-md-flex align-items-center">
        <ul>
          <li>En</li>
          <li><a href="#">De</a></li>
        </ul>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"></h1>
      <div class="img-src"><img src="assets/img/anda.jpeg" width="150" height="100"></div>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#home">Home</a></li>
          <li><a class="nav-link scrollto" href="#lunch">Lunch</a></li>
          <li><a class="nav-link scrollto" href="#dinner">Dinner</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li>
          <li><a class="nav-link scrollto" href="#t&cs">T&Cs</a></li>
          <li><a class="nav-link scrollto" href="#about">About Us</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact Us</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->