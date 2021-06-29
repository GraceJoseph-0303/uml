<?php
session_start();
include "../dbcon.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){

$department_name = $connect->real_escape_string($_REQUEST['department_name']);
$college_id_fk = $connect->real_escape_string($_REQUEST['college_id_fk']);
$department_description = $connect->real_escape_string($_REQUEST['department_description']);
    $query = "INSERT INTO department(dept_name,college_id,dept_description)
    VALUES('$department_name','$college_id_fk','$department_description')  ";
    $insert_query = $connect->query($query);

    if($insert_query){
        $_SESSION['success_dept'] = "
        <script>
        Swal.fire(
    'New department is Added!',
    '',
    'success'
  )
      </script>";
      header("Location:../add-department.php");
  }else{
      echo mysqli_error($connect);
  }

}else{}



?>
