<?php
// change table name to data (it is registration if using xampp DB in aptech)
$register_connection = mysqli_connect("localhost","root","root","user_data");
if (!$register_connection) { 
  die("DATABASE NOT CONNECTED"); 
};
?>
