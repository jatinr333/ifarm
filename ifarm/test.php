<?php
include 'header.php'; 
ob_start();
$id=$_GET['id'];
if(!isset($id)){
    header("Location: index.php");
}


?>

      <!-- Javascript -->
      <script>
         $(function() {
            $( "#datepicker-1" ).datepicker({
    dateFormat: 'yy-mm-dd'
});
         });
      </script>
 </head>
<!-- Sidebar Menu -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Publishing Issues</h1>
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
                <h3 class="card-title">Current Issue Submit</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="submitfile.php" class="form-horizontal"  method="post"  enctype="multipart/form-data" >
                <div class="card-body">
                  <div class="form-group">
    <label>Select the Journal</label>
	<div class="form-width">
	<i class="fa fa-book" aria-hidden="true"></i>
     <select name="jtype" class="form-control" required>
                  <option value="" selected="selected">Select Journal</option>
                  <option value="Journal of Tropical Animal Research">Journal of Tropical Animal Research</option>
                  <option value="Journal of Asian Agriculture">Journal of Asian Agriculture</option>
                  <option value="Asian Journal of Dairy Science">Asian Journal of Dairy Science</option>
                  <option value="Asian Journal of Fisheries Research">Asian Journal of Fisheries Research</option>
                 
                </select>
	</div>
 

                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" name="title" class="form-control"  placeholder="Enter Title of Journal/Issue">
                  </div>
                  <div class="form-group">
                    <label >Author Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Full Name">
                  </div>

                  <div class="form-group" >
                    <label >Date of Journal</label>
                    <input class="form-control" type="text" name="date" id="datepicker-1" >
                  </div>
                  
                  <br>
                  <div class="form-group">
                    <label for="exampleInputFile">Your File</label>
                    <div class="input-group">
                      <div class="custom-file">
                      <input type="file" name="file" onchange="validate_file(this.id, this.value)"  >
                   
                    </div>
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
