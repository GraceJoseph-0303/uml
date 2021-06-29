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
    <title> </title>
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
                <h1 class="page-title">Add New Staff</h1>
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


                    <!-- .form -->
                    <form class="add_name" id="add_name" method="post" action="validation/add-staff.php">
                      <!-- .fieldset -->

                      <fieldset>
                        <legend style="border-bottom:2px solid ghostwhite;">Staff Personal Details</legend> <!-- .form-group -->
                        <div class="row col-md-12">
                          <div class="col-md-6">
                        <div class="form-group">
                          <label for="tf1">First Name</label>
                          <input type="text" class="form-control" name="first_name" aria-describedby="tf1Help" placeholder="First Name" required >

                        </div><!-- /.form-group -->
                      </div>
                      <div class="col-md-6">
                    <div class="form-group">
                      <label for="tf1">Last Name</label>
                      <input type="text" class="form-control" name="last_name" aria-describedby="tf1Help" placeholder="last name" required>

                    </div><!-- /.form-group -->
                  </div>
                      </div>
                      <!-- end first colum -->
                        <div class="row col-md-12">
                          <div class="col-md-4">
                        <div class="form-group">
                          <label for="tf1">Email</label>
                          <input type="email" class="form-control" name="email" aria-describedby="tf1Help" placeholder="email adddress" required>

                        </div>
                      </div>

                      <div class="col-md-4">
                    <div class="form-group">
                      <label for="tf1">Phone Number</label>
                      <input type="text" class="form-control" name="phone_number" aria-describedby="tf1Help" placeholder="phone number" required>

                    </div>
                  </div>
                  <div class="col-md-4">
                <div class="form-group">
                  <label for="tf1">Gender</label>
                  <select class="form-control select-gender" name="gender" id="">
                    <option value="">--select gender--</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
              </div>
            </div>

                      <div class="row col-md-12">
                        <div class="col-md-4">
                      <div class="form-group">
                        <label for="tf1">Date of employment</label>
                        <input type="date" class="form-control" name="date_of_employment" aria-describedby="tf1Help" placeholder="Date of Employment" required>
                    </div>
                  </div>
                    <div class="col-md-4">
                    <div class="form-group">
                    <label for="tf1">College</label>
                    <select class="form-control select-college" name="college" required>
                      <?php
                      $fetch_category = "SELECT * FROM college";
                      if($results = $connect->query($fetch_category)){
                        if($results->num_rows > 0){
                            while($row = $results->fetch_array()){
                              echo '<option value="'.$row['college_name'].'">';
                              echo  $row['college_name'];
                               echo '</option>';
                            }

                        }else{
                          echo "No category found";
                        }
                      }else{
                        echo "ERROR COULD NOT FETCH CATEGORIES";
                      }
                      ?>
                    </select>
                    <!-- <input type="text" class="form-control" name="college" aria-describedby="tf1Help" placeholder="college"  value="Coict" disabled> -->
                    </div><!-- /.form-group -->
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                    <label for="tf1">Department</label>
                    <select class="form-control select-dept"   name="department" id="select-staff">
                      <?php
                      $fetch_category = "SELECT * FROM department";
                      if($results = $connect->query($fetch_category)){
                        if($results->num_rows > 0){
                            while($row = $results->fetch_array()){
                              echo '<option value="'.$row['dept_name'].'">';
                              echo  $row['dept_name'];
                               echo '</option>';
                            }

                        }else{
                          echo "No category found";
                        }
                      }else{
                        echo "ERROR COULD NOT FETCH CATEGORIES";
                      }
                      ?>
                    </select>

                    </div><!-- /.form-group -->
                    </div>
                    </div>
                      <div class="row col-md-12">
                        <div class="col-md-4">
                      <div class="form-group">
                        <label for="tf1">Role</label>
                        <select class="form-control select-role" id="select-staff" name="roles" required>
                          <option value="">--select role--</option>
                          <option value="hod">Head of Department</option>
                          <option value="principal">principal</option>
                          <option value="dvc">DVC</option>
                          <option value="staff">Staff</option>
                        </select>

                      </div><!-- /.form-group -->
                    </div>
                    </div>
                  </div>
    <div class="col-md-12 text-center">
      <input type="submit"  value="ADD" class="btn btn-md btn-primary" name="add_staff">
    </div>
  </form>
<?php include 'template/footer/footer.php';?>
  </body>
</html>
