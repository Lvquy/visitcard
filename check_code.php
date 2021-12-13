<?php
    require('includes/db.php');
    if (isset($_POST["code"])){
        $code = $_POST["code"];
        $id = $_POST["id"];
        $query_get_code ="SELECT * FROM active_codes WHERE status = 'new' ";
        $result_get_code = mysqli_query($con,$query_get_code);
        $active_date = date("Y-m-d H:i:s");
        $active = 0;
        while($row = mysqli_fetch_array($result_get_code)){
            if ($code == $row["code"]) {
                // kich hoat thanh cong
                $active=1;
                $query_change_active = "UPDATE users set active =2 WHERE id = $id";
                $result_change_active = mysqli_query($con,$query_change_active);

                $query_update_code = "UPDATE active_codes set status='used', for_user = '$id',active_date = '$active_date' WHERE code = '$code'";
                $result_update_code = mysqli_query($con,$query_update_code);
            }
        };
        if ($active ==0){
            echo $active;
            // khong thanh cong
        };
        if ($active ==1){
            echo $active;
            //kich hoat thanh cong
        }

    }
?>