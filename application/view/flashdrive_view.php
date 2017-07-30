


<!DOCTYPE html>
<html>
<head>
	<title>Memory Go | Flashdrives </title>
	<link rel="shortcut icon" href="../../images/favicon.ico" type="image/icon">
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
	            <div class="panel-heading" id="flash_drives_label"> <a href="flashdrive_view.php?fbrand=none&capacity=0">FLASH DRIVES </a></div>
	            <ul class="nav nav-list" >
	            	<?php
	            	$hp = "";
	            	$kingston = "";
	            	$toshiba = "";
	            	$sandisk = "";
	            	$trancend = "";
	            	$sony = "";
	            	$pny = "";
	            	$cdrking = "";
	            	if(isset($_GET['fbrand'])){
	            		if($_GET['fbrand']=='hp'){
	            			$hp = "active";
	            		}
	            		elseif($_GET['fbrand']=='kingston'){
	            			$kingston = "active";
	            		}
	            		elseif($_GET['fbrand']=='toshiba'){
	            			$toshiba = "active";
	            		}
	            		elseif($_GET['fbrand']=='sandisk'){
	            			$sandisk = "active";
	            		}
	            		elseif($_GET['fbrand']=='trancend'){
	            			$trancend = "active";
	            		}
	            		elseif($_GET['fbrand']=='sony'){
	            			$sony = "active";
	            		}
	            		elseif($_GET['fbrand']=='pny'){
	            			$pny = "active";
	            		}
	            		elseif($_GET['fbrand']=='cdrking'){
	            			$cdrking = "active";
	            		}

	            	}
	            	?>

	                <li class="<?php echo $hp; ?>"> <a href="flashdrive_view.php?fbrand=hp&capacity=0"> HP </a></li>
	                <li class="<?php echo $kingston; ?>"> <a href="flashdrive_view.php?fbrand=kingston&capacity=0"> KINGSTON </a></li>
	                <li class="<?php echo $toshiba; ?>"> <a href="flashdrive_view.php?fbrand=toshiba&capacity=0"> TOSHIBA </a></li>
	                <li class="<?php echo $sandisk; ?>"> <a href="flashdrive_view.php?fbrand=sandisk&capacity=0"> SANDISK </a></li>      
	                <li class="<?php echo $trancend; ?>"> <a href="flashdrive_view.php?fbrand=trancend&capacity=0"> TRANCEND </a></li>
	                <li class="<?php echo $sony; ?>"> <a href="flashdrive_view.php?fbrand=sony&capacity=0"> SONY </a></li>
					<li class="<?php echo $pny; ?>"> <a href="flashdrive_view.php?fbrand=pny&capacity=0"> PNY  </a></li>
	       		    <li class="<?php echo $cdrking; ?>"> <a href="flashdrive_view.php?fbrand=cdrking&capacity=0"> CD-R KING </a></li>                     
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
		
		<ul class="nav nav-tabs" role="tablist" id="capacity_category">
		<?php
		if(!isset($_GET['fbrand'])){
			$fbrand = "none";
		}
		else $fbrand = $_GET['fbrand']; 
		?>

		  <li><a href="flashdrive_view.php?fbrand=<?php echo $fbrand;?>&capacity=0">ALL</a></li>
		  <li><a href="flashdrive_view.php?fbrand=<?php echo $fbrand;?>&capacity=1">1GB</a></li>
		  <li><a href="flashdrive_view.php?fbrand=<?php echo $fbrand;?>&capacity=2">2GB</a></li>
		  <li><a href="flashdrive_view.php?fbrand=<?php echo $fbrand;?>&capacity=4">4GB</a></li>
		  <li><a href="flashdrive_view.php?fbrand=<?php echo $fbrand;?>&capacity=16">16GB</a></li>
		  <li><a href="flashdrive_view.php?fbrand=<?php echo $fbrand;?>&capacity=32">32GB</a></li>
		  <li><a href="flashdrive_view.php?fbrand=<?php echo $fbrand;?>&capacity=128">128GB</a></li>
		</ul>

			<div class="container-fluid">
				<div class="row">
					
				<ul  id="flashdrive_view_list">

					<?php 

						include $_SERVER['DOCUMENT_ROOT'].'/memory-go/application/model/flashdrive.php';
						$g = new flashdrive();
						if(isset($_GET['fbrand'])){
							$brand = $_GET['fbrand'];
							$capacity = $_GET['capacity'];
							
								if(($_GET['capacity']==='0') && ($_GET['fbrand'] != 'none')){
									$result = $g->getFlashdriveByBrand($brand);	
								}
								elseif(($_GET['capacity']==='0') && ($_GET['fbrand'] ==='none')){
									$result = $g->getAllFlashdrive();	
								}
								elseif(($_GET['capacity']!='0') && ($_GET['fbrand'] ==='none')){
									$result = $g->getFlashdriveByCapacity($capacity);	
								}
								else {
									$result = $g->getFlashdriveByBrandAndCapacity($brand,$capacity);
								}
							}

							elseif(isset($_POST['search'])){
								$key = $_POST['search'];

								$result = $g->searchFlashDrive($key);	
							
							}


							else{
							 $result = $g->getAllFlashdrive();	
							}
							while($row=mysqli_fetch_array($result)){
											
											$flashdrive_photo = $row['flashdrive_photo'];
											$model = $row['model'];
											$_SESSION['pendrive_photo'] = $row['flashdrive_photo'];
											$id = $row['flash_drive_id'];

											echo '
													<li> 
													<img src="../../pendrives/'.$flashdrive_photo .'" id="pendrive_photo" />
													<div id="flashdrive_model">
													<p>'.$model.'</p>
													</div>

													
														<ul id="view_buy_btn_list">
															<li>
																 <a href="#'.$id.'" data-toggle="modal" id="view_btn" class="btn btn-primary push" role="button"> VIEW </a>
															</li>
															<li>

																 <form  name="form1" method="POST" action="../controller/cart_control.php">
																	<input type="hidden" name="pid" value="'.$id.'" />
																	<input type="submit" id="buy_btn" class="btn btn-default" name="buy" value="BUY" />
																 </form> 

															</li>
														</ul>
													
													

									            	
										          
										               
										            
										          
													</li>
													<!--- for modal -->




													<div class="modal fade" id="'.$id.'" role="dialog">
															<div class="modal-dialog">
																<div class="modal-content">
																	<div class="modal-header">
																		<p>'.$model.'</p>
																	</div>
																		<div class="modal-body">
																			<div id="modalContent" >
																				<img src="../../pendrives/'.$flashdrive_photo .'" id="f_photo" />

																			</div>
																		 	
																	</div>
																	<div class="modal-footer">

																		<a href="#" class="btn btn-primary" data-dismiss = "modal" > close </a>
																	</div>
																</div>
															</div>

													</div>


											';


										}
						

					?>
				</ul>

					
				</div>
				
			</div>

		</div>
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
