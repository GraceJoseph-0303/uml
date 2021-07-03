<?php
include_once("dbcon.php");

session_start();
if (count($_POST) > 0) {

    $sql = "SELECT password from staff WHERE email='" . $_SESSION["email_add"] . "'";
    $result = $connect->query($sql);
    $row = $result->fetch_array();

    $password = $row['password'];

    if (password_verify($_POST['old_password'], $password )) {

        $password = password_hash(strtoupper($_POST['new_password']), PASSWORD_DEFAULT);

        $query1 = "UPDATE staff set password='" . $password . "' WHERE email='" . $_SESSION["email_add"] . "'";
        $result1 = $connect->query($query1);

          if ($result1) {
            $message = "Password Changed";
            header("Location:../index.php");
            var_dump($message);
          }else {
              $message = "Something went wrong!!!";
              var_dump($message);
          }

    } else{
        $message = "Current Password is not correct";
        var_dump($message);
      }

}
?>
