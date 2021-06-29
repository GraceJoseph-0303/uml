<?php
session_start();
include "../dbcon.php";
if(isset($_GET['staff_id_fk'])){
$id = $_GET['staff_id_fk'];
$hod_accept = "dvc-accept";

$query = "UPDATE leave_requests SET leave_status = '$hod_accept' WHERE staff_id_fk = '".$id."' ";
$result = mysqli_query($connect,$query);
  //
  // echo mysqli_error($connect);
  if($result){
      $_SESSION['accepted'] = "
      <script>
      Swal.fire(
  'FORWARED TO DVC',
  '',
  'success'
)
    </script>";
    header("Location:../index.php");
}else{

}



}else{

}
?>
