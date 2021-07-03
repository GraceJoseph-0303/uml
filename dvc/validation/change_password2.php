<?php
session_start();
$staff_id = $_SESSION["staff_id"];
$conn = mysqli_connect("localhost", "root", "", "uml") or die("Connection Error: " . mysqli_error($conn));

if (count($_POST) > 0) {
    $result = mysqli_query($conn, "SELECT password from users WHERE staff_id='" . $_SESSION["staff_id"] . "'");
    $row = mysqli_fetch_array($result);
    if ($_POST["old_password"] == $row["password"]) {
        mysqli_query($conn, "UPDATE users set password='" . $_POST["new_password"] . "' WHERE staff_id='" . $_SESSION["staff_id"] . "'");
        $message = "Password Changed";
    } else
        $message = "Current Password is not correct";
}
?>
