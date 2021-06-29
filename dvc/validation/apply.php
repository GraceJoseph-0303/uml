<?php
session_start();
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
include "../dbcon.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){

$staff_id_fk = $connect->real_escape_string($_REQUEST['staff_id_fk']);
$date_submitted = $connect->real_escape_string($_REQUEST['date_submitted']);
$relative_name = $connect->real_escape_string($_REQUEST['relative_name']);
$relative_relationship = $connect->real_escape_string($_REQUEST['relative_relationship']);
$relative_date_submitted = $connect->real_escape_string($_REQUEST['relative_date_submitted']);
$starting_date = $connect->real_escape_string($_REQUEST['starting_date']);
$no_of_days = $connect->real_escape_string($_REQUEST['no_of_days']);
$remaining_days_for_leave = $connect->real_escape_string($_REQUEST['remaining_days_for_leave']);
$previous_leave = $connect->real_escape_string($_REQUEST['previous_leaves']);
$remaining_days_to_be_taken = $connect->real_escape_string($_REQUEST['remaining_days_to_be_taken']);
$days_i_take = $connect->real_escape_string($_REQUEST['days_i_take']);
$bank = $connect->real_escape_string($_REQUEST['bank']);
$account_number = $connect->real_escape_string($_REQUEST['account_number']);
$leave_address = $connect->real_escape_string($_REQUEST['leave_address']);
$leave_status = "pending";


    $query = "INSERT INTO leave_requests(staff_id_fk,date_submitted,relative_name,relative_relationship,relative_date_submitted,starting_date,no_of_days,remaining_days_for_leave_requests,previous_leave_requests,remaining_days_to_be_taken,days_i_take,bank,account_number,leave_requests_address,leave_requests_status)
    VALUES('$staff_id_fk','$date_submitted','$relative_name','$relative_relationship','$relative_date_submitted', '$starting_date','$no_of_days','$remaining_days_for_leave','$previous_leave','$remaining_days_to_be_taken','$days_i_take','$bank','$account_number','$leave_address','$leave_status')";
    $insert_query = $connect->query($query);
echo mysqli_error($connect);
    if($insert_query){
        $_SESSION['success'] = "
        <script>
        Swal.fire(
    'YOUR APPLICATION IS SENT!',
    'WAIT FOR REPLY',
    'success'
  )
      </script>";
  }else{

  }
header("Location:../index.php");
}else{}



?>
