<?php
include 'header.php';



?>
<?php  
  
  include("db.php");  
   
  if(isset($_POST['submit']))  
  {  
      $pass=$_POST['pass'];  
      $pass2=$_POST['pass2'];  
      $name=$_SESSION['name'];
    if($pass==$pass2){
      $check_user="update alogin set pass='$pass2' WHERE aname='$name'";  
    
      $run=mysqli_query($dbcon,$check_user);  
    
      if($run)  
      {  
         
        //here session is used and value of $user_email store in $_SESSION.  
            
        echo '
        <script type="text/javascript">
        
        $(document).ready(function(){
        
            swal("Success!", "Your password Updated Successfully", "success").then(function() {
                window.location = "index.php";
            });
        });
        
        </script>
        ';
      }  
      else  
      {  
        echo "<script>alert('incorrect!')</script>";  
      }  
  }  }
  ?>  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Change pass</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    
       
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Change pass</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" class="form-horizontal"  method="post"   >
                <div class="card-body">
                  <div class="form-group">
    

                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="pass" class="form-control"  placeholder="Enter pass">
                  </div>
                  <div class="form-group">
                    <label >Confirm</label>
                    <input type="text" class="form-control" name="pass2" placeholder="Confirm">
                  </div>

              
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            <!-- Form Element sizes -->
            
          </div>



          <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="index.php">Aavpublisher.com</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Designed By</b> 𝓙𝓪𝓽𝓲𝓷
    </div>
  </footer>
</div>

<script src="dist/js/pages/dashboard2.js"></script>
<!-- ./wrapper -->
