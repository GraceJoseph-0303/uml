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

//fetch dates
$fetch_details = "SELECT no_of_days,total_days FROM leave_requests INNER JOIN staff ON staff_id = staff_id_fk WHERE  email = '".$_SESSION['email_add']."' ";
if($results = $connect->query($fetch_details)){
  if($results->num_rows > 0){
    $row = $results->fetch_array();
   $total = 28;
   $fetch_date = "SELECT SUM(no_of_days) AS taken_days FROM leave_requests INNER JOIN staff ON staff_id = staff_id_fk WHERE email = '".$_SESSION['email_add']."'";
    $day_result = $connect->query($fetch_date);
    while($days = $day_result->fetch_array()){
      $total_day = $days['taken_days'];

    };

}else{
$total = 28;
$total_day = 0;


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
            <!-- .page-inner -->
            <div class="section-block">
            <div class="metric-row">
                    <!-- metric column -->
                    <div class="col-12 col-sm-6 col-lg-4">
                      <!-- .metric -->
                      <div class="card-metric">
                        <div class="metric">
                          <p class="metric-value h3">
                            <sub><i class="fas fa-calendar-times"></i></sub> <span class="value"><?php echo $total;?></span>
                          </p>
                          <h2 class="metric-label">TOTAL PER YEAR</h2>
                        </div>
                      </div><!-- /.metric -->
                    </div><!-- /metric column -->
                    <div class="col-12 col-sm-6 col-lg-4">
                      <!-- .metric -->
                      <div class="card-metric">
                        <div class="metric">
                          <p class="metric-value h3">
                            <sub><i class="fas fa-calendar-times"></i></sub> <span class="value"><?php echo $total_day;?></span>
                          </p>
                          <h2 class="metric-label"> DAYS TAKEN SO FAR</h2>
                        </div>
                      </div><!-- /.metric -->
                    </div><!-- /metric column -->
                    <!-- metric column -->
                    <div class="col-12 col-sm-6 col-lg-4">
                      <!-- .metric -->
                      <div class="card-metric">
                        <div class="metric">
                          <p class="metric-value h3">
                            <sub><i class="fas fa-calendar-times"></i></sub>
                            <span class="value">
                              <?php
                            $remaining_days = $total - $total_day;
                            echo $remaining_days;
                             ?></span>
                          </p>
                          <h2 class="metric-label">REMAINING DAYS</h2>
                        </div>
                      </div><!-- /.metric -->
                    </div><!-- /metric column -->
                  </div>
                </div>
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
                <?php
                if(isset($_SESSION['error_apply'])){
                  echo $_SESSION['error_apply'];
                   unset($_SESSION['error_apply']);
                }
                ?>
                <div class="card card-fluid">
                  <!-- .card-body -->
                  <div class="card-body">
                    <?php
                    $fetch_staff = "SELECT * FROM leave_requests INNER JOIN staff ON staff_id = staff_id_fk WHERE email = '".$_SESSION['email_add']."' ORDER BY submitted_at DESC ";
                    if($fetch_results = $connect->query($fetch_staff)){
                      if($fetch_results->num_rows > 0){
                        echo   '<table id="dt-responsive"  class="table dt-responsive nowrap w-100">';
                        echo   '<thead>';
                        echo   '<tr>';
                        echo   '<th style="width:">Starting Date</th>';
                        echo   '<th style="width:">Ending Date</th>';
                        echo   '<th style="width:">No of Days Taken</th>';
                        echo   '<th style="width:">Print</th>';
                        echo   '<th style="width:">Leave Status</th>';
                        // echo '<th style="width:">Action</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
                        while($row = $fetch_results->fetch_array()){
                          echo '<tr>';
                          echo "<td>". $row['start_date']. "</td>";
                            echo "<td>". $row['end_date']. "</td>";
                             echo "<td class='text-center'>" . $row['no_of_days'] . "</td>";
                             echo "<td class='project-actions text-left'>";
                                 echo "<a class='btn btn-primary btn-sm' href='generate_form.php?leave_requests_id=".$row['leave_requests_id']."'>
                                     <i class='fas fa-file'>
                                     </i>
                                     Generate
                                 </a>";
                             echo "</td>";
                             echo "<td class='badge badge-warning'>" .$row['leave_status']."</td>";
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
