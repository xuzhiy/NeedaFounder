<?php
	if(!isset($_SESSION)){
		session_start();
	}
	$exist = 0;
	// Check if the user has logged in. 
	if(isset($_SESSION['email']))
	{  
		foreach($users as $user)
		{
			if($user->email === $_SESSION['email'])
			{
				$exist = 1;				// '$exist = 1' means the user is existed.
				break;
			}
		} 
	}
	if($exist === 0)
	{
		echo "<script>alert('Please login first.');history.go(-1);</script>";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
	<title>Profile</title>

	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
	<link rel="stylesheet" href="assets/css/fonts/linecons/css/linecons.css">
	<link rel="stylesheet" href="assets/css/fonts/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/xenon-core.css">
	<link rel="stylesheet" href="assets/css/xenon-forms.css">
	<link rel="stylesheet" href="assets/css/xenon-components.css">
	<link rel="stylesheet" href="assets/css/xenon-skins.css">
	<link rel="stylesheet" href="assets/css/custom.css">
	<link rel="stylesheet" href="css/component.css">

	<script src="assets/js/jquery-3.2.1.min.js"></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	
</head>
<body class="page-body">

	<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
			
		<!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
		<!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
		<!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
		<div class="sidebar-menu toggle-others fixed">
			
			<div class="sidebar-menu-inner">	
				
				<header class="logo-env">
					
					<!-- logo -->
					<div class="logo">
						<a href="homepage" class="logo-expanded">
							<img src="assets/images/logo@2x.png" width="80" alt="" />
						</a>
						
						<a href="homepage" class="logo-collapsed">
							<img src="assets/images/logo-collapsed@2x.png" width="40" alt="" />
						</a>
					</div>

					<!-- This will toggle the mobile menu and will be visible only on mobile devices -->
					<div class="mobile-menu-toggle visible-xs">
						<a href="#" data-toggle="user-info-menu">
							<i class="fa-bell-o"></i>
							<span class="badge badge-success">7</span>
						</a>

						<a href="#" data-toggle="mobile-menu">
							<i class="fa-bars"></i>
						</a>
					</div>
					
								
				</header>
						
				
						
				<ul id="main-menu" class="main-menu">
					<!-- add class "multiple-expanded" to allow multiple submenus to open -->
					<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->

					<li class="active opened active">
						<a href="profile_user">
							<i class="linecons-params"></i>
							<span class="title">Profile</span>
						</a>
					</li>
					<li>
						<a href="message">
							<i class="linecons-mail"></i>
							<span class="title">Message</span>
						</a>
					</li>
					<li>
						<a href="history">
							<i class="linecons-database"></i>
							<span class="title">Histories</span>
						</a>

					</li>
					<li>
						<a href="publish">
							<i class="linecons-database"></i>
							<span class="title">Published</span>
						</a>

					</li>
				</ul>
						
			</div>
			
		</div>
		
		<div class="main-content">
					
			<!-- User Info, Notifications and Menu Bar -->
			<nav class="navbar user-info-navbar" role="navigation">
				

				
				
				<!-- Right links for user info navbar -->
				<ul class="user-info-menu right-links list-inline list-unstyled">
					
					<li class="search-form"><!-- You can add "always-visible" to show make the search input visible -->
						
						<form method="get" action="extra-search.html">
							<input type="text" name="s" class="form-control search-field" placeholder="Type to search..." />
							
							<button type="submit" class="btn btn-link">
								<i class="linecons-search"></i>
							</button>
						</form>
						
					</li>
					
					<li class="dropdown user-profile">
						<a href="#" data-toggle="dropdown">
							<img src="assets/images/user-4.png" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
							<span>
								<?php 
									if(isset($_SESSION['name']))
									{  
										echo $_SESSION['name'];
									}
									else
									{
										echo 'Null';
									}
								?>
								<i class="fa-angle-down"></i>
							</span>
						</a>
						
						<ul class="dropdown-menu user-profile-menu list-unstyled">
							<li>
								<a href="post1">
									<i class="fa-edit"></i>
									New Post
								</a>
							</li>
							<li>
								<a href="profile_user">
									<i class="fa-user"></i>
									Profile
								</a>
							</li>
							<li>
								<a href="about">
									<i class="fa-info"></i>
									About
								</a>
							</li>
							<li class="last">
								<a href="logout">
									<i class="fa-lock"></i>
									Logout
								</a>
							</li>
						</ul>
					</li>
					

					
				</ul>
				
			</nav>
			<div class="page-title">
				
				<div class="title-env">
					<h1 class="title">User Profile</h1>
					<p class="description">Plain text boxes, select dropdowns and other basic form profile</p>
				</div>

			</div>
			
			<div class="row">
				<div class="col-sm-12">
					
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Change your Password</h3>
						</div>
						<div class="panel-body">
							
							<form action="changePass_user" method="post" role="form" class="form-horizontal">
								{{ csrf_field() }}
								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-2">Password</label>
									
									<div class="col-sm-10">
										<input type="password" class="form-control" id="field-2" name="password1">
									</div>
								</div>

								<div class="form-group-separator"></div>
							
								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-3">Confirm Password</label>

									<div class="col-sm-10">
										<input type="password" class="form-control" id="field-3" name="password2">
									</div>
								</div>
								
								<div class="form-group" style="margin:0 auto;">
									<button type="submit" class="button black">Submit</button>
								</div>
							</form>
							
						</div>
					</div>
					
				</div>
			</div>
			
			@foreach($users as $user)
			<?php
				if(isset($_SESSION['email']))
				{  
					if($user->email !== $_SESSION['email'])
					{
						continue;
					}
				}
				else
				{
					continue;
				}
			?>
			<div class="row">
				<div class="col-sm-12">
					
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Change your information</h3>
						</div>
						<div class="panel-body">
							
							<form action="changeInfor_user" method="post" role="form" class="form-horizontal">
								{{ csrf_field() }}
								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">Name</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" id="field-1" value="{{$user->name}}" name="name">
									</div>
								</div>
								
								<div class="form-group-separator"></div>

								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-4">Phone Number</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" id="field-4" value="{{$user->phone}}" name="phone">
									</div>
								</div>

								<div class="form-group-separator"></div>
								
								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-5">Your Email</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" id="field-5" value="{{$user->email}}" readonly name="email">
									</div>
								</div>

								<div class="form-group-separator"></div>
								
								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-5">Your Enterprise</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" id="field-5" value="{{$user->enterprise}}"  name="enterprise">
									</div>
								</div>
								
								<div class="form-group-separator"></div>
								
								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-6">Your Address</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" id="field-6" value="{{$user->address}}" name="address">
									</div>
								</div>
								
								<div class="form-group" style="margin:0 auto;">
									<button type="submit" class="button black">Submit</button>
								</div>
							</form>
							
						</div>
					</div>
					
				</div>
			</div>
			@endforeach
			

			<!-- Main Footer -->
			<!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
			<!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
			<!-- Or class "fixed" to  always fix the footer to the end of page -->
			<footer class="main-footer sticky footer-type-1">
				
				<div class="footer-inner">
				
					<!-- Add your copyright text here -->
					<div class="footer-text">
						&copy; 2017
						<strong>Group5</strong>
						theme by <a href="http://laborator.co" target="_blank">N.A.C</a>
					</div>
					
					
					<!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
					<div class="go-up">
					
						<a href="#" rel="go-top">
							<i class="fa-angle-up"></i>
						</a>
						
					</div>
					
				</div>
				
			</footer>
		</div>
		
	</div>


	<!-- Bottom Scripts -->
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/TweenMax.min.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/xenon-api.js"></script>
	<script src="assets/js/xenon-toggles.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/xenon-custom.js"></script>

</body>
</html>