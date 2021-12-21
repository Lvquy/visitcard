<?php
    require('includes/db.php');  
if (isset($_POST["id_u"])){
	$id_u = $_POST["id_u"];
	$query_visit = "UPDATE users SET visit = visit+1 WHERE id ='$id_u'";
	$result = mysqli_query($con,$query_visit);
}
if (isset($_POST["id"])){
	$id_user = $_POST["id"];
	$query_get_social = "SELECT * FROM social WHERE of_user = $id_user AND is_active = 1 " ;
	$result_get_social = mysqli_query($con,$query_get_social);
	$output = "";
	if (mysqli_num_rows($result_get_social)>0){
		$output = "";
        while($row = mysqli_fetch_array($result_get_social)){
			$icon = $row["icon_url"];
			$img_icon = "<img src='$icon' />  ";
			$social_name = $row["social_name"];
			$social_link = $row["social_link"];
			$id_social = $row["id"];
			$output .= "
				<div class='row mt-2 social-list'>
					<div class='col-2 icon-social '>
					  $img_icon
					</div>
					<div class='col-8'>
						<a href='$social_link' target='_blank' id='$id_social-social_link' onclick='clicked($id_social)'>
							$social_name
						</a>
					</div>
					<div class='col-2'>
						<i onclick='coppy_social($id_social)' class='bi bi-clipboard'
						 id='$id_social-scp'></i>
						<i class='bi bi-clipboard-check right-social' style='display: none;color:blue;float:right' id='$id_social-scped'></i>
					</div>
				</div>
			";
		}	
	}
	echo $output;
}
?>