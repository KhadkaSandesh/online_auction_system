// var add_pro_modal = document.getElementsByClassName("add_pro_modal")[0];
// var add_btn = document.getElementById("add_btn");
// var sub_btn = document.getElementById("sub_btn");
// var closeBtn = document.getElementsByClassName('closeBtn')[0];

// //Listen for close button
// closeBtn.addEventListener('click', closeModal_add);
// //Listen for outside click
// window.addEventListener('click', outsideClick);

// add_btn.addEventListener('click', openModal_add);

// function openModal_add(){
// 	add_pro_modal.style.display = 'block';
// }

// //Function to close modal
// function closeModal_add(){
// 	add_pro_modal.style.display = 'none';
// }

// // Function to close modal if outside click
// function outsideClick(e){
// 	if (e.target == add_pro_modal) {
// 	add_pro_modal.style.display = 'none';
// 	}
// }





// var edit_pro_modal = document.getElementsByClassName("edit_pro_modal")[0];
// var update_btn = document.getElementsByClassName("edit_item");
// var edit_btn = document.getElementById("edit_btn");
// var closeBtn = document.getElementsByClassName('closeBtn')[0];

// //Listen for close button
// closeBtn.addEventListener('click', closeModal_update);
// //Listen for outside click
// window.addEventListener('click', outsideClick);

// for(var i=0; i< update_btn.length; i++){
// 	update_btn[i].addEventListener('click', openModal_update);
// }

// function openModal_update(){
// 	edit_pro_modal.style.display = 'block';
// }

// //Function to close modal
// function closeModal_update(){
// 	edit_pro_modal.style.display = 'none';
// }

// // Function to close modal if outside click
// function outsideClick(e){
// 	if (e.target == edit_pro_modal) {
// 	edit_pro_modal.style.display = 'none';
// 	}
// }



// for displaying products and orders

var show_pro = document.getElementById("show_products");
var show_order = document.getElementById("show_orders");
var show_message = document.getElementById("show_messages");

var product_nav = document.getElementsByClassName("products")[0];
var orders_nav = document.getElementsByClassName("orders")[0];
var message_nav = document.getElementsByClassName("messages")[0]; 


show_pro.onclick = function(){
	orders_nav.style.display = "none";
	product_nav.style.display = "block";
	message_nav.style.display = "none";
}

show_order.onclick = function(){
	orders_nav.style.display = "block";
	product_nav.style.display = "none";
	message_nav.style.display = "none";
}

show_message.onclick = function(){
	message_nav.style.display = "block";
	orders_nav.style.display = "none";
	product_nav.style.display = "none";
}



// var reply_success = document.getElementsByClassName("reply_success")[0];
// var reply_btn= document.getElementById("reply_btn");

// reply_btn.onclick = function(){
// 	reply_success.style.display = 'block';
// }

