
<!DOCTYPE html>
<html>
<head>
	<title>Memory Go | Check Out</title>
	<link rel="shortcut icon" href="images/favicon.ico" type="../../image/icon">
	<link href = "../../css/bootstrap.min.css" rel = "stylesheet">
	<link href = "../../css/styles.css" rel = "stylesheet">
</head>
<body>

<?php
		session_start();
		$manage = "";
		if(isset($_SESSION["login"])){
				if($_SESSION['account_type']==='admin')
				{
					$manage = '<li> <a href = "manage_view.php"> Manage </a></li>';
				}
				$headers = '
				<div class = "navbar navbar-inverse" id="mymain-header">
				<div class = "container">
						
							<a href = "../../index.php" class = "navbar-brand" >Memory-Go </a>
							<div class="nav navbar-header" >
								<button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse" id="main-menu-nav"> 
								<span class = "icon-bar"></span>
								<span class = "icon-bar"></span>
								<span class = "icon-bar"></span>
								</button>
							</div>
							<div class = "collapse navbar-collapse navHeaderCollapse">
								<ul class = "nav navbar-nav navbar-right">
								

								<li> <a href = "#">'.$_SESSION['username'].' </a></li>
								'.$manage.'
								<li> <a href = "../controller/logout.php"> Logout </a></li>
								<li><a href ="cart_view.php" class="glyphicon glyphicon-shopping-cart"></a></li>
								<li> 
								<form action="flashdrive_view.php" method="POST" id="searchFlashDriveForm">
								<input type="text" class="form-control" id="searchFlashDrive" name="search" placeholder="Search">
								</form>
								</li>
								</ul>
								

							</div>
				</div>
				
			</div>

			<div class = "navbar navbar-inverse navbar-fixed-top"  id="mymain-header-fix">
				<div class = "container">
						
							<a href = "../../index.php" class = "navbar-brand" >Memory-Go </a>
							<div class="nav navbar-header" >
								<button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse" id="main-menu-nav"> 
								<span class = "icon-bar"></span>
								<span class = "icon-bar"></span>
								<span class = "icon-bar"></span>
								</button>
							</div>
							<div class = "collapse navbar-collapse navHeaderCollapse">
								<ul class = "nav navbar-nav navbar-right">
								<li> <a href = "#">'.$_SESSION['username'].' </a></li>
								'.$manage.'
								<li> <a href = "../controller/logout.php"> Logout </a></li>
								<li><a href ="cart_view.php" class="glyphicon glyphicon-shopping-cart"></a></li>
								<li> 
								<form action="flashdrive_view.php" method="POST" id="searchFlashDriveForm">
								<input type="text" class="form-control" id="searchFlashDrive" name="search" placeholder="Search">
								</form>
								</li>
								</ul>
								

							</div>
				</div>
				
			</div>
			';

			
			
		}
		else{
			$headers = '

			<div class = "navbar navbar-inverse" id="mymain-header">
				<div class = "container">
						
							<a href = "../../index.php" class = "navbar-brand" >Memory-Go </a>
							<div class="nav navbar-header" >
								<button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse" id="main-menu-nav"> 
								<span class = "icon-bar"></span>
								<span class = "icon-bar"></span>
								<span class = "icon-bar"></span>
								</button>
							</div>
							<div class = "collapse navbar-collapse navHeaderCollapse">
								<ul class = "nav navbar-nav navbar-right">
								<li> <a href = "#loginForm_modal" data-toggle="modal"> Login </a></li>
								<li> <a href = "create_account_view.php"> Creat Account </a></li>
								<li><a href ="cart_view.php" class="glyphicon glyphicon-shopping-cart"></a></li>
								<li> 
								<form action="flashdrive_view.php" method="POST" id="searchFlashDriveForm">
								<input type="text" class="form-control" id="searchFlashDrive" name="search" placeholder="Search">
								</form>
								</li>
								</ul>
								

							</div>
				</div>
				
			</div>

			<div class = "navbar navbar-inverse navbar-fixed-top"  id="mymain-header-fix">
				<div class = "container">
						
							<a href = "index.php" class = "navbar-brand" >Memory-Go </a>
							<div class="nav navbar-header" >
								<button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse" id="main-menu-nav"> 
								<span class = "icon-bar"></span>
								<span class = "icon-bar"></span>
								<span class = "icon-bar"></span>
								</button>
							</div>
							<div class = "collapse navbar-collapse navHeaderCollapse">
								<ul class = "nav navbar-nav navbar-right">
								<li> <a href = "#loginForm_modal" data-toggle="modal"> Login </a></li>
								<li> <a href = "create_account_view.php"> Creat Account </a></li>
								<li><a href ="cart_view.php" class="glyphicon glyphicon-shopping-cart"></a></li>
								<li> 
								<form action="flashdrive_view.php" method="POST" id="searchFlashDriveForm">
								<input type="text" class="form-control" id="searchFlashDrive" name="search" placeholder="Search">
								</form>
								</li>
								</ul>
								

							</div>
				</div>
				
			</div>
		';

		}
			

		echo $headers;
		?>



	<div class = "navbar navbar-inverse " id="slogan">
		<div class="container" >

				<div class="col-lg-6" >
						Because good memories are meant to last forever.
				</div>
				
			

		</div>
	</div>
