



//clicked social
function clicked(id_s) {
	$.post("action_social.php",{id_s:id_s},function(data){

	})
}
//coppy
function copyToClipboard(text) {
    var text_coppy = document.createElement("textarea");
    document.body.appendChild(text_coppy);
    text_coppy.value = text; //save main text in it
    text_coppy.select(); //select textarea contenrs
    document.execCommand("copy");
    document.body.removeChild(text_coppy);
}
function coppy(id,id_show,id_hide){
    var copyText = document.getElementById(id);
    copyToClipboard(copyText.value);
    document.getElementById(id_hide).style.display = "none";
	document.getElementById(id_show).style.display = "inline-block";
}
function coppy_coin(id_coin) {
	var id_cp_coin = id_coin+"-wallet"
  	var range = document.createRange();
	range.selectNode(document.getElementById(id_cp_coin));
	window.getSelection().removeAllRanges(); // clear current selection
	window.getSelection().addRange(range); // to select text
	document.execCommand("copy");
	window.getSelection().removeAllRanges();// to deselect
	$("#"+id_coin+"-icon-cp").css({"display":"none"})
	$("#"+id_coin+"-icon-cped").css({"display":"inline-block"})
}
function coppy_social(id_social) {
	var id = id_social+"-social_link";
	var id_cp = id_social+"-scp"
	var id_cped = id_social+"-scped"
	var a = document.getElementById(id_cp)
	$("#"+id_cp).css({"display":"none"})
	$("#"+id_cped).css({"display":"inline-block"})
	var social_link = document.getElementById(id).getAttribute("href");
 	copyToClipboard(social_link);
 	
	
}

//show intro
function show_intro(){
	$("#intro").fadeIn(1000);
	$("#hide_intro").fadeIn(1);
	$("#show_intro").fadeOut(1);
}
//hide intro
function hide_intro(){
	$("#show_intro").fadeIn(1);
	$("#intro").fadeOut(1);
	$("#hide_intro").fadeOut(1);
}
//get skill
function get_skill() {
	var id = $("#id_user").val();
	$.post("get_public_skill.php",{id:id},function(data){
		$("#load_skill").html(data);
		var a = $("#load_skill").children().length
		if (a ==0){
			$(".skill").css({"display":"none"})
		}
	});
}
//get social
function get_social(){
	var id = $("#id_user").val();
	$.post("get_public_social.php",{id:id},function(data){
		$("#load_social").html(data);
		var a = $("#load_social").children().length
		if (a==0) {
			$(".social").css({"display":"none"})
		}
	});
	};
//get coin
function get_coins() {
	var id = $("#id_user").val();
	$.post("get_public_coin.php",{id:id},function(data){
		$("#load_coins").html(data);
		if ($("#load_coins").children().length ==0){
			$(".coins").css({"display":"none"})
		}
	});
	};




//visitor count
function visit_count() {
	var id_u = $("#id_user").val()
	$.post("get_public_social.php",{id_u:id_u},function(data){
		console.log('visit count')
	})
}

//auto load
$( document ).ready(function() {
	 console.log('auto load');
	 var active = $("#active_status").val();
	 if (active == 2){
		 document.getElementById("tichxanh").style.display = "inline-block";
	 };
	 get_social();
	 get_skill();
	 get_coins();
	 visit_count();
	 var address = $("#address").val();
	 var email = $("#email").val();
	 var bank_name = $("#bank_name").val();
	 var bank_num = $("#bank_num").val();
	 var intro = $("#i_intro").val();
	 var mobile = $("#mobile").val();


	 if (address == ''){
	 	$("#p_address").css({"display":"none"})
	 	
	 };
	 if (email == ''){
	 	$("#p_email").css({"display":"none"})
	 };
	 if ((bank_num == '') || (bank_name == '') ){
	 	$("#p_bank_name").css({"display":"none"})
	 };
	 if (intro == '' ){
	 	$("#p_intro").css({"display":"none"})
	 };
	 if (mobile == '' ){
	 	$("#phone").css({"display":"none"})
	 };
	 
	 
})
//auto load end