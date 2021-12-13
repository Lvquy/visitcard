<?php
    require('includes/db.php');
    if(isset($_POST["id_skill"])){
        $id_skill = $_POST["id_skill"];
        $skill_value = $_POST["skill_value"];
        $color = $_POST["color"];
        $query_update_skill = "UPDATE skill SET skill_value = '$skill_value', bg_color_skill = '$color' WHERE id = $id_skill ";
        $result_update_skill = mysqli_query($con,$query_update_skill);
        echo 1;
        //thanh cong
    }
    else{
        echo 0;
        //that bai
    }
?>