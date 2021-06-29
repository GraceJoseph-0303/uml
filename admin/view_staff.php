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
}
}else{

}

if(isset($_GET["staff_id"]) && !empty(trim($_GET["staff_id"]))){
    // Prepare a select statement
    $sql = "SELECT * FROM staff WHERE staff_id = ? ";

    if($stmt = mysqli_prepare($connect, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Set parameters
        $param_id = trim($_GET["staff_id"]);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                // Retrieve individual field value
                $staff_id = $row['staff_id'];
                $first_name = $row["first_name"];
                $last_name = $row["last_name"];
                $gender = $row["gender"];
                $email = $row["email"];
                $phone_number = $row["phone_number"];
                $college = $row['college'];
                $department = $row["department"];
                $date_of_employment = $row["date_of_employment"];
                $roles = $row["roles"];
            }else{
                // URL doesn't contain valid id parameter. Redirect to error page
                //header("location: error.php");
                exit();
            }

        }else{
            echo "Oops! Something went wrong. Please try again later.";
            echo mysqli_error($connect);
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($connect);
}else{
    exit();
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
                <h1 class="page-title">Update Staff Details</h1>
              </header><!-- /.page-title-bar -->
              <!-- .page-section -->
              <div class="page-section">
                <div class="d-xl-none">
                  <button class="btn btn-danger btn-floated" type="button" data-toggle="sidebar"><i class="fa fa-th-list"></i></button>
                </div><!-- .card -->
                <?php
                if(isset($_SESSION['success_edit'])){
                  echo $_SESSION['success_edit'];
                  unset($_SESSION['success_edit']);
                }
                ?>
                <div  class="card">
                  <!-- .card-body -->
                  <div class="card-body">
                    <!-- .form -->
                    <form class="add_name" id="add_name" method="post" action="validation/update_staff.php">
                      <!-- .fieldset -->
                      <fieldset>
                        <legend style="border-bottom:2px solid ghostwhite;">Staff Personal Details</legend> <!-- .form-group -->
                        <div class="row col-md-12">
                          <div class="col-md-6">
                        <div class="form-group">
                          <label for="tf1">First Name</label>
                          <input type="text" class="form-control" name="first_name" aria-describedby="tf1Help"  value="<?php echo $first_name; ?>" >

                        </div><!-- /.form-group -->
                      </div>
                      <div class="col-md-6">
                    <div class="form-group">
                      <label for="tf1">Last Name</label>
                      <input type="text" class="form-control" name="last_name" aria-describedby="tf1Help"  value="<?php echo $last_name; ?>" >

                    </div><!-- /.form-group -->
                  </div>
                      </div>
                      <!-- end first colum -->
                        <div class="row col-md-12">
                          <div class="col-md-4">
                        <div class="form-group">
                          <label for="tf1">Email</label>
                          <input type="email" class="form-control" name="email" aria-describedby="tf1Help"  value="<?php echo $email; ?>" >

                        </div>
                      </div>

                      <div class="col-md-4">
                    <div class="form-group">
                      <label for="tf1">Phone Number</label>
                      <input type="number" class="form-control" name="phone_number" aria-describedby="tf1Help"  value="<?php echo $phone_number; ?>" >

                    </div>
                  </div>
                  <div class="col-md-4">
                <div class="form-group">
                  <label for="tf1">Gender</label>

                  <select class="form-control select-staff" name="gender"  >
                    <option value="<?php echo $gender; ?>" selected><?php echo $gender; ?></option>
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
                        <input type="date" class="form-control" name="date_of_employment" aria-describedby="tf1Help" value="<?php echo $date_of_employment; ?>" >
                    </div>
                  </div>
                    <div class="col-md-4">
                    <div class="form-group">
                    <label for="tf1">College</label>
                    <input type="text" class="form-control" name="college" aria-describedby="tf1Help"  value="<?php echo $college; ?>" >
                    </div><!-- /.form-group -->
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                    <label for="tf1">Department</label>
                    <select class="form-control select-staff"   name="department" id="select-staff" >
                      <option value="<?php echo $department; ?>"><?php echo $department; ?></option>
                      <option value="CSE">CSE</option>
                      <option value="ETE">ETE</option>
                    </select>

                    </div><!-- /.form-group -->
                    </div>
                    </div>
                      <div class="row col-md-12">
                        <div class="col-md-4">
                      <div class="form-group">
                        <label for="tf1">Role</label>
                        <select class="form-control select-staff" id="select-staff" name="roles"  >
                          <option value="<?php echo $roles;?>"><?php echo $roles;?></option>
                          <option value="Hod">Head of Department</option>
                          <option value="principal">principal</option>
                          <option value="dvc">dvc</option>
                          <option value="staff">staff</option>

                        </select>

                      </div><!-- /.form-group -->
                    </div>
                    </div>
                  </div>
    <div class="col-md-12 text-center">
      <input type="hidden" name="staff_id_update" value="<?php echo $staff_id;?>">
      <input type="submit"  value="UPDATE" class="btn btn-md btn-primary" name="update_staff">
    </div>
  </form>
<?php include 'template/footer/footer.php';?>
</body>
</html>
