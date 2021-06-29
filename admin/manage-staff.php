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
          <div class="page">
            <!-- .page-inner -->
            <div class="page-inner">
              <!-- .page-title-bar -->
              <header class="page-title-bar">
                <!-- .breadcrumb -->
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active">

                    </li>
                  </ol>
                </nav><!-- /.breadcrumb -->
                <!-- title -->
                <h1 class="page-title">LIST OF STAFF</h1>

              </header><!-- /.page-title-bar -->
              <!-- .page-section -->
              <div class="page-section">
                <!-- .card -->
                <div class="modal" tabindex="-1" role="dialog" id="deletestaff_modal">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Delete Staff</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="post" action="validation/delete_staff.php" >
                      <div class="modal-body">
                        <h4>Are you sure you want to delete this staff?</h4>
                      </div>
                      <input type="hidden" name="delete_staff_id" id="delete_staff_id">
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" >No!</button>
                        <button type="submit" name="deletestaff" class="btn btn-secondary btn-warning btn-sm">Yes, Delete it</button>
                      </div>
                    </form>

                    </div>
                  </div>
                </div>
                <?php
                if(isset($_SESSION['delete_staff'])){
                  echo $_SESSION['delete_staff'];
                  unset($_SESSION['delete_staff']);
                }
                if(isset($_SESSION['update'])){
                  echo $_SESSION['update'];
                  unset($_SESSION['update']);
                }
                ?>
                <div class="row-col-12">
                <div class="card card-fluid">
                  <!-- .card-body -->
                  <div class="card-body">
                    <?php
                    $fetch_staff = "SELECT * FROM staff";
                    if($fetch_results = $connect->query($fetch_staff)){
                      if($fetch_results->num_rows > 0){
                        echo   '<table id="manage-staff"  class="table table-responsive  w-100">';
                        echo   '<thead>';
                        echo   '<tr>';
                          echo   '<th style="width:">First Name</th>';
                        echo   '<th style="width:">Last Name</th>';
                        echo   '<th style="width:">College</th>';
                        echo   '<th style="width:">Department</th>';
                        echo   '<th style="width:">Postion</th>';
                        echo '<th style="width:">Action</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
                        while($row = $fetch_results->fetch_array()){

                          echo '<tr>';
                            echo "<td>". $row['first_name']. "</td>";
                             echo "<td>" . $row['last_name'] . "</td>";
                             echo "<td>" . $row['college'] . "</td>";
                              echo "<td>" . $row['department'] . "</td>";
                               echo "<td>" . $row['roles'] . "</td>";
                              echo "<td class='project-actions text-right'>";
                              echo "<a class='btn btn-primary btn-sm' href='view_staff.php?staff_id=".$row['staff_id']."'>
                                  <span>
                                    Edit
                                  </span>

                              </a>";
                              echo '<td>';
                              echo '<button type="button" class="btn btn-danger btn-sm delete_staff_btn">  <span>
                                  delete
                                </span>
                                </button>';
                              echo "</td>";
                        echo '</tr>';
                        }
                      echo '</tbody>';
                      echo '<tfoot>';
                      echo   '<tr>';
                        echo   '<th style="width:">First Name</th>';
                      echo   '<th style="width:">Last Name</th>';
                      echo   '<th style="width:">College</th>';
                      echo   '<th style="width:">Department</th>';
                      echo   '<th style="width:">Postion</th>';
                      echo '<th style="width:">Action</th>';
                      echo   '</tr>';
                      echo  '</tfoot>';
                    echo  '</table>';
                    //
                      }else{
                        echo '<div class="alert alert-info">NO STAFF</div>';
                      }
            }else{
              echo '';
            }
            ?>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
              </div>
            </div>
          </div><!--/. container-fluid -->
        <!-- /.wrapper -->
      </main><!-- /.app-main -->
</div>
<?php include 'template/footer/footer.php';?>

<!-- delete category -->
<script>
$(document).ready(function() {
    $('#manage-staff').DataTable();
} );
$(document).ready(function () {
  $('.delete_staff_btn').on('click', function() {
    $('#deletestaff_modal').modal('show');
    $tr  = $(this).closest('tr');
    var data = $tr.children("td").map(function() {
      return $(this).text();

    }).get();
    console.log(data);
    $('#delete_staff_id').val(data[0]);
  });
});
</script>
<!-- end delete category -->

  </body>
</html>
