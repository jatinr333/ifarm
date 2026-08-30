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
                    <h1 class="m-0 text-dark">Dashboard </h1>
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
                            <th>Pages</th>

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
                        $query = "SELECT * FROM currentfiles ORDER BY id desc";
                        if ($result = $mysqli->query($query)) {

                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <tr id="<?php echo $row['id']; ?>" ?>
                                    <td><b><?php echo $row['id'] ?></b></td>

                                    <td><?php echo $row['title'] ?></td>
                                    <td><?php echo $row['cname'] ?></td>
                                    <td><?php echo $row['pages'] ?></td>
                                    <td><?php $newDate = date("d-m-Y", strtotime($row['ctime']));
                                        echo $newDate;  ?></td>
                                    <input type="hidden" id="file" value="<?php echo $row['cfile'] ?>">
                                    <td><a href="../uploads/<?php echo $row['cfile'] ?>" target="_blank">view file</a></td>
                                    <td><a href='cedit.php?id=<?php echo $row['id'] ?>' class="botn ">Edit </a>&nbsp;&nbsp;
                                        <button class="btn btn-danger btn-sm remove">Delete</button>
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
            <a href="javascript:void(0)" class="btn btn-sm btn-info float-right">View All </a>
        </div>
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->


</div>
<!--/. container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
<script type="text/javascript">
    $(".remove").click(function() {
        var id = $(this).parents("tr").attr("id");


        if (confirm('Are you sure to remove this record and the file associated with it ?')) {
            $.ajax({
                url: 'delete2.php',
                type: 'GET',
                data: {
                    id: id,
                    file: $("#file").val()
                },
                error: function() {
                    alert('Something is wrong Contact Jatin !!');
                },
                success: function(data) {

                    $("#" + id).remove();
                    swal("Success!", "Data And File Removed Successfully", "success")
                }
            });
        }
    });
</script>
<!-- Main Footer -->
<footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="index.php">IndianFarmer.net</a>.</strong>
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

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->


<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script>
</body>

</html>