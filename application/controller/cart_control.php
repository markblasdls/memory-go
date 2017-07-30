<?php
session_start();
class cart_control{

	public function __construct(){}

	public function addToCart(){
	//if (isset($_POST['pid'])) {
	    $pid = $_POST['pid'];
		$wasFound = false;
		$i = 0;
		// If the cart session variable is not set or cart array is empty
		if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) { 
		    // RUN IF THE CART IS EMPTY OR NOT SET
			$_SESSION["cart_array"] = array(0 => array("item_id" => $pid, "quantity" => 1));
		} else {
			// RUN IF THE CART HAS AT LEAST ONE ITEM IN IT
			foreach ($_SESSION["cart_array"] as $each_item) { 
			      $i++;
			      while (list($key, $value) = each($each_item)) {
					  if ($key == "item_id" && $value == $pid) {
						  // That item is in cart already so let's adjust its quantity using array_splice()
						  array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $pid, "quantity" => $each_item['quantity'] + 1)));
						  $wasFound = true;
					  } // close if condition
			      } // close while loop
		       } // close foreach loop
			   if ($wasFound == false) {
				   array_push($_SESSION["cart_array"], array("item_id" => $pid, "quantity" => 1));
			   }
		}

		return $_SESSION["cart_array"];
		

	   
		//}
	}


	public function emptyCart(){
		//if (isset($_GET['cmd']) && $_GET['cmd'] == "emptycart") {
		    unset($_SESSION["cart_array"]);
			$_SESSION["cartTotal"]=0.00; 
			//}

		}


	public function editQuantity(){
		//if (isset($_POST['item_to_adjust']) && $_POST['item_to_adjust'] != "") {
		    // execute some code
			$item_to_adjust = $_POST['item_to_adjust'];
			$quantity = $_POST['quantity'];
			$quantity = preg_replace('#[^0-9]#i', '', $quantity); // filter everything but numbers
			if ($quantity >= 100) { $quantity = 99; }
			if ($quantity < 1) { $quantity = 1; }
			if ($quantity == "") { $quantity = 1; }
			$i = 0;
			foreach ($_SESSION["cart_array"] as $each_item) { 
				      $i++;
				      while (list($key, $value) = each($each_item)) {
						  if ($key == "item_id" && $value == $item_to_adjust) {
							  // That item is in cart already so let's adjust its quantity using array_splice()
							  array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $item_to_adjust, "quantity" => $quantity)));
						  } // close if condition
				      } // close while loop
			} // close foreach loop
		//}

	}


	public function removeItem(){
		//if (isset($_POST['index_to_remove']) && $_POST['index_to_remove'] != "") {
			    // Access the array and run code to remove that array index
			 	$key_to_remove = $_POST['index_to_remove'];
				if (count($_SESSION["cart_array"]) <= 1) {
					unset($_SESSION["cart_array"]);
					$_SESSION["cartTotal"]=0.00; 
				} else {
					unset($_SESSION["cart_array"]["$key_to_remove"]);
					sort($_SESSION["cart_array"]);
				}
			//}

	}



	public function displayCart(){			
			$cartOutput = "";
			$cartTotal = "";
			$pp_checkout_btn = '';
			$product_id_array = '';
			$order_payment="";
			if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
			    $cartOutput = "<h2 align='center'>Your shopping cart is empty</h2>";
				$_SESSION["cartTotal"]=0.00; 
			} else {
				// Start PayPal Checkout Button
				/*$pp_checkout_btn .= '<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
			    <input type="hidden" name="cmd" value="_cart">
			    <input type="hidden" name="upload" value="1">
			    <input type="hidden" name="business" value="you@youremail.com">';*/
				// Start the For Each loop
				$i = 0; 
				$counting = 0;
				include '../model/flashdrive.php';
				$flashdrive = new flashdrive();
			    foreach ($_SESSION["cart_array"] as $each_item) { 
					$item_id = $each_item['item_id'];
					
					$result = $flashdrive->getFlashdriveByID($item_id);
		
					while ($row = mysqli_fetch_array($result)) {
						$model = $row["model"];
						$brand = $row["brand"];
						$capacity = $row["capacity"];
						$price = $row["price"];
						$details = $row["details"];
						$stock = $row["stock"];
					}
				
					$pricetotal = $price * $each_item['quantity'];
					$ihap = $each_item['quantity'];
					$cartTotal = $pricetotal + $cartTotal;
					$_SESSION["cartTotal"]=$cartTotal;
					$stock = $stock - $each_item['quantity'];
					
					//setlocale(LC_MONETARY, "en_US");
			        //$pricetotal = money_format("%10.2n", $pricetotal);
					// Dynamic Checkout Btn Assembly
					/*$x = $i + 1;
					$pp_checkout_btn .= '<input type="hidden" name="item_name_' . $x . '" value="' . $product_name . '">
			        <input type="hidden" name="amount_' . $x . '" value="' . $price . '">
			        <input type="hidden" name="quantity_' . $x . '" value="' . $each_item['quantity'] . '">  ';*/
					// Create the product array variable
					$product_id_array .= "$item_id-".$each_item['quantity'].","; 
					// Dynamic table row assembly
					$cartOutput .= "<tr>";
					$cartOutput .= '<td>'.$model.'</td>';
					$cartOutput .= '<td>'.$brand.'</td>';
					$cartOutput .= '<td>' . $details . '</td>';
					$cartOutput .= '<td>'.$capacity.'</td>';
					$cartOutput .= '<td>$' . $price . '</td>';
					$cartOutput .= '<td>' . $stock . '</td>';
					$cartOutput .= '<td>
					<form action="../controller/cart_control.php" method="post">
					<input name="quantity" type="text" value="' . $each_item['quantity'] . '" size="1" maxlength="2" />
					<input name="adjustBtn' . $item_id . '" type="submit" value="change" />
					<input name="item_to_adjust" type="hidden" value="' . $item_id . '" />
					</form></td>';
					//$cartOutput .= '<td>' . $each_item['quantity'] . '</td>';
					$cartOutput .= '<td>' . $pricetotal . '</td>';
					$cartOutput .= '<td><form action="../controller/cart_control.php" method="post"><input name="deleteBtn' . $item_id . '" type="submit" value="X" /><input name="index_to_remove" type="hidden" value="' . $i . '" /></form></td>';
					$cartOutput .= '</tr>';
					
					//for viewing of order_payment!
					$order_payment.= '<tr>';
					$order_payment.= '<td>'.$model.'</td>';
					$order_payment.= '<td>'.$price.'</td>';
					$order_payment.= '<td>'.$ihap.'</td>';
					$order_payment.= '<td>'.$pricetotal.'</td>';
					$order_payment.= '</tr>';
					$i++;
					
					
					
					
					$_SESSION['ordered_product_name']= $model;
					$_SESSION['orderes_item_id']=$item_id;
					//if(isset($_SESSION["buy"])){
					//	$order_id = $_SESSION['order_id'];
					//	$customer_id = $_SESSION['customer_id'];
					//	$date_and_time = date("l, F j Y @h:i A",time());
					//	mysql_query("insert into order_details(order_id,customer_id,wine_id,price,quantity,date_time_ordered) values ($order_id,$customer_id,$item_id,$pricetotal,$ihap,'$date_and_time')");
					//	echo "na insert na ui balas!";
					//	mysql_query("UPDATE wine_products SET number_of_stock=number_of_stock-".$ihap." WHERE id=".$item_id)or die(mysql_error());
					//	echo "na edit pajud ang quantity ahahha :P!";
					//	$counting++;
					}
					
						
			    } 
				//setlocale(LC_MONETARY, "en_US");
			    //$cartTotal = money_format("%10.2n", $cartTotal);
				//$cartTotal = sprintf("%10.2n", $cartTotal);
			   /*if($counting==$i){
						  unset($_SESSION["cart_array"]);
						  unset($_SESSION["buy"]);
						  $_SESSION["cartTotal"]=0.00;
						  $_SESSION["thanks"]=true;
						  header("location:checkout_log_in.php");
						  exit();
					}*/
					
				$cartTotal = "<div style='font-size:18px; margin-top:12px;' align='right'>Cart Total : ".$cartTotal." USD</div>";
				$_SESSION["cartOutput"]=$cartOutput;
				$_SESSION["order_paymment_view"] = $order_payment;

				
			    // Finish the Paypal Checkout Btn
				/*$pp_checkout_btn .= '<input type="hidden" name="custom" value="' . $product_id_array . '">
				<input type="hidden" name="notify_url" value="https://www.yoursite.com/storescripts/my_ipn.php">
				<input type="hidden" name="return" value="https://www.yoursite.com/checkout_complete.php">
				<input type="hidden" name="rm" value="2">
				<input type="hidden" name="cbt" value="Return to The Store">
				<input type="hidden" name="cancel_return" value="https://www.yoursite.com/paypal_cancel.php">
				<input type="hidden" name="lc" value="US">
				<input type="hidden" name="currency_code" value="USD">
				<input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-but01.gif" name="submit" alt="Make payments with PayPal - its fast, free and secure!">
				</form>';*/
		return $cartOutput;
		}

		public function checkCash(){

				$customer_cash = 0.00;
				$customer_change = 0.00;
				$customers_cash_ok = false;
				if(isset($_POST['customer_cash'])){
					$cartTotal = $_SESSION["cartTotal"];
					$customer_cash = $_POST['customer_cash'];
					if($customer_cash<$cartTotal){
					$customer_cash_check = false;
					$warning_msg = "YOUR CASH IS NOT SUFFICIENT FOR YOU ORDERS!";
					}
					else{
					return  $customer_change = $customer_cash - $cartTotal;
					}
					
				
				}

		}

		public function SaveCheckout(){
			include '../model/flashdrive.php';
			$checkout = new flashdrive();
			$checkout->customer_account_id = $_SESSION['account_id'];
			$checkout->customer_firstname = $_SESSION['firstname'];
			$checkout->customer_lastname = $_SESSION['lastname'];
			$checkout->customer_gender = $_SESSION["gender"];
			$checkout->customer_email = $_SESSION['email'];
			$checkout->customer_address = $_SESSION['address'];
			$checkout->customer_contact_number = $_SESSION['contact_number'];
			$checkout->addToCustomers();

			$checkout->order_total = $_SESSION["cartTotal"];
			$checkout->customer_cash = $_SESSION["customer_cash"];
			$checkout->customer_change = $_SESSION["customer_change"];
			$checkout->addToCustomersOrders();

			
			$i = 0; 
			$counting = 0;
		    foreach ($_SESSION["cart_array"] as $each_item) { 
		    	$item_id = $each_item['item_id'];
					
				$result = $checkout->getFlashdriveByID($item_id);
	
				while ($row = mysqli_fetch_array($result)) {
					$model = $row["model"];
					$brand = $row["brand"];
					$capacity = $row["capacity"];
					$price = $row["price"];
					$details = $row["details"];
					$stock = $row["stock"];
				}
				$pricetotal = $price * $each_item['quantity'];
				$ihap = $each_item['quantity'];
				$stock = $stock - $each_item['quantity'];


				$checkout->flash_drive_id = $item_id;
				$checkout->quantity = $ihap;
				$checkout->price = $price;
				$checkout->addToOrderDetails();


		    }

		  unset($_SESSION["cart_array"]); 
		}

}

$cart = new cart_control();

if (isset($_POST['pid'])) {
	$cart->addToCart(); 
	header("location: ../view/cart_view.php"); 
}
if (isset($_GET['cmd']) && $_GET['cmd'] == "emptycart"){
	$cart->emptyCart();
	header("location: ../view/cart_view.php"); 
}
if (isset($_POST['item_to_adjust']) && $_POST['item_to_adjust'] != ""){
	$cart->editQuantity();
	header("location: ../view/cart_view.php"); 
}
 
if (isset($_POST['index_to_remove']) && $_POST['index_to_remove'] != ""){
	$cart->removeItem();
	header("location: ../view/cart_view.php"); 
}
if (isset($_GET['checkout']) && $_GET['checkout']=='true'){
		$cart->SaveCheckout();
		header("location:../view/checkout_view.php?checkout=true");

}