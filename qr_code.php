

<?php
/*    
api google <img src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl='.$_REQUEST['sample'].'" title="qrcode">
/
*/
$code = 
'<center>
	<img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data='.$_REQUEST['sample'].'">
</center>';
echo $code;
?>