<!--second menu-->

	
			


<div class="container" id="mainBox">	

	<div class="container-fluid">
	
	<div class="container-fluid">

	
		
		
	
	<?php


	$warning_msg  = "";
	
	if(isset($_POST['cash']) || isset($_POST['compute'])){
		$_SESSION["customer_cash"] = $_POST['cash'];
		if($_SESSION["customer_cash"]<$_SESSION["cartTotal"]){
		$warning_msg = '<div id="cash_msg" class="alert alert-danger" role="alert">Cash is not enough</div>';
		}
		else{
		 $_SESSION["customer_change"] = $_SESSION["customer_cash"] - $_SESSION["cartTotal"];
		$warning_msg = '<div id="cash_msg" class="alert alert-success" role="alert"> Change is: '.$_SESSION["customer_change"].'</div>
					<a href="../controller/cart_control.php?checkout=true" class="btn btn-default pull-right" name="checkout">READY FOR CHECKOUT</a>
		';
		}
		
	}
	elseif(empty($_SESSION["cartTotal"])){
		header("location:cart_view.php");
		}

	else{$warning_msg = '<div id="cash_msg" class="alert alert-danger" role="alert">No cash.</div>';}

	if (isset($_SESSION['login']) && !isset($_GET['checkout'])) {
		$auth = '
				<h3> Your Information </h3>
				<table class="table table-bordered">
						<tr>
							<td width="30%"> <strong> First Name </strong></td>
							<td width="10%"> <strong> Last Name </strong></td>
							<td width="10%"> <strong> Gender </strong></td>
							<td width="10%"> <strong> Birthday </strong></td>
							<td width="10%"> <strong> Address </strong></td>
							<td width="10%"> <strong> email </strong></td>
						</tr>
							<tr>
							<td width="30%"> <i>'.$_SESSION['firstname'].'</i></td>
							<td width="10%"> <i>'.$_SESSION['lastname'].'</i></td>
							<td width="10%"> <i>'.$_SESSION['gender'].'</i></td>
							<td width="10%"> <i>'.$_SESSION['birthday'].'</i></td>
							<td width="10%"> <i>'.$_SESSION['address'].' </i></td>
							<td width="10%"> <i>'.$_SESSION['email'].'</i></td>
						</tr>
						
						
				</table>
				<hr>
				<h3> Order Information </h3>
				<table class="table table-bordered">
						<tr>
							<td width="30%"> <strong> Model </strong></td>
							<td width="10%"> <strong> Price </strong></td>
							<td width="10%"> <strong>Quantity </strong></td>
							<td width="10%"> <strong>Total </strong></td>
						</tr>
						
						'.$_SESSION["order_paymment_view"].'
				</table>
				

				<h3> <p id="cart_total_checkout">Cart Total:'.$_SESSION["cartTotal"].' </p></h3>

 

				<form id="compute_form"  action="checkout_view.php" method="POST">

					<ul id="compute_list">
						<li><h4>Enter Cash : </h4></li>
						<li> <input type="text" class="form-control" id="cash" name="cash" placeholder="Cash"/></li>
					</ul>
						<button type="submit" class="btn btn-custom pull-right" name="compute">Compute</button>
	
				</form>
				<br>
				<br>
				<br>
				<h3>'.$warning_msg .'</h3>
				
		';

	}elseif (isset($_SESSION['login']) && isset($_GET['checkout'])) {
		if($_GET['checkout']==='true')
			$auth = '<h3><div id="thanx" class="alert alert-success" role="alert"> THANKYOU FOR BUYING. </div></h3>
					<div class="container-fluid" id="shop_more_btn_div">
						<a href="flashdrive_view.php" class="btn btn-primary" id="shop_more_btn">SHOP MORE</a>
					</div>
		';
	}else{
		$auth = '


			<div class="alert alert-danger" role="alert"><h3> You must signin to continue. </h3></div>
			<div class="col-md-6 col-md-offset-3">
		  			<div class="panel panel-primary">
					  <div class="panel-heading">Memory-Go Login</div>
					  <div class="panel-body">

					  <br>
					   <form class="form-horizontal" id="loginForm" method="POST" action="../controller/login_control.php?from=checkout">
							   <div class="form-group">
							        <label class="control-label col-md-4" for="username">Username</label>
							        <div class="col-md-6">
							            <input type="text" class="form-control" id="username" name="username" placeholder="Username" />
							        </div>
							    </div>
							    <div class="form-group">
							        <label class="control-label col-md-4" for="password">Password</label>
							        <div class="col-md-6">
							            <input type="password" class="form-control" id="password" name="password" placeholder="password" />
							        </div>
						    </div>

						    <div class="form-group">
						        <div class="col-md-6">
						            <button type="submit" value="login" class="btn btn-primary pull-right" name="login">Login</button>
						        </div>
						    </div>
						    <hr>
						     <div class="form-group">
						        <div class="col-md-6">
						            <a href="create_account_view.php"  class="btn btn-default " name="login">Creat Account</a>
						        </div>
						    </div>

						</form>

					  </div>
					 
					</div>	
		  	</div>


		';

	}
		
	echo $auth;
	?>	
			




	</div>
		
	<div class = "container">
				<p class="navbar-text pull-left"> 2014 Memory-Go All Rights Reserved.</p>
	</div>
