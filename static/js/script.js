



function show_help(){
	//
	Toastify({
	  text: "Username là duy nhất của bạn trong hệ thống \n để định danh tài khoản của bạn\n cũng như dùng để đăng nhập hệ thống",
	  duration: 6000,
	  //destination: "#",
	  newWindow: true,
	  close: true,
	  gravity: "top", // `top` or `bottom`
	  position: "center", // `left`, `center` or `right`
	  stopOnFocus: true, // Prevents dismissing of toast on hover
	  style: {
	    background: "linear-gradient(to right, #0CF749, #3DB0C9)",
	  },
	  //onClick: function(){} // Callback after click
	}).showToast();
	//
}
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
	var cus_name = $("#input-cus-name").val()
	console.log(cus_name)
	var new_name = "<i class='bi bi-person'></i> " + cus_name
	$(".cus-name").html(new_name)
	if (type == 'type1'){
		CARD_TYPE =1
		$("#price-card").val(formatNumber(150000))
		$("del").html("199.000 đ")
		var img = "<img class='card-shop card-front' src='static/images/cardtype/cardtype-1-f.png' alt='hình minh họa' ><img class='card-shop card-back'  src='static/images/cardtype/cardtype-1-b.png' alt='hình minh họa'>"
		$("input[name='card'][value='back']").prop('checked', true);
	};
	if (type == 'type2'){
		CARD_TYPE =2
		$("#price-card").val(formatNumber(150000))
		$("del").html("199.000 đ")
		var img = "<img class='card-shop card-front' src='static/images/cardtype/cardtype-2-f.png' alt='hình minh họa' ><img class='card-shop card-back' src='static/images/cardtype/cardtype-2-b.png' alt='hình minh họa'>"
		$("input[name='card'][value='back']").prop('checked', true);
	};
	if (type == 'type3'){
		CARD_TYPE =3
		$("#price-card").val(formatNumber(150000))
		$("del").html("199.000 đ")
		var img = "<img class='card-shop card-front' src='static/images/cardtype/cardtype-3-f.png' alt='hình minh họa' ><img class='card-shop card-back'  src='static/images/cardtype/cardtype-3-b.png' alt='hình minh họa'>"
	};	$("input[name='card'][value='back']").prop('checked', true);
	if (type == 'type4'){
		CARD_TYPE =4
		$("#price-card").val(formatNumber(160000))
		$("del").html("250.000 đ")
		var img = "<img class='card-shop card-front'  src='static/images/cardtype/cardtype-4-f.png' alt='hình minh họa' ><img class='card-shop card-back'  src='static/images/cardtype/cardtype-4-b.png' alt='hình minh họa'>"
	};	$("input[name='card'][value='back']").prop('checked', true);
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
	var sale = 0
	var ct = formatNumber(price*1000*qty - sale)
	var alert = 'Mua nhiều giảm giá'
	if (qty == 2){
		sale = 20000
		ct = formatNumber(price*1000*qty - sale)
		alert = "Đã giảm "+formatNumber(sale)+"đ"
	};
	if (qty == 3){
		sale = 50000
		ct = formatNumber(price*1000*qty - sale)
		alert = "Đã giảm "+formatNumber(sale)+"đ"
	};
	if (qty == 4){
		sale = 110000
		ct = formatNumber(price*1000*qty - sale)
		alert = "Đã giảm "+formatNumber(sale)+"đ"
	};
	if (qty >= 5){
		sale = 0
		ct = formatNumber((price-50)*1000*qty - sale)
		alert = "Đơn giá giảm trực tiếp 50.000/c"
	};
	if (qty >= 10){
		sale = 0
		ct = formatNumber((price-50)*1000*qty - sale)
		alert = "Mua nhiều liên hệ trực tiếp để được giá tốt nhất"
	};
	$("#modal-price").val(ct)
		$("#alert-price").html(alert + " + Free ship")
}
var session = "false";
function order() {
	var mobile = $("#modal-mobile").val()
	var add = $("#modal-add").val()
	var note = $("#modal-note").val()
	var cus_name = $("#modal-cus-name").val()
	var card_type = $("#modal-card-type").val()
	var textcolor = $("#modal-textcolor").val()
	var qty = $("#modal-qty").val()
	var total = $("#modal-price").val()*1000
	var username = $("#modal-username").val()
	var profile = $("#profile")
	// var ip = $("#ip").val()
	var ip = 'Checkip'

	if (profile.css('display') != 'none' ){
		session = "true";

	}
	
	if (mobile.length<=9){
		//
		Toastify({
		  text: "Nhập đầy đủ số điện thoại nhận hàng",
		  duration: 6000,
		  //destination: "#",
		  newWindow: true,
		  close: true,
		  gravity: "top", // `top` or `bottom`
		  position: "center", // `left`, `center` or `right`
		  stopOnFocus: true, // Prevents dismissing of toast on hover
		  style: {
		    background: "linear-gradient(to right, #F70C3E, #C9AD3D)",
		  },
		  //onClick: function(){} // Callback after click
		}).showToast();
		//	
	}
	else if (add.length <15){
		//
		Toastify({
		  text: "Nhập đầy đủ địa chỉ nhận hàng",
		  duration: 6000,
		  //destination: "#",
		  newWindow: true,
		  close: true,
		  gravity: "top", // `top` or `bottom`
		  position: "center", // `left`, `center` or `right`
		  stopOnFocus: true, // Prevents dismissing of toast on hover
		  style: {
		    background: "linear-gradient(to right, #F70C3E, #C9AD3D)",
		  },
		  //onClick: function(){} // Callback after click
		}).showToast();
		//
	}
	else{
		$.post("ajax_process/checkip.php",{ip:ip,mobile:mobile},function(){
	})
		$("#modal_confirm_so").modal('show');
		
		$.post("ajax_process/action_order.php",
		{session:session,mobile:mobile,add:add,note:note,cus_name:cus_name,card_type:card_type,textcolor:textcolor,
			qty:qty,total:total,username:username},
		function(data){
			console.log("data tra ve", data)
		})
		var sent_mail_confirm = true

		$.post("action_sendmail.php",{sent_mail_confirm:sent_mail_confirm,mobile:mobile,add:add,
			note:note,cus_name:cus_name,card_type:card_type,textcolor:textcolor,qty:qty,
			total:total,username:username},function(data){
			if (data ==1){
				console.log('OK')
			}
		})
	}
}
function show_modal_order() {
	// $('#modal_order').modal('toggle');
	// $('#myModal').modal('show');
	// $('#myModal').modal('hide');
	var username = $("#input-username").val()
	if (trung_username == true) {
		//
		Toastify({
		  text: "Username này đã có người sử dụng",
		  duration: 6000,
		  //destination: "#",
		  newWindow: true,
		  close: true,
		  gravity: "top", // `top` or `bottom`
		  position: "center", // `left`, `center` or `right`
		  stopOnFocus: true, // Prevents dismissing of toast on hover
		  style: {
		    background: "linear-gradient(to right, #F70C3E, #C9AD3D)",
		  },
		  //onClick: function(){} // Callback after click
		}).showToast();
		//
	};
	if (username.length <3 || error_slug == true){
		//
		Toastify({
		  text: "Username: 3 - 25 kí tự, KHÔNG DÙNG (khoảng trắng, kí tự đặc biệt, có dấu)",
		  duration: 6000,
		  //destination: "#",
		  newWindow: true,
		  close: true,
		  gravity: "top", // `top` or `bottom`
		  position: "center", // `left`, `center` or `right`
		  stopOnFocus: true, // Prevents dismissing of toast on hover
		  style: {
		    background: "linear-gradient(to right, #F70C3E, #C9AD3D)",
		  },
		  //onClick: function(){} // Callback after click
		}).showToast();
		//
	}

	else if(trung_username == false){
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
			var username = $("#input-username").val()
			var total = price * qty * 1000

			var box_mobile = modal_order.querySelector('#modal-cus-name')
			var box_card_type = modal_order.querySelector('#modal-card-type')
			var box_text_color = modal_order.querySelector('#modal-textcolor')
			var box_qty = modal_order.querySelector('#modal-qty')
			var box_price = modal_order.querySelector('#modal-price')
			var box_username = modal_order.querySelector('#modal-username')

			box_mobile.value = cus_name
			box_card_type.value = card_type
			box_text_color.value = text_color
			box_qty.value = qty
			box_username.value = username

			box_price.value = formatNumber(total)
		})
		//
		$('#modal_order').modal('show');
	}
}
function color_name(color) {
	$(".cus-name").css({"color":color})
}

