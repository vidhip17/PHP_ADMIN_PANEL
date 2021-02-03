<?php

require './class/database_connection.php';
//$selectq = mysqli_query($database_connection, "select * from tbl_doctor") or die(mysqli_error($database_connection));

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>All Data Tables</title>
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
<!--************************************doctor Table -->
  <!-- Content Wrapper. Contains page content -->
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
  <!--*****************************Patient table -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Patient Table</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="./home_page.php">Home</a></li>
              <li class="breadcrumb-item active">Patient Table</li>
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
                <h3 class="card-title">Patient Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Phone No</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Option</th>
                  </tr>
                  </thead>
                  
                  <tbody>
                      <?php
                      
                   if(isset($_GET['did']))
                      {
                          $did = $_GET['did'];
                          $deleteq = mysqli_query($database_connection, "delete from tbl_patient where patient_id ='{$did}'") or die (mysqli_error($database_connection));
                          
                          if($deleteq)
                          {
                              echo "<script>alert('Record Deleted');</script>";
                          }
                      }   
                  
                  $selectq = mysqli_query($database_connection, "select * from tbl_patient") or die(mysqli_error($database_connection));
                  $count = mysqli_num_rows($selectq);
                  echo "<b>".$count."</b>" . "<b> Records Found</b>";        
while($patientrow = mysqli_fetch_array($selectq))
{
    echo "<tr>";
    echo "<td>{$patientrow['patient_id']}</td>";
    echo "<td>{$patientrow['patient_name']}</td>";
    echo "<td>{$patientrow['patient_email']}</td>";
    echo "<td>{$patientrow['patient_phone']}</td>";
    echo "<td>{$patientrow['patient_age']}</td>";
    echo "<td>{$patientrow['patient_address']}</td>";
    echo "<td>{$patientrow['patient_gender']}</td>";
    echo "<td><a href=''><img style='width:18px' src='myimages/edit.png'>Edit</a> | <a href='table-database.php?did={$patientrow['patient_id']}'><img style='width:18px' src='myimages/delete.png'>Delete</a></td>";
    echo "</tr>";
}
                  
                  ?>
                  <tr>
                    <td>Other</td>
                    <td>others</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Phone No</th>
                    <th>Age</th>
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
  <!--*********************************Appointment table -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Appointment Table</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="./home_page.php">Home</a></li>
              <li class="breadcrumb-item active">Appointment Table</li>
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
                <h3 class="card-title">Appointment Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Patient Id</th>
                    <th>Doctor Id</th>
                    <th>Appointment  Time</th>
                    <th>Appointment  Date</th>
                    <th>Status</th>
                    <th>Option</th>
                  </tr>
                  </thead>
                  
                  <tbody>
                      <?php
                      
                      if(isset($_GET['did']))
                      {
                          $did = $_GET['did'];
                          $deleteq = mysqli_query($database_connection, "delete from tbl_appointment where appointment_id ='{$did}'") or die (mysqli_error($database_connection));
                          
                          if($deleteq)
                          {
                              echo "<script>alert('Record Deleted');</script>";
                          }
                      }
                  
                  $selectq = mysqli_query($database_connection, "select * from tbl_appointment") or die(mysqli_error($database_connection));
                  $count = mysqli_num_rows($selectq);
                  echo "<b>".$count."</b>" . "<b> Records Found</b>";
