?php
session_start();
include "validation/login_check.php";
include "dbcon.php";
$fetch_staff = "SELECT * FROM staff where email = '".$_SESSION['email_add']."' ";
if($fetch_results = $connect->query($fetch_staff)){
  if($fetch_results->num_rows > 0){
  $row = $fetch_results->fetch_array();
  $first_name = $row['first_name'];
  $last_name = $row['last_name'];
  $full_name = $first_name ." ".  $last_name;
  $gender = $row["gender"];
  $email = $row["email"];
  $phone_number = $row["phone_number"];
  $college = $row['college'];
  $department = $row["department"];
  $date_of_employment = $row["date_of_employment"];
  $roles = $row["roles"];

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
    <?php include 'template/header/top-header.php';?>
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
                <h1 class="page-title">CHANGE PASSWORD</h1>
              </header><!-- /.page-title-bar -->
              <!-- .page-section -->
              <div class="page-section">
                <div class="d-xl-none">
                  <button class="btn btn-danger btn-floated" type="button" data-toggle="sidebar"><i class="fa fa-th-list"></i></button>
                </div><!-- .card -->

                <div  class="card">
                  <!-- .card-body -->
                  <div class="card-body">
                    <?php
                    if(isset($_SESSION['success'])){
                      echo $_SESSION['success'];
                      unset($_SESSION['success']);
                    }
                    ?>
                    <form class="from-control" action="validation/change_password.php" method="post">
                      <div class="row col-md-12">
                        <div class="col-md-6">
                            <label for="">Old Password</label>
                          <input type="password" name="old_password" value="" class="form-control" required>
                          <?php
                          if(isset($_SESSION['not_logged'])){
                            echo $_SESSION['not_logged'];
                            unset($_SESSION['not_logged']);
                          }
                          ?>
                        </div>
                      </div>
                      <div class="row col-md-12">
                        <div class="col-md-6">
                          <label for="">New Password</label>
                          <input type="password" name="new_password" value="" class="form-control" required>
                        </div>
                      </div>
                      <div class="row col-md-12">

                        <div class="col-md-6">
                          <label for="">Confirm New Password</label>
                          <input type="password" name="new_password_confirm" value="" class="form-control" required>
                          <?php
                          if(isset($_SESSION['not_matched'])){
                            echo $_SESSION['not_matched'];
                            unset($_SESSION['not_matched']);
                          }
                          ?>
                        </div>
                      </div>
                    </div>
                      <div class="row col-md-12 text-center">
                        <input type="submit" name="change_password" value="CHANGE PASSWORD" class="btn btn-primary">
                      </div>
                    </form>
                  </div>
                </div>
<?php include 'template/footer/footer.php';?>
</body>
</html>
