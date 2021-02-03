<?php

require './class/database_connection.php';
//$selectq = mysqli_query($database_connection, "select * from tbl_doctor") or die(mysqli_error($database_connection));

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Doctor Table</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php
  include './themepart/top-menu.php';
  ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
  include './themepart/sidebar.php';
  ?>

 <!--****************************Doctor tables -->
 
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Doctor Table</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="./home_page.php">Home</a></li>
              <li class="breadcrumb-item active">Doctor Table</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Doctor Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Start time</th>
                    <th>End time</th>
                    <th>Fees</th>
                    <th>Degree</th>
                    <th>Experience</th>
                    <th>Phone no</th>
                    <th>Speciality</th>
                    <th>Option</th>
                  </tr>
                  </thead>
                  
                  <tbody>
                      <?php
                      
                      if(isset($_GET['did']))
                      {
                          $did = $_GET['did'];
                          $deleteq = mysqli_query($database_connection, "delete from tbl_doctor where doctor_id ='{$did}'") or die (mysqli_error($database_connection));
                          
                          if($deleteq)
                          {
                              echo "<script>alert('Record Deleted');</script>";
                          }
                      }
                  
                  $selectq = mysqli_query($database_connection, "select * from tbl_doctor") or die(mysqli_error($database_connection));
                  $count = mysqli_num_rows($selectq);
                  echo "<b>".$count."</b>" . "<b> Records Found</b>";        
while($doctorrow = mysqli_fetch_array($selectq))
{
    echo "<tr>";
    echo "<td>{$doctorrow['doctor_id']}</td>";
    echo "<td>{$doctorrow['doctor_name']}</td>";
    echo "<td>{$doctorrow['doctor_email']}</td>";
    echo "<td>{$doctorrow['d_start_time']}</td>";
    echo "<td>{$doctorrow['d_end_time']}</td>";
    echo "<td>{$doctorrow['doctor_fees']}</td>";
    echo "<td>{$doctorrow['doctor_degree']}</td>";
    echo "<td>{$doctorrow['doctor_experience']}</td>";
    echo "<td>{$doctorrow['doctor_phone']}</td>";
    echo "<td>{$doctorrow['speciality_id']}</td>";
    echo "<td><a href=''><img style='width:18px' src='myimages/edit.png'></a>   |   <a href='table-database.php?did={$doctorrow['doctor_id']}'><img style='width:18px' src='myimages/delete.png'></a></td>";
    echo "</tr>";
}
                  
                  ?>
                  <tr>
                    <td>Other</td>
                    <td>All others</td>
                    <td>-</td>
                    <td>-</td>
                    <td>U</td>
                  </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Doctor Name</th>
                    <th>E-mail</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

 <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
