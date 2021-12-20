



//clicked social
function clicked(id_s) {
	$.post("action_social.php",{id_s:id_s},function(data){

	})
}
//coppy coin
function coppy_coin(id_coin) {
	var icon_cp = id_coin+"-icon-cp";
	var icon_cped = id_coin+"-icon-cped";
	var text_cp = $("#"+id_coin+"-wallet").text()
	$("#"+icon_cped).fadeIn(1);
	$("#"+icon_cp).fadeOut(1);
	navigator.clipboard.writeText(text_cp);
}

//coppy social
function coppy_social(id_social) {
	var icon_cp = id_social+"-icon-cp";
	var icon_cped = id_social+"-icon-cped";
	var id_social_link = id_social+".social_link";
	var social_link = document.getElementById(id_social_link).getAttribute("href");
	$("#"+icon_cped).fadeIn(1);
	$("#"+icon_cp).fadeOut(1);
	console.log(social_link);
	navigator.clipboard.writeText(social_link);
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

//coppy
function coppy(id,id_show,id_hide){
	document.getElementById(id_hide).style.display = "none";
	document.getElementById(id_show).style.display = "inline-block";

	var text_cp = $("#"+id).val()
	if (text_cp.length==0){
		var text_cp = $("#"+id).html()
	}
	navigator.clipboard.writeText(text_cp);
	console.log(text_cp)

}
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