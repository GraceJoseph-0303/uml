<?php
session_start();
include "../dbcon.php";
if(isset($_POST['update_staff'])){

$staff_id = $_POST['staff_id_update'];

$first_name = $connect->real_escape_string($_POST['first_name']);
$last_name = $connect->real_escape_string($_POST['last_name']);
$phone_number = $connect->real_escape_string($_POST['phone_number']);
$gender = $connect->real_escape_string($_POST['gender']);
$email = $connect->real_escape_string($_POST['email']);
$date_of_employment = $connect->real_escape_string($_POST['date_of_employment']);
$roles = $connect->real_escape_string($_POST['roles']);
$college = $connect->real_escape_string($_POST['college']);
$department= $connect->real_escape_string($_POST['department']);
$default_password = "UDSM2020";
$password = $connect->real_escape_string(password_hash(strtoupper($default_password),PASSWORD_DEFAULT));



    $query = "UPDATE staff set first_name = '$first_name', last_name = '$last_name', phone_number = '$phone_number', gender = '$gender',
              email = '$email', password = '$default_password', date_of_employment = '$date_of_employment', roles = '$roles', college = '$college', department = '$department'
              WHERE staff_id = '".$staff_id."' ";
              $insert_query = $connect->query($query);
    if($insert_query){
        $_SESSION['update'] = "
      <script>
        Swal.fire(
    'UPDATED',
    '',
    'success'
  )
      </script>";
      header("Location:../manage-staff.php");
  }else{
// echo mysqli_error($connect);
  }



}else{}



?>