</div>
</div>




	
	<!--- for modal -->


<div id="loginForm_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="loginForm_modalLabel" aria-hidden="true"> 
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Login</h4>
        </div>
        <div class="modal-body">
          	<form class="form-horizontal" id="loginForm" method="POST" action="../controller/login_control.php">
				   <div class="form-group">
				        <label class="control-label col-md-4" for="username">Username</label>
				        <div class="col-md-6">
				            <input type="text" class="form-control" id="username" name="username" placeholder="Username" />
				        </div>
				    </div>
				    <div class="form-group">
				        <label class="control-label col-md-4" for="password">Password</label>
				        <div class="col-md-6">
				            <input type="password" class="form-control" id="password" name="password" placeholder="password" />
				        </div>
			    </div>

			    <div class="form-group">
			        <div class="col-md-6">
			            <button type="submit" value="login" class="btn btn-custom pull-right" name="login">Login</button>
			        </div>
			    </div>
			</form>
        	</div><!-- End of Modal body -->
       	 </div><!-- End of Modal content -->
     </div>
 </div>





<div class="modal fade" id="toshiba-suruga" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<p>Toshiba Suruga USRG</p>
				</div>
					<div class="modal-body">

					 	<img src="images/toshiba_16gb.jpg" >
				</div>
				<div class="modal-footer">
					<a href="#" class="btn btn-primary" data-dismiss = "modal">close</a>
				</div>
			</div>
		</div>

	</div>

<div class="modal fade" id="sonymach" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<p>Sony Micro Vault MACH</p>
				</div>
					<div class="modal-body">

					 	 <img src="images/sonymach_1.jpg">
				</div>
				<div class="modal-footer">
					<a href="#" class="btn btn-primary" data-dismiss = "modal">close</a>
				</div>
			</div>
		</div>

	</div>
<div class="modal fade" id="sandisk_force" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<p>Sandisk Cruzer Force</p>
				</div>
					<div class="modal-body">

					 	 <img src="images/sandisk_cruzer_force.jpg" >
				</div>
				<div class="modal-footer">
					<a href="#" class="btn btn-primary" data-dismiss = "modal">close</a>
				</div>
			</div>
		</div>

	</div>

	<script type="text/javascript" src="../../js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.js"></script>
	<script type="text/javascript" src="../../js/sticky_navbar.js"></script> 
	<script type="text/javascript" src="../../js/myjs.js"></script> 
	
</body>
</html>
