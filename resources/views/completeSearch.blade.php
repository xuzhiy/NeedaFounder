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

    <title>
        Complete Search
    </title>

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
   
    <!-- theme stylesheet -->
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="css/custom.css" rel="stylesheet">

    <script src="js/respond.min.js"></script>



</head>

<body>
	<div class="navbar navbar-default yamm" role="navigation" id="navbar" style="background-color:#a1a1a1">
		<div class="container">
			<div class="navbar-header"> <a class="navbar-brand home" href="homepage" data-animate-hover="bounce"> <img src="img/logo_2.png" alt="logo" class="hidden-xs" style="height: 50px; width: auto"> </a> </div>
			<div class="navbar-collapse collapse" id="navigation">
				<ul class="nav navbar-nav navbar-left">
					<li><a href="homepage" style="color:white">Home</a> </li>
					<li><a style="color:white"> | </a>
					</li>
					<li><a href="about" style="color:white">About us</a> </li>
				</ul>
			</div>
			<div class="navbar-buttons">
				<div class="navbar-collapse collapse right" style="color:white"> <img src="img/Users_213px_1194852_easyicon.net.png" alt="logo" class="hidden-xs" style="height: 30px; width: auto">
				<?php
						if($status === 0)
						{
							echo '<a href="login" class="btn btn-primary navbar-btn" style="background-color:#a1a1a1; border-color: #a1a1a1"><span class="hidden-sm">Login</span></a>/ <a href="login" class="btn btn-primary navbar-btn" style="background-color:#a1a1a1; border-color: #a1a1a1"><span class="hidden-sm">Register</span></a>';
						}
						else
						{
							echo '<span><a href="profile" class="btn btn-primary navbar-btn" style="background-color:#a1a1a1; border-color: #a1a1a1">'.$_SESSION['name'].'</a></span> / <span><a href="logout" class="btn btn-primary navbar-btn" style="background-color:#a1a1a1; border-color: #a1a1a1">Logout</a></span>';
						}
				?>
				
				</div>
			</div>
		</div>
	</div>
   
	<div class="container">
		<div class="row">
			<div class="span12">
				<form action="job?search=1&complete=1" method="post">
					{{ csrf_field() }}
					<fieldset>
						<legend><h2>Complete Search for Job</h2></legend>
						<h4>Keywords</h4>
						<p><input type="text" class="form-control" style="width: auto" name="keywords"></p>
						<h4>Location</h4>
						<p><input type="text" class="form-control" style="width: auto" name="location"></p>
						<h4>Salary Range</h4>
						<p><select class="form-control" name="salary" style="width: auto">
								<option value="1">less than 1000 per week</option>
								<option value="2">1000-2000 per week(Excludes 2000)</option>
								<option value="3">2000-3000 per week(Excludes 3000)</option>
								<option value="4">More than 3000 per week</option>
							</select></p>
						<h4>Type of Job</h4>
						<p><select class="form-control" name="type" style="width: auto">
								<option value="1">Full Time</option>
								<option value="2">Part Time</option>
							</select></p>
						<button class="btn btn-success" type="submit">Search</button>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
    

    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
   

</body>

</html>
