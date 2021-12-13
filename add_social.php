<?php
    require('includes/db.php');
    if(isset($_POST["id_social"])){
        $id_user = $_POST["id_user"];
        $id_social = $_POST["id_social"];
        $active_user = $_POST["active_user"];
        $dir = "static/images/social_icon/";
        $icon_url = $dir.$id_social.".svg";
        $query = "SELECT * FROM social WHERE of_user = '$id_user'";
        $result = mysqli_query($con,$query);
        $row = mysqli_num_rows($result);
        if($active_user == 2){
            $query_add_social = "INSERT into social (social_name,of_user,icon_url) VALUES ('$id_social','$id_user','$icon_url')";
            $result_add_social = mysqli_query($con, $query_add_social);
            echo 1;
        }
        else if ($active_user == 1 and $row <1 ){
            $query_add_social = "INSERT into social (social_name,of_user,icon_url) VALUES ('$id_social','$id_user','$icon_url')";
            $result_add_social = mysqli_query($con, $query_add_social);
            echo 1;
        }
        else{
            echo 0;
        };
    }
    else{
        echo 0;
    };
?>