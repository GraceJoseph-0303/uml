<?php
$host_name = "localhost";
$user_name = "root";
$password = "";
$database_name = "uml";

$connect = new mysqli($host_name,$user_name,$password,$database_name);
if($connect === false){
  die("ERROR: COULD NOT CONNECT ".$connect->connect_error);
}
