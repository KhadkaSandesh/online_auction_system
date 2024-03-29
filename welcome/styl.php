<?php Header ("Content-type: text/css; charset=utf-8");
session_start();?> 

<style>

@import url('https://fonts.googleapis.com/css2?family=Varela&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap');

body{
	margin: 0;
	padding: 0;
	font-family: 'Varela', sans-serif;
	background-color: #f7f6e7;

}

.front{
	/*background-color: #ccffbd;*/
	 /*background-image: linear-gradient(to left bottom, #052637, #00556f, #00888c, #00bb80, #12eb4a);*/
	  /*background-image: linear-gradient(to right top, #6bcdd1, #68d3ce, #69d8ca, #6eddc4, #76e2bc, #7fe7b3, #8beba9, #9aef9e, #aef48f, #c5f87f, #dffa6e, #fbfb5f);*/
	   /*background-image: linear-gradient(to right top, #d1cc6b, #c7d16c, #bbd76e, #aedc73, #9ee17a, #90e688, #81ea96, #71eea5, #64f2bb, #5bf6d0, #59f9e3, #5ffbf4);*/
	    /*background-image: linear-gradient(to right top, #22be28, #5cc62a, #81ce2f, #a0d638, #bddd44, #b6e054, #afe364, #a9e572, #82e189, #5dda9f, #3bd2b2, #28c8c0);*/
	     background-image: linear-gradient(to right top, #65d169, #82d668, #9cdb69, #b4e06c, #cae571, #c3e77b, #bde984, #b8ea8e, #99e7a1, #7fe2b3, #6cdcc3, #64d4cf);
	height: 100%;
	width: 100%;
}

.img{
	display: flex;
	flex-direction:column;
	padding: 30px;
}

.front ul{
	list-style-type: none;
	margin: 0;
	padding: 0;
	overflow: hidden;

}

.front li {
  float: left;

}

.front li a {
  display: block;
  color: #1e212d;
  text-align: center;
  padding: 16px;
  text-decoration: none;
  font-family: sans-serif;
  font-weight: bold;

}

.front li a:hover {
  ;
}

ul.account {
	float: right;
	/*text-align: center;*/
	border: none;
}

}

.center{
	display: flex;
	flex-direction:row;
	justify-content: space-around;
}

.heading{

	float: left;
	font-family: sans-serif;
	flex-direction:column;
	margin-top: 15%;
	color: #290149;
}

.shop_now{
	background-color: #11698e;
	font-size: 20px;
	text-align: center;
	border-radius: 7px;
	padding: 5px;
	cursor: pointer;
	opacity: 0.8;
	color: white;
	border:none;
	border-bottom: 3px solid #6930c3;
	border-right: 2px solid #6930c3;

}

.shop_now:hover{
	opacity: 1;
	background-color: #11698e;
	color: white;

}

.heading p{
	color: #26001b;
}


.products h2{
	padding: 10px;
	color: #290149;
	text-align: center;

}

.container{
	display: flex;
	justify-content: space-around;
	padding: 10px;
	background-color: white;
	border: 1px solid black;
	margin-right: 30px;
	margin-left: 30px;
	margin-bottom: 30px;
	text-align: left;
	border-bottom: none;
	border-top: none;

}

.container .item{
	cursor: pointer;
}

.item img{
	display: block;
	margin: auto;
	border-right: 1px solid black;

}

.categories{
	display: flex;
	justify-content: space-around;
	padding: 10px;
	text-align: center;
	border: 1px solid black;
	margin-right: 30px;
	margin-left: 30px;
	background-color: white;
}

.cat_item img{
	display: block;
	margin:auto;
	border-right: 1px solid black;
	align-items: center;



}

.item h4{
	margin-top: -7px;
	color: #eb5e0b;
}



.footer{
	display: flex;
	/*padding: 20px;*/
	background-color: #252525;
	color: white;
	justify-content: space-between;
	margin-bottom: 10px;

}


.footer div{
	padding: 0 30px;
	
}

.company{
	display: flex;
}

.address{
	color: #e3d18a;
}

.com_name{
	font-family: 'Bree Serif', serif;
}

.follow_us i{
	margin-right: 20px;
}




}

.user_name{
	color: red;
	margin-right: 20px;

}

.user_acc{
	/*margin-top: -16px;*/
	color: green;

}

.user_top_bar{
	margin: 5px;
	margin-top: 20px;
	display: inline-block;
}

#user_icon{
	/*display: inline-block;*/
	margin-right: 5px;
	border: 1px solid black;
	padding: 8px;
	/*margin-top: 30px;*/
}

#cart_icon{
	margin-right: 5px;
	border: 1px solid black;
	padding: 8px;
}

#cart_bal{
	margin-left: 44px;
	font-size: 13px;
}


#user_acc_name{
	margin-bottom: 20px;
	font-size: 13px;
	font-weight: bold;
}

#logout_btn a{
	text-decoration: none;
	font-size: 14px;
	margin-left: 40px;

}


#change_pwd_modal{
	display: none;
	position: fixed;
	z-index: 1;
	left: 0; 
	top: 0;
	width: 100%;
	height: 100%;
	overflow: auto;
	background-color: rgba(0,0,0,0.5);
}

.change_pwd{
	background-color: #f4f4f4;
	margin: 20% auto;
	padding: 20px;
	width: 70%;
	box-shadow: 0 5px 8px 0 rgba(0,0,0,0.2), 0 7px 20px 0 rgba(0,0,0,0.17);
}

.closeBtn{
	color: #ccc;
	float: right;
	font-size: 30px;
}

.closeBtn:hover,.closeBtn:focus{
	color: #000;
	text-decoration: none;
	cursor: pointer;
}

.pwd_change_modal{
	position: fixed;
	z-index: 1;
	left: 0; 
	top: 0;
	width: 100%;
	height: 100%;
	overflow: auto;
	background-color: rgba(0,0,0,0.5);
}

.pwd_success{
	background-color: #f4f4f4;
	margin: 20% auto;
	padding: 20px;
	width: 50%;
	box-shadow: 0 5px 8px 0 rgba(0,0,0,0.2), 0 7px 20px 0 rgba(0,0,0,0.17);
}

</style>
