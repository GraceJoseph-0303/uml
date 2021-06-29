<?php
session_start();
include "../dbcon.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){

$first_name = $connect->real_escape_string($_REQUEST['first_name']);
$last_name = $connect->real_escape_string($_REQUEST['last_name']);
$phone_number = $connect->real_escape_string($_REQUEST['phone_number']);
$gender = $connect->real_escape_string($_REQUEST['gender']);
$email = $connect->real_escape_string($_REQUEST['email']);
$date = $connect->real_escape_string($_REQUEST['date_of_employment']);
$roles = $connect->real_escape_string($_REQUEST['roles']);
$college = $connect->real_escape_string($_REQUEST['college']);
$department= $connect->real_escape_string($_REQUEST['department']);
$default_password = "UDSM2020";
$password = $connect->real_escape_string(password_hash(strtoupper($default_password),PASSWORD_DEFAULT));

    $query = "INSERT INTO staff(first_name,last_name,phone_number,gender,email,password,date_of_employment,roles,college,department)
    VALUES('$first_name','$last_name','$phone_number','$gender','$email','$password', '$date','$roles','$college','$department')";
    $insert_query = $connect->query($query);
    if($insert_query){
        $_SESSION['success'] = "
        <script>
        Swal.fire(
    'New User is added!',
    '',
    'success'
  )
      </script>";
      header("Location:../add-staff.php");
  }else{
    echo mysqli_error($connect);
  }




}else{

}



?>
