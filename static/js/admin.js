



function create_new_token() {
	var token = $("#token").val()
	var mobile_iden = $("#mobile_iden").val()
	var active_token = $("#active_token").val()
	var email_token = $("#email_token").val()
	$.post("ajax_process/action_admin.php",
		{token:token,mobile_iden:mobile_iden,active_token:active_token,email_token:email_token},function(data){
		//
	})

}
// phan trang
var curent_page = 1
function loadmore() {
	
	curent_page = curent_page +1
	$.post("ajax_process/action_admin.php",{curent_page:curent_page},function(data){
		$("#load_so").append(data)	
	})	
}

function onchange_state(value) {
	
	if (value ==0 &  document.getElementById("0").disabled == false){
		
		$(".0").css({"background-color":"red"})
		$(".1").css({"background-color":"unset"})
		$(".2").css({"background-color":"unset"})
	};
	if (value ==1 & document.getElementById("1").disabled == false){
		
		$(".0").css({"background-color":"unset"})
		$(".1").css({"background-color":"red"})
		$(".2").css({"background-color":"unset"})
	};
	if (value ==2 & document.getElementById("2").disabled == false){
		
		$(".0").css({"background-color":"unset"})
		$(".1").css({"background-color":"unset"})
		$(".2").css({"background-color":"red"})
	}
}
function show_id(id) {
	$("#"+id).css({"display":"inline-block"})
}
function hide_id(id) {
	$("#"+id).css({"display":"none"})
}
function readonly_true(id) {
	document.getElementById(id).readOnly = true;
}
function readonly_false(id) {
	document.getElementById(id).readOnly = false;
}


// edit_btn
function edit_btn() {
	readonly_false("customer")
	readonly_false("date_order")
	readonly_false("mobile")
	readonly_false("add")
	readonly_false("saler")
	readonly_false("so_qty")
	readonly_false("so_price")
	readonly_false("note")
	$('#card_type').attr('disabled', false)
	
	document.getElementById("0").disabled = false;
	document.getElementById("1").disabled = false;
	document.getElementById("2").disabled = false;
	
	hide_id("edit_btn")
	show_id("done_btn")
}
// done_btn
function done_btn() {
	hide_id("done_btn")
	show_id("edit_btn")
	readonly_true("customer")
	readonly_true("date_order")
	readonly_true("mobile")
	readonly_true("add")
	readonly_true("saler")
	readonly_true("so_qty")
	readonly_true("so_price")
	readonly_true("note")
	$('#card_type').attr('disabled', true)
	var so = $("#id_so").html()
	var customer = $("#customer").val()
	var date_order = $("#date_order").val()
	var mobile = $("#mobile").val()
	var add = $("#add").val()
	var saler = $("#saler").val()
	var so_qty = $("#so_qty").val()
	var so_price = $("#so_price").val()
	var note = $("#note").val()
	var card_type = $("#card_type").val()
	var state = $('input[name="state"]:checked').val();

	$.post("ajax_process/action_admin.php",
		{customer:customer,date_order:date_order,
			mobile:mobile,add:add,saler:saler,
			so_qty:so_qty,so_price:so_price,
			note:note,card_type:card_type,so:so,state:state}
		,function(data){
		get_so()
		//
		document.getElementById("0").disabled = true
		document.getElementById("1").disabled = true
		document.getElementById("2").disabled = true
		//
	})
}
// create_newso
function create_newso() {
	var c_name = $("#cusname").val()
	var c_mobile = $("#mobile").val()
	var c_type = $("#type").val()
	var c_qty = $("#qty").val()
	var c_price = $("#price").val()
	var c_saler = $("#saler").val()
	var c_state = $("#state").val()
	var c_add = $("#add").val()
	var c_note = $("#note").val()
	var c_price = $("#price").val()
	$.post("ajax_process/action_admin.php",
		{c_name:c_name,c_mobile:c_mobile,c_add:c_add,c_type:c_type,c_price:c_price,c_qty:c_qty,c_note:c_note,c_saler:c_saler,c_state:c_state},
		function(data){
			document.getElementById("form_create_new_so").reset();
			get_so()
	})
}


//check user unique
function check_user(new_username) {
	
	$.post("ajax_process/action_admin.php",{new_username:new_username},function(data){
		if (data == 0) {
			$("#adduser_alert").html("Trùng slug!").css({'color':'red'})
			
		};
		if (data == 1) {
			//ok
			$("#adduser_alert").html("Hợp lệ")
			
		}
	})
}

