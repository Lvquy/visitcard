
<?php
require('includes/db.php');

?>
<?php
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $query_user = "SELECT * FROM `users` WHERE slug = '$id'";
        $result = mysqli_query($con, $query_user);
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);
        if ($count > 0){
			$random = rand(100,9000);
			$avata = $row["avata"]."?".$random;
			$domain = "https://vncard.info/";
			$slug = $row["slug"];
			$url = $domain.$slug;
			$address = $row["address"];
			$email = $row["email"];
			$intro = $row["intro"];
			$mobile = $row["mobile"];
			$fullname = $row["fullname"];
			$top_bg_color = $row["top_bg_color"];
			$top_bg_img = $row["top_bg_img"];
			$dir_cover = "../images/theme/";
			$top_bg_img_full = $dir_cover.$top_bg_img;
			$top_text_color = $row["top_text_color"];
			$active = $row["active"];
			$id = $row["id"];
			$bank_name = $row["bank_name"];
			$bank_num = $row["bank_num"];
			$bank_sub = $row["bank_sub"];
			$bank_user = $row["bank_user"];
        }
        else{
        	header("Location: index.php");
        exit;}
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel='icon' href='static/images/logo.png' type='image/x-icon'>
	<title><?php echo $fullname ?> | VnCard.info</title>
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="static/css/public_style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
	<div class="input-hide">
		<input type="hidden" value="<?php echo $active?>" id="active_status">
		<input type="hidden" value="<?php echo $id?>" id="id_user">
		<input type="hidden" value="<?php echo $address ?>" id="address">
		<input type="hidden" value="<?php echo $email ?>" id="email">
		<input type="hidden" value="<?php echo $bank_name ?>" id="bank_name">
		<input type="hidden" value="<?php echo $bank_num ?>" id="bank_num">
		<input type="hidden" value="<?php echo $intro ?>" id="i_intro">
		<input type="hidden" value="<?php echo $mobile ?>" id="mobile">
		<input type="hidden" value="<?php echo $url ?>" id="url">
	</div>

	<div class="container">
		<div class="row">
			<div class="col-12 top" style="--top-bg-color:<?php echo $top_bg_color?>;
			 --top-bg-img:url(<?php echo $top_bg_img_full ?>)">
				<div class="avata">
					<img src="static/images/avata/<?php echo $avata?>" alt="" class="img-avata">
				</div>
				<div class="name">
					<h6 style="--top-text-color:<?php echo $top_text_color?>"><?php echo $fullname?></h6>
					<i class="bi bi-check-circle" style="display: none;color:blue" id='tichxanh' title="Tài khoản chính thức"></i>
				</div>
				<div class="slug" style="--top-text-color:<?php echo $top_text_color?>">
					<i class="bi bi-person-bounding-box" >
						 <?php echo $url ;?>
					</i>
					&emsp;<i title="coppy link" class="bi bi-clipboard" onClick="coppy('url','cped_url','cp_url')" id="cp_url"></i>
					<i class="bi bi-clipboard-check" style="display: none;color:blue" id="cped_url"></i>
				</div>
			</div>
			<div class="col-12 intro" id="intro">
				<table class="table table-responsive text-center">
					<tr>
						<td>
							<p id='p_address'>
								<i class="bi bi-pin-map"> Địa chỉ</i> <br>
							 <?php echo $address;?>
							</p>
						</td>
						<td >
							<a href="https://maps.google.com/?q=<?php echo $address;?>" target="_blank">
								<i class="bi bi-geo-alt" title="Mở google map"></i>
							</a>
						</td>
					</tr>
					<tr>
						<td>
							<p id="p_email">
								<i class="bi bi-envelope"> Email
								</i> <br>
								<a href="mailto:<?php echo $email?>" ><?php echo $email?></a>
							</p>
						</td>
						<td>
							<i title="coppy mail" class="bi bi-clipboard" onClick="coppy('email','cped_mail','icon_cp_mail')"id="icon_cp_mail"></i>
							<i class="bi bi-clipboard-check" style="display: none;color:blue" id="cped_mail"></i>
						</td>
					</tr>
					<tr>
						<td>
							<p>
								<i class="bi bi-bank"> STK <?php echo $bank_name ?> </i> <br>
								<span><?php echo $bank_num ?></span> <br>
								<i>Chủ tài khoản: <?php echo $bank_user ?></i> <br>
								<i>Chi nhánh: <?php echo $bank_sub ?></i>
							</p>
						</td>
						<td>
							<i title="coppy số tài khoản" class="bi bi-clipboard" id="icon_cp_bank" onclick="coppy('bank_num','cped_bank_num','icon_cp_bank')"></i>
							<i class="bi bi-clipboard-check" style="display: none;color:blue" id="cped_bank_num"></i>
						</td>
					</tr>
					
				</table>
				<p id="p_intro">
					<q><?php echo $intro?></q>
				</p>
				
			</div>

			<div class="col-12 phone text-center">
				<div class="col-12" id="show_intro" >
					<img src="static/images/down.gif" alt="down" onclick="show_intro()" title="Xổ ra" width="20px">
					
				</div>
				<div class="col-12" id="hide_intro">
					<img src="static/images/up.gif" onclick="hide_intro()" title="Thu gọn" width="20px" alt="up">
					
				</div>
				<div class="call-button" id="phone">
					
					<a class="link-dark" href="tel:<?php echo $mobile?>"> <?php echo $mobile?></a>
					<i title="coppy số điện thoại" class="bi bi-clipboard cped-mobile" onClick="coppy('mobile','cped_mobile','icon_cp_mobile')"id="icon_cp_mobile"></i>
					<i class="bi bi-clipboard-check" style="display: none;color:blue" id="cped_mobile"></i>
					
				</div>
				<div class="call-button1">
					<a href="tel:<?php echo $mobile?>" class="btn btn-dark"><i class="bi bi-telephone-forward"></i> Gọi Điện</a>

					<a href="sms://<?php echo $mobile?>" class="btn btn-dark"><i class="bi bi-chat-left-text"></i> SMS</a>
					
				</div>
				<hr>
			</div>
			<div class="col-12 main-box">
				<div class="container mt-2">
					<div class="social">

						<h4 class="text-dark">Liên kết</h4>
						<span id="load_social"></span>
						<hr>
					</div>
					
					<div class="coins">
						<h4 class="text-dark">Ví điện tử</h4>
						
						<span id="load_coins">
						</span>
						<hr>
					</div>
					
					<div class="skill">
						<h4 class="text-dark">Kỹ năng</h4>
						<div class="row skill-list">
							<table>
								<tr>
									<td class="skill_name" width="40%"></td>
									<td></td>
									<td width="10%"></td>
								</tr>
								<tbody id="load_skill">
								
								</tbody>
								</div>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include('includes/footer1.html'); ?>
	
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="static/js/public_profile.js"></script>
</body>
</html>