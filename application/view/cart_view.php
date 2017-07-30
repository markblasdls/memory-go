

<!DOCTYPE html>
<html>
<head>
	<title>Memory-Go | Cart</title>
	<link rel="shortcut icon" href="../../images/favicon.ico" type="image/icon">
	<link href = "../../css/bootstrap.min.css" rel = "stylesheet">
	<link href = "../../css/styles.css" rel = "stylesheet">
</head>
<body>
	
	<?php
		include '../controller/cart_control.php';
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
	<h2>Your Cart</h2>
	<table class="table table-bordered">
		<tr>
			<th width="20%"><strong>Product</strong></th>
			<th width="5%"><strong>Brand</strong></th>
			<th width="20%"><strong>Details</strong></th>
			<th width="9%"><strong>Capacity</strong></th>
			<th width="9%"><strong>Price</strong></th>
			<th width="9%"><strong>Stock</strong></th>
			<th width="9%"><strong>Quantity</strong></th>
			<th width="9%"><strong>Total</strong></th>
			<th width="9%"><strong>Remove</strong></th>
	  	</tr>
	  	<?php
						
						$yourCart = new cart_control();
						echo $yourCart->displayCart();
						?>

	  		
	</table>

	<ul id="empty_check_total_btn">
		<li>
			<a href="flashdrive_view.php" class="btn btn-primary" id="empty-cart-btn">SHOP</a>
		</li>
		<li>
			<a href="../controller/cart_control.php?cmd=emptycart" class="btn btn-primary" id="empty-cart-btn">EMPTY CART</a>
		</li>
		<li>
			<a href="checkout_view.php" class="btn btn-primary" id="empty-cart-btn">CHECK OUT</a>
		</li>
		
			
		

	</ul>

	<h3> <p id="cart_total">Cart Total: <?php echo $_SESSION["cartTotal"];?> </p></h3>

		
		
</div>
	
	
<div class = "container">
			<p class="navbar-text pull-left"> 2014 Memory-Go All Rights Reserved.</p>
</div>
</div>
</div>




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
	






	<script type="text/javascript" src="../../js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.js"></script>
	<script type="text/javascript" src="../../js/sticky_navbar.js"></script> 
	<script type="text/javascript" src="../../js/myjs.js"></script> 
		<script type="text/javascript">
	$(function(){
		$('.nav a').filter(function(){return this.href==location.href}).parent().addClass('active').siblings().removeClass('active')
		$('.nav a').click(function(){
			$(this).parent().addClass('active').siblings().removeClass('active')	
		})
	});
</script>

	

</body>
</html>