function change_cusname(name){
	var new_name = "<i class='bi bi-person'></i> " + name
    	$(".cus-name").html(new_name)
}
function show_back() {
	var back = $(".card-back")
	var front = $(".card-front")
	var cus_name = $(".cus-name")
	var  a = $(".card-front")
	var  b = $(".card-back")
	a.css({"transform":"rotateY(-90deg)","-webkit-transform":"rotateY(-90deg)","transition":".6s"})
	var delayInMilliseconds = 600;
	setTimeout(function() {
	  	a.css({"transform":"rotateY(0deg)","-webkit-transform":"rotateY(0deg)","transition":".6s"})
	  	back.css({"display":"inline-block"})
	  	b.css({"transform":"rotateY(-90deg)","-webkit-transform":"rotateY(-90deg)","transition":"0s"})
		front.css({"display":"none"})
		setTimeout(function() {	
			b.css({"transform":"rotateY(0deg)","-webkit-transform":"rotateY(0deg)","transition":"1s"})
		},100)
	}, delayInMilliseconds);	
	cus_name.html('&nbsp;')
}
function show_front() {
	var back = $(".card-back")
	var front = $(".card-front")
	var div_cus_name = $(".cus-name")
	var cus_name = $("#input-cus-name").val()
	var  b = $(".card-back")
	var  a = $(".card-front")
	b.css({"transform":"rotateY(-90deg)","-webkit-transform":"rotateY(-90deg)","transition":".6s"})
	var delayInMilliseconds = 600;
	setTimeout(function() {
		b.css({"transform":"rotateY(0deg)","-webkit-transform":"rotateY(0deg)","transition":".6s"})
		back.css({"display":"none"})
		front.css({"display":"inline-block"})
		a.css({"transform":"rotateY(-90deg)","-webkit-transform":"rotateY(-90deg)","transition":"0s"})
		setTimeout(function() {
			a.css({"transform":"rotateY(0deg)","-webkit-transform":"rotateY(0deg)","transition":".6s"})
			var new_name = "<i class='bi bi-person'></i> " + cus_name
			div_cus_name.html(new_name)
		},100)
	}, delayInMilliseconds);
}

