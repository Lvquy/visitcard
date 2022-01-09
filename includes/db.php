 <?php
 
// local

// $con = mysqli_connect("localhost","root","","smartcard");
// if (mysqli_connect_errno()){
//   echo "Không thể kết nối đến MySQL: " . mysqli_connect_error();
// }



//server

$con = mysqli_connect("localhost","vncardin_root","Rootvncard.info","vncardin_vncard");
if (mysqli_connect_errno()){
  echo "Không thể kết nối đến MySQL: " . mysqli_connect_error();
}

  
?>


