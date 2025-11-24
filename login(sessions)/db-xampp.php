<?php
$register_connection = mysqli_connect("localhost","root","","facebook");
if (!$register_connection) { 
  die("DATABASE NOT CONNECTED OR DOES NOT EXIST");
};
?>