function del_token_1(id) {
	console.log('del 1')
	$("#"+id+"-del").fadeOut(1)
	$("#"+id+"-undo").fadeIn(1)
	$("#"+id+"-confirm-del").fadeIn(1)
}
function del_token(id) {
	var id_token_del = id
	$.post("ajax_process/action_admin.php",{id_token_del:id_token_del},function(data){
		get_token()
	})
}
function del_so_1(so) {
	$("#"+so+"-del").fadeOut(1)
	$("#"+so+"-undo").fadeIn(1)
	$("#"+so+"-confirm-del").fadeIn(1)
}
function del_so(so_del) {
	$.post("ajax_process/action_admin.php",{so_del:so_del},function(data){
		get_so()
	})
}

//del_code_1
function del_code_1(id_code) {
	$("#"+id_code+"-del").fadeOut(1)
	$("#"+id_code+"-undo").fadeIn(1)
	$("#"+id_code+"-confirm-del").fadeIn(1)
}
function del_code(id_code) {
	var id_del_code = id_code
	$.post("ajax_process/action_admin.php",{id_del_code:id_del_code},function(data){
		get_list_code()
	})
}

//undo_del
function undo_del(id) {
	$("#"+id+"-del").fadeIn(1)
	$("#"+id+"-undo").fadeOut(1)
	$("#"+id+"-confirm-del").fadeOut(1)
}
//del_user_1
function del_user_1(id) {
	$("#"+id+"-del").fadeOut(1)
	$("#"+id+"-undo").fadeIn(1)
	$("#"+id+"-confirm-del").fadeIn(1)
}
// del_user
function del_user(id) {
	var id_del = id
	$.post("ajax_process/action_admin.php",{id_del:id_del},function(data){
		get_list_user()
	})
}


//update code
function update_code() {
	var edit_c_id = $("#edit_c_id").val()
	var edit_c_code = $("#edit_c_code").val()
	var edit_c_status = $("#edit_c_status").val()
	
	$.post("ajax_process/action_admin.php",
		{edit_c_id:edit_c_id,edit_c_code:edit_c_code,edit_c_status:edit_c_status},function(data){
				get_list_code()
	})
}

//update user
function update_user() {
	
	var e_id = $("#e_id").val()
	var e_fullname = $("#e_fullname").val()
	var e_mobile = $("#e_mobile").val()
	var e_email = $("#e_email").val()
	var e_slug = $("#e_slug").val()
	var e_active = $("#e_active").val()
	var e_status_email = $("#e_status_email").val()
	var e_token = $("#e_token").val()
	$.post("ajax_process/action_admin.php",
		{e_id:e_id,e_fullname:e_fullname,e_mobile:e_mobile,e_email:e_email,e_slug:e_slug,e_active:e_active,e_status_email:e_status_email,e_token:e_token},
		function(data){
		get_list_user()
	})
}
function confirm_edit_token() {
	var id_token = $("#e_id_token").val()
	var edit_token = $("#e_token").val()
	var mobile_iden = $("#e_mobile_iden").val()
	var active_token = $("#e_active_token").val()
	var email_token = $("#e_email_token").val()
	console.log(id_token, mobile_iden, active_token, email_token)
	$.post("ajax_process/action_admin.php",
		{id_token:id_token,edit_token:edit_token,mobile_iden:mobile_iden,active_token:active_token,email_token:email_token},
		function(data){
		get_token()
	})
}
// get value to edit token modal 
var edit_token_modal = document.getElementById('edit_token_modal')
edit_token_modal.addEventListener('show.bs.modal', function (event) {
	var button = event.relatedTarget

	var id = button.getAttribute('data-id')
	var token = button.getAttribute('data-token')
	var mobile_iden = button.getAttribute('data-mobile_iden')
	var active = button.getAttribute('data-active')
	var email_token = button.getAttribute('data-email_token')
	var create_token_date = button.getAttribute('data-create_token_date')

	var box_id = edit_token_modal.querySelector('#e_id_token')
	var box_token = edit_token_modal.querySelector('#e_token')
	var box_mobile_iden = edit_token_modal.querySelector('#e_mobile_iden')
	var box_active = edit_token_modal.querySelector('#e_active_token')
	var box_email = edit_token_modal.querySelector('#e_email_token')

	box_id.value = id
	box_token.value = token
	box_mobile_iden.value = mobile_iden
	box_active.value = active
	box_email.value = email_token
})
//get value to edit modal code
var edit_code_modal = document.getElementById('edit_code_modal')
edit_code_modal.addEventListener('show.bs.modal', function (event) {
	var button = event.relatedTarget

	var id = button.getAttribute('data-id')
	var code = button.getAttribute('data-code')
	var status = button.getAttribute('data-status')

	var box_id = edit_code_modal.querySelector('#edit_c_id')
	var box_code = edit_code_modal.querySelector('#edit_c_code')
	var box_status = edit_code_modal.querySelector('#edit_c_status')

	box_id.value = id
	box_code.value = code
	box_status.value = status

})


