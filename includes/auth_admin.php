
<?php
session_start();

if(($_SESSION['id'] != 10) || ($_SESSION['admin'] != 1) ){

if(session_destroy())
{
header("Location: login.php");
}
exit(); }
?>
