<?php
session_start();
include "dbcon.php";
include "validation/login_check.php";
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
    <title> add college </title>
    <?php
    include 'template/header/top-header.php';
    ?>
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
            <div class="page-inner col-md-12">
              <!-- .page-title-bar -->
              <header class="page-title-bar">
                <h1 class="page-title">Add College</h1>
              </header><!-- /.page-title-bar -->
              <!-- .page-section -->
              <div class="page-section">
                <div class="d-xl-none">
                  <button class="btn btn-danger btn-floated" type="button" data-toggle="sidebar"><i class="fa fa-th-list"></i></button>
                </div><!-- .card -->
                <?php
                if(isset($_SESSION['success_college'])){
                  echo $_SESSION['success_college'];
                  unset($_SESSION['success_college']);
                }
                ?>
                <div  class="card">
                  <!-- .card-body -->
                  <div class="card-body">


                    <!-- .form -->
                    <form class="add_name" id="add_name" method="post" action="validation/add-college.php">
                      <!-- .fieldset -->

                      <fieldset>
                        <legend style="border-bottom:2px solid ghostwhite;">College Details</legend> <!-- .form-group -->
                        <div class="row col-md-12">
                          <div class="col-md-6">
                        <div class="form-group">
                          <label for="tf1">College Name</label>
                          <input type="text" class="form-control" name="college_name" aria-describedby="tf1Help" placeholder="College Name" required >
                        </div><!-- /.form-group -->
                      </div>
                    </div>
                    <div class="row col-md-12">
                      <div class="col-md-6">
                    <div class="form-group">
                      <label for="tf1">College Abbr</label>
                      <input type="text" class="form-control" name="college_slug" aria-describedby="tf1Help" placeholder="e.g COICT" required >
                    </div><!-- /.form-group -->
                  </div>
                </div>
                        <div class="row col-md-12">
                      <div class="col-md-6">
                    <div class="form-group">
                      <label for="tf1">College Address</label>
                      <input type="text" class="form-control" name="college_address" aria-describedby="tf1Help" placeholder="College Address" required>
                    </div><!-- /.form-group -->
                    </div>
                  </div>
                      </div>
                      <!-- end first colum -->
                        <div class="row col-md-12">
                          <div class="col-md-4">
                        <div class="form-group">
                          <label for="tf1">College Description</label>
                          <textarea  class="form-control" name="college_description" aria-describedby="tf1Help" placeholder="college description" rows="4" cols="100" required></textarea>
                        </div>
                        </div>
                    </div>

                    <div class="col-md-12 text-center">
                      <input type="submit"  value="ADD COLLEGE" class="btn btn-md btn-primary" name="add_college">
                    </div>
                  </div>

  </form>
<?php include 'template/footer/footer.php';?>
  </body>
</html>