while($appointmentrow = mysqli_fetch_array($selectq))
{
    echo "<tr>";
    echo "<td>{$appointmentrow['appointment_id']}</td>";
    echo "<td>{$appointmentrow['patient_id']}</td>";
    echo "<td>{$appointmentrow['doctor_id']}</td>";
    echo "<td>{$appointmentrow['appointment_time']}</td>";
    echo "<td>{$appointmentrow['appointment_date']}</td>";
    echo "<td>{$appointmentrow['appointment_status']}</td>";
    echo "<td><a href=''><img style='width:18px' src='myimages/edit.png'>Edit</a> | <a href='table-database.php?did={$appointmentrow['appointment_id']}'><img style='width:18px' src='myimages/delete.png'>Delete</a></td>";
    
    echo "</tr>";
}
                  
                  ?>
                  <tr>
                    <td>Other</td>
                    <td>others</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Patient Id</th>
                    <th>Doctor Id</th>
                    <th>Appointment Time</th>
                    <th>Appointment Date</th>
                    <th>Status</th>
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
  <!-- *******************************Feedback Table-->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Feedback Table</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="./home_page.php">Home</a></li>
              <li class="breadcrumb-item active">Feedback Table</li>
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
                <h3 class="card-title">Feedback Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Feedback ID</th>
                    <th>Feedback</th>
                    <th>Date</th>
                    <th>Doctor Id</th>
                    <th>Patient Id</th>
                    <th>Option</th>
                  </tr>
                  </thead>
                  
                  <tbody>
                      <?php
                      
                      if(isset($_GET['did']))
                      {
                          $did = $_GET['did'];
                          $deleteq = mysqli_query($database_connection, "delete from tbl_feedback where feedback_id ='{$did}'") or die (mysqli_error($database_connection));
                          
                          if($deleteq)
                          {
                              echo "<script>alert('Record Deleted');</script>";
                          }
                      }
                  
                  $selectq = mysqli_query($database_connection, "select * from tbl_feedback") or die(mysqli_error($database_connection));
                  $count = mysqli_num_rows($selectq);
                  echo "<b>".$count."</b>" . "<b> Records Found</b>";
while($feedbackrow = mysqli_fetch_array($selectq))
{
    echo "<tr>";
    echo "<td>{$feedbackrow['feedback_id']}</td>";
    echo "<td>{$feedbackrow['feed_details']}</td>";
    echo "<td>{$feedbackrow['feed_date']}</td>";
    echo "<td>{$feedbackrow['doctor_id']}</td>";
    echo "<td>{$feedbackrow['patient_id']}</td>";
    
    echo "<td><a href=''><img style='width:18px' src='myimages/edit.png'>Edit</a> | <a href='table-database.php?did={$feedbackrow['feedback_id']}'><img style='width:18px' src='myimages/delete.png'>Delete</a></td>";
    
    echo "</tr>";
}
                  
                  ?>
                  <tr>
                    <td>Other</td>
                    <td>others</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>feedback</th>
                    <th>Date</th>
                    <th>Doctor Id</th>
                    <th>Patient Id</th>
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
  <!-- *******************************Payment Table-->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Payment Table</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="./home_page.php">Home</a></li>
              <li class="breadcrumb-item active">Payment Table</li>
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
                <h3 class="card-title">Payment Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Appointment Id</th>
                    <th>Payment Amount</th>
                    <th>Payment Method</th>
                    <th>Refund Status</th>
                    <th>Option</th>
                  </tr>
                  </thead>
                  
                  <tbody>
                      <?php
                      
                      if(isset($_GET['did']))
                      {
                          $did = $_GET['did'];
                          $deleteq = mysqli_query($database_connection, "delete from tbl_payment where payment_id ='{$did}'") or die (mysqli_error($database_connection));
                          
                          if($deleteq)
                          {
                              echo "<script>alert('Record Deleted');</script>";
                          }
                      }
                  
                  $selectq = mysqli_query($database_connection, "select * from tbl_payment") or die(mysqli_error($database_connection));
                  $count = mysqli_num_rows($selectq);
                  echo "<b>".$count."</b>" . "<b> Records Found</b>";
while($paymentrow = mysqli_fetch_array($selectq))
{
    echo "<tr>";
    echo "<td>{$paymentrow['payment_id']}</td>";
    echo "<td>{$paymentrow['appointment_id']}</td>";
    echo "<td>{$paymentrow['payment_amount']}</td>";
    echo "<td>{$paymentrow['payment_method']}</td>";
    echo "<td>{$paymentrow['refund_status']}</td>";
    
    echo "<td><a href=''><img style='width:18px' src='myimages/edit.png'>Edit</a> | <a href='table-database.php?did={$paymentrowrow['payment_id']}'><img style='width:18px' src='myimages/delete.png'>Delete</a></td>";
    
    echo "</tr>";
}
                  
                  ?>
                  <tr>
                    <td>Other</td>
                    <td>others</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Appointment Id</th>
                    <th>Payment Amount</th>
                    <th>Payment Method</th>
                    <th>Refund status</th>
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
