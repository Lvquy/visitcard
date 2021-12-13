<?php
    require('includes/db.php');  
if (isset($_POST["id"])){
	$id_user = $_POST["id"];
	$query_get_coins = "SELECT * FROM coins WHERE of_user = $id_user" ;
	$result_get_coins = mysqli_query($con,$query_get_coins);
	$output = "";
	if (mysqli_num_rows($result_get_coins)>0){
		$output = "";
        while($row = mysqli_fetch_array($result_get_coins)){
			$id_coin = $row["id"];
			$logo_url = $row["logo_url"];
			$coin_name = $row["coin_name"];
			$wallet = $row["wallet"];
			$img_icon ="<img src='static/images/coins/$logo_url'>";
			$output .= "
				<div class='row mt-2 social-list'>
					<div class='col-2 icon-social' title='$coin_name'>
					  $img_icon
					</div>
					<div class='col-8' title='$coin_name' id='$id_coin-wallet'>
						$wallet
					</div>
					<div class='col-2'>
						<i onclick='coppy_coin($id_coin)' class='bi bi-clipboard'
						 id='$id_coin-icon-cp'></i>
						<i class='bi bi-clipboard-check right-social' style='display: none;color:blue;float:right' id='$id_coin-icon-cped'>
						</i>
					</div>
				</div>
			";
		}	
	}
	echo $output;
}
?>