<?php
    require('includes/db.php');
    if(isset($_POST["id_social"])){
        $id_social = $_POST["id_social"];
        $query_del = "DELETE FROM social WHERE id=$id_social ";
        $result_del = mysqli_query($con,$query_del);
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