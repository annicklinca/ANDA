
<?php
 
 include '../connection.php';
   
 session_start();
   
 $admin_id=$_SESSION['userid'];
 $admin_username=$_SESSION['userusername'];
 $admin_email=$_SESSION['useremail'];
 $admin_phone=$_SESSION['userphone'];
 $admin_password=$_SESSION['userpassword'];
 $admin_role=$_SESSION['userrole'];
 
 $sel=$conn->query("SELECT * FROM users where email='$admin_email' and role='admin' ");
 while($rows=mysqli_fetch_array($sel)){
   $us=$rows['email']; $role=$rows['role'];
 }

  if ($admin_email=='' or $role !='admin') {
  echo "<script>window.location.replace('signout.php')</script>";
  }


 ?>