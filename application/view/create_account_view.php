<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Memory Go | Creat Account</title>
	<link rel="shortcut icon" href="images/favicon.ico" type="image/icon">
	<link href = "../../css/bootstrap.min.css" rel = "stylesheet">
	<link href = "../../css/styles.css" rel = "stylesheet">
</head>
<body>


<div class = "navbar navbar-inverse" id="mymain-header">
		<div class = "container">
				
					<a href = "#" class = "navbar-brand" >Memory-Go </a>
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
						<li> <a href = "#"> Creat Account </a></li>
						<li><a class="glyphicon glyphicon-shopping-cart"></a></li>
						<li> <input type="text" class="form-control" id="search" name="search" placeholder="Search"></li>
						</ul>
						

					</div>
		</div>
		
	</div>

	<div class = "navbar navbar-inverse navbar-fixed-top"  id="mymain-header-fix">
		<div class = "container">
				
					<a href = "#" class = "navbar-brand" >Memory-Go </a>
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
						<li> <a href = "#"> Creat Account </a></li>
						<li><a class="glyphicon glyphicon-shopping-cart"></a></li>
						<li> <input type="text" class="form-control" id="search" name="search" placeholder="Search"></li>
						</ul>
						

					</div>
		</div>
		
	</div>
	<div class = "navbar navbar-inverse " id="slogan">
		<div class="container" >
				<div class="col-lg-6" >
						Because good memories are meant to last forever.
				</div>
				
			

		</div>
	</div>
<!--second menu-->
	
	<div class="container">
		<div class="row">
		  	<div class="col-md-8 col-md-offset-2">
		  			<div class="panel panel-primary">
					  <div class="panel-heading">Memory-Go Sign up</div>
					  <div class="panel-body">

					  	

					    <form class="form-horizontal" id="loginForm" name="commentform" method="POST" action="../controller/create_account_control.php">
								 <div class="form-group">
									<label class="control-label col-md-6" id="signup_labels"><h3>Account Data</h3></label>
								</div>

							   <div class="form-group">
							        <label class="control-label col-md-4">First Name</label>
							        <div class="col-md-6">
							            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name"/>
							        </div>
							    </div>
	
							
							     <div class="form-group">
							        <label class="control-label col-md-4">Last Name</label>
							        <div class="col-md-6">
							            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name"/>
							        </div>
							    </div>
							     <div class="form-group">
							        <label class="control-label col-md-4" for="birthday">Birthday</label>
							        <div class="col-md-6">
							            <input type="date" class="form-control" id="birthday" name="birthday" placeholder="Birthday"/>
							        </div>
							    </div>
							     <div class="form-group">
							        <label class="control-label col-md-4" for="gender">Gender</label>
							        <div class="col-md-6 selectContainer">
										 <select name="gender" class="form-control">
								                <option value="">Gender</option>
								                <option value="male">male</option>
								                <option value="female">female</option>
								            </select>
							        </div>
							    </div>

							    <div class="form-group">
							        <label class="control-label col-md-4">Address</label>
							        <div class="col-md-6">
							            <input type="text" class="form-control" id="address" name="address" placeholder="Address"/>
							        </div>
							    </div>

							     <div class="form-group">
							        <label class="control-label col-md-4">Contact Number</label>
							        <div class="col-md-6">
							            <input type="text" class="form-control" name="contact_number" placeholder="Contact Number"/>
							        </div>
							    </div>


							   
							    <div class="form-group">
							        <label class="control-label col-md-4">Email</label>
							        <div class="col-md-6">
							            <input type="text" class="form-control" id="email" name="email" placeholder="Email"/>
							        </div>
							    </div>
							    <div class="form-group">
							        <label class="control-label col-md-4">Username</label>
							        <div class="col-md-6">
							            <input type="text" class="form-control" id="username" name="username" placeholder="Username"/>
							        </div>
							    </div>
							    <div class="form-group">
							        <label class="control-label col-md-4">Password</label>
							        <div class="col-md-6">
							            <input type="password" class="form-control" id="password" name="password" placeholder="password"/>
							        </div>
						    	</div>
						    	 

						    <div class="form-group">
						        <div class="col-md-6">
						            <button type="submit" value="Signup" class="btn btn-custom pull-right" name="creataccount"> Creat Now</button>
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






	<script type="text/javascript" src="../../js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.js"></script>
	<script type="text/javascript" src="../../js/sticky_navbar.js"></script> 
	<script type="text/javascript" src="../../js/myjs.js"></script> 
	
</body>
</html>
