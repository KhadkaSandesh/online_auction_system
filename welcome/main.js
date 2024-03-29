var pwdchg_req = document.getElementsByClassName("pwdchange")[0];
var change_pwd_modal = document.getElementById("change_pwd_modal");
var change_btn = document.getElementById("sub_change");
var cancel_btn = document.getElementById("cancel_btn");
var closeBtn = document.getElementsByClassName('closeBtn')[0];
var ok_btn = document.getElementsByClassName('ok_btn')[0];
var success_modal = document.getElementsByClassName('pwd_change_modal')[0];

var add_money = document.getElementById("balance_add");
var balance_add_cancel = document.getElementById("balance_add_cancel");

var balance_add_button = document.getElementById("balance_add_button");

balance_add_button.addEventListener('click', openAddBalance);
balance_add_cancel.addEventListener('click', closeAddBalance);

function openAddBalance(){
	add_money.style.display = 'block';
}

function closeAddBalance(){
	add_money.style.display = 'none';
}





//Listen for close button
window.onload=function(){


closeBtn.addEventListener('click', closeModal);}
//Listen for outside click
window.addEventListener('click', outsideClick);

pwdchg_req.addEventListener('click', openModal);

//Listen for cancel button
cancel_btn.addEventListener('click', closeModal);

ok_btn.addEventListener('click', closeSuccessModal);

function openModal(){
	change_pwd_modal.style.display = 'block';
}

//Function to close moda
function closeModal(){
	change_pwd_modal.style.display = 'none';
}

function closeSuccessModal(){
	success_modal.style.display = 'none';
}

// Function to close modal if outside click
function outsideClick(e){
	if (e.target == change_pwd_modal) {
	change_pwd_modal.style.display = 'none';
	}
}



var acc_menu = document.getElementById("user_acc_name");
var menu = document.getElementsByClassName("acc_menu")[0];

acc_menu.addEventListener('click', openMenu);

function openMenu(){
	if (menu.style.display === 'none') {
		menu.style.display = 'block';
	}else{
		menu.style.display = 'none';
	}
}


