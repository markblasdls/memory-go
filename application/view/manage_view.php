<?php
include '../controller/cart_control.php';

if(!isset($_SESSION['login']) || (isset($_SESSION['login']) && $_SESSION['account_type'] != 'admin')){
	header("location:flashdrive_view.php");
}
?>


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
	            <div class="panel-heading" id="flash_drives_label"> <a href="#">FLASH DRIVES </a></div>
	            <ul class="nav nav-list" >
	            	<?php
	            	$id="";
	            	if(isset($_GET['id']))
	            	 $id=$_GET['id']; 
	            	?>

	                <li> <a href="manage_view.php?cmd=addflashdrive"> ADD </a></li>
	                <li> <a href="manage_view.php?cmd=viewflashdrive"> VIEW </a></li>
	                <li> <a href="manage_view.php?cmd=search"> SEARCH </a></li>
	     
	               
	                                
	            </ul>
	            <div class="panel-heading" id="flash_drives_label"> <a href="#">SERVICES </a></div>
	            <ul class="nav nav-list" >
	                <li> <a href="manage_view.php?cmd=viewOrders"> ORDERS </a> </li>
	                <li> <a href="manage_view.php?cmd=viewCustomers"> CUSTOMERS </a> </li>               
	            </ul>
	             <div class="panel-heading" id="flash_drives_label"> <a href="#">ACCOUNTS</a></div>
	            <ul class="nav nav-list" >
	                <li> <a href="manage_view.php?cmd=viewUsers"> USER </a> </li>
	                <li> <a href="manage_view.php?cmd=viewAdmins"> ADMIN </a> </li>               
	            </ul>
	        </div><!-- /.navbar-collapse -->
	    </nav>

	</div><!--/end left column-->


	

