<?php
    require('includes/db.php');
    if (isset($_POST["coin_name"])){
        $id_user = $_POST["id_user"];
        $active_user = $_POST["active_user"];
        $coin_name = $_POST["coin_name"];
        $query= "SELECT * FROM coins WHERE of_user='$id_user'";
        $result = mysqli_query($con,$query);
        $row = mysqli_num_rows($result);

        if($active_user == 2) {
            $query_add_coin = "INSERT into coins (coin_name,logo_url,of_user) VALUES
             ('$coin_name','$coin_name.svg','$id_user')";
            $result_add_coin = mysqli_query($con,$query_add_coin);
            echo 1;
            //thêm thành công
        }
        else if ($active_user == 1 and $row <1 ){
            $query_add_coin = "INSERT into coins (coin_name,logo_url,of_user) VALUES
             ('$coin_name','$coin_name.svg','$id_user')";
            $result_add_coin = mysqli_query($con,$query_add_coin);
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

