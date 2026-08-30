<?php
include 'header.php'; 

if(isset($_GET['file']))
{
    $journal=$_GET['file'];
}else{
$journal="All Reviewers";
}
?>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
            <?=$journal;?>
              </p>
            </a>
            
          </li>
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Files </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">  <?=$journal;?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->


            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">  <?=$journal;?></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Ref ID</th>
                      <th>Journal Type</th>
                      <th>Author name</th>
                      <th>Author email</th>
                      <th>Area of reserach</th>
                      <th>Remarks</th>
                      <th>Date and time</th>
                      <th>File</th>
                      <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    <?php 
                    
                  
                    
                    $mysqli = new mysqli("localhost:3306", "aavpubli", "jatinr33", "aavpubli_home");
                   
                      $query = "SELECT * FROM actfiles ORDER BY id desc";
                   
                    if ($result = $mysqli->query($query)) {

                        while ($row = $result->fetch_assoc()) {
                          ?>
                          <tr id="<?php echo $row['id']; ?>"?>
                      <td><a href="#"><?php echo $row['id'] ?></a></td>
                      <td ><?php echo $row['journal'] ?></td>
                      <td><?php echo $row['aname'] ?></td>
                      <td><?php echo $row['email'] ?></td>
                      <td><?php echo $row['research'] ?></td>
                      <td><?php echo $row['remark'] ?></td>
                      <td><?php echo $row['actdate'] ?></td>
                      <input type="hidden" id = "file" value="<?php echo $row['afile'] ?>">
                      <td><a href="../actuploads/<?php echo $row['afile'] ?>" target="_blank">view file</a></td>
                      <td><button class="btn btn-danger btn-sm remove">Delete</button></td>
                     
                    </tr>
                      <?php
                         }
                         }
                      ?>
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
               </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->


      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="index.php">Aavpublisher.com</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Designed By</b> 𝓙𝓪𝓽𝓲𝓷
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- delete script -->
<script type="text/javascript">
    $(".remove").click(function(){
        var id = $(this).parents("tr").attr("id");


        if(confirm('Are you sure to remove this record and the file associated with it ?'))
        {
            $.ajax({
               url: 'delete.php',
               type: 'GET',
               data: {actid: id, file:  $("#file").val()},
               error: function() {
                  alert('Something is wrong Contact Jatin');
               },
               success: function(data) {
                
                    $("#"+id).remove();
                    swal("Success!", "Data Removed", "success")
               }
            });
        }
    });


</script>
<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script>
</body>
</html>