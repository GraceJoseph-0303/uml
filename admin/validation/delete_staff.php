<?php
session_start();
include "../dbcon.php";
//include "../validation/login_check.php";

if(isset($_POST['deletestaff'])){
$id = $_POST['delete_staff_id'];

$sql = "DELETE  FROM staff WHERE staff_id = '".$id."' ";
$results = $connect->query($sql);

    if($results){
      $_SESSION['delete_staff'] = "
    <script>
    Swal.fire({
      position: 'top-end',
      icon: 'success',
      title: 'Staff Deleted',
      showConfirmButton: false,

    })

    </script>";
    header("Location: ../manage-staff.php");
    }else{
      $_SESSION['not_deleted_staff'] = "
    <script>
    Swal.fire({
      position: 'top-end',
      icon: 'error',
      title: 'Category Not Deleted!',
      showConfirmButton: false,

    })

    </script>";
    header("Location: ../manage-staff.php");
    }

}

 ?>
