<?php session_start();
include "validation/login_check.php";
include "dbcon.php";
$fetch_nominee = "SELECT * FROM staff where email = '".$_SESSION['email_add']."' ";
if($fetch_results = $connect->query($fetch_nominee)){
  if($fetch_results->num_rows > 0){
    while($row = $fetch_results->fetch_array()){
      $staff_id_fk = $row['staff_id'];
      $college = $row['college'];
      $roles = $row['roles'];
      $name = $row['first_name'];
      $department = $row['department'];
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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><!-- End Required meta tags -->
    <!-- Begin SEO tag -->
    <title>Apply Leave</title>
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
            <div class="page-inner col-md-12">
              <!-- .page-title-bar -->
              <header class="page-title-bar">
                <h1 class="page-title"> LEAVE FORM </h1>
              </header><!-- /.page-title-bar -->
              <!-- .page-section -->
              <div class="page-section">
                <div class="d-xl-none">
                  <button class="btn btn-danger btn-floated" type="button" data-toggle="sidebar"><i class="fa fa-th-list"></i></button>
                </div><!-- .card -->
                <div  class="card">
                  <!-- .card-body -->
                  <div class="card-body">
                    <!-- .form -->
                    <form class="add_name" id="add_name" method="post" action="validation/apply.php">
                      <!-- .fieldset -->
                      <fieldset>
                        <legend style="border-bottom:2px solid ghostwhite;">A.TAARIFA BINAFSI</legend> <!-- .form-group -->

                        <div class="row col-md-12">
                          <div class="col-md-3">
                        <div class="form-group">
                          <label for="tf1">Jina</label>
                          <input type="text" class="form-control" name="name" aria-describedby="tf1Help" placeholder="Jina la Mfanyakazi " value="<?php echo $name;?>" disabled>
                          <input type="hidden" name="staff_id_fk" value="<?php echo $staff_id_fk;?>">
                        </div>
                      </div>
                      <div class="col-md-3">
                    <div class="form-group">
                      <label for="tf1">Cheo</label>
                      <input type="text" class="form-control" name="role" aria-describedby="tf1Help" placeholder="Cheo cha mfanyakazi" value="<?php echo $roles;?>" disabled>
                    </div>
                  </div>
                      <div class="col-md-3">
                    <div class="form-group">
                      <label for="tf1">Idara</label>
                      <input type="text" class="form-control" name="department" aria-describedby="tf1Help" placeholder="Idara " value="<?php echo $department;?>" disabled>
                    </div>
                  </div>
                  <div class="col-md-3">
                <div class="form-group">
                  <label for="tf1">Tarehe</label>
                  <input type="date" class="form-control" name="date_submitted" aria-describedby="tf1Help" placeholder="Tarehe" required>
                </div><!-- /.form-group -->
              </div>
                      </div>
                        <legend style="border-bottom:2px solid ghostwhite;">Mke /Mume na watoto wanhu nitasafiri pamoja nao</legend> <!-- .form-group -->
                        <div class="row col-md-12">
                          <div class="col-md-4">
                        <div class="form-group">
                          <label for="tf1">Jina</label>
                          <input type="text" class="form-control" name="relative_name" aria-describedby="tf1Help" placeholder="e.g.jina" required>
                        </div>
                      </div>

                      <div class="col-md-4">
                    <div class="form-group">
                      <label for="tf1">Uhusiano</label>
                      <input type="text" class="form-control" name="relative_relationship" aria-describedby="tf1Help" placeholder="e.g.jina" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                <div class="form-group">
                  <label for="tf1">Tarehe</label>
                  <input type="date" class="form-control" name="relative_date_submitted" aria-describedby="tf1Help" placeholder="e.g.jina" required>
                </div>
              </div>

                    <legend style="border-bottom:2px solid ghostwhite;">B.MAELEZO YA LIKIZO</legend> <!-- .form-group -->
                      <div class="row col-md-12">
                        <div class="col-md-4">
                      <div class="form-group">
                        <label for="tf1">Tarehe ya likizo</label>
                        <input type="date" class="form-control" name="starting_date" aria-describedby="tf1Help" placeholder="e.g. Tarehe" required>

                      </div><!-- /.form-group -->
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                    <label for="tf1">Siku ulizochukua likizo</label>
                    <input type="number" class="form-control" name="no_of_days" aria-describedby="tf1Help" placeholder="e.g. siku za likizo" required>
                    </div><!-- /.form-group -->
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                    <label for="tf1">likizo ulizonazo</label>
                    <input type="number" class="form-control" name="remaining_days_for_leave" aria-describedby="tf1Help" required>
                    </div><!-- /.form-group -->
                    </div>
                    </div>
                      <div class="row col-md-12">
                        <div class="col-md-4">
                      <div class="form-group">
                        <label for="tf1">Likizo zilizopita</label>
                        <input type="number" class="form-control" name="previous_leaves" aria-describedby="tf1Help" placeholder="e.g. " required>
                      </div><!-- /.form-group -->
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                    <label for="tf1">Siku zilizobakia</label>
                    <input type="number" class="form-control" name="remaining_days_to_be_taken" placeholder="e.g. " required>
                    </div><!-- /.form-group -->
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                    <label for="tf1">Siku nazochukua</label>
                    <input type="number" class="form-control" name="days_i_take" aria-describedby="tf1Help" placeholder="e.g. " required>
                    </div><!-- /.form-group -->
                    </div>
                    </div>

          <legend style="border-bottom:2px solid ghostwhite;">C.USAFIRI</legend> <!-- .form-group -->

          <div class="row col-md-12">

            <div class="row col-md-12">
              <div class="col-md-4">
            <div class="form-group">
              <label for="tf1">Bank</label>
            <select class="form-group form-control" name="bank" required>
              <option value="">--Changua--</option>
              <option value="CRDB">CRDB</option>
              <option value="NMB">NMB</option>
            </select>
            </div><!-- /.form-group -->
          </div>
          <div class="col-md-4">
          <div class="form-group">
          <label for="tf1">Akanti Number</label>
          <input type="number" class="form-control" name="account_number" aria-describedby="tf1Help" placeholder="Akaunti number" required>
          </div><!-- /.form-group -->
          </div>
          <div class="col-md-4">
          <div class="form-group">
          <label for="tf1">Anuani ya likizo</label>
          <input type="text" class="form-control" name="leave_address" aria-describedby="tf1Help" placeholder="Anunai ya likizo" required>
          </div><!-- /.form-group -->
          </div>
          </div>
    <div class="col-md-12">
      <input type="submit"  value="Apply" class="btn btn-md btn-primary">
    </div>
  </form>
<?php include 'template/footer/footer.php';?>
  </body>
</html>
