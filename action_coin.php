<?php
    require('includes/db.php');
    if(isset($_POST["id"])){
        $id = $_POST["id"];

        $query_get_coin = "SELECT * FROM coins WHERE of_user = $id";
        $result_get_coin = mysqli_query($con,$query_get_coin);
        $output ="";
        if (mysqli_num_rows($result_get_coin)>0){
            $output = "";
            while($row = mysqli_fetch_array($result_get_coin)){
                $id_coin = $row["id"];
                $logo_url = $row["logo_url"];
                $coin_name = $row["coin_name"];
                $wallet = $row["wallet"];
                $is_active = $row["is_active"];
                $img_icon = "<img src='static/images/coins/$logo_url' />";
                $display_none = "display:none";
                
                $output .="
                <tr>
                    <td rowspan='2'>$img_icon</td>
                    <td>
                        <input type='text' readonly placeholder='Label name coin' class='form-control' name='$coin_name' value='$coin_name' id='$id_coin-name_coin'>
                    </td>
                    <td >
                        <i class='fa pencil-right fa-pencil' id='$id_coin-edit'
                         onclick='edit_coin($id_coin)' title='Sửa'>
                        </i> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type='text' readonly placeholder='Label name coin' class='form-control' name='$wallet' value='$wallet' id='$id_coin-wallet'>
                    </td>
                    <td>
                        <i class='fa fa-trash-o trash-right' 
                        onclick='confirm_del_coin($id_coin)' id='$id_coin-del' title='Xóa' >
                        </i>
                    </td>
                    
                </tr>
                <tr>
                    <td colspan='3'><hr></td>
                </tr>
                ";
            }
        echo $output;
        }
        else{
            echo '';
        };
    }
?>