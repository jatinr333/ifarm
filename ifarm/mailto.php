<?php 
include 'header.php';
ob_start();
if(isset($_GET['mail'])){

    $amail=$_GET['mail'];
    
    
    
    }else {
        header('Location : index.php');
    }
if(isset($_POST['submit']))
{
    
    $subject= $_POST['subject'];
    $txt= $_POST['msg'];
$headers = "From: admin@aavpublisher.com" ;
               
           $result= mail($amail,$subject,$txt,$headers);
            if(!$result) {   
                echo "Error";   
           } else {
            echo '
            <script type="text/javascript">
            
            $(document).ready(function(){
            
                swal("Success!", "Your Mail to '.$amail.' Is successfull", "success").then(function() {
                    window.location = "index.php";
                });
            });
            
            </script>
            ';
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
      <h1 class="m-0 text-dark">Send Mail</h1>
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
              <form action="" class="form-horizontal"  method="post"   >
                <div class="card-body">
                  <div class="form-group">
                  <label for="exampleInputEmail1">Mail</label>
                    <input type="text" value="<?php echo $amail;?>" name="mail" class="form-control"  placeholder="Enter mail" required>
                  </div>

                    <label for="exampleInputEmail1">Subject Of Mail</label>
                    <input type="text" name="subject" class="form-control"  placeholder="Subject" required>
                   
                    <div class="form-group">
                        <label>Message</label>
                        <textarea class="form-control" rows="5" name="msg" placeholder="Enter ..."></textarea>
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