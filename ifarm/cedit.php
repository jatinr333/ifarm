<?php
include 'header.php'; 
ob_start();


                                        
$username = "jatinr";
$password = "jatinr33";
$database = "aavpubli_farm";

$mysqli = new mysqli("localhost:3306", $username, $password, $database);
if(!isset($_GET['id'])){
    header("Location: index.php");
}else
{
  $id=  $_GET['id'];
}
// if(isset($_POST['submit'])){
//     $title=$_POST['title'];
//     $cname=$_POST['cname'];
//     $date=$_POST['ctime'];


//     $sql = "UPDATE currentfiles SET title='.$title.' , cname='.$cname.' , ctime='.$date.' WHERE id='$id' ";
//     if ($mysqli->query($sql) === TRUE) {
//         echo "Record updated successfully";
//       } else {
//         echo "Error updating record: " . $conn->error;
//       }
      
//       $conn->close();
// }

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
                <h3 class="card-title">Edit</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="submitedit.php" class="form-horizontal"  method="post"  enctype="multipart/form-data" >
                <div class="card-body">
                  <div class="form-group">
                   <?php 

                    
                    $query = "SELECT * FROM currentfiles WHERE id='$id' ";
                    if ($result = $mysqli->query($query)) {

                        while ($row = $result->fetch_assoc()) { ?>
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" name="title" class="form-control" value="<?php echo $row['title'] ?>">
                  </div>
                  <div class="form-group">
                    <label >Author Name</label>
                    <input type="text" class="form-control" name="name"  value="<?php echo $row['cname'] ?>">
                  </div>
                                    <input name="id" type="hidden" value="<?php echo $row['id'] ?>">
                  <div class="form-group" >
                    <label >Date of Journal</label>
                    <input class="form-control" type="text" value="<?php echo $row['ctime'] ?>" name="date" id="datepicker-1" >
                  </div>
                  
                  <div class="form-group" >
                    <label >Pages</label>
                    <input class="form-control" type="text" value="<?php echo $row['pages'] ?>" name="pages" id="datepicker-1" >
                  </div>
                  <br>
                        
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            <!-- Form Element sizes -->
            
          </div><?php }}?>



          <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="index.php">Aavpublisher.com</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Designed By</b> 𝓙𝓪𝓽𝓲𝓷
    </div>
  </footer>
</div>

<!-- ./wrapper -->