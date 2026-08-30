<?php 
include 'header.php';

$username = "aavpubli";
$password = "jatinr33";
$database = "aavpubli_home";

$mysqli = new mysqli("localhost:3306", $username, $password, $database);
if(isset($_POST['submit']))
{ 
  $type='userheader';
    if($_POST['select']==$type){
        $subject= $_POST['subject'];
        $txt= $_POST['msg'];
        $sql = "UPDATE mailing SET userheader='".$subject."' , usermsg='".$txt."' ";
        if ($mysqli->query($sql) === TRUE) {
                dialog();
          }
            
    } else {
      $subject= $_POST['subject'];
      $txt= $_POST['msg'];
      $sql = "UPDATE mailing SET reviewerheader='".$subject."' , reviewermsg='".$txt."' ";
      if ($mysqli->query($sql) === TRUE) {
        dialog();
              } 
    }
    
}



?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Mail editor</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    
       
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Mail Submit</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" class="form-horizontal"  method="post" enctype="multipart/form-data"  >
                <div class="card-body">
                  <div class="form-group">
                  <label>Select</label>
	<div class="form-width">
	<i class="fa fa-book" aria-hidden="true"></i>
     <select name="select" class="form-control" required>
                  <option value="" selected="selected">Select Mailing type</option>
                  <option value="userheader">User Uploading Message</option>
                  <option value="reviewerheader">Act as Reviewer Message</option>
                  
                </select>
	</div>
                    <label for="exampleInputEmail1">Subject Of Mail</label>
                    <input type="text" name="subject" class="form-control"  placeholder="Subject" required>
                    <label for="exampleInputEmail1">Message</label>
                    <input type="text" name="msg" class="form-control"  placeholder="Enter Message here" required >
                 
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
          
          
          <?php
          function dialog(){
    
    
              echo '
              <script type="text/javascript">
              
              $(document).ready(function(){
              
                  swal("Success!", "Your Data Updated Successfully", "success").then(function() {
                      window.location = "mails.php";
                  });
              });
              
              </script>
              ';

}
?>