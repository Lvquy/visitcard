<?php
require('includes/db.php');
    if (isset($_POST['id'])){
        $of_user = $_POST['id'];

        $query_get_id = "SELECT active FROM users WHERE id = $of_user";
        $result_get_id = mysqli_query($con,$query_get_id);
        $row = mysqli_fetch_array($result_get_id);
        $active =  $row['active'];
        if ($active == 0){
            $query_change_active = "UPDATE users SET active = 1 WHERE id = $of_user ";
            $result_active = mysqli_query($con,$query_change_active);
            echo 1;
        }
        else{
            echo 0;
            exit();
        };
    }
    else{
        echo 0;
        
        exit();
    }

?>
