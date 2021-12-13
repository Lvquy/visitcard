
function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
 }

function active_boder(id) {
	$("#"+id).css({"opacity":"1","border":"3px solid white","border-radius":"10px"})
}
function unactive_boder(id) {
	
	$("#"+id).css({"opacity":".7","border":"unset","border-radius":"unset"})
}
var CARD_TYPE =1;
function type(type) {
	if (type == 'type1'){
		CARD_TYPE =1
		$("#price-card").val(formatNumber(150000))
		$("del").html("199.000 đ")
		var img = "<img class='card-shop card-front' src='static/images/cardtype/cardtype-1-f.png' alt='hình minh họa' ><img class='card-shop card-back' onmouseout='show_front()' onmouseover='show_back()' src='static/images/cardtype/cardtype-1-b.png' alt='hình minh họa'>"
	};
	if (type == 'type2'){
		CARD_TYPE =2
		$("#price-card").val(formatNumber(150000))
		$("del").html("199.000 đ")
		var img = "<img class='card-shop card-front' src='static/images/cardtype/cardtype-2-f.png' alt='hình minh họa' ><img class='card-shop card-back' onmouseout='show_front()' onmouseover='show_back()' src='static/images/cardtype/cardtype-2-b.png' alt='hình minh họa'>"
	};
	if (type == 'type3'){
		CARD_TYPE =3
		$("#price-card").val(formatNumber(150000))
		$("del").html("199.000 đ")
		var img = "<img class='card-shop card-front' src='static/images/cardtype/cardtype-3-f.png' alt='hình minh họa' ><img class='card-shop card-back' onmouseout='show_front()' onmouseover='show_back()' src='static/images/cardtype/cardtype-3-b.png' alt='hình minh họa'>"
	};
	if (type == 'type4'){
		CARD_TYPE =4
		$("#price-card").val(formatNumber(160000))
		$("del").html("250.000 đ")
		var img = "<img class='card-shop card-front'  src='static/images/cardtype/cardtype-4-f.png' alt='hình minh họa' ><img class='card-shop card-back' onmouseout='show_front()' onmouseover='show_back()' src='static/images/cardtype/cardtype-4-b.png' alt='hình minh họa'>"
	};
	active_boder(type)
	var list = ['type1','type2','type3','type4']
	for (i in list){
		
		if (list[i] != type){
			unactive_boder(list[i])
		}
	}
	$("#img-card").html(img)
}


function change_qty(qty) {
	var price = $("#price-card").val()
	$("#modal-price").val(formatNumber(price*1000*qty) + " vnđ  (Free ship)")
}
//get value to order modal 
var modal_order = document.getElementById('modal_order')
modal_order.addEventListener('show.bs.modal', function (event) {
var button = event.relatedTarget

var cus_name = $('#input-cus-name').val()
if (CARD_TYPE ==1){
	var card_type = "Loại 1, màu gradient"
}
if (CARD_TYPE ==2){
	var card_type = "Loại 2, Nền đen"
	
}
if (CARD_TYPE ==3){
	var card_type = "Loại 3, Nền trắng"
	
}
if (CARD_TYPE ==4){
	var card_type = "Thiết kế theo yêu cầu"
	
	
}
var text_color = $("#input-textcolor").val()
var qty = $("#input-qty").val()
var price = $("#price-card").val()
var total = price * qty * 1000

var box_mobile = modal_order.querySelector('#modal-cus-name')
var box_card_type = modal_order.querySelector('#modal-card-type')
var box_text_color = modal_order.querySelector('#modal-textcolor')
var box_qty = modal_order.querySelector('#modal-qty')
var box_price = modal_order.querySelector('#modal-price')

box_mobile.value = cus_name
box_card_type.value = card_type
box_text_color.value = text_color
box_qty.value = qty

box_price.value = formatNumber(total) + " vnđ   (Free ship)"
})
function order() {
	var mobile = $("#modal-mobile").val()
	var add = $("#modal-add").val()
	var note = $("#modal-note").val()
	var cus_name = $("#modal-cus-name").val()
	var card_type = $("#modal-card-type").val()
	var textcolor = $("#modal-textcolor").val()
	var qty = $("#modal-qty").val()
	$.post("ajax_process/action_order.php",
		{mobile:mobile,add:add,note:note,cus_name:cus_name,card_type:card_type,textcolor:textcolor,qty:qty},
		function(data){
	})

}
function color_name(color) {
	$(".cus-name").css({"color":color})
}



function change_cusname(name){
	if (name ==''){
		name = "&nbsp;"
	}
    $(".cus-name").html(name)
 }
function show_back() {
	var back = $(".card-back")
	var back_1 = $(".card-back-1")
	var front = $(".card-front")
	var front_1 = $(".card-front-1")
	var cus_name = $(".cus-name")
	
	
	back.css({"display":"inline-block"})
	back_1.css({"display":"inline-block"})
	front.css({"display":"none"})
	front_1.css({"display":"none"})
	cus_name.html('&nbsp;')
}
function show_front() {
	
	var back = $(".card-back")
	var back_1 = $(".card-back-1")
	var front = $(".card-front")
	var front_1 = $(".card-front-1")
	var div_cus_name = $(".cus-name")
	var cus_name = $("#input-cus-name").val()


	back.css({"display":"none"})
	back_1.css({"display":"none"})
	front.css({"display":"inline-block"})
	front_1.css({"display":"inline-block"})
	if (cus_name ==""){
		cus_name ="&nbsp;"
	}
	div_cus_name.html(cus_name)

}




