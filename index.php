<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Memory Go</title>
	<link rel="shortcut icon" href="images/favicon.ico" type="image/icon">
	<link href = "css/bootstrap.min.css" rel = "stylesheet">
	<link href = "css/styles.css" rel = "stylesheet">
</head>
<body>

<?php
$manage = "";
if(isset($_SESSION["login"])){
		if($_SESSION['account_type']==='admin')
		{
			$manage = '<li> <a href = "application/view/manage_view.php"> Manage </a></li>';
		}
		$headers = '
		<div class = "navbar navbar-inverse" id="mymain-header">
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
						

						<li> <a href = "#">'.$_SESSION['username'].' </a></li>
						'.$manage.'
						<li> <a href = "application/controller/logout.php"> Logout </a></li>
						<li><a href ="application/view/cart_view.php" class="glyphicon glyphicon-shopping-cart"></a></li>
						<li> 
						<form action="application/view/flashdrive_view.php" method="POST" id="searchFlashDriveForm">
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
						<li> <a href = "#">'.$_SESSION['username'].' </a></li>
						'.$manage.'
						<li> <a href = "application/controller/logout.php"> Logout </a></li>
						<li><a href ="application/view/cart_view.php" class="glyphicon glyphicon-shopping-cart"></a></li>
						<li> 
						<form action="application/view/flashdrive_view.php" method="POST" id="searchFlashDriveForm">
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
						<li> <a href = "application/view/create_account_view.php"> Creat Account </a></li>
						<li><a href ="application/view/cart_view.php" class="glyphicon glyphicon-shopping-cart"></a></li>
						<li> 
						<form action="application/view/flashdrive_view.php" method="POST" id="searchFlashDriveForm">
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
						<li> <a href = "application/view/create_account_view.php"> Creat Account </a></li>
						<li><a href ="application/view/cart_view.php" class="glyphicon glyphicon-shopping-cart"></a></li>
						<li> 
						<form action="application/view/flashdrive_view.php" method="POST" id="searchFlashDriveForm">
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
		<div class="col-md-2" id="mysecond-header">
		<nav class="navbar navbar-default" role="navigation" id="category-nav">

	        <div class="navbar-header" >
	            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav2bar-collapse" >
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>
	        </div>

	        <div class="collapse navbar-collapse nav2bar-collapse" id="category">
	            <div class="panel-heading" id="flash_drives_label" > <a href="application/view/flashdrive_view.php?fbrand=none&capacity=0"> FLASH DRIVES </a></div>
	            <ul class="nav nav-list" >
	                <li> <a href="application/view/flashdrive_view.php?fbrand=hp&capacity=0"> HP </a></li>
	                <li> <a href="application/view/flashdrive_view.php?fbrand=kingston&capacity=0"> KINGSTON </a></li>
	                <li> <a href="application/view/flashdrive_view.php?fbrand=toshiba&capacity=0"> TOSHIBA </a></li>
	                <li> <a href="application/view/flashdrive_view.php?fbrand=sandisk&capacity=0"> SANDISK </a></li>      
	                <li> <a href="application/view/flashdrive_view.php?fbrand=trancend&capacity=0"> TRANCEND </a></li>
	                <li> <a href="application/view/flashdrive_view.php?fbrand=sony&capacity=0"> SONY </a></li>
					<li> <a href="application/view/flashdrive_view.php?fbrand=pny&capacity=0"> PNY  </a></li>
	       		    <li> <a href="application/view/flashdrive_view.php?fbrand=cdrking&capacity=0"> CD-R KING </a></li>                          
	            </ul>

	        </div><!-- /.navbar-collapse -->
	    </nav>

	</div><!--/end left column-->


	

		<div class="col-md-10" id="right-column">
				<!---
				<div >
					<ol class="breadcrumb" id="beadcrumb-side">
					  <li class="active"><a href="#">Home</a></li>
					</ol>

				</div>
				-->
			

				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				      <ol class="carousel-indicators">
				        <li data-target="#carousel" data-slide-to="0" class="active"></li>
				        <li data-target="#carousel" data-slide-to="1"></li>
				        <li data-target="#carousel" data-slide-to="2"></li>
				      </ol>

					   <div class="carousel-inner">
					          <div class="item active">
					            <img src="images/alldrives.jpg" alt="5 US dollar">
				      			</div>
					  
					    	  <div class="item">
					          	<img src="images/sonymach.jpg" alt="100 US Dollar">
							  </div>
						   
					          <div class="item">
						          <img src="images/pic3.jpg" alt="50 US dollar">
					      	  </div>
							
						</div>

				      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
				        <span class="glyphicon glyphicon-chevron-left"></span>
				      </a>
					  
				      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
				        <span class="glyphicon glyphicon-chevron-right"></span>
				      </a>


				</div><!--/end left column-->
					<div class="container">
						<span><h2>LATEST FLASH DRIVES</h2></span>
						<div class="row">
						   <div class="col-sm-6 col-md-3">
						      <div class="thumbnail">
						         <img src="images/toshiba_16gb.jpg" 
						         alt="Generic placeholder thumbnail">
						      </div>
						      <div class="caption">
						         <h3>Toshiba Suruga USRG</h3>
						         <p>
						          This thumb drive is equipped with USB 2.0 interface for 
						          a secure high speed data transfer. The Toshiba flash drive
						           is plug and play enabled to allow you to install it easily 
						           and quickly. This drive is compatible with both Windows 
						           and Mac.</p>
						         <p>
						           
						            <form  name="form1" method="POST" action="application/controller/cart_control.php">
						             	 <a href="#toshiba-suruga" data-toggle="modal" class="btn btn-primary" role="button">
						               VIEW
						            </a> 
										<input type="hidden" name="pid" value="6" />
										<input type="submit"  class="btn btn-default" name="buy" value="BUY" />
									 </form> 
						         </p>
						      </div>
						   </div>
						   <div class="col-sm-6 col-md-3">
						      <div class="thumbnail">
						         <img src="images/sonymach_1.jpg" 
						         alt="Generic placeholder thumbnail">
						      </div>
						      <div class="caption">
						         <h3>Sony Micro Vault MACH</h3>
						         <p>First USB 3.0 flash memory drive from Sony
									Available in 8GB/16GB/32GB/64GB capacities
									Ultra-fast transfers up to 120 MB/s read / 90 MB/s write*
									Sleek aluminium body with retractable USB connector and LED indicator</p>
						         <p>
						           
						             <form  name="form1" method="POST" action="application/controller/cart_control.php">
						             	 <a href="#sonymach" data-toggle="modal"  class="btn btn-primary" role="button">
						               VIEW
						            </a> 
										<input type="hidden" name="pid" value="7" />
										<input type="submit"  class="btn btn-default" name="buy" value="BUY" />
									 </form> 
						         </p>
						      </div>
						   </div>
						   <div class="col-sm-6 col-md-3">
						      <div class="thumbnail">
						         <img src="images/sandisk_cruzer_force.jpg"  
						         alt="Generic placeholder thumbnail">
						      </div>
						      <div class="caption">
						         <h3>Sandisk Cruzer Force </h3>
						         <p>With capacities as large as 64GB,
						         the Cruzer Force USB flash drive can 
						         hold even bulky files. Keep your most important files 
						         in easy reach, including HD video, high-resolution images,
						          music, and personal documents. </p>
						         <p>
						            
						            <form  name="form1" method="POST" action="application/controller/cart_control.php">
						             	  <a href="#sandisk_force" data-toggle="modal"  class="btn btn-primary" role="button">
						               VIEW
						            </a> 
										<input type="hidden" name="pid" value="8" />
										<input type="submit"  class="btn btn-default" name="buy" value="BUY" />
									 </form> 
						         </p>
						      </div>
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
          	<form class="form-horizontal" id="loginForm" method="POST" action="application/controller/login_control.php">
				   <div class="form-group">
				        <label class="control-label col-md-4" for="username">Username</label>
				        <div class="col-md-6">
				            <input type="text" class="form-control" id="username" name="username" placeholder="Username"  />
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

	<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/sticky_navbar.js"></script> 
	<script type="text/javascript" src="js/myjs.js"></script> 
	
</body>
</html>
