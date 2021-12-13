<?php
    require('includes/db.php');
    if (isset($_POST["skill_name"])){
        $id_user = $_POST["id_user"];
        $active_user = $_POST["active_user"];
        $skill_name = $_POST["skill_name"];
        $skill_value = $_POST["skill_value"];
        $color = $_POST["color"];
        $query = "SELECT * FROM skill WHERE of_user = '$id_user'";
        $result = mysqli_query($con,$query);
        $row = mysqli_num_rows($result);

        if($active_user == 2){
            $query_add_skill = "INSERT into skill (skill_name,skill_value,of_user,bg_color_skill) VALUES ('$skill_name','$skill_value','$id_user','$color')";
            $result_add_skill = mysqli_query($con,$query_add_skill);
            echo 1;
            //thêm thành công
        }
        else if ($active_user == 1 and $row < 1){
            $query_add_skill = "INSERT into skill (skill_name,skill_value,of_user,bg_color_skill) VALUES ('$skill_name','$skill_value','$id_user','$color')";
            $result_add_skill = mysqli_query($con,$query_add_skill);
            echo 1;
            //thêm thành công
        }
        else{
            echo 2;
            // cần kích hoạt
        }
    }
    else{
        echo 0;
        //lỗi khi thêm
    }
?>

