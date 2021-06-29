<?php session_start();
include "validation/login_check.php";
include "dbcon.php";
$fetch_user_details = "SELECT first_name,last_name FROM staff where email = '".$_SESSION['email_add']."' ";
if($fetch_results = $connect->query($fetch_user_details)){
  if($fetch_results->num_rows > 0){
    while($row = $fetch_results->fetch_array()){
      $first_name = $row['first_name'];
      $last_name = $row['last_name'];
      $full_name = $first_name ." ".  $last_name;
    }
}else{
echo "not staff";

}
}else{

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--  meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><!-- End  meta tags -->
    <!-- Begin SEO tag -->
    <title> </title>
    <?php include 'template/header/top-header.php'?>
  <body data-spy="scroll" data-target="#nav-content" data-offset="76">
    <!-- .app -->
    <div class="app">
      <!--[if lt IE 10]>
      <div class="page-message" role="alert">You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</div>
      <![endif]-->
      <!-- .app-header -->
      <?php include 'template/header/header.php';?>
      <!-- .app-aside -->
      <?php include 'template/aside/admin-aside.php';?>
      <!-- .app-main -->
      <main class="app-main">

        <!-- .wrapper -->
        <div class="wrapper">
          <!-- .page -->
          <div class="page has-sidebar has-sidebar-expand-xl">

            <div class="page-inner col-md-12">
              <!-- .page-title-bar -->
              <header class="page-title-bar">
                <h1 class="page-title">LEAVE HISTORY</h1>
              </header><!-- /.page-title-bar -->
              <!-- .page-section -->
              <div class="page-section">
                <div class="d-xl-none">
                  <button class="btn btn-danger btn-floated" type="button" data-toggle="sidebar"><i class="fa fa-th-list"></i></button>
                </div><!-- .card -->
                <?php
                if(isset($_SESSION['success'])){
                  echo $_SESSION['success'];
                  unset($_SESSION['success']);
                }
                ?>
                <div class="card card-fluid">
                  <!-- .card-body -->
                  <div class="card-body">
                    <?php
                    $fetch_staff = "SELECT * FROM leave_requests INNER JOIN staff ON staff_id = staff_id_fk WHERE leave_status = 'dvc-accept' ORDER BY submitted_at DESC ";
                    if($fetch_results = $connect->query($fetch_staff)){
                      if($fetch_results->num_rows > 0){
                        echo   '<table id="dt-responsive"  class="table dt-responsive nowrap w-100">';
                        echo   '<thead>';
                        echo   '<tr>';
                        echo   '<th style="width:">Date Submitted</th>';
                        echo   '<th style="width:">Starting Date</th>';
                        echo   '<th style="width:">Ending Date</th>';
                        echo   '<th style="width:">No of Days</th>';
                        echo   '<th style="width:">Status</th>';
                        // echo '<th style="width:">Action</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
                        while($row = $fetch_results->fetch_array()){
                          echo '<tr>';
                            echo "<td>". $row['submitted_at']. "</td>";
                          echo "<td>". $row['start_date']. "</td>";
                            echo "<td>". $row['end_date']. "</td>";
                             echo "<td class='text-center'>" . $row['no_of_days'] . "</td>";
                             echo "<td class='badge badge-warning'>" .$row['leave_status']."</td>";
                             echo "<td class='project-actions text-left'>";
                                 echo "<a class='btn btn-primary btn-sm' href='generate_report.php?leave_requests_id=".$row['leave_requests_id']."'>
                                     <i class='fas fa-file'>
                                     </i>
                                     view form
                                 </a>";
                             echo "</td>";
                      echo '</tbody>';
                  }
                      echo '<tfoot>';
                      echo   '<tr>';
                      echo   '<th style="width:">Starting Date</th>';
                      echo   '<th style="width:">Ending Date</th>';
                      echo   '<th style="width:">No of Days Taken</th>';
                      echo   '<th style="width:">Print</th>';
                      echo   '<th style="width:">Leave Status</th>';
                      // echo '<th style="width:">Action</th>';
                      echo '</tr>';
                      echo  '</tfoot>';
                    echo  '</table>';
                    //

                    }else{
                        echo '<div class="alert alert-info">NO STAFF</div>';
                      }
            }else{
              echo '';
            }
            ?>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
            </div>
          </main>
        </div>
      </div>
<?php include 'template/footer/footer.php';?>
  </body>
</html>
