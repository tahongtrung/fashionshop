$(document).ready(function() {
	$(".updatecart").click(function() {
		var rowid = $(this).attr('id');
		var qty = $(this).parent().parent().find(".qty").val();
		var token = $("input[name='_token']").val();
		$.ajax({
			url:'cap-nhat-san-pham/'+rowid+'/'+qty,
			type:'GET',
			cache:false,
			data:{"_token":token,"id":rowid,"qty":qty},
			success:function (data) {
				if(data == "oke") {
					window.location = "gio-hang";
				}
				else {
					alert("Error!");
				}
			}
		});
	});
});
function confirmDel(msg) {
	if(window.confirm(msg)) {
		return true;
	}
	return false;
}
function selectt($id,$url){
	var select=document.getElementById('input').value;
	$size_id = select;
	// $sanpham->id,$sanpham->sanpham_url
	// $("#aa-add-to-cart-btn").context.URL.appendTo = "http://www.google.com.vn";
	$(".aa-add-to-cart-btn").attr("href", "http://tmdt/mua-hang/"+$id.trim()+"/"+$url.trim()+"/"+select);
	console.log($(".aa-add-to-cart-btn").attr("href"));
}
function kiemTraKichThuoc(content){
	console.log(content.length);
	if(content.length == 0){
		alert("Giỏ hàng rỗng");
		return;
	}
	var select=document.getElementsByName ('txtLHSize');
	var sizeArr = new Array(select.length);
	var unselect = false;
	for(var i =0;i<select.length;i++){
		sizeArr[i] = select[i].value;
		if(select[i].value==='') unselect = true;
	}
	if(!unselect){
		window.location = "/thanh-toan/" + sizeArr;
	}else{
		alert("Vui lòng chọn kích cỡ!!!");
	}
}
function checkPPTT(){
	var e = document.getElementById("input");
	var select = e.options[e.selectedIndex].value;
	if(select == 1){
		document.getElementById("visa").value = "Không cần nhập trường này";
		document.getElementById("csc").value = "Không cần nhập trường này";
		document.getElementById("visa").readOnly = true;
		document.getElementById("csc").readOnly = true;
	}
	if(select == 2){
		document.getElementById("visa").value = "";
		document.getElementById("csc").value = "";
		document.getElementById("visa").readOnly = false;
		document.getElementById("csc").readOnly = false;
	}
}