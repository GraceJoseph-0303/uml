<?php
session_start();
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
include "../dbcon.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){

$staff_id_fk = $connect->real_escape_string($_REQUEST['staff_id_fk']);
$start_date = $connect->real_escape_string($_REQUEST['start_date']);
$end_date = $connect->real_escape_string($_REQUEST['end_date']);


// $no_of_days = $connect->real_escape_string($_REQUEST['no_of_days']);
$destination = $connect->real_escape_string($_REQUEST['destination']);
$bio = $connect->real_escape_string($_REQUEST['bio']);
$relative_nameArr = $_REQUEST['relative_name'];
$relative_relationshipArr = $_REQUEST['relative_relationship'];
$relative_date_submittedArr = $_REQUEST['relative_date_submitted'];
$leave_status = "pending";


// File information
$target_dir = "leave_attachments";
$file_name = $_FILES["attachment"]["name"];
$target_file = $target_dir . time() . "_{$newfilename}" .basename($_FILES["attachment"]["name"]);
$newName = time() . "_{$newfilename}" .basename($_FILES["attachment"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


if(!empty($relative_nameArr)){
        for($i = 0; $i < count($relative_nameArr); $i++){
            if(!empty($relative_nameArr[$i])){
                $relative_name = $relative_nameArr[$i];
                $relative_relationship = $relative_relationshipArr[$i];
                $relative_date_submitted = $relative_date_submittedArr[$i];

                // Database insert query goes here
                if(($start_date == $end_date) || ($start_date > $end_date)){
                  $_SESSION['invalid_date'] = '<div class="text-red">Double check you Dates</div>';
                  header("Location:../apply.php");
                }else if($imageFileType != "pdf"){
                $_SESSION['invalid'] = '<div class="text-red">Allow format jpg,jpeg and png</div>';
                header("Location:../apply.php");
              }else if($_FILES["attachment"]["size"] > 3000000){
                $_SESSION['large_photo'] = '<div class="text-red">Maximum size is 3Mb</div>';
                header("Location:../apply.php");
              }else{


                $total_days_for_year = 28;
                $start = strtotime($start_date);
                $end  = strtotime($end_date);
                $calculate_days = ($end-$start)/60/60/24;

                $fetch_date = "SELECT SUM(no_of_days) AS taken_days FROM leave_requests INNER JOIN staff ON staff_id = staff_id_fk WHERE email = '".$_SESSION['email_add']."'";
                $day_result = $connect->query($fetch_date);
                  $days = $day_result->fetch_array();
                  $total_day = $days['taken_days'];

                $sum_before_adding = $total_day + $calculate_days;
                if(($total_day > 28) || ($sum_before_adding > 28)){
                  $_SESSION['error_apply'] = "
                  <script>
                  Swal.fire(
              'YOU HAVE USED ALL YOUR DAYS',
              'NEXT YEAR',
              'error'
            )
                </script>";
                header("Location:../index.php");
                }else{
                  // $calculate_days = $total_days_for_year - ($calculate_days_front + $total_day);
                  // $calculate_days =

                $query = "INSERT INTO leave_requests(staff_id_fk,start_date,end_date,no_of_days,destination,bio,relative_name,relative_relationship,relative_date_submitted,attachment_path,leave_status,submitted_at)
                VALUES('$staff_id_fk','$start_date','$end_date','$calculate_days','$destination','$bio','$relative_name','$relative_relationship','$relative_date_submitted','$newName','$leave_status',now())";
                $insert_query = $connect->query($query);
            //echo mysqli_error($connect);
                if($insert_query){
                  move_uploaded_file($_FILES["attachment"]["tmp_name"], $target_file);
                    $_SESSION['success'] = "
                    <script>
                    Swal.fire(
                'YOUR APPLICATION IS SENT!',
                'WAIT FOR RESPONSE',
                'success'
              )
                  </script>";
                  header("Location:../index.php");
              }else{
                echo mysqli_error($connect);
            }
}
}

            }
        }
    }



}else{


}

?>
