<?php
include 'header.php'; 



?>

    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User Submitted Manuscripts </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

  

            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Journals</h3>

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
                     
                      <th>Journal name</th>
                      <th>Author name</th>
                      <th>Author email</th>
                      <th>Transation Id</th>
                      
                      <th>Date and time</th>
                      <th>File</th>
                      <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    <?php 
                    $username = "jatinr";
                    $password = "jatinr33";
                    $database = "aavpubli_farm";
                    $mysqli = new mysqli("localhost:3306", $username, $password, $database);
                    $query = "SELECT * FROM ufiles ORDER BY id desc LIMIT 10";
                    if ($result = $mysqli->query($query)) {

                        while ($row = $result->fetch_assoc()) {
                          ?>
                           <tr id="<?php echo $row['id']; ?>" ?>
                      <td><a href="#"><?php echo $row['id'] ?></a></td>
                    
                      <td><?php echo $row['mtitle'] ?></td>
                      <td><?php echo $row['aname'] ?></td>
                      <td><a href ='mailto.php?mail=<?php echo $row['email'] ?>'><?php echo $row['email'] ?></a></td>
                      <input type="hidden" id="file" value="<?php echo $row['jfile'] ?>">
                      <td><?php echo $row['trans'] ?></td>      
                      <td><?php echo $row['jdate'] ?></td>
                      <td><a href="../useruploads/<?php echo $row['jfile'] ?>" target="_blank">view file</a></td>
                      <td>              <button class="btn btn-danger btn-sm remove">Delete</button>
                                    </td>
                     
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
                  <a href="javascript:void(0)" class="btn btn-sm btn-info float-right">View All Orders</a>
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
    <strong>Copyright &copy; 2020 <a href="index.php">Indianfarmer</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Designed By</b> 𝓙𝓪𝓽𝓲𝓷
    </div>
  </footer>
</div>
<!-- ./wrapper -->
<script type="text/javascript">
    $(".remove").click(function() {
        var uid = $(this).parents("tr").attr("id");


        if (confirm('Are you sure to remove this record and the file associated with it ?')) {
            $.ajax({
                url: 'delete2.php',
                type: 'GET',
                data: {
                    uid: uid,
                    file: $("#file").val()
                },
                error: function() {
                    alert('Something is wrong Contact Jatin !!');
                },
                success: function(data) {

                    $("#" + uid).remove();
                    swal("Success!", "Data And File Removed Successfully", "success")
                }
            });
        }
    });
</script>
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

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

<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script>
</body>
</html>
