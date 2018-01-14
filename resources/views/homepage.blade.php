<?php
	if(!isset($_SESSION)){
		session_start();
	}
	$exist = 0;
	$status = 0;	// '$status = 0' means the user has not logged in.
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
	if($exist === 1)
	{
		$status = 1;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<link rel="stylesheet" href="css/homepage.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/homepage.js"></script>
	<title>Welcome to NeedaCofounder</title>
</head>
<body style="min-width: 1200px;">
	<div class="bg" style="background: url('img/background.jpg') no-repeat center top;background-size: 100% 700px;position: absolute;left: 0;top: 0;width: 100%;height: 700px;min-width: 1200px; z-index:-1;"><div class="bg_mask"></div></div>
	<br />
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-push-8 top_bar_right">
				<div class="op">
					<?php
						if($status === 0)
						{
							echo '<span><a href="login">Login</a></span> / <span><a href="login">Register</a></span>';
						}
						else
						{
							echo '<span><a href="profile">'.$_SESSION['name'].'</a></span> / <span><a href="logout">Logout</a></span>';
						}
					?>
				</div>
				<div class="op"><a href="enterprise">Enterprise List</a></div>
				<div class="op"><a href="job">Job List</a></div>
				<div class="op"><a href="about">About us</a></div>
			</div>
			<div class="col-md-8 col-md-pull-4">
				<img class="logo" src="img/logo.png" alt="NeedaCofounder">
			</div>
		</div>
	</div>
	
	<div class="middle_container">
		<div id="search_part">
			<br /><br /><br />
			<h3>Find a Better Job and Partner</h3><br />
			<h4>23000 jobs are available in Melbourne currently</h4><br /><br /><br /><br /><br />
			<div class="col-xs-6 col-md-offset-3">
					<?php
						if(isset($_GET['search']))
						{
							if($_GET['search'] === "business")
							{
					?>
								<div class="row search_con">
									<div class="search_op"><a href="homepage?search=business" style="color:white;">Join a Business</a></div>
									<div class="search_op"><a href="homepage?search=job">Find a Job</a></div>
									<div class="search_op"><a href="homepage?search=enterprise">Enterprise Hiring</a></div>
								</div><br />
								<form id="searchForm" action="business?search=1" method="post">
									{{ csrf_field() }}
									<input type="text" name="keywords">
									<button type="submit">Search</button>
								</form>
					<?php
							}
							else if($_GET['search'] === "job")
							{
					?>
								<div class="row search_con">
									<div class="search_op"><a href="homepage?search=business">Join a Business</a></div>
									<div class="search_op"><a href="homepage?search=job" style="color:white;">Find a Job</a></div>
									<div class="search_op"><a href="homepage?search=enterprise">Enterprise Hiring</a></div>
								</div><br />
								<form id="searchForm" action="job?search=1" method="post">
									{{ csrf_field() }}
									<input type="text" name="keywords">
									<button type="submit">Search</button>
								</form>
					<?php
							}
							else
							{
?>
								<div class="row search_con">
									<div class="search_op"><a href="homepage?search=business">Join a Business</a></div>
									<div class="search_op"><a href="homepage?search=job">Find a Job</a></div>
									<div class="search_op"><a href="homepage?search=enterprise" style="color:white;">Enterprise Hiring</a></div>
								</div><br />
								<form id="searchForm" action="enterprise?search=1" method="post">
									{{ csrf_field() }}
									<input type="text" name="keywords">
									<button type="submit">Search</button>
								</form>
					<?php
							}
						}
						else
						{
					?>
								<div class="row search_con">
									<div class="search_op"><a href="homepage?search=business" style="color:white;">Join a Business</a></div>
									<div class="search_op"><a href="homepage?search=job">Find a Job</a></div>
									<div class="search_op"><a href="homepage?search=enterprise">Enterprise Hiring</a></div>
								</div><br />
								<form id="searchForm" action="business?search=1" method="post">
									{{ csrf_field() }}
									<input type="text" name="keywords">
									<button type="submit">Search</button>
								</form>
					<?php
						}
					?>
			</div>
				
		</div>
	</div>
	
	<div class="foot_container">
  		<br />
		<div class="col-md-4" align="center">
			<img src="img/partners.png" height="150px" width="150px" alt="partners">
			<div class="intro_text"><b>Find a better partners to develop your own business</b></div>
		</div>
		<div class="col-md-4" align="center">
			<img src="img/jobs.png" height="150px" width="150px" alt="jobs">
			<div class="intro_text"><b>All jobs are true here with detailed information</b></div>
		</div>
		<div class="col-md-4" align="center">
			<img src="img/enterprises.png" height="150px" width="150px" alt="enterprises">
			<div class="intro_text"><b>Over 3000 enterprises join in our enterprises group</b></div>
		</div>
	</div>
	
</body>
</html>
