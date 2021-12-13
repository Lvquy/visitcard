<?php
    require('../includes/db.php');
    $social_name = $_POST["social_name"];
    $id_user = $_POST["id_user"];
    echo $social_name;

    if ($social_name = "Facebook"){
        $icon_url = "fb.png";
        $query = "INSERT into `social` (social_name,of_user,icon_url) VALUES ('$social_name','$id_user','$icon_url')";
        $result = mysqli_query($con,$query);

    };

    if ($social_name = "Zalo"){
        $icon_url = "zalo.jpg";
        $query = "INSERT into `social` (social_name,of_user,icon_url) VALUES ('$social_name','$id_user','$icon_url')";
        $result = mysqli_query($con,$query);
    }

$con -> close();
?>