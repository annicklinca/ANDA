<?php
   include 'navbar.php';
    ?>
    <?php

if (isset($_POST['add'])){
      
   $target="assets/images/".basename($_FILES['image']['name']);
   $title=$_POST['title'];
   $image=$_FILES['image']['name'];
   
 
   $description=$_POST['description'];

   if (move_uploaded_file($_FILES['image']['tmp_name'],$target)){
       $sql=mysqli_query($conn,"INSERT INTO firstpage VALUES ('','$title','$image','$description')");
       if ($sql) {
           $successmessage .='Add  Successfully';  
       }
       else {
           $errormessage .='Add  failed!'.$conn->error;     
       }    
   }
   else{
       $errormessage .='Add  failed! Try Again';
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
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab-justify" data-toggle="tab" href="#profile-justify" role="tab" aria-controls="profile" aria-selected="false">All content</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent7">
                                    <div class="tab-pane fade show active" id="home-justify" role="tabpanel" aria-labelledby="home-tab-justify">
                                       
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
                                                            <?php
                                                            if ( isset($errormessage)) {
                                                            echo '
                                                            <div class="card-body">
                                                            <ul class="list-group">
                                                            <li class="list-group-item list-group-item-success">'.$errormessage.'</li>
                                                            </ul>
                                                            </div>
                                                            ';
                                                            }
                                                            ?>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="inputText3" class="col-form-label">Title</label>
                                                                <input  type="text" name="title" id="inputText3" class="form-control">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="inputText3" class="col-form-label">Choose photo</label>
                                                                <input  type="file"  name="image" id="inputText3" class="form-control">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="exampleFormControlTextarea1">Description</label>
                                                                <textarea name="description" id="editor1" class="form-control" >
                                                                    </textarea>
                                                            <br>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input  type="submit" name="add" value="Add" class="btn btn-warning" style="width: 100%;background-color:orange;">
                                                            </div>
                                                        </div>
                                                    </form>
                                    </div>
                                    <div class="tab-pane fade" id="profile-justify" role="tabpanel" aria-labelledby="profile-tab-justify">
                                    <div class="table-responsive">
                                                   <table id="zero_config" class="table  table-bordered no-wrap">
                                                     <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>photo</th>
                                                                    <th>Title</th>
                                                                    <th>Description</th>
                                                                    <th>Delete</th>
                                                                    <th>Update</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            
                                                    <?php
                                                        $quer=mysqli_query($conn,"SELECT * FROM firstpage");
                                                        while ($row=mysqli_fetch_array($quer)){
                                                        ?>    
                                                             
                                                        <tr>
                                                            <td><?php echo $row['id'] ; ?></td>
                                                            <td><?php echo "<img style='width: 100px;' src='assets/images/".$row['image']."'> "; ?></td>
                                                            <td><?php echo $row['title'] ; ?></td>
                                                            <td><?php echo $row['description'] ; ?></td>
                                                            <td><a class="btn btn-danger"  href="delete.php?delfirstpage=<?php echo $row['id']; ?> " onclick="return confirm('are you sure! you want to delete this abount content.')" id="red">Delete</a></td>
                                                            <td><a class="btn btn-primary"  href="updatewelcome.php?updatewelcome=<?php echo $row['id']; ?>"  id="red">Update</a></td>
                                                        </tr>
                                                        <?php
                                                            }
                                                            ?>
                                                            </tbody>
                                                        </table>
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