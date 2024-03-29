var checkout_modal = document.getElementById("checkout_modal");
var cancel_checkout = document.getElementById("cancel_checkout");

var checkout = document.getElementsByClassName("checkput")[0];
var checkout_btn = document.getElementsByClassName('checkout_btn')[0];

checkout_btn.onclick = function(){
	checkout_modal.style.display = 'block';
}

cancel_checkout.onclick = function() {
	checkout_modal.style.display = 'none';
}