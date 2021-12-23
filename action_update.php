<!--action form -->

<?php

include('includes/db.php');


if (isset($_POST["id"])){
    $id = $_POST["id"];
    $avata = $_POST["avata"];
    // xu ly avata
    $errors= array();
    $file_name = $_FILES['input_avatar']['name'];
    $file_size = $_FILES['input_avatar']['size'];
    $file_tmp = $_FILES['input_avatar']['tmp_name'];
    $file_type = $_FILES['input_avatar']['type'];
    $file_parts =explode('.',$_FILES['input_avatar']['name']);
    $file_ext=strtolower(end($file_parts));
    $expensions= array("jpeg","jpg","png","gif");

    if((in_array($file_ext,$expensions) === false) or ($file_size > 2097152*2) ){
        $errors[]="Chỉ hỗ trợ upload file JPEG hoặc PNG GIF .";
        $errors[]="file không đc quá 4MB.";
        $avata = "error-avata.png";
    }else{
        $avata= $id.".".$file_ext;
        $target = "static/images/avata/".basename($avata);
        if (move_uploaded_file($_FILES['input_avatar']['tmp_name'], $target)) {
        echo '<script language="javascript">alert("Đã upload thành công!");</script>';
        }else{
        echo '<script language="javascript">alert("Đã upload thất bại!");</script>';
        };
    };
};

$sql = "UPDATE users SET avata='$avata' WHERE id=$id";

if (mysqli_query($con, $sql)) {
    //Nếu kết quả kết nối thành công, trở về trang view.
    header('Location: profile.php');
} else {
    //Nếu kết quả kết nối không được
    header('Location: profile.php?error=1');
}


mysqli_close($con);

?>