// change_username
var trung_username = false
var error_slug = false
function change_username(value) {
	$("#username").html("https://vncard.info/")
	$("#username").append(value)
	var slug = value
	$.post("ajax_process/edit.php",{slug:slug},function(data){
		if (data == 2){
			error_slug = true
			//
			Toastify({
			  text: "3 - 25 kí tự, KHÔNG DÙNG (khoảng trắng, kí tự đặc biệt, có dấu)",
			  duration: 6000,
			  //destination: "#",
			  newWindow: true,
			  close: true,
			  gravity: "top", // `top` or `bottom`
			  position: "center", // `left`, `center` or `right`
			  stopOnFocus: true, // Prevents dismissing of toast on hover
			  style: {
			    background: "linear-gradient(to right, #F70C3E, #C9AD3D)",
			  },
			  //onClick: function(){} // Callback after click
			}).showToast();
			//
			$("#username").css({"color":"red"})
			// $("#btn-order").css({"display":"none"})
		};
		if (data == 0){
			trung_username = true

			//
			Toastify({
			  text: "username này đã có người sử dụng",
			  duration: 6000,
			  //destination: "#",
			  newWindow: true,
			  close: true,
			  gravity: "top", // `top` or `bottom`
			  position: "center", // `left`, `center` or `right`
			  stopOnFocus: true, // Prevents dismissing of toast on hover
			  style: {
			    background: "linear-gradient(to right, #F70C3E, #C9AD3D)",
			  },
			  //onClick: function(){} // Callback after click
			}).showToast();
			//
			$("#username").css({"color":"red"})
			// $("#btn-order").css({"display":"none"})
		};
		if (data == 1){
			error_slug = false
			trung_username = false
			$("#username").css({"color":"green"})
		};
	})
}


