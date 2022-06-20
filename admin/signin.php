<?php

include '../connection.php';

if (isset($_POST['login'])) {
   
    session_start();

	$email=$_POST['email'];
	$password=$_POST['password'];
	$email=stripcslashes($email);
	$password=stripcslashes($password);
	$email=mysqli_real_escape_string($conn,$email);
	$password=mysqli_real_escape_string($conn,$password);
    
	if (empty($email) || empty($password)) {
		header("location:signin.php?empty=Email and Password are required");
	}
	else {
		$select=mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND password='$password' ") or die(mysqli_error($conn)) ;
		
        if (mysqli_num_rows($select)>0) {

	        session_regenerate_id();
	        $verfied=mysqli_fetch_assoc($select); 

	        $_SESSION['userid']=$verfied['id'] ;
	        $_SESSION['userusername']=$verfied['username'] ;
	        $_SESSION['useremail']=$verfied['email'] ;
	        $_SESSION['userphone']=$verfied['phone'] ;
	        $_SESSION['userpassword']=$verfied['password'] ;
          $_SESSION['userrole']=$verfied['role'] ;
	        session_write_close();
                
            header("location:index.php");
		}
		else {
            $errormessage .='You do not have account';			
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ANDA |Admin Sign In</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="./img/svg/logo.svg" type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/style.min.css">
</head>

<body>
<main class="page-center">
  <article class="sign-up">
    <h1 class="sign-up__title">Welcome back!</h1>
    <p class="sign-up__subtitle">Sign in to your account to continue</p>
    <form class="sign-up-form form" action="" method="POST">
    <?php       
							if ( isset($errormessage)) {
							echo '
									<div class="bg-red-400 p-4">
										<div class="breadcrumb-header">
											<span>'.$errormessage.'</span>
										</div>
									</div>
							';
							}
						?>  
      <label class="form-label-wrapper">
        <p class="form-label">Email</p>
        <input class="form-input" type="email" name="email" placeholder="Enter your email" required>
      </label>
      <label class="form-label-wrapper">
        <p class="form-label">Password</p>
        <input class="form-input" type="password" name="password" placeholder="Enter your password" required>
      </label>
      <a class="link-info forget-link" href="##">Forgot your password?</a>
      <label class="form-checkbox-wrapper">
        <input class="form-checkbox" type="checkbox" required>
        <span class="form-checkbox-label">Remember me next time</span>
      </label>
      <button class="form-btn primary-default-btn transparent-btn" type="submit" name="login" style="background-color:orange;">Sign in</button>
    </form>
  </article>
</main>
<!-- Chart library -->
<script src="./plugins/chart.min.js"></script>
<!-- Icons library -->
<script src="plugins/feather.min.js"></script>
<!-- Custom scripts -->
<script src="js/script.js"></script>
</body>

</html>