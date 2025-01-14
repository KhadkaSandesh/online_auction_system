
<?php

session_start();
include_once('../sns/connection.php');
$db_user = 'user';
$db_products = 'products';
$usr_name = $_SESSION['user_name'];



$conn_userdb = mysqli_connect($servername, $username, $password, $db_user);

$conn_products = mysqli_connect($servername, $username, $password, $db_products);

$query_user = $conn_userdb->query("SELECT * FROM user_cart where username='$usr_name'");

if ($query_user->num_rows == 0) {
  echo "You have no items in your cart list.";
}else{

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="boot.css">

    <title>Shopping Cart</title>
  </head>
  <body>
  	<div class="container-fluid">
  		<div class="row">
  			<div class="col-md-10 col-11 mx-auto">
  				<div class="row mt-5 gx-3">
  					
  					<div class="col-md-12 col-lg-8 col-11 mx-auto main_cart mb-lg-0 mb-5 shadow">
  						<div class="card p-4">
  							<h2 class="py-4 font-weight-bold">Cart(2 items)</h2>
  							<div class="row">
  								
  								<div class="col-md-5 col-11 mx-auto bg-light d-flex justify-contnet-center align-items-center shadow product_img">
  									<img src="photos/boots.png" class="img-fluid" alt="cart img">
  								</div>

  								<div class="col-md-7 col-11 mx-auto px-4 mt-2">
  									<div class="row">
  										
  										<div clas="col-6 card-title">
  											<h1 class="mb-4 product_name">Manchaster City</h1>
  											<p class="mb-2"> Brand : Puma</p>
  											<p class="mb-2">Color : Blue</p>
  											<p class="mb-3">Size : M</p>
  										 </div>
  										
                       <div class="col-6">
                        <ul class="paginationn justify-content-end set_quantity">
                          <li class="page-item"><button class="page-link" onclick="decreaseNumber('textbox','itemval')"><i class="fa fa-minus"></i></button></li>
                          <li class="page-item"><input type="text" name="" class="page-link" value="0" id="textbox"></li>
                          <li class="page-item"><button class="page-link" onclick="increaseNumber('textbox','itemval')"><i class="fa fa-plus"></i></button></li>
                        </ul>
                       </div>
  									</div>
                      <div class="row">
                        <div class="col-8 d-flex justify-content-between remove_wish">
                          <p><i class="fas fa-trash-alt"></i>REMOVE ITEM</p>
                          <p><i class="fas fa-heart"></i>MOVE TO WISH LIST </p>
                        </div>
                        <div class="col-4 d-flex justify-content-end price_money">
                          <h3>Rs<span id="itemval">0.00 </span></h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr/>
                <!-- 2nd cart product -->
                <div class="card p-4">
                  <div class="row">
                    <!-- cart images div -->
                    <div class="col-md-5 col-11 mx-auto bg-light d-flex justify-content-center align-items-center shadow product_img">
                      <img src="photos/badtminton1.png" class="img-fluid" alt="cart img">
                    </div>
                    <!-- cart product details -->
                    <div class="col-md-7 col-11 mx-auto px-4 mt-2">
                      <div class="row">
                        <!-- product name  -->
                        <div class="col-6 card-title">
                          <h1 class="mb-4 product_name">Addidas Football Boot</h1>
                          <p class="mb-2">Brand : Addidas</p>
                          <p class="mb-2">COLOR: White</p>
                          <p class="mb-3">SIZE: M</p>
                        </div>
                        <!-- quantity inc dec -->
                        <div class="col-6">
                          <ul class="pagination justify-content-end set_quantity">
                            <li class="page-item">
                              <button class="page-link " onclick="decreaseNumber('textbox1','itemval1')"> <i class="fas fa-minus"></i> </button>
                            </li>
                            <li class="page-item"><input type="text" name="" class="page-link" value="0" id="textbox1" >
                            </li>
                            <li class="page-item">
                              <button class="page-link" onclick="increaseNumber('textbox1','itemval1')"> <i class="fas fa-plus"></i></button>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <!-- //remover move and price -->
                      <div class="row">
                        <div class="col-8 d-flex justify-content-between remove_wish">
                          <p><i class="fas fa-trash-alt"></i> REMOVE ITEM</p>
                          <p><i class="fas fa-heart"></i>MOVE TO WISH LIST </p>
                        </div>
                        <div class="col-4 d-flex justify-content-end price_money">
                          <h3>Rs<span id="itemval1">0.00 </span> </h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- right side div -->
              <div class="col-md-12 col-lg-4 col-11 mx-auto mt-lg-0 mt-md-5">
                <div class="right_side p-3 shadow bg-white">
                  <h2 class="product_name mb-5">The Total Amount Of</h2>
                  <div class="price_indiv d-flex justify-content-between">
                    <p>Product amount</p>
                    <p>Rs<span id="product_total_amt">0.00</span></p>
                  </div>
                  <div class="price_indiv d-flex justify-content-between">
                    <p>Delivery Charge</p>
                    <p>Rs<span id="shipping_charge">100.0</span></p>
                  </div>
                  <hr />
                  <div class="total-amt d-flex justify-content-between font-weight-bold">
                    <p>The total amount of(including delivery charge)</p>
                    <p>Rs<span id="total_cart_amt">0.00</span></p>
                  </div>
                  <button class="btn btn-primary text-uppercase">Checkout</button>
                </div>
                <!-- discount code part -->
                <div class="discount_code mt-3 shadow">
                  <div class="card">
                    <div class="card-body">
                      <a class="d-flex justify-content-between" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Add a discount code (optional)
                        <span><i class="fas fa-chevron-down pt-1"></i></span>
                      </a>
                      <div class="collapse" id="collapseExample">
                        <div class="mt-3">
                          <input type="text" name="" id="discount_code1" class="form-control font-weight-bold" placeholder="Enter the discount code">
                          <small id="error_trw" class="text-dark mt-3">code is thapa</small>
                        </div>
                        <button class="btn btn-primary btn-sm mt-3" onclick="discount_code()">Apply</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- discount code ends -->
                <div class="mt-3 shadow p-3 bg-white">
                  <div class="pt-4">
                    <h5 class="mb-4">Expected delivery date</h5>
                    <p>SEPTEMBER 27th 2021 - SEPTEMBER 29th 2021</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Optional JavaScript; choose one of the two! -->
      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
      <!-- Option 2: Separate Popper and Bootstrap JS -->
      <!--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>-->
    <script type="text/javascript">
    const decreaseNumber = () => {
      var itemval = document.getElementById('textbox');

       if(itemval.value <= 0) {
        itemval.value=5;
        alter('max 5 allowed');
        itemval.style.background='red';
        itemval.style.color=#fff;
       }else{
        itemval.value=parseInt(itemval.vlaue)+1;
       }
     }
  </script>
  </body>
</html>


<?php }
?>