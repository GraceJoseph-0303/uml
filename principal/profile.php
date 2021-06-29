<?php
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
                <h1 class="page-title">STAFF PROFILE</h1>
              </header><!-- /.page-title-bar -->
              <!-- .page-section -->
              <div class="page-section">
                <div class="d-xl-none">
                  <button class="btn btn-danger btn-floated" type="button" data-toggle="sidebar"><i class="fa fa-th-list"></i></button>
                </div><!-- .card -->

                <div  class="card">
                  <!-- .card-body -->
                  <div class="card-body">
                    <table class="table">
                      <tr>
                        <thead>
                        <th>FIELD</th>
                        <th>VALUE</th>
                      </thead>
                      </tr>
                      <tr>
                        <tbody>
                          <tr>
                            <td>Full Name</td>
                            <td><?php echo $full_name;?></td>
                          </tr>
                          <tr>
                            <td>Email</td>
                            <td><?php echo $email;?></td>
                          </tr>
                          <tr>
                            <td>Phone Number</td>
                            <td><?php echo $phone_number;?></td>
                          </tr>
                          <tr>
                            <td>College</td>
                            <td><?php echo $college;?></td>
                          </tr>
                          <tr>
                            <td>Department</td>
                            <td><?php echo $department;?></td>
                          </tr>
                        </tbody>
                      </tr>
                    </table>
                  </div>
                </div>
<?php include 'template/footer/footer.php';?>
</body>
</html>
