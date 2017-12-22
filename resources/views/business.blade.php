<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Join a Business</title>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-3.2.1.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<link href="css/list.css" rel="stylesheet">

<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<!-- styles -->
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/animate.min.css" rel="stylesheet">
<link href="css/owl.carousel.css" rel="stylesheet">
<link href="css/owl.theme.css" rel="stylesheet">
<link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">
</head>
<body>
<div class="navbar navbar-default yamm" role="navigation" id="navbar" style="background-color:#a1a1a1" >
	<div class="container">
		<div class="navbar-header" > <a class="navbar-brand home" href="homepage" data-animate-hover="bounce"> <img src="img/logo_2.png" alt="logo" class="hidden-xs" style="height: 50px; width: auto"> </a> </div>
		<div class="navbar-collapse collapse" id="navigation">
			<ul class="nav navbar-nav navbar-left">
				<li><a href="homepage" style="color:white">Home</a> </li>
				<li><a style="color:white"> | </a></li>
				<li><a href="about" style="color:white">About us</a> </li>
			</ul>
		</div>
		<div class="navbar-buttons">
			<div class="navbar-collapse collapse right" style="color:white"> <img src="img/Users_213px_1194852_easyicon.net.png" alt="logo" class="hidden-xs" style="height: 30px; width: auto"> <a href="login" class="btn btn-primary navbar-btn" style="background-color:#a1a1a1; border-color: #a1a1a1"><span class="hidden-sm">Login</span></a>/ <a href="login" class="btn btn-primary navbar-btn" style="background-color:#a1a1a1; border-color: #a1a1a1"><span class="hidden-sm">Register</span></a> </div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-4 list_op" style="color: #FF7600;"> Join a business </div>
		<div class="col-sm-4 list_op"><a href="job" style="color: black"> Find a job </a></div>
		<div class="col-sm-4 list_op_end"><a href="business" style="color: black"> Enterprise Hiring </a></div>
	</div>
	<div class="row">
		<div class="text-center col-md-12">
			<nav class="navbar navbar-inverse">
				<div class="container-fluid"> 
					<!-- Brand and toggle get grouped for better mobile display -->
					<form action="business?search=1" method="post">
						{{ csrf_field() }}
						<div class="navbar-header">
							<div class="collapse navbar-collapse" id="inverseNavbar1">
								<div class="navbar-form navbar-left" role="search">
									<div class="form-group" style="color: white"> I am a...
										<input type="text" class="form-control" name="role">
									</div>
									<div class="form-group" style="color: white">&nbsp;Looking for a
										<input type="text" class="form-control" name="position">
									</div>
								</div>
							</div>
							<!-- /.navbar-collapse --> 
						</div>
						<div class="navbar-form navbar-right" role="search">
							<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-globe"></span> Search</button>
						</div>
					</form>
				</div>
			</nav>
		</div>
	</div>
	<hr style="height:5px;border:none;border-top:5px solid green;">
	
	<?php
		$x = 0;		//x is the number of displayed objects.
	?>
	@foreach($datas as $data)
	<div class="row">
		<div class="col-sm-4 picture" style="height: 150px"><img src="img/job.png" alt="Job" height="150px" width="300px"></div>
		<div class="col-sm-8" style="height: 150px">
			<div class="jobtitle">{{$data->title}}</div>
			<div class="jobcontent">{{$data->content}}</div>
			<div class="joblocation"><img src="img/pin_green_25px_1129789_easyicon.net.png" width="12">{{$data->location}}</div>
		</div>
	</div>
	<hr style="border-top: 2px solid #BBBBBB;">
	@endforeach
	
</div>
</body>
</html>
