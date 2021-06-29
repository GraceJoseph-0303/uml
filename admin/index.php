<?php session_start();
include "validation/login_check.php";
include "dbcon.php";

$fetch_staff = "SELECT * FROM staff where email = '".$_SESSION['email_add']."' ";
if($fetch_results = $connect->query($fetch_staff)){
  if($fetch_results->num_rows > 0){
  $row = $fetch_results->fetch_array();
  $first_name = $row['first_name'];
  $last_name = $row['last_name'];
  $full_name = $first_name ." ".  $last_name;
}
}else{

}


//ALL STAFF
$get_total_staff = "SELECT COUNT(*) AS all_staff FROM staff";
$total_staff_results = $connect->query($get_total_staff);
$total_staff = $total_staff_results->fetch_array();
//
// //STAFF ON LEAVE
$get_staff_on_leave = "SELECT COUNT(*) AS staff_on_leave FROM leave_requests WHERE leave_status = 'accepted' ";
$total_staff_on_leave = $connect->query($get_staff_on_leave);
$staff_on_leave = $total_staff_on_leave->fetch_array();

//all pending leave
$get_dept = "SELECT COUNT(*) AS pending_request FROM leave_requests WHERE leave_status = 'pending' ";
$total_dept = $connect->query($get_dept);
$pending_request = $total_dept->fetch_array();
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

        <div class="section-block">
          <!-- metric row -->
          <div class="metric-row">
            <div class="col-md-4">
              <!-- .metric -->
              <a href="user-tasks.html" class="metric metric-bordered">
                <div class="metric-badge">
                  <span class="badge badge-lg badge-primary"><span class="oi oi-media-record pulse mr-1"></span>TOTAL STAFF(s)</span>
                </div>
                <p class="metric-value h3">
                  <sub><i class="oi oi-timer"></i></sub> <span class="value"><?php echo $total_staff['all_staff'];?> </span>
                </p>
              </a>
            </div>

            <div class="col-md-4">
              <!-- .metric -->
              <a href="user-tasks.html" class="metric metric-bordered">
                <div class="metric-badge">
                  <span class="badge badge-lg badge-primary"><span class="oi oi-media-record pulse mr-1"></span>PENDING REQUEST(s)</span>
                </div>
                <p class="metric-value h3">
                  <sub><i class="oi oi-timer"></i></sub> <span class="value"><?php echo $pending_request['pending_request'];?></span>
                </p>
              </a>
            </div>

            <div class="col-md-4">
              <!-- .metric -->
              <a href="user-tasks.html" class="metric metric-bordered">
                <div class="metric-badge">
                  <span class="badge badge-lg badge-primary"><span class="oi oi-media-record pulse mr-1"></span>STAFF ON LEAVE</span>
                </div>
                <p class="metric-value h3">
                  <sub><i class="oi oi-timer"></i></sub> <span class="value"><?php echo $staff_on_leave['staff_on_leave'];?></span>
                </p>
              </a>
            </div>
          </div>


<?php include 'template/footer/footer.php';?>
  </body>
</html>
