<?php
include '../connection.php';

if (isset($_GET['delfirstpage'])){
    $del_welcome=$_GET['delfirstpage'];
    $del_quer=mysqli_query($conn,"DELETE FROM firstpage WHERE id='$del_welcome' ");  
    if ($del_quer) {
        echo '
        <script type="text/javascript">alert(" Deleted, Successfully!")</script>
        
        ';
        header("location:welcome.php");
    }
    else {
        echo '
        <script type="text/javascript">alert(" not Deleted,!")</script>
        
        ';
        header("location:welcome.php");
    }
}
?>