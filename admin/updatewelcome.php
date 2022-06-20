<?php
   include 'navbar.php';
    ?>
<?php

$seri_id=$_GET['updatewelcome'];

 if (isset($_POST['update'])){
      
   $target="assets/images/".basename($_FILES['image']['name']);

   $image=$_FILES['image']['name'];
   
   $title=$_POST['title'];
   $description=$_POST['description'];
    if($image==''){
       $sql=mysqli_query($conn,"UPDATE firstpage SET title='$title', description='$description' WHERE id=$seri_id;");
    }else{
   $sql=mysqli_query($conn,"UPDATE firstpage SET title='$title', description='$description', image='$image' WHERE id=$seri_id;");
 }
   if ($sql) {
           
       if (move_uploaded_file($_FILES['image']['tmp_name'],$target)){    
           $successmessage .='update  Successefully';  
       }
       else{    
        $successmessage .='update  Successefully'; 
           }
   }
   else {
    $errormessage .='upload photo failed! failed';  
   }
   
}
    
?>
   
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          
          <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body">
                           <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-5">
                            <div class="section-block">
                                <h5 class="section-title">Welcome Page</h5>
                            </div>
                            <div class="tab-regular">
                                <ul class="nav nav-tabs nav-fill" id="myTab7" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab-justify" data-toggle="tab" href="#home-justify" role="tab" aria-controls="home" aria-selected="true">Add Content</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent7">
                                    <div class="tab-pane fade show active" id="home-justify" role="tabpanel" aria-labelledby="home-tab-justify">
                                  
                                  <?php
                                                if (isset($_GET['updatewelcome'])) {
                                                    $recp_id=$_GET['updatewelcome'];
                                                    $quer=mysqli_query($conn,"SELECT * FROM firstpage WHERE firstpage.id=$recp_id");
                                                    while ($row=mysqli_fetch_array($quer)){
                      
                                                        ?>  
                                       <form action="" method="POST" enctype="multipart/form-data">
                                                        
                                                        
                                                    <?php
                                                            if ( isset($successmessage)) {
                                                                echo '
                                                                                
                                                                    <div class="card-body">
                                                                    <ul class="list-group">
                                                                    <li class="list-group-item list-group-item-success">'.$successmessage.'</li>
                                                                    </ul>
                                                                    </div>
                                                                ';
                                                            }
                                                            ?>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="inputText3" class="col-form-label">Title</label>
                                                                <input  type="text" name="title" value="<?php echo $row['title']; ?>"  id="inputText3" class="form-control">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="inputText3" class="col-form-label">Choose photo</label>
                                                                <input  type="file"  name="image" value="<?php echo $row['image']; ?>" id="inputText3" class="form-control">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="exampleFormControlTextarea1">Description</label>
                                                                <textarea name="description" id="editor1" class="form-control" >
                                                                <?php echo $row['description']; ?>
                                                                    </textarea>
                                                            <br>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input  type="submit" name="update" value="Update" class="btn btn-warning" style="width: 100%;background-color:orange;">
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <?php
                                                    }
                                                }
                                                    ?>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                        </div>
                </div>        
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="footer-inner-wraper">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © ANDA2022</span>
              </div>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/jquery-circle-progress/js/circle-progress.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>