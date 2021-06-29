<?php session_start();
include "validation/login_check.php";
include "dbcon.php";
$fetch_nominee = "SELECT * FROM staff where email = '".$_SESSION['email_add']."' ";
if($fetch_results = $connect->query($fetch_nominee)){
  if($fetch_results->num_rows > 0){
    while($row = $fetch_results->fetch_array()){
      $staff_id_fk = $row['staff_id'];
      $first_name = $row['first_name'];
      $last_name = $row['last_name'];
      $full_name = $first_name ." ".  $last_name;
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
                <h1 class="page-title">LEAVE FORM</h1>
              </header><!-- /.page-title-bar -->
              <!-- .page-section -->
              <div class="page-section">
                <div class="d-xl-none">
                  <button class="btn btn-danger btn-floated" type="button" data-toggle="sidebar"><i class="fa fa-th-list"></i></button>
                </div><!-- .card -->
                <div  class="card">
                  <?php
                  if(isset($_SESSION['success'])){
                    echo $_SESSION['success'];
                     unset($_SESSION['success']);
                  }
                  ?>

                  <!-- .card-body -->
                  <div class="card-body">
                    <!-- .form -->
                    <form class="add_name" id="add_name" method="post" action="validation/apply.php" enctype="multipart/form-data">
                      <!-- .fieldset -->
                      <input type="hidden" name="staff_id_fk" value="<?php echo $staff_id_fk;?>">
                      <legend style="border-bottom:2px solid ghostwhite;">Leave Details </legend> <!-- .form-group -->
                        <div class="row col-md-12">
                          <div class="col-md-4">
                        <div class="form-group">
                          <label for="tf1">Starting Date</label>
                          <input id="start_date" type="date" class="form-control" name="start_date" aria-describedby="tf1Help" placeholder="e.g. starting date"  onchange="cal()" required >

                        </div><!-- /.form-group -->
                      </div>
                      <div class="col-md-4">
                      <div class="form-group">
                      <label for="tf1">End Date</label>
                      <input id="end_date" type="date" class="form-control" name="end_date" aria-describedby="tf1Help" placeholder="e.g. Ending date" onchange="cal()" required>
                      <?php
                      if(isset($_SESSION['invalid_date'])){
                        echo $_SESSION['invalid_date'];
                        unset($_SESSION['invalid_date']);
                      }
                      ?>
                      </div><!-- /.form-group -->
                      </div>
                      <div class="col-md-4">
                      <div class="form-group">
                      <label for="tf1">No. of Days</label>
                      <input id="no_of_days" type="number" class="form-control" name="no_of_days" aria-describedby="tf1Help" required disabled>
                      </div><!-- /.form-group -->
                      </div>

                    <div class="col-md-4">
                    <div class="form-group">
                      <label for="tf1">Destination Point</label>
                      <input type="text" class="form-control" name="destination" aria-describedby="tf1Help" placeholder="e.g.destination point " required>
                    </div><!-- /.form-group -->
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                  <label for="tf1">Attachment</label>
                  <input type="file" class="form-control" name="attachment" aria-describedby="tf1Help" required>
                  <?php
                  if(isset($_SESSION['invalid'])){
                    echo $_SESSION['invalid'];
                     unset($_SESSION['invalid']);
                  }
                  ?>
                  <?php
                  if(isset($_SESSION['large_photo'])){
                    echo $_SESSION['large_photo'];
                     unset($_SESSION['large_photo']);
                  }
                  ?>

                  </div><!-- /.form-group -->
                  </div>
                <div class="col-md-4">
                <div class="form-group">
                <label for="tf1">Bio</label>
                <textarea name="bio" class="form-control" rows="3  " cols="80" placeholder="short description of what this leave about" required></textarea>
                </div><!-- /.form-group -->
                </div>
                </div>


                        <legend style="border-bottom:2px solid ghostwhite;">Relatives</legend> <!-- .form-group -->
                        <div class="row col-md-12 relativeBlock">
                          <div class="col-md-3">
                        <div class="form-group">
                          <label for="tf1">Name</label>
                          <input type="text" class="form-control" name="relative_name[]" aria-describedby="tf1Help" placeholder="e.g.name" required>
                        </div>
                      </div>

                      <div class="col-md-3">
                    <div class="form-group">
                      <label for="tf1">RelationShip</label>
                      <select class="form-control select_relative" name="relative_relationship[]">
                        <option value="son">Son</option>
                        <option value="daughter">Daughter</option>
                        <option value="wife">Wife</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                <div class="form-group">
                  <label for="tf1">Date</label>
                  <input type="date" class="form-control" name="relative_date_submitted[]" aria-describedby="tf1Help" placeholder="e.g.jina" required>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="tf1">Action</label>
                  <a href="javascript:void(0)" class="btn btn-success addMore form-control"><span class="fa fa-plus" aria-hidden="true"></span>Add</a>
                </div>
              </div>
            </div>

            <!-- copy of relative blocks -->
            <div class="row col-md-12 relativeBlockCopy" style="display:none;">
              <div class="col-md-3">
            <div class="form-group">
              <label for="tf1">Name</label>
              <input type="text" class="form-control" name="relative_name[]" aria-describedby="tf1Help" placeholder="e.g.name">
            </div>
          </div>

          <div class="col-md-3">
        <div class="form-group">
          <label for="tf1">RelationShip</label>
          <select class="form-control select_relative_copy" name="relative_relationship[]">
            <option value="son">Son</option>
            <option value="daughter">Daughter</option>
            <option value="wife">Wife</option>
          </select>
        </div>
      </div>
      <div class="col-md-3">
    <div class="form-group">
      <label for="tf1">Date</label>
      <input type="date" class="form-control" name="relative_date_submitted[]" aria-describedby="tf1Help" placeholder="e.g.jina">
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <label for="tf1">Action</label>
      <a href="javascript:void(0)" class="btn btn-danger remove form-control"><span class="fa fa-minus" aria-hidden="true"></span>Remove</a>
    </div>
  </div>
</div>

    <div class="col-md-12 text-center">
      <input type="submit"  value="Apply" class="btn btn-lg btn-primary" name="apply">
    </div>
  </form>
<?php include 'template/footer/footer.php';?>



<script type="text/javascript">
function GetDays(){
              var start_date = new Date(document.getElementById("start_date").value);
              var end_date = new Date(document.getElementById("end_date").value);
              return parseInt((end_date - start_date) / (24 * 3600 * 1000));
      }

      function cal(){
      if(document.getElementById("start_date")){
          document.getElementById("no_of_days").value=GetDays();
      }
  }


  $(document).ready(function(){
      //group add limit
      var maxGroup = 4;

      //add more fields group
      $(".addMore").click(function(){
          if($('body').find('.relativeBlock').length < maxGroup){
              var fieldHTML = '<div class="row col-md-12 form-group relativeBlock">'+$(".relativeBlockCopy").html()+'</div>';
              $('body').find('.relativeBlock:last').after(fieldHTML);
          }else{
              alert('Maximum '+maxGroup+' relatives are allowed.');
          }
      });

      //remove fields group
      $("body").on("click",".remove",function(){
          $(this).parents(".relativeBlock").remove();
      });
  });



</script>
  </body>
</html>
