<?php
session_start();
include "../dbcon.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){

$college_name = $connect->real_escape_string($_REQUEST['college_name']);
$college_address = $connect->real_escape_string($_REQUEST['college_address']);
$college_description = $connect->real_escape_string($_REQUEST['college_description']);
$colleg_slug = $connect->real_escape_string($_REQUEST['college_slug']);
    $query = "INSERT INTO college(college_name,college_address,college_description,college_slug)
    VALUES('$college_name','$college_address','$college_description','$colleg_slug')  ";
    $insert_query = $connect->query($query);

    if($insert_query){
        $_SESSION['success_college'] = "
        <script>
        Swal.fire(
    'New College is Added!',
    '',
    'success'
  )
      </script>";
      header("Location:../add-college.php");
  }else{
      echo mysqli_error($connect);
  }

}else{}



?>
