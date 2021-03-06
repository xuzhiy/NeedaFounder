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
		foreach($enterprisea as $enterprise_account)
		{
			if($enterprise_account->email === $_SESSION['email'])
			{
				$exist = 2;				// '$exist = 2' means the enterprise is existed.
				break;
			}
		} 
	}
	if($exist === 0)
	{
		echo "<script>alert('Illegal operation.');history.go(-1);</script>";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
	<title>Message</title>

	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
	<link rel="stylesheet" href="assets/css/fonts/linecons/css/linecons.css">
	<link rel="stylesheet" href="assets/css/fonts/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/xenon-core.css">
	<link rel="stylesheet" href="assets/css/xenon-forms.css">
	<link rel="stylesheet" href="assets/css/xenon-components.css">
	<link rel="stylesheet" href="assets/css/xenon-skins.css">
	<link rel="stylesheet" href="assets/css/custom.css">

	<script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="js/message.js"></script>

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

					<li >
						<?php
							if($exist === 1)
							{
								echo '<a href="profile_user"><i class="linecons-params"></i><span class="title">Profile</span></a>';
							}
							else if($exist === 2)
							{
								echo '<a href="profile_enterprise"><i class="linecons-params"></i><span class="title">Profile</span></a>';
							}
						?>
					</li>
					<li class="active opened active">
						<a href="message">
							<i class="linecons-mail"></i>
							<span class="title">Message</span>
						</a>
					</li>
					<li>
						<?php
							if($exist === 1)
							{
								echo '<a href="history"><i class="linecons-database"></i><span class="title">Histories</span></a>';
							}
							else if($exist === 2)
							{
								echo '<a href="member"><i class="linecons-database"></i><span class="title">Members</span></a>';
							}
						?>
						

					</li>
					<li>
						<a href="publishedJob">
							<i class="linecons-pencil"></i>
							<span class="title">PublishedJob</span>
						</a>

					</li>
					<li>
						<a href="publishedBusiness">
							<i class="linecons-pencil"></i>
							<span class="title">PublishedBusiness</span>
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
								<a href="profile">
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
					<h1 class="title">Message</h1>
					<p class="description">Mailbox sidebar and composing new message</p>
				</div>
				

					
			</div>
			<section class="mailbox-env">
				
				<div class="row">
					
					<!-- Compose Email Form -->
					<div class="col-sm-9 mailbox-right">


						<div class="mail-env">
							<!-- mail table -->
							<table class="table mail-table" style="table-layout:fixed;">
							
								<!-- mail table header -->
								<thead>
									<tr>
										<th>Sender</th>
										<th>Subject</th>
										<th>Content</th>
										<th>Time</th>
									</tr>
								</thead>
								
								<!-- email list -->
								<tbody>
									
																			
											<?php
												$x = 0; //x is the number of displayed objects.
											?> 
											@foreach($messages as $message)
											<?php
												if(isset($_SESSION['email']))
												{  
													if($message->receiver == $_SESSION['email']){
												
													$x = $x + 1;
													$sender = $message->sender;
													$subject = $message->subject;
													$content = $message->content;
													$time = $message->time;

											?>
											<tr>
												<td style="word-wrap:break-word;" >{{$sender}}</td>
												<td style="word-wrap:break-word;" >{{$subject}}</td>
												<td style="word-wrap:break-word;" >{{$content}}</td>
												<td style="word-wrap:break-word;" >{{$time}}</td>
											</tr>
											<?php
													}
												}
												else
												{
													continue;
												}
											?>
								
											@endforeach
											<tr>
												<th colspan="4" class="col-header-options">
													<div class="mail-pagination pull-right">
														Total: <strong>{{$x}}</strong> emails
													</div>
												</th>
											</tr>
										


									
								</tbody>
								
							</table>
							
						</div>

						
						
					</div>
					
					<!-- Mailbox Sidebar -->
					<div class="col-sm-3 mailbox-left">
						
						<div class="mailbox-sidebar">
							
							<a href="message" class="btn btn-block btn-secondary btn-icon btn-icon-standalone btn-icon-standalone-right">
								<i class="linecons-mail"></i>
								<span>Compose</span>
							</a>
							
							
							

							<ul class="list-unstyled mailbox-list">
								<li >
									<a href="message">
										New Mail
									</a>
								</li>
								<li class="active">
									<a href="inbox">
										Inbox
<!--										<span class="badge badge-success pull-right">5</span>-->
									</a>
								</li>
								<li>
									<a href="sent">
										Sent
									</a>
								</li>
							</ul>


							
							<div class="vspacer"></div>
							
						</div>
						
					</div>
					
				</div>
				
			</section>
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
						theme by <a href="http://laborator.co" target="_blank">NAC</a>
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
	

	<!-- Imported styles on this page -->
	<link rel="stylesheet" href="assets/js/wysihtml5/src/bootstrap-wysihtml5.css">

	<!-- Bottom Scripts -->
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/TweenMax.min.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/xenon-api.js"></script>
	<script src="assets/js/xenon-toggles.js"></script>
	<script src="assets/js/wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>


	<!-- Imported scripts on this page -->
	<script src="assets/js/wysihtml5/src/bootstrap-wysihtml5.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/xenon-custom.js"></script>

</body>
</html>