<div class="col-md-10" id="right-column">
			 <?php
							    $display = "";
							    $action ="";
							    if(isset($_GET['cmd']) || isset($_GET['id'])){

							    	if($_GET['cmd']==='addflashdrive'){

							    		$display = '
							    					<form class="form-horizontal"  name="commentform" method="POST" action="../controller/flashdrive_control.php" enctype="multipart/form-data">
													 <div class="form-group">
														<label class="control-label col-md-8" id="signup_labels" ><h3>FLASH DRIVE INFORMATION</h3></label>
													</div>

												   <div class="form-group">
												        <label class="control-label col-md-4">Brand</label>
												        <div class="col-md-6 selectContainer">
															 <select name="brand" class="form-control">
													                <option value="">Brand</option>
													                <option value="hp">HP</option>
													                <option value="kingston">KINGSTON</option>
													                <option value="toshiba">TOSHIBA</option>
													                <option value="sandisk">SANDISK</option>
													                <option value="trancend">TRANCEND</option>
													                <option value="sony">SONY</option>
													                <option value="pny">PNY</option>
													                <option value="cd-rking">CD-R KING</option>
													            </select>
												        </div>
												    </div>
						
												
												     <div class="form-group">
												        <label class="control-label col-md-4">Model</label>
												        <div class="col-md-6">
												            <input type="text" class="form-control" name="model" placeholder="Model"/>
												        </div>
												    </div>
												   
												     <div class="form-group">
												        <label class="control-label col-md-4">Capacity</label>
												        <div class="col-md-6 selectContainer">
															 <select name="capacity" class="form-control">
													                <option value="">Capacity</option>
													                <option value="1">1GB</option>
													                <option value="2">2GB</option>
													                <option value="4">4GB</option>
													                <option value="16">16GB</option>
													                <option value="32">32GB</option>
													                <option value="128">128GB</option>
													            </select>
												        </div>
												    </div>

												    <div class="form-group">
												        <label class="control-label col-md-4">Price</label>
												        <div class="col-md-6">
												            <input type="text" class="form-control" name="price" placeholder="Price"/>
												        </div>
												    </div>

												     <div class="form-group">
												        <label class="control-label col-md-4">Stock</label>
												        <div class="col-md-6">
												            <input type="text" class="form-control" name="stock" placeholder="Stock"/>
												        </div>
												    </div>


												   
												    <div class="form-group">
												        <label class="control-label col-md-4">Details</label>
												        <div class="col-md-6">
												            <input type="text" class="form-control" name="details" placeholder="Details"/>
												        </div>
												    </div>
												    <div class="form-group">
												        <label class="control-label col-md-4">Photo</label>
												        <div class="col-md-6">
												            <input type="file" class="filestyle" data-iconName="glyphicon-picture" name="file" >
												        </div>
												    </div> 
							

											    <div class="form-group">
											        <div class="col-md-6">
											            <button type="submit" value="addflashdrive" class="btn btn-custom pull-right" name="addflashdrive"> ADD </button>
											        </div>
											    </div>
											</form>
		
							    				';
							    		

							    		}





							    		elseif($_GET['cmd']==='editflashdrive' && $_GET['id'] != ''){

							    			$brand = "";
							    			$model = "";
							    			$capacity = "";
							    			$price = "";
							    			$stock = "";
							    			$details = "";
							    			$flashdrive_photo = "";
							    			
							    			 include $_SERVER['DOCUMENT_ROOT'].'/memory-go/application/model/flashdrive.php';
												 $flashdrives = new flashdrive();
												 $pid = $_GET['id'];
												 $result = $flashdrives->getFlashdriveByID($pid);
												 while($row = mysqli_fetch_array($result)){
												 	$id = $row['flash_drive_id'];
												 	$brand = $row['brand'];
												 	$model = $row['model'];
												 	$capacity = $row['capacity'];
												 	$price = $row['price'];
												 	$stock = $row['stock'];
												 	$details = $row['details'];
												 	$date_added = $row['date_added'];
												 	$flashdrive_photo = $row['flashdrive_photo'];
												 }

							    			$display = '
							    					<form class="form-horizontal"  name="commentform" method="POST" action="../controller/flashdrive_control.php" enctype="multipart/form-data">
													 <div class="form-group">
														<label class="control-label col-md-8" id="signup_labels" ><h3>FLASH DRIVE INFORMATION</h3></label>
													</div>

												   <div class="form-group">
												        <label class="control-label col-md-4">Brand</label>
												        <div class="col-md-6 selectContainer">
															 <select name="brand" class="form-control" >
													                <option value="'.$brand.'">'.$brand.'</option>
													                <option value="hp">HP</option>
													                <option value="kingston">KINGSTON</option>
													                <option value="toshiba">TOSHIBA</option>
													                <option value="sandisk">SANDISK</option>
													                <option value="trancend">TRANCEND</option>
													                <option value="sony">SONY</option>
													                <option value="pny">PNY</option>
													                <option value="cd-rking">CD-R KING</option>
													            </select>
												        </div>
												    </div>
						
												
												     <div class="form-group">
												        <label class="control-label col-md-4">Model</label>
												        <div class="col-md-6">
												            <input type="text" class="form-control" name="model" value="'.$model.'" placeholder="Model"/>
												        </div>
												    </div>
												   
												     <div class="form-group">
												        <label class="control-label col-md-4">Capacity</label>
												        <div class="col-md-6 selectContainer">
															 <select name="capacity"  class="form-control">
													                <option value="'.$capacity.'">'.$capacity.'</option>
													                <option value="1">1GB</option>
													                <option value="2">2GB</option>
													                <option value="4">4GB</option>
													                <option value="16">16GB</option>
													                <option value="32">32GB</option>
													                <option value="128">128GB</option>
													            </select>
												        </div>
												    </div>

												    <div class="form-group">
												        <label class="control-label col-md-4">Price</label>
												        <div class="col-md-6">
												            <input type="text" class="form-control" value="'.$price.'" name="price" placeholder="Price"/>
												        </div>
												    </div>

												     <div class="form-group">
												        <label class="control-label col-md-4">Stock</label>
												        <div class="col-md-6">
												            <input type="text" class="form-control" value="'.$stock.'" name="stock" placeholder="Stock"/>
												        </div>
												    </div>


												   
												    <div class="form-group">
												        <label class="control-label col-md-4">Details</label>
												        <div class="col-md-6">
												            <input type="text" class="form-control" value="'.$details.'" name="details" placeholder="Details"/>
												        </div>
												    </div>
												    <div class="form-group">
												        <label class="control-label col-md-4">Photo</label>
												        <div class="col-md-6">
												            <input type="file" class="filestyle" value="'.$flashdrive_photo.'" data-iconName="glyphicon-picture" name="file" >
												        </div>
												    </div> 
							

											    <div class="form-group">
											        <div class="col-md-6">
											        	<input type="hidden" name="pid" value="'.$id.'" />
											            <input type="submit" value="EDIT" class="btn btn-custom pull-right" name="editflashdrive" />
											        </div>
											    </div>
											</form>
		
							    				';
							    		}
							    elseif($_GET['cmd']==='viewflashdrive'){

							    	
							    			
							    			$display.= '<h1>FLASH DRIVES</h1>
											<table class="table" >
												<tr>
													<th>PHOTO</th>
													<th>ID</th>
													<th>BRAND</th>
													<th>MODEL</th>
													<th>CAPACITY</th>
													<th>PRICE</th>
													<th>STOCK</th>
													<th>DETAILS</th>
													<th>DATE ADDED</th>
													<th>COMMAND</th>
												</tr>
												';?>

												<?php
												 include $_SERVER['DOCUMENT_ROOT'].'/memory-go/application/model/flashdrive.php';
												 $flashdrives = new flashdrive();
												 $result = $flashdrives->getAllFlashdrive();
												 while($row = mysqli_fetch_array($result)){
												 	$id = $row['flash_drive_id'];
												 	$brand = $row['brand'];
												 	$model = $row['model'];
												 	$capacity = $row['capacity'];
												 	$price = $row['price'];
												 	$stock = $row['stock'];
												 	$details = $row['details'];
												 	$date_added = $row['date_added'];
												 	$flashdrive_photo = $row['flashdrive_photo'];

												 $display.= '
												 		<tr>
												 			<td><img src="../../pendrives/'.$flashdrive_photo.'" height="40xp;" width="30px;"></td>
												 			<td>'.$id.'</td>
												 			<td>'.$brand.'</td>
												 			<td>'.$model.'</td>
												 			<td>'.$capacity.'</td>
												 			<td>'.$price.'</td>
												 			<td>'.$stock.'</td>
												 			<td>'.$details.'</td>
												 			<td>'.$date_added.'</td>
												 			<td> <center><h4><a href="manage_view.php?cmd=editflashdrive&id='.$id.'"  title="edit" class="glyphicon glyphicon-edit"></a> | <a href="../controller/flashdrive_control.php?cmd=remove&id='.$id.'" title="remove" class="glyphicon glyphicon-remove"></a></h4> </center></td>
												 			
												 		</tr>
												 	';
												 }
												 $display.= '</table>';
	
							    	}

							    elseif($_GET['cmd']==='search'){

							    		$display .= '
							    			<form class="navbar-form navbar-left"  method="POST" action="manage_view.php?cmd=search"> 
											        <div class="form-group">
											          <label>Search</label>
											          <input type="text" class="form-control" name="search_item" placeholder="Brand, Model ,capacity..etc">
											        </div>
											        <input type="submit" value="Submit" class="btn btn-default" name="search"/>
											      </form>


											
											<table class="table">
												<tr>
													<th>PHOTO</th>
													<th>ID</th>
													<th>BRAND</th>
													<th>MODEL</th>
													<th>CAPACITY</th>
													<th>PRICE</th>
													<th>STOCK</th>
													<th>DETAILS</th>
													<th>DATE ADDED</th>
													<th>COMMAND</th>
												</tr>
									      	';
									      		;?>
									      		<?php
									      		if(isset($_POST['search'])){
									      			$key = $_POST['search_item'];
												 include $_SERVER['DOCUMENT_ROOT'].'/memory-go/application/model/flashdrive.php';
												 $flashdrives = new flashdrive();
												 $result = $flashdrives->searchFlashDrive($key);
												 while($row = mysqli_fetch_array($result)){
												 	$id = $row['flash_drive_id'];
												 	$brand = $row['brand'];
												 	$model = $row['model'];
												 	$capacity = $row['capacity'];
												 	$price = $row['price'];
												 	$stock = $row['stock'];
												 	$details = $row['details'];
												 	$date_added = $row['date_added'];
												 	$flashdrive_photo = $row['flashdrive_photo'];

												 $display.= '
												 		<tr>
												 			<td><img src="../../pendrives/'.$flashdrive_photo.'" height="40xp;" width="30px;"></td>
												 			<td>'.$id.'</td>
												 			<td>'.$brand.'</td>
												 			<td>'.$model.'</td>
												 			<td>'.$capacity.'</td>
												 			<td>'.$price.'</td>
												 			<td>'.$stock.'</td>
												 			<td>'.$details.'</td>
												 			<td>'.$date_added.'</td>
												 			<td> <center><h4><a href="manage_view.php?cmd=editflashdrive&id='.$id.'"  title="edit" class="glyphicon glyphicon-edit"></a> | <a href="../controller/flashdrive_control.php?cmd=remove&id='.$id.'" title="remove" class="glyphicon glyphicon-remove"></a></h4> </center></td>
												 			
												 		</tr>
												 	';
												 }
												}

												 $display.= '</table>';
												}

								 elseif($_GET['cmd']==='viewCustomers'){


											$display .= '<table class="table">
												<tr>
													<th>ACCOUNT ID</th>

													<th>FIRSTNAME</th>
													<th>LASTNAME</th>
													<th>GENDER</th>
													<th>EMAIL</th>
													<th>ADDRESS</th>
													<th>CONTACT NUMBER</th>
													<th>DATE ORDERED</th>

												
												</tr>
									      	';
									      		;?>
									      		<?php
												 include $_SERVER['DOCUMENT_ROOT'].'/memory-go/application/model/flashdrive.php';
												 $flashdrives = new flashdrive();
												 $result = $flashdrives->getAllCustomers();
												 while($row = mysqli_fetch_array($result)){
												 	$customer_account_id = $row['customer_account_id'];
												 	$customer_firstname = $row['customer_firstname'];
												 	$customer_lastname = $row['customer_lastname'];
												 	$customer_gender= $row['customer_gender'];
												 	$customer_email = $row['customer_email'];
												 	$customer_address = $row['customer_address'];
												 	$customer_contact_number = $row['customer_contact_number'];
												 	$date_ordered = $row['date_ordered'];
																	 

												 $display.= '
												 		<tr>
							 			
												 			<td>'.$customer_account_id.'</td>
												 			<td>'.$customer_firstname.'</td>
												 			<td>'.$customer_lastname.'</td>
												 			<td>'.$customer_gender.'</td>
												 			<td>'.$customer_email.'</td>
												 			<td>'.$customer_address.'</td>
												 			<td>'.$customer_contact_number.'</td>
												 			<td>'.$date_ordered.'</td>
												 			
												 			
												 		</tr>
												 	';
												 }
												

												 $display.= '</table>';
								 }

								  elseif($_GET['cmd']==='viewUsers'){


											$display .= '<table class="table">
												<tr>
													<th>ACCOUNT ID</th>
													<th>FIRSTNAME</th>
													<th>LASTNAME</th>
													<th>GENDER</th>
													<th>BIRTHDAY</th>
													<th>ADDRESS</th>
													<th>CONTACT NO.</th>
													<th>EMAIL</th>
													
													<th>USER</th>
													<th>PASS</th>
													<th>CREATED</th>

												
												</tr>
									      	';
									      		;?>
									      		<?php
												 include $_SERVER['DOCUMENT_ROOT'].'/memory-go/application/model/flashdrive.php';
												 $flashdrives = new flashdrive();
												 $result = $flashdrives->getAllUsers();
												 while($row = mysqli_fetch_array($result)){
												 	$id = $row['id'];
												 	$firstname = $row['firstname'];
												 	$lastname = $row['lastname'];
												 	$gender= $row['gender'];
												 	$birthday= $row['birthday'];
													$address = $row['address'];
													$contact_number = $row['contact_number'];
												 	$email = $row['email'];
												 	$username = $row['username'];
												 	$password = $row['password'];
												 	$date_creaded = $row['date_created'];
												 	
												 

												 $display.= '
												 		<tr>
							 			
												 			<td>'.$id.'</td>
												 			<td>'.$firstname.'</td>
												 			<td>'.$lastname.'</td>
												 			<td>'.$gender.'</td>
												 			<td>'.$birthday.'</td>
												 			<td>'.$address.'</td>
												 			<td>'.$contact_number.'</td>
												 			<td>'.$email.'</td>
												 			<td>'.$username.'</td>
												 			<td>'.$password.'</td>
												 			<td>'.$date_creaded.'</td>
												 			
												 			
												 		</tr>
												 	';
												 }
												

												 $display.= '</table>';
								 }
									  elseif($_GET['cmd']==='viewAdmins'){


												$display .= '<table class="table">
													<tr>
														<th>ACCOUNT ID</th>
														<th>FIRSTNAME</th>
														<th>LASTNAME</th>
														<th>GENDER</th>
														<th>BIRTHDAY</th>
														<th>ADDRESS</th>
														<th>CONTACT NO.</th>
														<th>EMAIL</th>
														
														<th>USER</th>
														<th>PASS</th>
														<th>CREATED</th>

													
													</tr>
										      	';
										      		;?>
										      		<?php
													 include $_SERVER['DOCUMENT_ROOT'].'/memory-go/application/model/flashdrive.php';
													 $flashdrives = new flashdrive();
													 $result = $flashdrives->getAllAdmins();
													 while($row = mysqli_fetch_array($result)){
													 	$id = $row['id'];
													 	$firstname = $row['firstname'];
													 	$lastname = $row['lastname'];
													 	$gender= $row['gender'];
													 	$birthday= $row['birthday'];
														$address = $row['address'];
														$contact_number = $row['contact_number'];
													 	$email = $row['email'];
													 	$username = $row['username'];
													 	$password = $row['password'];
													 	$date_creaded = $row['date_created'];
													 	
													 

													 $display.= '
													 		<tr>
								 			
													 			<td>'.$id.'</td>
													 			<td>'.$firstname.'</td>
													 			<td>'.$lastname.'</td>
													 			<td>'.$gender.'</td>
													 			<td>'.$birthday.'</td>
													 			<td>'.$address.'</td>
													 			<td>'.$contact_number.'</td>
													 			<td>'.$email.'</td>
													 			<td>'.$username.'</td>
													 			<td>'.$password.'</td>
													 			<td>'.$date_creaded.'</td>
													 			
													 			
													 		</tr>
													 	';
													 }
													

													 $display.= '</table>';
									 }
								 elseif($_GET['cmd']==='viewOrders'){

								    	
								    			
								    			$display.= '<h1>CUSTOMER ORDERS</h1>
												<table class="table" id="orders_view_table">
													<tr>
														<th>ORDER ID</th>
														<th>ACCOUNT ID</th>
														<th>ORDER TOTAL</th>
														<th>CASH</th>
														<th>CAHNGE</th>
														<th>ORDER DATE</th>
													
													</tr>
													';?>

													<?php
													 include $_SERVER['DOCUMENT_ROOT'].'/memory-go/application/model/flashdrive.php';
													 $flashdrives = new flashdrive();
													 $result = $flashdrives->getCustomerOrders();
													 while($row = mysqli_fetch_array($result)){
													 	$order_id = $row['order_id'];
													 	$customer_account_id = $row['customer_account_id'];
													 	$order_total = $row['order_total'];
													 	$customer_cash = $row['customer_cash'];
													 	$customer_change = $row['customer_change'];
													 	$date_ordered = $row['date_ordered'];
													 	

													 $display.= '
													 		<tr class="order_details">
													 			
													 			<td>'.$order_id.'</td>
													 			<td>'.$customer_account_id.'</td>
													 			<td>'.$order_total.'</td>
													 			<td>'.$customer_cash.'</td>
													 			<td>'.$customer_change.'</td>
													 			<td>'.$date_ordered.'</td>
													 		
													 			
													 		</tr>
													 				
													 	';

											 			$display.= '
																		
																	
																	<tr class="order_details_infos">
																		<th>ORDER ID</th>
																		<th>ACCOUNT ID</th>
																		<th>FLASH DRIVE ID</th>
																		<th>QUANTITY</th>
																		<th>PRICE</th>
																		<th>ORDER DATE</th>
																	</tr>
																		
																		';
													 	
													 		 $flashdrives = new flashdrive();
															 $result2 = $flashdrives->getCustomerOrderDetails($order_id);
															 while($row = mysqli_fetch_array($result2)){
															 	$order_id = $row['order_id'];
															 	$customer_account_id = $row['customer_account_id'];
															 	$flash_drive_id = $row['flash_drive_id'];
															 	$quantity= $row['quantity'];
															 	$price = $row['price'];
															 	$date_ordered = $row['date_ordered'];


																$display.= '
																	

															 		<tr class="order_details_infos">
															 			
															 			<td>'.$order_id.'</td>
															 			<td>'.$customer_account_id.'</td>
															 			<td>'.$flash_drive_id.'</td>
															 			<td>'.$quantity.'</td>
															 			<td>'.$price.'</td>
															 			<td>'.$date_ordered.'</td>
															 		
															 			
															 		</tr>

															 		

															 		';
															 	}	

															 		$display.= '
																				<tr class="order_details_infos">
																			
																				<th>ACCOUNT ID</th>
																				<th>NAME</th>
																				<th>GENDER</th>
																				<th>EMAIL</th>
																				<th>ADDRESS</th>
																				<th>CONTACT NUMBER</th>
																				
																			</tr>';

															 		 $flashdrives = new flashdrive();
																	 $result3 = $flashdrives->getCustomer($customer_account_id);
																	 $row = mysqli_fetch_array($result3);
																	 
																	 	$customer_firstname = $row['customer_firstname'];
																	 	$customer_lastname = $row['customer_lastname'];
																	 	$customer_gender= $row['customer_gender'];
																	 	$customer_email = $row['customer_email'];
																	 	$customer_address = $row['customer_address'];
																	 	$customer_contact_number = $row['customer_contact_number'];
																	 


																		$display.= '
																				
																	 		<tr class="order_details_infos">
																	 			
																	 			<td>'.$customer_account_id.'</td>
																	 			<td>'.$customer_firstname.' , '.$customer_lastname.'</td>
																	 			<td>'.$customer_gender.'</td>
																	 			<td>'.$customer_email.'</td>
																	 			<td>'.$customer_address.'</td>
																	 			<td>'.$customer_contact_number.'</td>
											
																	 		</tr>

																

																	 		';
																	 	}


													 

													 $display.= '</table>';
		
								    	}


							    
							    }

							    
							    else{
							    	$display = "<h2> WELCOME ADMIN </h2>";
							    }
							    echo $display;
							    ?>

							   
</div>
	
	

</div>
<div class = "container">
			<p class="navbar-text pull-left"> 2014 Memory-Go All Rights Reserved.</p>
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
          	<form class="form-horizontal" id="loginForm" method="POST" action="../controllers/login_control.php">
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
