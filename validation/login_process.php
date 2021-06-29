<?php
session_start();
include "dbcon.php";

$user_email = $password = "";
if((isset($_POST['submit']))){

if(empty($_POST['email'])){
  $_SESSION['empty_email'] = '<div class="text-danger">Email is required</div>';
  header("Location:../login.php");
}else if(empty($_POST['password'])){
  $_SESSION['empty_password'] = '<div class="text-danger">Password is Required</div>';
  header("Location:../login.php");
}else{
  // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
  if ($stmt = $connect->prepare('SELECT email, password,roles FROM staff WHERE email = ?')) {
  	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
  	$stmt->bind_param('s', $_POST['email']);
  	$stmt->execute();
  	// Store the result so we can check if the account exists in the database.
  	$stmt->store_result();
    if ($stmt->num_rows > 0) {
	$stmt->bind_result($staff_id, $password,$role);
	$stmt->fetch();
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
	if (password_verify($_POST['password'], $password)) {
		// Verification success! User has loggedin!
		// Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
    switch($role){

      case 'staff':
      session_regenerate_id();
      $_SESSION['loggedin'] = TRUE;
      $_SESSION['email_add'] = $_POST['email'];
      $_SESSION['staff'] = $staff_id;
      header("Location:../staff/index.php");
      exit();

      case 'admin':
      session_regenerate_id();
      $_SESSION['loggedin'] = TRUE;
      $_SESSION['email_add'] = $_POST['email'];
      $_SESSION['staff_id'] = $staff_id;
      header("Location:../admin/index.php");
      exit();

      case 'hod':
      session_regenerate_id();
      $_SESSION['loggedin'] = TRUE;
      $_SESSION['email_add'] = $_POST['email'];
      $_SESSION['staff_id'] = $staff_id;
      header("Location:../hod/index.php");
      exit();

      case 'principal':
      session_regenerate_id();
      $_SESSION['loggedin'] = TRUE;
      $_SESSION['email_add'] = $_POST['email'];
      $_SESSION['staff_id'] = $staff_id;
      header("Location:../principal/index.php");
      exit();

      case 'dvc':
      session_regenerate_id();
      $_SESSION['loggedin'] = TRUE;
      $_SESSION['email_add'] = $_POST['email'];
      $_SESSION['staff_id'] = $staff_id;
      header("Location:../dvc/index.php");
      exit();
    }
	} else {
		// Incorrect password
		$_SESSION['incorrect_details_1'] = '<div class="text-red">Incorrect username and/or password </div>';
    header("Location: ../login.php");
	}
} else {
	// Incorrect username
  $_SESSION['incorrect_details_2'] = '<div class="text-red">Incorrect username and/or password </div>';
  header("Location: ../login.php");
}

  	$stmt->close();

}
}
}else{

}
