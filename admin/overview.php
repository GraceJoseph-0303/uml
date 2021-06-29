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
                  <sub><i class="oi oi-timer"></i></sub> <span class="value">8</span>
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
                  <sub><i class="oi oi-timer"></i></sub> <span class="value">8</span>
                </p>
              </a>
            </div>

            <div class="col-md-4">
              <!-- .metric -->
              <a href="user-tasks.html" class="metric metric-bordered">
                <div class="metric-badge">
                  <span class="badge badge-lg badge-primary"><span class="oi oi-media-record pulse mr-1"></span>NUMBE OF DEPARTMENT</span>
                </div>
                <p class="metric-value h3">
                  <sub><i class="oi oi-timer"></i></sub> <span class="value">8</span>
                </p>
              </a>
            </div>
          </div>

        <!-- .wrapper -->
        <div class="wrapper">
          <!-- .page -->
          <div class="page has-sidebar has-sidebar-expand-xl">
            <!-- .page-inner -->
            <div class="page-inner col-md-12">
              <!-- .page-title-bar -->
              <header class="page-title-bar">
                <h1 class="page-title">STATS</h1>
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
                <div  class="card">
                  <!-- .card-body -->
                  <div class="card-body">
                    <?php echo $date_submitted;?>


                  </div>
                </div>
              </div>
            </div>
          </main>
        </div>
      </div>
<?php include 'template/footer/footer.php';?>
  </body>
</html>
