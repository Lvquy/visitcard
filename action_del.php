<?php
    require('includes/db.php');
    if(isset($_POST["id_social"])){
        $id_social = $_POST["id_social"];
        $query_del = "DELETE FROM social WHERE id=$id_social ";
        $result_del = mysqli_query($con,$query_del);

        // update lai id
        $query_min_id = "SELECT MIN(id) FROM social";
        $result_min_id = mysqli_query($con, $query_min_id);
        $row_min_id = mysqli_fetch_row($result_min_id);
        $min_id = $row_min_id[0];

        $query_max_id = "SELECT MAX(id) FROM social";
        $result_max_id = mysqli_query($con, $query_max_id);
        $row_max_id = mysqli_fetch_row($result_max_id);
        $max_id = $row_max_id[0];

        $query_count_social = "SELECT id FROM social";
        $result_query_count_social = mysqli_query($con,$query_count_social);
        $count_social = mysqli_num_rows($result_query_count_social);

        // trường hợp còn 1 id xóa luôn không cần swap
        if ($count_social > 0){
            if($max_id != $id_social){
                $i=-($id_social);
                while($i <= -$min_id +1){
                    $query_update_index = "UPDATE social SET id = -$i+1 WHERE id = -$i ";
                    $result_update_index = mysqli_query($con,$query_update_index);
                    $i = $i+1;
                }
            }
        }
        $con -> close();
    };


    if(isset($_POST["id_skill"])){
        $id_skill = $_POST["id_skill"];
        $query_skill = "DELETE FROM skill WHERE id=$id_skill ";
        $result_skill = mysqli_query($con,$query_skill);
        $con -> close();
    };


    if(isset($_POST["id_coin"])){
        $id_coin = $_POST["id_coin"];
        $query_coin = "DELETE FROM coins WHERE id=$id_coin ";
        $result_coin = mysqli_query($con,$query_coin);
        $con -> close();
    }
?>