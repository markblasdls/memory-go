
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
	


	
		
		
	
	<?php


	$auth = "";
	
	
	if (isset($_GET['action'])) {
		if($_GET['action']==='incorrect'){
			$auth = '<h3><div id="thanx" class="alert alert-danger" role="alert"> INCORRECT INPUT </div></h3>';
		}elseif($_GET['action']==='signedin'){
			$auth = '<h3><div id="thanx" class="alert alert-success" role="alert"> YOU CAN NOW LOGIN </div></h3>';
		}
		
	}
		
	echo $auth;




	?>	
			

	<div class="container">
		<div class="row">
		  	<div class="col-md-6 col-md-offset-3">
		  			<div class="panel panel-primary">
					  <div class="panel-heading">Memory-Go Login</div>
					  <div class="panel-body">

					   <form class="form-horizontal" id="loginForm" method="POST" action="../controller/login_control.php"><br>
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
					  </div>
					</div>	
		  	</div>
		</div>
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
