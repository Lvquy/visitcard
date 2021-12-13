<?php
$con = mysqli_connect("localhost","root","","smartcard");
if (mysqli_connect_errno())
  {
  echo "Không thể kết nối đến MySQL: " . mysqli_connect_error();
  }
?>