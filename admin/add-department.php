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
    <title> add department </title>
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
                <h1 class="page-title">Add department</h1>
              </header><!-- /.page-title-bar -->
              <!-- .page-section -->
              <div class="page-section">
                <div class="d-xl-none">
                  <button class="btn btn-danger btn-floated" type="button" data-toggle="sidebar"><i class="fa fa-th-list"></i></button>
                </div><!-- .card -->
                <?php
                if(isset($_SESSION['success_dept'])){
                  echo $_SESSION['success_dept'];
                  unset($_SESSION['success_dept']);
                }
                ?>
                <div  class="card">
                  <!-- .card-body -->
                  <div class="card-body">


                    <!-- .form -->
                    <form class="add_name" id="add_name" method="post" action="validation/add-department.php">
                      <!-- .fieldset -->

                      <fieldset>
                        <legend style="border-bottom:2px solid ghostwhite;">Deparement Details</legend> <!-- .form-group -->
                        <div class="row col-md-12">
                          <div class="col-md-6">
                        <div class="form-group">
                          <label for="tf1">Deparement Name</label>
                          <input type="text" class="form-control" name="department_name" aria-describedby="tf1Help" placeholder="College Name" required >
                        </div><!-- /.form-group -->
                      </div>
                        <div class="row col-md-12">
                      <div class="col-md-6">
                    <div class="form-group">
                      <label for="tf1">College</label>
                      <select class="form-control" name="college_id_fk">
                        <?php
                        $fetch_category = "SELECT * FROM college";
                        if($results = $connect->query($fetch_category)){
                          if($results->num_rows > 0){
                              while($row = $results->fetch_array()){
                                echo '<option value="'.$row['college_id'].'">';
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
                    </div><!-- /.form-group -->
                    </div>
                  </div>
                      </div>
                      <!-- end first colum -->
                        <div class="row col-md-12">
                          <div class="col-md-4">
                        <div class="form-group">
                          <label for="tf1">Deparement Description</label>
                          <textarea  class="form-control" name="department_description" aria-describedby="tf1Help" placeholder="department description" rows="4" cols="100" required></textarea>
                        </div>
                        </div>
                    </div>
                  </div>
    <div class="col-md-12 text-center">
      <input type="submit"  value="ADD Deparement" class="btn btn-md btn-primary" name="add_deparment">
    </div>
  </form>
<?php include 'template/footer/footer.php';?>
  </body>
</html>