//get value to edit modal user
var modify_modal = document.getElementById('modify_modal')
modify_modal.addEventListener('show.bs.modal', function (event) {
	var button = event.relatedTarget

	var id = button.getAttribute('data-id')
	var fullname = button.getAttribute('data-fullname')
	var mobile = button.getAttribute('data-mobile')
	var email = button.getAttribute('data-email')
	var slug = button.getAttribute('data-slug')
	var active = button.getAttribute('data-active')
	var status_email = button.getAttribute('data-status-email')

	var box_id = modify_modal.querySelector('#e_id')
	var box_fullname = modify_modal.querySelector('#e_fullname')
	var box_mobile = modify_modal.querySelector('#e_mobile')
	var box_email = modify_modal.querySelector('#e_email')
	var box_slug = modify_modal.querySelector('#e_slug')
	var box_active = modify_modal.querySelector('#e_active')
	var box_status_email = modify_modal.querySelector('#e_status_email')

	box_fullname.value = fullname
	box_id.value = id
	box_mobile.value = mobile
	box_email.value = email
	box_slug.value = slug
	box_active.value = active
	box_status_email.value = status_email
})
// end get value to edit modal



function hide(id,btn_hide,btn_show) {
	var a = $("#"+id)
	a.fadeOut(1000)
	$("#"+btn_hide).fadeOut(1)
	$("#"+btn_show).fadeIn(1)
}
function show(id,btn_hide,btn_show){
	var a = $("#"+id)
	a.fadeIn(1000);
	$("#"+btn_show).fadeOut(1)
	$("#"+btn_hide).fadeIn(1)
}
function adduser() {
	var username = $("#new_username").val()
	var fullname = $("#fullname").val()
	var active = $("#active").val()
	var password = $("#password").val()
	var password_admin = $("#password_admin").val()
	console.log(username)
	$.post("ajax_process/action_admin.php",
		{username:username,fullname:fullname,active:active,password:password,password_admin:password_admin},
		function(data){
			
			if (data ==1) {
				//them thanh cong
				document.getElementById("form_adduser").reset();
				get_list_user()
				
			};
			if (data ==0) {
				//bi trung slug
				
				alert('Bị trùng slug');
			}; admin
			if (data ==2) {
				alert('Sai admin password')
				
			}
	})
}

//open sale order
function open_so(id_so) {
	$.post("ajax_process/action_admin.php",{id_so:id_so},function(data){
		$('.load_edit_so').html(data); 
	})
}

function get_so() {
	var admin_get_so = $("#admin").val()
	$.post("ajax_process/action_admin.php",{admin_get_so:admin_get_so},function(data){
		$("#load_so").html(data)
	})
}
function get_token() {
	var admin_token = $("#admin").val()
	$.post("ajax_process/action_admin.php",{admin_token:admin_token},function(data){
		$("#load_token").html(data)
	})
}
function get_list_user() {
	var admin = $("#admin").val()
	$.post("ajax_process/action_admin.php",{admin:admin},function(data){
		$("#load_users").html(data)
	})
}
function get_list_code() {
	var admin_get_code = $("#admin").val()
	$.post("ajax_process/action_admin.php",{admin_get_code:admin_get_code},function(data){
		$("#load_codes").html(data)
	})
}
function addcode() {
	var count = $("#num_code").val()
	$.post("ajax_process/action_admin.php",{count:count},function(data) {
		
		get_list_code()
	})
}
function onchange_total() {
	var total = $("#so_price").val()*$("#so_qty").val()
	$("#so_total").html(total)
}
function onchange_type() {
	var value = $("#card_type").val()
	if (value == '4'){
		
		$("#so_price").val(160000)
		onchange_total()
	}else{
		
		$("#so_price").val(150000)
		onchange_total()
	}
}

$(document).ready(function(){
	
	get_list_user()
	get_list_code()
	get_so()
	get_token()


	$(".search").keyup(function(){
		
		if ($("#search_by_mobile").is(":checked")){
			var text_mobile = $(".search").val();
			$.post("ajax_process/action_admin.php",{text_mobile:text_mobile},function(data){
				$("#load_users").html(data);
			})
		}
		else{
			var text = $(".search").val();
			$.post("ajax_process/action_admin.php",{text:text},function(data){
				//
				$("#load_users").html(data);
			})
		}
	})

})